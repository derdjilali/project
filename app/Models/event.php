<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description','photo', 'start_date','type'];
    
    public function gallery()
    {
        return $this->hasMany(event_gallery::class, 'event_id');
    }
}
