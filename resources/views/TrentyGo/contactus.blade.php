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
    color: #fff !important;
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
<section id="hero" style="background:url(public/assets/home_screen/trenty/1hilles1.png);background-repeat: no-repeat;padding:0px 0px;">
   <div class="container">
        <p class="reserve">Contact</p>
      
   </div>
</section>
 <section id="contact" class="contact section-bg">
      <div class="container">
         
         <div class="row backcolor">
              <div class="col-lg-5 mt-5 mt-lg-0 d-flex align-items-stretch markim" data-aos="fade-left">
                  <div class="section-title" data-aos="fade-up">
            
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis bibendum fringilla semper. Donec egestas nisl enim, qui
               molestie ullamcorper. Donec fermentum, quam at pulvinar luctus, neque ante porta augue, eu bibendum ipsum quam ...
            </p>
         </div>
              </div>
            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-left">
               <form action="" method="post" role="form" class="php-email-form">
                  <div class="form-row">
                     <div class="form-group col-md-6 contwith">
                        <input type="text" name="name" placeholder="Nom" class="form-control mesg" id="form_name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        <div class="validate"></div>
                     </div>
                     <div class="form-group col-md-6 contwith">
                        <input type="" class="form-control mesg" placeholder="Entreprise" name="" id="form_com_name" data-rule="" data-msg="Please enter a valid email" />
                        <div class="validate"></div>
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-6 contwith">
                        <input type="text" name="name" placeholder="Téléphone" class="form-control mesg" id="form_phone_no" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        <div class="validate"></div>
                     </div>
                     <div class="form-group col-md-6 contwith">
                        <input type="email" placeholder="Adresse e-mail" class="form-control mesg" onkeyup="ValidateEmails();" name="email" id="form_email" data-rule="email" data-msg="Please enter a valid email" />
                        <div class="validate"></div>
                        <span id="lblError1" style="color: red"></span>
                     </div>
                  </div>
                  <div class="form-group contwith">
                     <textarea class="form-control mesg" placeholder="Message" name="message" id="form_massage" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                     <div class="validate"></div>
                  </div>
                  <div class="form-row">
                     <div class="col-md-8 encount"><p>En soumettant ce formulaire, j’accepte que mes informations soient utilisées exclusivement dans le cadre de 
                        ma demande et de la relation commerciale éthique et personnalisée qui pourrait en découler si je le 
                        souhaite.</p>
                     </div>
                     <div class="col-md-4">
                        <!--10+2=<span class="vim"></span>-->
                        <input style="width: 25px; text-align: center;" id="num1" class="sum" type="text" name="num1" value="<?php echo rand(1,4) ?>" readonly="readonly" /> +
                        <input style="width: 25px; text-align: center;" id="num2" class="sum" type="text" name="num2" value="<?php echo rand(5,9) ?>" readonly="readonly" /> =
                        <input style="width: 25px; text-align: center;" id="captcha" class="captcha" type="text" name="captcha" maxlength="2" />
                        <span style="font-size: 12px;" id="spambot">(Are you human, or spambot?)</span>
                     </div>
                  </div>
                  <!--<div class="mb-3">-->
                  <!--   <div class="loading">Loading</div>-->
                  <!--   <div class="error-message"></div>-->
                  <!--   <div class="sent-message">Your message has been sent. Thank you!</div>-->
                  <!--</div>-->
                  <div class="form-row">
                     <div class="form-group col-md-9 contwith">
                        <p class="poli1"><input type="checkbox" required name="terms" style="float:left;">&nbsp;&nbsp;&nbsp;Oui j'accepte ! 
                        <p>
                     </div>
                     <div class="form-group col-md-3">
                        <div class="text-center"><button type="submit" class="envoy" id="submit_contact">Envoyer</button></div>
                     </div>
               </form>
               </div>
               </form>
            </div>
         </div>
      </div>
   </section>
<!-- End Hero -->
<main id="main">

   <!-- ======= Contact Section ======= -->
   <section id="contact1" class="contact section-bg" style="background-color:#14b3b9;">
      <div class="container">
      <div class="section-title" data-aos="fade-up">
         <h2 class="insri">Newsletter
           
         </h2>
         <p class="loremipsi">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
      <div class="row">
         <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-left">
            <form role="form" class="php-email-form" style="background-color:transparent;border:none;">
               <div class="form-row">
                 
                  <div class="form-group col-md-10 without">
                     <input type="text" class="form-control" name="email" onkeyup="ValidateEmail();" placeholder= "Adresse mail" id="partner_email" data-rule="email" data-msg="Please enter a valid email" />
                     <div class="validate"></div>
                     <span id="lblError" style="color: red"></span>
                  </div>
                    
                  <div class="form-group col-md-2">
                      <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
                        <div class="text-center">
                            <button type="submit" class="envoy" id="submit_partner">Envoyer</button>
                            <!--<input type="button" class="envoy" id="submit_partner" value="Suivant" />-->
                        </div>
                  </div>
               </div>
            
            
               <!--<div class="mb-3">-->
               <!--   <div class="loading">Loading</div>-->
               <!--   <div class="error-message"></div>-->
               <!--   <div class="sent-message">Your message has been sent. Thank you!</div>-->
               <!--</div>-->
              
                
               
            </form>
            </div>
         </div>
      </div>
   </section>
   <!-- End Contact Section -->
 
</main>
<!-- End #main -->
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

$("#submit_partner").click(function(){
        var company_name = $('#company_name').val();
        var partner_email = $('#partner_email').val();
		var no_vehicles = $('#no_vehicles').val();
		var phone_no = $('#phone_no').val();
		var partner_location = $('#partner_location').val();
		var partner_type = $('#partner_type').val();
        var tempcsrf = $('#csrf_token').val();
        if((partner_email =='')||(company_name =='')||(no_vehicles =='')||(phone_no =='')||(partner_location =='')){
            $.alert({
		        title: 'Alerte!',
		        content: "Veuillez remplir tous les champs obligatoires !!!",
		    });
        }
        // else if{
        //     $("#partner_email").keyup(function() {
        //     var inpObj = document.getElementById("partner_email");
        //     var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        //     if (regex.test(this.value) !== true)
        //     this.value = this.value.replace(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/, '');
        //     if (!inpObj.checkValidity()) {
        //     document.getElementById("demo").innerHTML = inpObj.validationMessage;
        //     }
        //   });
        // }
        else{
            $.ajax({
          type: 'POST',
          url: '{{ url('add_partner_details') }}',
          dataType: 'json',
          data: {
              company_name:company_name,
              partner_email:partner_email,
			  no_vehicles:no_vehicles,
			  phone_no:phone_no,
			  partner_location:partner_location,
			  partner_type:partner_type,
              _token:tempcsrf
              },
                beforeSend: function () {
                },
                success: function (data) {
                    if(data == "success"){
                        location.reload();
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
    $("#com_name").keyup(function() {
        var inpObj = document.getElementById("com_name");
        var regex = /^[A-Za-z ]+$/;
        if (regex.test(this.value) !== true)
        this.value = this.value.replace(/[^A-Za-z +-.,]+/, '');
        if (!inpObj.checkValidity()) {
        document.getElementById("demo").innerHTML = inpObj.validationMessage;
        }
    });
    $("#no_vehicles").keyup(function() {
        var inpObj = document.getElementById("no_vehicles");
        var regex = /^[0-9 +.,]+$/;
        if (regex.test(this.value) !== true)
        this.value = this.value.replace(/[^0-9 +.,]+/, '');
        if (!inpObj.checkValidity()) {
        document.getElementById("demo").innerHTML = inpObj.validationMessage;
        }
      });
    $("#phone_no").keyup(function() {
        var inpObj = document.getElementById("phone_no");
        var regex = /^[0-9 +.,]+$/;
        if (regex.test(this.value) !== true)
        this.value = this.value.replace(/[^0-9 +.,]+/, '');
        if (!inpObj.checkValidity()) {
        document.getElementById("demo").innerHTML = inpObj.validationMessage;
        }
      });
      
      function ValidateEmail() {
        var email = document.getElementById("partner_email").value;
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
       document.getElementById('contents').style.visibility="hidden";
       } else if (state == 'complete') {
       setTimeout(function(){
        document.getElementById('interactive');
        document.getElementById('load').style.visibility="hidden";
        document.getElementById('contents').style.visibility="visible";
       },1000);
       }
   }
   
   $(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').fadeOut(); // will first fade out the loading animation 
  $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(350).css({'overflow':'visible'});
})

document.getElementById('output').innerHTML = location.search;
$(".chosen-select").chosen();
  </script>

@endsection