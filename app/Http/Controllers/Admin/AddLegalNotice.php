<?php

namespace App\Http\Controllers\Admin;

use App\LegalNotice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Spatie\TranslationLoader\LanguageLine;

class AddLegalNotice extends Controller
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
        $LegalNotices = LegalNotice::OrderBy('id','DESC')->first();
        return view('admin.legal-notice.index',compact('LegalNotices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.legal-notice.create');
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
            'legal_notice'  => 'required',
        ]);
        $LegalNotice = LegalNotice::orderBy('id','DESC')->first();
        if(!$LegalNotice){
            $LegalNotice = new LegalNotice();
        }
        $LegalNotice->legal_notice = $request->get('legal_notice');
        $LegalNotice->italian = $request->get('italian');
        $LegalNotice->german = $request->get('german');
        $LegalNotice->save();
        Session::flash('message', 'Success');
        return redirect('/admin/legal_notice/index');


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
        $LegalNotice = LegalNotice::findOrFail($id);
        return view('admin.legal-notice.edit', compact('LegalNotice'));
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
            'legal_notice'  => 'required',
        ]);
        $LegalNotice = LegalNotice::where('id',$id)->first();
        $LegalNotice->legal_notice = $request->get('legal_notice');
        $LegalNotice->italian = $request->get('italian');
        $LegalNotice->german = $request->get('german');
        $LegalNotice->save();
        Session::flash('message', 'Success');
        return redirect('/admin/legal_notice/index');

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
        $item = LegalNotice::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
