@extends('index')

@section('title')
    Edit Destination
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
                <h2>Destination</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>
                               Edit Destinations
                            </h2>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="{{ route('add-destination.update',$destination->id) }}" enctype="multipart/form-data">
                               <input type="hidden" name="_method" value="PUT">
                               {{ csrf_field() }}
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <label class="form-label">Destination Name <span class="req_field">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="_method" type="hidden" value="PUT">
                                                <input type="text" class="form-control" name="destination_name" value="{{ $destination->destination_name }}" required placeholder="Enter Destination Name">
                                            </div>
                                            @if ($errors->has('destination_name'))
                                                <label id="name-error" class="error" for="destination_name">{{ $errors->first('destination_name') }}</label>
                                            @endif
                                        </div>
                                        @php
                                            $language_title = json_decode($language_line_title);
                                        @endphp

                                        <label class="form-label">Name/Title In Italian</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="@if(\Lang::has('destination.destination_title_'.$destination->id)) {{$language_title->text->it}} @endif" name="name_italian"  placeholder="Enter Name or Title of the Property In Italian">
                                            </div>
                                            @if ($errors->has('name_italian'))
                                                <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                            @endif
                                        </div>
                                        <label class="form-label">Name/Title In German</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control"  value="@if(\Lang::has('destination.destination_title_'.$destination->id)) {{$language_title->text->de}} @endif" name="name_german"  placeholder="Enter Name or Title of the Property In German">
                                            </div>
                                            @if ($errors->has('name_italian'))
                                                <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                            @endif
                                        </div>
                                        @php
                                            $language = json_decode($language_line);
                                        @endphp
                                         <label class="form-label">Description <span class="req_field">*</span></label>
                                     <div class="form-group ">
                                            <textarea id="ckeditor" class="description"  name="description" >@if(\Lang::has('destination.destination_description_'.$destination->id)) {{$language->text->en}} @endif</textarea>
                                        @if ($errors->has('description'))
                                            <label id="name-error" class="error" for="description">{{ $errors->first('description') }}</label>
                                        @endif
                                    </div>
                                        <label class="form-label">Description In Italian</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                @php
                                                    $language = json_decode($language_line);
                                                @endphp


                                                <textarea id="ckeditor2" class="form-control" name="desc_italian" placeholder="Description in italian">@if(\Lang::has('destination.destination_description_'.$destination->id)) {{$language->text->it}} @endif</textarea>
                                            </div>
                                        </div>
                                        <label class="form-label">Description In German</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <textarea id="ckeditor3" name="desc_german" class="form-control"  placeholder="Description in german">@if(\Lang::has('destination.destination_description_'.$destination->id)) {{$language->text->de}} @endif</textarea>
                                            </div>

                                        </div>
                                        <label class="form-label">Cover Image <span class="req_field">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <img src="{{url('')}}/images/destination-covers/{{$destination->cover_image}}" height="100px" width="100px" />
                                                <input type="file" class="form-control" name="cover_image" placeholder="Choose Cover Image">
                                            </div>
                                            @if ($errors->has('cover_image'))
                                                <label id="name-error" class="error" for="cover_image">{{ $errors->first('cover_image') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary waves-effect" type="submit">UPDATE</button>
                                <button class="btn btn-info1" type="button" onclick="window.history.back();">BACK</button>
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

     {{Html::script('bsbmd/plugins/ckeditor/ckeditor.js')}}
     <script type="text/javascript">
           $(function () {
            //CKEditor
            CKEDITOR.replace('ckeditor');
             CKEDITOR.replace('ckeditor2');
              CKEDITOR.replace('ckeditor3');
           
            CKEDITOR.config.height = 300;
        });
     </script>
@endsection
