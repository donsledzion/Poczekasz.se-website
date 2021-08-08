<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=EventCategory::orderBy('name', 'asc')->get();
        return view('categories.list', [
            'categories' => $categories,
            'header' => 'Kategorie wydarzeń MPK Wrocław',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create', [
            'header' => 'Dodaj kategorię'
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
            'name' => 'required',
        ]);

        EventCategory::create([
            'name' => $request->name,
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventCategory  $eventCategory
     * @return \Illuminate\Http\Response
     */
    /*
     public function show(EventCategory $eventCategory)
    {
        //
    }
        /\ Funkcja nie powinna być używana najlepiej do usunięcia
    */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventCategory  $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(EventCategory $category)
    {
        return view('categories.edit',compact('category'))->with('header', 'Edycja kategorii '.$category->name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventCategory  $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventCategory $category)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category->fill(['name' => $request->name]);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventCategory  $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventCategory $category)
    {
        $tobedeleted=EventCategory::find($category);
        EventCategory::destroy($tobedeleted);
        //EventCategory::destroy($category);

        /*if ($deleted) {
            return back()->with('message:success', 'Deleted');
        } else {
            return back()->with('message:error', 'Error');
        }*/
        return redirect()->route('categories.index')->with('success','Kategoria usunięta pomyślnie');;
    }
}
