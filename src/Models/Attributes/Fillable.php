<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Models\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
final class Fillable
{
    /**
     * @param  array<string>  $fields
     */
    public function __construct(
        public array $fields = []
    ) {
    }
}
