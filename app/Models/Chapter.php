<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'course_id'];

     // Relations
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

     public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
 