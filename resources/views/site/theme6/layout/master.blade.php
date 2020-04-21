<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    {!! SEO::generate() !!}
    <link rel="shortcut icon" href="{{ asset('ico/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('ico/favicon.ico') }}" type="image/x-icon">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site/theme6/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme6/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme6/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme6/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme6/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme6/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme6/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme6/css/animate.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    <link rel="stylesheet" href="{{ asset('site/theme6/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme6/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme6/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme6/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.step.css') }}">
    <link rel="stylesheet" href="{{ asset('wizard/css/wizard.css') }}">
    <link rel="stylesheet" href="{{ asset('wizard/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('wizard/css/demo.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    @yield('style')
    <style>
        label.error {
            display: inline-block;
            width: 100%;
            color: #e8220d;
            margin-top: 5px;
        }
        #image-error {
            z-index: 10;
            height: 55px;
        }
        .site-section {
            padding: 60px 0;
        }
        .site-blocks-cover.overlay::before {
            position: absolute;
            content: "";
            left: 0;
            bottom: 0;
            right: 0;
            top: 0;
            background: rgba(0, 0, 0, 0.08);
        }
    </style>
</head>
<body style="background-image: url('{{ asset('site/theme6/images/bg.jpg') }}');">
<div class="site-wrap">
    @include('site.theme6.partials._header')
    @yield('content')
    @include('site.theme6.partials._footer')
    <div class="modal fade" id="registrationModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="margin-bottom: 20px; padding: 12px;">
                    <h5 style="font-size: 18px;" class="modal-title">{{ App::getLocale() == 'en' ? 'Online Registration' : 'রেজিস্ট্রেশন করুন' }}</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="wizard-container">
                        <div class="wizard-card" data-color="orange" id="wizardProfile">
                            {!! Form::open(['url' => route('site.registration.store'), 'method' => 'POST', 'files' => true, 'id' => 'wizardForm1']) !!}
                                <div class="wizard-navigation" style="width: 95%;margin-left: auto;margin-right: auto;">
                                    <div class="progress-with-circle">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                                    </div>
                                    <ul>
                                        @foreach($form_groups as $tab_key => $tab_form_group)
                                            <li>
                                                <a href="#tab_{{ $tab_key }}" data-toggle="tab">
                                                    <div class="iconcircle">
                                                        <i class="{{ $tab_form_group->icon }}"></i>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    @foreach($form_groups as $tab_content_key => $form_group)
                                        <div class="tab-pane" id="tab_{{ $tab_content_key }}">
                                            <section class="row">
                                                <div class="col-md-12">
                                                    <h5 class="text-primary my-3">{{ App::getLocale() == 'en' ? $form_group->title : $form_group->title_bn }}</h5>
                                                </div>
                                                @foreach($form_group->fields as $field)
                                                    <div class="{{ $field->grid }}">
                                                        @if($field->type == 'select')
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="{{ $field->field }}-addon1"><i class="{{ $field->icon }}"></i></span>
                                                                    </div>
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="{{ $field->field }}-addon2">{{ App::getLocale() == 'en' ? $field->name : $field->name_bn }}</span>
                                                                    </div>
                                                                    <select id="{{ $field->field }}" name="{{ $field->field }}"
                                                                            class="form-control">
                                                                        @if(App::getLocale() == 'en')
                                                                            @foreach($field->options as $skey => $option)
                                                                                <option value="{{ $skey }}">{{ $option }}</option>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach($field->options_bn as $skey => $option)
                                                                                <option value="{{ $skey }}">{{ $option }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                @error($field->field)
                                                                <small style="display: block; margin-top: 5px;"
                                                                       class="form-text text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        @elseif($field->type == 'radio')
                                                            <div class="form-group">
                                                                <label style="display: block;"
                                                                       for="{{ $field->field }}">{{ App::getLocale() == 'en' ? $field->name : $field->name_bn }} {!! $field->star ? '<span style="color: red;">*</span>' : '' !!}</label>
                                                                @if(App::getLocale() == 'en')
                                                                    @foreach($field->options as $rkey => $option)
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="{{ $field->field }}"
                                                                                   value="{{ $rkey }}"> {{ $option }}
                                                                        </label>
                                                                        <br>
                                                                    @endforeach
                                                                @else
                                                                    @foreach($field->options_bn as $rkey => $option)
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="{{ $field->field }}"
                                                                                   value="{{ $rkey }}"> {{ $option }}
                                                                        </label>
                                                                        <br>
                                                                    @endforeach
                                                                @endif
                                                                @error($field->field)
                                                                <small style="display: block; margin-top: 5px;"
                                                                       class="form-text text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        @else
                                                            <div class="form-group">
                                                                @if($field->type == 'textarea')
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="{{ $field->field }}-addon"><i class="{{ $field->icon }}"></i></span>
                                                                        </div>
                                                                        <textarea id="{{ $field->field }}" name="{{ $field->field }}"
                                                                                  class="form-control" cols="30"
                                                                                  rows="5">{{ old($field->field) }}</textarea>
                                                                    </div>
                                                                @elseif ($field->field == 'image')
                                                                    <div class="wrap-custom-file" style="margin: 0 auto; margin-top: 10px;">
                                                                        <input type="file" name="{{ $field->field }}"
                                                                               id="{{ $field->field }}" accept=".gif, .jpg, .png"/>
                                                                        <label for="{{ $field->field }}"
                                                                               style="background-image: url({{ asset('image/avatar.jpg') }}); background-size: cover;">
                                                                            <i class="icon-upload fa fa-plus-circle"></i>
                                                                        </label>
                                                                    </div>
                                                                @else
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="{{ $field->field }}-addon"><i class="{{ $field->icon }}"></i></span>
                                                                        </div>
                                                                        <input id="{{ $field->field }}" name="{{ $field->field }}"
                                                                               type="{{ $field->type }}" value="{{ old($field->field) }}"
                                                                               class="form-control"  aria-describedby="{{ $field->field }}-addon"
                                                                               placeholder="{{ App::getLocale() == 'en' ? $field->name : $field->name_bn }}">
                                                                    </div>
                                                                @endif
                                                                @error($field->field)
                                                                <small class="form-text text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                                @if($tab_content_key == 1)
                                                    <div class="col-md-12">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="acceptTerms">
                                                            <label class="form-check-label text-black" for="acceptTerms">
                                                                Accept <a class="text-info" href="{{ url('content/%E0%A6%85%E0%A6%A8%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%A8%E0%A7%8D%E0%A6%AF/post/terms-and-conditions') }}">Terms and Conditions</a>, <a class="text-info" href="{{ url('content/%E0%A6%85%E0%A6%A8%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%A8%E0%A7%8D%E0%A6%AF/post/refund-and-return-policy') }}">Refund and Return Policy</a>, <a class="text-info" href="{{ url('content/%E0%A6%85%E0%A6%A8%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%A8%E0%A7%8D%E0%A6%AF/post/refund-and-return-policy') }}">Privacy Policy</a>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endif
                                            </section>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="wizard-footer">
                                    <div class="row">
                                        <div class="col">
                                            <input type='button' style="color: #FFFFFF" class='btn btn-previous btn-primary btn-wd pull-left' name='previous' value='{{ App::getLocale() == 'en' ? 'Go to previous page' : 'পূর্ববর্তী পেইজে যান'  }}' />
                                            <input type='button' style="color: #FFFFFF" class='btn btn-next btn-fill btn-primary btn-wd pull-left' name='next' value='{{ App::getLocale() == 'en' ? 'Go to next page' : 'পরবর্তী পেইজে যান'  }}' />
                                        </div>
                                        <div class="col">
                                            <input id="paymentBtn" disabled type='submit' style="color: #FFFFFF; float: right;" class='btn btn-finish btn-fill btn-danger btn-wd pull-right' name='finish' value='{{ App::getLocale() == 'en' ? 'Complete Payment' : 'পেমেন্ট করুন'  }}' />
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('site/theme6/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('site/theme6/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('site/theme6/js/jquery-ui.js') }}"></script>
<script src="{{ asset('site/theme6/js/popper.min.js') }}"></script>
<script src="{{ asset('site/theme6/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('site/theme6/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('site/theme6/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('site/theme6/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('site/theme6/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('site/theme6/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('site/theme6/js/aos.js') }}"></script>
<script src="{{ asset('site/theme6/js/main.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('wizard/js/jquery.bootstrap.wizard.js') }}"></script>
<script src="{{ asset('wizard/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('wizard/js/wizard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.1.5/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function () {
        $('.image-link').magnificPopup({type: 'image'});
    });
    $(document).ready(function () {
        $('.video-link').magnificPopup({type: 'iframe'});
    });
</script>
@if(Session::has('success'))
    <script>
        Swal.fire(
            'Success!',
            '{{ Session::get('
        success ') }}',
            'success'
        )
    </script>
@endif
<script src="{{ asset('js/registration.js') }}"></script>
@yield('script')
@if($errors->any())
    <script>
        getDivisionList();
        getDistrictList('?division={{ old('geo_division_id')  }}');
        getUpazilaList('?district={{ old('geo_district_id')  }}');
        $('#registrationModal').modal('show');
        (document).ready(function () {
            $('geo_division_id').val('{{ old('geo_division_id') }}');
            $('geo_district_id').val('{{ old('geo_district_id') }}');
            $('geo_upazila_id').val('{{ old('geo_upazila_id') }}');
        });
    </script>
@endif
<script>
    $(document).ready(function () {
        let images = document.querySelectorAll(".lazy");
        new LazyLoad(images);
    });
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156427757-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-156427757-1');
</script>
</body>
</html>
