<?php

namespace App\Http\Controllers\Api;

use App\Models\technicalanalysis;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\fundamentalanalysis;


class dailyfundamentalcontroller extends Controller
{
    public function index(request $request)
    {

        $fundamentalanalysis = fundamentalanalysis::where(['fundamentalstatus'=>'1'])->orderBy('id', 'desc')->get()->take(5);


        return response()->json([
            'title' =>
                [
                    'en'=>'JMI Brokers Daily Fundamental"',
                    'ar'=>'JMI brokers | التحليل الأساسي',
                    'ru'=>'Ежедневный фундаментальный анализ" ',
                ],
            'description' =>
                [
                    'en'=>'Use JMI Brokers FREE & Daily rich fundamental analysis and Economic Calendar of stocks, forex, and investing to assess intrinsic value of a security."',
                    'ar'=>'حدد الفرص من خلال التحليل الأساسى اليومي والمجاني من جي أم أيوراقب كافة العوامل التي تؤثرعلى الأوضاع الاقتصادية و أخبار البورصه و أخبار الفوركس',
                    'ru'=>'Use JMI Brokers FREE & Daily rich fundamental analysis and Economic Calendar of stocks, forex, and investing to assess intrinsic value of a security."',
                ],
            'keywords' =>
                [
                    'en'=>'JMI Brokers Daily Fundamental, JMI Brokers Daily Fundamental analysis',
                    'ar'=>'التحليل الأساسى, أخبار البورصه,أخبار الفوركس',
                    'ru'=>'панель управления | Обзор учетной записи',
                ],
            'fundamentalanalysis'=>$fundamentalanalysis,
        ], 200);


    }

    public function viewfundamental(Request $request)
    {
        $fundamentalanalysis = fundamentalanalysis::where('id',$request->fundamentalid)->get();

        if(count($fundamentalanalysis)>0){
            $fundamentalanalysis = fundamentalanalysis::where('id',$request->fundamentalid)->get()->first();
            return response()->json([
                'title' =>
                    [
                        'en'=>$fundamentalanalysis->title,
                        'ar'=>$fundamentalanalysis->arabic_title,
                        'ru'=>$fundamentalanalysis->title,
                    ],
                'fundamentalanalysis'=>$fundamentalanalysis,

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





}
