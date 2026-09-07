<?php

declare(strict_types=1);

namespace Kumwe\Reporting\Tests;

use PHPUnit\Framework\TestCase;

final class ValueImmutabilityTest extends TestCase
{
    public function testReportDefaultsAndColumnsCannotChangeAfterAdmission(): void
    {
        $value = 'approved';
        $parameter = new \Kumwe\Reporting\Domain\ReportParameterDefinition(
            'status',
            \Kumwe\Reporting\Domain\ReportValueType::String,
            multiple: true,
            defaultValue: [&$value]
        );
        $column = new \Kumwe\Reporting\Domain\ReportColumnDefinition(
            'status',
            'Status',
            'status',
            \Kumwe\Reporting\Domain\ReportValueType::String
        );
        $report = new \Kumwe\Reporting\Domain\ReportDefinition(
            'acme.report',
            1,
            'Report',
            'acme.order',
            'business.report',
            [$parameter],
            [],
            [&$column]
        );
        $checksum = $report->checksum();
        $value = 'changed';
        $column = new \Kumwe\Reporting\Domain\ReportColumnDefinition(
            'secret',
            'Secret',
            'secret',
            \Kumwe\Reporting\Domain\ReportValueType::String
        );
        self::assertSame(['approved'], $parameter->defaultValue);
        self::assertSame($checksum, $report->checksum());
    }
}
