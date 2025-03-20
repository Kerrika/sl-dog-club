<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Service;

use SunlightExtend\DogClub\Model\Dto\OwnerDto;
use SunlightExtend\DogClub\Repository\AnimalRepository;
use SunlightExtend\DogClub\Repository\BreederRepository;
use SunlightExtend\DogClub\Repository\BreedRepository;
use SunlightExtend\DogClub\Repository\OwnerRepository;
use SunlightExtend\DogClub\Trait\SingletonTrait;

readonly class OwnerService
{
    use SingletonTrait;

    private AnimalRepository $animalRepository;
    private BreedRepository $breedRepository;
    private OwnerRepository $ownerRepository;
    private BreederRepository $breederRepository;

    private FieldService $fieldService;

    private function __construct()
    {
        $this->animalRepository = AnimalRepository::getInstance();
        $this->breedRepository = BreedRepository::getInstance();
        $this->breederRepository = BreederRepository::getInstance();
        $this->ownerRepository = OwnerRepository::getInstance();
    }
    
    function getOwner(int $id): ?OwnerDto
    {
        $owner = $this->ownerRepository->getById($id);

        if ($owner === null)
        {
            return null;
        }

        $breeder = $this->breederRepository->getByOwnerdId($id);
        
        $animals = $this->animalRepository->getApprovedByOwnerId($id);
        
        $breedIds = array_unique(array_column($animals, 'breedId'));
        $breeds = $this->breedRepository->getByIds($breedIds);

        $dto = new OwnerDto($owner, $breeder, $animals, $breeds);

        return $dto;
    }
}