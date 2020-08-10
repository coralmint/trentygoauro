<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<html>
    <head>
        <meta charset="utf-8" />
        <title>Trenty.Go </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="{{ asset('theme_files/images/trentygo_logo.jpeg') }}">
        <!-- App css -->
        <link href="{{ asset('theme_files/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme_files/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme_files/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme_files/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('theme_files/js/modernizr.min.js') }}"></script>
        
        <!-- start Edittable -->
        <link href="{{ asset('theme_files/plugins/magnific-popup/css/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme_files/plugins/jquery-datatables-editable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme_files/external_files/css/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme_files/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme_files/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme_files/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme_files/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme_files/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme_files/plugins/custombox/css/custombox.min.css') }}" rel="stylesheet" type="text/css" />
        
        <link href="{{ asset('theme_files/plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme_files/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme_files/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />         
        <link href="{{ asset('theme_files/plugins/clockpicker/css/bootstrap-clockpicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme_files/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
        <!--<link href="{{ asset('theme_files/plugins/fullcalendar/css/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />-->
        
        <link href="{{ asset('theme_files/plugins/footable/css/footable.core.css') }}" rel="stylesheet" type="text/css" />
        {!! Html::style('theme_files/external_files/uploader/uploadfile.css') !!}
        
        
       
        
        <!-- Nestable css -->
        <link href="{{ asset('theme_files/plugins/nestable/jquery.nestable.css') }}" rel="stylesheet" type="text/css" />
        
        
        <!-- DataTables -->
        <link href="{{ asset('theme_files/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme_files/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
         <!-- Responsive datatable examples -->
        <link href="{{ asset('theme_files/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
       
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>
        <!-- jQuery  -->

<script src="{{ asset('theme_files/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('theme_files/external_files/js/jquery-confirm.min.js') }}"></script>
{!! Html::script('theme_files/external_files/uploader/jquery.uploadfile.min.js') !!}
<script src="{{ asset('theme_files/plugins/autocomplete/jquery.mockjax.js') }}"></script>
<script src="{{ asset('theme_files/plugins/autocomplete/jquery.autocomplete.min.js') }}"></script>

<script src="{{ asset('theme_files/js/popper.min.js') }}"></script>
<script src="{{ asset('theme_files/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('theme_files/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('theme_files/js/waves.js') }}"></script>
<script src="{{ asset('theme_files/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('theme_files/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('theme_files/js/jquery.scrollTo.min.js') }}"></script>


 <script src="{{ asset('theme_files/plugins/raphael/raphael-min.js') }}"></script> 
 <!-- <script src="{{ asset('theme_files/plugins/morris/morris.min.js') }}"></script> -->
 <!--<script src="{{ asset('theme_files/assets/pages/jquery.morris.init.js') }}"></script> -->


<script src="{{ asset('theme_files/assets/js/jquery.core.js') }}"></script>
<script src="{{ asset('theme_files/assets/js/jquery.app.js') }}"></script>



 <script src="{{ asset('theme_files/plugins/magnific-popup/js/jquery.magnific-popup.min.js') }}"></script> 
 <script src="{{ asset('theme_files/plugins/datatables/jquery.dataTables.min.js') }}"></script> 
 <script src="{{ asset('theme_files/pages/jquery.datatables.editable.init.js') }}"></script> 



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="{{ asset('theme_files/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>
<!-- App js -->
<!-- Scripts -->
<!--Start edittable -->
<script src="{{ asset('theme_files/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('theme_files/plugins/tiny-editable/mindmup-editabletable.js') }}"></script> 
<script src="{{ asset('theme_files/plugins/tiny-editable/numeric-input-example.js') }}"></script>        
 <!-- Parsley js -->

<script src="{{ asset('theme_files/plugins/switchery/switchery.min.js') }}"></script>        
<script src="{{ asset('theme_files/plugins/select2/js/select2.min.js') }}"></script>
<!-- <script src="{{ asset('theme_files/plugins/autocomplete/countries.js') }}"></script>         -->
 <script src="{{ asset('theme_files/plugins/custombox/js/custombox.min.js') }}"></script> 
 <script src="{{ asset('theme_files/plugins/custombox/js/legacy.min.js') }}"></script> 
        



<script src="{{ asset('theme_files/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('theme_files/plugins/timepicker/bootstrap-timepicker.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>



<script src="{{ asset('theme_files/pages/jquery.form-pickers.init.js') }}"></script>
<script src="{{ asset('theme_files/assets/pages/jquery.form-advanced.init.js') }}"></script>
<script src="{{ asset('theme_files/plugins/parsleyjs/parsley.min.js') }}"></script>

<script src="{{ asset('theme_files/plugins/footable/js/footable.all.min.js') }}"></script>
<script src="{{ asset('theme_files/assets/pages/jquery.footable.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('theme_files/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('theme_files/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/datatables/pdfmake.min.js') }}"></script>

<script src="{{ asset('theme_files/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('theme_files/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/datatables/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('theme_files/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('theme_files/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('theme_files/pages/jquery.scrollbar.js') }}"></script>

<script src="{{ asset('theme_files/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!--<script src="{{ asset('theme_files/plugins/fullcalendar/js/fullcalendar.min.js')}}"></script>-->
<!--<script src="{{ asset('theme_files/assets/pages/jquery.calendar.js')}}"></script>-->



<!--<script type="text/javascript" src="{{ URL::asset('public/assets/retailer.js') }}"></script>-->
<!--<script type="text/javascript" src="{{ URL::asset('public/assets/mechanic.js') }}"></script>-->
<!--<script type="text/javascript" src="{{ URL::asset('public/assets/product.js') }}"></script>-->
<!--<script type="text/javascript" src="{{ URL::asset('public/assets/loyaltypoint.js') }}"></script>-->
<!--<script type="text/javascript" src="{{ URL::asset('public/assets/retailer_invoice.js') }}"></script>-->
<!-- Jquery-Ui -->
<!-- custom datepicker for multiple -->
        
        @yield('script')
    </body>
</html>