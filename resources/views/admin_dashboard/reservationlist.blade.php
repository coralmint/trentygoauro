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
                     <h4 class="customdet">Reservation</h4>
                     <div class="btn-group pull-right" style="margin-top: -3.5%;">
                          <span id="add_new_partner_button" href="{{ url('add_reservation_form') }}" class="pull-right btn btn-warning waves-effect waves-light">Add New</span>
                          <!--<h4 class="viewpro"> <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left" style="color: ##28a750; margin-right: 8px;"></i><span style="color: ##28a750; font-size: large; margin-right: 15px;">Back</span></a> Partner List </h4>-->
                       </div>
                  </div>
                  <div class="form-row formtab" style="padding:20px 20px 5px;">
                     <div class="form-group col-md-2">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="first_name" placeholder="Customer Name" onfocus="this.placeholder = ''" required autofocus >
                           <label for="fullname">Customer Name</label>
                        </div>
                     </div>
                     <div class="form-group col-md-2">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Phone Number">Phone Number</label>
                        </div>
                     </div>
                     <div class="form-group col-md-2">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="email" placeholder="Email Id" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Email Id">Email Id</label>
                        </div>
                     </div>
                     <div class="form-group col-md-2">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="vechicle_id" placeholder="Vechicle Id" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Vechicle Id">Vechicle Id</label>
                        </div>
                     </div>
                     <div class="form-group col-md-2">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="reservation_id" placeholder="Reservation Id" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Reservation Id">Reservation Id</label>
                        </div>
                     </div>
                     <div class="form-group col-md-2">
                        <div class="form-group has-float-label">
                           <select class="form-control" id="reserve_through" class="form-control" id="reserve_through" placeholder="" onfocus="this.placeholder = ''" required autofocus>
                              <option value="" hidden>Select Option</option>
                              <option value="">Show All</option>
                              <option value="1">Walkin</option>
                              <option value="2">Website</option>
                           </select>
                           <label for="fullname">Reserve</label>
                        </div>
                     </div>
                     <div class="form-group col-md-2">
                        <div class="form-group has-float-label">
                           <select class="form-control" id="status" class="form-control" id="status" placeholder="" onfocus="this.placeholder = ''" required autofocus>
                              <option value="" hidden>Select Option</option>
                              <option value="">Show All</option>
                              <option value="3">Confirmed</option>
                              <option value="6">Cancelled</option>
                           </select>
                           <label for="status">status</label>
                        </div>
                     </div>
                     <div class="form-group col-md-2">
                        <div class="form-group has-float-label">
                           <select class="form-control" id="status" class="form-control" id="payment" placeholder="" onfocus="this.placeholder = ''" required autofocus>
                              <option value="">Upcoming</option>
                              <option value="1">History</option>
                              <option value="2">Cancelled</option>
                           </select>
                           <label for="Payment">Payment</label>
                        </div>
                     </div>
                     <div class="form-group col-md-2">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="reservation_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                              </div>
                           </div>
                           <!-- input-group -->
                           <label for="Booking Dates">Date of Reservation</label>  
                        </div>
                     </div>
                     <div class="form-group col-md-2">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="start_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                              </div>
                           </div>
                           <!-- input-group -->
                           <label for="Booking Dates">From Dates</label>  
                        </div>
                     </div>
                     <div class="form-group col-md-2">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="return_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                              </div>
                           </div>
                           <!-- input-group -->
                           <label for="Booking Dates">To Dates</label>  
                        </div>
                     </div>
                     <!--<div class="form-group col-md-2">-->
                     <!--      <label>Multiple Status</label>-->
                     <!--      <select class="select2 form-control select2-multiple" id="multi_select" multiple="multiple" multiple data-placeholder="Select Status ...">-->
                              <!--<option value="">Show All</option>-->
                     <!--         <option value="1">New</option>-->
                     <!--         <option value="2">Inprogress</option>-->
                     <!--         <option value="3">Confirmed</option>-->
                     <!--         <option value="4">Reservation Pending</option>-->
                     <!--         <option value="5">Cancel Inprogress</option>-->
                     <!--         <option value="6">Cancelled</option>-->
                     <!--         <option value="7">Trip Pending</option>-->
                     <!--         <option value="8">Trip Closed</option>-->
                     <!--      </select>-->
                     <!--   </div>-->
                     <div class="form-group col-md-2">
                        <div class="form-group has-float-label">
                           <button type="button" class="btn btn-info waves-effect waves-light btn-sm"  id="filter_clear"><i class="mdi mdi-reload"></i></button>
                        </div>
                     </div>
                     <!--<div class="form-group col-md-2">-->
                     <!--   <div class="form-group has-float-label">-->
                     <!--      <select class="form-control" id="status" class="form-control" id="payment" placeholder="" onfocus="this.placeholder = ''" required autofocus>-->
                     <!--         <option value="">Upcoming</option>-->
                     <!--         <option value="1">Today</option>-->
                     <!--         <option value="2">Cancelled</option>-->
                     <!--      </select>-->
                     <!--      <label for="Payment">Payment</label>-->
                     <!--   </div>-->
                     <!--</div>-->
                  </div>
                  <div class="form-row formtab" style="padding:0px 20px;">
                     <div class="form-group">
                        <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                        <button type="button" class="btn btn-primary waves-effect waves-light" onClick="filter_submit(1);" id="filter_submit11">Search</button>
                     </div>
                  </div>
               </div>
               <div class="container-fluid" style="background-color:#fff;max-width:100%;margin-top: 10px;">
                  <div class="row">
                     <div class="col-md-12 ">
                        <div class="tab-content py-3 px-3 px-sm-0" id="home">
                           <div class="tab-pane  show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                              <form id="color_datatable">
                                 <table class="table table-bordered dataTable no-footer mobile-table" id="reservation_list_datatable" style="table-layout:fixed; width: 100%;">
                                    <thead>
                                        <button type="button" class="btn btn-primary waves-effect waves-light" onClick="filter_submit(2);" id="today_filter_submit1111">Today</button>
                                        <button type="button" class="btn btn-primary waves-effect waves-light" onClick="filter_submit(3);" id="today_filter_submit1111">Upcoming Reservation</button>
                                       <tr>
                                          <th style="width: 15px !important;">#</th>
                                          <th>Reservation Id</th>
                                          <th>Mobile No</th>
                                          <th>Partner</th>
                                          <th>Booking Form</th>
                                          <th>Booking To</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                 </table>
                                 <table class="table table-bordered dataTable no-footer mobile-table" id="filter_reservation_list_datatable" style="table-layout:fixed; width: 100%;display:none;">
                                    <thead>
                                       <tr>
                                          <th style="width: 15px !important;">#</th>
                                          <th>Reservation Id</th>
                                          <th>Mobile No</th>
                                          <th>Partner</th>
                                          <th>Booking Form</th>
                                          <th>Booking To</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                 </table>
                              </form>
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
   
   /*Reservation list*/ 
    $("#filter_clear").click(function(){
    $('#reservation_list_datatable').show();
    $('#filter_reservation_list_datatable').hide();
    $('#reservation_list_datatable_wrapper').show();
    $('#filter_reservation_list_datatable_wrapper').hide();
    // $('#a_pdf').hide();
    $("#first_name").val('');
    $("#phone").val('');
    $("#email").val('');
    $('#vechicle_id').val('');
    $("#reservation_id").val('');
    $("#reserve_through").val('');
    $('#status').val('');
    $("#reservation_date").val('');
    $("#start_date").val('');
    $('#return_date').val('');
    $('#multi_select').val('');
    // alert('ok');
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
    
//     $('#start_date').change(function(){
//       var d=$(this).val();
//       $('#return_date').datepicker({
//         format: "yyyy/mm/dd",
//         autoclose: true,
//         startDate: d
//       }); 
//   });
   
   $(document).ready(function () {
       $(function() {
   	   var table =  $('#reservation_list_datatable').DataTable({
               "pageLength":50,
               "processing":true,
               "serverSide": false,
   	        ajax: {
   	                url: '{{url('get_all_reservation_list')}}',
   	                error: function (xhr, error, thrown) {
   	                alert(error);
   	              }  
   	            },
   	            
              "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                    if(aData['sst'] != 1){
                        $("td:nth-child(1)",nRow).click(function(){
                            window.location = "reservations_details/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(1)",nRow).click(function(){
                            window.location = "reservations_details/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(2)",nRow).click(function(){
                            window.location = "reservations_details/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(3)",nRow).click(function(){
                            window.location = "reservations_details/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(4)",nRow).click(function(){
                            window.location = "reservations_details/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(5)",nRow).click(function(){
                            window.location = "reservations_details/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(6)",nRow).click(function(){
                            window.location = "reservations_details/"+aData['crypt_id'];
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
   	            {data:'reservation_id', name: 'reservation_id'},
   	            {data:'reservation_id', name: 'reservation_id'},
   	            {data:'phone', name: 'phone'},
   	            {data:'first_name', name: 'first_name'},
   	            {data:'start_date', name: 'start_date'},
   	            {data:'return_date', name: 'return_date'},
   	            {data:'status', name: 'status'},
   	            {data:'action', name: 'action'},
   	        ]
   	    });
   	    $('.tab_2').on('click', function () {
   	       table.ajax.reload();
   	    });
   	});
   });
   
   function filter_submit(arg) {
        $('#reservation_list_datatable_wrapper').hide();
        $('#filter_reservation_list_datatable_wrapper').show();
        var filter_from = arg;
        var status = $("#status").val();
        var first_name = $("#first_name").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var vechicle_id = $("#vechicle_id").val();
        var reservation_id = $("#reservation_id").val();
        var reserve_through = $('#reserve_through').val();
        var reservation_date = $("#reservation_date").val();
        var start_date = $("#start_date").val();
        var return_date = $("#return_date").val();
        var tempcsrf = $('#csrf_token').val();
        
        $('#reservation_list_datatable').hide();
        $('#filter_reservation_list_datatable').show();
        $(function() {
            var table =  $('#filter_reservation_list_datatable').DataTable();
            if($.fn.dataTable.isDataTable('#filter_reservation_list_datatable'))
            {
                table.destroy();
            }
    	   var table =  $('#filter_reservation_list_datatable').DataTable({
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
            		            first_name:first_name,
            		            phone:phone,
            		            email:email,
            		            vechicle_id:vechicle_id,
            		            reservation_id:reservation_id,
            		            reserve_through:reserve_through,
            		            reservation_date:reservation_date,
            		            start_date:start_date,
            		            return_date:return_date,
            		            filter_from:filter_from,
            		            _token:tempcsrf
            		          },
    	                url: '{{url('filter_get_all_reservation_list')}}',
    	                error: function (xhr, error, thrown) {
    	                alert(thrown);      
    	              }
    	            },
                  
                  "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                    if(aData['sst'] != 1){
                        $("td:nth-child(1)",nRow).click(function(){
                            window.location = "reservations_details/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(1)",nRow).click(function(){
                            window.location = "reservations_details/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(2)",nRow).click(function(){
                            window.location = "reservations_details/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(3)",nRow).click(function(){
                            window.location = "reservations_details/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(4)",nRow).click(function(){
                            window.location = "reservations_details/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(5)",nRow).click(function(){
                            window.location = "reservations_details/"+aData['crypt_id'];
                            return false;
                        });
                        $("td:nth-child(6)",nRow).click(function(){
                            window.location = "reservations_details/"+aData['crypt_id'];
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
       	            {data:'reservation_id', name: 'reservation_id'},
       	            {data:'reservation_id', name: 'reservation_id'},
       	            {data:'phone', name: 'phone'},
       	            {data:'first_name', name: 'first_name'},
       	            {data:'start_date', name: 'start_date'},
       	            {data:'return_date', name: 'return_date'},
       	            {data:'status', name: 'status'},
       	            {data:'action', name: 'action'},
        	        ]
    	    });
        });
    }
    
  
    
   
   function reservation_info(arg,arg2) {
    var tempcsrf = $('#csrf_token').val();
    var reservation_id = arg;
    var status = arg2;
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure to conform this reservation !!!',
        buttons: {
        confirm: function () {
          $.ajax({
            type: 'POST',
            url: '{{url('change_reservation_details')}}',
            dataType: "json",
            data: {
                    reservation_id:reservation_id,
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
                var table =  $('#reservation_list_datatable').DataTable();
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
    
    $("#today").click(function(){
        var tempcsrf = $('#csrf_token').val();
            $.ajax({
          type: 'POST',
          url: '{{ url('today_list') }}',
          dataType: 'json',
           });
           var table =  $('#reservation_list_datatable').DataTable();
   	             		table.ajax.reload();
    });
    
    
</script>
@endsection