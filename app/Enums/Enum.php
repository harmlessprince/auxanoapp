<?php

namespace App\Enums;


use App\Exceptions\NotSupportedException;
use ReflectionClass;


abstract class Enum
{
    const NONE = null;

    /**
     * @throws NotSupportedException
     */
    final  private function __construct()
    {
        throw new NotSupportedException('Constructor not supported for this class');
    }

    /**
     * @throws NotSupportedException
     */
     private function __clone()
    {
        throw new NotSupportedException('Cloning not supported for this class');
    }

    final public static function toArray()
    {
        return (new ReflectionClass(static::class))->getConstants();
    }

    final public static function toCollection()
    {
        $constants = static::toArray();
        $collection = collect([]);
        foreach ($constants as $key => $value) {
            if ($value) {
                $collection->push([
                    'name' => $key,
                    'value' => $value,
                ]);
            }
        }
        return $collection;
    }

    final public static function isValid(string $value): bool
    {
        return array_key_exists($value, static::toArray());
    }
}
