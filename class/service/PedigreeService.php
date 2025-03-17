<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Service;

use SunlightExtend\DogClub\Repository\AncestorRepository;

readonly class PedigreeService
{
    private AncestorRepository $ancestorRepository;

    private function __construct()
    {
        $this->ancestorRepository = AncestorRepository::getInstance();
    }

    static function getInstance(): self
    {
        static $instance;
        return $instance ??= new self();
    }

    /** @return array<int, array<int, AncestorDto>> */
    function getPedigree(int $id, int $generationCount): ?array
    {
        $pedigree = array();

        $animal = $this->ancestorRepository->getAncestor($id);
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
                $generation[] = $this->ancestorRepository->getAncestor($ancestor?->sireId);
                $generation[] = $this->ancestorRepository->getAncestor($ancestor?->damId);
            }

            $currentGen = $generation;
            $pedigree[] = $generation;
        }

        return $pedigree;
    }
}