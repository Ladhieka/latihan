<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal_Information extends Model
{
    protected $fillable = ['user_id','agama'];
    protected $hidden = ['created_at','updated_at'];
}
