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

              <style>
                  #all-in-one-calculator {min-height:500px;}
                  @media only screen and (max-width: 1200px) {
                      #all-in-one-calculator {height:680px;}
                  }
              </style>



                          <div class="table-responsive">
                              <table class="pipCalcResults table table-responsive" id="results">

                              <?PHP echo $calculator; ?>

                              </table>
                          <script type="text/javascript">
              $('table.pipCalcResults tr td:last-child').remove();
              $('table.pipCalcResults thead th:last-child').remove();
              $("table.pipCalcResults tr td a").removeAttr("href");


                          </script>



                          </div>


          <!--End content-->
            </div>
        </div>

    </div>

@stop
