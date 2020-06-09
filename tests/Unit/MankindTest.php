<?php


namespace Unit;


use spagi\universe\Mankind;

final class MankindTest extends \PHPUnit\Framework\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $mankind = Mankind::getInstance();
        $reflection = new \ReflectionClass($mankind);
        $instance = $reflection->getProperty('instance');
        $instance->setAccessible(true); // now we can modify that :)
        $instance->setValue(null, null); // instance is gone
        $instance->setAccessible(false); // clean up
    }

    public function test_percentCount()
    {
        $mankind = Mankind::getInstance();
        $importService = new \spagi\universe\PersonImportService();
        $url = __DIR__ . DIRECTORY_SEPARATOR . 'Resources/data.csv';
        $result = $importService->import($url);

        static::assertSame(50.0, $mankind->getMenCountInPercent());
    }

    public function test_findPerson()
    {
        $mankind = Mankind::getInstance();
        $importService = new \spagi\universe\PersonImportService($mankind);
        $url = __DIR__ . DIRECTORY_SEPARATOR . 'Resources/data.csv';
        $result = $importService->import($url);

        static::assertArrayHasKey(3454, $mankind);

    }
}