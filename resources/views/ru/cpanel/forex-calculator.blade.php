@extends('ru.cpanel.layout')
@section('content')



        <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->

              <iframe _ngcontent-sc299="" id="all-in-one-calculator" width="100%" frameborder="0" scrolling="no" src="https://widgets-m.fxpro.com/ru/calculators/all-in-one/9" style="min-height:500px;"></iframe>
                  </div>

              <style>
                #all-in-one-calculator {height:925px;}
                @media only screen and (max-width: 1200px) {
                #all-in-one-calculator {height:120pxpx;}
            }
              </style>


          <!--End content-->
            </div>
        </div>

    </div>

@stop
