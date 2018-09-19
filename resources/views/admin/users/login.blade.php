@extends('templates.admin.login.layout')

@section('seo-title')
<title>{{ trans('admin.login.title1') }} {{ config('app.seo-separator') }} {{ config('app.name') }}</title>
@endsection

@section('custom-css')

@endsection

@section('content')
<div class="login-panel panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ trans('admin.login.title2') }}</h3>
    </div>
    <div class="panel-body">
        @include('templates.admin.partials.message')
        
        <form role="form" method="post" action="">
            @csrf
            <fieldset>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input value='{{ old('email') }}' class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                    @if ($errors->has('password'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>
                <!-- Change this to a button or input when using this as a form -->
                <button class="btn btn-lg btn-success btn-block">Login</button>
            </fieldset>
        </form>
    </div>
</div>
@endsection

@section('custom-js')

@endsection