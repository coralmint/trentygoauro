<!-- ======= Header ======= -->
@extends('layouts.website_master')
<link href="{{ asset('theme_files/external_files/css/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://localhost/trentygo/theme_files/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
<link href="https://localhost/trentygo/theme_files/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
<link href="https://localhost/trentygo/theme_files/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="https://localhost/trentygo/theme_files/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
<link href="https://localhost/trentygo/theme_files/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />

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
</style>
<style type="text/css">
    .panel-title {
    display: inline;
    font-weight: bold;
    }
    .display-table {
    display: table;
    }
    .display-tr {
    display: table-row;
    }
    .display-td {
    display: table-cell;
    vertical-align: middle;
    width: 61%;
    }
    
    .hide{
        display: none;
    }
    .john {
        float: right !important;
        padding: 22px 0px;
        margin-top: -55px!important;
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
   .has-float-label {
   position: relative;
   font-size: 70%;
   }
   .has-float-label label {
   position: absolute;
   opacity: 1;
   transition: all .2s;
   top: -.5em;
   left: .75rem;
   z-index: 3;
   line-height: 1;
   padding: 0 1px
   }
   .has-float-label label::after {
   content: " ";
   display: block;
   position: absolute;
   background: #fff;
   height: 2px;
   top: 50%;
   left: -.2em;
   right: -.2em;
   z-index: -1
   }
   .form-control:focus{
   border:none !important;
   }
   .has-float-label .form-control:placeholder-shown:not(:focus)::-webkit-input-placeholder {
   opacity: 0
   }
   .has-float-label .form-control:placeholder-shown:not(:focus)+label {
   font-size: 150%;
   opacity: .5;
   top: .8em
   }
   .form-group.has-float-label .form-control{
   border: 1px solid #ddd !important;
   }
   .form-control.tribut{
   border: 1px solid #ddd !important;
   }
   .form-group.has-float-label .form-control.fhome {
   border: 1px solid #fff !important;
   border-bottom: 1px solid #ddd !important;
   }
   select.form-control.tribut.fhome{
   border: 1px solid #fff !important;
   border-bottom: 1px solid #ddd !important;
   }
   button#submit_partner {
   background-color: #edba47;
   font-weight: 600;
   width: 100%;
   border: none;
   color: #fff;
   }
   .row.backgrey {
   background-color: #f5f5f5;
   padding: 10px;
   margin-bottom:5%;
   }
   span.fifty {
   color: #edba47;
   font-size: 30px;
   }
   img.tookim {
   width: 20%;
   }
   header.card-header {
   background-color: #fff;
   border: none !important;
   padding:10px 0px;
   }
   .card {
   padding: 10px 20px;
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
<section id="hero" style="background:url(
   );background-repeat: no-repeat;padding:0px 0px;">
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
            <input type="text" class="form-control" placeholder="Adresse">
         </div>
      </div>
      <div class="col-md-3">
         <div class="input-group">
            <div class="input-group-append">
               <button class="btn btn-secondary fin" type="button">
               <i class="fa fa-calendar"></i>
               </button>
            </div>
            <input type="text" class="form-control" placeholder="debut">
         </div>
      </div>
      <div class="col-md-3">
         <div class="input-group">
            <div class="input-group-append">
               <button class="btn btn-secondary fin" type="button">
               <i class="fa fa-calendar"></i>
               </button>
            </div>
            <input type="text" class="form-control" placeholder="Fin">
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
                  <header class="card-header">
                     <h6 class="title">RECAPITULATIF</h6>
                  </header>
                  <img src="{{ $vehicle_info[0]->file_url }}" class="caro">
                  <article class="card-group-item">
                     <header class="card-header">
                        <h6 class="title">TYPE DU VEHICULE</h6>
                     </header>
                     <div class="filter-content">
                        <div class="card-body">
                           <a class=""><img src="{{ $vehicle_info[0]->image_url }}" class="cit"> Famitiale</a>
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
                     <div class="col-md-12 zero">
                        <p class="margik"><span class="fifty">{{$vehicle_info[0]->default_rent}}<i class="fa fa-euro"></i> / </span><span class="jour">@if($vehicle_info[0]->rent_for == '1')Km @else Hr @endif</span></p>
                        <p class="margik"><span class="fifty1"><span class="dynamic_rent_value"></span><i class="fa fa-euro"></i> / </span><span class="jour">au total</span></p>
                     </div>
                  </article>
                  <!-- card-group-item.// -->
                  <!-- card.// -->
                  <div class="">
                     <article class="card-group-item">
                        <header class="card-header">
                           <h6 class="title"> LOUEUR</h6>
                        </header>
                        <div class="filter-content">
                           <img src="https://trentygo.coralmint.in/public/assets/home_screen/trenty/six.jpg" class="caro1">
                        </div>
                     </article>
                     <!-- card-group-item.// -->
                  </div>
                  <!-- card.// -->
                  <div class="">
                     <article class="card-group-item">
                        <header class="card-header">
                           <h6 class="title">INFOS TYPE</h6>
                        </header>
                        <div class="filter-content">
                           <div class="card-body">
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                           </div>
                           <!-- card-body.// -->
                        </div>
                     </article>
                     <!-- card-group-item.// -->
                  </div>
                  <!-- card.// -->
               </div>
            </div>
            <div class="col-md-8 get_searched_vendor">
               <div class="row rosy">
                  <div class="col-md-12">
                     <h6 class="title">INFOS CONDUCTUER</h6>
                  </div>
                  <div class="form-group col-md-6">
                     <div class="form-group has-float-label">
                        <input type="text" class="form-control" value="{{ ucfirst($customer_info[0]->customer_name) }}" id="customer_first_name" placeholder="Customer Prénom" onfocus="this.placeholder = ''" required autofocus >
                        <label for="fullname">Prénom</label>
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <div class="form-group has-float-label">
                        <input type="text" class="form-control" id="customer_last_name" placeholder="Customer nom de famille" onfocus="this.placeholder = ''" required autofocus >
                        <label for="fullname">Nom de famille</label>
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="form-group has-float-label">
                        <input type="email" class="form-control" value="{{ $customer_info[0]->customer_email }}" id="customer_email" placeholder="Adresse e-mail" onfocus="this.placeholder = ''" required autofocus >
                        <label for="fullname">Adresse e-mail</label>
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <div class="form-group has-float-label">
                        <input type="text" class="form-control" id="customer_country_code" placeholder="Code pays" onfocus="this.placeholder = ''" required autofocus >
                        <label for="fullname">Code pays</label>
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <div class="form-group has-float-label">
                        <input type="text" class="form-control" value="{{ $customer_info[0]->customer_phone }}" id="customer_phone" placeholder="téléphone" onfocus="this.placeholder = ''" required autofocus >
                        <label for="fullname">Téléphone</label>
                     </div>
                  </div>
               </div>
               <div class="row rosy">
                  <div class="col-md-12">
                     <h6 class="title">Date de naissance</h6>
                  </div>
                  <div class="form-group col-md-4">
                     <select class="form-control tribut" id="byear">
                     <?php 
                        $year = date('Y');
                        $min = $year - 60;
                        $max = $year - 5;
                        for( $i=$max; $i>=$min; $i-- ) {
                          echo '<option value='.$i.'>'.$i.'</option>';
                        }
                        ?>
                     </select>
                  </div>
                  <div class="form-group col-md-4">
                     <select class="form-control tribut" id="bmonth">
                          <?php
                            for ($i = 1; $i <=12; $i++) {
                                $time1 = strtotime(sprintf('%d months', $i)); 
                                $time = DateTime::createFromFormat('!m', $i);
                                $monthName = $time->format('F');
                                $value = $time->format('m');
                                echo "<option value='$value'>$monthName</option>";
                            }
                            ?>
                     </select>
                  </div>
                  <div class="form-group col-md-4">
                     <select class="form-control tribut" id="bday" name="bday" required disabled >
                        <option value="">Jour</option>
                     </select>
                  </div>
                  <div class="form-group col-md-4">
                     <div class="form-group has-float-label">
                        <input type="text" class="form-control" id="customer_door_no" placeholder="Numéro de porte" onfocus="this.placeholder = ''" required autofocus >
                        <label for="fullname">Numéro de porte</label>
                     </div>
                  </div>
                  <div class="form-group col-md-4">
                     <div class="form-group has-float-label">
                        <input type="text" class="form-control" id="customer_street" placeholder="Nom de l'appartement" onfocus="this.placeholder = ''" required autofocus >
                        <label for="fullname">Nom de l'appartement</label>
                     </div>
                  </div>
                  <div class="form-group col-md-4">
                     <div class="form-group has-float-label">
                        <input type="text" class="form-control" id="customer_appartment" placeholder="numéro de rue" onfocus="this.placeholder = ''" required autofocus >
                        <label for="fullname">Nom de rue</label>
                     </div>
                  </div>
                  <div class="form-group col-md-4">
                     <!--<select class="form-control tribut" id="postal_code">-->
                     <!--   <option hidden>code postal</option>-->
                     <!--   <option value="1"> Non Insurance Partner</option>-->
                     <!--</select>-->
                     <div class="form-group has-float-label">
                        <input type="text" class="form-control" id="postal_code" placeholder="Code postal" onfocus="this.placeholder = ''" required autofocus >
                        <label for="fullname">Code postal</label>
                     </div>
                  </div>
                  <div class="form-group col-md-4">
                     <!--<select class="form-control tribut" id="city">-->
                     <!--   <option hidden>ville</option>-->
                     <!--   <option value="1"> Non Insurance Partner</option>-->
                     <!--   <option value="2"> Insurance Partner</option>-->
                     <!--</select>-->
                     <div class="form-group has-float-label">
                        <input type="text" class="form-control" id="customer_city" placeholder="Ville" onfocus="this.placeholder = ''" required autofocus >
                        <label for="fullname">Ville</label>
                     </div>
                  </div>
                  <div class="form-group col-md-4">
                     <select class="form-control tribut" id="customer_country" disabled>
                        <option hidden>Pays</option>
                        <option value="France" selected="selected">France</option>
                     </select>
                  </div>
               </div>
               <div class="row rosy">
                  <div class="col-md-12">
                     <h6 class="title">Détails du voyage</h6>
                  </div>
                  <div class="form-group col-md-6">
                     <select class="form-control tribut" id="customer_source">
                        <option hidden>Lieu de ramassage</option>
                        @foreach($trentygo_location as $tl)
                        <option value="{{$tl->location_master_id}}">{{ ucfirst($tl->location_name) }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <select class="form-control tribut" id="customer_destination">
                        <option hidden>Lieu de dépôt</option>
                        @foreach($trentygo_location as $tl)
                        <option value="{{$tl->location_master_id}}">{{ ucfirst($tl->location_name) }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group col-md-6 has-float-label input-group">
                        <input type="text" class="form-control" placeholder="Reservation Date" id="from_datepicker">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                             <label for="Vehicle Color">Partir de la date</label>
                        </div>
                  </div>
                    <input type="hidden" value="{{$vehicle_info[0]->vehicle_id}}" id="vehicle_id" />
                    <input type="hidden" value="{{$vehicle_info[0]->partner_id}}" id="partner_id" />
                   <div class="form-group col-md-6">
                     <div class="form-group has-float-label input-group">
                           <div class="input-group">
                                <input type="text" class="form-control" placeholder="Reservation Date" id="to_datepicker">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                     <label for="Vehicle Color">À ce jour</label>
                                </div>
                           </div><!-- input-group -->
                     </div>
                  </div>
                  
               </div>
               <div class="row rosy">
                  <div class="col-md-12">
                     <h6 class="title">Numéro de permis</h6>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="form-group has-float-label">
                        <input type="text" class="form-control" id="license_number" placeholder="Customer Name" onfocus="this.placeholder = ''" required autofocus >
                        <label for="fullname">EX : 15284582XXXX</label>
                     </div>
                  </div>
               </div>
               <div class="row rosy">
                  <div class="col-md-12">
                     <h6 class="title">Date de obtention</h6>
                  </div>
                  <div class="form-group col-md-4">
                     <select class="form-control tribut" id="issue_year">
                     <?php 
                        $year = date('Y');
                        $min = $year - 60;
                        $max = $year;
                        for( $i=$max; $i>=$min; $i-- ) {
                          echo '<option value='.$i.'>'.$i.'</option>';
                        }
                        ?>
                     </select>
                  </div>
                  <div class="form-group col-md-4">
                     <select class="form-control tribut" id="issue_month">
                        <?php
                            for ($i = 1; $i <=12; $i++) {
                                $time1 = strtotime(sprintf('%d months', $i)); 
                                $time = DateTime::createFromFormat('!m', $i);
                                $monthName = $time->format('F');
                                $value = $time->format('m');
                                echo "<option value='$value'>$monthName</option>";
                            }
                        ?>
                     </select>
                  </div>
                  <div class="form-group col-md-4">
                     <select class="form-control tribut" id="issue_day" required disabled >
                        <option hidden> Jour </option>
                     </select>
                  </div>
                  <div class="form-group col-md-12">
                     <select class="form-control tribut" id="issued_country">
                        <option hidden>Pays de émission</option>
                        @foreach($countries as $key=> $c)
                        <option value="{{ $c }}">{{ $c }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               @if(count($add_on_features) != '0')
               <div class="row rosy" id="add_on_services">
                  <div class="col-md-12">
                     <h6 class="title">Addon Features</h6>
                  </div>
                     @foreach($add_on_features as $af)
                     <div class="form-group col-md-4">
                        <label for="scales"> <input type="checkbox" name="option_name[]" id="{{$af->master_data_id}}check" value="{{ $af->master_value }} - {{ $af->addon_value }}" />
                        {{ ucfirst($af->master_value) }}&nbsp/&nbsp<span style="font-weight: 800;">{{$af->addon_value}}</span>
                        </label>
                     </div>
                     @endforeach        
                  </div>
               @endif
               <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        id="payment-form">
                   <div class="row rosy">
                      <div class="col-md-12">
                         <h6 class="title">INFORMATIONS DE PAIEMENT DU CONDUCTEUR</h6>
                         <p class="sincerim">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                         <img src="{{ asset('public/assets/home_screen/trenty/maxresdefault.png') }}" class="tookim">
                      </div>
                   </div>
                   <div class="row rosy">
                      <div class="form-group col-md-12">
                         <div class="form-group has-float-label">
                            <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                            <input type="text" class="form-control fhome" placeholder="Nom du titulaire" id="name_on_card" onfocus="this.placeholder = ''" size='4' required autofocus >
                            <label for="fullname">Nom du titulaire</label>
                         </div>
                      </div>
                      <div class="form-group col-md-12">
                         <div class="form-group has-float-label">
                            <input type="text" class="form-control fhome card-number" size='20' autocomplete='off' placeholder="Numéro de carte" id="card_number" onfocus="this.placeholder = ''" required autofocus >
                            <label for="fullname">Numéro de carte</label>
                         </div>
                      </div>
                      <div class="form-group col-md-4">
                         <div class="form-group has-float-label">
                            <input type="text" autocomplete='off' class="form-control fhome card-cvc" size='4' placeholder="ex. 311" id="cvc" onfocus="this.placeholder = ''" required autofocus >
                            <label for="fullname">CVC</label>
                         </div>
                      </div>
                      <div class="form-group col-md-4">
                         <div class="form-group has-float-label">
                            <input type="text" size='2' class="form-control fhome card-expiry-month" placeholder="MM" id="expiry_month" onfocus="this.placeholder = ''" required autofocus >
                            <label for="fullname">Mois d'expiration</label>
                         </div>
                      </div>
                      <div class="form-group col-md-4">
                         <div class="form-group has-float-label">
                            <input type="text" class="form-control fhome card-expiry-year" placeholder="YYYY" size='4' id="expiry_year" onfocus="this.placeholder = ''" required autofocus >
                            <label for="fullname">Année d'expiration</label>
                         </div>
                      </div>
                      <p class="simple-reg-terms">
                         <label>
                         <span class="checkbox">
                             <input title="Please tick" name="accept_terms" type="checkbox" class="required" id="accept_terms_condn" />
                         </span>
                         <span title="Please tick">Oui, j'ai lu ies</span>
                         <a target="_blank" class="formlink" href="" title="Opens in a new tab">inforamtion </a> de &amp; <a target="_blank" href="" title="Opens in a new tab">location  &amp; conditions</a> et les termes et conditions generates et je ies accepte.
                         </label>
                      </p>
                        <div class='form-row row'>
                           <div class='col-md-12 error form-group hide'>
                              <div class='alert-danger alert'>Please correct the errors and try again. </div>
                           </div>
                        </div>
                   </div>
                   <div class="row backgrey">
                      <div class="col-md-10">
                         <h4>VOTRE PRIX TOTAL</h4>
                         <h5>Periode de location</h5>
                      </div>
                      <div class="col-md-2">
                          <input type="hidden" value="" name="input_dynamic_rent_value" id="input_dynamic_rent_value"/>
                          <input type="hidden" name="customer_id" value="{{ $customer_id }}" id="customer_id" />
                         <span class="fifty dynamic_rent_value"><i class="fa fa-euro"></i> </span>
                      </div>
                   </div>
               </form>
                    <div class="text-center">
                      <button type="button" class="envoy" id="submit_reservation">JE RE'SERVE MAINTENANT</button>
                    </div>
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
<script src="{{ asset('theme_files/assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('theme_files/external_files/js/jquery-confirm.min.js') }}"></script>
    <!-- plugin js -->
    <script src="{{ asset('theme_files/plugins/timepicker/bootstrap-timepicker.js') }}"></script>
    <script src="{{ asset('theme_files/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('theme_files/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('theme_files/plugins/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ asset('theme_files/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- Init js -->
    <script src="{{ asset('theme_files/assets/pages/jquery.form-pickers.init.js') }}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function () {
            var vehicle_id = $('#vehicle_id').val();
            var tempcsrf = $('#csrf_token').val();
            $.ajax({
                 type: 'POST',
                 url: '{{ url('get_vehicle_available_dates') }}',
                 dataType: 'json',
                 data: {
                       vehicle_id:vehicle_id,
                     _token:tempcsrf
                     },
                       beforeSend: function () {
                           $('#from_datepicker').datepicker("destroy");
                           $('#to_datepicker').datepicker("destroy");
                       },
                       success: function (data) {
                            var enableDates = data['available_dates'];
                            var enableDatesArray=[];
                            var sortDatesArry = [];
                            for (var i = 0; i < enableDates.length; i++) {
                                var dt = enableDates[i].replace('-', '/').replace('-', '/');  
                                var dd, mm, yyy;  
                                if (parseInt(dt.split('/')[0]) <= 9 || parseInt(dt.split('/')[1]) <= 9) {
                                    dd = parseInt(dt.split('/')[0]);  
                                    mm = parseInt(dt.split('/')[1]);  
                                    yyy = dt.split('/')[2];  
                                    enableDatesArray.push(dd + '/' + mm + '/' + yyy);  
                                    sortDatesArry.push(new Date(yyy + '/' + dt.split('/')[1] + '/' + dt.split('/')[0]));  
                                }  
                                else {  
                                    enableDatesArray.push(dt);  
                                    sortDatesArry.push(new Date(dt.split('/')[2] + '/' + dt.split('/')[1] + '/' + dt.split('/')[0] + '/'));  
                                }  
                            }
                            var maxDt = new Date(Math.max.apply(null, sortDatesArry));  
                            var minDt = new Date(Math.min.apply(null, sortDatesArry));
                            $('#from_datepicker').datepicker({
                                format: "dd-mm-yyyy",  
                                autoclose: true,  
                                startDate: minDt,  
                                endDate: maxDt,  
                                beforeShowDay: function (date) {
                                    var dt_ddmmyyyy = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
                                    return (enableDatesArray.indexOf(dt_ddmmyyyy) != -1);
                                }
                            });
                            $('#to_datepicker').datepicker({
                                format: "dd-mm-yyyy",  
                                autoclose: true,  
                                startDate: minDt,  
                                endDate: maxDt,  
                                beforeShowDay: function (date) {
                                    var dt_ddmmyyyy = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
                                    return (enableDatesArray.indexOf(dt_ddmmyyyy) != -1);
                                }
                            });
                       }
            });
        },1000);
    });
    
    $('#from_datepicker').change(function(){
        var date = $(this).val();
        $('#to_datepicker').datepicker('setStartDate', date);
    });
    $('#to_datepicker').change(function(){
        var vehicle_id = $('#vehicle_id').val();
        var from_date = $('#from_datepicker').val();
        var to_date = $(this).val();
        var tempcsrf = $('#csrf_token').val();
        $.ajax({
                 type: 'POST',
                 url: '{{ url('get_vehicle_rent_for_date') }}',
                 dataType: 'json',
                 data: {
                        vehicle_id:vehicle_id,
                        from_date:from_date,
                        to_date:to_date,
                        _token:tempcsrf
                     },
                       beforeSend: function () {
                       },
                       success: function (data) {
                           $(".dynamic_rent_value").html(data['vehicle_rent']);
                           $("#input_dynamic_rent_value").val(data['vehicle_rent']);
                       }
            });
    });
    
    $("#submit_reservation").click(function(){
        var customer_first_name = $("#customer_first_name").val();
        var customer_last_name = $("#customer_last_name").val();
        var customer_email = $("#customer_email").val();
        var customer_country_code = $("#customer_country_code").val();
        var customer_phone = $("#customer_phone").val();
        var byear = $("#byear").val();
        var bmonth = $("#bmonth").val();
        var bday = $("#bday").val();
        if((byear == '')||(bmonth == '')||(bday == '')){
            var customer_dob = '';
        }else{
            var customer_dob = $("#byear").val()+'-'+$("#bmonth").val()+'-'+$("#bday").val();
        }
        
        var customer_door_no = $("#customer_door_no").val();
        var customer_appartment = $("#customer_appartment").val();
        var street_name = $("#customer_street").val();
        var postal_code = $("#postal_code").val();
        var customer_city = $("#customer_city").val();
        var customer_country = $("#customer_country").val();
        
        var customer_source = $("#customer_source").val();
        var customer_destination = $("#customer_destination").val();
        var from_datepicker = $("#from_datepicker").val();
        var to_datepicker = $("#to_datepicker").val();
        var license_number = $("#license_number").val();
        var issue_year = $("#issue_year").val();
        var issue_month = $("#issue_month").val();
        var issue_day = $("#issue_day").val();
        if((issue_year == '')||(issue_month == '')||(issue_day == '')){
            var customer_license_issue_date = '';
        }else{
            var customer_license_issue_date = $("#issue_year").val()+'-'+$("#issue_month").val()+'-'+$("#issue_day").val();
        }
        var issued_country = $("#issued_country").val();
        var name_on_card = $("#name_on_card").val();
        var card_number = $("#card_number").val();
        var cvc = $("#cvc").val();
        var expiry_month = $("#expiry_month").val();
        var expiry_year = $("#expiry_year").val();
        
        var addon_values = [];
            $("#add_on_services input[type='checkbox']").each(function(){
                if ($(this).is(':checked')){ 
                    var option_name1 = $(this).val();
                  addon_values.push(option_name1);
                }
            });
        
        var vehicle_id = $('#vehicle_id').val();
        var partner_id = $('#partner_id').val();
        var customer_id = $('#customer_id').val();
        var input_dynamic_rent_value = $('#input_dynamic_rent_value').val();
        
        var tempcsrf = $('#csrf_token').val();
        if((customer_first_name =='')||(customer_last_name =='')||(customer_email =='')
            ||(customer_country_code =='')||(customer_phone =='')||(customer_dob =='')
            ||(street_name =='')||(postal_code =='')||(customer_city =='')||(customer_country =='')
            ||(customer_source =='')||(customer_destination =='')||(from_datepicker =='')||(to_datepicker =='')){
              $.alert({
                 title: 'Alerte!',
                 content: "Veuillez remplir tous les champs obligatoires !!!",
             });
        }else{
            if($("#accept_terms_condn").prop("checked") == true){
            if((name_on_card =='')||(card_number =='')||(cvc =='')||(expiry_month =='')||(expiry_year =='')){
              $.ajax({
                    type: 'POST',
                    url:'{{ url('new_reservation_form_detail') }}',
                    dataType: "json",
                    data: {
                            vehicle_id:vehicle_id,
                            customer_first_name:customer_first_name,
                            customer_last_name:customer_last_name,
                            customer_email:customer_email,
                            customer_country_code:customer_country_code,
                            customer_phone:customer_phone,
                            customer_dob:customer_dob,
                            customer_door_no:customer_door_no,
                            customer_appartment:customer_appartment,
                            street_name:street_name,
                            postal_code:postal_code,
                            customer_city:customer_city,
                            customer_country:customer_country,
                            customer_source:customer_source,
                            customer_destination:customer_destination,
                            from_datepicker:from_datepicker,
                            to_datepicker:to_datepicker,
                            license_number:license_number,
                            customer_license_issue_date:customer_license_issue_date,
                            issued_country:issued_country,
                            name_on_card:name_on_card,
                            card_number:card_number,
                            cvc:cvc,
                            expiry_month:expiry_month,
                            expiry_year:expiry_year,
                            addon_values:addon_values,
                            partner_id:partner_id,
                            customer_id:customer_id,
                            input_dynamic_rent_value:input_dynamic_rent_value,
                            _token:tempcsrf
                    },
                    success:function(data){
                        if(data == 'success'){
                            $.confirm({
                              title: 'Alerte!',
                              content: 'Réservation soumise !!!',
                              buttons: {
                                  Ok: function () {
                                //   location.reload();
                                    window.location.href = "/reservation";
                                  },
                              }
                            });
                        }
                    }
                });
            }else{
                $.ajax({
                    type: 'POST',
                    url:'{{ url('new_reservation_form_detail') }}',
                    dataType: "json",
                    data: {
                            vehicle_id:vehicle_id,
                            customer_first_name:customer_first_name,
                            customer_last_name:customer_last_name,
                            customer_email:customer_email,
                            customer_country_code:customer_country_code,
                            customer_phone:customer_phone,
                            customer_dob:customer_dob,
                            customer_door_no:customer_door_no,
                            customer_appartment:customer_appartment,
                            street_name:street_name,
                            postal_code:postal_code,
                            customer_city:customer_city,
                            customer_country:customer_country,
                            customer_source:customer_source,
                            customer_destination:customer_destination,
                            from_datepicker:from_datepicker,
                            to_datepicker:to_datepicker,
                            license_number:license_number,
                            customer_license_issue_date:customer_license_issue_date,
                            issued_country:issued_country,
                            name_on_card:name_on_card,
                            card_number:card_number,
                            cvc:cvc,
                            expiry_month:expiry_month,
                            expiry_year:expiry_year,
                            addon_values:addon_values,
                            partner_id:partner_id,
                            customer_id:customer_id,
                            input_dynamic_rent_value:input_dynamic_rent_value,
                            _token:tempcsrf
                    },
                    success:function(data){
                        $("#payment-form").submit();
                        if(data == 'success'){
                            $.confirm({
                              title: 'Alerte!',
                              content: 'Réservation soumise !!!',
                              buttons: {
                                  Ok: function () {
                                //   location.reload();
                                    window.location.href = "/reservation";
                                  },
                              }
                            });
                        }
                    }
                });
            }
        }else{
            $.alert({
                 title: 'Alerte!',
                 content: "Please click terms and conditions checked !!!",
            });    
        }   
        }
    });
    
    
    
      $(function() {
          var $form         = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
          var $form         = $(".require-validation"),
              inputSelector = ['input[type=email]', 'input[type=password]',
                               'input[type=text]', 'input[type=file]',
                               'textarea'].join(', '),
              $inputs       = $form.find('.required').find(inputSelector),
              $errorMessage = $form.find('div.error'),
              valid         = true;
              $errorMessage.addClass('hide');
       
              $('.has-error').removeClass('has-error');
          $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
              $input.parent().addClass('has-error');
              $errorMessage.removeClass('hide');
              e.preventDefault();
            }
          });
        
          if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
              number: $('.card-number').val(),
              cvc: $('.card-cvc').val(),
              exp_month: $('.card-expiry-month').val(),
              exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
          }
        
        });
        
        function stripeResponseHandler(status, response) {
              if (response.error) {
                  $('.error')
                      .removeClass('hide')
                      .find('.alert')
                      .text(response.error.message);
              } else {
                  // token contains id, last4, and card type
                  var token = response['id'];
                  // insert the token into the form so it gets submitted to the server
                  $form.find('input[type=text]').empty();
                  $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                  $form.get(0).submit();
              }
          }
        
      });
   

    $('#return_date').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
    });

</script>
<script>
   function daysInMonth(month, year) {
     return new Date(year, month, 0).getDate();
   }
   $('#byear, #bmonth').change(function() {
     if ($('#byear').val().length > 0 && $('#bmonth').val().length > 0) {
       $('#bday').prop('disabled', false);
       $('#bday').find('option').remove();
       var daysInSelectedMonth = daysInMonth($('#bmonth').val(), $('#byear').val());
       for (var i = 1; i <= daysInSelectedMonth; i++) {
            if(i.toString().length == 2){
                $('#bday').append($("<option></option>").attr("value", i).text(i));
            }else{
                $('#bday').append($("<option></option>").attr("value", '0'+i).text('0'+i));
            }
       }
     } else {
       $('#bday').prop('disabled', true);
     }
   });
   
   $('#issue_year, #issue_month').change(function() {
     if ($('#issue_year').val().length > 0 && $('#issue_month').val().length > 0) {
       $('#issue_day').prop('disabled', false);
       $('#issue_day').find('option').remove();
       var daysInSelectedMonth = daysInMonth($('#issue_month').val(), $('#issue_year').val());
       for (var i = 1; i <= daysInSelectedMonth; i++) {
           if(i.toString().length == 2){
            $('#issue_day').append($("<option></option>").attr("value", i).text(i));
           }else{
            $('#issue_day').append($("<option></option>").attr("value", '0'+i).text('0'+i));
           }
       }
     } else {
       $('#issue_day').prop('disabled', true);
     }
   });
   
   
   
   $("#search_vehicle_list").click(function(){
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      var tempcsrf = $('#csrf_token').val();
      $.ajax({
         type: 'POST',
         url:"get_searched_vehicle",
         dataType: "json",
         data: {
           from_date:from_date,
           to_date:to_date,
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
        //   document.getElementById('contents').style.visibility="hidden";
        $("#contents").hide();
          } else if (state == 'complete') {
          setTimeout(function(){
           document.getElementById('interactive');
        //   document.getElementById('load').style.visibility="hidden";
        $("#load").hide();
        //   document.getElementById('contents').style.visibility="visible";
        $("#contents").show();
          },1000);
          }
      }      
    $(window).on('load', function() { // makes sure the whole site is loaded 
    $('#status').fadeOut(); // will first fade out the loading animation 
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
        $('body').delay(350).css({'overflow':'visible'});
    });   
   document.getElementById('output').innerHTML = location.search;
   $(".chosen-select").chosen();     
</script>
@endsection
