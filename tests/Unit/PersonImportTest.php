<?php declare(strict_types=1);


use spagi\universe\Mankind;

final class PersonImportTest extends \PHPUnit\Framework\TestCase
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

    public function test_import()
    {
        $mankind = Mankind::getInstance();
        $importService = new \spagi\universe\PersonImportService($mankind);
        $url = __DIR__ . DIRECTORY_SEPARATOR . 'Resources/data.csv';
        $result = $importService->import($url);

        static::assertSame(4, count($result));
    }

}