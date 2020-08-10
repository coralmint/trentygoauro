@extends('layouts.adminmaster')
@section('content')
<header id="topnav">
   @include('partner_dashboard.menu')
</header>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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
   }
   .tabs-left, .tabs-right {
   border-bottom: none;
   padding-top: 2px;
   height: 100%;
   width: 20%;
   position: fixed;
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
   .tabs-left>li>a {
   border-radius: 4px 0 0 4px;
   margin-right: 0;
   display: block;
   color: #EB6841;
   /* background-color: #13b0b8; */
   color: #23366e;
   border-radius: 27px;
   border: 1px solid #13b0b8;
   margin-bottom: 5%;
   }
   .nav>li>a:focus, .nav>li>a:hover {
   text-decoration: none;
   background-color: #13b0b8;
   padding: 7px 50px !important;
   vertical-align: super !important;
   color: #fff;
   }
   .nav>li>a {
   padding: 7px 50px !important;
   -webkit-box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
   -moz-box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
   box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
   }
   .tabs-left>li.active>a, .tabs-left>li.active>a:hover, .tabs-left>li.active>a:focus{
   background-color: #13b0b8;
   color: #fff;
   border-radius: 27px;
   }
   .iconfa {
   font-size: 17px;
   margin-right: 10px;
   }
   .col-md-2.viewpoint{
   padding:50px 0px;
   }
   .profilepic {
   width: 80%;
   }
   .col-md-9.prove{
   padding:0px 10px 0px 5%;
   }
   ul#myTab {
   margin-top: 25px;
   position: fixed;
   }
   .mshadowna{-webkit-box-shadow: 0px 0px 10px -2px rgba(168,159,168,0.56);
   -moz-box-shadow: 0px 0px 10px -2px rgba(168,159,168,0.56);
   box-shadow: 0px 0px 10px -2px rgba(168,159,168,0.56);
   padding:10px 30px;
   margin-top:25px;
   background-color:#fff;
   }
   nav{
   width: 100%;
   position: fixed;
   top: 69px;
   left: 0;
   z-index: 99;
   background-color: #fff;
   }
   .nav-pills .nav-link {
   border-radius: 30px;
   text-align: center;
   margin-bottom: 25px;
   /*border: 1px solid #12b3b6;*/
   color: #21366b;
   font-size:12px;
   }
   .nav-pills .nav-link.active {
   background-color: #12b3b6;
   }
   i.fa.fa-upload {
   color: #000;
   font-size: 20px;
   }
   i.fa.fa-download {
   color: green;
   font-size: 20px;
   }
   @media (max-width: 770px) {  
   ul#myTab {
   margin-top: 70px;
   position: inherit;
   }
</style>
<div class="wrapper">
   <div class="container-fluid">
      <nav>
         <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">My profile</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">My Rental</a>
            <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">My Payment</a>
            <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">My Account</a>
         </div>
      </nav>
   </div>
   <div class="tab-content py-3 px-3 px-sm-0 " id="nav-tabContent">
      <div class="tab-pane fade show active " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-3 mb-3">
                  <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-user iconfa" aria-hidden="true"></i>Personal Details</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-file-text iconfa" aria-hidden="true"></i>Document Details</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-car iconfa" aria-hidden="true"></i>Vehicle list</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-ticket iconfa" aria-hidden="true"></i>Upcoming Reservation</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#addon" role="tab" aria-controls="addon" aria-selected="false"><i class="fa fa-history iconfa" aria-hidden="true"></i>Trip History (to do)</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#vechileview" role="tab" aria-controls="vechileview" aria-selected="false"> <i class="fa fa-list iconfa" aria-hidden="true"></i>Invoice List   (to do)</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="message_update" data-toggle="tab" href="#message" role="tab" aria-controls="vechileview" aria-selected="false"> <i class="fa fa-envelope iconfa" aria-hidden="true"></i>Messages   @if($unread_msg_count != '0') <span class="read_unread_msgs" style="color:red;">( {{ $unread_msg_count }} )</span> @else @endif</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="vechileview" aria-selected="false">  <i class="fa fa-cog iconfa" aria-hidden="true"></i>Settings</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="vechileview" aria-selected="false"> <i class="fa fa-comments-o iconfa" aria-hidden="true"></i>Comments (to do)</a>
                     </li>
                  </ul>
               </div>
               <!-- /.col-md-4 -->
               <div class="col-md-9 mshadowna">
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="col-md-12 vimkim">
                           <h4 class="customdet">Personal Details</h4>
                        </div>
                        <div class="form-row">
                           <div class="col-md-3">
                              <div class="profilepic"></div>
                              <div class="old_profilepic">
                                 <?php
                                    $uploaded_pro_pic = DB::table('document_details')
                                                        ->where('partner_id',$profile_info[0]->partner_id)
                                                        ->where('file_for','profile_image')->get();
                                    ?>
                                 @if( count($uploaded_pro_pic) != 0 )
                                 <img src="{{ $uploaded_pro_pic[0]->file_url }}" class="addnewsava" >
                                 <a onclick="delete_document_detail({{$uploaded_pro_pic[0]->document_details_id}}, '{{$uploaded_pro_pic[0]->file_path}}{{$uploaded_pro_pic[0]->file_orginal_name}}' );"><span style="color:red; cursor: pointer;"> X </span></a>
                                 @else
                                 <img src="{{ asset('/theme_files/images/tropical-blue.png') }}" class="addnew" >
                                 @endif
                              </div>
                              <div id="fileuploader1">Upload</div>
                           </div>
                           <div class="col-md-9 prove">
                              <div class="form-row">
                                 <div class="form-group col-md-6">
                                    <label>Trenty.go ID</label>
                                    <input data-parsley-type="number" type="text" disabled class="form-control tribut" value="{{ $profile_info[0]->unique_partner_id }}" maxlength="10" required placeholder="Name" id="update_name" />             
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $profile_info[0]->partner_name }}" maxlength="20" required placeholder="Email" id="partner_name" />             
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label>Company Name</label>
                                    <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $profile_info[0]->partner_company_name }}" maxlength="30" required placeholder="Company Name" id="partner_company_name" />             
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $profile_info[0]->partner_email }}" maxlength="30" required placeholder="Email Address" id="partner_email" />
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label>Mobile Number</label>
                                    <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $profile_info[0]->partner_phone }}" maxlength="15" required placeholder="Mobile Number" id="partner_phone" />
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label>Door No</label>
                                    <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $profile_info[0]->partner_door_no }}" maxlength="8" required placeholder="Door number" id="partner_door_no" />             
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label>Area/City</label>
                                    <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $profile_info[0]->partner_area }}" maxlength="20" required placeholder="Area/City" id="partner_area" />
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label>Street</label>
                                    <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $profile_info[0]->partner_street }}" maxlength="20" required placeholder="State" id="partner_street" />             
                                 </div>
                                 <div class="form-group col-md-6"> 
                                    <label>Postal Code</label>
                                    <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $profile_info[0]->partner_postalcode }}" maxlength="20" required placeholder="Postal code" id="partner_postal_code" />             
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label>Vehicle Count</label>
                                    <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $profile_info[0]->partner_vehicles_no }}" maxlength="5" required placeholder="Vehicle Count" id="partner_vehicle_count" /> 
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label>About your company</label>
                                    <textarea  class="form-control tribut" required placeholder="Few lines about your company which appears in website" id="partner_company_desc" >{{ $profile_info[0]->company_description }}</textarea>
                                 </div>
                                 <div class="form-group">
                                    <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                    <input type="hidden" value="{{ $partner_id }}" id="partner_id">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" id="update_personal_profile">Update</button>
                                    <button type="button" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="col-md-12 vimkim">
                           <h4 class="customdet">Document Details</h4>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label>Personal Id proof</label>
                              <div id="upload_personal_id_proof">Upload</div>
                           </div>
                           <div class="form-group col-md-6">
                              <?php
                                 $uploaded_doc_info = DB::table('document_details')
                                             ->where('partner_id',$profile_info[0]->partner_id)
                                             ->where('file_detail','Personal Document')
                                            //  ->orderBy('file_detail','Personal Document', 'DESC')
                                            //  ->take(4)
                                             ->get();
                                 ?>
                              @if( count($uploaded_doc_info) != '' )
                              <div class="form-group col-md-12">
                                 <label>Download Personal Id proof</label>
                                 @foreach($uploaded_doc_info as $udi)
                                 <li>
                                    <a href="{{$udi->file_url}}">{{ $udi->file_orginal_name }}</a>
                                    &nbsp;&nbsp;&nbsp; <a onclick="delete_document_detail({{$udi->document_details_id}}, '{{$udi->file_path}}{{$udi->file_orginal_name}}' );"><i class="fa fa-trash" style="color:red; cursor: pointer;"></i></a>
                                 </li>
                                 @endforeach
                                 <div class="download_personal_doc"></div>
                              </div>
                              @else
                              @endif
                           </div>
                           <div class="form-group col-md-4"></div>
                           <div class="form-group col-md-4">
                              <center>
                                 <input type="button" class="btn btn-primary" id="upload_personal_submit" value="Start Upload">
                              </center>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label>Agreement Document</label>
                              <div id="upload_agreement_document">Upload</div>
                           </div>
                           <div class="form-group col-md-6">
                              <?php
                                 $uploaded_doc_info = DB::table('document_details')
                                             ->where('partner_id',$profile_info[0]->partner_id)
                                             ->where('file_for','Agreement Document')
                                             ->get();
                                 ?>
                              @if( count($uploaded_doc_info) != '' )
                              <div class="form-group col-md-12">
                                 <label>Download Agreement Document</label>
                                 @foreach($uploaded_doc_info as $udi)
                                 <li>
                                    <a href="{{$udi->file_url}}">{{ $udi->file_orginal_name }}</a>
                                    &nbsp;&nbsp;&nbsp; <a onclick="delete_document_detail({{$udi->document_details_id}}, '{{$udi->file_path}}{{$udi->file_orginal_name}}' );"><i class="fa fa-trash" style="color:red; cursor: pointer;"></i></a>
                                 </li>
                                 @endforeach
                                 <div class="download_agreement"></div>
                              </div>
                              @else
                              @endif
                           </div>
                           <div class="form-group col-md-6">
                              <label>CABIS Document</label>
                              <div id="upload_cabis_document">Upload</div>
                           </div>
                           <div class="form-group col-md-6">
                              <?php
                                 $uploaded_doc_info = DB::table('document_details')
                                             ->where('partner_id',$profile_info[0]->partner_id)
                                             ->where('file_for','CABIS Document')
                                             ->get();
                                 ?>
                              @if( count($uploaded_doc_info) != '' )
                              <div class="form-group col-md-12">
                                 <label>Download CABIS Document</label>
                                 @foreach($uploaded_doc_info as $udi)
                                 <li>
                                    <a href="{{$udi->file_url}}">{{ $udi->file_orginal_name }}</a>
                                    &nbsp;&nbsp;&nbsp; <a onclick="delete_document_detail({{$udi->document_details_id}}, '{{$udi->file_path}}{{$udi->file_orginal_name}}' );"><i class="fa fa-trash" style="color:red; cursor: pointer;"></i></a>
                                 </li>
                                 @endforeach
                                 <div class="download_cabis"></div>
                              </div>
                              @else
                              @endif
                           </div>
                           <div class="form-group col-md-6">
                              <label>Tax Document</label>
                              <div id="upload_tax_document">Upload</div>
                           </div>
                           <div class="form-group col-md-6">
                              <?php
                                 $uploaded_doc_info = DB::table('document_details')
                                             ->where('partner_id',$profile_info[0]->partner_id)
                                             ->where('file_for','Tax Document')
                                             ->get();
                                 ?>
                              @if( count($uploaded_doc_info) != '' )
                              <div class="form-group col-md-12">
                                 <label>Download Tax Document</label>
                                 @foreach($uploaded_doc_info as $udi)
                                 <li>
                                    <a href="{{$udi->file_url}}">{{ $udi->file_orginal_name }}</a>
                                    &nbsp;&nbsp;&nbsp; <a onclick="delete_document_detail({{$udi->document_details_id}}, '{{$udi->file_path}}{{$udi->file_orginal_name}}' );"><i class="fa fa-trash" style="color:red; cursor: pointer;"></i></a>
                                 </li>
                                 @endforeach
                                 <div class="download_tax"></div>
                              </div>
                              @else
                              @endif
                           </div>
                           <div class="form-group col-md-6">
                              <label>Company Insurance Document</label>
                              <div id="upload_comp_ins_document">Upload</div>
                           </div>
                           <div class="form-group col-md-6">
                              <?php
                                 $uploaded_doc_info = DB::table('document_details')
                                             ->where('partner_id',$profile_info[0]->partner_id)
                                             ->where('file_for','Comapny Insurance Document')
                                             ->get();
                                 ?>
                              @if( count($uploaded_doc_info) != '' )
                              <div class="form-group col-md-12">
                                 <label>Company Insurance Document</label>
                                 @foreach($uploaded_doc_info as $udi)
                                 <li>
                                    <a href="{{$udi->file_url}}">{{ $udi->file_orginal_name }}</a>
                                    &nbsp;&nbsp;&nbsp; <a onclick="delete_document_detail({{$udi->document_details_id}}, '{{$udi->file_path}}{{$udi->file_orginal_name}}' );"><i class="fa fa-trash" style="color:red; cursor: pointer;"></i></a>
                                 </li>
                                 @endforeach
                                 <div class="download_insurance"></div>
                              </div>
                              @else
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="col-md-12 vimkim">
                           <h4 class="customdet">Vehicle list</h4>
                        </div>
                        <div class="targetdiv slide-in " id="mySidenav2" class="sidenav" style="display:none;">
                           <div class="card-body">
                              <form>
                                 <div class="form-row toglediv">
                                    <div class="form-group col-md-4">
                                       <label>Vehicle Brand</label>
                                       <select class="form-control" id="vehicle_brand">
                                          <option hidden >Select Brand</option>
                                          @foreach($vehicle_brand_list as $vb)
                                          <option value="{{ $vb->master_data_id }}">{{ ucfirst($vb->master_value) }}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                       <label>vehicle Model name</label>
                                       <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vehicle Model name" id="vehicle_model" />
                                    </div>
                                    <div class="form-group col-md-4">
                                       <label>Vehicle Registration Number</label>
                                       <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vehicle Number" id="vehicle_number" />
                                    </div>
                                    <div class="form-row formtab">
                                       <div class="form-group">
                                          <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                          <button type="button" class="btn btn-primary waves-effect waves-light" id="add_bacic_info_submit">Save</button>
                                          <button type="button" onclick="close_slide();" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12 ">
                              <div class="col-md-12" style=" padding: 2% 0px 5%;margin-top: -5%;">
                                 <a class="btn btn-primary waves-effect waves-light" id="add_new_vehicle_id" style="float: right;margin-bottom: 15px;"> Add New </a>
                              </div>
                              @if(count($vehicle_details) =='')
                              <center>
                                 <h2> No Vehicle list found </h2>
                                 <br>
                                 <h4>Admin uploading your Vehicle list details...</h4>
                              </center>
                              @else
                              @foreach($vehicle_details as $key=>$vehide)
                              <div class="form-row yoto">
                                 <?php
                                    $uploaded_doc_info = DB::table('document_details')
                                                        ->where('vehicle_id',$vehide->vehicle_id)
                                                        ->where('file_for','image_document')
                                                        ->select('file_url')->get();
                                    ?>
                                 <div class="col-md-3 imgview">
                                    @if( count($uploaded_doc_info) != 0 )
                                    <img src="{{ $uploaded_doc_info[0]->file_url }}" class="addnewsava" >
                                    @else
                                    <img src="{{ asset('/theme_files/images/Savaari-Etios-Cab.jpg') }}" class="addnewsava" >
                                    @endif
                                 </div>
                                 <!--<img src="{{ asset('/theme_files/images/Savaari-Etios-Cab.jpg') }}" class="addnewsava" >-->
                                 <!--<div class="col-md-3 imgview">-->
                                 <!--<img src="{{ asset('/theme_files/images/Savaari-Etios-Cab.jpg') }}" class="addnewsava" >-->
                                 <!--</div>-->
                                 <div class="col-md-4 toeff">
                                    <h4 class="totyo">{{ $vehide->master_value }}/{{ $vehide->vehicle_id }}</h4>
                                    <div class="form-row">
                                       <div class="flex-column-two">
                                          <div class="flex-column">
                                             <div class="column">
                                                <div id="ember2058" class="ember-view">
                                                   <div class="exampleModel confBelowAttr">
                                                      <div class="attributes-summary">
                                                         <span class="attribute passengers-attr ">
                                                            <i class="fa fa-user pasen"></i>
                                                            <!---->                <span class="alt drst ">{{ $vehide->vehicle_seat_type }}&nbsp;</span>
                                                         </span>
                                                         <!---->
                                                         <span class="attribute door-attr ">
                                                         <i class="fa fa-hand-o-right pasen" aria-hidden="true"></i>
                                                         <span class="drst alt ">doors&nbsp;</span>
                                                         <span aria-hidden="true drst">4</span>
                                                         </span>
                                                         <!---->
                                                         <!---->
                                                         <div aria-hidden="true" class="mileage drst">
                                                            <i class="fa fa-tachometer pasen" aria-hidden="true"></i>
                                                            Unlimited mileage
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <!---->                
                                             </div>
                                             <div class="column confidence-container">
                                                <div id="ember2074" class="confidence-message-perks confMsgBelowAttr ember-view">
                                                   <div class="top-messages confidenceMsgInFlex">
                                                      <span class="free-cancellation-messaging drst">
                                                         <i class="fa fa-times pasen" aria-hidden="true"></i><!---->Free Cancellation
                                                      </span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-3 carmain">
                                    <div class="car-itin-rhs col-xs-4">
                                       <div class="car-itin__per-day"><span class="car-itin__price" title=""><span></span><span>₹4,010</span></span><span class="car-itin__per">/day</span></div>
                                       <div class="car-itin-total"><span>₹12,045.83</span><span> total</span></div>
                                    </div>
                                 </div>
                                 <div class="col-md-2 viewpoint">
                                    <a href="edit_vehicle/{{ Crypt::encryptString($vehide->vehicle_id) }}" class="button-default">View</a>
                                    <!--{{$vehide->vehicle_id}}-->
                                 </div>
                              </div>
                              @endforeach
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="addon" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="col-md-12 vimkim">
                           <h4 class="customdet">Upcoming Reservation</h4>
                        </div>
                        <div class="row">
                           <div class="col-md-12 ">
                              <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                 <div class="tab-pane  show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <form id="color_datatable">
                                       <table class="table table-bordered dataTable no-footer mobile-table" id="partner_list_datatable" style="table-layout:fixed; width: 100%;">
                                          <thead>
                                             <tr>
                                                <!--<th>No</th>-->
                                                <th>Month</th>
                                                <th>Date</th>
                                                <th>Reservation status</th>
                                                <th>Vehicle ID</th>
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
                     <div class="tab-pane fade" id="vechileview" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="col-md-12 vimkim">
                           <h4 class="customdet">Trip History</h4>
                        </div>
                        <div class="row">
                           <div class="col-md-12 ">
                              <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                 <div class="tab-pane  show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <form id="color_datatable">
                                       <table class="table table-bordered dataTable no-footer mobile-table" id="partner_list_datatable" style="table-layout:fixed; width: 100%;">
                                          <thead>
                                             <tr>
                                                <!--<th>No</th>-->
                                                <th>S No</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Vehicle ID</th>
                                                <th>Pick Up</th>
                                                <th>Drop</th>
                                                <th>Status</th>
                                                <th>Invoice</th>
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
                     <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row">
                           <div class="col-md-12 ">
                              <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                 <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                      <div class="col-md-12 vimkim">
                                         <h4 class="customdet">Upcoming Reservation List</h4>
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
                                               <input type="text" class="form-control" id="reservation_id" placeholder="Reservation Id" onfocus="this.placeholder = ''" required autofocus >
                                               <label for="Reservation Id">Reservation Id</label>
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
                                         <div class="form-group col-md-1">
                                            <div class="form-group has-float-label">
                                               <button type="button" class="btn btn-info waves-effect waves-light btn-sm"  id="filter_clear"><i class="mdi mdi-reload"></i></button>
                                            </div>
                                         </div>
                                         <div class="form-group col-md-1">
                                           <div class="form-row formtab">
                                                 <div class="form-group">
                                                    <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" onClick="filter_submit(1);" id="filter_submit11">Search</button>
                                                 </div>
                                              </div>
                                         </div>
                                      </div>
                                   </div>
                                 <div class="tab-pane  show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                     <!--{{ $get_all_reservation }}-->
                                    <form id="">
                                       <table class="table table-bordered dataTable no-footer mobile-table" id="upcoming_reservation_list_datatable" style="table-layout:fixed; width: 100%;">
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
                     <div class="tab-pane fade" id="message" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="col-md-12 vimkim">
                           <h4 class="customdet">Messages</h4>
                        </div>
                        <input type="hidden" value="{{ $unread_msg_count }}" id="hidden_unread_msg_count" />
                        <div class="messaging">
                           <div class="inbox_msg">
                              <div class="mesgs">
                                 <div class="msg_history">
                                    <span class="read_unread_msgs">
                                       @foreach($read_messages as $msg)
                                       @if($msg->admin_id == '0')
                                       <div class="incoming_msg">
                                          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                          <div class="received_msg">
                                             <div class="received_withd_msg">
                                                <p>{{ $msg->comment }}</p>
                                                <?php
                                                   $date = strtotime($msg->comment_date);
                                                   $dd = date('H:i:A',$date);
                                                   $dd1 = date('M d',$date);
                                                   ?>
                                                <span class="time_date"> {{ $dd }}      |      {{ $dd1 }}</span>
                                             </div>
                                          </div>
                                       </div>
                                       @else
                                       <div class="outgoing_msg">
                                          <div class="sent_msg">
                                             <p>{{ $msg->comment }}</p>
                                             <?php
                                                $date = strtotime($msg->comment_date);
                                                $dd = date('H:i:s',$date);
                                                $dd1 = date('M d',$date);
                                                ?>
                                             <span class="time_date"> {{ $dd }}       |       {{ $dd1 }}</span> 
                                          </div>
                                       </div>
                                       @endif
                                       @endforeach
                                       <span style="color:#25356d;">
                                          <center><b>----------<span style="color:red">({{ $unread_msg_count }})</span>New Messages----------</b></center>
                                       </span>
                                       @foreach($unread_messages as $msg)
                                       @if($msg->admin_id == '0')
                                       <div class="incoming_msg">
                                          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                          <div class="received_msg">
                                             <div class="received_withd_msg">
                                                <p>{{ $msg->comment }}</p>
                                                <?php
                                                   $date = strtotime($msg->comment_date);
                                                   $dd = date('H:i:A',$date);
                                                   $dd1 = date('M d',$date);
                                                   ?>
                                                <span class="time_date"> {{ $dd }}      |      {{ $dd1 }}</span>
                                             </div>
                                          </div>
                                       </div>
                                       @else
                                       <div class="outgoing_msg">
                                          <div class="sent_msg">
                                             <p>{{ $msg->comment }}</p>
                                             <?php
                                                $date = strtotime($msg->comment_date);
                                                $dd = date('H:i:s',$date);
                                                $dd1 = date('M d',$date);
                                                ?>
                                             <span class="time_date"> {{ $dd }}       |       {{ $dd1 }}</span> 
                                          </div>
                                       </div>
                                       @endif
                                       @endforeach
                                    </span>
                                    <span class="all_messages" style="display:none;">
                                       @foreach($all_messages as $msg)
                                       @if($msg->admin_id == '0')
                                       <div class="incoming_msg">
                                          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                          <div class="received_msg">
                                             <div class="received_withd_msg">
                                                <p>{{ $msg->comment }}</p>
                                                <?php
                                                   $date = strtotime($msg->comment_date);
                                                   $dd = date('H:i:A',$date);
                                                   $dd1 = date('M d',$date);
                                                   ?>
                                                <span class="time_date"> {{ $dd }}      |      {{ $dd1 }}</span>
                                             </div>
                                          </div>
                                       </div>
                                       @else
                                       <div class="outgoing_msg">
                                          <div class="sent_msg">
                                             <p>{{ $msg->comment }}</p>
                                             <?php
                                                $date = strtotime($msg->comment_date);
                                                $dd = date('H:i:s',$date);
                                                $dd1 = date('M d',$date);
                                                ?>
                                             <span class="time_date"> {{ $dd }}       |       {{ $dd1 }}</span> 
                                          </div>
                                       </div>
                                       @endif
                                       @endforeach
                                    </span>
                                 </div>
                                 <div class="type_msg">
                                    <div class="input_msg_write">
                                       <input type="text" class="write_msg" id="msg" placeholder="Type a message" />
                                       <button class="msg_send_btn" type="button" id="send_msg"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="col-md-12 vimkim">
                           <h4 class="customdet">Settings</h4>
                        </div>
                        <div class="targetdiv slide-in " id="mySidenav21" class="sidenav" style="display:none;">
                           <div class="card-body">
                              <form>
                                 @if(count($resend_info) != '0')
                                 <div class="form-row toglediv">
                                    <div class="form-group col-md-12">
                                       <label>Reason for resend</label><br>
                                       <span>
                                       {{$resend_info[0]->reason}}
                                       </span>
                                    </div>
                                    <div class="form-row formtab">
                                       <div class="form-group">
                                          <button type="button" onclick="close_slide();" class="close_location_tab btn btn-default waves-effect waves-light" id="">Close</button>
                                       </div>
                                    </div>
                                 </div>
                                 @endif
                              </form>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-3">
                           </div>
                           @if($profile_info[0]->partner_auto_approve == "true")
                           <div class="form-group col-md-6">
                              <span class="pull-right" style="color: #26ff00d9;"><b>Auto approval enabled</b></span>
                              <select class="form-control" id="partner_status_option" onchange="update_partner_status();">
                              <option value="4" @if($profile_info[0]->status == '4') selected="selected" @else @endif>Publish</option>
                              <option value="5" @if($profile_info[0]->status == '5') selected="selected" @else @endif>Unpublish</option>
                              </select>
                           </div>
                           @else
                           <div class="form-group col-md-6">
                              <span class="pull-right" style="color: #ff0000d9;"><b>Auto Approve disabled</b></span>
                              @if($profile_info[0]->status == '2')
                              <lable> Admin approved your profile update and publish your profile </lable>
                              <select class="form-control" id="partner_status_option" onchange="update_partner_status();">
                                 <option value="2" selected="selected" hidden="hidden">Approved</option>
                                 <option value="3" >Send for publish</option>
                              </select>
                              @elseif($profile_info[0]->status == '3')
                              <lable> Send for publish your profile </lable>
                              <select class="form-control" id="partner_status_option" onchange="update_partner_status();">
                                 <option value="3" selected="selected" >Published</option>
                              </select>
                              @elseif($profile_info[0]->status == '4')
                              <lable> Admin published your profile your detail in live</lable>
                              <select class="form-control" id="partner_status_option" onchange="update_partner_status();">
                                 <option value="4" selected="selected" >Published</option>
                              </select>
                              @elseif($profile_info[0]->status == '5')
                              <lable> Admin unpublished your profile</lable>
                              <select class="form-control" id="partner_status_option" onchange="update_partner_status();">
                                 <option value="5" selected="selected" >Unpublished</option>
                              </select>
                              @elseif($profile_info[0]->status == '6')
                              <lable> Admin resend your profile <a id="view_resend_info" style="color:blue; cursor: pointer;">Click here</a> to view detail </lable>
                              <select class="form-control" id="partner_status_option" onchange="update_partner_status();">
                                 <option value="5" selected="selected" >Unpublished</option>
                              </select>
                              @else
                              <select class="form-control" id="partner_status_option" onchange="update_partner_status();">
                                 <option value="6" selected="selected" hidden=""> Inprogress </option>
                              </select>
                              @endif
                           </div>
                           @endif
                        </div>
                        <br><br>
                        <div class="form-row">
                           <div class="form-group col-md-4">
                              <label>Commision Percentage</label>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Commision Percentage" id="color_name" />             
                           </div>
                           <div class="form-group col-md-4">
                              <label>Extra Commision</label>
                              <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Extra Commision" id="color_code" />             
                           </div>
                           <div class="form-group">
                              <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                              <button type="button" class="btn btn-primary waves-effect waves-light" id="add_location_submit">Save</button>
                           </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12 vimkim">
                               <h4 class="customdet">Bank Details</h4>
                            </div>
                           <div class="form-group col-md-4">
                              <label>Account Name</label>
                              <input data-parsley-type="number" type="text" value="{{ $bank_details[0]->name_on_card }}" class="form-control tribut" maxlength="10" required placeholder="Account Name" id="name_on_card" />             
                           </div>
                           <div class="form-group col-md-4">
                              <label>Bank Name</label>
                              <input data-parsley-type="number" type="text" value="{{ $bank_details[0]->bank_name }}" class="form-control tribut" maxlength="10" required placeholder="Bank Name" id="bank_name" />             
                           </div>
                            <div class="form-group col-md-4">
                              <label>Account Number</label>
                              <input data-parsley-type="number" type="text" value="{{ $bank_details[0]->account_number }}" class="form-control tribut" maxlength="10" required placeholder="A/C no" id="account_number" />             
                           </div>
                            <div class="form-group col-md-4">
                              <label>IFSC Code</label>
                              <input data-parsley-type="number" type="text" value="{{ $bank_details[0]->ifsc_code }}" class="form-control tribut" maxlength="10" required placeholder="ifsc code" id="ifsc_code" />             
                           </div>
                           <div class="form-group">
                              <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                              <button type="button" class="btn btn-primary waves-effect waves-light" id="bank_details">Save</button>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="col-md-12 vimkim">
                           <h4 class="customdet">Comments</h4>
                        </div>
                        <span>hiii</span>
                     </div>
                  </div>
               </div>
               <!-- /.col-md-8 -->
            </div>
         </div>
      </div>
      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
         Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
      </div>
      <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
         Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
      </div>
   </div>
</div>
<!-- end wrapper -->
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
@section('script')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('theme_files/external_files/js/jquery-confirm.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="{{ asset('theme_files/plugins/timepicker/bootstrap-timepicker.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
{!! Html::script('public/assets/jquery_upload/jquery.uploadfile.min.js') !!}
<script>

    function update_partner_status(){
    var status = $('#partner_status_option').val();
    var tempcsrf = $('#csrf_token').val();
    var partner_id = $('#partner_id').val();
    if( status != "6"){
        $.confirm({
           title: 'Confirm!',
           content: 'Are you sure to Update partner status !!!',
           buttons: {
           confirm: function () {
             $.ajax({
               type: 'POST',
               url: '{{url('status_partner_details')}}',
               dataType: "json",
               data: {
                       status:status,
                       partner_id:partner_id,
                       _token:tempcsrf
                     },
               beforeSend: function () {
               },
               success: function (data) {
                 if(data == 'success')
                 {
                   location.reload();
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

   $('#view_resend_info').click(function(){
      $('.targetdiv').slideUp();
      $('.targetdiv').hide();
      $('#mySidenav21').slideToggle();
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
    url: '{{ url('delete_document') }}',
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
   
   function close_slide(){
      $('.targetdiv').hide(500);
   }
   $('#add_new_vehicle_id').click(function(){
      $('.targetdiv').slideUp();
      $('.targetdiv').hide();
      $('#mySidenav2').slideToggle();
   });
   
   $("#add_bacic_info_submit").click(function(){
          var vehicle_model = $("#vehicle_model").val();
          var vehicle_brand = $("#vehicle_brand").val();
          var vehicle_number = $("#vehicle_number").val();
          var tempcsrf = $('#csrf_token').val(); 
          var partner_id = $('#partner_id').val();
          if((vehicle_model =='')||(vehicle_brand =='')||(vehicle_number =='')){ 
              $.alert({
                  title: 'Alert!',
                  content: "Please fill all mandatory fields !!!",
              });
          }else{
              $.ajax({
            type: 'POST',
            url: '{{ url('insert_new_vehicle') }}',
            dataType: 'json',
            data: {
                  vehicle_model : vehicle_model,
                  vehicle_brand : vehicle_brand,
                  vehicle_number : vehicle_number,
                  partner_id:partner_id,
                  _token:tempcsrf
                },
                  beforeSend: function () {
                  },
                  success: function (data) {
                      if(data != ""){
                          window.location.href = "edit_vehicle/"+data;
                      }else{
                          $.alert({
                              title: 'Alert!',
                              content: "Détails du véhicule déjà ajoutés !!!",
                          });
                      }
                  }
                });
          }
     });
   
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
          showProgress: false,
         // sequential:true,
         // reset:true,
         // // maxFileSize:3000*1024,
          // autoSubmit:true,
         onSuccess: function (files, data, xhr) {
             // $('.profilepic').text(data);
           console.log(data);
           $(".profilepic").html("<img style='height: 250px;' src='upload/partner/<?php echo Session::get('user_id'); ?>/profile_images/"+data+"'/>");
           $(".ajax-file-upload-container").hide();
           $(".old_profilepic").hide();
           $.confirm({
                   title: 'Success',
                   content: 'Profile image Uploaded successfully',
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
         $("#extrabutton").click(function(){
         extraObj.startUpload();
         });
     });
     
         $(document).ready(function(){
     var tempcsrf = $('#csrf_token').val();
     var pro_id = $('#pro_id').val();
     var partner_id = $('#partner_id').val();
     var extraObj = $("#upload_personal_id_proof").uploadFile({
       url: '{{ url('upload_partner_personal_document') }}',
       fileName:"myfile",
       id: "test",
       formData: {
           partner_id: partner_id,
           action: 'upload_partner_personal_document',
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
         var html = "<div class='row'><div class='col-md-12'><div class='form-group col-md-4'><b>File for : </b><input type='text' name='file_for' value='' id='file_for1' /></div>";
         html += "</div></div>";
         return html;
       },
       onSuccess: function (files, data, xhr) {
           $(".download_personal_doc").html("<li><a href='../"+data[0]+"' target='_blank'>"+data[1]+"</a><a onclick='delete_document_detail('"+data[2]+","+data[3]+"');'><i class='fa fa-trash' style='color:red; cursor: pointer;margin-left: 15px; display: none;'></i></a></li>");
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
       autoSubmit:false
     });
     $("#upload_personal_submit").click(function(){
       extraObj.startUpload();
     });
   });
   
   $(document).ready(function(){
      
   var tempcsrf = $('#csrf_token').val();
   var partner_id = $('#partner_id').val();
   //   alert(inserted_vehicle_id);
   var agree_doc = "Agreement Document";
   var cabis_doc = "CABIS Document";
   var tax_doc = "Tax Document";
   var comp_ins = "Comapny Insurance Document";
   
   var extraObj = $("#upload_agreement_document").uploadFile({
      dataType: 'json',
      url:"{{ url('upload_partner_document') }}",
      fileName:"myfile",
      formData: {
           partner_id: partner_id,
           agree_doc: agree_doc,
           action: 'upload_partner_document',
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
   
   var extraObj2 = $("#upload_cabis_document").uploadFile({
      dataType: 'json',
      url:"{{ url('upload_partner_document') }}",
      fileName:"myfile",
      formData: {
           partner_id: partner_id,
           cabis_doc: cabis_doc,
           action: 'upload_partner_document',
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
       $(".download_cabis").html("<li><a href='../"+data[0]+"' target='_blank'>"+data[1]+"</a><a onclick='delete_document_detail('"+data[2]+","+data[3]+"');'><i class='fa fa-trash' style='color:red; cursor: pointer;margin-left: 15px; display: none;'></i></a></li>");
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
   
   var extraObj3 = $("#upload_tax_document").uploadFile({
      dataType: 'json',
      url:"{{ url('upload_partner_document') }}",
      fileName:"myfile",
      formData: {
           partner_id: partner_id,
           tax_doc: tax_doc,
           action: 'upload_partner_document',
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
       $(".download_tax").html("<li><a href='../"+data[0]+"' target='_blank'>"+data[1]+"</a><a onclick='delete_document_detail('"+data[2]+","+data[3]+"');'><i class='fa fa-trash' style='color:red; cursor: pointer;margin-left: 15px; display: none;'></i></a></li>");
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
   
   var extraObj4 = $("#upload_comp_ins_document").uploadFile({
      dataType: 'json',
      url:"{{ url('upload_partner_document') }}",
      fileName:"myfile",
      formData: {
           partner_id: partner_id,
           comp_ins: comp_ins,
           action: 'upload_partner_document',
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
       $(".download_insurance").html("<li><a href='../"+data[0]+"' target='_blank'>"+data[1]+"</a><a onclick='delete_document_detail('"+data[2]+","+data[3]+"');'><i class='fa fa-trash' style='color:red; cursor: pointer;margin-left: 15px; display: none;'></i></a></li>");
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
   });
     
</script>
<script>
/*Reservation list start*/
    
    $("#filter_clear").click(function(){
    $('#upcoming_reservation_list_datatable').show();
    $('#filter_reservation_list_datatable').hide();
    $('#upcoming_reservation_list_datatable_wrapper').show();
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
    
    
    $(document).ready(function () {
       $(function() {
   	   var table =  $('#upcoming_reservation_list_datatable').DataTable({
               "pageLength":50,
               "processing":true,
               "serverSide": false,
   	        ajax: {
   	                url: '{{url('get_all_upcoming_reservation')}}',
   	                error: function (xhr, error, thrown) {
   	                alert(error);
   	              }  
   	            },
              "fnRowCallback" : function(nRow, aData, iDisplayIndex){
               $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            },  
   
   	        columns: [
   	            {data:'reservation_id', name: 'reservation_id'},
   	            {data:'reservation_id', name: 'reservation_id'},
   	            {data:'phone', name: 'phone'},
   	            {data:'first_name', name: 'name'},
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
        $('#upcoming_reservation_list_datatable_wrapper').hide();
        $('#filter_reservation_list_datatable_wrapper').show();
        var filter_from = arg;
        var multi_select = $("#multi_select").val();
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
        
        $('#upcoming_reservation_list_datatable').hide();
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
            		            status:multi_select,
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
    	                url: '{{url('filter_get_all_upcoming_reservation_lists')}}',
    	                error: function (xhr, error, thrown) {
    	                alert(thrown);      
    	              }
    	            },
                  "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                           $("td:first", nRow).html(iDisplayIndex +1);
                           return nRow;
                        }, 
    	        columns: [
       	            {data:'reservation_id', name: 'reservation_id'},
       	            {data:'reservation_id', name: 'reservation_id'},
       	            {data:'phone', name: 'phone'},
       	            {data:'first_name', name: 'name'},
       	            {data:'start_date', name: 'start_date'},
       	            {data:'return_date', name: 'return_date'},
       	            {data:'status', name: 'status'},
       	            {data:'action', name: 'action'},
        	        ]
    	    });
        });
    }
    
    $("#bank_details").click(function(){
          var name_on_card = $('#name_on_card').val();
          var bank_name = $('#bank_name').val();
          var account_number = $('#account_number').val();
          var ifsc_code = $('#ifsc_code').val();
          var partner_id = $('#partner_id').val();
          var tempcsrf = $('#csrf_token').val();
          if((name_on_card =='')||(bank_name =='')||(account_number =='')||(ifsc_code =='')){
              $.alert({
                  title: 'Alert!',
                  content: "Please fill all mandatory fields !!!",
              });
          }else{
              $.ajax({
            type: 'POST',
            url: '{{ url('update_bank_details') }}',
            dataType: 'json',
            data: {
                  name_on_card:name_on_card,
                  bank_name:bank_name,
                  account_number:account_number,
                  ifsc_code:ifsc_code,
                  partner_id:partner_id,
                _token:tempcsrf
                },
                  beforeSend: function () {
                  },
                  success: function (data) {
                      if(data == "success"){
                          $.confirm({
                              title: 'Success',
                              content: 'bank details updated successfully',
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
                              content: "bank details already exists !!!",
                          });
                      }
                  }
                });
          }
      });

</script>
@endsection