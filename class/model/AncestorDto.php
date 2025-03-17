<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model;

readonly class AncestorDto
{
    function __construct(
        public int $id,
        public string $name,
        public string $registrationNumber,
        public int $sireId,
        public int $damId,
    )
    {
    }

    static function fromTableRow(array $tableRow): self
    {
        return new AncestorDto($tableRow['id'], $tableRow['name'], $tableRow['registrationNumber'], $tableRow['sireId'], $tableRow['damId']);
    }
}
