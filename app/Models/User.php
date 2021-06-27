<?php

namespace App\Models;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Lap_doctor;
use App\Models\Clinic;
use App\Models\Complaint;
use App\Models\News;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'remember_token',
        'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function clinic()
    {
        return $this->belongsToMany(Clinic::Class);
    }


    public function patient()
    {
        return $this->hasOne(Patient::Class);
    }

<<<<<<< HEAD
    public function doctor()
    {
        return $this->hasOne(Doctor::Class);
    }
    

=======
>>>>>>> 608ac3f1d4f31ddd7d21937e2048605918a3e1c4

    public function isdoctor()
    {
        return $this->role == 'doctor';
    }
    public function lap_doctor()
    {
        return $this->role == 'lapDoctor';
    }
    public function admin()
    {
        return $this->role == 'admin';
    }
    public function superAdmin()
    {
        return $this->role == 'superAdmin';
        }

    public function complaint()
    {
        return $this->hasMany(Complaint::Class);
    }


    public function news()
    {
        return $this->hasMany(News::Class);
    }


}
