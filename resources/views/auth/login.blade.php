@extends('layouts.app')
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
    padding: 15px;
    color: #fff;
    font-weight: 700;
    margin-top: -4%;
}
.text-center.wrapper_box.center-block {
    border: 2px solid #e5004d;
    height: 130px;
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
@media only screen and (max-width: 700px){
 .panel.panel-default {
    width: 100% !important;
    margin-left: 0px !important;
    padding: 13px;
}
.text-center.wrapper_box.center-block{
    margin-bottom:15px;
}
.potive{
    top:0px !important;
}
.helop {
    width: 100% !important;
    margin: 0px !important;
    /* padding: 10px; */
}
.vikim{
    padding:10px;
}
}
</style>
@section('content')

<body class="bg-accpunt-pages" style="height: 100%;">
        <section style="background-image: url('theme_files/images/login_bg.jpeg');background-position:top;height: 100%;background-repeat: no-repeat;
    background-size: cover; overflow: hidden;">
            <div class="container">
    <div class="row" style="margin-top: 8%;">

             <div class="col-md-6 potive" style="position:relative;top:130px;color: #ffffff;font-weight: bold;">
            
            <!-- <h1 class="estate">Login to admin</h1>
            <p class="estate1">Real Estate Project, Life Project</p>
<p class="estate2">What if you talked about yourself?</p> -->
</div>
        <div class="col-md-6 vikim">
            <div class="panel panel-default" style="margin-top: 4%;width: 420px;margin-left:25%;">
                    <h2 class="text-uppercase text-center">
                        <a href="index.html" class="text-success">
                            <span><img src="theme_files/images/trentygo_logo.jpeg" alt="" height="80"></span>
                        </a>
                    </h2>
                <!--<div class="panel-heading" style="font-size: 20px;font-weight: 700;    color: rgb(47, 63, 111);
    text-align: center;">Admin Login</div>-->
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="row">
                            <label for="email" class="col-md-12 control-label" style="text-align: left;margin: 0 10% 10px;color: #00144e;">E-Mail Address</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control helop" style="width: 335px;margin: 0 10%;" name="email" value="{{ old('email') }}" required autofocus>
    
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="row">
                                <label for="password" class="col-md-12 control-label" style="text-align: left;margin: 0 10% 10px;color: #00144e;">Password</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <input id="password" type="password" class="form-control helop" style="width: 335px;margin: 0 10%;" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12" style="margin: 0 8% 10px;color: #f37022;">
                                <div class="checkbox">
                                    <label style="color: rgb(229, 0, 77);">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="margin-left: 12%;color: #00144e;">
                                    Forgot Your Password?</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary loginsubmit" style="background-color: #e5004d;border-color: #e5004d;padding: 10px 15%;width: 100%;">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     
       <!-- <div class="col-md-12">
            <ul class="reil" style="display: block;
    margin: 0 auto;
    /* width: 65%; */">
                <li class="minad" style="float: left;
   margin: 0% 0px 15px;
    display: block;
    padding: 0 4%;
   
    font-size: 16px;
    color: #fff;
    border-right: 1px solid #fff;">Project</li>
                <li class="minad" style="float: left;
   margin: 0% 0px 15px;
    display: block;
    padding: 0 4%;
  
    font-size: 16px;
    color: #fff;
    border-right: 1px solid #fff;">Estate</li>
                <li class="minad" style="float: left;
   margin: 0% 0px 15px;
    display: block;
    padding: 0 4%;
   
    font-size: 16px;
    color: #fff;
    border-right: 1px solid #fff;">Life</li>
                <li class="minad" style="float: left;
   margin: 0% 0px 15px;
    display: block;
    padding: 0 4%;
   
    font-size: 16px;
    color: #fff;
    border-right: 1px solid #fff;">Admin</li>
                <li class="minad" style="float: left;
   margin: 0% 0px 15px;
    display: block;
    padding: 0 4%;
  
    font-size: 16px;
    color: #fff;
    border-right: 1px solid #fff;">Talked</li>
                <li class="minad" style="float: left;
   margin: 0% 0px 15px;
    display: block;
    padding: 0 4%;
   
    font-size: 16px;
    color: #fff;
    border-right: 1px solid #fff;">User</li>
                <li class="minad" style="float: left;
   margin: 0% 0px 15px;
    display: block;
    padding: 0 4%;
   
    font-size: 16px;
    color: #fff;
    border-right: 1px solid #fff;">Buy</li>
                <li class="minad" style="float: left;
    margin: 0% 0px 15px;
    display: block;
    padding: 0 4%;
  
    font-size: 16px;
    color: #fff;
   ">Rent</li>
            </ul>
        </div>-->
    </div>
</div>
        
        </section>

        <!-- <section class="yourself" style="margin-top:2%;">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-7">
                        <h1 class="importi" style="color: rgb(229, 0, 77)">Important Notices</h1>  
                        <br>
            <ul class="lorim">
                <li class="temporr" style="list-style: decimal;padding-left:18px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                  <li class="temporr" style="list-style: decimal;padding-left:18px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                    <li class="temporr" style="list-style: decimal;padding-left:18px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li> 
                     <li class="temporr" style="list-style: decimal;padding-left:18px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                 
              
                            
            </ul>
                    </div>
                      <div class="col-md-5">
                        <img src="/theme_files/images/rent_vs_buy.jpg" alt="" class="img-responsive">
                    </div>
                  
                </div>
            </div>
         
        </section> -->
   <!--      <section class="lo-12">
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
	<i class="fa-shield center-block clearfix"></i>
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
</div> -->
       <!--  </section>
            <section class="yourself" style="margin-top:2%;">
            <div class="container">
                <div class="row">
                      <div class="col-md-6">
                        <img src="/theme_files/images/home-buying2-1.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                        <h1 class="importi" style="color: rgb(229, 0, 77)">Important Notices</h1>  
                        <br>
            <ul class="lorim">
                <li class="temporr" style="list-style: decimal;padding-left:18px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                  <li class="temporr" style="list-style: decimal;padding-left:18px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                    <li class="temporr" style="list-style: decimal;padding-left:18px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li> 
                     <li class="temporr" style="list-style: decimal;padding-left:18px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                 
              
                            
            </ul>
                    </div>
                    
                  
                </div>
            </div>
         
        </section> -->
<br><br>
</body>
@endsection
