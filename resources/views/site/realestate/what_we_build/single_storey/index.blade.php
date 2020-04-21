@extends('site.realestate.layout.master')
@section('content')

<div>

		<div class="dublex-bannar">

			<h1 class="text-position bannar-text ">Our Single Storey Range</h1>

			<h5 class="text2-position bannar-text ">Click below for more information on our Single Storey</h5>

		</div>

		<div class="link" style="margin-top:3%;">

		<a href="" style="color: red;text-decoration: none;margin-left: 12%;">Home</a> > Duplex

	</div>

		<div class="col-md-12">

			<div class="row">

				
				
				<div class="col-md-12 duplex-photo-section">

					<div class="row single-storey-photo-section-main" style="margin-top: 3%;">

						

						<div class="col-md-1"></div>
						<div class=col-md-10>	
						<div class="row">	
						@foreach($datas as $data)
						<div class="col-md-6 w-100 p-3">
							
							<a href="{{route('single-storey-list.show',$data->id)}}">

								<img style="" class="w-100 p-3" src="{{$data->image}}" >

							</a>	
							
						</div>

						@endforeach
						</div>	
						</div>
						

						<div class="col-md-1"></div>


					</div>

				</div>
			

				

			</div>

		</div>

</div>

@endsection