<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Entity\Field;

use SunlightExtend\DogClub\Model\Entity\IEntity;

readonly class FieldCategoryEntity implements IEntity
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

    static function getPropertyNames(): string
    {
        return "id, name, nameLocal, column, order";
    }

    public function toArray() : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'nameLocal' => $this->nameLocal,
            'column' => $this->column,
            'order' => $this->order
        ];
    }
}
