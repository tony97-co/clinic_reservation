<?php

namespace App\Models;
use App\Models\Doctors;
use App\Models\User;
use App\Models\Lap_doctor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $table= "clinics";


    public function user()
    {
        return $this->hasMany(User::Class);
    }

    public function doctor(){

        return $this->hasMany(Doctor::Class);

    }

    public function lap_doctor(){

        return $this->hasMany(Lap_doctor::Class);

    }

    public function examination(){

        return $this->hasMany(Examination::Class);

    }
}
