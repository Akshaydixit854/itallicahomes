@extends('auth.app')

@section('content')
    <form id="sign_in" role="form" method="POST" action="{{ url('login') }}">
          {{ csrf_field() }}
        <div class="login-register" style="background-image:url({{url('')}}/images/background/login-register.png);">
            <div class="login-box card">
                <div class="card-body">
                    <img src="{{asset('/images/logo-icon.png')}}" alt="homepage" class="dark-logo login-logo" width="100" height="40">
                    <h3 class="box-title m-b-20">Sign In</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text"  id="email" name="email" required="" placeholder="Username"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" id="password" name="password" required="" placeholder="Password"> </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 font-14">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div><!--  <a href="{{ route('password.request') }}" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> --> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

