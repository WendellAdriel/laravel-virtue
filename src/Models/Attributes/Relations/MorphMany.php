<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Models\Attributes\Relations;

use Attribute;
use Illuminate\Support\Str;
use WendellAdriel\Virtue\Models\Concerns\HasArguments;
use WendellAdriel\Virtue\Models\Contracts\RelationAttribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
final class MorphMany implements RelationAttribute
{
    use HasArguments;

    /**
     * @var class-string
     */
    public string $related;

    public string $morphName;

    /**
     * @var array<string|class-string>
     */
    public array $arguments = [];

    private ?string $name;

    /**
     * @param  class-string  $related
     * @param  array<string>  ...$arguments
     */
    public function __construct(string $related, string $morphName, ?string $name = null, string ...$arguments)
    {
        $this->related = $related;
        $this->morphName = $morphName;
        $this->name = $name;
        $this->arguments = [$related, $morphName, ...$arguments];
    }

    public function relationName(): string
    {
        return $this->name ?? Str::plural(Str::camel(class_basename($this->related)));
    }
}
