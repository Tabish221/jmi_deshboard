<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\fundamentalanalysis;

use App\Models\search;

use App\Models\reuters_news;
use Goutte\Client;
use Laravel\Socialite\Facades\Socialite;
use Redirect;
use PDF;
use Session;

class indexcontroller extends Controller
{



   public function index(request $request)
   {
        $fundamentalanalysis = fundamentalanalysis::where(['fundamentalstatus'=>'1'])->orderBy('id', 'desc')->get()->take(4);

       return response()->json([
           'data' =>  [
               'en'=>[
                   'title' => 'Welcome to JMI Brokers | Online Forex Trading',
                   'description' => 'JMI Brokers leading secure trading since 2009 with the most competitive offers for forex, indices, stocks  and metals with clients in 100 countries',
                   'keywords' => 'Forex, Gold, Silver, US Shares, UK Shares, Metatrader, Oil ',
                   'fundamentalanalysis'=>$fundamentalanalysis
               ],
               'ar'=>[
                   'title' => 'جى ام اى بروكرز | شركة تداول الفوركس',
                   'description' => 'جي أم أي رائدة في التداول الآمن عبر الانترنت منذ عام 2009 مع أكثر العروض تنافسية للفوركس والمؤشرات والأسهم والمعادن مع عملاء في 100 دولة',
                   'keywords' => 'التداول,تداول, الاسهم, تداول الاسهم, فوركس, الفوركس, البورصه العالميه, التداول عبر الانترنت, تداول عبر الانترنت',
                   'fundamentalanalysis'=>$fundamentalanalysis
               ],
               'ru'=>[
                   'title' => 'Добро пожаловать в JMI Brokers | Интернет Форекс',
                   'description' => 'Forex, Gold, Silver, US Shares, UK Shares, Metatrader, Oil ',
                   'keywords' => 'Forex, Gold, Silver, US Shares, UK Shares, Metatrader, Oil ',
                   'fundamentalanalysis'=>$fundamentalanalysis
               ],
           ]
       ], 200);

   }




   public function searchar(request $request)
   {
        set_time_limit(60);

        $searchdata = search::select(array('url', 'ar_title'))->get();
              return json_encode($searchdata,JSON_UNESCAPED_UNICODE);

   }

  public function searchen(request $request)
   {
        set_time_limit(60);

        $searchdata = search::select(array('url', 'en_title'))->get();
              return json_encode($searchdata,JSON_UNESCAPED_UNICODE);

   }




   public function lang(Request $request)
   {

    $lang=$request->lang;
    $request->session()->put('lang', $lang);

   }




   public function show_reuters_news(request $request)
    {

        $reuters_news_ar=reuters_news::where('lang','ar')->orderBy('id','desc')->take(10)->get();
        $reuters_news_en=reuters_news::where('lang','en')->orderBy('id','desc')->take(10)->get();

        return response()->json([
            'data' =>  [
                'en'=>[
                    'title' => 'Welcome to JMI Brokers | Online Forex Trading',
                    'description' => 'JMI Brokers leading secure trading since 2009 with the most competitive offers for forex, indices, stocks  and metals with clients in 100 countries',
                    'keywords' => 'Forex, Gold, Silver, US Shares, UK Shares, Metatrader, Oil ',
                    'reuters_news'=>$reuters_news_en
                ],
                'ar'=>[
                    'title' => 'جى ام اى بروكرز | شركة تداول الفوركس',
                    'description' => 'جي أم أي رائدة في التداول الآمن عبر الانترنت منذ عام 2009 مع أكثر العروض تنافسية للفوركس والمؤشرات والأسهم والمعادن مع عملاء في 100 دولة',
                    'keywords' => 'التداول,تداول, الاسهم, تداول الاسهم, فوركس, الفوركس, البورصه العالميه, التداول عبر الانترنت, تداول عبر الانترنت',
                    'reuters_news'=>$reuters_news_ar
                ],
                'ru'=>[
                    'title' => 'Добро пожаловать в JMI Brokers | Интернет Форекс',
                    'description' => 'Forex, Gold, Silver, US Shares, UK Shares, Metatrader, Oil ',
                    'keywords' => 'Forex, Gold, Silver, US Shares, UK Shares, Metatrader, Oil ',
                    'reuters_news'=>$reuters_news_en
                ],
            ]
        ], 200);


    }


    public function get_reuters_news()
    {

        $client = new Client();

        $crawler = $client->request('GET', 'https://ara.reuters.com/news/archive/businessNews');

        $crawler->filter('div.NONE > div.module > div.headlineMed')->each(function ($node) {
          $reuters_new=reuters_news::where('news',$node->filter('a')->text())->get()->first();
          if($reuters_new == Null){
            date_default_timezone_set('Etc/GMT');
            $reuters_news=new reuters_news();
            $reuters_news->news=$node->filter('a')->text();
            $reuters_news->date=date("D j M");
            $reuters_news->time=$node->filter('span.timestamp')->text();
            $reuters_news->lang='ar';
            $reuters_news->save();

          }

        });

      $crawler = $client->request('GET', 'https://www.reuters.com/news/archive/marketsNews?view=page&page=1&pageSize=10');

        $crawler->filter('div.column1 > section.module > section.module-content > div.news-headline-list > article.story')->each(function ($node) {
          $reuters_new=reuters_news::where('news',$node->filter('div > a > h3')->text())->get()->first();
          if($reuters_new == Null){
            date_default_timezone_set('EST5EDT');
            $reuters_news=new reuters_news();
            $reuters_news->news=$node->filter('div > a > h3')->text();
            $reuters_news->date=date("D j M");
            $reuters_news->time=$node->filter('time.article-time > span.timestamp')->text();
            $reuters_news->lang='en';
            $reuters_news->save();

          }

        });


    }

   public function trading_hours(request $request)
   {
        set_time_limit(60);

          if( $request->segment(1) =='ar'){
      $title = "اوقات السوق";

        return view('ar.trading-hours',compact('title'));

      }elseif( $request->segment(1) =='ru'){
      $title = "Торговые часы";

        return view('ru.trading-hours',compact('title'));
      }else{
        $title="Trading Hours";

        return view('trading-hours',compact('title'));
      }

   }














}
