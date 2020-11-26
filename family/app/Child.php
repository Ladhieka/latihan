<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = ['grandfather_id','name'];
    protected $hidden   = ['created_at','updated_at'];

    public function grandchild()
    {
        return $this->hasMany('App\Grandchild');
    }

    public function grandfather()
    {
        return $this->belongsTo('App\Grandfather');
    }
}
