<?php

namespace App\Http\Controllers\Admin;

use App\ContactEnquiry;
use App\PropertyEnquiry;
use App\ContactFaq;
use App\Property;
use App\Http\Controllers\Controller;
use Session;

class IndexAdminController extends Controller
{
    public function index()
    {
        $contact_enquireis = ContactFaq::orderBy('read','ASC')->get();
        return view('admin.contact-enquiries.index',compact('contact_enquireis'));
    }
    public function enquiry_mark($id)
    {
        $contact_faqs = ContactFaq::find($id);
        if($contact_faqs){
            $contact_faqs->read = 1;
            $contact_faqs->save();
        }
        return view('admin.contact-enquiries.index-full',compact('contact_faqs'));
    }
    public function enquiry_delete($id)
    {
        $contact_faqs = ContactFaq::where('id',$id)->delete();
        Session::flash('message', 'Success');
        return redirect()->back();
    }

    public function inbox()
    {
        $contact_faqs = PropertyEnquiry::orderBy('is_read','ASC')->get();
        return view('admin.contact-faqs.index',compact('contact_faqs'));
    }
    public function mark($id)
    {
        $contact_faqs = PropertyEnquiry::find($id);
        $property = Property::find($contact_faqs->property_id);
        if($contact_faqs){
            $contact_faqs->is_read = 1;
            $contact_faqs->save();
        }
        return view('admin.contact-faqs.index-full',compact('contact_faqs','property'));
    }
    public function delete($id)
    {
        $contact_faqs = PropertyEnquiry::where('id',$id)->delete();
        Session::flash('message', 'Success');
        return redirect()->back();
    }

    public function unreadInbox()
    {
        $contact_faqs = ContactFaq::where('read','=',0)->get();
        return view('admin.contact-faqs.index',compact('contact_faqs'));
    }

    public function inboxStatus($id,$status)
    {
        $contact_faq = ContactFaq::find($id);
        $contact_faq->read = $status;
        $contact_faq->save();
        return redirect()->back();
    }

    public function general_index()
    {
        $contact_enquireis = ContactEnquiry::orderBy('read','ASC')->get();
        return view('admin.general-enquiries.index',compact('contact_enquireis'));
    }

    public function general_mark($id)
    {
        $contact_faqs = ContactEnquiry::find($id);
        if($contact_faqs){
            $contact_faqs->read = 1;
            $contact_faqs->save();
        }
        return view('admin.general-enquiries.index-full',compact('contact_faqs'));
    }
    public function general_delete($id)
    {
        $contact_faqs = ContactEnquiry::where('id',$id)->delete();
        Session::flash('message', 'Contact Enquiry Deleted Successfully ..!');
        return redirect()->back();
    }

    public function properties_index()
    { 
        $property_enquiries = PropertyEnquiry::orderBy('id','DESC')->get();
        return view('admin.property-enquiries.index',compact('property_enquiries'));
    }

    public function property_mark($id)
    {
        $PropertyEnquiry = PropertyEnquiry::find($id);
        if($PropertyEnquiry){
            $PropertyEnquiry->is_read = 1;
            $PropertyEnquiry->save();
        }
       /* dd($PropertyEnquiry);*/
        return view('admin.property-enquiries.index-full',compact('PropertyEnquiry'));
    }
    public function property_delete($id)
    {
        $contact_faqs = PropertyEnquiry::where('id',$id)->delete();
        Session::flash('message', 'Property Enquiry Deleted Successfully ..!');
        return redirect()->back();
    }



}
