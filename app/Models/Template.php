<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    // Defina os atributos que podem ser atribuídos em massa
    protected $fillable = ['id','title', 'group', 'tags', 'content'];
}
