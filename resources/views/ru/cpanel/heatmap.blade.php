@extends('ru.cpanel.layout')
@section('content')


   <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->

              <script  src="https://www.jmibrokers.com/assets/ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>

            <link  href="/assets/css/heatmap.css" rel="stylesheet"/>

            <?PHP echo $heatmap; ?>

                        <p class="text-right">Тепловая карта валют - это набор таблиц, в которых отображается относительная сила основных валютных пар по сравнению друг с другом, предназначенных для обзора рынка форекс в различные периоды времени. Независимо от того, являетесь ли вы скальпером, дневным трейдером, трейдером на колебаниях или позиционным трейдером, это мощный инструмент, если вы ищете новые и инновационные торговые стратегии, которые можно было бы добавить в свой репертуар. Прокрутите вниз эту тепловую карту форекс, чтобы увидеть ключ, содержащий пояснения к цветовым кодам.
                        </p>

                        <script type="text/javascript">$('div.newSocialButtons').remove();$('div.float_lang_base_2').remove();$('div.OUTBRAIN').remove();</script>


       <!--End content-->
            </div>
        </div>

    </div>

@stop
