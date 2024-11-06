<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
 
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
 protected $fillable = [
        'name', 'email', 'password', 'classroom_id', 'payment_status', 'payment_expiry','avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function classroom()
    {
        return $this->belongsTo(Classrooms::class);
    }

    // Vérifier si l'utilisateur a payé
    public function hasPaid()
    {
        return $this->payment_status === 'paid' && $this->payment_expiry >= now();
    }

            public function professor()
        {
            return $this->hasOne(Professor::class);
        }

     public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function isProfessor()
    {
        return $this->hasOne(Professor::class, 'user_id')->exists();
    }

}
 