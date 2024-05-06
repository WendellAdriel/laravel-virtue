<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Models\Concerns;

use ReflectionClass;
use WendellAdriel\Virtue\Models\Attributes\Fillable;

trait Virtue
{
    use HasRelations;

    public function initializeVirtue(): void
    {
        $this->applyFillable();

        self::handleRelationsKeys($this);
    }

    private function applyFillable(): void
    {
        $fillableAttribute = $this->resolveFillableAttribute();
        if (is_null($fillableAttribute)) {
            return;
        }

        if ($fillableAttribute->fields !== []) {
            $this->fillable($fillableAttribute->fields);
        }
    }

    /**
     * @return Fillable|null
     */
    private function resolveFillableAttribute(): ?Fillable
    {
        $reflectionClass = new ReflectionClass(static::class);
        $primaryKeyAttribute = $reflectionClass->getAttributes(Fillable::class);

        return $primaryKeyAttribute === []
            ? null
            : $primaryKeyAttribute[0]->newInstance();
    }
}
