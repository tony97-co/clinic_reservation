<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model

{
    protected $table= "examinations";


    public function clinic(){
    return $this->belongsTo('Clinic::Class')
    }
}

