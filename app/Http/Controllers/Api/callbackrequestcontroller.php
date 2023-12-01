<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

use App\Models\callbackrequest;
use App\Models\Notifications;




class callbackrequestcontroller extends Controller
{
    public function index(request $request)
    {
		if( $request->segment(1) =='ar'){
			$title = "طلب اتصال";
    		return view('ar.callbackrequest',compact('title'));

    	}elseif( $request->segment(1) =='ru'){
			$title = "Запрос обратного звонка";
    		return view('ru.callbackrequest',compact('title'));

    	}else{

    	$title='Call Back Request';
    	return view('callbackrequest',compact('title'));
    	}


    }

        public function callbackrequest(request $request)
    {

			$title=$request->input('title');
			$fullname=$request->input('fullname');
			$email=$request->input('email');
			$country=$request->input('country');
			$city=$request->input('city');
			$code=$request->input('code');
			$timetocall=$request->input('timetocall');
			$department=$request->input('department');
			$phone=$request->input('phone');
			    $this->validate($request, [

			        'title' => 'required|regex:/^[0-9]*$/|min:1|max:3',
			        'fullname' => 'required|min:5|max:50',
			        'email' => 'required|min:5|max:40|email',
			        'country' => 'required|regex:/^[0-9]*$/|min:1|max:3',
			        'city' => 'required|min:3|max:40|regex:/^[a-zA-Z ]*$/',
			        'code' => 'required|min:2|max:6|regex:/^[0-9]*$/',
			        'phone' => 'required|min:6|max:15|regex:/^[0-9]*$/',
			        'department' => 'required|min:1|max:15|regex:/^[0-9]*$/',
			        'timetocall' => 'required|min:1|max:40',

			    ]);


			    	$callbackrequest=new callbackrequest;
			    	$callbackrequest->title=$title;
			    	$callbackrequest->fullname=$fullname;
			    	$callbackrequest->email=$email;
			    	$callbackrequest->country=$country;
			    	$callbackrequest->city=$city;
			    	$callbackrequest->code=$code;
			    	$callbackrequest->phone=$phone;
			    	$callbackrequest->department=$department;
			    	$callbackrequest->timetocall=$timetocall;
			    	$callbackrequest->save();




                $notification=new Notifications;
                $notification->website_accounts_id=999999999;
                $notification->notification_status=0;
                $notification->notification='New CallBack Request';
                $notification->notification_link='/spanel/callback-requests';
                $notification->save();


				Mail::send('mails.callbackrequestmail',['fullname' => $fullname , 'email' => $email, 'title'=>$title,'country'=>$country,'city'=>$city,'code'=>$code,'phone'=>$phone,'department'=>$department,'timetocall'=>$timetocall], function($message)use ( $email){
						$message->to($email)->cc('support@jmibrokers.com');
						$message->from('info@jmibrokers.com','JMI Brokers');
						$message->subject('Call Back Request');
				});
                return 1;

    }














}
