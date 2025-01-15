<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Statistic extends Model
{
    use HasFactory;

    protected $fillable = ['id_event', 'attendance', 'applicants'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
}
