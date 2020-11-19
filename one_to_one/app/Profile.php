<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['first_name', 'last_name'];
    protected $hidden = ['created_at','updated_at'];

    public function personal_informations () {
        return $this->hasOne(Personal_Information::class);
    }
}
