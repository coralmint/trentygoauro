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
<link href="{{ asset('theme_files/external_files/css/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css" />
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
</style>
<div class="wrapper">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-2 mb-3">
            <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Reservation Details</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Invoice Details</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Admin Comments</a>
               </li>
            </ul>
         </div>
         <!-- /.col-md-4 -->
         <div class="col-md-10">
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Reservation Details</h4>
                  </div>
                  <div class="form-row formtab">
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="reserve_unique_id" value="{{ $reserv_details[0]->reserve_unique_id }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="vehicle Model">Reservation Id</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="first_name"value="{{ ucfirst($reserv_details[0]->first_name) }}" disabled onfocus="this.placeholder = ''"  />
                           <label for="Location">Customer_name</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control"  id="license_number" value="{{ $reserv_details[0]->license_number }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Location">License number</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control"  id="license_issue_date" value="{{ $reserv_details[0]->license_issue_date }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Location">License issued date</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control"  id="license_issued_country" value="{{ $reserv_details[0]->license_issued_country }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Location">License country</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="vehicle_reg_no" value="{{ $vehicle_details[0]->vehicle_reg_no }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Location">Vehicle Id</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" value="{{ $reserv_details[0]->start_date }}" placeholder="Reservation Date" id="start_date" disabled>
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                 <label for="Vehicle Color">Booking Date From</label>
                              </div>
                           </div>
                           <!-- input-group -->
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" value="{{ $reserv_details[0]->return_date }}" placeholder="Reservation Date" id="return_date" disabled>
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                 <label for="Vehicle Color">Booking Date To</label>
                              </div>
                           </div>
                           <!-- input-group -->
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
                               @foreach($pick_up_location as $dl )
                              <option value="{{ $dl->location_master_id }}" @if($dl->location_master_id) selected="selected" @else @endif>{{ ucfirst($dl->location_name) }}</option>
                              @endforeach
                           </select>
                           <label for="status">Drop up location</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="vehicle_model" value="{{ $vehicle_details[0]->vehicle_model }}" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Vehicle Color">Vehicle Name</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" id="dynamic_rent_value" id="$vehicle_rent" class="form-control" value="{{ $vehicle_rent }}" onfocus="this.placeholder = ''" disabled autofocus >
                           <label for="Vehicle Color">Vehicle Rent</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input  type="text" class="form-control tribut" id="$baby_seats" value="{{$baby_seats}}" class="form-control" id="Booking Dates" placeholder="Add On" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Add On">Baby Seat Count</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input  type="text" class="form-control tribut" id="vehicle_seat_count" value="{{ $vehicle_details[0]->vehicle_seat_count }}"  class="form-control" id="Booking Dates" placeholder="Add On" onfocus="this.placeholder = ''" disabled required autofocus >
                           <label for="Add On">Adult Seat Count</label>
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
                  </div>
               </div>
               <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Invoice Details</h4>
                  </div>
                  <div class="form-row formtab">
                     <div class="form-group col-md-4">
                        <label>Car Rent(Per Day) <span style="font-size: 10px;">Default rent</span></label>
                        @if($vehicle_details[0]->default_rent != "")
                        <input data-parsley-type="number" type="text" class="form-control tribut" value="{{$vehicle_details[0]->default_rent}}" placeholder="Car Rent(Per Day)" id="default_rent" disabled />
                        @else
                        <input data-parsley-type="number" type="text" class="form-control tribut" value="" placeholder="Car Rent(Per Day)" disabled />             
                        @endif
                     </div>
                     <div class="form-group col-md-4">
                        <label>No of Days</label>
                        <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $reservation_days }}" placeholder="No of Days" id="$reservation_days" disabled />             
                     </div>
                     <div class="form-group col-md-4">
                        <label>Car Rent(Per Day)*No of Days=Total</label>
                        <input data-parsley-type="number" type="text" class="form-control tribut" value="{{$vehicle_rent}}" placeholder="Total" id="$vehicle_rent" disabled />             
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
                        <label>Consession recovery</label>
                        <input data-parsley-type="number" type="number" min="0" id="discount" class="discount_function_class form-control tribut" maxlength="10" required placeholder="Consession recovery" />             
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
               </div>
               <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">Admin Comments</h4>
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
                              @foreach($partnercomment as $parcomt)
                              @if($parcomt->sent_from != 0)
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
                              @else
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
                              @endif
                              @endforeach 
                           </div>
                           <div class="type_msg">
                              <div class="input_msg_write">
                                 <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                 <input type="hidden" value="{{ $reservation_id }}" id="reservation_id">
                                 <input type="hidden" value="{{ $partner_id }}" id="partner_id">
                                 <input type="text" class="write_msg" id="partner_msg" placeholder="Type a message" />
                                 <button class="msg_send_btn" id="partner_send_msg" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
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
</div>
<!-- end wrapper -->
@include('admin_dashboard.footer')
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
   $(document).ready(function(){
     $("a").click(function(){
       $("button").slideToggle();
     });
   });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
@section('script')
<!-- jQuery  -->
<script src="{{ asset('theme_files/assets/js/jquery.min.js') }}"></script>
<!-- plugin js -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('theme_files/external_files/js/jquery-confirm.min.js') }}"></script>
<!-- plugin js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="{{ asset('theme_files/plugins/timepicker/bootstrap-timepicker.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- Init js -->
<script src="{{ asset('theme_files/assets/pages/jquery.form-pickers.init.js') }}"></script>
<script>
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
    
   
          
    $("#partner_send_msg").click(function(){
              var partner_msg = $("#partner_msg").val();
              var reservation_id = $('#reservation_id').val();
              var partner_id = $('#partner_id').val();
              var tempcsrf = $('#csrf_token').val();
              if(partner_msg ==''){
                  $.alert({
                      title: 'Alert!',
                      content: "Body of the message is empty !!!",
                  });
              }else{
                  $.ajax({
                type: 'POST',
                url: '{{ url('partner_send_message') }}',
                dataType: 'json',
                data: {
                      partner_msg:partner_msg,
                      reservation_id:reservation_id,
                      partner_id:partner_id,
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
   
</script>
@endsection