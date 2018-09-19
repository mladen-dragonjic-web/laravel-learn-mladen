@extends('templates.frontend.layout')

@section('seo-title')
    <title>{{ $post->title }}</title>
@endsection

@section('page-title')
    One post
@endsection

@section('custom-css')
@endsection

@section('content')
    
    <div class="c-content-blog-post-1-view">
        <div class="c-content-blog-post-1">
            
            @if(!empty($post->image))
                <div class="c-media">
                    <div class="c-content-media-2-slider" data-slider="owl">
                        <div class="owl-theme c-theme owl-single" data-single-item="true" data-auto-play="4000" data-rtl="false">
                            <div class="item">
                                <div class="c-content-media-2" style="background-image: url({{ $post->image }}); min-height: 460px;"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
            
            <div class="c-title c-font-bold c-font-uppercase">
                <a href="#">{{ $post->title }}</a>
            </div>
            <div class="c-panel c-margin-b-30">
                <div class="c-author">
                    <a href="#">
                        <span class="c-font-uppercase">{{ $post->category }}</span>
                    </a>
                </div>
                <div class="c-date">on
                    <span class="c-font-uppercase">{{ $post->created_at }}</span>
                </div>
                <ul class="c-tags c-theme-ul-bg">
                    <li>ux</li>
                    <li>marketing</li>
                    <li>events</li>
                </ul>
                <div class="c-comments">
                    <a href="#">
                        <i class="icon-speech"></i> 30 comments</a>
                </div>
            </div>
            <div class="c-desc">
                {!! $post->content !!}
            </div>
            <div class="c-comments">
                <div class="c-content-title-1">
                    <h3 class="c-font-uppercase c-font-bold">Comments(30)</h3>
                    <div class="c-line-left"></div>
                </div>
                <div class="c-comment-list">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" alt="" src="/templates/frontend/assets/base/img/content/team/team1.jpg"> </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="#" class="c-font-bold">Sean</a> on
                                <span class="c-date">23 May 2015, 10:40AM</span>
                            </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" alt="" src="/templates/frontend/assets/base/img/content/team/team3.jpg"> </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="#" class="c-font-bold">Strong Strong</a> on
                                <span class="c-date">21 May 2015, 11:40AM</span>
                            </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" alt="" src="/templates/frontend/assets/base/img/content/team/team4.jpg"> </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="#" class="c-font-bold">Emma Stone</a> on
                                        <span class="c-date">30 May 2015, 9:40PM</span>
                                    </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. </div>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" alt="" src="/templates/frontend/assets/base/img/content/team/team7.jpg"> </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="#" class="c-font-bold">Nick Nilson</a> on
                                <span class="c-date">30 May 2015, 9:40PM</span>
                            </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. </div>
                    </div>
                </div>
                <div class="c-content-title-1">
                    <h3 class="c-font-uppercase c-font-bold">Leave A Comment</h3>
                    <div class="c-line-left"></div>
                </div>
                <form action="#">
                    <div class="form-group">
                        <input placeholder="Your Name" class="form-control c-square" type="text"> </div>
                    <div class="form-group">
                        <input placeholder="Your Email" class="form-control c-square" type="text"> </div>
                    <div class="form-group">
                        <input placeholder="Your Website" class="form-control c-square" type="text"> </div>
                    <div class="form-group">
                        <textarea rows="8" name="message" placeholder="Write comment here ..." class="form-control c-square"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-md c-btn-sbold btn-block c-btn-square">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
                        
@endsection

@section('custom-js')
@endsection
