<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
<div class="row gray_bg">

        <script  src="https://www.jmibrokers.com/assets/ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>

        <style>
            table thead tr th{text-align: center;}

        </style>


                <div class="table-responsive">
                    <table class="pipCalcResults table table-responsive" id="results" style="direction:  <?PHP echo $direction; ?>;text-align:center;">

                        <?PHP echo $calculator; ?>

                    </table>
                    <script type="text/javascript">
                        $('table.pipCalcResults tr td:last-child').remove();
                        $('table.pipCalcResults thead th:last-child').remove();
                        $("table.pipCalcResults tr td a").removeAttr("href");


                    </script>



                </div>
