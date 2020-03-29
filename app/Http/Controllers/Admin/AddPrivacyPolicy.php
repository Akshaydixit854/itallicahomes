<?php

namespace App\Http\Controllers\Admin;

use App\PrivacyPolicy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Spatie\TranslationLoader\LanguageLine;

class AddPrivacyPolicy extends Controller
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
        $PrivacyPolicys = PrivacyPolicy::OrderBy('id','DESC')->first();
        return view('admin.privacy-policy.index',compact('PrivacyPolicys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.privacy-policy.create');
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
            'privacy_policy'  => 'required',
        ]);
        $PrivacyPolicy = PrivacyPolicy::orderBy('id','DESC')->first();
        if(!$PrivacyPolicy){
            $PrivacyPolicy = new PrivacyPolicy();
        }
        $PrivacyPolicy->privacy_policy = $request->get('privacy_policy');
        $PrivacyPolicy->italian = $request->get('italian');
        $PrivacyPolicy->german = $request->get('german');
        $PrivacyPolicy->save();
        Session::flash('message', 'Success');
        return redirect('/admin/privacy_policy/index');


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
        $PrivacyPolicy = PrivacyPolicy::findOrFail($id);
        return view('admin.privacy-policy.edit', compact('PrivacyPolicy'));
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
            'privacy_policy'  => 'required',
        ]);
        $PrivacyPolicy = PrivacyPolicy::where('id',$id)->first();
        $PrivacyPolicy->privacy_policy = $request->get('privacy_policy');
        $PrivacyPolicy->italian = $request->get('italian');
        $PrivacyPolicy->german = $request->get('german');
        $PrivacyPolicy->save();
        Session::flash('message', 'Success');
        return redirect('/admin/privacy_policy/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = PrivacyPolicy::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
