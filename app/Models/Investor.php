<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'number', 'linkedin', 'where', 'industries', 'region', 'type', 'how_much', 'how_many', 'note'];
}
