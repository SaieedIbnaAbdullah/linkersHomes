@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    @php
        $sliders =  \App\Models\Slider::where('status', 1)->get();
        $players =  \App\Models\ItemPost::where('item_category_id', 1)->where('status', 1)->get();
        $sponsors =  \App\Models\ItemPost::where('item_category_id', 2)->where('status', 1)->latest()->get();
        $partners =  \App\Models\ItemPost::where('item_category_id', 3)->where('status', 1)->latest()->get();
        $image_galleries =  \App\Models\ItemPost::where('item_category_id', 4)->where('status', 1)->latest()->get()->take(8);
        $video_galleries =  \App\Models\ItemPost::where('item_category_id', 5)->where('status', 1)->latest()->get()->take(8);
        $newses =  \App\Models\ItemPost::where('item_category_id', 6)->where('status', 1)->latest()->get();
    @endphp
    <div class="slide-one-item home-slider owl-carousel">
        @foreach($sliders as $slider)
            <div class="site-blocks-cover inner-page overlay" style="background-image: url({{ $slider->image }});"
                 data-aos="fade" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6" data-aos="fade">
                            {{--<h1 class="font-secondary font-weight-bold text-uppercase">{{ $slider->title }}</h1>--}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="py-5 bg-primary" style="margin-top: -2px">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                    <h2 class="text-uppercase text-white mb-0">Talent Hunt(2019-20)</h2>
                </div>
                <div class="col-md-3 ml-auto text-center text-md-left">
                    <a href="{{ url('contact') }}" class="btn btn-bg-primary d-inline-block d-md-block font-secondary text-uppercase">
                        {{ __('site.contact_us') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{--player--}}
    <div class="site-section" style="background-image: url('{{ asset('site/theme6/images/crick1.jpg') }}'); background-attachment: fixed; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="site-section-heading text-center text-uppercase">{{ __('site.player') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 block-13 nav-direction-white">
                    <div class="nonloop-block-13 owl-carousel">
                        @foreach($players as $player)
                            <div class="text-center mb-4">
                                <img src="{{ asset('lazy.png') }}" data-src="{{ $player->image ? $player->image : url('image/avatar.jpg') }}" alt="{{ $player->title }}" class="lazy rounded-circle mb-4">
                                <h2 class="h5 ">{{ $player->title }}</h2>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--news--}}
    <div class="site-section bg-light" style="background: #f3f3f3 !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="site-section-heading text-center text-uppercase">{{ __('site.news') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 block-13 nav-direction-white">
                    <div class="nonloop-block-15 owl-carousel">
                        @foreach($newses as $news)
                            <div style="cursor: pointer; z-index: 9999999999" onclick="window.location.href='{{ route("site.item.post.show", ["category_slug" => 'news', "post_slug" => $news->slug]) }}'">
                                <div class="media-image" onclick="window.location.href='{{ route("site.item.post.show", ["category_slug" => 'news', "post_slug" => $news->slug]) }}'">
                                    <img style="width: 100%; height: 180px;" src="{{ asset('lazy.png') }}" data-src="{{ $news->image ? $news->image : url('image/placeholder.jpg') }}" alt="{{ $news->title }}" class="lazy img-fluid">
                                    <div class="media-image-body bg-white">
                                        <h2 class="font-secondary text-uppercase">{{ $news->title }}</h2>
                                        <p>Date <span style="color:#66BC51;">{{ $news->created_at->format('d/m/Y') }}</span>, Posted by <span style="color:#66BC51;">Admin</span></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <p class="text-center"><a href="{{ url('item/news/post') }}" class="btn btn-primary rounded text-white px-4">{{ __('site.all_news') }}</a></p>
                </div>
            </div>
        </div>
    </div>
    {{--photo gallery--}}
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <h2 class="site-section-heading text-center text-uppercase">{{ __('site.photo_gallery') }}</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($image_galleries as $image_gallery)
                    <div class="col-md-3 mb-4">
                        <a class="image-link" href="{{ $image_gallery->image ? $image_gallery->image : url('image/placeholder.jpg') }}">
                            <div class="media-image">
                                <img style="width: 100%; height: 180px;" src="{{ asset('lazy.png') }}" data-src="{{ $image_gallery->image ? $image_gallery->image : url('image/placeholder.jpg') }}" alt="{{ $image_gallery->title }}" class="lazy img-fluid">
                                {{--<div class="media-image-body">
                                    <h2 class="font-secondary text-uppercase">{{ $image_gallery->title }}</h2>
                                </div>--}}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <p class="text-center"><a href="{{ url('item/photo-gallery/post') }}" class="btn btn-primary rounded text-white px-4">{{ __('site.all_gallery') }}</a></p>
        </div>
    </div>
    {{--video gallery--}}
    <div class="site-section bg-light" style="background: #f3f3f3 !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="site-section-heading text-center text-uppercase">{{ __('site.video_gallery') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 block-13 nav-direction-white">
                    <div class="nonloop-block-151 owl-carousel">
                        @foreach($video_galleries as $video_gallery)
                            <a class="video-link" href="{{ $video_gallery->body }}" style="z-index: 9999999;">
                                <div class="media-image">
                                    <img style="width: 100%; height: 180px;" src="{{ asset('lazy.png') }}" data-src="{{ $video_gallery->image ? $video_gallery->image : url('image/placeholder.jpg') }}" alt="{{ $video_gallery->title }}" class="lazy img-fluid">
                                    <div class="media-image-body bg-white">
                                        <h2 class="font-secondary text-uppercase">{{ $video_gallery->title }}</h2>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <p class="text-center"><a href="{{ url('item/video-gallery/post') }}" class="btn btn-primary rounded text-white px-4">{{ __('site.all_video') }}</a></p>
                </div>
            </div>
        </div>
    </div>
    {{--sponsor--}}
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="site-section-heading text-center text-uppercase">{{ __('site.sponsor') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 block-13 nav-direction-white">
                    <div class="nonloop-block-13 owl-carousel">
                        @foreach($sponsors as $sponsor)
                            <div class="text-center mb-4">
                                <img style="width: 100%; height: 110px;" src="{{ asset('lazy.png') }}" data-src="{{ $sponsor->image ? $sponsor->image : url('image/logop.jpg') }}" alt="{{ $sponsor->title }}" class="lazy img-fluid w-100 mb-4">
                                <h2 class="h5 ">{{ $sponsor->title }}</h2>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--partner--}}
    <div class="site-section bg-light" style="background: #f3f3f3 !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="site-section-heading text-center text-uppercase">{{ __('site.partner') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 block-13 nav-direction-white">
                    <div class="nonloop-block-13 owl-carousel">
                        @foreach($partners as $partner)
                            <div class="text-center mb-4">
                                <img style="width: 100%; height: 110px;" src="{{ asset('lazy.png') }}" data-src="{{ $partner->image ? $partner->image : url('image/logop.jpg') }}" alt="{{ $partner->title }}" class="lazy img-fluid w-100 mb-4">
                                <h2 class="h5 ">{{ $partner->title }}</h2>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--social corner--}}
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <h2 class="site-section-heading text-center text-uppercase">{{ __('site.social_corner') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="fb_iframe">

                    </div>

                </div>
                <div class="col-md-6" style="border: 1px solid #ebedf0;">
                    <div id="tw_iframe">

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('style')
@stop

@section('script')
    <script>
        $(function() {
            let fbFrame = `<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FPKCSBD&tabs=timeline&width=600&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                            style="border:none;overflow:hidden; width: 100%; height: 300px;"
                            scrolling="no" frameborder="0"
                            allowTransparency="true"
                            allow="encrypted-media"
                    >
                    </iframe>`;
            $('#fb_iframe').append(fbFrame);
            let twFrame = `<a class="twitter-timeline" data-height="280" href="https://twitter.com/pkcsbd">Tweets by TwitterDev</a>`;
            $('#tw_iframe').append(twFrame);
            $('<script/>',{type:'text/javascript', src:'https://platform.twitter.com/widgets.js', async: true}).appendTo('#tw_iframe');
        });
    </script>
@stop
