@extends('cpanel.layout')
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

            <p class="text-right">The Currencies Heat Map is a set of tables which display the relative strengths of major currency pairs in comparison with each other, designed to give an overview of the forex market across various time frames. Whether you're a scalper, day, swing, or position trader, it is a powerful tool if you're looking for new and innovative trading strategies to add to your repertoire. Scroll down to the bottom of this forex heat map to view the key containing explanations for the color codes.</p>

<script type="text/javascript">$('div.newSocialButtons').remove();$('div.float_lang_base_2').remove();$('div.OUTBRAIN').remove();</script>


       <!--End content-->
            </div>
        </div>

    </div>

@stop
