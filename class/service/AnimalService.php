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

    private FieldService $fieldService;
    private TrialService $trialService;
    private PedigreeService $pedigreeService;

    private function __construct()
    {
        $this->animalRepository = AnimalRepository::getInstance();
        $this->breedRepository = BreedRepository::getInstance();
        $this->ownerRepository = OwnerRepository::getInstance();
        $this->breederRepository = BreederRepository::getInstance();
        $this->litterRepository = LitterRepository::getInstance();

        $this->fieldService = FieldService::getInstance();
        $this->trialService = TrialService::getInstance();
        $this->pedigreeService = PedigreeService::getInstance();
    }
    
    function getAnimal(int $id, $generationCount = 4): ?AnimalDto
    {
        $animal = $this->animalRepository->getById($id);

        if ($animal === null)
        {
            return null;
        }

        $breed = $this->breedRepository->getById($animal->breedId);

        $sire = $this->animalRepository->getById($animal->sireId);
        $dam = $this->animalRepository->getById($animal->damId);
        
        $owner = $this->ownerRepository->getById($animal->ownerId);
        $breeder = $this->breederRepository->getById($animal->breederId);

        $litter = $this->litterRepository->getById($animal->litterId);
        $litters = $this->litterRepository->getByAnimalId($animal->sex, $id);

        $fieldValues = $this->fieldService->getFieldValues($id);
        $trialResults = $this->trialService->getTrialResults($id);

        $pedigree = $this->pedigreeService->getPedigreeForAnimal($id, $generationCount);

        $dto = new AnimalDto($animal, $breed, $sire, $dam, $owner, $breeder, $litter, $litters, $fieldValues, $trialResults, $pedigree);

        return $dto;
    }
}