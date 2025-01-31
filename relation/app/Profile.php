<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id','phone','address'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
