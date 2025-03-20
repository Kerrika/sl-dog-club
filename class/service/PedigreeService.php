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
    function getPedigreeForAnimal(int $id, int $generationCount): ?array
    {
        $animal = $this->AnimalRepository->getById($id);

        if ($animal === null)
        {
            return null;
        }

        return $this->getAncestors([$animal], $generationCount);
    }

    /** @return AnimalEntity[][] */
    function getPedigreeForLitter(int $sireId, int $damId, int $generationCount): array
    {
        $sire = $this->AnimalRepository->getById($sireId);
        $dam = $this->AnimalRepository->getById($damId);

        $initialGeneration = [$sire, $dam];

        $ancestors = $this->getAncestors($initialGeneration, $generationCount-1);

        return [$initialGeneration, ...$ancestors];
    }

    /** @var AnimalEntity[] $initialGeneration */
    /** @return AnimalEntity[][] */
    private function getAncestors(array $initialGeneration, int $generationCount): array
    {
        $ancestors = [];

        $currentGen = $initialGeneration;

        for ($i = 0; $i < $generationCount; $i++)
        {
            $generation = [];

            foreach ($currentGen as $ancestor)
            {
                $generation[] = $ancestor?->sireId !== null ? $this->AnimalRepository->getById($ancestor?->sireId) : null;
                $generation[] = $ancestor?->sireId !== null ? $this->AnimalRepository->getById($ancestor?->damId) : null;
            }

            $currentGen = $generation;
            $ancestors[] = $generation;
        }

        return $ancestors;
    }
}