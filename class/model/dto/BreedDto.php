<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Dto;

use SunlightExtend\DogClub\Model\Entity\BreedEntity;

readonly class BreedDto
{
    function __construct(
        public BreedEntity $breed,
        /** @var BreederEntity[] */
        public array $breeders,
        /** @var LitterEntity[] */
        public array $litters,
        /** @var AnimalEntity[] */
        public array $approvedAnimals
    )
    {}
}
