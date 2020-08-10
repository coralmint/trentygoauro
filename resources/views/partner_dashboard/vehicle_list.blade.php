@extends('layouts.adminmaster')
@section('content')
<header id="topnav">
   @include('partner_dashboard.menu')
</header>
<link href="{{ asset('theme_files/external_files/css/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css" />
{!! Html::style('public/assets/jquery_upload/uploadfile.css') !!}
<style>
   .nav-tabs{
   width:100%;
   }
   .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
   color: #22366b;
   font-weight: bold;
   background-color: transparent;
   font-size: 18px;
   border: navajowhite;
   border: none;
   border-bottom: 3px solid #12b3b7 !important;
   }
   .nav-fill .nav-item {
   color: #24366b;
   font-weight: 500;
   font-size: 15px !important;
   }
   .tabcontent{
   background-color:#fff;
   }
   .tabs-left, .tabs-right {
   border-bottom: none;
   padding-top: 2px;
   }
   .tabs-left {
   border-right: 1px solid #ddd;
   }
   .tabs-right {
   border-left: 1px solid #ddd;
   }
   .tabs-left>li, .tabs-right>li {
   float: none;
   margin-bottom: 2px;
   }
   .tabs-left>li {
   margin-right: -1px;
   }
   .tabs-right>li {
   margin-left: -1px;
   }
   .tabs-left>li.active>a,
   .tabs-left>li.active>a:hover,
   .tabs-left>li.active>a:focus {
   border-bottom-color: #ddd;
   border-right-color: transparent;
   color:#EB6841;
   cursor: pointer;
   }
   .nav-tabs>li{
   width:100%;
   }
   .tabs-right>li.active>a,
   .tabs-right>li.active>a:hover,
   .tabs-right>li.active>a:focus {
   border-bottom: 1px solid #ddd !important;
   border-left-color: transparent;
   }
   .tabs-left>li>a {
   border-radius: 4px 0 0 4px;
   margin-right: 0;
   display:block;
   color:#EB6841;
   }
   .tabs-right>li>a {
   border-radius: 0 4px 4px 0;
   margin-right: 0;
   }
   .sideways {
   margin-top:50px;
   border: none;
   position: relative;
   }
   .sideways>li {
   height: 20px;
   width: 120px;
   margin-bottom: 100px;
   }
   .sideways>li>a {
   border-bottom: 1px solid #ddd;
   border-right-color: transparent;
   text-align: center;
   border-radius: 4px 4px 0px 0px;
   }
   .sideways>li.active>a,
   .sideways>li.active>a:hover,
   .sideways>li.active>a:focus {
   border-bottom-color: transparent;
   border-right-color: #ddd;
   border-left-color: #ddd;
   }
   .sideways.tabs-left {
   left: -50px;
   }
   .sideways.tabs-right {
   right: -50px;
   }
   .sideways.tabs-right>li {
   -webkit-transform: rotate(90deg);
   -moz-transform: rotate(90deg);
   -ms-transform: rotate(90deg);
   -o-transform: rotate(90deg);
   transform: rotate(90deg);
   }
   .sideways.tabs-left>li {
   -webkit-transform: rotate(-90deg);
   -moz-transform: rotate(-90deg);
   -ms-transform: rotate(-90deg);
   -o-transform: rotate(-90deg);
   transform: rotate(-90deg);
   }
   button {
    display: block !important;
}
.btn-primary {
   
    margin-right: 15px;
    float: left;
}
   .accordion-panel {
   font-family: Helvetica, Arial, sans-serif;
   margin: 50px auto;
   background-color:#fff;
   padding:15px;
   }
   .accordion-panel .accordion {
   padding-top: 30px;
   }
   .accordion-panel .accordion dt {
   display: block;
   padding: 15px;
   background: #21366b;
   color: #fff;
   cursor: pointer;
   position: relative;
   user-select: none;
   }
   .accordion-panel .accordion dd {
   height: 0;
   overflow: hidden;
   transition: height .35s ease-out;
   margin-left: 0;
   margin-bottom: 20px;
   background: #F4F4F4;
   }
   .accordion-panel .accordion .content {
   padding: 25px;
   overflow: auto;
   }
   .col-md-10.prove {
   padding: 0px 5%;
   }
   .accordion-panel .plus-icon {
   display: inline-block;
   width: 15px;
   height: 15px;
   position: relative;
   transition: transform 0.35s ease-out;
   position: absolute;
   right: 35px;
   top: 50%;
   margin-top: -12px;
   }
   .accordion-panel .plus-icon:before,
   .accordion-panel .plus-icon:after {
   content: '';
   background: #fff;
   position: absolute;
   }
   .accordion-panel .plus-icon:before {
   width: 2px;
   height: 15px;
   margin-left: -0.5px;
   left: 50%;
   }
   .accordion-panel .plus-icon:after {
   width: 15px;
   height: 2px;
   margin-top: -0.5px;
   top: 50%;
   opacity: 1;
   transition: opacity 0.35s ease-out;
   }
   .accordion-panel .is-open .plus-icon {
   transform: rotate(90deg);
   }
   .accordion-panel .is-open .plus-icon:after {
   opacity: 0;
   }
   .accordion-panel .hidden {
   display: none;
   }
   .accordion-panel .open-btn,
   .accordion-panel .close-btn {
   cursor: pointer;
   position: absolute;
   right: 0;
   width: 90px;
   }
   .accordion-panel .buttons-wrapper {
   position: relative;
   }
   .accordion-panel .buttons-wrapper .plus-icon {
   position: absolute;
   right: 10px;
   top: 12px;
   }
   .page-title-box {
   padding: 0px 0 !important;
   margin-top: 0% !important;
   }
   img.addnew {
   width: 100%;
   border: 1px solid #24366a;
   padding: 15px;
   }
   button.close_location_tab.btn.btn-default.waves-effect.waves-light {
   border: 1px solid #24366b !important;
   color: #24366b !important;
   }
   i.fa.fa-upload {
   color: #000;
   font-size: 20px;
   }
   i.fa.fa-download {
   color: green;
   font-size: 20px;
   }
   img{ max-width:100%;}
   .inbox_people {
   background: #f8f8f8 none repeat scroll 0 0;
   float: left;
   overflow: hidden;
   width: 100%; 
   border-right:1px solid #c4c4c4;
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
   width: 100%;
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
   .content{
   background-color:#fff !important;
   }
   .checkbox {
   margin-left: 20px;
   }
   .checkbox label{
   font-size:15px;
   }
   .nav-tabs>li.active>a {
   border-bottom: none !important;
   }
   .wrapper {
   padding-top: 85px;
   }
   .bread{
   padding-top: 20px;
   padding-bottom: 20px;
   }
   .form-row.yoto {
   -webkit-box-shadow: 0px 0px 10px 0px rgba(20,177,184,0.58);
   -moz-box-shadow: 0px 0px 10px 0px rgba(20,177,184,0.58);
   box-shadow: 0px 0px 10px 0px rgba(20,177,184,0.58);
   margin :30px 10px;
   }
   .pasen {
   color: #1bb1ba;
   font-size: 18px;
   padding: 5px;
   }
   h4.totyo {
   color: #21366b;
   font-size: 20px;
   }
   .drst {
   font-size: 15px;
   }
   img.addnewsava {
   padding: 20px;
   }
   .car-itin__per-day {
   color: #eb6841;
   font-weight: 500;
   font-size: 16px;
   }
   .car-itin-total {
   color: #eb6841;
   font-weight: 500;
   font-size: 16px;
   }
   .car-itin-rhs.col-xs-4{
   padding:35px;
   }
   a.button-default {
   background-color: #3bbcc4;
   color: #fff !important;
   padding: 12px 40px;
   border-radius: 10px;
   }
   .col-md-2.viewpoint{
   padding:50px;
   }
</style>
<div class="wrapper">
   <div class="container-fluid tabcontent">
      <div class="row">
         <div class="col-sm-12">
            <div class="form-row bread">
               <div class="form-group col-md-6">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                     <!--<a href="{{ URL::previous() }}">-->
                     <!--    <i class="fa fa-arrow-left" style="color: #1bb1ba; margin-right: 8px;"></i>-->
                     <!--    <span style="color: #1bb1ba; font-size: large; margin-right: 15px;">Back</span>-->
                     <!--</a> -->
                     <!--<li class="breadcrumb-item"><a href="dashboard">Partner management</a></li>-->
                     <li class="breadcrumb-item active">My Vehicles</li>
                  </ol>
               </div>
               <div class="form-group col-md-6">
                    <a class="pull-right btn btn-primary waves-effect waves-light" href="{{ url('add_vehicle') }}">Add New Vehicle</a>
                  <!--<select class="form-control" id="sel1">-->
                  <!--   <option>Current Status</option>-->
                  <!--   <option>Publish</option>-->
                  <!--   <option>Unpublish</option>-->
                  <!--   <option>Approve</option>-->
                  <!--   <option>Reject</option>-->
                  <!--   <option>resend</option>-->
                  <!--</select>-->
               </div>
            </div>
         </div>
      </div>
      <div class="row">
      </div>
   </div>
</div>
<!-- end wrapper -->
@include('partner_dashboard.footer')
@endsection

@section('script')

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('theme_files/external_files/js/jquery-confirm.min.js') }}"></script>
{!! Html::script('public/assets/jquery_upload/jquery.uploadfile.min.js') !!}
<script>
   $(document).ready(function(){
        $("a").click(function(){
            $("button").slideToggle();
        });
        var unread_msg_count = $("#hidden_unread_msg_count").val();
        if(unread_msg_count == "0"){
            $(".read_unread_msgs").hide();
            $(".all_messages").show();
        }
    });
    
   $("#message_update").click(function(){
        setTimeout(function () {
            var partner_id = $('#partner_id').val();
            var tempcsrf = $('#csrf_token').val();
            $.ajax({
              type: 'POST',
              url: '{{ url('update_message') }}',
              dataType: 'json',
              data: {
                    partner_id:partner_id,
                  _token:tempcsrf
                  },
                    beforeSend: function () {
                    },
                    success: function (data) {
                        if(data == "success"){
                            $(".read_unread_msgs").hide();
                            $(".all_messages").show();
                        }else{
                            $.alert({
                                title: 'Alert!',
                                content: "partner details already exists !!!",
                            });
                        }
                    }
                  });
        },5000);    
   });
   $("#send_msg").click(function(){
        var msg = $("#msg").val();
        var partner_id = $('#partner_id').val();
        var tempcsrf = $('#csrf_token').val();
        if(msg ==''){
            $.alert({
                title: 'Alert!',
                content: "Body of the message is empty !!!",
            });
        }else{
            $.ajax({
          type: 'POST',
          url: '{{ url('insert_message') }}',
          dataType: 'json',
          data: {
                msg:msg,
                partner_id:partner_id,
              _token:tempcsrf
              },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data == "success"){
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
   $("#update_personal_profile").click(function(){
        var partner_name = $('#partner_name').val();
        var partner_company_name = $('#partner_company_name').val();
        var partner_email = $('#partner_email').val();
        var partner_phone = $('#partner_phone').val();
        var partner_door_no = $('#partner_door_no').val();
        var partner_area = $('#partner_area').val();
        var partner_street = $('#partner_street').val();
        var partner_postal_code = $('#partner_postal_code').val();
        var partner_vehicle_count = $('#partner_vehicle_count').val();
        var partner_company_desc = $('#partner_company_desc').val();
        var partner_id = $('#partner_id').val();
        var tempcsrf = $('#csrf_token').val();
        if((partner_name =='')||(partner_company_name =='')||(partner_email =='')||(partner_phone =='')||(partner_company_desc =='')){
            $.alert({
                title: 'Alert!',
                content: "Please fill all mandatory fields !!!",
            });
        }else{
            $.ajax({
          type: 'POST',
          url: '{{ url('partner_update_personal_details') }}',
          dataType: 'json',
          data: {
                partner_name:partner_name,
                partner_company_name:partner_company_name,
                partner_email:partner_email,
                partner_phone:partner_phone,
                partner_door_no:partner_door_no,
                partner_area:partner_area,
                partner_street:partner_street,
                partner_postal_code:partner_postal_code,
                partner_vehicle_count:partner_vehicle_count,
                partner_company_desc:partner_company_desc,
                partner_id:partner_id,
              _token:tempcsrf
              },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data == "success"){
                        $.confirm({
                            title: 'Success',
                            content: 'partner details update successfully',
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
                            content: "partner details already exists !!!",
                        });
                    }
                }
              });
        }
    });
    $(document).ready(function(){
       var tempcsrf = $('#csrf_token').val();
       var partner_id = $('#partner_id').val();
       var extraObj = $("#fileuploader1").uploadFile({
           dataType: 'json',
           url:"{{ url('upload_partner_profile_pic') }}",
           fileName:"myfile",
           formData: {
               partner_id: partner_id,
               action: 'upload_partner_profile_pic',
                 _token: tempcsrf
           },
       // showDelete: false,
        // showDone: true,
        multiple:false,
        dragDrop:false,
       // //maxFileCount:1,
       // showProgress: true,
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
       },
       onError: function(files,status,errMsg,pd)
       {
       },
       });
       $("#extrabutton").click(function(){
       extraObj.startUpload();
       });
   });
</script>
@endsection