<?php

namespace App\Http\Controllers\Admin;

use App\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Spatie\TranslationLoader\LanguageLine;

class AddDestination extends Controller
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
       /* dd(21313);*/
        //
        $destinations = Destination::OrderBy('id','DESC')->get();
        return view('admin.add-destination.index',compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add-destination.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'destination_name'  => 'required',
            'description' => 'required',
            'cover_image' => 'required'
        ]);

        $coverImageName = "";
        if($file = $request->file('cover_image')) {
            $name = $file->getClientOriginalName();
            $tmp = explode('.', $file->getClientOriginalName());
            $coverImageName = round(microtime(true)) . '.' . end($tmp);
            $file->move('images/destination-covers', $coverImageName);

        }
        $destination = new Destination();
        $destination->destination_name = $request->get('destination_name');
        $destination->description = $request->get('description');
          $destination->name_italian = $request->name_italian;
          $destination->name_german = $request->name_german;
           $destination->italian = ($request->get('italian') != '') ? $request->get('italian'): $request->get('description');
        $destination->german = ($request->get('german')!== '')? $request->get('german'): $request->get('description');
        $destination->cover_image = $coverImageName;
        $destination->save();
        LanguageLine::create([
          'group' => 'destination',
          'key' => 'destination_description_'.$destination->id,
          'text' => [
              'en' => $destination->description,
              'it' => $request->has('italian') && $request->italian != '' ? $request->italian : $destination->description,
              'de' => $request->has('german') && $request->german != '' ? $request->german : $destination->description
          ],
        ]);
        LanguageLine::create([
            'group' => 'destination',
            'key' => 'destination_title_'.$destination->id,
            'text' => [
                'en' => $destination->destination_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $destination->destination_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $destination->destination_name
            ],
        ]);
        Session::flash('message', 'Record Added Successfully..!');
        return redirect()->route('add-destination.index');


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
      /*  dump($id);*/
        $destination = Destination::findOrFail($id);
        $language_line = LanguageLine::where('key','destination_description_'.$id)->first();
        $language_line_title = LanguageLine::where('key','destination_title_'.$id)->first();
       /* dump($language_line);*/
        return view('admin.add-destination.edit', compact('language_line','language_line_title','destination'));
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
            'destination_name'  => 'required',
            'description' => 'required'
        ]);


        $coverImageName = "";
        if($file = $request->file('cover_image')) {
            $name = $file->getClientOriginalName();
            $tmp = explode('.', $file->getClientOriginalName());
            $coverImageName = round(microtime(true)) . '.' . end($tmp);
            $file->move('images/destination-covers', $coverImageName);

        }

        $item = Destination::findOrFail($id);
        $item->destination_name = $request->destination_name;
           $item->name_italian = $request->name_italian;
          $item->name_german = $request->name_german;
        $item->description = $request->description;
         $item->italian = ($request->get('desc_italian') != '') ? $request->get('desc_italian'): '';
        $item->german = ($request->get('desc_german')!== '')? $request->get('desc_german'):'';
        if($coverImageName != ""){
            $item->cover_image = $coverImageName;
        }
        $item->save();
        $language = LanguageLine::where('key','destination_description_'.$item->id)->delete();
        LanguageLine::create([
          'group' => 'destination',
          'key' => 'destination_description_'.$item->id,
          'text' => [
              'en' => $item->description,
              'it' => $request->has('desc_italian') && $request->desc_italian != '' ? $request->desc_italian : $item->description,
              'de' => $request->has('desc_german') && $request->desc_german != '' ? $request->desc_german : $item->description
          ],
        ]);
        $language = LanguageLine::where('key','destination_title_'.$item->id)->delete();
        LanguageLine::create([
            'group' => 'destination',
            'key' => 'destination_title_'.$item->id,
            'text' => [
                'en' => $item->destination_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $item->destination_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $item->destination_name
            ],
        ]);

        Session::flash('message', 'Record Updated Successfully..!');
        return redirect()->route('add-destination.index');
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
        $item = Destination::findOrFail($id);
        $item->delete();
        Session::flash('message', 'Record Deleted Successfully..!');
        return redirect()->back();
    }
}
