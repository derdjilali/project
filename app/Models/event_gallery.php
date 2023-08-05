<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_gallery extends Model
{
    use HasFactory;
    protected $fillable = ['event_id', 'image'];
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
