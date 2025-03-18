<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Entity;

use SunlightExtend\DogClub\Model\Entity\IEntity;

readonly class OwnerEntity implements IEntity
{
    function __construct(
        public int $id,
        public string $name,
        public string $address,
        public string $emailAddress,
        public string $phoneNumber
    )
    {        
    }

    static function getPropertyNames(): string
    {
        return "id, name, address, emailAddress, phoneNumber";
    }

    public function toArray() : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'emailAddress' => $this->emailAddress,
            'phoneNumber' => $this->phoneNumber
        ];
    }
}
