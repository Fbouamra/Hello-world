<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionResquest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options=Option::OrderBy('created_at','desc')->paginate(3);

        return view ('admin.options.index',compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.options.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionResquest $request)
    {

            $Option=Option::create($request->all());


       $messageText=$Option->name.' a ete bien ajoutée';
        return redirect()->route('admin.option.index')->with('success',$messageText);



    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        return view ('admin.options.edit',compact('option'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionResquest $request, Option $Option)
    {
        // Validate the request data
        $validatedData = $request->validated();

        // Update the Option with the validated data
        $Option->update($validatedData);

        // Redirect back to the Option index page with a success message
        return redirect()->route('admin.option.index')->with('success', 'Option updated successfully');
        //flashMessage('success', 'Option updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $Option)
    {
        $Option->delete();
        return redirect()->route('admin.option.index')->with('success',"L'enregistrement a bien été suprimer");
    }
    public function deleteAlloptions(){
        Option::truncate();
    }
}
