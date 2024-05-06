<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Models\Contracts;

interface RelationAttribute
{
    public function relationName(): string;

    /**
     * @return array<mixed>
     */
    public function relationArguments(): array;
}
