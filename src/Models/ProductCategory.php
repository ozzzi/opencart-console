<?php

namespace Ozzzi\Console\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_to_category';

    public $timestamps = false;

    protected $fillable = ['category_id'];
}