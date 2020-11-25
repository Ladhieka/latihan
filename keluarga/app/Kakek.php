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

    public function cucus()
    {
        return $this->hasManyThrough('App\Cucu','App\Anak','kakek_id','anak_id','id','id');
    }
}
