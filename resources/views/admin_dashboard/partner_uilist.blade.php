@extends('layouts.adminmaster')
@section('content')
<header id="topnav">
   @include('admin_dashboard.menu')
</header>
<link href="{{ asset('theme_files/external_files/css/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css" />
{!! Html::style('public/assets/jquery_upload/uploadfile.css') !!}
<style>
span.multiselect-native-select{position:relative}span.multiselect-native-select select{border:0!important;clip:rect(0 0 0 0)!important;height:1px!important;margin:-1px -1px -1px -3px!important;overflow:hidden!important;padding:0!important;position:absolute!important;width:1px!important;left:50%;top:30px}.multiselect-container{position:absolute;list-style-type:none;margin:0;padding:0}.multiselect-container .input-group{margin:5px}.multiselect-container>li{padding:0}.multiselect-container>li>a.multiselect-all label{font-weight:700}.multiselect-container>li.multiselect-group label{margin:0;padding:3px 20px 3px 10px;height:100%;font-weight:700}.multiselect-container>li.multiselect-group-clickable label{cursor:pointer}.multiselect-container>li>a{padding:0}.multiselect-container>li>a>label{margin:0;height:100%;cursor:pointer;font-weight:400;padding:3px 20px 3px 40px}.multiselect-container>li>a>label.radio,.multiselect-container>li>a>label.checkbox{margin:0}.multiselect-container>li>a>label>input[type=checkbox]{margin-bottom:5px}.btn-group>.btn-group:nth-child(2)>.multiselect.btn{border-top-left-radius:4px;border-bottom-left-radius:4px}.form-inline .multiselect-container label.checkbox,.form-inline .multiselect-container label.radio{padding:3px 20px 3px 40px}.form-inline .multiselect-container li a label.checkbox input[type=checkbox],.form-inline .multiselect-container li a label.radio input[type=radio]{margin-left:-20px;margin-right:0}

ul.multiselect-container.dropdown-menu.show {
    border: 1px solid #ddd !important;
    display: inline-block;
}
button.multiselect.dropdown-toggle.btn.btn-default1 {
    width: 100%;
}
    h4.patelkim {off
        font-size: 18px;
        color: #21366b;
        margin-bottom: 5px;
        margin-top: 0px;
       }
    .backmade
    {
    background-color: #fff;
       
        margin-bottom: 2%;
        border-radius: 6px;
        
       
    }
   .nav-tabs{
   width:100%;
   }
   .bread {
   padding-top: 20px;
   padding-bottom: 0px;
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
   position: fixed;
   }
   .mshadowna{-webkit-box-shadow: 0px 0px 10px -2px rgba(168,159,168,0.56);
   -moz-box-shadow: 0px 0px 10px -2px rgba(168,159,168,0.56);
   box-shadow: 0px 0px 10px -2px rgba(168,159,168,0.56);
   padding:10px 30px;
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
   }
   .tab-content.py-3.px-3.px-sm-0{
       padding:50px 0px 0px !important;
   }
   .col-md-12.examplo {
       border-radius: 10px;
    /* -webkit-box-shadow: 0px 3px 13px -5px rgba(18,179,182,1); */
    -moz-box-shadow: 0px 3px 13px -5px rgba(18,179,182,1);
    /* box-shadow: 0px 3px 13px -5px rgba(18,179,182,1); */
    -webkit-box-shadow: 0px 0px 14px -5px rgba(18,179,182,1);
    -moz-box-shadow: 0px 0px 14px -5px rgba(18,179,182,1);
    box-shadow: 0px 0px 14px -5px rgba(18,179,182,1);
    margin-top: 2%;
    padding: 10px;
}
</style>
<div class="wrapper">
<div class="container-fluid tabcontent">
   <!--<div class="row">-->
   <!--   <div class="col-sm-12">-->
   <!--      <div class="form-row bread">-->
   <!--         <div class="form-group col-md-6">-->
   <!--            <ol class="breadcrumb hide-phone p-0 m-0">-->
   <!--               <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left" style="color: #1bb1ba; margin-right: 8px;"></i><span style="color: #1bb1ba; font-size: large; margin-right: 15px;">Back</span></a> -->
   <!--               <li class="breadcrumb-item"><a href="dashboard">Partner management</a></li>-->
   <!--               <li class="breadcrumb-item active">Partner profile</li>-->
   <!--            </ol>-->
   <!--         </div>-->
   <!--         @if($partner_info[0]->partner_auto_approve == "true")-->
   <!--         <div class="form-group col-md-6">-->
   <!--            <span class="pull-right" style="color: #26ff00d9;"><b>Auto Approve enabled</b></span>-->
   <!--            <select class="form-control" id="partner_status_option" onchange="update_partner_status();">-->
   <!--               <option value="4" @if($partner_info[0]->status == '4') selected="selected" @else @endif>Publish</option>-->
   <!--               <option value="5" @if($partner_info[0]->status == '5') selected="selected" @else @endif>Unpublish</option>-->
   <!--               <option value="6">Resend</option>-->
   <!--               <option value="7">Reject</option>-->
   <!--            </select>-->
   <!--         </div>-->
   <!--         @else-->
   <!--         <div class="form-group col-md-6">-->
   <!--            <span class="pull-right" style="color: #ff0000d9;"><b>Auto Approve disabled</b></span>-->
   <!--            @if($partner_info[0]->status == '3')-->
   <!--            <select class="form-control" id="partner_status_option" onchange="update_partner_status();">-->
   <!--               <option value="3" selected="selected" >Waiting for publish</option>-->
   <!--               <option value="6" >Resend</option>-->
   <!--               <option value="7" >Reject</option>-->
   <!--            </select>-->
   <!--            @elseif($partner_info[0]->status == '4')-->
   <!--            <select class="form-control" id="partner_status_option" onchange="update_partner_status();">-->
   <!--               <option value="4" selected="selected" >Published</option>-->
   <!--               <option value="6" >Resend</option>-->
   <!--               <option value="7" >Reject</option>-->
   <!--            </select>-->
   <!--            @elseif($partner_info[0]->status == '5')-->
   <!--            <select class="form-control" id="partner_status_option" onchange="update_partner_status();">-->
   <!--               <option value="5" selected="selected" >Unpublished</option>-->
   <!--               <option value="4" >Publish</option>-->
   <!--               <option value="6" >Resend</option>-->
   <!--               <option value="7" >Reject</option>-->
   <!--            </select>-->
   <!--            @else-->
   <!--            <select class="form-control" id="partner_status_option" onchange="update_partner_status();">-->
   <!--               <option value="6" >Resend</option>-->
   <!--               <option value="7" >Reject</option>-->
   <!--            </select>-->
   <!--            @endif-->
   <!--         </div>-->
   <!--         @endif-->
   <!--      </div>-->
   <!--   </div>-->
   <!--</div>-->
  
   <div class="row">
      <div class="col-md-12 ">
         <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
               <!--<a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">My Cars</a>-->
               <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Request</a>
               <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">My Payment</a>
               <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">My Account</a>
            </div>
         </nav>
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
                              <a class="nav-link" id="doc_uploader_class" class="" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-file-text iconfa" aria-hidden="true"></i>Document Details</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-car iconfa" aria-hidden="true"></i>Vehicle list</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-ticket iconfa" aria-hidden="true"></i>Upcoming Reservation</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#addon" role="tab" aria-controls="addon" aria-selected="false"><i class="fa fa-history iconfa" aria-hidden="true"></i>Trip History(to do)</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#vechileview" role="tab" aria-controls="vechileview" aria-selected="false"> <i class="fa fa-list iconfa" aria-hidden="true"></i>Invoice List(to do)</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" id="message_update" data-toggle="tab" href="#message" role="tab" aria-controls="vechileview" aria-selected="false"> <i class="fa fa-envelope iconfa" aria-hidden="true"></i>Messages    @if($unread_msg_count != '0') <span class="read_unread_msgs" style="color:red;">( {{ $unread_msg_count }} )</span> @else @endif</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="vechileview" aria-selected="false">  <i class="fa fa-cog iconfa" aria-hidden="true"></i>Settings</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="vechileview" aria-selected="false"> <i class="fa fa-comments-o iconfa" aria-hidden="true"></i>Comments(to do)</a>
                           </li>
                        </ul>
                     </div>
                     <div class="col-md-9 mshadowna">
                          <div class="row backmade">
                               <div class="col-md-12" style="margin-top: 1%!important;">
               <div class="btn-group pull-right">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                     <li class="breadcrumb-item"><a href="dashboard">Partner management</a></li>
                     <li class="breadcrumb-item active">Partner profile</li>
                  </ol>&nbsp;&nbsp;
                
               </div>
                 <div class="pull-left">
                 <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left" style="color: #1bb1ba; margin-right: 8px;border: 2px solid;padding: 5px;border-radius: 17px;margin-top: 10%;"></i><span style="color: #1bb1ba; font-size: large; margin-right: 15px;font-weight: 700;">Back</span></a></div>
                 </div>
         <div class="col-sm-12">
           
               <div class="">
                   <div class="col-md-12 examplo" style="font-size:14px;">
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
                        <div class="row">
                            <div class="col-md-7">
                            <h4 class="patelkim">
                            <i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;&nbsp;{{ $partner_info[0]->unique_partner_id }}
                          </h4>
                            <p style="font-size:14px;">
                             <i class="fa fa-building-o" aria-hidden="true" style="font-weight: 600;"></i>&nbsp;&nbsp;{{ $partner_info[0]->partner_company_name }}<br>
                             <i class="fa fa-envelope-o" aria-hidden="true" style="font-weight: 600;"></i>&nbsp;&nbsp;{{ $partner_info[0]->partner_email }}<br>
                             <i class="fa fa-mobile" aria-hidden="true" style="font-weight: 600;"></i>&nbsp;&nbsp;{{ $partner_info[0]->partner_phone }}<br>
                          </p>
                            </div>
                            <div class="col-md-5">
                                @if($partner_info[0]->partner_auto_approve == "true")
                                <div class="form-group col-md-12" style="width: 320px;">
                                   <p class="pull-right" style="color: #26ff00d9;"><b>Auto Approve enabled</b></p>
                                   <select class="form-control" id="partner_status_option" onchange="update_partner_status();">
                                      <option value="4" @if($partner_info[0]->status == '4') selected="selected" @else @endif>Publish</option>
                                      <option value="5" @if($partner_info[0]->status == '5') selected="selected" @else @endif>Unpublish</option>
                                      <option value="6">Resend</option>
                                      <option value="7">Reject</option>
                                   </select>
                                </div>
                                @else
                                <center>
                                <div class="form-group col-md-12">
                                       <p class="pull-right" style="color: #ff0000d9;"><b>Auto Approve disabled</b></p><br>
                                       @if($partner_info[0]->status == '3')
                                       <lable> Partner updated the details waiting for publish </lable>
                                       <select class="form-control" id="partner_status_option" onchange="update_partner_status();">
                                          <option value="3" selected="selected" >Partner Inprogress</option>
                                          <option value="6" >Resend</option>
                                          <option value="7" >Reject</option> 
                                       </select>
                                       @elseif($partner_info[0]->status == '4')
                                       <lable> Partner data published site in live </lable>
                                       <select class="form-control" id="partner_status_option" onchange="update_partner_status();">
                                          <option value="4" selected="selected" >Published</option>
                                          <option value="5" >Unpublished</option>
                                          <option value="6" >Resend</option>
                                          <option value="7" >Reject</option>
                                       </select>
                                       @elseif($partner_info[0]->status == '5')
                                       <lable> Partner data unpublished </lable>
                                       <select class="form-control" id="partner_status_option" onchange="update_partner_status();">
                                          <option value="5" selected="selected" >Unpublished</option>
                                          <option value="4" >Publish</option>
                                          <option value="6" >Resend</option>
                                          <option value="7" >Reject</option>
                                       </select>
                                       @elseif($partner_info[0]->status == '7')
                                       <lable> Partner Rejected </lable>
                                       <select class="form-control" id="partner_status_option" onchange="update_partner_status();">
                                          <option value="5" selected="selected" >Rejected </option>
                                          <option value="2" >Approve</option>
                                          <option value="6" >Resend</option>
                                          <option value="7" >Reject</option>
                                       </select>
                                       @elseif($partner_info[0]->status == '6')
                                       <lable> Admin resend your profile <a id="view_resend_info" style="color:blue; cursor: pointer;">Click here</a> to view detail </lable>
                                       <select class="form-control" id="partner_status_option" onchange="update_partner_status();">
                                          <option value="6" selected="selected" >Partner Inprogress </option>
                                          <option value="6" >Resend</option>
                                          <option value="7" >Reject</option>
                                       </select>
                                       @else
                                       <select class="form-control" id="partner_status_option" onchange="update_partner_status();">
                                          <option value="6" >Resend</option>
                                          <option value="7" >Reject</option>
                                       </select>
                                       @endif
                                    </div>
                                </center>
                                @endif
                            </div>
                        </div>
                  </div>
               </div>
          
         </div>
      </div>
                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <div class="form-row">
                                 <div class="col-md-2">
                                    <div class="profilepic"></div>
                                    <div class="old_profilepic">
                                    <?php
                                        $uploaded_pro_pic = DB::table('document_details')
                                                            ->where('partner_id',$partner_info[0]->partner_id)
                                                            ->where('file_for','profile_image')->get();
                                    ?>
                                @if( count($uploaded_pro_pic) != 0 )
                                <label>
                                <img src="{{ $uploaded_pro_pic[0]->file_url }}" class="addnewsava" >
                                <a onclick="delete_document_detail({{$uploaded_pro_pic[0]->document_details_id}}, '{{$uploaded_pro_pic[0]->file_path}}{{$uploaded_pro_pic[0]->file_orginal_name}}' );"><span style="color:red; cursor: pointer;"> X </span></a>
                                </label>
                                @else
                                <img src="{{ asset('/theme_files/images/tropical-blue.png') }}" class="addnew" >
                                @endif
                                </div>
                                <div id="fileuploader1">Upload</div>
                                </div>
                                 <div class="col-md-10 prove">
                                    <div class="form-row">
                                       <div class="form-group col-md-6">
                                          <label>Trenty.go ID</label>
                                          <input data-parsley-type="number" type="text" disabled class="form-control tribut" value="{{ $partner_info[0]->unique_partner_id }}" maxlength="10" required placeholder="Name" id="" />             
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label>Name</label>
                                          <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $partner_info[0]->partner_name }}" maxlength="10" required placeholder="Name" id="update_name" />             
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label>Company Name</label>
                                          <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $partner_info[0]->partner_company_name }}" maxlength="30" required placeholder="Company Name" id="update_company_name" />             
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label>Email</label>
                                          <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $partner_info[0]->partner_email }}" maxlength="10" required placeholder="Email" id="update_email" />             
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label>Mobile Number</label>
                                          <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $partner_info[0]->partner_phone }}" maxlength="10" required placeholder="Mobile Number" id="update_phone" />             
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label>Door No</label>
                                          <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $partner_info[0]->partner_door_no }}" maxlength="10" required placeholder="Door number" id="update_door_no" />             
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label>Area/City</label>
                                          <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $partner_info[0]->partner_area }}" maxlength="10" required placeholder="Area/City" id="update_area" />             
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label>State</label>
                                          <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $partner_info[0]->partner_street }}" maxlength="10" required placeholder="State" id="update_country" />             
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label>Postal Code</label>
                                          <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $partner_info[0]->partner_postalcode }}" maxlength="10" required placeholder="Postal code" id="update_postal_code" />             
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label>Vehicle Count</label>
                                          <input data-parsley-type="number" type="text" class="form-control tribut" value="{{ $partner_info[0]->partner_vehicles_no }}" maxlength="10" required placeholder="Vechicle Count" id="update_vechicle_no" /> 
                                       </div>
                                       <div class="form-group col-md-12">
                                            <label>Offered locations</label>
                                            <select id="example-enableClickableOptGroups-init" multiple="multiple">
                                                @foreach($trentygo_locations as $tl)
                                                <option value="{{ $tl->location_master_id }}">{{ ucfirst($tl->location_name) }}</option>
                                                @endforeach
                                            </select>
                                       </div>
                                       <div class="form-group col-md-12">
                                          <label>About your company</label>
                                          <textarea  class="form-control tribut" placeholder="Few lines about your company which appears in website" id="update_company_desc" >{{ $partner_info[0]->company_description }}</textarea>
                                       </div>
                                       <div class="form-group">
                                          <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                          <input type="hidden" value="{{ $partner_id }}" id="partner_id">
                                          <button type="button" class="btn btn-primary waves-effect waves-light" id="update_partner">Save</button>
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
                                                    ->where('partner_id',$partner_info[0]->partner_id)
                                                    ->where('file_detail','Personal Document')
                                                    ->get();
                                    ?>
                                        @if( count($uploaded_doc_info) != '' )
                                          <div class="form-group col-md-12">
                                            <label>Download Personal Id proof</label>
                                            @foreach($uploaded_doc_info as $udi)
                                            <li>
                                                <a href="{{$udi->file_url}}" target="_blank">{{ $udi->file_orginal_name }}</a>
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
                                                        ->where('partner_id',$partner_info[0]->partner_id)
                                                        ->where('file_for','Agreement Document')
                                                        ->get();
                                        ?>
                                            @if( count($uploaded_doc_info) != '' )
                                              <div class="form-group col-md-12">
                                                <label>Download Agreement Document</label>
                                                @foreach($uploaded_doc_info as $udi)
                                                <li>
                                                    <a href="{{$udi->file_url}}" target="_blank">{{ $udi->file_orginal_name }}</a>
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
                                                        ->where('partner_id',$partner_info[0]->partner_id)
                                                        ->where('file_for','CABIS Document')
                                                        ->get();
                                        ?>
                                            @if( count($uploaded_doc_info) != '' )
                                              <div class="form-group col-md-12">
                                                <label>Download CABIS Document</label>
                                                @foreach($uploaded_doc_info as $udi)
                                                <li>
                                                    <a href="{{$udi->file_url}}" target="_blank">{{ $udi->file_orginal_name }}</a>
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
                                                        ->where('partner_id',$partner_info[0]->partner_id)
                                                        ->where('file_for','Tax Document')
                                                        ->get();
                                        ?>
                                            @if( count($uploaded_doc_info) != '' )
                                              <div class="form-group col-md-12">
                                                <label>Download Tax Document</label>
                                                @foreach($uploaded_doc_info as $udi)
                                                <li>
                                                    <a href="{{$udi->file_url}}" target="_blank">{{ $udi->file_orginal_name }}</a>
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
                                                        ->where('partner_id',$partner_info[0]->partner_id)
                                                        ->where('file_for','Comapny Insurance Document')
                                                        ->get();
                                        ?>
                                            @if( count($uploaded_doc_info) != '' )
                                              <div class="form-group col-md-12">
                                                <label>Company Insurance Document</label>
                                                @foreach($uploaded_doc_info as $udi)
                                                <li>
                                                    <a href="{{$udi->file_url}}" target="_blank">{{ $udi->file_orginal_name }}</a>
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
                                             <label>Vehicle Model Name</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vehicle Model Name" id="vehicle_model" />
                                          </div>
                                          <div class="form-group col-md-4">
                                             <label>Vehicle Registration Number</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vehicle Number" id="vehicle_number" />
                                          </div>
                                          <div class="form-row formtab">
                                             <div class="form-group">
                                                <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                                <input type="hidden" id="partner_id" value="{{ Session::get('user_id') }}">
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
                                    <div class="col-md-12" style=" padding: 2% 0px 5%;">
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
                                       <div class="col-md-4 toeff">
                                          <h4 class="totyo">{{ $vehide->master_value }}</h4>
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
                                          <a href="../edit_vehicle/{{ Crypt::encryptstring($vehide->vehicle_id) }}" class="button-default">View</a>
                                       </div>
                                    </div>
                                    @endforeach
                                    @endif
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="addon" role="tabpanel" aria-labelledby="contact-tab">
                              <div class="col-md-12 vimkim">
                                 <h4 class="customdet">Trip History</h4>
                              </div>
                              <div class="row">
                                 <div class="col-md-12 ">
                                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                       <div class="tab-pane  show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                          <form id="color_datatable">
                                             <table class="table table-bordered dataTable no-footer mobile-table" id="trip_list_datatable" style="table-layout:fixed; width: 100%;">
                                                <thead>
                                                   <tr>
                                                      <th style="width: 15px !important;">#</th>
                                                      <th>trip_id</th>
                                                      <th>reservation_id</th>
                                                      <th>pickup_datetime</th>
                                                      <th>status</th>
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
                                 <h4 class="customdet">Invoice List</h4>
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
                                                      <th>Trip Count</th>
                                                      <th>Between Duration</th>
                                                      <th>Pmt Method</th>
                                                      <th>Amount</th>
                                                      <th>Invoice Pdf</th>
                                                      <th>Total Amount</th>
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
                                             @if($msg->admin_id != '0')
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
                                             @if($msg->admin_id != '0')
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
                                             @if($msg->admin_id != '0')
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
                              <div class="form-row">
                                 <div class="form-group col-md-6">
                                    <label>Commision Percentage</label>
                                    <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Commision Percentage" id="color_name" />             
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label>Discount</label>
                                    <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Discount" id="color_code" />             
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label class="checkbox-inline">
                                    @if($partner_info[0]->partner_auto_approve == "true")
                                    <input type="checkbox" id="set_auto_approve" checked>Auto Approve </label>
                                    @else
                                    <input type="checkbox" id="set_auto_approve" >Auto Approve </label>
                                    @endif
                                 </div>
                                 <div class="form-group">
                                    <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" id="add_location_submit">Save</button>
                                    <button type="button" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
                                 </div>
                              </div>
                              <hr>
                              @if(count($bank_details) != 0)
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
                              @endif
                           </div>
                           <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="contact-tab">
                              <div class="col-md-12 vimkim">
                                 <h4 class="customdet">Comments</h4>
                              </div>
                              <div class="form-row">
                                 <div class="card">
                                    <div class="card-body">
                                       <div class="row">
                                          <div class="col-md-2">
                                             <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                                             <p class="text-secondary text-center">15 Minutes Ago</p>
                                          </div>
                                          <div class="col-md-10">
                                             <p>
                                                <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a>
                                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                             </p>
                                             <div class="clearfix"></div>
                                             <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                             <p>
                                                <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
                                                <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
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
{!! Html::script('public/assets/jquery_upload/jquery.uploadfile.min.js') !!}
<script>
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

    $(document).ready(function(){
     $("a").click(function(){
       $("button").slideToggle();
     });
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
   
    $("#message_update").click(function(){
           setTimeout(function () {
               var partner_id = $('#partner_id').val();
               var tempcsrf = $('#csrf_token').val();
               $.ajax({
                 type: 'POST',
                 url: '{{ url('admin_update_message') }}',
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
    $("#set_auto_approve").change(function(){
        var auto_approve_status = $(this).prop('checked');
        var partner_id = $('#partner_id').val();
        var tempcsrf = $('#csrf_token').val();
       $.confirm({
           title: 'Confirm!',
           content: 'Are you sure to enable auto approve !!!',
           buttons: {
           confirm: function () {
             $.ajax({
               type: 'POST',
               url: '{{url('update_auto_approve_status')}}',
               dataType: "json",
               data: {
                       auto_approve_status:auto_approve_status,
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
                   if(auto_approve_status == "true"){
                       $("#set_auto_approve").prop('checked', true);
                   }else{
                       $("#set_auto_approve").prop('checked', false);
                   }
             }
           }
         });
    });
    function close_slide(){
       $('.targetdiv').hide(500);
   }
    $('#add_new_vehicle_id').click(function(){
       $('.targetdiv').slideUp();
       $('.targetdiv').hide();
       $('#mySidenav2').slideToggle();
   });
   $('#view_resend_info').click(function(){
       $('.targetdiv').slideUp();
       $('.targetdiv').hide();
       $('#mySidenav21').slideToggle();
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
                           window.location.href = "../edit_vehicle/"+data;
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
    $(function() {
      var partner_id = $('#partner_id').val();   
      var tempcsrf = $('#csrf_token').val();
      var table =  $('#vehicle_list_datatable').DataTable({
           "pageLength":50,
           "processing":true,
           "serverSide": true,
        ajax: {
                type: 'POST',
            dataType: 'json',
               cache: false,
       		    data: {
       		            partner_id:partner_id,
       		            _token:tempcsrf
       		          },
                url: '{{url('get_all_vehicle_list')}}',
                error: function (xhr, error, thrown) {
                alert(error);
              }
            },
       "fnRowCallback" : function(nRow, aData, iDisplayIndex){
         $("td:first", nRow).html(iDisplayIndex +1);
         return nRow;
       },
        columns: [            
            {data:'vehicle_id', name:'vehicle_id'},
            {data:'vehicle_brand', name:'vehicle_brand'},
            {data:'vehicle_model', name:'vehicle_model'},
            {data:'vehicle_reg_no', name:'vehicle_reg_no'},
            {data:'available_status', name:'available_status'},
            {data:'status', name: 'status'},
            {data:'action', name: 'action'},
        ]
    });
    $('.tab_2').on('click', function () {
       table.ajax.reload();
    });
   });
    $("#update_partner").click(function(){
        var offered_location = $('#example-enableClickableOptGroups-init').val();
        var offered_location_str = String(offered_location);
        
        var update_name = $('#update_name').val();
        var update_company_name = $('#update_company_name').val();
        var update_email = $('#update_email').val();
        var update_phone = $('#update_phone').val();
        var update_door_no = $('#update_door_no').val();
        var update_area = $('#update_area').val();
        var update_country = $('#update_country').val();
        var update_postal_code = $('#update_postal_code').val();
        var update_vechicle_no = $('#update_vechicle_no').val();
        var update_company_desc = $('#update_company_desc').val();
        var partner_id = $("#partner_id").val();
        var tempcsrf = $('#csrf_token').val();
        if((update_email =='')||(offered_location =='')){
            $.alert({
          title: 'Alert!',
          content: "Please fill all mandatory fields !!!",
      });
        }else{
            $.ajax({
          type: 'POST',
          url: '{{ url('update_partner_personal_details') }}',
          dataType: 'json',
          data: {
              partner_name:update_name,
              partner_company_name:update_company_name,
              partner_email:update_email,
              partner_phone:update_phone,
              partner_door_no:update_door_no,
              partner_area:update_area,
              partner_street:update_country,
              partner_postal_code:update_postal_code,
              partner_vehicle_count:update_vechicle_no,
              partner_company_desc:update_company_desc,
              partner_id:partner_id,
              offered_location_str:offered_location_str,
              _token:tempcsrf
              },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data == "success"){
                        location.reload();
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
        showDelete: false,
        showDone: false,
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
        $(".profilepic").html("<img style='height: 250px;' src='../upload/partner/"+partner_id+"/profile_images/"+data+"'/>");
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
   
   /**
 * Bootstrap Multiselect (https://github.com/davidstutz/bootstrap-multiselect)
 *
 * Apache License, Version 2.0:
 * Copyright (c) 2012 - 2017 David Stutz
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a
 * copy of the License at http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 *
 * BSD 3-Clause License:
 * Copyright (c) 2012 - 2017 David Stutz
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *    - Redistributions of source code must retain the above copyright notice,
 *      this list of conditions and the following disclaimer.
 *    - Redistributions in binary form must reproduce the above copyright notice,
 *      this list of conditions and the following disclaimer in the documentation
 *      and/or other materials provided with the distribution.
 *    - Neither the name of David Stutz nor the names of its contributors may be
 *      used to endorse or promote products derived from this software without
 *      specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO,
 * THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 * EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS;
 * OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,
 * WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF
 * ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */
(function (root, factory) {
    // check to see if 'knockout' AMD module is specified if using requirejs
    if (typeof define === 'function' && define.amd &&
        typeof require === 'function' && typeof require.specified === 'function' && require.specified('knockout')) {

        // AMD. Register as an anonymous module.
        define(['jquery', 'knockout'], factory);
    } else {
        // Browser globals
        factory(root.jQuery, root.ko);
    }
})(this, function ($, ko) {
    "use strict";// jshint ;_;

    if (typeof ko !== 'undefined' && ko.bindingHandlers && !ko.bindingHandlers.multiselect) {
        ko.bindingHandlers.multiselect = {
            after: ['options', 'value', 'selectedOptions', 'enable', 'disable'],

            init: function(element, valueAccessor, allBindings, viewModel, bindingContext) {
                var $element = $(element);
                var config = ko.toJS(valueAccessor());

                $element.multiselect(config);

                if (allBindings.has('options')) {
                    var options = allBindings.get('options');
                    if (ko.isObservable(options)) {
                        ko.computed({
                            read: function() {
                                options();
                                setTimeout(function() {
                                    var ms = $element.data('multiselect');
                                    if (ms)
                                        ms.updateOriginalOptions();//Not sure how beneficial this is.
                                    $element.multiselect('rebuild');
                                }, 1);
                            },
                            disposeWhenNodeIsRemoved: element
                        });
                    }
                }

                //value and selectedOptions are two-way, so these will be triggered even by our own actions.
                //It needs some way to tell if they are triggered because of us or because of outside change.
                //It doesn't loop but it's a waste of processing.
                if (allBindings.has('value')) {
                    var value = allBindings.get('value');
                    if (ko.isObservable(value)) {
                        ko.computed({
                            read: function() {
                                value();
                                setTimeout(function() {
                                    $element.multiselect('refresh');
                                }, 1);
                            },
                            disposeWhenNodeIsRemoved: element
                        }).extend({ rateLimit: 100, notifyWhenChangesStop: true });
                    }
                }

                //Switched from arrayChange subscription to general subscription using 'refresh'.
                //Not sure performance is any better using 'select' and 'deselect'.
                if (allBindings.has('selectedOptions')) {
                    var selectedOptions = allBindings.get('selectedOptions');
                    if (ko.isObservable(selectedOptions)) {
                        ko.computed({
                            read: function() {
                                selectedOptions();
                                setTimeout(function() {
                                    $element.multiselect('refresh');
                                }, 1);
                            },
                            disposeWhenNodeIsRemoved: element
                        }).extend({ rateLimit: 100, notifyWhenChangesStop: true });
                    }
                }

                var setEnabled = function (enable) {
                    setTimeout(function () {
                        if (enable)
                            $element.multiselect('enable');
                        else
                            $element.multiselect('disable');
                    });
                };

                if (allBindings.has('enable')) {
                    var enable = allBindings.get('enable');
                    if (ko.isObservable(enable)) {
                        ko.computed({
                            read: function () {
                                setEnabled(enable());
                            },
                            disposeWhenNodeIsRemoved: element
                        }).extend({ rateLimit: 100, notifyWhenChangesStop: true });
                    } else {
                        setEnabled(enable);
                    }
                }

                if (allBindings.has('disable')) {
                    var disable = allBindings.get('disable');
                    if (ko.isObservable(disable)) {
                        ko.computed({
                            read: function () {
                                setEnabled(!disable());
                            },
                            disposeWhenNodeIsRemoved: element
                        }).extend({ rateLimit: 100, notifyWhenChangesStop: true });
                    } else {
                        setEnabled(!disable);
                    }
                }

                ko.utils.domNodeDisposal.addDisposeCallback(element, function() {
                    $element.multiselect('destroy');
                });
            },

            update: function(element, valueAccessor, allBindings, viewModel, bindingContext) {
                var $element = $(element);
                var config = ko.toJS(valueAccessor());

                $element.multiselect('setOptions', config);
                $element.multiselect('rebuild');
            }
        };
    }

    function forEach(array, callback) {
        for (var index = 0; index < array.length; ++index) {
            callback(array[index], index);
        }
    }

    /**
     * Constructor to create a new multiselect using the given select.
     *
     * @param {jQuery} select
     * @param {Object} options
     * @returns {Multiselect}
     */
    function Multiselect(select, options) {

        this.$select = $(select);
        this.options = this.mergeOptions($.extend({}, options, this.$select.data()));

        // Placeholder via data attributes
        if (this.$select.attr("data-placeholder")) {
            this.options.nonSelectedText = this.$select.data("placeholder");
        }

        // Initialization.
        // We have to clone to create a new reference.
        this.originalOptions = this.$select.clone()[0].options;
        this.query = '';
        this.searchTimeout = null;
        this.lastToggledInput = null;

        this.options.multiple = this.$select.attr('multiple') === "multiple";
        this.options.onChange = $.proxy(this.options.onChange, this);
        this.options.onSelectAll = $.proxy(this.options.onSelectAll, this);
        this.options.onDeselectAll = $.proxy(this.options.onDeselectAll, this);
        this.options.onDropdownShow = $.proxy(this.options.onDropdownShow, this);
        this.options.onDropdownHide = $.proxy(this.options.onDropdownHide, this);
        this.options.onDropdownShown = $.proxy(this.options.onDropdownShown, this);
        this.options.onDropdownHidden = $.proxy(this.options.onDropdownHidden, this);
        this.options.onInitialized = $.proxy(this.options.onInitialized, this);
        this.options.onFiltering = $.proxy(this.options.onFiltering, this);

        // Build select all if enabled.
        this.buildContainer();
        this.buildButton();
        this.buildDropdown();
        this.buildSelectAll();
        this.buildDropdownOptions();
        this.buildFilter();

        this.updateButtonText();
        this.updateSelectAll(true);

        if (this.options.enableClickableOptGroups && this.options.multiple) {
            this.updateOptGroups();
        }

        this.options.wasDisabled = this.$select.prop('disabled');
        if (this.options.disableIfEmpty && $('option', this.$select).length <= 0) {
            this.disable();
        }

        this.$select.wrap('<span class="multiselect-native-select" />').after(this.$container);
        this.options.onInitialized(this.$select, this.$container);
    }

    Multiselect.prototype = {

        defaults: {
            /**
             * Default text function will either print 'None selected' in case no
             * option is selected or a list of the selected options up to a length
             * of 3 selected options.
             *
             * @param {jQuery} options
             * @param {jQuery} select
             * @returns {String}
             */
            buttonText: function(options, select) {
                if (this.disabledText.length > 0
                        && (select.prop('disabled') || (options.length == 0 && this.disableIfEmpty)))  {

                    return this.disabledText;
                }
                else if (options.length === 0) {
                    return this.nonSelectedText;
                }
                else if (this.allSelectedText
                        && options.length === $('option', $(select)).length
                        && $('option', $(select)).length !== 1
                        && this.multiple) {

                    if (this.selectAllNumber) {
                        return this.allSelectedText + ' (' + options.length + ')';
                    }
                    else {
                        return this.allSelectedText;
                    }
                }
                else if (this.numberDisplayed != 0 && options.length > this.numberDisplayed) {
                    return options.length + ' ' + this.nSelectedText;
                }
                else {
                    var selected = '';
                    var delimiter = this.delimiterText;

                    options.each(function() {
                        var label = ($(this).attr('label') !== undefined) ? $(this).attr('label') : $(this).text();
                        selected += label + delimiter;
                    });

                    return selected.substr(0, selected.length - this.delimiterText.length);
                }
            },
            /**
             * Updates the title of the button similar to the buttonText function.
             *
             * @param {jQuery} options
             * @param {jQuery} select
             * @returns {@exp;selected@call;substr}
             */
            buttonTitle: function(options, select) {
                if (options.length === 0) {
                    return this.nonSelectedText;
                }
                else {
                    var selected = '';
                    var delimiter = this.delimiterText;

                    options.each(function () {
                        var label = ($(this).attr('label') !== undefined) ? $(this).attr('label') : $(this).text();
                        selected += label + delimiter;
                    });
                    return selected.substr(0, selected.length - this.delimiterText.length);
                }
            },
            checkboxName: function(option) {
                return false; // no checkbox name
            },
            /**
             * Create a label.
             *
             * @param {jQuery} element
             * @returns {String}
             */
            optionLabel: function(element){
                return $(element).attr('label') || $(element).text();
            },
            /**
             * Create a class.
             *
             * @param {jQuery} element
             * @returns {String}
             */
            optionClass: function(element) {
                return $(element).attr('class') || '';
            },
            /**
             * Triggered on change of the multiselect.
             *
             * Not triggered when selecting/deselecting options manually.
             *
             * @param {jQuery} option
             * @param {Boolean} checked
             */
            onChange : function(option, checked) {

            },
            /**
             * Triggered when the dropdown is shown.
             *
             * @param {jQuery} event
             */
            onDropdownShow: function(event) {

            },
            /**
             * Triggered when the dropdown is hidden.
             *
             * @param {jQuery} event
             */
            onDropdownHide: function(event) {

            },
            /**
             * Triggered after the dropdown is shown.
             *
             * @param {jQuery} event
             */
            onDropdownShown: function(event) {

            },
            /**
             * Triggered after the dropdown is hidden.
             *
             * @param {jQuery} event
             */
            onDropdownHidden: function(event) {

            },
            /**
             * Triggered on select all.
             */
            onSelectAll: function() {

            },
            /**
             * Triggered on deselect all.
             */
            onDeselectAll: function() {

            },
            /**
             * Triggered after initializing.
             *
             * @param {jQuery} $select
             * @param {jQuery} $container
             */
            onInitialized: function($select, $container) {

            },
            /**
             * Triggered on filtering.
             *
             * @param {jQuery} $filter
             */
            onFiltering: function($filter) {

            },
            enableHTML: false,
            buttonClass: 'btn btn-default1',
            inheritClass: false,
            buttonWidth: 'auto',
            buttonContainer: '<div class="btn-group1" />',
            dropRight: false,
            dropUp: false,
            selectedClass: 'active',
            // Maximum height of the dropdown menu.
            // If maximum height is exceeded a scrollbar will be displayed.
            maxHeight: false,
            includeSelectAllOption: false,
            includeSelectAllIfMoreThan: 0,
            selectAllText: ' Select all',
            selectAllValue: 'multiselect-all',
            selectAllName: false,
            selectAllNumber: true,
            selectAllJustVisible: true,
            enableFiltering: false,
            enableCaseInsensitiveFiltering: false,
            enableFullValueFiltering: false,
            enableClickableOptGroups: false,
            enableCollapsibleOptGroups: false,
            filterPlaceholder: 'Search',
            // possible options: 'text', 'value', 'both'
            filterBehavior: 'text',
            includeFilterClearBtn: true,
            preventInputChangeEvent: false,
            nonSelectedText: 'None selected',
            nSelectedText: 'selected',
            allSelectedText: 'All selected',
            numberDisplayed: 3,
            disableIfEmpty: false,
            disabledText: '',
            delimiterText: ', ',
            templates: {
                button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"><span class="multiselect-selected-text"></span> <b class="caret"></b></button>',
                ul: '<ul class="multiselect-container dropdown-menu"></ul>',
                filter: '<li class="multiselect-item multiselect-filter"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input class="form-control multiselect-search" type="text" /></div></li>',
                filterClearBtn: '',
                li: '<li><a tabindex="0"><label></label></a></li>',
                divider: '<li class="multiselect-item divider"></li>',
                liGroup: '<li class="multiselect-item multiselect-group"><label></label></li>'
            }
        },

        constructor: Multiselect,

        /**
         * Builds the container of the multiselect.
         */
        buildContainer: function() {
            this.$container = $(this.options.buttonContainer);
            this.$container.on('show.bs.dropdown', this.options.onDropdownShow);
            this.$container.on('hide.bs.dropdown', this.options.onDropdownHide);
            this.$container.on('shown.bs.dropdown', this.options.onDropdownShown);
            this.$container.on('hidden.bs.dropdown', this.options.onDropdownHidden);
        },

        /**
         * Builds the button of the multiselect.
         */
        buildButton: function() {
            this.$button = $(this.options.templates.button).addClass(this.options.buttonClass);
            if (this.$select.attr('class') && this.options.inheritClass) {
                this.$button.addClass(this.$select.attr('class'));
            }
            // Adopt active state.
            if (this.$select.prop('disabled')) {
                this.disable();
            }
            else {
                this.enable();
            }

            // Manually add button width if set.
            if (this.options.buttonWidth && this.options.buttonWidth !== 'auto') {
                this.$button.css({
                    'width' : '100%', //this.options.buttonWidth,
                    'overflow' : 'hidden',
                    'text-overflow' : 'ellipsis'
                });
                this.$container.css({
                    'width': this.options.buttonWidth
                });
            }

            // Keep the tab index from the select.
            var tabindex = this.$select.attr('tabindex');
            if (tabindex) {
                this.$button.attr('tabindex', tabindex);
            }

            this.$container.prepend(this.$button);
        },

        /**
         * Builds the ul representing the dropdown menu.
         */
        buildDropdown: function() {

            // Build ul.
            this.$ul = $(this.options.templates.ul);

            if (this.options.dropRight) {
                this.$ul.addClass('pull-right');
            }

            // Set max height of dropdown menu to activate auto scrollbar.
            if (this.options.maxHeight) {
                // TODO: Add a class for this option to move the css declarations.
                this.$ul.css({
                    'max-height': this.options.maxHeight + 'px',
                    'overflow-y': 'auto',
                    'overflow-x': 'hidden'
                });
            }

            if (this.options.dropUp) {

                var height = Math.min(this.options.maxHeight, $('option[data-role!="divider"]', this.$select).length*26 + $('option[data-role="divider"]', this.$select).length*19 + (this.options.includeSelectAllOption ? 26 : 0) + (this.options.enableFiltering || this.options.enableCaseInsensitiveFiltering ? 44 : 0));
                var moveCalc = height + 34;

                this.$ul.css({
                    'max-height': height + 'px',
                    'overflow-y': 'auto',
                    'overflow-x': 'hidden',
                    'margin-top': "-" + moveCalc + 'px'
                });
            }

            this.$container.append(this.$ul);
        },

        /**
         * Build the dropdown options and binds all necessary events.
         *
         * Uses createDivider and createOptionValue to create the necessary options.
         */
        buildDropdownOptions: function() {

            this.$select.children().each($.proxy(function(index, element) {

                var $element = $(element);
                // Support optgroups and options without a group simultaneously.
                var tag = $element.prop('tagName')
                    .toLowerCase();

                if ($element.prop('value') === this.options.selectAllValue) {
                    return;
                }

                if (tag === 'optgroup') {
                    this.createOptgroup(element);
                }
                else if (tag === 'option') {

                    if ($element.data('role') === 'divider') {
                        this.createDivider();
                    }
                    else {
                        this.createOptionValue(element);
                    }

                }

                // Other illegal tags will be ignored.
            }, this));

            // Bind the change event on the dropdown elements.
            $(this.$ul).off('change', 'li:not(.multiselect-group) input[type="checkbox"], li:not(.multiselect-group) input[type="radio"]');
            $(this.$ul).on('change', 'li:not(.multiselect-group) input[type="checkbox"], li:not(.multiselect-group) input[type="radio"]', $.proxy(function(event) {
                var $target = $(event.target);

                var checked = $target.prop('checked') || false;
                var isSelectAllOption = $target.val() === this.options.selectAllValue;

                // Apply or unapply the configured selected class.
                if (this.options.selectedClass) {
                    if (checked) {
                        $target.closest('li')
                            .addClass(this.options.selectedClass);
                    }
                    else {
                        $target.closest('li')
                            .removeClass(this.options.selectedClass);
                    }
                }

                // Get the corresponding option.
                var value = $target.val();
                var $option = this.getOptionByValue(value);

                var $optionsNotThis = $('option', this.$select).not($option);
                var $checkboxesNotThis = $('input', this.$container).not($target);

                if (isSelectAllOption) {

                    if (checked) {
                        this.selectAll(this.options.selectAllJustVisible, true);
                    }
                    else {
                        this.deselectAll(this.options.selectAllJustVisible, true);
                    }
                }
                else {
                    if (checked) {
                        $option.prop('selected', true);

                        if (this.options.multiple) {
                            // Simply select additional option.
                            $option.prop('selected', true);
                        }
                        else {
                            // Unselect all other options and corresponding checkboxes.
                            if (this.options.selectedClass) {
                                $($checkboxesNotThis).closest('li').removeClass(this.options.selectedClass);
                            }

                            $($checkboxesNotThis).prop('checked', false);
                            $optionsNotThis.prop('selected', false);

                            // It's a single selection, so close.
                            this.$button.click();
                        }

                        if (this.options.selectedClass === "active") {
                            $optionsNotThis.closest("a").css("outline", "");
                        }
                    }
                    else {
                        // Unselect option.
                        $option.prop('selected', false);
                    }

                    // To prevent select all from firing onChange: #575
                    this.options.onChange($option, checked);

                    // Do not update select all or optgroups on select all change!
                    this.updateSelectAll();

                    if (this.options.enableClickableOptGroups && this.options.multiple) {
                        this.updateOptGroups();
                    }
                }

                this.$select.change();
                this.updateButtonText();

                if(this.options.preventInputChangeEvent) {
                    return false;
                }
            }, this));

            $('li a', this.$ul).on('mousedown', function(e) {
                if (e.shiftKey) {
                    // Prevent selecting text by Shift+click
                    return false;
                }
            });

            $(this.$ul).on('touchstart click', 'li a', $.proxy(function(event) {
                event.stopPropagation();

                var $target = $(event.target);

                if (event.shiftKey && this.options.multiple) {
                    if($target.is("label")){ // Handles checkbox selection manually (see https://github.com/davidstutz/bootstrap-multiselect/issues/431)
                        event.preventDefault();
                        $target = $target.find("input");
                        $target.prop("checked", !$target.prop("checked"));
                    }
                    var checked = $target.prop('checked') || false;

                    if (this.lastToggledInput !== null && this.lastToggledInput !== $target) { // Make sure we actually have a range
                        var from = this.$ul.find("li:visible").index($target.parents("li"));
                        var to = this.$ul.find("li:visible").index(this.lastToggledInput.parents("li"));

                        if (from > to) { // Swap the indices
                            var tmp = to;
                            to = from;
                            from = tmp;
                        }

                        // Make sure we grab all elements since slice excludes the last index
                        ++to;

                        // Change the checkboxes and underlying options
                        var range = this.$ul.find("li").not(".multiselect-filter-hidden").slice(from, to).find("input");

                        range.prop('checked', checked);

                        if (this.options.selectedClass) {
                            range.closest('li')
                                .toggleClass(this.options.selectedClass, checked);
                        }

                        for (var i = 0, j = range.length; i < j; i++) {
                            var $checkbox = $(range[i]);

                            var $option = this.getOptionByValue($checkbox.val());

                            $option.prop('selected', checked);
                        }
                    }

                    // Trigger the select "change" event
                    $target.trigger("change");
                }

                // Remembers last clicked option
                if($target.is("input") && !$target.closest("li").is(".multiselect-item")){
                    this.lastToggledInput = $target;
                }

                $target.blur();
            }, this));

            // Keyboard support.
            this.$container.off('keydown.multiselect').on('keydown.multiselect', $.proxy(function(event) {
                if ($('input[type="text"]', this.$container).is(':focus')) {
                    return;
                }

                if (event.keyCode === 9 && this.$container.hasClass('open')) {
                    this.$button.click();
                }
                else {
                    var $items = $(this.$container).find("li:not(.divider):not(.disabled) a").filter(":visible");

                    if (!$items.length) {
                        return;
                    }

                    var index = $items.index($items.filter(':focus'));
                    
                    // Navigation up.
                    if (event.keyCode === 38 && index > 0) {
                        index--;
                    }
                    // Navigate down.
                    else if (event.keyCode === 40 && index < $items.length - 1) {
                        index++;
                    }
                    else if (!~index) {
                        index = 0;
                    }

                    var $current = $items.eq(index);
                    $current.focus();

                    if (event.keyCode === 32 || event.keyCode === 13) {
                        var $checkbox = $current.find('input');

                        $checkbox.prop("checked", !$checkbox.prop("checked"));
                        $checkbox.change();
                    }

                    event.stopPropagation();
                    event.preventDefault();
                }
            }, this));

            if (this.options.enableClickableOptGroups && this.options.multiple) {
                $("li.multiselect-group input", this.$ul).on("change", $.proxy(function(event) {
                    event.stopPropagation();

                    var $target = $(event.target);
                    var checked = $target.prop('checked') || false;

                    var $li = $(event.target).closest('li');
                    var $group = $li.nextUntil("li.multiselect-group")
                        .not('.multiselect-filter-hidden')
                        .not('.disabled');

                    var $inputs = $group.find("input");

                    var values = [];
                    var $options = [];

                    if (this.options.selectedClass) {
                        if (checked) {
                            $li.addClass(this.options.selectedClass);
                        }
                        else {
                            $li.removeClass(this.options.selectedClass);
                        }
                    }

                    $.each($inputs, $.proxy(function(index, input) {
                        var value = $(input).val();
                        var $option = this.getOptionByValue(value);

                        if (checked) {
                            $(input).prop('checked', true);
                            $(input).closest('li')
                                .addClass(this.options.selectedClass);

                            $option.prop('selected', true);
                        }
                        else {
                            $(input).prop('checked', false);
                            $(input).closest('li')
                                .removeClass(this.options.selectedClass);

                            $option.prop('selected', false);
                        }

                        $options.push(this.getOptionByValue(value));
                    }, this))

                    // Cannot use select or deselect here because it would call updateOptGroups again.

                    this.options.onChange($options, checked);

                    this.$select.change();
                    this.updateButtonText();
                    this.updateSelectAll();
                }, this));
            }

            if (this.options.enableCollapsibleOptGroups && this.options.multiple) {
                $("li.multiselect-group .caret-container", this.$ul).on("click", $.proxy(function(event) {
                    var $li = $(event.target).closest('li');
                    var $inputs = $li.nextUntil("li.multiselect-group")
                            .not('.multiselect-filter-hidden');

                    var visible = true;
                    $inputs.each(function() {
                        visible = visible && $(this).is(':visible');
                    });

                    if (visible) {
                        $inputs.hide()
                            .addClass('multiselect-collapsible-hidden');
                    }
                    else {
                        $inputs.show()
                            .removeClass('multiselect-collapsible-hidden');
                    }
                }, this));

                $("li.multiselect-all", this.$ul).css('background', '#f3f3f3').css('border-bottom', '1px solid #eaeaea');
                $("li.multiselect-all > a > label.checkbox", this.$ul).css('padding', '3px 20px 3px 35px');
                $("li.multiselect-group > a > input", this.$ul).css('margin', '4px 0px 5px -20px');
            }
        },

        /**
         * Create an option using the given select option.
         *
         * @param {jQuery} element
         */
        createOptionValue: function(element) {
            var $element = $(element);
            if ($element.is(':selected')) {
                $element.prop('selected', true);
            }

            // Support the label attribute on options.
            var label = this.options.optionLabel(element);
            var classes = this.options.optionClass(element);
            var value = $element.val();
            var inputType = this.options.multiple ? "checkbox" : "radio";

            var $li = $(this.options.templates.li);
            var $label = $('label', $li);
            $label.addClass(inputType);
            $li.addClass(classes);

            if (this.options.enableHTML) {
                $label.html(" " + label);
            }
            else {
                $label.text(" " + label);
            }

            var $checkbox = $('<input/>').attr('type', inputType);

            var name = this.options.checkboxName($element);
            if (name) {
                $checkbox.attr('name', name);
            }

            $label.prepend($checkbox);

            var selected = $element.prop('selected') || false;
            $checkbox.val(value);

            if (value === this.options.selectAllValue) {
                $li.addClass("multiselect-item multiselect-all");
                $checkbox.parent().parent()
                    .addClass('multiselect-all');
            }

            $label.attr('title', $element.attr('title'));

            this.$ul.append($li);

            if ($element.is(':disabled')) {
                $checkbox.attr('disabled', 'disabled')
                    .prop('disabled', true)
                    .closest('a')
                    .attr("tabindex", "-1")
                    .closest('li')
                    .addClass('disabled');
            }

            $checkbox.prop('checked', selected);

            if (selected && this.options.selectedClass) {
                $checkbox.closest('li')
                    .addClass(this.options.selectedClass);
            }
        },

        /**
         * Creates a divider using the given select option.
         *
         * @param {jQuery} element
         */
        createDivider: function(element) {
            var $divider = $(this.options.templates.divider);
            this.$ul.append($divider);
        },

        /**
         * Creates an optgroup.
         *
         * @param {jQuery} group
         */
        createOptgroup: function(group) {
            var label = $(group).attr("label");
            var value = $(group).attr("value");
            var $li = $('<li class="multiselect-item multiselect-group"><a href="javascript:void(0);"><label><b></b></label></a></li>');

            var classes = this.options.optionClass(group);
            $li.addClass(classes);

            if (this.options.enableHTML) {
                $('label b', $li).html(" " + label);
            }
            else {
                $('label b', $li).text(" " + label);
            }

            if (this.options.enableCollapsibleOptGroups && this.options.multiple) {
                $('a', $li).append('<span class="caret-container"><b class="caret"></b></span>');
            }

            if (this.options.enableClickableOptGroups && this.options.multiple) {
                $('a label', $li).prepend('<input type="checkbox" value="' + value + '"/>');
            }

            if ($(group).is(':disabled')) {
                $li.addClass('disabled');
            }

            this.$ul.append($li);

            $("option", group).each($.proxy(function($, group) {
                this.createOptionValue(group);
            }, this))
        },

        /**
         * Build the select all.
         *
         * Checks if a select all has already been created.
         */
        buildSelectAll: function() {
            if (typeof this.options.selectAllValue === 'number') {
                this.options.selectAllValue = this.options.selectAllValue.toString();
            }

            var alreadyHasSelectAll = this.hasSelectAll();

            if (!alreadyHasSelectAll && this.options.includeSelectAllOption && this.options.multiple
                    && $('option', this.$select).length > this.options.includeSelectAllIfMoreThan) {

                // Check whether to add a divider after the select all.
                if (this.options.includeSelectAllDivider) {
                    this.$ul.prepend($(this.options.templates.divider));
                }

                var $li = $(this.options.templates.li);
                $('label', $li).addClass("checkbox");

                if (this.options.enableHTML) {
                    $('label', $li).html(" " + this.options.selectAllText);
                }
                else {
                    $('label', $li).text(" " + this.options.selectAllText);
                }

                if (this.options.selectAllName) {
                    $('label', $li).prepend('<input type="checkbox" name="' + this.options.selectAllName + '" />');
                }
                else {
                    $('label', $li).prepend('<input type="checkbox" />');
                }

                var $checkbox = $('input', $li);
                $checkbox.val(this.options.selectAllValue);

                $li.addClass("multiselect-item multiselect-all");
                $checkbox.parent().parent()
                    .addClass('multiselect-all');

                this.$ul.prepend($li);

                $checkbox.prop('checked', false);
            }
        },

        /**
         * Builds the filter.
         */
        buildFilter: function() {

            // Build filter if filtering OR case insensitive filtering is enabled and the number of options exceeds (or equals) enableFilterLength.
            if (this.options.enableFiltering || this.options.enableCaseInsensitiveFiltering) {
                var enableFilterLength = Math.max(this.options.enableFiltering, this.options.enableCaseInsensitiveFiltering);

                if (this.$select.find('option').length >= enableFilterLength) {

                    this.$filter = $(this.options.templates.filter);
                    $('input', this.$filter).attr('placeholder', this.options.filterPlaceholder);

                    // Adds optional filter clear button
                    if(this.options.includeFilterClearBtn) {
                        var clearBtn = $(this.options.templates.filterClearBtn);
                        clearBtn.on('click', $.proxy(function(event){
                            clearTimeout(this.searchTimeout);

                            this.query = '';
                            this.$filter.find('.multiselect-search').val('');
                            $('li', this.$ul).show().removeClass('multiselect-filter-hidden');

                            this.updateSelectAll();

                            if (this.options.enableClickableOptGroups && this.options.multiple) {
                                this.updateOptGroups();
                            }

                        }, this));
                        this.$filter.find('.input-group').append(clearBtn);
                    }

                    this.$ul.prepend(this.$filter);

                    this.$filter.val(this.query).on('click', function(event) {
                        event.stopPropagation();
                    }).on('input keydown', $.proxy(function(event) {
                        // Cancel enter key default behaviour
                        if (event.which === 13) {
                          event.preventDefault();
                      }

                        // This is useful to catch "keydown" events after the browser has updated the control.
                        clearTimeout(this.searchTimeout);

                        this.searchTimeout = this.asyncFunction($.proxy(function() {

                            if (this.query !== event.target.value) {
                                this.query = event.target.value;

                                var currentGroup, currentGroupVisible;
                                $.each($('li', this.$ul), $.proxy(function(index, element) {
                                    var value = $('input', element).length > 0 ? $('input', element).val() : "";
                                    var text = $('label', element).text();

                                    var filterCandidate = '';
                                    if ((this.options.filterBehavior === 'text')) {
                                        filterCandidate = text;
                                    }
                                    else if ((this.options.filterBehavior === 'value')) {
                                        filterCandidate = value;
                                    }
                                    else if (this.options.filterBehavior === 'both') {
                                        filterCandidate = text + '\n' + value;
                                    }

                                    if (value !== this.options.selectAllValue && text) {

                                        // By default lets assume that element is not
                                        // interesting for this search.
                                        var showElement = false;

                                        if (this.options.enableCaseInsensitiveFiltering) {
                                            filterCandidate = filterCandidate.toLowerCase();
                                            this.query = this.query.toLowerCase();
                                        }

                                        if (this.options.enableFullValueFiltering && this.options.filterBehavior !== 'both') {
                                            var valueToMatch = filterCandidate.trim().substring(0, this.query.length);
                                            if (this.query.indexOf(valueToMatch) > -1) {
                                                showElement = true;
                                            }
                                        }
                                        else if (filterCandidate.indexOf(this.query) > -1) {
                                            showElement = true;
                                        }

                                        // Toggle current element (group or group item) according to showElement boolean.
                                        if(!showElement){
                                          $(element).css('display', 'none');
                                          $(element).addClass('multiselect-filter-hidden');
                                        }
                                        if(showElement){
                                          $(element).css('display', 'block');
                                          $(element).removeClass('multiselect-filter-hidden');
                                        }

                                        // Differentiate groups and group items.
                                        if ($(element).hasClass('multiselect-group')) {
                                            // Remember group status.
                                            currentGroup = element;
                                            currentGroupVisible = showElement;
                                        }
                                        else {
                                            // Show group name when at least one of its items is visible.
                                            if (showElement) {
                                                $(currentGroup).show()
                                                    .removeClass('multiselect-filter-hidden');
                                            }

                                            // Show all group items when group name satisfies filter.
                                            if (!showElement && currentGroupVisible) {
                                                $(element).show()
                                                    .removeClass('multiselect-filter-hidden');
                                            }
                                        }
                                    }
                                }, this));
                            }

                            this.updateSelectAll();

                            if (this.options.enableClickableOptGroups && this.options.multiple) {
                                this.updateOptGroups();
                            }

                            this.options.onFiltering(event.target);

                        }, this), 300, this);
                    }, this));
                }
            }
        },

        /**
         * Unbinds the whole plugin.
         */
        destroy: function() {
            this.$container.remove();
            this.$select.show();

            // reset original state
            this.$select.prop('disabled', this.options.wasDisabled);

            this.$select.data('multiselect', null);
        },

        /**
         * Refreshs the multiselect based on the selected options of the select.
         */
        refresh: function () {
            var inputs = {};
            $('li input', this.$ul).each(function() {
              inputs[$(this).val()] = $(this);
            });

            $('option', this.$select).each($.proxy(function (index, element) {
                var $elem = $(element);
                var $input = inputs[$(element).val()];

                if ($elem.is(':selected')) {
                    $input.prop('checked', true);

                    if (this.options.selectedClass) {
                        $input.closest('li')
                            .addClass(this.options.selectedClass);
                    }
                }
                else {
                    $input.prop('checked', false);

                    if (this.options.selectedClass) {
                        $input.closest('li')
                            .removeClass(this.options.selectedClass);
                    }
                }

                if ($elem.is(":disabled")) {
                    $input.attr('disabled', 'disabled')
                        .prop('disabled', true)
                        .closest('li')
                        .addClass('disabled');
                }
                else {
                    $input.prop('disabled', false)
                        .closest('li')
                        .removeClass('disabled');
                }
            }, this));

            this.updateButtonText();
            this.updateSelectAll();

            if (this.options.enableClickableOptGroups && this.options.multiple) {
                this.updateOptGroups();
            }
        },

        /**
         * Select all options of the given values.
         *
         * If triggerOnChange is set to true, the on change event is triggered if
         * and only if one value is passed.
         *
         * @param {Array} selectValues
         * @param {Boolean} triggerOnChange
         */
        select: function(selectValues, triggerOnChange) {
            if(!$.isArray(selectValues)) {
                selectValues = [selectValues];
            }

            for (var i = 0; i < selectValues.length; i++) {
                var value = selectValues[i];

                if (value === null || value === undefined) {
                    continue;
                }

                var $option = this.getOptionByValue(value);
                var $checkbox = this.getInputByValue(value);

                if($option === undefined || $checkbox === undefined) {
                    continue;
                }

                if (!this.options.multiple) {
                    this.deselectAll(false);
                }

                if (this.options.selectedClass) {
                    $checkbox.closest('li')
                        .addClass(this.options.selectedClass);
                }

                $checkbox.prop('checked', true);
                $option.prop('selected', true);

                if (triggerOnChange) {
                    this.options.onChange($option, true);
                }
            }

            this.updateButtonText();
            this.updateSelectAll();

            if (this.options.enableClickableOptGroups && this.options.multiple) {
                this.updateOptGroups();
            }
        },

        /**
         * Clears all selected items.
         */
        clearSelection: function () {
            this.deselectAll(false);
            this.updateButtonText();
            this.updateSelectAll();

            if (this.options.enableClickableOptGroups && this.options.multiple) {
                this.updateOptGroups();
            }
        },

        /**
         * Deselects all options of the given values.
         *
         * If triggerOnChange is set to true, the on change event is triggered, if
         * and only if one value is passed.
         *
         * @param {Array} deselectValues
         * @param {Boolean} triggerOnChange
         */
        deselect: function(deselectValues, triggerOnChange) {
            if(!$.isArray(deselectValues)) {
                deselectValues = [deselectValues];
            }

            for (var i = 0; i < deselectValues.length; i++) {
                var value = deselectValues[i];

                if (value === null || value === undefined) {
                    continue;
                }

                var $option = this.getOptionByValue(value);
                var $checkbox = this.getInputByValue(value);

                if($option === undefined || $checkbox === undefined) {
                    continue;
                }

                if (this.options.selectedClass) {
                    $checkbox.closest('li')
                        .removeClass(this.options.selectedClass);
                }

                $checkbox.prop('checked', false);
                $option.prop('selected', false);

                if (triggerOnChange) {
                    this.options.onChange($option, false);
                }
            }

            this.updateButtonText();
            this.updateSelectAll();

            if (this.options.enableClickableOptGroups && this.options.multiple) {
                this.updateOptGroups();
            }
        },

        /**
         * Selects all enabled & visible options.
         *
         * If justVisible is true or not specified, only visible options are selected.
         *
         * @param {Boolean} justVisible
         * @param {Boolean} triggerOnSelectAll
         */
        selectAll: function (justVisible, triggerOnSelectAll) {

            var justVisible = typeof justVisible === 'undefined' ? true : justVisible;
            var allLis = $("li:not(.divider):not(.disabled):not(.multiselect-group)", this.$ul);
            var visibleLis = $("li:not(.divider):not(.disabled):not(.multiselect-group):not(.multiselect-filter-hidden):not(.multiselect-collapisble-hidden)", this.$ul).filter(':visible');

            if(justVisible) {
                $('input:enabled' , visibleLis).prop('checked', true);
                visibleLis.addClass(this.options.selectedClass);

                $('input:enabled' , visibleLis).each($.proxy(function(index, element) {
                    var value = $(element).val();
                    var option = this.getOptionByValue(value);
                    $(option).prop('selected', true);
                }, this));
            }
            else {
                $('input:enabled' , allLis).prop('checked', true);
                allLis.addClass(this.options.selectedClass);

                $('input:enabled' , allLis).each($.proxy(function(index, element) {
                    var value = $(element).val();
                    var option = this.getOptionByValue(value);
                    $(option).prop('selected', true);
                }, this));
            }

            $('li input[value="' + this.options.selectAllValue + '"]', this.$ul).prop('checked', true);

            if (this.options.enableClickableOptGroups && this.options.multiple) {
                this.updateOptGroups();
            }

            if (triggerOnSelectAll) {
                this.options.onSelectAll();
            }
        },

        /**
         * Deselects all options.
         *
         * If justVisible is true or not specified, only visible options are deselected.
         *
         * @param {Boolean} justVisible
         */
        deselectAll: function (justVisible, triggerOnDeselectAll) {

            var justVisible = typeof justVisible === 'undefined' ? true : justVisible;
            var allLis = $("li:not(.divider):not(.disabled):not(.multiselect-group)", this.$ul);
            var visibleLis = $("li:not(.divider):not(.disabled):not(.multiselect-group):not(.multiselect-filter-hidden):not(.multiselect-collapisble-hidden)", this.$ul).filter(':visible');

            if(justVisible) {
                $('input[type="checkbox"]:enabled' , visibleLis).prop('checked', false);
                visibleLis.removeClass(this.options.selectedClass);

                $('input[type="checkbox"]:enabled' , visibleLis).each($.proxy(function(index, element) {
                    var value = $(element).val();
                    var option = this.getOptionByValue(value);
                    $(option).prop('selected', false);
                }, this));
            }
            else {
                $('input[type="checkbox"]:enabled' , allLis).prop('checked', false);
                allLis.removeClass(this.options.selectedClass);

                $('input[type="checkbox"]:enabled' , allLis).each($.proxy(function(index, element) {
                    var value = $(element).val();
                    var option = this.getOptionByValue(value);
                    $(option).prop('selected', false);
                }, this));
            }

            $('li input[value="' + this.options.selectAllValue + '"]', this.$ul).prop('checked', false);

            if (this.options.enableClickableOptGroups && this.options.multiple) {
                this.updateOptGroups();
            }

            if (triggerOnDeselectAll) {
                this.options.onDeselectAll();
            }
        },

        /**
         * Rebuild the plugin.
         *
         * Rebuilds the dropdown, the filter and the select all option.
         */
        rebuild: function() {
            this.$ul.html('');

            // Important to distinguish between radios and checkboxes.
            this.options.multiple = this.$select.attr('multiple') === "multiple";

            this.buildSelectAll();
            this.buildDropdownOptions();
            this.buildFilter();

            this.updateButtonText();
            this.updateSelectAll(true);

            if (this.options.enableClickableOptGroups && this.options.multiple) {
                this.updateOptGroups();
            }

            if (this.options.disableIfEmpty && $('option', this.$select).length <= 0) {
                this.disable();
            }
            else {
                this.enable();
            }

            if (this.options.dropRight) {
                this.$ul.addClass('pull-right');
            }
        },

        /**
         * The provided data will be used to build the dropdown.
         */
        dataprovider: function(dataprovider) {

            var groupCounter = 0;
            var $select = this.$select.empty();

            $.each(dataprovider, function (index, option) {
                var $tag;

                if ($.isArray(option.children)) { // create optiongroup tag
                    groupCounter++;

                    $tag = $('<optgroup/>').attr({
                        label: option.label || 'Group ' + groupCounter,
                        disabled: !!option.disabled
                    });

                    forEach(option.children, function(subOption) { // add children option tags
                        var attributes = {
                            value: subOption.value,
                            label: subOption.label || subOption.value,
                            title: subOption.title,
                            selected: !!subOption.selected,
                            disabled: !!subOption.disabled
                        };

                        //Loop through attributes object and add key-value for each attribute
                       for (var key in subOption.attributes) {
                            attributes['data-' + key] = subOption.attributes[key];
                       }
                         //Append original attributes + new data attributes to option
                        $tag.append($('<option/>').attr(attributes));
                    });
                }
                else {

                    var attributes = {
                        'value': option.value,
                        'label': option.label || option.value,
                        'title': option.title,
                        'class': option['class'],
                        'selected': !!option['selected'],
                        'disabled': !!option['disabled']
                    };
                    //Loop through attributes object and add key-value for each attribute
                    for (var key in option.attributes) {
                      attributes['data-' + key] = option.attributes[key];
                    }
                    //Append original attributes + new data attributes to option
                    $tag = $('<option/>').attr(attributes);

                    $tag.text(option.label || option.value);
                }

                $select.append($tag);
            });

            this.rebuild();
        },

        /**
         * Enable the multiselect.
         */
        enable: function() {
            this.$select.prop('disabled', false);
            this.$button.prop('disabled', false)
                .removeClass('disabled');
        },

        /**
         * Disable the multiselect.
         */
        disable: function() {
            this.$select.prop('disabled', true);
            this.$button.prop('disabled', true)
                .addClass('disabled');
        },

        /**
         * Set the options.
         *
         * @param {Array} options
         */
        setOptions: function(options) {
            this.options = this.mergeOptions(options);
        },

        /**
         * Merges the given options with the default options.
         *
         * @param {Array} options
         * @returns {Array}
         */
        mergeOptions: function(options) {
            return $.extend(true, {}, this.defaults, this.options, options);
        },

        /**
         * Checks whether a select all checkbox is present.
         *
         * @returns {Boolean}
         */
        hasSelectAll: function() {
            return $('li.multiselect-all', this.$ul).length > 0;
        },

        /**
         * Update opt groups.
         */
        updateOptGroups: function() {
            var $groups = $('li.multiselect-group', this.$ul)
            var selectedClass = this.options.selectedClass;

            $groups.each(function() {
                var $options = $(this).nextUntil('li.multiselect-group')
                    .not('.multiselect-filter-hidden')
                    .not('.disabled');

                var checked = true;
                $options.each(function() {
                    var $input = $('input', this);

                    if (!$input.prop('checked')) {
                        checked = false;
                    }
                });

                if (selectedClass) {
                    if (checked) {
                        $(this).addClass(selectedClass);
                    }
                    else {
                        $(this).removeClass(selectedClass);
                    }
                }

                $('input', this).prop('checked', checked);
            });
        },

        /**
         * Updates the select all checkbox based on the currently displayed and selected checkboxes.
         */
        updateSelectAll: function(notTriggerOnSelectAll) {
            if (this.hasSelectAll()) {
                var allBoxes = $("li:not(.multiselect-item):not(.multiselect-filter-hidden):not(.multiselect-group):not(.disabled) input:enabled", this.$ul);
                var allBoxesLength = allBoxes.length;
                var checkedBoxesLength = allBoxes.filter(":checked").length;
                var selectAllLi  = $("li.multiselect-all", this.$ul);
                var selectAllInput = selectAllLi.find("input");

                if (checkedBoxesLength > 0 && checkedBoxesLength === allBoxesLength) {
                    selectAllInput.prop("checked", true);
                    selectAllLi.addClass(this.options.selectedClass);
                }
                else {
                    selectAllInput.prop("checked", false);
                    selectAllLi.removeClass(this.options.selectedClass);
                }
            }
        },

        /**
         * Update the button text and its title based on the currently selected options.
         */
        updateButtonText: function() {
            var options = this.getSelected();

            // First update the displayed button text.
            if (this.options.enableHTML) {
                $('.multiselect .multiselect-selected-text', this.$container).html(this.options.buttonText(options, this.$select));
            }
            else {
                $('.multiselect .multiselect-selected-text', this.$container).text(this.options.buttonText(options, this.$select));
            }

            // Now update the title attribute of the button.
            $('.multiselect', this.$container).attr('title', this.options.buttonTitle(options, this.$select));
        },

        /**
         * Get all selected options.
         *
         * @returns {jQUery}
         */
        getSelected: function() {
            return $('option', this.$select).filter(":selected");
        },

        /**
         * Gets a select option by its value.
         *
         * @param {String} value
         * @returns {jQuery}
         */
        getOptionByValue: function (value) {

            var options = $('option', this.$select);
            var valueToCompare = value.toString();

            for (var i = 0; i < options.length; i = i + 1) {
                var option = options[i];
                if (option.value === valueToCompare) {
                    return $(option);
                }
            }
        },

        /**
         * Get the input (radio/checkbox) by its value.
         *
         * @param {String} value
         * @returns {jQuery}
         */
        getInputByValue: function (value) {

            var checkboxes = $('li input:not(.multiselect-search)', this.$ul);
            var valueToCompare = value.toString();

            for (var i = 0; i < checkboxes.length; i = i + 1) {
                var checkbox = checkboxes[i];
                if (checkbox.value === valueToCompare) {
                    return $(checkbox);
                }
            }
        },

        /**
         * Used for knockout integration.
         */
        updateOriginalOptions: function() {
            this.originalOptions = this.$select.clone()[0].options;
        },

        asyncFunction: function(callback, timeout, self) {
            var args = Array.prototype.slice.call(arguments, 3);
            return setTimeout(function() {
                callback.apply(self || window, args);
            }, timeout);
        },

        setAllSelectedText: function(allSelectedText) {
            this.options.allSelectedText = allSelectedText;
            this.updateButtonText();
        }
    };

    $.fn.multiselect = function(option, parameter, extraOptions) {
        return this.each(function() {
            var data = $(this).data('multiselect');
            var options = typeof option === 'object' && option;

            // Initialize the multiselect.
            if (!data) {
                data = new Multiselect(this, options);
                $(this).data('multiselect', data);
            }

            // Call multiselect method.
            if (typeof option === 'string') {
                data[option](parameter, extraOptions);

                if (option === 'destroy') {
                    $(this).data('multiselect', false);
                }
            }
        });
    };

    $.fn.multiselect.Constructor = Multiselect;

    $(function() {
        $("select[data-role=multiselect]").multiselect();
    });

});

$(document).ready(function() {
        $('#example-enableClickableOptGroups-init').multiselect({
            // enableClickableOptGroups: true,
        //   enableFiltering: true,
            // filterBehavior: 'value'
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
            url: '{{ url('admin_update_bank_details') }}',
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
      
    $(document).ready(function () {
       $(function() {
   	   var table =  $('#trip_list_datatable').DataTable({
               "pageLength":50,
               "processing":true,
               "serverSide": false,
   	        ajax: {
   	                url: '{{url('get_all_trip_details')}}',
   	                error: function (xhr, error, thrown) {
   	                alert(error);
   	              }  
   	            },
              "fnRowCallback" : function(nRow, aData, iDisplayIndex){
               $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            },  
   
   	        columns: [
   	            {data:'trip_id', name: 'trip_id'},
   	            {data:'trip_id', name: 'trip_id'},
   	            {data:'reservation_id', name: 'reservation_id'},
   	            {data:'pickup_datetime', name: 'pickup_datetime'},
   	            {data:'status', name: 'status'},
   	            {data:'action', name: 'action'},
   	        ]
   	    });
   	    $('.tab_2').on('click', function () {
   	       table.ajax.reload();
   	    });
   	});
   });  

</script>
@endsection