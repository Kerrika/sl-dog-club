<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Repository;

use SunlightExtend\DogClub\Model\Entity\TrialTypeEntity;
use SunlightExtend\DogClub\Trait\SingletonTrait;

class LitterRepository extends RepositoryBase
{
    use SingletonTrait;

    private function __construct()
    {
        parent::__construct('trialType');
    }

    function getById(?int $id): ?TrialTypeEntity
    {
        $row = $this->getRowById($id, TrialTypeEntity::getPropertyNames());

        return $row === null ? null : new TrialTypeEntity(...$row);
    }

    /** @return TrialTypeEntity[] */
    function getByIds(array $ids): array
    {
        $rows = $this->getRowsByIds($ids, TrialTypeEntity::getPropertyNames());

        $list = array();

        foreach ($rows as $row)
        {
            $list[] = new TrialTypeEntity(...$row);
        }

        return $list;
    }
}
