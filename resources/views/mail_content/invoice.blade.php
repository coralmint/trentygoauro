<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Rent Report</title>
      <link rel="stylesheet" href="style.css" media="all" />
   </head>
<style type="text/css">
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
     @media  only screen and (min-width: 900px) and (max-width: 3000px){
    li.dropdown.kikom {
    display: none !important;
}
}
.encodihk{
    float:right;
    padding-top:2%;
}
@media  only screen and (max-width: 600px)
   {
   ..mentop{
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
<style>
.datepicker-dropdown {
    padding: 10px !important;
}
.dropdown-menu {
    padding: 4px 0;
    box-shadow: 0 1px 3px fade(#313a46, 20%);
    border: 1px solid fade(#98a6ad, 15%);
}
.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 10rem;
    padding: .5rem 0;
    margin: .125rem 0 0;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: .25rem;
}
.datepicker-dropdown {
    top: 0;
    left: 0;
}
.datepicker {
    padding: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    direction: ltr;
}


.datepicker-dropdown.datepicker-orient-bottom:before {
    top: -7px;
}
.datepicker-dropdown.datepicker-orient-left:before {
    left: 6px;
}
.datepicker-dropdown:before {
    content: '';
    display: inline-block;
    border-left: 7px solid transparent;
    border-right: 7px solid transparent;
    border-bottom: 7px solid #999;
    border-top: 0;
    border-bottom-color: rgba(0,0,0,.2);
    position: absolute;
}
.montal{
    font-size:20px;
    font-weight:700;
}
.datepicker-dropdown.datepicker-orient-bottom:after {
    top: -6px;
}
.datepicker-dropdown.datepicker-orient-left:after {
    left: 7px;
}
.datepicker-dropdown:after {
    content: '';
    display: inline-block;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-bottom: 6px solid #fff;
    border-top: 0;
    position: absolute;
}
#reservation_list_datatable tr td {
    height: 10px;
}
@media  only screen and (max-width: 600px)
{
 
    .touchim {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
}
table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before{
    top:0px;
}
table.dataTable thead .sorting_asc:after{
    top:0px; 
}
table.dataTable thead .sorting:after{
  top:0px;    
}
.reseve{
    margin-bottom:25px;
    margin-top:5% !important;
}
button#clear_filter_data_value{
    margin-top:0px !important;
}
.futim{
    margin-top:0px !important;
}
}
    span.offline {
        background-color: #172B4D;
        color: #fff;
        padding: 3px 17px;
        font-size: 12px;
        border-radius: 10px;
    }
   span.online {
       border: 1px solid #000;
       padding: 3px 17px;
       color: #172b4d;
       font-weight: bold;
       border-radius: 10px;
   }
</style>
   <body>
    <header class="clearfix">
        <div class="col-md-3">
          <div id="logo">
            <img width="20%;" src="http://trentygo.coralmint.in/theme_files/images/trentygo_logo.jpeg" alt="nopic">
          </div>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-3">
          <div class="pull-right">
            <h2 class="name">{{ ucfirst($reserv_details[0]->first_name) }}{{ ucfirst($reserv_details[0]->last_name) }}</h2>
            <div>
                <p> {{ $reserv_details[0]->door_no }} {{ $reserv_details[0]->appartment_name  }} <br>
                    {{ $reserv_details[0]->street_name }} <br> {{ $reserv_details[0]->city }} <br> {{ $reserv_details[0]->country }}
                </p>
            </div>
          </div>
        </div>
      </div>        
    </header>
       <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <form>
                    <table class="table table-bordered touchim dataTable no-footer table-sm" id="reservation_list_datatable111" style="width: 100%; border-color: #e9ecef;" >
                        <tr>
                            <td colspan="6">
                                <table border="1" class="table table-bordered newresponse" style="width: 100%;border-color: #e9ecef;">
                                    <thead class="thead-light">
                                       <tr>
                                           <th># </th>
                                           <th>Item </th>
                                           <th>Descriptions </th>
                                           <th>Total Price </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1 </td>
                                            <td>Vehicle Rent </td>
                                            <td>
                                                @foreach($date_array as $key=> $date)
                                                {{ $date }} ---------- {{ $rent_array[$key] }} <br>
                                                @endforeach
                                                @foreach($default_array as $key=> $date)
                                                {{ $date }} ---------- {{ $reserv_details[0]->vehicle_default_rent }} <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                <?php 
                                                $spl_total = array_sum($rent_array);
                                                $nrm_total = count($default_array) * $reserv_details[0]->vehicle_default_rent;
                                                $total_rent = $spl_total + $nrm_total?>
                                                {{ $total_rent }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2 </td>
                                            <td>Addon Charges </td>
                                            <td>
                                                @foreach($vehicle_addons as $key=> $data)
                                                {{ $data->master_value }} ---------- {{ $data->addon_value }} <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $total_addons_values[0]->addon_total }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3 </td>
                                            <td>Discount </td>
                                            <td>
                                                Partner Discount ---------- {{ $reserv_details[0]->admin_discount }} <br>
                                                Admin Discount ---------- {{ $reserv_details[0]->partner_discount }}
                                            </td>
                                            <td>
                                                {{ $reserv_details[0]->admin_discount + $reserv_details[0]->partner_discount }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4 </td>
                                            <td>Tax </td>
                                            <td>
                                                Total Tax ---------- 0
                                            </td>
                                            <td>
                                                0
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5 </td>
                                            <td>Reservation amount </td>
                                            <td>
                                                Reservation Amount ---------- {{ $reserv_details[0]->reservation_amount }}
                                            </td>
                                            <td>
                                                {{ $reserv_details[0]->reservation_amount }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6 </td>
                                            <td>Paid Amount </td>
                                            <td>
                                                Paid Amount ---------- {{ $reserv_details[0]->paid_amount }}
                                            </td>
                                            <td>
                                                {{ $reserv_details[0]->paid_amount }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7 </td>
                                            <td>Deposit amount </td>
                                            <td>
                                                Paid Amount ---------- {{ $reserv_details[0]->deposit_amount }}
                                            </td>
                                            <td>
                                                {{ $reserv_details[0]->deposit_amount }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="text-align: right;">Total amount</td>
                                            <td>
                                                <?php
                                                $add = $total_rent + $total_addons_values[0]->addon_total + $reserv_details[0]->reservation_amount ;
                                                $sub = $reserv_details[0]->admin_discount + $reserv_details[0]->partner_discount;
                                                $over_all_value = $add - $sub;
                                                $total = $over_all_value;
                                                ?>
                                                {{ $total }}
                                            </td>
                                        </tr>
                                        <?php
                                        $aa=$total- $reserv_details[0]->paid_amount;
                                        ?>
                                        @if($reserv_details[0]->deposit_amount <= $aa )
                                        <tr>
                                            <td colspan="3" style="text-align: right;">Expected Amount to pay</td>
                                            <td>
                                                {{ $aa-$reserv_details[0]->deposit_amount }}
                                            </td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td colspan="3" style="text-align: right;">Expected Refund Amount </td>
                                            <td>
                                                {{ $reserv_details[0]->deposit_amount-$aa }}
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
   </body>
</html>