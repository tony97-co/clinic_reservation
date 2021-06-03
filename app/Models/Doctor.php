<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table= "doctors";


    public function clinic(){

        return $this->hasMany('Clinic::Class');

    }


    public function interview(){

        return $this->hasMany('Interview::Class');

    }


    public function specialist(){

        return $this->belongsTo('Specialist::Class');

    }

    public function work_time(){

        return $this->hasOne('Work_time::Class');

    }
}
