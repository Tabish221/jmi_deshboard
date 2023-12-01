<?
@extends('master')

@section('content')
         <style type="text/css">
.style5 {color: #a6c54c; font-size: 16px;}
.li1 li {list-style: url(images/btn_greenarrow.html) inside; font-size: 14px; padding-bottom: 10px;}
.stylebb {display:block;
         height:37px;
         width:197px;
         border-style:none;}
         #downloadBtn
         {
           width: 90%;
          max-width: 300px;
          background-color: #0059b2;
          color: #ffc926;
          padding: 15px 20px;
          font-family: sans-serif;
          font-size: 16px;
          font-weight: bold;
          text-transform: uppercase;
          margin-top:2rem;
          border:none;
          cursor:pointer;
         }
         #downloadBtn:hover , #downloadBtn:focus
         {
           background-color: #ffc926;
           color: #0059b2;
         }
         #centerMsg
         {

           margin:1rem;

         }
         #centerMsg h1
         {
           color:#0059b2;
           color: #0059b2;
          font-size: 4rem;
          margin-bottom: 2rem;
          font-weight: bold;
         }
         #centerMsg p
         {
           color: #999;
           font-size: 2rem;

         }
         #psdvWnl
         {
           text-decoration:underline;
           font-weight:bold;
         }

.slide-live-button {
    border: unset !important;
    display: inline-block;
    background-color: #ffc926;
    color: #0059b2 !important;
    padding: 15px 20px;
    font-family: sans-serif;
    font-size: 16px;
    font-weight: bold;
    margin: 5px;
}

.slide-live-button:hover {
    transition: all ease 200ms;
    border: unset !important;
    display: inline-block;
    background-color: #0059b2 !important;
    color: #ffc926 !important;
    padding: 15px 20px;
    font-size: 16px;
    text-decoration: none;
    margin: 5px;
}

</style>



<div class="container">
            <div id="centerMsg" class="row mrtb40">
                <h1 >    System Message</h1>
                <p >Thank you. JMI Brokers Looks ahead to assist you and guarantee a pleasant successful experience. To advance serving you, please provide us with your kind feedback. For additional information or any other inquiry, Please Contact JMI Brokers 24-Hours International Client Service using one of the below methods :


Phone Number: +971 44096705.<br>
Request a call back by clicking <a href="{{ URL::to('/en/callbackrequest') }}">here</a><br>
Live Support by clicking <a onclick="openForm()" href="#"><span id="psdvWnl">Here</span></a><br>
Wishing You All Success<br>
                </p>

        <a id="" class="btn  slide-live-button" target="_blank" href="https://download.mql5.com/cdn/web/jmi.brokers.ltd/mt4/jmibrokers4setup.exe">Download The Platform</a>
            </div>
        </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>


<script>

/**
 * Config Settings
 *
 * @returns {array}
 */
function config() {

    var $config = [];
    $config.loadingBars = '.countdown-bar';

    // Countdown Loading Bar
    $config.loadingBars_width = 200;
    $config.loadingBars_height = 20;
    $config.loadingBars_border_color = '#4da5ea';
    $config.loadingBars_color =  '#4da5ea';
    $config.loadingBars_background_color =  '#fff';

    // Countdown Timer
    $config.timer_color = '#C0392B';
    $config.timer_font_weight = 700;
    $config.timer_font = 'Roboto Condensed';
    $config.timer_font_size = 12;
    $config.endtime_message = 'Redirecting...';

    return $config;
}


/**
 * Set countdown element
 *
 * Element should be build as
 * <div class="countdownbar" id="elementID">
 * <div></div>
 * <div></div>
 * </div>
 *
 * Then call the function countdown('elementID', 0, 0, 0, 10)
 *
 * @param {string} $element
 * @param {number} $daysAdd
 * @param {number} $hoursAdd
 * @param {number} $minutesAdd
 * @param {number} $secondsAdd
 */
function countdown($element, $daysAdd, $hoursAdd, $minutesAdd, $secondsAdd) {

    $config = this.config();

    $($config.loadingBars).css('width', $config.loadingBars_width);
    $($config.loadingBars).css('height', $config.loadingBars_height);
    $($config.loadingBars).css('background-color', $config.loadingBars_background_color);
    $($config.loadingBars).css('border-color', $config.loadingBars_border_color);

    $dateNow = new Date();
    $hour = $dateNow.getHours();
    $minute = $dateNow.getMinutes();
    $second = $dateNow.getSeconds();
    $now_loader = new Date().getTime();

    var interval = setInterval(function() {

        $loadingBars_loader = $('#' + $element).children('div')[0];
        $loadingBars_timer = $('#' + $element).children('div')[1];

        $countDownDate = $dateNow.setDate($dateNow.getDate() + $daysAdd);
        $countDownDate = $dateNow.setHours($hour + $hoursAdd);
        $countDownDate = $dateNow.setMinutes($minute + $minutesAdd);
        $countDownDate = $dateNow.setSeconds($second + $secondsAdd + 1);

        $now = new Date().getTime();
        $distance = $countDownDate - $now;

        $distance_loader = $countDownDate - $now_loader;
        $distance_loadingBar_part =  (($config.loadingBars_width / ($distance_loader - 1000)) * 1000);
        $distance_loadingBar_part = Math.floor($distance_loadingBar_part * 10000) / 10000;

        $secondsPast = parseInt(($distance_loader - $distance) / 1000);

        $newDistance  = $distance_loadingBar_part * $secondsPast;
        if($newDistance > $config.loadingBars_width) $newDistance = $config.loadingBars_width;

        $($loadingBars_loader).animate({ width: $newDistance + 'px' }, 500);

        // TIMER
        $timerHtmlStart = '<span style="color: ' + $config.timer_color + '; font-weight: ' + $config.timer_font_weight + '; font-family: ' + $config.timer_font + '; font-size: ' + $config.timer_font_size + 'px;">';
        $timerHtmlEnd = '</span>';


        // set loading bar background-color as set in config
        $($loadingBars_loader).css('background-color', $config.loadingBars_color);
        $($loadingBars_timer).css('width', $config.loadingBars_width);
        $($loadingBars_timer).css('height', $config.loadingBars_height);

        // SET LOADING-BAR
        if($newDistance == $config.loadingBars_width) {
                $($loadingBars_timer).html($timerHtmlStart + $config.endtime_message + $timerHtmlEnd);
// redirect to google after 5 seconds
window.setTimeout(function() {
    window.location.href = 'https://www.jmibrokers.com/en';
}, 1000);

                clearInterval(interval);
                return;
        } else {

            $timeLeftFinal = setTimer($distance);

            $($loadingBars_timer).html($timerHtmlStart + $timeLeftFinal + $timerHtmlEnd);

        }
    }, 1000);
}




/**
 * Set the timer compared to what date it is and what time is set for it.
 *
 * @param {timstamp} $distance
 */
function setTimer($distance) {
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor($distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor(($distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor(($distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor(($distance % (1000 * 60)) / 1000);

    if(hours < 10) {
        hours = "0" + hours;
    }

    if(minutes < 10) {
        minutes = "0" + minutes;
    }

    if(seconds < 10) {
        seconds = "0" + seconds;
    }

    var timeLeft = hours + ":" + minutes + ":" + seconds;

    if(days !== 0) {

        if(days === 1) {
            var timeLeftFinal = days + " day + " + timeLeft;
        } else {
            var timeLeftFinal = days + " days + " + timeLeft;
        }

    } else {
        var timeLeftFinal = timeLeft;
    }

    return timeLeftFinal;
}


            $(document).ready(function () {
                countdown('countdownA', 0, 0, 0, 20);


            });

</script>

<script>
      !function (e, s, t, a, n, p, i, o, c) {
        e[n] || ((i = e[n] = function () {
          i.process ? i.process.apply(i, arguments) : i.queue.push(arguments)
        }).queue = [], i.t = 1 * new Date, (o = s.createElement(t)).async = 1,
        o.src = "https://cdn.speakol.com/pixel/js/sppixel.min.js?t=" + 864e5 * Math.ceil(new Date / 864e5),
        (c = s.getElementsByTagName(t)[0]).parentNode.insertBefore(o, c))
      }(window, document, "script", 0, "spix"),
      spix("init", "ID-7478"),
      spix("event", "pageload");
</script>
<img src="https://www.pixelhere.com/et/event.php?advertiser=171324&cid=Conversion&id=9c977c&variable=ADCASH&value=1" border="0" width="1" height="1" />

@endsection
