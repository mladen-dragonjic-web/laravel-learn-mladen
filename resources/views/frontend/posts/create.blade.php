@extends('templates.frontend.layout')

@section('seo-title')
    <title>Create new post</title>
@endsection

@section('page-title')
    Create new post
@endsection

@section('custom-css')
@endsection

@section('content')
    
    <div class="c-content-blog-post-1-view">
        <div class="c-content-blog-post-1">
            <div class="c-comments">
                <div class="c-content-title-1">
                    <h3 class="c-font-uppercase c-font-bold">Post details</h3>
                    <div class="c-line-left"></div>
                </div>
                <form action="http://laravel.learn/posts/create" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input placeholder="Category" name="category" value="{{ old('category') }}" class="form-control c-square" type="text"> 
                        @if($errors->has('category'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->get('category') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input placeholder="Title" name="title" value="{{ old('title') }}" class="form-control c-square" type="text"> 
                        @if($errors->has('title'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->get('title') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input placeholder="Image url" name="image" value="{{ old('image') }}" class="form-control c-square" type="text"> 
                        @if($errors->has('image'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->get('image') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <textarea rows="8" name="content" class="form-control c-square">{!! old('content') !!}</textarea>
                        @if($errors->has('content'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->get('content') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-md c-btn-sbold btn-block c-btn-square">Save post</button>
                    </div>
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                </form>
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
