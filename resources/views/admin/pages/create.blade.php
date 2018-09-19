@extends('templates.admin.master.layout')

@section('seo-title')
<title>Create new page {{ config('app.seo-separator') }} {{ config('app.name') }}</title>
@endsection

@section('custom-css')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Create new page</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group{{ $errors->has('page_id') ? ' has-error' : '' }}">
                                <label>Parent page</label>
                                <select name="page_id" class="form-control">
                                                <option value="">--Select--</option>
                                                <option value="0">Main page</option>
                                                @if(count($data)>0)
                                                    @foreach($data as $value)
                                                        <option value="{{ $value->id }}" @if(old('page_id') == $value->id) selected  @endif>{{ $value->title }}</option> 
                                                    @endforeach
                                                @endif
                                </select>
                                @if ($errors->has('page_id'))
                                    <p class="help-block text-danger">{{ $errors->first('page_id') }}</p>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label>Title</label>
                                <input class="form-control" type="text" name="title" value="{{ old('title') }}">
                                
                                @if ($errors->has('title'))
                                    <p class="help-block text-danger">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label>Description</label>
                                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                
                                @if ($errors->has('description'))
                                    <p class="help-block text-danger">{{ $errors->first('description') }}</p>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label>Content</label>
                                <textarea class="form-control" name="content">{!! old('content') !!}</textarea>
                                
                                @if ($errors->has('content'))
                                    <p class="help-block text-danger">{{ $errors->first('content') }}</p>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label>Image</label>
                                <input type="file" name='image'>
                                
                                @if ($errors->has('image'))
                                    <p class="help-block text-danger">{{ $errors->first('image') }}</p>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('header') ? ' has-error' : '' }}">
                                <label>Header</label>
                                <label class="radio-inline">
                                    <input type="radio" name="header" value="1" @if( old('header', 1) == 1 ) checked @endif>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="header" value="0" @if( old('header', 1) == 0 ) checked @endif>No
                                </label>
                                
                                @if ($errors->has('header'))
                                    <p class="help-block text-danger">{{ $errors->first('header') }}</p>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('aside') ? ' has-error' : '' }}">
                                <label>Aside</label>
                                <label class="radio-inline">
                                    <input type="radio" name="aside" value="1" @if( old('aside', 1) == 1 ) checked @endif>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="aside" value="0" @if( old('aside', 1) == 0 ) checked @endif>No
                                </label>
                                
                                @if ($errors->has('aside'))
                                    <p class="help-block text-danger">{{ $errors->first('aside') }}</p>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('footer') ? ' has-error' : '' }}">
                                <label>Footer</label>
                                <label class="radio-inline">
                                    <input type="radio" name="footer" value="1" @if( old('footer', 0) == 1 ) checked @endif>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="footer" value="0" @if( old('footer', 0) == 0 ) checked @endif>No
                                </label>
                                
                                @if ($errors->has('footer'))
                                    <p class="help-block text-danger">{{ $errors->first('footer') }}</p>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('contact_form') ? ' has-error' : '' }}">
                                <label>Contact form</label>
                                <label class="radio-inline">
                                    <input type="radio" name="contact_form" value="1" @if( old('contact_form', 0) == 1 ) checked @endif>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="contact_form" value="0" @if( old('contact_form', 0) == 0 ) checked @endif>No
                                </label>
                                
                                @if ($errors->has('contact_form'))
                                    <p class="help-block text-danger">{{ $errors->first('contact_form') }}</p>
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
<script src="//cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection