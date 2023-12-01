@extends('ru.cpanel.layout')
@section('content')



    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

        <!--start content -->

    	<div class="row">

			<div class="col-md-4 col-sm-4 col-xs-6 platform-box text-center">
				<img loading="lazy" src="/assets/cpanel/img/mt4-windows.jpg" alt="MT4 for windows" class="max-width-100"/>
				<h3>MT4 for Windows</h3>
				<div class="box-details">Supported OS: Windows 98, 98SE, 2000, XP, Windows Vista, Windows 7 and Windows 8</div>
				<a href="https://download.mql5.com/cdn/web/jmi.brokers.ltd/mt4/jmibrokers4setup.exe" class="btn btn-success form-control">Скачать сейчас</a><br />

			</div>



			<div class="col-md-4 col-sm-4 col-xs-6 platform-box text-center">
				<img loading="lazy" src="/assets/cpanel/img/mt4-iphone.png" alt="MT4 for iphone" class="max-width-100"/>
				<h3>MT4 for IPhone</h3>
				<div class="box-details">Supported OS: iPhone 3GS, 4, 4S, iOS 4.0 and later</div>
				<a href="https://download.mql5.com/cdn/mobile/mt4/ios?server=JMIBrokers-Demo,JMIBrokers-JMI" class="btn btn-success form-control">Скачать сейчас</a><br />

			</div>

			<div class="col-md-4 col-sm-4 col-xs-6 platform-box text-center">
				<img loading="lazy" src="/assets/cpanel/img/mt4-ipad.png" alt="MT4 for ipad" class="max-width-100"/>
				<h3>MT4 for IPad</h3>
				<div class="box-details">Supported OS: iPod touch, iPad1, iOS 4.0 and later</div>
				<a href="https://download.mql5.com/cdn/mobile/mt4/ios?server=JMIBrokers-Demo,JMIBrokers-JMI" class="btn btn-success form-control">Скачать сейчас</a><br />

			</div>

			<div class="col-md-4 col-sm-4 col-xs-6 platform-box text-center">
				<img loading="lazy" src="/assets/cpanel/img/mt4-android.png" alt="MT4 for android" class="max-width-100"/>
				<h3>MT4 for Android</h3>
				<div class="box-details">Supported OS: Touchscreen smartphone or tablet, андроид 2.1 and later</div>
				<a href="https://download.mql5.com/cdn/mobile/mt4/android?server=JMIBrokers-Demo,JMIBrokers-JMI" class="btn btn-success form-control">Скачать сейчас</a><br />

			</div>

    	</div>

    </div>

</div>
<style>
	.box-body img{height:210px;}
</style>
<script type="text/javascript">
$(document).ready(function(){

    $('.box-body').each(function(){
        var highestBox = 0;

        $(this).find('.box-details').each(function(){
            if($(this).height() > highestBox){
                highestBox = $(this).height();
            }
        })

     //   $(this).find('.box-details').height(highestBox);
        $(this).find('.box-details').height('40px');
    });

    $('.box-body').each(function(){
        var highestBox = 0;

        $(this).find('.platform-box').each(function(){
            if($(this).height() > highestBox){
                highestBox = $(this).height();
            }
        })

       // $(this).find('.platform-box').height(highestBox);
        $(this).find('.platform-box').height('366px');
    });

});

</script>



            <!--End content-->
            </div>
        </div>

    </div>



@stop
