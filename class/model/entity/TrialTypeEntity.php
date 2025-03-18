<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Entity;

readonly class TrialTypeEntity implements IEntity
{
    function __construct(
        public int $id,
        public string $name,
        public string $nameLocal,
        public string $description,
        public string $descriptionLocal,
        public string $pointTable,
        public string $pointTableLocal
    )
    {
    }

    static function getPropertyNames(): string
    {
        return "id, name, nameLocal, description, descriptionLocal, points, titles";
    }

    public function toArray() : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'nameLocal' => $this->nameLocal,
            'description' => $this->description,
            'descriptionLocal' => $this->descriptionLocal,
            'pointTable' => $this->pointTable,
            'pointTableLocal' => $this->pointTableLocal
        ];
    }
}
