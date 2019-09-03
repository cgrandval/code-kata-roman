<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class RomanNumberCalculatorTest extends TestCase
{
    public function testRomanNumberToIntegerSuccessesWithTrivialValues(): void
    {
        $roman = new RomanNumberCalculator();

        $this->assertEquals(1, $roman->romanNumberToInteger('I'));
        $this->assertEquals(2, $roman->romanNumberToInteger('II'));
        $this->assertEquals(4, $roman->romanNumberToInteger('IV'));
        $this->assertEquals(5, $roman->romanNumberToInteger('V'));
        $this->assertEquals(10, $roman->romanNumberToInteger('X'));
        $this->assertEquals(12, $roman->romanNumberToInteger('XII'));
    }

    public function testRomanNumberToIntegerWithHuuugeValues(): void
    {
        $roman = new RomanNumberCalculator();

        $this->assertEquals(1000, $roman->romanNumberToInteger('M'));
        $this->assertEquals(2019, $roman->romanNumberToInteger('MMXIX'));
        $this->assertEquals(4999, $roman->romanNumberToInteger('MMMMCMXCIX'));
    }

    public function testRomanNumberToIntegerThrowExceptionOnInvalidRomanNumbers(): void
    {
        $roman = new RomanNumberCalculator();

        $this->expectException(InvalidArgumentException::class);
        $roman->romanNumberToInteger('MAMIXX');
    }

    public function testCalculateWithTrivialValues(): void
    {
        $roman = new RomanNumberCalculator();

        $this->assertEquals(2, $roman->calculate('I', 'I'));
        $this->assertEquals(3, $roman->calculate('I', 'II'));
        $this->assertEquals(5, $roman->calculate('III', 'II'));
        $this->assertEquals(5, $roman->calculate('IV', 'I'));
    }

    public function testCalculateWithHuugeValues(): void
    {
        $roman = new RomanNumberCalculator();

        $this->assertEquals(690, $roman->calculate('DCXLV', 'XLV'));
    }

    public function testIntegerToRomanNumberTrivial(): void
    {
        $roman = new RomanNumberCalculator();

        $this->assertEquals('I', $roman->integerToRomanNumber(1));
        $this->assertEquals('XLII', $roman->integerToRomanNumber(42));
        $this->assertEquals('XLIX', $roman->integerToRomanNumber(49));
    }

    public function testIntegerToRomanThrowExceptionOnBorders(): void
    {
        $roman = new RomanNumberCalculator();

        $this->expectException(InvalidArgumentException::class);
        $roman->integerToRomanNumber(0);
        $this->expectException(InvalidArgumentException::class);
        $roman->integerToRomanNumber(-42);
    }

    public function testIntegerToRomanNumberWithHuugeValues(): void
    {
        $roman = new RomanNumberCalculator();

        $this->assertEquals('MMXIX', $roman->integerToRomanNumber(2019));
        $this->assertEquals('MMMMCMXCIX', $roman->integerToRomanNumber(4999));
    }
}
