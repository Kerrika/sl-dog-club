<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model;

readonly class BreedDto
{
    function __construct(
        public int $id,
        public string $name,
        public string $nameLocal        
    )
    {        
    }
}
