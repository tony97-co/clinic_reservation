<?php

namespace App\Models;
use App\Models\User;

use App\Models\Interview;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table= "patients";


    public function interveiw(){

        return $this->hasMany(Interview::Class);

    }

    public function user()
    {
        return $this->belongsTo(User::Class);
    }

}
