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
   .ajax-file-upload-statusbar{
       width: 290px;
   }
</style>
<div class="wrapper">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <div class="btn-group pull-left">
                  <h4 class="viewpro"> <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left" style="color: ##28a750; margin-right: 8px;"></i><span style="color: ##28a750; font-size: large; margin-right: 15px;">Back</span></a> Option Images</h4>
               </div>
               <div class="btn-group pull-right">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                     <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                     <li class="breadcrumb-item active">Master Data</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <div class="row" style="display: none;" id="add_new_master_value_tab">
         <div class="col-lg-12">
            <div class="card-box">
               <h4 class="page-title">Add Master Data<span id="" style="cursor: pointer;" class="close_new_master_value_tab pull-right"><i class=" mdi mdi-close"></i></span></h4>
               <hr>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label>Select Option</label>
                     <select title="Select mode" placeholder="Select mode" class="form-control" id="master_key">
                        <option hidden="" value="">Select Type</option>
                        @foreach($master_list as $ml)
                        <option value=" {{ $ml->id }}" class="form-control">{{ ucfirst($ml->value) }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="hidden" id="master_img_id" />
                    <input type="hidden" id="master_img_url" />
                    <label>Images</label><span style="color: red;">*</span>
                    <div id="fileuploader1">Upload</div>             
                  </div>
               </div>
               <div class="form-group">
                  <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                  <button type="button" class="btn btn-primary waves-effect waves-light" id="add_master_data">Add</button>
                  <button type="button" class="close_new_master_value_tab btn btn-default waves-effect waves-light" id="cancel_color">Cancel</button>
               </div>
            </div>
         </div>
      </div>
      <div class="row" style="display: none;" id="edit_master_tab">
         <div class="col-lg-12">
            <div class="card-box">
               <h4 class="page-title">Edit Master Data<span style="cursor: pointer;" class="close_edit_master_tab pull-right"><i class=" mdi mdi-close"></i></span></h4>
               <hr>
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label>Value</label><span style="color: red;">*</span>
                        <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeh older="Value..." id="edit_value" />             
                     </div>
                     <div class="form-group col-md-6" style="margin-top: 2.3%;">
                         <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                         <input type="hidden" id="master_data_id" value="">
                         <button type="button" class="btn btn-primary waves-effect waves-light" id="edit_master_value_submit">Update</button>
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
                              <table class="table table-bordered dataTable no-footer mobile-table" id="master_image_list_datatable" style="table-layout:auto; width: 100%;">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <!--<th>Color Name</th>-->
                                       <th>
                                          <center>
                                          master value
                                          <center>
                                       </th>
                                       <th>Image</th>
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
    $(document).ready(function(){
       var tempcsrf = $('#csrf_token').val();
       var extraObj = $("#fileuploader1").uploadFile({
       url: '{{ url('upload_master_img') }}',
       fileName:"myfile",
       id: "test",
       formData: {
           action: 'upload_master_img',
             _token: tempcsrf
       },
       // showDelete: false,
       // showDone: false,
        multiple:false,
        dragDrop:false,
       // //maxFileCount:1,
       // showProgress: true,
       // sequential:true,
       // reset:true,
       // // maxFileSize:3000*1024,
    //   extraHTML:function()
    //   {
    //      var html = "<div class='row'><div class='form-group col-md-4'><b>Image Direction : </b><input type='text' name='direction' value='' id='direction' /></div>";
    //   //   html += "<div class='form-group col-md-4'><b>Category : </b><select name='category' id='categ'><option value='1'>Kitchen</option><option value='2'>Bedroom</option><option value='3'>Living Room</option><option value='4'>Showroom</option><option value='5'>Shop</option><option value='6'>Fitness</option><option value='7'>Hotel</option><option value='8'>Recreation</option></select></div>";
    //   //   html += "<div class='form-group col-md-4'><b>Image Type : </b><select name='img_type' id='img_type'><option value='1'>Completed</option><option value='2'>Proposal</option></select></div>";
    //      html += "</div>";
    //      return html;        
    //   },
            autoSubmit:true,
            onSuccess: function (files, data, xhr) {
                // $('.profilepic').text(data);
                console.log(data);
                $("#master_img_id").val(data[0]);
                $("#master_img_url").val(data[1]);
              },
               onError: function(files,status,errMsg,pd)
               {
               },
       });
    });


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
   	   var table =  $('#master_image_list_datatable').DataTable({
               "pageLength":10,
               "processing":true,
               "serverSide": true,
   	        ajax: {
   	                url: '{{url('get_all_master_image_data')}}',
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
   	            {data:'master_value', name: 'master_value'},
   	            {data:'master_url', name: 'master_url'},
   	            {data:'action', name: 'action'},
   	        ]
   	    });
   	    $('.tab_2').on('click', function () {
   	       table.ajax.reload();
   	    });
   	});
   
       
       $("#add_master_data").click(function(){
           var img_id = $("#master_img_id").val();
           var img_url = $("#master_img_url").val();
           var master_key = $('#master_key').val();
           var tempcsrf = $('#csrf_token').val();
           if((img_id =='')||(master_key =='')){
               $.alert({
   		        title: 'Alert!',
   		        content: "Please fill all mandatory fields !!!",
   		    });
           }else{
               $.ajax({
             type: 'POST',
             url: '{{ url('update_master_image_data') }}',
             dataType: 'json',
             data: {
                master_key:master_key,
   			    img_url:img_url,
   			    img_id:img_id,
                _token:tempcsrf
                },
                beforeSend: function () {
                },
                   success: function (data) {
                       if(data == "success"){
                           $.confirm({
                               title: 'Success',
                               content: 'master data added successfully',
                               autoClose: 'logoutUser|300',
                                buttons: {
                                logoutUser: {
                                    text: 'OK',
                                    action: function () {
                                    //  location.reload();
                                    var table =  $('#master_image_list_datatable').DataTable();
                                    $('#master_key').val('');
   	             		            table.ajax.reload();
   	             		            $(".ajax-file-upload-statusbar").hide();
   	             		            $("#add_new_master_value_tab").hide();
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
     
     
       $("#color_name").keyup(function() {
           var inpObj = document.getElementById("color_name");
           var regex = /^[A-Za-z ]+$/;
           if (regex.test(this.value) !== true)
           this.value = this.value.replace(/[^A-Za-z +-.,]+/, '');
           if (!inpObj.checkValidity()) {
           document.getElementById("demo").innerHTML = inpObj.validationMessage;
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
                $('#edit_value').val(data[0].master_value);
                $('#master_data_id').val(data[0].master_data_id);
                var table =  $('#master_image_list_datatable').DataTable();
             		table.ajax.reload();
            }
          });
	}
       
     	$("#edit_master_value_submit").click(function(){
        // var edit_master_key = $('#edit_master_key').val();
	    var edit_value = $('#edit_value').val();
	    var master_data_id = $('#master_data_id').val();
        var tempcsrf = $('#csrf_token').val();
        $.ajax({
        type: 'POST',
        url: '{{url('edit_master_details')}}',
        dataType: 'json',
        data: {
            // edit_master_key:edit_master_key,
			edit_value:edit_value,
			master_data_id:master_data_id,
            _token:tempcsrf
            },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data == "success"){
                        $.confirm({
        		            title: 'Success',
        		            content: 'Master Value Updated Successfully.',
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
        		        var table =  $('#master_image_list_datatable').DataTable();
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
    
    
   function delete_master_image(arg,arg2) {
   	    var tempcsrf = $('#csrf_token').val();
   	    var master_image_id = arg;
   	    var master_data_id = arg2;
   	    $.confirm({
   	        title: 'Confirm!',
   	        content: 'Are you sure to delete this image for master data !!!',
   	        buttons: {
   	        confirm: function () {
   	          $.ajax({
   	            type: 'POST',
   	            url: '{{url('delete_master_image')}}',
   	            dataType: "json",
   	            data: {
   	                    master_image_id:master_image_id,
   	                    master_data_id:master_data_id,
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
   	                var table =  $('#master_image_list_datatable').DataTable();
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