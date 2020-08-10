@extends('layouts.adminmaster')
@section('content')
<header id="topnav">
    @include('admin_dashboard.menu')
</header>
  



                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="header-title m-t-0">Date Picker</h4>
                            <p class="text-muted font-14 m-b-25">
                                The datepicker is tied to a standard form input field. Click on the input to open
                                an interactive calendar in a small overlay. Click elsewhere on the page or hit the Esc
                                key to close. If a date is chosen, feedback is shown as the input's value.
                            </p>

                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="">
                                        <form action="#">
                                            <div class="form-group">
                                                <label>Default Functionality</label>
                                                <div>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div><!-- input-group -->
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Auto Close</label>
                                                <div>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div><!-- input-group -->
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Multiple Date</label>
                                                <div>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-multiple-date">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div><!-- input-group -->
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Date Range</label>
                                                <div>
                                                    <div class="input-daterange input-group" id="date-range">
                                                        <input type="text" class="form-control" name="start" />
                                                        <input type="text" class="form-control" name="end" />
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                                <div class="col-lg-4">

                                    <div class="p-20">

                                        <label>Display Inline</label>
                                        <div class="center-block" style="margin: 10px auto">
                                            <div id="datepicker-inline" value="2019/12/12" class=""></div>
                                        </div><!-- input-group -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end container -->
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

@endsection



