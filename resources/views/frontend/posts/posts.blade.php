@extends('templates.frontend.layout')

@section('seo-title')
    <title>All blog posts</title>
@endsection

@section('page-title')
    All blog posts
@endsection

@section('custom-css')
@endsection

@section('content')
    <div class="c-content-blog-post-1-list">
        
        @if(count($posts) > 0)
            @foreach($posts as $post)
                @include('frontend.posts.partials.post')
            @endforeach
        @endif        
        
        {{ $posts->appends(request()->all())->links() }}
        
    </div>                      
@endsection

@section('custom-js')
@endsection