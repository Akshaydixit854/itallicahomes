<?php

namespace App\Http\Controllers\Admin;

use App\MetaTags;
use App\PropertyTypeImageGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use Auth;
use Session;
use Spatie\TranslationLoader\LanguageLine;

class AddMetaTags extends Controller
{
     /**
    *
    * allow admin And Super Admin only
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
        $metatags = MetaTags::orderBy('id','DESC')->get();
        return view('admin.add-meta-tags.index',compact('metatags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add-meta-tags.create');
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
            'page_title' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required'
        ]);

        $MetaTags = new MetaTags();
        $MetaTags->page = $request->get('page_title');
        $MetaTags->meta_title = trim($request->get('meta_title'));
            $MetaTags->meta_description = trim($request->get('meta_description'));

        $MetaTags->meta_title_italian = $request->get('meta_title_italian') != '' ? $request->get('meta_title_italian') : $request->get('meta_title');
        $MetaTags->meta_title_german = $request->get('meta_title_german') != '' ? $request->get('meta_title_german') : $request->get('meta_title');
        $MetaTags->meta_desc_italian = $request->get('meta_description_italian') != '' ? $request->get('meta_description_italian') : $request->get('meta_description');
        $MetaTags->meta_desc_german = $request->get('meta_description_german') != '' ? $request->get('meta_description_german') : $request->get('meta_description');
        $MetaTags->meta_keyword = $request->get('meta_keyword') != '' ? $request->get('meta_keyword') : preg_replace('/[[:space:]]+/', '+',$request->get('meta_description'));
        $MetaTags->meta_keyword_italian = $request->get('meta_keyword_italian') != '' ? $request->get('meta_keyword_italian') : preg_replace('/[[:space:]]+/', ',',$request->get('meta_description'));
        $MetaTags->meta_keyword_german = $request->get('meta_keyword_german') != '' ? $request->get('meta_keyword_german') : preg_replace('/[[:space:]]+/', ',',$request->get('meta_description'));   
        $MetaTags->save();

      /*  LanguageLine::create([
        'group' => 'meta_title',
        'key' => 'meta_title_'.$MetaTags->id,
        'text' => [
            'en' => $MetaTags->meta_title,
            'it' => $request->has('meta_title_italian') && $request->meta_title_italian != '' ? $request->meta_title_italian : $MetaTags->meta_title,
            'de' => $request->has('meta_title_german') && $request->meta_title_german != '' ? $request->meta_title_german : $MetaTags->meta_title
            ],
        ]);

        LanguageLine::create([
        'group' => 'meta_description',
        'key' => 'meta_description_'.$MetaTags->id,
        'text' => [
            'en' => $MetaTags->meta_description,
            'it' => $request->has('meta_description_italian') && $request->meta_description_italian != '' ? $request->meta_description_italian : $MetaTags->meta_description,
            'de' => $request->has('meta_description_german') && $request->meta_description_german != '' ? $request->meta_description_german : $MetaTags->meta_description
            ],
        ]);
*/
        Session::flash('message', 'Meta Tags Added Successfully');
        return redirect()->route('add-meta-tags.index');
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
        $meta_tags = MetaTags::findOrFail($id);
       /* $language_line_meta_title  = LanguageLine::where('key','meta_title_'.$id)->first();
        $language_line_meta_desc = LanguageLine::where('key','meta_description_'.$id)->first();*/

        return view('admin.add-meta-tags.edit', compact('meta_tags'/*,'language_line_meta_title','language_line_meta_desc'*/));
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
         $request->validate([
            'page_title' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required'
        ]);

        $MetaTags = MetaTags::findOrFail($id);
        $MetaTags->page = $request->get('page_title');
        $MetaTags->meta_title = trim($request->get('meta_title'));
            $MetaTags->meta_description = trim($request->get('meta_description'));

        $MetaTags->meta_title_italian = $request->get('meta_title_italian') != '' ? $request->get('meta_title_italian') : $request->get('meta_title');
        $MetaTags->meta_title_german = $request->get('meta_title_german') != '' ? $request->get('meta_title_german') : $request->get('meta_title');
        $MetaTags->meta_desc_italian = $request->get('meta_description_italian') != '' ? $request->get('meta_description_italian') : $request->get('meta_description');
        $MetaTags->meta_desc_german = $request->get('meta_description_german') != '' ? $request->get('meta_description_german') : $request->get('meta_description');
         $MetaTags->meta_keyword = $request->get('meta_keyword') != '' ? $request->get('meta_keyword') : preg_replace('/[[:space:]]+/', '+',$request->get('meta_description'));
        $MetaTags->meta_keyword_italian = $request->get('meta_keyword_italian') != '' ? $request->get('meta_keyword_italian') : preg_replace('/[[:space:]]+/', ',',$request->get('meta_description'));
        $MetaTags->meta_keyword_german = $request->get('meta_keyword_german') != '' ? $request->get('meta_keyword_german') : preg_replace('/[[:space:]]+/', ',',$request->get('meta_description'));   
        $MetaTags->save();

       /* LanguageLine::create([
        'group' => 'meta_title',
        'key' => 'meta_title_'.$MetaTags->id,
        'text' => [
            'en' => $MetaTags->meta_title,
            'it' => $request->has('meta_title_italian') && $request->meta_title_italian != '' ? $request->meta_title_italian : $MetaTags->meta_title,
            'de' => $request->has('meta_title_german') && $request->meta_title_german != '' ? $request->meta_title_german : $MetaTags->meta_title
            ],
        ]);

        LanguageLine::create([
        'group' => 'meta_description',
        'key' => 'meta_description_'.$MetaTags->id,
        'text' => [
            'en' => $MetaTags->meta_description,
            'it' => $request->has('meta_description_italian') && $request->meta_description_italian != '' ? $request->meta_description_italian : $MetaTags->meta_description,
            'de' => $request->has('meta_description_german') && $request->meta_description_german != '' ? $request->meta_description_german : $MetaTags->meta_description
            ],
        ]);
*/
        Session::flash('message', 'Meta tags Updated Successfully');
        return redirect()->route('add-meta-tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $MetaTags = MetaTags::findOrFail($id);
        $MetaTags->delete();
        Session::flash('message', 'Record Deleted Successfully..!');
        return redirect()->back();
    }


}
