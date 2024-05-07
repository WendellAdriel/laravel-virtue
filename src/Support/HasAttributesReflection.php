<?php

declare(strict_types=1);

namespace WendellAdriel\Virtue\Support;

use Illuminate\Support\Collection;
use ReflectionAttribute;
use ReflectionClass;

trait HasAttributesReflection
{
    /** @var array<class-string,Collection>|null */
    private static ?array $classAttributes = [];

    /**
     * @param  class-string  $attributeClass
     */
    private function resolveSingleAttribute(string $attributeClass): ?ReflectionAttribute
    {
        $classAttributes = $this->classAttributes();

        return $classAttributes->filter(fn (ReflectionAttribute $attribute) => $attribute->getName() === $attributeClass)
            ->first();
    }

    private function resolveMultipleAttributes(string $attributeClass): Collection
    {
        $classAttributes = $this->classAttributes();

        return $classAttributes->filter(fn (ReflectionAttribute $attribute) => $attribute->getName() === $attributeClass);
    }

    private function classAttributes(): Collection
    {
        $class = static::class;
        if (! array_key_exists($class, self::$classAttributes) || is_null(self::$classAttributes[$class])) {
            $reflectionClass = new ReflectionClass(static::class);
            self::$classAttributes[$class] = Collection::make($reflectionClass->getAttributes());
        }

        return self::$classAttributes[$class];
    }
}
