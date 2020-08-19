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
   .container-fluid {
   max-width: 100%;
   }
   .card-box{
   padding:20px;
   }
</style>
<div class="wrapper">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <div class="btn-group pull-left">
                  <h4 class="viewpro"> <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left" style="color: ##28a750; margin-right: 8px;"></i><span style="color: ##28a750; font-size: large; margin-right: 15px;">Back</span></a> Cancellation Details</h4>
               </div>
               <div class="btn-group pull-right">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                     <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                     <li class="breadcrumb-item active">Cancellation Details</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <div class="row" style="display: none;" id="add_new_master_value_tab">
         <div class="col-lg-12">
            <div class="card-box">
               <h4 class="page-title">Add Cancellation Details<span id="" style="cursor: pointer;" class="close_new_master_value_tab pull-right"><i class=" mdi mdi-close"></i></span></h4>
               <hr>
               <div class="form-row">
                   <div class="form-group col-md-4">
                     <label>Number Of Days</label><span style="color: red;">*</span>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="30" required placeh older="Value..." id="master_key" />             
                  </div>
                  <div class="form-group col-md-4">
                     <label>Select Option</label>
                     <select title="Select mode" placeholder="Select mode" class="form-control" id="master_charge">
                        <option hidden="" value="">Select Type</option>
                        <option value="%">%</option>
                        <option value="$">$</option>
                     </select>
                  </div>
                  <div class="form-group col-md-4">
                     <label>Charge Value</label><span style="color: red;">*</span>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="30" required placeh older="Value..." id="master_value" />             
                  </div>
               </div>
               <div class="form-group">
                  <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                  <button type="button" class="btn btn-primary waves-effect waves-light" id="add_cancel_date">Add</button>
                  <button type="button" class="close_new_master_value_tab btn btn-default waves-effect waves-light" id="cancel_color">Cancel</button>
               </div>
            </div>
         </div>
      </div>
      <div class="row" style="display: none;" id="edit_master_tab">
         <div class="col-lg-12">
            <div class="card-box">
               <h4 class="page-title">Edit Cancellation Details<span style="cursor: pointer;" class="close_edit_master_tab pull-right"><i class=" mdi mdi-close"></i></span></h4>
               <hr>
                  <div class="form-row">
                     <div class="form-group col-md-4">
                     <label>Number Of Days</label><span style="color: red;">*</span>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="30" required placeh older="Value..." id="edit_master_key" />             
                  </div>
                  <div class="form-group col-md-4">
                     <label>Select Option</label>
                     <select title="Select mode" placeholder="Select mode" class="form-control" id="edit_master_charge">
                        <option value="%" @if($cancel_details[0]->master_charge == '%') selected="selected" @else @endif >%</option>
                        <option value="$" @if($cancel_details[0]->master_charge == '$') selected="selected" @else @endif >$</option>
                     </select>
                  </div>
                  <div class="form-group col-md-4">
                     <label>Charge Value</label><span style="color: red;">*</span>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="30" required placeh older="Value..." id="edit_master_value" />             
                  </div>
                     <div class="form-group col-md-6" style="margin-top: 2.3%;">
                         <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                         <input type="hidden" id="master_data_id" value="">
                         <button type="button" class="btn btn-primary waves-effect waves-light" id="edit_cancel_value_submit">Update</button>
                         <button type="button" class="close_edit_master_tab btn btn-default waves-effect waves-light" id="cancel_color">Cancel</button>
                      </div>
                  </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="card-box">
               <!-- Tabs -->
               <div class="row">
                  <div class="col-md-12 "> 
                     <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane  show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                           <span id="add_master_value_button" class="pull-right btn btn-primary waves-effect waves-light">Add New</span>
                           <form id="color_datatable">
                              <table class="table table-bordered dataTable no-footer mobile-table" id="cancel_list_datatable" style="table-layout:auto; width: 100%;">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>
                                           <center>
                                           Master Key
                                           <center>
                                        </th>
                                        <th>
                                           <center>
                                           Master charge
                                           <center>
                                        </th>
                                       <th>
                                          <center>
                                          master value
                                          <center>
                                       </th>
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
   </div>
   <!-- end container -->
</div>
<!-- end wrapper -->
@include('admin_dashboard.footer')
@endsection
@section('script')
<script>
   $('#add_master_value_button').click(function(){
        $('#edit_master_tab').hide(500);
        $('#add_new_master_value_tab').toggle(500);
   });
   $('.close_new_master_value_tab').click(function(){
   	    $('#add_new_master_value_tab').toggle(500);
   });
   
   $('.close_edit_master_tab').click(function(){
   	    $('#edit_master_tab').toggle(500);
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
   /*add color start*/
       $(function() {
   	   var table =  $('#cancel_list_datatable').DataTable({
               "pageLength":10,
               "processing":true,
               "serverSide": true,
   	        ajax: {
   	                url: '{{url('get_all_cancel_data')}}',
   	                error: function (xhr, error, thrown) {
   	                alert(error);
   	              }
   	            },
   	        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
   	            $("td:first", nRow).html(iDisplayIndex +1);
                return nRow;  
   	        },
   	        columns: [                                               
   	           // {data:'master_table_id', name: 'master_table_id'},
   	            {data:'master_data_id', name: 'master_data_id'},
   	            {data:'master_key', name: 'master_key'},
   	            {data:'master_charge', name: 'master_charge'},
   	            {data:'master_value', name: 'master_value'},
   	            {data:'action', name: 'action'},
   	        ]
   	    });
   	    $('.tab_2').on('click', function () {
   	       table.ajax.reload();
   	    });
   	});
   
       
       $("#add_cancel_date").click(function(){
            var master_key = $('#master_key').val();
   		    var master_charge = $('#master_charge').val();
   		    var master_value = $('#master_value').val();
            var tempcsrf = $('#csrf_token').val();
            if((master_charge =='')||(master_key =='')||(master_value =='')){
               $.alert({
                   title: 'Alert!',
                   content: "Please fill all mandatory fields !!!",
               });
            }else{
               $.ajax({
             type: 'POST',
             url: '{{ url('add_cancel_details') }}',
             dataType: 'json',
             data: {
                 master_key:master_key,
                 master_charge:master_charge,
                 master_value:master_value,
                 _token:tempcsrf
                 },
                   beforeSend: function () {
                   },
                   success: function (data) {
                       if(data == "success"){
                           $.confirm({
                               title: 'Success',
                               content: 'cancellation added successfully',
                               autoClose: 'logoutUser|300',
                                buttons: {
                                logoutUser: {
                                    text: 'OK',
                                    action: function () {
                                    var table =  $('#cancel_list_datatable').DataTable();
             		                table.ajax.reload();
             		                $('#add_new_master_value_tab').hide();
             		                $('#master_key').val('');
                                    $('#value').val('');
                                 }
                                },
                             }
                           });
                       }else{
                           $.alert({
               		        title: 'Alert!',
               		        content: "master data already exists !!!",
               		    });
                       }
                     }
                 });
            }
       });
     
     
    
       function edit_master_tab(arg) {
	    var tempcsrf = $('#csrf_token').val();
	    var master_data_id = arg;
          $.ajax({
            type: 'POST',
            url: '{{url('get_master_list')}}',
            dataType: "json",
            data: {
                    master_data_id:master_data_id,
                    status:status,
                    _token:tempcsrf
                  },
            beforeSend: function () {
                $('#edit_master_tab').toggle(500);
            },
            success: function (data) {
                $('#add_new_master_value_tab').hide(500);
                $('#edit_master_tab').show(500);
                $('#edit_master_key').val(data[0].master_key);
                $('#edit_master_value').val(data[0].master_value);
                $('#edit_master_charge').val(data[0].edit_master_charge);
                $('#master_data_id').val(data[0].master_data_id);
                var table =  $('#cancel_list_datatable').DataTable();
             		table.ajax.reload();
            }
          });
	}
       
     	$("#edit_cancel_value_submit").click(function(){
	    var edit_master_key = $('#edit_master_key').val();
	    var edit_master_charge = $('#edit_master_charge').val();
	    var edit_master_value = $('#edit_master_value').val();
	    var master_data_id = $('#master_data_id').val();
        var tempcsrf = $('#csrf_token').val();
        $.ajax({
        type: 'POST',
        url: '{{url('edit_cancel_value_submit')}}',
        dataType: 'json',
        data: {
			edit_master_key:edit_master_key,
			edit_master_charge:edit_master_charge,
			edit_master_value:edit_master_value,
			master_data_id:master_data_id,
            _token:tempcsrf
            },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data == "success"){
                        $.confirm({
        		            title: 'Success',
        		            content: 'cancel Value Updated Successfully.',
        		            autoClose: 'logoutUser|300',
        		            buttons: {
        		                logoutUser: {
        		                text: 'OK',
        		                },
        		            }
        		        });
        		      //  $('#edit_master_key').val('');
     			        $('#edit_value').val('');
					    $('#edit_master_tab').hide(500);
        		        var table =  $('#cancel_list_datatable').DataTable();
                        table.ajax.reload();
                    }else{
                        $.confirm({
        		            title: 'Failed',
        		            content: 'Master Value Already Inserted.',
        		            autoClose: 'logoutUser|300',
        		            buttons: {
        		                logoutUser: {
        		                text: 'OK',
        		                },
        		            }
        		        });
                    }
		        }
        });
    });
    
    
   	   function un_delete_value_info(arg,arg2) {
   	    var tempcsrf = $('#csrf_token').val();
   	    var master_data_id = arg;
   	    var status = arg2;
   	    $.confirm({
   	        title: 'Confirm!',
   	        content: 'Are you sure to delete this value !!!',
   	        buttons: {
   	        confirm: function () {
   	          $.ajax({
   	            type: 'POST',
   	            url: '{{url('un_delete_value_list')}}',
   	            dataType: "json",
   	            data: {
   	                    master_data_id:master_data_id,
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
   	                var table =  $('#cancel_list_datatable').DataTable();
   	             		table.ajax.reload();
   	              }else{
                        $.confirm({
        		            title: 'Failed',
        		            content: 'you not able to delete this value.',
        		            autoClose: 'logoutUser|300',
        		            buttons: {
        		                logoutUser: {
        		                text: 'OK',
        		                },
        		            }
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
   /*end color*/
 
</script>
@endsection