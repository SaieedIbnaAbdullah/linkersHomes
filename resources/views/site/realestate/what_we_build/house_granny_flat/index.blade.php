@extends('site.realestate.layout.master')
@section('content')


<div class="triplex-advanced">

  

  <div class="triplex-advanced">

  <div class="col-md-12">

    <div class="row">

        <div class="input-group advanced-part">

          <input type="text" class="form-control search" placeholder="Enter Keyword..." style="">

            <button class="advanced-buttion btn btn-primary" type="button" style="height: 39px;margin-top: 0px;">

              <i class="fa fa-gear"> Advanced</i>

            </button>

            <button class="btn btn-primary" type="button" style="height: 39px;margin-top: 0px;">go</button>

        </div>

    </div>

  </div> 





  <div class="col-md-12">

    <div class="form-inline advanced-iput">

      <div class="col-md-3">

        <div class="form-group">

              <select class="form-control" id="exampleFormControlSelect1" style="width: 100%">

                  <option>All Types</option>

                  <option>Custom</option>

                  <option>Double Storey</option>

                  <option>Duplex</option>

                  <option>House & Land</option>

              </select>

            </div>

      </div>

      <div class="col-md-3">

        <div class="form-group">

              <select class="form-control" id="exampleFormControlSelect1" style="width: 100%">

                  <option>Beds</option>

                  <option>1</option>

                  <option>2</option>

                  <option>3</option>

                  <option>4</option>

              </select>

            </div>

      </div>

      <div class="col-md-3">

        <div class="form-group">

              <select class="form-control" id="exampleFormControlSelect1" style="width: 100%">

                  <option>Baths</option>

                  <option>1</option>

                  <option>2</option>

                  <option>3</option>

                  <option>4</option>

              </select>

            </div>

      </div>

      <div class="col-md-3">

        <input type="text" name="" class="form-control" placeholder="Min Area (m²)" style="width: 100%">

      </div>

    </div>

  </div>    

  <hr>  

</div>







    <div>
      <a href="" style="color: red;text-decoration: none;margin-left: 9%;">Home</a> > Granny Flat
    </div>

    



<div class="col-md-12 product" style="margin-top: 5%;">
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
                      <a href="{{route('houseGrannyFlat-product-details.show',$data->id)}}" style="text-decoration: none; color: black;font-weight: bold;" onMouseOver="this.style.color=' #FF0000'" onMouseOut="this.style.color='#000000'" >
                        <h6 class="title">{{$data->title}}</h6>
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

                                  <div>
                                    <p>Granny Flat</p>
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <a href="{{route('houseGrannyFlat-product-details.show',$data->id)}}" style="text-decoration:none;" class="btn btn-primary">Details</a>
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








<script>

//advanced button hide & show

$(document).ready(function(){

    

    $(".advanced-buttion").click(function(){

        $(".advanced-iput").toggle(1000);

    });

});



//slider price range









</script>



@endsection