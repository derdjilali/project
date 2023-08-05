<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = ['bus_name', 'contact', 'number', 'company', 'email', 'level', 'type', 'comment'];
}
