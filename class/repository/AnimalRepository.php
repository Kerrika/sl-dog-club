<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Repository;

use SunlightExtend\DogClub\Model\Entity\AnimalEntity;
use SunlightExtend\DogClub\Trait\SingletonTrait;

class AnimalRepository extends RepositoryBase
{
    use SingletonTrait;

    private function __construct()
    {
        parent::__construct('animal');
    }

    function getById(?int $id): ?AnimalEntity
    {
        $row = $this->getRowById($id, AnimalEntity::getPropertyNames());

        return $row === null ? null : new AnimalEntity(...$row);
    }

    /** @return AnimalEntity[] */
    function getByIds(array $ids): array
    {
        $rows = $this->getRowsByIds($ids, AnimalEntity::getPropertyNames());

        $list = array();

        foreach ($rows as $row)
        {
            $list[] = new AnimalEntity(...$row);
        }

        return $list;
    }
}