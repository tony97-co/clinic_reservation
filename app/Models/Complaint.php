<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table= "complaints";


    public function user()
    {
        return $this->belongsTo('User::Class');
    }

}
