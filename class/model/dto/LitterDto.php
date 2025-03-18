<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Dto;

use SunlightExtend\DogClub\Model\Entity\AnimalEntity;
use SunlightExtend\DogClub\Model\Entity\BreederEntity;

readonly class LitterDto
{
    function __construct(
        public BreederEntity $breeder,
        public AnimalEntity $sire,
        public AnimalEntity $dam,
        /** @var AnimalEntity[] */
        public array $progeny,
        public array $pedigree
    )
    {}
}
