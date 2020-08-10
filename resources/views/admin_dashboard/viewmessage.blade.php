@extends('layouts.adminmaster')
@section('content')
<header id="topnav">
   @include('admin_dashboard.menu')
</header>
<style>
   .btn-compose-email {
   padding: 10px 0px;
   margin-bottom: 20px;
   }
   .btn-danger {
   background-color: #E9573F;
   border-color: #E9573F;
   color: white;
   }
   .panel-teal .panel-heading {
   background-color: #37BC9B;
   border: 1px solid #36b898;
   color: white;
   }
   .panel .panel-heading {
   padding: 5px;
   border-top-right-radius: 3px;
   border-top-left-radius: 3px;
   border-bottom: 1px solid #DDD;
   -moz-border-radius: 0px;
   -webkit-border-radius: 0px;
   border-radius: 0px;
   }
   .panel .panel-heading .panel-title {
   padding: 10px;
   font-size: 17px;
   }
   form .form-group {
   position: relative;
   margin-left: 0px !important;
   margin-right: 0px !important;
   }
   .inner-all {
   padding: 10px;
   }
   /* ========================================================================
   * MAIL
   * ======================================================================== */
   .nav-email > li:first-child + li:active {
   margin-top: 0px;
   }
   .nav-email > li + li {
   margin-top: 1px;
   }
   .nav-email li {
   background-color: white;
   }
   .nav-email li.active {
   background-color: transparent;
   }
   .nav-email li.active .label {
   background-color: white;
   color: black;
   }
   .nav-email li a {
   color: black;
   -moz-border-radius: 0px;
   -webkit-border-radius: 0px;
   border-radius: 0px;
   }
   .nav-email li a:hover {
   background-color: #EEEEEE;
   }
   .nav-email li a i {
   margin-right: 5px;
   }
   .nav-email li a .label {
   margin-top: -1px;
   }
   .table-email tr:first-child td {
   border-top: none;
   }
   .table-email tr td {
   vertical-align: top !important;
   }
   .table-email tr td:first-child, .table-email tr td:nth-child(2) {
   text-align: center;
   width: 35px;
   display:none;
   }
   .table-email tr.unread, .table-email tr.selected {
   background-color: #EEEEEE;
   }
   .table-email .media {
   margin: 0px;
   padding: 10px;
   position: relative;
   }
   .table-email .media h4 {
   margin: 0px;
   font-size: 16px;
   line-height: normal;
   color: #14b3bb !important;
   font-weight: bold;
   }
   .table-email .media-object {
   width: 40px;
   -moz-border-radius: 2px;
   -webkit-border-radius: 2px;
   border-radius: 2px;
   margin-right:20px;
   }
   .table-email .media-meta, .table-email .media-attach {
   font-size: 11px;
   color: #999;
   position: absolute;
   right: 10px;
   }
   .table-email .media-meta {
   top: 0px;
   }
   .table-email .media-attach {
   bottom: 0px;
   }
   .table-email .media-attach i {
   margin-right: 10px;
   }
   .table-email .media-attach i:last-child {
   margin-right: 0px;
   }
   .table-email .email-summary {
   margin: 0px 110px 0px 0px;
   }
   .table-email .email-summary strong {
   color: rgba(51, 51, 51, 0.73);
   }
   .table-email .email-summary span {
   line-height: 1;
   }
   .table-email .email-summary span.label {
   padding: 5px 10px;
   /* color: #000; */
   background-color: #409eff;
   margin-left: 7px;
   }
   .table-email .ckbox {
   line-height: 0px;
   margin-left: 8px;
   padding:10px;
   display:none;
   }
   .table-email .star {
   margin-left: 6px;
   display:none;
   }
   .table-email .star.star-checked i {
   color: goldenrod;
   padding-top:7px;
   display:none;
   }
   .nav-email-subtitle {
   font-size: 15px;
   text-transform: uppercase;
   color: #333;
   margin-bottom: 15px;
   margin-top: 30px;
   }
   .compose-mail {
   position: relative;
   padding: 15px;
   }
   .compose-mail textarea {
   width: 100%;
   padding: 10px;
   border: 1px solid #DDD;
   }
   .view-mail {
   padding: 10px;
   font-weight: 300;
   }
   .attachment-mail {
   padding: 10px;
   width: 100%;
   display: inline-block;
   margin: 20px 0px;
   border-top: 1px solid #EFF2F7;
   }
   .attachment-mail p {
   margin-bottom: 0px;
   }
   .attachment-mail a {
   color: #32323A;
   }
   .attachment-mail ul {
   padding: 0px;
   }
   .attachment-mail ul li {
   float: left;
   width: 200px;
   margin-right: 15px;
   margin-top: 15px;
   list-style: none;
   }
   .attachment-mail ul li a.atch-thumb img {
   width: 200px;
   margin-bottom: 10px;
   }
   .attachment-mail ul li a.name span {
   float: right;
   color: #767676;
   }
   @media (max-width: 640px) {
   .compose-mail-wrapper .compose-mail {
   padding: 0px;
   }
   }
   @media (max-width: 360px) {
   .mail-wrapper .panel-sub-heading {
   text-align: center;
   }
   .mail-wrapper .panel-sub-heading .pull-left, .mail-wrapper .panel-sub-heading .pull-right {
   float: none !important;
   display: block;
   }
   .mail-wrapper .panel-sub-heading .pull-right {
   margin-top: 10px;
   }
   .mail-wrapper .panel-sub-heading img {
   display: block;
   margin-left: auto;
   margin-right: auto;
   margin-bottom: 10px;
   }
   .mail-wrapper .panel-footer {
   text-align: center;
   }
   .mail-wrapper .panel-footer .pull-right {
   float: none !important;
   margin-left: auto;
   margin-right: auto;
   }
   .mail-wrapper .attachment-mail ul {
   padding: 0px;
   }
   .mail-wrapper .attachment-mail ul li {
   width: 100%;
   }
   .mail-wrapper .attachment-mail ul li a.atch-thumb img {
   width: 100% !important;
   }
   .mail-wrapper .attachment-mail ul li .links {
   margin-bottom: 20px;
   }
   .compose-mail-wrapper .search-mail input {
   width: 130px;
   }
   .compose-mail-wrapper .panel-sub-heading {
   padding: 10px 7px;
   }
   }
   li.mesgvi {
   list-style: none;
   padding: 13px 10px;
   -webkit-box-shadow: 0px 0px 13px -2px rgba(34,175,180,0.58);
   -moz-box-shadow: 0px 0px 13px -2px rgba(34,175,180,0.58);
   box-shadow: 0px 0px 13px -2px rgba(34,175,180,0.58);
   }
   a.partnervi {
   color: #23366e;
   font-weight: bold;
   }
   .btn-default {
   color: #0075ff !important;
   border: 1px solid #0075ff !important;
   background: transparent !important;
   }
   .wrapper {
   padding-top: 90px;
   }
</style>
<div class="wrapper">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-2">
            <li class="mesgvi"><a href="" class="partnervi">Partner View message</a></li>
         </div>
         <div class="col-sm-10" style="background-color:#fff;">
            <div class="panel rounded shadow panel-teal">
               <!-- /.panel-sub-heading -->
               <div class="panel-body no-padding">
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                  <div class="table-responsive">
                    <table class="table table-hover table-email dataTable no-footer mobile-table" id="unreaded_messages" style="table-layout:auto; width: 100%;">
                        <thead style="display:none;">
                                <tr>
                                   <th></th>
                                   <th></th>
                                   <th></th>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach($unread_messages as $msg)
                           <tr>
                              <td>
                                 <div class="ckbox ckbox-theme">
                                    <input id="checkbox1" type="checkbox" checked="checked" class="mail-checkbox">
                                    <label for="checkbox1"></label>
                                 </div>
                              </td>
                              <td>
                                 <a href="#" class="star star-checked"><i class="fa fa-star"></i></a>
                              </td>
                              <td>
                                 <div class="media">
                                    <a class="pull-left">
                                    <img alt="..." src="{{ $msg->file_url }}" class="media-object">
                                    </a>
                                    <div class="media-body">
                                       <h4 class="text-primary">{{ ucfirst($msg->partner_name) }}</h4>
                                       <p class="email-summary">{{ $msg->message }}<span class="label label-success">{{ $msg->message_count }}</span> </p>
                                       <span class="media-meta">{{ date('h:i A', strtotime($msg->message_date)) }}</span>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  </div>
                  <!-- /.table-responsive -->
               </div>
               <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
         </div>
      </div>
   </div>
</div>
<!-- end wrapper -->
@include('admin_dashboard.footer')
@endsection
@section('script')
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<script>
$(document).ready(function() {
    $('#unreaded_messages').DataTable();
});
   $(document).ready(function(){
     $("a").click(function(){
       $("button").slideToggle();
     });
   });
</script>
@endsection