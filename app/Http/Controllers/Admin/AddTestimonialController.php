<?php


namespace App\Http\Controllers\Admin;


use App\Testimonials;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class AddTestimonialController extends Controller
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
        $testimonials = Testimonials::all();
        return view('admin.add-testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add-testimonial.create');
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
            'name'  => 'required',
            'description' => 'required',
            'cover_image' => 'required'
        ]);

        $coverImageName = "";
        if($file = $request->file('cover_image')) {
            $name = $file->getClientOriginalName();
            $tmp = explode('.', $file->getClientOriginalName());
            $coverImageName = round(microtime(true)) . '.' . end($tmp);
            $file->move('images/testimonial-covers', $coverImageName);

        }

        $testimonial = new Testimonials();
        $testimonial->name = $request->get('name');
        $testimonial->description = $request->get('description');
        $testimonial->cover_image = $coverImageName;
        $testimonial->save();
        Session::flash('message', 'Testimonial Added Successfully..!');
        return redirect()->route('add-testimonial.index');


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
        $testimonial = Testimonials::findOrFail($id);

        return view('admin.add-testimonial.edit', compact('testimonial'));
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
            'name'  => 'required',
            'description' => 'required',
        ]);


        $coverImageName = "";
        if($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $name = $file->getClientOriginalName();
            $tmp = explode('.', $file->getClientOriginalName());
            $coverImageName = round(microtime(true)) . '.' . end($tmp);
            $file->move('images/testimonial-covers', $coverImageName);

        }

        $item = Testimonials::findOrFail($id);
        $item->name = $request->name;
        $item->description = $request->description;
        if($coverImageName != ''){
            $item->cover_image = $coverImageName;
        }
        $item->save();
        Session::flash('message', 'Testimonial Updated Successfully..!');
        return redirect()->route('add-testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Testimonials::findOrFail($id);
        $item->delete();
        Session::flash('Error', 'Record Deleted Successfully..!');
        return redirect()->back();
    }
}
