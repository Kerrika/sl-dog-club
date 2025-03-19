<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Service;

use SunlightExtend\DogClub\Model\Dto\BreederDto;
use SunlightExtend\DogClub\Repository\BreederRepository;
use SunlightExtend\DogClub\Repository\BreedRepository;
use SunlightExtend\DogClub\Repository\LitterRepository;
use SunlightExtend\DogClub\Trait\SingletonTrait;

readonly class BreederService
{
    use SingletonTrait;

    private BreedRepository $breedRepository;
    private BreederRepository $breederRepository;
    private LitterRepository $litterRepository;

    private function __construct()
    {
        $this->breedRepository = BreedRepository::getInstance();
        $this->breederRepository = BreederRepository::getInstance();
        $this->litterRepository = LitterRepository::getInstance();
    }
    
    function getBreeder(int $id): ?BreederDto
    {
        $breeder = $this->breederRepository->getById($id);

        if ($breeder === null)
        {
            return null;
        }

        $litters = $this->litterRepository->getByBreederId($id);
        
        $breedIds = array_unique(array_column($litters, 'breedId'));
        $breeds = $this->breedRepository->getByIds($breedIds);   

        $dto = new BreederDto($breeder, $litters, $breeds);

        return $dto;
    }
}