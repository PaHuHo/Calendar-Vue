<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Events;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $calendar = Calendar::with('events')->get();
        $lastCalendarId=Calendar::latest()->first();
        return response()->json([
            'calendar' => $calendar,
            'lastCalendarId'=>$lastCalendarId
        ], 200);
    }
    public function add(Request $request,$id)
    {
        $calendar = new Calendar();
        $calendar->event_id=$id;
        $calendar->start_day = $request->start;
        $calendar->end_day = $request->end;
        $calendar->save();
        return response()->json([
            'calendar' => $calendar
        ], 200);
    }
    public function addNewEvent(Request $request)
    {
        $events=new Events();
        $events->title=$request->title;
        $events->short_story=$request->short_story;
        $events->icon=$request->icon;
        $events->color=$request->color;
        $events->save();

        $event_id=  Events::latest()->first();

        $calendar = new Calendar();
        $calendar->event_id=$event_id->id;
        $calendar->start_day = $request->start;
        $calendar->end_day = $request->end;
        $calendar->save();
        return response()->json([
            'calendar' => $calendar
        ], 200);
    }
    public function store(Request $request, $id)
    {
        $calendar = Calendar::find($id);
        $calendar->start_day = $request->start;
        $calendar->end_day = $request->end;
        $calendar->save();
        return response()->json([
            'calendar' => $calendar
        ], 200);
    }

    public function delete($id)
    {
        $calendar = Calendar::where('id', $id)->delete();
        return response()->json([
            'calendar' => $calendar
        ], 200);
    }
}
