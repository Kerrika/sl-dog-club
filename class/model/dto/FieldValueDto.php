<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Dto;

use SunlightExtend\DogClub\Model\Entity\Field\FieldValueEntity;

readonly class FieldValueDto
{
    function __construct(
        public FieldValueEntity $fieldValue,
        public FieldDto $field
    )
    {}
}
