<?php

namespace Ozzzi\Console\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table = 'product_attribute';

    public $timestamps = false;

    protected $fillable = [
        'attribute_id',
        'language_id',
        'text'
    ];
}