<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Models\Concerns;

use ReflectionAttribute;
use ReflectionClass;
use WendellAdriel\Virtue\Models\Attributes\Cast;
use WendellAdriel\Virtue\Models\Attributes\Database;
use WendellAdriel\Virtue\Models\Attributes\Fillable;

trait Virtue
{
    use HasRelations;

    private ?ReflectionClass $reflectionClass = null;

    public function initializeVirtue(): void
    {
        $this->applyDatabaseCustomizations();
        $this->applyFillable();
        $this->applyCasts();

        self::handleRelationsKeys($this);
    }

    private function applyDatabaseCustomizations(): void
    {
        /** @var ReflectionAttribute|null $attribute */
        $attribute = $this->resolveSingleAttribute(Database::class);
        if (is_null($attribute)) {
            return;
        }

        /** @var Database $databaseAttribute */
        $databaseAttribute = $attribute->newInstance();
        if (! is_null($databaseAttribute->connection)) {
            $this->setConnection($databaseAttribute->connection);
        }
        if (! is_null($databaseAttribute->table)) {
            $this->setTable($databaseAttribute->table);
        }
        $this->timestamps = $databaseAttribute->timestamps;
    }

    private function applyFillable(): void
    {
        /** @var ReflectionAttribute|null $attribute */
        $attribute = $this->resolveSingleAttribute(Fillable::class);
        if (is_null($attribute)) {
            return;
        }

        /** @var Fillable $fillableAttribute */
        $fillableAttribute = $attribute->newInstance();
        if ($fillableAttribute->fields !== []) {
            $this->fillable($fillableAttribute->fields);
        }
    }

    private function applyCasts(): void
    {
        /** @var array<ReflectionAttribute>|null $castAttributes */
        $castAttributes = $this->resolveMultipleAttributes(Cast::class);
        if (is_null($castAttributes)) {
            return;
        }

        $castsArray = [];
        foreach ($castAttributes as $castAttribute) {
            /** @var Cast $attribute */
            $attribute = $castAttribute->newInstance();
            $castsArray[$attribute->field] = $attribute->type;
        }

        if ($castsArray !== []) {
            $this->mergeCasts($castsArray);
        }
    }

    /**
     * @param  class-string  $attributeClass
     */
    private function resolveSingleAttribute(string $attributeClass): ?ReflectionAttribute
    {
        $reflectionClass = $this->reflectionClass();
        $attributes = $reflectionClass->getAttributes($attributeClass);

        return $attributes === [] ? null : $attributes[0];
    }

    private function resolveMultipleAttributes(string $attributeClass): ?array
    {
        $reflectionClass = $this->reflectionClass();
        $attributes = $reflectionClass->getAttributes($attributeClass);

        return $attributes === [] ? null : $attributes;
    }

    private function reflectionClass(): ReflectionClass
    {
        if (is_null($this->reflectionClass)) {
            $this->reflectionClass = new ReflectionClass(static::class);
        }

        return $this->reflectionClass;
    }
}
