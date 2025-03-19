<?php declare(strict_types=1);

namespace SunlightExtend\DogClub\Service;

use SunlightExtend\DogClub\Model\Dto\FieldValueDto;
use SunlightExtend\DogClub\Repository\Field\FieldCategoryRepository;
use SunlightExtend\DogClub\Repository\Field\FieldRepository;
use SunlightExtend\DogClub\Repository\Field\FieldValueRepository;
use SunlightExtend\DogClub\Trait\SingletonTrait;

readonly class FieldValueService
{
    use SingletonTrait;

    private FieldRepository $fieldRepository;
    private FieldCategoryRepository $fieldCategoryRepository;
    private FieldValueRepository $fieldValueRepository;

    private function __construct()
    {
        $this->fieldRepository = FieldRepository::getInstance();
        $this->fieldCategoryRepository = FieldCategoryRepository::getInstance();
        $this->fieldValueRepository = FieldValueRepository::getInstance();
    }
    
    /** @return FieldValueDto[] */
    function getFieldValues(int $animalId): array
    {
        $fieldValues = $this->fieldValueRepository->getByAnimalId($animalId);
        $fieldIds = array_unique(array_column($fieldValues, 'fieldId'));

        $fields = $this->fieldRepository->getByIds($fieldIds);
        $fieldCategoryIds = array_unique(array_column($fields, 'fieldCategoryId'));

        $fieldCategories = $this->fieldCategoryRepository->getByIds($fieldCategoryIds);

        $list = array();

        foreach ($fieldValues as $fieldValue)
        {
            $field = array_filter($fields, fn($value) => $value->id === $fieldValue->fieldId)[0];
            $fieldCategory = array_filter($fieldCategories, fn($value) => $value->id === $field->categoryId)[0];

            $list[] = new FieldValueDto($fieldValue, $field, $fieldCategory);
        }

        return $list;
    }
}