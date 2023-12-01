

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>JMI Brokers | The Best Broker</title>

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
    p, span{font-size:15px;}
     h5,a{font-size:20px;}
     h3{font-size: 32px;}
    p,h1,h2,h3,h4,h5,h6,a,span{color:#fff;font-family: TOYOTAARABICDISPLAY;}

    body{background-image: url('/assets/landing/landing14-bg.jpg');background-size: 100%;}
    #header img{width: 390px;}
    div#content{width:100%;}
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
                    session()->put('refeer_cookie', 'landing 14');
                }
        ?>


<div class="raw">
    <div class="container" id="header">
        <div><a href="#"><img src="/assets/landing/landing14-logo.png"></a></div>
    </div>
    <div class="raw" id="content">
        <div class="container">
            <div id="text" dir="rtl">
                <h3 class="text-right"> 
                    <i class="fa fa-check" aria-hidden="true" style="color:#bfd730;"></i>
                    الشركة مـرخصة من هيئه الاوراق المـاليه بسويسرا ومسجل بـمدينـة زج 
                </h3>
                <h3 class="text-right">
                    <i class="fa fa-check" aria-hidden="true" style="color:#bfd730;"></i>
                    حاصلين على ترخيص من هـــيئــة الأوراق الماليــة لدى VFSC
                </h3>  
            </div>
            <div class="container " style="background:rgba(255,255,255,0.6);border-radius: 20px;padding-right: unset;">
                <div class="col-sm-3 col-sm-push-9" id="right" style="background:#fff;border-radius: 20px;padding: 0px;">
                    <p style="font-size: 32px !important;color:#333;margin:20px 10px;line-height: 45px;">يمكنك تحقيق الأرباح من العلامات التجارية الرائدة فى العالم </p>
                </div>
                    <form role="form" action="{{ URL::to('/en/landingpage1') }}" id="landing-form" method="post" class="registration-form">

                <dir class="col-sm-9 col-sm-pull-3" id="left">
                    <p style="font-size: 30px;text-shadow: 0 0 10px #0072ff, 0 0 10px #0072ff;">حقق الأرباح من خلال نسخ صفقات كبار المستثمرين </p>
                    <div class="col-sm-9 col-sm-push-3">

                 
                    <div class="col-sm-6">
                        <input type="text" name="name" placeholder="الأسم " style="height: 40px; border-radius: 20px; text-align: right; font-weight: bold;margin:8px 0px;" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="number" name="phone" placeholder="رقم الهاتف" style="height: 40px; border-radius: 20px; text-align: right; font-weight: bold;" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="email" name="email" placeholder="البريد الالكترونى" style="height: 40px; border-radius: 20px; text-align: right; font-weight: bold; " required>
                    </div>


                         <input type="hidden" name="landing_name" value="landing14">


                    </div>
                    <div class="col-sm-3 col-sm-pull-9">
                        <div><input type="submit"   name="" value="أبدأ الأن" style="width: 100px; background: #003548; border: none; border-radius: 20px; height: 80px; color: #fff; font-weight: bold; font-size: 30px; margin-top: 10px;"></div>


                    </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        </form>
                </dir>

            </div>
        </div>
   

    </div>




   <div class="" id="footer" style="margin-top: 20px;">
       
       <div class="col-sm-10 col-sm-push-2" style="background: #003548;border:10px solid #fff;border-radius: 100px;border-right: unset;padding-top: 20px;">
           <div class="col-sm-4">
               <div id="right" style="float: right;">
                   <i class="fa fa-usd" aria-hidden="true" style="font-size: 70px; border: 11px solid #004256; border-radius: 50%; width: 120px; height: 120px; color: #fff; text-align: center; vertical-align: text-bottom; background: #006283; padding-top: 16px;"></i>
               </div>
               <div id="left" style="width: 190px; float: right;">
                   <p style="font-size: 30px;color:#0c96c5;">خطوة 3</p>
                   <p style="font-size: 18px;">أبدأ تداول</p>
                   <p style="font-size: 16px;color:#0c96c5;">أبدأ التداول وكن مستعد لعمل ارباح حقيقية</p>
               </div>
           </div>
           <div class="col-sm-4">
               <div id="right" style="float: right;">
                   <i class="fa fa-lightbulb-o" aria-hidden="true" style="font-size: 70px; border: 11px solid #004256; border-radius: 50%; width: 120px; height: 120px; color: #fff; text-align: center; vertical-align: text-bottom; background: #006283; padding-top: 16px;"></i>
               </div>
               <div id="left" style="width: 190px; float: right;">
                   <p style="font-size: 30px;color:#0c96c5;">خطوة 2</p>
                   <p style="font-size: 18px;">تدريب وتعليم</p>
                   <p style="font-size: 16px;color:#0c96c5;">طبق الادوات والنصائح التى حصلت عليها من الدرب الخاص بك على حساب تجريبى</p>
               </div>
           </div>
           <div class="col-sm-4">
               <div id="right" style="float: right;">
                   <i class="fa fa-file-text" aria-hidden="true" style="font-size: 60px; border: 11px solid #004256; border-radius: 50%; width: 120px; height: 120px; color: #fff; text-align: center; vertical-align: text-bottom; background: #006283; padding-top: 16px;"></i>
               </div>
               <div id="left" style="width: 190px; float: right;">
                   <p style="font-size: 30px;color:#0c96c5;">خطوة 1</p>
                   <p style="font-size: 18px;">املء الأستمارة</p>
                   <p style="font-size: 16px;color:#0c96c5;">ادخل تفاصيلك واحجز موعد مع مدرب التداول الخاص بك</p>
               </div>
           </div>



       </div>

      <div class="col-sm-2 col-sm-pull-10" style="margin-top: 120px;}">
            <span class="li-social" style="background: rgba(255,255,255,0.3);padding: 10px;margin: 10px;font-size: 20px;">
                Contact us
                <a href="https://www.facebook.com/jmibrokers/"><i class="fa fa-facebook"></i></a> 
                <a href="tel:+97144096705"><i class="fa fa-phone"></i></a> 
                <a href="mailto:info@jmibrokers.com"><i class="fa fa-envelope"></i></a> 
            </span>
       </div>

   </div>




</div>




        <!-- Javascript -->
        <script src="{{ URL::asset('/') }}landing-assets/js/jquery-1.11.1.min.js"></script>
        <script src="{{ URL::asset('/') }}landing-assets/bootstrap/js/bootstrap.min.js"></script>
   

   <script>



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


    </body>

</html>