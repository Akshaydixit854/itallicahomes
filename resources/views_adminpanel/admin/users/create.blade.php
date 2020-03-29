@extends('index')

@section('title')
	User
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
                <h2>Add New User</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add New User
                            </h2>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="{{ route('users.store') }}">
                            {{ csrf_field() }}
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line {{ $errors->has('name') ? ' error' : '' }}">
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Username"  autocomplete="off" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('name') }}</label>
                                    @endif
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                    </span>
                                    <div class="form-line {{ $errors->has('email') ? ' error' : '' }}">
                                        <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email Address" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                        <label id="email-error" class="error" for="email">{{ $errors->first('email') }}</label>
                                    @endif
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                    </span>
                                    <div class="form-line {{ $errors->has('password') ? ' error' : '' }}">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <label id="password-error" class="error" for="name">{{ $errors->first('password') }}</label>
                                    @endif
                                </div>
                                            <!-- $fl_array = in_array("/%admin%/", $role); -->
                                <div class="form-group form-float">
                                    <label class="form-label">Roles</label>
                                    <select class="form-control show-tick" name="roles[]" multiple required>
                                            <optgroup label="Roles" data-max-options="1">
                                            @foreach($roles as $role)
                                                <option>{{ $role }}</option>
                                            @endforeach
                                     
                                            </optgroup>
                                  <!--       <optgroup label="Roles" data-max-options="1">
                                            @role('admin')
                                            @php
                                            $aray = array('admin','admin1','admin2','admin3','superadmin','superadmin2','superadmin3','superadmin4','Admin','super-admin','SuperAdmin','super-admin1','super-admin2','super-admin3','super-admin4');
                                            @endphp
                                            @foreach($roles as $role)
                                            @if(in_array($role,$aray))
                                            continue;
                                            @else                  
                                            <option>{{ $role }}</option>
                                            @endif
                                            @endforeach

                                            @else 
                                            @foreach($roles as $role)
                                            <option>{{ $role }}</option>
                                            @endforeach
                                            @endrole                                      
                                        </optgroup> -->
                                    </select>
                                    
                                     @if ($errors->has('roles'))
                                        <label id="name-error" class="error" for="email">{{ $errors->first('roles') }}</label>
                                    @endif
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">ADD</button>
                                 <button class="btn btn-info1" type="button" onclick="window.history.back();" >BACK</button>
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
