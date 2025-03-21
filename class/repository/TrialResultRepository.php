<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Repository;

use SunlightExtend\DogClub\Model\Entity\TrialResultEntity;
use SunlightExtend\DogClub\Trait\SingletonTrait;

class TrialResultRepository extends RepositoryBase
{
    use SingletonTrait;

    private function __construct()
    {
        parent::__construct('trialResult');
    }

    function getById(int $id): ?TrialResultEntity
    {
        $row = $this->getRowById($id, TrialResultEntity::getPropertyNames());

        return $row === null ? null : new TrialResultEntity(...$row);
    }

    /** @return TrialResultEntity[] */
    function getByIds(array $ids): array
    {
        $rows = $this->getRowsByIds($ids, TrialResultEntity::getPropertyNames());

        $list =[];

        foreach ($rows as $row)
        {
            $list[] = new TrialResultEntity(...$row);
        }

        return $list;
    }

    /** @return TrialResultEntity[] */
    function getByAnimalId(int $id): array
    {
        $rows = $this->getRowsByColumn('animalId', $id, TrialResultEntity::getPropertyNames());

        $list =[];

        foreach ($rows as $row)
        {
            $list[] = new TrialResultEntity(...$row);
        }

        return $list;
    }
}
