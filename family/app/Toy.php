<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toy extends Model
{
    protected $fillable = [
        'name'
    ];

    public function grandchildren()
    {
        return $this->belongsToMany(Grandchild::class);
    }
}
