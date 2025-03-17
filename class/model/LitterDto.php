<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model;

use DateTime;

readonly class LitterDto
{
    function __construct(
        public int $id,
        public string $name,
        public DateTime $dateOfBirth,
        public AncestorDto $sire,
        public AncestorDto $dam,
        public BreedDto $breed,
        public BreederDto $breeder
    )
    {        
    }
}
