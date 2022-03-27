<?php

namespace Ozzzi\Console\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryStore extends Model
{
    protected $table = 'category_to_store';

    public $timestamps = false;

    public $fillable = [
        'store_id',
    ];
}