<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Entity;

use DateTime;

readonly class LitterEntity implements IEntity
{
    function __construct(
        public int $id,
        public string $name,
        public DateTime $dateOfBirth,
        public ?int $sireId,
        public ?int $damId,
        public int $breedId,
        public int $breederId
    )
    {
    }

    static function getPropertyNames(): string
    {
        return "id, name, dateOfBirth, sireId, damId, breedId, breederId";
    }

    public function toArray() : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'dateOfBirth' => $this->dateOfBirth,
            'sireId' => $this->sireId,
            'damId' => $this->damId,
            'breedId' => $this->breedId,
            'breederId' => $this->breederId
        ];
    }
}
