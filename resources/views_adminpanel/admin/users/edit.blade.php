@extends('index')

@section('title')
    Edit Permission
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
                <h2>Users</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit User Details
                            </h2>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="{{ route('users.update',$user->id) }}">
                            {{ csrf_field() }}
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line {{ $errors->has('name') ? ' error' : '' }}">
                                        <input name="_method" type="hidden" value="PUT">
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Username" required autofocus>
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
                                        <input type="text" class="form-control" name="email" value="{{$user->email}}" placeholder="Email Address" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                        <label id="email-error" class="error" for="email">{{ $errors->first('email') }}</label>
                                    @endif
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Roles</label>
                                    <select class="form-control show-tick" name="roles[]" id="you" multiple required>
                                        <optgroup label="Roles" data-max-options="1">
                                            @foreach($roles as $role)
                                            <option>{{ $role }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                     @if ($errors->has('roles'))
                                        <label id="name-error" class="error" for="email">{{ $errors->first('roles') }}</label>
                                    @endif
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">UPDATE</button>
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

    <!-- Multi Select Plugin Js -->
    {{Html::script('bsbmd/plugins/multi-select/js/jquery.multi-select.js')}}
    {{Html::script('bsbmd/plugins/sweetalert/sweetalert.min.js')}}
    {{Html::script('bsbmd/js/pages/forms/form-validation.js')}}

     <script type="text/javascript">
     console.log(role);
        $("select").val(role).prop("selected", true);
    </script>
@endsection
