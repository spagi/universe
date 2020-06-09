<?php declare(strict_types=1);

namespace spagi\universe;

use League\Csv\Reader;
use spagi\universe\enums\AllowedImportType;
use spagi\universe\exceptions\InvalidImportData;
use DateTimeImmutable;

class PersonImportService
{

    public function __construct()
    {
    }

    public function import(string $url): Mankind
    {
        $mankind = Mankind::getInstance();

        $folks = $this->getFolksForImport($url);

        foreach ($folks as $person) {
            $mankind->addPerson($person);
        }

        return $mankind;
    }

    private function getFolksForImport(string $url): array
    {

        if (!AllowedImportType::isValidValue(pathinfo($url, PATHINFO_EXTENSION))) {
            throw new InvalidImportData();
        }

        $csv = Reader::createFromPath($url, 'r');
        $csv->setHeaderOffset(null);
        $csv->setDelimiter(';');

        $return = [];

        foreach ($csv->getRecords() as $row) {
            $date = new DateTimeImmutable($row[4]);
            $return[] = new Person((int)$row[0], $row[1], $row[2], $row[3], $date);
        }

        return $return;
    }

}