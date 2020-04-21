<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img alt="User Image" class="app-sidebar__user-avatar" style="width: 45px; height: 45px;" src="{{ auth()->user()->image ? url('storage/' . auth()->user()->image) :  asset('image/avatar.jpg') }}">
        <div>
            <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ auth()->user()->type == 0 ? 'Admin' : 'User' }}</p>
        </div>
    </div>
    <ul class="app-menu">
        @foreach($admin_nav as $nav)
            @if(!empty($nav))
                @if($nav->visible)
                    @if(in_array(auth()->user()->type, $nav->role))
                        @if(empty($nav->dropdown))
                            <li id="list_{{ $nav->id }}">
                                <a id="{{ $nav->id }}" class="app-menu__item" href="{{ $nav->url }}">
                                    <i class="app-menu__icon {{ $nav->icon }}"></i>
                                    <span class="app-menu__label">{{ $nav->title }}</span>
                                </a>
                            </li>
                        @else
                            <li id="list_{{ $nav->id }}" class="treeview">
                                <a class="app-menu__item" href="javascript:void(0)" data-toggle="treeview">
                                    <i class="app-menu__icon {{ $nav->icon }}"></i>
                                    <span class="app-menu__label">{{ $nav->title }}</span>
                                    <i class="treeview-indicator fa fa-angle-right"></i>
                                </a>
                                <ul id="{{ $nav->id }}" class="treeview-menu">
                                    @foreach($nav->dropdown as $d_nav)
                                        @php
                                        $userC = auth()->user();
                                        $status = 0;
                                        @endphp
                                        @if(auth()->user()->type==5)
                                            @if($d_nav->id=='approved' && ($userC->geo_upazila_id!=null || $userC->geo_upazila_id!=''))
                                                @php
                                                $status = 1;
                                                @endphp
                                            @endif
                                            @if(($d_nav->id=='round1' || $d_nav->id=='round2') && ($userC->geo_upazila_id!=null || $userC->geo_upazila_id!=''))
                                                @php
                                                $status = 1;
                                                @endphp
                                            @endif
                                            @if(($d_nav->id=='round3' || $d_nav->id=='round4') && ($userC->geo_district_id!=null || $userC->geo_district_id!='') && ($userC->geo_upazila_id==null || $userC->geo_upazila_id==''))
                                                @php
                                                $status = 1;
                                                @endphp
                                            @endif
                                            @if(($d_nav->id=='round5' || $d_nav->id=='round6') && ($userC->geo_division_id!=null || $userC->geo_division_id!='') && ($userC->geo_district_id==null || $userC->geo_district_id=='') && ($userC->geo_upazila_id==null || $userC->geo_upazila_id==''))
                                                @php
                                                $status = 1;
                                                @endphp
                                            @endif
                                            @if(($d_nav->id=='round7' || $d_nav->id=='round8') && ($userC->geo_division_id==null || $userC->geo_division_id=='') && ($userC->geo_district_id==null || $userC->geo_district_id=='') && ($userC->geo_upazila_id==null || $userC->geo_upazila_id==''))
                                                @php
                                                $status = 1;
                                                @endphp
                                            @endif
                                            @if(($d_nav->id=='round9' || $d_nav->id=='round10') && ($userC->geo_division_id==null || $userC->geo_division_id=='') && ($userC->geo_district_id==null || $userC->geo_district_id=='') && ($userC->geo_upazila_id==null || $userC->geo_upazila_id==''))
                                                @php
                                                $status = 1;
                                                @endphp
                                            @endif
                                            
                                            @if($status==1)
                                             <li>
                                                <a id="{{ $d_nav->id }}" class="treeview-item" href="{{ $d_nav->url }}">
                                                    <i class="icon fa fa-long-arrow-right"></i>
                                                    {{ $d_nav->title }}
                                                </a>
                                            </li>
                                            @endif
                                            
                                          
                                        @else
                                        @if(in_array(auth()->user()->type, $d_nav->role))
                                            <li>
                                                <a id="{{ $d_nav->id }}" class="treeview-item" href="{{ $d_nav->url }}">
                                                    <i class="icon fa fa-long-arrow-right"></i>
                                                    {{ $d_nav->title }}
                                                </a>
                                            </li>
                                        @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endif
                @endif
            @endif
        @endforeach
    </ul>
</aside>
