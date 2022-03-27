<?php

namespace Ozzzi\Console\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPath extends Model
{
    protected $table = 'category_path';

    public $timestamps = false;

    public $fillable = ['category_id', 'path_id', 'level'];
}