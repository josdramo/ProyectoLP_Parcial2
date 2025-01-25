<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Obtener todos los eventos
    public function index() {
        return Event::all();
    }
    
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);
    
        $event = Event::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'created_by' => auth()->id(),
        ]);
    
        return response()->json($event, 201);
    }
    
    public function join($id) {
        $event = Event::findOrFail($id);
        $event->participants()->attach(auth()->id());
    
        return response()->json(['message' => 'Unido al evento con éxito'], 200);
    }
}

