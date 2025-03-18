<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Enum;

enum AnimalStatus : int
{
    case External = 0;
    case Internal = 1;
    case Approved = 2;
    case Obsolete = 3;
}
