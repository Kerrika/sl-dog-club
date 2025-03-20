<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Service;

use SunlightExtend\DogClub\Model\Dto\LitterDto;
use SunlightExtend\DogClub\Repository\AnimalRepository;
use SunlightExtend\DogClub\Repository\BreederRepository;
use SunlightExtend\DogClub\Repository\BreedRepository;
use SunlightExtend\DogClub\Repository\LitterRepository;
use SunlightExtend\DogClub\Repository\OwnerRepository;
use SunlightExtend\DogClub\Trait\SingletonTrait;

readonly class LitterService
{
    use SingletonTrait;

    private AnimalRepository $animalRepository;
    private BreedRepository $breedRepository;
    private OwnerRepository $ownerRepository;
    private BreederRepository $breederRepository;
    private LitterRepository $litterRepository;

    private PedigreeService $pedigreeService;

    private function __construct()
    {
        $this->animalRepository = AnimalRepository::getInstance();
        $this->breedRepository = BreedRepository::getInstance();
        $this->breederRepository = BreederRepository::getInstance();
        $this->litterRepository = LitterRepository::getInstance();

        $this->pedigreeService = PedigreeService::getInstance();
    }
    
    function getLitter(int $id, $generationCount = 4): ?LitterDto
    {
        $litter = $this->litterRepository->getById($id);

        if ($litter === null)
        {
            return null;
        }

        $breed = $this->breedRepository->getById($litter->breedId);
        $breeder = $this->breederRepository->getById($litter->breederId);

        $sire = $this->animalRepository->getById($litter->sireId);
        $dam = $this->animalRepository->getById($litter->damId);
        
        $progeny = $this->animalRepository->getByLitterId($id);

        $pedigree = $this->pedigreeService->getPedigreeForLitter($litter->sireId, $litter->damId, $generationCount);

        $dto = new LitterDto($litter, $breed, $breeder, $sire, $dam, $progeny, $pedigree);

        return $dto;
    }
}