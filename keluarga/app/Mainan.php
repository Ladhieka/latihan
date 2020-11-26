<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mainan extends Model
{
    protected $fillable = ['name'];

    public function cucu()
    {
        return $this->belongsToMany('App\Cucu', 'cucu_mainan');
    }
}
