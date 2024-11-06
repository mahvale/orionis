<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correction extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'type', 'file', 'exercise_id','evaluation_id','exam_id'];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

     public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
