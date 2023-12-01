<html><head>
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
					body
					{
						overflow-x:hidden !important;
		        max-width:600px !important;
						margin: 0px auto !important;
					}
					*
					{
						font-family: Roboto-Light  !important;
					}
					#capital
					{
						text-transform:capitalize !important;
		        font-size: 18px !important;
					}
					#logoPic
					{
						width: 300px !important;
						margin: 10px !important;
					}
					#phonePic
					{
						width:100% !important;
					}
					#content
					{
						margin: 0px 50px 25px 50px !important;
					}
					h1
					{
						color:#ffca26 !important;
						font-weight:bold !important;
					}
					h3 ,#help ,#pay
					{
						color:#0059b3  !important;
						font-weight:bold !important;
					}
					span
					{
						color:#0059b3 !important;
						padding-left:5px !important;
					}
					p
					{
						color:#818181  !important;
						font-size: 16px !important;
		        font-family: Roboto-Light  !important;
		        margin: 5px !important;
					}
		      #whatsDiv
		      {
		        display: flex  !important;
		        align-items: center !important  !important;
		      }
			  #whatsDiv
			  {
				width-:34px !important;}#whatsDiv img{width:34px !important; !important;
			  }
		      #whatsDiv span
		      {
		        padding-top: 7px  !important;
		      }
					h4
					{
						color:#777777 !important;
						font-weight:bold !important;
						font-size: 17px !important;
					}
					#mrb
					{
						margin-bottom: 0px !important;
					}
		      .mrtb
		      {
		        margin: 3px 0px !important;
		      }
					button
					{
						background-color:#fdbe01 !important;
						border:1px solid #818181 !important;
						padding: 10px 20px !important;
						border-radius: 10px !important;
						margin: 40px 0px 30px 0px !important;
					}
					button a
					{
						color:white !important;
					}
					button a:hover
					{
						color:white !important;
						text-decoration: none !important;
					}
					ul
					{
						list-style-type: none !important;
						display: flex !important;
		  			flex-wrap: wrap !important;
						padding: 0px !important;
					}
					#lgUl li
					{
						padding: 8px !important;
					}
					#footer
					{
						background-color:#eeeeee !important;
						padding: 20px 5px !important;
						display: flex  !important;
						justify-content: center  !important;
						align-items: center  !important;
					}
					#footer p
					{
						font-size: 10px !important;
					}
					#footer span
					{
						font-size: 12px !important;
						color:#818181 !important;
						padding:0px !important;
						display: block !important;
						font-weight: bold !important;
					}
					#footer img
					{
						width: 12px !important;
		    		margin-top: -6px !important;
					}
					#hidImg img
					{
						width: 100% !important;
		        min-width:180px !important;
		        margin-top: 3px !important;
		        padding-right: 0px !important;
		      }
					#footer div
					{
						padding: 0px 0px 0px 2px !important;
					}
					.mr
					{
						margin:10px 0px !important;
					}
					.lgImg2
					{
						width:75px !important;
						padding:0px !important;
						filter: grayscale(100%) !important;
					}
					.lgImg
					{
						margin: 2px !important;
					}
					#footer
					{
						padding: 18px !important;
					}
					table tr td{border: none !important;color: #888 !important;}
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
	<body>
		<div class="row">
			{{-- <div class="col-sm-12">
				<img id="logoPic" src="{{asset('/images/jmi-header.png')}}">
			</div> --}}
			<div class="col-sm-12">
				<img id="phonePic" src="{{asset('/images/jmi-header.png')}}">
			</div>
			<div id="content" class="col-sm-12">
        <h4 style="color:#0059b2;">Activate Your Mail Now</h4>
				<p style=" font-size: 16px; padding-top:10px;">
					Dear user,
<br>
					We are very pleased that you have created an account with us. Welcome to JMI brokers!
					<br>
					To activate your email, kindly use the following code:
					{{$activationcode}}

				</p>
				<p id="help">Should you need any further help, do not hesitate to contact us on:
</p>
				<p> Email us on:<span>backoffice@jmibrokers.com </span></p>
				<p> Call:<span>+971529244361</span></p>
				<p id="whatsDiv"> <img class="lgImg" src="https://www.jmibrokers.com/mails/m/pic8.png"><span>+971529244361</span></p>
				<p>You may follow us on our social media pages where you’ll find lots of useful information to help you start trading.</p>
				<ul>
					<li><a href="https://www.facebook.com/jmibrokers/"><img class="lgImg" src="https://www.jmibrokers.com/mails/m/pic9.png"></a></li>
					<li><a href="https://twitter.com/jmimarketing"><img class="lgImg" src="https://www.jmibrokers.com/mails/m/pic10.png"></a></li>
					<li><a href="https://www.youtube.com/channel/UCOnu4pseIjO1VbVSYEhicSA"><img class="lgImg" src="https://www.jmibrokers.com/mails/m/pic11.png"></a></li>
					<li><a href="https://www.instagram.com/jmibrokers/"><img class="lgImg" src="https://www.jmibrokers.com/mails/m/pic12.png"></a></li>

				</ul>
				<p id="pay">PAYMENT METHODS</p>
				<ul id="lgUl">
					<li><img class="lgImg2" src="https://www.jmibrokers.com/mails/m/westernunion0.png"></li>
					<li><img class="lgImg2" src="https://www.jmibrokers.com/mails/m/wiretransfer0.png"></li>
					<li><img class="lgImg2" src="https://www.jmibrokers.com/mails/m/btc-payment.png"></li>
					<li><img class="lgImg2" src="https://www.jmibrokers.com/mails/m/coinbase.png"></li>
					<li><img class="lgImg2" src="https://www.jmibrokers.com/mails/m/epay0.png"></li>
					<li><img class="lgImg2" src="https://www.jmibrokers.com/mails/m/advcash0.png"></li>
					<li><img class="lgImg2" src="https://www.jmibrokers.com/mails/m/payeer.png"></li>
					<li><img class="lgImg2" src="https://www.jmibrokers.com/mails/m/perfectmoney0.png"></li>
					<li><img class="lgImg2" src="https://www.jmibrokers.com/mails/m/moneygram0.png"></li>
				</ul>
				<p class="mrtb">Best regards, </p>
				<p class="mrtb">JMI Brokers Team</p>
			</div>
		</div>
		<div id="footer" class="row" style=" background-color:#0059b2 !important; color:#fff !important;">
				<div class="col-sm-12">
					<p style=" color:#fff !important;"> <span>
						<img src="https://www.jmibrokers.com/mails/m/warning.png" style="color: #fff !important;"/>
						Risk warning
					</span> High Risk Investment Warning: Trading foreign exchange and/or contracts for differences on margin carries a high level of risk, and may not be suitable for all investors. The possibility exists that you could sustain a loss in excess of your deposited funds and therefore, you should not speculate with capital that you cannot afford to lose. Before deciding to trade the products offered by JMI Brokers you should carefully consider your objectives, 				financial situation, needs and level of experience. You should be aware of all the risks associated with trading on margin. JMI Brokers provides general advice that does not take into account your objectives, financial situation or needs. The content of this Website must not be construed as personal advice. JMI Brokers recommends you seek advice from a separate financial advisor.
						All opinions, news, analysis, prices or other information contained on this website are provided as general market commentary and does not constitute investment advice, nor a solicitation or recommendation for you to buy or sell any over-the-counter product or other financial instrument.
				</div>
		</div>

</body></html>
