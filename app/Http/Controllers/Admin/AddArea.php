<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Spatie\TranslationLoader\LanguageLine;

class AddArea extends Controller
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
        $areas = Area::orderBy('id','DESC')->get();
        return view('admin.add-area.index',compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add-area.create');
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
            'area_name'  => 'required',
            'description' => 'required'
        ]);

        $area = new Area();
        $area->area_name = $request->get('area_name');
        $area->description = $request->get('description');
        $area->save();

        LanguageLine::create([
            'group' => 'area',
            'key' => 'area_title_'.$area->id,
            'text' => [
                'en' => $area->area_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $area->area_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $area->area_name
            ],
        ]);
        LanguageLine::create([
          'group' => 'area',
          'key' => 'area_description_'.$area->id,
          'text' => [
              'en' => $area->description,
              'it' => $request->has('italian') && $request->italian != '' ? $request->italian : $area->description,
              'de' => $request->has('german') && $request->german != '' ? $request->german : $area->description
          ],
        ]);
        Session::flash('message', 'Record Added Successfully..!');
        return redirect()->route('add-area.index');

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
        $area = Area::findOrFail($id);
        $language_line = LanguageLine::where('key','area_description_'.$id)->first();
        $language_line_title = LanguageLine::where('key','area_title_'.$id)->first();
        return view('admin.add-area.edit', compact('area','language_line_title','language_line'));
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

        $request->validate([
            'area_name'  => 'required',
            'description' => 'required'
        ]);


        $item = Area::findOrFail($id);

        $item->area_name = $request->area_name;
        $item->description = $request->description;

        $item->save();

        $language = LanguageLine::where('key','area_title_'.$item->id)->delete();
        LanguageLine::create([
            'group' => 'area',
            'key' => 'area_title_'.$item->id,
            'text' => [
                'en' => $item->area_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $item->area_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $item->area_name
            ],
        ]);
        $language = LanguageLine::where('key','area_description_'.$item->id)->delete();
        LanguageLine::create([
          'group' => 'area',
          'key' => 'area_description_'.$item->id,
          'text' => [
              'en' => $item->description,
              'it' => $request->has('italian') && $request->italian != '' ? $request->italian : $item->description,
              'de' => $request->has('german') && $request->german != '' ? $request->german : $item->description
          ],
        ]);
        Session::flash('message', 'Record Updated Successfully..!');
        return redirect()->route('add-area.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Area::findOrFail($id);
        $item->delete();
        Session::flash('message', 'Record Deleted Successfully..!');
        return redirect()->back();
    }
}
