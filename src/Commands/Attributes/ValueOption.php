<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Commands\Attributes;

use Attribute;
use Closure;
use Symfony\Component\Console\Input\InputOption;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
final class ValueOption extends Option
{
    public function __construct(
        public string $name,
        public bool $array = false,
        public string|array|null $shortcut = null,
        public string $description = '',
        public string|bool|int|float|array|null $default = null,
        public array|Closure $suggestedValues = [],
    ) {
        parent::__construct(
            name: $name,
            shortcut: $shortcut,
            mode: $array ? InputOption::VALUE_IS_ARRAY | InputOption::VALUE_OPTIONAL : InputOption::VALUE_OPTIONAL,
            description: $description,
            default: $default,
            suggestedValues: $suggestedValues,
        );
    }
}
