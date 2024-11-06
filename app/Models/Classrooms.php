<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classrooms extends Model
{
    use HasFactory;

     protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
 
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function professors()
    {
        return $this->belongsToMany(Professor::class, 'classroom_professor');
    }
}
