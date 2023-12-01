<!DOCTYPE html>
<html>
	<head>
				<title>JMI Brokers Landing Page</title>
    		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        <style>
            body
            {
                overflow-x:hidden;
            }
            #newLogin
            {
              display-: flex;
              align-items: center;
            }
            #newLogin img
            {
                width: 50px;
            }
            #newLogin h2
            {
              color:#0057af;
              font-family: 'Roboto-Bold';
              margin: 0px 0px 0px 10px;
              font-size: 30px;
              font-weight: bold;
            }
						#newLogin h3
            {
              color:#0057af;
              font-family: 'Roboto-Bold';
              margin: 0px 0px 0px 10px;
              font-size: 22px !important;
              font-weight: bold;
            }
            input:-webkit-autofill,
            input:-webkit-autofill:hover,
            input:-webkit-autofill:focus,
            input:-webkit-autofill:active
            {
                -webkit-box-shadow: 0 0 0 30px white inset !important;
            }
            #send
            {
                background-color: #fdbe01 !important;
                color: white !important;
                border-radius: 4px;
                border: 1px solid #bfbfbf !important;
                padding: 6px 30px !important;
                width: auto;
                max-width: 100% ;
                display: flex;
                margin: 10px auto;
                font-weight: bold;
                font-size: 15px;
            }
            form
            {
                width:100%;
                max-width: 330px;
            }
            #form
            {
								padding-left: 30px;
                margin-top: 50px;
								align-items: flex-start !important;
            }
            #form h3
            {
                font-size: 10px;
                color: #0057af;
                font-weight: bold;
                font-family: 'Roboto-Bold';
            }
            .controls
            {
                margin:5px;
            }
            .input-container
            {
                display: flex;
                background-color: white;
                border: 1px solid #bfbfbf;
                margin-bottom:10px;
                max-width: 270px !important;
                border-radius: 4px;
            }
            #bgContainer
            {

                background-image:url('/assets/m/img/bgDesk.jpg');
								height-: calc(100vh - 60px);
								min-height: 500px;
                background-size: 80% 100%;
            }
            #textSide
            {
                float:right;
            }
            .form-control
            {
                padding: 6px ;
            }
            select
            {
                padding: 6px 3px !important;
                color:#96929d !important;
            }
            input
            {
                color: #96929d !important;
            }
            .boldBlue
            {
                color: #0057af;
                font-family: 'roboto-bold';
                font-weight: bold;
                margin: 0px;
                font-size: 16px;
                padding: 5px 0px 5px 10px;
            }
            .boldBlue img
            {
                width: 25px;
            }
            .bgOrange
            {
                font-size: 20px;
                margin: 35px 0px 15px 0px;
                background-color: #fdbe01;

            }
            .imgNtext
            {
                display: flex;
                align-items: center;
            }
            .imgNtext img
            {
                width: 30px;
                height: 30px;
            }
            .imgNtext h5
            {
                font-size: 10px;
                padding: 0px 10px;
            }
						#logo
						{
							padding: 0px 15px;
							display: flex;
    					align-items: center;
						}
            #logo img
            {
                width: 270px;
            }
            #logo h1
            {
                font-family: 'roboto-bold';
                color: #ffc928;
                font-weight: bold;
                font-size: 27px;
                text-align: center;
                padding: 0px 10px;
            }
            #blueDiv
            {
                background-color: #0059b3;
                height: 40px;
            }
            #orangeDiv
            {
                background-color: #fdbe01;
                height: 40px;
                display: flex;
                align-items: center;
            }
            #orangeDiv h4
            {
                display: inline-block;
                color: white;
                font-weight: bold;
            }
            #orangeDiv i
            {
                color: white;
                font-size: 25px;
                padding: 0px 7px;
            }
            #hiddenImg
            {
                display: none;
						}
						@media only screen and (max-width:991px)
						{
							form
							{
									max-width: 500px;
									margin: 0px auto;
							}
							#form
							{
									margin-top: 15px;
									background-color: #e8e8e8;
									display: flex;
									flex-direction: column;
									align-items: center !important;
							}
							#textSide
							{
									max-width: 500px;
									margin: 0px auto;
									float: none;
									position: inherit;
									padding-bottom: 40px;
							}
							#form h3
							{
						    font-size: 16px;
							}
							#hiddenImg
							{
									display: block;
									padding: 0px;
							}
							#hiddenImg img
							{
									width: 100%;
							}
							#bgContainer
							{
									background-image:none;
									height: auto;
							}
							#newLogin
							{
								padding: 20px 0px 5px 0px;
							}
							#newLogin h2
							{
								font-size: 35px;
							}
						}
            @media only screen and (max-width:768px)
            {
							#form
							{
    						margin-top: 0;
							}
							#orangeDiv i
							{
								font-size: 20px;
								padding: 0px 0px 0px 10px;
							}
							#orangeDiv h4
							{
								font-size: 14px;
							}
							#logo h1
							{
								font-size: 15px;
							}
							#logo img
							{
								width:90%;
								padding-left: 10px;
							}
							.imgNtext h5
							{
						    font-size: 11px;
							}


                #newLogin
                {
										margin-top: 5px;
    								padding: 20px 0px 0px 0px;
                }

                #form h3
                {
                    font-size: 14px;
										margin: 10px auto;
                }
                #newLogin h2
                {
                    font-size: 30px;
                }



            }
						  @media only screen and (max-width:500px)
							{
								#orangeDiv h4
								{
								    font-size: 11px;
								}
								#orangeDiv i
								{
								font-size: 16px;
								padding: 0px 0px 0px 4px;
								}
								#orangeDiv
								{
							    padding: 4px;
								}
								#logo h1 {
    font-size: 12px;
		padding: 0px;
    margin: 10px 0px;
	}
	#logo div {padding: 0px}
	#newLogin h2 {
    font-size: 24px;
    margin: 0;}
		#form h3 {
    font-size: 8px;
	}#newLogin h3 {
    font-size: 18px;
    margin: 0;}
		#form h3 {
    font-size: 8px;
	}
	.boldBlue
	{
		font-size: 13px;
	}
	.bgOrange {
    font-size: 17px;
	}
	.imgNtext h5 {
		font-size: 8px;
    line-height: 10px;
	}
	.imgNtext img {
    width: 25px;
    height: 25px;
	}
							}
            p,span,h1,h2,h3,h4,h5,h6{font-family: 'Roboto' !important;}
        </style>
	</head>
	<body>
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
              session()->put('refeer_cookie', 'Youtube 2');
                }
        ?>
				<!--
				<div id="header" class="row">
						<div id="blueDiv" class="col-sm-8 col-xs-7">

						</div>
						<div id="orangeDiv" class="col-sm-4 col-xs-5">
								<h4>CONTACT US</h1>
								<a href=""><i class="fab fa-facebook-f"></i></a>
								<a href=""><i class="fas fa-phone-alt"></i></a>
								<a href=""><i class="fas fa-envelope"></i></a>
						</div>
				</div>
				-->
        <div id="logo" class="row">
            <div class="col-xs-6">

              <a href="/">
                <img src="https://www.jmibrokers.com/elis/img/fin-logo2.png">
              </a>

            </div>
            <div class="col-xs-6">
                <h1>FOREX TRADING, GOLD, OIL, BRITISH AND AMERICAN STOCKS</h1>
            </div>
        </div>
        <div id="bgContainer" class="row">
            <div id="form" class="col-sm-12 col-md-4">
                <div id="newLogin" style="float:left;">
                    <img src ="/assets/m/img/STradingicon.png">
                </div>
								<div id="newLogin">
										<h2> FILL YOUR INFORMATION</h2>
										<h3> TO GO TO THE MAIN PAGE</h3>
								</div>

                <form role="form" id="landing-form" action="{{ URL::to('/en/landingpage1') }}" method="post" >
                    <div class="controls">
                        <input  type="text" class="form-control" id="fullname" name="name" placeholder="First Name:" required>
                    </div>
                    <div class="controls">
                        <input  type="text" class="form-control" id="family" name="lastname" placeholder="Family Name" required>
                    </div>
                    <div class="controls selCtl">
                        <input type="hidden" name="landing_name" value="display1">
                        <select name="country" id="country"  class="form-control" onchange="countryfun();" required>
                            <option  value=""  disabled selected hidden>country:</option>
                            <option data-countryCode="DZ" value="Algeria">Algeria </option>
                            <option data-countryCode="AD" value="Andorra">Andorra </option>
                            <option data-countryCode="AO" value="Angola">Angola </option>
                            <option data-countryCode="AI" value="Anguilla">Anguilla </option>
                            <option data-countryCode="AG" value="Antigua">Antigua &amp; Barbuda </option>
                            <option data-countryCode="AR" value="Argentina">Argentina </option>
                            <option data-countryCode="AM" value="Armenia">Armenia </option>
                            <option data-countryCode="AW" value="Aruba">Aruba </option>
                            <option data-countryCode="AU" value="Australia">Australia </option>
                            <option data-countryCode="AT" value="Austria">Austria </option>
                            <option data-countryCode="AZ" value="Azerbaijan">Azerbaijan </option>
                            <option data-countryCode="BS" value="Bahamas">Bahamas </option>
                            <option data-countryCode="BH" value="Bahrain">Bahrain </option>
                            <option data-countryCode="BD" value="Bangladesh">Bangladesh </option>
                            <option data-countryCode="BB" value="Barbados">Barbados </option>
                            <option data-countryCode="BY" value="Belarus">Belarus </option>
                            <option data-countryCode="BE" value="Belgium">Belgium </option>
                            <option data-countryCode="BZ" value="Belize">Belize </option>
                            <option data-countryCode="BJ" value="Benin">Benin </option>
                            <option data-countryCode="BM" value="Bermuda">Bermuda </option>
                            <option data-countryCode="BT" value="Bhutan">Bhutan </option>
                            <option data-countryCode="BO" value="Bolivia">Bolivia </option>
                            <option data-countryCode="BA" value="Bosnia Herzegovina">Bosnia Herzegovina </option>
                            <option data-countryCode="BW" value="Botswana">Botswana </option>
                            <option data-countryCode="BR" value="Brazil">Brazil </option>
                            <option data-countryCode="BN" value="Brunei">Brunei </option>
                            <option data-countryCode="BG" value="Bulgaria">Bulgaria </option>
                            <option data-countryCode="BF" value="Burkina Faso">Burkina Faso </option>
                            <option data-countryCode="BI" value="Burundi">Burundi </option>
                            <option data-countryCode="KH" value="Cambodia">Cambodia </option>
                            <option data-countryCode="CM" value="Cameroon">Cameroon </option>
                            <option data-countryCode="CA" value="Canada">Canada </option>
                            <option data-countryCode="CV" value="Cape Verde Islands">Cape Verde Islands </option>
                            <option data-countryCode="KY" value="Cayman Islands">Cayman Islands </option>
                            <option data-countryCode="CF" value="Central African Republic">Central African Republic </option>
                            <option data-countryCode="CL" value="Chile">Chile </option>
                            <option data-countryCode="CN" value="China">China </option>
                            <option data-countryCode="CO" value="Colombia">Colombia </option>
                            <option data-countryCode="KM" value="Comoros">Comoros </option>
                            <option data-countryCode="CG" value="Congo">Congo </option>
                            <option data-countryCode="CK" value="Cook Islands">Cook Islands </option>
                            <option data-countryCode="CR" value="Costa Rica">Costa Rica </option>
                            <option data-countryCode="HR" value="Croatia">Croatia </option>
                            <option data-countryCode="CU" value="Cuba">Cuba </option>
                            <option data-countryCode="CY" value="Cyprus North">Cyprus North </option>
                            <option data-countryCode="CY" value="Cyprus South">Cyprus South </option>
                            <option data-countryCode="CZ" value="Czech Republic">Czech Republic </option>
                            <option data-countryCode="DK" value="Denmark">Denmark </option>
                            <option data-countryCode="DJ" value="Djibouti">Djibouti </option>
                            <option data-countryCode="DM" value="Dominica">Dominica </option>
                            <option data-countryCode="DO" value="Dominican Republic">Dominican Republic </option>
                            <option data-countryCode="EC" value="Ecuador">Ecuador </option>
                            <option data-countryCode="EG" value="Egypt">Egypt </option>
                            <option data-countryCode="SV" value="El Salvador">El Salvador </option>
                            <option data-countryCode="GQ" value="Equatorial Guinea">Equatorial Guinea </option>
                            <option data-countryCode="ER" value="Eritrea">Eritrea </option>
                            <option data-countryCode="EE" value="Estonia">Estonia </option>
                            <option data-countryCode="ET" value="Ethiopia">Ethiopia </option>
                            <option data-countryCode="FK" value="Falkland Islands">Falkland Islands </option>
                            <option data-countryCode="FO" value="Faroe Islands">Faroe Islands </option>
                            <option data-countryCode="FJ" value="Fiji">Fiji </option>
                            <option data-countryCode="FI" value="Finland">Finland </option>
                            <option data-countryCode="FR" value="France">France </option>
                            <option data-countryCode="GF" value="French Guiana">French Guiana </option>
                            <option data-countryCode="PF" value="French Polynesia">French Polynesia </option>
                            <option data-countryCode="GA" value="Gabon">Gabon </option>
                            <option data-countryCode="GM" value="Gambia">Gambia </option>
                            <option data-countryCode="GE" value="Georgia">Georgia </option>
                            <option data-countryCode="DE" value="Germany">Germany </option>
                            <option data-countryCode="GH" value="Ghana">Ghana </option>
                            <option data-countryCode="GI" value="Gibraltar">Gibraltar </option>
                            <option data-countryCode="GR" value="Greece">Greece </option>
                            <option data-countryCode="GL" value="Greenland">Greenland </option>
                            <option data-countryCode="GD" value="Grenada">Grenada </option>
                            <option data-countryCode="GP" value="Guadeloupe">Guadeloupe </option>
                            <option data-countryCode="GU" value="Guam">Guam </option>
                            <option data-countryCode="GT" value="Guatemala">Guatemala </option>
                            <option data-countryCode="GN" value="Guinea">Guinea </option>
                            <option data-countryCode="GW" value="Guinea - Bissau">Guinea - Bissau </option>
                            <option data-countryCode="GY" value="Guyana">Guyana </option>
                            <option data-countryCode="HT" value="Haiti">Haiti </option>
                            <option data-countryCode="HN" value="Honduras">Honduras </option>
                            <option data-countryCode="HK" value="Hong Kong">Hong Kong </option>
                            <option data-countryCode="HU" value="Hungary">Hungary </option>
                            <option data-countryCode="IS" value="Iceland">Iceland </option>
                            <option data-countryCode="IN" value="India">India </option>
                            <option data-countryCode="ID" value="Indonesia">Indonesia </option>
                            <option data-countryCode="IR" value="Iran">Iran </option>
                            <option data-countryCode="IQ" value="Iraq">Iraq </option>
                            <option data-countryCode="IE" value="Ireland">Ireland </option>
                            <option data-countryCode="IL" value="Palestine">Palestine </option>
                            <option data-countryCode="IT" value="Italy">Italy </option>
                            <option data-countryCode="JM" value="Jamaica">Jamaica </option>
                            <option data-countryCode="JP" value="Japan">Japan </option>
                            <option data-countryCode="JO" value="Jordan">Jordan </option>
                            <option data-countryCode="KZ" value="Kazakhstan">Kazakhstan </option>
                            <option data-countryCode="KE" value="Kenya">Kenya </option>
                            <option data-countryCode="KI" value="Kiribati">Kiribati </option>
                            <option data-countryCode="KP" value="Korea North">Korea North </option>
                            <option data-countryCode="KR" value="Korea South">Korea South </option>
                            <option data-countryCode="KW" value="Kuwait">Kuwait </option>
                            <option data-countryCode="KG" value="Kyrgyzstan">Kyrgyzstan </option>
                            <option data-countryCode="LA" value="Laos">Laos </option>
                            <option data-countryCode="LV" value="Latvia">Latvia </option>
                            <option data-countryCode="LB" value="Lebanon">Lebanon </option>
                            <option data-countryCode="LS" value="Lesotho">Lesotho </option>
                            <option data-countryCode="LR" value="Liberia">Liberia </option>
                            <option data-countryCode="LY" value="Libya">Libya </option>
                            <option data-countryCode="LI" value="Liechtenstein">Liechtenstein </option>
                            <option data-countryCode="LT" value="Lithuania">Lithuania </option>
                            <option data-countryCode="LU" value="Luxembourg">Luxembourg </option>
                            <option data-countryCode="MO" value="Macao">Macao </option>
                            <option data-countryCode="MK" value="Macedonia">Macedonia </option>
                            <option data-countryCode="MG" value="Madagascar">Madagascar </option>
                            <option data-countryCode="MW" value="Malawi">Malawi </option>
                            <option data-countryCode="MY" value="Malaysia">Malaysia </option>
                            <option data-countryCode="MV" value="Maldives">Maldives </option>
                            <option data-countryCode="ML" value="Mali">Mali </option>
                            <option data-countryCode="MT" value="Malta">Malta </option>
                            <option data-countryCode="MH" value="Marshall Islands">Marshall Islands </option>
                            <option data-countryCode="MQ" value="Martinique">Martinique </option>
                            <option data-countryCode="MR" value="Mauritania">Mauritania </option>
                            <option data-countryCode="YT" value="Mayotte">Mayotte </option>
                            <option data-countryCode="MX" value="Mexico">Mexico </option>
                            <option data-countryCode="FM" value="Micronesia">Micronesia </option>
                            <option data-countryCode="MD" value="Moldova">Moldova </option>
                            <option data-countryCode="MC" value="Monaco">Monaco </option>
                            <option data-countryCode="MN" value="Mongolia">Mongolia </option>
                            <option data-countryCode="MS" value="Montserrat">Montserrat </option>
                            <option data-countryCode="MA" value="Morocco">Morocco </option>
                            <option data-countryCode="MZ" value="Mozambique">Mozambique </option>
                            <option data-countryCode="MN" value="Myanmar">Myanmar </option>
                            <option data-countryCode="NA" value="Namibia">Namibia </option>
                            <option data-countryCode="NR" value="Nauru">Nauru </option>
                            <option data-countryCode="NP" value="Nepal">Nepal </option>
                            <option data-countryCode="NL" value="Netherlands">Netherlands </option>
                            <option data-countryCode="NC" value="New Caledonia">New Caledonia </option>
                            <option data-countryCode="NZ" value="New Zealand">New Zealand </option>
                            <option data-countryCode="NI" value="Nicaragua">Nicaragua </option>
                            <option data-countryCode="NE" value="Niger">Niger </option>
                            <option data-countryCode="NG" value="Nigeria">Nigeria </option>
                            <option data-countryCode="NU" value="Niue">Niue </option>
                            <option data-countryCode="NF" value="Norfolk Islands">Norfolk Islands </option>
                            <option data-countryCode="NP" value="Northern Marianas">Northern Marianas </option>
                            <option data-countryCode="NO" value="Norway">Norway </option>
                            <option data-countryCode="OM" value="Oman">Oman </option>
                            <option data-countryCode="PAK" value="Pakistan">Pakistan </option>
                            <option data-countryCode="PW" value="Palau">Palau </option>
                            <option data-countryCode="PA" value="Panama">Panama </option>
                            <option data-countryCode="PG" value="Papua New Guinea">Papua New Guinea </option>
                            <option data-countryCode="PY" value="Paraguay">Paraguay </option>
                            <option data-countryCode="PE" value="Peru">Peru </option>
                            <option data-countryCode="PH" value="Philippines">Philippines </option>
                            <option data-countryCode="PL" value="Poland">Poland </option>
                            <option data-countryCode="PT" value="Portugal">Portugal </option>
                            <option data-countryCode="PR" value="Puerto Rico">Puerto Rico </option>
                            <option data-countryCode="QA" value="Qatar">Qatar </option>
                            <option data-countryCode="RE" value="Reunion">Reunion </option>
                            <option data-countryCode="RO" value="Romania">Romania </option>
                            <option data-countryCode="RU" value="Russia">Russia </option>
                            <option data-countryCode="RW" value="Rwanda">Rwanda </option>
                            <option data-countryCode="SM" value="San Marino">San Marino </option>
                            <option data-countryCode="ST" value="Sao Tome &amp; Principe">Sao Tome &amp; Principe </option>
                            <option data-countryCode="SA" value="Saudi Arabia">Saudi Arabia </option>
                            <option data-countryCode="SN" value="Senegal">Senegal </option>
                            <option data-countryCode="CS" value="Serbia">Serbia </option>
                            <option data-countryCode="SC" value="Seychelles">Seychelles </option>
                            <option data-countryCode="SL" value="Sierra Leone">Sierra Leone </option>
                            <option data-countryCode="SG" value="Singapore">Singapore </option>
                            <option data-countryCode="SK" value="Slovak Republic">Slovak Republic </option>
                            <option data-countryCode="SI" value="Slovenia">Slovenia </option>
                            <option data-countryCode="SB" value="Solomon Islands">Solomon Islands </option>
                            <option data-countryCode="SO" value="Somalia">Somalia </option>
                            <option data-countryCode="ZA" value="South Africa">South Africa </option>
                            <option data-countryCode="ES" value="Spain">Spain </option>
                            <option data-countryCode="LK" value="Sri Lanka">Sri Lanka </option>
                            <option data-countryCode="SH" value="St. Helena">St. Helena </option>
                            <option data-countryCode="KN" value="St. Kitts">St. Kitts </option>
                            <option data-countryCode="SC" value="St. Lucia">St. Lucia </option>
                            <option data-countryCode="SD" value="Sudan">Sudan </option>
                            <option data-countryCode="SR" value="Suriname">Suriname </option>
                            <option data-countryCode="SZ" value="Swaziland">Swaziland </option>
                            <option data-countryCode="SE" value="Sweden">Sweden </option>
                            <option data-countryCode="CH" value="Switzerland">Switzerland </option>
                            <option data-countryCode="SI" value="Syria">Syria </option>
                            <option data-countryCode="TW" value="Taiwan">Taiwan </option>
                            <option data-countryCode="TJ" value="Tajikstan">Tajikstan </option>
                            <option data-countryCode="TH" value="Thailand">Thailand </option>
                            <option data-countryCode="TG" value="Togo">Togo </option>
                            <option data-countryCode="TO" value="Tonga">Tonga </option>
                            <option data-countryCode="TT" value="Trinidad &amp; Tobago">Trinidad &amp; Tobago </option>
                            <option data-countryCode="TN" value="Tunisia">Tunisia </option>
                            <option data-countryCode="TR" value="Turkey">Turkey </option>
                            <option data-countryCode="TM" value="Turkmenistan">Turkmenistan </option>
                            <option data-countryCode="TC" value="Turks &amp; Caicos Islands">Turks &amp; Caicos Islands </option>
                            <option data-countryCode="TV" value="Tuvalu">Tuvalu </option>
                            <option data-countryCode="UG" value="Uganda">Uganda </option>
                            <option data-countryCode="GB" value="UK">UK </option>
                            <option data-countryCode="UA" value="Ukraine">Ukraine </option>
                            <option data-countryCode="AE" value="United Arab Emirates">United Arab Emirates </option>
                            <option data-countryCode="UY" value="Uruguay">Uruguay </option>
                            <option data-countryCode="US" value="USA">USA </option>
                            <option data-countryCode="UZ" value="Uzbekistan">Uzbekistan </option>
                            <option data-countryCode="VU" value="Vanuatu">Vanuatu </option>
                            <option data-countryCode="VA" value="Vatican City">Vatican City </option>
                            <option data-countryCode="VE" value="Venezuela">Venezuela </option>
                            <option data-countryCode="VN" value="Vietnam">Vietnam </option>
                            <option data-countryCode="VG" value="Virgin Islands - British">Virgin Islands - British </option>
                            <option data-countryCode="VI" value="Virgin Islands - US ">Virgin Islands - US </option>
                            <option data-countryCode="WF" value="Wallis &amp; Futuna">Wallis &amp; Futuna </option>
                            <option data-countryCode="YE" value="Yemen North">Yemen North</option>
                            <option data-countryCode="YE" value="Yemen South">Yemen South</option>
                            <option data-countryCode="ZM" value="Zambia">Zambia </option>
                            <option data-countryCode="ZW" value="Zimbabwe">Zimbabwe </option>
                        </select>
                    </div>
                    <div class="controls selCtl" style="width:20%;display: inline-block;">
                        <select name="countryCode" id="countryCode"  class="form-control" required>
                            <option  value="" disabled selected hidden>code:</option>
                            <option data-countryCode="DZ" value="213">+213</option>
                            <option data-countryCode="AD" value="376"> +376</option>
                            <option data-countryCode="AO" value="244"> +244</option>
                            <option data-countryCode="AI" value="1264"> +1264</option>
                            <option data-countryCode="PAK" value="92">+92</option>
                            <option data-countryCode="AG" value="1268">+1268</option>
                            <option data-countryCode="AR" value="54"> +54</option>
                            <option data-countryCode="AM" value="374"> +374</option>
                            <option data-countryCode="AW" value="297"> +297</option>
                            <option data-countryCode="AU" value="61"> +61</option>
                            <option data-countryCode="AT" value="43"> +43</option>
                            <option data-countryCode="AZ" value="994"> +994</option>
                            <option data-countryCode="BS" value="1242"> +1242</option>
                            <option data-countryCode="BH" value="973"> +973</option>
                            <option data-countryCode="BD" value="880"> +880</option>
                            <option data-countryCode="BB" value="1246"> +1246</option>
                            <option data-countryCode="BY" value="375"> +375</option>
                            <option data-countryCode="BE" value="32"> +32</option>
                            <option data-countryCode="BZ" value="501"> +501</option>
                            <option data-countryCode="BJ" value="229"> +229</option>
                            <option data-countryCode="BM" value="1441"> +1441</option>
                            <option data-countryCode="BT" value="975"> +975</option>
                            <option data-countryCode="BO" value="591"> +591</option>
                            <option data-countryCode="BA" value="387">  +387</option>
                            <option data-countryCode="BW" value="267"> +267</option>
                            <option data-countryCode="BR" value="55"> +55</option>
                            <option data-countryCode="BN" value="673"> +673</option>
                            <option data-countryCode="BG" value="359"> +359</option>
                            <option data-countryCode="BF" value="226"> Faso +226</option>
                            <option data-countryCode="BI" value="257"> +257</option>
                            <option data-countryCode="KH" value="855"> +855</option>
                            <option data-countryCode="CM" value="237"> +237</option>
                            <option data-countryCode="CA" value="1"> +1</option>
                            <option data-countryCode="CV" value="238"> +238</option>
                            <option data-countryCode="KY" value="1345">  +1345</option>
                            <option data-countryCode="CF" value="236">   +236</option>
                            <option data-countryCode="CL" value="56"> +56</option>
                            <option data-countryCode="CN" value="86"> +86</option>
                            <option data-countryCode="CO" value="57"> +57</option>
                            <option data-countryCode="KM" value="269"> +269</option>
                            <option data-countryCode="CG" value="242"> +242</option>
                            <option data-countryCode="CK" value="682">  +682</option>
                            <option data-countryCode="CR" value="506">  +506</option>
                            <option data-countryCode="HR" value="385"> +385</option>
                            <option data-countryCode="CU" value="53"> +53</option>
                            <option data-countryCode="CY" value="90392">  +90392</option>
                            <option data-countryCode="CY" value="357">  +357</option>
                            <option data-countryCode="CZ" value="42">  +42</option>
                            <option data-countryCode="DK" value="45"> +45</option>
                            <option data-countryCode="DJ" value="253"> +253</option>
                            <option data-countryCode="DM" value="1809"> +1809</option>
                            <option data-countryCode="DO" value="1809">  +1809</option>
                            <option data-countryCode="EC" value="593"> +593</option>
                            <option data-countryCode="EG" value="20"> +20</option>
                            <option data-countryCode="SV" value="503">  +503</option>
                            <option data-countryCode="GQ" value="240">  +240</option>
                            <option data-countryCode="ER" value="291"> +291</option>
                            <option data-countryCode="EE" value="372"> +372</option>
                            <option data-countryCode="ET" value="251"> +251</option>
                            <option data-countryCode="FK" value="500">  +500</option>
                            <option data-countryCode="FO" value="298">  +298</option>
                            <option data-countryCode="FJ" value="679"> +679</option>
                            <option data-countryCode="FI" value="358"> +358</option>
                            <option data-countryCode="FR" value="33"> +33</option>
                            <option data-countryCode="GF" value="594">  +594</option>
                            <option data-countryCode="PF" value="689">  +689</option>
                            <option data-countryCode="GA" value="241"> +241</option>
                            <option data-countryCode="GM" value="220"> +220</option>
                            <option data-countryCode="GE" value="7880"> +7880</option>
                            <option data-countryCode="DE" value="49"> +49</option>
                            <option data-countryCode="GH" value="233"> +233</option>
                            <option data-countryCode="GI" value="350"> +350</option>
                            <option data-countryCode="GR" value="30"> +30</option>
                            <option data-countryCode="GL" value="299"> +299</option>
                            <option data-countryCode="GD" value="1473"> +1473</option>
                            <option data-countryCode="GP" value="590"> +590</option>
                            <option data-countryCode="GU" value="671"> +671</option>
                            <option data-countryCode="GT" value="502"> +502</option>
                            <option data-countryCode="GN" value="224"> +224</option>
                            <option data-countryCode="GW" value="245"> - Bissau +245</option>
                            <option data-countryCode="GY" value="592"> +592</option>
                            <option data-countryCode="HT" value="509"> +509</option>
                            <option data-countryCode="HN" value="504"> +504</option>
                            <option data-countryCode="HK" value="852">  +852</option>
                            <option data-countryCode="HU" value="36"> +36</option>
                            <option data-countryCode="IS" value="354"> +354</option>
                            <option data-countryCode="IN" value="91"> +91</option>
                            <option data-countryCode="ID" value="62"> +62</option>
                            <option data-countryCode="IR" value="98"> +98</option>
                            <option data-countryCode="IQ" value="964"> +964</option>
                            <option data-countryCode="IE" value="353"> +353</option>
                            <option data-countryCode="IL" value="972"> +972</option>
                            <option data-countryCode="IT" value="39"> +39</option>
                            <option data-countryCode="JM" value="1876"> +1876</option>
                            <option data-countryCode="JP" value="81"> +81</option>
                            <option data-countryCode="JO" value="962"> +962</option>
                            <option data-countryCode="KZ" value="7"> +7</option>
                            <option data-countryCode="KE" value="254"> +254</option>
                            <option data-countryCode="KI" value="686"> +686</option>
                            <option data-countryCode="KP" value="850">  +850</option>
                            <option data-countryCode="KR" value="82">  +82</option>
                            <option data-countryCode="KW" value="965"> +965</option>
                            <option data-countryCode="KG" value="996"> +996</option>
                            <option data-countryCode="LA" value="856"> +856</option>
                            <option data-countryCode="LV" value="371"> +371</option>
                            <option data-countryCode="LB" value="961"> +961</option>
                            <option data-countryCode="LS" value="266"> +266</option>
                            <option data-countryCode="LR" value="231"> +231</option>
                            <option data-countryCode="LY" value="218"> +218</option>
                            <option data-countryCode="LI" value="417"> +417</option>
                            <option data-countryCode="LT" value="370"> +370</option>
                            <option data-countryCode="LU" value="352"> +352</option>
                            <option data-countryCode="MO" value="853"> +853</option>
                            <option data-countryCode="MK" value="389"> +389</option>
                            <option data-countryCode="MG" value="261"> +261</option>
                            <option data-countryCode="MW" value="265"> +265</option>
                            <option data-countryCode="MY" value="60"> +60</option>
                            <option data-countryCode="MV" value="960"> +960</option>
                            <option data-countryCode="ML" value="223"> +223</option>
                            <option data-countryCode="MT" value="356"> +356</option>
                            <option data-countryCode="MH" value="692">  +692</option>
                            <option data-countryCode="MQ" value="596"> +596</option>
                            <option data-countryCode="MR" value="222"> +222</option>
                            <option data-countryCode="YT" value="269"> +269</option>
                            <option data-countryCode="MX" value="52"> +52</option>
                            <option data-countryCode="FM" value="691"> +691</option>
                            <option data-countryCode="MD" value="373"> +373</option>
                            <option data-countryCode="MC" value="377"> +377</option>
                            <option data-countryCode="MN" value="976"> +976</option>
                            <option data-countryCode="MS" value="1664"> +1664</option>
                            <option data-countryCode="MA" value="212"> +212</option>
                            <option data-countryCode="MZ" value="258"> +258</option>
                            <option data-countryCode="MN" value="95"> +95</option>
                            <option data-countryCode="NA" value="264"> +264</option>
                            <option data-countryCode="NR" value="674"> +674</option>
                            <option data-countryCode="NP" value="977"> +977</option>
                            <option data-countryCode="NL" value="31"> +31</option>
                            <option data-countryCode="NC" value="687">  +687</option>
                            <option data-countryCode="NZ" value="64">  +64</option>
                            <option data-countryCode="NI" value="505"> +505</option>
                            <option data-countryCode="NE" value="227"> +227</option>
                            <option data-countryCode="NG" value="234"> +234</option>
                            <option data-countryCode="NU" value="683"> +683</option>
                            <option data-countryCode="NF" value="672">  +672</option>
                            <option data-countryCode="NP" value="670">  +670</option>
                            <option data-countryCode="NO" value="47"> +47</option>
                            <option data-countryCode="OM" value="968"> +968</option>
                            <option data-countryCode="PW" value="680"> +680</option>
                            <option data-countryCode="PA" value="507"> +507</option>
                            <option data-countryCode="PG" value="675">   +675</option>
                            <option data-countryCode="PY" value="595"> +595</option>
                            <option data-countryCode="PE" value="51"> +51</option>
                            <option data-countryCode="PH" value="63"> +63</option>
                            <option data-countryCode="PL" value="48"> +48</option>
                            <option data-countryCode="PT" value="351"> +351</option>
                            <option data-countryCode="PR" value="1787">  +1787</option>
                            <option data-countryCode="QA" value="974"> +974</option>
                            <option data-countryCode="RE" value="262"> +262</option>
                            <option data-countryCode="RO" value="40"> +40</option>
                            <option data-countryCode="RU" value="7"> +7</option>
                            <option data-countryCode="RW" value="250"> +250</option>
                            <option data-countryCode="SM" value="378">  +378</option>
                            <option data-countryCode="ST" value="239"> +239</option>
                            <option data-countryCode="SA" value="966">  +966</option>
                            <option data-countryCode="SN" value="221"> +221</option>
                            <option data-countryCode="CS" value="381"> +381</option>
                            <option data-countryCode="SC" value="248"> +248</option>
                            <option data-countryCode="SL" value="232">  +232</option>
                            <option data-countryCode="SG" value="65"> +65</option>
                            <option data-countryCode="SK" value="421">  +421</option>
                            <option data-countryCode="SI" value="386"> +386</option>
                            <option data-countryCode="SB" value="677">  +677</option>
                            <option data-countryCode="SO" value="252"> +252</option>
                            <option data-countryCode="ZA" value="27">  +27</option>
                            <option data-countryCode="ES" value="34"> +34</option>
                            <option data-countryCode="LK" value="94">  +94</option>
                            <option data-countryCode="SH" value="290"> +290</option>
                            <option data-countryCode="KN" value="1869">+1869</option>
                            <option data-countryCode="SC" value="1758"> +1758</option>
                            <option data-countryCode="SD" value="249"> +249</option>
                            <option data-countryCode="SR" value="597"> +597</option>
                            <option data-countryCode="SZ" value="268"> +268</option>
                            <option data-countryCode="SE" value="46"> +46</option>
                            <option data-countryCode="CH" value="41"> +41</option>
                            <option data-countryCode="SI" value="963"> +963</option>
                            <option data-countryCode="TW" value="886"> +886</option>
                            <option data-countryCode="TJ" value="7"> +7</option>
                            <option data-countryCode="TH" value="66"> +66</option>
                            <option data-countryCode="TG" value="228"> +228</option>
                            <option data-countryCode="TO" value="676"> +676</option>
                            <option data-countryCode="TT" value="1868">  +1868</option>
                            <option data-countryCode="TN" value="216"> +216</option>
                            <option data-countryCode="TR" value="90"> +90</option>
                            <option data-countryCode="TM" value="993"> +993</option>
                            <option data-countryCode="TC" value="1649"> +1649</option>
                            <option data-countryCode="TV" value="688"> +688</option>
                            <option data-countryCode="UG" value="256"> +256</option>
                            <option data-countryCode="GB" value="44">+44</option>
                            <option data-countryCode="UA" value="380"> +380</option>
                            <option data-countryCode="AE" value="971">+971</option>
                            <option data-countryCode="UY" value="598"> +598</option>
                            <option data-countryCode="US" value="1"> +1</option>
                            <option data-countryCode="UZ" value="7"> +7</option>
                            <option data-countryCode="VU" value="678"> +678</option>
                            <option data-countryCode="VA" value="379">  +379</option>
                            <option data-countryCode="VE" value="58"> +58</option>
                            <option data-countryCode="VN" value="84"> +84</option>
                            <option data-countryCode="VG" value="84">  +1284</option>
                            <option data-countryCode="VI" value="84"> +1340</option>
                            <option data-countryCode="WF" value="681"> +681</option>
                            <option data-countryCode="YE" value="969">+969</option>
                            <option data-countryCode="YE" value="967">+967</option>
                            <option data-countryCode="ZM" value="260">+260</option>
                            <option data-countryCode="ZW" value="263"> +263</option>
                        </select>
                    </div>
                    <div class="controls" style="width:calc(80% - 25px); display: inline-block;">
                        <input type="number" name="phone" placeholder="Mobile Number :" class="form-last-name form-control" id="form-last-name" required>
                    </div>
                    <div class="controls">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="email" name="email" placeholder="Email :" class="form-email form-control" id="form-email" required>
                    </div>
                    <div class="controls">
                        <input type="submit" id="send" value="GO TO MAIN PAGE">
                    </div>
                </form>
                <h3>ENJOY THE JOURNEY .. EXPLORING THE WORLD OF TRADING</h3>
			</div>
            <div id="hiddenImg" class="col-xs-12">
                <img src="/assets/m/img/bgMob.jpg">
            </div>
            <div id="textSide" class="col-sm-12 col-md-4">
                <h2 class="boldBlue bgOrange">WHY CHOOSE US!</h2>
                <h2 class="boldBlue"><img src ="/assets/m/img/arrow2.png">NO COMMISION</h2>
                <h2 class="boldBlue"><img src ="/assets/m/img/arrow2.png">NO FEES</h2>
                <h2 class="boldBlue"><img src ="/assets/m/img/arrow2.png">ECONOMIC SUPPORT SPECIALIST</h2>
                <h2 class="boldBlue"><img src ="/assets/m/img/arrow2.png">FREE DAILY RECOMMENDATIONS</h2>
                <h2 class="boldBlue bgOrange">LICENCES & REGULATIONS</h2>
                <div class="imgNtext">
                    <img src ="https://www.jmibrokers.com/assets/landing/uk-flag.png">
                    <h5>JMI Brokers LTD is a licensed Financial Services Provider from Vanuatu Financial Services Commission and authorized to carry business on Dealing in Securities under
                        registration number 15010</h5>
                </div>
                <div class="imgNtext">
                    <img src ="https://www.jmibrokers.com/assets/landing/swiss-flag.png">
                    <h5>JMI Brokers AG, (100% Subsidiary of JMI Brokers LTD ) is a Swiss legal Corporation with its registered office in Zug with registration # CHE 334-229-499</h5>
                </div>
			</div>
		</div>
        <script>

            var geocountry = "<?PHP echo $location['iso_code'] ?>";

            $('option[data-countryCode="'+geocountry+'"]').prop('selected', true);


            $('form#landing-form').submit(function(){
                $(this).find(':input[type=submit]').prop('disabled', true);
            });
            function countryfun()
            {

                    var datacountry= $('select#country').find('option:selected').attr('data-countryCode');
                    $('option[data-countryCode="'+datacountry+'"]').prop('selected', true);


            }

        </script>


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


				<script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0108/9449.js" async="async"></script>
				<img src="https://www.pixelhere.com/et/event.php?advertiser=171324&cid=Conversion&id=9c977c&variable=ADCASH&value=1" border="0" width="1" height="1" />
	</body>
</html>
