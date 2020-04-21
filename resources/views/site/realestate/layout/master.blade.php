<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/site/realestate/css/custom.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <!-- tabs link -->

    

    


    
    <title> @yield('title')</title>
  </head>
  <body>
    <div class="container-fluid" style="padding-right: 0px; padding-left: 0px;">
      @include('site.realestate.partials.header')
      @include('site.realestate.partials.navbar')
      <div class="container-fluid" style="padding: 0px;">
          @yield('content')
      </div>
      @include('site.realestate.partials.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('.carousel').carousel({
          interval: 1200
        })
      });
    </script>

    <script type="text/javascript">
      $(function(){
        $(".hidden").slice(0,1).show();

        $("$loadMore").on('click',function(e){
          e.preventDefault();
          $(".hidden:hidden").slice(0,2).slideDown();
          if($(".hidden:hidden").length == 0){
            $("#load").fadeOut('slow');
          }
          $('html,body').animat({
            scrollTop: $(this).offset().top
          },1500);
        });
      });
    




    </script>
 


    <style type="text/css">
      .dropdown:hover>.dropdown-menu{
        display: block;
      }
    </style>



    <!-- image modal -->

    <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>


  </body>
</html>
