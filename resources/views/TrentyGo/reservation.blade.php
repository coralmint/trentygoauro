<!-- ======= Header ======= -->
@extends('layouts.website_master')
<link href="{{ asset('theme_files/external_files/css/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
   /* Preloader */
   #preloader {
   position: fixed;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background-color: #fff;
   /* change if the mask should have another color then white */
   z-index: 99;
   /* makes sure it stays on top */
   }
   #status {
   width: 200px;
   height: 200px;
   position: absolute;
   left: 50%;
   /* centers the loading animation horizontally one the screen */
   top: 50%;
   /* centers the loading animation vertically one the screen */
   background-image: url(https://raw.githubusercontent.com/niklausgerber/PreLoadMe/master/img/status.gif);
   /* path to your loading animation */
   background-repeat: no-repeat;
   background-position: center;
   margin: -100px 0 0 -100px;
   /* is width and height divided by two */
   }
   @media (min-width: 1768px){
   section#hero{
   background-position: center right !important;
   background-size: cover !important;
   }
   .container{
   max-width:1250px !important;
   }
   img.icomimg {
   /* width: auto; */
   /* margin: 0 auto; */
   position: absolute;
   left: 170px !important;
   top: 63px;
   }
   }
   .datepicker td, .datepicker th {
    text-align: center;
    width: 40px !important;
    height: 40px !important;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    border: none;
}

.datepicker table tr td.active, .datepicker table tr td.active.disabled, .datepicker table tr td.active.disabled:hover, .datepicker table tr td.active:hover {
    background-color: #006dcc;
    background-image: -moz-linear-gradient(to bottom,#08c,#04c);
    background-image: -ms-linear-gradient(to bottom,#08c,#04c);
    background-image: -webkit-gradient(linear,0 0,0 100%,from(#08c),to(#04c));
    background-image: -webkit-linear-gradient(to bottom,#08c,#04c);
    background-image: -o-linear-gradient(to bottom,#08c,#04c);
    background-image: linear-gradient(to bottom,#14b2bd,#14b3b9) !important;
}
.john {
        float: right !important;
        padding: 22px 0px;
        margin-top: -55px!important;
    }
    @media (max-width: 760px){  
    .form-group {
    margin-bottom: 1rem;
    width: 100%;
    padding: 12px;
}
.input-group {
    margin-bottom: 15px;
}
p.reserve {
    padding-top: 25% !important;
}
.row.glpu {
    position: relative;
    top: 5px;
    background-color: #fff;
}
.col-md-8.get_searched_vendor {
    background-color: #fff;
    margin: 10px;
}
}
</style>
<div id="preloader">
   <div id="status">&nbsp;</div>
</div>
<header id="header" class="fixed-top">
   <div class="container d-flex">
      <div class="logo mr-auto">
         <h1 class="text-light"><a href="/"><img src="{{ asset('public/assets/home_screen/trenty/Logo.png') }}"></a></h1>
         <!-- Uncomment below if you prefer to use an image logo -->
         <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      <nav class="nav-menu d-none d-lg-block">
         <ul>
            <li class="active"><a href="#services">Se Connecter </a></li>
            <li><a href="{{url('reservation')}}">Réservation</a></li>
            <li><a href="#contact1">Devenir loueur</a>
            </li>
            <li><a href="#features">Des Questions?</a></li>
            <li><a href="#contact">Actualities</a></li>
            <!-- <li><a href="portal">Login</a></li>-->
            <?php 
            $role = Session::get('role');
            $user_name = Session::get('user_name');
            if($role != ''){
            ?>
            <li class="john">
               <a class="nav-link dropdown-toggle waves-effect waves-light nav-user welcomim" data-toggle="dropdown" href="#" role="button"
                  aria-haspopup="false" aria-expanded="false">
               <img src="{{ asset('theme_files/images/users/Avatar.png') }}" alt="user" class="rounded-circle">
               </a>
               <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                    <div class="dropdown-item noti-title">
                    <h5 class="text-overflow"><small><center>{{ $user_name }}</center></small> </h5>
                    </div>
                    <a href="{{ url('logout') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-power"></i> <span>Logout</span>
                    </a>
               </div>
            </li>
            <?php } ?>
         </ul>
      </nav>
      <!-- .nav-menu -->
   </div>
</header>
<!-- End Header -->
<style>
   /* fixed social*/
   #fixed-social {
   position: fixed;
   top: 200px;
   }
   a.fixed-gplus {
   margin-bottom: 10px;
   height: 65px !important;
   }
   #fixed-social a {
   color: #fff;
   display: block;
   height: 55px;
   position: relative;
   text-align: center;
   line-height: 40px;
   width: 55px;
   z-index: 2;
   padding-top: 13px;
   }
   #fixed-social a:hover>span{
   visibility: visible;
   left: 41px;
   opacity: 1;
   display:none;
   } 
   #fixed-social a span {
   line-height: 40px;
   left: 60px;
   position: absolute;
   text-align: center;
   width: 120px;
   visibility: hidden;
   transition-duration: 0.5s;
   z-index: 1;
   opacity: 0;
   }
   .fixed-facebook{
   background-color: #FFC41E;
   }
   .fixed-facebook span{
   background-color: #FFC41E;
   }
   .fixed-envelope{
   background-color: #FFC41E;
   }
   .fixed-envelope span{
   background-color: #FFC41E;
   }
   .fixed-gplus{
   background-color: #FFC41E;
   }
   .fixed-gplus span{
   background-color: #FFC41E;
   }
   .fixed-linkedin{
   background-color: #FFC41E;
   }
   .fixed-linkedin span{
   background-color: #FFC41E;
   }
   .fixed-instagrem{
   background-color: #ED2B29;
   }
   .fixed-instagrem span{
   background-color: #ED2B29;
   }
   .fixed-tumblr{
   background-color: #EB1471;
   }
   .fixed-tumblr span{
   background-color: #EB1471;
   }
   i.fa.fa-instagram {
   background-color: #fff;
   color: #ffc41e;
   padding: 10px;
   border-radius: 22px;
   font-size: 20px;
   }
   i.fa.fa-facebook {
   background-color: #fff;
   color: #ffc41e;
   padding: 10px 13px;
   border-radius: 22px;
   font-size: 20px;
   }
   i.fa.fa-envelope {
   background-color: #fff;
   color: #ffc41e;
   padding: 10px;
   border-radius: 22px;
   font-size: 20px;
   }
   .encount p {
   font-size: 13px;
   padding: 0px 32px;
   }
   .without select{
   background: transparent;
   border-bottom: 1px solid #fff !important;
   border: none;
   margin-top:10px;
   }
   .without select {
   color: #fff !important;
   }
   .form-control{
   border:1px solid #fff !important;
   }
   .input-group {
   -webkit-box-shadow: 0px 5px 4px 1px rgba(194,195,209,0.72);
   -moz-box-shadow: 0px 5px 4px 1px rgba(194,195,209,0.72);
   box-shadow: 0px 5px 4px 1px rgba(194,195,209,0.72);
   }
   input#partner_email {
   border: none !important;
   border-bottom: 1px solid #fff !important;
   }
   button#submit_partner {
   background-color: #d2a21d;
   font-weight: 600;
   }
   #output {
   padding: 20px;
   background: #dadada;
   }
   form {
   margin-top: 20px;
   }
   select {
   width: 300px;
   }
   .form-control:focus {
   background-color: #fff !important;
   border-color: none !important;
   }
   .services .title {
   font-weight: 600 !important;
   margin-bottom: 15px !important;
   font-size: 15px !important;
   }
   /*end fixed social*/
</style>
<div id="fixed-social">
   <div>
      <a href="#" class="fixed-facebook" target="_blank"><i class="fa fa-instagram"></i> <span>Instagram</span></a>
   </div>
   <div>
      <a href="#" class="fixed-facebook" target="_blank"><i class="fa fa-facebook"></i> <span>Facebook</span></a>
   </div>
   <div>
      <a href="#" class="fixed-gplus" target="_blank"><i class="fa fa-envelope"></i> <span>Gmail</span></a>
   </div>
</div>
<!-- ======= Hero Section ======= -->
<section id="hero" style="background:url(public/assets/home_screen/trenty/1hilles1.png);background-repeat: no-repeat;padding:0px 0px;">
   <div class="container">
      <p class="reserve">Reservation</p>
   </div>
</section>
<div class="container">
   <div class="row glpu">
      <div class="col-md-4">
         <div class="input-group">
            <div class="input-group-append">
               <button class="btn btn-secondary fin" type="button">
               <i class="fa fa-map-marker"></i>
               </button>
            </div>
            <select class="form-control" id="filter_location">
                <option value="" hidden="">Adresse</option>
                @foreach($trentygo_location as $tl)
                <option value="{{ $tl->location_master_id }}">{{ $tl->location_name }}</option>
                @endforeach
            </select>
         </div>
      </div>
        <div class="col-md-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="debut" id="multi_weekend_picker">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div>
            </div><!-- input-group -->
        </div>
        <div class="form-group">
            <div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Fin" id="datepicker">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                    </div>
                </div><!-- input-group -->
            </div>
        </div>
      <div class="col-md-2">
         <button class="btn-sear" id="search_vehicle_list"><i class="fa fa-search"></i></button>
      </div>
   </div>
</div>
<!-- End Hero -->
<main id="main">
   <!-- ======= Services Section ======= -->
   <section id="services" class="services section-bg">
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <div class="card">
                  <article class="card-group-item">
                     <header class="card-header">
                        <h6 class="title">TYPE DU VEHICULE</h6>
                     </header>
                     <div class="filter-content">
                        <div class="card-body">
                            
                            
                            <form method="get">
                            @foreach($vehicle_type as $vt)
                            <div class="custom-control custom-checkbox">
                            <label>
                              <input type="checkbox" class="filter_vehicle filter_vehicle_type" value="{{ $vt->master_data_id }}"><img src="{{ $vt->image_url }}" class="cit"> {{ ucfirst($vt->master_value) }}
                            </label>{{ $vt->master_data_id }}
                            </div>
                            @endforeach
                            </form>                            
                            
                            
                           <!--<a class="dine" style="background-color: #eebb48;-->
                           <!--   border: 1px solid #eebb48;-->
                           <!--   color: #fff;-->
                           <!--   font-weight: 600;"><img src="{{ asset('public/assets/home_screen/trenty/ic1.png') }}" class="cit"> Famitiale</a>-->
                        </div>
                        <!-- card-body.// -->
                     </div>
                  </article>
                  <!-- card-group-item.// -->
                  <article class="card-group-item">
                     <header class="card-header">
                        <h6 class="title">PRIX </h6>
                     </header>
                     <div class="clmd">
                        <span>mons de X </span><span id="price_range_view"></span>
                        <input type="range" min="50" class="filter_price" id="rent_price" max="1000" value="50" style="padding:5% 0px;width:100%;">
                     </div>
                  </article>
                  <!-- card-group-item.// -->
               </div>
               <!-- card.// -->
               <div class="card">
                  <article class="card-group-item">
                     <header class="card-header">
                        <h6 class="title">SELECTION MULTIPLE CATEGORY</h6>
                     </header>
                     <div class="filter-content">
                        <form method="get">
                            @foreach($vehicle_service_option as $service)
                            <div class="custom-control custom-checkbox">
                            <label>
                              <input type="checkbox" class="filter_vehicle filter_vehicle_service" value="{{ $service->master_data_id }}">{{ $service->master_value }}
                            </label>
                            </div>
                            @endforeach
                        </form>
                     </div>
                  </article>
                  <!-- card-group-item.// -->
               </div>
               <!-- card.// -->
               <div class="card">
                  <article class="card-group-item">
                     <header class="card-header">
                        <h6 class="title">Vehicle gear type </h6>
                     </header>
                     <div class="filter-content">
                        <div class="card-body">
                            <div class="custom-control custom-checkbox">
                            <label>
                              <input type="checkbox" class="filter_vehicle filter_vehicle_gear_type" value="22">Auto
                            </label>
                            </div>
                            <div class="custom-control custom-checkbox">
                            <label>
                              <input type="checkbox" class="filter_vehicle filter_vehicle_gear_type" value="23">Manual
                            </label>
                            </div>
                        </div>
                        <!-- card-body.// -->
                     </div>
                  </article>
                  <!-- card-group-item.// -->
               </div>
               <!-- card.// -->
            </div>
            <div class="col-md-8 get_searched_vendor">
               @foreach($vehicle_details as $key=>$vehide)
               <div class="row rosy">
                  <div class="col-md-4">
                        @if( ($vehide->file_url != '') || (file_exists($vehide->file_path)) )
                            <a href="book_new_reservation/{{ Crypt::encryptString($vehide->vehicle_id) }}">
                                <img src="{{ $vehide->file_url }}" class="addnewsava" style="width: 186; height: 116;" >
                            </a>
                        @else
                            <a href="book_new_reservation/{{ Crypt::encryptString($vehide->vehicle_id) }}">
                                <img src="{{ asset('public/assets/home_screen/trenty/car11.jpg') }}" class="caro">
                            </a>
                        @endif
                  </div>
                  <div class="col-md-8">
                     <div class="row">
                        <div class="col-md-7">
                           <p class="typoo">Type de vechicule : {{ $vehide->vehicle_driving_type }}</p>
                           <a href="book_new_reservation/{{ Crypt::encryptString($vehide->vehicle_id) }}"> <p class="typoo1">{{ ucfirst($vehide->vehicle_brand) }}</p> </a>
                           <?php 
                           $opt_arr = explode (",", $vehide->options);
                           $opt_url_arr = explode (",", $vehide->options_url);
                           ?>
                           <!--array_merge($opt_arr,$opt_url_arr)-->
                           @foreach($opt_arr as $key => $oa)
                           <span class="opti">@if($opt_url_arr[$key] != '')<img src="{{ $opt_url_arr[$key] }}" style="width: 35px;" />@else - @endif   {{ $oa }}</span>  
                           @endforeach
                        </div>
                        <div class="col-md-5">
                           <div class="col-md-12">{{ $vehide->partner_id }}----{{ $vehide->default_rent }} ----{{ $vehide->vehicle_id }}
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-7">
                           <img src="{{ asset('public/assets/home_screen/trenty/six.jpg') }}" class="caro1">
                        </div>
                        <div class="col-md-5">
                           <div class="col-md-12 zero">
                              <p class="margik"><span class="fifty">50<i class="fa fa-euro"></i> / </span><span class="jour">jours</span></p>
                              <p class="margik"><span class="fifty1">150<i class="fa fa-euro"></i> / </span><span class="jour">au total</span></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
               <!--<div class="row rosy">-->
               <!--   <div class="col-md-4">-->
               <!--      <img src="{{ asset('public/assets/home_screen/trenty/car11.jpg') }}" class="caro">-->
               <!--   </div>-->
               <!--   <div class="col-md-8">-->
               <!--      <div class="row">-->
               <!--         <div class="col-md-7">-->
               <!--            <p class="typoo">Type de vechicule</p>-->
               <!--            <p class="typoo1">Marque de vechicule</p>-->
               <!--            <span class="opti">Option 01</span>-<span class="opti">Option 02</span>-<span class="opti">Option 03</span>  -->
               <!--         </div>-->
               <!--         <div class="col-md-5">-->
               <!--            <div class="col-md-12">-->
               <!--               <span class="fa fa-star checked"></span>-->
               <!--               <span class="fa fa-star checked"></span>-->
               <!--               <span class="fa fa-star checked"></span>-->
               <!--               <span class="fa fa-star"></span>-->
               <!--               <span class="fa fa-star"></span>-->
               <!--            </div>-->
               <!--         </div>-->
               <!--      </div>-->
               <!--      <div class="row">-->
               <!--         <div class="col-md-7">-->
               <!--            <img src="{{ asset('public/assets/home_screen/trenty/six.jpg') }}" class="caro1">-->
               <!--         </div>-->
               <!--         <div class="col-md-5">-->
               <!--            <div class="col-md-12 zero">-->
               <!--               <p class="margik"><span class="fifty">50<i class="fa fa-euro"></i> / </span><span class="jour">jours</span></p>-->
               <!--               <p class="margik"><span class="fifty1">150<i class="fa fa-euro"></i> / </span><span class="jour">au total</span></p>-->
               <!--            </div>-->
               <!--         </div>-->
               <!--      </div>-->
               <!--   </div>-->
               <!--</div>-->
               <!--<div class="row rosy">-->
               <!--   <div class="col-md-4">-->
               <!--      <img src="{{ asset('public/assets/home_screen/trenty/car11.jpg') }}" class="caro">-->
               <!--   </div>-->
               <!--   <div class="col-md-8">-->
               <!--      <div class="row">-->
               <!--         <div class="col-md-7">-->
               <!--            <p class="typoo">Type de vechicule</p>-->
               <!--            <p class="typoo1">Marque de vechicule</p>-->
               <!--            <span class="opti">Option 01</span>-<span class="opti">Option 02</span>-<span class="opti">Option 03</span>  -->
               <!--         </div>-->
               <!--         <div class="col-md-5">-->
               <!--            <div class="col-md-12">-->
               <!--               <span class="fa fa-star checked"></span>-->
               <!--               <span class="fa fa-star checked"></span>-->
               <!--               <span class="fa fa-star checked"></span>-->
               <!--               <span class="fa fa-star"></span>-->
               <!--               <span class="fa fa-star"></span>-->
               <!--            </div>-->
               <!--         </div>-->
               <!--      </div>-->
               <!--      <div class="row">-->
               <!--         <div class="col-md-7">-->
               <!--            <img src="{{ asset('public/assets/home_screen/trenty/six.jpg') }}" class="caro1">-->
               <!--         </div>-->
               <!--         <div class="col-md-5">-->
               <!--            <div class="col-md-12 zero">-->
               <!--               <p class="margik"><span class="fifty">50<i class="fa fa-euro"></i> / </span><span class="jour">jours</span></p>-->
               <!--               <p class="margik"><span class="fifty1">150<i class="fa fa-euro"></i> / </span><span class="jour">au total</span></p>-->
               <!--            </div>-->
               <!--         </div>-->
               <!--      </div>-->
               <!--   </div>-->
               <!--</div>-->
            </div>
         </div>
      </div>
   </section>
   <!-- End Services Section -->
   <!-- ======= Contact Section ======= -->
   <section id="contact1" class="contact section-bg" style="background-color:#14b3b9;">
      <div class="container">
         <div class="section-title" data-aos="fade-up">
            <h2 class="insri">Newsletter
            </h2>
            <p class="loremipsi">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
         </div>
         <div class="row">
            <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-left">
               <form role="form" class="php-email-form" style="background-color:transparent;border:none;">
                  <div class="form-row">
                     <div class="form-group col-md-10 without">
                        <input type="text" class="form-control" name="email" onkeyup="ValidateEmail();" placeholder= "Adresse mail" id="partner_email" data-rule="email" data-msg="Please enter a valid email" />
                        <div class="validate"></div>
                        <span id="lblError" style="color: red"></span>
                     </div>
                     <div class="form-group col-md-2">
                        <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                        <div class="text-center">
                           <button type="submit" class="envoy" id="submit_partner">Envoyer</button>
                           <!--<input type="button" class="envoy" id="submit_partner" value="Suivant" />-->
                        </div>
                     </div>
                  </div>
                  <!--<div class="mb-3">-->
                  <!--   <div class="loading">Loading</div>-->
                  <!--   <div class="error-message"></div>-->
                  <!--   <div class="sent-message">Your message has been sent. Thank you!</div>-->
                  <!--</div>-->
               </form>
            </div>
         </div>
      </div>
   </section>
   <!-- End Contact Section -->
</main>
<!-- End #main -->
<!-- ======= Footer ======= -->
<footer id="footer">
   <div class="footer-top">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-6 footer-links">
               <ul>
                  <li> <a href="#">Navigation</a></li>
                  <li><a href="#services">Présentation</a></li>
                  <li> <a href="#features">Blog</a></li>
                  <li><a href="#contact1">Inscription </a></li>
               </ul>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
               <ul>
                  <li> <a href="#">Liens Utiles</a></li>
                  <li><a href="#contact">Contact</a></li>
                  <li> <a href="#">Mentions légal</a></li>
                  <li><a href="#">Déclaration relative aux cookies</a></li>
               </ul>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
               <ul>
                  <li> <a href="#">Nous suivre</a></li>
                  <li><a href="#">Facebook</a></li>
                  <li> <a href="#">Instagram</a></li>
               </ul>
            </div>
            <div class="col-lg-3 col-md-6 footer-newsletter">
               <img src="{{ asset('public/assets/home_screen/trenty/Group 594.png') }}" class="footimg">
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- End Footer -->
<a href="#" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>
<!-- Vendor JS Files -->
@section('script')

   <!-- jQuery  -->
        <script src="{{ asset('theme_files/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('theme_files/assets/js/popper.min.js') }}"></script><!-- Popper for Bootstrap -->
        <script src="{{ asset('theme_files/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('theme_files/assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('theme_files/assets/js/waves.js') }}"></script>
        <script src="{{ asset('theme_files/assets/js/jquery.slimscroll.js') }}"></script>

        <!-- plugin js -->

        <script src="{{ asset('theme_files/plugins/timepicker/bootstrap-timepicker.js') }}"></script>
        <script src="{{ asset('theme_files/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('theme_files/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('theme_files/plugins/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
        <script src="{{ asset('theme_files/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

        <!-- Init js -->
        <script src="{{ asset('theme_files/assets/pages/jquery.form-pickers.init.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<script type="text/javascript" src="{{ URL::asset('theme_files/external_files/js/jquery-confirm.min.js') }}"></script>
<script>
    $('#multi_weekend_picker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
    });
    $('#datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
    });
$("#search_vehicle_list").click(function(){
   var from_date = $('#multi_weekend_picker').val();
   var to_date = $('#datepicker').val();
   var filter_location = $('#filter_location').val();
   var tempcsrf = $('#csrf_token').val();
   $.ajax({
      type: 'POST',
      url:"get_searched_vehicle_by_date",
      dataType: "json",
      data: {
        from_date:from_date,
        to_date:to_date,
        filter_location:filter_location,
        _token:tempcsrf
      },
      success:function(data){
          $('.get_searched_vendor').html(data);
      }
   });
});


function get_searched_vendor(){
   var filter_vehicle_type = get_filter('filter_vehicle_type');
   var filter_vehicle_service = get_filter('filter_vehicle_service');
   var filter_vehicle_gear_type = get_filter('filter_vehicle_gear_type');
   var filter_price  = get_filter_price('filter_price');
   var tempcsrf = $('#csrf_token').val();
   $.ajax({
      type: 'POST',
      url:"get_searched_vehicle",
      dataType: "json",
      data: {
        filter_vehicle_type:filter_vehicle_type,
        filter_vehicle_service:filter_vehicle_service,
        filter_vehicle_gear_type:filter_vehicle_gear_type,
        filter_price:filter_price,
        _token:tempcsrf
      },
      success:function(data){
          $('.get_searched_vendor').html(data);
      }
   });
} 
function get_filter(class_name){
   var filter = [];
   $('.'+class_name+':checked').each(function(){
      filter.push($(this).val());
   });
   return filter;
}
function get_filter_price(class_name){
   var price = $('.'+class_name).val();
   return price;
}
$('.filter_vehicle').click(function(){
   get_searched_vendor();
});

$("#rent_price").change(function(){   
   get_searched_vendor();
   $("#price_range_view").html($(this).val());
   console.log($(this).val());
});
</script>



















<script>
   $("#submit_partner").click(function(){
         var company_name = $('#company_name').val();
         var partner_email = $('#partner_email').val();
         var no_vehicles = $('#no_vehicles').val();
         var phone_no = $('#phone_no').val();
         var partner_location = $('#partner_location').val();
         var partner_type = $('#partner_type').val();
           var tempcsrf = $('#csrf_token').val();
           if((partner_email =='')||(company_name =='')||(no_vehicles =='')||(phone_no =='')||(partner_location =='')){
               $.alert({
                 title: 'Alerte!',
                 content: "Veuillez remplir tous les champs obligatoires !!!",
             });
           }
           // else if{
           //     $("#partner_email").keyup(function() {
           //     var inpObj = document.getElementById("partner_email");
           //     var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
           //     if (regex.test(this.value) !== true)
           //     this.value = this.value.replace(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/, '');
           //     if (!inpObj.checkValidity()) {
           //     document.getElementById("demo").innerHTML = inpObj.validationMessage;
           //     }
           //   });
           // }
           else{
               $.ajax({
             type: 'POST',
             url: '{{ url('add_partner_details') }}',
             dataType: 'json',
             data: {
                 company_name:company_name,
                 partner_email:partner_email,
              no_vehicles:no_vehicles,
              phone_no:phone_no,
              partner_location:partner_location,
              partner_type:partner_type,
                 _token:tempcsrf
                 },
                   beforeSend: function () {
                   },
                   success: function (data) {
                       if(data == "success"){
                           location.reload();
                       }else{
                           $.alert({
                             title: 'Alerte!',
                             content: "cet identifiant de messagerie existe déjà !!!",
                         });
                       }
                  }
                 });
           }
       });
       $("#com_name").keyup(function() {
           var inpObj = document.getElementById("com_name");
           var regex = /^[A-Za-z ]+$/;
           if (regex.test(this.value) !== true)
           this.value = this.value.replace(/[^A-Za-z +-.,]+/, '');
           if (!inpObj.checkValidity()) {
           document.getElementById("demo").innerHTML = inpObj.validationMessage;
           }
       });
       $("#no_vehicles").keyup(function() {
           var inpObj = document.getElementById("no_vehicles");
           var regex = /^[0-9 +.,]+$/;
           if (regex.test(this.value) !== true)
           this.value = this.value.replace(/[^0-9 +.,]+/, '');
           if (!inpObj.checkValidity()) {
           document.getElementById("demo").innerHTML = inpObj.validationMessage;
           }
         });
       $("#phone_no").keyup(function() {
           var inpObj = document.getElementById("phone_no");
           var regex = /^[0-9 +.,]+$/;
           if (regex.test(this.value) !== true)
           this.value = this.value.replace(/[^0-9 +.,]+/, '');
           if (!inpObj.checkValidity()) {
           document.getElementById("demo").innerHTML = inpObj.validationMessage;
           }
         });
         
         function ValidateEmail() {
           var email = document.getElementById("partner_email").value;
           var lblError = document.getElementById("lblError");
           lblError.innerHTML = "";
           var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
           if (!expr.test(email)) {
               lblError.innerHTML = "Adresse e-mail invalide.";
           }
       }    
       $("#submit_contact").click(function(){
           var form_name = $('#form_name').val();
           var form_com_name = $('#form_com_name').val();
         var form_email = $('#form_email').val();
         var form_phone_no = $('#form_phone_no').val();
         var form_massage = $('#form_massage').val();
           var num1 = parseInt($('#num1').val(), 10);
           var num2 = parseInt($('#num2').val(), 10);
           var captcha_val = num1+num2;
           var captcha = $('#captcha').val();
           var tempcsrf = $('#csrf_token').val();
           if((form_email =='') || (captcha =='')){
               $.alert({
                 title: 'Alert!',
                 content: "Please fill all mandatory fields !!!",
             });
           }else if(captcha_val == captcha){
               $.ajax({
             type: 'POST',
             url: '{{ url('add_contact_details') }}',
             dataType: 'json',
             data: {
                   form_name:form_name,
                   form_com_name:form_com_name,
                form_email:form_email,
                form_phone_no:form_phone_no,
                form_massage:form_massage,
                num1 : num1,
                   num2 : num2,
                   captcha : captcha,
                   _token:tempcsrf
                 },
                   beforeSend: function () {
                   },
                   success: function (data) {
                       location.reload();
                  }
                 });
           }else{
               $.alert({
                 title: 'Alert!',
                 content: "Check your captcha value !!!",
             });
           }
       });
      $("#form_name").keyup(function() {
           var inpObj = document.getElementById("form_name");
           var regex = /^[A-Za-z ]+$/;
           if (regex.test(this.value) !== true)
           this.value = this.value.replace(/[^A-Za-z +-.,]+/, '');
           if (!inpObj.checkValidity()) {
           document.getElementById("demo").innerHTML = inpObj.validationMessage;
           }
      });
      $("#form_com_name").keyup(function() {
         var inpObj = document.getElementById("form_com_name");
         var regex = /^[A-Za-z ]+$/;
         if (regex.test(this.value) !== true)
         this.value = this.value.replace(/[^A-Za-z +-.,]+/, '');
         if (!inpObj.checkValidity()) {
           document.getElementById("demo").innerHTML = inpObj.validationMessage;
         }
      });
      $("#form_phone_no").keyup(function() {
           var inpObj = document.getElementById("form_phone_no");
           var regex = /^[0-9 +.,]+$/;
           if (regex.test(this.value) !== true)
           this.value = this.value.replace(/[^0-9 +.,]+/, '');
           if (!inpObj.checkValidity()) {
           document.getElementById("demo").innerHTML = inpObj.validationMessage;
           }
      });
      function ValidateEmails() {
           var email = document.getElementById("form_email").value;
           var lblError1 = document.getElementById("lblError1");
           lblError1.innerHTML = "";
           var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
           if (!expr.test(email)) {
               lblError1.innerHTML = "Adresse e-mail invalide.";
           }
      }
      document.onreadystatechange = function () {
          var state = document.readyState
          if (state == 'interactive') {
          document.getElementById('contents').style.visibility="hidden";
          } else if (state == 'complete') {
          setTimeout(function(){
           document.getElementById('interactive');
           document.getElementById('load').style.visibility="hidden";
           document.getElementById('contents').style.visibility="visible";
          },1000);
          }
      }      
   $(window).on('load', function() { // makes sure the whole site is loaded 
     $('#status').fadeOut(); // will first fade out the loading animation 
     $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
     $('body').delay(350).css({'overflow':'visible'});
   });
</script>
@endsection
