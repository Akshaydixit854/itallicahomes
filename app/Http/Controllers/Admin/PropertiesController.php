<?php

namespace App\Http\Controllers\Admin;

use App\Amenities;
use App\Agent;
use App\Condition;
use App\Destination;
use App\Offer;
use App\Area;
use App\Property;
use App\Location;
use App\PropertyAmenities;
use App\PropertyFeature;
use App\PropertyType;
use App\PropertyImageGallery;
use App\PropertyTypeImageGallery;
use App\Settings;
use App\Region;
use App\PropertyPreview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use Auth;
use Session;
use Cookie;
use App;
use File;
use Redirect;
use Illuminate\Support\Facades\DB;
use Spatie\TranslationLoader\LanguageLine;

class PropertiesController extends Controller
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
    public function index(Request $request)
    {   
        $type = $request->input('avail_type');
      /*  dump($type);*/
        if($type == 'Y' || $type == 'S' ){
            $properties = Property::orderBy('id','DESC')->where('availability',$type)->get();
        } 
        else {
            $properties = Property::orderBy('id','DESC')->get();
        }
        
        return view('admin.properties.index',compact('properties','type'));
    }
    public function check_availability($id = null,$type = null,$property_id = null){
        if(!is_null($property_id) && !is_null($type)){
            if($type == 'add'){
                $check = Property::where('property_id',$id)->first();
                if($check){
                    return 1;
                }else{
                    return 0;
                }
            }
            if($type == 'edit'){
                $check = Property::where('property_id',$id)->where()->count();
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = Settings::find(1);
        $locations = Location::all();
        $regions = Region::all();
        $conditions = Condition::all();
        $types = PropertyType::all();
        $offers = Offer::all();
        $areas = Area::all();
        $destinations = Destination::all();
        $amenities = Amenities::all();
        $agencies = Agent::all();
        $check_for_sequence = Property::max('sequence_id');
        if($check_for_sequence == ''){
            $sequence = '100';
        }else{
            $sequence = $check_for_sequence + 1;
        }
        return view('admin.properties.create',compact('agencies','sequence','areas','amenities','destinations','offers','locations','types','conditions','settings','regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function image_gallery(Request $request,$id){
        if($id != '' && !empty($request->file('file'))){
            foreach($request->file('file') as $picture){
                $file_name = time();
                $file_name .= rand();
                $file_name = sha1($file_name);
                if ($picture) {
                    $name = $picture->getClientOriginalName();
                    $tmp = explode('.', $picture->getClientOriginalName());
                    $coverImageName = $file_name;
                    $picture->move('images/cover-images', $coverImageName);

                    $property_image_gallery = new PropertyImageGallery();
                    $property_image_gallery->image = $coverImageName;
                    $property_image_gallery->temp_id = $id;
                    $property_image_gallery->real_name = $name;
                    $property_image_gallery->save();
                }
            }
            return '1';
        }
    }
    public function type_image_gallery(Request $request,$id){
        if($id != '' && !empty($request->file('file'))){
            foreach($request->file('file') as $picture){
                $file_name = time();
                $file_name .= rand();
                $file_name = sha1($file_name);
                if ($picture) {
                    $name = $picture->getClientOriginalName();
                    $tmp = explode('.', $picture->getClientOriginalName());
                    $coverImageName = $file_name;
                    $picture->move('images/cover-images', $coverImageName);

                    $property_image_gallery = new PropertyTypeImageGallery();
                    $property_image_gallery->image = $coverImageName;
                    $property_image_gallery->temp_id = $id;
                    $property_image_gallery->save();
                }
            }
            return '1';
        }
    }
    public function property_preview($temp_id = null,Request $request){
        $coverImageName = "";

        if($file = $request->file('cover_image')) {
            $name = $file->getClientOriginalName();
            $tmp = explode('.', $file->getClientOriginalName());
            $coverImageName = round(microtime(true)) . '.' . end($tmp);
            $file->move('images/cover-images', $coverImageName);
            $property = PropertyPreview::where('temp_id',$temp_id)->first();
            if(!$property){
                $property = new PropertyPreview();
            }
            $property->cover_image_name = $coverImageName;
            $property->save();
            return 1;
        }
        if($request->has('temp_id') && $request->temp_id != ''){
            $property = PropertyPreview::where('temp_id',$request->temp_id)->first();
            if(!$property){
                $property = new PropertyPreview();
            }
            $property->temp_id = $request->get('temp_id');
            $property->name = $request->get('name');
            $property->name_in_italian = $request->get('name_italian') != '' ? $request->get('name_italian') : $request->get('name');
            $property->name_in_german = $request->get('name_german') != '' ? $request->get('name_german') : $request->get('name');
            $property->property_id = $request->get('property_id');

            $property->short_description = $request->get('short_description');
            $property->short_description_in_italian = $request->get('short_description_in_italian');
            $property->short_description_in_german = $request->get('short_description_in_german');

            $property->detail_description_in_german = $request->get('detail_description_in_german');
            $property->detail_description_in_italian = $request->get('detail_description_in_italian');
            $property->detail_description = $request->get('detail_description');
            $property->beds = $request->get('beds');
            $property->baths = $request->get('baths');
            $property->plot_size = $request->get('plot_size');
            $property->living_area = $request->get('living_area');
            $property->parking = $request->get('parking');
            $property->availability = $request->get('availability');
            $property->property_location_latitude = $request->get('latitude');
            $property->property_location_longitude = $request->get('longitude');

            $property->terrace = $request->get('terrace');
            $property->fire_place = $request->get('fire_place');

            $property->sequence_id = $request->get('property_id');
            $property->property_sequence_id = $request->get('property_id').$request->get('property_sequence_id');
            //$property->address = $request->get('address');
            $property->type_id = $request->get('type_id');
            //$property->special_price = $request->get('special_price');
            $property->condition_id = $request->get('condition_id');
            $property->region_id = $request->get('region_id');
            $property->offer_id = $request->get('offer_id');
            $property->destination_id = $request->get('destination_id');


            $property->price = $request->get('price');
            $property->price_upon_request = $request->get('price_upon_request');
            $property->agent_id = $request->get('agent_id');
            $property->kitchens = $request->get('kitchens');
            $property->area_id = $request->get('area_id');
            $property->vat = $request->get('vat');
            $property->save();
            $ameneties = PropertyAmenities::where('temp_id',$request->temp_id)->first();
            if($ameneties){
                $delete = PropertyAmenities::where('temp_id',$request->temp_id)->delete();
            }
            if($request->has('ameneties') && !empty($request->ameneties)){
                foreach($request->ameneties as $amenity_id){
                    $property_ameneties = new PropertyAmenities();
                    $property_ameneties->property_id = NULL;
                    $property_ameneties->amenity_id = $amenity_id;
                    $property_ameneties->temp_id = $request->temp_id;
                    $property_ameneties->save();
                }
            }
            return 'Success';
        }
    }
    public function store(Request $request)
    {

        $request->validate([
            'name'  => 'required',
            'property_id' => 'required|unique:properties',
            'short_description'  => 'required',
            'detail_description'  => 'required',
            'beds'  => 'required|numeric',
            'baths'  => 'required|numeric',
            'plot_size'  => 'required|numeric',
            'living_area'  => 'required|numeric',
            'parking'  => 'required|numeric',
            'availability'  => 'required',
            'property_location_latitude'  => 'required',
            'property_location_longitude'  => 'required',
            'cover_image' => 'required',
            'region_id' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required'
            //'address' => 'required'
        ]);

        $coverImageName = "";
        if($file = $request->file('cover_image')) {
            $name = $file->getClientOriginalName();
            $tmp = explode('.', $file->getClientOriginalName());
            $coverImageName = round(microtime(true)) . '.' . end($tmp);
            $file->move('images/cover-images', $coverImageName);
        }

        $property = new Property();
        $property->name = preg_replace('/\s+/', ' ',trim($request->get('name')));
        $property->name_in_italian = $request->get('name_italian') != '' ? preg_replace('/\s+/', ' ',$request->get('name_italian')) : preg_replace('/\s+/', ' ',trim($request->get('name')));
        $property->name_in_german = $request->get('name_german') != '' ? preg_replace('/\s+/', ' ',$request->get('name_german')) : preg_replace('/\s+/', ' ',trim($request->get('name')));

        $property->property_id = $request->get('property_id');
        $property->temp_id = $request->get('gallery_token');
        $property->short_description = $request->get('short_description');
        $property->detail_description = $request->get('detail_description');
        $property->beds = $request->get('beds');
        $property->baths = $request->get('baths');
        $property->plot_size = $request->get('plot_size');
        $property->living_area = $request->get('living_area');
        $property->parking = $request->get('parking');
        $property->availability = $request->get('availability');
        $property->property_location_latitude = $request->get('property_location_latitude');
        $property->property_location_longitude = $request->get('property_location_longitude');

        $property->terrace = $request->get('terrace');
        $property->fire_place = $request->get('fireplace');

        $property->sequence_id = $request->get('property_id');
        $property->property_sequence_id = $request->get('property_id').$request->get('property_sequence_id');
        //$property->address = $request->get('address');
        $property->type_id = $request->get('type_id');
        $property->special_price = $request->get('price_upon_request');
        $property->condition_id = $request->get('condition_id');
        $property->region_id = $request->get('region_id');
        $property->offer_id = $request->get('offer_id');
        $property->destination_id = $request->get('destination_id');
        $property->cover_image_name = $coverImageName;
        $property->price = $request->get('price');
        $property->agent_id = $request->get('agent_id');
        $property->kitchens = $request->get('kitchens');
        $property->area_id = $request->get('area_id');
        $property->vat = $request->get('vat');
        $property->meta_title = trim($request->get('meta_title'));
        $property->meta_title_italian = $request->get('meta_title_italian') != '' ? $request->get('meta_title_italian') : $request->get('meta_title');
        $property->meta_title_german = $request->get('meta_title_german') != '' ? $request->get('meta_title_german') : $request->get('meta_title');
        $property->meta_description = trim($request->get('meta_description'));
        $property->meta_description_italian = $request->get('meta_description_italian') != '' ? $request->get('meta_description_italian') : $request->get('meta_description');
        $property->meta_description_german = $request->get('meta_description_german') != '' ? $request->get('meta_description_german') : $request->get('meta_description');
        $property->save();

        //customized
        if($request->has('ameneties') && !empty($request->ameneties)){
            foreach($request->ameneties as $amenity_id){
                $property_ameneties = new PropertyAmenities();
                $property_ameneties->property_id = $property->id;
                $property_ameneties->amenity_id = $amenity_id;
                $property_ameneties->save();
            }
        }
        LanguageLine::create([
          'group' => 'property',
          'key' => 'property_'.$property->id,
          'text' => [
              'en' => $property->detail_description,
              'it' => $request->has('italian') && $request->italian != '' ? $request->italian : $property->detail_description,
              'de' => $request->has('german') && $request->german != '' ? $request->german : $property->detail_description
          ],
        ]);
        LanguageLine::create([
            'group' => 'property',
            'key' => 'property_title_'.$property->id,
            'text' => [
                'en' => $property->name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $property->name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $property->name
            ],
          ]);

        LanguageLine::create([
        'group' => 'property',
        'key' => 'property_short_desc_'.$property->id,
        'text' => [
            'en' => $property->short_description,
            'it' => $request->has('italian_short_description') && $request->italian_short_description != '' ? $request->italian_short_description : $property->short_description,
            'de' => $request->has('german_short_description') && $request->german_short_description != '' ? $request->german_short_description : $property->short_description
            ],
        ]);

        LanguageLine::create([
        'group' => 'property',
        'key' => 'property_meta_title_'.$property->id,
        'text' => [
            'en' => $property->meta_title,
            'it' => $request->has('meta_title_italian') && $request->meta_title_italian != '' ? $request->meta_title_italian : $property->meta_title,
            'de' => $request->has('meta_title_german') && $request->meta_title_german != '' ? $request->meta_title_german : $property->meta_title
            ],
        ]);

        LanguageLine::create([
        'group' => 'property',
        'key' => 'property_meta_desc_'.$property->id,
        'text' => [
            'en' => $property->meta_description,
            'it' => $request->has('meta_description_italian') && $request->meta_description_italian != '' ? $request->meta_description_italian : $property->meta_description,
            'de' => $request->has('meta_description_german') && $request->meta_description_german != '' ? $request->meta_description_german : $property->meta_description
            ],
        ]);

        if($request->has('gallery_token') && $request->gallery_token != ''){
            $property_images = PropertyImageGallery::where('temp_id', '=', $request->get('gallery_token'))->get();
            if($property_images){
                foreach($property_images as $property_image){
                    $image_list = PropertyImageGallery::where('id',$property_image->id)->first();
                    $image_list->property_id = $property->id;
                    $image_list->save();
                }
            }
        }
        if($request->has('source') && $request->source == 'preview'){
            return redirect('/admin/single_property/'.$property->id);
        }
        if($request->has('source') && $request->source == 'card'){
            return redirect('/admin/property_card/'.$property->id);
        }
        Session::flash('message', 'Success');
        return redirect()->route('properties.index');

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
        $property = Property::findOrFail($id);
      //  dd($property);
        $settings = Settings::find(1);
        $locations = Location::all();
        $conditions = Condition::all();
        $types = PropertyType::all();
        $offers = Offer::all();
        $regions = Region::all();
        $destinations = Destination::all();
        $areas = Area::all();
        $selected_ameneties = PropertyAmenities::where('property_id',$id)->pluck('amenity_id')->toArray();
        $amenities = Amenities::all();
        $gallery_images = PropertyImageGallery::where('property_id',$id)->get();
        $language_line = LanguageLine::where('key','property_'.$id)->first();
        $language_line_title = LanguageLine::where('key','property_title_'.$id)->first();
        $language_line_short_desc  = LanguageLine::where('key','property_short_desc_'.$id)->first();
        $language_line_meta_title  = LanguageLine::where('key','property_meta_title_'.$id)->first();
        $language_line_meta_desc = LanguageLine::where('key','property_meta_desc_'.$id)->first();

        $agencies = Agent::all();
        return view('admin.properties.edit', compact('agencies','language_line_short_desc','language_line_title','areas','language_line','property','locations','types','settings','conditions','offers','destinations','amenities','regions','selected_ameneties','gallery_images','language_line_meta_title','language_line_meta_desc'));
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
        //dd($request);
        $request->validate([
            'name'  => 'required',
            'short_description'  => 'required',
            'detail_description'  => 'required',
            'beds'  => 'required',
            'baths'  => 'required',
            'plot_size'  => 'required',
            'living_area'  => 'required',
            'parking'  => 'required',
            'availability'  => 'required',
            'property_location_latitude'  => 'required',
            'property_location_longitude'  => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required'
            //'address' => 'required'
        ]);

        $coverImageName = "";
        if($file = $request->file('cover_image')) {
            $name = $file->getClientOriginalName();
            $tmp = explode('.', $file->getClientOriginalName());
            $coverImageName = round(microtime(true)) . '.' . end($tmp);
            $file->move('images/cover-images', $coverImageName);

        }

        $property = Property::findOrFail($id);
        $property->name = preg_replace('/\s+/', ' ',trim($request->get('name')));
        $property->name_in_italian = $request->get('name_italian') != '' ? preg_replace('/\s+/', ' ', $request->get('name_italian')) : preg_replace('/\s+/', ' ',trim($request->get('name')));
        $property->name_in_german = $request->get('name_german') != '' ? preg_replace('/\s+/', ' ', $request->get('name_german')) : preg_replace('/\s+/', ' ',trim($request->get('name')));
        $property->short_description = $request->get('short_description');
        $property->detail_description = $request->get('detail_description');
        $property->beds = $request->get('beds');
        $property->baths = $request->get('baths');
        $property->plot_size = $request->get('plot_size');
        $property->living_area = $request->get('living_area');
        $property->parking = $request->get('parking');
        $property->availability = $request->get('availability');
        $property->property_location_latitude = $request->get('property_location_latitude');
        $property->property_location_longitude = $request->get('property_location_longitude');

        $property->terrace = $request->get('terrace');
        $property->fire_place = $request->get('fireplace');
        //$property->address = $request->get('address');
        $property->type_id = $request->get('type_id');
        $property->condition_id = $request->get('condition_id');
        $property->offer_id = $request->get('offer_id');
        $property->sequence_id = $request->get('property_id');
        $property->property_sequence_id = $request->get('property_sequence_id');
        $property->agent_id = $request->get('agent_id');
        //$property->special_price = $request->get('special_price');
        $property->destination_id = $request->get('destination_id');
        $property->region_id = $request->get('region_id');
        $property->price = $request->get('price');
        $property->price_upon_request = $request->get('price_upon_request');
        $property->vat = $request->get('vat');
        $property->kitchens = $request->get('kitchens');
        $property->area_id = $request->get('area_id');
        if($coverImageName != "") {
            $property->cover_image_name = $coverImageName;
        }
         $property->meta_title = trim($request->get('meta_title'));
        $property->meta_title_italian = $request->get('meta_title_italian') != '' ? $request->get('meta_title_italian') : $request->get('meta_title');
        $property->meta_title_german = $request->get('meta_title_german') != '' ? $request->get('meta_title_german') : $request->get('meta_title');
        $property->meta_description = trim($request->get('meta_description'));
        $property->meta_description_italian = $request->get('meta_description_italian') != '' ? $request->get('meta_description_italian') : $request->get('meta_description');
        $property->meta_description_german = $request->get('meta_description_german') != '' ? $request->get('meta_description_german') : $request->get('meta_description');

        $property->save();
        $ameneties = PropertyAmenities::where('property_id',$property->id)->first();
        if($ameneties){
            $delete = PropertyAmenities::where('property_id',$property->id)->delete();
        }
        if($request->has('ameneties') && !empty($request->ameneties)){
            foreach($request->ameneties as $amenity_id){
                $property_ameneties = new PropertyAmenities();
                $property_ameneties->property_id = $property->id;
                $property_ameneties->amenity_id = $amenity_id;
                $property_ameneties->save();
            }
        }
        $language = LanguageLine::where('key','property_'.$property->id)->delete();
        LanguageLine::create([
            'group' => 'property',
            'key' => 'property_'.$property->id,
            'text' => [
                'en' => $property->detail_description,
                'it' => $request->has('italian') && $request->italian != '' ? $request->italian : $property->detail_description,
                'de' => $request->has('german') && $request->german != '' ? $request->german : $property->detail_description
            ],
          ]);
        $desc = LanguageLine::where('key','property_title_'.$property->id)->delete();
        LanguageLine::create([
            'group' => 'property',
            'key' => 'property_title_'.$property->id,
            'text' => [
                'en' => $property->name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $property->name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $property->name
            ],
          ]);
        $shrt_desc = LanguageLine::where('key','property_short_desc_'.$property->id)->delete();
        LanguageLine::create([
            'group' => 'property',
            'key' => 'property_short_desc_'.$property->id,
            'text' => [
                'en' => $property->short_description,
                'it' => $request->has('italian_short_description') && $request->italian_short_description != '' ? $request->italian_short_description : $property->short_description,
                'de' => $request->has('german_short_description') && $request->german_short_description != '' ? $request->german_short_description : $property->short_description
                ],
        ]);

        LanguageLine::create([
        'group' => 'property',
        'key' => 'property_meta_title_'.$property->id,
        'text' => [
            'en' => $property->meta_title,
            'it' => $request->has('meta_title_italian') && $request->meta_title_italian != '' ? $request->meta_title_italian : $property->meta_title,
            'de' => $request->has('meta_title_german') && $request->meta_title_german != '' ? $request->meta_title_german : $property->meta_title
            ],
        ]);

        LanguageLine::create([
        'group' => 'property',
        'key' => 'property_meta_desc_'.$property->id,
        'text' => [
            'en' => $property->meta_description,
            'it' => $request->has('meta_description_italian') && $request->meta_description_italian != '' ? $request->meta_description_italian : $property->meta_description,
            'de' => $request->has('meta_description_german') && $request->meta_description_german != '' ? $request->meta_description_german : $property->meta_description
            ],
        ]);

        if($request->has('gallery_token') && $request->gallery_token != ''){
            $property_images = PropertyImageGallery::where('temp_id', '=', $request->get('gallery_token'))->get();
            if($property_images){
                foreach($property_images as $property_image){
                    $image_list = PropertyImageGallery::where('id',$property_image->id)->first();
                    $image_list->property_id = $property->id;
                    $image_list->save();
                }
            }
        }

        Session::flash('message', 'Updated');
        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();
        Session::flash('message', 'Record Deleted Successfully !');
        return redirect()->route('properties.index');
    }
    public function custom_delete($id)
    {
        //
        $property = Property::findOrFail($id);
        $property->delete();
        Session::flash('message', 'Deleted!');
        return redirect()->route('properties.index');
    }
    public function destroy_image_gallery($id){
        $property_image = PropertyImageGallery::findOrFail($id);
        $delete1 = PropertyImageGallery::where('property_id',null)->delete();
        $image_path = "images/cover-images/".$property_image->image;  // Value is not URL but directory file path
        unlink($image_path);
        $property_image->delete();
        Session::flash('message', 'Deleted');
        return redirect()->back();
    }
    public function destroy_image($id)
    {
        $item = PropertyTypeImageGallery::findOrFail($id);
        $item->delete();
        Session::flash('message', 'Success');
        return redirect()->back();
    }
    public function delete_gallery_image(Request $request){

        $property_image = PropertyImageGallery::where('temp_id',$request->uniqid)->where('real_name',$request->name)->first();
        if($property_image){
            $delete = PropertyImageGallery::where('temp_id',$request->uniqid)->where('real_name',$request->name)->delete();
            $image_path = "images/cover-images/".$property_image->image;  // Value is not URL but directory file path
            unlink($image_path);
        }
    }
    public function findProperty($id){

        $property = PropertyPreview::where('availability','Y')->where('temp_id',$id)->first();
        if(!$property){
            return redirect()->back();
        }
        $destination_name = 'N/A';
        if($property->destination_id != ''){
            $destination = Destination::find($property->destination_id);
            if($destination){
                $destination_name = $destination->destination_name;
            }
        }
        $active = 'home';
        $propertyTypes = PropertyType::all();
        $regions = Region::find($property->region_id);
        $types = PropertyType::find($property->type_id);
        $locations = Location::find($property->location_id);
        $conditions = Condition::find($property->condition_id);
        $areas = Area::find($property->area_id);
        $offers = Offer::all();
        $amenities = PropertyAmenities::with('amenities')->where('temp_id',$id)->get()->toArray();

        $gallery_images = PropertyImageGallery::where('temp_id',$id)->get();
        return view('admin.properties.single-property',compact('destination_name','areas','related_properties','active','property','propertyTypes','gallery_images','fav','regions','types','locations','conditions','amenities'));
    }
    public function property_card($id){
      /*  dump($id);*/
        $active = 'home';
        $propertyTypes = PropertyType::all();
        $properties1 = PropertyPreview::where('temp_id',$id)->get();
      /*  dump($properties);*/
        return view('admin.properties.favourites',compact('active','properties1','propertyTypes'));
    }
    public function property_preview_edit($temp_id = null,Request $request){
      /*  dd($request->cover_image);*/
        $coverImageName = "";
        if($file = $request->file('cover_image')) {
            $name = $file->getClientOriginalName();
            $tmp = explode('.', $file->getClientOriginalName());
            $coverImageName = round(microtime(true)) . '.' . end($tmp);
            $file->move('images/cover-images', $coverImageName);
            $property = PropertyPreview::where('temp_id',$temp_id)->first();
            if(!$property){
                $property = new PropertyPreview();
            }
            $property->cover_image_name = $coverImageName;
            $property->save();
            return 1;
        }

        if($request->has('temp_id') && $request->temp_id != ''){
            $property = PropertyPreview::where('temp_id',$request->temp_id)->first();
            if(!$property){
                $property = new PropertyPreview();
            }
            $property->temp_id = $request->get('temp_id');
            $property->name = $request->get('name');
            $property->name_in_italian = $request->get('name_italian') != '' ? $request->get('name_italian') : $request->get('name');
            $property->name_in_german = $request->get('name_german') != '' ? $request->get('name_german') : $request->get('name');
            $property->property_id = $request->get('property_id');

            $property->short_description = $request->get('short_description');
            $property->short_description_in_italian = $request->get('short_description_in_italian');
            $property->short_description_in_german = $request->get('short_description_in_german');

            $property->detail_description_in_german = $request->get('detail_description_in_german');
            $property->detail_description_in_italian = $request->get('detail_description_in_italian');
            $property->detail_description = $request->get('detail_description');
            $property->beds = $request->get('beds');
            $property->baths = $request->get('baths');
            $property->plot_size = $request->get('plot_size');
            $property->living_area = $request->get('living_area');
            $property->parking = $request->get('parking');
            $property->availability = $request->get('availability');
            $property->property_location_latitude = $request->get('latitude');
            $property->property_location_longitude = $request->get('longitude');

            if($request->has('cover_image') && $request->cover_image != ''){
                $property->cover_image_name = $request->cover_image;
            }

            $property->terrace = $request->get('terrace');
            $property->fire_place = $request->get('fire_place');

            $property->sequence_id = $request->get('property_id');
            $property->property_sequence_id = $request->get('property_id').$request->get('property_sequence_id');
            //$property->address = $request->get('address');
            $property->type_id = $request->get('type_id');
            //$property->special_price = $request->get('special_price');
            $property->condition_id = $request->get('condition_id');
            $property->region_id = $request->get('region_id');
            $property->offer_id = $request->get('offer_id');
            $property->destination_id = $request->get('destination_id');


            $property->price = $request->get('price');
            $property->price_upon_request = $request->get('price_upon_request');
            $property->agent_id = $request->get('agent_id');
            $property->kitchens = $request->get('kitchens');
            $property->area_id = $request->get('area_id');
            $property->vat = $request->get('vat');
            $property->save();
            $ameneties = PropertyAmenities::where('temp_id',$request->temp_id)->first();
            if($ameneties){
                $delete = PropertyAmenities::where('temp_id',$request->temp_id)->delete();
            }
            if($request->has('ameneties') && !empty($request->ameneties)){
                foreach($request->ameneties as $amenity_id){
                    $property_ameneties = new PropertyAmenities();
                    $property_ameneties->property_id = NULL;
                    $property_ameneties->amenity_id = $amenity_id;
                    $property_ameneties->temp_id = $request->temp_id;
                    $property_ameneties->save();
                }
            }
            return 'Success';
        }
    }
}
