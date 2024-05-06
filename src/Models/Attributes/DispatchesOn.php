<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Models\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
final class DispatchesOn
{
    /**
     * @param  class-string  $class
     */
    public function __construct(
        public string $event,
        public string $class,
    ) {
    }
}
