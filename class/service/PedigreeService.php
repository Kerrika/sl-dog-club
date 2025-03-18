<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Service;

use SunlightExtend\DogClub\Repository\AnimalRepository;

readonly class PedigreeService
{
    private AnimalRepository $AnimalRepository;

    private function __construct()
    {
        $this->AnimalRepository = AnimalRepository::getInstance();
    }

    static function getInstance(): self
    {
        static $instance;
        return $instance ??= new self();
    }

    /** @return array<int, array<int, AnimalEntity>> */
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
                $generation[] = $this->AnimalRepository->getById($ancestor?->sireId);
                $generation[] = $this->AnimalRepository->getById($ancestor?->damId);
            }

            $currentGen = $generation;
            $pedigree[] = $generation;
        }

        return $pedigree;
    }
}