<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Spatie\TranslationLoader\LanguageLine;

class AddFaq extends Controller
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
        $faqs = Faq::all();
        return view('admin.add-faq.index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add-faq.create');
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
            'question'  => 'required',
            'answer' => 'required',
            'priority' => 'required'
        ]);


        $faq = new Faq();
        $faq->question = $request->get('question');
        $faq->answer = $request->get('answer');
        $faq->priority = $request->get('priority');
        $faq->is_agent = !is_null($request->get('is_agent')) ? $request->get('is_agent') : 0;
        $faq->save();
        LanguageLine::create([
            'group' => 'faq',
            'key' => 'faq_question_'.$faq->id,
            'text' => [
                'en' => $faq->question,
                'it' => $request->has('question_italian') && $request->question_italian != '' ? $request->question_italian : $faq->question,
                'de' => $request->has('question_german') && $request->question_german != '' ? $request->question_german : $faq->question
            ],
          ]);
          LanguageLine::create([
              'group' => 'faq',
              'key' => 'faq_answer_'.$faq->id,
              'text' => [
                  'en' => $faq->answer,
                  'it' => $request->has('answer_italian') && $request->answer_italian != '' ? $request->answer_italian : $faq->answer,
                  'de' => $request->has('answer_german') && $request->answer_german != '' ? $request->answer_german : $faq->answer
              ],
            ]);
        Session::flash('message', 'Record Added Successfully..!');
        return redirect()->route('add-faq.index');
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
        $faq = Faq::findOrFail($id);
        $language_line = LanguageLine::where('key','faq_question_'.$id)->first();
        $language_line_title = LanguageLine::where('key','faq_answer_'.$id)->first();
        return view('admin.add-faq.edit', compact('faq','language_line','language_line_title'));
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
            'question'  => 'required',
            'answer' => 'required',
            'priority' => 'required'
        ]);



        $faq = Faq::findOrFail($id);
        $faq->question = $request->get('question');
        $faq->answer = $request->get('answer');
        $faq->priority = $request->get('priority');
        $faq->is_agent = !is_null($request->get('is_agent')) ? $request->get('is_agent') : 0;
        $faq->save();
        $language = LanguageLine::where('key','faq_question_'.$faq->id)->delete();
        LanguageLine::create([
            'group' => 'faq',
            'key' => 'faq_question_'.$faq->id,
            'text' => [
                'en' => $faq->question,
                'it' => $request->has('question_italian') && $request->question_italian != '' ? $request->question_italian : $faq->question,
                'de' => $request->has('question_german') && $request->question_german != '' ? $request->question_german : $faq->question
            ],
          ]);
          $language = LanguageLine::where('key','faq_answer_'.$faq->id)->delete();
          LanguageLine::create([
              'group' => 'faq',
              'key' => 'faq_answer_'.$faq->id,
              'text' => [
                  'en' => $faq->answer,
                  'it' => $request->has('answer_italian') && $request->answer_italian != '' ? $request->answer_italian : $faq->answer,
                  'de' => $request->has('answer_german') && $request->answer_german != '' ? $request->answer_german : $faq->answer
              ],
            ]);
        Session::flash('message', 'Record Updated Successfully..!');
        return redirect()->route('add-faq.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Faq::findOrFail($id);
        $item->delete();
        Session::flash('message', 'Record Deleted Successfully..!');
        return redirect()->back();
    }
}
