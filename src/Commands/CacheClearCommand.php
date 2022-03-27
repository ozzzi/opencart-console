<?php

namespace Ozzzi\Console\Commands;

use Ozzzi\Console\Services\CacheClearService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CacheClearCommand extends Command
{
    protected function configure()
    {
        $this->setName('cache:clear')
            ->setDescription('Clear system cache');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            (new CacheClearService())->process();
        } catch (\Throwable $e) {
            $output->writeln('<error>Directory error</error>');

            return Command::FAILURE;
        }

        $output->writeln('<info>Modification cache cleared successfully</info>');

        return Command::SUCCESS;
    }
}