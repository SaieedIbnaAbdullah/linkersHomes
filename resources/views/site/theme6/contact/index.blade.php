@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    <div class="container" style="margin-top: 60px !important;">
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-5">
                <div class="contact_content">
                    <h2 style="margin-bottom: 30px !important;">Contact Us</h2>
                    <p>
                        {{ $setting_contact->address }}<br>
                        <b>Mobile :</b> {{ $setting_contact->primary_phone }}, {{ $setting_contact->secondary_phone }}<br>
                        <b>Tel :</b> {{ $setting_contact->primary_tel }}, {{ $setting_contact->secondary_tel }}<br>
                        <b>Fax :</b> {{ $setting_contact->primary_fax }}, {{ $setting_contact->secondary_fax }}<br>
                        <b>E-mail :</b> {{ $setting_contact->primary_email }}, {{ $setting_contact->secondary_email }}<br>
                    </p>
                </div>
            </div>
            <div class="col-md-7">
                <h2 style="margin-bottom: 30px !important;">Location in Google map</h2>
                <iframe src="{{ $setting_contact->map_url }}" frameborder="0" style="border:0; width: 100% !important; height: 450px !important;" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@stop

@section('script')
@stop
