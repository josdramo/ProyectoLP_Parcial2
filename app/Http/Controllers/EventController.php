<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Obtener todos los eventos
    public function index()
    {
        return Event::all();
    }

    // Crear un nuevo evento
    public function store(Request $request)
    {
        $event = Event::create($request->all());
        return response()->json($event, 201);
    }
}
