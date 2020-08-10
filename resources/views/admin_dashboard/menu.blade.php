<style>
    .list-inline-item.dropdown.notification-list.john.last-elements {
        float: right !important;
        padding: 22px 0px;
    }
   .icon {
   color: #ffa91c;
   }
   .mentop{
   float: right;
   margin-top: 2%;
   }
   .custop{
   margin-top: -6.5%;
   }
   .cusnav{
   margin-top: -7%;
   }
   .dis{
   display: none;
   }
     @media only screen and (min-width: 900px) and (max-width: 3000px){
    li.dropdown.kikom {
    display: none !important;
}
}
.encodihk{
    float:right;
    padding-top:2%;
}
   @media only screen and (max-width: 600px)
   {
   .mentop{
   float: right;
   margin-top: 2%;
   }
   .custop{
   margin-top: 0%;
   }
   .cusnav{
   margin-top: 0%;
   }
   .dis{
   display: inherit;
   }
   #topnav .navbar-custom{
       padding:22px 0px;
   }

  li.has-submenu.kikom1 {
    display: none !important;
}
   .kikom{
       display:block !important;
   }
   
   .dropdown-menu > li > a {
    padding: 7px 20px;
    font-size: 14px;
    font-weight: 500;
    font-size: 15px;
    color:#313a46;
    line-height:30px;
}
.encodihk{
  display:none;
}
   }
</style>
<div class="navbar-custom">
   <div class="container-fluid">
      <!-- Logo container-->
      <div class="logo">
         <a href="{{ url('home') }}" class="logo">
         <img src="{{ asset('theme_files/images/trentygo_logo.jpeg') }}" alt="" height="50"  class="logo-lg" style="padding: 10px;">
         </a>
      </div>
      <!-- End Logo container-->
      <div id="navigation" style="margin-top: -6%;">
         <!-- Navigation Menu-->
         <ul class="navigation-menu" style="margin: 1%;">
            <!--<li class="has-submenu">
               <a href="{{ url('dashboard') }}"><i class=" mdi mdi-view-dashboard"></i>Dashboard</a>
            </li>-->
            <li class="has-submenu">
               <a href="{{ url('partner_list') }}"><i class="mdi mdi-account-multiple "></i>Manage Partner</a>
            </li>
            <li class="has-submenu">
               <a href="{{ url('reservationlist') }}"><i class="mdi mdi-account-multiple "></i>Reservations</a>
            </li>
            <li class="has-submenu">
               <a href="{{ url('viewmessage') }}"><i class="mdi mdi-account-multiple "></i>Partner Messages</a>
            </li>
            <li class="has-submenu kikom1">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label"><i class="fa fa-cog"></i>&nbsp;&nbsp;Settings</span> <span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a href="{{ url('master_table') }}"><i class="mdi mdi-account-multiple ">&nbsp;&nbsp;</i>Master Table</a></li>
                  <li><a href="{{ url('upload_setting_images') }}"><i class="mdi mdi-account-multiple ">&nbsp;&nbsp;</i>Option Images</a></li>
               </ul>
            </li>
            
            <!--<li class="has-submenu">-->
            <!--   <a href="{{ url('user_list') }}"><i class="mdi mdi-account-multiple ">&nbsp;&nbsp;</i>User management</a>-->
            <!--</li>-->
            <!--<li class="has-submenu">-->
            <!--   <a href="{{ url('partner_list') }}"><i class="mdi mdi-account-multiple ">&nbsp;&nbsp;</i>Partner management</a>-->
            <!--</li>-->
            <!--<li class="has-submenu kikom1">-->
            <!--   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label"><i class="dripicons-music icon"></i>&nbsp;&nbsp;Reservation</span> <span class="caret"></span></a>-->
            <!--   <ul class="dropdown-menu">-->
            <!--      <li><a href="{{ url('reservation_list') }}"><i class="mdi mdi-account-multiple ">&nbsp;&nbsp;</i>Reservation management</a></li>-->
            <!--      <li><a href="{{ url('trip_list') }}"><i class="mdi mdi-account-multiple ">&nbsp;&nbsp;</i>Trip management</a></li>-->
            <!--   </ul>-->
            <!--</li>-->
            <!--<li class="has-submenu">-->
            <!--   <a href="{{ url('report') }}"><i class="mdi mdi-account-multiple "></i>Report</a>-->
            <!--</li>-->
             <li class="list-inline-item dropdown notification-list john">
               <a class="nav-link dropdown-toggle waves-effect waves-light nav-user welcomim" data-toggle="dropdown" href="#" role="button"
                  aria-haspopup="false" aria-expanded="false">
               <img src="{{ asset('theme_files/images/users/Avatar.png') }}" alt="user" class="rounded-circle">
               </a>
               <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                   
                  <div class="dropdown-item noti-title">
                     <h5 class="text-overflow"><small><center>Admin</center></small> </h5>
                  </div>
                 
                  <!--<a href="{{ url('admin_profile') }}" class="dropdown-item notify-item">-->
                  <!--<i class="mdi mdi-account-circle"></i> <span>Profile</span>-->
                  <!--</a>-->
                 
                  <!--<a href="javascript:void(0);" class="dropdown-item notify-item">-->
                  <!--<i class="mdi mdi-settings"></i> <span>Settings</span>-->
                  <!--</a>-->
                 
                  <!--<a href="javascript:void(0);" class="dropdown-item notify-item">-->
                  <!--<i class="mdi mdi-lock-open"></i> <span>Lock Screen</span>-->
                  <!--</a>-->
                 
                  <a href="{{ url('logout') }}" class="dropdown-item notify-item">
                  <i class="mdi mdi-power"></i> <span>Logout</span>
                  </a>
               </div>
            </li>
         </ul>
         <!-- End navigation menu -->
      </div>
      <!-- end #navigation -->
   </div>
   <!-- end container -->
</div>
<!-- end navbar-custom -->