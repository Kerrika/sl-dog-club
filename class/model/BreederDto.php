<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model;

readonly class BreederDto
{
    function __construct(
        public int $id,
        public string $name,

    )
    {        
    }
}
