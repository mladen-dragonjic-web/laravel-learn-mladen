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
        <a href="{{ route('single-post', ['post' => $post->id]) }}">{{ $post->title }}</a>
    </div>
    <div class="c-panel">
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
</div>
