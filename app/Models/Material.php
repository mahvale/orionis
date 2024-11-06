<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'type', 'file', 'chapter_id', 'part_id','external_file','td_id','tp_id','exercise_id','evaluation_id'];

    // Relations
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

     public function tp()
    {
        return $this->belongsTo(Tp::class);
    }

     public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
}
