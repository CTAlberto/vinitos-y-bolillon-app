<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Instructor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'bio', 'language'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'instructors_courses', 'id_instructor', 'id_event');
    }
}
