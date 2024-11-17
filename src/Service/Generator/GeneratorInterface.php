<?php

namespace App\Service\Generator;

interface GeneratorInterface
{
    /**
     * @return string|array<int, string>
     */
    public function generate(): string|array;
}
