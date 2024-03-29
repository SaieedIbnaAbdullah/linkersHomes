@extends('layouts.app')

@section('site_title', 'Registration')

@section('page_title')
    <div class="app-title">
        <div>
            <h1>Registration Data</h1>
        </div>
    </div>
@stop

@section('page_content')
    <div class="tile card" style="margin: 0; padding: 0">
        <div class="card-header">
            Registration Data Form
        </div>
        <div class="tile-body" style="padding: 40px;">
            <div class="wizard-container">
                <div class="wizard-card" data-color="orange" id="wizardProfile">
                    {!! Form::open(['url' => url('admin/registered-profile'), 'method' => 'POST', 'files' => true, 'id' => 'wizardForm']) !!}
                    <div class="wizard-navigation" style="padding: 0 20px;">
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
                                                            {{--<option selected>{{ App::getLocale() == 'en' ? 'Select ' . $field->name : $field->name_bn . ' নির্বাচন করুন' }}</option>--}}
                                                            @if(App::getLocale() == 'en')
                                                                @foreach($field->options as $skey => $option)
                                                                    <option value="{{ $skey }}" {{ $form_data->{$field->field} == $skey ? 'selected' : '' }}>{{ $option }}</option>
                                                                @endforeach
                                                            @else
                                                                @foreach($field->options_bn as $skey => $option)
                                                                    <option value="{{ $skey }}" {{ $form_data->{$field->field} == $skey ? 'selected' : '' }}>{{ $option }}</option>
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
                                                                       value="{{ $rkey }}" {{ $form_data->{$field->field} == $rkey ? 'checked' : '' }}> {{ $option }}
                                                            </label>
                                                            <br>
                                                        @endforeach
                                                    @else
                                                        @foreach($field->options_bn as $rkey => $option)
                                                            <label class="radio-inline">
                                                                <input type="radio" name="{{ $field->field }}"
                                                                       value="{{ $rkey }}" {{ $form_data->{$field->field} == $rkey ? 'checked' : '' }}> {{ $option }}
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
                                                                      rows="5">{{ old($field->field) ? old($field->field) : $form_data->{$field->field} }}</textarea>
                                                        </div>
                                                    @elseif ($field->field == 'image')
                                                        <div class="wrap-custom-file" style="margin: 0 auto; margin-top: 10px;">
                                                            <input type="file" name="{{ $field->field }}"
                                                                   id="{{ $field->field }}" accept=".gif, .jpg, .png"/>
                                                            <label for="{{ $field->field }}"
                                                                   style="background-image: url({{ $form_data->{$field->field} ? url('storage/' . $form_data->{$field->field}) : asset('image/avatar.jpg') }}); background-size: cover;">
                                                                <i class="fa fa-plus-circle"></i>
                                                            </label>
                                                        </div>
                                                    @else
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="{{ $field->field }}-addon"><i class="{{ $field->icon }}"></i></span>
                                                            </div>
                                                            <input id="{{ $field->field }}" name="{{ $field->field }}"
                                                                   type="{{ $field->type }}" value="{{ old($field->field) ? old($field->field) : $form_data->{$field->field} }}"
                                                                   class="form-control" placeholder="{{ App::getLocale() == 'en' ? $field->name : $field->name_bn}}">
                                                        </div>
                                                    @endif
                                                    @error($field->field)
                                                    <small class="form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </section>
                            </div>
                        @endforeach
                    </div>
                    <div class="wizard-footer">
                        <div class="row">
                            <div class="col">
                                <input type='button' style="color: #FFFFFF;  margin-right: 10px;" class='btn btn-previous btn-primary btn-wd pull-left' name='previous' value='{{ App::getLocale() == 'en' ? 'Go to previous page' : 'পূর্ববর্তী পেইজে যান'  }}' />
                                <input type='button' style="color: #FFFFFF;" class='btn btn-next btn-fill btn-primary btn-wd pull-left' name='next' value='{{ App::getLocale() == 'en' ? 'Go to next page' : 'পরবর্তী পেইজে যান'  }}' />
                            </div>
                            <div class="col">
                                <input type='submit' style="color: #FFFFFF; float: right;" class='btn btn-finish btn-fill btn-success btn-wd pull-right' name='finish' value='{{ App::getLocale() == 'en' ? 'Submit' : 'সাবমিট করুন'  }}' />
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css"/>
    <style>
        .wrap-custom-file {
            position: relative;
            display: inline-block;
            width: 150px;
            height: 150px;
            margin: 0 0.5rem 1rem;
            text-align: center;
        }

        .wrap-custom-file input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 2px;
            height: 2px;
            overflow: hidden;
            opacity: 0;
        }

        .wrap-custom-file label {
            z-index: 1;
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            overflow: hidden;
            padding: 0 0.5rem;
            cursor: pointer;
            background-color: #fff;
            border-radius: 4px;
            transition: -webkit-transform 0.4s;
            transition: transform 0.4s;
            transition: transform 0.4s, -webkit-transform 0.4s;
        }

        .wrap-custom-file label span {
            display: block;
            margin-top: 2rem;
            font-size: 1.4rem;
            color: #777;
            transition: color 0.4s;
        }

        .wrap-custom-file label .fa {
            position: absolute;
            bottom: 1rem;
            left: 50%;
            -webkit-transform: translatex(-50%);
            transform: translatex(-50%);
            font-size: 1.5rem;
            color: lightcoral;
            transition: color 0.4s;
        }

        .wrap-custom-file label:hover span,
        .wrap-custom-file label:hover .fa {
            color: #333;
        }

        .wrap-custom-file label.file-ok {
            background-size: cover;
            background-position: center;
        }

        .wrap-custom-file label.file-ok span {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 0.3rem;
            font-size: 1.1rem;
            color: #000;
            background-color: rgba(255, 255, 255, 0.7);
        }

        .wrap-custom-file label.file-ok .fa {
            display: none;
        }
    </style>
@stop

@section('script')
    <script>
        searchVisible = 0;
        transparent = true;

        $(document).ready(function () {

            /*  Activate the tooltips      */
            $('[rel="tooltip"]').tooltip();

            // Code for the Validator
            var $validator = $('.wizard-card form').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    school_college: {
                        required: true,
                        minlength: 3
                    },
                    group: {
                        required: true
                    },
                    player_mobile: {
                        required: true,
                        minlength: 11,
                        maxlength: 11,
                        number: true,
                        remote: {
                            type: 'post',
                            url: '/api/validate/phone?valid_id={{ $registration->user_id }}'
                        }
                    },
                    image: {
                        required: true
                    },
                    playing_type: {
                        required: true
                    },
                    geo_division_id: {
                        required: true
                    },
                    geo_district_id: {
                        required: true
                    },
                    geo_upazila_id: {
                        required: true
                    },
                    district_code: {
                        required: true
                    },
                    phone: {
                        required: true,
                        remote: {
                            type: 'post',
                            url: '/api/validate/login?valid_id={{ $registration->user_id }}'
                        }
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 6,
                        equalTo: '#password'
                    },
                    @if(auth()->user()->type == 4)
                    code: {
                        required: true
                    }
                    @endif
                },
                messages: {
                    player_mobile: {
                        remote: 'Phone number is already taken.'
                    },
                    phone: {
                        remote: 'Email/Phone is already taken.'
                    }
                }
            });

            // Wizard Initialization
            $('.wizard-card').bootstrapWizard({
                'tabClass': 'nav nav-pills',
                'nextSelector': '.btn-next',
                'previousSelector': '.btn-previous',
                onNext: function (tab, navigation, index) {
                    var $valid = $('.wizard-card form').valid();
                    if (!$valid) {
                        $validator.focusInvalid();
                        return false;
                    }
                },
                onInit: function (tab, navigation, index) {
                    //check number of tabs and fill the entire row
                    var $total = navigation.find('li').length;
                    $width = 100 / $total;
                    navigation.find('li').css('width', $width + '%');
                },
                onTabClick: function (tab, navigation, index) {
                    var $valid = $('.wizard-card form').valid();
                    if (!$valid) {
                        return false;
                    } else {
                        return true;
                    }
                },
                onTabShow: function (tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;
                    var $wizard = navigation.closest('.wizard-card');
                    // If it's the last tab then hide the last button and show the finish instead
                    if ($current >= $total) {
                        $($wizard).find('.btn-next').hide();
                        $($wizard).find('.btn-finish').show();
                    } else {
                        $($wizard).find('.btn-next').show();
                        $($wizard).find('.btn-finish').hide();
                    }
                    // update progress
                    var move_distance = 100 / $total;
                    move_distance = move_distance * (index) + move_distance / 2;
                    $wizard.find($('.progress-bar')).css({width: move_distance + '%'});
                    // e.relatedTarget // previous tab
                    $wizard.find($('.wizard-card .nav-pills li.active a .icon-circle')).addClass('checked');
                }
            });

            // Code for the Validator
            var $validator1 = $('.wizard-card1 form').validate({
                rules: {
                    //
                },
                messages: {
                    //
                }
            });

            // Wizard Initialization
            $('.wizard-card1').bootstrapWizard({
                'tabClass': 'nav nav-pills',
                'nextSelector': '.btn-next',
                'previousSelector': '.btn-previous',
                onNext: function (tab, navigation, index) {
                    var $valid = $('.wizard-card1 form').valid();
                    if (!$valid) {
                        $validator1.focusInvalid();
                        return false;
                    }
                },
                onInit: function (tab, navigation, index) {
                    //check number of tabs and fill the entire row
                    var $total = navigation.find('li').length;
                    $width = 100 / $total;
                    navigation.find('li').css('width', $width + '%');
                },
                onTabClick: function (tab, navigation, index) {
                    var $valid = $('.wizard-card1 form').valid();
                    if (!$valid) {
                        return false;
                    } else {
                        return true;
                    }
                },
                onTabShow: function (tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;
                    var $wizard = navigation.closest('.wizard-card1');
                    // If it's the last tab then hide the last button and show the finish instead
                    if ($current >= $total) {
                        $($wizard).find('.btn-next').hide();
                        $($wizard).find('.btn-finish').show();
                    } else {
                        $($wizard).find('.btn-next').show();
                        $($wizard).find('.btn-finish').hide();
                    }
                    // update progress
                    var move_distance = 100 / $total;
                    move_distance = move_distance * (index) + move_distance / 2;
                    $wizard.find($('.progress-bar')).css({width: move_distance + '%'});
                    // e.relatedTarget // previous tab
                    $wizard.find($('.wizard-card1 .nav-pills li.active a .icon-circle')).addClass('checked');
                }
            });

            // Prepare the preview for profile picture
            $("#wizard-picture").change(function () {
                readURL(this);
            });

            $('[data-toggle="wizard-radio"]').click(function () {
                wizard = $(this).closest('.wizard-card');
                wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
                $(this).addClass('active');
                $(wizard).find('[type="radio"]').removeAttr('checked');
                $(this).find('[type="radio"]').attr('checked', 'true');
            });

            $('[data-toggle="wizard-checkbox"]').click(function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                    $(this).find('[type="checkbox"]').removeAttr('checked');
                } else {
                    $(this).addClass('active');
                    $(this).find('[type="checkbox"]').attr('checked', 'true');
                }
            });

            $('.set-full-height').css('height', 'auto');

        });


        // Function to show image before upload

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }


        function debounce(func, wait, immediate) {
            var timeout;
            return function () {
                var context = this, args = arguments;
                clearTimeout(timeout);
                timeout = setTimeout(function () {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                }, wait);
                if (immediate && !timeout) func.apply(context, args);
            };
        };

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>
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
    <script>
        getDistrictList("?division={{ \App\Models\GeoDivision::where('name_bng', $form_data->geo_division_id)->first()->id }}");
        getUpazilaList("?district={{ \App\Models\GeoDistrict::where('name_bng', $form_data->geo_district_id)->first()->id }}");
        getUnionList("?upazila={{ \App\Models\GeoUpazila::where('name_bng', $form_data->geo_upazila_id)->first()->id }}");
        $(function() {
            $('#geo_division_id').val("{{ \App\Models\GeoDivision::where('name_bng', $form_data->geo_division_id)->first()->id }}");
            $('#geo_district_id').val("{{ \App\Models\GeoDistrict::where('name_bng', $form_data->geo_district_id)->first()->id }}");
            $('#geo_upazila_id').val("{{ \App\Models\GeoUpazila::where('name_bng', $form_data->geo_upazila_id)->first()->id }}");
            @if(isset($form_data->geo_union_id))
                $('#geo_union_id').val("{{ \App\Models\GeoUnion::where('name_bng', $form_data->geo_union_id)->first()->id }}");
            @endif
            $("input[name=playing_action][value='{{$form_data->playing_action}}']").prop("checked",true);
            $("input[name=batting_style][value='{{$form_data->batting_style}}']").prop("checked",true);
            $("input[name=bowling_style][value='{{$form_data->bowling_style}}']").prop("checked",true);
            $("input[name=bowling_pattern][value='{{$form_data->bowling_pattern}}']").prop("checked",true);
            $("input[name=group][value='{{$form_data->group}}']").prop("checked",true);
        });
    </script>
@stop
