<?php

namespace Ozzzi\Console\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    protected $table = 'product_description';

    public $timestamps = false;

    protected $fillable = [
        'language_id',
        'name',
        'description',
        'tag',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];
}