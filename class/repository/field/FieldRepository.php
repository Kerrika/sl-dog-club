<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Repository\Field;

use SunlightExtend\DogClub\Model\Entity\Field\FieldEntity;
use SunlightExtend\DogClub\Repository\RepositoryBase;
use SunlightExtend\DogClub\Trait\SingletonTrait;

class FieldRepository extends RepositoryBase
{
    use SingletonTrait;

    private function __construct()
    {
        parent::__construct('field');
    }

    function getById(int $id): ?FieldEntity
    {
        $row = $this->getRowById($id, FieldEntity::getPropertyNames());

        return $row === null ? null : new FieldEntity(...$row);
    }
    
    /** @return FieldEntity[] */
    function getByIds(array $ids): array
    {
        $rows = $this->getRowsByIds($ids, FieldEntity::getPropertyNames());

        $list = array();

        foreach ($rows as $row)
        {
            $list[] = new FieldEntity(...$row);
        }

        return $list;
    }
}
