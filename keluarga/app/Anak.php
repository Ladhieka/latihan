<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $fillable = ['kakek_id','name'];
    protected $hidden   = ['created_at','updated_at'];

    public function cucus()
    {
        return $this->hasMany('App\Cucu');
    }

    public function kakeks()
    {
        return $this->belongsTo('App\Kakek');
    }
}
