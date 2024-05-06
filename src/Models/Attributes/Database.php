<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Models\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
final class Database
{
    public function __construct(
        public ?string $connection = null,
        public ?string $table = null,
        public bool $timestamps = true,
    ) {
    }
}
