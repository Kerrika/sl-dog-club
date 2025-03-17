<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Repository;

use Sunlight\Database\Database as DB;
use SunlightExtend\DogClub\Model\AncestorDto;
use SunlightExtend\DogClub\Trait\SingletonTrait;

readonly class AncestorRepository
{
    use SingletonTrait;

    function createAncestor(AncestorDto $ancestor): ?int
    {
        $id = DB::insert(DB::table('animal'), $this->getProperties($ancestor), true);

        return $id === false ? null : $id;
    }

    function updateAncestor(AncestorDto $ancestor): void
    {
        DB::update(DB::table('animal'), 'id=' . DB::val($ancestor->id), $this->getProperties($ancestor));
    }

    function deleteAncestor(int $id): void
    {
        DB::delete(DB::table('animal'), 'id=' . DB::val($id));
    }

    function getAncestor(?int $id): ?AncestorDto
    {
        if ($id === null)
        {
            return null;
        }

        $animalRow = DB::queryRow('SELECT id, name, registrationNumber, sireId, damId FROM ' . DB::table('animal') . ' WHERE id=' . DB::val($id));

        if (!$animalRow)
        {
            return null;
        }

        return AncestorDto::fromTableRow($animalRow);
    }

    function getAncestors(array $ids): array
    {
        if (count($ids) === 0)
        {
            return [];
        }

        $animalRows = DB::queryRows('SELECT id, name, registrationNumber, sireId, damId FROM ' . DB::table('animal') . ' WHERE ids IN ' . DB::idtList($ids));

        $list = array();

        foreach ($animalRows as $animalRow)
        {
            $list[] = AncestorDto::fromTableRow($animalRow);
        }

        return $list;
    }

    private function getProperties(AncestorDto $ancestor): array
    {
        return ['name' => $ancestor->name, 'registrationNumber' => $ancestor->registrationNumber, 'sireId' => $ancestor->sireId, 'damId' => $ancestor->damId];
    }
}