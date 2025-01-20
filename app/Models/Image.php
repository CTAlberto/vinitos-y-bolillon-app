<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Image extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'fk_id', 'is_active'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'fk_id');
    }

}
