<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
    *{padding:0px;margin:0px;}
	#section1{text-align: center;margin: 20px 0px 0px;min-height: 135px;padding: 0px 0px 0px 80px;}
	#section1 #left-section { width: 335px; float: left; padding-top: 40px; text-align: left;font-family: sans-serif;}
	#section1 #right-section{width:185px;float:left;}
	#section2{text-align: center;padding: 30px 20px 20px 80px;border-top: 2px solid #0059b2;}
	#section3 span{font-size: 16px;color: #fff;margin: 10px 10px 10px 90px;padding-left:15px;background: #0059b2;font-family: sans-serif;display: block;padding: 10px 20px;max-width: 430px;border-radius: 20px;}
	#section5{text-align: left;width: 450px;margin: 10px 10px 10px 90px;}
	#footer{max-width: 600px;border-top: 2px solid #ffc926;font-family: sans-serif;padding: 10px 50px 0px 90px;}
	#license{display:inline-block;}
	#first-div{float: left; margin-right: 20px;}
	#first-div img{width:200px;}
	#second-div img{width:200px;}
	#third-div img{width:300px;}

	#footer a{text-decoration:none;padding: 0px;float: left;width: 20%;height: 60px;display: inline-block;}
	@media only screen and (max-width: 402220px) {
	#section1 #right-section{width:100%;text-align:center;float:unset !important;}
		#section1{padding: 0px 0px 0px 30px !important;}
		#section2{padding: 30px 20px 20px 30px !important;}
		#section3 span{margin: 10px 10px 10px 30px !important;}
		#section5{margin: 10px 10px 10px 30px !important;}
		#footer{    padding: 10px 50px 0px 30px;}
		#section1 #left-section { width: 100%; float: left; padding-top: 40px; text-align: left;font-family: sans-serif;}
		#section1 #right-section{width:200px;float:left;}

		#first-div,#first-div a{text-align:center;float:unset;}
		#second-div,#second-div a{text-align:center;float:unset;}
		#third-div,#third-div a{text-align:center;float:unset;}
		#third-div img{width:200px;}

	#footer a{text-decoration:none;padding: 0px;float: left;;width: 33%;height: 60px;}

	#license span{width:100% !important; padding-left:0px !important;}
	#license{height:20px !important;}
	}

    </style>
</head>
<body >
    <div id="wrapper" style="max-width:600px;text-align: left;margin:auto;background: #ecf0f5; ">
        <div id="header" style="width:100%;">
            <div id="headerimg " style="width:100%;background:#072054;text-align: center;">
                <img src="{{asset('/images/jmi-header.png')}}" style="max-width: 600px;"/>
            </div>
            <div id="start-trading" style="width:100%;margin:auto;margin-top:-15px;text-align: center;"><a style="background:#ffc926;padding: 10px 50px;font-size: 20px;color:#000;text-transform: uppercase;border-radius: 25px;font-family: sans-serif;">Start Trading</a></div>
        </div>

        <div id="section1" style="">
			<div id="left-section">
				     <span style="font-size:20px;color:#15429f;padding-left:15px;display: block;">Dear <?PHP $titlearr=["Mr", "Mrs","Miss"," "];echo  $titlearr[$data["title"]].' '.$data["name"] ?></span><br>
            <div><?PHP echo $data["details"]; ?> </div>
			</div>
			<div id="right-section" >
				<img src="https://www.jmibrokers.com/mails/message-icon.png" style="width:185px;"/>
			</div>

		</div>



		<div id="section3" style=" text-align: left; ">
			<span >If you haven't download yet the JMI BROKERS MT4 Trading Platform , please click the below link</span><br>
		</div>

		<div id="section5" >
			<div id="first-div" style="  "> <a href="https://download.mql5.com/cdn/web/jmi.brokers.ltd/mt4/jmibrokers4setup.exe"> <img src="https://www.jmibrokers.com/mails/android-platform.png" /> </a> </div>
			<div id="second-div"> <a href="https://download.mql5.com/cdn/mobile/mt4/android?server=JMIBrokers-Demo,JMIBrokers-JMI" ><img src="https://www.jmibrokers.com/mails/iphone-platform.png"    /> </a> </div>
			<div id="third-div" > <a href="https://download.mql5.com/cdn/web/jmi.brokers.ltd/mt4/jmibrokers4setup.exe"><img src="https://www.jmibrokers.com/mails/mt4-platform.png"   /></a> </div>

		</div>

        <div id="footer" >

            <span style="font-size: 18px;font-weight: bold;color: #0059b2;">Payment Methods:</span><br>
            <div id="fundaccount" style="background:#ecf0f5;text-align:center;min-height:50px;display: inline-block;">
              <a href="https://www.jmibrokers.com/en/cpanel/deposit-fund" style=""><img src="https://www.jmibrokers.com/mails/coinbase.png" style="width: 100%;vertical-align: middle;"></a>
              <a href="https://www.jmibrokers.com/en/cpanel/deposit-fund" style=""><img src="https://www.jmibrokers.com/mails/epay.png" style="width: 100%;vertical-align: middle;"></a>
              <a href="https://www.jmibrokers.com/en/cpanel/deposit-fund" style=""><img src="https://www.jmibrokers.com/mails/advcash.png" style="width: 100%;vertical-align: middle;"></a>
              <a href="https://www.jmibrokers.com/en/cpanel/deposit-fund" style=""><img src="https://www.jmibrokers.com/mails/payeer.png" style="width: 100%;vertical-align: middle;"></a>
              <a href="https://www.jmibrokers.com/en/cpanel/deposit-fund" style=""><img src="https://www.jmibrokers.com/mails/perfect-money.png" style="width: 100%;vertical-align: middle;"></a>
              <a href="https://www.jmibrokers.com/en/cpanel/deposit-fund" style=""><img src="https://www.jmibrokers.com/mails/western-union.png" style="width: 100%;vertical-align: middle;"></a>
              <a href="https://www.jmibrokers.com/en/cpanel/deposit-fund" style=""><img src="https://www.jmibrokers.com/mails/swift.png" style="width: 100%;vertical-align: middle;"></a>
              <a href="https://www.jmibrokers.com/en/cpanel/deposit-fund" style=""><img src="https://www.jmibrokers.com/mails/bitcoin.png" style="width: 100%;vertical-align: middle;"></a>
              <a href="https://www.jmibrokers.com/en/cpanel/deposit-fund" style=""><img src="https://www.jmibrokers.com/mails/moneygram.png" style="width: 100%;vertical-align: middle;"></a>

            </div>
          





        </div>

			<div style="background:#ffc926;text-align: center;padding: 10px;font-family: sans-serif;margin-top: -5px;">
				<a href="https://www.jmibrokers.com/en" style="text-decoration:none;color:#000;padding-left:15px;">www.jmibrokers.com</a>

			</div>
        </div>



</body>
</html>
