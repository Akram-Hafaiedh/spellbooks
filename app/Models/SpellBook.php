<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpellBook extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'file_path'];
}
