<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Field;

use SunlightExtend\DogClub\Model\AnimalDto;

readonly class FieldValueDto
{
    function __construct(
        public FieldDto $field,
        public AnimalDto $animal,
        public string $value,
        public string $valueLocal
    )
    {
    }
}
