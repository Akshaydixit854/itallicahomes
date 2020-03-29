<?php

namespace App\Http\Controllers\Admin;

use App\PropertyType;
use App\PropertyTypeImageGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use Auth;
use Session;
use Spatie\TranslationLoader\LanguageLine;

class AddPropertyTypes extends Controller
{
     /**
    *
    * allow admin only
    *
    */

    public function __construct() {
        $this->middleware('role:admin|superadmin|superadmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = PropertyType::orderBy('id','DESC')->get();
        return view('admin.add-property-types.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add-property-types.create');
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
            'type_name'  => 'required',
            'description' => 'required',
            'ui_color' => 'required'
        ]);

        $propertyType = new PropertyType();
        $propertyType->type_name = $request->get('type_name');

        $propertyType->name_italian = $request->get('name_italian');
        $propertyType->name_german = $request->get('name_german');

        $propertyType->content_italian = $request->get('content_italian');
        $propertyType->content_german = $request->get('content_german');

        $propertyType->description = $request->get('description');
        $propertyType->ui_color = $request->get('ui_color');
        $propertyType->ui_icon = $request->get('ui_icon');
        $propertyType->save();
        if($request->has('gallery_token') && $request->gallery_token != ''){
            $property_images = PropertyTypeImageGallery::where('temp_id', '=', $request->get('gallery_token'))->get();
            if($property_images){
                foreach($property_images as $property_image){
                    $image_list = PropertyTypeImageGallery::where('id',$property_image->id)->first();
                    $image_list->property_type_id = $propertyType->id;
                    $image_list->save();
                }
            }
        }

          LanguageLine::create([
          'group' => 'propertyType',
          'key' => 'propertyTypeName_'.$propertyType->id,
          'text' => [
              'en' => $propertyType->type_name,
              'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $propertyType->type_name,
              'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $propertyType->type_name
          ],
        ]);

        Session::flash('message', 'Property Type added Successfully');
        return redirect()->route('add-property-types.index');


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
        /*dd(23131);*/
        $property_type = PropertyType::findOrFail($id);
        
        $gallery_images = PropertyTypeImageGallery::where('property_type_id',$id)->get();
       /* dd($gallery_images);*/
        return view('admin.add-property-types.edit', compact('gallery_images','property_type'));
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
            'type_name'  => 'required',
            'description' => 'required',
            'ui_color' => 'required',
        ]);


        $item = PropertyType::findOrFail($id);
        $item->type_name = $request->type_name;
        $item->name_italian = $request->get('name_italian');
        $item->name_german = $request->get('name_german');
        $item->content_italian = $request->get('content_italian');
        $item->content_german = $request->get('content_german');
        $item->description = $request->description;
        $item->ui_color = $request->ui_color;
        if($request->get('ui_icon')){
            $item->ui_icon = $request->get('ui_icon');
        }

        $item->save();
        if($request->has('gallery_token') && $request->gallery_token != ''){
            $property_images = PropertyTypeImageGallery::where('temp_id', '=', $request->get('gallery_token'))->get();
            if($property_images){
                foreach($property_images as $property_image){
                    $image_list = PropertyTypeImageGallery::where('id',$property_image->id)->first();
                    $image_list->property_type_id = $id;
                    $image_list->save();
                }
            }
        }

           LanguageLine::create([
          'group' => 'propertyType',
          'key' => 'propertyTypeName_'.$item->id,
          'text' => [
              'en' => $item->type_name,
              'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $item->type_name,
              'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $item->type_name
          ],
        ]);

        Session::flash('message', 'Success');
        return redirect()->route('add-property-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $item = PropertyType::findOrFail($id);
        $item->delete();
        Session::flash('message', 'Record Deleted Successfully..!');
        return redirect()->back();
    }
    public function delete_property_type_image(Request $request){
        $property_image = PropertyTypeImageGallery::where('temp_id',$request->uniqid)->where('real_name',$request->name)->first();
        if($property_image){
            $delete = PropertyTypeImageGallery::where('temp_id',$request->uniqid)->where('real_name',$request->name)->delete();
            $image_path = "images/cover-images/".$property_image->image;  // Value is not URL but directory file path
            unlink($image_path);
        }
    }

}
