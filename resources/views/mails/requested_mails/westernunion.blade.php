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
    <p>This mail is sent by your request for Western Union payment details</p><br />
    <p style="color:red;">* Please ensure the transfer is sent in EUR, if the transfer is sent in any other currency it will be paid out in local currency requiring a repurchase of EUR and western union 10% charge up to .</p>

<table cellspacing="2" cellpadding="2" border="1"  style="font-family:Helvetica;background: #0059b2;margin:0 auto;color: #fff;font-size: 15px;">

    <tr>
        <td style="width: 50%; vertical-align: top">First Name</td>
          <td style="vertical-align: top">CHARLES </td>
    </tr>
   <tr>
        <td style="width: 50%; vertical-align: top">Family Name </td>
          <td style="vertical-align: top">KASMIERSKI</td>
    </tr>

   <tr>
        <td style="width: 50%; vertical-align: top">City</td>
          <td style="vertical-align: top">Belegrade </td>
    </tr>

   <tr>
        <td style="width: 50%; vertical-align: top">Country </td>
          <td style="vertical-align: top">Serbia </td>
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
