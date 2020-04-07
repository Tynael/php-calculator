<?php

declare(strict_types=1);

namespace Cpelu\ConsoleApp\Service\File;

use Cpelu\ConsoleApp\Service\Calculator;

class FileDataProcessor
{
    const FILE = "math.txt";

    /** @var Calculator */
    private $calculator;

    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }

    public function getContent(): string
    {
        $data = file_get_contents(self::FILE);

        $this->parseInput($data);

        return $data;
    }

    public function parseInput(string $data)
    {
        $wordOperators = ['add', 'multiply'];
        $mathOperators = ['+', '*'];
        $items = str_replace($wordOperators, $mathOperators, $data);

        $this->calculator->calculate($items);
    }
}