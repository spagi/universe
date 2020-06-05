<?php declare(strict_types=1);


final class PersonImportTest extends \PHPUnit\Framework\TestCase
{
    public function test_import()
    {
        $mankind = new \spagi\universe\Mankind();
        $importService = new \spagi\universe\PersonImportService($mankind);
        $url = __DIR__ . DIRECTORY_SEPARATOR . 'Resources/data.csv';
        $result = $importService->import($url);

        static::assertSame(4, count($result));
    }

}