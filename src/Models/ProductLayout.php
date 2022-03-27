<?php

namespace Ozzzi\Console\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLayout extends Model
{
    protected $table = 'product_to_layout';

    public $timestamps = false;

    protected $fillable = ['store_id', 'layout_id'];

    protected $attributes = [
        'store_id' => 0,
        'layout_id' => 0,
    ];
}