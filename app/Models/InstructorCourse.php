<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class InstructorCourse extends Model
{
    use HasFactory;

    protected $table = 'instructors_courses';

    protected $fillable = ['id_instructor', 'id_event'];
}
