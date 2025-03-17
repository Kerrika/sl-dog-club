<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model;

readonly class TrialTypeDto
{
    function __construct(
        public int $id,
        public string $name,
        public string $nameLocal,
        public string $description,
        public string $descriptionLocal,
        public string $pointTable,
        public string $pointTableLocal
    )
    {
    }
}
