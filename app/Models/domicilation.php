<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domicilation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'desc','number', 'email','birthday', 'have_a_label', 'label', 'wilaya'];
}
