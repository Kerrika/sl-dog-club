<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Entity;

use SunlightExtend\DogClub\Model\Entity\IEntity;

readonly class BreedEntity implements IEntity
{
    function __construct(
        public int $id,
        public string $name,
        public string $nameLocal        
    )
    {        
    }

    static function getPropertyNames(): string
    {
        return "id, name, nameLocal";
    }

    public function toArray() : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'nameLocal' => $this->nameLocal
        ];
    }
}
