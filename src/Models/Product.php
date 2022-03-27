<?php

namespace Ozzzi\Console\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $primaryKey = 'product_id';

    public $timestamps = false;

    public $fillable = [
        'product_id',
        'model',
        'sku',
        'upc',
        'ean',
        'jan',
        'isbn',
        'mpn',
        'location',
        'quantity',
        'stock_status_id',
        'image',
        'manufacturer_id',
        'shipping',
        'price',
        'points',
        'tax_class_id',
        'date_available',
        'weight',
        'weight_class_id',
        'length',
        'width',
        'height',
        'length_class_id',
        'subtract',
        'minimum',
        'sort_order',
        'status',
        'viewed',
        'date_added',
        'date_modified',
    ];

    protected $attributes = [
        'upc' => '',
        'ean' => '',
        'jan' => '',
        'isbn' => '',
        'mpn' => '',
        'location' => '',
    ];

    protected $casts = [
        'date_available' => 'datetime:Y-m-d H:i:s',
        'date_added' => 'datetime:Y-m-d H:i:s',
        'date_modified' => 'datetime:Y-m-d H:i:s',
    ];

    public function attribute()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'product_id');
    }

    public function description()
    {
        return $this->hasMany(ProductDescription::class, 'product_id', 'product_id');
    }

    public function category()
    {
        return $this->hasOne(ProductCategory::class, 'product_id', 'product_id');
    }

    public function layout()
    {
        return $this->hasOne(ProductLayout::class, 'product_id', 'product_id');
    }

    public function store()
    {
        return $this->hasOne(ProductStore::class, 'product_id', 'product_id');
    }
}