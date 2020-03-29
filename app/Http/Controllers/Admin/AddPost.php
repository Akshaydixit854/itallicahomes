<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\BlogImageGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Auth as AuthUser;
use Spatie\TranslationLoader\LanguageLine;
use Session;
use Validator;

class AddPost extends Controller
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
        $posts = Post::orderBy('posts.id','DESC')->get();
        return view('admin.add-post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function blog_image_gallery(Request $request,$id){
         if($id != '' && !empty($request->file('file'))){
             foreach($request->file('file') as $picture){
                 $file_name = time();
                 $file_name .= rand();
                 $file_name = sha1($file_name);
                 if ($picture) {
                     $name = $picture->getClientOriginalName();
                     $tmp = explode('.', $picture->getClientOriginalName());
                     $coverImageName = $file_name;
                     $picture->move('images/cover-images', $coverImageName);

                     $property_image_gallery = new BlogImageGallery();
                     $property_image_gallery->image = $coverImageName;
                     $property_image_gallery->temp_id = $id;
                     $property_image_gallery->save();
                 }
             }
         }
     }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
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
            $file->move('images/post-cover-images', $coverImageName);

        }

        $post = new Post();
        $post->title = trim($request->get('title'));
        $post->name_italian = ($request->get('name_italian') != '') ? $request->get('name_italian'): '';
        $post->name_german = ($request->get('name_german') != '')? $request->get('name_german'):'';
        $post->content = stripslashes($request->get('content'));
        $post->cover_image = $coverImageName;
        $post->published_by = $request->get('published_by');
        $post->is_available = $request->get('is_available');
        $post->short_description = $request->get('short_description');
        $post->save();
        if($request->has('gallery_token') && $request->gallery_token != ''){
            $property_images = BlogImageGallery::where('temp_id', '=', $request->get('gallery_token'))->get();
            if($property_images){
                foreach($property_images as $property_image){
                    $image_list = BlogImageGallery::where('id',$property_image->id)->first();
                    $image_list->post_id = $post->id;
                    $image_list->save();
                }
            }
        }
        LanguageLine::create([
          'group' => 'blog',
          'key' => 'blog_title_'.$post->id,
          'text' => [
              'en' => $post->title,
              'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $post->title,
              'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $post->title
          ],
        ]);
        LanguageLine::create([
            'group' => 'blog',
            'key' => 'blog_short_description_'.$post->id,
            'text' => [
                'en' => $request->short_description,
                'it' => $request->has('italian_short_description') && $request->italian_short_description != '' ? $request->italian_short_description : $post->short_description,
                'de' => $request->has('german_short_description') && $request->german_short_description != '' ? $request->german_short_description : $post->short_description
            ],
          ]);
        LanguageLine::create([
            'group' => 'blog',
            'key' => 'blog_description_'.$post->id,
            'text' => [
                'en' => $post->content,
                'it' => $request->has('content_italian') && $request->content_italian != '' ? $request->content_italian : $post->content,
                'de' => $request->has('content_german') && $request->content_german != '' ? $request->content_german : $post->content
            ],
          ]);

          Session::flash('message', 'Record Added Successfully');
        return redirect()->route('add-post.index');


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
        $post = Post::findOrFail($id);
      /*  dd($post);*/
        $language_line_title = LanguageLine::where('key','blog_title_'.$id)->first();
        $language_line_desc = LanguageLine::where('key','blog_description_'.$id)->first();

        $language_line_short_desc  = LanguageLine::where('key','blog_short_description_'.$id)->first();
        $gallery_images = BlogImageGallery::where('post_id',$id)->get();
        return view('admin.add-post.edit', compact('gallery_images','post','language_line_title','language_line_desc','language_line_short_desc'));
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
            'title'  => 'required',
            'short_description' => 'required',
            'content' => 'required',
        ]);
       
        $post = Post::findOrFail($id);
        if(!is_null($request->file('cover_image'))) {
            $file = $request->file('cover_image');
            $name = $file->getClientOriginalName();
            $tmp = explode('.', $file->getClientOriginalName());
            $coverImageName = round(microtime(true)) . '.' . end($tmp);
            $file->move('images/post-cover-images', $coverImageName);
            $post->cover_image = $coverImageName;
        }

      
        $post->title = trim($request->get('title'));
        $post->name_italian = ($request->get('name_italian') != '') ? $request->get('name_italian'): '';
        $post->name_german = ($request->get('name_german')!== '')? $request->get('name_german'):'';
        $post->content = $request->get('content');
        $post->published_by = $request->get('published_by');
        $post->is_available = $request->get('is_available');
        $post->short_description = $request->get('short_description');
        $status = $post->save();
       
        if($request->has('gallery_token') && $request->gallery_token != ''){
            $property_images = BlogImageGallery::where('temp_id', '=', $request->get('gallery_token'))->get();
            if($property_images){
                foreach($property_images as $property_image){
                    $image_list = BlogImageGallery::where('id',$property_image->id)->first();
                    $image_list->post_id = $post->id;
                    $image_list->save();
                }
            }
        }
        $language = LanguageLine::where('key','blog_title_'.$post->id)->delete();
        LanguageLine::create([
          'group' => 'blog',
          'key' => 'blog_title_'.$post->id,
          'text' => [
              'en' => $post->title,
              'it' => $request->has('name_italian') && $request->name_italian != '' ? $request->name_italian : $post->title,
              'de' => $request->has('name_german') && $request->name_german != '' ? $request->name_german : $post->title
          ],
        ]);
        $language = LanguageLine::where('key','blog_short_description_'.$post->id)->delete();
        LanguageLine::create([
            'group' => 'blog',
            'key' => 'blog_short_description_'.$post->id,
            'text' => [
                'en' => $request->short_description,
                'it' => $request->has('italian_short_description') && $request->italian_short_description != '' ? $request->italian_short_description : $post->short_description,
                'de' => $request->has('german_short_description') && $request->german_short_description != '' ? $request->german_short_description : $post->short_description
            ],
          ]);
        $language = LanguageLine::where('key','blog_description_'.$post->id)->delete();
        LanguageLine::create([
            'group' => 'blog',
            'key' => 'blog_description_'.$post->id,
            'text' => [
                'en' => $post->content,
                'it' => $request->has('content_italian') && $request->content_italian != '' ? $request->content_italian : $post->content,
                'de' => $request->has('content_german') && $request->content_german != '' ? $request->content_german : $post->content
            ],
          ]);
          Session::flash('message', 'Record Updated Successfully..!');
         /* dd(123);*/
        return redirect()->route('add-post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Post::findOrFail($id);
        $item->delete();
        Session::flash('message', 'Record Deleted Successfully..!');
        return redirect()->back();
    }
    public function destroy_blog_image($id)
    {
        $item = BlogImageGallery::findOrFail($id);
        $item->delete();
        Session::flash('message', 'Blog Image deleted Successfully ..!');
        return redirect()->back();
    }
}
