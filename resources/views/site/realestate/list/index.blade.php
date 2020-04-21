@extends('site.realestate.layout.master')
@section('content')

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/site/realestate/images/slider/5.jpg" alt="First slide" style="height: 600px;">
    </div>
    <div class="carousel-item">
        <a href="">
            <img class="d-block w-100" src="/images/slider/4.jpg" alt="Second slide" style="height: 600px;">
        </a>    
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h2 class="" style="color: black;font-weight: boold;text-align: center;">`</h2>
                    <p style="text-align: center;">
                        At  Linkers Homes, our core values Trust, Respect, Integrity and Pride are evident in everything we do. Your home is our home. We pride ourselves on building beautifully designed high-quality homes that meet our own personal exacting standards.
                    </p>
                    <p style="text-align: center;">
                        We specialise as a Custom Home builder, Duplex Builder, Knockdown Rebuild and House and Land specialist. Our designs stand out from the crowd and are as unique on the inside as they are on the outside. We look forward to building your new dream home that is “as individual as you!
                    </p>
                </div>  
            <div class="col-md-1"></div>
        </div>      
    </div>
</div>



<div style="margin-top: 5%; margin-bottom: 5%;">
    <div class="col-md-12">
        <div class="row">
            
            <!-- <div class="col-md-1"></div> -->
            <div class="col-md-4">
                <a href="">
                    <img src="/images/bannar/8.jpg" style="width: 100%;height: 100%;">
                </a>    
                <div class="centere" style="color: white;">
                    <h4>Custom</h4>
                </div>
            </div>
            <!-- <div class="col-md-1"></div> -->
            <div class="col-md-4">
                <img src="images/bannar/5.jpg" style="width: 100%;height: 100%;">
                <div class="centere" style="color: white;">
                    <h4>Duplex</h4>
                </div>
            </div>
            <!-- <div class="col-md-1"></div> -->
            <div class="col-md-4">
                <img src="images/bannar/7.jpg" style="width: 100%;height: 100%;">
                <div class="centere" style="color: white;">
                    <h4>House & Land</h4>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="what-build" >
    <h5 style="text-decoration: none;text-align:center;color: black;margin-bottom: 30px;">What We Build?</h5>
    <div class="col-md-12" style="background-color: red;padding-top: 20px;padding-bottom: 30px;">
        <div class="row" style="margin-bottom: 40px;padding-right: 8%; padding-left: 8%; margin-top: 30px;">
            
            <div class="col-md-3">
                <a href="" style="text-decoration:none;color: white;text-align-last:center;" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='white'">
                    <h5>Duplex</h5>
                </a>        
            </div>
            <div class="col-md-3"  style="background-color: red;padding: 2px;">
                <a href="" style="text-decoration:none;color: white;text-align-last:center;" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='white'">
                    <h5>Custom Designs</h5>
                </a>        
            </div>
            <div class="col-md-3" >
                <a href="" style="text-decoration:none;color:white;text-align-last:center;" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='white'">
                    <h5>Granny Flat</h5>
                </a>    
            </div>

            <div class="col-md-3" >
                <a href="" style="text-decoration:none;color: white;text-align-last:center;" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='white'">
                    <h5>House + Granny Flat</h5>
                </a>    
            </div>
            
        </div>

        <div class="row" style="margin-bottom: 40px;padding-right: 8%; padding-left: 8%; margin-top: 30px;">
            
            <div class="col-md-3">
                <a href="" style="text-decoration:none;color: white;text-align-last:center;" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='white'">
                    <h5>Knock Down Rebuild</h5>
                </a>        
            </div>
            <div class="col-md-3"  style="background-color: red;padding: 2px;">
                <a href="" style="text-decoration:none;color: white;text-align-last:center;" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='white'">
                    <h5>Multi Dwelling</h5>
                </a>        
            </div>
            <div class="col-md-3" >
                <a href="" style="text-decoration:none;color: white;text-align-last:center;" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='white'">
                    <h5>Single Storey</h5>
                </a>    
            </div>

            <div class="col-md-3" >
                <a href="" style="text-decoration:none;color: white;text-align-last:center;" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='white'">
                    <h5>Double Storey</h5>
                </a>    
            </div>
            
        </div>
        
        
    </div>
</div>



<div class="house-land" style="text-align:center;margin-top: 90px;">
    <a href="http://www.linkersdevelopments.com.au" style="text-decoration:none;color: black;text-decoration: underline" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='black'">
        <h5>House And Land</h5></a>
</div>

<div class="aboutUs" style="">
    <h5 style="text-align: center;margin-bottom: 5%;text-decoration: none;">About Us</h5>

    <div class="col-md-12 col-sm-12">
        <div class="row aboutUs-main" style="margin-bottom: 80px;padding-right: 8%; padding-left: 8%">
            
                    <div class="col-md-3 p-0 director">
                        <img src="/images/About-us/14991252759-rsc.jpg" style="height: 285px;width: 285px;" class="image">
                        <div class="overlay">
                            <div class="text">
                                <h5>Hossain Mahmud</h5>
                                <p>Principal</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 p-0 director">
                        <img src="/images/About-us/14991251661-rsc.jpg" style="height: 285px;width: 285px;" class="image">
                        <div class="overlay">
                            <div class="text">
                                <h5>Momotaj Mahmud</h5>
                                <p>Director</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 p-0 director">
                        <img src="/images/About-us/14991254575-rsc.jpg" style="height: 285px;width: 285px;" class="image">
                        <div class="overlay">
                            <div class="text">
                                <h5>Mishkat Mahmud</h5>
                                <p>Director of Sales & Property Development</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 p-0 director">
                        <img src="/images/About-us/14991253721-rsc.jpg" style="height: 285px;width: 285px;" class="image">
                        <div class="overlay">
                            <div class="text">
                                <h5>Rubayet Mahmud</h5>
                                <p>Director of Sales & Operations</p>
                            </div>
                        </div>

                    </div>
                
            </div>
            
        </div>  
    </div>
</div>



<div class="">
    <div class="col-lg-12" style="background-color:  #ff0000;">
        <div class="zacHomes">
            <h3 class="fontColor">The  Linkers Homes Difference</h3>
            <h5 class="fontColor">Below are a few points we call the  Linkers Homes Difference. Find out what sets us apart from the rest and how we can help build your dreams.</h5>
        <div>
        <div class="col-lg-12" >
            <div class="row content"  style="margin-top: 80px;">
                <div class="col-md-4">
                    <div >
                        <img src="images/icon1.png" class="front-logo">
                    </div>
                    <h5 class="icon mt-2 mb-1">Family Owned</h5>
                    <p class="paragraph">Owned and operated by Hossain Mahmud, our team shares the values of a family business and use local trades/suppliers. We treat your journey as if it were our own and know what it takes to make your house a home.</p>
                </div>
                
                <div class="col-md-4">
                    <div >
                        <img src="/images/icon2.png" class="front-logo">
                    </div>
                    <h5 class="icon mt-2 mb-1"> Linkers Homes Online Client Portal</h5>
                    <p class="paragraph">Keep up to date on your build progress. Access online 24/7 to view all documentation, progress photos or ask any questions.</p>
                </div>

                <div class="col-md-4">
                    <div >
                        <img src="images/icon3.png" class="front-logo">
                    </div>
                    <h5 class="icon mt-2 mb-1"> Linkers Homes Online Client Portal</h5>
                    <p class="paragraph">Keep up to date on your build progress. Access online 24/7 to view all documentation, progress photos or ask any questions.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row buttion" >
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <a href="" style="margin-left: 25%; " class="btn btn-secondary text-center">Read More Points of Difference</a>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>


<div class="linkers-news">
    <div class="col-md-12">
        <div class="text">
            <h3 style="color: black;">Latest  Linkers Homes NEWS</h3>
        </div>
    </div>
</div>

<div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <div class="w-100 p-3">
                    <img class="card-img-top size" src="images/Website-thumbnail-350x250.jpg" alt="Card image cap">
                    <!-- <time datetime="September 20, 2018"><i class="fa fa-calendar" aria-hidden="true"></i>
                    September 20, 2018</time> -->
                    <div class="card-body">
                        <h5 class="card-title">The Annual  Linkers Homes Family Fun Day</h5>
                            <p class="card-text">The  Linkers Homes team and their families celebrated the 2nd Annual Family Fun Day at Belgenny Farm on...</p>
                            <a href="#" class="btn btn-danger">Continue Reading</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="w-100 p-3">
                    <img class="card-img-top size" src="/images/Website-thumbnail-350x250.jpg" alt="Card image cap">
                    <!-- <time datetime="September 20, 2018"><i class="fa fa-calendar" aria-hidden="true"></i>
                    September 20, 2018</time> -->
                    <div class="card-body">
                        <h5 class="card-title">The Annual  Linkers Homes Family Fun Day</h5>
                            <p class="card-text">The  Linkers Homes team and their families celebrated the 2nd Annual Family Fun Day at Belgenny Farm on...</p>
                            <a href="#" class="btn btn-danger">Continue Reading</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="w-100 p-3">
                    <img class="card-img-top size" src="/images/849modern_design_house_with_sepratestaircase_front_elevation_L.jpg" alt="Card image cap">
                    <!-- <time datetime="September 20, 2018"><i class="fa fa-calendar" aria-hidden="true"></i>
                    September 20, 2018</time> -->
                    <div class="card-body">
                        <h5 class="card-title">Job Opening – Construction Team Members</h5>
                            <p class="card-text">Our Construction team are looking for their newest members... Site Supervisors and Administrators...</p>
                            <a href="#" class="btn btn-danger">Continue Reading</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="w-100 p-3" >
                    <img class="card-img-top size" src="/images/35_lakhs_construction_cost_4_cents_duplex_building_in_bhimavaram-2_4094445.jpg" alt="Card image cap">
                    <!-- <time datetime="September 20, 2018"><i class="fa fa-calendar" aria-hidden="true"></i>
                    September 20, 2018</time> -->
                    <div class="card-body">
                        <h5 class="card-title">Building Custom Dream Homes</h5>
                            <p class="card-text">Building your custom designed home is all about turning your dreams into reality – a skill that...</p>
                            <br>
                            <a href="#" class="btn btn-danger">Continue Reading</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- slider without photo -->

<div class="margin">
    <div class="col-md-12">
        <div class="col-md-12">
            <h3 class="font">CLIENT TESTIMONIALS</h3>
            <p class="font">Take a look at what our Clients say</p>
        </div>
        <div class="row">


            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <br/>
                      <p class="font">"... Linkers Homes provided a lot of inclusions that we heard and saw other builders charge for. We moved in with blinds, landscaping, screen doors and ample storage space in the built in wardrobes. We couldn't be happier with our first home and know we made the right choice."<br>
                        by
                        <br>
                        Daniel North<br>
                        Client
                      </p>
                    </div>
                    <div class="carousel-item">

                      <p class="font">"...Firstly I would like to thank the  Linkers Homes team for the experience that my wife and I have had when making the purchase of an investment property. The professionalism and dedication that was displayed, was by far the best that we have seen or experienced previously."<br>by<br>Bob F.<br>Client                                                                                                , Investment Property
                        
                      </p>
                    </div>
                    <div class="carousel-item">

                      <p class="font">"What I was most impressed about was the fact I was not told that it would be too hard to change something. I was simply told what it would cost me and then it was up to me how much I wanted the change....Communication with  Linkers Homes  throughout the build process was fantastic. You cannot forsee all the problems that will arise when you build a new home but it is great when you have someone that can help you solve them, thanks  Linkers Homes."<br>by<br>Drew<br>Client                                                                                                , Knockdown Rebuild
                      </p>
                    </div>
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
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

@endsection
