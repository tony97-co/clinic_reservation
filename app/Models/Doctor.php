<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table= "doctors";


    public function clinic(){

        return $this->hasOne('Clinic::Class');

    }


    public function interview(){

        return $this->hasMany('Interview::Class');

    }


    public function specialist(){

        return $this->hasOne('Specialist::Class');

    }
}
