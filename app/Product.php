<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function categoryProduct()
    {
        return $this->hasOne(CategoryProduct::class, 'id', 'category_product_id');
    }
    public function location()
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }

}
