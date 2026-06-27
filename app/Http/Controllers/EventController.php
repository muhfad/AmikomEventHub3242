<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show()
    {
        return view('event-detail');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function ticket()
    {
        return view('ticket');
    }
}
