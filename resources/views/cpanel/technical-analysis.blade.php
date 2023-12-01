@extends('cpanel.layout')
@section('content')


   <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->

              <div class="" id="economic-calendar">

  <style>
  .technical li a {
      border: 2px solid #fff;
      border-radius: 2px;
      color: #fefefe;
      display: inline;
      font-size: 16px;
      padding: 2px 10px;
      width: 110px;
      background: #3aadc7;
      transition: all .3s linear 0s;
  }

  .technicaltechnical li a:hover {
      background-color: #fefefe;
      color: #3aadc7;
      border: 2px solid #3aadc7;
      box-shadow: 0px 0px 15px 3px #ffffff;
  }

  .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
      padding: 4px;
  }
  td.same{visibility:hidden;}
  div#economic-calendar ul{display: inline-flex; list-style-type: none;padding-top: 10px}

  @media only screen and (max-width: 600px) {
  div#economic-calendar ul{display:inline-block !important;}
  div#economic-calendar ul li a{display: list-item;}
  div.technical{text-align:center;}
  }

  </style>

  <style>
  .ui--accordion-item-title-text {
      display: block;
      overflow: hidden;
  }
  html .ui--accordion-state-closed > .ui--accordion-item-title {
      color: #333333 !important;
      text-shadow: 0 1px 0 #ffffff;
  }
  .ui--accordion-state-closed > .ui--accordion-item-content {
      position: absolute;
      visibility: hidden;
      top: -99999px;
      display: block !important;
      width: 100%;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
  }
  html  .ui--accordion-state-opened > .ui--accordion-item-title {
      color: #ffffff !important;
  }
  html .ui--accent-gradient, li.top-level-item.has-child.hover > a, html .tp-caption.caption-primary > div, html  .ui--accordion-state-opened > .ui--accordion-item-title, html  .ui--toggle-state-closed > .ui--toggle-title .ui--toggle-icon, html  .ui--toggle-state-opened > .ui--toggle-title {
      background-color: #00c0fc;
      background-image: none;
      color: #ffffff;
      text-shadow: 0 -1px 0 #00c0fc;
  }
  .ui--accordion-item-title {
      position: relative;
      z-index: 3;
      display: block;
      padding: 10px 30px;
      text-decoration: none !important;
      border-bottom: 1px solid #e5e5e5;
      outline: 0;
  }
  .ui--accordion-state-closed > .ui--accordion-item-title {
      color: #333333 !important;
      text-shadow: 0 1px 0 #ffffff;
  }
  .ui--gradient-grey {
      background-color: #f1f1f1;
      *background-color: #f1f1f1;
      background-image: -moz-linear-gradient(top,#ffffff,#f1f1f1);
      background-image: -webkit-gradient(linear,0 0,0 100%,from(#ffffff),to(#f1f1f1));
      background-image: -webkit-linear-gradient(top,#ffffff,#f1f1f1);
      background-image: -o-linear-gradient(top,#ffffff,#f1f1f1);
      background-image: linear-gradient(to bottom,#ffffff,#f1f1f1);
      background-repeat: repeat-x;
      filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#ffffff',endColorstr='#f1f1f1');
      -ms-filter: "progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#ffffff',endColorstr='#f1f1f1')";
  }
  .ui--accordion-item-content {
      background-color: #ffffff;
      border-bottom: 1px solid #ebebeb;
      padding: 30px 30px 12px;
      text-shadow: none;
  }

   .ui--accordion-state-opened > .ui--accordion-item-title {
      color: #ffffff !important;
  }


  </style>
  <script async src="/wave/js/vendors/extensions.js"></script>
      <div class="row">
          <div class="col-sm-12 technical">
          <ul>
            <li><a class="btn GBPUSD"  href="/en/cpanel/technical?type=gbpusd">GBP/USD</a></li>
            <li><a class="btn EURUSD"  href="/en/cpanel/technical?type=eurusd">EUR/USD</a></li>
            <li><a class="btn USDJPY"   href="/en/cpanel/technical?type=usdjpy">USD/JPY</a></li>
            <li><a class="btn AUDUSD"   href="/en/cpanel/technical?type=audusd">AUD/USD</a></li>
            <li><a class="btn GOLD"   href="/en/cpanel/technical?type=gold">GOLD</a></li>
            <li><a class="btn OIL"   href="/en/cpanel/technical?type=oil">OIL</a></li>
          </ul>

          </div>

      </div>


      <div class="ui--accordion ui--box ui--animation clearfix">
      <h4 id="custom-title-h1-1" class="ui--animation " style="text-align: center; ">Technical Analysis</h4>
      <?PHP $i=1;?>
       @foreach($technicalanalysis as $technical)




       <div class="ui--accordion ui--box ui--animation clearfix">
      <div class="ui--accordion-item ui--gradient ui--gradient-grey on--hover ui-row first-item accordion-<?PHP echo $i;?> ui--accordion-state-closed">
      <a href="#accordion-<?PHP echo $i;?>" class="ui--accordion-item-title heading"><div><span class="ui--accordion-item-title-text">{!! $technical->created_at !!} - {!! $technical->title !!} </span></div></a>
        <div id="accordion-<?PHP echo $i;?>" class="ui--accordion-item-content">
          <div class="ui--animation-in make--fx--appear ui--pass clearfix" data-fx="fx--appear" data-delay="150" data-start-delay="0">
            <div class="auto-format fx--appear ui--animation-fire" delay="0">
                <p>{!! $technical->details !!}</p>
            </div>
          </div>
        </div>
      </div>
      </div>

      <?PHP $i++;?>

            @endforeach

      </div>


       <!--End content-->
            </div>
        </div>

    </div>

@stop
