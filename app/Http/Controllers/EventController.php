<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Método para devolver los eventos en formato JSON
    public function getEvents()
    {
        $events = Event::select(
            'id', 
            'title_event as title', // Renombramos para que FullCalendar entienda
            'ini_date as start', 
            'end_date as end'
        )->get();

        return response()->json($events);
    }
}
