<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title . '-' . config('app.name', 'Partai NasDem') }}</title>
    <!-- Responsive CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113734390-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-113734390-1');
</script>

  </head>

  <body>

<!--Kode Wrapper Start-->  
<div class="kode_wrapper">
	
    <!--Header Wrap Start-->
    <header>
          
        <!--Navigation Wrap Start-->
        <div class="kode_navigation_outr_wrap">
            <div class="container">
                <!--Logo Wrap Start-->
                @include('includes.logo')
                <!--Logo Wrap Start-->
                
                <!--Navigation Wrap Start-->
                <div class="kode_ui_element">
                    
                    <!--Navigation Wrap Start-->
                    @include('includes.menu_daerah')
                    <!--DL Menu END-->
                   
                    
                   @include('includes.search')
                    
                </div>
                <!--Navigation Wrap End-->
                
            </div>
        </div>
        <!--Navigation Wrap End-->
       
    </header>
    <!--Header Wrap Start-->
    
    
    <!--Banner Wrap Start-->
    @yield('headline')
    <!--Banner Wrap End-->
    
    
    <!--Content Wrap Start-->
    <div class="kode_content">
        @yield('content')
    </div>
    <!--Content Wrap End-->
    
    
    <!--Footer Wrap Start-->
    <footer>
    	@include('includes.footer')
        
    </footer>
    <!--Footer Wrap End-->
  
        
</div>
<!--Kode Wrapper End-->



    <!--Bootstrap core JavaScript-->
     <script src="{{ asset('js/jquery.js') }}"></script>
     <script src="{{ asset('js/bootstrap.js') }}"></script>
    <!--Bx-Slider JavaScript-->
	 <script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
    <!--Time Counter JavaScript-->
	 <script src="{{ asset('js/jquery.downCount.js') }}"></script>
    <!--Owl Carousel JavaScript-->
	 <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!--waypoints JavaScript-->
	 <script src="{{ asset('js/waypoints-min.js') }}"></script>
    <!--Pie Circle JavaScript-->
	 <script src="{{ asset('js/pie.js') }}"></script>
    <!--Accordian JavaScript-->
	 <script src="{{ asset('js/jquery.accordion.js') }}"></script>
    <!--Custom TimeCircle-->
     <script src="{{ asset('js/TimeCircles.js') }}"></script>
	<!--Pretty Photo Script-->
     <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
	<!--Pretty Photo Script-->
     <script src="{{ asset('js/jquery-filterable.js') }}"></script>
	<!--Dl Menu Script-->
	 <script src="{{ asset('js/dl-menu/modernizr.custom.js') }}"></script>
	<!--Dl Menu Script-->
	 <script src="{{ asset('js/dl-menu/jquery.dlmenu.js') }}"></script>
	<!--Map Script-->
    <!--script src="http://maps.google.com/maps/api/js?sensor=false"></script-->
	<!--Full Calender Script-->
	 <script src="{{ asset('js/moment.min.js') }}"></script>
	<!--Full Calender Script-->
     <script src="{{ asset('js/fullcalendar.min.js') }}"></script>
	<!--Custom JavaScript-->
	 <script src="{{ asset('js/custom.js') }}"></script>
     @yield('script')
  </body>
</html>
