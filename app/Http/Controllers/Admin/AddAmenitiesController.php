<?php

namespace App\Http\Controllers\Admin;

use App\Amenities;
use App\Location;
use App\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use Auth;
use Session;
use Spatie\TranslationLoader\LanguageLine;

class AddAmenitiesController extends Controller
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
        $amenitiess = Amenities::all();
        return view('admin.add-amenities.index',compact('amenitiess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add-amenities.create');
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
            'amenities_name'  => 'required',
            'amenities_display_name'  => 'required'
        ]);

        /*$name = 'null';
        $newImageName = 'null';

        //check if file attached
        if($file = $request->file('item_image')){
            $tmp = explode('.', $file->getClientOriginalName());//get client file name
            $name = $file->getClientOriginalName();
            $newImageName = round(microtime(true)).'.'.end($tmp);
            $file->move(storage_path('app\public\products'), $newImageName);
        }

        Item::create(array_merge($request->all(),['item_image' => $newImageName, 'user_id' => Auth::user()->id]));*/

        $amenities = new Amenities();
        $amenities->amenities_display_name = $request->get('amenities_display_name');
        $amenities->amenities_name = $request->get('amenities_name');
        $amenities->save();

        LanguageLine::create([
            'group' => 'ameneties',
            'key' => 'ameneties_name_'.$amenities->id,
            'text' => [
                'en' => $amenities->amenities_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $amenities->amenities_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $amenities->amenities_name
            ],
        ]);
        LanguageLine::create([
          'group' => 'ameneties',
          'key' => 'ameneties_display_name_'.$amenities->id,
          'text' => [
              'en' => $amenities->amenities_display_name,
              'it' => $request->has('italian') && $request->italian != '' ? $request->italian : $amenities->amenities_display_name,
              'de' => $request->has('german') && $request->german != '' ? $request->german : $amenities->amenities_display_name
          ],
        ]);

        Session::flash('message', 'Record Added Successfully..!');

        return redirect()->route('add-amenities.index');

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
        $amenities = Amenities::findOrFail($id);
        $language_line = LanguageLine::where('key','ameneties_display_name_'.$id)->first();
        $language_line_title = LanguageLine::where('key','ameneties_name_'.$id)->first();
        return view('admin.add-amenities.edit', compact('amenities','language_line','language_line_title'));
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
            'amenities_name'  => 'required',
            'amenities_display_name'  => 'required'
        ]);

        $amenities = Amenities::findOrFail($id);
        $amenities->amenities_display_name = $request->get('amenities_display_name');
        $amenities->amenities_name = $request->get('amenities_name');
        $amenities->save();

        $language = LanguageLine::where('key','ameneties_name_'.$amenities->id)->delete();

        LanguageLine::create([
            'group' => 'ameneties',
            'key' => 'ameneties_name_'.$amenities->id,
            'text' => [
                'en' => $amenities->amenities_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $amenities->amenities_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $amenities->amenities_name
            ],
        ]);

        $language = LanguageLine::where('key','ameneties_display_name_'.$amenities->id)->delete();

        LanguageLine::create([
          'group' => 'ameneties',
          'key' => 'ameneties_display_name_'.$amenities->id,
          'text' => [
              'en' => $amenities->amenities_display_name,
              'it' => $request->has('italian') && $request->italian != '' ? $request->italian : $amenities->amenities_display_name,
              'de' => $request->has('german') && $request->german != '' ? $request->german : $amenities->amenities_display_name
          ],
        ]);

         Session::flash('message', 'Record Updated Successfully..!');
        return redirect()->route('add-amenities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $amenities = Amenities::findOrFail($id);
        $amenities->delete();
        Session::flash('message', 'Record Deleted Successfully..!');
        return redirect()->back();
    }
}
