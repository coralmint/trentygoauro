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

</style>
<div class="wrapper">
    <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
                  <div class="col-md-8 pull-left">
                  <div class="col-md-12 examplo">
                     <div class="">
                        <div class="row">
                           <div class="col-md-2">
                              <img src="/theme_files/images/important-person_318-10744.jpg" alt="no pic" class="img-rounded img-responsive" />
                           </div>
                           <div class="col-md-4">
                              <h4 class="patelkim">
                                 
                              </h4>
                              <p style="font-size:16px;">
                                 <i class="glyphicon glyphicon-envelope"></i>ujhhk
                                 <br />
                                 <i class="glyphicon glyphicon-phone"></i>jhkjhk
                                 <br/>
                                 <i class="glyphicon glyphicon-map-marker"></i>hjkjhkhj
                                 <br />
                              </p>
                           </div>
                           <div class="col-md-4">
                              <h4 class="patelkim">
                             
                              </h4>
                              <p style="font-size:16px;">
                                 <i class=""><b>Type :  </b></i>jhkjhk
                                 <br />
                                 <i class=""><b>Door-No :  </b></i>jhkjhk
                                 <br/>
                                 <i class=""><b>Address :  </b></i>jhkjhk
                                 <br/>
                                 <i class=""><b>Rent :  </b></i>mnjmjhkjh
                                 <br/>
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="btn-group col-md-4 pull-right">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                     <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                     <li class="breadcrumb-item active">Manage Property Rent</li>
                  </ol>
                  <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left" style="color: #e60c55; margin-right: 8px;border: 2px solid;padding: 5px;border-radius: 17px;"></i><span style="color: #e5004d; font-size: large; margin-right: 15px;">Back</span></a>
               </div>
             
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="card-box codebox">
               <div class="row" style="display: none;" id="add_new_property_rent_tab">
                  <div class="col-lg-12">
                     <div class="card-box">
                        <h4 class="page-title">Add rent details<span style="cursor: pointer;" class="pull-right close_add_new_property_rent_tab"><i class=" mdi mdi-close"></i></span></h4>
                        <hr>
                        <!--<form>-->
                        <div class="form-row">
                           <div class="form-group col-md-6" style="padding-left: 25px;">
                              <label>Select Date</label><span style="color: red;">*</span>
                              <div class="input-group">
                                 <input type="text" class="form-control" value="" placeholder="dd-mm-yyyy" id="date_periods1">
                              </div>
                           </div>
                           <div class="form-group col-md-6">
                              <label>Rent Amount</label><span style="color: red;">*</span>
                              <input data-parsley-type="number" type="text" class="form-control tribut" required placeholder="Rent amount" id="multi_rent1" />
                           </div>
                        </div>
                        <div class="form-group">
                           <center>
                              <button type="button" class="btn btn-primary waves-effect waves-light" id="add_new_multidate_rent1">Add</button>
                              <button type="submit" class="btn btn-default waves-effect waves-light close_add_new_property_rent_tab" id="">Cancel</button>
                           </center>
                        </div>
                        <!--</form>-->
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12 ">
                     <div class="card-box">
                        <br>
                        <nav>
                           <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Property Rent</a>
                              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Occupancy Info</a>
                           </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                           <div class="tab-pane  show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" style="padding-right: 15px;">
                              <!--<table class="table table-bordered dataTable no-footer mobile-table" id="distribitor_list_datatable" style="table-layout: fixed; width: 98%;">-->
                              <!--   <thead>-->
                              <!--      <tr>-->
                              <!--         <th>#</th>-->
                              <!--         <th>Date</th>-->
                              <!--         <th>Rent</th>-->
                              <!--         <th>Status</th>-->
                              <!--         <th>Action</th>-->
                              <!--      </tr>-->
                              <!--   </thead>-->
                              <!--</table>-->
                              <!--<center>-->
                              <!--    <div class="form-group col-md-4" style="margin-top: -2%;">-->
                              <!--       <label>Property rent</label>-->
                              <!--       <input type="text" class="fc-title" value="{{ $property_info[0]->property_rent }}" id="default_property_rent" disabled />-->
                              <!--    </div>-->
                              <!--</center>-->
                              <div class="text-right">
                                    <p class="pull-left firefox"> <span style="font-size: 20px;">Default Property rent</span><span style="margin-left: 20px;color: #3a87ad;font-size: 30px;">{{ $property_info[0]->property_rent }}</span></h2></p>
                                    <a id="add_new_property_rent_button" class="pull-right btn btn-primary waves-effect waves-light w-md">Add New</a>
                              </div>
                              <center><div id="calendar" style="width: 80%; display: inline-block;"></div></center>
                              <input type="hidden" name="property_id" value={{$property_id}} id="property_id" />
                              <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                              @foreach($edit_property_rent as $ev)
                              <div class="targetdiv slide-in " id="mySidenav{{ $ev->id }}" class="sidenav" style="display:none;">
                                 <div class="card-body">
                                    <form>
                                       <div class="form-row toglediv">
                                          <div class="form-row row" style="width: -webkit-fill-available;">
                                             <div class="col-md-12" style="margin-left: 35px;">
                                                <label class="crosil">Property Rent for {{ $ev->date }}</label>
                                             </div>
                                             <div class="col-md-12" style="margin-left: 35px;">
                                                <input type="text" value="{{ $ev->rent }}" id="update_rent{{ $ev->id }}">
                                                <input type="hidden" value="{{ $ev->id }}" id="update_rent_id{{ $ev->id }}">
                                             </div>
                                             <div class="col-md-12" style="margin-top: 35px;">
                                                <center>
                                                   <button type="button" onclick="update_rent({{ $ev->id }});"; class="btn btn-primary waves-effect waves-light w-md m-b-30"> Update </button>
                                                   <button type="button" onclick="close_slide({{ $ev->id }});"; class="btn btn-warning waves-effect waves-light w-md m-b-30"> Close </button>
                                                </center>
                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              @endforeach
                              <div class="targetdiv slide-in " id="mySidenav1" class="sidenav" style="display:none;">
                                 <div class="card-body">
                                    <form>
                                       <div class="form-row toglediv">
                                          <div class="form-row row" style="width: -webkit-fill-available;">
                                             <div class="col-md-12" style="margin-left: 35px;">
                                                <label class="crosil">Property Rent for <span id="add_rent_for_date"></span></label>
                                                <input type="hidden" id="new_rent_date">
                                             </div>
                                             <div class="col-md-12" style="margin-left: 35px;">
                                                <input type="text" value="" id="new_rent_value">
                                             </div>
                                             <div class="col-md-12" style="margin-top: 35px;">
                                                <center>
                                                   <button type="button" class="btn btn-primary waves-effect waves-light w-md m-b-30" id="add_new_rent_submit"> Add </button>
                                                   <button type="button" onclick="close_slide();"; class="btn btn-warning waves-effect waves-light w-md m-b-30"> Close </button>
                                                </center>
                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              <div class="targetdiv slide-in " id="mySidenav2" class="sidenav" style="display:none;">
                                 <div class="card-body">
                                    <form>
                                       <div class="form-row toglediv">
                                          <div class="form-row row" style="width: -webkit-fill-available;">
                                             <div class="col-md-12" style="margin-left: 35px;">
                                                <label>Select Date</label><span style="color: red;">*</span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="" placeholder="dd-mm-yyyy" id="date_periods">
                                                </div>
                                             </div><br>
                                             <div class="col-md-12" style="margin-left: 35px;">
                                                <label>Rent Amount</label><span style="color: red;">*</span>
                                                <input data-parsley-type="number" type="text" class="form-control tribut" required placeholder="Rent amount" id="multi_rent" />
                                             </div>
                                             <div class="col-md-12" style="margin-top: 35px;">
                                                <center>
                                                   <button type="button" class="btn btn-primary waves-effect waves-light w-md m-b-30" id="add_new_multidate_rent"> Add </button>
                                                   <button type="button" onclick="close_slide();"; class="btn btn-warning waves-effect waves-light w-md m-b-30"> Close </button>
                                                </center>
                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                            </div>
                            
                            <div class="tab-pane" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                              <div class="title m-b-md" style="padding-right: 20px;">
                                 <a class="pull-right btn btn-primary waves-effect waves-light" id="ical_sync">Click here to Ical-Sync</a> &nbsp;&nbsp;
                              </div><br><br>
                              <center><div id="ocalendar" style="width: 80%;"></div></center>
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