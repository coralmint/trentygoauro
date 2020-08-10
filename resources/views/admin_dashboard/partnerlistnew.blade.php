@extends('layouts.adminmaster')
@section('content')
<header id="topnav">
    @include('admin_dashboard.menu')
</header>
<style class="cp-pen-styles">
.wrapper {
    padding-top: 50px;
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
</style>
<div class="wrapper">
     
  <div class=" container-fluid accordion-panel" >
          <div class="row">
         <div class="col-sm-12">
            <div class="form-row">
                  <div class="form-group col-md-6">
                       
                  <ol class="breadcrumb hide-phone p-0 m-0">
                        <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left" style="color: #1bb1ba; margin-right: 8px;"></i><span style="color: #1bb1ba; font-size: large; margin-right: 15px;">Back</span></a> 
                     <li class="breadcrumb-item"><a href="dashboard">Partner management</a></li>
                     <li class="breadcrumb-item active">profile Table</li>
                  </ol>
               </div>
               <div class="form-group col-md-6">
                   <select class="form-control" id="sel1">
                       <option>Current Status</option>
                        <option>Publish</option>
                        <option>Unpublish</option>
                        <option>Approve</option>
                        <option>Reject</option>
                        <option>resend</option>
                     </select>
                  </div>
             
            </div>
         </div>
      </div>
  <div class="buttons-wrapper">
    <div class="open-btn">
      Open all
    </div>
    <div class="close-btn hidden">
      Close all
    </div>
  </div>

  <dl class="accordion">
    <dt>Personal Details<i class="plus-icon"></i></dt>
    <dd>
      <div class="content">
       <div class="form-row">
           <div class="col-md-2">
              <img src="{{ asset('/theme_files/images/tropical-blue.png') }}" class="addnew" >
           </div>
            <div class="col-md-10 prove">
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label>Name</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Name" id="color_name" />             
                  </div>
                  <div class="form-group col-md-6">
                     <label>Email</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Email" id="color_code" />             
                  </div>
                  <div class="form-group col-md-6">
                     <label>Mobile Number</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Mobile Number" id="color_code" />             
                  </div>
                  <div class="form-group col-md-6">
                     <label>Door No</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Email Address" id="color_code" />             
                  </div>
                  <div class="form-group col-md-6">
                     <label>Area/City</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Area/City" id="color_name" />             
                  </div>
                  <div class="form-group col-md-6">
                     <label>State</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="State" id="color_code" />             
                  </div>
                  <div class="form-group col-md-6">
                     <label>Postal Code</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Postal code" id="color_code" />             
                  </div>
                  <div class="form-group col-md-6">
                     <label></label>
                     <textarea  class="form-control tribut" maxlength="10" required placeholder="textarea" id="color_code" > </textarea>            
                  </div>
                   <div class="form-group">
                  <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                  <button type="button" class="btn btn-primary waves-effect waves-light" id="add_location_submit">Save</button>
                  <button type="button" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
               </div>
               </div>
           </div>
       </div>
      </div>
    </dd>
    <dt>Document Details<i class="plus-icon"></i></dt>
    <dd>
      <div class="content">
      <div class="form-row">
          <div class="form-group col-md-3">
                     <label>Personal Id proof</label>
                        
                  </div>
                  <div class="form-group col-md-6">
                 
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="abc.jpg" id="color_name" />             
                  </div>
                  <div class="form-group col-md-3">
                      <div class="form-row">
                      <div class="col-md-2">
                          <i class="fa fa-upload"></i>
                      </div>
                      <div class="col-md-2">
                         <i class="fa fa-download"></i>  
                      </div>
                 </div>
                  </div>
                  <div class="form-group col-md-3">
                     <label>Agreement Document</label>
                             
                  </div>
                  <div class="form-group col-md-6">
                     
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="xyz.jpg" id="color_code" />             
                  </div>
                  <div class="form-group col-md-3">
                      <div class="form-row">
                      <div class="col-md-2">
                          <i class="fa fa-upload"></i>
                      </div>
                      <div class="col-md-2">
                         <i class="fa fa-download"></i>  
                      </div>
                 </div>
                 </div>
                    <div class="form-group">
                  <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                  <button type="button" class="btn btn-primary waves-effect waves-light" id="add_location_submit">Save</button>
                  <button type="button" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
               </div>
                  </div>
      </div>
    </dd>
    <dt>Vechile List <i class="plus-icon"></i></dt>
    <dd>
      <div class="content">
        <div class="row">
                  <div class="col-md-12 ">
                     <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane  show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                           <form id="color_datatable">
                              <table class="table table-bordered dataTable no-footer mobile-table" id="partner_list_datatable" style="table-layout:fixed; width: 100%;">
                                 <thead>
                                    <tr>
                                       <!--<th>No</th>-->
                                       <th style="width: 15px !important;">#</th>
                                       <th>Vechile Name</th>
                                       <th>Vechile Type</th>
                                       <th>Vechile Number</th>
                                       <th>Vechile Status</th>
                                      
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
    </dd>
     <dt>Upcoming reservation<i class="plus-icon"></i></dt>
    <dd>
      <div class="content">
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
                                       <th>Vechile ID</th>
                                       
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
    </dd>
    
       <dt>Trip history <i class="plus-icon"></i></dt>
    <dd>
      <div class="content">
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
                                       <th>Vechile ID</th>
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
    </dd>
    
     <dt>Invoice List <i class="plus-icon"></i></dt>
    <dd>
      <div class="content">
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
    </dd>
     <dt>Messages<i class="plus-icon"></i></dt>
    <dd>
      <div class="content">
     <div class="messaging">
      <div class="inbox_msg">
       
        <div class="mesgs">
          <div class="msg_history">
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                  <span class="time_date"> 11:01 AM    |    June 9</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                <span class="time_date"> 11:01 AM    |    June 9</span> </div>
            </div>
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                  <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                <span class="time_date"> 11:01 AM    |    Today</span> </div>
            </div>
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                  <span class="time_date"> 11:01 AM    |    Today</span></div>
              </div>
            </div>
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
    
      
    </div>
      </div>
    </dd>
    
    <dt>Settings<i class="plus-icon"></i></dt>
    <dd>
      <div class="content">
      <div class="form-row">
                  <div class="form-group col-md-4">
                     <label>Commision Percentage</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Commision Percentage" id="color_name" />             
                  </div>
                  <div class="form-group col-md-4">
                     <label>Discount</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Discount" id="color_code" />             
                  </div>
                  <div class="form-group col-md-4">
                     <label>Extra Commision</label>
                     <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Extra Commision" id="color_code" />             
                  </div>
                  <div class="form-group col-md-8">
                      <label class="checkbox-inline">
      <input type="checkbox" value="">Auto Approve
    </label>
                
                </div>
                
                   <div class="form-group">
                  <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                  <button type="button" class="btn btn-primary waves-effect waves-light" id="add_location_submit">Save</button>
                  <button type="button" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
               </div>
               </div>
      </div>
    </dd>
  </dl>
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
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script >$(document).ready(function() {

  var bodyEl = $('body'),
    accordionDT = $('.accordion').find('dt'),
    accordionDD = accordionDT.next('dd'),
    parentHeight = accordionDD.height(),
    childHeight = accordionDD.children('.content').outerHeight(true),
    newHeight = parentHeight > 0 ? 0 : childHeight,
    accordionPanel = $('.accordion-panel'),
    buttonsWrapper = accordionPanel.find('.buttons-wrapper'),
    openBtn = accordionPanel.find('.open-btn'),
    closeBtn = accordionPanel.find('.close-btn');

  bodyEl.on('click', function(argument) {
    var totalItems = $('.accordion').children('dt').length;
    var totalItemsOpen = $('.accordion').children('dt.is-open').length;

    if (totalItems == totalItemsOpen) {
      openBtn.addClass('hidden');
      closeBtn.removeClass('hidden');
      buttonsWrapper.addClass('is-open');
    } else {
      openBtn.removeClass('hidden');
      closeBtn.addClass('hidden');
      buttonsWrapper.removeClass('is-open');
    }
  });

  function openAll() {

    openBtn.on('click', function(argument) {

      accordionDD.each(function(argument) {
        var eachNewHeight = $(this).children('.content').outerHeight(true);
        $(this).css({
          height: eachNewHeight
        });
      });
      accordionDT.addClass('is-open');
    });
  }

  function closeAll() {

    closeBtn.on('click', function(argument) {
      accordionDD.css({
        height: 0
      });
      accordionDT.removeClass('is-open');
    });
  }

  function openCloseItem() {
    accordionDT.on('click', function() {

      var el = $(this),
        target = el.next('dd'),
        parentHeight = target.height(),
        childHeight = target.children('.content').outerHeight(true),
        newHeight = parentHeight > 0 ? 0 : childHeight;

      // animate to new height
      target.css({
        height: newHeight
      });

      // remove existing classes & add class to clicked target
      if (!el.hasClass('is-open')) {
        el.addClass('is-open');
      }

      // if we are on clicked target then remove the class
      else {
        el.removeClass('is-open');
      }
    });
  }

  openAll();
  closeAll();
  openCloseItem();
});
//# sourceURL=pen.js
</script>