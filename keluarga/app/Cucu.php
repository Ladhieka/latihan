<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cucu extends Model
{
    protected $fillable = ['anak_id','name'];
    protected $hidden   = ['created_at','updated_at'];

    public function anaks()
    {
        return $this->belongsTo('App\Anak');
    }

    public function mainan()
    {
        return $this->belongsToMany('App\Mainan', 'cucu_mainan');
    }
}
