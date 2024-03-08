<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $table = 'departement';
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = false;

}
