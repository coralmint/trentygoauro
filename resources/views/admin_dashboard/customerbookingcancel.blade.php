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
.form-row.formtab {
    padding: 0px 15px;
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
</style>
<div class="wrapper">
    
    <div class="container-fluid">
    <div class="row">
       
        
        <div class="col-md-12">
             <div class="col-md-12">
           <h2 class="">Cancellation Form</h2> 
            
        </div>
            <div class="pauim">
          <h3 class="detailbook">Personal Details</h3>  
           <div class="form-row formtab">
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                             <label for="vehicle Model">Name</label>
                          <div class="namelabel">Vinoth</div>
                          
                        </div>
                     </div>
                    
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                             <label for="Vehicle Color">Phone</label>
                            <div class="namelabel">985648756</div>
                          
                        </div>
                     </div>
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                             <label for="Vehicle Color">Email</label>
                            <div class="namelabel">vinoth@coralmint.in</div>
                          
                        </div>
                     </div>
                      <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                            <label for="Location">Address</label>
                             <div class="namelabel">NO:4, Kamarajar Street,Pondicherry-605004</div>
                           
                        </div>
                     </div>
                    
                   
                  </div>
                  <h3 class="detailbook">Reservation Details</h3>  
           <div class="form-row formtab">
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                             <label for="vehicle Model">Reservation Id</label>
                          <div class="namelabel">12345</div>
                          
                        </div>
                     </div>
                    
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                             <label for="Vehicle Color">Partner Name</label>
                            <div class="namelabel">Vicky</div>
                          
                        </div>
                     </div>
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                             <label for="Vehicle Color">Reservation Date</label>
                            <div class="namelabel">16-7-2020</div>
                          
                        </div>
                     </div>
                   
                     
                    
                   
                  </div>
                    <h3 class="detailbook">Payment Details</h3>  
           <div class="form-row formtab">
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                             <label for="vehicle Model">Reservation Via</label>
                          <div class="namelabel">Online/Walkin</div>
                          
                        </div>
                     </div>
                    
                     <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                             <label for="Vehicle Color">Reservation Amount</label>
                            <div class="namelabel">1254</div>
                          
                        </div>
                     </div>
                   
                      <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                            <label for="Location">Date</label>
                             <div class="namelabel">12-7-2020,14-7-2020</div>
                           
                        </div>
                     </div>
                      <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                            <label for="Location">Paid Amount</label>
                             <div class="namelabel">2343</div>
                           
                        </div>
                     </div>
                    
                     
                    
                   
                  </div>
                  <div class="form-row">
                       <div class="form-group col-md-3">
                        <div class="form-group has-float-label">
                          
                            <div class="namelabel1">2 Days Go to trip</div>
                           
                        </div>
                     </div>
                      <div class="form-group col-md-3">
                  <div class="warnbtn"> <button id="btnFA" class="btn btn-warning">
		Download Invoice
			<i class="fa fa-download"></i>
		</button></div>
		</div>
                  </div>
                  
		
		 <div class="" style="padding:30px;">
                 <div class="form-row">
                     <div class="col-md-12">
                           <label for="vehicle Model">Terms and Condition</label>
                           <p>
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                           </p>
                     </div>
                     <div class="form-group col-md-6">
           <div class="form-group has-float-label">
                <label for="vehicle Model">Cancellation Reason Description</label>
                          <textarea class="description" name="" style="width:100%;"></textarea>
                          </div>
                        </div>
                          <div class="form-group col-md-6">
                        <div class="form-group has-float-label">
                             <label for="Location">Expected Refund Amount</label>
                           <input type="text" class="form-control" id="last_name" value="" onfocus="this.placeholder = ''" required autofocus >
                          
                        </div>
                     </div>
                 </div>
                   <div class="col-md-12"><label for="vehicle1"><input type="checkbox" checked="" id="content_same" name="vehicle1"> Accepts this terms and condition</label></div>
                   
                      <div class="form-group col-md-12">
                        <div class="form-row formtab">
                     <div class="form-group" style=" margin: 0 auto 18px;
    display: block;    width: 100%;   ">
                        <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                        <input type="hidden" value="" id="reservation_id">
                        <button type="button" class="btn btn-primary waves-effect waves-light" id="add_cus_details" style="    background-color: #ffa91c !important;
    border: none !important;      width: 25%;
    margin: 0 auto;
    display: block;  ">Pay Refund</button>
                    </div>
                     </div>
                  </div>
           
        </div>
		
		
                 
        </div>
        </div>
        <div class="col-md-3" style="margin-top:3.5%;">
             
           
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