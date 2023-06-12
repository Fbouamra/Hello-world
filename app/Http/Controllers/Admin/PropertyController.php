<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyResquest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties=Property::OrderBy('created_at','desc')->paginate(3);
        return view ('admin.properties.index',compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $options=Option::pluck('name','id');

        return view('admin.properties.create',compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyResquest $request)
    {

        if (isset($request->sold)) {
            $property=Property::create($request->all());


        }else{
            $request->merge(['sold' => false]);
            $property=Property::create($request->all());

        }
        // Sync the selected options with the property
        $options = $request->input('options', []);
        $property->options()->sync($options);

        return redirect()->route('admin.property.index')->with('success','Le bien a été bien ajouté !');



    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $options = Option::pluck('name', 'id');

        return view ('admin.properties.edit',compact('property','options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyResquest $request, Property $property)
    {
        // Validate the request data
        $validatedData = $request->validated();
        //Update the property with the validated data
        $property->update($validatedData);
        $property->options()->sync($request->options);

        // Redirect back to the property index page with a success message
        return redirect()->route('admin.property.index')->with('success', 'Property updated successfully');
        //flashMessage('success', 'Property updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.property.index')->with('success',"L'enregistrement a bien été suprimer");
    }
    public function deleteAllProperties(){
        Property::truncate();
    }
}
