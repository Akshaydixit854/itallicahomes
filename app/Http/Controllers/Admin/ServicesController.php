<?php

namespace App\Http\Controllers\Admin;

use App\ContactEnquiry;
use App\PropertyEnquiry;
use App\ContactFaq;
use App\OwnerServices;
use App\BuyerServices;
use App\Http\Controllers\Controller;
use Session;
use Validator;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;

class ServicesController extends Controller
{
     public function __construct() {
        
        $this->middleware('role:admin|superadmin');
    }

    public function owner_index()
    {
        $OwnerService = OwnerServices::orderBy('id','DESC')->get();
        return view('admin.ownerServices.index',compact('OwnerService'));
    }
    
    public function buyer_index()
    {
       $BuyerService = BuyerServices::orderBy('id','DESC')->get();
    return view('admin.buyerServices.index',compact('BuyerService'));
    }
   /* public function create()
    {
        return view('admin.ownerServices.create');
    }
*/
  
    public function ostore(Request $request)
    {
        /*dd(54353);*/
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'cover_image' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if ($validator->fails()) {
           $request->session()->flash('error', 'Something went wrong ...!');
            return redirect()->back()->withErrors($validator)->withInput();
        }
       
        $coverImageName = "";
        if($file = $request->file('cover_image')) {
            $name = $file->getClientOriginalName();
            $tmp = explode('.', $file->getClientOriginalName());
            $coverImageName = round(microtime(true)) . '.' . end($tmp);
            $file->move('images/ownerService-cover-images', $coverImageName);

        }

        $OwnerService = new OwnerServices();
        $OwnerService->content = stripslashes($request->get('content'));
        $OwnerService->cover_image = $coverImageName;
        $OwnerService->content_italian = $request->get('content_italian');
        $OwnerService->content_german = $request->get('content_german');
        $OwnerService->published_by = $request->get('published_by');
        $OwnerService->is_available = $request->get('is_available');
        $OwnerService->save();

  
        LanguageLine::create([
            'group' => 'ownerServiceDesc',
            'key' => 'ownerService_description_'.$OwnerService->id,
            'text' => [
                'en' => $OwnerService->content,
                'it' => $request->has('content_italian') && $request->content_italian != '' ? $request->content_italian : $OwnerService->content,
                'de' => $request->has('content_german') && $request->content_german != '' ? $request->content_german : $OwnerService->content
            ],
          ]);

          Session::flash('message', 'Record Added Successfully');
        return redirect('admin/owner');


    }
    
     public function bstore(Request $request)
    {
        /*dd(54353);*/
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'cover_image' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if ($validator->fails()) {
           $request->session()->flash('error', 'Something went wrong ...!');
            return redirect()->back()->withErrors($validator)->withInput();
        }
       
        $coverImageName = "";
        if($file = $request->file('cover_image')) {
            $name = $file->getClientOriginalName();
            $tmp = explode('.', $file->getClientOriginalName());
            $coverImageName = round(microtime(true)) . '.' . end($tmp);
            $file->move('images/buyerService-cover-images', $coverImageName);

        }

        $BuyerService = new BuyerServices();
        $BuyerService->content = stripslashes($request->get('content'));
        $BuyerService->cover_image = $coverImageName;
        $BuyerService->content_italian = $request->get('content_italian');
        $BuyerService->content_german = $request->get('content_german');
        $BuyerService->published_by = $request->get('published_by');
        $BuyerService->is_available = $request->get('is_available');
        $BuyerService->save();

  
        LanguageLine::create([
            'group' => 'buyerServiceDesc',
            'key' => 'buyerService_description_'.$BuyerService->id,
            'text' => [
                'en' => $BuyerService->content,
                'it' => $request->has('content_italian') && $request->content_italian != '' ? $request->content_italian : $BuyerService->content,
                'de' => $request->has('content_german') && $request->content_german != '' ? $request->content_german : $BuyerService->content
            ],
          ]);
          Session::flash('message', 'Record Added Successfully');
        return redirect('admin/buyer');


    }

   
    public function create_owner()
    {
        return view('admin.ownerServices.create');
    }
    
     public function create_buyer()
    {
        return view('admin.buyerServices.create');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function edit_owner($id)
    {
       /* dd($id);*/
        $ownerService = OwnerServices::findOrFail($id);
         
        $language_line_desc = LanguageLine::where('key','ownerService_description_'.$id)->first();
     /*  dd($ownerService, $id, $language_line_desc);*/
             return view('admin.ownerServices.edit', compact('ownerService','language_line_desc'));
    }
    
     public function edit_buyer($id)
    {
       /* dd($id);*/
        $language_line_desc ='';
        $BuyerService = BuyerServices::findOrFail($id);
         
        $language_line_desc = LanguageLine::where('key','buyerService_description_'.$id)->first();
     /*  dd($BuyerService, $language_line_desc);*/
             return view('admin.buyerServices.edit', compact('BuyerService','language_line_desc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_owner(Request $request, $id)
    {
      
        $request->validate([
            'content' => 'required',
        ]);
       
        $OwnerService = OwnerServices::findOrFail($id);
        if(!is_null($request->file('cover_image'))) {
            $file = $request->file('cover_image');
            $name = $file->getClientOriginalName();
            $tmp = explode('.', $file->getClientOriginalName());
            $coverImageName = round(microtime(true)) . '.' . end($tmp);
            $file->move('images/ownerService-cover-images', $coverImageName);
            $OwnerService->cover_image = $coverImageName;
        }

        $OwnerService->content = $request->get('content');
        $OwnerService->content_italian = $request->get('content_italian');
        $OwnerService->content_german = $request->get('content_german');
        $OwnerService->published_by = $request->get('published_by');
        $OwnerService->is_available = $request->get('is_available');
        $status = $OwnerService->save();
       

         LanguageLine::create([
            'group' => 'ownerServiceDesc',
            'key' => 'ownerService_description_'.$OwnerService->id,
            'text' => [
                'en' => $OwnerService->content,
                'it' => $request->has('content_italian') && $request->content_italian != '' ? $request->content_italian : $OwnerService->content,
                'de' => $request->has('content_german') && $request->content_german != '' ? $request->content_german : $OwnerService->content
            ],
          ]);

          Session::flash('message', 'Record Udpated Successfully');
        return redirect('admin/owner');
    }
    
    public function update_buyer(Request $request, $id)
    {
      
        $request->validate([
            'content' => 'required',
        ]);
       
        $BuyerService = BuyerServices::findOrFail($id);
        if(!is_null($request->file('cover_image'))) {
            $file = $request->file('cover_image');
            $name = $file->getClientOriginalName();
            $tmp = explode('.', $file->getClientOriginalName());
            $coverImageName = round(microtime(true)) . '.' . end($tmp);
            $file->move('images/buyerService-cover-images', $coverImageName);
            $BuyerService->cover_image = $coverImageName;
        }

        $BuyerService->content = $request->get('content');
        $BuyerService->content_italian = $request->get('content_italian');
        $BuyerService->content_german = $request->get('content_german');
        $BuyerService->published_by = $request->get('published_by');
        $BuyerService->is_available = $request->get('is_available');
        $status = $BuyerService->save();
       

         LanguageLine::create([
            'group' => 'ownerServiceDesc',
            'key' => 'ownerService_description_'.$BuyerService->id,
            'text' => [
                'en' => $BuyerService->content,
                'it' => $request->has('content_italian') && $request->content_italian != '' ? $request->content_italian : $BuyerService->content,
                'de' => $request->has('content_german') && $request->content_german != '' ? $request->content_german : $BuyerService->content
            ],
          ]);

          Session::flash('message', 'Record Updated Successfully');
        return redirect('admin/buyer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_owner($id)
    {
        $item = OwnerServices::findOrFail($id);
        $item->delete();
        Session::flash('message', 'Record Deleted Successfully..!');
        return redirect()->back();
    }
    
      public function delete_buyer($id)
    {
        $item = BuyerServices::findOrFail($id);
        $item->delete();
        Session::flash('message', 'Record Deleted Successfully..!');
        return redirect()->back();
    }
}
