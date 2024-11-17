<?php

declare(strict_types=1);

namespace App\Service\Collection;

use App\Service\Generator\GeneratorInterface;

final class GeneratorCollection
{
    /**
     * @var GeneratorInterface[]
     */
    private array $generators = [];

    public function addGenerator(GeneratorInterface $generator): void
    {
        $this->generators[] = $generator;
    }

    /**
     * @return GeneratorInterface[]
     */
    public function getGenerators(): array
    {
        return $this->generators;
    }
}
