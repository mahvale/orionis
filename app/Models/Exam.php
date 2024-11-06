<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category', 'year', 'date', 'file', 'is_official'];

    public function correction()
    {
        return $this->hasOne(Correction::class);
    }

   
}
