<?php

namespace App\Http\Controllers\Admin;

use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Spatie\TranslationLoader\LanguageLine;

class AddRegion extends Controller
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
        $regions = Region::orderBy('id','DESC')->get();
        return view('admin.add-region.index',compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add-region.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->file());
        //
        $request->validate([
            'region_name'  => 'required',
            'description' => 'required'
        ]);
        $image_name = '';

        if($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $tmp = explode('.', $file->getClientOriginalName());
            $image_name= sha1(round(microtime(true)) . '.' . end($tmp));
            $file->move('images/cover-images', $image_name);
        }
        $region = new Region();
        $region->region_name = $request->get('region_name');
        $region->description = $request->get('description');
        $region->image = $image_name;
        $region->save();
        LanguageLine::create([
            'group' => 'region',
            'key' => 'region_title_'.$region->id,
            'text' => [
                'en' => $region->region_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $region->region_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $region->region_name
            ],
        ]);
        LanguageLine::create([
          'group' => 'region',
          'key' => 'region_description_'.$region->id,
          'text' => [
              'en' => $region->description,
              'it' => $request->has('italian') && $request->italian != '' ? $request->italian : $region->description,
              'de' => $request->has('german') && $request->german != '' ? $request->german : $region->description
          ],
        ]);
        Session::flash('message', 'Record Added Successfully..!');
        return redirect()->route('add-region.index');
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
        $region = Region::findOrFail($id);
        $language_line = LanguageLine::where('key','region_description_'.$id)->first();
        $language_line_title = LanguageLine::where('key','region_title_'.$id)->first();
        return view('admin.add-region.edit', compact('language_line','language_line_title','region'));
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
            'region_name'  => 'required',
            'description' => 'required'
        ]);
        //dd($request->file('image'));
        $item = Region::findOrFail($id);
        $image_name = '';
        if($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $tmp = explode('.', $file->getClientOriginalName());
            $image_name= sha1(round(microtime(true)) . '.' . end($tmp));
            $file->move('images/cover-images', $image_name);
            $item->image = $image_name;
        }
        $item->region_name = $request->region_name;
        $item->description = $request->description;
        $item->save();
        $language = LanguageLine::where('key','region_title_'.$item->id)->delete();
        LanguageLine::create([
            'group' => 'region',
            'key' => 'region_title_'.$item->id,
            'text' => [
                'en' => $item->region_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $item->region_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $item->region_name
            ],
        ]);
        $language = LanguageLine::where('key','region_description_'.$item->id)->delete();
        LanguageLine::create([
          'group' => 'region',
          'key' => 'region_description_'.$item->id,
          'text' => [
              'en' => $item->description,
              'it' => $request->has('italian') && $request->italian != '' ? $request->italian : $item->description,
              'de' => $request->has('german') && $request->german != '' ? $request->german : $item->description
          ],
        ]);
        Session::flash('message', 'Record Updated Successfully..!');
        return redirect()->route('add-region.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $item = Region::findOrFail($id);
        $item->delete();
        Session::flash('message', 'Record Deleted Successfully..!');
        return redirect()->back();
    }
}
