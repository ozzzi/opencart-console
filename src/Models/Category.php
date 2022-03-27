<?php

namespace Ozzzi\Console\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $primaryKey = 'category_id';

    public $timestamps = false;

    public $fillable = [
        'category_id',
        'image',
        'parent_id',
        'top',
        'column',
        'sort_order',
        'status',
        'date_added',
        'date_modified',
    ];

    protected $casts = [
        'date_added' => 'datetime:Y-m-d H:i:s',
        'date_modified' => 'datetime:Y-m-d H:i:s',
    ];

    public function description()
    {
        return $this->hasMany(CategoryDescription::class, 'category_id', 'category_id');
    }

    public function path()
    {
        return $this->hasMany(CategoryPath::class, 'category_id', 'category_id');
    }

    public function layout()
    {
        return $this->hasOne(CategoryLayout::class, 'category_id', 'category_id');
    }

    public function store()
    {
        return $this->hasOne(CategoryStore::class, 'category_id', 'category_id');
    }
}