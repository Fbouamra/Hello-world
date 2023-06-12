<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyFilterRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties=Property::orderby('created_at','desc')->paginate(2);
        return view('property.biens',compact('properties'));
    }
    public function miniatures(PropertyFilterRequest $request){
        $query = Property::query();

        // Filter by title
        if ($request->validated('title')) {
            $title = $request->validated('title');
            $query->where('title', 'like', "%$title%");
        }

        // Filter by price
        if ($request->validated('price') ) {

            $price = $request->validated('price');
            $query->where('price','>', $price);
        }

        // Filter by surface
        if ($request->validated('surface') ) {
            $surface = $request->validated('surface');
            $query->where('surface','>', $surface);
        }

        // Filter by rooms
        if ($request->validated('rooms'))  {
            $rooms = $request->validated('rooms');
            $query->where('rooms','>', $rooms);
        }
        $properties=$query->orderByDesc('created_at')->paginate(8);
        return view('property.miniatures',compact('properties'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
