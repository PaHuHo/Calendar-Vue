<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events=Events::all();
        return response()->json([
            'events' => $events
        ], 200);
    }

    public function add(Request $request){
        $events=new Events();
        $events->title=$request->title;
        $events->short_story=$request->short_story;
        $events->icon=$request->icon;
        $events->color=$request->color;
        $events->save();
        return response()->json([
            'events' => $events
        ], 200);
    }
    public function show($id){
        $event=Events::find($id);
        return response()->json([
            'event' => $event
        ], 200);
    }
    public function store(Request $request, $id){
        $calendar=Calendar::find($id);
        $events=Events::find($calendar->event_id);
        $events->title=$request->title;
        $events->short_story=$request->short_story;
        $events->save();
        return response()->json([
            'events' => $events
        ], 200);
    }

    public function delete( $id){
        $calendar=Calendar::where('event_id',$id)->delete();
        $events=Events::find($id);
        $events->delete();
        return response()->json([
            'events' => $events
        ], 200);
    }
}
