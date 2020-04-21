@extends('site.realestate.layout.master')
@section('content')

	<div class="link">


	
	<div class="col-md-12">
		
		<div class="col-md-1"></div>

		<div class="col-md-10">
			<div class="link" style="margin-top:3%;">

				<a href="" style="color: red;text-decoration: none;margin-left: 8%;" style="text-align: center;">Home</a> > Custom

			</div>
		</div>

		<div class="col-md-1"></div>

	</div>

	</div>

	<div class="main" style="margin-top: 7%">

	<div class="col-md-12 slider">
		
		<div class="row">
			
			<div class="col-md-1"></div>

			<div class="col-md-10 main-slider">
				
				<div class="row">
					

					<div class="slider">
						

						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  							<!-- <ol class="carousel-indicators">
    							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  							</ol> -->
  							<div class="carousel-inner">
    							<div class="carousel-item active">
      							<img class="d-block" style=" width: 100%; height: 600px;" src="/site/realestate/images/slider/5.jpg" alt="First slide">
    							</div>
    							<!-- <div class="carousel-item">
      							<img class="d-block w-100" src="/site/realestate/images/slider/4.jpg" alt="Second slide">
    							</div> -->
  							</div>

  							<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    							<span class="sr-only">Previous</span>
  							</a>
  							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    							<span class="carousel-control-next-icon" aria-hidden="true"></span>
    							<span class="sr-only">Next</span>
  							</a>
						</div>


					</div>

				</div>

			</div>

			<div class="col-md-1"></div>

		</div>

	</div>
	
	</div>

	<!-- Description -->

	<div class="col-md-12" style="margin-top: 20%">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h2 style="text-align: center;">Description</h2>

			<p style="text-align: center;font-size: 20px;margin-top: 5%">{{$datas->introduction}}</p>
		</div>
		<div class="col-md-1"></div>
	</div>
	</div>

	<!-- Brochure & Enquire -->
	<div class="col-md-12" style="margin-bottom: 5%; margin-top: 2%;">
	<div class="row">
		<div class="col-md-3" ></div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							
							<a href="{{$datas->file}}" class="btn btn-danger" target="_blank" style="width: 100%;padding: 20px;" download="{{$datas->file}}">Download Brochure</a>

						</div>
						<div class="col-md-6">
							<a href="{{route('contact.show')}}" class="btn btn-dark" target="_blank" style="width: 100%;padding: 20px;">Enquire Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3" ></div>
	</div>
	</div>


	<div class="col-md-12" style="margin-top: 5%;margin-bottom: 5%">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-5" style="border-top: 1px solid gray;">
											
										</div>
										<div class="col-md-2" style="text-align: center;margin-top: -2%;">
											<span>DETAIL</span>
										</div>
										<div class="col-md-5" style="border-top: 1px solid gray;">
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
	</div>

	<div class="col-md-12" style="margin-top: 5%;margin-bottom: 5%;">
	<div class="row">
		<div class="col-md-2" ></div>
		<div class="col-md-8" >
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3 property-1">
							<div class="col-md-12">
								<div class="row">

									<div class="col-md-6">
										<img src="/site/realestate/images/property/icon-2.png" >
									</div>

									<div class="col-md-6">{{$datas->bed}} Bedrooms</div>
								</div>
							</div>
						</div>

						<div class="col-md-3 property-2" >
						
							<div class="col-md-12">
								<div class="row">
									
									<div class="col-md-6">
										<img src="/site/realestate/images/property/icon-3.png" >
									</div>

									<div class="col-md-6">{{$datas->baths}} Bathrooms</div>
								</div>
							</div>

						</div>

						<div class="col-md-3 property-3" >
						
							<div class="col-md-12">
								<div class="row">
									
									<div class="col-md-6">
										<img src="/site/realestate/images/property/icon-4.png" >
									</div>

									<div class="col-md-6">Property Size {{$datas->size}} m²</div>
								</div>
							</div>

						</div>

						<div class="col-md-3 property-4" >
						
							<div class="col-md-12">
								<div class="row">
									
									<div class="col-md-6">
										<img src="/site/realestate/images/property/icon-6.png" >
									</div>

									<div class="col-md-6">{{$datas->garage}} Garage</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2" ></div>
	</div>
	</div>


	<div class="col-md-12">
	
	<div class="row">
		
		<div class="col-md-4"></div>

		<div class="col-md-4">
			
			<h2 style="text-align: center;">Floor plans</h2>

		</div>

		<div class="col-md-4"></div>

	</div>

	</div>


	<div class="col-md-12" style="margin-top: 4%;margin-bottom: 4%">
	
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<p style="text-align: center;font-size: 20px; color: red">{{$datas->title}}</p>
		</div>
		<div class="col-md-4"></div>
	</div>

	</div>

	<div class="col-md-12">
	
	<div class="row">
		
		<div class="col-md-1"></div>

		<div class="col-md-10">
			
			<div class="row">
				
				<div class="col-md-12">
					
					<div class="row">
						
						<div class="col-md-6">
							<img id="myImg" src="/site/realestate/images/catalogue/Daintree-18-MK2-Floorplan.jpg" style="width: 100%;">


							<!-- The Modal -->
							<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
							</div>


						</div>
						<div class="col-md-6" >
							
							<h2 style="font-weight: bold;text-align: center;">{{$datas->title}}</h2>

							<p style="font-size: 20px; text-align: center;">
								{{$datas->description}}
							</p>

							<!-- floor plans image -->

							<div class="row" style="margin-top: 7%;">
								<div class="col-md-12" >
									
									<div class="row">
										
										<div class="col-md-4 property-3" >
						
											<div class="col-md-12">
												<div class="row">
									
													<div class="col-md-6">
														<img src="/site/realestate/images/property/icon-2.png" >
													</div>

													<div class="col-md-6">Rooms: {{$datas->bed}}</div>
												</div>
											</div>

										</div>


										<div class="col-md-4 property-3" >
						
											<div class="col-md-12">
												<div class="row">
									
													<div class="col-md-6">
														<img src="/site/realestate/images/property/icon-3.png" >
													</div>

													<div class="col-md-6">Baths: {{$datas->baths}}</div>
												</div>
											</div>

										</div>

										<div class="col-md-4 property-3" >
						
											<div class="col-md-12">
												<div class="row">
									
													<div class="col-md-6">
														<img src="/site/realestate/images/property/icon-6.png" >
													</div>

													<div class="col-md-6">Garage: {{$datas->garage}}</div>
												</div>
											</div>

										</div>


									</div>

								</div>
							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		<div class="col-md-1"></div>

	</div>

	</div>



@endsection