<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FpbItem extends Model
{
    protected $table = 'fpb_item';
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

}
