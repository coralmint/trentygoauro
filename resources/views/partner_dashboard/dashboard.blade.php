@extends('layouts.adminmaster')
@section('content')
<header id="topnav">
    @include('partner_dashboard.menu')
</header>
<style>
.bredim {
    background-color: #071DAA;
    padding: 2% 10% 10px;
}
.wrapper {
    padding-top: 80px;
}
</style>
<div class="wrapper">
        <!-- end page title end breadcrumb -->
        <div class="row bredim">
            <div class="col-md-4">
                <div class="card-box widget-box-two widget-two-custom">
                    <i class="mdi mdi-chart-bar widget-two-icon"></i>
                    <div class="wigdet-two-content">
                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">111--{{ Session::get('role') }}--This year</p>
                        <h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup">65841</span></h2>
                      
                    </div>
                  
                </div>
            </div><!-- end col -->

            <div class="col-md-4">
                <div class="card-box widget-box-two widget-two-primary">
                    <i class="mdi mdi-account-multiple widget-two-icon"></i>
                    <div class="wigdet-two-content">
                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Today Order</p>
                        <h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup">236521</span></h2>
                      
                    </div>
                    
                </div>
            </div><!-- end col -->

            <div class="col-md-4">
                <div class="card-box widget-box-two widget-two-success">
                    <i class="mdi mdi-cart widget-two-icon"></i>
                    <div class="wigdet-two-content">
                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Pending Order</p>
                        <h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup">563698</span></h2>
                     
                    </div>
                    
                </div>
            </div><!-- end col -->

        </div>
		<br>
    <div class="container-fluid">
		    <div class="row">
         <div class="col-lg-5">
            <div class="card-box">
               <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
               <h4 style="padding-bottom: 12px;margin-top: -2%;" class="liste">Trending Order This Month <a href="{{ url('reminder') }}" style="float: right;" class="btn btn-danger waves-effect waves-light allerr">View all</a></h4>
               
               <table id="reminderdatatable" class="table table-bordered">
                  <thead>
                     <tr>
                        <th> #</th>
                        <th> Product Name </th>
                        <th> Quantity </th>
                        
                     </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
               </table>
            </div>
         </div>
        <div class="col-lg-7">
            <div class="card-box">
                            <h4 class="header-title m-t-0">Stacked Bar Chart</h4>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="m-t-20 m-b-20">
                                            <h4 class="m-b-10">2563</h4>
                                            <p class="text-uppercase m-b-5 font-13 font-600">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="m-t-20 m-b-20">
                                            <h4 class="m-b-10">6952</h4>
                                            <p class="text-uppercase m-b-5 font-13 font-600">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="m-t-20 m-b-20">
                                            <h4 class="m-b-10">1125</h4>
                                            <p class="text-uppercase m-b-5 font-13 font-600">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="morris-bar-stacked" style="height: 320px;"></div>

                        </div>
         </div>
      </div>
	  		    <div class="row">
         <div class="col-lg-5">
                       <div class="card-box">
                            <h4 class="header-title m-t-0">Stacked Bar Chart</h4>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="m-t-20 m-b-20">
                                            <h4 class="m-b-10">2563</h4>
                                            <p class="text-uppercase m-b-5 font-13 font-600">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="m-t-20 m-b-20">
                                            <h4 class="m-b-10">6952</h4>
                                            <p class="text-uppercase m-b-5 font-13 font-600">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="m-t-20 m-b-20">
                                            <h4 class="m-b-10">1125</h4>
                                            <p class="text-uppercase m-b-5 font-13 font-600">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="morris-bar-stacked" style="height: 320px;"></div>

                        </div>
         </div>
        <div class="col-lg-7">
		 <div class="card-box">
               <input type="hidden" id="csrf_token" value="{!! csrf_token() !!}">
               <h4 style="padding-bottom: 12px;margin-top: -2%;" class="liste">Trending Order This Month <a href="{{ url('reminder') }}" style="float: right;" class="btn btn-danger waves-effect waves-light allerr">View all</a></h4>
               
               <table id="reminderdatatable" class="table table-bordered">
                  <thead>
                     <tr>
                        <th> #</th>
                        <th> Product Name </th>
                        <th> Quantity </th>
                        
                     </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
               </table>
            </div>

         </div>
      </div>
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
@include('partner_dashboard.footer')
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("a").click(function(){
    $("button").slideToggle();
  });
});
</script>