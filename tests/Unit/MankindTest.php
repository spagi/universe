<?php


namespace Unit;


final class MankindTest extends \PHPUnit\Framework\TestCase
{
    public function test_percentCount()
    {
        $mankind = new \spagi\universe\Mankind();
        $importService = new \spagi\universe\PersonImportService($mankind);
        $url = __DIR__ . DIRECTORY_SEPARATOR . 'Resources/data.csv';
        $result = $importService->import($url);

        static::assertSame(50.0, $mankind->getMenCountInPercent());
    }

    public function test_findPerson()
    {
        $mankind = new \spagi\universe\Mankind();
        $importService = new \spagi\universe\PersonImportService($mankind);
        $url = __DIR__ . DIRECTORY_SEPARATOR . 'Resources/data.csv';
        $result = $importService->import($url);

        static::assertArrayHasKey(3454, $mankind);
    }
}