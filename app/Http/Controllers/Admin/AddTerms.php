<?php

namespace App\Http\Controllers\Admin;

use App\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Spatie\TranslationLoader\LanguageLine;

class AddTerms extends Controller
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
        $Terms = Term::OrderBy('id','DESC')->first();
        return view('admin.terms-conditions.index',compact('Terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.terms-conditions.create');
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
            'terms_and_conditions'  => 'required',
        ]);
        $Term = Term::orderBy('id','DESC')->first();
        if(!$Term){
            $Term = new Term();
        }
        $Term->terms_and_conditions = $request->get('terms_and_conditions');
        $Term->italian = $request->get('italian');
        $Term->german = $request->get('german');
        $Term->save();
        Session::flash('message', 'Success');
        return redirect('/admin/terms/index');


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
        $Term = Term::findOrFail($id);
        return view('admin.terms-conditions.edit', compact('Term'));
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
            'terms_and_conditions'  => 'required',
        ]);
        $Term = Term::where('id',$id)->first();
        $Term->terms_and_conditions = $request->get('terms_and_conditions');
        $Term->italian = $request->get('italian');
        $Term->german = $request->get('german');
        $Term->save();
        Session::flash('message', 'Success');
        return redirect('/admin/terms/index');

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
        $item = Term::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
