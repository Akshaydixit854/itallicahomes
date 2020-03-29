<?php

namespace App\Http\Controllers;
use App\Property;
use App\PropertyEnquiry;
use App\Post;
use App\User;
use App\Agent;
use App\Faq;
use App\ContactEnquiry;
use App\ContactFaq;
use App\Offer;
use App\Destination;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->property         = new property;
        $this->blog             = new Post;
        $this->user             = new User;
        $this->PropertyEnquiry  = new PropertyEnquiry;
        $this->Agent            = new Agent;
        $this->faq              = new Faq;        
        $this->Post             = new Post;       
        $this->ContactEnquiry   = new ContactEnquiry;       
        $this->ContactFaq       = new ContactFaq;       
        $this->Offer            = new Offer;       
        $this->Destination      = new Destination;       
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    /*$data['$property_obj'] = property::all()->toArray();*/
       $property_obj = $this->property->get()->toArray();
       $total_prop_count    = count($property_obj);
       $total_blog_count    = $this->blog->count();
       $total_user_count    = $this->user->count();
       $total_inbox_count   = $this->PropertyEnquiry->count();
       $total_inbox_unread  = $this->PropertyEnquiry->where('is_read','0')->count();
       $total_agents        = $this->Agent->count();
       $properties          = $this->property->with(['property_agent'])->orderBy('id','DESC')->paginate(9);
       $faq_cnt             = $this->faq->count();
       $post_cnt            = $this->Post->count();
       $prop_enq_cnt        = $this->PropertyEnquiry->count();
       $contact_enq_cnt     = $this->ContactEnquiry->count();
       $contact_faq_enq_cnt = $this->ContactFaq->count();
       $prop_offers_cnt     = $this->Offer->count();
       $dest_cnt            = $this->Destination->count();
   /* dd($properties);*/
       /*$property_obj = 'dsadada';*/
      /*  dd($Total_blog_count);*/
        return view('index',compact('properties','property_obj','total_prop_count','total_blog_count','total_user_count','total_inbox_count','total_inbox_unread','total_agents','faq_cnt','post_cnt','prop_enq_cnt','contact_enq_cnt','contact_faq_enq_cnt','prop_offers_cnt','dest_cnt'));

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        return view('layouts.form.index');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function helper()
    {
        return view('layouts.helper.index');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function media()
    {
        return view('layouts.media.index');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function table()
    {
        return view('layouts.table.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function typography()
    {
        return view('layouts.typography.index');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function widget()
    {
        return view('layouts.widget.index');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function chart()
    {
        return view('layouts.chart.index');
    }
}
