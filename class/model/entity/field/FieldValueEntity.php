<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Entity\Field;

use SunlightExtend\DogClub\Model\Entity\IEntity;

readonly class FieldValueEntity implements IEntity
{
    function __construct(
        public int $fieldId,
        public int $animalId,
        public string $value,
        public string $valueLocal
    )
    {
    }

    static function getPropertyNames(): string
    {
        return "fieldId, animalId, value, valueLocal";
    }

    public function toArray() : array
    {
        return [
            'fieldId' => $this->fieldId,
            'animalId' => $this->animalId,
            'value' => $this->value,
            'valueLocal' => $this->valueLocal
        ];
    }
}
