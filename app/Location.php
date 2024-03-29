<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function product()
    {
        return $this->hasMany(Product::class, 'location_id', 'id');
    }

}
