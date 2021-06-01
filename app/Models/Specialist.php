<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    protected $table= "specialists";



    public function doctor(){

        return $this->belongsTo('Doctor::Class');

    }

}
