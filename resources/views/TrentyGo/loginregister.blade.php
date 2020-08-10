<!-- ======= Header ======= -->
@extends('layouts.website_master')
<link href="{{ asset('theme_files/external_files/css/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
   /* Preloader */
   #preloader {
   position: fixed;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background-color: #fff;
   /* change if the mask should have another color then white */
   z-index: 99;
   /* makes sure it stays on top */
   }
   button#submit_contact {
   padding: 10px 30px !important;
   }
   p.loremipsi {
   margin-top: 0px;
   color: #fff;
   padding: 0px;
   }
   .section-title p {
   margin-bottom: 0;
   color: #fff;
   font-size: 14px;
   margin-top: 4%;
   padding: 25% 15%;
   }
   #status {
   width: 200px;
   height: 200px;
   position: absolute;
   left: 50%;
   /* centers the loading animation horizontally one the screen */
   top: 50%;
   /* centers the loading animation vertically one the screen */
   background-image: url(https://raw.githubusercontent.com/niklausgerber/PreLoadMe/master/img/status.gif);
   /* path to your loading animation */
   background-repeat: no-repeat;
   background-position: center;
   margin: -100px 0 0 -100px;
   /* is width and height divided by two */
   }
   @media (min-width: 1768px){
   section#hero{
   background-position: center right !important;
   background-size: cover !important;
   }
   .container{
   max-width:1250px !important;
   }
   img.icomimg {
   /* width: auto; */
   /* margin: 0 auto; */
   position: absolute;
   left: 170px !important;
   top: 63px;
   }
   }
</style>
<div id="preloader">
   <div id="status">&nbsp;</div>
</div>
<header id="header" class="fixed-top">
   <div class="container d-flex">
      <div class="logo mr-auto">
         <h1 class="text-light"><a href="#hero"><img src="{{ asset('public/assets/home_screen/trenty/Logo.png') }}"></a></h1>
         <!-- Uncomment below if you prefer to use an image logo -->
         <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      <nav class="nav-menu d-none d-lg-block">
         <ul>
            <li class="active"><a href="#services">Se Connecter </a></li>
            <li><a href="#contact1">Devenir loueur</a>
            </li>
            <li><a href="#features">Des Questions?</a></li>
            <li><a href="#contact">Actualities</a></li>
            <!-- <li><a href="portal">Login</a></li>-->
         </ul>
      </nav>
      <!-- .nav-menu -->
   </div>
</header>
<!-- End Header -->
<style>
   /* fixed social*/
   #fixed-social {
   position: fixed;
   top: 200px;
   }
   a.fixed-gplus {
   margin-bottom: 10px;
   height: 65px !important;
   }
   #fixed-social a {
   color: #fff;
   display: block;
   height: 55px;
   position: relative;
   text-align: center;
   line-height: 40px;
   width: 55px;
   z-index: 2;
   padding-top: 13px;
   }
   #fixed-social a:hover>span{
   visibility: visible;
   left: 41px;
   opacity: 1;
   display:none;
   } 
   #fixed-social a span {
   line-height: 40px;
   left: 60px;
   position: absolute;
   text-align: center;
   width: 120px;
   visibility: hidden;
   transition-duration: 0.5s;
   z-index: 1;
   opacity: 0;
   }
   .fixed-facebook{
   background-color: #FFC41E;
   }
   .fixed-facebook span{
   background-color: #FFC41E;
   }
   .fixed-envelope{
   background-color: #FFC41E;
   }
   .fixed-envelope span{
   background-color: #FFC41E;
   }
   .fixed-gplus{
   background-color: #FFC41E;
   }
   .fixed-gplus span{
   background-color: #FFC41E;
   }
   .fixed-linkedin{
   background-color: #FFC41E;
   }
   .fixed-linkedin span{
   background-color: #FFC41E;
   }
   .fixed-instagrem{
   background-color: #ED2B29;
   }
   .fixed-instagrem span{
   background-color: #ED2B29;
   }
   .fixed-tumblr{
   background-color: #EB1471;
   }
   .fixed-tumblr span{
   background-color: #EB1471;
   }
   i.fa.fa-instagram {
   background-color: #fff;
   color: #ffc41e;
   padding: 10px;
   border-radius: 22px;
   font-size: 20px;
   }
   i.fa.fa-google {padding: 10px 13px;}
   i.fa.fa-facebook {
   background-color: #fff;
   color: #ffc41e;
   padding: 10px 13px;
   border-radius: 22px;
   font-size: 20px;
   }
   i.fa.fa-envelope {
   background-color: #fff;
   color: #ffc41e;
   padding: 10px;
   border-radius: 22px;
   font-size: 20px;
   }
   .encount p {
   font-size: 13px;
   padding: 0px 32px;
   }
   .impedit{
   background-color:#f2ba41 !important;
   border-color:#f2ba41 !important;
   }
   button.btn.btn-ghost {
   -webkit-box-shadow: 1px 5px 5px 0px rgba(183,183,194,1);
   -moz-box-shadow: 1px 5px 5px 0px rgba(183,183,194,1);
   box-shadow: 1px 5px 5px 0px rgba(183,183,194,1);
   margin-top: 20px;
   }
   .without select{
   background: transparent;
   border-bottom: 1px solid #fff !important;
   border: none;
   margin-top:10px;
   }
   .without select {
   color: #fff !important;
   }
   .form-control{
   border:1px solid #fff !important;
   }
   .input-group {
   -webkit-box-shadow: 0px 5px 4px 1px rgba(194,195,209,0.72);
   -moz-box-shadow: 0px 5px 4px 1px rgba(194,195,209,0.72);
   box-shadow: 0px 5px 4px 1px rgba(194,195,209,0.72);
   }
   input#partner_email {
   border: none !important;
   border-bottom: 1px solid #fff !important;
   }
   button#submit_partner {
   background-color: #d2a21d;
   font-weight: 600;
   }
   #output {
   padding: 20px;
   background: #dadada;
   }
   form {
   margin-top: 20px;
   }
   select {
   width: 300px;
   }
   .form-control:focus {
   background-color: #fff !important;
   border-color: none !important;
   }
   .services .title {
   font-weight: 600 !important;
   margin-bottom: 15px !important;
   font-size: 15px !important;
   }
   .col-lg-7.mt-5.mt-lg-0.d-flex.align-items-stretch.aos-init.aos-animate {
   padding: 0;
   background-color: #fff;
   }
   .contact .php-email-form {
   width: 100%;
   padding: 0px;
   }
   .section-title p {
   margin-bottom: 0;
   color: #ffffff;
   font-size: 14px;
   margin-top: 4%;
   padding: 0px 15%;
   }
   .form-modal{
   position:relative;
   width:100%;
   height:auto;
   margin-top:4em;
   left:50%;
   transform:translateX(-50%);
   background:#fff;
   border-top-right-radius: 20px;
   border-top-left-radius: 20px;
   border-bottom-right-radius: 20px;
   box-shadow:0 3px 20px 0px rgba(0, 0, 0, 0.1)
   }
   .form-modal button{
   cursor: pointer;
   position: relative;
   text-transform: capitalize;
   font-size:1em;
   z-index: 2;
   outline: none;
   background:#fff;
   transition:0.2s;
   }
   .form-modal .btn{
   border-radius: 20px;
   border:none;
   font-weight: bold;
   font-size:1.2em;
   padding:0.8em 1em 0.8em 1em!important;
   transition:0.5s;
   border:1px solid #ebebeb;
   margin-bottom:0.5em;
   margin-top:0.5em;
   }
   .form-modal .login , .form-modal .signup{
   background:#ffc41e;
   color:#fff;
   }
   .form-modal .login:hover , .form-modal .signup:hover{
   background:#222;
   color:#fff;
   }
   .form-toggle{
   position: relative;
   width:100%;
   height:auto;
   }
   .form-toggle button{
   width:50%;
   float:left;
   padding:1.5em;
   margin-bottom:1.5em;
   border:none;
   transition: 0.2s;
   font-size:1.1em;
   font-weight: bold;
   border-top-right-radius: 20px;
   border-top-left-radius: 20px;
   }
   .form-toggle button:nth-child(1){
   border-bottom-right-radius: 20px;
   }
   .form-toggle button:nth-child(2){
   border-bottom-left-radius: 20px;
   }
   #login-toggle{
   color:#24366e;
   }
   .form-modal form{
   position: relative;
   width:90%;
   height:auto;
   left:50%;
   transform:translateX(-50%);  
   }
   #login-form , #signup-form{
   position:relative;
   width:100%;
   height:auto;
   padding-bottom:1em;
   }
   #signup-form{
   display: none;
   }
   #login-form button , #signup-form button{
   width:100%;
   margin-top:0.5em;
   padding:0.6em;
   }
   .form-modal input{
   position: relative;
   width:100%;
   font-size:1em;
   padding:1.2em 1.7em 1.2em 1.7em;
   margin-top:0.6em;
   margin-bottom:0.6em;
   border-radius: 20px;
   border:none;
   background:#ebebeb;
   outline:none;
   font-weight: bold;
   transition:0.4s;
   }
   .form-modal input:focus , .form-modal input:active{
   transform:scaleX(1.02);
   }
   .form-modal input::-webkit-input-placeholder{
   color:#222;
   }
   .form-modal p{
   font-size:16px;
   font-weight: bold;
   }
   .form-modal p a{
   color:#57b846;
   text-decoration: none;
   transition:0.2s;
   }
   .form-modal p a:hover{
   color:#222;
   }
   .form-modal i {
   position: absolute;
   left:10%;
   top:50%;
   transform:translateX(-10%) translateY(-50%); 
   }
   .fa-google{
   color:#dd4b39;
   }
   .fa-linkedin{
   color:#3b5998;
   }
   .fa-windows{
   color:#0072c6;
   }
   .-box-sd-effect:hover{
   box-shadow: 0 4px 8px hsla(210,2%,84%,.2);
   }
   @media only screen and (max-width:500px){
   .form-modal{
   width:100%;
   }
   }
   @media only screen and (max-width:400px){
   i{
   display: none!important;
   }
   }
   /*end fixed social*/
</style>
<div id="fixed-social">
   <div>
      <a href="#" class="fixed-facebook" target="_blank"><i class="fa fa-instagram"></i> <span>Instagram</span></a>
   </div>
   <div>
      <a href="#" class="fixed-facebook" target="_blank"><i class="fa fa-facebook"></i> <span>Facebook</span></a>
   </div>
   <div>
      <a href="#" class="fixed-gplus" target="_blank"><i class="fa fa-envelope"></i> <span>Gmail</span></a>
   </div>
</div>
<!-- ======= Hero Section ======= -->
<section id="hero" style="background:url(../public/assets/home_screen/trenty/1hilles1.png);background-repeat: no-repeat;padding:0px 0px;">
   <div class="container">
      <p class="reserve">Contact</p>
   </div>
</section>
<section id="contact" class="contact section-bg">
   <div class="container">
      <div class="form-modal">
         <div class="form-toggle">
            <button id="login-toggle" onclick="toggleLogin()">log in</button>
            <button id="signup-toggle" onclick="toggleSignup()">sign up</button>
         </div>
         <div id="login-form">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
               <div class="row">
                  <div class="col-md-6">
                     <input id="email" type="email" placeholder="Enter email or username" name="email" value="{{ old('email') }}" required autofocus />
                     <input id="password" type="password" placeholder="Enter password" name="password" required/>
                     <button type="submit" class="btn login">login</button>
                  </div>
                  <hr/>
                  <div class="col-md-6">
                    <a href="{{ url('auth/google') }}">
                     <button type="button" class="btn -box-sd-effect"> <i class="fa fa-google fa-lg" aria-hidden="true"></i> sign in with google</button>
                    </a>
                     <button type="button" class="btn -box-sd-effect"> <i class="fa fa-facebook fa-lg" aria-hidden="true"></i> sign in with facebook</button>
                  </div>
               </div>
            </form>
         </div>
         <div id="signup-form">
            <form>
               <input type="text" id="customer_name" placeholder="Enter your name"/>
               <input type="text" id="customer_mobile" placeholder="Enter your mobile number" maxlength="15"/>
               <input type="email" id="customer_email" onkeyup="ValidateEmail();" placeholder="Enter your email"/>
               <span id="lblError" style="color: red"></span>
               <input type="hidden" id="vehicle_id" value="{{ $vehicle_id }}">
               <?php 
                    Session::put('reserved_vehicle_id', $vehicle_id);
                    Session::put('log_from', 'reservation');
                ?>
               <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
               <button type="button" id="customer_register" class="btn signup">create account</button>
               <p>Clicking <strong>create account</strong> means that you are agree to our <a href="javascript:void(0)">terms of services</a>.</p>
               <hr/>
               <button type="button" class="btn -box-sd-effect"> <i class="fa fa-google fa-lg" aria-hidden="true"></i> sign up with google</button>
               <button type="button" class="btn -box-sd-effect"> <i class="fa fa-linkedin fa-lg" aria-hidden="true"></i> sign up with linkedin</button>
               <button type="button" class="btn -box-sd-effect"> <i class="fa fa-windows fa-lg" aria-hidden="true"></i> sign up with microsoft</button>
            </form>
         </div>
      </div>
   </div>
</section>
<!-- End Hero -->
<!-- ======= Footer ======= -->
<footer id="footer">
   <div class="footer-top">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-6 footer-links">
               <ul>
                  <li> <a href="#">Navigation</a></li>
                  <li><a href="#services">Présentation</a></li>
                  <li> <a href="#features">Blog</a></li>
                  <li><a href="#contact1">Inscription </a></li>
               </ul>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
               <ul>
                  <li> <a href="#">Liens Utiles</a></li>
                  <li><a href="#contact">Contact</a></li>
                  <li> <a href="#">Mentions légal</a></li>
                  <li><a href="#">Déclaration relative aux cookies</a></li>
               </ul>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
               <ul>
                  <li> <a href="#">Nous suivre</a></li>
                  <li><a href="#">Facebook</a></li>
                  <li> <a href="#">Instagram</a></li>
               </ul>
            </div>
            <div class="col-lg-3 col-md-6 footer-newsletter">
               <img src="{{ asset('public/assets/home_screen/trenty/Group 594.png') }}" class="footimg">
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- End Footer -->
<a href="#" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>
<!-- Vendor JS Files -->

@section('script')
<script type="text/javascript" src="{{ URL::asset('theme_files/external_files/js/jquery-confirm.min.js') }}"></script>
<script>

   $("#customer_register").click(function(){
        var customer_name = $('#customer_name').val();
        var customer_mobile = $('#customer_mobile').val();
   		var customer_email = $('#customer_email').val();
   		var vehicle_id = $('#vehicle_id').val();
        var tempcsrf = $('#csrf_token').val();
           if((customer_name =='')||(customer_mobile =='')||(customer_email =='')){
               $.alert({
   		        title: 'Alerte!',
   		        content: "Veuillez remplir tous les champs obligatoires !!!",
   		    });
           }
           else{
               $.ajax({
             type: 'POST',
             url: '{{ url('new_customer_register') }}',
             dataType: 'json',
             data: {
                customer_name:customer_name,
                customer_mobile:customer_mobile,
   			    customer_email:customer_email,
   			    vehicle_id:vehicle_id,
                _token:tempcsrf
                 },
                   beforeSend: function () {
                   },
                   success: function (data) {
                       if(data != "failed"){
                           $.confirm({
                              title: 'Success',
                              content: 'Data submited successfully',
                              autoClose: 'logoutUser|300',
                               buttons: {
                               logoutUser: {
                                   text: 'OK',
                                   action: function () {
                                   window.location.href = "../reservationdetail/";
                                   }
                               },
                            }
                          });
                       }else{
                           $.alert({
               		        title: 'Alerte!',
               		        content: "cet identifiant de messagerie existe déjà !!!",
               		    });
                       }
     	            }
                 });
           }
       });
       $("#customer_name").keyup(function() {
           var inpObj = document.getElementById("customer_name");
           var regex = /^[A-Za-z ]+$/;
           if (regex.test(this.value) !== true)
           this.value = this.value.replace(/[^A-Za-z +-.,]+/, '');
       });
       $("#customer_mobile").keyup(function() {
           var inpObj = document.getElementById("customer_mobile");
           var regex = /^[0-9 +.,]+$/;
           if (regex.test(this.value) !== true)
           this.value = this.value.replace(/[^0-9 +.,]+/, '');
           
         });
         
        function ValidateEmail() {
           var email = document.getElementById("customer_email").value;
           var lblError = document.getElementById("lblError");
           lblError.innerHTML = "";
           var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
           if (!expr.test(email)) {
               lblError.innerHTML = "Adresse e-mail invalide.";
           }
        }
       
       
       
       $("#submit_contact").click(function(){
           var form_name = $('#form_name').val();
           var form_com_name = $('#form_com_name').val();
   		var form_email = $('#form_email').val();
   		var form_phone_no = $('#form_phone_no').val();
   		var form_massage = $('#form_massage').val();
           var num1 = parseInt($('#num1').val(), 10);
           var num2 = parseInt($('#num2').val(), 10);
           var captcha_val = num1+num2;
           var captcha = $('#captcha').val();
           var tempcsrf = $('#csrf_token').val();
           if((form_email =='') || (captcha =='')){
               $.alert({
   		        title: 'Alert!',
   		        content: "Please fill all mandatory fields !!!",
   		    });
           }else if(captcha_val == captcha){
               $.ajax({
             type: 'POST',
             url: '{{ url('add_contact_details') }}',
             dataType: 'json',
             data: {
                   form_name:form_name,
                   form_com_name:form_com_name,
   			    form_email:form_email,
   			    form_phone_no:form_phone_no,
   			    form_massage:form_massage,
   			    num1 : num1,
                   num2 : num2,
                   captcha : captcha,
                   _token:tempcsrf
                 },
                   beforeSend: function () {
                   },
                   success: function (data) {
                       location.reload();
     	            }
                 });
           }else{
               $.alert({
   		        title: 'Alert!',
   		        content: "Check your captcha value !!!",
   		    });
           }
       });
        $("#form_name").keyup(function() {
           var inpObj = document.getElementById("form_name");
           var regex = /^[A-Za-z ]+$/;
           if (regex.test(this.value) !== true)
           this.value = this.value.replace(/[^A-Za-z +-.,]+/, '');
           if (!inpObj.checkValidity()) {
           document.getElementById("demo").innerHTML = inpObj.validationMessage;
           }
       });
        $("#form_com_name").keyup(function() {
           var inpObj = document.getElementById("form_com_name");
           var regex = /^[A-Za-z ]+$/;
           if (regex.test(this.value) !== true)
           this.value = this.value.replace(/[^A-Za-z +-.,]+/, '');
           if (!inpObj.checkValidity()) {
           document.getElementById("demo").innerHTML = inpObj.validationMessage;
           }
       });
       $("#form_phone_no").keyup(function() {
           var inpObj = document.getElementById("form_phone_no");
           var regex = /^[0-9 +.,]+$/;
           if (regex.test(this.value) !== true)
           this.value = this.value.replace(/[^0-9 +.,]+/, '');
           if (!inpObj.checkValidity()) {
           document.getElementById("demo").innerHTML = inpObj.validationMessage;
           }
         });
         function ValidateEmails() {
           var email = document.getElementById("form_email").value;
           var lblError1 = document.getElementById("lblError1");
           lblError1.innerHTML = "";
           var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
           if (!expr.test(email)) {
               lblError1.innerHTML = "Adresse e-mail invalide.";
           }
       }
       document.onreadystatechange = function () {
          var state = document.readyState
          if (state == 'interactive') {
       //   document.getElementById('contents').style.visibility="hidden";
          $("#contents").hide();
          } else if (state == 'complete') {
          setTimeout(function(){
           document.getElementById('interactive');
           // document.getElementById('load').style.visibility="hidden";
           $("#load").hide();
           // document.getElementById('contents').style.visibility="visible";
           $("#contents").show();
          },1000);
          }
      }
      
      $(window).on('load', function() { // makes sure the whole site is loaded 
     $('#status').fadeOut(); // will first fade out the loading animation 
     $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
     $('body').delay(350).css({'overflow':'visible'});
   });
   
   document.getElementById('output').innerHTML = location.search;
   $(".chosen-select").chosen();
     
</script>
<script>
   function toggleSignup(){
   document.getElementById("login-toggle").style.backgroundColor="#fff";
   document.getElementById("login-toggle").style.color="#222";
   document.getElementById("signup-toggle").style.backgroundColor="#fff";
   document.getElementById("signup-toggle").style.color="#24366e";
   document.getElementById("login-form").style.display="none";
   document.getElementById("signup-form").style.display="block";
   }
   
   function toggleLogin(){
   document.getElementById("login-toggle").style.backgroundColor="#ff";
   document.getElementById("login-toggle").style.color="#24366e";
   document.getElementById("signup-toggle").style.backgroundColor="#fff";
   document.getElementById("signup-toggle").style.color="#222";
   document.getElementById("signup-form").style.display="none";
   document.getElementById("login-form").style.display="block";
   }
   
</script>
@endsection