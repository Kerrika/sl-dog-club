<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Repository;

use SunlightExtend\DogClub\Model\Entity\BreedEntity;
use SunlightExtend\DogClub\Trait\SingletonTrait;

class BreedRepository extends RepositoryBase
{
    use SingletonTrait;

    private function __construct()
    {
        parent::__construct('breed');
    }

    function getById(?int $id): ?BreedEntity
    {
        $row = $this->getRowById($id, BreedEntity::getPropertyNames());

        return $row === null ? null : new BreedEntity(...$row);
    }

    /** @return BreedEntity[] */
    function getAll(): array
    {
        $rows = $this->getAllRows(BreedEntity::getPropertyNames());

        return $this->toEntities($rows);
    }

    /** @return BreedEntity[] */
    function getByIds(array $ids): array
    {
        $rows = $this->getRowsByIds($ids, BreedEntity::getPropertyNames());

        return $this->toEntities($rows);
    }

    /** @return BreedEntity[] */
    private function toEntities(array $rows): array
    {        
        $list =[];

        foreach ($rows as $row)
        {
            $list[] = new BreedEntity(...$row);
        }

        return $list;
    }
}
