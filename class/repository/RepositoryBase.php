<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Repository;

use Sunlight\Database\Database as DB;
use SunlightExtend\DogClub\Model\Entity\IEntity;

abstract class RepositoryBase
{
    private string $dbName;

    function __construct(string $entityName)
    {
        $this->dbName = DB::table($entityName);
    }

    function create(IEntity $entity): int
    {
        $id = DB::insert($this->dbName, $entity->toArray(), true);

        return $id === false ? null : $id;
    }

    function update(int $id, IEntity $entity): void
    {
        DB::update($this->dbName, 'id' . DB::equal($id), $entity->toArray());
    }

    function delete(int $id): void
    {
        DB::delete($this->dbName, 'id=' . DB::val($id));
    }

    protected function getAllRows(string $properties): array
    {
        return DB::queryRow('SELECT ' . $properties . ' FROM ' . $this->dbName);
    }

    protected function getRowById(?int $id, string $properties): ?array
    {
        if ($id === null)
        {
            return null;
        }

        $row = DB::queryRow('SELECT ' . $properties . ' FROM ' . $this->dbName . ' WHERE id=' . DB::val($id));

        return $row === false ? null : $row;
    }

    protected function getRowsByIds(array $ids, string $properties): array
    {
        if (count($ids) === 0)
        {
            return [];
        }

        return DB::queryRows('SELECT ' . $properties . ' FROM ' . $this->dbName . ' WHERE id IN ' . DB::idtList($ids));
    }

    protected function getRowsByColumn(string $property, mixed $value, string $properties): array
    {
        return DB::queryRows('SELECT ' . $properties . ' FROM ' . $this->dbName . ' WHERE ' . $property . ' = ' . DB::val($value));
    }
}