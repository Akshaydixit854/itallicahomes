<?php

namespace App\Http\Controllers\Admin;

use App\Condition;
use App\Location;
use App\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use Auth;
use Session;
use Spatie\TranslationLoader\LanguageLine;

class AddConditionController extends Controller
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
        $conditions = Condition::orderBy('id','DESC')->get();
        return view('admin.add-condition.index',compact('conditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add-condition.create');
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
            'condition_name'  => 'required',
            'condition_display_name'  => 'required'
        ]);

        /*$name = 'null';
        $newImageName = 'null';

        //check if file attached
        if($file = $request->file('item_image')){
            $tmp = explode('.', $file->getClientOriginalName());//get client file name
            $name = $file->getClientOriginalName();
            $newImageName = round(microtime(true)).'.'.end($tmp);
            $file->move(storage_path('app\public\products'), $newImageName);
        }

        Item::create(array_merge($request->all(),['item_image' => $newImageName, 'user_id' => Auth::user()->id]));*/

        $condition = new Condition();
        $condition->condition_display_name = $request->get('condition_display_name');
        $condition->condition_name = $request->get('condition_name');
        $condition->save();

        LanguageLine::create([
            'group' => 'condition',
            'key' => 'condition_name_'.$condition->id,
            'text' => [
                'en' => $condition->condition_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $condition->condition_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $condition->condition_name
            ],
        ]);
        LanguageLine::create([
          'group' => 'condition',
          'key' => 'condition_display_name_'.$condition->id,
          'text' => [
              'en' => $condition->condition_display_name,
              'it' => $request->has('italian') && $request->italian != '' ? $request->italian : $condition->condition_display_name,
              'de' => $request->has('german') && $request->german != '' ? $request->german : $condition->condition_display_name
          ],
        ]);
        Session::flash('message', 'Record Added Successfully..!');
        return redirect()->route('add-condition.index');
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
        $condition = Condition::findOrFail($id);
        $language_line = LanguageLine::where('key','condition_display_name_'.$id)->first();
        $language_line_title = LanguageLine::where('key','condition_name_'.$id)->first();
        return view('admin.add-condition.edit', compact('language_line','language_line_title','condition'));
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
            'condition_name'  => 'required',
            'condition_display_name'  => 'required'
        ]);

        $condition = Condition::findOrFail($id);
        $condition->condition_display_name = $request->get('condition_display_name');
        $condition->condition_name = $request->get('condition_name');
        $condition->save();
        $language = LanguageLine::where('key','condition_name_'.$condition->id)->delete();
        LanguageLine::create([
            'group' => 'condition',
            'key' => 'condition_name_'.$condition->id,
            'text' => [
                'en' => $condition->condition_name,
                'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $condition->condition_name,
                'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $condition->condition_name
            ],
        ]);
        $language = LanguageLine::where('key','condition_display_name_'.$condition->id)->delete();
        LanguageLine::create([
          'group' => 'condition',
          'key' => 'condition_display_name_'.$condition->id,
          'text' => [
              'en' => $condition->condition_display_name,
              'it' => $request->has('italian') && $request->italian != '' ? $request->italian : $condition->condition_display_name,
              'de' => $request->has('german') && $request->german != '' ? $request->german : $condition->condition_display_name
          ],
        ]);
        Session::flash('message', 'Record Updated Successfully..!');
        return redirect()->route('add-condition.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $condition = Condition::findOrFail($id);
        $condition->delete();
        Session::flash('message', 'Record Deleted Successfully..!');
        return redirect()->back();
    }
}
