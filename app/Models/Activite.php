<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory; 
    public $table = ' activites';

    protected $fillable = [
        'matiere',
        'date',
        'contenu',
        'fichie',
        'd_periode',
    ];
}
