@extends('index')

@section('title')
    @lang('new-amenities')
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
            <h2>Amenities</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-pink">
                        <h2>
                            Add Amenities
                        </h2>

                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" action="{{ route('add-amenities.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label class="form-label">Amenity Unique Name</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="amenities_name" required>
                                        </div>
                                        @if ($errors->has('amenities_name'))
                                            <label id="name-error" class="error" for="amenities_name">{{ $errors->first('amenities_name') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Amenity Unique Name In Italian</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name_italian"  placeholder="Amenity Unique Name In Italian">
                                        </div>
                                        @if ($errors->has('name_italian'))
                                            <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Amenity Unique Name In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name_german"  placeholder="Amenity Unique Name  In German">
                                        </div>
                                        @if($errors->has('name_italian'))
                                            <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Amenity Display Name</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="amenities_display_name" required>
                                        </div>
                                        @if ($errors->has('amenities_display_name'))
                                            <label id="name-error" class="error" for="amenities_display_name">{{ $errors->first('amenities_display_name') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Amenity Displayname In Italian</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="italian"  placeholder="Displayname in italian">
                                        </div>
                                    </div>
                                    <label class="form-label">Amenity Displayname In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="german"  placeholder="Displayname in german">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
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
