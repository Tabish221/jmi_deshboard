<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\technicalanalysis;




class dailytechnicalcontroller extends Controller
{
    public function index(request $request)
    {

        $technicalanalysis1 = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'1'])->orderBy('id', 'desc')->get()->first();
        $technicalanalysis2 = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'2'])->orderBy('id', 'desc')->get()->first();
        $technicalanalysis3 = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'3'])->orderBy('id', 'desc')->get()->first();
        $technicalanalysis4 = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'4'])->orderBy('id', 'desc')->get()->first();
        $technicalanalysis5 = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'5'])->orderBy('id', 'desc')->get()->first();
        $technicalanalysis6 = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'6'])->orderBy('id', 'desc')->get()->first();
        $technicalanalysis7 = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'7'])->orderBy('id', 'desc')->get()->first();


        return response()->json([
            'title' =>
                [
                    'en'=>'JMI Brokers | Technical Analysis',
                    'ar'=>'JMI brokers | التحليل الفنى',
                    'ru'=>'JMI Brokers | Technical Analysis',
                ],
            'description' =>
                [
                    'en'=>'Use JMI Brokers FREE & Daily rich technical analysis (MACD indicator/ Nepse alpha chart/Moving Average) for investment valuation & identifying opportunities.',
                    'ar'=>"قيم الصفقات والإستثمارات وحدد الفرص من خلال التحليل الفني اليومي والمجاني من جي أم أي  مستخدمين مؤشر الماك دي/ ومخطط ألفا نيبسي",
                    'ru'=>'Use JMI Brokers FREE & Daily rich technical analysis (MACD indicator/ Nepse alpha chart/Moving Average) for investment valuation & identifying opportunities.',
                ],
            'keywords' =>
                [
                    'en'=>'technical analysis ,MACD indicator, chart patterns, nepse alpha chart, Support and Resistance, Moving Average',
                    'ar'=>"التحليل الفنى, التحليل الفني للأسهم, الماك دي",
                    'ru'=>'technical analysis ,MACD indicator, chart patterns, nepse alpha chart, Support and Resistance, Moving Average',
                ],
            'technicalanalysis1'=>$technicalanalysis1,
            'technicalanalysis2'=>$technicalanalysis2,
            'technicalanalysis3'=>$technicalanalysis3,
            'technicalanalysis4'=>$technicalanalysis4,
            'technicalanalysis5'=>$technicalanalysis5,
            'technicalanalysis6'=>$technicalanalysis6,
            'technicalanalysis7'=>$technicalanalysis7,

        ], 200);

    }



    public function viewtechnical(Request $request)
    {

        $technicalanalysis = technicalanalysis::where('id',$request->technicalid)->get();

        if(count($technicalanalysis)>0){
            $technicalanalysis = technicalanalysis::where('id',$request->technicalid)->get()->first();
            return response()->json([
                'title' =>
                    [
                        'en'=>$technicalanalysis->title,
                        'ar'=>$technicalanalysis->arabic_title,
                        'ru'=>$technicalanalysis->title,
                    ],
                'technicalanalysis'=>$technicalanalysis,

            ], 200);
        }else{
            return response()->json([
                'error' =>
                    [
                        'en'=>'Not Found',
                        'ar'=>'تحليل غير موجود',
                        'ru'=>'Not Found',
                    ],

            ], 201);
        }






    }






    public function viewmoretechnical(Request $request)
    {

        $technicalanalysis1 = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'1'])->orderBy('id', 'desc')->get()->take(5);
        $technicalanalysis2 = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'2'])->orderBy('id', 'desc')->get()->take(5);
        $technicalanalysis3 = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'3'])->orderBy('id', 'desc')->get()->take(5);
        $technicalanalysis4 = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'4'])->orderBy('id', 'desc')->get()->take(5);
        $technicalanalysis5 = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'5'])->orderBy('id', 'desc')->get()->take(5);
        $technicalanalysis6 = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'6'])->orderBy('id', 'desc')->get()->take(5);
        $technicalanalysis7 = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'7'])->orderBy('id', 'desc')->get()->take(5);

        return response()->json([
            'title' =>
                [
                    'en'=>'JMI Brokers | Technical Analysis',
                    'ar'=>'JMI brokers | التحليل الفنى',
                    'ru'=>'JMI Brokers | Technical Analysis" ',
                ],
            'technicalanalysis1'=>$technicalanalysis1,
            'technicalanalysis2'=>$technicalanalysis2,
            'technicalanalysis3'=>$technicalanalysis3,
            'technicalanalysis4'=>$technicalanalysis4,
            'technicalanalysis5'=>$technicalanalysis5,
            'technicalanalysis6'=>$technicalanalysis6,
            'technicalanalysis7'=>$technicalanalysis7,

        ], 200);

    }

}
