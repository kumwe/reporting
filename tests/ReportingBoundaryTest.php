<?php

declare(strict_types=1);

namespace Kumwe\Reporting\Tests;

use InvalidArgumentException;
use Kumwe\BusinessDefinition\Domain\Expression;
use Kumwe\Integration\EventSensitivity;
use Kumwe\Reporting\Domain\{ProjectionDefinition,ProjectionFieldDefinition,ProjectionSourceDefinition,ReportAggregateDefinition,ReportAggregateFunction,ReportColumnDefinition,ReportDefinition,ReportFormulaDefinition,ReportParameterDefinition,ReportValueType};
use PHPUnit\Framework\TestCase;

final class ReportingBoundaryTest extends TestCase
{
    private function projection(): ProjectionDefinition
    {
        return new ProjectionDefinition('acme.totals', 1, 'builder-1', EventSensitivity::INTERNAL, [new ProjectionSourceDefinition('acme.record.changed', [1,2])], [new ProjectionFieldDefinition('record', ReportValueType::Identifier),new ProjectionFieldDefinition('amount', ReportValueType::Decimal, true)], ['record']);
    }
    public function testProjectionRoundTripBindsBuilderSourcesAndSensitivity(): void
    {
        $projection = $this->projection();
        $rebuilt = ProjectionDefinition::fromArray($projection->toArray());
        self::assertSame($projection->toArray(), $rebuilt->toArray());
        self::assertSame($projection->checksum(), $rebuilt->checksum());
        self::assertSame('internal', $rebuilt->toArray()['sensitivity_ceiling']);
    }
    public function testProjectionRejectsUnknownDocumentKeys(): void
    {
        $document = $this->projection()->toArray();
        $document['sql'] = 'SELECT secret';
        $this->expectException(InvalidArgumentException::class);
        ProjectionDefinition::fromArray($document);
    }
    public function testProjectionKeyMustReferToDeclaredField(): void
    {
        $document = $this->projection()->toArray();
        $document['key_fields'] = ['secret'];
        $this->expectException(InvalidArgumentException::class);
        ProjectionDefinition::fromArray($document);
    }
    public function testProjectionRefusesUnsortedSourceVersions(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new ProjectionSourceDefinition('acme.record.changed', [2,1]);
    }
    public function testProjectionSourceRejectsUnknownRuntimeType(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new ProjectionDefinition('acme.report', 1, 'v1', EventSensitivity::INTERNAL, [new \stdClass()], [new ProjectionFieldDefinition('id', ReportValueType::Identifier)], ['id']);
    }
    public function testRequiredParametersDoNotAcceptDefaults(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new ReportParameterDefinition('amount', ReportValueType::Decimal, true, false, '1.00');
    }
    public function testParametersRetainExactDecimalStringsAndRejectFloats(): void
    {
        $parameter = new ReportParameterDefinition('amounts', ReportValueType::Decimal, false, true);
        self::assertSame(['999999999999999999999.0001'], $parameter->assertValue(['999999999999999999999.0001']));
        $this->expectException(InvalidArgumentException::class);
        $parameter->assertValue([1.5]);
    }
    public function testParameterListCannotExceedOneHundredValues(): void
    {
        $parameter = new ReportParameterDefinition('items', ReportValueType::Integer, false, true);
        self::assertCount(100, $parameter->assertValue(array_fill(0, 100, 1)));
        $this->expectException(InvalidArgumentException::class);
        $parameter->assertValue(array_fill(0, 101, 1));
    }
    public function testNumericAggregateRejectsTextColumn(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new ReportDefinition('acme.report', 1, 'Report', 'acme.record', 'acme.report.read', [], [], [new ReportColumnDefinition('name', 'Name', 'name', ReportValueType::String)], [], [new ReportAggregateDefinition('total', ReportAggregateFunction::Sum, 'name')]);
    }
    public function testFormulaCannotRequestAnUndisclosedField(): void
    {
        $expression = Expression::fromArray(['op' => 'field','type' => 'decimal','field' => 'secret']);
        $this->expectException(InvalidArgumentException::class);
        new ReportDefinition('acme.report', 1, 'Report', 'acme.record', 'acme.report.read', [], [], [new ReportColumnDefinition('amount', 'Amount', 'amount', ReportValueType::Decimal)], [], [], [new ReportFormulaDefinition('total', 'Total', ReportValueType::Decimal, $expression)]);
    }
    public function testFrozenNativePlansPreserveEveryCanonicalField(): void
    {
        $corpus = json_decode(file_get_contents(dirname(__DIR__) . '/resources/conformance/report-materialization-v1.json'), true, 512, JSON_THROW_ON_ERROR);
        foreach ($corpus['fixtures'] as $fixture) {
            $report = ReportDefinition::fromArray($fixture['plan']);
            self::assertSame($fixture['plan'], $report->toArray(), $fixture['id']);
        }
    }
}
