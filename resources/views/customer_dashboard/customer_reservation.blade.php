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
   img{ max-width:100%;}
   .inbox_people {
   background: #f8f8f8 none repeat scroll 0 0;
   float: left;
   overflow: hidden;
   width: 40%; border-right:1px solid #c4c4c4;
   }
   .inbox_msg {
   border: 1px solid #c4c4c4;
   clear: both;
   overflow: hidden;
   }
   .top_spac{ margin: 20px 0 0;}
   .recent_heading {float: left; width:40%;}
   .srch_bar {
   display: inline-block;
   text-align: right;
   width: 60%; padding:
   }
   .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}
   .recent_heading h4 {
   color: #05728f;
   font-size: 21px;
   margin: auto;
   }
   .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
   .srch_bar .input-group-addon button {
   background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
   border: medium none;
   padding: 0;
   color: #707070;
   font-size: 18px;
   }
   .srch_bar .input-group-addon { margin: 0 0 0 -27px;}
   .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
   .chat_ib h5 span{ font-size:13px; float:right;}
   .chat_ib p{ font-size:14px; color:#989898; margin:auto}
   .chat_img {
   float: left;
   width: 11%;
   }
   .chat_ib {
   float: left;
   padding: 0 0 0 15px;
   width: 88%;
   }
   .chat_people{ overflow:hidden; clear:both;}
   .chat_list {
   border-bottom: 1px solid #c4c4c4;
   margin: 0;
   padding: 18px 16px 10px;
   }
   .inbox_chat { height: 550px; overflow-y: scroll;}
   .active_chat{ background:#ebebeb;}
   .incoming_msg_img {
   display: inline-block;
   width: 6%;
   }
   .received_msg {
   display: inline-block;
   padding: 0 0 0 10px;
   vertical-align: top;
   width: 92%;
   }
   .received_withd_msg p {
   background: #ebebeb none repeat scroll 0 0;
   border-radius: 3px;
   color: #646464;
   font-size: 14px;
   margin: 0;
   padding: 5px 10px 5px 12px;
   width: 100%;
   }
   .time_date {
   color: #747474;
   display: block;
   font-size: 12px;
   margin: 8px 0 0;
   }
   .received_withd_msg { width: 57%;}
   .mesgs {
   float: left;
   padding: 30px 15px 0 25px;
   width: 60%;
   }
   .sent_msg p {
   background: #05728f none repeat scroll 0 0;
   border-radius: 3px;
   font-size: 14px;
   margin: 0; color:#fff;
   padding: 5px 10px 5px 12px;
   width:100%;
   }
   .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
   .sent_msg {
   float: right;
   width: 46%;
   }
   .input_msg_write input {
   background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
   border: medium none;
   color: #4c4c4c;
   font-size: 15px;
   min-height: 48px;
   width: 100%;
   }
   .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
   .msg_send_btn {
   background: #05728f none repeat scroll 0 0;
   border: medium none;
   border-radius: 50%;
   color: #fff;
   cursor: pointer;
   font-size: 17px;
   height: 33px;
   position: absolute;
   right: 0;
   top: 11px;
   width: 33px;
   }
   .messaging { padding: 0 0 50px 0;}
   .msg_history {
   height: 516px;
   overflow-y: auto;
   }
   .bredim {
   background-color: #071DAA;
   padding: 2% 10% 10px;
   }
   .wrapper {
   padding-top: 80px;
   }
   .tab-pane {
   background-color: #fff;
   }
   .form-row.formtab {
   padding: 0px 15px;
   }
   h3.detailbook {
   font-size: 16px;
   background-color: #15b1ba;
   color: #fff;
   padding: 5px;
   margin: 0px 0px 10px;
   }
   .warnbtn {
   /* margin: 10px 0px 20px; */
   padding: 15px 0px;
   }
   .formtab .form-group.col-md-3 {
   margin-bottom: 0px !important;
   }
   .pauim{
   -webkit-box-shadow: 0px 0px 7px -2px rgba(21,179,182,1);
   -moz-box-shadow: 0px 0px 7px -2px rgba(21,179,182,1);
   box-shadow: 0px 0px 7px -2px rgba(21,179,182,1);
   background-color:#fff;
   }
   button#btnFA {
   display: block;
   margin: 0 auto;
   }
   .prolabel {
   color: #223770;
   font-weight: bold;
   font-size:14px;
   }
   textarea.description {
   border: 1px solid #ddd;
   border-radius: 3px;
   }
   .namelabel {
   font-size: 13px;
   }
   textarea.description.refun {
   height: 100px;
   }
   input.form-control.refun{
   height: 50px;
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
               <a class="nav-link p-3  " id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="true">
               <i class="fa fa-star mr-2"></i>
               <span class="font-weight-bold small text-uppercase">Reservation Details</span></a>
               <a class="nav-link p-3" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="true">
               <i class="fa fa-check mr-2"></i>
               <span class="font-weight-bold small text-uppercase">Billing Details</span></a>
               <a class="nav-link p-3" id="v-pills-cancelbook-tab" data-toggle="pill" href="#v-pills-cancelbook" role="tab" aria-controls="v-pills-cancelbook" aria-selected="true">
               <i class="fa fa-calendar mr-2"></i>
               <span class="font-weight-bold small text-uppercase">Cancellation Booking</span></a>
               <a class="nav-link p-3" id="v-pills-comment-tab" data-toggle="pill" href="#v-pills-comment" role="tab" aria-controls="v-pills-comment" aria-selected="true">
               <i class="fa fa-user mr-2"></i>
               <span class="font-weight-bold small text-uppercase">Comments</span></a>
            </div>
         </div>
         <div class="col-md-9">
            <!-- Tabs content -->
            <div class="tab-content" id="v-pills-tabContent">
               <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                  <div class="form-row formtab">
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" value="{{ $reserv_details[0]->reservation_date }}" disabled id="reservation_date">
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
                              <input type="text" class="form-control" value="{{ $reserv_details[0]->start_date }}" id="reservation_start_date">
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
                              <input type="text" class="form-control" value="{{ $reserv_details[0]->return_date }}" id="reservation_return_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                 <label for="Vehicle Color">Booked Date To</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" value="{{ $reserv_details[0]->location_name }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="status">Pick up location</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" value="{{ $reserv_details[0]->location_name }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="status">Drop up location</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" value="{{ $reserv_details[0]->vehicle_reg_no }}" onfocus="this.placeholder = ''" disabled required autofocus >
                              <div class="input-group-append">
                                 <label for="Vehicle Color">Vehicle Reg No</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" id="dynamic_rent_value" class="form-control" value="{{ $reserv_details[0]->vehicle_default_rent }}" onfocus="this.placeholder = ''" disabled autofocus >
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
                              <option value=""></option>
                              </option>
                           </select>
                           <label for="status">Payment Method</label>
                        </div>
                     </div>
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                           <select class="form-control"  class="form-control" id="drop_location_id" placeholder="" onfocus="this.placeholder = ''" disabled required autofocus>
                              <option value=""></option>
                              </option>
                           </select>
                           <label for="status">Payment Status</label>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade shadow rounded bg-white" id="v-pills-cancelbook" role="tabpanel" aria-labelledby="v-pills-cancelbook-tab">
                  <div class="row">
                     <div class="col-md-9">
                        <div class="">
                           <h3 class="detailbook">Personal Details</h3>
                           <div class="form-row formtab">
                              <div class="form-group col-md-3">
                                 <div class="form-group">
                                    <label for="vehicle Model" class="prolabel">Name</label>
                                    <div class="namelabel">{{ $reserv_details[0]->first_name }}{{ $reserv_details[0]->last_name }}</div>
                                 </div>
                              </div>
                              <div class="form-group col-md-3">
                                 <div class="form-group ">
                                    <label for="Vehicle Color" class="prolabel">Phone</label>
                                    <div class="namelabel">{{ $reserv_details[0]->phone }}</div>
                                 </div>
                              </div>
                              <div class="form-group col-md-3">
                                 <div class="form-group">
                                    <label for="Vehicle Color" class="prolabel">Email</label>
                                    <div class="namelabel">{{ $reserv_details[0]->email }}</div>
                                 </div>
                              </div>
                              <div class="form-group col-md-3">
                                 <div class="form-group">
                                    <label for="Location" class="prolabel">Address</label>
                                    <div class="namelabel">{{ $reserv_details[0]->door_no }}{{ $reserv_details[0]->appartment_name }}{{ $reserv_details[0]->street_name }}
                                       {{ $reserv_details[0]->city }}{{ $reserv_details[0]->state }}
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <h3 class="detailbook">Reservation Details</h3>
                           <div class="form-row formtab">
                              <div class="form-group col-md-3">
                                 <div class="form-group">
                                    <label for="vehicle Model" class="prolabel">Reservation Id</label>
                                    <div class="namelabel">{{ $reserv_details[0]->reserve_unique_id }}</div>
                                 </div>
                              </div>
                              <div class="form-group col-md-3">
                                 <div class="form-group">
                                    <label for="Vehicle Color" class="prolabel">Partner Name</label>
                                    <div class="namelabel">{{ $reserv_details[0]->city }}</div>
                                 </div>
                              </div>
                              <div class="form-group col-md-3">
                                 <div class="form-group">
                                    <label for="Vehicle Color" class="prolabel">Reservation Date</label>
                                    <div class="namelabel">{{ $reserv_details[0]->reservation_date }}</div>
                                 </div>
                              </div>
                              <div class="form-group col-md-3">
                                 <div class="form-group">
                                    <label for="Location" class="prolabel">Vehicle Reg No</label>
                                    <div class="namelabel">{{ $reserv_details[0]->vehicle_reg_no }}</div>
                                 </div>
                              </div>
                           </div>
                           <h3 class="detailbook">Payment Details</h3>
                           <div class="form-row formtab">
                              <div class="form-group col-md-3">
                                 <div class="form-group">
                                    <label for="vehicle Model" class="prolabel">Reservation Via</label>
                                    <div class="namelabel">{{ $reserv_details[0]->reserve_through }}</div>
                                 </div>
                              </div>
                              <div class="form-group col-md-3">
                                 <div class="form-group">
                                    <label for="Vehicle Color" class="prolabel">Reservation Amount</label>
                                    <div class="namelabel">{{ $reserv_details[0]->paid_amount }}</div>
                                 </div>
                              </div>
                              <div class="form-group col-md-3">
                                 <div class="form-group">
                                    <label for="Location" class="prolabel">Date</label>
                                    <div class="namelabel">{{ $reserv_details[0]->start_date }}To{{ $reserv_details[0]->return_date }}</div>
                                 </div>
                              </div>
                              <div class="form-group col-md-3">
                                 <div class="form-group">
                                    <div class="namelabel">2 Days Go to trip</div>
                                 </div>
                              </div>
                           </div>
                           <div class="warnbtn"> <button id="btnFA" class="btn btn-warning">
                              Download Invoice
                              <i class="fa fa-download"></i>
                              </button>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="" style="padding-top:10px;">
                           <div class="form-group col-md-12">
                              <div class="form-group has-float-label">
                                 <label for="vehicle Model" class="prolabel">Description</label>
                                 <textarea class="description refun" name="" style="width:100%;"></textarea>
                              </div>
                           </div>
                           <div class="form-group col-md-12">
                              <div class="form-group has-float-label">
                                 <label for="Location" class="prolabel">Cancellation Charge</label>
                                 <input type="text" class="form-control refun" id="last_name" value="" onfocus="this.placeholder = ''" required autofocus >
                              </div>
                           </div>
                           <div class="form-group col-md-12">
                              <div class="form-group has-float-label">
                                 <label for="Location" class="prolabel">Paid Amount</label>
                                 <input type="text" class="form-control refun" id="last_name" value="" onfocus="this.placeholder = ''" required autofocus >
                              </div>
                           </div>
                           <div class="form-group col-md-12">
                              <div class="form-group has-float-label">
                                 <label for="Location" class="prolabel">Refund Amount</label>
                                 <input type="text" class="form-control refun" id="last_name" value="" onfocus="this.placeholder = ''" required autofocus >
                              </div>
                           </div>
                           <div class="form-group col-md-12">
                              <div class="form-row formtab">
                                 <div class="form-group" style=" margin: 0 auto 18px;
                                    display: block;    width: 100%;   ">
                                    <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" id="add_cus_details" style="    background-color: #ffa91c !important;
                                       border: none !important;    width: 100%;   ">Pay Refund</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-comment" role="tabpanel" aria-labelledby="v-pills-comment-tab">
                  <div class="messaging">
                     <div class="inbox_msg">
                        <div class="inbox_people">
                           <div class="headind_srch">
                              <div class="recent_heading">
                                 <h4>Recent</h4>
                              </div>
                              <div class="srch_bar">
                                 <div class="stylish-input-group">
                                    <input type="text" class="search-bar"  placeholder="Search" >
                                    <span class="input-group-addon">
                                    <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                    </span> 
                                 </div>
                              </div>
                           </div>
                           <div class="inbox_chat">
                              <div class="chat_list active_chat">
                                 @foreach($customercomment as $incomt)
                                 @if($incomt->sent_from != 0)
                                 @else
                                 <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                       <?php
                                          $date = strtotime($incomt->comment_date);
                                          $dd = date('H:i:A',$date);
                                          $dd1 = date('M d',$date);
                                          ?>
                                       <h5>Admin <span class="chat_date">{{ $dd1 }}/{{ $dd }}</span></h5>
                                       <p>{{ $incomt->comment }}</p>
                                    </div>
                                 </div>
                                 @endif
                                 @endforeach
                              </div>
                           </div>
                        </div>
                        <div class="mesgs">
                           <div class="msg_history">
                               @foreach($customercomment as $cuscomt)
                              @if($cuscomt->sent_from != 0)
                              <div class="outgoing_msg">
                                 <div class="sent_msg">
                                    <p>{{ $cuscomt->comment }}</p>
                                    <?php
                                       $date = strtotime($cuscomt->comment_date);
                                       $dd = date('H:i:s',$date);
                                       $dd1 = date('M d',$date);
                                       ?>
                                    <span class="time_date"> {{ $dd }}       |       {{ $dd1 }}</span> 
                                 </div>
                              </div>
                              @else
                              <div class="incoming_msg">
                                 <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                 <div class="received_msg">
                                    <div class="received_withd_msg">
                                       <p>{{ $cuscomt->comment }}</p>
                                       <?php
                                          $date = strtotime($cuscomt->comment_date);
                                          $dd = date('H:i:A',$date);
                                          $dd1 = date('M d',$date);
                                          ?>
                                       <span class="time_date"> {{ $dd }}     |      {{ $dd1 }}</span>
                                    </div>
                                 </div>
                              </div>
                              @endif
                              @endforeach
                           </div>
                           <div class="type_msg">
                              <div class="input_msg_write">
                                 <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                 <input type="hidden" value="{{ $reserv_details[0]->reservation_id }}" id="reservation_id">
                                 <input type="hidden" value="{{ $reserv_details[0]->customer_id }}" id="customer_id">
                                 <input type="text" class="write_msg" id="customer_msg" placeholder="Type a message" />
                                 <button class="msg_send_btn" id="cus_send_msg" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
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
   
       
        $("#cus_send_msg").click(function(){
              var customer_msg = $("#customer_msg").val();
              var reservation_id = $('#reservation_id').val();
              var customer_id = $('#customer_id').val();
              var tempcsrf = $('#csrf_token').val();
              if(customer_msg ==''){
                  $.alert({
                      title: 'Alert!',
                      content: "Body of the message is empty !!!",
                  });
              }else{
                  $.ajax({
                type: 'POST',
                url: '{{ url('cus_send_message') }}',
                dataType: 'json',
                data: {
                      customer_msg:customer_msg,
                      reservation_id:reservation_id,
                      customer_id:customer_id,
                    _token:tempcsrf
                    },
                      beforeSend: function () {
                      },
                      success: function (data) {
                              $.confirm({
                                 title: 'Success',
                                 content: 'Message sent successfully',
                                 autoClose: 'logoutUser|300',
                                   buttons: {
                                   logoutUser: {
                                       text: 'OK',
                                   },
                                }
                             });
                             location.reload();
                          }
                        });
                  }
             });     
       
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