<?php

namespace App\Http\Controllers\Admin;

use App\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Spatie\TranslationLoader\LanguageLine;

class AddOffer extends Controller
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
        $offers = Offer::all();
        return view('admin.add-offer.index',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add-offer.create');
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
            'offer_name'  => 'required'
        ]);

        $offer = new Offer();
        $offer->offer_name = $request->get('offer_name');
        $offer->save();
        LanguageLine::create([
            'group' => 'property_offer',
            'key' => 'property_offer_title_'.$offer->id,
            'text' => [
                'en' => $offer->offer_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $offer->offer_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $offer->offer_name
            ],
        ]);
        Session::flash('message', 'Record Added Successfully..!');
        return redirect()->route('add-offer.index');


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
        $offer = Offer::findOrFail($id);
        $language_line_title = LanguageLine::where('key','property_offer_title_'.$id)->first();
        return view('admin.add-offer.edit', compact('offer','language_line_title'));
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
            'offer_name'  => 'required',
        ]);


        $item = Offer::findOrFail($id);
        $item->offer_name = $request->offer_name;
        $item->save();
        $language = LanguageLine::where('key','property_offer_title_'.$item->id)->delete();
        LanguageLine::create([
            'group' => 'property_offer',
            'key' => 'property_offer_title_'.$item->id,
            'text' => [
                'en' => $item->offer_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $item->offer_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $item->offer_name
            ],
        ]);
        Session::flash('message', 'Offer Updated Successfully..!');
        return redirect()->route('add-offer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Offer::findOrFail($id);
        $item->delete();
        Session::flash('message', 'Record Deleted Successfully..!');
        return redirect()->back();
    }
}
