<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Model\Dto;

use SunlightExtend\DogClub\Model\Entity\AnimalEntity;
use SunlightExtend\DogClub\Model\Entity\BreedEntity;
use SunlightExtend\DogClub\Model\Entity\BreederEntity;
use SunlightExtend\DogClub\Model\Entity\LitterEntity;
use SunlightExtend\DogClub\Model\Entity\OwnerEntity;

readonly class AnimalDto
{
    function __construct(
        public AnimalEntity $animal,
        public BreedEntity $breed,
        public ?AnimalEntity $sire,
        public ?AnimalEntity $dam,
        public OwnerEntity $owner,
        public ?BreederEntity $breeder,
        public ?LitterEntity $litter,
        /** @var LitterEntity[] */
        public array $litters,
        /** @var FieldValueDto[] */
        public array $fieldValues,
        /** @var TrialResultDto[] */
        public array $trialResults,
        /** @var array<int, array<int, AnimalEntity>> */
        public array $pedigree
    )
    {}
}
