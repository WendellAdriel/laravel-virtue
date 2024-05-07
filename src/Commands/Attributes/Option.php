<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Commands\Attributes;

use Closure;
use Symfony\Component\Console\Input\InputOption;

abstract class Option
{
    /**
     * @param  string|array<mixed>|null  $shortcut
     * @param  string|int|bool|array<mixed>|float|null  $default
     * @param  array<mixed>|Closure  $suggestedValues
     */
    public function __construct(
        public string $name,
        public string|array|null $shortcut = null,
        public int $mode = InputOption::VALUE_NONE,
        public string $description = '',
        public string|bool|int|float|array|null $default = null,
        public array|Closure $suggestedValues = [],
    ) {
    }
}
