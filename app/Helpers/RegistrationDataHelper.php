<?php

namespace App\Helpers;


use App\Models\BlogPost;
use App\Models\Registration;

trait RegistrationDataHelper
{
    public function shareRegistrationData()
    {
        $card_array = [];
        $registration = (new Registration())->newQuery();
        if (auth()->user()->type == 3 || auth()->user()->type == 4) {
            $registration->where('created_by', auth()->user()->id);
        }
        if (request()->has('geo_division_id') && request()->get('geo_division_id') != '') {
            $registration->where('geo_division_id', request()->get('geo_division_id'));
        }
        if (request()->has('geo_district_id') && request()->get('geo_district_id') != '') {
            $registration->where('geo_district_id', request()->get('geo_district_id'));
        }
        if (request()->has('geo_upazila_id') && request()->get('geo_upazila_id') != '') {
            $registration->where('geo_upazila_id', request()->get('geo_upazila_id'));
        }
        if (request()->has('geo_union_id') && request()->get('geo_union_id') != '') {
            $registration->where('geo_union_id', request()->get('geo_union_id'));
        }
        if (request()->has('field_admin_id') && request()->get('field_admin_id') != '') {
            $registration->where('field_admin', request()->get('field_admin_id'));
        }
        if (request()->has('reg_type') && request()->get('reg_type') != '') {
            $registration->where('type', request()->get('reg_type'));
        }
        if (request()->has('created_by') && request()->get('created_by') != '') {
            $registration->where('created_by', request()->get('created_by'));
        }
        $ids = $registration->get()->pluck('id');
        $approved = Registration::whereIn('id', $ids)->where('approved', 1)->count();
        array_push($card_array, [
            'title' => 'Approved Registration',
            'count' => $approved,
            'icon' => 'user-plus',
            'type' => 'primary',
            'role' => [0, 2, 3, 4]
        ]);
        $pending = Registration::whereIn('id', $ids)->where('approved', 0)->count();
        array_push($card_array, [
            'title' => 'Pending Registration',
            'count' => $pending,
            'icon' => 'user-times',
            'type' => 'primary',
            'role' => [0, 2, 3, 4]
        ]);
        $earning = Registration::whereIn('id', $ids)->where('approved', 1)->sum('amount');
        array_push($card_array, [
            'title' => 'Total Earning',
            'count' => $earning,
            'icon' => 'money',
            'type' => 'primary',
            'role' => [0, 2]
        ]);
        /*$pending_earning = Registration::whereIn('id', $ids)->where('approved', 0)->sum('amount');
        array_push($card_array, [
            'title' => 'Pending Earning',
            'count' => $pending_earning,
            'icon' => 'money',
            'type' => 'primary',
            'role' => [0, 2]
        ]);*/
        view()->share('card_array', json_decode(json_encode($card_array)));
    }

    public function shareBlogData()
    {
        $blog_array = [];
        $blog = (new BlogPost)->newQuery();
        if (auth()->user()->type == 1) {
            $blog->where('created_by', auth()->user()->id);
        }
        $total_post = $blog->count();
        array_push($blog_array, [
            'title' => 'Total Post',
            'count' => $total_post,
            'icon' => 'users',
            'type' => 'primary',
            'role' => [0, 1, 2, 3, 4]
        ]);
        $approved_post = $blog->where('approved', 1)->count();
        array_push($blog_array, [
            'title' => 'Approved Post',
            'count' => $approved_post,
            'icon' => 'users',
            'type' => 'primary',
            'role' => [0, 1, 2, 3, 4]
        ]);
        $pending_post = $blog->where('approved', 0)->count();
        array_push($blog_array, [
            'title' => 'Pending Post',
            'count' => $pending_post,
            'icon' => 'users',
            'type' => 'primary',
            'role' => [0, 1, 2, 3, 4]
        ]);
        view()->share('blog_array', json_decode(json_encode($blog_array)));
    }
}
