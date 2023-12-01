<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\accounts;
use App\Http\Controllers\DB;
use BrowserDetect;
use Mail;
use Config;
use Hash;
use URL;
use App\user;
use Redirect;
use Session;
use App\Models\refuser;
use App\Models\refaccounts;
use App\Models\landingusers;
use App\Models\demoacc;




class landinguserscontroller extends Controller
{

		public function storelandinguser(Request $request)
		{
		//	request::get('inputname')
			$name=$request->input('name');
			$lastname=$request->input('lastname');
			$country=$request->input('country');
			$code=$request->input('countryCode');
			$phone=$request->input('phone');
			$email=$request->input('email');
			$landing_name=$request->input('landing_name');

		    $this->validate($request, [
			        'name' => 'required',
			       // 'lastname' => 'required',
			        //'email' => 'email',
			        'phone' => 'required',

			    ]);

		$account = new landingusers;
			$account->name=$name;
			$account->lname='';
			//$account->lname=$lastname;
			$account->country=$country;
			$account->code='+'.$code;
			$account->phone=$phone;
			$account->email=$email;
			$account->landing_name=$landing_name;
			$account->cookie=session('refeer_cookie');
			if($account->save()){

    	if(!empty(session('ref'))){

    				$ref=new refaccounts;
					$ref->refby=session('ref');
					$ref->accounttype=4;
					$ref->fullname=$name;
				//	$ref->username=$username;
					$ref->email=$email;
					$ref->country=241;
				//	$ref->code=$code;
					$ref->phone=$phone;
					$ref->save();

    	}

			return	Redirect::to('/en/landing/thankyou');
			}



		}


		public function storelandinguser2(Request $request)
		{
		//	request::get('inputname')
			$name=$request->input('name');
			$lastname=$request->input('lastname');
			$country=$request->input('country');
			$code=$request->input('countryCode');
			$phone=$request->input('phone');
			$email=$request->input('email');
			$landing_name=$request->input('landing_name');

				$this->validate($request, [
							'name' => 'required',
						 // 'lastname' => 'required',
							//'email' => 'email',
							'phone' => 'required',

					]);

		$account = new landingusers;
			$account->name=$name;
			$account->lname='';
			//$account->lname=$lastname;
			$account->country=$country;
			$account->code='+'.$code;
			$account->phone=$phone;
			$account->email=$email;
			$account->landing_name=$landing_name;
			$account->cookie=session('refeer_cookie');
			if($account->save()){

			if(!empty(session('ref'))){

						$ref=new refaccounts;
					$ref->refby=session('ref');
					$ref->accounttype=4;
					$ref->fullname=$name;
				//	$ref->username=$username;
					$ref->email=$email;
					$ref->country=241;
				//	$ref->code=$code;
					$ref->phone=$phone;
					$ref->save();

			}

			return view('competetion.congrats');
			}



		}



				public function storelandinguser3(Request $request)
				{
				//	request::get('inputname')
					$name=$request->input('name');
					$lastname=$request->input('lastname');
					$country=$request->input('country');
					$code=$request->input('countryCode');
					$phone=$request->input('phone');
					$email=$request->input('email');
					$landing_name=$request->input('landing_name');

				    $this->validate($request, [
					        'name' => 'required',
					       // 'lastname' => 'required',
					        //'email' => 'email',
					        'phone' => 'required',

					    ]);

				$account = new landingusers;
					$account->name=$name;
					$account->lname='';
					//$account->lname=$lastname;
					$account->country=$country;
					$account->code='+'.$code;
					$account->phone=$phone;
					$account->email=$email;
					$account->landing_name=$landing_name;
					$account->cookie=session('refeer_cookie');
					if($account->save()){

		    	if(!empty(session('ref'))){

		    				$ref=new refaccounts;
							$ref->refby=session('ref');
							$ref->accounttype=4;
							$ref->fullname=$name;
						//	$ref->username=$username;
							$ref->email=$email;
							$ref->country=241;
						//	$ref->code=$code;
							$ref->phone=$phone;
							$ref->save();

		    	}

					$url="https://us-central1-madrid-investing.cloudfunctions.net/PostbackCloudFunciton/?token=YWR2ZXJpc2VyX2FmZmlsYXRpb25fdXJs&advertiser=JMI%20BROKERS%20LTD&brand=JMIBrokers&model=CPL&affiliate_id=1&offer_id=&user_id=[user_id]&event_type=FTD&subID=[our_tracking_string]";
					$url2='https://us-central1-madrid-investing.cloudfunctions.net/PostbackCloudFunciton/?token=YWR2ZXJpc2VyX2FmZmlsYXRpb25fdXJs&advertiser=JMI%20BROKERS%20LTD&brand=JMIBrokers&model=CPL&affiliate_id=1&offer_id=&user_id=[user_id]&event_type=Lead&subID=[our_tracking_string]';

						$ch = curl_init();
						$fields = array();
						$postvars = '';

						curl_setopt($ch,CURLOPT_URL,$url);
						curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
						curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
						curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
						curl_setopt($ch,CURLOPT_TIMEOUT, 20);
						$response = curl_exec($ch);
						curl_close ($ch);
						$ch = curl_init();
						$fields = array();
						$postvars = '';

						curl_setopt($ch,CURLOPT_URL,$url2);
						curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
						curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
						curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
						curl_setopt($ch,CURLOPT_TIMEOUT, 20);
						$response = curl_exec($ch);
						curl_close ($ch);

					return	Redirect::to('/en/landing/thankyou');
					}



				}



		public function storeuser(Request $request)
		{
		//	request::get('inputname')


			$name=$request->input('name');
			$phone=$request->input('phone');
			$email=$request->input('email');
			$accounttype=$request->input('accounttype');
			$country=$request->input('country');
			$code=$request->input('countryCode');
		    $this->validate($request, [
			        'name' => 'required',
			        'email' => 'required|email',
			        'phone' => 'required',
			    ]);

			$account = new demoacc;
			$account->name=$name;
			$account->phone=$phone;
			$account->email=$email;
			$account->country=$country;
			$account->code='+'.$code;
			$username=$name;


			if($account->save()){










		 $chars1 = "abcdefghijklmnopqrstuvwxyz";
		 $chars2 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		 $chars3 = "0123456789";
		$part1 = substr(str_shuffle($chars1),0,4);
		$part2 = substr(str_shuffle($chars2),0,4);
		$part3 = substr(str_shuffle($chars3),0,4);
		$part4 = substr(str_shuffle($chars1),0,3);
		$part5 = substr(str_shuffle($chars2),0,3);
		$part6 = substr(str_shuffle($chars3),0,3);
		$mt4password=$part1.$part2.$part3;
		$mt4investor=$part4.$part5.$part6;

         $user['email']         =$email;
         $user['password']      =$mt4password;
         $user['group']         =$accounttype;
         $user['leverage']      ='200';
         $user['zipcode']       =' ';
         $user['country']       ='United Arab Emirates';
         $user['state']         =' ';
         $user['city']          =' ';
         $user['address']       =' ';
         $user['comment']       =' ';
         $user['phone_password']       =' ';
         $user['status']       =' ';
         $user['id']       =' ';
         $user['agent']       =' ';
         $user['phone']         =$phone;
         $user['name']          =$name;
         $user['investor']=$mt4investor;
         $user['send_reports']  =1;
         $user['deposit']       =5000;




      //--- prepare query
      $query="NEWACCOUNT MASTER=JMIBrokers2016|IP=$_SERVER[REMOTE_ADDR]|GROUP=$user[group]|NAME=$user[name]|".
             "PASSWORD=$user[password]|INVESTOR=$user[investor]|EMAIL=$user[email]|COUNTRY=$user[country]|".
             "STATE=$user[state]|CITY=$user[city]|ADDRESS=$user[address]|COMMENT=$user[comment]|".
             "PHONE=$user[phone]|PHONE_PASSWORD=$user[phone_password]|STATUS=$user[status]|ZIPCODE=$user[zipcode]|".
             "ID=$user[id]|LEVERAGE=$user[leverage]|AGENT=$user[agent]|SEND_REPORTS=$user[send_reports]|DEPOSIT=$user[deposit]";
      //--- send request

   $ret='error';
//---- open socket
   $ptr=@fsockopen('85.234.143.239','443',$errno,$errstr,5);
//---- check connection
   if($ptr)
     {
      //---- send request
      if(fputs($ptr,"W$query\nQUIT\n")!=FALSE)
        {
         //---- clear default answer
         $ret='';
         //---- receive answer
         while(!feof($ptr))
          {
           $line=fgets($ptr,128);
           if($line=="end\r\n") break;
           $ret.= $line;
          }
        }
      fclose($ptr);
     }
//---- return answer

   $ret;


if (strpos($ret, 'OK') !== false) {


$mt4login = substr($ret, strpos($ret, "=") + 1);


    	if(!empty(session('ref'))){

    				$ref=new refaccounts;
					$ref->refby=session('ref');
					$ref->accounttype=4;
					$ref->fullname=$name;
				//	$ref->username=$username;
					$ref->email=$email;
					$ref->country=241;
				//	$ref->code=$code;
					$ref->phone=$phone;
					$ref->save();

    	}

				Mail::send('mails.registerdemomail',['title' => '0','fullname' => $name,'username' => $name , 'email' => $email, 'mt4login' => $mt4login, 'mt4password' => $mt4password, 'mt4investor' => $mt4investor], function($message)use ($username , $email){
						$message->to($email)->cc('support@jmibrokers.com')->bcc('support@jmibrokers.com');
						$message->from('info@jmibrokers.com','JMI Brokers');
						$message->subject('Welcome To JMI Brokers');
					//	$message->attachData($username , $email);
					//	$message->attach('file path');

				});



				Mail::send('mails.admindemoregistermail',['country' => '0','accounttype' => '3','title' => '0','fullname' => $name,'mobile' => $phone,'username' => 'Demo' , 'email' => $email], function($message)use ( $email){
						$message->to('support@jmibrokers.com')->cc('support@jmibrokers.com');
						$message->from('info@jmibrokers.com','JMI Brokers');
						$message->subject('New Demo Account');
					//	$message->attachData($username , $email);
					//	$message->attach('file path');

				});


						$request->session()->flash('mt4login', $mt4login);
						$request->session()->flash('mt4password', $mt4password);
						$request->session()->flash('mt4investor', $mt4investor);


				    	if( $request->segment(1) =='ar'){
								$title="شكرا لك";
    							return view('ar.thankyoumsg',compact('title'));
				    	}elseif( $request->segment(1) =='ru'){
								$title="Спасибо";
    							return view('ru.thankyoumsg',compact('title'));
				    	}else{

								$title="Thank You";
    							return view('thankyoumsg',compact('title'));
				    	}



}else{




		return redirect()->back()->with('ErrorMT4', $ret);



}

// return $coo.' /PASSWORD='.$password.' / INVESTOR PASSWORD ='.$investor;









			}



		}







		public function quotes()
		{

			return view('quotes.index3');
		}







		public function demo(Request $request)
		{
		//	request::get('inputname')

			$name=$request->input('name');
			$phone=$request->input('phone');
			$email=$request->input('email');

			$country=$request->input('country');
			$code=$request->input('countryCode');
		    $this->validate($request, [
			        'name' => 'required',
			        'email' => 'required|email',
			        'phone' => 'required',
			    ]);

		$account = new landingusers;
			$account->name=$name;
			$account->lname=' ';
			$account->country=$country;
			$account->code='+'.$code;
			$account->phone=$phone;
			$account->email=$email;


			if($account->save()){










		 $chars1 = "abcdefghijklmnopqrstuvwxyz";
		 $chars2 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		 $chars3 = "0123456789";
		$part1 = substr(str_shuffle($chars1),0,4);
		$part2 = substr(str_shuffle($chars2),0,4);
		$part3 = substr(str_shuffle($chars3),0,4);
		$part4 = substr(str_shuffle($chars1),0,3);
		$part5 = substr(str_shuffle($chars2),0,3);
		$part6 = substr(str_shuffle($chars3),0,3);
		$mt4password=$part1.$part2.$part3;
		$mt4investor=$part4.$part5.$part6;

         $user['email']         =$email;
         $user['password']      =$mt4password;
         $user['group']         ='2';
         $user['leverage']      ='100';
         $user['zipcode']       =' ';
         $user['country']       ='United Arab Emirates';
         $user['state']         =' ';
         $user['city']          =' ';
         $user['address']       =' ';
         $user['comment']       =' ';
         $user['phone_password']       =' ';
         $user['status']       =' ';
         $user['id']       =' ';
         $user['agent']       =' ';
         $user['phone']         =$phone;
         $user['name']          =$name;
         $user['investor']=$mt4investor;
         $user['send_reports']  =1;
         $user['deposit']       =5000;




      //--- prepare query
      $query="NEWACCOUNT MASTER=JMIBrokers2016|IP=$_SERVER[REMOTE_ADDR]|GROUP=$user[group]|NAME=$user[name]|".
             "PASSWORD=$user[password]|INVESTOR=$user[investor]|EMAIL=$user[email]|COUNTRY=$user[country]|".
             "STATE=$user[state]|CITY=$user[city]|ADDRESS=$user[address]|COMMENT=$user[comment]|".
             "PHONE=$user[phone]|PHONE_PASSWORD=$user[phone_password]|STATUS=$user[status]|ZIPCODE=$user[zipcode]|".
             "ID=$user[id]|LEVERAGE=$user[leverage]|AGENT=$user[agent]|SEND_REPORTS=$user[send_reports]|DEPOSIT=$user[deposit]";
      //--- send request

   $ret='error';
//---- open socket
   $ptr=@fsockopen('85.234.143.239','443',$errno,$errstr,5);
//---- check connection
   if($ptr)
     {
      //---- send request
      if(fputs($ptr,"W$query\nQUIT\n")!=FALSE)
        {
         //---- clear default answer
         $ret='';
         //---- receive answer
         while(!feof($ptr))
          {
           $line=fgets($ptr,128);
           if($line=="end\r\n") break;
           $ret.= $line;
          }
        }
      fclose($ptr);
     }
//---- return answer

    $ret;


if (strpos($ret, 'OK') !== false) {


$mt4login = substr($ret, strpos($ret, "=") + 1);


						$request->session()->flash('mt4login', $mt4login);
						$request->session()->flash('mt4password', $mt4password);
						$request->session()->flash('mt4investor', $mt4investor);


					    	if( $request->segment(1) =='ar'){
								$title="شكرا لك";
    							return view('ar.thankyoumsg',compact('title'));
				    	}else{

								$title="Thank You";
    							return view('landingpages/thank',compact('title','mt4login','mt4password','mt4investor'));
				    	}

}else{




		return redirect()->back()->with('ErrorMT4', $ret);



}

// return $coo.' /PASSWORD='.$password.' / INVESTOR PASSWORD ='.$investor;









			}



		}























}
