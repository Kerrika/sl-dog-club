<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model;

readonly class OwnerDto
{
    function __construct(
        public int $id,
        public string $name,
        public string $address,
        public string $emailAddress,
        public string $phone
    )
    {        
    }
}
