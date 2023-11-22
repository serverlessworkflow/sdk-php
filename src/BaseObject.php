<?php

declare(strict_types=1);

namespace Serverless\Workflow;

use phpDocumentor\Reflection\DocBlockFactory;
use phpDocumentor\Reflection\Types\ContextFactory;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionProperty;
use ReflectionUnionType;

abstract class BaseObject
{
    /**
     * @param mixed[] $data
     */
    public function __construct(array $data)
    {
        if ($data === []) {
            return;
        }
        $this->initializeProperties($data);
    }

    /**
     * @param mixed[] $data
     */
    private function initializeProperties(array $data): void
    {
        $reflectionClass = new ReflectionClass($this);
        foreach ($data as $key => $value) {
            if ($reflectionClass->hasProperty($key)) {
                $property = $reflectionClass->getProperty($key);
                $this->assignValue($property, $value);
            }
        }
    }

    private function assignValue(ReflectionProperty $reflectionProperty, mixed $value): void
    {
        $type = $reflectionProperty->getType();

        if (! empty($this->getTypeFromProperty($reflectionProperty))) {
            $this->handleDocCommentType($reflectionProperty, $value);
        } elseif ($type instanceof ReflectionUnionType) {
            $this->handleUnionType($reflectionProperty, $value, $type->getTypes());
        } elseif ($type instanceof ReflectionNamedType) {
            $this->handleNamedType($reflectionProperty, $value, $type);
        }
    }

    /**
     * @param mixed[] $types
     */
    private function handleUnionType(ReflectionProperty $reflectionProperty, mixed $value, array $types): void
    {
        foreach ($types as $type) {
            if ($this->canInstantiateType($type, $value)) {
                $typeName = $type->getName();
                $this->instantiateAndSetValue($reflectionProperty, $value, $typeName);
                return;
            }
        }
    }

    private function handleNamedType(
        ReflectionProperty $reflectionProperty,
        mixed $value,
        ReflectionNamedType $reflectionNamedType
    ): void {
        $typeName = $reflectionNamedType->getName();
        $this->instantiateAndSetValue($reflectionProperty, $value, $typeName);
    }

    private function handleDocCommentType(ReflectionProperty $reflectionProperty, mixed $value): void
    {
        $typeHints = $this->getTypeFromProperty($reflectionProperty);
        if (! empty($typeHints)) {
            foreach ($typeHints as $typeHint) {
                if ($this->canInstantiateTypeFromDoc($typeHint, $value)) {
                    $this->instantiateAndSetValue($reflectionProperty, $value, $typeHint);
                    return;
                }
            }
        }

        $reflectionProperty->setValue($this, $value);
    }

    /**
     * @return string[]
     */
    private function getTypeFromProperty(ReflectionProperty $reflectionProperty): array
    {
        $docComment = $reflectionProperty->getDocComment();
        if ($docComment === false) {
            return [];
        }

        $docBlockFactory = DocBlockFactory::createInstance();
        $docblock = $docBlockFactory->create(
            $docComment,
            (new ContextFactory())->createFromReflector($reflectionProperty)
        );

        $varTags = $docblock->getTagsByName('var');
        if ($varTags !== []) {
            return array_map('trim', explode('|', $varTags[0]->__toString()));
        }

        return [];
    }

    private function canInstantiateTypeFromDoc(string $typeName, mixed $value): bool
    {
        if (str_contains($typeName, '[]')) {
            return is_array($value);
        }
        return class_exists($typeName) || is_scalar($value);
    }

    private function canInstantiateType(ReflectionNamedType $reflectionNamedType, mixed $value): bool
    {
        $typeName = $reflectionNamedType->getName();

        if ($typeName === 'bool') {
            return is_bool($value);
        }

        if ($typeName === 'string') {
            return is_string($value);
        }

        if ($typeName === 'array') {
            return is_array($value);
        }

        if (! class_exists($typeName)) {
            return false;
        }

        if (is_a($value, $typeName)) {
            return true;
        }

        if (! is_array($value)) {
            return false;
        }

        $reflectionClass = new ReflectionClass($typeName);
        $properties = array_map(
            static fn (ReflectionProperty $property): string => $property->getName(),
            $reflectionClass->getProperties(ReflectionProperty::IS_PUBLIC)
        );

        foreach (array_keys($value) as $key) {
            if (! in_array($key, $properties, true)) {
                return false;
            }
        }

        return true;
    }

    private function instantiateAndSetValue(
        ReflectionProperty $reflectionProperty,
        mixed $value,
        string $typeName
    ): void {
        if (str_contains($typeName, '[]')) {
            $singleTypeName = str_replace('[]', '', $typeName);
            $objects = [];
            foreach ($value as $item) {
                if ($singleTypeName === '\\' . \Serverless\Workflow\State::class && is_array($item)) {
                    foreach (glob(__DIR__ . '/*.php') as $filename) {
                        $class = '\\Serverless\\Workflow\\' . basename($filename, '.php');
                        if (class_exists($class) && is_subclass_of($class, '\\' . \Serverless\Workflow\State::class)) {
                            $reflection = new ReflectionClass($class);
                            if ($reflection->hasProperty('type')) {
                                $instance = $reflection->newInstance([]);
                                $typeValue = $reflection->getProperty('type')
                                    ->getValue($instance);
                                if ($typeValue === $item['type']) {
                                    $singleTypeName = $class;
                                    break;
                                }
                            }
                        }
                    }
                }

                if (is_a($item, $singleTypeName)) {
                    $objects[] = $item;
                } else {
                    $objects[] = new $singleTypeName($item);
                }
            }
            $reflectionProperty->setValue($this, $objects);
        } elseif (class_exists($typeName)) {
            if (is_a($value, $typeName)) {
                $reflectionProperty->setValue($this, $value);
            } else {
                $reflectionProperty->setValue($this, new $typeName($value));
            }
        } else {
            $reflectionProperty->setValue($this, $value);
        }
    }
}
