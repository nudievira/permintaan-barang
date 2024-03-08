<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_product';
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
