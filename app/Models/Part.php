<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'chapter_id'];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }
}
