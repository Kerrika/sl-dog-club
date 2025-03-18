<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Entity\Field;

use SunlightExtend\DogClub\Model\Entity\IEntity;
use SunlightExtend\DogClub\Model\Enum\FieldType;

readonly class FieldEntity implements IEntity
{
    function __construct(
        public int $id,
        public string $name,
        public string $nameLocal,
        public int $categoryId,
        public FieldType $type
    )
    {
    }

    static function getPropertyNames(): string
    {
        return "id, name, nameLocal, categoryId, type";
    }

    public function toArray() : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'nameLocal' => $this->nameLocal,
            'categoryId' => $this->categoryId,
            'type' => $this->type->value
        ];
    }
}
