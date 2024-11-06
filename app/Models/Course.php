<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'classroom_id'];

    public function classroom()
    {
        return $this->belongsTo(Classrooms::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    

     public function tds()
    {
        return $this->hasMany(Td::class);
    }

    public function tps()
    {
        return $this->hasMany(Tp::class);
    }

    public function materials()
    {
        return $this->hasManyThrough(
            Material::class,
            Chapter::class,
            'course_id', // Foreign key on the chapters table
            'chapter_id', // Foreign key on the materials table
            'id', // Local key on the courses table
            'id' // Local key on the chapters table
        );
    }


    public function materiales()
    {
        return $this->hasManyThrough(
            Material::class,
            Td::class,
            'course_id', // Foreign key on the chapters table
            'td_id', // Foreign key on the materials table
            'id', // Local key on the courses table
            'id' // Local key on the chapters table
        );
    }

    public function materialtps()
    {
        return $this->hasManyThrough(
            Material::class,
            Tp::class,
            'course_id', // Foreign key on the chapters table
            'tp_id', // Foreign key on the materials table
            'id', // Local key on the courses table
            'id' // Local key on the chapters table
        );
    }

    public function exercises()
    {
        return $this->hasManyThrough(
            Exercise::class,
            Chapter::class,
            'course_id', // Foreign key on the chapters table
            'chapter_id', // Foreign key on the exercises table
            'id', // Local key on the courses table
            'id' // Local key on the chapters table php artisan make:migration add_course_id_to_course_professor_table --table=course_professor
        );
    }

    

    public function professors()
        {
            return $this->belongsToMany(Professor::class);
        }

        public function evaluations()
    {
        return $this->hasMany(Chapter::class);
    }
}
