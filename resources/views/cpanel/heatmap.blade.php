@extends('cpanel.layout')
@section('content')
    @section('style')
        <link href="/assets/css/heatmap.css" rel="stylesheet" />
    @stop

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="transactionHistory-table2">
                        <?php echo $heatmap; ?>
                    </div>

                    <p>The Currencies Heat Map is a set of tables which display the relative strengths of
                        major currency pairs in comparison with each other, designed to give an overview of the forex market
                        across various time frames. Whether you're a scalper, day, swing, or position trader, it is a powerful
                        tool if you're looking for new and innovative trading strategies to add to your repertoire. Scroll down
                        to the bottom of this forex heat map to view the key containing explanations for the color codes.</p>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script type="text/javascript">
            $('div.newSocialButtons').remove();
            $('div.float_lang_base_2').remove();
            $('div.OUTBRAIN').remove();
        </script>
    @stop
@stop
