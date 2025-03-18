<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Entity;

use SunlightExtend\DogClub\Model\Entity\IEntity;

readonly class TrialResultEntity implements IEntity
{
    function __construct(
        public int $id,
        public int $trialTypeId,
        public int $animalId,
        public string $prize,
        public int $count,
        public int $points,
        public string $titles
    )
    {
    }

    static function getPropertyNames(): string
    {
        return "id, trialTypeId, animalId, prize, count, points, titles";
    }

    public function toArray() : array
    {
        return [
            'id' => $this->id,
            'trialTypeId' => $this->trialTypeId,
            'animalId' => $this->animalId,
            'prize' => $this->prize,
            'count' => $this->count,
            'points' => $this->points,
            'titles' => $this->titles
        ];
    }
}
