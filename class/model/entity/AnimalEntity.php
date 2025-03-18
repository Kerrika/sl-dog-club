<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Entity;

use DateTime;
use SunlightExtend\DogClub\Model\Enum\Sex;

readonly class AnimalEntity implements IEntity
{
    function __construct(
        public int $id,
        public string $name,
        public Sex $sex,
        public string $registrationNumber,
        public ?int $sireId,
        public ?int $damId,
        public DateTime $dateOfBirth,
        public int $breedId,
        public ?int $litterId,
    )
    {
    }

    static function getPropertyNames(): string
    {
        return 'id, name, sex, registrationNumber, sireId, damId, dateOfBirth, breedId, litterId';
    }

    function toArray() : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sex' => $this->sex->value,
            'registrationNumber' => $this->registrationNumber,
            'sireId' => $this->sireId,
            'damId' => $this->damId,
            'dateOfBirth' => $this->dateOfBirth,
            'breedId' => $this->breedId,
            'litterId' => $this->litterId
        ];
    }
}
