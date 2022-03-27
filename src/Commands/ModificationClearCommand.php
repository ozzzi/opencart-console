<?php

namespace Ozzzi\Console\Commands;

use Ozzzi\Console\Services\ModificationClearService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ModificationClearCommand extends Command
{
    protected function configure()
    {
        $this->setName('cache:modification')
            ->setDescription('Clear modification cache');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            (new ModificationClearService())->process();
        } catch (\Throwable $e) {
            $output->writeln('<error>Directory error</error>');

            return Command::FAILURE;
        }

        $output->writeln('<info>Modification cache cleared successfully</info>');

        return Command::SUCCESS;
    }
}