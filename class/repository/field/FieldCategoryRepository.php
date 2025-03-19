<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Repository\Field;

use SunlightExtend\DogClub\Model\Entity\Field\FieldCategoryEntity;
use SunlightExtend\DogClub\Repository\RepositoryBase;
use SunlightExtend\DogClub\Trait\SingletonTrait;

class FieldCategoryRepository extends RepositoryBase
{
    use SingletonTrait;

    private function __construct()
    {
        parent::__construct('fieldCategory');
    }

    function getAll(): array
    {
        $rows = $this->getAllRows(FieldCategoryEntity::getPropertyNames());

        return $this->toEntities($rows);
    }

    function getById(int $id): ?FieldCategoryEntity
    {
        $row = $this->getRowById($id, FieldCategoryEntity::getPropertyNames());

        return $row === null ? null : new FieldCategoryEntity(...$row);
    }

    /** @return FieldCategoryEntity[] */
    function getByIds(array $ids): array
    {
        $rows = $this->getRowsByIds($ids, FieldCategoryEntity::getPropertyNames());

        return $this->toEntities($rows);
    }

    /** @return FieldCategoryEntity[] */
    private function toEntities(array $rows): array
    {        
        $list = array();

        foreach ($rows as $row)
        {
            $list[] = new FieldCategoryEntity(...$row);
        }

        return $list;
    }
}
