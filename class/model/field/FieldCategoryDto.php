<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Field;

readonly class FieldCategoryDto
{
    function __construct(
        public int $id,
        public string $name,
        public string $nameLocal,
        public int $column,
        public int $order
    )
    {        
    }
}
