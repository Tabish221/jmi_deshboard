

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta property="og:image" content="https://www.jmibrokers.com/assets/landing/fb/european-stocks.jpg"/>
        <meta property="og:description" content="تسجيل حساب تداول جديد مع شركة JMIBrokers المرخصة من سوسيرا"/>
        <meta property="og:title" content="JMI Brokers | The Best Broker"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://www.jmibrokers.com/en/landingpage17"/>

        <title>JMI Brokers | The Best Broker</title>
        <link rel="shortcut icon" href="/assets/img/favicon.ico" />

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{ URL::asset('/') }}landing-assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ URL::asset('/') }}landing-assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ URL::asset('/') }}landing-assets/css/form-elements.css">
        <link rel="stylesheet" href="{{ URL::asset('/') }}landing-assets/css/style.css">



<style>
    @font-face {
  font-family: TOYOTAARABICDISPLAY;
  src: url(/assets/landing/TOYOTAARABICDISPLAY-REGULAR.TTF);
}

    p, span{font-size:15px;margin:0px;}
     h5,a{font-size:20px;}
     h4{font-size:22px;margin:5px 0px;}
     h3{font-size: 28px;margin: 5px 0px;}
    p,h1,h2,h3,h4,h5,h6,a,span{color:#fff;font-family-: TOYOTAARABICDISPLAY;}

    body{background-size: 100%;font-family: unset;}
    #header img{width: 390px;}
    div#content{width:100%;}
    input,select{direction: rtl;height: 35px !important;}
    a:hover{color:#fff;}
@media only screen and (max-width: 1300px) {
  body {
  }

}



@media only screen and (max-width: 768px) {

#phone{padding-left: 0px;}
#country-code{padding-right: 0px;}
body{background-size: 100% 100%;}
}
@media only screen and (min-width: 769px) {


}
@media only screen and (min-width: 480px) {
.raw .col-md-6 .flag{float:left;}
}

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
                    session()->put('refeer_cookie', 'landing 21');
                }
        ?>

<div class="raw" style="line-height: 50px;">
        <div class="container">
            <div class="col-md-4">
        <div class="raw text-center" id="logo1" style="">
            <a href="/"><img src="/assets/landing/landing21-logo.png" style="width: 140px;"></a>
        </div>

            </div>
            <div class="col-md-3 ">

            </div>
            <div class="col-md-5 ">
              <span class="li-social" style=" margin: 5px; font-size: 16px; display: inline-block;color:#000;">
                  CALL US: <span style="color: #00688b;"> +971 44096705 </span>
              </span>
              <a class="btn " href="/en/login" style="background:#00688b;border-radius: unset;width: 120px;color: #fff;" >LOGIN</a>

            </div>
        </div>
</div>
<style>
.uk-button {
    margin-top: 10px;
    padding-top: 5px;
    padding-bottom: 5px;
    margin: 0;
    border: none;
    overflow: visible;
    font: inherit;
    color: inherit;
    text-transform: none;
    -webkit-appearance: none;
    display: inline-block;
    box-sizing: border-box;
    padding: 5px 60px;
    vertical-align: middle;
    font-size: 16px;
    line-height: 42px;
    text-align: center;
    text-decoration: none;
    width:280px;
    margin-top: 10px;
}
.uk-button-demo {
    background-color: #00688b;
    color: #fff;
}
.uk-button-live {
    background-color:#ffc926;;
    color: #fff;
}

</style>
<div class="row" style="background-image: url(/assets/landing/landing21-cover.jpg); min-height: 680px;margin:0px;">
  <div style="background: rgba(3, 3, 3, 0.8); margin-top: 590px; text-align: left; padding-left: 60px;min-height: 90px;padding-top:10px;">
    <p>JMI Brokers is Regulated & as a Swiss Company From Zug - Switzerland -Registeration #CHE -334 -229 -499 </p>
    <p> JMI Brokers is a Financial Service Provider Company Registered- Authorized and holds a Priincipals license from Vanuatu Financial -
 Servized Commission (VFSC) as "Dealers in Securities "</p>
  </div>
</div>
<div class="container" style="float: left; position: absolute; top: 500px; left: 50px; text-align: left;">
<a href="/en/signup" class="uk-button uk-button-live" ><i class="fas fa-scroll uk-margin-small-right"></i>Open Live Account</a>
<br />
<a href="/en/signup" class="uk-button  uk-button-demo"><i class="fas fa-scroll uk-margin-small-right"></i>Open Demo Account</a>
</div>
<div class="container" style="padding: 20px  0px;">

  <div class="col-sm-6 text-left col-sm-push-1">
    <h4 style="background:#00688b;padding: 10px;">Why You Choose Us</h4>
    <h5 style="color:#333;">1-Segregation Of Client Funds</h5>
    <h5 style="color:#00688b;">2-Bank accounts in tier 1 banks</h5>
    <h5 style="color:#00688b;">3-Automated risk management</h5>

  </div>

  <div class="col-sm-6 col-sm-pull-1" >
      <img src="/assets/landing/landing21-img.png" />
  </div>
  <br />
</div>


<div class="row" style="background:#f3f3f3;margin:0px;padding-top: 20px;">
    <div class="container">
      <div style="min-height:120px;text-align:left;">

        <li style="color:#000;list-style-type: none;">
          <i class="fa fa-location-arrow" style="color: #00688b; font-size: 30px; padding-right: 10px;"></i>
          JMI Brokers AG - Swiss Asset and funds Management Company-
          Bahnhofstrasse 21-6300 ZUG <br />

        </li>
        <li style="color:#000;list-style-type: none;padding-left: 39px;">Sheikh Zayed Road - Downtown Dubai - United Arab Emirates</li>
        <li style="color:#000;list-style-type: none;padding-left: 39px;">
        216Degla  Thakanat Almaadi Cairo - Egypt</li>
        <li style="color:#000;list-style-type: none;">
          <i class="fa fa-mobile" style="color: #00688b; font-size: 30px; padding-right: 10px;"></i>
          +971 44096705
          <i class="fa fa-envelope" style="color: #00688b; font-size: 28px; padding-right: 10px;padding-left: 10px;"></i>
          backoffice@jmibrokers.com
          <i class="fa fa-globe" style="color: #00688b; font-size: 28px; padding-right: 10px;padding-left: 10px;"></i>
          www.jmibrokers.com
        </li>

      </div>

    </div>

    <div style="height:10px;background:#00688b;"></div>


  </div>

        <!-- Javascript -->
        <script src="{{ URL::asset('/') }}landing-assets/js/jquery-1.11.1.min.js"></script>
        <script src="{{ URL::asset('/') }}landing-assets/bootstrap/js/bootstrap.min.js"></script>



<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-171709819-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-171709819-1');
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


<script type='text/javascript'>
  window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', 'a8894a0c63fb268e0a70352014afd534c95e2ea4');
</script>
    </body>

</html>
