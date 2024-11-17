<?php

namespace App\Tests\Service\Collection;

use App\Service\Collection\GeneratorCollection;
use App\Service\Generator\GeneratorInterface;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class GeneratorCollectionTest extends TestCase
{
    private GeneratorCollection $generatorCollection;
    private MockObject|GeneratorInterface $mockGenerator;

    protected function setUp(): void
    {
        $this->generatorCollection = new GeneratorCollection();
        
        $this->mockGenerator = $this->createMock(GeneratorInterface::class);
    }

    public function testAddGenerator(): void
    {
        $this->generatorCollection->addGenerator($this->mockGenerator);

        $generators = $this->generatorCollection->getGenerators();

        $this->assertCount(1, $generators, 'The generator collection should contain one generator.');
        $this->assertSame(
            $this->mockGenerator, 
            $generators[0], 
            'The generator added to the collection is not the expected one.'
        );
    }

    public function testAddMultipleGenerators(): void
    {
        $mockGenerator2 = $this->createMock(GeneratorInterface::class);

        $this->generatorCollection->addGenerator($this->mockGenerator);
        $this->generatorCollection->addGenerator($mockGenerator2);

        $generators = $this->generatorCollection->getGenerators();

        $this->assertCount(2, $generators, 'Generator collection should contain two generators.');

        $this->assertSame(
            $this->mockGenerator, 
            $generators[0], 
            'First generator in the collection is not the expected one.'
        );

        $this->assertSame(
            $mockGenerator2, 
            $generators[1], 
            'Second generator in the collection is not the expected one.'
        );
    }

    public function testGetGeneratorsReturnsEmptyArrayInitially(): void
    {
        $generators = $this->generatorCollection->getGenerators();

        $this->assertEmpty($generators, 'Generator collection should be empty initially.');
    }
}
