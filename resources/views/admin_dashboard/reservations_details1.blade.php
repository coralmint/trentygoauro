@extends('layouts.adminmaster')
@section('content')
<header id="topnav">
   @include('admin_dashboard.menu')
</header>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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
            </ul>
         </div>
         <!-- /.col-md-4 -->
         <div class="col-md-10">
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Customer Details</h4>
                  </div>
                  <div class="form-row formtab" style="    padding: 20px 20px 0px;">
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="res_is" value="{{ $reserv_details[0]->reservation_id }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Vehicle Color">Reservation Id</label>
                        </div>
                     </div>
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="res_name" value="{{ $reserv_details[0]->first_name }}{{ $reserv_details[0]->last_name }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Vehicle Color">Customer Name</label>
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
                     <div class="form-group col-md-3">
                        <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                        <button type="button" class="btn btn-primary waves-effect waves-light" id="add_location_submit" style="padding:7px 30px !important;    float: right;">Edit</button>
                     </div>
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
                           <input type="text" class="form-control" id="state" value="{{ $reserv_details[0]->state }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">State</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="pincode" value="{{ $reserv_details[0]->pincode }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Pincode</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-row formtab">
                     <div class="form-group">
                        <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                        <input type="hidden" value="{{ $reservation_id }}" id="reservation_id">
                        <button type="button" class="btn btn-primary waves-effect waves-light" id="add_cus_details" style="padding:10px 30px !important;">Save</button>
                        <button type="button" class="btn  waves-effect waves-light" id="add_location_submit" style="padding:10px 30px !important;">Cancel</button>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="col-md-12 vimkim" style="padding: 3px 20px 50px;">
                     <h4 class="customdet" style="float:left;">Billing Details</h4>
                     <span class="detail" style=" color:#fff;   text-align: right;
                        float: right;"><input type="checkbox" name="vehicle1" value="Bike">
                     <label for="vehicle1"> Content Same as customer details</label></span>
                  </div>
                  <div class="form-row formtab">
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="for_first_name" value="{{ $reserv_details[0]->for_first_name }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="vehicle Model">First Name</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="for_last_name" value="{{ $reserv_details[0]->for_last_name }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Location">Last Name</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="for_phone" value="{{ $reserv_details[0]->for_phone }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Mobile Number</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="for_email" value="{{ $reserv_details[0]->for_email }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Email Id</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="for_door_no" value="{{ $reserv_details[0]->for_door_no }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Door No</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="for_appartname" value="{{ $reserv_details[0]->for_appartname }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Appartment Name</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="for_street_name" value="{{ $reserv_details[0]->for_street_name }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Street Name</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="for_city" value="{{ $reserv_details[0]->for_city }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">City</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="for_state" value="{{ $reserv_details[0]->for_state }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">State</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="for_pincode" value="{{ $reserv_details[0]->for_pincode }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Pincode</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-row formtab">
                     <div class="form-group">
                        <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                        <button type="button" class="btn btn-primary waves-effect waves-light" id="add_billing" style="padding:10px 30px !important;">Save</button>
                        <button type="button" class="btn  waves-effect waves-light" id="add_location_submit" style="padding:10px 30px !important;">Cancel</button>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Reservation Details</h4>
                  </div>
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
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" value="{{ $reserv_details[0]->start_date }}" id="start_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                 <label for="Vehicle Color">Booked Date From</label>
                              </div>
                           </div>
                           <!-- input-group -->
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" value="{{ $reserv_details[0]->return_date }}" id="return_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                 <label for="Vehicle Color">Booked Date To</label>
                              </div>
                           </div>
                           <!-- input-group -->
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control"  value="{{ $partner_details[0]->partner_name }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Location">Partner Name</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" value="{{ $vehicle_details[0]->vehicle_model }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Vehicle Color">Vehicle Name</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="baby_seat" value="{{ $vehicle_details[0]->vehicle_seat_count }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Baby Seat Counting</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="adult_seat" value="{{ $vehicle_details[0]->vehicle_seat_count }}" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vehicle Color">Adult Seat Counting</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <select class="form-control"  class="form-control" id="status" placeholder="" onfocus="this.placeholder = ''" required autofocus>
                              <option value="" hidden>Pending</option>
                              <option value="">Cancelled</option>
                              <option value="1">Reserved</option>
                              <option value="2">Trip Started</option>
                              <option value="2">Trip Aborted</option>
                           </select>
                           <label for="fullname">Reservation Status</label>
                        </div>
                     </div>
                     <!--<div class="form-group col-md-4">-->
                     <!--   <div class="form-group has-float-label">-->
                     <!--      <select class="form-control"  class="form-control" id="status" placeholder="" onfocus="this.placeholder = ''" required autofocus>-->
                     <!--         <option value="" hidden>Select Option</option>-->
                     <!--         <option value="">Show All</option>-->
                     <!--         <option value="1" @if($reserv_details[0]->status == '1') selected="selected" @else @endif >New</option>-->
                     <!--         <option value="2">Inprogress</option>-->
                     <!--         <option value="3">Confirmed</option>-->
                     <!--         <option value="4">Reservation Pending</option>-->
                     <!--         <option value="5">Cancel Inprogress</option>-->
                     <!--         <option value="6">Cancelled</option>-->
                     <!--         <option value="7">Trip Pending</option>-->
                     <!--         <option value="8">Trip Closed</option>-->
                     <!--      </select>-->
                     <!--      <label for="status">status</label>-->
                     <!--   </div>-->
                     <!--</div>-->
                  </div>
                  <div class="form-row formtab">
                     <div class="form-group">
                        <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                        <button type="button" class="btn btn-primary waves-effect waves-light" id="add_reservation" style="padding:10px 30px !important;">Save</button>
                        <button type="button" class="btn  waves-effect waves-light" id="add_location_submit" style="padding:10px 30px !important;">Cancel</button>
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
@include('admin_dashboard.footer')
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="{{ asset('theme_files/plugins/timepicker/bootstrap-timepicker.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- jQuery  -->
<script src="{{ asset('theme_files/assets/js/jquery.min.js') }}"></script>
<!-- plugin js -->
<script src="{{ asset('theme_files/plugins/timepicker/bootstrap-timepicker.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- Init js -->
<script src="{{ asset('theme_files/assets/pages/jquery.form-pickers.init.js') }}"></script>
<script>
   $('#reser_date').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
    });
    
    $('#reservation_date').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
    });
    
    $('#start_date').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
    });
    
     $('#return_date').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
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
		var state = $('#state').val();
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
              state:state,
			  pincode:pincode,
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
    
    $("#add_billing").click(function(){
        var for_first_name = $('#for_first_name').val();
        var for_last_name = $('#for_last_name').val();
        var for_phone = $("#for_phone").val();
        var for_email = $('#for_email').val();
		var for_door_no = $('#for_door_no').val();
		var for_appartname = $('#for_appartname').val();
        var for_street_name = $("#for_street_name").val();
        var for_city = $('#for_city').val();
		var for_state = $('#for_state').val();
		var for_pincode = $('#for_pincode').val();
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
			  for_state:for_state,
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
    
    $("#add_reservation").click(function(){
        var start_date = $('#start_date').val();
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
    
</script>
@endsection