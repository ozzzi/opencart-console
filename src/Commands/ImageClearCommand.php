<?php

namespace Ozzzi\Console\Commands;

use Ozzzi\Console\Services\ImageClearService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImageClearCommand extends Command
{
    protected function configure()
    {
        $this->setName('cache:image')
            ->setDescription('Clear images cache');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            (new ImageClearService())->process();
        } catch (\Throwable $e) {
            $output->writeln('<error>Directory error</error>');

            return Command::FAILURE;
        }

        $output->writeln('<info>Images cache cleared successfully</info>');

        return Command::SUCCESS;
    }
}