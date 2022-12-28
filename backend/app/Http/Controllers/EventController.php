<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EventController extends Controller
{
    public function index(){
        $events=Events::where('is_delete',1)->get();
        return response()->json([
            'events' => $events
        ], 200);
    }

    public function add(Request $request){

        $messages = [
            'title.required' => 'Vui lòng nhập event name',
            'short_story.max' => 'Short story tối đa 40 ký tự',
        ];
        $this->validate($request, [
            'title' => 'required',
            'short_story' => 'max:40',
        ],$messages);

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
        $messages = [
            'title.required' => 'Vui lòng nhập event name',
            'short_story.max' => 'Short story tối đa 40 ký tự',
        ];
        $this->validate($request, [
            'title' => 'required',
            'short_story' => 'max:40',
        ],$messages);
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
        $event=Events::find($id);
        $event->is_delete=0;
        $event->save();
        return response()->json([
            'events' => $event
        ], 200);
    }
}
