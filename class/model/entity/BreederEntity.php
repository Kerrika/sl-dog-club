<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Entity;

readonly class BreederEntity implements IEntity
{
    function __construct(
        public int $id,
        public string $name,

    )
    {        
    }

    static function getPropertyNames(): string
    {
        return "id, name";
    }

    public function toArray() : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
