<?php

namespace Ozzzi\Console;

use Ozzzi\Console\Commands\CacheClearCommand;
use Ozzzi\Console\Commands\FakerCommand;
use Ozzzi\Console\Commands\ImageClearCommand;
use Ozzzi\Console\Commands\ModificationClearCommand;
use Symfony\Component\Console\Application;

class App
{
    public function run()
    {
        $app = new Application();

        $app->add(new CacheClearCommand());
        $app->add(new ModificationClearCommand());
        $app->add(new ImageClearCommand());
        $app->add(new FakerCommand());

        $app->run();
    }
}