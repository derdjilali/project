<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training extends Model
{

    use HasFactory;
    protected $fillable = ['title', 'desc','location','diration', 'start_on', 'cover_img', 'cover_title', 'goals', 'training_for', 'how_learn'];
}
