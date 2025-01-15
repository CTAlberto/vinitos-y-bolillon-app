<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tel', 'email', 'event_id', 'validation', 'reason'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
