<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\country;
use App\Models\Backend\division;
use App\Models\Backend\district;
use file;
use image;


class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $district = district::orderBy('name','asc')->get();
        return view('backend.pages.district.manage',compact('district') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $division = division::orderBy('name','asc')->get();
        return view('backend.pages.district.create',compact('division') );
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
                'name'  => 'required',
            ],[
                'name.required' => 'Please Insrt a Name'
            ]
        );

        $district = new district();

        $district->name          = $request->name;
        $district->slug          = Str::slug($request->name);
        $district->priority      = $request->priority;
        $district->division_id   = $request->division_id;

        $district->save();

        $nofty = array(
            'message' => 'District Added',
            'alert-type' => 'success'
        );

        return redirect()->route('district.manage')->with($nofty);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $district = district::find($id);
        $division = division::orderBy('name','asc')->get();
        if( !is_null($district) ){
            return view('backend.pages.district.edit',compact('district','division'));
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
        $district = district::find($id);

        $district->name        = $request->name;
        $district->slug        = Str::slug($request->name);
        $district->division_id = $request->division_id;      
        $district->priority    = $request->priority;    

        $district->save();

        $nofty = array(
            'message' => 'District Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('district.manage')->with($nofty);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = district::find($id);
        if( !is_null($district) ){
            $district->delete();
            $nofty = array(
                'message' => 'district Removed',
                'alert-type' => 'warning' 
            );
            return back()->with($nofty);
        }
        else{
            return back();
        }
    }
}
