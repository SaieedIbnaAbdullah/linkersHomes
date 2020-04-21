{{--
<a style="z-index: 99999999; margin-bottom: 3px;" href="{{ route('admin.registration.show', ['id' => $data->id]) }}" class="btn btn-primary icon-btn text-white">
    <i style="margin-top: -5px; margin-right: 0;" class="fa fa-eye fa-2x"></i>
</a>
@if(auth()->user()->type == 0 || auth()->user()->type == 2)
    <a style="z-index: 99999999; margin-bottom: 3px;" href="{{ route('admin.registration.edit', ['id' => $data->id]) }}" class="btn btn-primary icon-btn text-white">
        <i style="margin-top: -5px; margin-right: 0;" class="fa fa-pencil fa-2x"></i>
    </a>
    <a style="z-index: 99999999; margin-bottom: 3px;" href="{{ route('admin.registration.approve', ['id' => $data->id]) }}" class="btn btn-primary icon-btn text-white">
        <i style="margin-top: -5px; margin-right: 0;" class="fa fa-{{ $data->approved == 0 ? 'check-square' : 'close' }} fa-2x"></i>
    </a>
    <a style="z-index: 99999999; margin-bottom: 3px;" href="{{ route('admin.registration.sms', ['id' => $data->id]) }}" class="btn btn-primary icon-btn text-white">
        <i style="margin-top: -5px; margin-right: 0;" class="fa fa-envelope fa-2x"></i>
    </a>
@endif
--}}

<div class="dropdown show">
    <a id="dd{{ $data->id }}" style="z-index: 99999999; margin-bottom: 3px;" href="#" class="btn btn-primary icon-btn text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i style="margin-top: -5px; margin-right: 0;" class="fa fa-gear fa-2x"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="dd{{ $data->id }}">
        <a class="dropdown-item" href="{{ route('admin.registration.show', ['id' => $data->id, 'filter' => request()->get('filter')]) }}">View</a>
        <a class="dropdown-item" href="{{ route('admin.registration.show', ['id' => $data->id, 'filter' => request()->get('filter'), 'full' => true]) }}">View(Full)</a>
        @if(auth()->user()->type == 0 || auth()->user()->type == 2)
            <a class="dropdown-item" href="{{ route('admin.registration.edit', ['id' => $data->id, 'filter' => request()->get('filter')]) }}">Edit</a>
            <a class="dropdown-item" href="{{ route('admin.registration.edit', ['id' => $data->id, 'filter' => request()->get('filter'), 'full' => true]) }}">Edit(Full)</a>
            <a class="dropdown-item" href="{{ route('admin.registration.approve', ['id' => $data->id, 'filter' => request()->get('filter')]) }}">{{ $data->approved == 0 ? 'Approve' : 'Unapprove' }}</a>
            <a class="dropdown-item" href="{{ route('admin.registration.sms', ['id' => $data->id, 'filter' => request()->get('filter')]) }}">Sms</a>
            <a class="dropdown-item" href="{{ route('admin.registration.delete', ['id' => $data->id, 'filter' => request()->get('filter')]) }}">Delete</a>
        @endif

        @if(auth()->user()->type == 0 || auth()->user()->type == 5)
            @if(Request::get('filter')==1 && $data->round==0)
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'1', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Waiting
            </a>
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'2', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Select
            </a>
            @elseif(Request::get('round')==1)
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'0', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Waiting
            </a>
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'2', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Select
            </a>
            @elseif(Request::get('round')==2)
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'1', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Waiting
            </a>
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'3', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Select
            </a>
            @elseif(Request::get('round')==3)
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'2', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Waiting
            </a>
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'4', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Select
            </a>
            @elseif(Request::get('round')==4)
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'3', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Waiting
            </a>
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'5', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Select
            </a>
            @elseif(Request::get('round')==5)
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'4', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Waiting
            </a>
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'6', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Select
            </a>
            @elseif(Request::get('round')==6)
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'5', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Waiting
            </a>
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'7', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Select
            </a>
            @elseif(Request::get('round')==7)
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'6', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Waiting
            </a>
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'8', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Select
            </a>
            @elseif(Request::get('round')==8)
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'7', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Waiting
            </a>
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'9', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Select
            </a>
            @elseif(Request::get('round')==9)
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'8', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Waiting
            </a>
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'10', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Select
            </a>
            @elseif(Request::get('round')==10)
            <a  href="{{ route('admin.registration.round', ['id' => $data->id,'status'=>'9', 'filter' => request()->get('filter')]) }}" class="dropdown-item">
                Waiting
            </a>
            @endif
        @endif

    </div>
</div>
