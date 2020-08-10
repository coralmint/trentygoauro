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

.nav-pills .nav-link.active {
    background-color: #12b3b6;
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
    padding: 7px 15px !important;
    -webkit-box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
    -moz-box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
    box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
}
.nav>li>a:focus, .nav>li>a:hover {
    text-decoration: none;
    background-color: #13b0b8;
    padding: 7px 15px !important;
    vertical-align: super !important;
    color: #fff;
}
</style>
<div class="wrapper">
    <div class="container-fluid">
     <div class="row">
    <div class="col-md-2 mb-3">
        <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Customer Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Billing Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Reservation Details</a>
  </li>
</ul>
    </div>
    <!-- /.col-md-4 -->
        <div class="col-md-10">
      <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                     <div class="col-md-12 vimkim">
                                      <h4 class="customdet">Customer Details</h4>
                                      </div>
                                        <div class="form-row formtab">
                                        
                                          <div class="form-group col-md-6">
                                             <label>First Name</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Name" id="color_name" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Last Name</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Last Name" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Mobile Number</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Mobile Number" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Email Id</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Email Address" id="color_code" />             
                                          </div>
                                           <div class="form-group col-md-6">
                                             <label>Door No</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Door No" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Appartment Name</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Appartment Name" id="color_name" />             
                                          </div>
                                               <div class="form-group col-md-6">
                                             <label>Street Name</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Street Name" id="color_name" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>City</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="City" id="color_name" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>State</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="State" id="color_code" />             
                                          </div>
                                            <div class="form-group col-md-6">
                                             <label>Country</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Country" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Postal Code</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Postal code" id="color_code" />             
                                          </div>
                                       
                                       </div>
                                          <div class="form-row formtab">
                                          <div class="form-group">
                                             <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                             <button type="button" class="btn btn-primary waves-effect waves-light" id="add_location_submit">Save</button>
                                             <button type="button" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
                                          </div>
                                       </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<div class="col-md-12 vimkim">
                                      <h4 class="customdet">Billing Details</h4>
                                      </div>
                                        <div class="form-row formtab">
                                        
                                          <div class="form-group col-md-6">
                                             <label>First Name</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Name" id="color_name" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Last Name</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Last Name" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Mobile Number</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Mobile Number" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Email Id</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Email Address" id="color_code" />             
                                          </div>
                                           <div class="form-group col-md-6">
                                             <label>Door No</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Door No" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Appartment Name</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Appartment Name" id="color_name" />             
                                          </div>
                                               <div class="form-group col-md-6">
                                             <label>Street Name</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Street Name" id="color_name" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>City</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="City" id="color_name" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>State</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="State" id="color_code" />             
                                          </div>
                                            <div class="form-group col-md-6">
                                             <label>Country</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Country" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Postal Code</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Postal code" id="color_code" />             
                                          </div>
                                       
                                       </div>
                                          <div class="form-row formtab">
                                          <div class="form-group">
                                             <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                             <button type="button" class="btn btn-primary waves-effect waves-light" id="add_location_submit">Save</button>
                                             <button type="button" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
                                          </div>
                                       </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
<div class="col-md-12 vimkim">
                                      <h4 class="customdet">Reservation Details</h4>
                                      </div>
                                        <div class="form-row formtab">
                                        
                                          <div class="form-group col-md-6">
                                             <label>Reservation Date </label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Reservation Date" id="color_name" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Reservation Time</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Reservation Time" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Vechile Type</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vechile Type" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Vechile Brand</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vechile Brand" id="color_code" />             
                                          </div>
                                           <div class="form-group col-md-6">
                                             <label>Vechile Model</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vechile Model" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Vechile Reg No</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vechile Reg No" id="color_name" />             
                                          </div>
                                               <div class="form-group col-md-6">
                                             <label>Vechile Color</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vechile Color" id="color_name" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>No Of Seats</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="No of Seats" id="color_name" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Baby Seat Counting</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="State" id="color_code" />             
                                          </div>
                                            <div class="form-group col-md-6">
                                             <label>Adult Seat Counting</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Country" id="color_code" />             
                                          </div>
                                         
                                       
                                       </div>
                                          <div class="form-row formtab">
                                          <div class="form-group">
                                             <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                                             <button type="button" class="btn btn-primary waves-effect waves-light" id="add_location_submit">Save</button>
                                             <button type="button" class="close_location_tab btn btn-default waves-effect waves-light" id="">Cancel</button>
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