<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Dto;

use SunlightExtend\DogClub\Model\Entity\TrialResultEntity;
use SunlightExtend\DogClub\Model\Entity\TrialTypeEntity;

readonly class TrialResultDto
{
    function __construct(
        public TrialResultEntity $trialResult,
        public TrialTypeEntity $trialType
    )
    {}
}
