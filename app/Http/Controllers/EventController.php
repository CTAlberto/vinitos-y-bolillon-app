<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Método para devolver los eventos en formato JSON
    public function getEvents(Request $request)
{
    $category = $request->query('category');

    $query = Event::select(
        'id', 
        'title_event as title',
        'ini_date as start', 
        'end_date as end',
        'id_category'
    );

    if($category) {
        $query->where('id_category', $category);
    }

    $events = $query->get();

    return response()->json($events);
}
}
