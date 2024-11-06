<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cahier extends Model
{
    use HasFactory;

    public $table = 'cahier';

    protected $fillable = [
        'titre',
        'cour',
        'img',
        'id_p',
    ];
}
