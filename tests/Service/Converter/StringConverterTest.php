<?php

namespace App\Tests\Service\Converter;

use App\Service\Converter\StringConverter;
use PHPUnit\Framework\TestCase;

class StringConverterTest extends TestCase
{
    private StringConverter $converter;

    protected function setUp(): void
    {
        $this->converter = new StringConverter();
    }

    public function testConvertDigitsAreUnchanged(): void
    {
        $result = $this->converter->convert('12345');
        
        $this->assertSame('1/2/3/4/5', $result, 'Digits should remain unchanged.');
    }

    public function testConvertLettersToPositions(): void
    {
        $result = $this->converter->convert('abc');
        
        $this->assertSame(
            '1/2/3', 
            $result, 
            'Letters should be converted to their alphabetic positions.');
    }

    public function testConvertUppercaseLetters(): void
    {
        $result = $this->converter->convert('ABC');
        
        $this->assertSame(
            '1/2/3', 
            $result, 
            'Uppercase letters should have the same alphabetic positions as lowercase'
        );
    }

    public function testConvertMixedInput(): void
    {
        $result = $this->converter->convert('a1B2c3');
        
        $this->assertSame(
            '1/1/2/2/3/3', 
            $result, 
            'Mixed input of letters and digits should be correctly processed.'
        );
    }

    public function testConvertEmptyString(): void
    {
        $result = $this->converter->convert('');
        
        $this->assertSame(
            '', 
            $result, 
            'Empty input should return an empty string.'
        );
    }

    public function testConvertStringWithSpecialCharacters(): void
    {
        $result = $this->converter->convert('a!b@c#');
        
        $this->assertSame(
            '1/2/3', 
            $result, 
            'Special characters should be ignored during conversion.'
        );
    }
}
