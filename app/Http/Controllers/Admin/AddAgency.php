<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Spatie\TranslationLoader\LanguageLine;

class AddAgency extends Controller
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
        $agencies = Agent::orderBy('id','DESC')->get();
        return view('admin.add-agency.index',compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add-agency.create');
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
            'agency_name'  => 'required',
            'phone_number'  => 'required',
            'email'  => 'required'

        ]);

        $agency = new Agent();
        $agency->agent_name = $request->get('agency_name');
        $agency->phone_number = $request->get('phone_number');
        $agency->email = $request->get('email');
        $agency->save();
        LanguageLine::create([
            'group' => 'agency',
            'key' => 'agency_title_'.$agency->id,
            'text' => [
                'en' => $agency->agent_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $agency->agent_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $agency->agent_name
            ],
        ]);
        Session::flash('message', 'Record Added Successfully..!');
        return redirect()->route('add-agency.index');


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
        $agency = Agent::findOrFail($id);
        $language_line_title = LanguageLine::where('key','agency_title_'.$id)->first();
        return view('admin.add-agency.edit', compact('agency','language_line_title'));
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
            'agency_name'  => 'required',
            'phone_number' => 'required',
            'email' => 'required'
        ]);

        $item = Agent::findOrFail($id);
        $item->agent_name = $request->agency_name;
        $item->phone_number = $request->phone_number;
        $item->email = $request->email;
        $item->save();
        $language = LanguageLine::where('key','agency_title_'.$item->id)->delete();
        LanguageLine::create([
            'group' => 'agency',
            'key' => 'agency_title_'.$item->id,
            'text' => [
                'en' => $item->agent_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $item->agent_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $item->agent_name
            ],
        ]);
        Session::flash('message', 'Record Updated Successfully..!');
        return redirect()->route('add-agency.index');
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
        $item = Agent::findOrFail($id);
        $item->delete();
        Session::flash('message', 'Record Deleted Successfully..!');
        return redirect()->back();
    }
}
