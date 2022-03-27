<?php

namespace Ozzzi\Console\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryDescription extends Model
{
    protected $table = 'category_description';

    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'language_id',
        'name',
        'description',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];
}