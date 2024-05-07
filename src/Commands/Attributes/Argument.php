<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Commands\Attributes;

use Attribute;
use Closure;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class Argument
{
    /**
     * @param  string|int|bool|array<mixed>|float|null  $default
     * @param  array<mixed>|Closure  $suggestedValues
     */
    public function __construct(
        public string $name,
        public bool $required = true,
        public bool $array = false,
        public string $description = '',
        public string|int|bool|array|float|null $default = null,
        public array|Closure $suggestedValues = [],
    ) {
    }
}
