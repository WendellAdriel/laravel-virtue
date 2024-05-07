<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Commands\Concerns;

use Illuminate\Support\Collection;
use ReflectionAttribute;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use WendellAdriel\Virtue\Commands\Attributes\Argument;
use WendellAdriel\Virtue\Commands\Attributes\FlagOption;
use WendellAdriel\Virtue\Commands\Attributes\Option;
use WendellAdriel\Virtue\Commands\Attributes\OptionalArgument;
use WendellAdriel\Virtue\Commands\Attributes\RequiredArgument;
use WendellAdriel\Virtue\Commands\Attributes\ValueOption;
use WendellAdriel\Virtue\Support\HasAttributesReflection;

trait Virtue
{
    use HasAttributesReflection;

    /**
     * @return array<InputArgument>
     */
    public function getArguments(): array
    {
        $arguments = [];
        $requiredArguments = $this->buildArgumentsList(RequiredArgument::class);
        [$arrayArguments, $nonArrayArguments] = $requiredArguments->partition(fn (array $argument) => $argument['mode'] > InputArgument::REQUIRED);
        $optionalArguments = $this->buildArgumentsList(OptionalArgument::class);

        foreach ($nonArrayArguments as $argument) {
            $arguments[] = $argument;
        }

        foreach ($optionalArguments as $argument) {
            $arguments[] = $argument;
        }

        foreach ($arrayArguments as $argument) {
            $arguments[] = $argument;
        }

        return $arguments;
    }

    /**
     * @return array<InputOption>
     */
    public function getOptions(): array
    {
        $options = [];
        $valueOptions = $this->buildOptionsList(ValueOption::class);
        $flagOptions = $this->buildOptionsList(FlagOption::class);

        foreach ($valueOptions as $option) {
            $options[] = $option;
        }

        foreach ($flagOptions as $option) {
            $options[] = $option;
        }

        return $options;
    }

    /**
     * @param  class-string  $attribute
     */
    private function buildArgumentsList(string $attribute): Collection
    {
        return $this->resolveMultipleAttributes($attribute)->map(function (ReflectionAttribute $argumentAttribute) {
            /** @var Argument $attribute */
            $attribute = $argumentAttribute->newInstance();

            return [
                'name' => $attribute->name,
                'mode' => $this->resolveMode($attribute),
                'description' => $attribute->description,
                'default' => $attribute->default,
                'suggestedValues' => $attribute->suggestedValues,
            ];
        });
    }

    private function resolveMode(Argument $attribute): int
    {
        return match (true) {
            $attribute->required && $attribute->array => InputArgument::IS_ARRAY | InputArgument::REQUIRED,
            $attribute->required && ! $attribute->array => InputArgument::REQUIRED,
            ! $attribute->required && $attribute->array => InputArgument::IS_ARRAY,
            ! $attribute->required && ! $attribute->array => InputArgument::OPTIONAL,
            default => InputArgument::REQUIRED,
        };
    }

    /**
     * @param  class-string  $attribute
     */
    private function buildOptionsList(string $attribute): Collection
    {
        return $this->resolveMultipleAttributes($attribute)->map(function (ReflectionAttribute $optionAttribute) {
            /** @var Option $attribute */
            $attribute = $optionAttribute->newInstance();

            return [
                'name' => $attribute->name,
                'shortcut' => $attribute->shortcut,
                'mode' => $attribute->mode,
                'description' => $attribute->description,
                'default' => $attribute->default,
                'suggestedValues' => $attribute->suggestedValues,
            ];
        });
    }
}
