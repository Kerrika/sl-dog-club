<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Dto;

use SunlightExtend\DogClub\Model\Entity\Field\FieldCategoryEntity;
use SunlightExtend\DogClub\Model\Entity\Field\FieldEntity;

readonly class FieldDto
{
    function __construct(
        public FieldEntity $field,
        public FieldCategoryEntity $fieldCategory
    )
    {}
}
