@extends('layouts.adminmaster')
@section('content')
<header id="topnav">
   @include('admin_dashboard.menu')
</header>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link href="{{ asset('theme_files/external_files/css/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css" />
{!! Html::style('public/assets/jquery_upload/uploadfile.css') !!}
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
   background-color: #21366b;part
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
   .detail label {
   color: #fff;
   padding-top: 15px;
   }
   span#add_new_owner_button {
   background-color: #ffffff;
   color: #21366b;
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
   .col-md-12.tableview {
   background-color: #24366b;
   color: #fff;
   font-size: 24px;
   padding: 10px 20px 1px;
   }
</style>
<div class="wrapper">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-2 mb-3">
            <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Customer Details</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Billing Details</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Reservation Details</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="false">Invoice Section</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile" aria-selected="false">Payment Details</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact" aria-selected="false">Customer Comments</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#partner1" role="tab" aria-controls="contact" aria-selected="false">Partner Comments</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="pickup_trip_id" aria-controls="contact" aria-selected="false">Pickup Trip</a>
               </li>
            </ul>
         </div>
         <!-- /.col-md-4 -->
         <div class="col-md-10">
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Customer Details</h4>
                  </div>
                  <div class="form-row formtab" style="padding: 20px 20px 0px;">
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="res_is" value="{{ $reserv_details[0]->reserve_unique_id }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <!--<label for="Vehicle Color">Reservation Id</label><span style="color:green;">Go to Reservation Details</span>-->
                        </div>
                     </div>
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="res_name" value="{{ $reserv_details[0]->first_name }}{{ $reserv_details[0]->last_name }}" disabled onfocus="this.placeholder = ''" required autofocus >
                           <!--<label for="Vehicle Color">Customer Name</label><span style="color:green;">Go to Customer Details</span>-->
                        </div>
                     </div>
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="Reservation Date" value="{{ $reserv_details[0]->reservation_date }}" disabled id="reser_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                 <label for="Vehicle Color">Reservation Date</label>
                              </div>
                           </div>
                           <!-- input-group -->
                        </div>
                     </div>
                    
                     <!--<div class="form-group col-md-3">-->
                     <!--   <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">-->
                     <!--   <button type="button" class="btn btn-primary waves-effect waves-light" id="add_location_submit" style="padding:7px 30px !important;    float: right;">Edit</button>-->
                     <!--</div>-->
                  </div>
                  <hr>
                  <div class="form-row formtab">
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="first_name" value="{{ $reserv_details[0]->first_name }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="vehicle Model">First Name</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="last_name" value="{{ $reserv_details[0]->last_name }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Location">Last Name</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="phone" value="{{ $reserv_details[0]->phone }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Mobile Number</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="email" value="{{ $reserv_details[0]->email }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Email Id</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                            <div class="input-group">
                               <input type="text" class="form-control" id="dob" value="{{ $reserv_details[0]->dob }}" onfocus="this.placeholder = ''" required autofocus >
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    <label for="Vehicle Color">Date of Birth</label>
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="door_no" value="{{ $reserv_details[0]->door_no }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Door No</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="appartment_name" value="{{ $reserv_details[0]->appartment_name }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Appartment Name</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="street_name" value="{{ $reserv_details[0]->street_name }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Street Name</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="city" value="{{ $reserv_details[0]->city }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">City</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="pincode" value="{{ $reserv_details[0]->pincode }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Pincode</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="country_code" value="{{ $reserv_details[0]->country_code }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Country code</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="pincode" value="{{ $reserv_details[0]->country }}" disabled onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Country</label>
                        </div>
                     </div>
                   </div>
                   <div class="form-row formtab">
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control"  value="{{ $reserv_details[0]->license_number }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Location">License number</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control"  value="{{ $reserv_details[0]->	license_issue_date }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Location">License issued date</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control"  value="{{ $reserv_details[0]->license_issued_country }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Location">License country</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-row formtab">
                     <div class="form-group">
                        <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                        <input type="hidden" value="{{ $reservation_id }}" id="reservation_id">
                        <button type="button" class="btn btn-primary waves-effect waves-light" id="add_cus_details" style="padding:10px 30px !important;">Save</button>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="col-md-12 vimkim" style="padding: 3px 20px 50px;">
                     <h4 class="customdet" style="float:left;">Billing Details</h4>
                     <span class="detail" style=" color:#fff;   text-align: right;
                        float: right;">
                     <label for="vehicle1"><input type="checkbox" @if(($reserv_details[0]->for_first_name) != '' ) checked @else @endif id="content_same" name="vehicle1"> Content Same as customer details</label></span>
                  </div>
                  <div id="content_show">
                     <div class="form-row formtab">
                        <div class="form-group col-md-4">
                           <div class="form-group has-float-label">
                              @if($reserv_details[0]->for_first_name != "")
                              <input type="text" class="form-control" id="for_first_name" value="{{ $reserv_details[0]->for_first_name }}" onfocus="this.placeholder = ''" required autofocus >
                              @else
                              <input type="text" class="form-control" id="for_first_name" value="" onfocus="this.placeholder = ''" required autofocus >
                              @endif
                              <label for="vehicle Model">First Name</label>
                           </div>
                        </div>
                        <div class="form-group col-md-4">
                           <div class="form-group has-float-label">
                              @if($reserv_details[0]->for_last_name !="")
                              <input type="text" class="form-control" id="for_last_name" value="{{ $reserv_details[0]->for_last_name }}" onfocus="this.placeholder = ''" required autofocus >
                              @else
                              <input type="text" class="form-control" id="for_last_name" value="" onfocus="this.placeholder = ''" required autofocus >
                              @endif
                              <label for="Location">Last Name</label>
                           </div>
                        </div>
                        <div class="form-group col-md-4">
                           <div class="form-group has-float-label">
                              @if($reserv_details[0]->for_phone != "")
                              <input type="text" class="form-control" id="for_phone" value="{{ $reserv_details[0]->for_phone }}" onfocus="this.placeholder = ''" required autofocus >
                              @else
                              <input type="text" class="form-control" id="for_phone" value="" onfocus="this.placeholder = ''" required autofocus >
                              @endif
                              <label for="Vehicle Color">Mobile Number</label>
                           </div>
                        </div>
                        <div class="form-group col-md-4">
                           <div class="form-group has-float-label">
                              @if($reserv_details[0]->for_email != "")
                              <input type="text" class="form-control" id="for_email" value="{{ $reserv_details[0]->for_email }}" onfocus="this.placeholder = ''" required autofocus >
                              @else
                              <input type="text" class="form-control" id="for_email" value="" onfocus="this.placeholder = ''" required autofocus >
                              @endif
                              <label for="Vehicle Color">Email Id</label>
                           </div>
                        </div>
                        <div class="form-group col-md-4">
                           <div class="form-group has-float-label">
                              @if($reserv_details[0]->for_door_no != "")
                              <input type="text" class="form-control" id="for_door_no" value="{{ $reserv_details[0]->for_door_no }}"  onfocus="this.placeholder = ''" required autofocus >
                              @else
                              <input type="text" class="form-control" id="for_door_no" value=""  onfocus="this.placeholder = ''" required autofocus >
                              @endif
                              <label for="Vehicle Color">Door No</label>
                           </div>
                        </div>
                        <div class="form-group col-md-4">
                           <div class="form-group has-float-label">
                              @if($reserv_details[0]->for_appartname != "")
                              <input type="text" class="form-control" id="for_appartname" value="{{ $reserv_details[0]->for_appartname }}" onfocus="this.placeholder = ''" required autofocus >
                              @else
                              <input type="text" class="form-control" id="for_appartname" value="" onfocus="this.placeholder = ''" required autofocus >
                              @endif
                              <label for="Vehicle Color">Appartment Name</label>
                           </div>
                        </div>
                        <div class="form-group col-md-4">
                           <div class="form-group has-float-label">
                              @if($reserv_details[0]->for_street_name != "")
                              <input type="text" class="form-control" id="for_street_name" value="{{ $reserv_details[0]->for_street_name }}" onfocus="this.placeholder = ''" required autofocus >
                              @else
                              <input type="text" class="form-control" id="for_street_name" value="" onfocus="this.placeholder = ''" required autofocus >
                              @endif
                              <label for="Vehicle Color">Street Name</label>
                           </div>
                        </div>
                        <div class="form-group col-md-4">
                           <div class="form-group has-float-label">
                              @if($reserv_details[0]->for_city != "")
                              <input type="text" class="form-control" id="for_city" value="{{ $reserv_details[0]->for_city }}" onfocus="this.placeholder = ''" required autofocus >
                              @else
                              <input type="text" class="form-control" id="for_city" value="" onfocus="this.placeholder = ''" required autofocus >
                              @endif
                              <label for="Vehicle Color">City</label>
                           </div>
                        </div>
                        <div class="form-group col-md-4">
                           <div class="form-group has-float-label">
                              @if($reserv_details[0]->for_pincode != "")
                              <input type="text" class="form-control" id="for_pincode" value="{{ $reserv_details[0]->for_pincode }}" onfocus="this.placeholder = ''" required autofocus >
                              @else
                              <input type="text" class="form-control" id="for_pincode" value="" onfocus="this.placeholder = ''" required autofocus >
                              @endif
                              <label for="Vehicle Color">Pincode</label>
                           </div>
                        </div>
                        <div class="form-row formtab">
                           <div class="form-group">
                              <button type="button" class="btn btn-primary waves-effect waves-light" id="content_add_billing" style="padding:10px 30px !important;">Save</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Reservation Details  <span id="add_new_owner_button" class="pull-right btn waves-effect waves-light">Assign New Vehicle</span> </h4>
                  </div>
                  <!-- Modal -->
                  <div class="row" style="display: none;" id="add_new_owner_tab">
                     <div class="col-lg-12">
                        <div class="card-box">
                           <h4 class="page-title codebox" style="padding:7px 25px !important;    background-color: rgba(158, 158, 158, 0.51);
                              color: #444;
                              font-size: 20px;">Assign New Vehicle<span style="cursor: pointer;" class="pull-right close_add_new_owner_tab"><i class="mdi mdi-close"></i></span></h4>
                           <form class="codebox">
                              <div class="form-row">
                                 <div class="form-group col-md-4">
                                    <div class="form-group has-float-label">
                                       <input type="text" class="form-control" value="{{ $reservation_detail[0]->reserve_unique_id }}" disabled onfocus="this.placeholder = ''"  />
                                       <label for="Location">Reservation ID</label>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-4">
                                    <div class="form-group has-float-label">
                                       <input type="text" class="form-control" value="{{ ucfirst($reservation_detail[0]->first_name) }}" disabled onfocus="this.placeholder = ''"  />
                                       <label for="Location">Customer_name</label>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-4">
                                    <div class="form-group has-float-label">
                                       <input type="text" class="form-control" value="{{ ucfirst($reservation_detail[0]->vehicle_model) }} {{$reservation_detail[0]->vehicle_reg_no }}" disabled onfocus="this.placeholder = ''"  />
                                       <label for="Location">Vehicle model</label>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-3">
                                    <div class="form-group has-float-label">
                                       <div class="input-group">
                                          <input type="text" class="form-control" value="{{ $reservation_detail[0]->start_date }}"  id="assign_start_date">
                                          <div class="input-group-append">
                                             <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                             <label for="Vehicle Color">Booked Date From</label>
                                          </div>
                                       </div>
                                       <!-- input-group -->
                                    </div>
                                 </div>
                                 <div class="form-group col-md-3">
                                    <div class="form-group has-float-label">
                                       <div class="input-group">
                                          <input type="text" class="form-control" value="{{ $reservation_detail[0]->return_date }}" id="assign_return_date">
                                          <div class="input-group-append">
                                             <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                             <label for="Vehicle Color">Booked Date To</label>
                                          </div>
                                       </div>
                                       <!-- input-group -->
                                    </div>
                                 </div>
                                 <div class="form-group col-md-3">
                                    <div class="form-group has-float-label">
                                       <select class="form-control"  class="form-control" id="pick_up_location_id" placeholder="" onfocus="this.placeholder = ''" disabled required autofocus>
                                          @foreach($pick_up_location as $pl )
                                          <option value="{{ $pl->location_master_id }}" @if($pl->location_master_id) selected="selected" @else @endif>{{ ucfirst($pl->location_name) }}</option>
                                          @endforeach
                                       </select>
                                       <label for="status">Pick up location</label>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-3">
                                    <div class="form-group has-float-label">
                                       <select class="form-control"  class="form-control" id="drop_location_id" placeholder="" onfocus="this.placeholder = ''" disabled required autofocus>
                                           @foreach($drop_up_location as $dl )
                                          <option value="{{ $dl->location_master_id }}" @if($dl->location_master_id) selected="selected" @else @endif>{{ ucfirst($dl->location_name) }}</option>
                                          @endforeach
                                       </select>
                                       <label for="status">Drop up location</label>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-4"></div>
                                 <div class="form-group col-md-4">
                                    <div class="form-group has-float-label">
                                       <select class="form-control"  class="form-control" id="filtered_assign_location" placeholder="" onfocus="this.placeholder = ''" autofocus>
                                          <option value="0" hidden>Select Location</option>
                                          <option value="">Show all</option>
                                          @foreach($partner_locations as $pl )
                                          <option value="{{ $pl->location_master_id }}">{{ ucfirst($pl->location_name) }}</option>
                                          @endforeach
                                       </select>
                                       <label for="fullname">Select Location</label>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-4"></div>
                                 <div class="row" id="filtered_assign_vehicle_table" style="display:none;">
                                    <div class="col-lg-12">
                                       <div class="card-box" style="padding:20px;">
                                          <!-- Tabs -->
                                          <div class="row">
                                             <div class="col-md-12 ">
                                                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                                   <div class="tab-pane show active" id="filtered_table_data" role="tabpanel" aria-labelledby="nav-home-tab">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <!-- /.modal -->
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
                        <input type="hidden" value="{{ $reserv_details[0]->vehicle_id }}" id="vehicle_id" />
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
                           <select class="form-control"  class="form-control" id="pick_up_location_id" placeholder="" onfocus="this.placeholder = ''" disabled required autofocus>
                              @foreach($pick_up_location as $pl )
                              <option value="{{ $pl->location_master_id }}" @if($pl->location_master_id) selected="selected" @else @endif>{{ ucfirst($pl->location_name) }}</option>
                              @endforeach
                           </select>
                           <label for="status">Pick up location</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <select class="form-control"  class="form-control" id="drop_location_id" placeholder="" onfocus="this.placeholder = ''" disabled required autofocus>
                               @foreach($drop_up_location as $dl )
                              <option value="{{ $dl->location_master_id }}" @if($dl->location_master_id) selected="selected" @else @endif>{{ ucfirst($dl->location_name) }}</option>
                              @endforeach
                           </select>
                           <label for="status">Drop up location</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <select class="form-control"  class="form-control" id="reserve_through" placeholder="" onfocus="this.placeholder = ''" Disabled required autofocus>-->
                              <option value="1" @if($reserv_details[0]->reserve_through == '1') selected="selected" @else @endif >Website</option>
                              <option value="2" @if($reserv_details[0]->reserve_through == '2') selected="selected" @else @endif >Walking</option>
                           </select>
                           <label for="Vehicle Color">Reservation Through</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                            <div class="input-group">
                                <input type="text" class="form-control"  value="{{ $partner_details[0]->partner_name }}" onfocus="this.placeholder = ''" disabled required autofocus >
                                <div class="input-group-append">
                                     <span class="input-group-text">
                                        <a href="{{ url('partner_uilist',Crypt::encryptString($reserv_details[0]->partner_id)) }}" class="clickher">
                                        <i class="fa fa-user "> View</i>
                                        </a>
                                     </span>
                                     <label for="Vehicle Color">Partner Name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $vehicle_details[0]->vehicle_model }}" onfocus="this.placeholder = ''" disabled required autofocus >
                            <div class="input-group-append">
                                 <span class="input-group-text">
                                    <a href="{{ url('edit_vehicle',Crypt::encryptString($reserv_details[0]->vehicle_id)) }}" class="clickher">
                                    <i class="fa fa-car "> View</i>
                                    </a>
                                 </span>
                                 <label for="Vehicle Color">Vehicle Name</label>
                            </div>
                        </div>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" id="dynamic_rent_value" class="form-control" value="{{ $vehicle_rent }}" onfocus="this.placeholder = ''" disabled autofocus >
                           <label for="Vehicle Color">Vehicle Rent</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="baby_seat" value="{{ $baby_seats }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Baby Seat Counting</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="adult_seat" value="{{ $vehicle_details[0]->vehicle_seat_count }}" onfocus="this.placeholder = ''" required autofocus >
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
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <select class="form-control"  class="form-control" id="status" placeholder="" onfocus="this.placeholder = ''" required autofocus>
                              <option value="" hidden>Select Option</option>
                              <option value="3" @if($reserv_details[0]->status == '3') selected="selected" @else @endif >Confirmed</option>
                              <option value="5" @if($reserv_details[0]->status == '5') selected="selected" @else @endif >Cancel</option>
                           </select>
                           <label for="status">Reservation status</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-row formtab">
                     <div class="form-group">
                        <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                        <button type="button" class="btn btn-primary waves-effect waves-light" id="add_reservation" style="padding:10px 30px !important;">Save</button>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="home1" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Invoice</h4>
                     <?php 
                     $id = Crypt::encryptString($reserv_details[0]->reservation_id);
                     ?>
                     <a class="btn btn-primary waves-effect waves-light" href="{{ route('invoice_pdfview',['download'=>'pdf','id'=> $id]) }}">Download PDF</a>
                  </div>
                  <div class="form-row formtab">
                     <div class="form-group col-md-4">
                        <label>Car Rent(Per Day) <span style="font-size: 10px;">Default rent</span></label>
                        @if($vehicle_details[0]->default_rent != "")
                        <input data-parsley-type="number" type="text" class="form-control tribut" value="{{$vehicle_details[0]->default_rent}}" placeholder="Car Rent(Per Day)" id="" disabled />
                        @else
                        <input data-parsley-type="number" type="text" class="form-control tribut" value="" placeholder="Car Rent(Per Day)" id="" disabled />             
                        @endif
                     </div>
                     <div class="form-group col-md-4">
                        <label>No of Days</label>
                        <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $reservation_days }}" placeholder="No of Days" id="" disabled />             
                     </div>
                     <div class="form-group col-md-4">
                        <label>Car Rent(Per Day)*No of Days=Total</label>
                        <input data-parsley-type="number" type="text" class="form-control tribut" value="{{$vehicle_rent}}" placeholder="Total" id="" disabled />             
                     </div>
                  </div>
                  <div class="col-md-12">
                     <h4 class="customdet1">Add Ons</h4>
                  </div>
                  <div class="form-row formtab">
                     @foreach($vehicle_addons as $vf)
                     <div class="form-group col-md-6">
                        <label>{{ ucfirst($vf->master_value) }} (rate per day)</label>
                        <input data-parsley-type="number" type="text" value="{{$vf->addon_value}}" class="form-control tribut" disabled placeholder="{{ $vf->master_value }} (rate per day)" />             
                     </div>
                     @endforeach
                     <div class="form-group col-md-6">
                        <label>Overall addons charges( per day)</label>
                        <input data-parsley-type="number" type="text" value="{{$total_addons_values[0]->addon_total}}" class="discount_function_class form-control tribut" maxlength="10" disabled placeholder="Overall addons charges( per day)" />             
                     </div>
                     <div class="form-group col-md-6">
                        <label>Overall charges * no.of days= Total</label>
                        <?php $add_on_total = $reservation_days*$total_addons_values[0]->addon_total;  ?>
                        <input data-parsley-type="number" type="number" min="0" class="form-control tribut" disabled value="{{$add_on_total}}" id="overtotal" maxlength="10" required placeholder="Total" />
                     </div>
                     <div class="form-group col-md-6">
                        <label>Concession recovery</label>
                        <input data-parsley-type="number" type="number" min="0" id="discount" class="discount_function_class form-control tribut" maxlength="10" required placeholder="Concession recovery" />             
                     </div>
                     <div class="form-group col-md-6">
                        <label>Road tax</label>
                        <input data-parsley-type="number" type="number" min="0" id="tax_amt" class="form-control tribut" maxlength="10" required placeholder="Road tax" />
                     </div>
                     <div class="form-group col-md-6">
                        <label>Partner Discount amount</label>
                        <input data-parsley-type="number" type="number" min="0" id="part_amt" class="discount_function_class form-control tribut" maxlength="10" required placeholder="Partner Discount amount" />             
                     </div>
                     <div class="form-group col-md-6">
                        <label>Admin discount amount </label>
                        <input data-parsley-type="number" type="number" min="0" id="admin_amt" class="discount_function_class form-control tribut" maxlength="10" required placeholder="Admin discount amount" />             
                     </div>
                     <div class="form-group col-md-6">
                        <label>Total amount </label>
                        @if(($reserv_details[0]->paid_amount != '') || ($reserv_details[0]->paid_amount != ''))
                        <?php $total1 = ($reserv_details[0]->reservation_amount - $reserv_details[0]->paid_amount);
                              $add_on_total = $reservation_days*$total_addons_values[0]->addon_total;
                              $total = $total + $add_on_total;?>
                        @else
                        <?php $total1 = $reserv_details[0]->reservation_amount;
                              $add_on_total = $reservation_days*$total_addons_values[0]->addon_total;
                              $total = $total1 + $add_on_total;?>
                        @endif
                        <input data-parsley-type="number" type="hidden" class="discount_function_class form-control tribut" id="total_amt" value="{{ $total }}" />
                     </div>
                        <input data-parsley-type="number" type="number"  class="form-control tribut"  id="total_amount"  maxlength="10" disabled placeholder="Total amount" />
                  </div>
                  <div class="form-row formtab">
                     <div class="form-group">
                        <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                        <button type="button" class="btn btn-primary waves-effect waves-light" id="add_location_submit" style="padding:10px 30px !important;">Save</button>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Payment Details</h4>
                  </div>
                  <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                     data-cc-on-file="false"
                     data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                     id="payment-form">
                     <div class="form-row formtab">
                        <div class="form-group col-md-6 required">
                           <label>Name on Card</label>
                           <input type="text" class="form-control fhome" value="{{ $reserv_details[0]->name_of_card }}" placeholder="Nom du titulaire" id="name_on_card" onfocus="this.placeholder = ''" size='4' required autofocus >
                        </div>
                        <div class="form-group col-md-6 required">
                           <label>Card Number</label>
                           <input type="text" class="form-control fhome card-number" value="{{ $reserv_details[0]->card_number }}" size='20' autocomplete='off' placeholder="Numéro de carte" id="card_number" onfocus="this.placeholder = ''" required autofocus >
                        </div>
                        <div class="form-group col-md-4 cvc required">
                           <label>CVC</label>
                           <input type="text" autocomplete='off' value="{{ $reserv_details[0]->cvc_number }}" class="form-control fhome card-cvc" size='4' placeholder="ex. 311" id="cvc" onfocus="this.placeholder = ''" required autofocus >
                        </div>
                        <div class="form-group col-md-4 expiration required">
                           <label>Expiration Month</label>
                           <input type="text" size='2' class="form-control fhome card-expiry-month" value="{{ $reserv_details[0]->card_exp_date }}" placeholder="MM" id="expiry_month" onfocus="this.placeholder = ''" required autofocus >
                        </div>
                        <div class="form-group col-md-4 expiration required">
                           <label>Expiration Year</label>
                           <input type="text" class="form-control fhome card-expiry-year" value="{{ $reserv_details[0]->card_exp_year }}" placeholder="YYYY" size='4' id="expiry_year" onfocus="this.placeholder = ''" required autofocus >
                        </div>
                        <div class='form-row row'>
                           <div class='col-md-12 error form-group hide'>
                              <div class='alert-danger alert'>Please correct the errors and try again. </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xs-12">
                           <div class="form-row formtab">
                              <div class="form-group">
                                 <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                 @if(($reserv_details[0]->paid_amount != '') || ($reserv_details[0]->paid_amount != ''))
                                 <?php $total = ($reserv_details[0]->reservation_amount - $reserv_details[0]->paid_amount); ?>
                                 @else
                                 <?php $total = $reserv_details[0]->reservation_amount; ?>
                                 @endif
                                 <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now @if(($total != 0)||($total != '')) ( {{ $total }} ) @else @endif</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Customer Comments</h4>
                  </div>
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
                                 @foreach($comment as $incomt)
                                 @if($incomt->sent_from != 0)
                                 <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                       <?php
                                          $date = strtotime($incomt->comment_date);
                                          $dd = date('H:i:A',$date);
                                          $dd1 = date('M d',$date);
                                          ?>
                                       <h5>Sunil Rajput <span class="chat_date">{{ $dd1 }}/{{ $dd }}</span></h5>
                                       <p>{{ $incomt->comment }}</p>
                                    </div>
                                 </div>
                                 @else
                                 @endif
                                 @endforeach
                              </div>
                           </div>
                        </div>
                        <div class="mesgs">
                           <div class="msg_history">
                              @foreach($comment as $comt)
                              @if($comt->sent_from != 0)
                              <div class="incoming_msg">
                                 <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                 <div class="received_msg">
                                    <div class="received_withd_msg">
                                       <p>{{ $comt->comment }}</p>
                                       <?php
                                          $date = strtotime($comt->comment_date);
                                          $dd = date('H:i:A',$date);
                                          $dd1 = date('M d',$date);
                                          ?>
                                       <span class="time_date"> {{ $dd }}     |      {{ $dd1 }}</span>
                                    </div>
                                 </div>
                              </div>
                              @else
                              <div class="outgoing_msg">
                                 <div class="sent_msg">
                                    <p>{{ $comt->comment }}</p>
                                    <?php
                                       $date = strtotime($comt->comment_date);
                                       $dd = date('H:i:s',$date);
                                       $dd1 = date('M d',$date);
                                       ?>
                                    <span class="time_date"> {{ $dd }}       |       {{ $dd1 }}</span> 
                                 </div>
                              </div>
                              @endif
                              @endforeach      
                           </div>
                           <div class="type_msg">
                              <div class="input_msg_write">
                                 <!--<input type="hidden" value="{{ $reserv_details[0]->customer_id }}" id="customer_id">-->
                                 <input type="text" class="write_msg" id="cus_msg" placeholder="Type a message" />
                                 <button class="msg_send_btn" id="send_msg" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="partner1" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Partner Comments</h4>
                  </div>
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
                                 @foreach($partnercomment as $incomt)
                                 @if($incomt->sent_from != 0)
                                 <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                       <?php
                                          $date = strtotime($incomt->comment_date);
                                          $dd = date('H:i:A',$date);
                                          $dd1 = date('M d',$date);
                                          ?>
                                       <h5>Sunil Rajput <span class="chat_date">{{ $dd1 }}/{{ $dd }}</span></h5>
                                       <p>{{ $incomt->comment }}</p>
                                    </div>
                                 </div>
                                 @else
                                 @endif
                                 @endforeach
                              </div>
                           </div>
                        </div>
                        <div class="mesgs">
                           <div class="msg_history">
                              @foreach($partnercomment as $parcomt)
                              @if($parcomt->sent_from != 0)
                              <div class="incoming_msg">
                                 <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                 <div class="received_msg">
                                    <div class="received_withd_msg">
                                       <p>{{ $parcomt->comment }}</p>
                                       <?php
                                          $date = strtotime($parcomt->comment_date);
                                          $dd = date('H:i:A',$date);
                                          $dd1 = date('M d',$date);
                                          ?>
                                       <span class="time_date"> {{ $dd }}     |      {{ $dd1 }}</span>
                                    </div>
                                 </div>
                              </div>
                              @else
                              <div class="outgoing_msg">
                                 <div class="sent_msg">
                                    <p>{{ $parcomt->comment }}</p>
                                    <?php
                                       $date = strtotime($parcomt->comment_date);
                                       $dd = date('H:i:s',$date);
                                       $dd1 = date('M d',$date);
                                       ?>
                                    <span class="time_date"> {{ $dd }}       |       {{ $dd1 }}</span> 
                                 </div>
                              </div>
                              @endif
                              @endforeach 
                           </div>
                           <div class="type_msg">
                              <div class="input_msg_write">
                                 <input type="text" class="write_msg" id="part_msg" placeholder="Type a message" />
                                 <button class="msg_send_btn" id="part_send_msg" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="trip_pickup" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Trip Pickup</h4>
                  </div>
                  <div id="content_show">
                     <div class="form-row formtab">
                        <div class="form-group col-md-6">
                            <div class="form-group has-float-label">
                               <select class="form-control"  class="form-control" id="pick_up_location_id" placeholder="" onfocus="this.placeholder = ''" disabled required autofocus>
                                  @foreach($pick_up_location as $pl )
                                  <option value="{{ $pl->location_master_id }}" @if($pl->location_master_id) selected="selected" @else @endif>{{ ucfirst($pl->location_name) }}</option>
                                  @endforeach
                               </select>
                               <label for="status">Pick up location</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group has-float-label">
                               <select class="form-control"  class="form-control" id="key_given_user_id" placeholder="" onfocus="this.placeholder = ''" required autofocus>
                                  <option value="" hidden="" >Select service person</option>
                                  <option value="1" >User-1</option>
                                  <option value="2" >User-2</option>
                               </select>
                               <label for="status">Key Given By</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group has-float-label">
                                <label for="vehicle1">
                                    <input type="checkbox" id="check_key_given_pickup_trip" name="vehicle1"> Key Given 
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div id="fileuploader1">Upload</div>
                            <center>
                                <input type="button" class="btn btn-primary" id="extrabutton" value="Start Upload">
                                <input type="hidden" name="csrf_token" id="csrf_token" value="{!! csrf_token() !!}">
                            </center>
                        </div>
                        <div class="form-row formtab">
                           <div class="form-group">
                              <button type="button" class="btn btn-primary waves-effect waves-light" id="pickup_trip_submit" style="padding:10px 30px !important;">Update</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /.col-md-8 -->
   </div>
</div>
<!-- end wrapper -->
@include('admin_dashboard.footer')
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
@section('script')
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
$("#pickup_trip_id").click(function(){
    var tempcsrf = $('#csrf_token').val();
    var reservation_id = $('#csrf_token').val();
    var assign_start_date = $("#assign_start_date").val();
    var assign_return_date = $("#assign_return_date").val();
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure to assign this vehicle for this reservation !!!',
        buttons: {
        confirm: function () {
          $.ajax({
            type: 'POST',
            url: '{{url('assign_new_vehicle')}}',
            dataType: "json",
            data: {
                    reservation_id:reservation_id,
                    vehicle_id:vehicle_id,
                    assign_start_date:assign_start_date,
                    assign_return_date:assign_return_date,
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
                                action: function () {
                                location.reload();
                                }
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
          },
            cancel: function () {
          }
        }
      });
});


$( ".discount_function_class" ).keyup(function() {
    var cdis = $('#discount').val();
    var pdis = $('#part_amt').val();
    var adis = $('#admin_amt').val();
    var tamt = $('#total_amt').val();
    var tax = $('#tax_amt').val();
    if( tax != ''){
        var totalamount = parseInt(tamt) + parseInt(tax);
    }else{
        var totalamount = tamt;
    }
    var total2 = totalamount - cdis;
    var total3 = total2 - pdis;
    var total4 = total3 - adis;
    $('#total_amount').val(total4);
});

// $("#discount").change( function(){
//       var main = $('#overall_total_amount').val();
//       var disc = $('#discount').val();
//       var tax_amt = $('#tax_amt').val();
//       var otal = $('#overtotal').val();
//       var tamt = $('#total_amt').val();
//       var totalamount = parseInt(otal) + parseInt(tamt);
//       var total2 = total1 - disc;
//       $('#total_amount').val(total2);
//   });

$("#filtered_assign_location").change(function(){
   var location = $(this).val();
   var from_date = $('#assign_start_date').val();
   var to_date = $('#assign_return_date').val();
   var reservation_id = $('#reservation_id').val();
   var tempcsrf = $('#csrf_token').val();
   $.ajax({
      type: 'POST',
      url: '{{url('get_vehicle_list_asssign')}}',
      dataType: "json",
      data: {
               from_date:from_date,
               to_date:to_date,
               location:location,
               reservation_id:reservation_id,
               _token:tempcsrf
            },
      beforeSend: function () {
      },
      success: function (data) {
        if(data['available_vehicle'] != '0'){
        	$("#filtered_assign_vehicle_table").show();
        	$("#filtered_table_data").html(data)
        }else{
          $.alert({
            title: 'Alert!',
            content: ("No vehicle found"),
          });
          $("#filtered_assign_vehicle_table").hide();
        }
      }
    });
});

function assign_new_vehicle_function(arg,arg2) {
    var tempcsrf = $('#csrf_token').val();
    var reservation_id = arg;
    var assign_start_date = $("#assign_start_date").val();
    var assign_return_date = $("#assign_return_date").val();
    var vehicle_id = arg2;
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure to assign this vehicle for this reservation !!!',
        buttons: {
        confirm: function () {
          $.ajax({
            type: 'POST',
            url: '{{url('assign_new_vehicle')}}',
            dataType: "json",
            data: {
                    reservation_id:reservation_id,
                    vehicle_id:vehicle_id,
                    assign_start_date:assign_start_date,
                    assign_return_date:assign_return_date,
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
                                action: function () {
                                location.reload();
                                }
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
          },
            cancel: function () {
          }
        }
      });
    }

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
   
   $('#content_same').click(function(){
       var for_first_name = $("#for_first_name").val();
       var for_last_name = $("#for_last_name").val();
       var for_phone = $("#for_phone").val();
       var for_email = $("#for_email").val();
       var for_door_no = $("#for_door_no").val();
       var for_appartname = $("#for_appartname").val();
       var for_street_name = $("#for_street_name").val();
       var for_city = $("#for_city").val();
       var for_pincode = $("#for_pincode").val();
       var reservation_id = $('#reservation_id').val();
       var tempcsrf = $('#csrf_token').val();
       if($(this).is(":checked")){
           var check_value = "1";
       }else{
           var check_value = "2";
       }
       $.confirm({
          title: 'Confirm!',
          content: 'Are you sure to update customer details here to !!!',
          buttons: {
          confirm: function () {
            $.ajax({
              type: 'POST',
              url: '{{url('add_billing_details')}}',
              dataType: "json",
              data: {
                       for_first_name:for_first_name,
                       for_last_name:for_last_name,
                       for_phone:for_phone,
                       for_email:for_email,
                       for_door_no:for_door_no,
                       for_appartname:for_appartname,
                       for_street_name:for_street_name,
                       for_city:for_city,
                       for_pincode:for_pincode,
                       check_value:check_value,
                       reservation_id:reservation_id,
                       _token:tempcsrf
                    },
              beforeSend: function () {
              },
              success: function (data) {
                if(data == 'success'){
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
      		        location.reload();
                }else{
                  $.alert({
                    title: 'Alert!',
                    content: data,
                  });
                }
              }
            });
            },
              cancel: function () {
                  if(check_value == 1){
                      $("#content_same").prop( "checked", true );
                  }else{
                      $("#content_same").prop( "checked", false );
   
                  }
            }
          }
       }); 
   });
        
    $('#pickup_trip_submit').click(function(){
       var key_given_user = $("#key_given_user_id").val();
       var reservation_id = $('#reservation_id').val();
       var tempcsrf = $('#csrf_token').val();
       if(($("#check_key_given_pickup_trip").is(":checked"))&&(key_given_user != '')){
            $.confirm({
              title: 'Confirm!',
              content: 'Are you sure to move this reservation as a trip !!!',
              buttons: {
              confirm: function () {
                $.ajax({
                  type: 'POST',
                  url: '{{url('add_trip_details')}}',
                  dataType: "json",
                  data: {
                          key_given_user:key_given_user,
                          reservation_id:reservation_id,
                          _token:tempcsrf
                        },
                  beforeSend: function () {
                  },
                  success: function (data) {
                    if(data == 'success'){
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
          		        // location.reload();
          		        window.location.href = "../reservationlist";
                    }else{
                      $.alert({
                        title: 'Alert!',
                        content: data,
                      });
                    }
                  }
                });
                },
                  cancel: function () {
                          $("#key_given_check").prop( "checked", false );
                }
              }
            }); 
       }else{
            $.alert({
                title: 'Alert!',
                content: "Please check the key given checkbox ",
            });
       }
    });
        $('#dob').datepicker({
           autoclose: true,
           format: "yyyy-mm-dd",
        });
        $('#reser_date').datepicker({
           autoclose: true,
           format: "yyyy-mm-dd",
        });
        $('#reservation_date').datepicker({
           autoclose: true,
           format: "yyyy-mm-dd",
        });
       
        $('#reservation_start_date').datepicker({
           autoclose: true,
           format: "dd-mm-yyyy",
        });
        $('#reservation_return_date').datepicker({
           autoclose: true,
           format: "dd-mm-yyyy",
        });
        
        $('#assign_start_date').datepicker({
           autoclose: true,
           format: "yyyy-mm-dd",
        });
        $('#assign_return_date').datepicker({
           autoclose: true,
           format: "yyyy-mm-dd",
        });
      
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
                           $('#reservation_start_date').datepicker("destroy");
                           $('#reservation_return_date').datepicker("destroy");
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
                            $('#reservation_start_date').datepicker({
                                format: "dd-mm-yyyy",  
                                autoclose: true,  
                                startDate: minDt,  
                                endDate: maxDt,  
                                beforeShowDay: function (date) {
                                    var dt_ddmmyyyy = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
                                    return (enableDatesArray.indexOf(dt_ddmmyyyy) != -1);
                                }
                            });
                            $('#reservation_return_date').datepicker({
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
    $('#reservation_start_date').change(function(){
        var date = $(this).val();
        $('#reservation_return_date').datepicker('setStartDate', date);
    });
    $('#reservation_return_date').change(function(){
        var vehicle_id = $('#vehicle_id').val();
        var from_date = $('#reservation_start_date').val();
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
                        //   $(".dynamic_rent_value").html(data['vehicle_rent']);
                           $("#dynamic_rent_value").val(data['vehicle_rent']);
                       }
            });
    });
    
    $("#add_cus_details").click(function(){
           var first_name = $('#first_name').val();
           var last_name = $('#last_name').val();
           var phone = $("#phone").val();
           var email = $('#email').val();
           var door_no = $('#door_no').val();
           var appartment_name = $("#appartment_name").val();
           var street_name = $('#street_name').val();
           var city = $('#city').val();
           var pincode = $('#pincode').val();
           
           var dob = $('#dob').val();
           var country_code = $('#country_code').val();
           
           var reservation_id = $('#reservation_id').val();
           var check_value = '3';
           var tempcsrf = $('#csrf_token').val();
           if((email =='')){
               $.alert({
                 title: 'Alert!',
                 content: "Please fill all mandatory fields !!!",
               });
           }else{
               $.ajax({
             type: 'POST',
             url: '{{ url('add_customer_details') }}',
             dataType: 'json',
             data: {
                   first_name:first_name,
                   last_name:last_name,
                   phone:phone,
                   email:email,
                   door_no:door_no,
                   appartment_name:appartment_name,
                   street_name:street_name,
                   city:city,
                   pincode:pincode,
                   dob:dob,
                   country_code:country_code,
                   reservation_id:reservation_id,
                   check_value:check_value,
                   _token:tempcsrf
                 },
                   beforeSend: function () {
                   },
                   success: function (data) {
                       if(data == "success"){
                           location.reload();
                           $.confirm({
                               title: 'Success',
                               content: 'customer details update successfully',
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
               		        content: "customer details already exists !!!",
               		    });
                       }
                 }
                 });
           }
       });
       
    $("#content_add_billing").click(function(){
           var for_first_name = $('#for_first_name').val();
           var for_last_name = $('#for_last_name').val();
           var for_phone = $("#for_phone").val();
           var for_email = $('#for_email').val();
           var for_door_no = $('#for_door_no').val();
           var for_appartname = $('#for_appartname').val();
           var for_street_name = $("#for_street_name").val();
           var for_city = $('#for_city').val();
           var for_pincode = $('#for_pincode').val();
           var reservation_id = $('#reservation_id').val();
           var tempcsrf = $('#csrf_token').val();
           if((for_first_name =='')||(for_last_name =='')||(for_phone =='')
               ||(for_email =='')||(for_door_no =='')||(for_appartname =='')
               ||(for_street_name =='')||(for_city =='')||(for_pincode =='')){
               $.alert({
             title: 'Alert!',
             content: "Please fill all mandatory fields !!!",
         });
           }else{
               $.ajax({
             type: 'POST',
             url: '{{ url('add_billing_details') }}',
             dataType: 'json',
             data: {
               for_first_name:for_first_name,
               for_last_name:for_last_name,
               for_phone:for_phone,
               for_email:for_email,
               for_door_no:for_door_no,
               for_appartname:for_appartname,
               for_street_name:for_street_name,
               for_city:for_city,
               for_pincode:for_pincode,
               reservation_id:reservation_id,
               _token:tempcsrf
                 },
                   beforeSend: function () {
                   },
                   success: function (data) {
                       if(data == "success"){
                           location.reload();
                           $.confirm({
                               title: 'Success',
                               content: 'billing details update successfully',
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
               		        content: "billing details already exists !!!",
               		    });
                       }
                 }
                 });
           }
       });
       
    $("#status").change(function(){
        var status = $(this).val();
        var reservation_id = $('#reservation_id').val();
        var tempcsrf = $('#csrf_token').val();
        if(status == '5'){
            $.confirm({
              title: 'Confirm!',
              content: 'Are you sure to cancel this reservation !!!',
              buttons: {
              confirm: function () {
                // $.ajax({
                //   type: 'POST',
                //   url: '{{url('add_billing_details')}}',
                //   dataType: "json",
                //   data: {
                //           status:status,
                //           reservation_id:reservation_id,
                //           _token:tempcsrf
                //         },
                //   beforeSend: function () {
                //   },
                //   success: function (data) {
                //     if(data == 'success'){
                //     	$.confirm({
          		    //         title: 'Success',
          		    //         content: 'Updated Successfully.',
          		    //         autoClose: 'logoutUser|300',
          		    //         buttons: {
          		    //             logoutUser: {
          		    //             text: 'OK',
          		    //             },
          		    //         }
          		    //     });
          		    //     location.reload();
                //     }else{
                //       $.alert({
                //         title: 'Alert!',
                //         content: data,
                //       });
                //     }
                //   }
                // });
                },
                  cancel: function () {
                }
              }
           }); 
        }
    });
    
    $("#add_reservation").click(function(){
           var start_date = $('#start_date').val();
           var return_date = $("#return_date").val();
           var pick_up_location_id = $('#pick_up_location_id').val();
           var return_date = $("#return_date").val();
           var status = $('#status').val();
           var reservation_id = $('#reservation_id').val();
           var tempcsrf = $('#csrf_token').val();
           if((email =='')){
               $.alert({
             title: 'Alert!',
             content: "Please fill all mandatory fields !!!",
         });
           }else{
               $.ajax({
             type: 'POST',
             url: '{{ url('add_reserv_details') }}',
             dataType: 'json',
             data: {
                 start_date:start_date,
                 return_date:return_date,
        status:status,
        reservation_id:reservation_id,
                 _token:tempcsrf
                 },
                   beforeSend: function () {
                   },
                   success: function (data) {
                       if(data == "success"){
                           location.reload();
                           $.confirm({
                               title: 'Success',
                               content: 'reservation details update successfully',
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
               		        content: "reservation details already exists !!!",
               		    });
                       }
                 }
                 });
           }
       });
       
    $("#send_msg").click(function(){
              var cus_msg = $("#cus_msg").val();
              var reservation_id = $('#reservation_id').val();
           //   var customer_id = $('#customer_id').val();
              var tempcsrf = $('#csrf_token').val();
              if(cus_msg ==''){
                  $.alert({
                      title: 'Alert!',
                      content: "Body of the message is empty !!!",
                  });
              }else{
                  $.ajax({
                type: 'POST',
                url: '{{ url('cus_insert_message') }}',
                dataType: 'json',
                data: {
                      cus_msg:cus_msg,
                      reservation_id:reservation_id,
                   //   customer_id:customer_id,
                    _token:tempcsrf
                    },
                      beforeSend: function () {
                      },
                      success: function (data) {
                               location.reload();
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
                          }
                        });
                  }
             });
             
    $("#part_send_msg").click(function(){
              var part_msg = $("#part_msg").val();
              var reservation_id = $('#reservation_id').val();
           //   var customer_id = $('#customer_id').val();
              var tempcsrf = $('#csrf_token').val();
              if(part_msg ==''){
                  $.alert({
                      title: 'Alert!',
                      content: "Body of the message is empty !!!",
                  });
              }else{
                  $.ajax({
                type: 'POST',
                url: '{{ url('part_insert_message') }}',
                dataType: 'json',
                data: {
                      part_msg:part_msg,
                      reservation_id:reservation_id,
                   //   customer_id:customer_id,
                    _token:tempcsrf
                    },
                      beforeSend: function () {
                      },
                      success: function (data) {
                               location.reload();
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
                          }
                        });
                  }
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
</script>
<script>
   $(document).ready(function(){
     $('[data-toggle="tooltip"]').tooltip();   
   });
</script>
<script>
   $('#add_new_owner_button').click(function(){
        $('#add_new_owner_tab').toggle(500);
        $('.targetdiv').hide();
   });
   $('.close_add_new_owner_tab').click(function(){
   	$('#add_new_owner_tab').toggle(500);
   });
   function view_owner(arg){
    $('#mySidenav2'+arg).hide();
    $('.ttdiv2').hide();
    $('#add_new_owner_tab').hide();
    jQuery('#mySidenav2'+arg).slideToggle();
   }
   
   function close_view_owner(arg){
    $('#mySidenav2'+arg).hide();
    $('#mySidenav1'+arg).hide();
   }
   
   function edit_owner(arg){
    $('#mySidenav2'+arg).hide();
    $('.ttdiv2').hide();
    $('#add_new_owner_tab').hide();
    jQuery('#mySidenav1'+arg).slideToggle();
   }
   function close_edit_owner(arg){
    $('#mySidenav2'+arg).hide();
    $('#mySidenav1'+arg).hide();
   }
   
   $(function() {
    var table =  $('#owner_list').DataTable({
            "pageLength":100,
            "processing":true,
            "serverSide": true,
         ajax: {
                 url: '{{url('get_all_owner_list')}}',
                 error: function (xhr, error, thrown) {
                 alert(error);
               }
             },
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
           $("td:first", nRow).html(iDisplayIndex +1);
           return nRow;
        },
         columns: [            
             {data:'owner_id', name: 'owner_id'},
             {data:'owner_name', name: 'owner_name'},
             {data:'owner_phone', name: 'owner_phone'},
             {data:'owner_email', name: 'owner_email'},
             {data:'owner_city', name: 'owner_city'},
             {data:'status', name: 'status'},
             {data:'action', name: 'action'},
         ]
     });
     $('.tab_2').on('click', function () {
        table.ajax.reload();
     });
   });
   
   $("#add_new_owner_submit").click(function(){
        var name = $('#name').val();
        var surname = $('#surname').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var doorno = $('#doorno').val();
        var street = $('#street').val();
        var city = $('#city').val();
        var postalcode = $('#postalcode').val();
        var owner_percentage = $('#owner_percentage').val();
        var tempcsrf = $('#csrf_token').val();
        if((name =='')||(phone =='')||(email =='')||(doorno =='')||(street =='')||(city =='')){
            $.alert({
          title: 'Alert!',
          content: "Please fill all mandatory fields !!!",
      });
        }else{
            $.ajax({
          type: 'POST',
          url: '{{ url('add_owner_details') }}',
          dataType: 'json',
          data: {
              name:name,
              surname:surname,
              phone:phone,
              email:email,
              doorno:doorno,
              street:street,
              city:city,
              postalcode:postalcode,
              owner_percentage:owner_percentage,
              _token:tempcsrf
              },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data == "success"){
                        $.confirm({
                            title: 'Success',
                            content: 'Owner added successfully',
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
            		        content: "User already exists !!!",
            		    });
                    }
   	            }
              });
        }
    });
    
    $("#phone").keyup(function() {
        var inpObj = document.getElementById("phone");
        var regex = /^[0-9]+$/;
        if (regex.test(this.value) !== true)
        this.value = this.value.replace(/[^0-9]+/, '');
        if (!inpObj.checkValidity()) {
        document.getElementById("demo").innerHTML = inpObj.validationMessage;
        }
      });
      
      $("#name").keyup(function() {
        var inpObj = document.getElementById("name");
        var regex = /^[a-zA-Z .,]+$/;
        if (regex.test(this.value) !== true)
        this.value = this.value.replace(/[^a-zA-Z .,]+$/, '');
        if (!inpObj.checkValidity()) {
        document.getElementById("demo").innerHTML = inpObj.validationMessage;
        }
      });
      
      $("#surname").keyup(function() {
        var inpObj = document.getElementById("name");
        var regex = /^[a-zA-Z .,]+$/;
        if (regex.test(this.value) !== true)
        this.value = this.value.replace(/[^a-zA-Z .,]+$/, '');
        if (!inpObj.checkValidity()) {
        document.getElementById("demo").innerHTML = inpObj.validationMessage;
        }
      });
      
      
      function ValidateEmail() {
        var email = document.getElementById("email").value;
        var lblError = document.getElementById("lblError");
        lblError.innerHTML = "";
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!expr.test(email)) {
            lblError.innerHTML = "Invalid email address.";
        }
    }
   function delete_owner_info(arg,arg2) {
   var tempcsrf = $('#csrf_token').val();
   var owner_id = arg;
   var status = arg2;
   $.confirm({
    title: 'Confirm!',
    content: 'Are you sure to change this owner status !!!',
    buttons: {
    confirm: function () {
      $.ajax({
        type: 'POST',
        url: '{{url('delete_owner_details')}}',
        dataType: "json",
        data: {
                owner_id:owner_id,
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
            var table =  $('#owner_list').DataTable();
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
   
   function save_update_owner_row(id){
    var update_name = $("#update_name"+id).val();
    var update_surname = $("#update_surname"+id).val();
    var update_mobile_number = $("#update_mobile_number"+id).val();
    var update_email = $("#update_email"+id).val();
    var update_door_no = $("#update_door_no"+id).val();
    var update_street = $("#update_street"+id).val();
    var update_city = $("#update_city"+id).val();
    var update_postal_code = $("#update_postal_code"+id).val();
    var update_percentage = $("#update_percentage"+id).val();
    var owner_id = id;
    var tempcsrf = $('#csrf_token').val();
     $.ajax({
          type: 'POST',
          url: '{{ url('update_owner_details') }}',
          dataType: 'json',
          data: {
              update_name:update_name,
              update_surname:update_surname,
              update_mobile_number:update_mobile_number,
              update_email:update_email,
              update_door_no:update_door_no,
              update_street:update_street,
              update_city:update_city,
              update_postal_code:update_postal_code,
              owner_id: owner_id,
              update_percentage:update_percentage,
              _token:tempcsrf
              },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data == "success"){
                        $.confirm({
                            title: 'Success',
                            content: 'Owner Details updated successfully',
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
            		        content: "User already exists !!!",
            		    });
                    }
   	            }
              });
    }
    
    
   function delete_owner(arg,arg2) {
   var tempcsrf = $('#csrf_token').val();
   var owner_id = arg;
   var status = arg2;
   $.confirm({
       title: 'Confirm!',
       content: 'Are you sure to Delete This Owner !!!',
       buttons: {
       confirm: function () {
         $.ajax({
           type: 'POST',
           url: '{{url('delete_owner_data')}}',
           dataType: "json",
           data: {
                   owner_id:owner_id,
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
   		            content: 'Deleted Successfully.',
   		            autoClose: 'logoutUser|300',
   		            buttons: {
   		                logoutUser: {
   		                    text: 'OK',
   		                },
   		            }
   		        });
               var table =  $('#owner_list').DataTable();
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
   
   $(document).mouseup(function(e){
    var container = $(".ttdiv2");
    // If the target of the click isn't the container
    if(!container.is(e.target) && container.has(e.target).length === 0){
        container.hide();
    }
   });
   
</script>
@endsection