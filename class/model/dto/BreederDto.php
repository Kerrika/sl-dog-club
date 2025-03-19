<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Dto;

use SunlightExtend\DogClub\Model\Entity\BreederEntity;

readonly class BreederDto
{
    function __construct(
        public BreederEntity $breeder,
        /** @var LitterEntity[] */
        public array $litters,
        /** @var BreedEntity[] */
        public array $breeds
    )
    {}
}
