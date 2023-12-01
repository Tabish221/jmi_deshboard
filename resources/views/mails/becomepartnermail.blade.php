<html><head>
		<title>JMI INVOICE emaiL tempLate</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<style>
			@font-face {
		  font-family: Roboto-Light;
		  src: url('https://jmibrokers.com/elis/fonts/Roboto-Light.ttf') !important;
		}
		@font-face {
		  font-family: Roboto-Bold;
		  src: url('https://jmibrokers.com/elis/fonts/Roboto-Bold.ttf') !important;
		}
			button a:hover
			{
				color:white !important;
				text-decoration: none !important;
			}
			#hidImg img
			{
				width: 100% !important;
				min-width:180px !important;
				margin-top: 3px !important;
				padding-right: 0px !important;
			}

			@media only screen and (max-width: 767px)
			{
				#logoPic
				{
					width: 250px !important;
					height: 65px !important;
				}
				h1
				{
					font-size: 27px !important;
				}
				h3
				{
					font-size: 20px  !important;
				}
				p
				{
					font-size: 14px !important;
				}
				h4
				{
					font-size: 15px !important;
				}
				#content
				{
					margin: 0px 35px !important;
				}
				button
				{
					padding: 10px 15px !important;
					margin: 30px 0px 25px 0px !important;
				}
				.lgImg
				{
					width: 35px !important;
				}

				#hidImg
				{
					display:none !important;
				}
				.lgImg2
				{
					width:60px !important;
				}
			}
			@media only screen and (max-width: 500px)
			{
				#logoPic
				{
					width: 160px !important;
					height: 45px !important;
				}
				h1
				{
					font-size: 22px !important;
				}
				h3
				{
					font-size: 18px  !important;
				}
				#content
				{
					margin: 0px 15px !important;
				}
				button
				{
					padding: 7px 10px !important;
					margin: 20px 0px 15px 0px !important;
					font-size:13px !important;
				}

				#footer p
				{
					font-size: 12px !important;
				}
				#footer
				{
					padding: 18px !important;
				}
				.lgImg
				{
					width: 30px !important;
				}
				.bl
				{
					display:block !important;
				}

			}

		</style>
	</head>
	<body   style=" direction: ltr !important;  font-family: Roboto-Light  !important; overflow-x:hidden !important;
				max-width:600px !important;
				margin: 0px auto !important; ">
		<div class="row"   style=" direction: ltr !important;  font-family: Roboto-Light  !important;  ">
			<div class="col-sm-12"   style=" direction: ltr !important;  font-family: Roboto-Light  !important;  ">
				<img id="logoPic" src="{{asset('/images/jmi-header.png')}}"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; width: 300px !important;
				margin: 10px !important; ">
			</div>
			<div class="col-sm-12"   style=" direction: ltr !important;  font-family: Roboto-Light  !important;  ">
				<img id="phonePic" src="https://www.jmibrokers.com/mails/m/pic2.png"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; width:100% !important; ">
			</div>
			<div id="content" class="col-sm-12"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; margin: 0px 50px 25px 50px !important; ">







<table cellspacing="2" cellpadding="2" border="1"  style="font-family:Helvetica;background: #fff;margin:0 0;color: #333;font-weight: bold;font-size: 15px;">
	<tr>
			<td style="width: 30%; vertical-align: top">Full Name</td>
				<td style="vertical-align: top"><?PHP echo $fullname ?></td>
	</tr>
	<tr>
         <td style="width: 30%; vertical-align: top">Country</td>
           <td style="vertical-align: top"><?PHP      $countries = array("select","Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Brazil", "British Indian Ocean Territory", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Cook Islands", "Costa Rica", "Croatia (Hrvatska)", "Cuba", "Curacao", "Cyprus", "Czech Republic", "Democratic Republic of the Congo", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Isle of Man", "Palestine", "Italy", "Ivory Coast", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "North Korea", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Republic of the Congo", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Barthelemy", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Martin", "Saint Pierre and Miquelon", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Sint Maarten", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "U.S. Virgin Islands", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican", "Venezuela", "Vietnam", "Wallis and Futuna", "Western Sahara", "Yemen", "Zambia", "Zimbabwe"); echo $countries[$country] ?></td>
     </tr>
     <tr>
         <td style="width: 30%; vertical-align: top">City</td>
           <td style="vertical-align: top"><?PHP echo $city ?></td>
     </tr>
     <tr>
         <td style="width: 30%; vertical-align: top">Mobile</td>
           <td style="vertical-align: top"><?PHP echo $phone ?></td>
     </tr>
     <tr>
         <td style="width: 30%; vertical-align: top">Email</td>
           <td style="vertical-align: top"><?PHP echo $email ?></td>
     </tr>
     <tr>
         <td style="width: 30%; vertical-align: top">Company</td>
           <td style="vertical-align: top"><?PHP echo $company ?></td>
     </tr>

  </table>








				<p id="help"   style=" direction: ltr !important;  font-family: Roboto-Light  !important;  				color:#818181  !important;
				font-size: 16px !important;
				font-family: Roboto-Light  !important;
				margin: 5px !important;color:#0059b3  !important;
				font-weight:bold !important;">FOR ANY HELP</p>
				<p   style=" direction: ltr !important;  font-family: Roboto-Light  !important; 				color:#818181  !important;
				font-size: 16px !important;
				font-family: Roboto-Light  !important;
				margin: 5px !important; "> Email us on:<span   style=" direction: ltr !important;  font-family: Roboto-Light  !important; color:#0059b3 !important;
				padding-left:5px !important; ">backoffice@jmibrokers.com </span></p>
				<p   style=" direction: ltr !important;  font-family: Roboto-Light  !important; 				color:#818181  !important;
				font-size: 16px !important;
				font-family: Roboto-Light  !important;
				margin: 5px !important; "> Call:<span   style=" direction: ltr !important;  font-family: Roboto-Light  !important;  color:#0059b3 !important;
				padding-left:5px !important;">+971529244361</span></p>
				<p id="whatsDiv"   style=" display: flex !important; align-items: center !important; direction: ltr !important;  font-family: Roboto-Light  !important; color:#818181  !important;font-size: 16px !important;
				font-family: Roboto-Light  !important;
				margin: 5px !important; "> <img class="lgImg" src="https://www.jmibrokers.com/mails/m/pic8.png"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; margin: 2px !important; "><span   style=" direction: ltr !important;  font-family: Roboto-Light  !important; color:#0059b3 !important;
				padding-left:5px !important;padding-top: 8px  !important; position: absolute !important;">+971529244361</span></p>
				<p   style=" direction: ltr !important;  font-family: Roboto-Light  !important; 				color:#818181  !important;
				font-size: 16px !important;
				font-family: Roboto-Light  !important;
				margin: 5px !important; ">You may follow us on our social media pages where you’ll find lots of useful information to help you start trading.</p>
				<ul   style=" direction: ltr !important;  font-family: Roboto-Light  !important; list-style-type: none !important;
				display: flex !important;
				flex-wrap: wrap !important;
				padding: 0px !important; ">
					<li   style=" margin-left: 0 !important;direction: ltr !important;  font-family: Roboto-Light  !important;  "><a href="https://www.facebook.com/jmibrokers/"   style=" direction: ltr !important;  font-family: Roboto-Light  !important;  "><img class="lgImg" src="https://www.jmibrokers.com/mails/m/pic9.png"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; margin: 2px !important; "></a></li>
					<li   style=" margin-left: 0 !important; direction: ltr !important;  font-family: Roboto-Light  !important;  "><a href="https://twitter.com/jmimarketing"   style=" direction: ltr !important;  font-family: Roboto-Light  !important;  "><img class="lgImg" src="https://www.jmibrokers.com/mails/m/pic10.png"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; margin: 2px !important; "></a></li>
					<li   style=" margin-left: 0 !important; direction: ltr !important;  font-family: Roboto-Light  !important;  "><a href="https://www.youtube.com/channel/UCOnu4pseIjO1VbVSYEhicSA"   style=" direction: ltr !important;  font-family: Roboto-Light  !important;  "><img class="lgImg" src="https://www.jmibrokers.com/mails/m/pic11.png"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; margin: 2px !important;"></a></li>
					<li   style=" margin-left: 0 !important; direction: ltr !important;  font-family: Roboto-Light  !important;  "><a href="https://www.instagram.com/jmibrokers/"   style=" direction: ltr !important;  font-family: Roboto-Light  !important;  "><img class="lgImg" src="https://www.jmibrokers.com/mails/m/pic12.png"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; margin: 2px !important; "></a></li>

				</ul>
				<p id="pay"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; 				color:#818181  !important;
				font-size: 16px !important;
				font-family: Roboto-Light  !important;
				margin: 5px !important;color:#0059b3  !important;
				font-weight:bold !important; ">PAYMENT METHODS</p>
				<ul id="lgUl"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; list-style-type: none !important;

				padding: 0px !important; ">
					<li   style=" float: left !important; direction: ltr !important;  font-family: Roboto-Light  !important; padding: 8px !important; "><img class="lgImg2" src="https://www.jmibrokers.com/wave/img/westernunion0.png"   style=" filter: grayscale(100%) !important; direction: ltr !important;  font-family: Roboto-Light  !important; width:75px !important;
				padding:0px !important;
				filter: grayscale(100%) !important; "></li>
					<li   style=" float: left !important; direction: ltr !important;  font-family: Roboto-Light  !important; padding: 8px !important; "><img class="lgImg2" src="https://www.jmibrokers.com/wave/img/wiretransfer0.png"   style=" filter: grayscale(100%) !important; direction: ltr !important;  font-family: Roboto-Light  !important; width:75px !important;
				padding:0px !important;
				filter: grayscale(100%) !important; "></li>
					<li   style=" float: left !important; direction: ltr !important;  font-family: Roboto-Light  !important; padding: 8px !important; "><img class="lgImg2" src="https://www.jmibrokers.com/assets/img/btc-payment.png"   style=" filter: grayscale(100%) !important; direction: ltr !important;  font-family: Roboto-Light  !important; width:75px !important;
				padding:0px !important;
				filter: grayscale(100%) !important; "></li>
					<li   style=" float: left !important; direction: ltr !important;  font-family: Roboto-Light  !important; padding: 8px !important; "><img class="lgImg2" src="https://www.jmibrokers.com/assets/img/coinbase.png"   style=" filter: grayscale(100%) !important; direction: ltr !important;  font-family: Roboto-Light  !important; width:75px !important;
				padding:0px !important;
				filter: grayscale(100%) !important; "></li>
					<li   style=" float: left !important; direction: ltr !important;  font-family: Roboto-Light  !important; padding: 8px !important; "><img class="lgImg2" src="https://www.jmibrokers.com/wave/img/epay0.png"   style=" filter: grayscale(100%) !important; direction: ltr !important;  font-family: Roboto-Light  !important; width:75px !important;
				padding:0px !important;
				filter: grayscale(100%) !important; "></li>
					<li   style=" float: left !important; direction: ltr !important;  font-family: Roboto-Light  !important; padding: 8px !important; "><img class="lgImg2" src="https://www.jmibrokers.com/wave/img/advcash0.png"   style=" filter: grayscale(100%) !important; direction: ltr !important;  font-family: Roboto-Light  !important; width:75px !important;
				padding:0px !important;
				filter: grayscale(100%) !important; "></li>
					<li   style=" float: left !important; direction: ltr !important;  font-family: Roboto-Light  !important; padding: 8px !important; "><img class="lgImg2" src="https://www.jmibrokers.com/wave/img/payeer.png"   style=" filter: grayscale(100%) !important; direction: ltr !important;  font-family: Roboto-Light  !important; width:75px !important;
				padding:0px !important;
				filter: grayscale(100%) !important; "></li>
					<li   style=" float: left !important; direction: ltr !important;  font-family: Roboto-Light  !important; padding: 8px !important; "><img class="lgImg2" src="https://www.jmibrokers.com/wave/img/perfectmoney0.png"   style=" filter: grayscale(100%) !important; direction: ltr !important;  font-family: Roboto-Light  !important; width:75px !important;
				padding:0px !important;
				filter: grayscale(100%) !important; "></li>
					<li   style=" float: left !important;direction: ltr !important;  font-family: Roboto-Light  !important; padding: 8px !important; "><img class="lgImg2" src="https://www.jmibrokers.com/wave/img/moneygram0.png"   style=" filter: grayscale(100%) !important; direction: ltr !important;  font-family: Roboto-Light  !important; width:75px !important;
				padding:0px !important;
				filter: grayscale(100%) !important; "></li>
				</ul>
				<div style="clear: both !important;"></div>
				<p class="mrtb"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; 				color:#818181  !important;
				font-size: 16px !important;
				font-family: Roboto-Light  !important;
				margin: 5px !important; margin: 3px 0px !important;">Best regards, </p>
				<p class="mrtb"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; 				color:#818181  !important;
				font-size: 16px !important;
				font-family: Roboto-Light  !important;
				margin: 5px !important; margin: 3px 0px !important;">JMI Brokers Team</p>

			</div>
		</div>
		<div id="footer" class="row"   style="  float: left !important; direction: ltr !important;  font-family: Roboto-Light  !important; background-color:#eeeeee !important;
				padding: 20px 5px !important;
				display: flex  !important;
				justify-content: center  !important;
				align-items: center  !important; padding: 18px !important;">
				<div class="col-sm-12"   style="  direction: ltr !important;  font-family: Roboto-Light  !important; padding: 0px 0px 0px 2px !important; ">
					<p   style="  direction: ltr !important;  font-family: Roboto-Light  !important; 				color:#818181  !important;
				font-size: 16px !important;
				font-family: Roboto-Light  !important;
				margin: 5px !important; font-size: 10px !important;"> <span   style=" direction: ltr !important;  font-family: Roboto-Light  !important; color:#0059b3 !important;
				padding-left:5px !important; font-size: 12px !important;
				color:#818181 !important;
				padding:0px !important;
				display: block !important;
				font-weight: bold !important;">
						<img src="https://www.jmibrokers.com/mails/m/warning.png"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; width: 12px !important;
				margin-top: -6px !important; ">
						Risk warning
					</span> High Risk Investment Warning: Trading foreign exchange and/or contracts for differences on margin carries a high level of risk, and may not be suitable for all investors. The possibility exists that you could sustain a loss in excess of your deposited funds and therefore, you should not speculate with capital that you cannot afford to lose. Before deciding to trade the products offered by JMI Brokers you should carefully consider your objectives, 				financial situation, needs and level of experience. You should be aware of all the risks associated with trading on margin. JMI Brokers provides general advice that does not take into account your objectives, financial situation or needs. The content of this Website must not be construed as personal advice. JMI Brokers recommends you seek advice from a separate financial advisor.
						All opinions, news, analysis, prices or other information contained on this website are provided as general market commentary and does not constitute investment advice, nor a solicitation or recommendation for you to buy or sell any over-the-counter product or other financial instrument.
				</div>
		</div>

</body></html>
