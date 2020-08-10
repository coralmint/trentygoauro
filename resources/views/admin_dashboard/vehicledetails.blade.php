@extends('layouts.adminmaster')
@section('content')
<header id="topnav">
    @include('admin_dashboard.menu')
</header>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
    font-size:14px;
}
.nav-pills .nav-link.active {
    background-color: #12b3b6;
}
  i.fa.fa-upload {
   color: #000;
   font-size: 20px;
   }
   i.fa.fa-download {
   color: green;
   font-size: 20px;
   }
   @media (min-width: 768px) {

    /* show 3 items */
    .carousel-inner .active,
    .carousel-inner .active + .carousel-item,
    .carousel-inner .active + .carousel-item + .carousel-item,
    .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item  {
        display: block;
    }
    
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item,
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item,
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item {
        transition: none;
    }
    
    .carousel-inner .carousel-item-next,
    .carousel-inner .carousel-item-prev {
      position: relative;
      transform: translate3d(0, 0, 0);
    }
    
    .carousel-inner .active.carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -25%;
        z-index: -1;
        display: block;
        visibility: visible;
    }
    
    /* left or forward direction */
    .active.carousel-item-left + .carousel-item-next.carousel-item-left,
    .carousel-item-next.carousel-item-left + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    
    /* farthest right hidden item must be abso position for animations */
    .carousel-inner .carousel-item-prev.carousel-item-right {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        display: block;
        visibility: visible;
    }
    
    /* right or prev direction */
    .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
    .carousel-item-prev.carousel-item-right + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }

}

 /* Bootstrap Lightbox using Modal */

#profile-grid { overflow: auto; white-space: normal; } 
#profile-grid .profile { padding-bottom: 40px; }
#profile-grid .panel { padding: 0 }
#profile-grid .panel-body { padding: 15px }
#profile-grid .profile-name { font-weight: bold; }
#profile-grid .thumbnail {margin-bottom:6px;}
#profile-grid .panel-thumbnail { overflow: hidden; }
#profile-grid .img-rounded { border-radius: 4px 4px 0 0;}
div#carouselExample {
    padding: 5% 0px;
}
.iconfa {
    font-size: 20px;
    margin-right: 10px;
}
</style>
<div class="wrapper">
    <div class="container-fluid">
     <div class="row">
    <div class="col-md-3 mb-3">
        <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-info-circle iconfa" aria-hidden="true"></i>Basic Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-money iconfa" aria-hidden="true"></i>Rates and Availability</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-file-text iconfa" aria-hidden="true"></i>Documents</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-picture-o iconfa" aria-hidden="true"></i>Images</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#addon" role="tab" aria-controls="addon" aria-selected="false"><i class="fa fa-plus iconfa" aria-hidden="true"></i>Addon Features</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#vechileview" role="tab" aria-controls="vechileview" aria-selected="false"><i class="fa fa-history iconfa" aria-hidden="true"></i>Trip History</a>
  </li>

</ul>
    </div>
    <!-- /.col-md-4 -->
        <div class="col-md-9">
      <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                     <div class="col-md-12 vimkim">
                                      <h4 class="customdet">Customer Details</h4>
                                      </div>
                                        <div class="form-row formtab">
                                        
                                          <div class="form-group col-md-6">
                                             <label>Vechile Model name</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vechile Model name" id="color_name" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Vechile Brand</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vechile Brand" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Vechile Number</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vechile Number" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Vechile Type</label>
                                            <select class="form-control" id="status">
                        <option value="">Select Type</option>
                      
                        <option value="1">AC Car</option>
                        <option value="2">Non AC Car</option>
                        
                     </select>          
                                          </div>
                                           <div class="form-group col-md-6">
                                             <label>Vechile condition</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vechile condition" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Vechile Maximum Speed</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Vechile Maximum Speed" id="color_name" />             
                                          </div>
                                               <div class="form-group col-md-6">
                                             <label>Total Running K.M</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Total Running K.M" id="color_name" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Registration Year</label>
                                             <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-multiple-date">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div><!-- input-group -->      
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Seat Type</label>
                                            <select class="form-control" id="status">
                        <option value="">Normal</option>
                        <!--<option value="">None</option>-->
                        <option value="1">Bussiness Class</option>
                        <option value="2">convinent Seat</option>
                        <option value="3">All Home Seat</option>
                     </select>     
                                          </div>
                                            <div class="form-group col-md-6">
                                             <label>Seat Count</label>
                                           <select class="form-control" id="status">
                        <option value="">3-1</option>
                        <!--<option value="">None</option>-->
                        <option value="1">4-1</option>
                        <option value="2">5-1</option>
                        <option value="3">7-1</option>
                     </select>     
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Vechile Status</label>
                                            <select class="form-control" id="status">
                        <option value="">Available</option>
                        <option value="1">Not Available</option>
                        
                     </select>       
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
                                      <h4 class="customdet">Rate and Availablity</h4>
                                      </div>
                                        <div class="form-row formtab">
                                        
                                          <div class="form-group col-md-12">
                                             <label>Rate and Availablity</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="https://mail.zoho.com/zm/#mail/folder/inbox/p/1589947812763110001" id="color_name" />             
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
                                      <h4 class="customdet">Images</h4>
                                      </div>
                                       <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            <div class="carousel-item col-md-3  active">
               <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 1" class="thumb">
                      <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=1" alt="slide 1">
                    </a>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
               <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 3" class="thumb">
                     <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=2" alt="slide 2">
                    </a>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
               <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 4" class="thumb">
                     <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=3" alt="slide 3">
                    </a>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
                <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 5" class="thumb">
                     <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=4" alt="slide 4">
                    </a>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
              <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 6" class="thumb">
                      <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=5" alt="slide 5">
                    </a>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
               <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 7" class="thumb">
                      <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=6" alt="slide 6">
                    </a>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
               <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 8" class="thumb">
                      <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=7" alt="slide 7">
                    </a>
                  </div>
                </div>
            </div>
             <div class="carousel-item col-md-3  ">
                <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 2" class="thumb">
                     <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=8" alt="slide 8">
                    </a>
                  </div>
                  
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
                                       
  
  </div>
  
  <div class="tab-pane fade" id="addon" role="tabpanel" aria-labelledby="contact-tab">
<div class="col-md-12 vimkim">
                                      <h4 class="customdet">Add on Features</h4>
                                      </div>
                                        <div class="form-row formtab">
                                        
                                          <div class="form-group col-md-6">
                                             <label>Baby Sitting</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Baby Sitting" id="color_name" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Car Bumper</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Car Bumper" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Sofa Mathess/Air Bed Cusion</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Sofa Mathess/Air Bed Cusion" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Sun Shadow</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Sun Shadow" id="color_code" />             
                                          </div>
                                           <div class="form-group col-md-6">
                                             <label>Portable Findge</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Portable Findge" id="color_code" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Finst</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Finst" id="color_name" />             
                                          </div>
                                               <div class="form-group col-md-6">
                                             <label>Air Purifier</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Air Purifier" id="color_name" />             
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Poitronics</label>
                                             <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="Poitronics" id="color_name" />             
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
  
  <div class="tab-pane fade" id="vechileview" role="tabpanel" aria-labelledby="contact-tab">
<div class="col-md-12 vimkim">
                                      <h4 class="customdet">Trip History</h4>
                                      </div>
                                        <table class="table table-bordered dataTable no-footer mobile-table" id="partner_list_datatable" style="table-layout:fixed; width: 100%;">
                                                   <thead>
                                                      <tr>
                                                         <!--<th>No</th>-->
                                                         <th>S No</th>
                                                         <th>Vehicle Name</th>
                                                         <th>Vehicle Type</th>
                                                         <th>Vehicle Number</th>
                                                         <th>No of Seats</th>
                                                         <th>Action</th>
                                                      </tr>
                                                   </thead>
                                                  
                                                </table>
  
  </div>
  
  <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="contact-tab">
      
     <div class="col-md-12 vimkim">
                                      <h4 class="customdet">Documents</h4>
                                      </div>
                                        <div class="form-row formtab">
                                    <div class="form-group col-md-3">
                                       <label>Upload Certificate</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="abc.jpg" id="color_name" />             
                                    </div>
                                    <div class="form-group col-md-3">
                                       <div class="form-row">
                                          <div class="col-md-2">
                                             <i class="fa fa-upload"></i>
                                          </div>
                                        
                                       </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                       <label>Download FC</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="xyz.jpg" id="color_code" />             
                                    </div>
                                    <div class="form-group col-md-3">
                                       <div class="form-row">
                                         
                                          <div class="col-md-2">
                                             <i class="fa fa-download"></i>  
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                       <label>Download Registration Certificate</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <input data-parsley-type="number" type="text" class="form-control tribut" maxlength="10" required placeholder="xyz.jpg" id="color_code" />             
                                    </div>
                                    <div class="form-group col-md-3">
                                       <div class="form-row">
                                        
                                          <div class="col-md-2">
                                             <i class="fa fa-download"></i>  
                                          </div>
                                       </div>
                                    </div>
                                 </div>
  </div>
  
  
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>     
        <script>
            // Javascript to enable link to tab
            var hash = document.location.hash;
            var prefix = "tabs_";
            if (hash) {
                $('.nav-pills a[href=' + hash.replace(prefix, "") + ']').tab('show');
            }

        </script> 
    </div>
    <!-- /.col-md-8 -->

  </div>   
    </div>
</div>
<!-- end wrapper -->

<!-- end wrapper -->
@include('admin_dashboard.footer')
@endsection
@section('script')

<script src="{{ asset('theme_files/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('theme_files/plugins/timepicker/bootstrap-timepicker.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- Tooltipster js -->
<!--<script src="{{ asset('theme_files/plugins/tooltipster/tooltipster.bundle.min.js') }}"></script>-->
<!--<script src="{{ asset('theme_files/pages/jquery.tooltipster.js') }}"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<!--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->

<script>
$(document).ready(function(){
  $("a").click(function(){
    $("button").slideToggle();
  });
});
</script>
<script>
    
$('#carouselExample').on('slide.bs.carousel', function (e) {

  
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 4;
    var totalItems = $('.carousel-item').length;
    
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});


  $('#carouselExample').carousel({ 
                interval: 2000
        });


  $(document).ready(function() {
/* show lightbox when clicking a thumbnail */
    $('a.thumb').click(function(event){
      event.preventDefault();
      var content = $('.modal-body');
      content.empty();
        var title = $(this).attr("title");
        $('.modal-title').html(title);        
        content.html($(this).html());
        $(".modal-profile").modal({show:true});
    });

  });
</script>

@endsection



