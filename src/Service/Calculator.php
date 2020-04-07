<?php

declare(strict_types=1);

namespace Cpelu\ConsoleApp\Service;

class Calculator
{
    public function calculate(string $input)
    {
        $rootNumber = 0;

        if (preg_match_all("/\d+/", $input, $match)) {
            $rootNumber = end($match[0]);
        };

        var_dump($input);
    }
}