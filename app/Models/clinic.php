<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $table= "clinics";


    public function user()
    {
        return $this->hasMany('User::Class');
    }

    public function doctor(){

        return $this->belongsToMany('Doctor::Class');

    }

    public function lap_doctor(){

        return $this->hasMany('Lap_doctor::Class');

    }

    public function examination(){

        return $this->hasMany('Examination::Class');

    }
}
