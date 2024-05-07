<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Commands\Attributes;

use Attribute;
use Closure;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
final class RequiredArgument extends Argument
{
    public function __construct(
        public string $name,
        public bool $array = false,
        public string $description = '',
        public array|Closure $suggestedValues = [],
    ) {
        parent::__construct(
            name: $name,
            array: $array,
            description: $description,
            suggestedValues: $suggestedValues,
        );
    }
}
