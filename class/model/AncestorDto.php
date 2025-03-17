<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model;

readonly class AncestorDto
{
    function __construct(
        public int $id,
        public BreedDto $breed,
        public ?AnimalDto $animal,
        public Sex $sex,
        public string $name,
        public string $registrationNumber,
        public AncestorDto $sire,
        public AncestorDto $dam,
        public LitterDto $litter
    )
    {        
    }
}
