<?php

namespace App\Tests\Service\Converter;

use App\Service\Converter\Rot13Converter;
use PHPUnit\Framework\TestCase;

class Rot13ConverterTest extends TestCase
{
    private Rot13Converter $converter;

    protected function setUp(): void
    {
        $this->converter = new Rot13Converter();
    }
    public function testConvertRegularString(): void
    {
        $input = 'Hello';
        $expectedOutput = 'Uryyb';  // 'Hello' in ROT13 is 'Uryyb'

        $result = $this->converter->convert($input);

        $this->assertSame(
            $expectedOutput, 
            $result, 
            'String should be correctly converted to its ROT13 version.'
        );
    }

    public function testConvertEmptyString(): void
    {
        $result = $this->converter->convert('');

        $this->assertSame('', $result, 'Empty string input should return an empty string.');
    }


    public function testConvertMixedInput(): void
    {
        $input = 'a1B2c3';
        $expectedOutput = 'n1O2p3';  // ''a1B2c3' in ROT13 is 'n1O2p3'

        $result = $this->converter->convert($input);

        $this->assertSame(
            $expectedOutput, 
            $result, 
            'String should be correctly converted to its ROT13 version.'
        );
    }
}
