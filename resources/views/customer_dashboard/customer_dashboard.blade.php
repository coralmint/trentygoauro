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
   button#submit_contact {
   padding: 10px 30px !important;
   }
   p.loremipsi {
   margin-top: 0px;
   color: #fff;
   padding: 0px;
   }
   .section-title p {
   margin-bottom: 0;
   color: #fff !important;
   font-size: 14px;
   margin-top: 4%;
   padding: 25% 15%;
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
   .nav-pills-custom .nav-link {
   color: #aaa;
   background: #fff;
   position: relative;
   }
   .nav-pills-custom .nav-link.active {
   color: #45b649;
   background: #fff;
   }
   .form-control{
       font-size:12px;
   }
   /* Add indicator arrow for the active tab */
   @media (min-width: 992px) {
   .nav-pills-custom .nav-link::before {
   content: '';
   display: block;
   border-top: 8px solid transparent;
   border-left: 10px solid #fff;
   border-bottom: 8px solid transparent;
   position: absolute;
   top: 50%;
   right: -10px;
   transform: translateY(-50%);
   opacity: 0;
   }
   }
   .nav-pills-custom .nav-link.active::before {
   opacity: 1;
   }
   .fixed-top{
   box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
   }
   .py-5{
   padding-top: 1rem!important;
   }
   .figi {
   text-align: center;
   font-size: 18px;
   }
   .figi1{
   text-align: center;
   font-size: 18px;
   }
   .col-md-3.shadow {
   padding-left:0px; 
   padding-right:0px;
   }
   img.logopng {
   padding: 10% 5%;
   width: 70%;
   margin: 0 auto;
   text-align: center;
   display: block;
   }
   .gms {
   font-weight: 200 !important;
   color: #616161;
   }
   .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
   color: #14b3b9 !important;
   background-color:#fff  !important;
   }
   .p-3 {
   border-bottom: 1px solid #ddd;
   }
   img.chrmp {
   width: 100%;
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
   .clickher{
   text-align:right;
   color:#444;
   }
   .has-float-label .form-control:placeholder-shown:not(:focus)::-webkit-input-placeholder {
   opacity: 0
   }
   .has-float-label .form-control:placeholder-shown:not(:focus)+label {
   font-size: 150%;
   opacity: .5;
   top: .8em
   }
   .py-5 {
   padding-top: 1rem!important;
   }
   .col-md-12.user {
   padding: 10px;
   color: #24366e;
   }
   .powerof{
   float:right;
   }
   .powerof{
   width:100%;
   float:right;
   }
   .nav-menu > ul > li {
   position: relative;
   white-space: nowrap;
   float: right !important;
   }
   nav.nav-menu.d-none.d-lg-block {
   width: 100%;
   }
   .nav-menu a{
   padding:10px !important;
   }
   input.search {
   border: 1px solid #ddd;
   margin: 10px 0px;
   padding: 3px 20px;
   border-radius: 10px;
   margin-right: 16px;
   font-size: 12px !important;
   }
   section.py-5.header {
   padding-top: 8% !important;
   }
   h4.font-italic.mb-4.hist {
   text-align: center;
   font-size: 20px;
   color: #24366e;
   font-weight: 600;
   /* border-bottom: 1px solid #000; */
   margin-bottom: 0px !important;
   }
   .usf {
   border-bottom: 3px solid #14b3b9;
   width: 10%;
   margin: 0 auto;
   }
   p.rec {
   text-align: center;
   padding-top: 10px;
   font-size: 14px;
   }
   h4.tdr {
   color: #14b3b9;
   font-size: 18px;
   font-weight:bold;
   }
   .col-md-12.shadow.hist {
   padding: 15px;
   margin-top:2%;
   }
   i.fa.fa-circle {
   color: green;
   /* padding: 0px 10px; */
   }
   span.dim {
   font-size: 14px;
   padding: 0px 10px;
   color: #444;
   }
   i.fa.fa-check-circle {
   font-size: 40px !important;
   color: green;
   font-size: 14px;
   }
   i.fa.fa-window-close {
   font-size: 40px;
   color: #a51010;
   }
   .col-md-12.distan {
   font-size: 14px;
   color: #444;
   }
   span.four {
   padding: 10px 10px 0px 0px;
   }
   span.three {
   padding: 10px 10px 0px 10px;
   }
   span.travel{
   padding: 10px 10px 0px 10px;
   }
   .col-md-12.distan {
   font-size: 14px;
   color: #444;
   }
   .pert {
   padding: 0px 10px 0px 0px;
   color: #FF9800;
   }
   p.pond {
   margin-bottom: 10px;
   }
   .form-control{
       font-size:12px !important;
   }
   button.envoy {
    padding: 10px 16px !important;
    font-size: 14px;
    background-color: #14b3b9;
    color: #fff;
    border: none;
    border-radius: 10px;
}
.viewicon{
    border: 2px solid #008000;
    padding: 5px;
    background-color: #008000;
    border-radius: 15px;
    color: #fff;
}
</style>
<div id="preloader">
   <div id="status">&nbsp;</div>
</div>
<header id="header" class="fixed-top">
   <div class="container-fluid d-flex">
      <div class="logo mr-auto">
         <h1 class="text-light"><a href="#hero"><img src="{{ asset('public/assets/home_screen/trenty/Logo.png') }}"></a></h1>
         <!-- Uncomment below if you prefer to use an image logo -->
         <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      <nav class="nav-menu d-none d-lg-block">
         <ul>
            <li class="active"><a href="#services">Se Connecter </a></li>
            <li><a href="#contact1">Devenir loueur</a>
            </li>
            <li><a href="#features">Des Questions?</a></li>
            <li><a href="#contact">Actualities</a></li>
            <!-- <li><a href="portal">Login</a></li>-->
         </ul>
      </nav>
      <!-- .nav-menu -->
   </div>
</header>
<!-- End Header -->
<!-- ======= Hero Section ======= -->
<section class="py-5 header">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-3 shadow">
            <!-- Tabs nav -->
            <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
               <a class="nav-link p-3 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
               <i class="fa fa-user-circle-o mr-2"></i>
               <span class="font-weight-bold small text-uppercase">Personal information</span></a>
               <a class="nav-link  p-3" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
               <i class="fa fa-calendar-minus-o mr-2"></i>
               <span class="font-weight-bold small text-uppercase">Bookings</span></a>
               <a class="nav-link p-3  " id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
               <i class="fa fa-star mr-2"></i>
               <span class="font-weight-bold small text-uppercase">Reservation Details</span></a>
               <a class="nav-link p-3" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
               <i class="fa fa-check mr-2"></i>
               <span class="font-weight-bold small text-uppercase">Billing Details</span></a>
            </div>
         </div>
         <div class="col-md-9">
            <!-- Tabs content -->
            <div class="tab-content" id="v-pills-tabContent">
               <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <div class="row">
                     <div class="col-md-3">
                        <div class="figi shadow">
                           <img src="https://www.chrmp.com/frontend/img/home/hero.png" class="chrmp ">
                           <div class="col-md-12 user">
                              <i class="fa fa-user-circle-o mr-2 wel"></i>
                              <span class="font-weight-bold small wel">Welcome User </span>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-9">
                        <div class="form-row formtab">
                           <div class="form-group col-md-4">
                              <div class="form-group has-float-label">
                                 <input type="text" class="form-control" id="first_name" value="{{ $customer_info[0]->customer_name }}" onfocus="this.placeholder = ''" required disabled autofocus >
                                 <label for="vehicle Model">First Name</label>
                              </div>
                           </div>
                           <div class="form-group col-md-4">
                              <div class="form-group has-float-label">
                                 <input type="text" class="form-control" id="last_name" value="{{ $customer_info[0]->customer_name }}" onfocus="this.placeholder = ''" required disabled autofocus >
                                 <label for="vehicle Model">Last Name</label>
                              </div>
                           </div>
                           <div class="form-group col-md-4">
                              <div class="form-group has-float-label">
                                 <input type="text" class="form-control" id="phone" value="{{ $customer_info[0]->customer_phone }}" onfocus="this.placeholder = ''" required disabled autofocus >
                                 <label for="Vehicle Color">Mobile Number</label>
                              </div>
                           </div>
                           <div class="form-group col-md-4">
                              <div class="form-group has-float-label">
                                 <input type="text" class="form-control" id="email" value="{{ $customer_info[0]->customer_email }}" onfocus="this.placeholder = ''" required disabled autofocus >
                                 <label for="Vehicle Color">Email Id</label>
                              </div>
                           </div>
                           <div class="form-group col-md-4">
                              <div class="form-group has-float-label">
                                 <div class="input-group">
                                    <input type="text" class="form-control" id="dob" value="{{ $cus_reserv_details[0]->dob }}" onfocus="this.placeholder = ''" required autofocus >
                                    <div class="input-group-append">
                                       <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                       <label for="Vehicle Color">Date of Birth</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group col-md-4">
                              <div class="form-group has-float-label">
                                 <input type="text" class="form-control" id="door_no" value="{{ $cus_reserv_details[0]->door_no }}" onfocus="this.placeholder = ''" required autofocus >
                                 <label for="Vehicle Color">Door No</label>
                              </div>
                           </div>
                           <div class="form-group col-md-4">
                              <div class="form-group has-float-label">
                                 <input type="text" class="form-control" id="appartment_name" value="{{ $cus_reserv_details[0]->appartment_name }}" onfocus="this.placeholder = ''" required autofocus >
                                 <label for="Vehicle Color">Appartment Name</label>
                              </div>
                           </div>
                           <div class="form-group col-md-4">
                              <div class="form-group has-float-label">
                                 <input type="text" class="form-control" id="street_name" value="{{ $cus_reserv_details[0]->street_name }}" onfocus="this.placeholder = ''" required autofocus >
                                 <label for="Vehicle Color">Street Name</label>
                              </div>
                           </div>
                           <div class="form-group col-md-4">
                              <div class="form-group has-float-label">
                                 <input type="text" class="form-control" id="city" value="{{ $cus_reserv_details[0]->city }}" onfocus="this.placeholder = ''" required autofocus >
                                 <label for="Vehicle Color">City</label>
                              </div>
                           </div>
                           <div class="form-group col-md-4">
                              <div class="form-group has-float-label">
                                 <input type="text" class="form-control" id="pincode" value="{{ $cus_reserv_details[0]->pincode }}" onfocus="this.placeholder = ''" required autofocus >
                                 <label for="Vehicle Color">Pincode</label>
                              </div>
                           </div>
                           <div class="form-group col-md-4">
                              <div class="form-group has-float-label">
                                 <input type="text" class="form-control" id="country_code" value="{{ $cus_reserv_details[0]->country_code }}" onfocus="this.placeholder = ''" required autofocus >
                                 <label for="Vehicle Color">Country code</label>
                              </div>
                           </div>
                           <div class="form-group col-md-4">
                              <div class="form-group has-float-label">
                                 <input type="text" class="form-control"  value="{{ $cus_reserv_details[0]->country }}" onfocus="this.placeholder = ''" required autofocus >
                                 <label for="Vehicle Color">Country</label>
                              </div>
                           </div>
                        </div>
                        <div class="form-row formtab">
                           <div class="form-group col-md-4">
                              <div class="form-group has-float-label">
                                 <input type="text" class="form-control" id="license_number"  value="{{ $cus_reserv_details[0]->license_number }}" onfocus="this.placeholder = ''"  required autofocus >
                                 <label for="Location">License number</label>
                              </div>
                           </div>
                           <div class="form-group col-md-4">
                              <div class="form-group has-float-label">
                                 <div class="input-group">
                                    <input type="text" class="form-control" id="license_issue_date" value="{{ $cus_reserv_details[0]->license_issue_date }}" onfocus="this.placeholder = ''" required autofocus >
                                    <div class="input-group-append">
                                       <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                       <label for="Vehicle Color">License issued date</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group col-md-4">
                              <div class="form-group has-float-label">
                                 <input type="text" class="form-control"  value="{{ $cus_reserv_details[0]->license_issued_country }}" onfocus="this.placeholder = ''"  required autofocus >
                                 <label for="Location">License country</label>
                              </div>
                              <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                              <input type="hidden" class="form-control" id="reservation_id"  value="{{ $cus_reserv_details[0]->reservation_id }}" onfocus="this.placeholder = ''"  required autofocus >
                              <input type="hidden" class="form-control" id="customer_id" value="{{ $cus_reserv_details[0]->customer_id }}" onfocus="this.placeholder = ''" disabled required autofocus >
                              <button type="submit" class="envoy" id="update_cust_details"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Update</font></font></button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                  <h4 class="font-italic mb-4 hist">History of User</h4>
                  <p class="rec">Get recent history of user ride {{ $customer_info[0]->customer_email }} </p>
                  <div class="usf"></div>
                  <div class="row">
                      @foreach($cus_reserv_details as $cd)
                     <div class="col-md-12 shadow hist">
                        <h4 class="tdr">{{ $cd->reserve_unique_id }}</h4>
                        <div class="row">
                           <div class="col-md-10">
                              <p class="pond"><i class="fa fa-clock-o pert"></i><span class="dim">Start Date :{{ $cd->start_date }}</span><i class="fa fa-clock-o pert"></i><span class="dim">End Date:{{ $cd->return_date }}</span></p>
                              <div class="row">
                                 <div class="col-md-12 distan">
                                    <span class="four"><i class="fa fa-rupee pert"></i>Reservation Amount : {{ $cd->reservation_amount }}</span>
                                    <span class="four"><i class="fa fa-rupee pert"></i>Paid Amount : {{ $cd->paid_amount }}</span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="col-md-12 cirl">
                                 <a href="{{ url('customer_reservation',Crypt::encryptString($cd->reservation_id)) }}" class="clickher">
                                 <i class="fa fa-eye viewicon "> View</i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
               <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="form-row formtab">
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" value="" disabled id="reservation_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                 <label for="Vehicle Color">Reservation Date</label>
                              </div>
                           </div>
                           <!-- input-group -->
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <input type="hidden" value="" id="vehicle_id" />
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" value="" id="reservation_start_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                 <label for="Vehicle Color">Booked Date From</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" value="" id="reservation_return_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                 <label for="Vehicle Color">Booked Date To</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <select class="form-control"  class="form-control" id="pick_up_location_id" placeholder="" onfocus="this.placeholder = ''" disabled required autofocus>
                            
                              <option value=""></option></option>
                            
                           </select>
                           <label for="status">Pick up location</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <select class="form-control"  class="form-control" id="drop_location_id" placeholder="" onfocus="this.placeholder = ''" disabled required autofocus>
                               
                              <option value=""></option></option>
                            
                           </select>
                           <label for="status">Drop up location</label>
                        </div>
                     </div>
                  
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                        <div class="input-group">
                            <input type="text" class="form-control" value="" onfocus="this.placeholder = ''" disabled required autofocus >
                            <div class="input-group-append">
                                
                                 <label for="Vehicle Color">Vehicle Name</label>
                            </div>
                        </div>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" id="dynamic_rent_value" class="form-control" value="" onfocus="this.placeholder = ''" disabled autofocus >
                           <label for="Vehicle Color">Vehicle Rent</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="baby_seat" value="" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Baby Seat Counting</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="adult_seat" value="" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Adult Seat Counting</label>
                        </div>
                     </div>
                     <!--<div class="form-group col-md-4">-->
                     <!--   <div class="form-group has-float-label">-->
                     <!--      <select class="form-control"  class="form-control" id="status" placeholder="" onfocus="this.placeholder = ''" required autofocus>-->
                     <!--         <option value="" hidden>Pending</option>-->
                     <!--         <option value="">Cancelled</option>-->
                     <!--         <option value="1">Reserved</option>-->
                     <!--         <option value="2">Trip Started</option>-->
                     <!--         <option value="2">Trip Aborted</option>-->
                     <!--      </select>-->
                     <!--      <label for="fullname">Reservation Status</label>--> 
                     <!--   </div>-->
                     <!--</div>-->
                    
                  </div>
                 
               </div>
               <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                  <div class="form-row formtab">
                    
                    <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                        <div class="input-group">
                            <input type="text" class="form-control" value="" onfocus="this.placeholder = ''" disabled required autofocus >
                            <div class="input-group-append">
                                
                                 <label for="Vehicle Color">Bank Name</label>
                            </div>
                        </div>
                        </div>
                     </div>
                      <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                        <div class="input-group">
                            <input type="text" class="form-control" value="" onfocus="this.placeholder = ''" disabled required autofocus >
                            <div class="input-group-append">
                                
                                 <label for="Vehicle Color">Account No</label>
                            </div>
                        </div>
                        </div>
                     </div>
                    
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                           <select class="form-control"  class="form-control" id="pick_up_location_id" placeholder="" onfocus="this.placeholder = ''" disabled required autofocus>
                            
                              <option value=""></option></option>
                            
                           </select>
                           <label for="status">Payment Method</label>
                        </div>
                     </div>
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                           <select class="form-control"  class="form-control" id="drop_location_id" placeholder="" onfocus="this.placeholder = ''" disabled required autofocus>
                               
                              <option value=""></option></option>
                            
                           </select>
                           <label for="status">Payment Status</label>
                        </div>
                     </div>
                  
                    
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
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
<script type="text/javascript" src="{{ URL::asset('theme_files/external_files/js/jquery-confirm.min.js') }}"></script>
<script>
   $("#update_cust_details").click(function(){
        var reservation_id = $('#reservation_id').val();
        var customer_id = $('#customer_id').val();
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
   		var phone = $('#phone').val();
   		var email = $('#email').val();
   		var dob = $('#dob').val();
   		var door_no = $('#door_no').val();
   		var appartment_name = $('#appartment_name').val();
   		var street_name = $('#street_name').val();
   		var city = $('#city').val();
   		var state = $('#state').val();
   		var pincode = $('#pincode').val();
   		var country_code = $('#country_code').val();
   		var license_number = $('#license_number').val();
   		var license_issue_date = $('#license_issue_date').val();
           var tempcsrf = $('#csrf_token').val();
           if((email =='')){
               $.alert({
   		        title: 'Alerte!',
   		        content: "Veuillez remplir tous les champs obligatoires !!!",
   		    });
           }
           else{
               $.ajax({
             type: 'POST',
             url: '{{ url('update_customer_details') }}',
             dataType: 'json',
             data: {
                 reservation_id:reservation_id,
                 customer_id:customer_id,
                 first_name:first_name,
                 last_name:last_name,
       			  phone:phone,
       			  email:email,
       			  dob:dob,
       			  door_no:door_no,
       			  appartment_name:appartment_name,
       			  street_name:street_name,
       			  city:city,
       			  state:state,
       			  pincode:pincode,
       			  country_code:country_code,
       			  license_number:license_number,
       			  license_issue_date:license_issue_date,
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
   })
   
   document.getElementById('output').innerHTML = location.search;
   $(".chosen-select").chosen();
     
</script>
@endsection