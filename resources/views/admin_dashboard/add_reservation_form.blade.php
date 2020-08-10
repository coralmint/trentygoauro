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
   li.nav-item {
   float: left;
   margin: 0 auto;
   display: block;
   }
   ul#myTab {
   display: table;
   margin: 0 auto;
   }
   .nav-pills .nav-item.show .nav-link, .nav-pills .nav-link.active {
   margin: 0 20px;
   display: block;
   float: left;
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
   padding: 7px 50px !important;
   -webkit-box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
   -moz-box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
   box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
   }
   .nav>li>a:focus, .nav>li>a:hover {
   text-decoration: none;
   background-color: #13b0b8;
   padding: 7px 50px !important;
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
   @media (max-width: 768px) {
   .nav-pills .nav-link {
   margin: 20px 10px !important;
   }
   .nav-pills .nav-item.show .nav-link, .nav-pills .nav-link.active {
   margin: 20px 0px !important;
   }
   }
</style>
<div class="wrapper">
   <div class="container-fluid">
      <div class="row">
         <!-- /.col-md-4 -->
         <div class="col-md-12">
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-md-12 vimkim">
                     <h4 class="customdet">New Reservation</h4>
                  </div>
                  <div class="card-box" style="padding:20px;">
                     <form>
                         <span style="font-size: 17px;font-weight: 700;">Basic Details<hr style="margin-top: 0%;"></span>
                        <div class="form-row">
                           <div class="form-group col-md-4">
                              <label>First Name</label>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="partner_name" />             
                           </div>
                           <div class="form-group col-md-4">
                              <label>Last Name</label>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="partner_name" />             
                           </div>
                           <div class="form-group col-md-4">
                              <label>Email Address</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="email" />             
                           </div>
                           <div class="form-group col-md-4">
                              <label>Mobile No</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="" id="phone_no" />
                           </div>
                           <div class="form-group col-md-4">
                              <label>Country Code</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="email" />             
                           </div>
                        </div>
                        <span style="font-size: 17px;font-weight: 700;">Personal Details<hr style="margin-top: 0%;"></span>
                        <div class="form-row">
                           <div class="form-group col-md-4">
                               <label>Date of birth</label><span style="color: red;">*</span>
                              <div class="input-group">
                                 <input type="text" class="form-control" value="" placeholder="dd-mm-yyyy" id="reservation_date">
                              </div>
                            </div>
                           <div class="form-group col-md-4">
                              <label>Door no</label>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="partner_name" />             
                           </div>
                           <div class="form-group col-md-4">
                              <label>Name of the Apartment</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="email" />             
                           </div>
                           <div class="form-group col-md-3">
                              <label>Street Name</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="" id="phone_no" />
                           </div>
                           <div class="form-group col-md-3">
                              <label>Code postal</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="email" />             
                           </div>
                           <div class="form-group col-md-3">
                              <label>City</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="email" />             
                           </div>
                           <div class="form-group col-md-3">
                              <label>Country</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="email" />             
                           </div>
                        </div>
                       <span style="font-size: 17px;font-weight: 700;">Trip Details<hr style="margin-top: 0%;"></span>
                        <div class="form-row">
                           <div class="form-group col-md-3">
                              <label>Pick up location</label>
                               <select class="form-control" id="status">
                                    <option hidden value="">Select Status</option>
                                    <option value="">Show All</option>
                                    <option value="1">New Partner</option>
                                    <option value="2">New Partner</option>
                                 </select>             
                           </div>
                           <div class="form-group col-md-3">
                              <label>Drop location</label>
                               <select class="form-control" id="status">
                                    <option hidden value="">Select Status</option>
                                    <option value="">Show All</option>
                                    <option value="1">New Partner</option>
                                    <option value="2">New Partner</option>
                                 </select>             
                           </div>
                           <div class="form-group col-md-3">
                               <label>Start Date</label><span style="color: red;">*</span>
                              <div class="input-group">
                                 <input type="text" class="form-control" value="" placeholder="dd-mm-yyyy" id="reservation_date">
                              </div>
                            </div>
                            <div class="form-group col-md-3">
                               <label>End Date</label><span style="color: red;">*</span>
                              <div class="input-group">
                                 <input type="text" class="form-control" value="" placeholder="dd-mm-yyyy" id="reservation_date">
                              </div>
                            </div>
                        </div>
                        <span style="font-size: 17px;font-weight: 700;">License Details<hr style="margin-top: 0%;"></span>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                              <label>License number</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="email" />             
                           </div>
                            <div class="form-group col-md-4">
                              <label>Country</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="email" />             
                           </div>
                           <div class="form-group col-md-4">
                               <label>Issued Date</label><span style="color: red;">*</span>
                              <div class="input-group">
                                 <input type="text" class="form-control" value="" placeholder="dd-mm-yyyy" id="reservation_date">
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label>Issued Country</label>
                               <select class="form-control" id="status">
                                    <option hidden value="">Select Status</option>
                                    <option value="">Show All</option>
                                    <option value="1">New Partner</option>
                                    <option value="2">New Partner</option>
                                 </select>             
                           </div>
                        </div>
                        <span style="font-size: 17px;font-weight: 700;">Card Details<hr style="margin-top: 0%;"></span>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                              <label>Card holder name</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="email" />             
                           </div>
                           <div class="form-group col-md-3">
                              <label>Card number</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="email" />             
                           </div>
                            <div class="form-group col-md-2">
                              <label>cvc</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="email" />             
                           </div>
                           <div class="form-group col-md-2">
                              <label>Exper month</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="email" />             
                           </div>
                           <div class="form-group col-md-2">
                              <label>Exper year</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="" id="email" />             
                           </div>
                        </div>
                        <div class="form-group">
                           <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                           <button type="button" class="btn btn-primary waves-effect waves-light" id="add_partner">Add</button>
                           <button type="button" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
                        </div>
                     </form>
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
<script>
    $('#reservation_date').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
    });
</script>
@endsection