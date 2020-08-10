<?php
namespace App\Http\Controllers;
use App\User;
use App\General;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt;
use Session;
use Auth;
use DB;
use Mail;
use Hash;
use Illuminate\Support\Facades\Password;

class WebsiteController extends Controller
{   
    public function index()
    {
        return view('TrentyGo/home');
    }
    public function homepage()
    {
        return view('TrentyGo/homepage');
    }
    public function loginregister()
    {
        return view('TrentyGo/loginregister');
    }
    public function countries(){
        $countries = array( "AF" => "Afghanistan",
                            "AX" => "Åland Islands",
                            "AL" => "Albania",
                            "DZ" => "Algeria",
                            "AS" => "American Samoa",
                            "AD" => "Andorra",
                            "AO" => "Angola",
                            "AI" => "Anguilla",
                            "AQ" => "Antarctica",
                            "AG" => "Antigua and Barbuda",
                            "AR" => "Argentina",
                            "AM" => "Armenia",
                            "AW" => "Aruba",
                            "AU" => "Australia",
                            "AT" => "Austria",
                            "AZ" => "Azerbaijan",
                            "BS" => "Bahamas",
                            "BH" => "Bahrain",
                            "BD" => "Bangladesh",
                            "BB" => "Barbados",
                            "BY" => "Belarus",
                            "BE" => "Belgium",
                            "BZ" => "Belize",
                            "BJ" => "Benin",
                            "BM" => "Bermuda",
                            "BT" => "Bhutan",
                            "BO" => "Bolivia",
                            "BA" => "Bosnia and Herzegovina",
                            "BW" => "Botswana",
                            "BV" => "Bouvet Island",
                            "BR" => "Brazil",
                            "IO" => "British Indian Ocean Territory",
                            "BN" => "Brunei Darussalam",
                            "BG" => "Bulgaria",
                            "BF" => "Burkina Faso",
                            "BI" => "Burundi",
                            "KH" => "Cambodia",
                            "CM" => "Cameroon",
                            "CA" => "Canada",
                            "CV" => "Cape Verde",
                            "KY" => "Cayman Islands",
                            "CF" => "Central African Republic",
                            "TD" => "Chad",
                            "CL" => "Chile",
                            "CN" => "China",
                            "CX" => "Christmas Island",
                            "CC" => "Cocos (Keeling) Islands",
                            "CO" => "Colombia",
                            "KM" => "Comoros",
                            "CG" => "Congo",
                            "CD" => "Congo, The Democratic Republic of The",
                            "CK" => "Cook Islands",
                            "CR" => "Costa Rica",
                            "CI" => "Cote D'ivoire",
                            "HR" => "Croatia",
                            "CU" => "Cuba",
                            "CY" => "Cyprus",
                            "CZ" => "Czech Republic",
                            "DK" => "Denmark",
                            "DJ" => "Djibouti",
                            "DM" => "Dominica",
                            "DO" => "Dominican Republic",
                            "EC" => "Ecuador",
                            "EG" => "Egypt",
                            "SV" => "El Salvador",
                            "GQ" => "Equatorial Guinea",
                            "ER" => "Eritrea",
                            "EE" => "Estonia",
                            "ET" => "Ethiopia",
                            "FK" => "Falkland Islands (Malvinas)",
                            "FO" => "Faroe Islands",
                            "FJ" => "Fiji",
                            "FI" => "Finland",
                            "FR" => "France",
                            "GF" => "French Guiana",
                            "PF" => "French Polynesia",
                            "TF" => "French Southern Territories",
                            "GA" => "Gabon",
                            "GM" => "Gambia",
                            "GE" => "Georgia",
                            "DE" => "Germany",
                            "GH" => "Ghana",
                            "GI" => "Gibraltar",
                            "GR" => "Greece",
                            "GL" => "Greenland",
                            "GD" => "Grenada",
                            "GP" => "Guadeloupe",
                            "GU" => "Guam",
                            "GT" => "Guatemala",
                            "GG" => "Guernsey",
                            "GN" => "Guinea",
                            "GW" => "Guinea-bissau",
                            "GY" => "Guyana",
                            "HT" => "Haiti",
                            "HM" => "Heard Island and Mcdonald Islands",
                            "VA" => "Holy See (Vatican City State)",
                            "HN" => "Honduras",
                            "HK" => "Hong Kong",
                            "HU" => "Hungary",
                            "IS" => "Iceland",
                            "IN" => "India",
                            "ID" => "Indonesia",
                            "IR" => "Iran, Islamic Republic of",
                            "IQ" => "Iraq",
                            "IE" => "Ireland",
                            "IM" => "Isle of Man",
                            "IL" => "Israel",
                            "IT" => "Italy",
                            "JM" => "Jamaica",
                            "JP" => "Japan",
                            "JE" => "Jersey",
                            "JO" => "Jordan",
                            "KZ" => "Kazakhstan",
                            "KE" => "Kenya",
                            "KI" => "Kiribati",
                            "KP" => "Korea, Democratic People's Republic of",
                            "KR" => "Korea, Republic of",
                            "KW" => "Kuwait",
                            "KG" => "Kyrgyzstan",
                            "LA" => "Lao People's Democratic Republic",
                            "LV" => "Latvia",
                            "LB" => "Lebanon",
                            "LS" => "Lesotho",
                            "LR" => "Liberia",
                            "LY" => "Libyan Arab Jamahiriya",
                            "LI" => "Liechtenstein",
                            "LT" => "Lithuania",
                            "LU" => "Luxembourg",
                            "MO" => "Macao",
                            "MK" => "Macedonia, The Former Yugoslav Republic of",
                            "MG" => "Madagascar",
                            "MW" => "Malawi",
                            "MY" => "Malaysia",
                            "MV" => "Maldives",
                            "ML" => "Mali",
                            "MT" => "Malta",
                            "MH" => "Marshall Islands",
                            "MQ" => "Martinique",
                            "MR" => "Mauritania",
                            "MU" => "Mauritius",
                            "YT" => "Mayotte",
                            "MX" => "Mexico",
                            "FM" => "Micronesia, Federated States of",
                            "MD" => "Moldova, Republic of",
                            "MC" => "Monaco",
                            "MN" => "Mongolia",
                            "ME" => "Montenegro",
                            "MS" => "Montserrat",
                            "MA" => "Morocco",
                            "MZ" => "Mozambique",
                            "MM" => "Myanmar",
                            "NA" => "Namibia",
                            "NR" => "Nauru",
                            "NP" => "Nepal",
                            "NL" => "Netherlands",
                            "AN" => "Netherlands Antilles",
                            "NC" => "New Caledonia",
                            "NZ" => "New Zealand",
                            "NI" => "Nicaragua",
                            "NE" => "Niger",
                            "NG" => "Nigeria",
                            "NU" => "Niue",
                            "NF" => "Norfolk Island",
                            "MP" => "Northern Mariana Islands",
                            "NO" => "Norway",
                            "OM" => "Oman",
                            "PK" => "Pakistan",
                            "PW" => "Palau",
                            "PS" => "Palestinian Territory, Occupied",
                            "PA" => "Panama",
                            "PG" => "Papua New Guinea",
                            "PY" => "Paraguay",
                            "PE" => "Peru",
                            "PH" => "Philippines",
                            "PN" => "Pitcairn",
                            "PL" => "Poland",
                            "PT" => "Portugal",
                            "PR" => "Puerto Rico",
                            "QA" => "Qatar",
                            "RE" => "Reunion",
                            "RO" => "Romania",
                            "RU" => "Russian Federation",
                            "RW" => "Rwanda",
                            "SH" => "Saint Helena",
                            "KN" => "Saint Kitts and Nevis",
                            "LC" => "Saint Lucia",
                            "PM" => "Saint Pierre and Miquelon",
                            "VC" => "Saint Vincent and The Grenadines",
                            "WS" => "Samoa",
                            "SM" => "San Marino",
                            "ST" => "Sao Tome and Principe",
                            "SA" => "Saudi Arabia",
                            "SN" => "Senegal",
                            "RS" => "Serbia",
                            "SC" => "Seychelles",
                            "SL" => "Sierra Leone",
                            "SG" => "Singapore",
                            "SK" => "Slovakia",
                            "SI" => "Slovenia",
                            "SB" => "Solomon Islands",
                            "SO" => "Somalia",
                            "ZA" => "South Africa",
                            "GS" => "South Georgia and The South Sandwich Islands",
                            "ES" => "Spain",
                            "LK" => "Sri Lanka",
                            "SD" => "Sudan",
                            "SR" => "Suriname",
                            "SJ" => "Svalbard and Jan Mayen",
                            "SZ" => "Swaziland",
                            "SE" => "Sweden",
                            "CH" => "Switzerland",
                            "SY" => "Syrian Arab Republic",
                            "TW" => "Taiwan, Province of China",
                            "TJ" => "Tajikistan",
                            "TZ" => "Tanzania, United Republic of",
                            "TH" => "Thailand",
                            "TL" => "Timor-leste",
                            "TG" => "Togo",
                            "TK" => "Tokelau",
                            "TO" => "Tonga",
                            "TT" => "Trinidad and Tobago",
                            "TN" => "Tunisia",
                            "TR" => "Turkey",
                            "TM" => "Turkmenistan",
                            "TC" => "Turks and Caicos Islands",
                            "TV" => "Tuvalu",
                            "UG" => "Uganda",
                            "UA" => "Ukraine",
                            "AE" => "United Arab Emirates",
                            "GB" => "United Kingdom",
                            "US" => "United States",
                            "UM" => "United States Minor Outlying Islands",
                            "UY" => "Uruguay",
                            "UZ" => "Uzbekistan",
                            "VU" => "Vanuatu",
                            "VE" => "Venezuela",
                            "VN" => "Viet Nam",
                            "VG" => "Virgin Islands, British",
                            "VI" => "Virgin Islands, U.S.",
                            "WF" => "Wallis and Futuna",
                            "EH" => "Western Sahara",
                            "YE" => "Yemen",
                            "ZM" => "Zambia",
                            "ZW" => "Zimbabwe"
                            );
        return $countries;
    }
    public function reservationdetail(Request $req)
    {
        $countries = $this->countries();
        $customer_id = Crypt::decryptString($req->id);
        $customer_info = DB::table('customer_details')->where('customer_id',$customer_id)->get();
        $vehicle_info = DB::table('vehicle_details as vd')
                            ->leftJoin('document_details as dd', function ($join) {
                                $join->on('vd.vehicle_id', '=', 'dd.vehicle_id')
                                     ->where('dd.file_for', '=', 'image_document')
                                     ->where('dd.document_details_id',
                                     DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for  )"))
                                     ;
                            })
                            ->leftJoin('master_data as md', 'vd.vehicle_type', 'md.master_data_id')
                            ->select('vd.*','dd.file_url','dd.file_path','md.master_value','md.image_url')
                            ->where('vd.vehicle_id',$customer_info[0]->vehicle_id)
                            ->get();
        // $available_dates1 = implode(',', $available_dates1);       
        $trentygo_location = DB::table('location_master')->where('status',1)->get();
        return view('TrentyGo/reservationdetail')
                ->with('customer_info',$customer_info)
                ->with('countries',$countries)
                ->with('vehicle_info',$vehicle_info)
                ->with('trentygo_location',$trentygo_location)
                ->with('customer_id',$customer_id);
    }
    public function get_vehicle_available_dates(Request $req){
        $dates_array=array();
        $return_dates =array();
        $available_dates111['data'] = DB::table('manage_vehicle_rent')
                                ->where('available_status',1)
                                ->where('status',1)
                                ->where('vehicle_id',$req->vehicle_id)
                                // ->select('date')
                                ->pluck('date');
                                // ->get();
                                // ->toArray();
        $available_dates1 = $available_dates111['data']->toArray();
                                
        $reserved_date_info = DB::table('reservation_details')                        
                            ->where('vehicle_id',$req->vehicle_id)
                            ->whereNotIn('status', [6, 8])->get();
        if($reserved_date_info->count() > 0){
            foreach($reserved_date_info as $dd){
                $Variable1 = strtotime($dd->start_date); 
                $Variable2 = strtotime($dd->return_date);
                for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) {
                    $Store = date('d-m-Y', $currentDate);
                    $dates_array[] = $Store; 
                }
            }
            $return_dates1 = array_diff($available_dates1,$dates_array);
            $return_dates = array_splice($return_dates1, 0);
        }else{
            $return_dates = $available_dates1;
        }
        
        if(count($return_dates) > 0){
            $data['available_dates'] = $return_dates;
        }else{
            $data['available_dates'] = 0;
        }
        return ($data);
    }
    public function get_vehicle_rent_for_date(Request $req){
        $from_date = $req->from_date;
        $to_date = $req->to_date;
        $vehicle_id = $req->vehicle_id;
        $vehicle_rent = DB::table('manage_vehicle_rent as mvr')
                            ->select('mvr.vehicle_id',
                                             DB::raw("count(mvr.date) as total_days"),
                                             DB::raw("sum(mvr.rent) as special_rent"))
                            ->whereBetween('mvr.date', [$from_date, $to_date] )
                            ->where('vehicle_id',$vehicle_id)
                            ->groupBy('mvr.vehicle_id')
                            ->get();
                // print_r($vehicle_rent->count());
                // die();
        if($vehicle_rent->count() > 0){
            $data['vehicle_rent'] = $vehicle_rent[0]->special_rent;
        }else{
            $data['vehicle_rent'] = 0;
        }
        return json_encode($data);
    }
    public function new_reservation_form_detail(Request $req){
        $customer_first_name = $req->customer_first_name;
        $customer_last_name = $req->customer_last_name;
        $customer_email = $req->customer_email;
        $customer_country_code = $req->customer_country_code;
        $customer_phone = $req->customer_phone;
        $customer_dob = $req->customer_dob;
        $customer_door_no = $req->customer_door_no;
        $customer_appartment = $req->customer_appartment;
        $street_name = $req->street_name;
        $postal_code = $req->postal_code;
        $customer_city = $req->customer_city;
        $customer_country = $req->customer_country;
        $customer_source = $req->customer_source;
        $customer_destination = $req->customer_destination;
        $from_datepicker = $req->from_datepicker;
        $to_datepicker = $req->to_datepicker;
        $license_number = $req->license_number;
        $customer_license_issue_date = $req->customer_license_issue_date;
        $issued_country = $req->issued_country;
        $input_dynamic_rent_value = $req->input_dynamic_rent_value;
        $vehicle_id = $req->vehicle_id;
        $customer_id = $req->customer_id;
        $curent_date = date('Y-m-d H:i:s');
        $db = new General();
        $vehicle_info = DB::table('vehicle_details')->where('vehicle_id',$vehicle_id)->get();
        $reservation_data = array(
                'vehicle_id' => $vehicle_id,
                'partner_id' => $vehicle_info[0]->partner_id,
                'customer_id' => $customer_id,
                'vehicle_reg_no' => $vehicle_info[0]->vehicle_reg_no,
                'first_name' => $customer_first_name,
                'last_name' => $customer_last_name,
                'phone' => $customer_phone,
                'email' => $customer_email,
                'pick_up_location_id' => $customer_source,
                'drop_location_id' => $customer_destination,
                'start_date' => $from_datepicker,
                'return_date' => $to_datepicker,
                'reservation_date' => $curent_date,
                'reserve_through' => '1',
                'dob' => $customer_dob,
                'door_no' => $customer_door_no,
                'appartment_name' => $customer_appartment,
                'street_name' => $street_name,
                'city' => $customer_city,
                'country' => $customer_country,
                'country_code' => $customer_country_code,
                'pincode' => $postal_code,
                'license_number' => $license_number,
                'license_issue_date' => $customer_license_issue_date,
                'license_issued_country' => $issued_country,
                'reservation_amount' => $input_dynamic_rent_value,
            ); 
        $db->insert('reservation_details',$reservation_data);
        $reservation_id = DB::getPdo()->lastInsertId();
        if($reservation_id != ''){
            $unique_id = 'TGR000'.$reservation_id;
            $idata = array(
                        'reserve_unique_id' => $unique_id
                        );
            $customer_update_data = array(
                        'customer_name' => $customer_first_name,
                        'customer_phone' => $customer_phone,
                        'customer_email' => $customer_email,
                        );
            $line_item_data = array(
                        'reservation_id' => $reservation_id,
                        'start_date' => $from_datepicker,
                        'return_date' => $to_datepicker,
                        'vehicle_id' => $vehicle_id,
                    );
            $db->insert('reservation_line_item',$line_item_data);
            $db->updates('reservation_details',$idata,'reservation_id',$reservation_id);
            $db->updates('customer_details',$customer_update_data,'customer_id',$customer_id);
            $user_data = array(
                'name' => $customer_first_name,
                'email' => $customer_email,
                'password' => Hash::make($customer_phone),  
                'role' => '3',
                'user_id' => $customer_id,
            );
            $db->insert('users',$user_data);
            $to_name = $customer_first_name;
            $to_email = $customer_email;
            $password = $customer_phone;
            $mdata1 = array('name'=>$to_name,'email'=>$to_email,'password'=>$password);
            Mail::send('mail_content.welcome_new_owner', $mdata1, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                        ->subject('Trenty.Go | Reservation Conformed');
                $message->from('info@decorbazaar.in','Trenty.Go');
                $message->cc('vinoth@coralmint.in');
                // $message->bcc('bhavithra.t@coralmint.in');
            });
            
            $return_data = "success";
        }else{
            $return_data = "failed";
        }
        return json_encode($return_data);
    }
    public function reservation()
    {
         $vehicle_details = DB::table('vehicle_details as vd')
                        ->leftJoin('master_data as md', 'vd.vehicle_brand', 'md.master_data_id')
                        ->leftJoin('master_data as md1', 'vd.vehicle_seat_type', 'md1.master_data_id')
                        ->leftJoin('master_data as md2', 'vd.vehicle_driving_type', 'md2.master_data_id')
                        ->leftJoin('master_data as md3', 'vd.vehicle_type', 'md3.master_data_id')
                        
                        ->leftJoin('vehicle_features as vf', function($join){
                                $join->on('vd.vehicle_id', 'vf.vehicle_id')
                                ->where('vf.features_for', 1);
                            })
                            
                        ->leftJoin('master_data as md4', 'vf.option_name', 'md4.master_data_id')
                        
                        ->leftJoin('document_details as dd', function ($join) {
                                $join->on('vd.vehicle_id', '=', 'dd.vehicle_id')
                                     ->where('dd.file_for', '=', 'image_document')
                                     ->where('dd.document_details_id',
                                     DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for  )"))
                                     ;
                            })
                        ->where('vd.available_status',1) 
                        ->select('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value as vehicle_brand',
                                    'md1.master_value as vehicle_seat_type','md.master_value','md2.master_value as vehicle_driving_type','dd.file_url','dd.file_path'
                                    ,DB::raw('group_concat(md4.master_value) as options')
                                    ,DB::raw('group_concat(md4.image_url) as options_url')
                                    ,'vd.default_rent'
                                    // ,DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for)")
                                    )
                        ->groupBy('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value',
                                    'md1.master_value','md.master_value','md2.master_value','dd.file_url','dd.file_path','vd.default_rent')
                        ->get();
        $vehicle_type = DB::table('master_data')
                            ->where('master_for','vehicle_option')
                            ->where('master_key','vehicle type')
                            ->where('status',1)
                            ->get();
        
        $vehicle_service_option = DB::table('master_data')
                            ->where('master_for','vehicle_option')
                            ->where('master_key','add_on_services')
                            ->where('status',1)
                            ->get();
        $trentygo_location = DB::table('location_master')->where('status',1)->get();
        return view('TrentyGo/reservation')
                        ->with('vehicle_details',$vehicle_details)
                        ->with('vehicle_type',$vehicle_type)
                        ->with('vehicle_service_option',$vehicle_service_option)
                        ->with('trentygo_location',$trentygo_location);
    }
    
    public function book_new_reservation(Request $req)
    {
        $vehicle_id = Crypt::decryptString($req->id);
        return view('TrentyGo/loginregister')->with('vehicle_id',$vehicle_id);
    }
    public function new_customer_register(Request $req){
        $customer_details = DB::table('customer_details')->where('customer_email',$req->customer_email)->count();
        $user_details = DB::table('users')->where('email',$req->customer_email)->count();
            $customer_data = array(
                'customer_name' => $req->customer_name,
                'customer_phone' => $req->customer_mobile,
                'customer_email' => $req->customer_email,
                'vehicle_id' => $req->vehicle_id,
                'logged_status' => 1,
            );
        if($customer_details == 0){
            $db = new General();
            $db->insert('customer_details',$customer_data);
            $partner_id = DB::getPdo()->lastInsertId();
            $data = Crypt::encryptString($partner_id);
        }else{
            $data = "failed";
        }
        return json_encode($data);
    }  
    
    public function contactus()
    {
        return view('TrentyGo/contactus');
    }
     public function blog()
    {
        return view('TrentyGo/blog');
    }
     
    
    public function add_partner_details(Request $req){
        $partner_details = DB::table('partner_details')->where('partner_email',$req->partner_email)->count();
        $curent_date = date('Y-m-d H:i:s');
        
        if($req->has('partner_name') != ''){
            $data = array(
                'partner_name' => $req->partner_name,
                'partner_email' => $req->partner_email,
                'partner_vehicles_no' => $req->no_vehicles,
                'partner_phone' => $req->phone_no,
                'partner_area' => $req->partner_location,
                'partner_type' => $req->partner_type,
                'created_at' => $curent_date,
            );
        }else{
            $data = array(
                'partner_company_name' => $req->company_name,
                'partner_email' => $req->partner_email,
                'partner_vehicles_no' => $req->no_vehicles,
                'partner_phone' => $req->phone_no,
                'partner_area' => $req->partner_location,
                'partner_type' => $req->partner_type,
                'created_at' => $curent_date,
            );
        }
        if($partner_details == 0){
            $db = new General();
            $db->insert('partner_details',$data);
            $partner_id = DB::getPdo()->lastInsertId();
            $var = date('mY');
            if($req->partner_type == '1'){
                $unique_code = 'TGP000'.$partner_id;   
            }else{
                $unique_code = 'TGIP000'.$partner_id;
            }
            $idata = array(
                'unique_partner_id' => $unique_code
                );
            $db->updates('partner_details',$idata,'partner_id',$partner_id);
            $data = "success";
        }else{
            $data = "failed";
        }
        return json_encode($data);
    }  
    
    public function add_contact_details(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
        'name' => $req->form_name,
        'com_name' => $req->form_com_name,
        'email' => $req->form_email,
        'phone_no' => $req->form_phone_no,
        'massage' => $req->form_massage,
        'created_at' => $curent_date,
        );
            $db = new General();
            // $db->insert('contact_us',$data);
                $name = $req->form_name;
                $company_name = $req->form_com_name;
                $phone = $req->form_phone_no;
                $desc = $req->form_massage;
                $to_email = $req->form_email;
                $password = '$req->phone';
                $mdata1 = array('name'=>$name,'company_name'=>$company_name,'phone'=>$phone,'to_email'=>$to_email,'desc'=>$desc,);
                
                Mail::send('mail_content.new_enquiry', $mdata1, function($message) use ($name, $to_email) {
                    $message->to($to_email, $name)
                            ->subject('Trenty.Go | New Enquiry');
                    $message->from('info@decorbazaar.in','Trenty.Go');
                    $message->cc('vinoth@coralmint.in');
                    $message->cc('bhavithra.t@coralmint.in');
                    // $message->bcc('bhavithra.t@coralmint.in');
                });
            $data = "success";
        
        return json_encode($data);
    }
    public function get_searched_vehicle_by_date(Request $req){
        $filter_from_date = $req->from_date;
        $filter_to_date = $req->to_date;
        $filter_price = $req->filter_price;
        
        $query = DB::table('vehicle_details as vd')
                        ->leftJoin('master_data as md', 'vd.vehicle_brand', 'md.master_data_id')
                        ->leftJoin('master_data as md1', 'vd.vehicle_seat_type', 'md1.master_data_id')
                        ->join('master_data as md2', 'vd.vehicle_driving_type', 'md2.master_data_id')
                        ->join('master_data as md3', 'vd.vehicle_type', 'md3.master_data_id')
                        ->leftJoin('vehicle_features as vf', function($join){
                                $join->on('vd.vehicle_id', 'vf.vehicle_id')
                                ->where('vf.features_for', 1);
                            })                            
                        ->leftJoin('master_data as md4', 'vf.option_name', 'md4.master_data_id')                        
                        ->join('document_details as dd', function ($join) {
                                $join->on('vd.vehicle_id', '=', 'dd.vehicle_id')
                                     ->where('dd.file_for', '=', 'image_document')
                                     ->where('dd.document_details_id',
                                     DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for  )"));
                            })
                        ->where('vd.available_status',1)
                        ->select('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value as vehicle_brand',
                                    'md1.master_value as vehicle_seat_type','md.master_value','md2.master_value as vehicle_driving_type','dd.file_url','dd.file_path'
                                    ,DB::raw('group_concat(md4.master_value) as options')
                                    ,DB::raw('group_concat(md4.image_url) as options_url')
                                    ,'vd.default_rent'
                                    // ,DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for)")
                                    )
                        ->groupBy('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value',
                                    'md1.master_value','md.master_value','md2.master_value','dd.file_url','dd.file_path','vd.default_rent');
        if(($req->has('from_date'))&&($req->has('filter_location'))) {
            $date_array = array();  
            $Variable1 = strtotime($req->from_date); 
            $Variable2 = strtotime($req->to_date); 
            // 86400 sec = 24 hrs = 60*60*24 = 1 day 
            for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) { 
                $Store = date('Y-m-d', $currentDate); 
                $date_array[] = $Store; 
            }
            
            $q = DB::table('partner_details as pd')->whereRaw("find_in_set($req->filter_location,pd.offered_location)")
                    ->join('vehicle_details as vd', 'vd.partner_id', 'pd.partner_id')
                        ->leftJoin('master_data as md', 'vd.vehicle_brand', 'md.master_data_id')
                        ->leftJoin('master_data as md1', 'vd.vehicle_seat_type', 'md1.master_data_id')
                        ->join('master_data as md2', 'vd.vehicle_driving_type', 'md2.master_data_id')
                        ->join('master_data as md3', 'vd.vehicle_type', 'md3.master_data_id')
                        
                        ->leftJoin('vehicle_features as vf', function($join){
                                $join->on('vd.vehicle_id', 'vf.vehicle_id')
                                ->where('vf.features_for', 1);
                            })
                        ->leftJoin('master_data as md4', 'vf.option_name', 'md4.master_data_id')                        
                        ->join('document_details as dd', function ($join) {
                                $join->on('vd.vehicle_id', '=', 'dd.vehicle_id')
                                     ->where('dd.file_for', '=', 'image_document')
                                     ->where('dd.document_details_id',
                                     DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for  )"));
                            })
                        ->join('manage_vehicle_rent as mvr', function($join){
                                $join->on('vd.vehicle_id', 'mvr.vehicle_id')
                                ->where('mvr.available_status', 1);
                            })
                        ->leftJoin('reservation_details as rd', function($join){
                                $join->on('vd.vehicle_id', 'rd.vehicle_id')
                                     ->whereIn('rd.status', [6, 8]);
                            })
                        ->where('vd.available_status',1);
                        
                        if(count($date_array) > '1'){
                            foreach($date_array as $d){
                                $q1 = $q->orWhere('mvr.date', $d);
                            }
                        }else{
                            $q1 = $q->where('mvr.date', $date_array);
                        }
                        
                        
                        
            $query1= $q1->select('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value as vehicle_brand',
                                    'md1.master_value as vehicle_seat_type','md.master_value','md2.master_value as vehicle_driving_type','dd.file_url','dd.file_path'
                                    ,DB::raw('group_concat(md4.master_value) as options')
                                    ,DB::raw('group_concat(md4.image_url) as options_url')
                                    ,'vd.default_rent'
                                    // ,DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for)")
                                    )
                        ->groupBy('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value',
                                    'md1.master_value','md.master_value','md2.master_value','dd.file_url','dd.file_path','vd.default_rent')
                        ->get();
        }else{
            $query1 = DB::table('vehicle_details as vd')
                        ->leftJoin('master_data as md', 'vd.vehicle_brand', 'md.master_data_id')
                        ->leftJoin('master_data as md1', 'vd.vehicle_seat_type', 'md1.master_data_id')
                        ->leftJoin('master_data as md2', 'vd.vehicle_driving_type', 'md2.master_data_id')
                        ->leftJoin('master_data as md3', 'vd.vehicle_type', 'md3.master_data_id')
                        ->leftJoin('vehicle_features as vf', function($join){
                                $join->on('vd.vehicle_id', 'vf.vehicle_id')
                                ->where('vf.features_for', 1);
                            })                            
                        ->leftJoin('master_data as md4', 'vf.option_name', 'md4.master_data_id')                        
                        ->leftJoin('document_details as dd', function ($join) {
                                $join->on('vd.vehicle_id', '=', 'dd.vehicle_id')
                                     ->where('dd.file_for', '=', 'image_document')
                                     ->where('dd.document_details_id',
                                     DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for  )"));
                            })
                        ->where('vd.available_status',1)
                        ->select('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value as vehicle_brand',
                                    'md1.master_value as vehicle_seat_type','md.master_value','md2.master_value as vehicle_driving_type','dd.file_url','dd.file_path'
                                    ,DB::raw('group_concat(md4.master_value) as options')
                                    ,DB::raw('group_concat(md4.image_url) as options_url')
                                    ,'vd.default_rent'
                                    // ,DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for)")
                                    )
                        ->groupBy('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value',
                                    'md1.master_value','md.master_value','md2.master_value','dd.file_url','dd.file_path','vd.default_rent')->get();
        }
            $total_row = $query1->count();
            $output = '';
            if($total_row > 0)
            {
                foreach($query1 as $row)
                {
                    $output .= '
                <div class="row rosy">
                  <div class="col-md-4">';
                    if( ($row->file_url != '') || (file_exists($row->file_path)) ){
                    $output .= '<img src="'.$row->file_url.'" class="addnewsava" style="width: 186; height: 116;" >';
                    }else{
                    $output .= '<img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/six.jpg" class="caro">';
                    }                        
                $output .= '</div>
                  <div class="col-md-8">
                     <div class="row">
                        <div class="col-md-7">
                           <p class="typoo">Type de vechicule : '.$row->vehicle_driving_type.'</p>
                           <p class="typoo1">'.ucfirst($row->vehicle_brand).'</p>';
                           $opt_arr = array_unique(explode (",", $row->options));
                           $opt_url_arr = explode (",", $row->options_url);
                           
                           foreach($opt_arr as $key => $oa){
                          $output .= '<span class="opti">'; if($opt_url_arr[$key] != ""){ $output .= '<img src="'.$opt_url_arr[$key].'" style="width: 35px;" />';}else{ $output .= ' - ';  }  
                          $output .= ''.$oa.'</span>';
                           }
                    $output .= '</div>
                        <div class="col-md-5">
                           <div class="col-md-12">'.$row->partner_id.'---'.$row->default_rent.'----'.$row->vehicle_id.'
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-7">
                           <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/six.jpg" class="caro1">
                        </div>
                        <div class="col-md-5">
                           <div class="col-md-12 zero">
                              <p class="margik"><span class="fifty">50<i class="fa fa-euro"></i> / </span><span class="jour">jours</span></p>
                              <p class="margik"><span class="fifty1">150<i class="fa fa-euro"></i> / </span><span class="jour">au total</span></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>';
                }
            }
            else
            {
                $output = '<center><h3>No Matches Found</h3></center>';                
            }
            echo json_encode($output);
    }
    public function get_searched_vehicle(Request $req){
        $filter_vehicle_type = $req->filter_vehicle_type;
        $filter_vehicle_service = $req->filter_vehicle_service;
        $filter_vehicle_gear_type = $req->filter_vehicle_gear_type;
        $filter_price = $req->filter_price;
        $query = DB::table('vehicle_details as vd')
                        ->leftJoin('master_data as md', 'vd.vehicle_brand', 'md.master_data_id')
                        ->leftJoin('master_data as md1', 'vd.vehicle_seat_type', 'md1.master_data_id')
                        ->leftJoin('master_data as md2', 'vd.vehicle_driving_type', 'md2.master_data_id')
                        ->leftJoin('master_data as md3', 'vd.vehicle_type', 'md3.master_data_id')
                        ->leftJoin('vehicle_features as vf', function($join){
                                $join->on('vd.vehicle_id', 'vf.vehicle_id')
                                ->where('vf.features_for', 1);
                            })                            
                        ->leftJoin('master_data as md4', 'vf.option_name', 'md4.master_data_id')                        
                        ->leftJoin('document_details as dd', function ($join) {
                                $join->on('vd.vehicle_id', '=', 'dd.vehicle_id')
                                     ->where('dd.file_for', '=', 'image_document')
                                     ->where('dd.document_details_id',
                                     DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for  )"));
                            })
                        ->where('vd.available_status',1)
                        ->select('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value as vehicle_brand',
                                    'md1.master_value as vehicle_seat_type','md.master_value','md2.master_value as vehicle_driving_type','dd.file_url','dd.file_path'
                                    ,DB::raw('group_concat(md4.master_value) as options')
                                    ,DB::raw('group_concat(md4.image_url) as options_url')
                                    // ,DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for)")
                                    ,'vd.default_rent','vd.vehicle_type'
                                    )
                        ->groupBy('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value',
                                    'md1.master_value','md.master_value','md2.master_value','dd.file_url','dd.file_path','vd.default_rent','vd.vehicle_type');

        if(($req->has('filter_vehicle_type') != '')||($req->has('filter_vehicle_service') != '')||($req->has('filter_vehicle_gear_type') != '')||($req->has('filter_price') != '')){
            if ($req->has('filter_vehicle_type')) {
                $test = "filter_vehicle_service";
                $query1 = DB::table('vehicle_details as vd')
                        ->leftJoin('master_data as md', 'vd.vehicle_brand', 'md.master_data_id')
                        ->leftJoin('master_data as md1', 'vd.vehicle_seat_type', 'md1.master_data_id')
                        ->leftJoin('master_data as md2', 'vd.vehicle_driving_type', 'md2.master_data_id')
                        ->leftJoin('master_data as md3', 'vd.vehicle_type', 'md3.master_data_id')
                        ->leftJoin('vehicle_features as vf', function($join){
                                $join->on('vd.vehicle_id', 'vf.vehicle_id')
                                ->where('vf.features_for', 1);
                            })                            
                        ->leftJoin('master_data as md4', 'vf.option_name', 'md4.master_data_id')                        
                        ->leftJoin('document_details as dd', function ($join) {
                                $join->on('vd.vehicle_id', '=', 'dd.vehicle_id')
                                     ->where('dd.file_for', '=', 'image_document')
                                     ->where('dd.document_details_id',
                                     DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for  )"));
                            })
                        ->where('vd.available_status',1)
                        ->whereIn('vd.vehicle_type', $filter_vehicle_type)
                        ->select('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value as vehicle_brand',
                                    'md1.master_value as vehicle_seat_type','md.master_value','md2.master_value as vehicle_driving_type','dd.file_url','dd.file_path'
                                    ,DB::raw('group_concat(md4.master_value) as options')
                                    ,DB::raw('group_concat(md4.image_url) as options_url')
                                    // ,DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for)")
                                    ,'vd.default_rent','vd.vehicle_type'
                                    )
                        ->groupBy('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value',
                                    'md1.master_value','md.master_value','md2.master_value','dd.file_url','dd.file_path','vd.default_rent','vd.vehicle_type')->get();
            }
            if ($req->has('filter_vehicle_service')) {
                $test = "filter_vehicle_service";
                $query1 = DB::table('vehicle_details as vd')
                        ->leftJoin('master_data as md', 'vd.vehicle_brand', 'md.master_data_id')
                        ->leftJoin('master_data as md1', 'vd.vehicle_seat_type', 'md1.master_data_id')
                        ->join('master_data as md2', 'vd.vehicle_driving_type', 'md2.master_data_id')
                        ->join('master_data as md3', 'vd.vehicle_type', 'md3.master_data_id')
                        ->join('vehicle_features as vf', function($join) use ($filter_vehicle_service){
                                $join->on('vd.vehicle_id', 'vf.vehicle_id')
                                ->where('vf.features_for', 1)
                                ->whereIn('vf.option_name', $filter_vehicle_service);
                            })
                        ->join('master_data as md4', 'vf.option_name', 'md4.master_data_id')                        
                        ->join('document_details as dd', function ($join) {
                                $join->on('vd.vehicle_id', '=', 'dd.vehicle_id')
                                     ->where('dd.file_for', '=', 'image_document')
                                     ->where('dd.document_details_id',
                                     DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for  )"));
                            })
                        ->where('vd.available_status',1)
                        ->select('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value as vehicle_brand',
                                    'md1.master_value as vehicle_seat_type','md.master_value','md2.master_value as vehicle_driving_type','dd.file_url','dd.file_path'
                                    ,DB::raw('group_concat(md4.master_value) as options')
                                    ,DB::raw('group_concat(md4.image_url) as options_url')
                                    // ,DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for)")
                                    ,'vd.default_rent'
                                    )
                        ->groupBy('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value',
                                    'md1.master_value','md.master_value','md2.master_value','dd.file_url','dd.file_path','vd.default_rent')->get();
            }
            if ($req->has('filter_vehicle_gear_type')) {
                $test = "filter_vehicle_gear_type";
                $query1 = DB::table('vehicle_details as vd')
                        ->leftJoin('master_data as md', 'vd.vehicle_brand', 'md.master_data_id')
                        ->leftJoin('master_data as md1', 'vd.vehicle_seat_type', 'md1.master_data_id')
                        ->join('master_data as md2', function($join) use ($filter_vehicle_gear_type){
                            $join->on('vd.vehicle_driving_type', 'md2.master_data_id')
                                ->whereIn('vd.vehicle_driving_type' , $filter_vehicle_gear_type);
                        })
                        ->join('master_data as md3', 'vd.vehicle_type', 'md3.master_data_id')
                        ->leftJoin('vehicle_features as vf', function($join){
                                $join->on('vd.vehicle_id', 'vf.vehicle_id')
                                ->where('vf.features_for', 1);
                            })                            
                        ->leftJoin('master_data as md4', 'vf.option_name', 'md4.master_data_id')                        
                        ->join('document_details as dd', function ($join) {
                                $join->on('vd.vehicle_id', '=', 'dd.vehicle_id')
                                     ->where('dd.file_for', '=', 'image_document')
                                     ->where('dd.document_details_id',
                                     DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for  )"));
                            })
                        ->where('vd.available_status',1)
                        ->select('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value as vehicle_brand',
                                    'md1.master_value as vehicle_seat_type','md.master_value','md2.master_value as vehicle_driving_type','dd.file_url','dd.file_path'
                                    ,DB::raw('group_concat(md4.master_value) as options')
                                    ,DB::raw('group_concat(md4.image_url) as options_url')
                                    // ,DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for)")
                                    ,'vd.default_rent'
                                    )
                        ->groupBy('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value',
                                    'md1.master_value','md.master_value','md2.master_value','dd.file_url','dd.file_path','vd.default_rent')->get();
            }            
            if ($req->has('filter_price')) {
                $test = "filter_price";
                $query1 = DB::table('vehicle_details as vd')
                        ->leftJoin('master_data as md', 'vd.vehicle_brand', 'md.master_data_id')
                        ->leftJoin('master_data as md1', 'vd.vehicle_seat_type', 'md1.master_data_id')
                        ->join('master_data as md2', 'vd.vehicle_driving_type', 'md2.master_data_id')
                        ->join('master_data as md3', 'vd.vehicle_type', 'md3.master_data_id')
                        ->leftJoin('vehicle_features as vf', function($join){
                                $join->on('vd.vehicle_id', 'vf.vehicle_id')
                                ->where('vf.features_for', 1);
                            })                            
                        ->leftJoin('master_data as md4', 'vf.option_name', 'md4.master_data_id')                        
                        ->join('document_details as dd', function ($join) {
                                $join->on('vd.vehicle_id', '=', 'dd.vehicle_id')
                                     ->where('dd.file_for', '=', 'image_document')
                                     ->where('dd.document_details_id',
                                     DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for)"));
                            })
                        ->where('vd.available_status',1)
                        ->where('vd.default_rent', '<>', $filter_price)
                        ->select('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value as vehicle_brand',
                                    'md1.master_value as vehicle_seat_type','md.master_value','md2.master_value as vehicle_driving_type','dd.file_url','dd.file_path'
                                    ,DB::raw('group_concat(md4.master_value) as options')
                                    ,DB::raw('group_concat(md4.image_url) as options_url')
                                    // ,DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for)")
                                    ,'vd.default_rent')
                        ->groupBy('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value',
                                    'md1.master_value','md.master_value','md2.master_value','dd.file_url','dd.file_path','vd.default_rent')->get();
            }
        }else{
            $test = "else";
            $query1 = DB::table('vehicle_details as vd')
                        ->leftJoin('master_data as md', 'vd.vehicle_brand', 'md.master_data_id')
                        ->leftJoin('master_data as md1', 'vd.vehicle_seat_type', 'md1.master_data_id')
                        ->leftJoin('master_data as md2', 'vd.vehicle_driving_type', 'md2.master_data_id')
                        ->leftJoin('master_data as md3', 'vd.vehicle_type', 'md3.master_data_id')
                        ->leftJoin('vehicle_features as vf', function($join){
                                $join->on('vd.vehicle_id', 'vf.vehicle_id')
                                ->where('vf.features_for', 1);
                            })                            
                        ->leftJoin('master_data as md4', 'vf.option_name', 'md4.master_data_id')                        
                        ->leftJoin('document_details as dd', function ($join) {
                                $join->on('vd.vehicle_id', '=', 'dd.vehicle_id')
                                     ->where('dd.file_for', '=', 'image_document')
                                     ->where('dd.document_details_id',
                                     DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for  )"));
                            })
                        ->where('vd.available_status',1)
                        ->select('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value as vehicle_brand',
                                    'md1.master_value as vehicle_seat_type','md.master_value','md2.master_value as vehicle_driving_type','dd.file_url','dd.file_path'
                                    ,DB::raw('group_concat(md4.master_value) as options')
                                    ,DB::raw('group_concat(md4.image_url) as options_url')
                                    // ,DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for)")
                                    ,'vd.default_rent'
                                    )
                        ->groupBy('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value',
                                    'md1.master_value','md.master_value','md2.master_value','dd.file_url','dd.file_path','vd.default_rent')->get();
        }
        
        print_r($test);
        die();
            $total_row = $query1->count();
            $output = '';
            if($total_row > 0)
            {
                foreach($query1 as $row)
                {
                $output .= '
                <div class="row rosy">
                  <div class="col-md-4">';
                    if( ($row->file_url != '') || (file_exists($row->file_path)) ){
                    $output .= '<img src="'.$row->file_url.'" class="addnewsava" style="width: 186; height: 116;" >';
                    }else{
                    $output .= '<img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/six.jpg" class="caro">';
                    }
                $output .= '</div>
                  <div class="col-md-8">
                     <div class="row">
                        <div class="col-md-7">
                           <p class="typoo">Type de vechicule : '.$row->vehicle_driving_type.'</p>
                           <p class="typoo1">'.ucfirst($row->vehicle_brand).'</p>';
                           $opt_arr = explode (",", $row->options);
                           $opt_url_arr = explode (",", $row->options_url);
                           foreach($opt_arr as $key => $oa){
                            $output .= '<span class="opti">'; if($opt_url_arr[$key] != ""){ $output .= '<img src="'.$opt_url_arr[$key].'" style="width: 35px;" />';}else{ $output .= ' - ';  }  
                            $output .= ''.$oa.'</span>';
                           }
                    $output .= '</div>
                        <div class="col-md-5">
                           <div class="col-md-12">'.$row->partner_id.'---'.$row->default_rent.'----'.$row->vehicle_id.'
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-7">
                           <img src="http://trentygo.coralmint.in/public/assets/home_screen/trenty/six.jpg" class="caro1">
                        </div>
                        <div class="col-md-5">
                           <div class="col-md-12 zero">
                              <p class="margik"><span class="fifty">50<i class="fa fa-euro"></i> / </span><span class="jour">jours</span></p>
                              <p class="margik"><span class="fifty1">150<i class="fa fa-euro"></i> / </span><span class="jour">au total</span></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>';
                }
            }
            else
            {
                $output = '<center><h3>No Matches Found</h3></center>';                
            }
            // echo $output;
            echo json_encode($output);
    }
  
}