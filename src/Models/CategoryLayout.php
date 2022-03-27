<?php

namespace Ozzzi\Console\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryLayout extends Model
{
    protected $table = 'category_to_layout';

    public $timestamps = false;

    public $fillable = [
        'store_id',
        'layout_id',
    ];
}