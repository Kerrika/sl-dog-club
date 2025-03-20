<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Dto;

use SunlightExtend\DogClub\Model\Entity\AnimalEntity;
use SunlightExtend\DogClub\Model\Entity\BreedEntity;
use SunlightExtend\DogClub\Model\Entity\BreederEntity;
use SunlightExtend\DogClub\Model\Entity\LitterEntity;

readonly class LitterDto
{
    function __construct(
        public LitterEntity $litter,
        public BreedEntity $breed,
        public BreederEntity $breeder,
        public AnimalEntity $sire,
        public AnimalEntity $dam,
        /** @var AnimalEntity[] */
        public array $progeny,
        public array $pedigree
    )
    {}
}
