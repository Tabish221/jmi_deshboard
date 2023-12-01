

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>JMI Brokers Landing Page</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{ URL::asset('/') }}landing-assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ URL::asset('/') }}landing-assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ URL::asset('/') }}landing-assets/css/form-elements.css">
        <link rel="stylesheet" href="{{ URL::asset('/') }}landing-assets/css/style.css">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-vi_3nMOTkHsuX70GObcv8q3k-FFb62g"></script>

<script>
var myCenter1=new google.maps.LatLng(40.706165,-74.011576);

function initialize()
{
var mapProp = {
  center:myCenter1,
  zoom:17,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap1"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter1,
       animation:google.maps.Animation.BOUNCE,
          icon:'https://www.jmibrokers.com/assets/img/greenmarker.ico'
  });

marker.setMap(map);
        var infowindow1 = new google.maps.InfoWindow({
        content:'JMI Brokers LTD'});
        google.maps.event.addListener(marker, 'mouseover', function() {
        infowindow1.open(map,marker);
        });
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>


<script>
var myCenter2=new google.maps.LatLng(25.065853,55.134149);

function initialize()
{
var mapProp = {
  center:myCenter2,
  zoom:12,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap2"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter2,
       animation:google.maps.Animation.BOUNCE,
          icon:'https://www.jmibrokers.com/assets/img/greenmarker.ico'
  });

marker.setMap(map);
        var infowindow2 = new google.maps.InfoWindow({
        content:'JMI Brokers LTD'});
        google.maps.event.addListener(marker, 'mouseover', function() {
        infowindow2.open(map,marker);
        });
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>


<script>
var myCenter3=new google.maps.LatLng(29.963474,31.274750);

function initialize()
{
var mapProp = {
  center:myCenter3,
  zoom:13,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap3"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter3,
       animation:google.maps.Animation.BOUNCE,
          icon:'https://www.jmibrokers.com/assets/img/greenmarker.ico'
  });

marker.setMap(map);
        var infowindow3 = new google.maps.InfoWindow({
        content:'JMI Brokers LTD'});
        google.maps.event.addListener(marker, 'mouseover', function() {
        infowindow3.open(map,marker);
        });
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>


    </head>

    <body style="background-color: #333;">

<script type="text/javascript">
// <![CDATA[
var google_conversion_id = 926258798;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
// ]]>
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/926258798/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>



    <style>


body {
    background-color: #dedede;
    font-family: Arial,sans-serif;
    font-size: 12px;
    line-height: 1;
}
ul, ol {
    list-style: outside none none;
}
li:first-child {
    padding-bottom: 5px;
}
a {
    color: #2d97fd;
}
a:hover {
    text-decoration: underline;
}
.clear {
    clear: both;
    font-size: 0;
    height: 0;
    line-height: 0;
}
#wrap {
    margin: 8px auto 0;
    width: 960px;
}
#wrap .main-height {
    margin: 0 !important;
    position: static !important;
}
#wrap .main-width {
    left: 0 !important;
    margin-left: 0 !important;
}
#main {
    left: 50%;
    margin-left: -480px;
    position: absolute;
    top: 50%;
    width: 960px;
    z-index: 9;
}
.img-rep {
    text-indent: -9999px;
}
#inner {
    position: relative;
}
#main-flash-inner {
    display: block;
}
#contact-form {
    border: 0 solid green;
    height: 145px;
    position: absolute;
    right: 440px;
    text-indent: 0;
    top: 235px;
}
#main-form {
    border: 0 solid orange;
    height: 143px;
    padding: 0;
    position: relative;
}
#main-form .form-line {
    float: left;
    height: 27px;
    margin: 9px 24px 0 0;
    position: relative;
    width: 197px;
    z-index: 9;
}
#main-form .form-line label {
    color: #ffffff;
    display: none;
    font-size: 12px;
    font-weight: normal;
    line-height: 19px;
    margin-right: 10px;
}
#main-form .form-line .input_bg {
    background-color: #ffffff;
    border-radius: 6px;
    float: right;
    height: 27px;
    overflow: hidden;
    width: 210px;
}
#main-form .form-line .input_bg input {
    background: transparent none repeat scroll 0 0;
    direction: rtl;
    font-family: arial;
    font-size: 13px;
    height: 27px;
    line-height: 29px;
    margi-n: 0 12px 0 27px;
    width: 210px;
}
#main-form .form-line .input_bg input#country {
    width: 228px;
}
#main-form .form-status {
    bottom: 9px;
    height: 10px;
    position: absolute;
    right: 175px;
    width: 10px;
}
#main-form .form-error {
    background: rgba(0, 0, 0, 0) url("/lp/shared/iforex/media/sprites03.png") no-repeat scroll 1px -81px;
}
#main-form .form-valid {
    background: rgba(0, 0, 0, 0) url("/lp/shared/iforex/media/sprites03.png") no-repeat scroll -16px -80px;
}
#form-submit {
    background-color: transparent;
    background-repeat: no-repeat;
    border: 0 none;
    cursor: pointer;
    float: left;
    height: 46px;
    position: absolute;
    right: 293px;
    top: 89px;
    width: 188px;
}
#form-agree {
    border: 0 solid green;
    bottom: 35px;
    direction: rtl;
    position: absolute;
    right: 25px;
    width: 235px;
}
#form-agree #conditions {
    height: 13px;
    margin-right: 0;
    position: relative;
    right: 0;
    text-align: right;
    top: 14px;
    width: 13px;
}
#form-agree label {
    color: #000000;
    cursor: pointer;
    float: right;
    font-size: 13px;
    font-weight: normal;
    height: 13px;
    line-height: 13px;
    margin: 0 20px 0 0;
}
#age-18 {
    background: rgba(0, 0, 0, 0) url("/lp/shared/iforex/media/sprites03.png") no-repeat scroll 0 -50px;
    bottom: 16px;
    height: 13px;
    position: absolute;
    right: 25px;
    width: 26px;
}
#EU {
    background: rgba(0, 0, 0, 0) url("/lp/shared/iforex/media/mifid.png") no-repeat scroll 0 0;
    bottom: 16px;
    height: 13px;
    position: absolute;
    right: 60px;
    width: 50px;
}
button::-moz-focus-inner, input[type="button"]::-moz-focus-inner, input[type="submit"  ]::-moz-focus-inner, input[type="reset"]::-moz-focus-inner {
    border: 0 none !important;
    padding: 0 !important;
}
#count_autoc {
    background-position: -218px 8px;
    background-repeat: no-repeat;
    border-left: 2px solid #2f2f2f;
    cursor: pointer;
    height: 28px;
    position: absolute;
    right: 2px;
    top: 4px;
    width: 30px;
}
#combobox {
    background: #ffffff none repeat scroll 0 0;
    border: 1px solid #636363;
    display: none;
    height: 120px;
    overflow-y: auto;
    position: absolute;
    right: 0;
    top: 36px;
    width: 278px;
    z-index: 9999;
}
#combobox li {
    cursor: pointer;
    font: ;
    font-size: 12px;
    line-height: 16px;
    margin: 0;
    overflow: hidden;
    padding: 2px 5px;
}
.comboOdd {
    background-color: #eeeeee;
}
.comboHover {
    background-color: #0a246a;
    color: white;
}
body .ac_results {
    border: 1px solid #636363 !important;
    margin-left: -1px !important;
    margin-top: 0 !important;
    width: 278px !important;
}
body .ac_results ul {
    max-height: 120px !important;
}
#footer {
    background: #b8b7b7 none repeat scroll 0 0;
    color: #252525;
    direction: ltr;
    height: auto !important;
    margin-top: -47px;
    min-height: 68px;
    padding-top: 20px;
    position: absolute;
    text-align: justify;
    top: 100%;
    width: 100%;
}
#read_all {
    cursor: pointer;
    float: right;
    padding: 0 0 10px 8px;
}
.footer-static {
    margin-top: 20px !important;
    position: static !important;
}
.footer-inner {
    line-height: 14px;
    margin: 0 auto;
    padding: 4px 0;
    width: 960px;
}
#footer .main-line {
    padding-top: 6px;
}
.btn-block a {
    font-size: 12px;
}
.blue {
    color: #2d97fd;
    text-decoration: underline;
}
#policy {
    display: inline-block;
    margin-bottom: 12px;
}
#disclaimers {
    height: 376px;
    padding: 20px 25px;
    width: 460px;
}
#disc_button {
    font-size: 11px;
    padding: 7px 2px 0;
    width: 164px;
}
.lightbox-medium .text-block {
    padding-bottom: 15px;
}
.lightbox-large p, .lightbox-large strong {
    font-size: 15px;
    line-height: 21px;
}
.lightbox h2, .lightbox p, .lightbox span {
    background: transparent none repeat scroll 0 0;
}
.lightbox-medium {
    direction: rtl;
}


    </style>

        <?PHP

            if(empty(session('ref'))){
                if(isset($_GET['ref'])) {

                   $ref = $_GET['ref'];
                    session()->put('ref', $ref);
                }
            }
         ?>

    <?PHP
            if(empty(session('refeer_cookie'))){
                    session()->put('refeer_cookie', 'landing 3');
                }
        ?>

<div id="wrap"> <!-- wrap Start -->

        <div style="height: 655px; margin-top: -352.5px;" id="main" class="main-height"><!-- main Start -->

            <div style="height: 655px; background: transparent url('/assets/landing/ShareFortune2_br1_arb.jpg') no-repeat scroll 0px 0px;" class="img-rep" id="inner"><!--inner Start-->



                <div id="contact-form"> <!-- contact Start -->

                    <form id="main-form" action="{{ URL::to('/en/landingpage3') }}" id="landing-form" method="post">
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-line"><!-- lastname -->
        <div rel="lastname" class="form-status"></div>
        <label>إسم&nbsp;العائلة</label>
        <div class="input_bg">
            <input type="text" title="إسم العائلة" rel="إسم العائلة" placeholder="إسم العائلة" id="lastname" name="lastname" style="color: rgb(61, 61, 61);"  required>
        </div>
    </div>

    <div class="form-line"><!-- firstname -->
        <div rel="firstname" class="form-status"></div>
        <label>الإسم&nbsp;الشخصي</label>
        <div class="input_bg">
            <input type="text" title="الإسم الشخصي" rel="الإسم الشخصي" id="firstname" placeholder="الإسم الشخصي" name="name" style="color: rgb(61, 61, 61);" required>
        </div>
    </div>

    <div class="clear"></div>

    <div class="form-line">
        <div class="form-status"></div>
        <label>الهاتف</label>
        <div class="input_bg">
            <input type="text" title="الهاتف" rel="الهاتف" id="phone" placeholder="الهاتف" name="phone" style="color: rgb(61, 61, 61);" required>
        </div>
    </div>
                             <input type="hidden" name="landing_name" value="landing3">

    <div class="form-line"><!-- email -->
        <div rel="email" class="form-status"></div>
        <label>البريد الإلكتروني</label>
        <div class="input_bg">
            <input type="email" title="البريد الإلكتروني" rel="البريد الإلكتروني" placeholder="البريد الإلكتروني" id="email" name="email" style="color: rgb(61, 61, 61);" required>
        </div>
    </div>

    <div style="display: none;" class="form-line country"><!-- country -->
        <div class="form-status"></div>

        <div id="combobox"><ul><li>Afghanistan</li><li class="comboOdd">Aland Island</li><li>Albania</li><li class="comboOdd">Algeria</li><li>American Samoa</li><li class="comboOdd">Andorra</li><li>Angola</li><li class="comboOdd">Anguilla</li><li>Antarctica</li><li class="comboOdd">Antigua and Barbuda</li><li>Argentina</li><li class="comboOdd">Armenia</li><li>Aruba</li><li class="comboOdd">Australia</li><li>Austria</li><li class="comboOdd">Azerbaijan</li><li>Bahamas</li><li class="comboOdd">Bahrain</li><li>Bangladesh</li><li class="comboOdd">Barbados</li><li>Belarus</li><li class="comboOdd">Belgium</li><li>Belize</li><li class="comboOdd">Benin</li><li>Bermuda</li><li class="comboOdd">Bhutan</li><li>Bolivia</li><li class="comboOdd">Bosnia and Herzegowina</li><li>Botswana</li><li class="comboOdd">Bouvet Island</li><li>Brazil</li><li class="comboOdd">British Indian Ocean Terr</li><li>Brunei Darussalam</li><li class="comboOdd">Bulgaria</li><li>Burkina Faso</li><li class="comboOdd">Burundi</li><li>Cambodia</li><li class="comboOdd">Cameroon</li><li>Canada</li><li class="comboOdd">Cape Verde</li><li>Cayman Islands</li><li class="comboOdd">Central African Rep</li><li>Chad</li><li class="comboOdd">Chile</li><li>China</li><li class="comboOdd">Christmas Island</li><li>Cocos (Keeling) Islands</li><li class="comboOdd">Colombia</li><li>Comoros</li><li class="comboOdd">Congo</li><li>Congo the Democratic Rep</li><li class="comboOdd">Cook Islands</li><li>Costa Rica</li><li class="comboOdd">Croatia</li><li>Cuba</li><li class="comboOdd">Cyprus</li><li>Czech Republic</li><li class="comboOdd">Denmark</li><li>Djibouti</li><li class="comboOdd">Dominica</li><li>Dominican Republic</li><li class="comboOdd">Ecuador</li><li>Egypt</li><li class="comboOdd">El Salvador</li><li>Equatorial Guinea</li><li class="comboOdd">Eritrea</li><li>Estonia</li><li class="comboOdd">Ethiopia</li><li>Falkland Islands (Malvinas)</li><li class="comboOdd">Faroe Islands</li><li>Fiji Islands</li><li class="comboOdd">Finland</li><li>France</li><li class="comboOdd">French Guiana</li><li>French Polynesia</li><li class="comboOdd">French Southern Territories</li><li>Gabon</li><li class="comboOdd">Gambia</li><li>Georgia</li><li class="comboOdd">Germany</li><li>Ghana</li><li class="comboOdd">Gibraltar</li><li>Greece</li><li class="comboOdd">Greenland</li><li>Grenada</li><li class="comboOdd">Guadeloupe</li><li>Guam</li><li class="comboOdd">Guatemala</li><li>Guinea</li><li class="comboOdd">Guinea-Bissau</li><li>Guyana</li><li class="comboOdd">Haiti</li><li>Heard and McDonald Isl</li><li class="comboOdd">Holy See (Vatican City)</li><li>Honduras</li><li class="comboOdd">Hong Kong</li><li>Hungary</li><li class="comboOdd">Iceland</li><li>India</li><li class="comboOdd">Indonesia</li><li>Iraq</li><li class="comboOdd">Ireland</li><li>Islamic Republic of Iran</li><li class="comboOdd">Palestine</li><li>Italy</li><li class="comboOdd">Ivory Coast (Cote d'Ivoire)</li><li>Jamaica</li><li class="comboOdd">Japan</li><li>Jordan</li><li class="comboOdd">Kazakhstan</li><li>Kenya</li><li class="comboOdd">Kiribati</li><li>Korea [North]</li><li class="comboOdd">Korea [South]</li><li>Kuwait</li><li class="comboOdd">Kyrgyzstan</li><li>Laos</li><li class="comboOdd">Latvia</li><li>Lebanon</li><li class="comboOdd">Lesotho</li><li>Liberia</li><li class="comboOdd">Libyan Arab Jamahiriya</li><li>Liechtenstein</li><li class="comboOdd">Lithuania</li><li>Luxembourg</li><li class="comboOdd">Macau</li><li>Macedonia</li><li class="comboOdd">Madagascar</li><li>Malawi</li><li class="comboOdd">Malaysia</li><li>Maldives</li><li class="comboOdd">Mali</li><li>Malta</li><li class="comboOdd">Marshall Islands</li><li>Martinique</li><li class="comboOdd">Mauritania</li><li>Mauritius</li><li class="comboOdd">Mayotte</li><li>Mexico</li><li class="comboOdd">Micronesia</li><li>Moldova</li><li class="comboOdd">Monaco</li><li>Mongolia</li><li class="comboOdd">Montenegro</li><li>Montserrat</li><li class="comboOdd">Morocco</li><li>Mozambique</li><li class="comboOdd">Myanmar</li><li>Namibia</li><li class="comboOdd">Nauru</li><li>Nepal</li><li class="comboOdd">Netherlands</li><li>Netherlands Antilles</li><li class="comboOdd">New Caledonia</li><li>New Zealand</li><li class="comboOdd">Nicaragua</li><li>Niger</li><li class="comboOdd">Nigeria</li><li>Niue</li><li class="comboOdd">Norfolk Island</li><li>North Mariana Islands</li><li class="comboOdd">Norway</li><li>Oman</li><li class="comboOdd">Pakistan</li><li>Palau</li><li class="comboOdd">Palestinian Authority </li><li>Panama</li><li class="comboOdd">Papua New Guinea</li><li>Paraguay</li><li class="comboOdd">Peru</li><li>Philippines</li><li class="comboOdd">Pitcairn</li><li>Poland</li><li class="comboOdd">Portugal</li><li>Puerto Rico</li><li class="comboOdd">Qatar</li><li>Reunion</li><li class="comboOdd">Romania</li><li>Russian Federation</li><li class="comboOdd">Rwanda</li><li>S Georgia, Sandwich Isl</li><li class="comboOdd">Saint Barthelemy</li><li>Saint Helena,Ascension and Tristan Da Cunha</li><li class="comboOdd">Saint Kittis and Nevis</li><li>Saint Lucia</li><li class="comboOdd">Saint Martin</li><li>Saint Pierre and Miquelon</li><li class="comboOdd">Saint Vincent ,Grenadines</li><li>Samoa</li><li class="comboOdd">San Marino</li><li>Sao Tome and Principe</li><li class="comboOdd">Saudi Arabia</li><li>Senegal</li><li class="comboOdd">Serbia</li><li>Serbia and Montenegro</li><li class="comboOdd">Seychelles</li><li>Sierra Leone</li><li class="comboOdd">Singapore</li><li>Slovakia (Slovak Republic)</li><li class="comboOdd">Slovenia</li><li>Solomon Islands</li><li class="comboOdd">Somalia</li><li>South Africa</li><li class="comboOdd">South Sudan</li><li>Spain</li><li class="comboOdd">Sri Lanka</li><li>Sudan</li><li class="comboOdd">Suriname</li><li>Svalbard</li><li class="comboOdd">Swaziland</li><li>Sweden</li><li class="comboOdd">Switzerland</li><li>Syrian Arab Republic</li><li class="comboOdd">Taiwan</li><li>Tajikistan</li><li class="comboOdd">Tanzania</li><li>Thailand</li><li class="comboOdd">Timor-Leste</li><li>Togo</li><li class="comboOdd">Tokelau</li><li>Tonga</li><li class="comboOdd">Trinidad and Tobago</li><li>Tunisia</li><li class="comboOdd">Turkey</li><li>Turkmenistan</li><li class="comboOdd">Turks and Caicos Islands</li><li>Tuvalu</li><li class="comboOdd">Uganda</li><li>Ukraine</li><li class="comboOdd">United Arab Emirates</li><li>United Kingdom</li><li class="comboOdd">United Kingdom</li><li>United States of America</li><li class="comboOdd">Uruguay</li><li>US Minor Outlying Islands</li><li class="comboOdd">Uzbekistan</li><li>Vanuatu</li><li class="comboOdd">Venezuela</li><li>Viet Nam</li><li class="comboOdd">Virgin Islands (British)</li><li>Virgin Islands (US)</li><li class="comboOdd">Wallis And Futuna</li><li>Western Sahara</li><li class="comboOdd">Yemen</li><li>Zambia</li><li class="comboOdd">Zimbabwe</li></ul></div>
        <label>الدّولة</label>
        <div class="input_bg">
            <input type="text" title="الدّولة" rel="الدّولة" value="" id="country" name="country" autocomplete="off" class="ac_input">
        </div>
    </div>

    <div class="clear"></div>

    <input type="submit"   id="form-submit" value="" name="submit">

    <div class="clear"></div>

    <div id="EU"></div>
    <div id="age-18"></div>

    <div id="form-agree" style="display: none;">
        <input type="checkbox" checked="checked" id="conditions" name="conditions">
        <label for="conditions">أوافق على تلقي الرسائل اﻹلكترونية من ايفوركس</label>
    </div>

</form>
                    <div style="display:none; background-image: url(media/form_sprites.png);" id="form_sprites"></div>

                </div> <!-- contact End -->

            </div><!--inner End-->

        </div><!-- main End -->

    </div>
































        <div class="row grasy_bg mrtb40">
        <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/css/Dash-styles.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/css/Style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/css/statistics.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/css/priceticker.css') }}" rel="stylesheet" type="text/css" />
<style>
    p, span{color:#fff !important;font-size:15px !important;}
     h5,a{font-size:16px;}

</style>

<style>
    p,h1,h2,h3,h4,h5,h6,a,span{color:#fff  !important;}

</style>
<!--

<div class="row gray_bgs mrtb40" dir="rtl">
        <div class="container" style="width:960px;padding:0px;">
            <div class="row col-sm-12" style="margin-top:20px;padding:0px;">
<h2 class="text-center">
المقرالرئيسى JMIBrokers LTD في الولايات المتحدة
 </h2><br />
  <div style="width:60%;float:left;">
        <div id="googleMap1" style="width:100%;height:300px;float:left;"></div><br />
        <div style="float:left;margin:0 15px;text-align:right;">
                <h5>تفاصيل العنوان</h5>
                <p>
                   وول ستريت - الحى المالى - الاجنحة التنفيذية
                    <br />
                    30 برودستريت الطابق <br />
                    14 مدينة نيويورك <br />
                    1004 الولايات المتحدة .  <br />


                </p>
        </div>
        <div style="float:left;margin:0 15px;">
                <div class="speacer10"></div>

                <h5 style="text-align:right;">رقم التليفون:<span class="span-no"> +18665652126</span></h5>

                <h5>فاكس: &nbsp;&nbsp;&nbsp;<span class="span-no"> +18665683978</span></h5>

                <div class="speacer10"></div>
        </div>
        <div style="float:left;margin:0 15px;">
                <h5>التواصل</h5>

                <div class="speacer20"></div>

                <a href="mailto:support@jmibrokers.com">support@jmibrokers.com.</a>


                <div class="speacer10"></div>

                <a href="mailto:support@jmibrokers.com">support@jmibrokers.com.</a>

                <div class="speacer10"></div>

                <a href="mailto:Partners@jmibrokers.com">Partners@jmibrokers.com</a>
        </div>

  </div>

<div style="widsth:40%;float:right;"><img src="{{ URL::asset('assets/img/new%20york.jpg') }}" alt="" class="img-responsive center-block hg475" /></div>

            </div>



<div class="row col-sm-12" style="margin-top:20px;padding:0px;">

                    <h2 class="text-center">المكتب الإقليمي لشركة JMIBrokers LTD </h2><br />
  <div class="col-sm-6" style="width:50%;float:left;">
        <div id="googleMap2" style="width:100%;height:300px;float:left;"></div><br />
        <div style="float:left;margsin:0 15px;text-align:right;">
                <h5>تفاصيل العنوان</h5>
                    <p>
                        طريق الشيخ زايد - downtown
                        <br />
                        دبى - الأمارات.
                    </p>
        </div>

        <div style="float:left;margsin:0 15px;text-align:right;">
                <h5>بيانات التواصل</h5>

                <div class="speacer20"></div>
                    <h5>رقم التليفون:<span class="span-no">  +97144096705</span></h5>
                    <h5>الفاكس:<span class="span-no pl40">  +97144096740</span></h5>
                    <h5>الايميل: &nbsp;&nbsp;&nbsp;&nbsp; <a href="mailto:support@jmibrokers.com">support@jmibrokers.com.</a></h5>

        </div>

  </div>

<div class="col-sm-5" style="float:right;"><img width="120%" src="{{ URL::asset('assets/img/vs.jpg') }}" alt="" class="img-responsive center-block hg475" /></div>


</div>


<div class="row col-sm-12" style="margin-top:20px;padding:0px;">

    <br /><br />


    <h2 class="text-center"> JMIBrokers LTD Egypt Office </h2><br />
  <div style="width:60%;float:left;">
        <div id="googleMap3" style="width:100%;height:300px;float:left;"></div><br />
        <div style="float:left;masrgin:0 15px;text-align:right;">
                <h5>تفاصيل العنوان</h5>
                <p>
                    216 دجلة
                    <br />
                    ثكنات المعادى
                    <br />
                   القاهرة - مصر
                </p>
        </div>

        <div style="float:left;marsgin:0 15px;text-align:right;">
                <h5>بيانات التواصل</h5>

                <div class="speacer20"></div>
                <h5>رقم التليفون:<span class="span-no"> +225166835</span></h5>

                <h5>الأيميل: &nbsp;&nbsp;&nbsp;&nbsp; <a href="mailto:egypt.office@jmibrokers.com">egypt.office@jmibrokers.com</a></h5>

        </div>

  </div>

<div style="width:35%;float:right;"><img width="100%" src="{{ URL::asset('assets/img/cairo-city.jpg') }}" alt="" class="img-responsive center-block hg475" /></div>




</div>
        </div>
    </div>
-->

                <div class="row-fluid">
                <div class="copyright" style="padding:20px;">
                    <div class="container">
                        <div class="col-md-12 text-center">
                            <p style="text-align:center;">
                                <span style="font-size:14px;">تحذير من المخاطر</span> : العقود مقابل الفروقات هي منتجات مع رافعة مالية والتي
 قد ينجم عنها درجة عالية من المخاطرة، ومن الممكن أن
 تؤدي إلى فقدان كامل رأس المال وقد لا تكون مناسبة
 لكافة المستثمرين. يجب أن لا تخاطر بأكثر مما أنت على
 استعداد أن تخسره وقبل اتخاذ القرار بالتداول، يرجى
 التأكد من أنك تفهم المخاطر التي تنطوي على ذلك، مع
 الأخذ في الاعتبار مستوى خبراتك والحصول على مشورة مستقلة إن لزم الأمر. نحن، وبشكل حازم، لا نقدم المشورة
 في مجال الاستثمار
                            </p>



                        </div>
                    </div>
                </div>
            </div>





        <script src="{{ URL::asset('/') }}landing-assets/js/jquery-1.11.1.min.js"></script>
        <script src="{{ URL::asset('/') }}landing-assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ URL::asset('/') }}landing-assets/js/jquery.backstretch.min.js"></script>
        <script src="{{ URL::asset('/') }}landing-assets/js/retina-1.1.0.min.js"></script>
        <script src="{{ URL::asset('/') }}landing-assets/js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->



<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-171709819-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-171709819-1');
</script>


<!-- Global site tag (gtag.js) - Google Ads: 614480721 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-614480721"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-614480721');
</script>

<!-- Event snippet for Sign-ups conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-614480721/5aE_CO2o7tgBENH2gKUC'});
</script>



<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1300288966841358');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1300288966841358&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


    </body>

</html>
