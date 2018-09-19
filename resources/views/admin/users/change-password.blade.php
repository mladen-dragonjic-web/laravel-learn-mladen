@extends('templates.admin.master.layout')

@section('seo-title')
<title>Change password {{ config('app.seo-separator') }} {{ config('app.name') }}</title>
@endsection

@section('custom-css')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Change password for user {{ $user->name }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="">
                            @csrf
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password">
                                
                                @if ($errors->has('password'))
                                    <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label>Confirm password</label>
                                <input class="form-control" type="password" name="password_confirmation">
                                
                                @if ($errors->has('password_confirmation'))
                                    <p class="help-block text-danger">{{ $errors->first('password_confirmation') }}</p>
                                @endif
                            </div>
                            <div class="form-group text-right">
                                <a href='{{ route('users-welcome') }}' class="btn btn-default">Cancel</a>
                                <button class="btn btn-primary" type="submit">Change password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-js')

@endsection