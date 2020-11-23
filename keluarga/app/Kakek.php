<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kakek extends Model
{
    protected $fillable = ['name'];
    protected $hidden   = ['created_at','updated_at'];

    public function anaks()
    {
        return $this->hasMany('App\Anak');
    }
}
