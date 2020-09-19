@extends('layouts.adminmaster')
@section('content')
<header id="topnav">
<?php $role = Session::get('role'); ?>

@if($role == 1)
    @include('admin_dashboard.menu')
@else
    @include('partner_dashboard.menu')
@endif

</header>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
{!! Html::style('public/assets/jquery_upload/uploadfile.css') !!}
<style>
   .resCarousel-inner .item {
   /*border: 4px solid #eee;*/
   /*vertical-align: top;*/
   text-align: center;
   }
   .resCarousel-inner .item .tile div,
   .banner .item div {
   display: table;
   width: 100%;
   min-height: 250px;
   text-align: center;
   /*box-shadow: 0 1px 1px rgba(0, 0, 0, .1);*/
   }
   .resCarousel-inner .item h1 {
   display: table-cell;
   vertical-align: middle;
   color: white;
   }
   .banner .item div {
   background: url('demoImg.jpg') center top no-repeat;
   background-size: cover;
   min-height: 550px;
   }
   .item .tile div {
   background: url('demoImg.jpg') center center no-repeat;
   background-size: cover;
   height: 200px;
   color: white;
   }
   button.btn.btn-default.leftRs{
   position: absolute;
   top: 30%;
   left:-57px;
   }     
   button.btn.btn-default.rightRs {
   position: absolute;
   top: 30%;
   right:-57px;
   }
   .navbar-fixed-top{
   background-color:transparent !important;
   }
   .navbar-glass{background-color:#fff !important;}
   .navigation .navbar-nav > li > a {
   color: #27568C;
   font-family: 'SF Display';
   letter-spacing: -0.01px;
   line-height: 22px;
   margin-bottom: 10px;
   font-size:15px;
   }
   .slick-slide {
   margin: 0px 20px;
   }
   .slick-slider
   {
   position: relative;
   display: block;
   box-sizing: border-box;
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
   -webkit-touch-callout: none;
   -khtml-user-select: none;
   -ms-touch-action: pan-y;
   touch-action: pan-y;
   -webkit-tap-highlight-color: transparent;
   }
   .slick-list
   {
   position: relative;
   display: block;
   overflow: hidden;
   margin: 0;
   padding: 0;
   }
   .slick-list:focus
   {
   outline: none;
   }
   .slick-list.dragging
   {
   cursor: pointer;
   cursor: hand;
   }
   .slick-slider .slick-track,
   .slick-slider .slick-list
   {
   -webkit-transform: translate3d(0, 0, 0);
   -moz-transform: translate3d(0, 0, 0);
   -ms-transform: translate3d(0, 0, 0);
   -o-transform: translate3d(0, 0, 0);
   transform: translate3d(0, 0, 0);
   }
   .slick-track
   {
   position: relative;
   top: 0;
   left: 0;
   display: block;
   }
   .slick-track:before,
   .slick-track:after
   {
   display: table;
   content: '';
   }
   .slick-track:after
   {
   clear: both;
   }
   .slick-loading .slick-track
   {
   visibility: hidden;
   }
   .slick-slide
   {
   display: none;
   float: left;
   /*height: 100%;*/
   min-height: 1px;
   }
   [dir='rtl'] .slick-slide
   {
   float: right;
   }
   .slick-slide img
   {
   display: block;
   }
   .slick-slide.slick-loading img
   {
   display: none;
   }
   .slick-slide.dragging img
   {
   pointer-events: none;
   }
   .slick-initialized .slick-slide
   {
   display: block;
   }
   .slick-loading .slick-slide
   {
   visibility: hidden;
   }
   .slick-vertical .slick-slide
   {
   display: block;
   height: auto;
   border: 1px solid transparent;
   }
   .slick-arrow.slick-hidden {
   display: none;
   }
</style>
<style>
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
   .formtab{
   padding:20px;
   }
   button {
   display: block !important;
   }
   .btn-primary {
   float: left;
   margin-right: 15px;
   }
   .col-md-12.vimkim {
   padding: 3px 20px;
   background-color: #21366b;
   }
   h4.customdet {
   color: #fff;
   }
   div#myTabContent {
   padding: 0px;
   }
   button.close_location_tab.btn.btn-default.waves-effect.waves-light {
   border-color: #21366b !important;
   color: #21366b !important;
   }
   .nav>li>a {
    padding: 7px 50px !important;
    -webkit-box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
    -moz-box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
    box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
}
   .nav-pills .nav-link {
   border-radius: 30px;
   text-align: center;
   margin-bottom: 25px;
   border: 1px solid #12b3b6;
   color: #21366b;
   font-size:12px;
   }
   .nav-pills .nav-link.active {
   background-color: #12b3b6;
   }
   i.fa.fa-upload {
   color: #000;
   font-size: 20px;
   }
   .nav>li>a:focus, .nav>li>a:hover {
    text-decoration: none;
    background-color: #eee;
    padding: 7px 20px !important;
    vertical-align: super !important;
}
   i.fa.fa-download {
   color: green;
   font-size: 20px;
   }
   @media (min-width: 768px) {
   /* show 3 items */
   .carousel-inner .active,
   .carousel-inner .active + .carousel-item,
   .carousel-inner .active + .carousel-item + .carousel-item,
   .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item  {
   display: block;
   }
   .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
   .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item,
   .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item,
   .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item {
   transition: none;
   }
   .carousel-inner .carousel-item-next,
   .carousel-inner .carousel-item-prev {
   position: relative;
   transform: translate3d(0, 0, 0);
   }
   .carousel-inner .active.carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
   position: absolute;
   top: 0;
   right: -25%;
   z-index: -1;
   display: block;
   visibility: visible;
   }
   /* left or forward direction */
   .active.carousel-item-left + .carousel-item-next.carousel-item-left,
   .carousel-item-next.carousel-item-left + .carousel-item,
   .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item,
   .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item,
   .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
   position: relative;
   transform: translate3d(-100%, 0, 0);
   visibility: visible;
   }
   /* farthest right hidden item must be abso position for animations */
   .carousel-inner .carousel-item-prev.carousel-item-right {
   position: absolute;
   top: 0;
   left: 0;
   z-index: -1;
   display: block;
   visibility: visible;
   }
   /* right or prev direction */
   .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
   .carousel-item-prev.carousel-item-right + .carousel-item,
   .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item,
   .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item,
   .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
   position: relative;
   transform: translate3d(100%, 0, 0);
   visibility: visible;
   display: block;
   visibility: visible;
   }
   }
   /* Bootstrap Lightbox using Modal */
   #profile-grid { overflow: auto; white-space: normal; } 
   #profile-grid .profile { padding-bottom: 40px; }
   #profile-grid .panel { padding: 0 }
   #profile-grid .panel-body { padding: 15px }
   #profile-grid .profile-name { font-weight: bold; }
   #profile-grid .thumbnail {margin-bottom:6px;}
   #profile-grid .panel-thumbnail { overflow: hidden; }
   #profile-grid .img-rounded { border-radius: 4px 4px 0 0;}
   div#carouselExample {
   padding: 5% 0px;
   }
   .iconfa {
   font-size: 20px;
   margin-right: 10px;
   }
</style>
<style>
   .form-group.col-md-6.name112 {
   float: left;
   }
   .icon-colored{
   width:20px;
   margin:0px ;
   height:20px;
   }
   i.fa.fa-pencil.yoyo {
   color: #0A819F;
   font-weight: 600;
   font-size: 18px;
   padding: 0px 10px;
   }
   i.fa.fa-trash.zoho {
   color: #F20000;
   font-weight: 600;
   font-size: 18px;
   }
   .vouc{
   padding-top:2%;
   }
   i.fa.fa-file-excel-o.excelo {
   font-size: 18px;
   padding: 0px 10px;
   color: green;
   font-weight: 600;
   }
   i.fa.fa-file-pdf-o.pdfo {
   font-size: 18px;
   padding: 0px 0px;
   color: #af3450;
   font-weight: 600;
   }
   .plusug{
   width: 30px;
   height: 30px;
   /* padding: 10px; */
   margin: 35px 10px 35px 35px;
   }
   .three{
   color: #17A6BC;
   }
   i.fa.fa-plus.comentplus {
   color: #187E77;
   font-size: 16px;
   padding: 0px 10px;
   }
   button.btn.btn-secondary.btn-bordered.waves-effect.w-md {
   margin-bottom: 3%;
   color: #FF8204;
   }
   span.download {
   border: 2px solid #EF970A;
   padding: 5px 10px;
   font-weight: 600;
   color: #000;
   }
   .col-md-6.downpay {
   text-align: right;
   }
   .card-box1 {
   -webkit-box-shadow: 0px 0px 7px -1px rgba(84,128,199,1);
   -moz-box-shadow: 0px 0px 7px -1px rgba(84,128,199,1);
   box-shadow: 0px 0px 7px -1px rgba(84,128,199,1);
   }
   span.paymen {
   background-color: #276FDB;
   color: #fff;
   padding: 13px;
   font-weight:bold;
   }
   .col-md-12.pending {
   text-align: right;
   padding: 0px 0px 20px;
   }
   .sidenav {
   height: 100%;
   width: 0px;
   position: fixed;
   z-index: 2;
   top: 13%;
   right: 0;
   background-color: #FFa000;
   overflow-x: hidden;
   transition: 0.5s;
   padding-top: 0px;
   border-left: 2px solid #cc6000;
   }
   .line {
   border-bottom: 1px solid #cc6000;
   margin-left: 10px;
   margin-right: 10px;
   display: block;
   transition: 0.3s;
   }
   .sidenav a {
   padding-top: 16px;
   padding-bottom: 16px;
   padding-left: 20px;
   text-align: left;
   text-decoration: none;
   font-size: 25px;
   color: #000;
   display: block;
   transition: 0.3s;
   }
   .sidenav a:hover {
   color: #f1f1f1;
   }
   .menuIconToggle {
   box-sizing: border-box;
   cursor: pointer;
   position: fixed;
   z-index: 10;
   height: 100%;
   width: 100%;
   top: 22px;
   right: 15px;
   height: 22px;
   width: 22px;
   transition: all 0.3s;
   z-index: 10;
   }
   .hamb-line {
   box-sizing: border-box;
   position: absolute;
   height: 3px;
   width: 100%;
   background-color: #000;
   transition: all 0.25s;
   }
   .hor {
   transition: all 0.3s;
   box-sizing: border-box;
   position: relative;
   float: left;
   margin-top: 3px;
   }
   .dia.p-1 {
   position: relative;
   box-sizing: border-box;
   float: left;
   transition: all .25s;
   }
   .dia.p-2 {
   box-sizing: border-box;
   position: relative;
   float: left;
   margin-top: 3px;
   transition: all .25s;
   }
   input[type=checkbox]:checked ~ .menuIconToggle > .hor {
   box-sizing: border-box;
   opacity: 0;
   transition: all .25s;
   }
   input[type=checkbox]:checked ~ .menuIconToggle > .dia.p-1 {
   box-sizing: border-box;
   transform: rotate(135deg);
   margin-top: 8px;
   transition: all .25s;
   }
   input[type=checkbox]:checked ~ .menuIconToggle > .dia.p-2 {
   box-sizing: border-box;
   transform: rotate(-135deg);
   margin-top: -9px;
   transition: all .25s;
   }
   @media screen and (min-width: 320px) and (max-width: 500px) {
   .col-md-12.pending {
   text-align: right;
   padding: 0px 10px 8px;
   margin: 18px 0px;
    background-color: #276fdb;
   }
   .targetdiv{
       width:100% !important;
   }
   .newresponse{
   display: block;
    width: 100%;
    overflow-x: auto;
   }
   .targetdiv2{
       width:100% !important;
   }
   button#update_rese_submit{
        float:left;
   }
   ul.media-list {
    padding: 0px;
}
.targetdiv{
    width:100%;
}
div#mySidenav4 {
    width: 100%;
}
div#mySidenav24 {
       width: 100%;
}
   .media {
    margin-top: 0px;
    border: 1px solid #ddd;
    padding: 0px 10px;
}
   .seveteen{
       margin-top:0px !important;
   }
   h4.page-title{
       margin-top:10px !important;
   }
   .p-20{
       padding:0px !important;
   }
   .targetdiv1{
       width:100% !important;
   }
   .form-group.col-md-6.name112{
       padding:0px !important;
   }
   .padhim{
   padding:0px !important;
   }
   button#openSideMenu2{
       float:left;
       margin-top:4% !important;
   }
   span.paymen {
   background-color: #276FDB;
   color: #fff;
   padding: 10px 3px;
   font-weight: bold;
   font-size: 12px;
   margin-top: 10px;
   }
   }
   .toglediv{margin-top:30%;}
   .targetdiv {
   background-color: #fff;
   position: fixed;
   height: 100%;
   width: 30%;
   z-index: 999;
   top: 0;
   left: 0;
   transform: translateX(-800%);
   -webkit-transform: translateX(-800%);
   }
   .targetdiv1 {
   background-color: #fff;
   position: fixed;
   height: 100%;
   width: 30%;
   z-index: 999;
   top: 0;
   left: 0;
   transform: translateX(-800%);
   -webkit-transform: translateX(-800%);
   }
   .targetdiv2 {
   background-color: #fff;
   position: fixed;
   height: 100%;
   width: 30%;
   z-index: 999;
   top: 0;
   left: 0;
   transform: translateX(-800%);
   -webkit-transform: translateX(-800%);
   }
   
   .slide-in1 {
   animation: slide-in 0.7s forwards;
   -webkit-animation: slide-in 0.7s forwards;
   }
   .slide-in {
   animation: slide-in 0.7s forwards;
   -webkit-animation: slide-in 0.7s forwards;
   overflow-y: scroll;
   }
   .slide-out {
   animation: slide-out 0.5s forwards;
   -webkit-animation: slide-out 0.5s forwards;
   }
   @keyframes slide-in {
   100% { transform: translateX(0%); }
   }
   @-webkit-keyframes slide-in {
   100% { -webkit-transform: translateX(0%); }
   }
   @keyframes slide-out {
   0% { transform: translateX(0%); }
   100% { transform: translateX(-100%); }
   }
   @-webkit-keyframes slide-out {
   0% { -webkit-transform: translateX(0%); }
   100% { -webkit-transform: translateX(-100%); }
   }
   ul.media-list {
    padding: 0px;
}
.media {
    margin-top: 0px !important;
    border: 1px solid #eee;
    padding: 10px 10px 0px;
}
.col-md-12.examplo{
    margin-top:3%;
}

.btn-group.col-md-4.pull-right {
    margin-top: 1%;
}
p.pull-left.firefox {
    padding-left: 4%;
}
h4.patelkim {
    font-size: 20px;
    color: #21366b;
    margin-bottom: 5px;
    margin-top: 0px;
   }

.back {
    background-color: #fff;
    /* border: 2px solid #21366b; */
    margin-bottom: 2%;
    border-radius: 6px;
    -webkit-box-shadow: 0px 0px 10px -1px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0px 10px -1px rgba(0,0,0,0.75);
    box-shadow: 0px 0px 10px -1px rgba(18, 179, 182, 0.57);
}
select#single_vehicle_available_option {
    margin-bottom: 20px;
}
</style>
<link href="{{ asset('theme_files/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme_files/plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme_files/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme_files/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme_files/plugins/clockpicker/css/bootstrap-clockpicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme_files/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
<div class="wrapper">
   <div class="container-fluid">
       <div class="row back">
         <div class="col-sm-12">
            <div class="page-title-box" style="margin-top: 1%!important;">
               <div class="btn-group pull-right">
                  <div class="col-md-6 examplo">
                      <h4 class="patelkim">
                         {{ $vehicle_info[0] ->vehicle_model }}
                      </h4>
                    </div>
                    <div class="col-md-6 examplo">
                      <p style="font-size:16px;">
                         <i class="glyphicon glyphicon-envelope"></i>{{ $vehicle_info[0] ->vehicle_reg_no }}
                      </p>
                  </div>
               </div>
               <div class="pull-left">
                  <ol class="breadcrumb hide-phone p-0 m-0" style="margin-top: 0px !important;">
                      <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left" style="color: #21366b; margin-right: 8px;border: 2px solid;padding: 5px;border-radius: 17px;margin-top: -1%;"></i><span style="color: #21366b; font-size: large; margin-right: 15px;">Back</span></a>&nbsp;&nbsp;
                     <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                     <li class="breadcrumb-item active">Vehicle Details</li>
                  </ol>
               </div>
               @if($vehicle_info[0] ->default_rent == '')
               <div><br><br>
                   <span style="color: red;"><center> Please update your vehicle default rent otherwise your vehicle is not appear in the website for reservation !!! </center></span>
               </div>
               @else
               @endif
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-3 mb-3">
            <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-info-circle iconfa" aria-hidden="true"></i>Basic Details</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link doc_uploader_class" id="profile-tab1" data-toggle="tab" href="#documents" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-file-text iconfa" aria-hidden="true"></i>Documents</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link doc_uploader_class" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-picture-o iconfa" aria-hidden="true"></i>Images</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#addon" role="tab" aria-controls="addon" aria-selected="false"><i class="fa fa-plus iconfa" aria-hidden="true"></i>Addon Features</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-money iconfa" aria-hidden="true"></i>Rates and Availability</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#vechileview" role="tab" aria-controls="vechileview" aria-selected="false"><i class="fa fa-history iconfa" aria-hidden="true"></i>Trip History</a>
               </li>
            </ul>
         </div>
         <!-- /.col-md-4 -->
         <!--style="flex: 0 0 100%; max-width: 100%; width: 100%;"-->
         <div class="col-md-9" id="basic_info_full_size">
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Vehicle Basic Details</h4> 
                    <input type="hidden" id="vehicle_id" value="{{ $vehicle_id }}" />
                  </div>
                  <div class="form-row formtab">
                      <div class="form-group col-md-6">
                        <label>Brand name</label>
                        <select class="form-control" id="vehicle_brand">
                           <option hidden >Select Vehicle Brand</option>
                           @foreach($vehicle_brand_list as $vb)
                           <option value="{{ $vb->master_data_id }}" @if($vb->master_data_id == $vehicle_info[0]->vehicle_brand) selected="selected" @else @endif>{{ ucfirst($vb->master_value) }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group col-md-6">
                        <label>Model name</label>
                        <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vehicle Model name" id="vehicle_model" value="{{ $vehicle_info[0] ->vehicle_model }}" />
                     </div>
                     <div class="form-group col-md-6">
                        <label>Registration Number</label>
                        <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vehicle Registration Number" id="vehicle_reg_no" value="{{ $vehicle_info[0] ->vehicle_reg_no }}" />
                     </div>
                     <div class="form-group col-md-6">
                        <label>Vehicle Type</label>
                        <select class="form-control" id="vehicle_type">
                           <option value="" hidden="">Select Type</option>
                           @foreach($vehicle_type as $vt)
                           <option value="{{ $vt->master_data_id }}" @if($vehicle_info[0]->vehicle_type == $vt->master_data_id) selected="selected" @else @endif >{{ ucfirst($vt->master_value) }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group col-md-6">
                        <label>Vehicle AC Type</label>
                        <select class="form-control" id="vehicle_ac_type">
                           <option value="" hidden="">Select Type</option>
                           <option value="1" @if($vehicle_info[0]->vehicle_ac_type == '1') selected="selected" @else @endif >AC Car</option>
                           <option value="2" @if($vehicle_info[0]->vehicle_ac_type == '2') selected="selected" @else @endif >Non AC Car</option>
                        </select>
                     </div>
                     <div class="form-group col-md-6">
                        <label>Driving mode</label>
                        <select title="Select mode" placeholder="Select mode" class="form-control" id="vehicle_driving_type">
                            <option hidden="">Select Type</option>
                            @foreach($vehicle_driving_mode as $vb)
                            <option value="{{ $vb->master_data_id }}" @if($vb->master_data_id == $vehicle_info[0]->vehicle_driving_type) selected="selected" @else @endif >{{ ucfirst($vb->master_value) }}</option>
                            @endforeach
                        </select>
                     </div>
                     <div class="form-group col-md-6">
                        <label>Vehicle Color</label>
                        <select title="Select color" placeholder="Select color" class="form-control" id="vehicle_color">
                            <option hidden="">Select Color</option>
                            @foreach($vehicle_color as $vb)
                            <option value="{{ $vb->master_data_id }}" @if($vb->master_data_id == $vehicle_info[0]->vehicle_color) selected="selected" @else @endif>{{ ucfirst($vb->master_value) }}</option>
                            @endforeach
                        </select>
                     </div>
                     <div class="form-group col-md-6">
                        <label>Fuel Type</label>
                        <select class="form-control" id="vehicle_fuel_type">
                            <option hidden="">Select Type</option>
                            @foreach($vehicle_fuel_type as $vb)
                            <option value="{{ $vb->master_data_id }}" @if($vb->master_data_id == $vehicle_info[0]->vehicle_fuel_type) selected="selected" @else @endif >{{ ucfirst($vb->master_value) }}</option>
                            @endforeach
                        </select>
                     </div>
                     <div class="form-group col-md-6">
                        <label>Maximum Speed</label>
                        <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required value="{{ $vehicle_info[0] ->vehicle_max_speed }}" placeholder="Vehicle Maximum Speed" id="vehicle_max_speed" />
                     </div>
                     <div class="form-group col-md-6">
                        <label>Total Running K.M</label>
                        <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required value="{{ $vehicle_info[0] ->vehicle_running_km }}" placeholder="Total Running K.M" id="vehicle_running_km" />             
                     </div>
                     <div class="form-group col-md-6">
                        <label>Registration Year</label>
                        <input data-parsley-type="number" type="text" class="form-control tribut" required value="{{ $vehicle_info[0] ->vehicle_reg_year }}" placeholder="Reservation Year" id="vehicle_reg_year" />
                     </div>
                     <div class="form-group col-md-6">
                        <label>Insurancer Date</label>
                        <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required value="{{ $vehicle_info[0] ->vehicle_insurance }}" placeholder="Date" id="vehicle_insurance" />
                     </div>
                     <div class="form-group col-md-6">
                        <label>FC Date</label>
                        <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required value="{{ $vehicle_info[0] ->vehicle_fc_date }}" placeholder="Date" id="vehicle_fc_date" />
                     </div>
                     <div class="form-group col-md-6">
                        <label>Seat Type</label>
                        <select class="form-control" id="vehicle_seat_type">
                           <option hidden="">Select Seat Type</option>
                           @foreach($vehicle_seat_type_list as $vb)
                           <option value="{{ $vb->master_data_id }}" @if($vb->master_data_id == $vehicle_info[0]->vehicle_seat_type) selected="selected" @else @endif>{{ ucfirst($vb->master_value) }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group col-md-6">
                        <label>Seat Count</label>
                        <select class="form-control" id="vehicle_seat_count">
                            <option hidden="">Select Count</option>
                            @foreach($vehicle_seat_count_list as $vb)
                            <option value="{{ $vb->master_data_id }}" @if($vb->master_data_id == $vehicle_info[0]->vehicle_seat_count) selected="selected" @else @endif >{{ ucfirst($vb->master_value) }}</option>
                            @endforeach
                        </select>
                     </div>
                     <div class="form-group col-md-6">
                        <label>Vehicle Status</label>
                        <select class="form-control" id="available_status">
                            <option hidden="">Select Status</option>
                           <option value="1" @if($vehicle_info[0]->available_status == '1') selected="selected" @else @endif >Active</option>
                           <option value="2" @if($vehicle_info[0]->available_status == '2') selected="selected" @else @endif >Disable</option>
                        </select>
                     </div>
                     <div class="form-group col-md-6">
                        <label>Vehicle condition</label>
                        <textarea class="form-control tribut" required placeholder="Vehicle condition" id="vehicle_condition">{{ $vehicle_info[0] ->vehicle_condition }}</textarea>
                     </div>
                  </div>
                  <div class="form-row formtab">
                     <div class="form-group">
                        <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                        <input type="hidden" id="partner_id" value="{{ $vehicle_info[0]->partner_id }}">
                        <button type="button" class="btn btn-primary waves-effect waves-light" id="update_bacic_info_submit">Save</button>
                        <button type="button" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Rate and Availablity </h4>
                  </div>
                  <div class="form-row formtab">
                        <div class="targetdiv slide-in " id="mySidenav1" class="sidenav" style="display:none;">
                             <div class="card-body">
                                <form>
                                   <div class="form-row toglediv">
                                      <div class="form-row row rentiu" style="width: -webkit-fill-available;">
                                          <div class="col-md-12" style="">
                                            <label class="checkbox-inline">Default rent  :</label>
                                            @if($vehicle_info[0]->default_rent != '')
                                            <span> {{ $vehicle_info[0]->default_rent }} </span>
                                            @else
                                            <span> Not defined </span>
                                            @endif
                                         </div><br>
                                         <div class="col-md-12" style="">
                                            <label class="checkbox-inline">
                                             Rate per KM <input type="checkbox" id="single_new_rate_per_km" checked> </label>
                                            <label class="checkbox-inline">
                                             Rate per hour <input type="checkbox" id="single_new_rate_per_hr"> </label>
                                         </div><br>
                                         <div class="col-md-12" style="">
                                            <label class="crosil">Vehicle Rent for <span id="add_rent_for_date"></span></label>
                                            <input type="hidden" id="new_rent_date">
                                         </div>
                                         <div class="col-md-12" style="">
                                            <input class="form-control" type="text" value="" id="new_rent_value">
                                         </div>
                                         <div class="col-md-12" style="">
                                            <label>Select Available Status</label><span style="color: red;">*</span>
                                            <select class="form-control" id="single_vehicle_available_option">
                                                <option hidden="" value="">Select Available Option</option>
                                                <option value="1">Available</option>
                                                <option value="2">Not Available</option>
                                            </select>
                                         </div>
                                         <div class="col-md-12" style="">
                                            <center>
                                               <button type="button" class="btn btn-primary waves-effect waves-light w-md m-b-30" id="add_new_rent_submit"> Add </button>
                                               <button type="button" onclick="close_slide();"; class="btn btn-warning waves-effect waves-light w-md m-b-30"> Close </button>
                                            </center>
                                         </div>
                                      </div>
                                   </div>
                                </form> 
                             </div>
                        </div>
                        <div class="targetdiv slide-in " id="mySidenav2" class="sidenav" style="display:none;">
                            <div class="card-body">
                                <form>
                                   <div class="form-row toglediv">
                                      <div class="form-row row" style="width: -webkit-fill-available;">
                                         <div class="col-md-12" style="margin-left: 35px;">
                                            <label class="checkbox-inline">Default rent  :</label>
                                            @if($vehicle_info[0]->default_rent != '')
                                            <span> {{ $vehicle_info[0]->default_rent }} </span>
                                            @else
                                            <span> Not defined </span>
                                            @endif
                                         </div><br>
                                         <div class="col-md-12" style="margin-left: 35px;">
                                            <label class="checkbox-inline">
                                             Rate per KM <input type="checkbox" id="new_rate_per_km" checked> </label>
                                            <label class="checkbox-inline">
                                             Rate per hour <input type="checkbox" id="new_rate_per_hr"> </label>
                                         </div><br>
                                         <div class="col-md-12" style="margin-left: 35px;">
                                            <label>Select Option</label><span style="color: red;">*</span>
                                            <select class="form-control" id="vehicle_rent_option">
                                                <option hidden="" value="">Select Option</option>
                                                <option value="default">Default rent</option>
                                                <option value="multiple">Multiple - Dates</option>
                                                <option value="weekdays">Week days</option>
                                                <option value="weekenddays">Weekend days</option>
                                            </select>
                                         </div>
                                         <div class="col-md-12" style="margin-left: 35px; display:none;" id="datepicker-multiple-date_div">
                                            <label>Select Date</label><span style="color: red;">*</span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-multiple-date">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                    </div>
                                                </div><!-- input-group -->
                                         </div>
                                         <div class="col-md-12" style="margin-left: 35px; display:none;" id="multi_weekdays_picker_div">
                                            <label>Select Month</label><span style="color: red;">*</span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="multi_weekdays_picker">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                    </div>
                                                </div><!-- input-group -->
                                         </div>
                                         <div class="col-md-12" style="margin-left: 35px; display:none;" id="multi_weekend_picker_div">
                                            <label>Select Month</label><span style="color: red;">*</span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="multi_weekend_picker">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                    </div>
                                                </div><!-- input-group -->
                                         </div>
                                         <div class="col-md-12" style="margin-left: 35px; display:none;" id="vehicle_available_option_div">
                                            <label>Select Available Status</label><span style="color: red;">*</span>
                                            <select class="form-control" id="vehicle_available_option">
                                                <option hidden="" value="">Select Available Option</option>
                                                <option value="1">Available</option>
                                                <option value="2">Not Available</option>
                                            </select>
                                         </div>
                                         <div class="col-md-12" style="margin-left: 35px;">
                                            <label>Rent Amount</label><span style="color: red;">*</span>
                                            <input data-parsley-type="number" type="text" class="form-control tribut" required placeholder="Rent amount" id="multi_rent" />
                                         </div>
                                         <div class="col-md-12" style="margin-top: 35px;">
                                            <center>
                                               <button type="button" class="btn btn-primary waves-effect waves-light w-md m-b-30" id="add_new_multidate_rent"> Add </button>
                                               <button type="button" onclick="close_slide();"; class="btn btn-warning waves-effect waves-light w-md m-b-30"> Close </button>
                                            </center>
                                         </div>
                                      </div>
                                   </div>
                                </form>
                             </div>
                        </div>
                        <div class="form-group col-md-12">
                            <a id="add_new_property_rent_button" class="pull-right btn btn-primary waves-effect waves-light w-md">Add New</a>
                            <span class="pull-right">
                            <label class="checkbox-inline">Default rent  :</label>
                            @if($vehicle_info[0]->default_rent != '')
                            <span> {{ $vehicle_info[0]->default_rent }} </span>
                            @else
                            <span> Not defined </span>
                            @endif
                            </span><br>
                            <center><div id="calendar" ></div></center>
                        </div>
                    <!--style="width: 90%; display: inline-block;"-->
                  </div>
               </div>
               <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Images</h4>
                  </div>
                    <div class="form-row formtab">
                        <div class="form-group col-md-3">
                            <label>Upload Images</label>
                        </div>
                        <div class="form-group col-md-6">
                            <div id="imag_uploader">Upload</div>
                        </div>
                    </div>
                  @if(count($vehicle_img) == '0')
                   <center>
                         <h2> No Vehicle list found </h2>
                         <br>
                         <h4>Admin uploading your Vehicle list details...</h4>
                    </center>
                    @else
                    
                    <!-- START carousel-->
                    <div class="carousel slide" data-ride="carousel" id="carouselExampleIndicators{{ $vehicle_info[0]->vehicle_id }}">
                      <ol class="carousel-indicators">
                        <?php $i = 0; ?>
                        @foreach($vehicle_img as $pi)                              
                         <?php $i = $i + 1; ?>
                         @endforeach
                      </ol>
                      <div class="carousel-inner">
                        <?php $i="active"; ?>
                        @foreach($vehicle_img as $pi)
                        <div class="carousel-item {{ $i }} ">
                            <img alt="First slide" class="col-md-4 d-block w-35" src=" {{ $pi->file_url }} ">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a onclick="delete_document_detail({{$pi->document_details_id}}, '{{$pi->file_path}}{{$pi->file_orginal_name}}' );"><i class="fa fa-trash" style="color:red; cursor: pointer; margin-left: 243px;"></i></a>
                            <br>
                            <?php $i="" ?>
                        </div>
                        <a class="carousel-control-prev" data-slide="prev" href="#carouselExampleIndicators{{ $pi->vehicle_id }}" role="button">
                          <span aria-hidden="true" class="carousel-control-prev-icon" style="background-color: black"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" data-slide="next" href="#carouselExampleIndicators{{ $pi->vehicle_id }}" role="button">
                          <span aria-hidden="true" class="carousel-control-next-icon" style="background-color: black"></span>
                          <span class="sr-only">Next</span>
                        </a>
                        @endforeach
                      </div>
                    </div>
                    <!-- END carousel-->
                    
                  @endif
               </div>
               <div class="tab-pane fade" id="addon" role="tabpanel" aria-labelledby="contact-tab">
                  <!--<div class="col-md-12" style=" padding: 2% 0px 5%;">-->
                  <!--   <a class="btn btn-primary waves-effect waves-light" id="add_new_add_on" style="float: right;margin-bottom: 15px;"> Add New </a>-->
                  <!--</div>-->
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Addon Features </h4>
                     @if($role == '1')
                     <a class="btn btn-success waves-effect waves-light" id="add_new_add_on" style="float: right;margin-top: -43px;"><i class="fa fa-plus" aria-hidden="true"></i></a>
                     @endif
                  </div>
                  <div class="targetdiv3 slide-in1" id="mySidenav3" class="sidenav" style="display:none;">
                       <div class="card-body">
                          <form>
                             <div class="form-row">
                                <div class="form-group col-md-12">
                                   <label>Add on Features </label>
                                   <input data-parsley-type="number" type="text" class="form-control tribut" required placeholder="name the add on" id="add_on" />
                                </div>
                                <div class="form-row formtab">
                                   <div class="form-group">
                                      <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                      <button type="button" class="btn btn-primary waves-effect waves-light" id="add_on_submit">Save</button>
                                      <button type="button" onclick="close_slide1();" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
                                   </div>
                                </div>
                             </div>
                          </form>
                       </div>
                    </div>
                  <div class="form-row formtab">
                    <div class="form-group col-md-6" id="add_on_features">
                       <label for="option_name"><b> Addon Features </b></label><br>
                        @foreach($add_on_features as $af)
                        <?php
                        $value_count = DB::table('vehicle_features')->where('option_name',$af->master_data_id)->where('vehicle_id',$vehicle_id)->count();
                        ?>
                            <?php if($value_count == '0'){ ?>
                            <label class="checkbox-inline">
                            <input type="checkbox" name="option_name[]" onchange="myfunction({{$af->master_data_id}});" id="{{$af->master_data_id}}check" value="{{ $af->master_data_id }}">
                            {{ ucfirst($af->master_value) }} 
                            </label><br>
                            <input data-parsley-type="number" id="{{$af->master_data_id}}value" style="display:none;" type="text" class="form-control tribut" maxlength="10" required placeholder="value" id="addon_value" />
                            <?php } ?>
                        @endforeach
                        <br> 
                        <div class="form-group">
                            <button type="button" class="btn btn-primary waves-effect waves-light" id="add_add_on">Save</button>
                        </div>
                    </div>
                    @if(count($add_on_features_values) != '0')
                    <div class="form-group col-md-6" id="add_on_features_dynamic_values">
                       <label for="option_name"><b> Addon Features Values </b></label><br>
                       <?php //print_r($add_on_features_values); ?>
                          @foreach($add_on_features_values as $af)
                            <label class="checkbox-inline">
                            {{ ucfirst($af->master_value) }}
                            <input type="hidden" name="option_name[]" value="{{ $af->vehicle_features_id }}">
                            </label>
                            &nbsp;&nbsp;&nbsp; <a onclick="delete_addon_detail({{$af->vehicle_features_id}});"><i class="fa fa-trash" style="color:red; cursor: pointer;"></i></a>
                            <br>
                            <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="value" value="{{ $af->addon_value }}"/>
                          @endforeach
                          <br>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary waves-effect waves-light" id="update_add_on_values">Update</button>
                        </div>
                    </div>
                    @endif
                    <!--<div class="form-group col-md-6" id="text" style="display:none">-->
                    <!--    <label>rate</label>-->
                    <!--    <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Baby Sitting" id="add_rate" />             -->
                    <!-- </div>-->
                  </div>
                  
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Options</h4>
                     @if($role == '1')
                     <a class="btn btn-success waves-effect waves-light" id="add_new_services" style="float: right;margin-top: -43px;"><i class="fa fa-plus" aria-hidden="true"></i></a>
                     @endif
                  </div>
                  <div class="targetdiv4 slide-in1" id="mySidenav4" class="sidenav" style="display:none;">
                       <div class="card-body">
                          <form>
                             <div class="form-row">
                                <div class="form-group col-md-6">
                                   <label>Vehicle Options</label>
                                   <input data-parsley-type="number" type="text" class="form-control tribut" required placeholder="Name the option" id="add_service" />
                                </div>
<!--<div class="form-group col-md-6">                                -->
<!--<div class="btn-group" style="margin:10px;">    <!-- CURRENCY, BOOTSTRAP DROPDOWN -->
    <!--<a class="btn btn-primary" href="javascript:void(0);">Currency</a>-->                    
<!--    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><img width="10%;" src="../theme_files/external_files/car_parts/png/081-car-4.png"> Images <span class="caret"></span></a>-->
<!--    <ul class="dropdown-menu">-->
<!--        <li>-->
<!--            <center>-->
<!--            <a href="javascript:void(0);"><img src="{{ url('theme_files/external_files/car_parts/png/081-car-4.png') }}" width="10%;" /><span style="padding-left: 20px;">100</span></a>-->
<!--            </center>-->
<!--        </li>-->
<!--    </ul>-->
<!--</div>-->
<!--</div>-->
                                
                                
                                
                                <!--<div class="form-group col-md-6">-->
                                <!--    <label>Option Image</label>-->
                                <!--    <select class="form-control tribut" id="option_image_url">-->
                                <!--      <option style="background-image:url(/theme_files/external_files/car_parts/png/081-air-conditioner-4.png);">100</option>-->
                                <!--    </select> -->
                                <!--</div>-->
                                <div class="form-row formtab">
                                   <div class="form-group">
                                      <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                      <button type="button" class="btn btn-primary waves-effect waves-light" id="add_on_service">Save</button>
                                      <button type="button" onclick="close_slide2();" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
                                   </div>
                                </div>
                                <!--<img src="/theme_files/external_files/car_parts/png/081-air-conditioner-4.png">-->
                             </div>
                          </form>
                       </div>
                    </div>
                 
                  <div class="form-row formtab">
                    <div class="form-group col-md-6" id="add_on_services">
                       <label for="option_name1">Options</label><br>
                          @foreach($add_on_services as $as)
                            <?php
                            $value_count = DB::table('vehicle_features')->where('option_name',$as->master_data_id)->where('vehicle_id',$vehicle_id)->count();
                            ?>
                            <?php if($value_count == '0'){ ?>
                            <label class="checkbox-inline">
                            <input type="checkbox" name="option_name1[]" id="option_name1" value="{{ $as->master_data_id }}">
                            {{ ucfirst($as->master_value) }}</label>
                            <br>
                            <?php } ?>
                          @endforeach
                          <br>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary waves-effect waves-light" id="add_service_info">Save</button>
                        </div>
                    </div>
                    @if(count($add_on_service_values) != '0')
                    <div class="form-group col-md-6" id="add_on_features_dynamic_values">
                       <label for="option_name"><b> Addon Features Values </b></label><br>
                       <?php //print_r($add_on_features_values); ?>
                          @foreach($add_on_service_values as $af)
                            <label class="checkbox-inline">
                            {{ ucfirst($af->master_value) }}
                            <input type="hidden" name="option_name[]" value="{{ $af->vehicle_features_id }}">
                            </label>&nbsp;&nbsp;&nbsp; <a onclick="delete_addon_detail({{$af->vehicle_features_id}});"><i class="fa fa-trash" style="color:red; cursor: pointer;"></i></a>
                            <br>
                          @endforeach
                          <br>
                    </div>
                    @endif
                  </div>
               </div>
               <div class="tab-pane fade" id="vechileview" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Trip History</h4>
                  </div>
                  <table class="table table-bordered dataTable no-footer mobile-table" id="partner_list_datatable" style="table-layout:fixed; width: 100%;">
                     <thead>
                        <tr>
                           <!--<th>No</th>-->
                           <th>S No</th>
                           <th>Vehicle Name</th>
                           <th>Vehicle Type</th>
                           <th>Vehicle Number</th>
                           <th>No of Seats</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                  </table>
               </div>
               <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Documents</h4>
                  </div>
                  <div class="form-row formtab">
                     <div class="form-group col-md-6">
                        <label>Upload Registration Certificate</label>
                        <div id="fileuploader">Upload</div>
                     </div>
                     <div class="form-group col-md-6">
                        <?php
                            $uploaded_doc_info = DB::table('document_details')
                                        ->where('vehicle_id',$vehicle_info[0]->vehicle_id)
                                        ->where('file_for','rc_document')
                                        ->get();
                        ?>
                            @if( count($uploaded_doc_info) != '' )
                            <label>Download Registration Certificate</label>
                              <div class="form-group col-md-12">
                                @foreach($uploaded_doc_info as $udi)
                                <li>
                                    <a href="{{$udi->file_url}}" target=”_blank”>{{ $udi->file_orginal_name }}</a>
                                    &nbsp;&nbsp;&nbsp; <a onclick="delete_document_detail({{$udi->document_details_id}}, '{{$udi->file_path}}{{$udi->file_orginal_name}}' );"><i class="fa fa-trash" style="color:red; cursor: pointer;"></i></a>
                                </li>
                                @endforeach
                                <div class="download_vehicle_rc">
                                </div>
                            </div>
                        @else
                        @endif
                     </div>
                     <div class="form-group col-md-6">
                         <label>FC Certificate </label>
                         <div id="fc_fileuploader">Uploadss</div>            
                     </div>
                     <div class="form-group col-md-6">
                        <?php
                            $uploaded_doc_info = DB::table('document_details')
                                        ->where('vehicle_id',$vehicle_info[0]->vehicle_id)
                                        ->where('file_for','fc_document')
                                        ->get();
                        ?>
                            @if( count($uploaded_doc_info) != '' )
                              <div class="form-group col-md-12">
                                <label>Download FC Certificate</label>
                                @foreach($uploaded_doc_info as $udi)
                                <li>
                                    <a href="{{$udi->file_url}}">{{ $udi->file_orginal_name }}</a>
                                    &nbsp;&nbsp;&nbsp; <a onclick="delete_document_detail({{$udi->document_details_id}}, '{{$udi->file_path}}{{$udi->file_orginal_name}}' );"><i class="fa fa-trash" style="color:red; cursor: pointer;"></i></a>
                                </li>
                                @endforeach
                                <div class="download_vehicle_fc"></div>
                            </div>
                        @else
                        @endif
                     </div>
                    <div class="form-group col-md-6">
                         <label>Upload Insurance Certificate</label>
                        <div id="ins_fileuploader">Upload</div>
                    </div>    
                    <div class="form-group col-md-6">
                        <?php
                            $uploaded_doc_info = DB::table('document_details')
                                        ->where('vehicle_id',$vehicle_info[0]->vehicle_id)
                                        ->where('file_for','ins_document')
                                        ->get();
                        ?>
                            @if( count($uploaded_doc_info) != '' )
                              <div class="form-group col-md-12">
                                <label>Download Insurance Certificate</label>
                                @foreach($uploaded_doc_info as $udi)
                                <li>
                                    <a href="{{$udi->file_url}}">{{ $udi->file_orginal_name }}</a>
                                    &nbsp;&nbsp;&nbsp; <a onclick="delete_document_detail({{$udi->document_details_id}}, '{{$udi->file_path}}{{$udi->file_orginal_name}}' );"><i class="fa fa-trash" style="color:red; cursor: pointer;"></i></a>
                                </li>
                                @endforeach
                                <div class="download_vehicle_ins"></div>
                            </div>
                        @else
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.col-md-8 -->
      </div>
   </div>
</div>
<!-- end wrapper -->
@include('partner_dashboard.footer')
@endsection
@section('script')

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="{{ URL::asset('theme_files/external_files/js/jquery-confirm.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="{{ asset('theme_files/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('theme_files/plugins/timepicker/bootstrap-timepicker.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- Tooltipster js -->
<!--<script src="{{ asset('theme_files/plugins/tooltipster/tooltipster.bundle.min.js') }}"></script>-->
<!--<script src="{{ asset('theme_files/pages/jquery.tooltipster.js') }}"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<!--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
{!! Html::script('public/assets/jquery_upload/jquery.uploadfile.min.js') !!}
<script>

function delete_addon_detail(arg){
    var id = arg;
    var tempcsrf = $('#csrf_token').val();
    $.confirm({
          title: 'Confirm!',
          content: 'Are you sure to delete this Addon !!!',
          buttons: {
          confirm: function () {
                $.ajax({
     type: 'POST',
     url: '{{ url('delete_addon_detail') }}',
     dataType: 'json',
     data: {
            id:id,
            _token:tempcsrf
         },
          beforeSend: function () {
          },
          success: function (data) {
              if(data == "success"){
                  $.confirm({
                      title: 'Success',
                      content: 'Addon deleted successfully',
                      autoClose: 'logoutUser|300',
                        buttons: {
                        logoutUser: {
                            text: 'OK',
                            action: function () {
                            location.reload();
                            }
                        },
                     }
                  });
              }else{
                  $.alert({
                      title: 'Alert!',
                      content: "partner details already exists !!!",
                  });
              }
          }
         });
             },
              cancel: function () {
             }
          }
         });
}

function delete_document_detail(arg, arg1){
    var document_id = arg;
    var document_path = arg1;
    var tempcsrf = $('#csrf_token').val();
    $.confirm({
           title: 'Confirm!',
           content: 'Are you sure to delete this file !!!',
           buttons: {
           confirm: function () {
                $.ajax({
     type: 'POST',
     url: '{{ url('delete_document') }}',
     dataType: 'json',
     data: {
            document_id:document_id,
            document_path:document_path,
            _token:tempcsrf
         },
           beforeSend: function () {
           },
           success: function (data) {
               if(data == "success"){
                   $.confirm({
                      title: 'Success',
                      content: 'File deleted successfully',
                      autoClose: 'logoutUser|300',
                        buttons: {
                        logoutUser: {
                            text: 'OK',
                            action: function () {
                            location.reload();
                            }
                        },
                     }
                  });
               }else{
                   $.alert({
                       title: 'Alert!',
                       content: "partner details already exists !!!",
                   });
               }
           }
         });
             },
               cancel: function () {
             }
           }
         });
}

$("#new_rate_per_km").change(function(){
    if ($('#new_rate_per_km').is(":checked"))
    {
        $("#new_rate_per_hr").prop('checked', false);
    }else{
        $("#new_rate_per_hr").prop('checked', true);
    }
});
$("#new_rate_per_hr").change(function(){
    if ($('#new_rate_per_hr').is(":checked"))
    {
        $("#new_rate_per_km").prop('checked', false);
    }else{
        $("#new_rate_per_km").prop('checked', true);
    }
});
$("#single_new_rate_per_km").change(function(){
    if ($('#single_new_rate_per_km').is(":checked"))
    {
        $("#single_new_rate_per_hr").prop('checked', false);
    }else{
        $("#single_new_rate_per_hr").prop('checked', true);
    }
});
$("#single_new_rate_per_hr").change(function(){
    if ($('#single_new_rate_per_hr').is(":checked"))
    {
        $("#single_new_rate_per_km").prop('checked', false);
    }else{
        $("#single_new_rate_per_km").prop('checked', true);
    }
});
$("#vehicle_rent_option").change(function(){
    var select_option = $(this).val();
    if (select_option == "multiple"){
        $('#datepicker-multiple-date_div').show();
        $('#multi_weekdays_picker_div').hide();
        $('#multi_weekend_picker_div').hide();
        $('#vehicle_available_option_div').show();
    }else if (select_option == "weekdays"){
        $('#multi_weekdays_picker_div').show();
        $('#multi_weekend_picker_div').hide();
        $('#datepicker-multiple-date_div').hide();
        $('#vehicle_available_option_div').show();
    }else if (select_option == "weekenddays"){
        $('#multi_weekdays_picker_div').hide();
        $('#multi_weekend_picker_div').show();
        $('#datepicker-multiple-date_div').hide();
        $('#vehicle_available_option_div').show();
    }else{
        $('#multi_weekdays_picker_div').hide();
        $('#multi_weekend_picker_div').hide();
        $('#datepicker-multiple-date_div').hide();
        $('#vehicle_available_option_div').hide();
    }
});

    $('#vehicle_reg_year').datepicker({
        autoclose: true,
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
    $('#vehicle_insurance').datepicker({
        startDate: '-0d',
        autoclose: true,
        format: "yyyy/mm/dd",
    });
    $('#vehicle_fc_date').datepicker({
        startDate: '-0d',
        autoclose: true,
        format: "yyyy/mm/dd",
    });
    $('#multi_weekdays_picker').datepicker({
        autoclose: true,
        format: "yyyy-mm",
        viewMode: "months", 
        minViewMode: "months"
    });
    $('#multi_weekend_picker').datepicker({
        autoclose: true,
        format: "yyyy-mm",
        viewMode: "months", 
        minViewMode: "months"
    });
    
    
    $('#add_new_add_on').click(function(){
       $('.targetdiv3').slideUp();
       $('.targetdiv3').hide(500);
       $('#mySidenav3').slideToggle();
   });
    function close_slide1(){
    $('.targetdiv3').hide(500);
    }  
    $('#add_new_services').click(function(){
       $('.targetdiv4').slideUp();
       $('.targetdiv4').hide(500);
       $('#mySidenav4').slideToggle();
   });
    function close_slide2(){
    $('.targetdiv4').hide(500);
   } 
    function close_slide(){
    $('.targetdiv').hide(500);
}
    $('#add_new_property_rent_button').click(function(){
    $('.targetdiv').slideUp();
    $('.targetdiv').hide();
    $('#mySidenav2').slideToggle();
});
    $("#profile-tab").click(function(e){
   e.preventDefault();
    setTimeout(function () {
        $("#calendar").fullCalendar("render");
    }, 300);  
});
    $("#add_on_submit").click(function(){
        var add_on = $('#add_on').val();
        var tempcsrf = $('#csrf_token').val();
        if((add_on =='')){
            $.alert({
		        title: 'Alert!',
		        content: "Please fill all mandatory fields !!!",
		    });
        }else{
            $.ajax({
          type: 'POST',
          url: '{{ url('add_on_info') }}',
          dataType: 'json',
          data: {
              add_on:add_on,
              _token:tempcsrf
              },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data == "success"){
                        $.confirm({
                            title: 'Success',
                            content: 'Add on added successfully',
                            autoClose: 'logoutUser|300',
                             buttons: {
                             logoutUser: {
                                 text: 'OK',
                                 action: function () {
                                  location.reload();
                              }
                             },
                          }
                        });
                    }else{
                        $.alert({
            		        title: 'Alert!',
            		        content: "Add on already exists !!!",
            		    });
                    }
  	            }
              });
        }
    });
    $("#add_on_service").click(function(){
        var add_service = $('#add_service').val();
        var tempcsrf = $('#csrf_token').val();
        if((add_service =='')){
            $.alert({
		        title: 'Alert!',
		        content: "Please fill all mandatory fields !!!",
		    });
        }else{
            $.ajax({
          type: 'POST',
          url: '{{ url('add_on_service') }}',
          dataType: 'json',
          data: {
              add_service:add_service,
              _token:tempcsrf
              },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data == "success"){
                        $.confirm({
                            title: 'Success',
                            content: 'Add on services successfully',
                            autoClose: 'logoutUser|300',
                             buttons: {
                             logoutUser: {
                                 text: 'OK',
                                 action: function () {
                                  location.reload();
                              }
                             },
                          }
                        });
                    }else{
                        $.alert({
            		        title: 'Alert!',
            		        content: "Add on already exists !!!",
            		    });
                    }
  	            }
              });
        }
    });
    
    
    // function addon_value(){
    // $('.show_text').show(500);
    // }
    
    // $("#addon_value").on("click", function() {
    // $(".to-hide")[($(this).is(":checked") ? "show" : "hide")]();
    // }).trigger("click");
    
    // function myFunction() {
    //   var checkBox = document.getElementById("addon_value");
    //   var text = document.getElementById("text");
    //   if (checkBox.checked == true){
    //     text.style.display = "block";
    //   } else {
    //      text.style.display = "none";
    //   }
    // }
    
    $("#update_add_on_values").click(function(){
        var tempcsrf = $('#csrf_token').val();
        var myarray = [];
        var myarray1 = [];
        $("#add_on_features_dynamic_values input[type='hidden']").each(function(){
            // if ($(this).is(':checked')){
                var option_name = $(this).val();
                myarray.push(option_name);
            // }
        });
        $("#add_on_features_dynamic_values").children("input:text").each(function () {
            var option_name1 = $(this).val();
            if(option_name1 != ''){
                myarray1.push(option_name1);
            }
        });
        if((myarray1 =='')){
            $.alert({
		        title: 'Alert!',
		        content: "Please fill any values !!!",
		    });
        }else{
            $.ajax({
          type: 'POST',
          url: '{{ url('update_add_on_details') }}',
          dataType: 'json',
          data: {
              feature_id:myarray,
              values:myarray1,
              _token:tempcsrf
              },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data == "success"){
                         $.confirm({
                            title: 'Success',
                            content: 'Add on value updated successfully',
                            autoClose: 'logoutUser|300',
                             buttons: {
                             logoutUser: {
                                 text: 'OK',
                                 action: function () {
                                  location.reload();
                              }
                             },
                          }
                        });
                    }else{
                        $.alert({
            		        title: 'Alert!',
            		        content: "Add on already exists !!!",
            		    });
                    }
  	            }
              });
        }
    });
    
    
    function myfunction(arg){
        if ($('#'+arg+'check').is(":checked")){
            $('#'+arg+'value').show();
        }else{
            $('#'+arg+'value').hide();
            $('#'+arg+'value').val('');
        }
    }
    $("#add_add_on").click(function(){
        var vehicle_id = $('#vehicle_id').val();
        var addon_value = $('#addon_value').val();
        var tempcsrf = $('#csrf_token').val();
        var myarray = [];
        var myarray1 = [];
        $("#add_on_features input[type='checkbox']").each(function(){
            if ($(this).is(':checked')){
                var option_name = $(this).val();
                myarray.push(option_name);
            }
        });
        $("#add_on_features").children("input:text").each(function () {
            var option_name1 = $(this).val();
            if(option_name1 != ''){
                myarray1.push(option_name1);
            }
        });
        alert(myarray);
        alert(myarray1);
    //     if((myarray =='')){
    //         $.alert({
		  //      title: 'Alert!',
		  //      content: "Please fill all mandatory fields !!!",
		  //  });
    //     }else{
    //         $.ajax({
    //       type: 'POST',
    //       url: '{{ url('add_on_details') }}',
    //       dataType: 'json',
    //       data: {
    //           vehicle_id:vehicle_id,
    //           option_name:myarray,
    //           option_value:myarray1,
    //           _token:tempcsrf
    //           },
    //             beforeSend: function () {
    //             },
    //             success: function (data) {
    //                 if(data == "success"){
    //                      $.confirm({
    //                         title: 'Success',
    //                         content: 'Add on added successfully',
    //                         autoClose: 'logoutUser|300',
    //                          buttons: {
    //                          logoutUser: {
    //                              text: 'OK',
    //                              action: function () {
    //                               location.reload();
    //                           }
    //                          },
    //                       }
    //                     });
    //                 }else{
    //                     $.alert({
    //         		        title: 'Alert!',
    //         		        content: "Add on already exists !!!",
    //         		    });
    //                 }
  	 //           }
    //           });
    //     }
    });
    
    $("#add_service_info").click(function(){
        // alert();
        var vehicle_id = $('#vehicle_id').val();
        var option_name1 = $('#option_name1').val();
        var tempcsrf = $('#csrf_token').val();
        
        var myarray = [];
        $("#add_on_services input[type='checkbox']").each(function(){
            if ($(this).is(':checked')){ 
                var option_name1 = $(this).val();
              myarray.push(option_name1);
            }
        });
        if((myarray =='')){
            $.alert({
		        title: 'Alert!',
		        content: "Please fill all mandatory fields !!!",
		    });
        }else{
            $.ajax({
          type: 'POST',
          url: '{{ url('add_service_details') }}',
          dataType: 'json',
          data: {
              vehicle_id:vehicle_id,
              option_name1:myarray,
              _token:tempcsrf
              },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data == "success"){
                         $.confirm({
                            title: 'Success',
                            content: 'Add on added successfully',
                            autoClose: 'logoutUser|300',
                             buttons: {
                             logoutUser: {
                                 text: 'OK',
                                 action: function () {
                                  location.reload();
                              }
                             },
                          }
                        });
                    }else{
                        $.alert({
            		        title: 'Alert!',
            		        content: "Add on already exists !!!",
            		    });
                    }
  	            }
              });
        }
    });

$('#add_new_rent_submit').click(function(){
    if ($('#single_new_rate_per_km').is(":checked"))
    {
        var rent_option = 1;
    } else{
        var rent_option = 2;
    }
    var vehicle_id = $('#vehicle_id').val();
    var rent = $('#new_rent_value').val();
    var date = $('#new_rent_date').val();
    var single_vehicle_available_option = $('#single_vehicle_available_option').val();
    var tempcsrf = $('#csrf_token').val(); 
    if((rent == '')||(single_vehicle_available_option == '')){
      $.alert({
               title: 'Alert!',
               content: "Please fill all Rent fields !!!",
         });
    }else{
    $.ajax({
      type: 'POST',
      url: '{{url('add_new_rent')}}',
      dataType: 'json',
      data: {
        vehicle_id:vehicle_id,
        rent:rent,
        date:date,
        rent_option:rent_option,
        single_vehicle_available_option:single_vehicle_available_option,
       _token:tempcsrf
      },
      success: function (){
        //  location.reload();
        $.confirm({
                   title: 'Success',
                   content: 'Rent added successfully',
                   autoClose: 'logoutUser|300',
                    buttons: {
                    logoutUser: {
                        text: 'OK',
                        action: function () {
                            $('.targetdiv').hide('slide',{direction: 'left'}, 750);
                            $("#calendar").fullCalendar('refetchEvents');
                            $('#new_rent_value').val('');
                            $('#new_rent_date').val('');
                            $('#single_vehicle_available_option').val('');
                      }
                    },
                  }
                });
      }
    });
    }
});
    $("#add_new_multidate_rent").click(function(){
    if ($('#new_rate_per_km').is(":checked"))
    {
        var rent_option = 1;
    } else{
        var rent_option = 2;
    }
    var vehicle_rent_option = $('#vehicle_rent_option').val();
    var date = $('#datepicker-multiple-date').val();
    var weekdays = $('#multi_weekdays_picker').val();
    var weekenddays = $('#multi_weekend_picker').val();
    var vehicle_id = $('#vehicle_id').val();
    var rent = $('#multi_rent').val();
    var vehicle_available_option = $("#vehicle_available_option").val();
    var tempcsrf = $('#csrf_token').val();
    if(vehicle_rent_option != 'default'){
        if((vehicle_rent_option =='')||(rent =='')||(vehicle_available_option == '')){
        $.alert({
   	        title: 'Alert!',
   	        content: "Please fill all mandatory fields !!!",
   	    });
       }else{
           $.ajax({
         type: 'POST',
          url: '{{url('add_multidate_rent')}}',
         dataType: 'json',
         data: {
            rent_option:rent_option,
            vehicle_rent_option:vehicle_rent_option,
             date:date,
             weekdays:weekdays,
             weekenddays:weekenddays,
             vehicle_id:vehicle_id,
             rent:rent,
             vehicle_available_option:vehicle_available_option,
             _token:tempcsrf
             },
               beforeSend: function () {
               },
               success: function (data) {
                   if(data == "success"){
                        $('#date_periods').val('');
                        $('#multi_rent').val('');
                       $.confirm({
                           title: 'Success',
                           content: 'Rent added successfully',
                           autoClose: 'logoutUser|300',
                            buttons: {
                            logoutUser: {
                                text: 'OK',
                                action: function () {
                                    $('.targetdiv').hide('slide',{direction: 'left'}, 750);
                                    $("#calendar").fullCalendar('refetchEvents');
                                    $('#vehicle_rent_option').val('');
                                    $('#datepicker-multiple-date').val('');
                                    $('#multi_weekdays_picker').val('');
                                    $('#multi_weekend_picker').val('');
                                    $('#multi_rent').val('');
                                    $("#vehicle_available_option").val('');
                              }
                            },
                          }
                       });
                   }
  	            }
             });
       }
    }else{
       if((vehicle_rent_option =='')||(rent =='')){
        $.alert({
   	        title: 'Alert!',
   	        content: "Please fill all mandatory fields !!!",
   	    });
       }else{
           $.ajax({
         type: 'POST',
          url: '{{url('add_multidate_rent')}}',
         dataType: 'json',
         data: {
            rent_option:rent_option,
            vehicle_rent_option:vehicle_rent_option,
             date:date,
             weekdays:weekdays,
             weekenddays:weekenddays,
             vehicle_id:vehicle_id,
             rent:rent,
             vehicle_available_option:vehicle_available_option,
             _token:tempcsrf
             },
               beforeSend: function () {
               },
               success: function (data) {
                   if(data == "success"){
                        $('#date_periods').val('');
                        $('#multi_rent').val('');
                       $.confirm({
                           title: 'Success',
                           content: 'Rent added successfully',
                           autoClose: 'logoutUser|300',
                            buttons: {
                            logoutUser: {
                                text: 'OK',
                                action: function () {
                                    $('.targetdiv').hide('slide',{direction: 'left'}, 750);
                                    $("#calendar").fullCalendar('refetchEvents');
                                    $('#vehicle_rent_option').val('');
                                    $('#datepicker-multiple-date').val('');
                                    $('#multi_weekdays_picker').val('');
                                    $('#multi_weekend_picker').val('');
                                    $('#multi_rent').val('');
                                    $("#vehicle_available_option").val('');
                              }
                            },
                          }
                       });
                   }
  	            }
             });
       }
    }
   });
   
$(".dropdown-menu li a").click(function () {
    var selText = $(this).text();
    var imgSource = $(this).find('img').attr('src');
    var img = '<img src="' + imgSource + '"/>';        
    $(this).parents('.btn-group').find('.dropdown-toggle').html(img + ' ' + selText + ' <span class="caret"></span>');
});
   
    $(document).ready(function() {
      var partner_id = $("#partner_id").val();
      var vehicle_id = $("#vehicle_id").val();
      var tempcsrf = $('#csrf_token').val();
      var default_vehicle_rent = $("#default_vehicle_rent").val();
      var calendar = $('#calendar').fullCalendar({
        aspectRatio: 2.5,
        cache:false,
        editable:true,
        header:{
        left:'prev,next',
        center:'title',
        right:'today'
       },
       events: {
              url: '{{ url('load_vehicle_data') }}',
              data: {
                  partner_id:partner_id,
                  vehicle_id:vehicle_id,
                 },_token:tempcsrf
          },
       selectable:true,
       selectHelper:true,
       select: function(start, end,)
       {
        var s = $.fullCalendar.formatDate(start, "DD-MM-Y");
        var fs = $.fullCalendar.formatDate(start, "Y-MM-DD");
            jQuery('.targetdiv').slideUp();
            jQuery('.targetdiv').hide();
            jQuery('#mySidenav1').slideToggle();
            $("#add_rent_for_date").text(s);
            $("#new_rent_date").val(fs);
       },
       editable:true,
       eventClick:function(event)
       {
           jQuery('.targetdiv').slideUp();
           jQuery('.targetdiv').hide();
           jQuery('#mySidenav'+event.id).slideToggle();
       },
      });
    });

    $("#update_bacic_info_submit").click(function(){
        var vehicle_brand = $("#vehicle_brand").val();
        var vehicle_model = $("#vehicle_model").val();
        var vehicle_reg_no = $("#vehicle_reg_no").val();
        var vehicle_type = $("#vehicle_type").val();
        var vehicle_ac_type = $("#vehicle_ac_type").val();
        var vehicle_driving_type = $("#vehicle_driving_type").val();
        var vehicle_color = $("#vehicle_color").val();
        var vehicle_fuel_type = $("#vehicle_fuel_type").val();
        var vehicle_max_speed = $("#vehicle_max_speed").val();
        var vehicle_running_km = $("#vehicle_running_km").val();
        var vehicle_reg_year = $("#vehicle_reg_year").val();
        var vehicle_insurance = $("#vehicle_insurance").val();
        var vehicle_fc_date = $("#vehicle_fc_date").val();
        var vehicle_seat_type = $("#vehicle_seat_type").val();
        var vehicle_seat_count = $("#vehicle_seat_count").val();
        var available_status = $("#available_status").val();
        var vehicle_condition = $("#vehicle_condition").val();
        var partner_id = $('#partner_id').val();
        var vehicle_id = $('#vehicle_id').val();
        var tempcsrf = $('#csrf_token').val();
        if((vehicle_type =='')||(vehicle_model =='')||(vehicle_brand =='')||(vehicle_reg_no =='')||(vehicle_ac_type =='')||(vehicle_max_speed =='')||(vehicle_running_km =='')||(vehicle_reg_year =='')||(vehicle_seat_type =='')||(vehicle_seat_count =='')||(available_status =='')||(vehicle_condition =='')||(vehicle_color =='')||(vehicle_fuel_type =='')||(vehicle_driving_type =='')){
            $.alert({
                title: 'Alert!',
                content: "Please fill all mandatory fields !!!",
            });
        }else{
            $.ajax({
          type: 'POST',
          url: '{{ url('update_new_vehicle') }}',
          dataType: 'json',
          data: {
                vehicle_brand : vehicle_brand,
                vehicle_model : vehicle_model,
                vehicle_reg_no : vehicle_reg_no,
                vehicle_type:vehicle_type,
                vehicle_ac_type : vehicle_ac_type,
                vehicle_driving_type : vehicle_driving_type,
                vehicle_color : vehicle_color,
                vehicle_fuel_type : vehicle_fuel_type,
                vehicle_max_speed : vehicle_max_speed,
                vehicle_running_km : vehicle_running_km,
                vehicle_reg_year : vehicle_reg_year,
                vehicle_insurance : vehicle_insurance,
                vehicle_fc_date : vehicle_fc_date,
                vehicle_seat_type : vehicle_seat_type,
                vehicle_seat_count : vehicle_seat_count,
                available_status : available_status,
                vehicle_condition : vehicle_condition,
                partner_id:partner_id,
                vehicle_id:vehicle_id,
                _token:tempcsrf
              },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data == "success"){
                           $.confirm({
                               title: 'Success',
                               content: 'Vehicle info updated successfully',
                               autoClose: 'logoutUser|300',
                                buttons: {
                                logoutUser: {
                                    text: 'OK',
                                },
                             }
                           });
                       }else{
                        $.alert({
                            title: 'Alert!',
                            content: "vehicle details already exists !!!",
                        });
                    }
                }
              });
         }
   });

    // $("#vehicle_model").keyup(function() {
//         var inpObj = document.getElementById("vehicle_model");
//         var regex = /^[A-Za-z ]+$/;
//         if (regex.test(this.value) !== true)
//         this.value = this.value.replace(/[^A-Za-z +-.,]+/, '');
//         if (!inpObj.checkValidity()) {
//         document.getElementById("demo").innerHTML = inpObj.validationMessage;
//         }
//     });

    $("#vehicle_max_speed").keyup(function() {
        var inpObj = document.getElementById("vehicle_max_speed");
        var regex = /^[0-9 +.,]+$/;
        if (regex.test(this.value) !== true)
        this.value = this.value.replace(/[^0-9 +.,]+/, '');
        if (!inpObj.checkValidity()) {
        document.getElementById("demo").innerHTML = inpObj.validationMessage;
        }
      });
    $("#vehicle_running_km").keyup(function() {
        var inpObj = document.getElementById("vehicle_running_km");
        var regex = /^[0-9 +.,]+$/;
        if (regex.test(this.value) !== true)
        this.value = this.value.replace(/[^0-9 +.,]+/, '');
        if (!inpObj.checkValidity()) {
        document.getElementById("demo").innerHTML = inpObj.validationMessage;
        }
      }); 
      
    $(".doc_uploader_class").click(function(){
   var tempcsrf = $('#csrf_token').val();
   var partner_id = $('#partner_id').val();
   var vehicle_id = $('#vehicle_id').val();
//   alert(inserted_vehicle_id);
   var general_file_for = "general_document";
   var fc_file_for = "fc_document";
   var rc_file_for = "rc_document";
   var ins_file_for = "ins_document";
   var image_file_for = "image_document";
   var extraObj1 = $("#fileuploader").uploadFile({
       dataType: 'json',
       url:"{{ url('upload_vehicle_document') }}",
       fileName:"myfile",
       formData: {
            partner_id: partner_id,
            vehicle_id: vehicle_id,
            rc_file_for: rc_file_for,
            action: 'upload_vehicle_document',
             _token: tempcsrf
       },
    showDelete: true,
    // showDone: true,
    multiple:false,
    dragDrop:false,
   // //maxFileCount:1,
    showProgress: false,
   // sequential:true,
   // reset:true,
   // // maxFileSize:3000*1024,
    // autoSubmit:true,
   onSuccess: function (files, data, xhr) {
$(".download_vehicle_rc").html("<li><a href='"+data[0]+"' target='_blank'>"+data[1]+"</a><a onclick='delete_document_detail('"+data[2]+","+data[3]+"');'><i class='fa fa-trash' style='color:red; cursor: pointer;margin-left: 15px; display: none;'></i></a></li>");
        console.log(data);
$(".ajax-file-upload-container").hide();
        $.confirm({
                    title: 'Success',
                    content: 'Document Uploaded successfully',
                    autoClose: 'logoutUser|300',
                     buttons: {
                     logoutUser: {
                         text: 'OK',
                    //      action: function () {
                    //       location.reload();
                    //   }
                     },
                  }
                });
        
   },
   onError: function(files,status,errMsg,pd)
   {
   },
   });
   
   var extraObj2 = $("#fc_fileuploader").uploadFile({
       dataType: 'json',
       url:"{{ url('upload_vehicle_document') }}",
       fileName:"myfile",
       formData: {
            partner_id: partner_id,
            vehicle_id: vehicle_id,
            fc_file_for: fc_file_for,
            action: 'upload_vehicle_document',
             _token: tempcsrf
       },
    showDelete: true,
    // showDone: true,
    multiple:false,
    dragDrop:false,
   // //maxFileCount:1,
    showProgress: false,
   // sequential:true,
   // reset:true,
   // // maxFileSize:3000*1024,
    // autoSubmit:true,
   onSuccess: function (files, data, xhr) {
        $(".download_vehicle_fc").html("<li><a href='"+data[0]+"' target='_blank'>"+data[1]+"</a><a onclick='delete_document_detail('"+data[2]+","+data[3]+"');'><i class='fa fa-trash' style='color:red; cursor: pointer;margin-left: 15px; display: none;'></i></a></li>");
        console.log(data);
        $(".ajax-file-upload-container").hide();
        $.confirm({
                    title: 'Success',
                    content: 'Document Uploaded successfully',
                    autoClose: 'logoutUser|300',
                     buttons: {
                     logoutUser: {
                         text: 'OK',
                    //      action: function () {
                    //       location.reload();
                    //   }
                     },
                  }
                });
        
   },
   onError: function(files,status,errMsg,pd)
   {
   },
   });
   
   var extraObj3 = $("#ins_fileuploader").uploadFile({
       dataType: 'json',
       url:"{{ url('upload_vehicle_document') }}",
       fileName:"myfile",
       formData: {
            partner_id: partner_id,
            vehicle_id: vehicle_id,
            ins_file_for: ins_file_for,
            action: 'upload_vehicle_document',
            _token: tempcsrf
       },
    showDelete: true,
    // showDone: true,
    multiple:false,
    dragDrop:false,
   // //maxFileCount:1,
    showProgress: false,
   // sequential:true,
   // reset:true,
   // // maxFileSize:3000*1024,
    // autoSubmit:true,
    onSuccess: function (files, data, xhr) {
        $(".download_vehicle_ins").html("<li><a href='"+data[0]+"' target='_blank'>"+data[1]+"</a><a onclick='delete_document_detail('"+data[2]+","+data[3]+"');'><i class='fa fa-trash' style='color:red; cursor: pointer;margin-left: 15px; display: none;'></i></a></li>");
        console.log(data);
        $(".ajax-file-upload-container").hide();
        $.confirm({
                    title: 'Success',
                    content: 'Document Uploaded successfully',
                    autoClose: 'logoutUser|300',
                     buttons: {
                     logoutUser: {
                         text: 'OK',
                    //      action: function () {
                    //       location.reload();
                    //   }
                     },
                  }
                });
        
    },
   onError: function(files,status,errMsg,pd)
   {
   },
   });
   
   var extraObj4 = $("#imag_uploader").uploadFile({
       dataType: 'json',
      url:"{{ url('upload_vehicle_document') }}",
       fileName:"myfile",
       formData: {
            partner_id: partner_id,
            vehicle_id: vehicle_id,
            image_file_for: image_file_for,
            action: 'upload_vehicle_document',
            _token: tempcsrf
       },
    showDelete: true,
    // showDone: true,
    multiple:true,
    dragDrop:true,
   // //maxFileCount:1,
    showProgress: false,
   // sequential:true,
   // reset:true,
   // // maxFileSize:3000*1024,
    // autoSubmit:true,
   onSuccess: function (files, data, xhr) {
       // $('.profilepic').text(data);
        console.log(data);
        $(".profilepic").html("<img style='height: 250px;' src='upload/partner/<?php echo Session::get('user_id'); ?>/profile_images/"+data+"'/>");
        $(".addnew").hide();
        $('#loading').text('');
        $.confirm({
                title: 'Success',
                content: 'vehicle image added successfully',
                autoClose: 'logoutUser|300',
                 buttons: {
                 logoutUser: {
                     text: 'OK',
                     action: function () {
                      location.reload();
                  }
                 },
              }
            });
   },
   onError: function(files,status,errMsg,pd)
   {
   },
   });
   
   
//   $("#extrabutton").click(function(){
//   extraObj.startUpload();
//   });
});



    $(document).ready(function(){
     $("a").click(function(){
       $("button").slideToggle();
     });
   });
    $(function() {
            // $( "#datepicker-13" ).datepicker();
            // $( "#datepicker-13" ).datepicker("show");
            $("#datepicker-13").datepicker({
                format: "yyyy/mm/dd",
                autoclose: true,
            });
        });
    $('#carouselExample').on('slide.bs.carousel', function (e) {
        
       var $e = $(e.relatedTarget);
       var idx = $e.index();
       var itemsPerSlide = 4;
       var totalItems = $('.carousel-item').length;
       
       if (idx >= totalItems-(itemsPerSlide-1)) {
           var it = itemsPerSlide - (totalItems - idx);
           for (var i=0; i<it; i++) {
               // append slides to end
               if (e.direction=="left") {
                   $('.carousel-item').eq(i).appendTo('.carousel-inner');
               }
               else {
                   $('.carousel-item').eq(0).appendTo('.carousel-inner');
               }
           }
       }
   });
    $('#carouselExample').carousel({ 
                   interval: 2000
           });
    $(document).ready(function() {
   /* show lightbox when clicking a thumbnail */
       $('a.thumb').click(function(event){
         event.preventDefault();
         var content = $('.modal-body');
         content.empty();
           var title = $(this).attr("title");
           $('.modal-title').html(title);        
           content.html($(this).html());
           $(".modal-profile").modal({show:true});
       });
   
     });
</script>

@endsection
