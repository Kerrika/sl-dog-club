<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Dto;

use SunlightExtend\DogClub\Model\Entity\Field\FieldCategoryEntity;
use SunlightExtend\DogClub\Model\Entity\Field\FieldEntity;
use SunlightExtend\DogClub\Model\Entity\Field\FieldValueEntity;

readonly class FieldValueDto
{
    function __construct(
        public FieldEntity $field,
        public FieldCategoryEntity $fieldCategory,
        public FieldValueEntity $fieldValue
    )
    {}
}
