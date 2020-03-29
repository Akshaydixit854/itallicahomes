@extends('index')

@section('title')
    Add New Post
@endsection

@section('extra-css')
<!-- Colorpicker Css -->
    {{ Html::style('bsbmd/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}

    <!-- Dropzone Css -->
    {{ Html::style('bsbmd/plugins/dropzone/dropzone.css') }}

    <!-- Multi Select Css -->
    {{ Html::style('bsbmd/plugins/multi-select/css/multi-select.css') }}

    <!-- Bootstrap Spinner Css -->
    {{ Html::style('bsbmd/plugins/jquery-spinner/css/bootstrap-spinner.css') }}

    <!-- Bootstrap Tagsinput Css -->
    {{ Html::style('bsbmd/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}

    <!-- Bootstrap Select Css -->
    {{ Html::style('bsbmd/plugins/bootstrap-select/css/bootstrap-select.css') }}

    <!-- noUISlider Css -->
    {{ Html::style('bsbmd/plugins/nouislider/nouislider.min.css') }}

@endsection
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
@section('content')
        <div class="container-fluid">
            <div class="block-header">
                <h2>Edit Posts</h2>
            </div>
            @php
                $uniq_id = uniqid();
            @endphp
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>
                               Edit Posts
                            </h2>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="{{ route('add-post.update',$post->id) }}" enctype="multipart/form-data">
                               <input type="hidden" name="_method" value="PUT">
                               {{ csrf_field() }}
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <label class="form-label">Post Title</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="title" required value="{{$post->title}}">
                                            </div>
                                            @if ($errors->has('title'))
                                                <label id="name-error" class="error" for="title">{{ $errors->first('title') }}</label>
                                            @endif
                                        </div>
                                        @php
                                            $language_title = json_decode($language_line_title);
                                        @endphp
                                        <label class="form-label">Name/Title In Italian</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="name_italian" value="@if(\Lang::has('blog.blog_title_'.$post->id)) {{$language_title->text->it}} @endif"  placeholder="Title  In Italian">
                                            </div>
                                            @if ($errors->has('name_italian'))
                                                <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                            @endif
                                        </div>
                                        <label class="form-label">Name/Title In German</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="name_german" value="@if(\Lang::has('blog.blog_title_'.$post->id)) {{$language_title->text->de}} @endif"  placeholder="Enter Title  In German">
                                            </div>
                                            @if ($errors->has('name_german'))
                                                <label id="name-error" class="error" for="name_german">{{ $errors->first('name_german') }}</label>
                                            @endif
                                        </div>
                                        @php
                                            $language_desc = json_decode($language_line_short_desc);
                                        @endphp
                                        <label class="form-label">Short Description</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <textarea rows="2" class="form-control" name="short_description" value="{{$post->short_description}}"  placeholder="Short Description"></textarea>
                                            </div>
                                            @if ($errors->has('name_italian'))
                                                <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                            @endif
                                        </div>
                                        <label class="form-label">Short Description In Italian</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <textarea rows="2" class="form-control" name="italian_short_description" value="@if(\Lang::has('blog.blog_short_description_'.$post->id)) {{$language_desc->text->it}} @endif"  placeholder="Enter Short Description In Italian"></textarea>
                                            </div>
                                            @if ($errors->has('italian_short_description'))
                                                <label id="name-error" class="error" for="italian_short_description">{{ $errors->first('italian_short_description') }}</label>
                                            @endif
                                        </div>
                                        <label class="form-label">Short Description In German</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <textarea rows="2" class="form-control" name="german_short_description" value="@if(\Lang::has('blog.blog_short_description_'.$post->id)) {{$language_desc->text->de}} @endif"  placeholder="Enter Short Description In German"></textarea>
                                            </div>
                                            @if ($errors->has('german_short_description'))
                                                <label id="name-error" class="error" for="german_short_description">{{ $errors->first('german_short_description') }}</label>
                                            @endif
                                        </div>
                                        @php
                                            $language_con_desc = json_decode($language_line_desc);
                                        @endphp
                                        <label class="form-label">Post Content</label>
                                        <div class="form-group ">
                                            <textarea id="ckeditor1" name="content" required >{{$post->content}}</textarea>
                                            @if ($errors->has('content'))
                                                <label id="name-error" class="error" for="content">{{ $errors->first('content') }}</label>
                                            @endif
                                        </div>
                                        <label class="form-label">Content In Italian</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <textarea id="ckeditor2"  name="content_italian" required >@if(\Lang::has('blog.blog_description_'.$post->id)) {{$language_con_desc->text->it}} @endif</textarea>
                                            </div>
                                            @if ($errors->has('content_italian'))
                                                <label id="name-error" class="error" for="content_italian">{{ $errors->first('content_italian') }}</label>
                                            @endif
                                        </div>
                                        <label class="form-label">Content In German</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <textarea id="ckeditor3" name="content_german" required >@if(\Lang::has('blog.blog_description_'.$post->id)) {{$language_con_desc->text->de}} @endif</textarea>
                                            </div>
                                            @if ($errors->has('name_italian'))
                                                <label id="name-error" class="error" for="content_german">{{ $errors->first('content_german') }}</label>
                                            @endif
                                        </div>
                                        <label class="form-label">Blog Image Gallery</label>
                                        <div class="form-group ">
                                            <div class="dropzone clsbox" id="mydropzone">
                		                    </div>
                                            <input type="hidden" value="{{$uniq_id}}" id="gallery_token" name="gallery_token">
                                        <div>
                                        <ul class="img-alert-list"><li>1)Max file size allowed is 2MB </li><li>2)Max file allowed is 20</li></ul>
                                        <div class="form-group ">
                                            @foreach($gallery_images as $gallery_image)
                                                <img src="{{asset("/images/cover-images/".$gallery_image->image)}}" width="100px" height="100px">
                                                <a href="{{url('admin/destroy_blog_image')}}{{'/'.$gallery_image->id}}">Delete</a>
                                            @endforeach
                                        </div>
                                        <label class="form-label">Cover Image</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <img src={{asset("images/post-cover-images/" . $post->cover_image)}} width="200px" height="200px"/>
                                                <input type="file" name="cover_image" class="form-control" />
                                            </div>
                                            @if ($errors->has('cover_image'))
                                                <label id="name-error" class="error" for="cover_image">{{ $errors->first('cover_image') }}</label>
                                            @endif
                                        </div>

                                        <label class="form-label">Published By</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="published_by" required value="{{Auth::user()->name}}">
                                            </div>
                                            @if ($errors->has('published_by'))
                                                <label id="name-error" class="error" for="published_by">{{ $errors->first('published_by') }}</label>
                                            @endif
                                        </div>
                                        <label class="form-label">Online/Offline</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <select class="form-control" name="is_available" required>
                                                    <option value="1" @if($post->is_available == 1){{'selected'}} @endif>Online</option>
                                                    <option value="0" @if($post->is_available == 0){{'selected'}} @endif>Offline</option>
                                                </select>
                                            </div>
                                            @if ($errors->has('is_available'))
                                                <label id="name-error" class="error" for="is_available">{{ $errors->first('is_available') }}</label>
                                            @endif
                                        </div>

                                    </div>
                                </div>

                                <button id="button" class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
        </div>
@endsection

@section('extra-script')
    {{Html::script('bsbmd/plugins/autosize/autosize.js')}}
    {{Html::script('bsbmd/plugins/momentjs/moment.js')}}
    {{Html::script('bsbmd/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}
    {{Html::script('bsbmd/js/pages/forms/basic-form-elements.js')}}
    {{Html::script('bsbmd/plugins/jquery-validation/jquery.validate.js')}}
    {{Html::script('bsbmd/plugins/jquery-steps/jquery.steps.js')}}
    {{Html::script('bsbmd/plugins/sweetalert/sweetalert.min.js')}}
    {{Html::script('bsbmd/js/pages/forms/form-validation.js')}}
    {{Html::script('bsbmd/plugins/dropzone/dropzone.js')}}
    <!-- Ckeditor -->
    {{Html::script('bsbmd/plugins/ckeditor/ckeditor.js')}}
    <script>
        //drag and drop customization
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#mydropzone", {
          url: "/admin/blog_image_gallery/"+$('#gallery_token').val(),
          uploadMultiple: true,
          parallelUploads: 20,
          autoProcessQueue : false,
          createImageThumbnails: true,
          addRemoveLinks: true,
          maxFiles: 20,

          init: function() {
            this.on('error', function(file, errorMessage) {
              console.log(errorMessage);
            });
            this.on('addedfile', function(file) {
                if(file.size > (1024 * 1024 * 2)){ // not more than 2mb
                    this.removeFile(file);
                }
            });
            this.on("maxfilesexceeded", function(file){
                this.removeFile(file);
            });
          }
        });
        $("#button").click(function (e) {
            e.preventDefault();
            myDropzone.processQueue();
            setTimeout(function(){ $('#form_validation').submit(); }, 2000);
        });

    </script>
    <script>
        $(function () {
            //CKEditor
            CKEDITOR.replace('ckeditor1');
            CKEDITOR.replace('ckeditor2');
            CKEDITOR.replace('ckeditor3');
            CKEDITOR.config.height = 300;
        });
    </script>
@endsection
