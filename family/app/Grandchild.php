<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grandchild extends Model
{
    protected $fillable = ['child_id','name'];
    protected $hidden   = ['created_at','updated_at'];

    public function children()
    {
        return $this->belongsTo('App\Child');
    }

    public function toys()
    {
        return $this->belongsToMany(Toy::class);
    }
}
