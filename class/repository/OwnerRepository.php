<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Repository;

use SunlightExtend\DogClub\Model\Entity\OwnerEntity;
use SunlightExtend\DogClub\Trait\SingletonTrait;

class OwnerRepository extends RepositoryBase
{
    use SingletonTrait;

    private function __construct()
    {
        parent::__construct('owner');
    }

    function getById(?int $id): ?OwnerEntity
    {
        $row = $this->getRowById($id, OwnerEntity::getPropertyNames());

        return $row === null ? null : new OwnerEntity(...$row);
    }

    /** @return OwnerEntity[] */
    function getByIds(array $ids): array
    {
        $rows = $this->getRowsByIds($ids, OwnerEntity::getPropertyNames());

        $list =[];

        foreach ($rows as $row)
        {
            $list[] = new OwnerEntity(...$row);
        }

        return $list;
    }
}
