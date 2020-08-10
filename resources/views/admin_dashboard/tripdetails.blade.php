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
.formtab1{
    padding:20px;
    background-color:#fff;
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
.nav-pills .nav-link {
    border-radius: 30px;
    text-align: center;
    margin-bottom: 25px;
    /* border: 1px solid #12b3b6; */
    color: #21366b;
    font-size: 12px;
}
.nav>li>a {
    padding: 7px 20px !important;
    -webkit-box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
    -moz-box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
    box-shadow: 0px 0px 11px -2px rgba(18,179,182,0.67);
}
.nav>li>a:focus, .nav>li>a:hover {
    text-decoration: none;
    background-color: #13b0b8;
    padding: 7px 20px !important;
    vertical-align: super !important;
    color: #fff;
}
h3.detailbook {
       font-size: 16px;
    background-color: #15b1ba;
    color: #fff;
    padding: 5px;
    margin: 0px 0px 10px;
}
.warnbtn {
    /* margin: 10px 0px 20px; */
    padding: 15px 0px;
}
.formtab .form-group.col-md-3 {
    margin-bottom: 0px !important;
}
.pauim{
-webkit-box-shadow: 0px 0px 7px -2px rgba(21,179,182,1);
-moz-box-shadow: 0px 0px 7px -2px rgba(21,179,182,1);
box-shadow: 0px 0px 7px -2px rgba(21,179,182,1);
  margin-bottom: 20px; 
    background-color:#fff;
}
button#btnFA {
    display: block;
    margin: 0 auto;
}
label {
    color: #223770;
    font-weight: bold;
}

h2 {
    font-size: 20px;
    color: #24366b;
    font-weight: 500;
    margin: 0px 20px 20px;
    text-align: center;
}

textarea.description {
    border: 1px solid #ddd;
    border-radius: 3px;
}
.namelabel1 {
    text-align: center;
    color: #009688;
    font-weight: 700;
    font-size: 20px;
}
label.tripdetail {
    float: left;
        padding-right: 10px;
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
   .clickher{
   text-align:right;
   color:#444;
   }
   .has-float-label .form-control:placeholder-shown:not(:focus)::-webkit-input-placeholder {
   opacity: 0
   }
   .has-float-label .form-control:placeholder-shown:not(:focus)+label {
   font-size: 150%;
   opacity: .5;
   top: .8em
   }
label.spare {
    float: left;
}
i.fa.fa-trash {
    color: red;
}
.bab {
    margin-left: 10px;
}
button.compare {
    float: right;
    font-size: 15px;
    border: none;
    background-color: #14b1ba;
    color: #fff;
    padding: 10px 44px;
    font-weight: 500;
}
.carousel-control-next, .carousel-control-prev {
    position: absolute;
    top: 50% !important;
}
.bg-shadow {
    -webkit-box-shadow: 0px 0px 10px -4px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0px 10px -4px rgba(0,0,0,0.75);
    box-shadow: 0px 0px 10px -4px rgba(0,0,0,0.75);
}
.nav-tabs .nav-link.active {
    color: #ffffff;
    background-color: #12b3b6;
    border-color: #12b3b6 #12b3b6 #12b3b6;
    font-weight: bold;
}
.nav-tabs .nav-link {
    color: #12b3b6;
  
}
span.namelab {
    color: #12b3b6;
}
</style>
<div class="wrapper">
    <div class="container-fluid">
     <div class="row">
    <div class="col-md-2 mb-3">
        <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Trip Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Vehicle Photos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Document & Agreement</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="contact-tab1" data-toggle="tab" href="#partner" role="tab" aria-controls="contact" aria-selected="false">Pickup & drop Vehicles</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#partner1" role="tab" aria-controls="contact" aria-selected="false">Payment</a>
  </li>
</ul>
    </div>
    <!-- /.col-md-4 -->
        <div class="col-md-10">
    <div class="form-row formtab1 pauim">
        <div class="col-md-4">
                <div class="form-group col-md-12">
                        <div class="form-group">
                             <label for="vehicle Model" class="tripdetail">Name:</label>
                          <div class="namelabel">Vinoth</div>
                          
                        </div>
                     </div>
                      
                     <div class="form-group col-md-12">
                        <div class="form-group">
                             <label for="Vehicle Color" class="tripdetail">Phone:</label>
                            <div class="namelabel">985648756</div>
                          
                        </div>
                     </div>
                     <div class="form-group col-md-12">
                        <div class="form-group">
                             <label for="Vehicle Color" class="tripdetail">Email</label>
                            <div class="namelabel">vinoth@coralmint.in</div>
                          
                        </div>
                     </div>
                      <div class="form-group col-md-12">
                        <div class="form-group">
                            <label for="Location" class="tripdetail">Address</label>
                             <div class="namelabel">NO:4, Kamarajar Street,Pondicherry-605004</div>
                           
                        </div>
                     </div>
        </div>
         <div class="col-md-4">
                <div class="form-group col-md-12">
                        <div class="form-group">
                             <label for="vehicle Model" class="tripdetail">Reservation Id:</label>
                          <div class="namelabel">12345</div>
                          
                        </div>
                     </div>
                      
                     <div class="form-group col-md-12">
                        <div class="form-group">
                             <label for="Vehicle Color" class="tripdetail">Partner Name:</label>
                            <div class="namelabel">Vicky</div>
                          
                        </div>
                     </div>
                     <div class="form-group col-md-12">
                        <div class="form-group">
                             <label for="Vehicle Color" class="tripdetail">Reservation Date:</label>
                            <div class="namelabel">16-7-2020</div>
                          
                        </div>
                     </div>
                       <div class="form-group col-md-12">
                        <div class="form-group">
                             <label for="Vehicle Color" class="tripdetail">Vehicle Reg No:</label>
                            <div class="namelabel">PY2271</div>
                          
                        </div>
                     </div>
                     
        </div>
        <div class="col-md-4">
                <div class="form-group col-md-12">
                        <div class="form-group">
                             <label for="vehicle Model" class="tripdetail">Reservation Via:</label>
                          <div class="namelabel">Online/Walkin</div>
                          
                        </div>
                     </div>
                      
                     <div class="form-group col-md-12">
                        <div class="form-group">
                             <label for="Vehicle Color" class="tripdetail">Reservation Amount:</label>
                            <div class="namelabel">1254</div>
                          
                        </div>
                     </div>
                     <div class="form-group col-md-12">
                        <div class="form-group">
                             <label for="Vehicle Color" class="tripdetail">Date</label>
                            <div class="namelabel">12-7-2020,14-7-2020</div>
                          
                        </div>
                     </div>
                      <div class="form-group col-md-12">
                        <div class="form-group">
                            <label for="Location" class="tripdetail">Paid Amount</label>
                             <div class="namelabel">2343</div>
                           
                        </div>
                     </div>
        </div>
        
        
    </div>

          
            
      <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                     <div class="col-md-12 vimkim">
                                      <h4 class="customdet">Trip Details</h4>
                                      </div>
                                       
                                        <div class="form-row formtab">
                                         
                                         <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Phone Number">Vehicle Reg No</label>
                        </div>
                     </div>
                                           <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Phone Number">Vehicle Model</label>
                        </div>
                     </div>
                                       <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <input type="text" class="form-control" id="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" required autofocus >
                           <label for="Phone Number">Partner Name</label>
                        </div>
                     </div>
                     <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="return_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                              </div>
                           </div>
                           <!-- input-group -->
                           <label for="Booking Dates">Trip Start Date(Expected) </label>  
                        </div>
                     </div>
                              <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="return_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                              </div>
                           </div>
                           <!-- input-group -->
                           <label for="Booking Dates">Trip End Date(Expected) </label>  
                        </div>
                     </div>              
                      <div class="form-group col-md-4">
                        <div class="form-group has-float-label">
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="return_date">
                              <div class="input-group-append">
                                 <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                              </div>
                           </div>
                           <!-- input-group -->
                           <label for="Booking Dates">Trip End Date </label>  
                        </div>
                     </div> 
                       <div class="row" style="width: 100%;">
                           <div class="col-md-4">
                               <h4 data-toggle="modal" href="#ignismyModal">Addons</h4>
                               
                               <div class="alert alert-success alert-dismissible">
                                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                                   <div class="row">
                                       <div class="col-md-12">
                                             <label class="spare">Spare Tyre/200</label> 
                                            <i class="fa fa-check bab ret"></i>
                                       </div>
                                         <div class="col-md-12">
                                             <label class="spare">Baby Seat/200</label> 
                                             <i class="fa fa-trash bab"></i>
                                       </div>
                                        <div class="col-md-12">
                                             <label class="spare">Cup Stand/100</label> 
                                             <i class="fa fa-trash bab"></i>
                                       </div>
                                     
                                       
                                   </div>
                      
                       
                             </div>
                           </div>
                            <div class="col-md-4">
                               <h4>Extra Accessories</h4>
                           </div>
                            <div class="col-md-4">
                               <h4>Services</h4>
                           </div>
                       </div>
               
                             
                                        
                                       
                                       </div>
                                       
                                       
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<div class="col-md-12 vimkim">
                                      <h4 class="customdet">Vehicle Photos <button class="compare">Compare</button></h4>
                                      
                                      </div>
                                      <div class="col-md-12">
                                          <h2>Pre Trip Photos</h2>
                                      </div>
                                       <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
                                        <div class="form-row formtab">
                                         
                                             <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                                 <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                                 <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                             </div>
    </div>
    <div class="carousel-item">
     <div class="form-row formtab">
                                         
                                           <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                                 <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                                 <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                             </div>
                                             </div>
    </div>
    <div class="carousel-item">
          <div class="form-row formtab">
    <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                                 <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                                 <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                             </div>
                                             </div>
    </div>
    
    
    <div class="col-md-12">
                                          <h2>Post Trip Photos</h2>
                                      </div>
                                       <div id="demo1" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo1" data-slide-to="0" class="active"></li>
    <li data-target="#demo1" data-slide-to="1"></li>
    <li data-target="#demo1" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
                                        <div class="form-row formtab">
                                         
                                             <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                                 <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                                 <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                             </div>
    </div>
    <div class="carousel-item">
     <div class="form-row formtab">
                                         
                                           <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                                 <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                                 <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                             </div>
                                             </div>
    </div>
    <div class="carousel-item">
          <div class="form-row formtab">
    <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                                 <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                                 <div class="form-group col-md-4">
                                                 <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/car.jpg" class="img-responsive bg-shadow">
                                                 </div>
                                             </div>
                                             </div>
    </div>
      
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo1" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo1" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
  </div>


  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
<div class="col-md-12 vimkim">
                                      <h4 class="customdet">Customer Documents and Agreements</h4>
                                      </div>
                                    <div class="form-row formtab">
                                        <div class="col-md-12">
                                            <h4>Customer Documents</h4>
                                            <br>
                                            <label>Upload</label>
                                        </div>
                                    </div>
                                    <hr>
                                      <div class="form-row formtab">
                                        <div class="col-md-12">
                                            <h4>Customer Agreements</h4>
                                            <br>
                                            <label>Upload</label>
                                        </div>
                                         <label>Signed Document Copy Upload</label>
                                    </div>
  
  </div>
  <div class="tab-pane fade" id="partner" role="tabpanel" aria-labelledby="contact-tab">
<div class="col-md-12 vimkim">
                                      <h4 class="customdet">Pickup and Drop Vehicles</h4>
                                      </div>
                                  <section id="tabs">
		<div class="row formtab">
			<div class="col-xs-12 ">
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pickup</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Drop</a>
					
					</div>
				</nav>
				<div class="py-3 px-3 px-sm-0" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					    
						<div class="form-row formtab">
					          <div class="col-md-6">
					         <div class="col-md-12">
                                            <label class="uploadpre">Upload Pre Vehicle Condition Photos</label>
                                            <br>
                                            <label>Upload</label>
                                        </div>
                                        
					    </div>
					     <div class="col-md-6">
					        <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
    <label class="custom-control-label uploadpre" for="defaultUnchecked">Key Given <span class="namelab">by Sathish Kumar</span></label>
</div>
					    </div>
					        
					        
					    </div>
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
					</div>
					
				</div>
			
			</div>
		</div>

</section>
  
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