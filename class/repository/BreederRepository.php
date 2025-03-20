<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Repository;

use SunlightExtend\DogClub\Model\Entity\BreedEntity;
use SunlightExtend\DogClub\Model\Entity\BreederEntity;
use SunlightExtend\DogClub\Model\Entity\OwnerEntity;
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

        $list =[];

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

    /** @return BreederEntity */
    function getByOwnerdId(int $id): ?BreederEntity
    {
        return $this->getOneByProperty('ownerId', $id);
    }

    private function getOneByProperty(string $property, mixed $value): ?BreedEntity
    {
        $breeders = $this->getByProperty($property, $value);

        return (count($breeders) > 0 ? $breeders[0] : null);
    }

    /** @return BreederEntity[] */
    private function getByProperty(string $property, mixed $value): array
    {
        $rows = $this->getRowsByColumn($property, $value, BreederEntity::getPropertyNames());

        $list =[];

        foreach ($rows as $row)
        {
            $list[] = new BreederEntity(...$row);
        }

        return $list;
    }
}
