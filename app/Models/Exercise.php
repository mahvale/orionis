<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'chapter_id', 'part_id'];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function td()
    {
        return $this->belongsTo(Td::class);
    }

    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function corrections()
    {
        return $this->hasMany(Correction::class);
    }

     public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
