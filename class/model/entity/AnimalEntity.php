<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Entity;

use DateTime;
use SunlightExtend\DogClub\Model\Enum\AnimalStatus;
use SunlightExtend\DogClub\Model\Enum\Sex;

readonly class AnimalEntity implements IEntity
{
    function __construct(
        public int $id,
        public string $name,
        public Sex $sex,
        public string $registrationNumber,
        public AnimalStatus $status,
        public ?int $sireId,
        public ?int $damId,
        public DateTime $dateOfBirth,
        public int $breedId,
        public int $ownerId,
        public int $breederId,
        public ?int $litterId,
    )
    {
    }

    static function getPropertyNames(): string
    {
        return 'id, name, sex, registrationNumber, status, sireId, damId, dateOfBirth, breedId, ownerId, breederId, litterId';
    }

    function toArray() : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sex' => $this->sex->value,
            'registrationNumber' => $this->registrationNumber,
            'status' => $this->status->value,
            'sireId' => $this->sireId,
            'damId' => $this->damId,
            'dateOfBirth' => $this->dateOfBirth,
            'breedId' => $this->breedId,
            'ownerId' => $this->ownerId,
            'breederId' => $this->breederId,
            'litterId' => $this->litterId
        ];
    }
}
