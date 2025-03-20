<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Dto;

use SunlightExtend\DogClub\Model\Entity\BreederEntity;
use SunlightExtend\DogClub\Model\Entity\OwnerEntity;

readonly class OwnerDto
{
    function __construct(
        public OwnerEntity $owner,
        public BreederEntity $breeder,
        /** @var AnimalEntity[] */
        public array $approvedAnimals,
        /** @var BreedEntity[] */
        public array $breeds
    )
    {}
}
