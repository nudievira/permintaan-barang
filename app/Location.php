<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = false;

}
