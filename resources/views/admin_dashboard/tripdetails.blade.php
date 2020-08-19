@extends('layouts.adminmaster')
@section('content')
<header id="topnav">
   @include('admin_dashboard.menu')
</header>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link href="{{ asset('theme_files/external_files/css/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css" />
{!! Html::style('public/assets/jquery_upload/uploadfile.css') !!}
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<script src="{{ asset('theme_files/external_files/esign/signature.js') }}"></script>



<style>
   .bredim {
   background-color: #071DAA;
   padding: 2% 10% 10px;
   } 
   .wrapper {
   padding-top: 80px;
   }
   .myButton {
   padding: .2em 1em;
   font-size: 1em;
   }
   .mySelect {
   padding: .2em 0;
   font-size: 1em;
   }
   .tab-pane {
   background-color: #fff;
   }
   .formtab{
   padding:20px;
   }
   .formtab1{
   padding:20px;
   background-color:#fff;
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
   .nav-pills .nav-link {
   border-radius: 30px;
   text-align: center;
   margin-bottom: 25px;
   border: 1px solid #12b3b6;
   color: #21366b;
   font-size:16px;
   }
   .nav-pills .nav-link.active {
   background-color: #12b3b6;
   }
   button#apply {
   /* float: right; */
   margin-top: 30px;
   padding: 7px 40px;
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
   .nav-pills .nav-link {
   border-radius: 30px;
   text-align: center;
   margin-bottom: 25px;
   /* border: 1px solid #12b3b6; */
   color: #21366b;
   font-size: 12px;
   }
   .nav>li>a {
   padding: 7px 20px !important;
   -webkit-box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
   -moz-box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
   box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
   }
   .nav>li>a:focus, .nav>li>a:hover {
   text-decoration: none;
   background-color: #13b0b8;
   padding: 7px 20px !important;
   vertical-align: super !important;
   color: #fff;
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
   margin-bottom: 20px; 
   background-color:#fff;
   }
   button#btnFA {
   display: block;
   margin: 0 auto;
   }
   label {
   color: #223770;
   font-weight: bold;
   }
   h2 {
   font-size: 20px;
   color: #24366b;
   font-weight: 500;
   margin: 0px 20px 20px;
   text-align: center;
   }
   textarea.description {
   border: 1px solid #ddd;
   border-radius: 3px;
   }
   .namelabel1 {
   text-align: center;
   color: #009688;
   font-weight: 700;
   font-size: 20px;
   }
   label.tripdetail {
   float: left;
   padding-right: 10px;
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
   label.spare {
   float: left;
   }
   i.fa.fa-trash {
   color: red;
   }
   .bab {
   margin-left: 10px;
   }
   button.compare {
   float: right;
   font-size: 15px;
   border: none;
   background-color: #14b1ba;
   color: #fff;
   padding: 10px 44px;
   font-weight: 500;
   }
   .carousel-control-next, .carousel-control-prev {
   position: absolute;
   top: 50% !important;
   }
   .bg-shadow {
   -webkit-box-shadow: 0px 0px 10px -4px rgba(0,0,0,0.75);
   -moz-box-shadow: 0px 0px 10px -4px rgba(0,0,0,0.75);
   box-shadow: 0px 0px 10px -4px rgba(0,0,0,0.75);
   }
   .nav-tabs .nav-link.active {
   color: #ffffff;
   background-color: #12b3b6;
   border-color: #12b3b6 #12b3b6 #12b3b6;
   font-weight: bold;
   }
   .nav-tabs .nav-link {
   color: #12b3b6;
   }
   span.namelab {
   color: #12b3b6;
   }
   label.uploadpre {
   font-size: 20px;
   }
   .activwin{
   padding: 2%;
   background-color: rgb(221 221 221 / 31%);
   }
   td.fourfiv {
   color: #12b3b6;
   font-size: 20px;
   }
   a.closetrip {
   color: #fff !important;
   font-weight: bold;
   }
   .tripclose {
   background-color: #12b3b6;
   padding: 20px;
   width: 50%;
   text-align: center;
   margin: 0 auto;
   }
   h5.uploaddate {
   color: #15b5ba;
   text-align: center;
   padding: 20px 0px;
   font-size: 20px;
   }
   p.tagsam {
   text-align: center;
   padding: 20px 0px;
   font-size: 17px;
   background-color: #e1e1e4;
   color: #23376c;
   font-weight: 600;
   }
</style>
<div class="wrapper">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-2 mb-3">
            <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Trip Details</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Vehicle Photos</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Document & Agreement</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="contact-tab1" data-toggle="tab" href="#partner" role="tab" aria-controls="contact" aria-selected="false">Pickup & drop Vehicles</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#partner1" role="tab" aria-controls="contact" aria-selected="false">Payment</a>
               </li>
            </ul>
         </div>
         <input type="hidden" class="form-control" id="trip_id" value="{{ $trip_info[0]->trip_details_id }}" >
         <input type="hidden" class="form-control" id="reservation_id" value="{{ $trip_info[0]->reservation_id }}" >
         <!-- /.col-md-4 -->
         <div class="col-md-10">
            <div class="form-row formtab1 pauim">
               <div class="col-md-4">
                  <div class="form-group col-md-12">
                     <div class="form-group">
                        <label for="vehicle Model" class="tripdetail">Name:</label>
                        <div class="namelabel">{{ $trip_info[0]->customer_name }}</div>
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="form-group">
                        <label for="Vehicle Color" class="tripdetail">Phone:</label>
                        <div class="namelabel">{{ $trip_info[0]->customer_phone }}</div>
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="form-group">
                        <label for="Vehicle Color" class="tripdetail">Email:</label>
                        <div class="namelabel">{{ $trip_info[0]->customer_email }}</div>
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="form-group">
                        <label for="Location" class="tripdetail">Address:</label>
                        <div class="namelabel">NO:4, Kamarajar Street,Pondicherry-605004</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group col-md-12">
                     <div class="form-group">
                        <label for="vehicle Model" class="tripdetail">Reservation Id:</label>
                        <div class="namelabel">{{ $trip_info[0]->reserve_unique_id }}</div>
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="form-group">
                        <label for="Vehicle Color" class="tripdetail">Partner Name:</label>
                        <div class="namelabel">{{ $trip_info[0]->partner_name }}</div>
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="form-group">
                        <label for="Vehicle Color" class="tripdetail">Reservation Date:</label>
                        <div class="namelabel">{{ $trip_info[0]->reservation_date }}</div>
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="form-group">
                        <label for="Vehicle Color" class="tripdetail">Vehicle Reg No:</label>
                        <div class="namelabel">{{ $trip_info[0]->vehicle_reg_no }}</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group col-md-12">
                     <div class="form-group">
                        <label for="vehicle Model" class="tripdetail">Reservation Via:</label>
                        <div class="namelabel">{{ $trip_info[0]->reserve_through }}</div>
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="form-group">
                        <label for="Vehicle Color" class="tripdetail">Reservation Amount:</label>
                        <div class="namelabel">{{ $trip_info[0]->reservation_amount }}</div>
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="form-group">
                        <label for="Vehicle Color" class="tripdetail">Date</label>
                        <div class="namelabel">{{ $trip_info[0]->start_date }} To {{ $trip_info[0]->return_date }}</div>
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="form-group">
                        <label for="Location" class="tripdetail">Paid Amount</label>
                        <div class="namelabel">{{ $trip_info[0]->paid_amount }}</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Trip Details</h4>
                  </div>
                  <div class="form-row formtab">
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="vehicle_reg_no" value="{{ $trip_info[0]->vehicle_reg_no }}" placeholder="Phone Number" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Phone Number">Vehicle Reg No</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="phone" value="{{ $trip_info[0]->vehicle_reg_no }}" placeholder="Phone Number" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Phone Number">Vehicle Model</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="phone" value="{{ $trip_info[0]->partner_name }}" placeholder="Phone Number" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Phone Number">Partner Name</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" value="{{ $trip_info[0]->start_date }}" placeholder="mm/dd/yyyy" disabled id="return_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                              </div>
                           </div>
                           <!-- input-group -->
                           <label for="Booking Dates">Trip Start Date(Expected) </label>  
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" value="{{ $trip_info[0]->return_date }}" placeholder="mm/dd/yyyy" disabled id="return_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                              </div>
                           </div>
                           <!-- input-group -->
                           <label for="Booking Dates">Trip End Date(Expected) </label>  
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" value="{{ $trip_info[0]->return_date }}" placeholder="mm/dd/yyyy" disabled id="return_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                              </div>
                           </div>
                           <!-- input-group -->
                           <label for="Booking Dates">Trip End Date </label>  
                        </div>
                     </div>
                     <div class="formrow formtab" style="width:100%;">
                        <div class="col-md-12 ">
                           <nav>
                              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                 <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Addons</a>
                                 <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Extra Accessories</a>
                                 <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Services</a>
                              </div>
                           </nav>
                           <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                 <div class="alert alert-success alert-dismissible">
                                    <a class="btn btn-success waves-effect waves-light" id="add_new_add_on" style="float: right;"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    <br>
                                    <div class="targetdiv3 slide-in1" id="mySidenav3" class="sidenav" style="display:none;margin-top: -5%;margin-bottom: -5%;">
                                       <div class="card-body">
                                          <form>
                                             <div class="form-row">
                                                <div class="form-group col-md-6">
                                                   <label>Add on Features </label>
                                                   <input data-parsley-type="number" type="text" class="form-control tribut" required placeholder="name the add on" id="add_on" />
                                                </div>
                                                <div class="form-row formtab">
                                                   <div class="form-group" style="margin-top: 5%;">
                                                      <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                                      <button type="button" class="btn btn-primary waves-effect waves-light" id="add_on_submit">Save</button>
                                                      <button type="button" onclick="close_slide1();" id="close_tab" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <label class="spare">Spare Tyre/200</label> 
                                          <i class="fa fa-trash bab"></i>
                                       </div>
                                       <div class="col-md-12">
                                          <label class="spare">Baby Seat/200</label> 
                                          <i class="fa fa-trash bab"></i>
                                       </div>
                                       <div class="col-md-12">
                                          <label class="spare">Cup Stand/100</label> 
                                          <i class="fa fa-trash bab"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                 <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <label class="spare">Spare Tyre/200</label> 
                                          <i class="fa fa-check bab ret"></i>
                                       </div>
                                       <div class="col-md-12">
                                          <label class="spare">Baby Seat/200</label> 
                                          <i class="fa fa-trash bab"></i>
                                       </div>
                                       <div class="col-md-12">
                                          <label class="spare">Cup Stand/100</label> 
                                          <i class="fa fa-trash bab"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                 <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <label class="spare">Spare Tyre/200</label> 
                                          <i class="fa fa-check bab ret"></i>
                                       </div>
                                       <div class="col-md-12">
                                          <label class="spare">Baby Seat/200</label> 
                                          <i class="fa fa-trash bab"></i>
                                       </div>
                                       <div class="col-md-12">
                                          <label class="spare">Cup Stand/100</label> 
                                          <i class="fa fa-trash bab"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Vehicle Photos <button class="compare" id="add_new_partner_button">Compare</button></h4>
                  </div>
                  <div class="row" style="display : none" id="add_new_partner_tab">
                     <div class="col-lg-12">
                        <div class="card-box" style="padding:20px;">
                           <h4 class="page-title">Compare Vehicle Photos<span id="" style="cursor: pointer;" class="close_location_tab pull-right"><i class="mdi mdi-close"></i></span></h4>
                           <hr>
                           <form>
                              <div class="form-row">
                                 <div class="form-group col-md-6">
                                    <div class="comparehphoto bg-shadow">
                                       <h5 class="uploaddate">Uploaded Date:20-12-2019</h5>
                                       <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive">
                                       <p class="tagsam">Tag: SampleText</p>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <div class="comparehphoto bg-shadow">
                                       <h5 class="uploaddate">Uploaded Date:20-12-2019</h5>
                                       <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive">
                                       <p class="tagsam">Tag: SampleText</p>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <div class="comparehphoto bg-shadow">
                                       <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive">
                                       <p class="tagsam">Tag: SampleText</p>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <div class="comparehphoto bg-shadow">
                                       <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive">
                                       <p class="tagsam">Tag: SampleText</p>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <h2>Pre Trip Photos</h2>
                  </div>
                  <div id="demo" class="carousel slide" data-ride="carousel">
                     <!-- Indicators -->
                     <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                     </ul>
                     <!-- The slideshow -->
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="form-row formtab">
                              <div class="form-group col-md-4">
                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                              </div>
                              <div class="form-group col-md-4">
                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                              </div>
                              <div class="form-group col-md-4">
                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="form-row formtab">
                              <div class="form-group col-md-4">
                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                              </div>
                              <div class="form-group col-md-4">
                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                              </div>
                              <div class="form-group col-md-4">
                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="form-row formtab">
                           <div class="form-group col-md-4">
                              <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                           </div>
                           <div class="form-group col-md-4">
                              <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                           </div>
                           <div class="form-group col-md-4">
                              <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <h2>Post Trip Photos</h2>
                  </div>
                  <div id="demo1" class="carousel slide" data-ride="carousel">
                     <!-- Indicators -->
                     <ul class="carousel-indicators">
                        <li data-target="#demo1" data-slide-to="0" class="active"></li>
                        <li data-target="#demo1" data-slide-to="1"></li>
                        <li data-target="#demo1" data-slide-to="2"></li>
                     </ul>
                     <!-- The slideshow -->
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="form-row formtab">
                              <div class="form-group col-md-4">
                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                              </div>
                              <div class="form-group col-md-4">
                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                              </div>
                              <div class="form-group col-md-4">
                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="form-row formtab">
                              <div class="form-group col-md-4">
                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                              </div>
                              <div class="form-group col-md-4">
                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                              </div>
                              <div class="form-group col-md-4">
                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="form-row formtab">
                           <div class="form-group col-md-4">
                              <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                           </div>
                           <div class="form-group col-md-4">
                              <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                           </div>
                           <div class="form-group col-md-4">
                              <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Left and right controls -->
                  <a class="carousel-control-prev" href="#demo1" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                  </a>
                  <a class="carousel-control-next" href="#demo1" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                  </a>
               </div>
               <div class="tab-pane fade" id="partner1" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">payment details</h4>
                  </div>
                  <div class="table-responsive formtab">
                     <table class="table">
                        <thead>
                           <tr>
                              <th>Items</th>
                              <th>Description</th>
                              <th>Total Price</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>Vehicle Rent</td>
                              <td>
                                 @foreach($date_array as $key=> $date)
                                 {{ $date }} ---------- {{ $rent_array[$key] }} <br>
                                 @endforeach
                                 @foreach($default_array as $key=> $date)
                                 {{ $date }} ---------- {{ $reserv_details[0]->vehicle_default_rent }} <br>
                                 @endforeach
                              </td>
                              <td>
                                 <?php 
                                    $spl_total = array_sum($rent_array);
                                    $nrm_total = count($default_array) * $reserv_details[0]->vehicle_default_rent;
                                    $total_rent = $spl_total + $nrm_total?>
                                 {{ $total_rent }}
                              </td>
                           </tr>
                           <tr>
                              <td>Addon Charges</td>
                              <td>
                                 @foreach($vehicle_addons as $key=> $data)
                                 <p>{{ $data->master_value }} ---------- <span>{{ $data->addon_value }}</span></p>
                                 @endforeach
                              </td>
                              <td>{{ $total_addons_values[0]->addon_total }}</td>
                           </tr>
                           <tr>
                              <td>Discount</td>
                              <td>
                                 <p>Admin<span>---------- {{ $reserv_details[0]->admin_discount }}</span></p>
                                 <p>Partner<span>---------- {{ $reserv_details[0]->partner_discount }}</span></p>
                              </td>
                              <td>{{ $reserv_details[0]->admin_discount + $reserv_details[0]->partner_discount }}</td>
                           </tr>
                           <tr>
                              <td>Total Tax</td>
                              <td>
                              </td>
                              <td>0</td>
                           </tr>
                           <tr>
                              <td>Total Reservation Amount</td>
                              <td>
                              </td>
                              <td>{{ $reserv_details[0]->reservation_amount }}</td>
                           </tr>
                           <tr>
                              <td><?php 
                                 $id = Crypt::encryptString($reserv_details[0]->reservation_id);
                                 ?>Paid Amount
                                 <a  href="{{ route('invoice_pdfview',['download'=>'pdf','id'=> $id]) }}">(Download Invoice)</a> 
                              </td>
                              <td>
                              </td>
                              <td>{{ $reserv_details[0]->paid_amount }}</td>
                           </tr>
                           <tr>
                              <td>Deposite Amount <a data-toggle="modal" data-target="#exampleModalCenter" href="">Make Payment</a></td>
                              <td>
                              </td>
                              <td>{{ $reserv_details[0]->deposit_amount }}</td>
                           </tr>
                           <tr>
                              <td>Total amount</td>
                              <td>
                                 <?php
                                    $add = $total_rent + $total_addons_values[0]->addon_total + $reserv_details[0]->reservation_amount ;
                                    $sub = $reserv_details[0]->admin_discount + $reserv_details[0]->partner_discount;
                                    $over_all_value = $add - $sub;
                                    $total = $over_all_value;
                                    ?>
                              </td>
                              <td>{{ $total }}</td>
                           </tr>
                           <?php
                              $aa=$total- $reserv_details[0]->paid_amount;
                              ?>
                           @if($reserv_details[0]->deposit_amount <= $aa )
                           <tr>
                              <td>Expected Amount to pay</td>
                              <td>
                              </td>
                              <td class="fourfiv">{{ $aa-$reserv_details[0]->deposit_amount }}</td>
                           </tr>
                           @else
                           <tr>
                              <td>Expected Refund Amount</td>
                              <td>
                              </td>
                              <td class="fourfiv">{{ $reserv_details[0]->deposit_amount-$aa }}</td>
                           </tr>
                           @endif
                        </tbody>
                     </table>
                  </div>
                 
                  <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            ...
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <div class="form-group formtab">
                     <button type="button" class="btn btn-primary waves-effect waves-light" id="add_partner">Refund Pay </button>
                     <button type="button" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
                  </div>
               </div>
               <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Customer Documents and Agreements</h4>
                  </div>
                  <div class="form-row formtab">
                     <div class="col-md-3">
                        <h4>Customer Documents</h4>
                        <br>
                        <label>
                           <div id="customer_upload">Upload</div>
                        </label>
                     </div>
                     <div class="col-md-3">
                        <?php
                           $uploaded_doc_info = DB::table('document_details')
                                       ->where('reservation_id',$trip_info[0]->reservation_id)
                                       ->where('file_for','Trip Customer Document')
                                       ->get();
                           ?>
                        @if( count($uploaded_doc_info) != '' )
                        <div class="form-group col-md-12">
                           <label>Download Customer Document</label>
                           @foreach($uploaded_doc_info as $udi)
                           <li>
                              <a href="{{$udi->file_url}}" target="_blank">{{ $udi->file_orginal_name }}</a>
                              &nbsp;&nbsp;&nbsp; <a onclick="delete_document_detail({{$udi->document_details_id}}, '{{$udi->file_path}}{{$udi->file_orginal_name}}' );"><i class="fa fa-trash" style="color:red; cursor: pointer;"></i></a>
                           </li>
                           @endforeach
                           <div class="download_agreement"></div>
                        </div>
                        @else
                        @endif
                     </div>
                     <div class="col-md-6">
                        <h4>Get Customer's Signature</h4>
                        <br>
                        <input type="text" id="otp_mobile_number"/>
                        <input type="button" value="get OTP" id="get_otp_submt" />
                     </div>
                     
                     <div>
                         <div id="canvas">
      <canvas class="roundCorners" id="newSignature"
      style="position: relative; margin: 0; padding: 0; border: 1px solid #c4caac;"></canvas>
    </div>
    <script>signatureCapture();</script>
    <button type="button" onclick="signatureSave()">Save signature</button>
    <button type="button" onclick="signatureClear()">Clear signature</button>
    </br>
    Saved Image
    </br>
    <img id="saveSignature" alt="Saved image png"/>
                     </div>
                     
                     <div class="col-md-6" style="display:none;" id="signature_upload_function_div">
                        <h4>Customer's signature</h4>
                        <br>
                        <label>Upload</label>
                     </div>
                  </div>
                  <hr>
                  <div class="form-row formtab">
                     <div class="col-md-6">
                        <h4>Customer Agreements</h4>
                        <br>
                        <label>
                           <div id="customer_agreement_upload">Upload</div>
                        </label>
                     </div>
                     <div class="col-md-6">
                        <?php
                           $uploaded_doc_info = DB::table('document_details')
                                       ->where('reservation_id',$trip_info[0]->reservation_id)
                                       ->where('file_for','Trip Agreement Document')
                                       ->get();
                           ?>
                        @if( count($uploaded_doc_info) != '' )
                        <div class="form-group col-md-12">
                           <label>Download Customer Document</label>
                           @foreach($uploaded_doc_info as $udi)
                           <li>
                              <a href="{{$udi->file_url}}" target="_blank">{{ $udi->file_orginal_name }}</a>
                              &nbsp;&nbsp;&nbsp; <a onclick="delete_document_detail({{$udi->document_details_id}}, '{{$udi->file_path}}{{$udi->file_orginal_name}}' );"><i class="fa fa-trash" style="color:red; cursor: pointer;"></i></a>
                           </li>
                           @endforeach
                           <div class="download_agreement"></div>
                        </div>
                        @else
                        @endif
                     </div>
                     <label>Signed Document Copy Upload</label>
                  </div>
               </div>
               <div class="tab-pane fade" id="partner" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Pickup and Drop Vehicles</h4>
                  </div>
                  <section id="tabs">
                     <div class="row formtab">
                        <div class="col-md-12 ">
                           <nav>
                              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                 <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home1" role="tab" aria-controls="nav-home" aria-selected="true">Pickup</a>
                                 <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile1" role="tab" aria-controls="nav-profile" aria-selected="false">Drop</a>
                              </div>
                           </nav>
                           <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                              <div class="tab-pane fade show active" id="nav-home1" role="tabpanel" aria-labelledby="nav-home-tab">
                                 <div class="form-row formtab">
                                    <div class="col-md-6">
                                       <div class="col-md-12">
                                          <label class="uploadpre">Upload Pre Vehicle Condition Photos</label>
                                          <br>
                                          <div class="form-group col-md-12">
                                             <div id="fileuploader1">Upload</div>
                                             <center>
                                                <input type="button" class="btn btn-primary" id="extrabutton" value="Start Upload">
                                                <input type="hidden" name="csrf_token" id="csrf_token" value="{!! csrf_token() !!}">
                                             </center>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                          <label class="custom-control-label uploadpre" for="defaultUnchecked">Key Given <span class="namelab">by Sathish Kumar</span></label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <!--<input type="hidden" id="csrf_token" value="JDaxfRlKgfw1zwaw8MV2xC7Cj00CuzBIpmvdBBbd">-->
                                    <input type="hidden" value="17" id="partner_id">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" id="update_partner">Update</button>
                                    <button type="button" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile-tab">
                                 <div class="form-row formtab">
                                    <div class="col-md-6">
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                          <label class="custom-control-label uploadpre" for="defaultUnchecked">Key Returned</label><br>
                                          <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                          <label class="custom-control-label uploadpre" for="defaultUnchecked">Key Given <span class="namelab">by Sathish Kumar</span></label>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="col-md-12">
                                          <label class="uploadpre">Upload Pre Vehicle Condition Photos</label>
                                          <br>
                                          <label>Upload</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-row bg-shadow activwin">
                                    <div class="col-md-6">
                                       <div class="form-group col-md-12">
                                          <label>Reservation Amount</label>
                                          <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="Reservation Amount" id="partner_name" />             
                                       </div>
                                       <div class="form-group col-md-12">
                                          <label>Overall Trip Amount</label>
                                          <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Overall Trip Amount" id="phone_no" />
                                       </div>
                                       <div class="form-group col-md-12">
                                          <label>Vehicle Damage Charge</label>
                                          <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="Vehicle Damage Charge" id="email" />             
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group col-md-12">
                                          <label>Deposit Amount</label>
                                          <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="Deposit Amount" id="partner_name" />             
                                       </div>
                                       <div class="form-group col-md-12">
                                          <label>Expected Refund Amount</label><span style="color: red;">*</span>
                                          <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Expected Refund Amount" id="phone_no" />
                                       </div>
                                       <div class="form-group col-md-12">
                                          <label>Vehicle Condition Description</label>
                                          <textarea class="form-control" placeholder="Vehicle Condition Description"></textarea>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <button type="button" class="btn btn-primary waves-effect waves-light" id="add_partner">Update</button>
                                       <button type="button" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
                                    </div>
                                    <br>
                                    <div class="form-group" style="width:100%;margin-top: 3%;">
                                       <div class="tripclose">
                                          <a class="closetrip" id="">Close Trip</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
         <!-- /.col-md-8 -->
      </div>
   </div>
</div>
<!-- end wrapper -->
@include('admin_dashboard.footer')
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="{{ asset('theme_files/assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('theme_files/external_files/js/jquery-confirm.min.js') }}"></script>
{!! Html::script('public/assets/jquery_upload/jquery.uploadfile.min.js') !!}
<!-- plugin js -->
<script src="{{ asset('theme_files/plugins/timepicker/bootstrap-timepicker.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- Init js -->
<script src="{{ asset('theme_files/assets/pages/jquery.form-pickers.init.js') }}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
   $(document).ready(function(){
     $("a").click(function(){
       $("button").slideToggle();
     });
   });
   
function signatureCapture() {
  var canvas = document.getElementById("newSignature");
  var context = canvas.getContext("2d");
  canvas.width = 276;
  canvas.height = 180;
  context.fillStyle = "#fff";
  context.strokeStyle = "#444";
  context.lineWidth = 1.5;
  context.lineCap = "round";
  context.fillRect(0, 0, canvas.width, canvas.height);
  var disableSave = true;
  var pixels = [];
  var cpixels = [];
  var xyLast = {};
  var xyAddLast = {};
  var calculate = false;
  {   //functions
    function remove_event_listeners() {
      canvas.removeEventListener('mousemove', on_mousemove, false);
      canvas.removeEventListener('mouseup', on_mouseup, false);
      canvas.removeEventListener('touchmove', on_mousemove, false);
      canvas.removeEventListener('touchend', on_mouseup, false);

      document.body.removeEventListener('mouseup', on_mouseup, false);
      document.body.removeEventListener('touchend', on_mouseup, false);
    }

    function get_coords(e) {
      var x, y;

      if (e.changedTouches && e.changedTouches[0]) {
        var offsety = canvas.offsetTop || 0;
        var offsetx = canvas.offsetLeft || 0;

        x = e.changedTouches[0].pageX - offsetx;
        y = e.changedTouches[0].pageY - offsety;
      } else if (e.layerX || 0 == e.layerX) {
        x = e.layerX;
        y = e.layerY;
      } else if (e.offsetX || 0 == e.offsetX) {
        x = e.offsetX;
        y = e.offsetY;
      }

      return {
        x : x, y : y
      };
    };

    function on_mousedown(e) {
      e.preventDefault();
      e.stopPropagation();

      canvas.addEventListener('mouseup', on_mouseup, false);
      canvas.addEventListener('mousemove', on_mousemove, false);
      canvas.addEventListener('touchend', on_mouseup, false);
      canvas.addEventListener('touchmove', on_mousemove, false);
      document.body.addEventListener('mouseup', on_mouseup, false);
      document.body.addEventListener('touchend', on_mouseup, false);

      empty = false;
      var xy = get_coords(e);
      context.beginPath();
      pixels.push('moveStart');
      context.moveTo(xy.x, xy.y);
      pixels.push(xy.x, xy.y);
      xyLast = xy;
    };

    function on_mousemove(e, finish) {
      e.preventDefault();
      e.stopPropagation();

      var xy = get_coords(e);
      var xyAdd = {
        x : (xyLast.x + xy.x) / 2,
        y : (xyLast.y + xy.y) / 2
      };

      if (calculate) {
        var xLast = (xyAddLast.x + xyLast.x + xyAdd.x) / 3;
        var yLast = (xyAddLast.y + xyLast.y + xyAdd.y) / 3;
        pixels.push(xLast, yLast);
      } else {
        calculate = true;
      }

      context.quadraticCurveTo(xyLast.x, xyLast.y, xyAdd.x, xyAdd.y);
      pixels.push(xyAdd.x, xyAdd.y);
      context.stroke();
      context.beginPath();
      context.moveTo(xyAdd.x, xyAdd.y);
      xyAddLast = xyAdd;
      xyLast = xy;

    };

    function on_mouseup(e) {
      remove_event_listeners();
      disableSave = false;
      context.stroke();
      pixels.push('e');
      calculate = false;
    };
  }
  canvas.addEventListener('touchstart', on_mousedown, false);
  canvas.addEventListener('mousedown', on_mousedown, false);
}

function signatureSave() {
  var canvas = document.getElementById("newSignature");// save canvas image as data url (png format by default)
  var dataURL = canvas.toDataURL("image/png");
  document.getElementById("saveSignature").src = dataURL;
};

function signatureClear() {
  var canvas = document.getElementById("newSignature");
  var context = canvas.getContext("2d");
  context.clearRect(0, 0, canvas.width, canvas.height);
}
   
   
      
</script>
@section('script')
<script>
   $('#get_otp_submt').click(function(){
   var tempcsrf = $('#csrf_token').val();
   var mobile = $('#otp_mobile_number').val();
   var trip_id = $('#trip_id').val();
   $.ajax({
           type: 'post',
           url: '{{url('get_otp')}}',
           dataType: "json",
           data: {
                   mobile:mobile,
                   trip_id:trip_id,
                   _token:tempcsrf
                 },
           beforeSend: function () {
           },
           success: function (data) {
             if(data != ''){
                 $.confirm({
                       title: 'OTP!',
                       content: '' +
                       '<form action="verify_otp" class="formName">' +
                       '<div class="form-group">' +
                       '<label>Enter your OTP here</label>' +
                       '<input type="text" placeholder="Your OTP" class="otp form-control" required />' +
                       '</div>' +
                       '</form>',
                       buttons: {
                           formSubmit: {
                               text: 'Submit',
                               btnClass: 'btn-blue',
                               action: function () {
                                   var otp = this.$content.find('.otp').val();
                                   var otp_id = data;
                                   var tempcsrf = $('#csrf_token').val();
                                   if(!otp){
                                       $.alert('provide your OTP here');
                                       return false;
                                   }
                                   // $.alert('Your OTP is ' + otp);
                                   $.ajax({
                              	            type: 'POST',
                              	            url: '{{url('verify_otp')}}',
                              	            dataType: "json",
                              	            data: {
                              	                    otp:otp,
                              	                    otp_id:otp_id,
                              	                    _token:tempcsrf
                              	                  },
                              	            beforeSend: function () {
                              	            },
                              	            success: function (data) {
                              	              if(data == 'success')
                              	              {
                              	              	$.confirm({
                              			            title: 'Success',
                              			            content: 'OTP verified successfully.',
                              			            autoClose: 'logoutUser|300',
                              			            buttons: {
                              			                logoutUser: {
                              			                text: 'OK',
                              			                },
                              			            }
                              			        });
                              	              }
                              	              else
                              	              {
                              	                $.alert({
                              	                  title: 'Alert!',
                              	                  content: data,
                              	                });
                              	              }
                              	            }
                              	          });
                               }
                           },
                           cancel: function () {
                               //close
                           },
                       },
                       onContentReady: function () {
                           // bind to events
                           var jc = this;
                           this.$content.find('form').on('submit', function (e) {
                               // if the user submits the form by pressing enter in the field.
                               e.preventDefault();
                               jc.$$formSubmit.trigger('click'); // reference the button and click it
                           });
                       }
                   });
             }else{
                   
             }
           }
         });
   });
   
   
   
   
   $(document).ready(function(){
   var tempcsrf = $('#csrf_token').val();
   var reservation_id = $('#reservation_id').val();
   var partner_id = $('#product_id').val();
   var vehicle_id = $('#product_id').val();
   var image_type = "pickup_vehicle_pic";
   var extraObj = $("#fileuploader1").uploadFile({
   url: '{{ url('upload_trip_vehicle_pic') }}',
   fileName:"myfile",
   id: "test",
   formData: {
       image_type:image_type,
       reservation_id:reservation_id,
       partner_id:partner_id,
       vehicle_id:vehicle_id,
       action: 'upload_trip_vehicle_pic',
       _token: tempcsrf
   },
   // showDelete: false,
   // showDone: false,
   // multiple:false,
   // dragDrop:false,
   // //maxFileCount:1,
   // showProgress: true,
   // sequential:true,
   // reset:true,
   // // maxFileSize:3000*1024,
   extraHTML:function()
   {
    var html = "<div class='row'><div class='form-group col-md-6'><b>Image Direction : </b><select name='direction' id='direction'><option value='front'>Front</option><option value='right'>Right</option><option value='left'>Left</option><option value='back'>Back side</option></select></div>";
    html += "<div class='form-group col-md-6'><b>Image Type : </b><input type='text' name='description' value='' id='description' /></div>";
    html += "</div>";
    return html;        
   },
   autoSubmit:false,
       onSuccess: function (files, data, xhr) {
           console.log(data);
           $.confirm({
               title: 'Success',
               content: 'Vehicle image added successfully',
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
   $("#extrabutton").click(function(){
   extraObj.startUpload();
   var btemp=document.getElementById('fileuploader1');
   
   // alert(document.getElementById('fileuploader1'));
   //   alert(document.getElementById('fileuploader1')
   // .getElementsByClassName('ajax-file-upload-container')[0]);
   
   //   var btemp1=btemp.getElementsByClassName('ajax-file-upload-filename')[0].innerHTML;
   //   alert("btemp1".btempl);
   });
   });
   
   $('#add_new_partner_button').click(function(){
   $('#add_new_partner_tab').toggle(500);
   });
   $('#add_partner').click(function(){
   $('#add_new_partner_tab').hide(1000);
   });
   $('.close_new_color_tab').click(function(){
   $('#add_new_color_tab').toggle(500);
   });
   $('#add_location_button').click(function(){
   $('#add_new_color_tab').hide(500);
   $('#add_new_partner_tab').toggle(500);
   });
   $('.close_location_tab').click(function(){
   $('#add_new_partner_tab').toggle(500);
   });
   
   $("#filter_clear").click(function(){
   $('#partner_list_datatable').show();
   $('#filter_partner_list_datatable').hide();
   $('#partner_list_datatable_wrapper').show();
   $('#filter_partner_list_datatable_wrapper').hide();
   // $('#a_pdf').hide();
   $("#status").val('');
   $("#partner_area").val('');
   $('#unique_partner_id').val('');
   $("#partner_name").val('');
   $("#partner_phone").val('');
   $('#partner_email').val('');
   // alert('ok');
   });
   
</script>
<script>
   var expanded = false;
   
   function showCheckboxes() {
   var checkboxes = document.getElementById("checkboxes");
   if (!expanded) {
     checkboxes.style.display = "block";
     expanded = true;
   } else {
     checkboxes.style.display = "none";
     expanded = false;
   }
   }
</script>
<script>
   /*add partner start*/
   $(document).ready(function () {
   
   
       $(function() {
   	   var table =  $('#partner_list_datatable').DataTable({
               "pageLength":50,
               "processing":true,
               "serverSide": false,
   	        ajax: {
   	                url: '{{url('get_all_partner_list')}}',
   	                error: function (xhr, error, thrown) {
   	                alert(error);
   	              }  
   	            },
                
                "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                    if(aData['sst'] != 1){
                        $("td:nth-child(1)",nRow).click(function(){
                            window.location = "partner_uilist/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(1)",nRow).click(function(){
                            window.location = "partner_uilist/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(2)",nRow).click(function(){
                            window.location = "partner_uilist/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(3)",nRow).click(function(){
                            window.location = "partner_uilist/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(4)",nRow).click(function(){
                            window.location = "partner_uilist/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(5)",nRow).click(function(){
                            window.location = "partner_uilist/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(6)",nRow).click(function(){
                            window.location = "partner_uilist/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(7)",nRow).click(function(){
                            window.location = "partner_uilist/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(8)",nRow).click(function(){
                            window.location = "partner_uilist/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:first", nRow).html(iDisplayIndex +1);
                        return nRow;
                    }
                    else{
                        $("td:first", nRow).html(iDisplayIndex +1);
                        return nRow;
                    }
                },
                
                
   	        columns: [
   	            {data:'partner_id', name: 'partner_id'},
   	            {data:'unique_partner_id', name: 'unique_partner_id'},
   	            {data:'partner_name', name: 'partner_name'},
   	            {data:'partner_phone', name: 'partner_phone'},
   	            {data:'partner_area', name: 'partner_area'},
   	            {data:'partner_email', name: 'partner_email'},
   	            {data:'vehicle_count', name: 'vehicle_count'},
   	            {data:'status_reason', name: 'status_reason'},
   	            {data:'status', name: 'status'},
   	            {data:'action', name: 'action'},
   	        ]
   	    });
   	table.column('2').order('asc');
   	    $('.tab_2').on('click', function () {
   	       table.ajax.reload();
   	    });
   	});
   });
       
    $("#filter_submit").click(function(){
    $('#partner_list_datatable_wrapper').hide();
    $('#filter_partner_list_datatable_wrapper').show();
   
    var status = $("#status").val();
    var partner_area = $("#partner_area").val();
    var unique_partner_id = $("#unique_partner_id").val();
    var partner_name = $("#partner_name").val();
    var partner_phone = $("#partner_phone").val();
    var partner_email = $("#partner_email").val();
    var tempcsrf = $('#csrf_token').val();
    
    $('#partner_list_datatable').hide();
    $('#filter_partner_list_datatable').show();
    $(function() {
        var table =  $('#filter_partner_list_datatable').DataTable();
        if($.fn.dataTable.isDataTable('#filter_partner_list_datatable'))
        {
            table.destroy();
        }
    var table =  $('#filter_partner_list_datatable').DataTable({
      "pageLength":20,
      "processing":true,
      "serverSide": true,
      "paginate": true,
         ajax: {
                 type: 'POST',
             dataType: 'json',
                cache: false,
        		    data: {
        		            status:status,
        		            partner_area:partner_area,
        		            unique_partner_id:unique_partner_id,
        		            partner_name:partner_name,
        		            partner_phone:partner_phone,
        		            partner_email:partner_email,
        		            _token:tempcsrf
        		          },
                 url: '{{url('filter_get_all_partner_list')}}',
                 error: function (xhr, error, thrown) {
                 alert(thrown);      
               }
             },
      "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                if(aData['sst'] != 1){
                    $("td:nth-child(1)",nRow).click(function(){
                        window.location = "partner_uilist/"+aData['crypt_id'];
                        return false;
                    });
                    $("td:nth-child(2)",nRow).click(function(){
                        window.location = "partner_uilist/"+aData['crypt_id'];
                        return false;
                    });
                    $("td:nth-child(3)",nRow).click(function(){
                        window.location = "partner_uilist/"+aData['crypt_id'];
                        return false;
                    });
                    $("td:nth-child(4)",nRow).click(function(){
                        window.location = "partner_uilist/"+aData['crypt_id'];
                        return false;
                    });
                    $("td:nth-child(5)",nRow).click(function(){
                        window.location = "partner_uilist/"+aData['crypt_id'];
                        return false;
                    });
                    $("td:nth-child(6)",nRow).click(function(){
                        window.location = "partner_uilist/"+aData['crypt_id'];
                        return false;
                    });
                    $("td:nth-child(7)",nRow).click(function(){
                        window.location = "partner_uilist/"+aData['crypt_id'];
                        return false;
                    });
                    $("td:nth-child(8)",nRow).click(function(){
                        window.location = "partner_uilist/"+aData['crypt_id'];
                        return false;
                    });
                    $("td:first", nRow).html(iDisplayIndex +1);
                        return nRow;
                    }
                else{
                    $("td:first", nRow).html(iDisplayIndex +1);
                        return nRow;
                }
                },
         columns: [
   	            {data:'partner_id', name: 'partner_id'},
   	            {data:'unique_partner_id', name: 'unique_partner_id'},
   	            {data:'partner_name', name: 'partner_name'},
   	            {data:'partner_phone', name: 'partner_phone'},
   	            {data:'partner_area', name: 'partner_area'},
   	            {data:'partner_email', name: 'partner_email'},
   	            {data:'vehicle_count', name: 'vehicle_count'},
   	            {data:'status_reason', name: 'status_reason'},
   	            {data:'status', name: 'status'},
   	            {data:'action', name: 'action'},
    	        ]
     });
    });
   });
    function delete_partner_info(arg,arg2) {
   	    var tempcsrf = $('#csrf_token').val();
   	    var partner_id = arg;
   	    $.confirm({
   	        title: 'Confirm!',
   	        content: 'Are you sure to delete this partner entire detail !!!',
   	        buttons: {
   	        confirm: function () {
   	          $.ajax({
   	            type: 'POST',
   	            url: '{{url('delete_partner_details')}}',
   	            dataType: "json",
   	            data: {
   	                    partner_id:partner_id,
   	                    _token:tempcsrf
   	                  },
   	            beforeSend: function () {
   	            },
   	            success: function (data) {
   	              if(data == 'success')
   	              {
   	              	$.confirm({
   			            title: 'Success',
   			            content: 'Partner Delete Successfully.',
   			            autoClose: 'logoutUser|300',
   			            buttons: {
   			                logoutUser: {
   			                text: 'OK',
   			                },
   			            }
   			        });
   	                var table =  $('#partner_list_datatable').DataTable();
   	             		table.ajax.reload();
   	              }
   	              else
   	              {
   	                $.alert({
   	                  title: 'Alert!',
   	                  content: data,
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
    
     
   	function un_delete_partner_info(arg,arg2) {
   	    var tempcsrf = $('#csrf_token').val();
   	    var partner_id = arg;
   	    var status = arg2;
   	    $.confirm({
   	        title: 'Confirm!',
   	        content: 'Are you sure to delete this partner detail !!!',
   	        buttons: {
   	        confirm: function () {
   	          $.ajax({
   	            type: 'POST',
   	            url: '{{url('un_delete_partner_list')}}',
   	            dataType: "json",
   	            data: {
   	                    partner_id:partner_id,
   	                    status:status,
   	                    _token:tempcsrf
   	                  },
   	            beforeSend: function () {
   	            },
   	            success: function (data) {
   	              if(data == 'success')
   	              {
   	              	$.confirm({
   			            title: 'Success',
   			            content: 'Partner Delete Successfully.',
   			            autoClose: 'logoutUser|300',
   			            buttons: {
   			                logoutUser: {
   			                text: 'OK',
   			                },
   			            }
   			        });
   	                var table =  $('#partner_list_datatable').DataTable();
   	             		table.ajax.reload();
   	              }
   	              else
   	              {
   	                $.alert({
   	                  title: 'Alert!',
   	                  content: data,
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
   	
   	
   	function status_partner_info(arg,arg2) {
        var tempcsrf = $('#csrf_token').val();
        var partner_id = arg;
        var status = arg2;
        if( status != "6"){
            $.confirm({
            title: 'Confirm!',
            content: 'Are you sure to change this partner status !!!',
            buttons: {
            confirm: function () {
              $.ajax({
                type: 'POST',
                url: '{{url('status_partner_details')}}',
                dataType: "json",
                data: {
                        partner_id:partner_id,
                        status:status,
                        _token:tempcsrf
                      },
                beforeSend: function () {
                },
                success: function (data) {
                  if(data == 'success')
                  {
                  	$.confirm({
        		            title: 'Success',
        		            content: 'Updated Successfully.',
        		            autoClose: 'logoutUser|300',
        		            buttons: {
        		                logoutUser: {
        		                    text: 'OK',
        		                },
        		            }
        		        });
                    var table =  $('#partner_list_datatable').DataTable();
                 		table.ajax.reload();
                  }
                  else
                  {
                    $.alert({
                      title: 'Alert!',
                      content: data,
                    });
                  }
                }
              });
              },
                cancel: function () {
              }
            }
          });
        }else{
        $.confirm({
            title: 'Why Resend?',
            type: 'orange',
            typeAnimated: true,
            content: '' +
            '<form action="" class="formName">' +
            '<div class="form-group">' +
            '<label>Enter reason for resend <span style="color:red;">*</span> </label>' +
            '<input type="text" placeholder="Reason for resend" class="name form-control" required />' +
            '</div>' +
            '</form>',
        buttons: {
            formSubmit: {
                text: 'Submit',
                btnClass: 'btn-blue',
                action: function () {
                    var reason = this.$content.find('.name').val();
                    if(!reason){
                        $.alert('Provide some reason...');
                        return false;
                    }
                      $.post("{{url('status_partner_details')}}", {_token:tempcsrf,partner_id:partner_id,reason:reason,status:status}, function(data) {
                      $.confirm({
                          title: '',
                          content: 'Resend successfully!',
                          buttons: {
                              Ok: function () {
                              location.reload();
                              },
                          }
                        });
                      });
                    }
                  },
                  cancel: function () {
                  },
              },
              onContentReady: function () {
                  var jc = this;
                  this.$content.find('form').on('submit', function (e) {
                      e.preventDefault();
                      jc.$$formSubmit.trigger('click');
                  });
              }
        });
    }
    }
    
    $("#add_partner").click(function(){
        var partner_name = $('#partner_name').val();
        var no_vehicles = $("#vehicle_count").val();
        var phone_no = $('#phone_no').val();
   var partner_email = $('#email').val();
   var partner_location = $('#location_name').val();
   var partner_type = $('#add_new_partner_type').val();
        var tempcsrf = $('#csrf_token').val();
        if((email =='')){
            $.alert({
          title: 'Alert!',
          content: "Please fill all mandatory fields !!!",
      });
        }else{
            $.ajax({
          type: 'POST',
          url: '{{ url('add_partner_details') }}',
          dataType: 'json',
          data: {
              partner_name:partner_name,
              phone_no:phone_no,
     partner_email:partner_email,
     no_vehicles:no_vehicles,
     partner_location:partner_location,
     partner_type:partner_type,
              _token:tempcsrf
              },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data == "success"){
                        $.confirm({
                            title: 'Success',
                            content: 'partner details added successfully',
                            autoClose: 'logoutUser|300',
                             buttons: {
                             logoutUser: {
                                 text: 'OK',
                             },
                          }
                        });
                    var table =  $('#partner_list_datatable').DataTable();
   	             		table.ajax.reload();
                        
                    }else{
                        $.alert({
            		        title: 'Alert!',
            		        content: "partner details already exists !!!",
            		    });
                    }
               }
              });
        }
    });
    
    $("#partner_name").keyup(function() {
        var inpObj = document.getElementById("partner_name");
        var regex = /^[A-Za-z ]+$/;
        if (regex.test(this.value) !== true)
        this.value = this.value.replace(/[^A-Za-z +-.,]+/, '');
        if (!inpObj.checkValidity()) {
        document.getElementById("demo").innerHTML = inpObj.validationMessage;
        }
    });
    
    $("#location_name").keyup(function() {
        var inpObj = document.getElementById("location_name");
        var regex = /^[A-Za-z ]+$/;
        if (regex.test(this.value) !== true)
        this.value = this.value.replace(/[^A-Za-z +-.,]+/, '');
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
   /*end partner*/
    $(document).on('mouseenter', ".iffyTip", function () {
     var $this = $(this);
     if (this.offsetWidth < this.scrollWidth && !$this.attr('title')) {
         $this.tooltip({
             title: $this.text(),
             placement: "top"
         });
         $this.tooltip('show');
     }
   });
   $('.hideText').css('width',$('.hideText').parent().width());
   $(function () {
   $('[data-toggle="tooltip"]').tooltip()
   })
   
   
   $(document).ready(function (){
    var table = $('#example').DataTable({
        'ajax': '',
        'dom': 'Rlfrtip',
    });
   });
   
</script>
<script>
   $(function() {
       var pressed = false;
       var start = undefined;
       var startX, startWidth;
       
       $("table th").mousedown(function(e) {
           start = $(this);
           pressed = true;
           startX = e.pageX;
           startWidth = $(this).width();
           $(start).addClass("resizing");
       });
       
       $(document).mousemove(function(e) {
           if(pressed) {
               $(start).width(startWidth+(e.pageX-startX));
           }
       });
       
       $(document).mouseup(function() {
           if(pressed) {
               $(start).removeClass("resizing");
               pressed = false;
           }
       });
   });
</script>
<script>
   $('#add_new_add_on').click(function(){
      $('.targetdiv3').slideUp();
      $('.targetdiv3').hide(500);
      $('#mySidenav3').slideToggle();
   });
   
   $('#close_tab').click(function(){
      $('.targetdiv3').hide(500);
   });
   
   var tempcsrf = $('#csrf_token').val();
   var reservation_id = $('#reservation_id').val();
   //   alert(inserted_vehicle_id);
   var cust_doc = "Trip Customer Document";
   var agree_doc = "Trip Agreement Document";
   
   var extraObj = $("#customer_upload").uploadFile({
      dataType: 'json',
      url:"{{ url('upload_customer_document') }}",
      fileName:"myfile",
      formData: {
           reservation_id: reservation_id,
           cust_doc: cust_doc,
           action: 'upload_customer_document',
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
           $(".download_agreement").html("<li><a href='../"+data[0]+"' target='_blank'>"+data[1]+"</a><a onclick='delete_document_detail('"+data[2]+","+data[3]+"');'><i class='fa fa-trash' style='color:red; cursor: pointer;margin-left: 15px; display: none;'></i></a></li>");
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
   var extraObj = $("#customer_agreement_upload").uploadFile({
      dataType: 'json',
      url:"{{ url('upload_customer_document') }}",
      fileName:"myfile",
      formData: {
           reservation_id: reservation_id,
           agree_doc: agree_doc,
           action: 'upload_customer_document',
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
           $(".download_agreement").html("<li><a href='../"+data[0]+"' target='_blank'>"+data[1]+"</a><a onclick='delete_document_detail('"+data[2]+","+data[3]+"');'><i class='fa fa-trash' style='color:red; cursor: pointer;margin-left: 15px; display: none;'></i></a></li>");
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
    url: '{{ url('delete_trip_document') }}',
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
   
</script>
@endsection