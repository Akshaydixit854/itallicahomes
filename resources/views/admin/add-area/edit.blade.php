@extends('index')

@section('title')
    Edit Property Type
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
@section('content')
        <div class="container-fluid">
          @if(Session::has('message'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
          @endif
            <div class="block-header">
                <h2>Location</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>
                                Edit Location
                            </h2>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="{{ route('add-area.update',$area->id) }}" enctype="multipart/form-data">
                               <input type="hidden" name="_method" value="PUT">
                               {{ csrf_field() }}
                               <div class="row clearfix">
                                   <div class="col-sm-12">

                                       <label class="form-label">Area Name <span class="req_field">*</span></label>
                                       <div class="form-group">
                                           <div class="form-line">
                                               <input type="text" class="form-control" name="area_name" placeholder="Enter Area Name" required value="{{$area->area_name}}">
                                           </div>
                                           @if ($errors->has('area_name'))
                                               <label id="name-error" class="error"
                                                      for="area_name">{{ $errors->first('area_name') }}</label>
                                           @endif
                                       </div>
                                       @php
                                           $language_title = json_decode($language_line_title);
                                       @endphp

                                       <label class="form-label">Area Name In Italian</label>
                                       <div class="form-group ">
                                           <div class="form-line">
                                               <input type="text" class="form-control" value="@if(\Lang::has('area.area_title_'.$area->id)) {{$language_title->text->it}} @endif" name="name_italian"  placeholder="Area In Italian">
                                           </div>
                                           @if ($errors->has('name_italian'))
                                               <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                           @endif
                                       </div>
                                       <label class="form-label">Area Name In German</label>
                                       <div class="form-group ">
                                           <div class="form-line">
                                               <input type="text" class="form-control"  value="@if(\Lang::has('area.area_title_'.$area->id)) {{$language_title->text->de}} @endif" name="name_german"  placeholder="Area In German">
                                           </div>
                                           @if ($errors->has('name_italian'))
                                               <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                           @endif
                                       </div>

                                       <label class="form-label">Description <span class="req_field">*</span></label>
                                       <div class="form-group">
                                           <div class="form-line">
                                               <textarea rows="2" class="form-control" name="description" required placeholder="Enter Area Description">{{$area->description}}</textarea>
                                           </div>
                                           @if ($errors->has('description'))
                                               <label id="name-error" class="error"
                                                      for="type_name">{{ $errors->first('description') }}</label>
                                           @endif
                                       </div>
                                       <label class="form-label">Description In Italian</label>
                                       <div class="form-group">
                                           <div class="form-line">
                                               @php
                                                   $language = json_decode($language_line);
                                               @endphp


                                               <textarea rows="2" class="form-control" name="italian" placeholder="Description in italian">@if(\Lang::has('area.area_description_'.$area->id)) {{$language->text->it}} @endif</textarea>
                                           </div>
                                       </div>
                                       <label class="form-label">Description In German</label>
                                       <div class="form-group ">
                                           <div class="form-line">
                                               <textarea rows="2" class="form-control" name="german"  placeholder="Description in german">@if(\Lang::has('area.area_description_'.$area->id)) {{$language->text->de}} @endif</textarea>
                                           </div>
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
@endsection
