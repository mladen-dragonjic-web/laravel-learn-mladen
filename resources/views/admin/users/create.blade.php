@extends('templates.admin.master.layout')

@section('seo-title')
<title>Create new admin user {{ config('app.seo-separator') }} {{ config('app.name') }}</title>
@endsection

@section('custom-css')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Create new admin user</h1>
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
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                                
                                @if ($errors->has('name'))
                                    <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label>Address</label>
                                <input class="form-control" type="text" name="address" value="{{ old('address') }}">
                                
                                @if ($errors->has('address'))
                                    <p class="help-block text-danger">{{ $errors->first('address') }}</p>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label>Phone</label>
                                <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                                
                                @if ($errors->has('phone'))
                                    <p class="help-block text-danger">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Email</label>
                                <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                                
                                @if ($errors->has('email'))
                                    <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
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
                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                <label>Role</label>
                                <select class="form-control" name="role">
                                    <option value="">-- Choose role --</option>
                                    <option value="administrator" {{ (old('role') == 'administrator') ? 'selected' : '' }}>Administrator</option>
                                    <option value="moderator" {{ (old('role') == 'moderator') ? 'selected' : '' }}>Moderator</option>
                                </select>
                                
                                @if ($errors->has('role'))
                                    <p class="help-block text-danger">{{ $errors->first('role') }}</p>
                                @endif
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-primary" type="submit">Save</button>
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