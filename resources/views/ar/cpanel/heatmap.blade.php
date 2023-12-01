@extends('ar.cpanel.layout')
@section('content')


<div class="col-lg-9 col-lg-pull-3 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->

              <script  src="https://www.jmibrokers.com/assets/ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>

            <link  href="/assets/css/heatmap.css" rel="stylesheet"/>

            <?PHP echo $heatmap; ?>

            <p class="text-right">خريطة الحرارة للعملات هي مجموعة من الجداول التي تعرض مواضع القوة النسبية للأزواج العملات الرئيسية في مقارنة مع بعضها البعض ، وتهدف إلى إعطاء لمحة عامة عن سوق تداول العملات الأجنبية خلال أطر زمنية مختلفة. سواء كنت تاجر مستغل، يوم، متأرجح، أو الموقف، فهي أداة قوية إذا كنت تبحث عن استراتيجيات تجارية جديدة ومبتكرة لتضيفها الى القدرات الخاصه بك. انتقل إلى أسفل الصفحة لعرض دليل يحتوي على تفسيرات لرموز الألوان.</p>

            <script type="text/javascript">$('div.newSocialButtons').remove();$('div.float_lang_base_2').remove();$('div.OUTBRAIN').remove();</script>


       <!--End content-->
            </div>
        </div>

    </div>

@stop
