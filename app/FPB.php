<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FPB extends Model
{
    protected $table = 'fpb';
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function fpbItem()
    {
        return $this->hasMany(fpbItem::class, 'fpb_id', 'id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
