<?php

declare(strict_types=1);

namespace Kumwe\Reporting\Tests;

use DateTimeImmutable;
use Kumwe\Integration\EventSensitivity;
use Kumwe\Reporting\Contract\ProjectionBuilder;
use Kumwe\Reporting\Contract\ProjectionEvent;
use Kumwe\Reporting\Contract\ProjectionWriter;
use Kumwe\Reporting\Domain\ProjectionDefinition;
use Kumwe\Reporting\Domain\ProjectionFieldDefinition;
use Kumwe\Reporting\Domain\ProjectionSourceDefinition;
use Kumwe\Reporting\Domain\ReportValueType;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use RuntimeException;

/** Executable consumer implementations exercise the neutral ports without App services. */
final class ProjectionContractTest extends TestCase
{
    public function testForeignImplementationsPreserveEventMetadataAndTypedWrites(): void
    {
        $event = $this->event();
        self::assertSame(PHP_INT_MAX, $event->sequence());
        self::assertSame('event-0007', $event->id());
        self::assertSame('acme.record.changed', $event->type());
        self::assertSame(2, $event->schemaVersion());
        self::assertSame('2026-09-08T14:25:36.123456+02:00', $event->occurredAt()->format('Y-m-d\TH:i:s.uP'));
        self::assertSame(str_repeat('a', 64), $event->checksum());
        $writer = new RecordingProjectionWriter();
        $builder = new ExampleProjectionBuilder();
        $builder->apply($this->definition(), $event, $writer);
        self::assertSame([
            ['put', ['record' => 'row-001', 'shard' => 0, 'active' => false], [
                'amount' => '9007199254740993.0001',
                'memo' => null,
                'sequence' => PHP_INT_MAX,
                'event_id' => 'event-0007',
                'checksum' => str_repeat('a', 64),
                'occurred_at' => '2026-09-08T14:25:36.123456+02:00',
            ]],
        ], $writer->operations);
        $builder->apply($this->definition(), $this->event('acme.record.removed'), $writer);
        self::assertSame(['remove', ['record' => 'row-001', 'shard' => 0, 'active' => false]], $writer->operations[1]);
    }

    public function testReplayingTheSameOrderedEventsProducesTheSameOperations(): void
    {
        $definition = $this->definition();
        $before = $definition->toArray();
        $events = [
            $this->event('acme.record.changed', 2, 7, 'event-0007'),
            $this->event('acme.record.removed', 2, 8, 'event-0008'),
        ];
        $first = new RecordingProjectionWriter();
        $second = new RecordingProjectionWriter();
        foreach ([$first, $second] as $writer) {
            $builder = new ExampleProjectionBuilder();
            foreach ($events as $event) {
                $builder->apply($definition, $event, $writer);
            }
        }
        self::assertCount(2, $first->operations);
        self::assertSame($first->operations, $second->operations);
        self::assertSame($before, $definition->toArray());
    }

    public function testImmutableEventPayloadIsStableAcrossCallerArrayChanges(): void
    {
        $payload = ['record' => 'row-001', 'nested' => ['tags' => ['original']]];
        $instant = new DateTimeImmutable('2026-09-08T14:25:36.123456+02:00');
        $event = new ImmutableProjectionEvent(7, 'event-0007', 'acme.record.changed', 2, $instant, $payload, 'opaque');
        $payload['nested']['tags'][] = 'external';
        $returned = $event->payload();
        $returned['nested']['tags'][] = 'returned';
        self::assertSame(['record' => 'row-001', 'nested' => ['tags' => ['original']]], $event->payload());
        self::assertSame($instant, $event->occurredAt());
        self::assertSame('opaque', $event->checksum());
    }

    public function testConsumerBuilderUsesTheDeclaredSourceTypeAndVersion(): void
    {
        $definition = $this->definition();
        $writer = new RecordingProjectionWriter();
        $builder = new ExampleProjectionBuilder();
        $builder->apply($definition, $this->event('acme.undeclared.changed'), $writer);
        $builder->apply($definition, $this->event('acme.record.changed', 3), $writer);
        self::assertSame([], $writer->operations);
        $builder->apply($definition, $this->event(), $writer);
        self::assertCount(1, $writer->operations);
    }

    /** @return iterable<string, array{string}> */
    public static function writerFailures(): iterable
    {
        yield 'put' => ['acme.record.changed'];
        yield 'remove' => ['acme.record.removed'];
    }

    #[DataProvider('writerFailures')]
    public function testWriterFailurePropagatesWithoutTranslationOrRetry(string $type): void
    {
        $failure = new RuntimeException('owner-bound writer unavailable');
        $writer = new RecordingProjectionWriter($failure);
        try {
            (new ExampleProjectionBuilder())->apply($this->definition(), $this->event($type), $writer);
            self::fail('Writer failure must reach the caller.');
        } catch (RuntimeException $observed) {
            self::assertSame($failure, $observed);
            self::assertSame(1, $writer->attempts);
            self::assertSame([], $writer->operations);
        }
    }

    private function event(
        string $type = 'acme.record.changed',
        int $schema = 2,
        int $sequence = PHP_INT_MAX,
        string $id = 'event-0007',
    ): ProjectionEvent {
        return new ImmutableProjectionEvent(
            $sequence,
            $id,
            $type,
            $schema,
            new DateTimeImmutable('2026-09-08T14:25:36.123456+02:00'),
            ['record' => 'row-001', 'shard' => 0, 'active' => false,
                'amount' => '9007199254740993.0001', 'memo' => null],
            str_repeat('a', 64),
        );
    }

    private function definition(): ProjectionDefinition
    {
        $fields = [];
        foreach (
            [
            'record' => ReportValueType::Identifier,
            'shard' => ReportValueType::Integer,
            'active' => ReportValueType::Boolean,
            'amount' => ReportValueType::Decimal,
            'memo' => ReportValueType::String,
            'sequence' => ReportValueType::Integer,
            'event_id' => ReportValueType::String,
            'checksum' => ReportValueType::String,
            'occurred_at' => ReportValueType::DateTime,
            ] as $name => $type
        ) {
            $fields[] = new ProjectionFieldDefinition($name, $type, $name === 'memo');
        }
        return new ProjectionDefinition(
            'acme.totals',
            1,
            'builder-1',
            EventSensitivity::INTERNAL,
            [new ProjectionSourceDefinition('acme.record.changed', [2]),
                new ProjectionSourceDefinition('acme.record.removed', [2])],
            $fields,
            ['record', 'shard', 'active'],
        );
    }
}

/** Test-only consumer event: payload fixtures intentionally contain arrays and scalars only. */
final readonly class ImmutableProjectionEvent implements ProjectionEvent
{
    public function __construct(
        private int $eventSequence,
        private string $eventId,
        private string $eventType,
        private int $eventSchemaVersion,
        private DateTimeImmutable $instant,
        private array $eventPayload,
        private string $eventChecksum,
    ) {
    }

    public function sequence(): int
    {
        return $this->eventSequence;
    }

    public function id(): string
    {
        return $this->eventId;
    }

    public function type(): string
    {
        return $this->eventType;
    }

    public function schemaVersion(): int
    {
        return $this->eventSchemaVersion;
    }

    public function occurredAt(): DateTimeImmutable
    {
        return $this->instant;
    }

    public function payload(): array
    {
        return $this->eventPayload;
    }

    public function checksum(): string
    {
        return $this->eventChecksum;
    }
}

/** Recording adapter proves the port accepts typed rows; it supplies no database semantics. */
final class RecordingProjectionWriter implements ProjectionWriter
{
    public array $operations = [];
    public int $attempts = 0;

    public function __construct(private readonly ?RuntimeException $failure = null)
    {
    }

    public function put(array $key, array $values): void
    {
        $this->beforeWrite();
        $this->operations[] = ['put', $key, $values];
    }

    public function remove(array $key): void
    {
        $this->beforeWrite();
        $this->operations[] = ['remove', $key];
    }

    private function beforeWrite(): void
    {
        ++$this->attempts;
        if ($this->failure !== null) {
            throw $this->failure;
        }
    }
}

/** Illustrative deterministic consumer policy, not an exported runtime or admission service. */
final class ExampleProjectionBuilder implements ProjectionBuilder
{
    public function apply(ProjectionDefinition $definition, ProjectionEvent $event, ProjectionWriter $writer): void
    {
        if (!$definition->accepts($event->type(), $event->schemaVersion())) {
            return;
        }
        $payload = $event->payload();
        $key = [];
        foreach ($definition->keyFields as $field) {
            $key[$field] = $payload[$field];
        }
        if ($event->type() === 'acme.record.removed') {
            $writer->remove($key);
            return;
        }
        $writer->put($key, [
            'amount' => $payload['amount'],
            'memo' => $payload['memo'],
            'sequence' => $event->sequence(),
            'event_id' => $event->id(),
            'checksum' => $event->checksum(),
            'occurred_at' => $event->occurredAt()->format('Y-m-d\TH:i:s.uP'),
        ]);
    }
}
