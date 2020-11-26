<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grandfather extends Model
{
    protected $fillable = ['name'];
    protected $hidden   = ['created_at','updated_at'];

    public function children()
    {
        return $this->hasMany('App\Child');
    }

    public function grandchildren()
    {
        return $this->hasManyThrough('App\Grandchild','App\Child','grandfather_id','child_id','id','id');
    }
}
