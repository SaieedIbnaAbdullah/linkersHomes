<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
<div class="menu-container">
    <div class="navcon container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-navbar-wrap js-site-navbar bg-white">
                    <div class="container">
                        <div class="site-navbar bg-light">
                            <div class="row align-items-center">
                                <div class="col-12 top-nav">
                                    <nav class="site-navigation text-right" role="navigation">
                                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                                            @foreach($top_nav as $tnav)
                                                <li>
                                                    @if(App::getLocale() == 'en')
                                                        <a style="font-size: 13px !important;" href="{{ $tnav->url }}">{{ $tnav->title->en }}</a>
                                                    @else
                                                        <a style="font-size: 13px !important;" href="{{ $tnav->url }}">{{ $tnav->title->bn }}</a>
                                                    @endif
                                                </li>
                                            @endforeach
                                            <li class="hidden-sm">
                                                <a style="font-size: 13px !important;" href="{{ request()->fullUrlWithQuery(['lang' => (App::getLocale() == 'en' ? 'bn' : 'en')]) }}">{{(App::getLocale() == 'en' ? 'bn' : 'en') }}</a>
                                            </li>
                                            <li class="hidden-sm">
                                                <a style="font-size: 13px;" href="{{ url('login') }}">
                                                    <span class="icon-sign-in"></span> {{ App::getLocale() == 'en' ? 'Login' : 'লগইন' }}
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="site-navbar-wrap js-site-navbar bg-white">
                    <div class="container">
                        <div class="site-navbar bg-light">
                            <div class="row align-items-center">
                                <div class="col-2">
                                    <h2 class="mb-0 site-logo">
                                        <a href="{{ url('/') }}" class="font-weight-bold">
                                            <img class="logo" src="{{ $setting_site->logo ? $setting_site->logo : asset('image/logo.jpg') }}" alt="PKCSBD">
                                        </a>
                                    </h2>
                                </div>
                                <div class="col-10">
                                    <nav class="site-navigation text-right" role="navigation">
                                        <div class="container">
                                            <div class="row">
                                                <div class="d-lg-none ml-auto py-3" style="margin-top: 3px;">
                                                    <a style="font-size: 13px;" href="{{ url('login') }}" class="text-primary">
                                                        <span class="icon-sign-in"></span> {{ App::getLocale() == 'en' ? 'Login' : 'লগইন' }}
                                                    </a>
                                                    <a style="font-size: 13px;" href="javascript:void(0)" data-toggle="modal" data-target="#registrationModal" class="text-primary">
                                                        <span class="icon-registered"></span> {{ App::getLocale() == 'en' ? 'Registration' : 'রেজিস্ট্রেশন' }}
                                                    </a>
                                                    <a style="font-size: 13px;" href="{{ request()->fullUrlWithQuery(['lang' => (App::getLocale() == 'en' ? 'bn' : 'en')]) }}" class="text-primary">
                                                        <span class="icon-language2"></span> {{ App::getLocale() == 'en' ? 'BN' : 'EN' }}
                                                    </a>
                                                </div>
                                                <div class="d-lg-none py-3" style="margin-left: 5px;">
                                                    <a href="#" class="site-menu-toggle js-menu-toggle text-primary">
                                                        <span class="icon-menu h3 text-primary"></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                                <li>
                                                    <a style="font-size: 18px !important;" href="{{ url('/') }}"><span class="icon-home"></span></a>
                                                </li>
                                                @foreach($site_nav as $nav)
                                                    @if(empty($nav->dropdown))
                                                        <li>
                                                            @if(App::getLocale() == 'en')
                                                                <a style="font-size: 14px !important;" href="{{ $nav->url }}">{{ $nav->title->en }}</a>
                                                            @else
                                                                <a style="font-size: 14px !important;" href="{{ $nav->url }}">{{ $nav->title->bn }}</a>
                                                            @endif
                                                        </li>
                                                    @else
                                                        <li class="has-children">
                                                            @if(App::getLocale() == 'en')
                                                                <a style="font-size: 14px !important;" href="javascript:void(0)">{{ $nav->title->en }}</a>
                                                            @else
                                                                <a style="font-size: 14px !important;" href="javascript:void(0)">{{ $nav->title->bn }}</a>
                                                            @endif
                                                            <ul class="dropdown">
                                                                @foreach($nav->dropdown as $submenu)
                                                                    <li>
                                                                        @if(App::getLocale() == 'en')
                                                                            <a style="font-size: 14px !important;" href="{{ $nav->url }}">{{ $nav->title->en }}</a>
                                                                        @else
                                                                            <a style="font-size: 14px !important;" href="{{ $nav->url }}">{{ $nav->title->bn }}</a>
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endif
                                                @endforeach
                                                <li class="hidden-sm">
                                                    <a {{--href="{{ url('registration') }}"--}} data-toggle="modal" data-target="#registrationModal">
                                                        <span class="d-inline-block p-2 bg-primary text-white btn btn-primary">{{ __('site.register') }}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
