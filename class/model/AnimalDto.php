<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model;

use DateTime;
use SunlightExtend\DogClub\Model\Entity\AnimalEntity;
use SunlightExtend\DogClub\Model\Entity\LitterEntity;

readonly class AnimalDto
{
    function __construct(
        public AnimalEntity $animal,
        public ?AnimalEntity $sire,
        public ?AnimalEntity $dam,
        public ?LitterEntity $litter,
        /** @var array<int, array<int, AnimalEntity>> */
        public array $pedigree
    )
    {}
}
