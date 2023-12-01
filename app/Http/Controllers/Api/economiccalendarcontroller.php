<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

use Session;
use Goutte\Client;
use DatePeriod;
use DateTime;
use DateInterval;

class economiccalendarcontroller extends Controller
{




    public function heatmap(request $request)
    {



        $client1 = new Client();
        $client2 = new Client();

        $crawler1 = $client1->request('GET', 'https://www.investing.com/tools/currency-heatmap');
        $heatmap_en=$crawler1->filter('div.wrapper > section#leftColumn')->each(function ($node) {
            return $node->html();
        });

        $crawler2 = $client2->request('GET', 'https://sa.investing.com/tools/currency-heatmap');
        $heatmap_ar=$crawler2->filter('div.wrapper > section#leftColumn')->each(function ($node) {
            return $node->html();
        });

        if(empty($heatmap_ar))
        {
            $heatmap_ar = ['No data to show it now '];
        }
        if(empty($heatmap_en))
        {
            $heatmap_en = ['No data to show it now '];
        }

        return response()->json([
            'title' =>
                [
                    'en'=>'JMI Brokers | FX heat map',
                    'ar'=>'JMI Brokers | خارطة الحرارة للعملات',
                    'ru'=>'Тепловая карта валют',
                ],
            'description' =>
                [
                    'en'=>'JMI Brokers FX (forex) heat map a quick visual for FX markets across various time frames-a tool presenting strengths of major currencies relative to others.',
                    'ar'=>"هو تقيم لمجموعة من الجداول التي تظهر ما هو اقوى او اضغف الأزواج فى العملات الرئيسية مع مقارنة بين بعضها البعض.",
                    'ru'=>'Это группа таблиц, которые показывают, какие пары являются самыми сильными или самыми слабыми в основных валютах, со сравнением между собой.',
                ],
            'keywords' =>
                [
                    'en'=>'FX heat map, Forex Heat map',
                    'ar'=>'خارطة اقوي العملات فى سوق الفوركس',
                    'ru'=>'Тепловая карта для форекс, Тепловая карта для торговли на форекс',
                ],
            'heatmap_en'=>$heatmap_en,
            'heatmap_ar'=>$heatmap_ar,
        ], 200);

    }



    public function forex_calculator(request $request)
    {

        if( $request->segment(1) =='ar'){
            $title = "حاسبة الفوركس";
            return view('ar.forex-calculator',compact('title'));
        }elseif( $request->segment(1) =='ru'){
            $title = "Калькулятор форекс";
            return view('ru.forex-calculator',compact('title'));
        }else{
            $title = "Forex Calculator";
            return view('forex-calculator',compact('title'));
        }


    }


    public function pip_calculator(request $request)
    {




        $client1 = new Client();
        $client2 = new Client();

        $crawler1 = $client1->request('GET', 'https://investing.com/tools/forex-pip-calculator');
        $calculator_en=$crawler1->filter('div.wrapper > section#leftColumn > div.calcToolContainer > form#calc_form > div.calcToolBottom > table.pipCalcResults')->each(function ($node) {
            return $node->html();
        });

        $crawler2 = $client2->request('GET', 'https://sa.investing.com/tools/forex-pip-calculator');
        $calculator_ar=$crawler2->filter('div.wrapper > section#leftColumn > div.calcToolContainer > form#calc_form > div.calcToolBottom > table.pipCalcResults')->each(function ($node) {
            return $node->html();
        });

        if(empty($calculator_ar))
        {
            $calculator_ar = ['No data to show it now '];
        }
        if(empty($calculator_en))
        {
            $calculator_en = ['No data to show it now '];
        }

        return response()->json([
            'title' =>
                [
                    'en'=>'JMI Brokers | Pip Calculator',
                    'ar'=>'JMI brokers | حاسبة النقاط',
                    'ru'=>'Тепловая карта валют',
                ],
            'description' =>
                [
                    'en'=>'Accurately monitor your risk per trade by determining the value per pip on JMI Brokers pip calculator.',
                    'ar'=>'راقب مخاطر كل صفقة بدقة عن طريق تحديد القيمة لكل نقطة على حاسبة نقاط جي ام أي ,تتيح لك هذه الحاسبة حساب قيمة النقطة في حال الربح أو الخسارة',
                    'ru'=>'Это группа таблиц, которые показывают, какие пары являются самыми сильными или самыми слабыми в основных валютах, со сравнением между собой.',
                ],
            'keywords' =>
                [
                    'en'=>'Pip Calculator, Pips, pip, lot',
                    'ar'=>'حجم عقد اللوت,ما هي النقاط وكيف تعمل, حساب قيمة النقطة',
                    'ru'=>'Тепловая карта для форекс, Тепловая карта для торговли на форекс',
                ],
            'calculator_en'=>$calculator_en,
            'calculator_ar'=>$calculator_ar,
        ], 200);



    }




    public function pip_calculator2(request $request)
    {


        $direction='ltr';
        $client = new Client();

        $crawler = $client->request('GET', 'https://www.investing.com/tools/forex-pip-calculator');

        $data0=$crawler->filter('div.wrapper > section#leftColumn > div.calcToolContainer > form#calc_form > div.calcToolBottom > table.pipCalcResults')->each(function ($node) {
            return $node->html();
            // print str_replace('href="/','href="/',$node->html());

        });
        if(!empty($data0[0]))
        {
            $calculator=$data0[0];
        }else {
            $data0 = ['No data to show it now '];
            $calculator=$data0[0];
        }


        if( $request->segment(1) =='ar'){
            $direction='rtl';
            $client = new Client();

            $crawler = $client->request('GET', 'https://sa.investing.com/tools/forex-pip-calculator');

            $data0=$crawler->filter('div.wrapper > section#leftColumn > div.calcToolContainer > form#calc_form > div.calcToolBottom > table.pipCalcResults')->each(function ($node) {
                return $node->html();
                // print str_replace('href="/','href="/',$node->html());

            });
            $calculator=$data0[0];

        }



        if( $request->segment(1) =='ar'){
            return view('iframe.pip-calculator',compact('calculator','direction'));

        }elseif( $request->segment(1) =='ru'){
            return view('iframe.pip-calculator',compact('calculator','direction'));

        }else{
            return view('iframe.pip-calculator',compact('calculator','direction'));
        }



    }
	

    public function index0(request $request)
    {




        $client = new Client();

        $crawler = $client->request('GET', 'https://econcal.forexprostools.com');

        $economic_calendar0= $crawler->filter('div.mainContainer')->each(function ($node) {
            return $node->html();
        });

        $economic_calendar=$economic_calendar0[0];
        $economic_calendar=str_replace('ajax', 'https://econcal.forexprostools.com/ajax', $economic_calendar0[0]);
        $title = "Forex Economic Calendar";
        return view('economic-calendar0',compact('title','economic_calendar'));

        if( $request->segment(1) =='ar'){
            $title ="JMI brokers | الأجندة الأقتصادية";
            $description="تابع أهم وأحدث الأخبار والإصدارات التي تؤثر على الفوركس والأسهم والسلع بشكل يومي من خلال الأجندة الأقتصادية مع شركة جي ام أي";
            $keywords="	ساعات التداول في سوق العملات, ‎,XAU/USD سعر الصرف ‎أخبار الفوركس";
            return view('ar.economic-calendar',compact('title','description','keywords','economic_calendar'));
        }if( $request->segment(1) =='ru'){
        $title = "Forex Economic Calendar";
        return view('ru.economic-calendar',compact('title','economic_calendar'));
    }else{
        $title = "JMI brokers | Forex Calendar";
        $description="Track daily updated forex calendar news marking all events and releases affecting forex, stocks and commodities with JMI Brokers.";
        $keywords="news, Forex Calendar, Forex Numbers, economic calendar";
        return view('economic-calendar0',compact('title','economic_calendar','description','keywords'));
    }

        //}

//}






    }






















    public function index00(request $request)
    {



        return 9999999;
        if( $request->segment(1) =='ar'){
            $title = "Forex Economic Calendar";
            return view('economic-calendar',compact('title','economic_calendar'));
        }else{
            $title = "Forex Economic Calendar";

            $servertime=time();
            $serverdate=date("M d.Y",$servertime);
            $day=date("d",$servertime);
            $month=date("M",$servertime);
            $year=date("Y",$servertime);
            $wheresearch=$month.' '.$day.' ';

            if(isset($_GET['day'])){
                $action=$_GET['day'];
                $action=explode('.', $action);
                $day=$action[0];
                $month=$action[1];
                $year=$action[2];
                $wheresearch=$month.' '.$day.' ';
                //->where('date','like','%'.$wheresearch.'%')
                $economic_calendar=Economic_Calendar::where('year',$year)->where('date','like','%'.$wheresearch.'%')->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get()->all();

            }elseif(isset($_GET['month'])){
                $action=$_GET['month'];
                $action=explode('.', $action);
                $action=str_replace("Jan","1",$action);
                $action=str_replace("Feb","2",$action);
                $action=str_replace("Mar","3",$action);
                $action=str_replace("Apr","4",$action);
                $action=str_replace("May","5",$action);
                $action=str_replace("Jun","6",$action);
                $action=str_replace("Jul","7",$action);
                $action=str_replace("Aug","8",$action);
                $action=str_replace("Sep","9",$action);
                $action=str_replace("Oct","10",$action);
                $action=str_replace("Nov","11",$action);
                $action=str_replace("Dec","12",$action);
                $day=$action[0];
                $month=$action[1];
                $year=$action[2];
                $wheresearch=$month.' '.$day.' ';
                //->where('date','like','%'.$wheresearch.'%')
                $economic_calendar=Economic_Calendar::where('year',$year)->where('date_month',$month)->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get()->all();

            }elseif(isset($_GET['week'])){

                $action=$_GET['week'];
                $action=explode('.', $action);
                $action=str_replace("Jan","1",$action);
                $action=str_replace("Feb","2",$action);
                $action=str_replace("Mar","3",$action);
                $action=str_replace("Apr","4",$action);
                $action=str_replace("May","5",$action);
                $action=str_replace("Jun","6",$action);
                $action=str_replace("Jul","7",$action);
                $action=str_replace("Aug","8",$action);
                $action=str_replace("Sep","9",$action);
                $action=str_replace("Oct","10",$action);
                $action=str_replace("Nov","11",$action);
                $action=str_replace("Dec","12",$action);

                $day=$action[0];
                $month=$action[1];
                $year=$action[2];
                $wheresearch=$month.' '.$day.' ';

                $arr_day=array();
                $arr_month=array();
                $arr_year=array();
                // set current date
                $date_ = $month.'/'.$day.'/'.$year;
                // parse about any English textual datetime description into a Unix timestamp
                $ts_ = strtotime($date_);
                // find the year (ISO-8601 year number) and the current week
                $year_ = date('o', $ts_);
                $week_ = date('W', $ts_);
                // print week for the current date
                for($i_ = 1; $i_ <= 7; $i_++) {
                    // timestamp from ISO week date format
                    $ts_ = strtotime($year_.'W'.$week_.$i_);
                    // print date("m/d/Y l", $ts_) . "\n";
                    $day_for_push=date("d", $ts_);
                    $month_for_push=date("m", $ts_);
                    $year_for_push=date("Y", $ts_);
                    array_push($arr_day,$day_for_push );
                    array_push($arr_month,$month_for_push );
                    array_push($arr_year,$year_for_push );
                }


                $economic_calendar0=Economic_Calendar::where('year',$arr_year[0])->where('date_month',$arr_month[0])->where('date_day',$arr_day[0])->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get();
                $economic_calendar1=Economic_Calendar::where('year',$arr_year[1])->where('date_month',$arr_month[1])->where('date_day',$arr_day[1])->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get();
                $economic_calendar2=Economic_Calendar::where('year',$arr_year[2])->where('date_month',$arr_month[2])->where('date_day',$arr_day[2])->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get();
                $economic_calendar3=Economic_Calendar::where('year',$arr_year[3])->where('date_month',$arr_month[3])->where('date_day',$arr_day[3])->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get();
                $economic_calendar4=Economic_Calendar::where('year',$arr_year[4])->where('date_month',$arr_month[4])->where('date_day',$arr_day[4])->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get();
                $economic_calendar5=Economic_Calendar::where('year',$arr_year[5])->where('date_month',$arr_month[5])->where('date_day',$arr_day[5])->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get();
                $economic_calendar6=Economic_Calendar::where('year',$arr_year[6])->where('date_month',$arr_month[6])->where('date_day',$arr_day[6])->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get();

                $economic_calendar=$economic_calendar0->merge($economic_calendar1->merge($economic_calendar2->merge($economic_calendar3->merge($economic_calendar4->merge($economic_calendar5->merge($economic_calendar6))))));

            }else{


                $day=date("d");
                $month=date("m");
                $year=date("Y");
                $wheresearch=$month.' '.$day.' ';

                $arr_day=array();
                $arr_month=array();
                $arr_year=array();
                // set current date
                $date_ = $month.'/'.$day.'/'.$year;
                // parse about any English textual datetime description into a Unix timestamp
                $ts_ = strtotime($date_);
                // find the year (ISO-8601 year number) and the current week
                $year_ = date('o', $ts_);
                $week_ = date('W', $ts_);
                // print week for the current date
                for($i_ = 1; $i_ <= 7; $i_++) {
                    // timestamp from ISO week date format
                    $ts_ = strtotime($year_.'W'.$week_.$i_);
                    // print date("m/d/Y l", $ts_) . "\n";
                    $day_for_push=date("d", $ts_);
                    $month_for_push=date("m", $ts_);
                    $year_for_push=date("Y", $ts_);
                    array_push($arr_day,$day_for_push );
                    array_push($arr_month,$month_for_push );
                    array_push($arr_year,$year_for_push );
                }


                $economic_calendar0=Economic_Calendar::where('year',$arr_year[0])->where('date_month',$arr_month[0])->where('date_day',$arr_day[0])->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get();
                $economic_calendar1=Economic_Calendar::where('year',$arr_year[1])->where('date_month',$arr_month[1])->where('date_day',$arr_day[1])->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get();
                $economic_calendar2=Economic_Calendar::where('year',$arr_year[2])->where('date_month',$arr_month[2])->where('date_day',$arr_day[2])->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get();
                $economic_calendar3=Economic_Calendar::where('year',$arr_year[3])->where('date_month',$arr_month[3])->where('date_day',$arr_day[3])->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get();
                $economic_calendar4=Economic_Calendar::where('year',$arr_year[4])->where('date_month',$arr_month[4])->where('date_day',$arr_day[4])->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get();
                $economic_calendar5=Economic_Calendar::where('year',$arr_year[5])->where('date_month',$arr_month[5])->where('date_day',$arr_day[5])->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get();
                $economic_calendar6=Economic_Calendar::where('year',$arr_year[6])->where('date_month',$arr_month[6])->where('date_day',$arr_day[6])->orderBy('date_month', 'ASC')->orderBy('date_day', 'ASC')->orderBy('id', 'ASC')->get();

                $economic_calendar=$economic_calendar0->merge($economic_calendar1->merge($economic_calendar2->merge($economic_calendar3->merge($economic_calendar4->merge($economic_calendar5->merge($economic_calendar6))))));


                $economic_calendar=Economic_Calendar::get()->all();

            }

            return view('economic-calendar',compact('title','economic_calendar'));

        }

    }


    public function calendar_update__(request $request)
    {

        ini_set('max_execution_time', 20000);


        $economic_calendars=Economic_Calendar::get()->all();


        $store_date='';

        foreach($economic_calendars as $economic_calendar_row){

            $current_row=$economic_calendar_row->date;
            $int = filter_var($current_row, FILTER_SANITIZE_NUMBER_INT);

            $economic_calendar_new=Economic_Calendar::where('id',$economic_calendar_row->id)->get()->first();
            echo $store_date.' '.$economic_calendar_new->year.'<br />';
            if($economic_calendar_new->date == '  '){
                $economic_calendar_new->date=$store_date;
            }else{
                $store_date=$current_row;
            }

            $economic_calendar_new->date_day=$int;
            if (strpos($current_row, 'Jan') !== false) {
                $economic_calendar_new->date_month='1';
            }
            if (strpos($current_row, 'Feb') !== false) {
                $economic_calendar_new->date_month='2';
            }
            if (strpos($current_row, 'Mar') !== false) {
                $economic_calendar_new->date_month='3';
            }
            if (strpos($current_row, 'Apr') !== false) {
                $economic_calendar_new->date_month='4';
            }
            if (strpos($current_row, 'May') !== false) {
                $economic_calendar_new->date_month='5';
            }
            if (strpos($current_row, 'Jun') !== false) {
                $economic_calendar_new->date_month='6';
            }
            if (strpos($current_row, 'Jul') !== false) {
                $economic_calendar_new->date_month='7';
            }
            if (strpos($current_row, 'Aug') !== false) {
                $economic_calendar_new->date_month='8';
            }
            if (strpos($current_row, 'Sep') !== false) {
                $economic_calendar_new->date_month='9';
            }
            if (strpos($current_row, 'Oct') !== false) {
                $economic_calendar_new->date_month='10';
            }
            if (strpos($current_row, 'Nov') !== false) {
                $economic_calendar_new->date_month='11';
            }
            if (strpos($current_row, 'Dec') !== false) {
                $economic_calendar_new->date_month='12';
            }
            $economic_calendar_new->save();

        }


        return "success";




    }





    public function calendar_update(request $request)
    {





        include(app_path() . '\htmldomgrab.php');
//$html = file_get_html('https://www.forexfactory.com/calendar.php?day=nov5.2017');
//$html = file_get_html('https://www.forexfactory.com/calendar.php?month=sep.2017');
//$html = file_get_html('https://www.fxempire.com/tools/economic-calendar?date-range=current-day&timezone=Africa%2FCairo');
//print_r($html);

//weeks in month 1 / 7 / 13 / 19 / 25




//$client = new Client();
//$crawler = $client->request('GET', 'https://www.forexfactory.com/calendar?week=this#detail=115781');




//$crawler->filter('div.shell')->each(function ($node) {
//echo 9;

        //print $node->text()."\n";
//$link = $crawler->selectLink('Open Detail')->link();
//$crawlerrr = $client->click($link);

//echo $node->selectLink('td.calendarspecs__spec > a')->text();

//});
//return 1;


        $client = new Client();

        $crawler = $client->request('GET', 'https://www.fxempire.com/tools/economic-calendar');

//$economic_calendar0= $crawler->filter('body > div.site > div#ui-inner > div#content > section.calendar > div.calendar__print > div.full > div.full > div.full > div.pagearrange__layout-cell > div.flexShell > div.calendar > table.calendar__table > tbody > tr')->each(function ($node) {
        $economic_calendar0= $crawler->filter('*')->each(function ($node) {
            return $node->html();
        });


        print_r($economic_calendar0);


        return 1111;

        $store_date='';
        $html0 = file_get_html('https://www.forexfactory.com/calendar?week=this');
//$html0 = file_get_html('https://www.forexfactory.com/calendar?day=aug12.2020#upnext');
//foreach($html0->find('div.shell') as $tr) {echo $tr;
        // echo $tr->find('td.calendarspecs__spec',0)->plaintext.'<br />';
//cho 0;
//}


//get every row event in the link that contain class calendar__row--grey
        foreach($html0->find('tr[data-touchable]') as $tr) {
//foreach($html->find('tr[data-touchable]') as $tr) {
//get the event id to check if exist on database
            $eventidfromsite=$tr->getAttribute('data-eventid');
            $datefromsite=substr_replace($tr->find('td.calendar__date',0)->plaintext, ' ', 4, 0);

            if($datefromsite == '  '){
            }else{
                $store_date=$datefromsite;
            }


            $Economic_Calendar=Economic_Calendar::where('event_id',$eventidfromsite)->where('date',$store_date)->get();
//check if this event exsist to add new it or update it
            if(count($Economic_Calendar)>0){
                //update the event in the database
                $Economic_Calendar=Economic_Calendar::where('event_id',$eventidfromsite)->where('date',$store_date)->get()->first();
                $Economic_Calendar->year=date("Y");


                $newdate=substr_replace($tr->find('td.calendar__date',0)->plaintext, ' ', 4, 0);;
                $Economic_Calendar->date=$newdate;



//echo same date in empty date fields with the last wrote date
                if($newdate == '  '){
                    $Economic_Calendar->date=$store_date;
                }else{
                    $store_date=$newdate;
                    $Economic_Calendar->date=$newdate;
                }
//extract date day to date_day field in db
                $int = filter_var($store_date, FILTER_SANITIZE_NUMBER_INT);
                $Economic_Calendar->date_day=$int;

//extract date month to date_month field in db
                if (strpos($store_date, 'Jan') !== false) {
                    $Economic_Calendar->date_month='Jan';
                }
                if (strpos($store_date, 'Feb') !== false) {
                    $Economic_Calendar->date_month='Feb';
                }
                if (strpos($store_date, 'Mar') !== false) {
                    $Economic_Calendar->date_month='Mar';
                }
                if (strpos($store_date, 'Apr') !== false) {
                    $Economic_Calendar->date_month='Apr';
                }
                if (strpos($store_date, 'May') !== false) {
                    $Economic_Calendar->date_month='May';
                }
                if (strpos($store_date, 'Jun') !== false) {
                    $Economic_Calendar->date_month='Jun';
                }
                if (strpos($store_date, 'Jul') !== false) {
                    $Economic_Calendar->date_month='Jul';
                }
                if (strpos($store_date, 'Aug') !== false) {
                    $Economic_Calendar->date_month='Aug';
                }
                if (strpos($store_date, 'Sep') !== false) {
                    $Economic_Calendar->date_month='Sep';
                }
                if (strpos($store_date, 'Oct') !== false) {
                    $Economic_Calendar->date_month='Oct';
                }
                if (strpos($store_date, 'Nov') !== false) {
                    $economic_calendar_new->date_month='Nov';
                }
                if (strpos($store_date, 'Dec') !== false) {
                    $Economic_Calendar->date_month='Dec';
                }


                $Economic_Calendar->time=$tr->find('td.calendar__time',0)->plaintext;
                $Economic_Calendar->currency=$tr->find('td.calendar__currency',0)->plaintext;

                // for empty rows - days with no events
                if(isset($tr->find('td.calendar__impact div.calendar__impact-icon span',0)->class)){
                    $Economic_Calendar->impact=$tr->find('td.calendar__impact div.calendar__impact-icon span',0)->class;
                    $Economic_Calendar->event_id=$tr->getAttribute('data-eventid');
                }else{
                    //default value for empty event id
                    $Economic_Calendar->event_id=0;
                }



                $Economic_Calendar->event=$tr->find('td.calendar__event',0)->plaintext;
                $Economic_Calendar->actual=$tr->find('td.calendar__actual',0)->plaintext;

                if(isset($tr->find('td.calendar__actual span',0)->class)){
                    if(strpos($tr->find('td.calendar__actual span',0)->class, 'better') !== false){$Economic_Calendar->actual_class=1; }elseif(strpos($tr->find('td.calendar__actual span',0)->class, 'worse') !== false){$Economic_Calendar->actual_class=2;}
                };          $Economic_Calendar->forcast=$tr->find('td.calendar__forecast',0)->plaintext;
                $Economic_Calendar->previous=$tr->find('td.calendar__previous',0)->plaintext;

                if(isset($tr->find('td.calendar__previous span',0)->class)){
                    if(strpos($tr->find('td.calendar__previous span',0)->class, 'better') !== false){$Economic_Calendar->previous_class=1; }elseif(strpos($tr->find('td.calendar__previous span',0)->class, 'worse') !== false){$Economic_Calendar->previous_class=2;}
                };


                $Economic_Calendar->save();
                echo'Updated'.'<br />';

            }else{
                //add the event to the database
                $Economic_Calendar=new Economic_Calendar;
                $Economic_Calendar->year=date("Y");

                // if(isset($tr->getAttribute('data-eventid'))){
                //  $Economic_Calendar->event_id=$tr->getAttribute('data-eventid');
                //  }else{
                //
                //  }

                $newdate=substr_replace($tr->find('td.calendar__date',0)->plaintext, ' ', 4, 0);;
                $Economic_Calendar->date=$newdate;



//echo same date in empty date fields with the last wrote date
                if($newdate == '  '){
                    $Economic_Calendar->date=$store_date;
                }else{
                    $store_date=$newdate;
                    $Economic_Calendar->date=$newdate;
                }
//extract date day to date_day field in db
                $int = filter_var($store_date, FILTER_SANITIZE_NUMBER_INT);
                $Economic_Calendar->date_day=$int;

//extract date month to date_month field in db
                if (strpos($store_date, 'Jan') !== false) {
                    $Economic_Calendar->date_month='Jan';
                }
                if (strpos($store_date, 'Feb') !== false) {
                    $Economic_Calendar->date_month='Feb';
                }
                if (strpos($store_date, 'Mar') !== false) {
                    $Economic_Calendar->date_month='Mar';
                }
                if (strpos($store_date, 'Apr') !== false) {
                    $Economic_Calendar->date_month='Apr';
                }
                if (strpos($store_date, 'May') !== false) {
                    $Economic_Calendar->date_month='May';
                }
                if (strpos($store_date, 'Jun') !== false) {
                    $Economic_Calendar->date_month='Jun';
                }
                if (strpos($store_date, 'Jul') !== false) {
                    $Economic_Calendar->date_month='Jul';
                }
                if (strpos($store_date, 'Aug') !== false) {
                    $Economic_Calendar->date_month='Aug';
                }
                if (strpos($store_date, 'Sep') !== false) {
                    $Economic_Calendar->date_month='Sep';
                }
                if (strpos($store_date, 'Oct') !== false) {
                    $Economic_Calendar->date_month='Oct';
                }
                if (strpos($store_date, 'Nov') !== false) {
                    $Economic_Calendar->date_month='Nov';
                }
                if (strpos($store_date, 'Dec') !== false) {
                    $Economic_Calendar->date_month='Dec';
                }





                $Economic_Calendar->time=$tr->find('td.calendar__time',0)->plaintext;
                $Economic_Calendar->currency=$tr->find('td.calendar__currency',0)->plaintext;
                // for empty rows - days with no events
                if(isset($tr->find('td.calendar__impact div.calendar__impact-icon span',0)->class)){
                    $Economic_Calendar->impact=$tr->find('td.calendar__impact div.calendar__impact-icon span',0)->class;
                    $Economic_Calendar->event_id=$tr->getAttribute('data-eventid');
                }else{
                    //
                    $Economic_Calendar->event_id=000000;
                }

                $Economic_Calendar->event=$tr->find('td.calendar__event',0)->plaintext;
                $Economic_Calendar->actual=$tr->find('td.calendar__actual',0)->plaintext;
                $Economic_Calendar->forcast=$tr->find('td.calendar__forecast',0)->plaintext;
                $Economic_Calendar->previous=$tr->find('td.calendar__previous',0)->plaintext;
                $Economic_Calendar->save();
                echo'Created'.'<br />';
            }

        }













//return "Finished_______1";



        $store_date='';
        $html0 = file_get_html('https://www.forexfactory.com/calendar?week=next');
//$html0 = file_get_html('https://www.forexfactory.com/calendar?day=aug12.2020#upnext');
//foreach($html0->find('div.shell') as $tr) {echo $tr;
        // echo $tr->find('td.calendarspecs__spec',0)->plaintext.'<br />';
//cho 0;
//}


//get every row event in the link that contain class calendar__row--grey
        foreach($html0->find('tr[data-touchable]') as $tr) {
//foreach($html->find('tr[data-touchable]') as $tr) {
//get the event id to check if exist on database
            $eventidfromsite=$tr->getAttribute('data-eventid');
            $datefromsite=substr_replace($tr->find('td.calendar__date',0)->plaintext, ' ', 4, 0);

            if($datefromsite == '  '){
            }else{
                $store_date=$datefromsite;
            }


            $Economic_Calendar=Economic_Calendar::where('event_id',$eventidfromsite)->where('date',$store_date)->get();
//check if this event exsist to add new it or update it
            if(count($Economic_Calendar)>0){
                //update the event in the database
                $Economic_Calendar=Economic_Calendar::where('event_id',$eventidfromsite)->where('date',$store_date)->get()->first();
                $Economic_Calendar->year=date("Y");


                $newdate=substr_replace($tr->find('td.calendar__date',0)->plaintext, ' ', 4, 0);;
                $Economic_Calendar->date=$newdate;



//echo same date in empty date fields with the last wrote date
                if($newdate == '  '){
                    $Economic_Calendar->date=$store_date;
                }else{
                    $store_date=$newdate;
                    $Economic_Calendar->date=$newdate;
                }
//extract date day to date_day field in db
                $int = filter_var($store_date, FILTER_SANITIZE_NUMBER_INT);
                $Economic_Calendar->date_day=$int;

//extract date month to date_month field in db
                if (strpos($store_date, 'Jan') !== false) {
                    $Economic_Calendar->date_month='Jan';
                }
                if (strpos($store_date, 'Feb') !== false) {
                    $Economic_Calendar->date_month='Feb';
                }
                if (strpos($store_date, 'Mar') !== false) {
                    $Economic_Calendar->date_month='Mar';
                }
                if (strpos($store_date, 'Apr') !== false) {
                    $Economic_Calendar->date_month='Apr';
                }
                if (strpos($store_date, 'May') !== false) {
                    $Economic_Calendar->date_month='May';
                }
                if (strpos($store_date, 'Jun') !== false) {
                    $Economic_Calendar->date_month='Jun';
                }
                if (strpos($store_date, 'Jul') !== false) {
                    $Economic_Calendar->date_month='Jul';
                }
                if (strpos($store_date, 'Aug') !== false) {
                    $Economic_Calendar->date_month='Aug';
                }
                if (strpos($store_date, 'Sep') !== false) {
                    $Economic_Calendar->date_month='Sep';
                }
                if (strpos($store_date, 'Oct') !== false) {
                    $Economic_Calendar->date_month='Oct';
                }
                if (strpos($store_date, 'Nov') !== false) {
                    $economic_calendar_new->date_month='Nov';
                }
                if (strpos($store_date, 'Dec') !== false) {
                    $Economic_Calendar->date_month='Dec';
                }


                $Economic_Calendar->time=$tr->find('td.calendar__time',0)->plaintext;
                $Economic_Calendar->currency=$tr->find('td.calendar__currency',0)->plaintext;

                // for empty rows - days with no events
                if(isset($tr->find('td.calendar__impact div.calendar__impact-icon span',0)->class)){
                    $Economic_Calendar->impact=$tr->find('td.calendar__impact div.calendar__impact-icon span',0)->class;
                    $Economic_Calendar->event_id=$tr->getAttribute('data-eventid');
                }else{
                    //default value for empty event id
                    $Economic_Calendar->event_id=0;
                }



                $Economic_Calendar->event=$tr->find('td.calendar__event',0)->plaintext;
                $Economic_Calendar->actual=$tr->find('td.calendar__actual',0)->plaintext;

                if(isset($tr->find('td.calendar__actual span',0)->class)){
                    if(strpos($tr->find('td.calendar__actual span',0)->class, 'better') !== false){$Economic_Calendar->actual_class=1; }elseif(strpos($tr->find('td.calendar__actual span',0)->class, 'worse') !== false){$Economic_Calendar->actual_class=2;}
                };          $Economic_Calendar->forcast=$tr->find('td.calendar__forecast',0)->plaintext;
                $Economic_Calendar->previous=$tr->find('td.calendar__previous',0)->plaintext;

                if(isset($tr->find('td.calendar__previous span',0)->class)){
                    if(strpos($tr->find('td.calendar__previous span',0)->class, 'better') !== false){$Economic_Calendar->previous_class=1; }elseif(strpos($tr->find('td.calendar__previous span',0)->class, 'worse') !== false){$Economic_Calendar->previous_class=2;}
                };


                $Economic_Calendar->save();
                echo'Updated'.'<br />';

            }else{
                //add the event to the database
                $Economic_Calendar=new Economic_Calendar;
                $Economic_Calendar->year=date("Y");

                // if(isset($tr->getAttribute('data-eventid'))){
                //  $Economic_Calendar->event_id=$tr->getAttribute('data-eventid');
                //  }else{
                //
                //  }

                $newdate=substr_replace($tr->find('td.calendar__date',0)->plaintext, ' ', 4, 0);;
                $Economic_Calendar->date=$newdate;



//echo same date in empty date fields with the last wrote date
                if($newdate == '  '){
                    $Economic_Calendar->date=$store_date;
                }else{
                    $store_date=$newdate;
                    $Economic_Calendar->date=$newdate;
                }
//extract date day to date_day field in db
                $int = filter_var($store_date, FILTER_SANITIZE_NUMBER_INT);
                $Economic_Calendar->date_day=$int;

//extract date month to date_month field in db
                if (strpos($store_date, 'Jan') !== false) {
                    $Economic_Calendar->date_month='Jan';
                }
                if (strpos($store_date, 'Feb') !== false) {
                    $Economic_Calendar->date_month='Feb';
                }
                if (strpos($store_date, 'Mar') !== false) {
                    $Economic_Calendar->date_month='Mar';
                }
                if (strpos($store_date, 'Apr') !== false) {
                    $Economic_Calendar->date_month='Apr';
                }
                if (strpos($store_date, 'May') !== false) {
                    $Economic_Calendar->date_month='May';
                }
                if (strpos($store_date, 'Jun') !== false) {
                    $Economic_Calendar->date_month='Jun';
                }
                if (strpos($store_date, 'Jul') !== false) {
                    $Economic_Calendar->date_month='Jul';
                }
                if (strpos($store_date, 'Aug') !== false) {
                    $Economic_Calendar->date_month='Aug';
                }
                if (strpos($store_date, 'Sep') !== false) {
                    $Economic_Calendar->date_month='Sep';
                }
                if (strpos($store_date, 'Oct') !== false) {
                    $Economic_Calendar->date_month='Oct';
                }
                if (strpos($store_date, 'Nov') !== false) {
                    $Economic_Calendar->date_month='Nov';
                }
                if (strpos($store_date, 'Dec') !== false) {
                    $Economic_Calendar->date_month='Dec';
                }





                $Economic_Calendar->time=$tr->find('td.calendar__time',0)->plaintext;
                $Economic_Calendar->currency=$tr->find('td.calendar__currency',0)->plaintext;
                // for empty rows - days with no events
                if(isset($tr->find('td.calendar__impact div.calendar__impact-icon span',0)->class)){
                    $Economic_Calendar->impact=$tr->find('td.calendar__impact div.calendar__impact-icon span',0)->class;
                    $Economic_Calendar->event_id=$tr->getAttribute('data-eventid');
                }else{
                    //
                    $Economic_Calendar->event_id=000000;
                }

                $Economic_Calendar->event=$tr->find('td.calendar__event',0)->plaintext;
                $Economic_Calendar->actual=$tr->find('td.calendar__actual',0)->plaintext;
                $Economic_Calendar->forcast=$tr->find('td.calendar__forecast',0)->plaintext;
                $Economic_Calendar->previous=$tr->find('td.calendar__previous',0)->plaintext;
                $Economic_Calendar->save();
                echo'Created'.'<br />';
            }

        }














    }






}
