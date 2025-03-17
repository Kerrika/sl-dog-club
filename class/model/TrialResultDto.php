<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model;

readonly class TrialResultDto
{
    function __construct(
        public int $id,
        public TrialTypeDto $trialType,
        public AnimalDto $animal,
        public string $prize,
        public int $count,
        public int $points,
        public string $titles
    )
    {
    }
}
