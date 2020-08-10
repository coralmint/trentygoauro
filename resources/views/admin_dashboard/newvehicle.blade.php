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
        <div class="col-md-12" style="background-color:#fff;">

<div class="col-md-12 vimkim">
                                      <h4 class="customdet">Assign New Vehicle</h4>
                                      </div>
                                        <div class="form-row formtab">
                                        
                                          <div class="form-group col-md-4">
                 
                    <div class="form-group has-float-label">
                        <input type="text" class="form-control" id="Customer Name" placeholder="vehicle Model" onfocus="this.placeholder = ''" required autofocus >
                        <label for="vehicle Model">vehicle Model</label>
                    </div>             
                                          </div>
                                          <div class="form-group col-md-4">
                                           
                    <div class="form-group has-float-label">
                        <input type="text" class="form-control" id="Phone Number" placeholder="Location" onfocus="this.placeholder = ''" required autofocus >
                        <label for="Location">Location</label>
                    </div>          
                                          </div>
                                          <div class="form-group col-md-4">
                                            
                    <div class="form-group has-float-label">
                        <input type="text" class="form-control" id="Email Id" placeholder="Vehicle Color" onfocus="this.placeholder = ''" required autofocus >
                        <label for="Vehicle Color">Vehicle Color</label>
                    </div>          
                                          </div>
                                          <div class="form-group col-md-4">
                                            
                    <div class="form-group has-float-label">
                        <input data-parsley-type="number" type="date" class="form-control tribut" maxlength="10" required value="" class="form-control" id="Date of Reservation" placeholder="Date" onfocus="this.placeholder = ''" required autofocus>
                        <label for="Date">Date</label>
                    </div>
                                          </div>
                                           <div class="form-group col-md-4">
                                            
                    <div class="form-group has-float-label">
                        <input  type="text" class="form-control tribut"  class="form-control" id="Booking Dates" placeholder="Add On" onfocus="this.placeholder = ''" required autofocus >
                        <label for="Add On">Add On</label>
                    </div>             
                                          </div>
                                      
                                          
                                       
                                       </div>



                                          <div class="form-row formtab">
                                          <div class="form-group">
                                             <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                             <button type="button" class="btn btn-primary waves-effect waves-light" id="add_location_submit">Save</button>
                                             <button type="button" class="close_location_tab btn btn-default waves-effect waves-light" id="" >Cancel</button>
                                          </div>
                                       </div>
                                       
                                      
                                       
                                       
 
 
  
  
  <div class="container-fluid" style="background-color:#fff;max-width:100%;margin-top: 10px;">
      <div class="col-md-12 vimkim">
                                      <h4 class="customdet">Assign Vehicle Page table</h4>
                                      </div>
        <div class="row">
                  <div class="col-md-12 ">
                     <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane  show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                           <form id="color_datatable">
                              <table class="table table-bordered dataTable no-footer mobile-table" id="partner_list_datatable" style="table-layout:fixed; width: 100%;">
                                 <thead>
                                    <tr>
                                       <th>S No</th>
                                       <th>Location</th>
                                       <th>vehicle Model</th>
                                       <th>Add on</th>
                                       <th>Vehicle Color</th>
                                       
                                       <th>Date</th>
                                       
                                     
                                       
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
    <!-- /.col-md-8 -->
  </div>   
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