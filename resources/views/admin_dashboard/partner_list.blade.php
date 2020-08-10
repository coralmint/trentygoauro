@extends('layouts.adminmaster')
@section('content')
<header id="topnav">
   @include('admin_dashboard.menu')
</header>
<style>
   .multiselect {
   width: 100%;
   }
   .selectBox {
   position: relative;
   }
   .selectBox select {
   width: 100%;
   height:38px;
   font-weight: 400;
   border: 1px solid #ddd;
   color: #707377;
   }
   .overSelect {
   position: absolute;
   left: 0;
   right: 0;
   top: 0;
   bottom: 0;
   }
   .btn-primary {
    background-color: #24366d !important;
    border: 1px solid #22356e !important;
}
.btn-default {
    color: #25376b !important;
    border: 1px solid #24356f !important;
    background: transparent !important;
}
h4.page-title {
    background-color: #24366d;
    margin: 0px;
    color: #fff;
    padding: 10px;
}
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .btn-primary.focus, .btn-primary:active, .btn-primary:focus, .btn-primary:hover, .open > .dropdown-toggle.btn-primary {
    background-color: #ffffff !important;
    border-color: #25366c !important;
    color: #c71345 !important;
}
   #checkboxes {
   display: none;
   border: 1px #dadada solid;
   }
   #checkboxes label {
   display: block;
   }
   #checkboxes label:hover {
   background-color: #1e90ff;
   }
   .btn-default{
   color: #4489e4;
   border: 1px solid #4489e4;
   }
   button#add_new_color {
   float: right;
   margin-top: 4%;
   }
   .viewpro{
   color:#071DAA;
   }
   input.form-control.tribut {
   color: #071DAA !important;
   }
   .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
   border: 0;
   border-bottom: 2px solid #EF8012;
   }
   .nav-tabs {
   border-bottom: 1px solid #dee2e6;
   width: 50%;
   margin: 0 auto;
   }
   .col-md-12.tableview {
   background-color: #24366b;
   color: #fff;
   font-size: 24px;
   padding: 10px 20px 1px;
   }
   .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .btn-primary.focus, .btn-primary:active, .btn-primary:focus, .btn-primary:hover, .open > .dropdown-toggle.btn-primary{color:#24366b !important;}

    #partner_list_datatable tr{
        cursor: pointer;   
    }
    #filter_partner_list_datatable tr{
        cursor: pointer;   
    }
    .iffyTip {
    overflow:hidden;
    white-space:nowrap;
    text-overflow:ellipsis;
}
.iffyTip{
  max-width:200px;
}
.container-fluid{
    max-width:100%;
}
</style>
<div class="wrapper">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <div class="btn-group pull-right">
                  <span id="add_new_partner_button" class="pull-right btn btn-primary waves-effect waves-light">Add New</span>
                  <!--<h4 class="viewpro"> <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left" style="color: ##28a750; margin-right: 8px;"></i><span style="color: ##28a750; font-size: large; margin-right: 15px;">Back</span></a> Partner List </h4>-->
               </div>
               <div class="btn-group pull-left">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                     <li class="breadcrumb-item"><a href="dashboard">Partner Management</a></li>
                     <li class="breadcrumb-item active">Profile Table</li>
                  </ol>
               </div>
                <!--<a href="vehicledetails#documents" style="color:green;font-size:20px;padding-left: 66px;">Go to Documents</a>-->
            </div>
         </div>
      </div>
      <div class="row" style="display : none" id="add_new_partner_tab">
      <div class="col-lg-12">
         <div class="card-box" style="padding:20px;">
            <h4 class="page-title">Add New Partner<span id="" style="cursor: pointer;" class="close_location_tab pull-right"><i class="mdi mdi-close"></i></span></h4>
            <hr>
            <form>
                 <div class="form-row">
                  <div class="form-group col-md-4">
                     <label>Partner Name</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="Partner Name" id="partner_name" />             
                  </div>
                  <div class="form-group col-md-4">
                     <label>Mobile No</label><span style="color: red;">*</span>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Mobile No" id="phone_no" />
                  </div>
                  <div class="form-group col-md-4">
                     <label>Email Address</label><span style="color: red;">*</span>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="Email Address" id="email" />             
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-4">
                     <label>Partner Type</label><span style="color: red;">*</span>
                     <select class="form-control tribut" id="add_new_partner_type">
                        <option hidden>Select partner type</option>
                        <option value="1"> Non Insurance Partner</option>
                        <option value="2"> Insurance Partner</option>
                     </select>
                  </div>
                  
                  <div class="form-group col-md-4">
                     <label>Vehicle count</label>
                     <input data-parsley-type="number" type="number" class="form-control tribut" maxlength="3" min="1" onkeypress="return event.charCode >= 48" required placeholder="vehicle_count" id="vehicle_count" />
                  </div>
                   <div class="form-group col-md-4">
                     <label>Location</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="" required placeholder="location" id="location_name" />             
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
      <div class="row" id="add_new_color_tab">
         <div class="col-lg-12">
            <div class="card-box" style="padding:20px;">
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="sel1">Status</label>
                     <select class="form-control" id="status">
                        <option hidden value="">Select Status</option>
                        <option value="">Show All</option>
                        <option value="1">New Partner</option>
                        <option value="2">Approved</option>
                        <option value="3">Request received</option>
                        <option value="4">Published</option>
                        <option value="5">Unpublished</option>
                        <option value="67">Resend</option>
                        <option value="8">Rejected</option>
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="sel1">Location</label>
                     <select class="form-control" id="partner_area">
                        <option value="" hidden>Select Location</option>
                        <option value="">Show All</option>
                        <!--<option value="">None</option>-->
                        @foreach($partner_location as $pi)
                        <option value="{{ $pi->partner_area }}">{{ ucfirst($pi->partner_area) }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-3">
                     <label>Partner Id</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" placeholder="Partner Id" id="unique_partner_id" />             
                  </div>
                  <div class="form-group col-md-3">
                     <label>Partner name</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" placeholder="Partner name" id="partner_name" />             
                  </div>
                  <div class="form-group col-md-3">
                     <label>Mobile Number</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" placeholder="Mobile Number" id="partner_phone" />             
                  </div>
                  <div class="form-group col-md-3">
                     <label>Email Address</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" placeholder="Email Address" id="partner_email" />             
                  </div>
                  <div class="form-group col-md-6">
                     <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                     <button type="button" class="btn btn-primary waves-effect waves-light" id="filter_submit">Search</button>
                  </div>
                  <div class="form-group col-md-6">
                        <center>
                        <div class="row">
                           <div class="col-md-12">
                               <button type="button" class="btn btn-info waves-effect waves-light btn-sm"  id="filter_clear"><i class="mdi mdi-reload"></i></button>
                           </div>
                        </div>
                        </center>
                   </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="container-fluid">
      <div class="col-md-12 tableview">
         <p class="viewtab">Partners</p>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="card-box" style="padding:20px;">
               <!-- Tabs -->
               <div class="row">
                  <div class="col-md-12 ">
                     <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane  show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                              <table class="table table-bordered dataTable no-footer mobile-table" id="partner_list_datatable" style="table-layout:auto; width: 100%;">
                                 <thead>
                                    <tr>
                                       <th style="width: 15px !important;">#</th>
                                       <th>Partner Id</th>
                                       <th>Name</th>
                                       <th>Mobile Number</th>
                                       <th>Location</th>
                                       <th>Email Address</th>
                                       <th>Vehicle count</th>
                                       <th>Status Reason</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                              </table>
                              <table class="table table-bordered dataTable no-footer mobile-table" id="filter_partner_list_datatable" style="table-layout:auto; width: 100%;display:none;">
                                 <thead>
                                    <tr>
                                       <th style="width: 15px !important;">#</th>
                                       <th>Partner Id</th>
                                       <th>Name</th>
                                       <th>Mobile Number</th>
                                       <th>Location</th>
                                       <th>Email Address</th>
                                       <th>Vehicle count</th>
                                       <th>Status Reason</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                              </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end container -->
</div>
<!-- end wrapper -->
@include('admin_dashboard.footer')
@endsection
@section('script')

<script>
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

@endsection