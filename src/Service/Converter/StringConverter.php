<?php

declare(strict_types=1);

namespace App\Service\Converter;

final class StringConverter
{
    public function convert(string $input): string
    {
        $result = [];
        foreach (str_split(strtolower($input)) as $char) {
            if (ctype_digit($char)) {
                $result[] = $char;
            } elseif (ctype_alpha($char)) {
                $result[] = ord($char) - ord('a') + 1;
            }
        }

        return implode('/', $result);
    }
}
