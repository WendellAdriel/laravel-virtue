<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Models\Concerns;

use Illuminate\Support\Collection;
use ReflectionAttribute;
use WendellAdriel\Virtue\Models\Attributes\Cast;
use WendellAdriel\Virtue\Models\Attributes\Database;
use WendellAdriel\Virtue\Models\Attributes\DispatchesOn;
use WendellAdriel\Virtue\Models\Attributes\Fillable;
use WendellAdriel\Virtue\Models\Attributes\Hidden;
use WendellAdriel\Virtue\Models\Attributes\PrimaryKey;
use WendellAdriel\Virtue\Support\HasAttributesReflection;

trait Virtue
{
    use HasAttributesReflection;
    use HasRelations;

    /** @var array<class-string,Collection>|null */
    private static ?array $classAttributes = [];

    public function initializeVirtue(): void
    {
        $this->applyDatabaseCustomizations();
        $this->applyPrimaryKeyCustomization();
        $this->applyFillable();
        $this->applyHidden();
        $this->applyCasts();
        $this->handleEvents();

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

    private function applyPrimaryKeyCustomization(): void
    {
        /** @var ReflectionAttribute|null $attribute */
        $attribute = $this->resolveSingleAttribute(PrimaryKey::class);
        if (is_null($attribute)) {
            return;
        }

        /** @var PrimaryKey $primaryKeyAttribute */
        $primaryKeyAttribute = $attribute->newInstance();
        if (! is_null($primaryKeyAttribute->name)) {
            $this->setKeyName($primaryKeyAttribute->name);
        }
        if (! is_null($primaryKeyAttribute->type)) {
            $this->setKeyType($primaryKeyAttribute->type);
        }
        if (! is_null($primaryKeyAttribute->incrementing)) {
            $this->setIncrementing($primaryKeyAttribute->incrementing);
        }
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

    private function applyHidden(): void
    {
        /** @var ReflectionAttribute|null $attribute */
        $attribute = $this->resolveSingleAttribute(Hidden::class);
        if (is_null($attribute)) {
            return;
        }

        /** @var Hidden $hiddenAttribute */
        $hiddenAttribute = $attribute->newInstance();
        if ($hiddenAttribute->fields !== []) {
            $this->makeHidden($hiddenAttribute->fields);
        }
    }

    private function applyCasts(): void
    {
        $castAttributes = $this->resolveMultipleAttributes(Cast::class);
        if ($castAttributes->isEmpty()) {
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

    private function handleEvents(): void
    {
        $dispatchesAttributes = $this->resolveMultipleAttributes(DispatchesOn::class);
        if ($dispatchesAttributes->isEmpty()) {
            return;
        }

        $eventsArray = [];
        foreach ($dispatchesAttributes as $dispatchesAttribute) {
            /** @var DispatchesOn $attribute */
            $attribute = $dispatchesAttribute->newInstance();
            if (! in_array($attribute->event, $this->getObservableEvents())) {
                continue;
            }

            $eventsArray[$attribute->event] = $attribute->class;
        }

        if ($eventsArray !== []) {
            $this->dispatchesEvents = $eventsArray;
        }
    }
}
