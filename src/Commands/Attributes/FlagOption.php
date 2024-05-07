<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Commands\Attributes;

use Attribute;
use Symfony\Component\Console\Input\InputOption;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
final class FlagOption extends Option
{
    public function __construct(
        public string $name,
        public string|array|null $shortcut = null,
        public string $description = '',
        public bool $negatable = false,
    ) {
        parent::__construct(
            name: $name,
            shortcut: $shortcut,
            mode: $negatable ? InputOption::VALUE_NEGATABLE | InputOption::VALUE_NONE : InputOption::VALUE_NONE,
            description: $description,
        );
    }
}
