<?php

namespace Ozzzi\Console\Services;

class BaseFakerService
{
    protected $faker;

    public function __construct($faker)
    {
        $this->faker = $faker;
    }
}