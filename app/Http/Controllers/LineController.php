<?php

namespace App\Http\Controllers;

use App\Models\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lines=Line::orderBy('line_name', 'asc')->get();
        return view('lines.list', [
            'lines' => $lines,
            'header' => 'Lista linii MPK Wrocław',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lines.create', [
            'header' => 'Dodaj linię'
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
            'line_name' => 'required',
            'status' => 'required',
        ]);

        Line::create([
            'line_name' => $request->line_name,
            'status' => $request->status,
        ]);
        return redirect()->route('lines.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Line  $line
     * @return \Illuminate\Http\Response
     */
    /*
    public function show(Line $line)
    {
        //
    }
        /\ Funkcja nie powinna być używana
    */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function edit(Line $line)
    {
        return view('lines.edit',compact('line'))->with('header', 'Edycja linii '.$line->name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Line $line)
    {
        $request->validate([
            'line_name' => 'required',
            'status' => 'required',
        ]);
        $line->update($request->all());
        return redirect()->route('lines.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function destroy(Line $line)
    {
        $line->delete();
        $tobodeleteda=Line::find($line);
        Line::destroy($tobodeleteda);
        return redirect()->route('lines.index')->with('success','Linia usunięta pomyślnie');;
    }
}
