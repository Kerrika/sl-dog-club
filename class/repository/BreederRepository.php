<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Repository;

use SunlightExtend\DogClub\Model\Entity\BreederEntity;
use SunlightExtend\DogClub\Trait\SingletonTrait;

class BreederRepository extends RepositoryBase
{
    use SingletonTrait;

    private function __construct()
    {
        parent::__construct('breeder');
    }

    function getById(?int $id): ?BreederEntity
    {
        $row = $this->getRowById($id, BreederEntity::getPropertyNames());

        return $row === null ? null : new BreederEntity(...$row);
    }

    /** @return BreederEntity[] */
    function getByIds(array $ids): array
    {
        $rows = $this->getRowsByIds($ids, BreederEntity::getPropertyNames());

        $list = array();

        foreach ($rows as $row)
        {
            $list[] = new BreederEntity(...$row);
        }

        return $list;
    }

    /** @return BreederEntity[] */
    function getByBreedId(int $id): array
    {
        return $this->getByProperty('breedId', $id);
    }

    /** @return BreederEntity[] */
    private function getByProperty(string $property, mixed $value): array
    {
        $rows = $this->getRowsByColumn($property, $value, BreederEntity::getPropertyNames());

        $list = array();

        foreach ($rows as $row)
        {
            $list[] = new BreederEntity(...$row);
        }

        return $list;
    }
}
