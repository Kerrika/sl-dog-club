<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Service;

use SunlightExtend\DogClub\Model\Dto\AnimalDto;
use SunlightExtend\DogClub\Repository\AnimalRepository;
use SunlightExtend\DogClub\Repository\BreederRepository;
use SunlightExtend\DogClub\Repository\BreedRepository;
use SunlightExtend\DogClub\Repository\LitterRepository;
use SunlightExtend\DogClub\Repository\OwnerRepository;
use SunlightExtend\DogClub\Trait\SingletonTrait;

readonly class AnimalService
{
    use SingletonTrait;

    private AnimalRepository $animalRepository;
    private BreedRepository $breedRepository;
    private OwnerRepository $ownerRepository;
    private BreederRepository $breederRepository;
    private LitterRepository $litterRepository;

    private FieldValueService $fieldService;
    private TrialResultService $trialResultService;
    private PedigreeService $pedigreeService;

    private function __construct()
    {
        $this->animalRepository = AnimalRepository::getInstance();
        $this->breedRepository = BreedRepository::getInstance();
        $this->ownerRepository = OwnerRepository::getInstance();
        $this->breederRepository = BreederRepository::getInstance();
        $this->litterRepository = LitterRepository::getInstance();

        $this->fieldService = FieldValueService::getInstance();
        $this->trialResultService = TrialResultService::getInstance();
        $this->pedigreeService = PedigreeService::getInstance();
    }
    
    /** @return AnimalDto[] */
    function getAnimal(int $id, $generationCount = 4): ?AnimalDto
    {
        $pedigree = array();

        $animal = $this->animalRepository->getById($id);

        if (!$animal)
        {
            return null;
        }

        $breed = $this->breedRepository->getById($animal->breedId);

        $sire = $this->animalRepository->getById($animal->sireId);
        $dam = $this->animalRepository->getById($animal->damId);
        
        $owner = $this->ownerRepository->getById($animal->ownerId);
        $breeder = $this->ownerRepository->getById($animal->breederId);

        $litter = $this->litterRepository->getById($animal->litterId);
        $litters = $this->litterRepository->getByAnimalId($animal->sex, $id);

        $fieldValues = $this->fieldService->getFieldValues($id);
        $trialResults = $this->trialResultService->getTrialResults($id);

        $pedigree = $this->pedigreeService->getPedigree($id, $generationCount);

        $dto = new AnimalDto($animal, $breed, $sire, $dam, $owner, $breeder, $litter, $litters, $fieldValues, $trialResults, $pedigree);

        return $dto;
    }
}