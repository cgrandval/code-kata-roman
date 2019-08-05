<?php
declare(strict_types=1);

class RomanNumberCalculator
{
    const Symbols = [
        'I' => 1,
        'IV' => 4,
        'V' => 5,
        'IX' => 9,
        'X' => 10,
        'XL' => 40,
        'L' => 50,
        'XC' => 90,
        'C' => 100,
        'CD' => 400,
        'D' => 500,
        'CM' => 900,
        'M' => 1000,
    ];

    public function romanNumberToInteger(string $romanNumber): int
    {
        $integerNumber = 0;
        while(strlen($romanNumber) > 0)
        {
            $lastSymbol = substr($romanNumber, -2);
            if(array_key_exists($lastSymbol, self::Symbols)) {
                $integerNumber += self::Symbols[$lastSymbol];
                $romanNumber = (string) substr($romanNumber, 0, -2);
                continue;
            }

            if(array_key_exists($romanNumber[-1], self::Symbols)) {
                $integerNumber += self::Symbols[$romanNumber[-1]];
                $romanNumber = (string) substr($romanNumber, 0, -1);
                continue;
            }

            throw new \InvalidArgumentException();
        }

        return $integerNumber;
    }

    public function calculate(string $leftOperand, string $rightOperand): int
    {
        $leftOperand = $this->romanNumberToInteger($leftOperand);
        $rightOperand = $this->romanNumberToInteger($rightOperand);

        return $leftOperand + $rightOperand;
    }
}

$calculator = new RomanNumberCalculator();
var_dump($calculator->calculate('IXXCCM', 'MCD'));
