<?php

namespace App\Http\Controllers\Admin;
use Spatie\TranslationLoader\LanguageLine;
use App\Location;
use App\PropertyType;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use Auth;
use Session;


class AddLocationsController extends Controller
{
     /**
    *
    * allow admin only
    *
    */

    public function __construct() {
        $this->middleware('role:admin|superadmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $locations = Location::all();
        return view('admin.add-location.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        return view('admin.add-location.create',compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'location_name'  => 'required',
            'region_id' => 'required'
        ]);

        $location = new Location();
        $location->location_name = $request->get('location_name');
        $location->region_id = $request->get('region_id');
        $location->save();
        LanguageLine::create([
            'group' => 'location',
            'key' => 'location_title_'.$location->id,
            'text' => [
                'en' => $location->location_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $location->location_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $location->location_name
            ],
        ]);
        Session::flash('message', 'Record Added Successfully..!');
        return redirect()->route('add-location.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $location = Location::findOrFail($id);
        $regions = Region::all();
        $language_line_title = LanguageLine::where('key','location_title_'.$id)->first();

        return view('admin.add-location.edit', compact('location','regions','language_line_title'));
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
        //
        $request->validate([
            'location_name'  => 'required',
            'region_id' => 'required'
        ]);

        $item = Location::findOrFail($id);
        $item->location_name = $request->location_name;
        $item->region_id = $request->region_id;
        $item->save();
        $language = LanguageLine::where('key','location_title_'.$item->id)->delete();
        LanguageLine::create([
            'group' => 'location',
            'key' => 'location_title_'.$item->id,
            'text' => [
                'en' => $item->offer_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $item->location_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $item->location_name
            ],
        ]);
        Session::flash('message', 'Record Updated Successfully..!');
        return redirect()->route('add-location.index');
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
        $lcoation = Location::findOrFail($id);
        /*$lcoation->delete();*/
        Session::flash('message', 'Record Deleted Successfully..!');
        return redirect()->back();
    }
}
