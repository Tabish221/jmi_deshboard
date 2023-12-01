<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use URL;
use Mail;
use Swift_SmtpTransport;
use Swift_Mailer;
use App\Models\Mail\Queued;
use Illuminate\Support\Facades\Storage;

class careercontroller extends Controller
{
    public function index(request $request)
    {

        if( $request->segment(1) =='ar'){
            $title = "وظائف";
            $description="شركة جى ام اى بروكرز تؤمن بأن أعمالها تتطور بما يتماشى مع النمو الشخصي والمهني لموظفيها.";
            $keywords="وظائف شركة JMIBrokers, وظائف فوركس";
            return view('ar.career',compact('title','description','keywords'));
        }elseif( $request->segment(1) =='ru'){
            $title = "Careers";
            $description="JMIBrokers считает, что ее бизнес развивается в соответствии с личным и профессиональным ростом сотрудников.";
            $keywords="Карьера на Форекс, Карьера в JMIBrokers";
            return view('ru.career',compact('title','description','keywords'));
        }else{
        $title="Careers";
        $description="The JMIBrokers believes that its business develops in line with its employees personal and professional growth.";
        $keywords="Forex careers, JMIBrokers Careers";
        return view('career',compact('title','description','keywords'));
        }

    }



    public function upload_cv(request $request)
    {


      $this->validate(Request(), [
          'document' => 'required|max:2048|file|mimetypes:application/pdf',
      ]);

          $destinationPath=public_path().'/cv/';
          //$filename = rand(1,1000000).time().'.'.$input['document']->getClientOriginalExtension();;
          $filename = rand(1,1000000).time().'.'.$request->file('document')->getClientOriginalExtension();
          $url = 'user_documents/'.$filename;

          Storage::disk('do')->putFileAs('user_documents', $request->file('document'), $filename);

          $url_cv = Storage::disk('do')->url($url);

          Mail::send('mails.careeruploadcvmail',['cvurl' => $url_cv], function($message){
              $message->to('info@jmibrokers.com');
              $message->from('support@jmibrokers.com','JMI Brokers');
              $message->subject('New Career Cv From JMIBrokers.com');

          });

        return response()->json([
            'message' =>
                [
                    'en'=>'Successfully Uploaded Your CV',
                    'ar'=>'تم أستلام السيرة الذاتية بنجاح',
                    'ru'=>'Ваше резюме успешно загружено',
                ]
        ], 200);


    }



}
