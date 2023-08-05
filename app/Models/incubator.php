<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incubator extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'wilaya', 'photo', 'desc'];
}
