<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Dto;

readonly class BreedDto
{
    function __construct(
        /** @var BreederEntity[] */
        public array $breeders,
        /** @var LitterEntity[] */
        public array $litters,
        /** @var AnimalEntity[] */
        public array $approvedAnimals
    )
    {}
}
