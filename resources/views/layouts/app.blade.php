<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="token" content="{{ csrf_token() }}"/>

    <!-- Title -->
    <title>@yield('site_title')</title>

    <!-- Common Styles -->
    <link href="{{ asset('admin/plugins/font-awesome/5/css/all.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/plugins/font-awesome/4/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/css/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('site/theme6/fonts/icomoon/style.css') }}">

    @yield('style')

    <!-- Common Scripts -->
    <script src="{{ asset('admin/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/plugins/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ asset('wizard/css/wizard.css') }}">
    <link rel="stylesheet" href="{{ asset('wizard/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('wizard/css/demo.css') }}">

    <style>
        .site-blocks-cover.overlay::before {
            position: absolute;
            content: "";
            left: 0;
            bottom: 0;
            right: 0;
            top: 0;
            background: rgba(0, 0, 0, 0.08);
        }
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
    </style>

</head>
<body class="app sidebar-mini rtl">

@include('partials._header')

@include('partials._sidebar')

<main class="app-content">

    @yield('page_title')

    <div class="row">
        <div class="col-md-12" id="app">
            @yield('page_content')
        </div>
    </div>

</main>


<!-- Common Scripts -->
<script src="{{ asset('admin/js/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/plugins/pace.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/plugins/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('wizard/js/jquery.bootstrap.wizard.js') }}"></script>
<script src="{{ asset('wizard/js/jquery.validate.min.js') }}"></script>

@yield('script')

<!-- Vue scripts -->
@yield('vue_script')

</body>
</html>
