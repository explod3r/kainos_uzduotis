<?php

declare(strict_types=1);

namespace App\Service\Generator;

final class RandomStringGenerator implements GeneratorInterface
{
    public function __construct(private int $length)
    {
    }

    public function generate(): string
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $this->length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
