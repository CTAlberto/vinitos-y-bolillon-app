<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_category', 'title_event', 'subtitle', 'description', 'content', 'requirements',
        'ini_date', 'end_date', 'price', 'location', 'capacity', 'language'  ,'latitude', 
        'longitude',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function instructors()
    {
        return $this->belongsToMany(Instructor::class, 'instructors_courses', 'id_event', 'id_instructor');
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'event_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'fk_id');
    }

    public function statistics()
    {
        return $this->hasOne(Statistic::class, 'id_event');
    }
}
