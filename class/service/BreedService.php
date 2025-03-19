<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Service;

use SunlightExtend\DogClub\Model\Dto\BreedDto;
use SunlightExtend\DogClub\Repository\AnimalRepository;
use SunlightExtend\DogClub\Repository\BreederRepository;
use SunlightExtend\DogClub\Repository\BreedRepository;
use SunlightExtend\DogClub\Repository\LitterRepository;
use SunlightExtend\DogClub\Trait\SingletonTrait;

readonly class BreedService
{
    use SingletonTrait;

    private AnimalRepository $animalRepository;
    private BreedRepository $breedRepository;
    private BreederRepository $breederRepository;
    private LitterRepository $litterRepository;

    private function __construct()
    {
        $this->animalRepository = AnimalRepository::getInstance();
        $this->breedRepository = BreedRepository::getInstance();
        $this->breederRepository = BreederRepository::getInstance();
        $this->litterRepository = LitterRepository::getInstance();
    }
    
    function getBreed(int $id): ?BreedDto
    {
        $breed = $this->breedRepository->getById($id);

        if ($breed === null)
        {
            return null;
        }

        $breeders = $this->breederRepository->getByBreedId($id);
        $litters = $this->litterRepository->getByBreedId($id);

        $animals = $this->animalRepository->getApprovedByBreedId($id);        

        $dto = new BreedDto($breed, $breeders, $litters, $animals);

        return $dto;
    }
}