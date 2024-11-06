<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'is_permanent','images'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classrooms::class, 'professor_classroom', 'professor_id', 'classroom_id');
    }
}
 