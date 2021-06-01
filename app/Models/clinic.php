<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $table= "clinics";



    public function lap_doctor(){

        return $this->hasOne('Lap_doctor::Class');

    }
}
