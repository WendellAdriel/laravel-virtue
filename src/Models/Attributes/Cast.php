<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Models\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
final class Cast
{
    /**
     * @param  string|class-string  $type
     */
    public function __construct(
        public string $field,
        public string $type,
    ) {
    }
}
