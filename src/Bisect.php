<?php

declare(strict_types=1);

namespace Ddlzz\Bisect;

use Ddlzz\Bisect\Exception\InvalidArrayKeysException;

class Bisect
{
    /**
     * @throws InvalidArrayKeysException
     */
    public static function left(array $sortedArray, $value, int $leftKey = 0, int $rightKey = null): int
    {
        self::checkArrayKeys($sortedArray);

        $arraySize = \count($sortedArray);
        $rightKey = $rightKey ?? $arraySize - 1;

        if ($value < $sortedArray[$leftKey]) {
            return 0;
        }

        if ($value >= $sortedArray[$rightKey]) {
            return $arraySize;
        }

        while ($leftKey < $rightKey) {
            $middle = (int) (($leftKey + $rightKey) / 2);

            if ($sortedArray[$middle] < $value) {
                $leftKey = $middle + 1;
            } else {
                $rightKey = $middle;
            }
        }

        return $rightKey;
    }

    /**
     * @throws InvalidArrayKeysException
     */
    public static function right(array $sortedArray, $value, int $leftKey = 0, int $rightKey = null): int
    {
        self::checkArrayKeys($sortedArray);

        $arraySize = \count($sortedArray);
        $rightKey = $rightKey ?? $arraySize - 1;

        if ($value < $sortedArray[$leftKey]) {
            return 0;
        }

        if ($value >= $sortedArray[$rightKey]) {
            return $arraySize;
        }

        while ($leftKey < $rightKey) {
            $middle = (int) (($leftKey + $rightKey) / 2);

            if ($value < $sortedArray[$middle]) {
                $rightKey = $middle;
            } else {
                $leftKey = $middle + 1;
            }
        }

        return $rightKey;
    }

    /**
     * @throws InvalidArrayKeysException
     */
    private static function checkArrayKeys(array $sortedArray): void
    {
        if ($sortedArray !== array_values($sortedArray)) {
            throw new InvalidArrayKeysException('Array keys must be sorted numerically.');
        }
    }
}
