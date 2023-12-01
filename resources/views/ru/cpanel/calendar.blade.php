@extends('ru.cpanel.layout')
@section('content')


   <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->

              <div class="" id="economic-calendar">

                <iframe scrolling="no" allowtransparency="true" frameborder="0" width="100%" height="500px" src="https://www.tradays.com/ru/economic-calendar/widget?mode=2&amp;utm_source=www.jmibrokers.com"></iframe>

  <style>
  .calendar li a {
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

  .calendar li a:hover {
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
  div.calendar{text-align:center;}
  }

  </style>

      <div class="row" style="display:none;">
          <div class="col-sm-12 calendar">
          <ul>
          <li><a class="btn last_week"  href="/ru/cpanel/calendar?date=last-week">Прошлая неделя</a></li>
          <li><a class="btn this_week"  href="/ru/cpanel/calendar?date=this-week">Эта неделя</a></li>
          <li><a class="btn next_week"   href="/ru/cpanel/calendar?date=next-week">На следующей неделе</a></li>
          <li><a class="btn yesterday"   href="/ru/cpanel/calendar?date=yesterday">Вчерашний день</a></li>
          <li><a class="btn today"   href="/ru/cpanel/calendar?date=today">сегодня</a></li>
          <li><a class="btn tomorrow"   href="/ru/cpanel/calendar?date=tomorrow">Завтра</a></li>
          </ul>

          </div>


          <div class="col-sm-6">
              <div id="datepicker"></div>
          </div>
      </div>
    <div class="row" style="display:none;">
          <h4>Серверное время: <span id="calendar_time"></span></h4>
    </div>

    <script  src="https://www.jmibrokers.com/assets/ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>


  <script>


  var timeDisplay = document.getElementById("calendar_time");

  function refreshTime() {
    var dateString = new Date().toLocaleString("en-US", {timeZone: "Chile/Continental"});
    var formattedString = dateString.replace(", ", " - ");
    timeDisplay.innerHTML = formattedString;
  }

  setInterval(refreshTime, 1000);

  var prev;
  $('tr td.date-td').each(function() {
    var text = $(this).text().trim();alert(text);
    if (prev == text)
      $(this).remove();

    prev = text;
  });

   </script>
   <div class="table-responsive" style="overflow-x:auto;display:none;">
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Currency</th>
                      <th>Impact</th>
                      <th>Event</th>
                      <th>Actual</th>
                      <th>Forcast</th>
                      <th>Previous</th>
                  </tr>
              <thead>
              <tbody>
                 <?PHP  $date_td=9999;foreach($economic_calendar as $row){ ?>
                      <tr>
                          <td id="date" <?php if($row->date==$date_td){echo 'class="same"';}else{echo 'class="new"';} ?> >{{$row->date}}



                          <?PHP if($row->date !== '  '){echo $row->year;$date_td=$row->date;} ?>
                          </td>
                          <td id="old_time" <?PHP if($row->time !== ''){echo 'class="new-day"';}else{echo 'class="no-border"';} ?> >{{$row->time}}</td>
                          <td><?PHP if($row->currency=='USD'){echo '<img loading="lazy" src="/assets/img/calendar/usd.jpg" alt="usd" />';}elseif($row->currency=='EUR'){echo '<img loading="lazy" src="/assets/img/calendar/eur.jpg" alt="eur" />';}elseif($row->currency=='GBP'){echo '<img loading="lazy" src="/assets/img/calendar/gbp.jpg" alt="gbp" />';}elseif($row->currency=='AUD'){echo '<img loading="lazy" src="/assets/img/calendar/aud.jpg" alt="aud" />';}elseif($row->currency=='CAD'){echo '<img loading="lazy" src="/assets/img/calendar/cad.jpg" alt="cad" />';}elseif($row->currency=='CHF'){echo '<img loading="lazy" src="/assets/img/calendar/chf.jpg" alt="chf" />';}elseif($row->currency=='JPY'){echo '<img loading="lazy" src="/assets/img/calendar/jpy.jpg" alt="jpy" /> ';}elseif($row->currency=='NZD'){echo '<img loading="lazy" src="/assets/img/calendar/nzd.jpg" alt="nzd" /> ';}  ?> {{$row->currency}}</td>
                          <td>
                          <?PHP if($row->impact=='low'){echo '<img loading="lazy" src="/assets/img/calendar/low.png" title="low" alt="low"/>';}elseif($row->impact=='medium'){echo '<img loading="lazy" src="/assets/img/calendar/medium.png" title="medium" alt="medium"/>';}elseif($row->impact=='high'){echo '<img loading="lazy" src="/assets/img/calendar/high.png" title="high" alt="high"/>';}elseif($row->impact=='holiday'){echo '<img loading="lazy" src="/assets/img/calendar/holiday.png" title="holiday" alt="holiday"/>';}
                          ?>
                          </td>
                          <td class="textleft">{{$row->event}}</td>
                          <td @if($row->actual_class==1) style="color:green;" @endif @if($row->actual_class==2) style="color:red;" @endif>{{$row->actual}}</td>
                          <td>{{$row->forcast}}</td>
                          <td @if($row->previous_class==1) style="color:green;" @endif @if($row->previous_class==2) style="color:red;" @endif>{{$row->previous}}</td>
                          </tr>


                 <?PHP } ?>
              <tbody>

          </table>
      </div>

       <!--End content-->
            </div>
        </div>

    </div>

@stop
