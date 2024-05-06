<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Models\Concerns;

trait Virtue
{
    use HasRelations;

    public function initializeVirtue(): void
    {
        self::handleRelationsKeys($this);
    }
}
