<?php

namespace App\Services;

use App\Respositories\PropertyRepository;
use App\Region;
use App\Offer;
use App\Property;
use App\Favourites;
use App\PropertyType;
use App\Condition;
use App\Agent;
use App\PropertyTypeImageGallery;
use Cookie;
use App;
use Carbon\Carbon;

class PropertyService
{

   public function getRecentProperties()
    {
        $date = Carbon::today()->subDays(180);
        $properties = Property::where('availability','Y')->with('offer')->where('created_at','>=',$date)->orderBy('id','DESC')->paginate(3);

        return $properties;
    }

    function truncate($text, $chars = 25) {
        if (strlen($text) <= $chars) {
            return $text;
        }
        $text = $text." ";
        $text = substr($text,0,$chars);
        $text = substr($text,0,strrpos($text,' '));
        $text = $text."...";
        return $text;
    }
    function getRegion($id,$type = 0){
        $region = Region::where('id',$id)->first();
        if($region){
            if($type == 1){
                return $region;
            }else{
                return $region->region_name;
            }
        }else{
            return '';
        }
    }
    function getFavCount(){
        $cookie_id = Cookie::get('favourites');
        $favourite = array();
        if($cookie_id != null){
            $favourite = Favourites::where('cookie_id',$cookie_id)->pluck('property_id');
        }
        return count($favourite);
    }
    function checkFav($id){
        $cookie_id = Cookie::get('favourites');
        if($id){
            $favourite = Favourites::where('property_id',$id)->where('cookie_id',$cookie_id)->first();
            if($favourite){
                return "<i class='fas fa-heart'></i>";
            }else{
                return "<i class='far fa-heart'></i>";
            }
        }
    }
    function checkQuickFav($id){
        $cookie_id = Cookie::get('favourites');
        if($id){
            $favourite = Favourites::where('property_id',$id)->where('cookie_id',$cookie_id)->first();
            if($favourite){
                return 1;
            }else{
                return 2;
            }
        }
    }
    function checkFavTxt($id){
        $cookie_id = Cookie::get('favourites');
        if($id){
            $favourite = Favourites::where('property_id',$id)->where('cookie_id',$cookie_id)->first();
            if($favourite){
                return "Remove From Favourite";
            }else{
                return "Add To Favourite";
            }
        }
    }
    function getOffer($id){
        $offer = Offer::find($id);
        if($offer){
            return $offer->offer_name;
        }else{
            return '';
        }
    }
    function propertyType(){
        $property_type = PropertyType::all();
        return $property_type;
    }
    function propertySingleType($id){
        $property_type = PropertyType::find($id);
        $language =  App::getLocale();
        if($language == 'en'){
            $property_type_name = $property_type->type_name;
        }elseif($language == 'it'){
            $property_type_name = $property_type->name_italian;
        }elseif($language == 'de'){
            $property_type_name = $property_type->name_german;
        }
        return $property_type_name;
    }
    function propertySingleResourceType($id){
        $property_type = PropertyType::find($id);
        return $property_type;
    }
    function property_type_images($id){
        $types = '';
        if($id){
            $types = PropertyTypeImageGallery::where('property_type_id',$id)->get();
        }
        //dd($types);
        return $types;
    }
    function condition($id){
        $condition = Condition::find($id);
        return $condition;
    }
    function getAgent($id){
        $agent = Agent::find($id);
        if($agent){
            return $agent->agent_name;
        }else{
            return '-';
        }

    }

   
}
