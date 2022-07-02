<?php

declare(strict_types=1);

use Ddlzz\Bisect\Bisect;
use Ddlzz\Bisect\Exception\InvalidArrayKeysException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Ddlzz\Bisect\Bisect
 */
final class BisectTest extends TestCase
{
    /**
     * @dataProvider provideDataForTestBisectLeft
     */
    public function testBisectLeft(int $expectedKey, int $element): void
    {
        $array = [
            23,
            55,
            127,
            128,
            200,
            250,
            300,
            312,
        ];
        $this->assertSame($expectedKey, Bisect::left($array, $element));
    }

    public function provideDataForTestBisectLeft(): array
    {
        return [
            [0, 10],
            [0, 23],
            [1, 30],
            [1, 50],
            [1, 55],
            [2, 75],
            [2, 127],
            [8, 400],
            [8, 500],
        ];
    }

    /**
     * @dataProvider provideDataForTestBisectRight
     */
    public function testBisectRight(int $expectedKey, int $element): void
    {
        $array = [
            23,
            55,
            127,
            128,
            200,
            250,
            300,
            312,
        ];
        $this->assertSame($expectedKey, Bisect::right($array, $element));
    }

    public function provideDataForTestBisectRight(): array
    {
        return [
            [0, 10],
            [1, 23],
            [1, 30],
            [1, 50],
            [2, 55],
            [2, 75],
            [3, 127],
            [8, 400],
            [8, 500],
        ];
    }

    public function testInvalidArrayKeysException(): void
    {
        $this->expectException(InvalidArrayKeysException::class);
        $this->expectExceptionMessage('Array keys must be sorted numerically.');

        $array = [
            'a' => 1,
            'b' => 2,
        ];
        Bisect::left($array, 1);
    }
}
