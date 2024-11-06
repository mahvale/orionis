<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
     protected $fillable = ['user_id', 'chapter_id', 'rating','td_id','tp_id'];

      public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

     public function td()
    {
        return $this->belongsTo(Td::class);
    }

    public function tp()
    {
        return $this->belongsTo(Tp::class);
    }
}
