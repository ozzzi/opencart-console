<?php

namespace Ozzzi\Console\Services;

use Ozzzi\Console\Traits\Singleton;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    use Singleton;

    public function __construct()
    {
        $capsule = new Capsule;
        $capsule->addConnection(
            [
                'driver' => 'mysql',
                'host' => DB_HOSTNAME,
                'database' => DB_DATABASE,
                'username' => DB_USERNAME,
                'password' => DB_PASSWORD,
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => 'oc_',
            ]
        );

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}