@extends('layouts.adminmaster')
<style>
   li.minad {
   float: left;
   margin: 3% 0px;
   display: block;
   padding: 0 4%;
   /* margin-bottom: 19px; */
   font-size: 16px;
   color: #fff;
   border-right: 1px solid #fff;
   }
   section.lo-12 {
   margin-top: 2%;
   }
   footer.footer {
   background-color: #e5004d;
   padding: 10px;
   color: #fff;
   font-weight: 700;
   }
   .text-center.wrapper_box.center-block {
   border: 2px solid #e5004d;
   height: 170px;
   padding: 2%;
   border-radius: 10px;
   }
   h4.font-type-4.fo_15px {
   font-weight: 700;
   color: #000;
   }
   ul.reil {
   display: block;
   margin: 0 auto;
   /* width: 65%; */
   }
   ul.lorim {
   padding-left: 15px;
   }
   h1.estate {
   font-size: 45px;
   }
   p.estate1 {
   font-size: 26px;
   margin-bottom: 0px;
   font-weight: 200;
   }
   p.estate2 {
   font-size: 26px;
   margin-bottom: 0px;
   font-weight: 200;
   }
   li.temporr {
   font-size: 15px;
   margin-bottom: 10px;
   }
   a.notify-item:hover{
       text-decoration:underline;
   }
 @media only screen and (max-width: 700px){
       .panel.panel-default {
    width: 100% !important;
    margin-left: 0px !important;
}
.potive{
    top:0px !important;
}
  .text-center.wrapper_box.center-block{
          margin-bottom: 15px;
  }
   }
</style>
@section('content')
<body class="">
   <section style="background-image: url('/theme_files/images/gerance-locative.jpg');background-position:top;">
        <p style="padding: 2% 0px 0px 3%">
            <a href="{{ url('logout') }}" class="notify-item" style="color: #292929; font-size: 22px; font-weight: bold;">
            <i class="mdi mdi-power"></i> <span>Logout</span></a>
        </p>
      <div class="container">
         <div class="row">
            <div class="col-md-6 potive" style="position:relative;top:130px;color: #ffffff;font-weight: bold;">
               <h1 class="estate" style="color:#000;">Change your password</h1>
               <p class="estate1" style="color:#000;">Real Estate Project, Life Project</p>
               <p class="estate2" style="color:#000;">What if you talked about yourself?</p>
            </div>
            <div class="col-md-6">
               <div class="panel panel-default" style="margin-bottom:5%;width: 420px;margin-left:25%;background-color:#fff;padding:5% 10% 5%">
                  <h2 class="text-uppercase text-center">
                     <a href="index.html" class="text-success">
                     <span><img src="http://rental.coralmint.in/theme_files/images/logo_web.png" alt="" height="80"></span>
                     </a>
                  </h2>
                  <!--<div class="panel-heading" style="font-size: 20px;font-weight: 700;    color: rgb(47, 63, 111);
                     text-align: center;">Admin Login</div>-->
                  <div class="panel-body">
                     
                        <div class="form-group">
                           <div class="row">
                              <label for="password" class="col-md-12 control-label" style="text-align: left;margin: 0 0 10px;color: #00144e;">Enter New Password</label>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <input id="password" type="password" class="form-control" style="width: 100%;" name="password" value="" required autofocus>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <label for="confirm_password" class="col-md-12 control-label" style="text-align: left;margin: 0 0 10px;color: #00144e;">Confirm Password</label>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <input id="confirm_password" type="password" class="form-control" style="width: 100%;" name="password" onChange="checkPasswordMatch();">
                                 <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
                            </div>
                        </div>
                        <div class="form-group">
                           <div class="col-md-12">
                               <input type="button" id="update_password" value="Reset Password" class="btn btn-primary loginsubmit" style="background-color: rgb(229, 0, 77);border-color: rgb(229, 0, 77);padding: 10px 15%;width: 100%;margin:5% 0 3%;">
                           </div>
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="lo-12">
      <div class="z-2 pos_abs w_100_per c_white box_t_1">
         <div class="container w_12h_px animated slidUpAnim fadeInUp">
            <div class="row">
               <div class="col-sm-3">
                  <div class="text-center wrapper_box center-block">
                     <i class="fa fa-pencil-square center-block clearfix"></i>
                     <h4 class="font-type-4 fo_15px">Maximum Choices</h4>
                     <span class="fo_13px"><span class="font-type-4">15 Lac</span> + &amp; counting. New properties <span class="font-type-4">every hour</span> to help buyers find the right home</span>
                  </div>
               </div>
               <div class="col-sm-3">
                  <div class="text-center wrapper_box center-block">
                     <i class="fa fa-shield center-block clearfix"></i>
                     <h4 class="font-type-4 fo_15px">Buyers Trust Us</h4>
                     <span class="fo_13px"><span class="font-type-4">12 million users</span> visit us every month for their buying and renting needs</span>
                  </div>
               </div>
               <div class="col-sm-3 hidden-md-down">
                  <div class="text-center wrapper_box center-block">
                     <i class="fa fa-thumbs-up center-block clearfix"></i>
                     <h4 class="font-type-4 fo_15px">Seller Prefer Us</h4>
                     <span class="fo_13px"><span class="font-type-4">27,000 new properties</span> posted daily, making us the biggest platform to sell &amp; rent properties</span>
                  </div>
               </div>
               <div class="col-sm-3 hidden-md-down">
                  <div class="text-center wrapper_box center-block">
                     <i class="fa fa-user center-block clearfix"></i>
                     <h4 class="font-type-4 fo_15px">Expert Guidance</h4>
                     <span class="fo_13px">Advice from the largest panel of <span class="font-type-4">industry experts</span> to help you make smart property decisions</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <br><br>
</body>
@include('admin_dashboard.footer')
@endsection
@section('script')

<script>
    function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#confirm_password").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Passwords do not match!");
    else
        $("#divCheckPasswordMatch").html("Passwords match.");
}
    $(document).ready(function () {
   $("#confirm_password").keyup(checkPasswordMatch);
});
    $("#update_password").click(function(){
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();
        var tempcsrf = $('#csrf_token').val();
        if( (password == '')||(confirm_password == '') ){
            $.alert({
		        title: 'Alert!',
		        content: "Enter Password Details !!!",
		    });
        }else if(password == confirm_password){
            $.ajax({
          type: 'POST',
          url: '{{ url('update_user_password') }}',
          dataType: 'json',
          data: {
              password:password,
              confirm_password:confirm_password,
              _token:tempcsrf
              },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data == "success"){
                        $.confirm({
            			    title: 'Password Updated Successfully',
            			    content: 'Use your latest password to login and view your details...',
            			    buttons: {
            			        Ok: function () {
            			        	window.location.href = "logout";
            			        },
            			    }
            			});
                    }else{
                        $.alert({
            		        title: 'Alert!',
            		        content: "User already exists !!!",
            		    });
                    }
   	            }
              });   
        }else{
            $.alert({
		        title: 'Alert!',
		        content: "Enter Valid Password !!!",
		    });
        }
    });
</script>
@endsection