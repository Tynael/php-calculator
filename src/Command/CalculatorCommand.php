<?php

declare(strict_types=1);

namespace Cpelu\ConsoleApp\Command;

use Cpelu\ConsoleApp\Service\File\FileDataProcessor;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CalculatorCommand extends Command
{
    /** @var FileDataProcessor */
    private $FileDataProcessor;

    public function __construct(FileDataProcessor $fileDataProcessor)
    {
        parent::__construct();
        $this->fileDataProcessor = $fileDataProcessor;
    }

    protected static $defaultName = 'app:calculator';

    protected function configure(): void
    {
        $this
            ->setName('app:calculator')
            ->setDescription('Do simple math calculations.')
            ->setHelp('This command allows you to do simple math calculations.');
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): void {
        $output->writeln([
            '====**** Welcome to PHP Calculator App ****====',
            '==========================================',
            '',
        ]);

        $data = $this->fileDataProcessor->getContent();

        $output->writeln([
            $data
        ]);
    }
}