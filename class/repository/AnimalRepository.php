<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Repository;

use Sunlight\Database\Database as DB;
use SunlightExtend\DogClub\Model\Entity\AnimalEntity;
use SunlightExtend\DogClub\Model\Enum\AnimalStatus;
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

        $list =[];

        foreach ($rows as $row)
        {
            $list[] = new AnimalEntity(...$row);
        }

        return $list;
    }

    /** @return AnimalEntity[] */
    function getByLitterId($id): array
    {
        return $this->getByProperty('litterId', $id);
    }

    /** @return AnimalEntity[] */
    function getApprovedByBreedId(int $id): array
    {
        $rows = $this->getApprovedByProperty('breedId', $id);

        return $this->toEntities($rows);
    }

    /** @return AnimalEntity[] */
    function getApprovedByOwnerId(int $id): array
    {
        $rows = $this->getApprovedByProperty('ownerId', $id);

        return $this->toEntities($rows);
    }

    /** @return AnimalEntity[] */
    function getApprovedByProperty(string $property, int $id): array
    {        
        $rows = DB::queryRows('SELECT ' . AnimalEntity::getPropertyNames() . ' FROM ' . $this->dbName . ' WHERE ' . $property . DB::equal($id) . ' AND status IN (' . AnimalStatus::Approved->value . ', ' . AnimalStatus::Retired->value . ')');

        return $this->toEntities($rows);
    }

    /** @return AnimalEntity[] */
    private function getByProperty(string $property, mixed $value): array
    {
        $rows = $this->getRowsByColumn($property, $value, AnimalEntity::getPropertyNames());

        return $this->toEntities($rows);
    }

    /** @return AnimalEntity[] */
    private function toEntities(array $rows): array
    {        
        $list =[];

        foreach ($rows as $row)
        {
            $list[] = new AnimalEntity(...$row);
        }

        return $list;
    }
}