<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Repository\Field;

use SunlightExtend\DogClub\Model\Entity\Field\FieldValueEntity;
use SunlightExtend\DogClub\Repository\RepositoryBase;
use SunlightExtend\DogClub\Trait\SingletonTrait;

class FieldValueRepository extends RepositoryBase
{
    use SingletonTrait;

    private function __construct()
    {
        parent::__construct('fieldValue');
    }

    function getById(int $id): ?FieldValueEntity
    {
        $row = $this->getRowById($id, FieldValueEntity::getPropertyNames());

        return $row === null ? null : new FieldValueEntity(...$row);
    }

    /** @return FieldValueEntity[] */
    function getByIds(array $ids): array
    {
        $rows = $this->getRowsByIds($ids, FieldValueEntity::getPropertyNames());

        $list =[];

        foreach ($rows as $row)
        {
            $list[] = new FieldValueEntity(...$row);
        }

        return $list;
    }

    /** @return FieldValueEntity[] */
    function getByAnimalId(int $id): array
    {
        $rows = $this->getRowsByColumn('animalId', $id, FieldValueEntity::getPropertyNames());

        $list =[];

        foreach ($rows as $row)
        {
            $list[] = new FieldValueEntity(...$row);
        }

        return $list;
    }
}
