<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Service;

use SunlightExtend\DogClub\Repository\AnimalRepository;
use SunlightExtend\DogClub\Trait\SingletonTrait;

readonly class PedigreeService
{
    use SingletonTrait;

    private AnimalRepository $AnimalRepository;

    private function __construct()
    {
        $this->AnimalRepository = AnimalRepository::getInstance();
    }
    /** @return AnimalEntity[][] */
    function getPedigree(int $id, int $generationCount): ?array
    {
        $pedigree = array();

        $animal = $this->AnimalRepository->getById($id);
        if (!$animal)
        {
            return null;
        }

        $currentGen = [$animal];

        for ($i = 0; $i < $generationCount; $i++)
        {
            $generation = array();

            foreach ($currentGen as $ancestor)
            {
                $generation[] = $ancestor?->sireId !== null ? $this->AnimalRepository->getById($ancestor?->sireId) : null;
                $generation[] = $ancestor?->sireId !== null ? $this->AnimalRepository->getById($ancestor?->damId) : null;
            }

            $currentGen = $generation;
            $pedigree[] = $generation;
        }

        return $pedigree;
    }
}