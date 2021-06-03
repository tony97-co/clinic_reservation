<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{



    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }


    public function doctor()
    {
        return $this->h(Doctor::class);
    }}
