<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Repository;

use SunlightExtend\DogClub\Model\Entity\LitterEntity;
use SunlightExtend\DogClub\Model\Enum\Sex;
use SunlightExtend\DogClub\Trait\SingletonTrait;

class LitterRepository extends RepositoryBase
{
    use SingletonTrait;

    private function __construct()
    {
        parent::__construct('litter');
    }

    function getById(?int $id): ?LitterEntity
    {
        $row = $this->getRowById($id, LitterEntity::getPropertyNames());

        return $row === null ? null : new LitterEntity(...$row);
    }

    /** @return LitterEntity[] */
    function getByIds(array $ids): array
    {
        $rows = $this->getRowsByIds($ids, LitterEntity::getPropertyNames());

        $list =[];

        foreach ($rows as $row)
        {
            $list[] = new LitterEntity(...$row);
        }

        return $list;
    }

    /** @return LitterEntity[] */
    function getByAnimalId(Sex $sex, int $id): array
    {
        $property = $sex === Sex::Male ? "sireId" : "damId";

        return $this->getByProperty($property, $id);
    }

    /** @return LitterEntity[] */
    function getByBreedId(int $id): array
    {
        return $this->getByProperty('breedId', $id);
    }

    /** @return LitterEntity[] */
    function getByBreederId(int $id): array
    {
        return $this->getByProperty('breederId', $id);
    }

    /** @return LitterEntity[] */
    private function getByProperty(string $property, mixed $value): array
    {
        $rows = $this->getRowsByColumn($property, $value, LitterEntity::getPropertyNames());

        $list =[];

        foreach ($rows as $row)
        {
            $list[] = new LitterEntity(...$row);
        }

        return $list;
    }
}
