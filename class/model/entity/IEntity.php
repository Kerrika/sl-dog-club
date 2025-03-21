<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Entity;

interface IEntity
{
    static function getPropertyNames(): string;

    function toArray() : array;
}
