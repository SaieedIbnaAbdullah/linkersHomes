<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3 class="footer-heading mb-4 text-white">{{ __('site.about') }}</h3>
                <p>
                    {!! substr(\App\Models\ContentCategory::where('slug', 'পিকেসিএসবিডি-কী')->first()->body, 0, 250) !!}
                </p>
                <p><a href="{{ url('content/%E0%A6%AA%E0%A6%BF%E0%A6%95%E0%A7%87%E0%A6%B8%E0%A6%BF%E0%A6%8F%E0%A6%B8%E0%A6%AC%E0%A6%BF%E0%A6%A1%E0%A6%BF-%E0%A6%95%E0%A7%80/post') }}" class="btn btn-primary rounded text-white px-4">{{ __('site.read_more') }}</a></p>
            </div>
            <div class="col-md-5 ml-auto">
                <div class="row">
                    <div class="col-md-5">
                        <h3 class="footer-heading mb-4 text-white">{{ __('site.quick_menu') }}</h3>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('item/news/post') }}">News</a></li>
                            <li><a href="{{ url('blog') }}">Blog</a></li>
                            <li><a href="{{ url('content/%E0%A6%B8%E0%A6%AE%E0%A7%9F%E0%A6%B8%E0%A7%82%E0%A6%9A%E0%A6%BF/post') }}">Schedule</a></li>
                            <li><a href="{{ url('item/photo-gallery/post') }}">Photo Gallery</a></li>
                            <li><a href="{{ url('item/video-gallery/post') }}">Video Gallery</a></li>
                        </ul>
                    </div>
                    <div class="col-md-7">
                        <h3 class="footer-heading mb-4 text-white">{{ __('site.important_links') }}</h3>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('/content/অন্যান্য/post/terms-and-conditions') }}">Terms and Conditions</a></li>
                            <li><a href="{{ url('/content/অন্যান্য/post/refund-and-return-policy') }}">Refund and Return Policy</a></li>
                            <li><a href="{{ url('/content/অন্যান্য/post/privacy-policy') }}">Privacy Policy</a></li>
                        </ul>
                        <h3 class="footer-heading mb-2 text-white">{{ __('site.contact_us') }}</h3>
                        <p>
                            Phone: {{ $setting_contact->primary_phone }}<br>
                            Email: {{ $setting_contact->primary_email }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">{{ __('site.social_icons') }}</h3></div>
                <div class="col-md-12">
                    <p>
                        <a href="{{ $setting_contact->facebook }}" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                        <a href="{{ $setting_contact->twitter }}" class="p-2"><span class="icon-twitter"></span></a>
                        <a href="{{ $setting_contact->youtube }}" class="p-2"><span class="icon-youtube"></span></a>
                    </p>
                    <p>
                        Secure payment by
                    </p>
                    <img style="width: 100%" src="{{ url('image/sslcommerz.png') }}" alt="SSLCommerz">
                </div>
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-6">
                <p class="pull-left">
                    Copyright &copy;
                    <script>document.write(new Date().getFullYear());</script>
                    All Rights Reserved
                </p>
            </div>
            <div class="col-md-6">
                <p class="pull-right">
                    Technical Assistance - ZeroOneBD
                </p>
            </div>
        </div>
    </div>
</footer>
