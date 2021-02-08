<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\country;
use App\Models\Backend\division;
use file;
use image;


class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = country::orderBy('name','asc')->get();
        return view('backend.pages.country.manage',compact('country') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = new country();

        $country->name = $request->name;
        $country->slug = Str::slug($request->name);
        $country->priority = $request->priority;

        $country->save();
        $nofty = array(
            'message' => 'Country Added',
            'alert-type' => 'success'
        );

        return redirect()->route('country.manage')->with($nofty);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = country::find($id);
        if (!is_null($country)){
            return view('backend.pages.country.edit',compact('country'));
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
        $country = country::find($id);

        $country->name = $request->name;
        $country->slug = Str::slug($request->name);
        $country->priority = $request->priority;

        $country->save();
        $nofty = array(
            'message' => 'Country Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('country.manage')->with($nofty);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = country::find($id);
        if( !is_null($country) ){

            $division = division::where('country_id','$country->id')->get();
                foreach( $division as $division ){
                    $division->delete();
                }

            $country->delete();
            $nofty = array(
                'message' => 'Country Removed with All Division',
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($nofty);
        }
        else{
            return back();
        }
    }
}
