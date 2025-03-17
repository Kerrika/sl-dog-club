<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model;

use DateTime;

readonly class AnimalDto
{
    function __construct(
        public int $id,
        public DateTime $dateOfBirth,
        public Sex $sex,
        public BreedDto $breed,
        public string $name,
        public string $registrationNumber,
        public AncestorDto $sire,
        public AncestorDto $dam,
        /** @var array<int, array<int, AncestorDto>> */
        public array $pedigree
    )
    {
    }
}
