<?php

namespace App\Tests\Service\Generator;

use App\Service\Generator\RandomStringArrayGenerator;
use PHPUnit\Framework\TestCase;

class RandomStringArrayGeneratorTest extends TestCase
{
    public function testGenerateCorrectArraySize(): void
    {
        $generator = new RandomStringArrayGenerator(5, 10);
        $result = $generator->generate();

        $this->assertIsArray($result, 'Generated result should be an array.');
        $this->assertCount(
            5, 
            $result, 
            'Generated array does not have the correct number of elements.'
        );
    }

    public function testGenerateCorrectStringLength(): void
    {
        $generator = new RandomStringArrayGenerator(5, 10);
        $result = $generator->generate();

        foreach ($result as $randomString) {
            $this->assertEquals(
                10, 
                strlen($randomString), 
                'Generated string does not have the correct length.'
            );
        }
    }

    public function testGenerateValidCharacters(): void
    {
        $generator = new RandomStringArrayGenerator(5, 10);
        $result = $generator->generate();

        foreach ($result as $randomString) {
            $this->assertMatchesRegularExpression(
                '/^[a-zA-Z0-9]+$/', 
                $randomString, 
                'Generated string should be alphanumeric.'
            );
        }
    }

    public function testGenerateEmptyArray(): void
    {
        $generator = new RandomStringArrayGenerator(0, 10);
        $result = $generator->generate();

        $this->assertCount(
            0, 
            $result, 
            'Generated array should be empty when arraySize is 0.'
        );
    }

    public function testGenerateEmptyString(): void
    {
        $generator = new RandomStringArrayGenerator(5, 0);
        $result = $generator->generate();

        foreach ($result as $randomString) {
            $this->assertSame(
                '', 
                $randomString, 
                'Generated string should be empty for stringLength 0.'
            );
        }
    }
}
