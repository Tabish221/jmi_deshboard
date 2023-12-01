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
			{{-- <div class="col-sm-12"   style=" direction: ltr !important;  font-family: Roboto-Light  !important;  ">
				<img id="logoPic" src="{{asset('/images/jmi-header.png')}}"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; width: 300px !important;
				margin: 10px !important; ">
			</div> --}}
			<div class="col-sm-12"   style=" direction: ltr !important;  font-family: Roboto-Light  !important;  ">
				<img id="phonePic" src="{{asset('/images/jmi-header.png')}}"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; width:100% !important; ">
			</div>
			<div id="content" class="col-sm-12"   style=" direction: ltr !important;  font-family: Roboto-Light  !important; margin: 0px 50px 25px 50px !important; ">





  <h3>Dear {{$fullname}}</h3><br />
    <p>This mail is sent by your request for bank payment details</p><br />


    <h4>Lithuania</h4>
    <h4>1. EUR within Europe (SEPA) – UAB Pervesk -Additional correspondent fees apply: </h4>
<table cellspacing="2" cellpadding="2" border="1"  style="font-family:Helvetica;background: #0059b2;margin:0 auto;color: #fff;font-size: 15px;">
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver: </td>
          <td style="vertical-align: top">Pacific Private Bank Limited </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver’s Address:</td>
          <td style="vertical-align: top">Govant Building, Port Vila, Vanuatu </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver Bank:</td>
          <td style="vertical-align: top">UAB Pervesk </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver Bank Address:</td>
          <td style="vertical-align: top">Rinktines st. 5, LT-09234 Vilnius, Lithuania </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">SWIFT BIC:</td>
          <td style="vertical-align: top">UAPELT22XXX </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">IBAN: </td>
          <td style="vertical-align: top">LT73 3550 0200 0000 1699 </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Reference Message</td>
          <td style="vertical-align: top">JMI Brokers ltd - VU24PPBL021000002148 </td>
    </tr>


</table>

<br />

  <h4>Lithuania</h4>
  <h4>2. EUR within Europe (SEPA) – UAB VerifiedPayments -Additional correspondent fees apply </h4>
<table cellspacing="2" cellpadding="2" border="1"  style="font-family:Helvetica;background: #0059b2;margin:0 auto;color: #fff;font-size: 15px;">
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver:</td>
          <td style="vertical-align: top">Pacific Private Bank Limited </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver’s Address:</td>
          <td style="vertical-align: top">Govant Building, Port Vila, Vanuatu </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver Bank:</td>
          <td style="vertical-align: top">UAB Verified Payments </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver Bank Address:</td>
          <td style="vertical-align: top">GEDIMINO AV. 20, Vilnius, Lithuania </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">SWIFT BIC:</td>
          <td style="vertical-align: top">VEPALT21XXX </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">IBAN:</td>
          <td style="vertical-align: top">LT91 3750 0200 0000 0008 </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Reference Message </td>
          <td style="vertical-align: top">JMI Brokers ltd- VU24PPBL021000002148 </td>
    </tr>


</table>

<br />

  <h4>United Kingdom</h4>
  <h4>3. EUR within Europe (SEPA) – Financial House-Additional correspondent fees apply </h4>
<table cellspacing="2" cellpadding="2" border="1"  style="font-family:Helvetica;background: #0059b2;margin:0 auto;color: #fff;font-size: 15px;">
      <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver:</td>
          <td style="vertical-align: top">Pacific Private Bank Limited </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver’s Address:</td>
          <td style="vertical-align: top">Govant Building, Port Vila, Vanuatu </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver Bank:</td>
          <td style="vertical-align: top">Financial House Limited </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver Bank Address:</td>
          <td style="vertical-align: top">6 Bevis Marks Building, 1st Floor, Bury Court London, England, EC3A 7HL </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">SWIFT BIC:</td>
          <td style="vertical-align: top">FNHOGB21XXX </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">IBAN:</td>
          <td style="vertical-align: top">GB95FNHO0099 36932230 40 </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Reference Message </td>
          <td style="vertical-align: top">JMI Brokersltd VU24PPBL021000002148 </td>
    </tr>



</table>

<br />
  <h4> Turkey – SWIFT - Aktif Bank</h4>
  <h4>4. EUR outside Europe (SWIFT) –Additional correspondent fees apply </h4>
<table cellspacing="2" cellpadding="2" border="1"  style="font-family:Helvetica;background: #0059b2;margin:0 auto;color: #fff;font-size: 15px;">

    <tr>
      <td style="width: 50%; vertical-align: top">59: Beneficiary/ Receiver: </td>
      <td style="vertical-align: top">JMI Brokers Ltd </td>
    </tr>
    <tr>
      <td style="width: 50%; vertical-align: top">59: Beneficiary/ Receiver's Address: </td>
      <td style="vertical-align: top">1276, Govant Building, Kumul Highway, Port Vila Republic of Vanuatu</td>
    </tr>
    <tr>
      <td style="width: 50%; vertical-align: top">59: IBAN/ Account Number:</td>
      <td style="vertical-align: top">VU24PPBL021000002148 </td>
    </tr>
    <tr>
      <td style="width: 50%; vertical-align: top">57A: Beneficiary/ Receiver Bank: </td>
      <td style="vertical-align: top">Pacific Private Bank </td>
    </tr>
    <tr>
      <td style="width: 50%; vertical-align: top">57A: Beneficiary/ Receiver Bank Address: </td>
      <td style="vertical-align: top">Govant Building, Port Vila, Vanuatu </td>
    </tr>
    <tr>
      <td style="width: 50%; vertical-align: top">57A: SWIFT BIC: </td>
      <td style="vertical-align: top">PPBLVUVU </td>
    </tr>
    <tr>
      <td style="width: 50%; vertical-align: top">56A: Intermediary/ Correspondent Bank:</td>
      <td style="vertical-align: top">Aktif Bank</td>
    </tr>
  <tr>
      <td style="width: 50%; vertical-align: top">56A: Intermediary/ Correspondent Bank Address:</td>
      <td style="vertical-align: top">Buyukdere cad. Zincirlikuyu , Istanbul Turkey</td>
    </tr>
  <tr>
      <td style="width: 50%; vertical-align: top">56A: Intermediary/ Correspondent Bank BIC: </td>
      <td style="vertical-align: top">CAYTTRIS</td>
    </tr>
  <tr>
      <td style="width: 50%; vertical-align: top">56A: Intermediary Account with Correspondent  Bank:</td>
      <td style="vertical-align: top">TR950014300000000001599246 </td>
    </tr>
  <tr>
      <td style="width: 50%; vertical-align: top">70: Reference Message/ Details:</td>
      <td style="vertical-align: top">Payment details, Account Number with JMI Brokers : xxx</td>
    </tr>

</table>
<br />

  <h4> Turkey – SWIFT - Nurol Bank </h4>
  <h4>5. EUR outside Europe (SWIFT) –Additional correspondent fees might apply </h4>
<table cellspacing="2" cellpadding="2" border="1"  style="font-family:Helvetica;background: #0059b2;margin:0 auto;color: #fff;font-size: 15px;">

        <tr>
      <td style="width: 50%; vertical-align: top">59: Beneficiary/ Receiver: </td>
      <td style="vertical-align: top">JMI Brokers Ltd </td>
    </tr>
    <tr>
      <td style="width: 50%; vertical-align: top">59: Beneficiary/ Receiver's Address: </td>
      <td style="vertical-align: top">1276, Govant Building, Kumul Highway, Port Vila Republic of Vanuatu</td>
    </tr>
    <tr>
      <td style="width: 50%; vertical-align: top">59: IBAN/ Account Number:</td>
      <td style="vertical-align: top">VU24PPBL021000002148 </td>
    </tr>
    <tr>
      <td style="width: 50%; vertical-align: top">57A: Beneficiary/ Receiver Bank: </td>
      <td style="vertical-align: top">Pacific Private Bank </td>
    </tr>
    <tr>
      <td style="width: 50%; vertical-align: top">57A: Beneficiary/ Receiver Bank Address: </td>
      <td style="vertical-align: top">Govant Building, Port Vila, Vanuatu </td>
    </tr>
    <tr>
      <td style="width: 50%; vertical-align: top">57A: SWIFT BIC: </td>
      <td style="vertical-align: top">PPBLVUVUXXX </td>
    </tr>
    <tr>
      <td style="width: 50%; vertical-align: top">56A: Intermediary/ Correspondent Bank:</td>
      <td style="vertical-align: top">Nurol Investment Bank Inc.</td>
    </tr>
  <tr>
      <td style="width: 50%; vertical-align: top">56A: Intermediary/ Correspondent Bank Address:</td>
      <td style="vertical-align: top">Maslak Nurol Plaza, Buyukdere Caddesi 71 Masla, Istanbul, Turkey</td>
    </tr>
  <tr>
      <td style="width: 50%; vertical-align: top">56A: Intermediary/ Correspondent Bank BIC: </td>
      <td style="vertical-align: top">NUROTRISXXX</td>
    </tr>
  <tr>
      <td style="width: 50%; vertical-align: top">56A: Intermediary Account with Correspondent  Bank:</td>
      <td style="vertical-align: top">TR88 0014 1000 0004 4109 9000 04 </td>
    </tr>
  <tr>
      <td style="width: 50%; vertical-align: top">70: Reference Message/ Details:</td>
      <td style="vertical-align: top">Payment details, Account Number with JMI Brokers : xxx</td>
    </tr>


</table>
<br />

  <h4> USD International transfer - USA</h4>
  <h4>6. USD–Additional correspondent fees might apply – need to advise PPB about transfer </h4>
<table cellspacing="2" cellpadding="2" border="1"  style="font-family:Helvetica;background: #0059b2;margin:0 auto;color: #fff;font-size: 15px;">
      <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver:</td>
          <td style="vertical-align: top">Pacific Private Bank Limited </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver’s Address:</td>
          <td style="vertical-align: top">Kumul Highway Govant Building-1st Floor, Port Vila, Vanuatu </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary Account Number:</td>
          <td style="vertical-align: top">4500 4500064812 02 </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver Bank:</td>
          <td style="vertical-align: top">The Reserve Trust Company </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary/ Receiver Bank Address:</td>
          <td style="vertical-align: top">5600 S. Quebec St Suite 205D, Greenwood Village, CO 80111, USA </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Beneficiary FI Routing Number:</td>
          <td style="vertical-align: top">102007558 </td>
    </tr>
    <tr>
        <td style="width: 50%; vertical-align: top;">Reference Message</td>
          <td style="vertical-align: top">Payment Details: JMI Brokers LtdAccount Number: VU24PPBL021000002148 </td>
    </tr>

</table>


<br />
<p>*Please make sure to input the details exactly as it is indicated above.</p>
<div id="section3" style=" text-align: left; ">
<span>Contact us on finance@jmibrokers.com after payment with your payment details.</span>
</div>



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
		<div id="footer" class="row"   style="  float: left !important; direction: ltr !important;  font-family: Roboto-Light  !important; background-color:#0059b3 !important;
				padding: 20px 5px !important;
				display: flex  !important;
				justify-content: center  !important;
				align-items: center  !important; padding: 18px !important;">
				<div class="col-sm-12"   style="  direction: ltr !important;  font-family: Roboto-Light  !important; padding: 0px 0px 0px 2px !important; ">
					<p   style="  direction: ltr !important;  font-family: Roboto-Light  !important; 				color:#fff  !important;
				font-size: 16px !important;
				font-family: Roboto-Light  !important;
				margin: 5px !important; font-size: 10px !important;"> <span   style=" direction: ltr !important;  font-family: Roboto-Light  !important; color:#fff !important;
				padding-left:5px !important; font-size: 12px !important;
				color:#fff !important;
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
