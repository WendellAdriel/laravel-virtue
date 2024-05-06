<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Models\Concerns;

trait HasArguments
{
    /**
     * @return array<mixed>
     */
    public function relationArguments(): array
    {
        return $this->arguments;
    }
}
