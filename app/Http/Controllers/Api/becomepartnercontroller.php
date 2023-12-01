<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use App\Models\partner;

class becomepartnercontroller extends Controller
{
    public function index(request $request)
    {

		if( $request->segment(1) =='ar'){
			$title = "كن شريكا لنا";
    		return view('ar.become-partner',compact('title'));
    	}if( $request->segment(1) =='ru'){

			$title = "Станьте нашим партнером";
    		return view('ru.become-partner',compact('title'));

    	}else{
    	$title="Become Our Partner";
    	return view('become-partner',compact('title'));
    	}

    }

    public function becomepartner(request $request)
    {

    				set_time_limit(60);

			    $this->validate($request, [
			        'title' => 'required|regex:/^[0-9]*$/|min:1|max:3',
			        'fullname' => 'required|min:5|max:50',
			        'email' => 'required|min:5|max:40|email',
			        'country' => 'required|regex:/^[0-9]*$/|min:1|max:3',
			        'city' => 'required|min:3|max:40|regex:/^[a-zA-Z ]*$/',
			        //'code' => 'required|min:2|max:6|regex:/^[0-9]*$/',
			        'phone' => 'required|min:6|max:15|regex:/^[0-9]*$/',
			        // 'areyou' => 'required',
			        // 'typicalequity' => 'required',
			        // 'howmanyclients' => 'required',
			        // 'tradewith' => 'required',
			        // 'question' => 'required',
			        // 'company' => 'required',
			    ]);

          $title=$request->input('title');
          $fullname=$request->input('fullname');
          $email=$request->input('email');
          $country=$request->input('country');
          $company=$request->input('company');
          $city=$request->input('city');
          $code=$request->input('code');
          $areyou=$request->input('areyou');
          $phone=$request->input('phone');
          $typicalequity=$request->input('typicalequity');
          $howmanyclients=$request->input('howmanyclients');
          $tradewith=$request->input('tradewith');
          $question=$request->input('question');

			    	$partner= new partner;

			    	$partner->title=$title;
			    	$partner->fullname=$fullname;
			    	$partner->email=$email;
			    	$partner->company=$company;
			    	$partner->headoffice=$country;
			    	$partner->city=$city;
			    	$partner->code=00;
			    	$partner->phone=$phone;
			    	$partner->entity=' ';
			    	$partner->clients=' ';
			    	$partner->equity=' ';
			    	$partner->tradewith=' ';
			    	$partner->questions=' ';
			    	$partner->save();


				Mail::send('mails.becomepartnermail',['fullname' => $fullname , 'email' => $email, 'title'=>$title,'country'=>$country,'city'=>$city,'code'=>$code,'phone'=>$phone,'company'=>$company,'areyou'=>$areyou,'tradewith'=>$tradewith,'howmanyclients'=>$howmanyclients,'typicalequity'=>$typicalequity,'question'=>$question], function($message)use ( $email){
						$message->to('support@jmibrokers.com');
						$message->from('info@jmibrokers.com','JMI Brokers');
						$message->subject('Partner Request');


				});

        Mail::send('mails.becomeourpartner-foruser',['fullname' => $fullname , 'email' => $email, 'title'=>$title], function($message)use ( $email){
						$message->to($email);
						$message->from('info@jmibrokers.com','JMI Brokers');
						$message->subject('Partner Request');


				});


        return response()->json([
            'message' => 'Successfully requested'
        ], 200);



    }




      public function thankyou(request $request)
      {

        if( $request->segment(1) =='ar'){
          $title = "شكرا لك";
            return view('ar.becomepartnermsg',compact('title'));
          }elseif( $request->segment(1) =='ru'){
          $title = "Спасибо вам";
            return view('ru.becomepartnermsg',compact('title'));
          }else{
            $title='Thanks You';
          return view('becomepartnermsg',compact('title'));
          }

      }



}
