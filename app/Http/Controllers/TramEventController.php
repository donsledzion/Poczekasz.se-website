<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use App\Models\TramEvent;
use App\Models\User;
use App\Models\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TramEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tramEvents=TramEvent::orderBy('id', 'desc')->get();
        return view('tramevents.list', [
        'tramevents'=> $tramEvents,
        'header' => "Lista wydarzeń poczekasz.se"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nazwa=Auth::user()->name ?? "Anonim";
        return view('tramevents.create',[
            'header' => 'Dodaj wydarzenie (jako: '.$nazwa.')',
            'lines' => Line::all(),
            'eventcategories' => EventCategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'eventcategory_id' => 'required',
        ]);
        $poststatus=0;
        if($request->hasFile('image')){
            $request->image_path = $request->file('image')->store("tram_events");
        }
        if($request->author_id){
            $user= User::find($request->author_id);
            if($user->permissions >= 256){
                $poststatus=1;
            }
        }
        TramEvent::create([
            'image_path' => $request->image_path ?? null,
            'title' => $request->title,
            'author_id' => $request->author_id,
            'line_id' => $request->line_id,
            'eventcategory_id' => $request->eventcategory_id,
            'post_status' => $poststatus,
        ]);

        return redirect()->route('wroclaw.welcome');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TramEvent  $trainEvent
     * @return \Illuminate\Http\Response
     */
    public function show(TramEvent $tramEvent)
    {
        return view('tramevents.show',compact('tramEvent'))->with('header', 'Prezentacja wydarzenia '.$tramEvent->title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TramEvent  $trainEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(TramEvent $tramEvent)
    {
        return view('tramevents.edit',compact('tramEvent'))->with('header', 'Edycja wydarzenia '.$tramEvent->title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TramEvent  $trainEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TramEvent $tramEvent)
    {
        $tramEvent->update($request->validated()->all());
        return redirect()->route('tramevents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TramEvent  $tramEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(TramEvent $tramEvent)
    {
        $tramEvent->delete();
        return redirect()->route('tramevents.index');
    }
}
