@extends('site.realestate.layout.master')
@section('content')


<div class="custom-background-image">
	<h1 class="text-position bannar-text ">Custom Homes</h1>
	<h5 class="text2-position bannar-text ">Linkers Home are custom build specialists</h5>
</div>

<div class="link" style="margin-top:3%;">

		<a href="" style="color: red;text-decoration: none;margin-left: 5%;">Home</a> > Custom

	</div>


<div class="custom-body" style="margin-top: 7%;">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-5 col-sm-12 col-xs-5">

				<iframe width="420" height="295" src="https://www.youtube.com/embed/-gcdNL_xOb4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="col-md-7 col-sm-12 col-xs-7">
				<h3>Custom Design Your Home from $2,500</h3>
				<p>As Sydney’s leading custom design home builders, Linkers Homes have the experience, skills and passion for building new custom design homes in Sydney to suit everyone’s individual requirements and specifications.</p>
				<ul>
					<li >
						Get a full detailed tender.
					</li>
					<li>
						Custom Design includes floor plan, facade, contour survey and soil classification (bore hole soil sample)
					</li>
					<li>
						We build all over Sydney on your land.
					</li>
					<li>
						Sloping or narrow block is not a problem for us.
					</li>
					<li>
						You can knock down and rebuild a custom home.
					</li>
					<li>
						If you have an investment property we can custom design and build duplexes or multiple dwellings to suit your land.
					</li>
				</ul>
				<p>Custom designing your home begins with a few drawings, some basic ideas or a home from our designer range that’s created and personalised for you.</p>
			</div>
		</div>
	</div>
</div>
<br>
<div>
	<div class="col-md-12">
		<div class="photoLabel">
			<h4 class="">Take a look at some of our custom builds</h4>
		</div>
		<hr>
		<br>
		<div class="col-md-12" >
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-5">
								<img class="w-100 p-3"  src="/site/realestate/images/custom/custom.jpg" style="height: 300px;width: 100%;">
						</div>
						
						<div class="col-md-5">
							<img src="site/realestate/images/custom/custom.jpg" style="height: 300px;width: 100%;">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-2">
							<button class="btn btn-danger custom-button">Load More</button>
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
<br>
<br>

<div style="margin-right: ; margin-left: ">
	<div class="col-md-12" style="background-color: black; padding: 55px;">
		<h4 style="color: white; text-align: center;">CUSTOM HOMES ENQUIRY</h4>
		<p style="color: white;text-align: center;">If you’re interested in either custom designing with us or would like us to quote your custom designed plans, please fill in the below details. We will get back to you within 24 hours.</p>
	</div>
</div>


<br>
<br>

<div>
	<div class="col-md-12">
		<div class="row">	
			<div class="col-md-6">
				<label>Fields marked with an * are required<br>Name*</label>
				<input type="text" name="" class="form-control">
			</div>
			<div class="col-md-6">
				<label><br>Build Address*</label>
				<input type="text" name="" class="form-control">
			</div>
		</div>	
		<div class="row">
			<div class="col-md-6">
				<label><br>Email*</label>
				<input type="email" name="" class="form-control">
			</div>
			<div class="col-md-6">
				<label><br>Phone*</label>
				<input type="text" name="" class="form-control">
			</div>
		</div>
		<hr>
		<div>
			<label>How soon would you like to build? *</label>
			<div class="col-md-12" >
				 <select class="form-control">
  					<option value="volvo">12 Months</option>
  					<option value="saab">6 Months</option>
  					<option value="mercedes">ASAP</option>
				</select> 
			</div>
		</div>

		<br>

		<div>
			<div class="row">
				<div class="col-md-6">
					<label>Do you have plans you would like quoted? </label>
					<div class="radio">
						<div class="form-check">
  						<input type="radio" class="form-check-input" id="" name="">
 						 <label class="form-check-label">Yes</label>
					</div>
					<div class="form-check">
  						<input type="radio" class="form-check-input" id="" name="">
 						 <label class="form-check-label">No</label>
					</div>
					
					</div>
				</div>
				<div class="col-md-6">
					<label>If so, are they DA approved?*</label>
					
					<div class="form-check">
  						<input type="radio" class="form-check-input" id="" name="">
 						 <label class="form-check-label">Yes</label>
					</div>
					<div class="form-check">
  						<input type="radio" class="form-check-input" id="" name="">
 						 <label class="form-check-label">No</label>
					</div>
					<div class="form-check">
  						<input type="radio" class="form-check-input" id="" name="">
 						 <label class="form-check-label">N/A</label>
					</div>
					
				</div>
			</div>
			<hr>
		</div>

		<!-- textbox -->

		<div>
			<div class="textbox">
				<label>Your Message*</label>
				<div class="input-group">
  					<textarea class="form-control" rows="5" aria-label="With textarea"></textarea>
				</div>
				<br>
				<button class="btn btn-danger">Submit</button>
			</div>
		</div>
		<br>
	</div>
</div>


@endsection