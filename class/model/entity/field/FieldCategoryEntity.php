<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Entity\Field;

use SunlightExtend\DogClub\Model\Entity\IEntity;
use SunlightExtend\DogClub\Model\Enum\FieldCategoryType;

readonly class FieldCategoryEntity implements IEntity
{
    function __construct(
        public int $id,
        public FieldCategoryType $type,
        public string $name,
        public string $nameLocal,
        public int $column,
        public int $order,
        public bool $isInternal,
    )
    {        
    }

    static function getPropertyNames(): string
    {
        return "id, type, name, nameLocal, column, order, isInternal";
    }

    public function toArray() : array
    {
        return [
            'id' => $this->id,
            'type' => $this->type->value,
            'name' => $this->name,
            'nameLocal' => $this->nameLocal,
            'column' => $this->column,
            'order' => $this->order,
            'isInternal' => $this->isInternal
        ];
    }
}
