<?php

namespace App\Http\Controllers;
use App;
use Config;
use Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Spatie\TranslationLoader\LanguageLine;
use App\Condition;
use App\ContactEnquiry;
use App\ContactFaq;
use App\Destination;
use App\Faq;
use App\Offer;
use App\Term;
use App\Area;
use App\Post;
use App\Amenities;
use App\Property;
use App\PropertyType;
use App\PropertyAmenities;
use App\Region;
use App\LegalNotice;
use App\Location;
use App\PrivacyPolicy;
use App\Services\PropertyService;
use App\Testimonials;
use App\PropertyImageGallery;
use App\BlogImageGallery;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Jorenvh\Share\ShareFacade as Share;
use PropertyOffer;
use Cookie;
use App\Favourites;
use App\PropertyEnquiry;
use Illuminate\Support\Facades\Mail;
use App\OwnerServices;
use App\BuyerServices;
use App\MetaTags;


class IndexController extends Controller
{
    private $propertyServices;

    public function __construct(PropertyService $propertyServices)
    {
        $this->propertyServices = $propertyServices;
    }
    public function index(Request $request)
    {   
        $language =  App::getLocale();
        $request->session()->put('language', $language);
        $propertyTypes = PropertyType::all();
        $regions = Region::all();
        $property_count = array();
        $meta_tags= MetaTags::first();
        if($regions){
            foreach($regions as $region){
                $property_data = Property::where('region_id',$region->id)->count();
                $property_count[$region->region_name] = $property_data;
            }
        }
        $properties = $this->propertyServices->getRecentProperties();
       /* dd($properties);*/
        $active = 'home';
        return view('ui.index',compact('properties','active','propertyTypes','property_count','meta_tags'));
    }

    public function about()
    {
        $propertyTypes = PropertyType::all();
        $active = 'about';
        $testimonials = Testimonials::all();
        return view('ui.about-us',compact('active','testimonials','propertyTypes'));
    }

    public function blog()
    {
        $propertyTypes = PropertyType::all();
        $active = 'blog';
        $posts = Post::where('is_available',1)->orderBy('id','DESC')->paginate(4);
        return view('ui.blog',compact('active','posts','propertyTypes'));
    }

    public function blogPost($name,Request $req)
    {
        $active = 'blog';
        $id='';
        if (is_numeric($name)) 
        { 
            $id = $name;
             $post = Post::where('is_available',1)->where('id',$id)->first();
        } else 
        { 
       $post_title =trim(str_replace('+',' ', $name));
        $post = Post::where('title','like','%'.$post_title.'%')->orWhere('name_german','like','%'.$post_title.'%')->orWhere('name_italian','like','%'.$post_title.'%')->first();

            if($post){
                $id=$post->id;
                 Session::put('post_id', $id);
            }
        }

        if(!$post){
            return redirect()->back();
        }

        $propertyTypes = PropertyType::all();
        
        $gallery_images = BlogImageGallery::where('post_id',$id)->get();
        return view('ui.single-blog',compact('gallery_images','active','post','propertyTypes'));
    }

    public function propertyPdf($id)
    {

        $property = Property::find($id);
        $destination_name = 'N/A';
        if($property->destination_id != ''){
            $destination = Destination::find($property->destination_id);
            if($destination){
                $destination_name = $destination->destination_name;
            }
        }
        $data = PropertyImageGallery::where('property_id',$id)->get()->take(5);
        $amenities = PropertyAmenities::with('amenities')->where('property_id',$id)->get()->toArray();
        $pdf = PDF::loadView('ui.email_enquiry', compact('data','property','destination_name','prop_amenities','amenities'));
        return $pdf->download('property.pdf');

    }


    public function getpdf() {
      return 1;
    }
   // }


    public function propertyPrint($id)
    {
        $property = Property::find($id);
        if(!$property){
            return redirect()->back();
        }
        $active = 'property';
         $destination_name = 'N/A';
        if($property->destination_id != ''){
            $destination = Destination::find($property->destination_id);
            if($destination){
                $destination_name = $destination->destination_name;
            }
        }
        $propertyTypes = PropertyType::all();
        $regions = Region::find($property->region_id);
        $locations = Location::find($property->location_id);
        $conditions = Condition::find($property->condition_id);
        $types = PropertyType::find($property->type_id);
        $amenities = PropertyAmenities::with('amenities')->where('property_id',$id)->get()->toArray();
        $data = PropertyImageGallery::where('property_id',$id)->get()->take(5);
        $selected_ameneties = PropertyAmenities::where('property_id',$id)->pluck('amenity_id')->toArray();

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('ui.pdf.single-property', compact('data','selected_ameneties','amenities','active','property','propertyTypes','regions','locations','conditions','types','destination_name'));
        return $pdf->stream('property.pdf');
    }

    public function blogPostPdf($id)
    {
        $propertyTypes = PropertyType::all();
        $active = 'blog';
        $post = Post::find($id);
        $gallery_images = BlogImageGallery::where('post_id',$id)->get();
        $pdf = PDF::loadView('ui.single-blog-v', compact('gallery_images','active','post','propertyTypes'));
        return $pdf->download('post.pdf');
    }

    public function blogPostPrint($id)
    {
        $propertyTypes = PropertyType::all();
        $active = 'blog';
        $post = Post::find($id);
        $gallery_images = BlogImageGallery::where('post_id',$id)->get();
        $pdf = PDF::loadView('ui.single-blog-v', compact('gallery_images','active','post','propertyTypes'));
        return $pdf->stream('post.pdf');
    }

    //Destination
    public function destinationPdf($id)
    {
        $propertyTypes = PropertyType::all();
        $active = 'destinations';
        $destination = Destination::find($id);
        $pdf = PDF::loadView('ui.single-destination-v', compact('active','destination','propertyTypes'));
        return $pdf->download('Destination.pdf');

    }

    public function destinationPrint($id)
    {
        $propertyTypes = PropertyType::all();
        $active = 'destinations';
        $destination = Destination::find($id);
        $pdf = PDF::loadView('ui.single-destination-v', compact('active','destination','propertyTypes'));
        return $pdf->stream('Destination.pdf');
    }

     public function owner_service(Request $request)
    {
        $active = 'ownerServices';
        $OwnerService = OwnerServices::orderBy('id','DESC')->first();
        return view('ui.services.owner',compact('active','OwnerService'));
    }
    
    public function buyer_service(Request $request)
    {
        $active = 'buyerServices';
        $buyerService = BuyerServices::orderBy('id','DESC')->first();
        return view('ui.services.buyer',compact('active','buyerService'));
    }

    public function contact()
    {

        $propertyTypes = PropertyType::all();
        $active = 'contact';
        return view('ui.contact',compact('active','propertyTypes'));
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email'  => 'required',
            'subject'  => 'required',
            'message'  => 'required'
        ]);


        $contactEnquiry = new ContactEnquiry();
        $contactEnquiry->name = $request->get('name');
        $contactEnquiry->email = $request->get('email');
        $contactEnquiry->subject = $request->get('subject');
        $contactEnquiry->message = $request->get('message');
        $contactEnquiry->save();

        $data = array(
            'id'=> $contactEnquiry->id,
            'name' => $contactEnquiry->name,
            'email' => $contactEnquiry->email,
            'subject' => $contactEnquiry->subject,
            'message' => $contactEnquiry->message,
        );

        Mail::send('ui.contact_enquiry', ['data' => $data,'site_details'=>array()], function ($mail) use ($data) {
            $mail->to($data['email'],  $data['name'])->subject('Contact Us');
        });

        $data = array(
            'id'=> $contactEnquiry->id,
            'name' => $contactEnquiry->name,
            'email' => $contactEnquiry->email,
            'subject' => $contactEnquiry->subject,
            'message' => $contactEnquiry->message,
        );

        Mail::send('ui.contact_enquiry', ['data' => $data,'site_details'=>array()], function ($mail) use ($data) {
            $mail->to('info@italicahomes.com',  'ItalicaHomes')->subject('Contact Us');
        });

        Session::flash('message', 'Thank you for your Enquiry ! We will Contact You Soon..');
        return redirect()->back();

    }
    public function individual_email(Request $request,$id){
        $property = Property::find($id);
        $regions = Region::find($property->region_id);
        $destination_name = 'N/A';
        if($property->destination_id != ''){
            $destination = Destination::find($property->destination_id);
            if($destination){
                $destination_name = $destination->destination_name;
            }
        }

        $types = PropertyType::find($property->type_id);
        $locations = Location::find($property->location_id);
        $conditions = Condition::find($property->condition_id);
        $areas = Area::find($property->area_id);
        $offers = Offer::all();
        $amenities = PropertyAmenities::with('amenities')->where('property_id',$id)->get()->toArray();
        $gallery_images = PropertyImageGallery::where('property_id',$id)->get();
        return view('ui.email_enq',compact('areas','destination_name','related_properties','active','property','propertyTypes','gallery_images','fav','regions','types','locations','conditions','amenities'));



        Mail::send('ui.email_enq', ['data' => array('email' => $request->email),'site_details'=>array()], function ($mail) use ($data) {
            $mail->to($data['email'],  'Italica')->subject('Property Email');
        });
    }
    public function propertyEnquiry(Request $request){

       /* dd($request);*/
        $request->validate([
            'name'  => 'required',
            'email'  => 'required|email',
            'address'  => 'required',
            'message'  => 'required',
            'property_id'  => 'required|numeric',
            'phone'  => 'required|numeric'
        ]);
        $propertyEnquiry = new PropertyEnquiry();
        $propertyEnquiry->name = $request->get('name');
        $propertyEnquiry->email = $request->get('email');
        $propertyEnquiry->address = $request->get('address');
        $propertyEnquiry->property_id = $request->get('property_id');
        $propertyEnquiry->message = $request->get('message');
        $propertyEnquiry->phone = $request->get('phone');
        $propertyEnquiry->save();

        $property = Property::find($propertyEnquiry->property_id);
             
        $destination_name = 'N/A';
        if($property->destination_id != ''){
            $destination = Destination::find($property->destination_id);
            if($destination){
                $destination_name = $destination->destination_name;
            }
        }

        $data = array(
            'name' => $propertyEnquiry->name,
            'email' => $propertyEnquiry->email,
            'address' => $propertyEnquiry->address,
            'message' => $propertyEnquiry->message,
            'property_id' => $property->property_id,
            'property_name' => $property->name,
            'cover_image_name' => $property->cover_image_name,
            'price' => $property->price,
            'vat' => $property->vat,
            'detail_description' => $property->detail_description,
            'region_id' => $property->region_id,
            'type_id' => $property->type_id,
            'condition_id' => $property->condition_id,
            'plot_size' => $property->plot_size,
            'living_area' => $property->living_area,
             'id' => $property->id,
            'phone' => $propertyEnquiry->phone,
            'condition_id'=>$property->condition_id,
            'region_id'=>$property->region_id,
            'destination_id'=>$property->destination_id,
            'area_id'=>$property->area_id,
            'destination_name'=>$destination_name,
            'offer_id'=>$property->offer_id,
            'beds'=> $property->beds
        );

        Mail::send('ui.email_property_enquiry', ['data' => $data, 'site_details'=>array()], function ($mail) use ($data) {
            $mail->to($data['email'],  $data['name'])->subject('Property Enquiry');
        });

        Mail::send('ui.email_property_enquiry', ['data' => $data, 'site_details'=>array()], function ($mail) use ($data) {
           $mail->to('info@italicahomes.com',  'Italica')->subject('Property Enquiry');
       });

        Session::flash('message', 'Email Send Successfully ..! ');
        return redirect()->back();
    }
    public function contactFaq(Request $request)
    {

        $request->validate([
            'name'  => 'required',
            'email'  => 'required',
            'question'  => 'required'
        ]);

        $contactFaq = new ContactFaq();
        $contactFaq->name = $request->get('name');
        $contactFaq->email = $request->get('email');
        $contactFaq->question = $request->get('question');
        
        $contactFaq->save();

        $data = array(
            'name' => $contactFaq->name,
            'email' => $contactFaq->email,
            'question' => $contactFaq->question,
        );

        Mail::send('ui.faq_email', ['data' => $data,'site_details'=>array()], function ($mail) use ($data) {
            $mail->to($data['email'],  $data['name'])->subject('Italica FAQ');
        });

        $data = array(
            'name' => $contactFaq->name,
            'email' => $contactFaq->email,
            'question' => $contactFaq->question,
        );
        
       $data = array(
            'name' => $contactFaq->name,
            'email' => $contactFaq->email,
            'question' => $contactFaq->question,
        );

        Mail::send('ui.faq_email', ['data' => $data,'site_details'=>array()], function ($mail) use ($data) {
            $mail->to('info@italicahomes.com',  'Italica')->subject('Italica FAQ');
        });

         $data = array(
            'name' => $contactFaq->name,
            'email' => $contactFaq->email,
            'question' => $contactFaq->question,
        );
      

        Session::flash('message', 'Thank you for your enquiry! Property Details Send Successfully..');
        return redirect()->back();

    }

    public function destinations()
    {
        $propertyTypes = PropertyType::all();
        $active = 'destinations';
        $destinations = Destination::orderBy('id','DESC')->paginate(5);
        return view('ui.destinations',compact('active','destinations','propertyTypes'));
    }
    public function single_destination($name)
    {
        $id='';
        $active = 'destinations';
        if (is_numeric($name)) 
        { 
            $id = $name;
             $destination = Destination::where('id',$id)->first();
        } else 
        { 
       $destination_title =trim(str_replace('+',' ', $name));
       $destination = Destination::where('destination_name','like','%'.$destination_title.'%')->orWhere('name_german','like','%'.$destination_title.'%')->orWhere('name_italian','like','%'.$destination_title.'%')->first();

            if($destination){
                $id=$destination->id;
            }
        }

        if(!$destination){
            return redirect()->back();
        }

        return view('ui.single-destination',compact('active','destination'));
    }

    public function faq($type){
        $propertyTypes = PropertyType::all();
        $active = 'faq';
        $check = '';
        if($type == 1){
            $check = 'agents';
            $faqs = Faq::where('is_agent',$type)->get();
        }else{
            $check = 'questions';
            $faqs = Faq::all();
        }
        return view('ui.faq',compact('active','check','faqs','propertyTypes'));
    }

    public function categoryProperty()
    {

        $active = 'property';
        $propertyTypeCount = PropertyType::count();
        $propertyTypes = PropertyType::paginate(2);
        return view('ui.category-property',compact('active','propertyTypes','propertyTypeCount'));
    }
    public function autocomplete(){

        $language =  App::getLocale();
        if($language == 'it'){
            $properties = Property::select('name','name_in_italian','property_id')->orderBy('property_id','DESC')->take(10)->get();
            foreach($properties as $key => $property){
                $properties[$key]['name'] = !is_null($property->name_in_italian) ? $property->name_in_italian : $property->name;
            }
        }else if($language == 'de'){
            $properties = Property::select('name','name_in_german','property_id')->orderBy('property_id','DESC')->take(10)->get();
            foreach($properties as $key => $property){
                $properties[$key]['name'] = !is_null($property->name_in_german) ? $property->name_in_german : $property->name;
            }
        }else{
            $properties = Property::select('name','property_id')->orderBy('property_id','DESC')->take(10)->get();
            foreach($properties as $key => $property){
                $properties[$key]['name'] = $property->name;
            }
        }
        return response()->json(['properties' => $properties]);
    }
    public function searchFilter($id = NULL,$type=NULL,Request $request)
    {   
        $language =  App::getLocale();
        $request->session()->put('language', $language);

        //new customization
        $properties = Property::with('property_image_gallery')->where('availability','Y');
        if($request->has('amenity_id') && !empty($request->amenity_id)){
            $properties->whereHas('property_amenities', function ($query) use($request) {
                $query->whereIn('amenity_id',$request->amenity_id);
            });
        }
        if($id != NULL && ($id != 'type' && $id != 'region')){
            $request->property_offer = $id;
            if($id == 1 || $id == 2){
                $properties->where('offer_id',$id)->orWhere('offer_id',3);
            }else{
                $properties->where('offer_id',$id);
            }

        }
        if($id == 'region'){
            $request->region_id = $type;
            $properties->where('region_id',$type);
        }
        if($id == 'type'){
            $proptype='';
             $propType_title =trim(str_replace('+',' ', $type));
              $proptype = PropertyType::where('type_name','like','%'.$propType_title.'%')->orWhere('name_german','like','%'.$propType_title.'%')->orWhere('name_italian','like','%'.$propType_title.'%')->first();
            if($proptype){
            $request->property_type_id = $proptype->id;
            $properties->where('type_id',$proptype->id);

        }else {
            return redirect()->back();
        }
        }
        if($request->has('property_offer') && $request->property_offer != ''){
            if($request->property_offer == 1 || $request->property_offer == 2){
                $properties->where('offer_id',$request->property_offer)->orWhere('offer_id',3);
            }else{
                $properties->where('offer_id',$request->property_offer);
            }

        }
        if($request->has('q') && $request->q != ''){
            $language =  App::getLocale();
            if($language == 'it'){
                $properties->where('name_in_italian','like','%'.trim($request->q).'%')->orWhere('property_id','like','%'.trim($request->q).'%');
            }
            if($language == 'de'){
                $properties->where('name_in_german','like','%'.trim($request->q).'%')->orWhere('property_id','like','%'.trim($request->q).'%');
            }
            if($language == 'en'){
                $properties->where('name','like','%'.trim($request->q).'%')->orWhere('property_id','like','%'.trim($request->q).'%');
            }
        }
        if($request->has('region_id') && $request->region_id != ''){
            $properties->where('region_id',$request->region_id);
        }
        if($request->has('location_id') && $request->location_id != ''){
            $properties->where('location_id',$request->location_id);
        }
        if($request->has('property_type_id') && $request->property_type_id != ''){
            $properties->where('type_id',$request->property_type_id);
        }
        if($request->has('property_condition_id') && $request->property_condition_id != ''){
            $properties->where('condition_id',$request->property_condition_id);
        }
        if($request->has('max_price') && $request->max_price > 0){
            $properties->where('price','<=',$request->max_price);
        }
        if($request->has('min_price') && $request->min_price > 0){
            $properties->where('price','>=',$request->min_price);
        }
        if($request->has('price_range_id') && $request->price_range_id > 0){
            $properties->where('price','<=',$request->price_range_id);
        }
        //dd($properties);
        if($request->has('default_plot_size') && $request->default_plot_size != ''){
            $format_data = explode('-',$request->default_plot_size);
            if(isset($format_data[1]) && $format_data[1] == 'more'){
                $properties->where('plot_size','>=',$format_data[0]);
            }else{
                $properties->where('plot_size','>=',$format_data[0])->where('plot_size','<=',$format_data[1]);
            }
        }
        if($request->has('area_id') && $request->area_id != ''){
            $properties->where('area_id',$request->area_id);
        }
        if($request->has('max_sq_ft') && $request->max_sq_ft > 0){
            $properties->where('plot_size','<=',$request->max_sq_ft);
        }
        if($request->has('min_sq_ft') && $request->min_sq_ft > 0){
            $properties->where('plot_size','>=',$request->min_sq_ft);
        }
        if($request->has('property_size') && $request->property_size != ''){
            $properties->where('plot_size',$request->property_size);
        }
        if($request->has('destination_id') && $request->destination_id != ''){
            $properties->where('destination_id',$request->destination_id);
        }
        if($request->has('beds') && $request->beds != ''){
            $properties->where('beds',$request->beds);
        }
        if($request->has('baths') && $request->baths != ''){
            $properties->where('baths',$request->baths);
        }
        if($request->has('order') && $request->order != ''){
            if($request->order == 'asc'){
                $properties->orderBy('id','ASC');
            }
            if($request->order == 'desc'){
                $properties->orderBy('id','DESC');
            }
            if($request->order == 'price_asc'){
                $properties->orderBy('price','ASC');
            }
            if($request->order == 'price_desc'){
                $properties->orderBy('price','DESC');
            }
        }else{
            $properties->orderBy('id','DESC');
        }
        $active = 'property';
        $properties = $properties->get();

        $propertyOffers = Offer::all();
        $regions = Region::all();
        $propertyTypes = PropertyType::all();
        $conditions = Condition::all();
        $destinations = Destination::all();
        $states = Location::all();
        $areas = Area::all();
        $default_areas = array();
        if($areas){
            $i = 0;
            foreach($areas as $area){
                $count = DB::table('properties')->where('area_id',$area->id)->count();
                $default_areas[$i]['area_id'] = $area->id;
                $default_areas[$i]['area_name'] = $area->area_name;
                $default_areas[$i]['total'] = $count;
                $i++;
            }
        }
        $locations = array();
        if($states){
            $i = 0;
            foreach($states as $state){
                $count = DB::table('properties')->where('location_id',$state->id)->count();
                $locations[$i]['location_id'] = $state->id;
                $locations[$i]['location_name'] = $state->location_name;
                $locations[$i]['total'] = $count;
                $i++;
            }
        }
        $amenety = Amenities::all();
                
        $amenities = array();
        if($amenety){
            $i = 0;
            foreach($amenety as $vals){
                $count = DB::table('property_amenities')->where('amenity_id',$vals->id)->count();
                $amenities[$i]['id'] = $vals->id;
                $amenities[$i]['amenities_display_name'] = $vals->amenities_display_name;
                $amenities[$i]['total'] = $count;
                $i++;
            }
        }
        //dd($amenities);
        // $amenities = DB::table('property_amenities')
        //                         ->join('amenities', 'amenities.id', '=', 'property_amenities.amenity_id')
        //                             ->select('amenities.amenities_display_name','amenities.id', DB::raw('count(*) as total'))
        //                                 ->groupBy('property_amenities.amenity_id')
        //                                     ->get();
        $query = $request->query;
        return view('ui.search',compact('default_areas',
            'destinations','active','properties','propertyOffers',
            'regions','propertyTypes','conditions','request',
            'locations','amenities','query')
        );
    }
    public function findProperty($name=null,$lang=null,$slug=null){
                  
        $fav = 0;
        $id ='';
 
        if (is_numeric($name)) 
        { 
            $id = $name;
            $property = Property::where('availability','Y')->where('id',$id)->first();
        } else 
        { 
        $v =str_replace('+',' ', $name);
        /*$cookie_properties = Cookie::get('property');*/
         $property = Property::where('availability','Y')->where('name','like','%'.$v.'%')->orWhere('name_in_german','like','%'.$v.'%')->orWhere('name_in_italian','like','%'.$v.'%')->first();

        if($property){
            $id =$property->id;
            Session::put('prop_id', $id);
        }
        }

        if(!$property){
            return redirect()->back();
        }
  

        $related_properties = Property::where('availability','Y')->where('price','=',$property->price)->whereNotIn('id',array($id))->get();
        if(count($related_properties) <= 0){
            $related_properties = Property::where('availability','Y')->where('region_id','=',$property->region_id)->whereNotIn('id',array($id))->get();
        }
        //dd($related_properties);

        $active = 'property';
        $propertyTypes = PropertyType::all();
        $regions = Region::find($property->region_id);
        $destination_name = 'N/A';
        if($property->destination_id != ''){
            $destination = Destination::find($property->destination_id);
            if($destination){
                $destination_name = $destination->destination_name;
            }
        }
       /* dd($property);*/
        $types = PropertyType::find($property->type_id);
        $locations = Location::find($property->location_id);
        $conditions = Condition::find($property->condition_id);
        $areas = Area::find($property->area_id);
        $offers = Offer::all();
        $amenities = PropertyAmenities::with('amenities')->where('property_id',$id)->get()->toArray();
        
        $gallery_images = PropertyImageGallery::where('property_id',$id)->get();
        return view('ui.single-property',compact('areas','destination_name','related_properties','active','property','propertyTypes','gallery_images','fav','regions','types','locations','conditions','amenities'));
    }
    public function update_language($locale,Request $request){
      
       dump($locale);
        $URL = $id = $lang3 ='';
        App::setLocale($locale);
        setlocale(LC_TIME, $locale);
        $request->session()->put('language', $locale);
        $target=redirect()->back()->getTargetUrl();
        return redirect()->back();
       
        $string = $target;
        $str_arr = explode ("/", $string);
       // dd($str_arr);
        $lang3 =\Request::segment(2);
        $name = end($str_arr);
      //  dump($name);
        $property_url = in_array("properties", $str_arr);
        $blog_url = in_array("blog", $str_arr);

        $prop_type_url =in_array("type", $str_arr);
        $match_array = array('chi_siamo','uber_uns','about');
        $about_us = in_array($name,$match_array);
        $match_array2 = array('contact','kontakt','contatti');
        $contact_us = in_array($name,$match_array2);
        $eblogs = in_array('blogs',$str_arr);
        $match_array3 = array('destinations','ort','luoghi');
        $edestination  = in_array($name,$match_array3);
        $match_array4 = array('new_arrivals','neue_objekte','nuove_di_arrivo');
        $new_arrvl  = in_array($name,$match_array4);
        $match_array5 = array('myfavourite','ihre_favoriten','preferiti');
        $my_fav = in_array($name,$match_array5);
        $match_array6 = array('legal_notice','impressum','informazioni_legali');
        $leagal = in_array($name,$match_array6);
        $match_array7 = array('terms_and_conditions','AGB','Termini_condizioni');
        $terms = in_array($name,$match_array7);
         $match_array8 = array('privacy_policy','datenschutz','politica_sulla_riservatezza');
        $privacyPol = in_array($name,$match_array8);
        $faqs = in_array('faq',$str_arr);
         $match_array9 = array('category-property','immobilien_arten','tipologia');
        $prop_category = in_array($name,$match_array9);

        $match_array10 = array('destination','ort','luoghi');
        $single_dest  = in_array($name,$str_arr);
       /* $esearch_key = $str_arr[3];*/
        $match_array11 = array('search','suchen','cerca');
        $search_url = in_array( $name,$match_array11);

        $match_array12 = array('owner_services','besitzer_services','servizi_al_proprietario');
        $owner_service = in_array($name,$match_array12);
        $match_array13 = array('buyer_services','kaufer_services','servizi_per_compratore');
        $buyer_service = in_array($name,$match_array13);

        if( $prop_type_url){
        $propType_title =trim(str_replace('+',' ', $name));
              $proptype = PropertyType::where('type_name','like','%'.$propType_title.'%')->orWhere('name_german','like','%'.$propType_title.'%')->orWhere('name_italian','like','%'.$propType_title.'%')->first();

              if($proptype){
                $id =$proptype->id;
                $language_prop_title = LanguageLine::where('key','propertyTypeName_'.$id)->first();
                if(\Request::segment(2) == 'it'){
                    $propTypeNm =  preg_replace('/[[:space:]]+/', '+',$language_prop_title->text['it']);
                $URL =$lang3.'/cerca/type/'.$propTypeNm;
                }elseif (\Request::segment(2) == 'de') {
                     $propTypeNm = preg_replace('/[[:space:]]+/', '+',$language_prop_title->text['de']);
                $URL =$lang3.'/suchen/type/'.$propTypeNm;
                }else {
                    $propTypeNm =  preg_replace('/[[:space:]]+/', '+',$language_prop_title->text['en']);
                    $URL ='/search/type/'.$propTypeNm;
                }

                 return redirect($URL);
            } else {
                return redirect()->back();
            }
        }
        if($property_url){
            $v =str_replace('+',' ', $name);
       
            $property = Property::where('availability','Y')->where('name','like','%'.$v.'%')->orWhere('name_in_german','like','%'.$v.'%')->orWhere('name_in_italian','like','%'.$v.'%')->first();

              if($property){
                $id =$property->id;
                $language_prop_title = LanguageLine::where('key','property_title_'.$id)->first();
                if(\Request::segment(2) == 'it'){
                    $prop_name =  preg_replace('/[[:space:]]+/', '+',$language_prop_title->text['it']);
                $URL =$lang3.'/properties/'.$prop_name;
                }elseif (\Request::segment(2) == 'de') {
                     $prop_name = preg_replace('/[[:space:]]+/', '+',$language_prop_title->text['de']);
                $URL =$lang3.'/properties/'.$prop_name;
                }else {
                    $prop_name =  preg_replace('/[[:space:]]+/', '+',$language_prop_title->text['en']);
                    $URL ='/properties/'.$prop_name;
                }
            } else {
                $session_prop_id = Session::get('prop_id');
                if($session_prop_id){        
                $property = Property::where('availability','Y')->where('id',$session_prop_id)->first();
                 $id =$property->id;
                $language_prop_title = LanguageLine::where('key','property_title_'.$id)->first();
                if(\Request::segment(2) == 'it'){
                    $prop_name =  preg_replace('/[[:space:]]+/', '+',$language_prop_title->text['it']);
                $URL =$lang3.'/properties/'.$prop_name;
                }elseif (\Request::segment(2) == 'de') {
                     $prop_name = preg_replace('/[[:space:]]+/', '+',$language_prop_title->text['de']);
                $URL =$lang3.'/properties/'.$prop_name;
                }else {
                    $prop_name =  preg_replace('/[[:space:]]+/', '+',$language_prop_title->text['en']);
                    $URL ='/properties/'.$prop_name;
                }
                }else {
                    return redirect()->back();
                }

            }
            return redirect($URL);
        }elseif($blog_url){
            $post_title =trim(str_replace('+',' ', $name));
            $post = Post::where('title','like','%'.$post_title.'%')->orWhere('name_german','like','%'.$post_title.'%')->orWhere('name_italian','like','%'.$post_title.'%')->first();

            $va =trans('blog.blog_title_'.$post['id']);
 
            if($post){
                $id=$post->id;
                $language_line_title = LanguageLine::where('key','blog_title_'.$id)->first();
                if(\Request::segment(2) == 'it'){
                    $post_title =  preg_replace('/[[:space:]]+/', '+', $language_line_title->text['it']);
                $URL =$lang3.'/blog/'.$post_title;
                }elseif (\Request::segment(2) == 'de') {
                     $post_title = preg_replace('/[[:space:]]+/', '+', $language_line_title->text['de']);
                $URL =$lang3.'/blog/'.$post_title;
                }else {
                    $post_title =  preg_replace('/[[:space:]]+/', '+', $language_line_title->text['en']);
                    $URL ='/blog/'.$post_title;
                }
            } else {
                $session_post_id = Session::get('post_id');
                if($session_post_id){

                 $post = Post::where('is_available',1)->where('id',$id)->first();

                 $language_line_title = LanguageLine::where('key','blog_title_'.$post->id)->first();
                if(\Request::segment(2) == 'it'){
                    $post_title =  preg_replace('/[[:space:]]+/', '+', $language_line_title->text['it']);
                $URL =$lang3.'/blog/'.$post_title;
                }elseif (\Request::segment(2) == 'de') {
                     $post_title = preg_replace('/[[:space:]]+/', '+', $language_line_title->text['de']);
                $URL =$lang3.'/blog/'.$post_title;
                }else {
                    $post_title =  preg_replace('/[[:space:]]+/', '+', $language_line_title->text['en']);
                    $URL ='/blog/'.$post_title;
                }
                
            } else {
                return redirect()->back();
            }
            }
            return redirect($URL);
        }elseif($about_us) {
            $URL ='/'.__("route.about_us").''; 
            return redirect($URL);
           /* if($lang3 =='en'){
                $abt = 'about';
                $URL ='/about'; 
            }elseif ($lang3 =='de') {       
                $URL ='/de/uber_uns';
            }elseif ($lang3 =='it') {
                $URL ='/it/chi_siamo';
            }
           return redirect($URL);*/
       } /*elseif($contact_us) {
            if($lang3 =='en'){
                $URL ='/contact'; 
            }elseif ($lang3 =='de') {
                $URL ='/kontakt';
            }elseif ($lang3 =='it') {
                $URL ='/contatti';
            }
           return redirect($URL);
       } */
       elseif($contact_us) {
            $URL ='/'.__("route.contact").''; 
           return redirect($URL);
       } elseif($eblogs) {
            $URL ='/blogs'; 
            return redirect($URL);
       } elseif($edestination) {
            if($lang3 =='en'){
                $URL ='/destinations'; 
            }elseif ($lang3 =='de') {
                $URL ='/de/ort';
            }elseif ($lang3 =='it') {
                $URL ='/it/luoghi';
            }
           return redirect($URL);
       }
       elseif($new_arrvl) {
            if($lang3 =='en'){
                $URL ='/new_arrivals'; 
            }elseif ($lang3 =='de') {
                $URL ='/de/neue_objekte';
            }elseif ($lang3 =='it') {
                $URL ='/it/nuove_di_arrivo';
            }
           return redirect($URL);
       } 
        elseif($my_fav) {
            if($lang3 =='en'){
                $URL ='/myfavourite'; 
            }elseif ($lang3 =='de') {
                $URL ='/de/ihre_favoriten';
            }elseif ($lang3 =='it') {
                $URL ='/it/preferiti';
            }
           return redirect($URL);
       } elseif($leagal) {
            if($lang3 =='en'){
                $URL ='/legal_notice'; 
            }elseif ($lang3 =='de') {
                $URL ='/de/impressum';
            }elseif ($lang3 =='it') {
                $URL ='/it/informazioni_legali';
            }
           return redirect($URL);
       }
        elseif( $terms) {
            if($lang3 =='en'){
                $URL ='/terms_and_conditions'; 
            }elseif ($lang3 =='de') {
                $URL ='/de/AGB';
            }elseif ($lang3 =='it') {
                $URL ='/it/Termini_condizioni';
            }
           return redirect($URL);
       }elseif( $privacyPol) {
            if($lang3 =='en'){
                $URL ='/privacy_policy'; 
            }elseif ($lang3 =='de') {
                $URL ='/de/datenschutz';
            }elseif ($lang3 =='it') {
                $URL ='/it/politica_sulla_riservatezza';
            }
           return redirect($URL);
       }elseif( $faqs) {
            if($lang3 =='en'){
                $URL ='/faq/0'; 
            }elseif ($lang3 =='de') {
                $URL ='/de/faq/0';
            }elseif ($lang3 =='it') {
                $URL ='/it/faq/0';
            }
           return redirect($URL);
       }elseif( $prop_category) {
            if($lang3 =='en'){
                $URL ='/category-property'; 
            }elseif ($lang3 =='de') {
                $URL ='/de/immobilien_arten';
            }elseif ($lang3 =='it') {
                $URL ='/it/tipologia';
            }
           return redirect($URL);
       }elseif( $owner_service ) {
            if($lang3 =='en'){
                $URL ='/owner_services'; 
            }elseif ($lang3 =='de') {
                $URL ='/de/besitzer_services';
            }elseif ($lang3 =='it') {
                $URL ='/it/servizi_al_proprietario';
            }
           return redirect($URL);
       }
        elseif( $buyer_service ) {
            if($lang3 =='en'){
                $URL ='/buyer_services'; 
            }elseif ($lang3 =='de') {
                $URL ='/de/kaufer_services';
            }elseif ($lang3 =='it') {
                $URL ='/it/servizi_per_compratore';
            }
           return redirect($URL);
       } elseif( $single_dest && $name!='' && !$search_url && !is_numeric($name)) {
        $id = '';
        if (is_numeric($name)) 
        { 
            $id = $name;
             $destination = Destination::where('id',$id)->first();
        } else 
        { 
         $destination_title =trim(str_replace('+',' ', $name));
            $destination = Destination::where('destination_name','like','%'.$destination_title.'%')->orWhere('name_german','like','%'.$destination_title.'%')->orWhere('name_italian','like','%'.$destination_title.'%')->first();

        if($destination) {
                $id=$destination->id;
                $language_line_title = LanguageLine::where('key','destination_title_'.$id)->first();
             /*   dd($language_line_title,\Request::segment(2));*/
                if(\Request::segment(2) == 'it'){
                    $desti_title =  preg_replace('/[[:space:]]+/', '+', $language_line_title->text['it']);
                $URL =$lang3.'/luoghi/'.$desti_title;
                }elseif (\Request::segment(2) == 'de') {
                     $desti_title = preg_replace('/[[:space:]]+/', '+', $language_line_title->text['de']);
                $URL =$lang3.'/ort/'.$desti_title;
                }else {
                    $desti_title =  preg_replace('/[[:space:]]+/', '+', $language_line_title->text['en']);
                    $URL ='/destination/'.$desti_title;
                }  
            return redirect($URL);
            }
            else {
                return redirect()->back();
            }
        }

    } elseif( $search_url  ) {
       if($lang3 =='en'){
                $URL ='/search'; 
            }elseif ($lang3 =='de') {
                $URL ='/de/suchen';
            }elseif ($lang3 =='it') {
                $URL ='/it/cerca';
            }
           return redirect($URL);
    } else {

            $target=redirect()->back()->getTargetUrl();
        return redirect()->back();
        }

    }
    public function favourite($id){
        $cookie_id = Cookie::get('favourites');
        $add = 0;
        if($cookie_id == null){
            $add = 1;
            $cookie_id = uniqid();
            Cookie::queue('favourites', $cookie_id, time() + (10 * 365 * 24 * 60 * 60));
        }else{
            $favourite = Favourites::where('cookie_id',$cookie_id)->where('property_id',$id)->first();
            if($favourite){
                $delete = Favourites::where('cookie_id',$cookie_id)->where('property_id',$id)->delete();
                Session::flash('message', 'This property has been removed from your favourite list!');
            }else{
                $add = 1;
            }
        }
        if($add == 1){
            $fav = new Favourites();
            $fav->cookie_id = $cookie_id;
            $fav->property_id = $id;
            $fav->save();
            Session::flash('message', 'This property has been added to your favourite list!');
        }

        return redirect()->back();
    }
    public function myFavourite(){
        $active = 'home';
        $propertyTypes = PropertyType::all();
        $cookie_id = Cookie::get('favourites');
        $favourite = array();
        if($cookie_id != null){
            $favourite = Favourites::where('cookie_id',$cookie_id)->pluck('property_id');
        }
        $properties = Property::whereIn('id',$favourite)->where('availability','Y')->get();
        return view('ui.favourites',compact('active','properties','propertyTypes'));
    }

    public function special_offer(){
        $active = 'home';
        $properties = Property::with('property_image_gallery')->where('availability','Y')->where('price_upon_request','>',0)->get();
        return view('ui.special-offers',compact('active','properties'));
    }
    public function new_arrivals(){
        $active = 'home';
        $properties = Property::with('property_image_gallery')->where('availability','Y')->take(5)->orderBy('id','DESC')->get();
        return view('ui.new-arrival',compact('active','properties'));
    }
    public function terms_and_conditions(){
        $active = '';
        $Terms = Term::OrderBy('id','DESC')->first();
        //dd($Terms);
        return view('ui.terms',compact('active','Terms'));
    }
    public function legal_notice(){
        $active = '';
        $legal_notice = LegalNotice::OrderBy('id','DESC')->first();
        return view('ui.legal',compact('active','legal_notice'));
    }
    public function privacy_policy(){
        $active = '';
        $PrivacyPolicy = PrivacyPolicy::OrderBy('id','DESC')->first();
        return view('ui.privacy_policy',compact('active','PrivacyPolicy'));
    }
    
    public function test($id){
      $property = Property::find($id);
      $data = PropertyImageGallery::where('property_id',$id)->get()->take(5);
      //dd($image_lists);
      $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('ui.email_enquiry', array('data' => $data,'property' => $property));
      return $pdf->stream('invoice.pdf');
    }
}
