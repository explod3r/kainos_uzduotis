<?php

declare(strict_types=1);

namespace App\Service\Generator;

final class RandomStringArrayGenerator implements GeneratorInterface
{
    public function __construct(private int $arraySize, private int $stringLength)
    {
    }

    /**
     * @return array<int, string>
     */
    public function generate(): array
    {
        $randomStrings = [];
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);

        for ($i = 0; $i < $this->arraySize; ++$i) {
            $randomString = '';
            for ($j = 0; $j < $this->stringLength; $j++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
            $randomStrings[] = $randomString;
        }

        return $randomStrings;
    }
}
