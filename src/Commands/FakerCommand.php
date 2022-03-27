<?php

namespace Ozzzi\Console\Commands;

use Ozzzi\Console\Services\CategoryFakeService;
use Ozzzi\Console\Services\Database;
use Ozzzi\Console\Services\ProductFakeService;
use Faker\Factory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class FakerCommand extends Command
{
    protected function configure()
    {
        $this->setName('faker')
            ->setDescription('Create fake categories and products');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $question = new Question('Number of categories = ', 10);
        $question->setValidator(function ($answer) {
            if ($answer < 1) {
                throw new \RuntimeException(
                    'Only positive values'
                );
            }

            return $answer;
        });
        $numCategories = (int) $helper->ask($input, $output, $question);

        $question = new Question('Number of products = ', 100);
        $question->setValidator(function ($answer) {
            if ($answer < 1) {
                throw new \RuntimeException(
                    'Only positive values'
                );
            }

            return $answer;
        });
        $numProducts = (int) $helper->ask($input, $output, $question);

        Database::getInstance();
        $faker = Factory::create();

        (new CategoryFakeService($faker))->process($numCategories);
        (new ProductFakeService($faker))->process($numProducts);

        $output->writeln('<info>Categories and products created succefully</info>');

        return Command::SUCCESS;
    }
}