<?php

namespace Ozzzi\Console\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStore extends Model
{
    protected $table = 'product_to_store';

    public $timestamps = false;

    protected $fillable = ['store_id'];

    protected $attributes = ['store_id' => 0];
}