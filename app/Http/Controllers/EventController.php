<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function show(Event $event)
    {
        $event->load('reviews.user');

        $averageRating = round(
            $event->reviews()->avg('rating'),
            1
        );

        return view(
            'events.show',
            compact(
                'event',
                'averageRating'
            )
        );
    }
}