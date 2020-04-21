@extends('site.realestate.layout.master')
@section('content')
<div>
	<div class="col-md-12" style="margin-top: 2%;">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10 link">
				<a href="" style="text-decoration: none;color: red;">Home</a> > Daintree
			</div>
			<div class="col-md-1"></div>
		</div>	
	</div>

	<div class="col-md-12" style="margin-top: 1%;">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<h4>Daintree</h4>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>

	<div class="col-md-12 product">
		<div class="row">

			<div class="col-md-1"></div>

			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">
						
						<div class="row">
							@foreach($datas as $data)
							<div class="col-md-4">
								<div class="" style="width: 100%">
  									<img class="card-img-top" src="{{$data->image1}}" >
  									<div class="card-body">
    									<a href="{{route('double-storey-list.show',$datas->id)}}" style="text-decoration: none; color: red;">
    										<h6>{{$data->title}}</h6>
    									</a>
    									<div class="col-md-12" style="margin-left: -3%;">
    										<div class="row">
    											<div class="col-md-10">
    												<div class="row">
    													<div class="col-md-12">
    														<div class="row">

    															<div class="col-md-4">
    																<p>Beds: {{$data->bed}}</p>
    															</div>

    															<div class="col-md-4">
    																<p>Baths: {{$data->baths}}</p>
    															</div>

    															<div class="col-md-4">
    																<p>m²: {{$data->size}}</p>
    															</div>

    															<div >
    																<p>Duplex</p>
    															</div>

    														</div>
    													</div>
    												</div>
    											</div>
    											<div class="col-md-2">
    												<a href="{{route('double-storey-list.show.show',$data->id)}}" style="text-decoration:none;" class="btn btn-primary">Details</a>
    											</div>
    										</div>
    									</div>
  									</div>
								</div>	
								<hr>
							</div>

						@endforeach	
						</div>
						
					</div>
				</div>
			</div>

			<div class="col-md-1"></div>
		</div>
	</div>
</div>
@endsection