<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Trait;

trait SingletonTrait
{
    private function __construct() {}

    static function getInstance(): self
    {
        static $instance;

        return $instance ??= new self();
    }
}
