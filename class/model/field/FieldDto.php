<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Field;

readonly class FieldDto
{
    function __construct(
        public int $id,
        public string $name,
        public string $nameLocal,
        public FieldCategoryDto $category,
        public FieldType $type
    )
    {
    }
}
