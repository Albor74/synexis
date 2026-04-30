<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Model;

trait HasBuilder
{
    public function toBuilder(): object
    {
        // Логика: берем имя класса модели (напр. Unit) и добавляем "Builder"
        // Если билдеры лежат в другом неймспейсе, добавим замену через str_replace
        $modelClass = static::class;
        $builderClass = str_replace('\\Model\\', '\\Builder\\', $modelClass).'Builder';

        if (!class_exists($builderClass)) {
            throw new \RuntimeException("Builder class {$builderClass} not found for model {$modelClass}");
        }

        // Вызываем унифицированный метод
        return (new $builderClass())->fillFromModel($this);
    }
}
