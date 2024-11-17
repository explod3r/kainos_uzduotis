<?php

namespace Tests\Service\Generator;

use App\Service\Generator\RandomStringGenerator;
use PHPUnit\Framework\TestCase;

class RandomStringGeneratorTest extends TestCase
{
    public function testGenerateCorrectStringLength(): void
    {
        $length = 10;
        $generator = new RandomStringGenerator($length);

        $result = $generator->generate();

        $this->assertIsString($result, 'Generated result should be a string.');
        $this->assertSame(
            $length,
            strlen($result),
            'Generated string does not have the correct length.'
        );
    }

    public function testGenerateReturnsAlphanumericString(): void
    {
        $length = 12;
        $generator = new RandomStringGenerator($length);

        $result = $generator->generate();

        $this->assertMatchesRegularExpression(
            '/^[a-zA-Z0-9]+$/',
            $result,
            'Generated string should be alphanumeric.'
        );
    }

    public function testGenerateZeroLengthString(): void
    {
        $generator = new RandomStringGenerator(0);
        $result = $generator->generate();

        $this->assertSame(
            '',
            $result,
            'Generated string should be empty for length 0.'
        );
    }

    public function testGenerateHandlesLargeLength(): void
    {
        $largeLength = 1000;
        $generator = new RandomStringGenerator($largeLength);
        $result = $generator->generate();

        $this->assertSame(
            $largeLength,
            strlen($result),
            'Generated string should match the large length.'
        );
    }
}
