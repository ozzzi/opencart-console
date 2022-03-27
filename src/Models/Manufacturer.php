<?php

namespace Ozzzi\Console\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $table = 'manufacturer';

    protected $primaryKey = 'manufacturer_id';

    public $timestamps = false;
}