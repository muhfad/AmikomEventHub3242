<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::with('category')->where('date', '>=', now())->orderBy('date', 'asc')->get();
        return view('welcome', compact('events'));
    }
}
