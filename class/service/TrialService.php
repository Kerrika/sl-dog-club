<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Service;

use SunlightExtend\DogClub\Model\Dto\TrialResultDto;
use SunlightExtend\DogClub\Repository\TrialResultRepository;
use SunlightExtend\DogClub\Repository\TrialTypeRepository;
use SunlightExtend\DogClub\Trait\SingletonTrait;

readonly class TrialService
{
    use SingletonTrait;

    private TrialResultRepository $trialResultRepository;
    private TrialTypeRepository $trialTypeRepository;

    private function __construct()
    {
        $this->trialResultRepository = TrialResultRepository::getInstance();
        $this->trialTypeRepository = TrialTypeRepository::getInstance();
    }

    /** @return TrialTypeEntity[] */
    function getTrialTypes(): array
    {
        return $this->trialTypeRepository->getAll();
    }
    
    /** @return TrialResultDto[] */
    function getTrialResults(int $animalId): array
    {
        $trialResults = $this->trialResultRepository->getByAnimalId($animalId);
        $trialTypeIds = array_unique(array_column($trialResults, 'trialTypeId'));

        $trialTypes = $this->trialTypeRepository->getByIds($trialTypeIds);

        $list =[];

        foreach ($trialResults as $trialResult)
        {
            $trialType = array_filter($trialTypes, fn($value) => $value->id === $trialResult->trialTypeId)[0];

            $list[] = new TrialResultDto($trialResult, $trialType);
        }

        return $list;
    }
}