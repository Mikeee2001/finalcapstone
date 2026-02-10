<?php

namespace App\Http\Controllers\Admin;

use App\Models\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        $events = Events::latest()->get();
        return view('admin.events', compact('events'));
    }

    public function createEvents(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'event_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_time' => 'required|date|after_or_equal:today',
            'end_time' => 'required|date|after_or_equal:start_time',
            'description' => 'nullable|string',
            'status' => 'required|in:upcoming,ongoing,completed',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

       $events = Events::create([
            'event_name' => $request->event_name,
            'location' => $request->location,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'description' => $request->description,
            'status' => $request->status,
        ]);

         if ($events) {
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 500);
        }
    }

    public function deleteEvents($id)
    {
        $events = Events::findOrFail($id);
        $events->delete();

        return redirect()->route('admin.events')->with('success', 'Event deleted successfully!');
    }
}
