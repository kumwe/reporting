<?php

declare(strict_types=1);

require $argv[1] ?? dirname(__DIR__) . '/vendor/autoload.php';
$parameter = new \Kumwe\Reporting\Domain\ReportParameterDefinition(
    'amount',
    \Kumwe\Reporting\Domain\ReportValueType::Decimal
);
if ($parameter->assertValue('100000000000000000000.01') !== '100000000000000000000.01') {
    throw new RuntimeException('Exact report parameter changed.');
}
echo 'Package consumer behavior passed.' . PHP_EOL;
