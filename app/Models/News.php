<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table= "news";



    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
