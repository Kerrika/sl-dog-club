<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Repository;

use SunlightExtend\DogClub\Model\Entity\LitterEntity;
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

        $list = array();

        foreach ($rows as $row)
        {
            $list[] = new LitterEntity(...$row);
        }

        return $list;
    }
}
