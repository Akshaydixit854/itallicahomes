@extends('index')

@section('title')
    New Property Type
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
            <h2>Location</h2>
        </div>
        <!-- 'name', 'net_wt', 'gross_wt', 'stone_wt', 'other_details', 'description', 'item_image', 'caret', 'item_size', 'purity', 'height', 'width', 'discount', 'price', 'user_id']; -->
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-pink">
                        <h2>
                            Add New Location
                        </h2>

                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" action="{{ route('add-area.store') }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <label class="form-label">Area Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="area_name" placeholder="Area" required>
                                        </div>
                                        @if ($errors->has('area_name'))
                                            <label id="name-error" class="error"
                                                   for="area_name">{{ $errors->first('area_name') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Area In Italian</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name_italian"  placeholder="Name In Italian">
                                        </div>
                                        @if ($errors->has('name_italian'))
                                            <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Area In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name_german"  placeholder="Name  In German">
                                        </div>
                                        @if ($errors->has('name_italian'))
                                            <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Description</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="description" required placeholder="Enter Property Description"></textarea>
                                        </div>
                                        @if ($errors->has('description'))
                                            <label id="name-error" class="error"
                                                   for="type_name">{{ $errors->first('description') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Description In Italian</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="italian"  placeholder="Description in italian"></textarea>
                                        </div>

                                    </div>
                                    <label class="form-label">Description In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="german"  placeholder="Description in german"></textarea>
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
