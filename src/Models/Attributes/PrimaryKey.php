<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Models\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
final class PrimaryKey
{
    public function __construct(
        public ?string $name = null,
        public ?string $type = null,
        public ?bool $incrementing = null,
    ) {
    }
}
