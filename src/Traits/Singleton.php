<?php

namespace Ozzzi\Console\Traits;

trait Singleton
{
    public static $instance;

    public static function getInstance(): self
    {
        if (empty(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    private function __clone() {

    }

    private function __wakeup() {

    }
}