<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Es para decirle a laravel las etiquetas que pueden ser llenadas y asi evitar inyeccioon de 
    protected $fillable = ['title', 'description', 'due_date', 'status'];
}
