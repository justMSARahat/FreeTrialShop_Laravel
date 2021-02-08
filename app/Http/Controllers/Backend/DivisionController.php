<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\country;
use App\Models\Backend\division;
use file;
use image;


class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $division = division::orderBy('name','asc')->get();
        return view('backend.pages.division.manage',compact('division') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = country::orderBy('name','asc')->get();
        return view('backend.pages.division.create',compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
        [
            'name' => 'required| max:250'
        ],
        [
            'name.required' => 'Please Insert a Name'
        ]);

        $division = new division();

        $division->name        = $request->name;
        $division->slug        = Str::slug($request->name);
        $division->country_id  = $request->country_id;      
        $division->priority    = $request->priority;    

        $division->save();

        $nofty = array(
            'message' => 'Division Added',
            'alert-type' => 'success'
        );

        return redirect()->route('division.manage')->with($nofty);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $division = division::find($id);
        $country = country::orderBy('name','asc')->get();
        if( !is_null($division) ){
            return view('backend.pages.division.edit',compact('division','country'));
        }
        else{
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $division = division::find($id);

        $division->name        = $request->name;
        $division->slug        = Str::slug($request->name);
        $division->country_id  = $request->country_id;      
        $division->priority    = $request->priority;    

        $division->save();

        $nofty = array(
            'message' => 'Division Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('division.manage')->with($nofty);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
