<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests;

use Request;
use Session;
use Hash;
use URL;
use App\Models\Website_accounts;
use App\Models\Documents;
use App\Models\Notifications;
use App\Models\Fx_accounts;
use App\Models\CopyTrade;
use App\Models\Transactions;
use App\Models\maillist;
use App\Models\landingusers;
use App\Models\Mail\Queued;
use App\Models\referrals_statics;
use App\Models\email_verfication;
use App\Models\unionpay_cards;
use App\Models\invoices;


use finfo;
use Symfony\Component\HttpFoundation\File\UploadedFile;


use Illuminate\Support\Collection;

use App\Models\technicalanalysis;


use Goutte\Client;

use App\Models\Economic_Calendar;
use DatePeriod;
use DateTime;
use DateInterval;

use Swift_SmtpTransport;
use Swift_Mailer;

use BrowserDetect;
use GeoIP;
use File;
use Mail;
use Redirect;

use Excel;

use PDF;
use DB;

use CoinbaseCommerce\ApiClient;
use CoinbaseCommerce\Resources\Checkout;
use CoinbaseCommerce\Resources\Event;
use CoinbaseCommerce\Webhook;
use Illuminate\Support\Facades\Storage;

class CpanelController extends Controller
{

    public function get_user()
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'profile');
        $session_user= Session::get('user');
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        return response()->json([
            'data' => $user,
        ], 200);


    }

    function checklogin()
    {

        $input = Request::all();

        if (filter_var($input['username'], FILTER_VALIDATE_EMAIL)) {

        } else {
            $this->validate(Request(), [
                'username' => 'required|min:6|max:40|regex:/^[a-zA-Z0-9]*$/',
            ]);
        }


        $user = Website_accounts::where('username', $input['username'])->Orwhere('email', $input['username'])->first();
        if ($user) {
            if (Hash::check($input['password'], $user->password)) {
                Session::put('user', $input['username']);
                Session::save();
                return response()->json([
                    'data' => 'User logged in',
                    'username'=>Session::get('user')
                ], 200);
            }else{
                return response()->json([
                    'errors' =>
                        [
                            'en'=>'Username or password is invalid',
                            'ar'=>'الأسم المستخدم او كلمة السر غير صحيح',
                            'ru'=>'Имя пользователя или пароль неверны',
                        ]
                ], 201);

            }
        }else{
            return response()->json([
                'errors' =>
                    [
                        'en'=>'Username or password is invalid',
                        'ar'=>'الأسم المستخدم او كلمة السر غير صحيح',
                        'ru'=>'Имя пользователя или пароль неверны',
                    ]
            ], 201);
        }
    }




    public function sendverificationmail()
    {

        $session_user= Session::get('user');
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $token=md5($user->id.$user->username.$user->email);

        $activationlink=URL::to('/en/activate/').'/'.$user->username.'/'.$token;

        Mail::send('mails.activationmail',['email' => $user->email,'activationlink' => $activationlink], function($message)use ($activationlink , $user){
            $message->to($user->email);
            $message->from('support@jmibrokers.com','JMI Brokers');
            $message->subject('Confirm Your Mail');
        });

        return 1;

    }

    public function sendverificationmailCode($email)
    {

        $token=random_int(100000, 999999);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        } else {
            return redirect()->back()->with('Error', 'An error has been occured');
        }

        $email_verfications = email_verfication::where('email' ,  $email)->get();
        if(count($email_verfications)>0){
            $email_verfication = email_verfication::where('email' ,  $email)->get()->first();

        }else {
            $email_verfication=new email_verfication();
            $email_verfication->email=$email;

        }
        //  $email_verfication = email_verfication::firstOrNew(['email' =>  $email]);

        $email_verfication->token=$token;
        if($email_verfication->save()){
            $activationcode=$token;

            Mail::send('mails.activationmailcode',['email' => $email,'activationcode' => $activationcode], function($message)use ($activationcode , $email){
                $message->to($email);
                $message->from('support@jmibrokers.com','JMI Brokers');
                $message->subject('Confirm Your Mail');
                //info@jmibrokers.com
            });

            return 1;

        }else {
            return 0;
        }



    }



    public function verificationmailCode($email,$code)
    {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        } else {
            return redirect()->back()->with('Error', 'An error has been occured');
        }

        $user=email_verfication::where('email',$email)->get();
        if(count($user)>0){
            $user=email_verfication::where('email',$email)->get()->first();
            if($code==$user->token){
                return 1;
            }else{
                return 0;
            }

        }else{
            return 1;

        }


    }


    public function verificationmail($username,$token)
    {

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {

        } else if(!preg_match('/^[A-Za-z][A-Za-z0-9]{5,40}$/', $username)){

        }else {
            return redirect()->back()->with('Error', 'An error has been occured');
        }


        $user=website_accounts::where('username',$username)->get();
        if(count($user)>0){
            $user=website_accounts::where('username',$username)->get()->first();
            $token2=md5($user->id.$user->username.$user->email);
            if($token2==$token){
                $user->email_status=1;
                $user->save();
                if( Request::segment(1) =='ar'){
                    return redirect('ar/login')->with('status-success','تم تأكيد البريد الالكترونى بنجاح');
                }elseif( Request::segment(1) =='ru'){
                    return redirect('ru/login')->with('status-success','Ваш адрес электронной почты был активирован');
                }else{
                    return redirect('en/login')->with('status-success','Your Email Has Been Activated');
                }
            }else{
                if( Request::segment(1) =='ar'){
                    return redirect('ar/login')->with('status-error','رابط غير صحيح');
                }elseif( Request::segment(1) =='ru'){
                    return redirect('ru/login')->with('status-error','неправильная ссылка');
                }else{
                    return redirect('en/login')->with('status-error','Invalid Link');
                }
            }

        }else{
            if( Request::segment(1) =='ar'){
                return redirect('ar/login')->with('status-error','رابط غير صحيح');
            }if( Request::segment(1) =='ru'){
                return redirect('ru/login')->with('status-error','неправильная ссылка');
            }else{
                return redirect('en/login')->with('status-error','Invalid Link');
            }

        }





    }






    public function sendverificationsms()
    {

        $session_user= Session::get('user');
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();




        $accountId='ACbfb9c0618aab3ac39f9518d4eb01523d';
        $token='f7cabf0967f82abbd3177aa82d447c1f';
        $fromNumber='+201205704109';

        $client=new Client($accountId, $token);

        $twilioNumber = config('services.twilio')['number'] or die(
        "TWILIO_NUMBER is not set in the environment"
        );
        $messageBody = 'test msg';

        $client->messages->create(
            '+201205704109',    // Phone number which receives the message
            [
                "from" => $twilioNumber, // From a Twilio number in your account
                "body" => $messageBody
            ]
        );




        return "true";


    }







    public function post_signup()
    {

        $input = Request::all();

        $this->validate(Request(), [
            'title' => 'required|regex:/^[0-9]*$/|min:1|max:3',
            'fullname' => 'required|alpha_spaces',
            'username' => 'required|unique:website_accounts|min:6|max:40|regex:/^[a-zA-Z0-9]*$/',
            'email' => 'required|min:5|max:40|email|unique:website_accounts',
            'password' => 'required|min:8|max:40',
            'confirmpassword' => 'required|min:8|max:40|same:password',
            'phone_number' => 'regex:/^[0-9]*$/|max:15',
         //   '_answer'=>'required|simple_captcha',
            // 'emailverificationCode' =>'required'
        ]);

        $userrrr=email_verfication::where('email',$input['email'])->get();
        if(count($userrrr)>0){
            $userrrr=email_verfication::where('email',$input['email'])->get()->first();
            if($input['emailverificationCode']==$userrrr->token){


                $encpassword= Hash::make($input['password']);
                $user = new website_accounts;
                $user->title=$input['title'];
                //$user->title=0;
                $user->fullname=$input['fullname'];
                $user->username=$input['username'];
                $user->email=$input['email'];
                $user->password=$encpassword;
                $user->account_status="0";
                $user->email_status="1";
                $user->mobile_status="1";
                $user->mobile=$input['phone_number'];

            }else{
                return response()->json([
                    'errors' =>  ["username"=>"Email verify code is invalid."]
                ], 422);

                //    return redirect()->back()->with('status-error', 'Email verify code is invalid');
            }

        }else{
            return response()->json([
                'errors' =>  ["username"=>"Email verify code is required."]
            ], 422);
            //  return redirect()->back()->with('status-error', 'Email verify code is required');

        }


        $user->invited_by=Session::get('myref');
        $session_my_ref=Session::get('myref');
        if( $user->save() ){

            if(!empty(session('refeer_cookie'))){

                $account = new landingusers;
                $account->name=$input['fullname'];
                $account->lname='';
                //$account->lname=$lastname;
                $account->country=0;
                $account->code='+0';
                $account->phone=0;
                $account->email=$input['email'];
                $account->landing_name='web_acc';
                $account->cookie=session('refeer_cookie');
                if($account->save()){

                }}
            $invited_by_ib_details=' ';
            if(isset($session_my_ref)){
                $invited_by_ib=website_accounts::where('id',($session_my_ref-10000))->get();
                if(count($invited_by_ib)>0){
                    $invited_by_ib=website_accounts::where('id',($session_my_ref-10000))->get()->first();
                    $invited_by_ib_details='<br>IB_Name :'.$invited_by_ib->fullname.'<br>IB_Username :'.$invited_by_ib->username.'<br>IB_EMail :'.$invited_by_ib->email;
                }
            }

            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']='Name : '.$input['fullname'].'<br>'.'UserName : '.$input['username'].'<br>'.'Email : '.$input['email'].'<br>'.$invited_by_ib_details;
            $subject='New Website Account';
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);


            Mail::send('mails.newaccount2',['email' => $input['email'],'fullname' => $input['fullname']], function($message)use ($input ){
                $message->to($input['email']);
                $message->from('support@jmibrokers.com','JMI Brokers');
                $message->subject('Welcome to JMI Brokers');
            });


            $mail = new maillist;
            $mail->mail=$input['email'];
            $mail->title=0;
            $mail->name=$input['fullname'];
            $mail->save();


            $registered_user=website_accounts::where('email',($input['email']))->get()->first();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            $notification->notification='New Account Has Been Created';
            $notification->notification_link='/spanel/website-accounts?&bymail='.$registered_user->email.'&';
            $notification->save();


            $notification1=new Notifications;
            $notification1->website_accounts_id=$registered_user->id;
            $notification1->notification_status=0;
            $notification1->notification='Welcome to JMI Brokers, Please complete your profile to use all account features.';
            $notification1->details='Welcome to JMI Brokers, Please complete your profile to use all account features.';
            $notification1->notification_ar='مرحبًا بكم في JMI Brokers ، يرجى إكمال ملف التعريف الخاص بك لاستخدام جميع ميزات الحساب';
            $notification1->details_ar='مرحبًا بكم في JMI Brokers ، يرجى إكمال ملف التعريف الخاص بك لاستخدام جميع ميزات الحساب';

            $notification1->notification_ru='Добро пожаловать в JMI Brokers! Пожалуйста, заполните свой профиль, чтобы использовать все функции.';
            $notification1->details_ru='Добро пожаловать в JMI Brokers! Пожалуйста, заполните свой профиль, чтобы использовать все функции.';

            $notification1->notification_link='/cpanel/profile';
            $notification1->save();

            $notification2=new Notifications;
            $notification2->website_accounts_id=$registered_user->id;
            $notification2->notification_status=0;
            $notification2->notification='Welcome to JMI Brokers, Please upload your documents to use all account features.';
            $notification2->details='Welcome to JMI Brokers, Please upload your documents to use all account features.';
            $notification2->notification_ar='مرحبًا بكم في JMI Brokers ، يرجى تحميل المستندات الخاصة بك لاستخدام جميع ميزات الحساب';
            $notification2->details_ar='مرحبًا بكم في JMI Brokers ، يرجى تحميل المستندات الخاصة بك لاستخدام جميع ميزات الحساب';

            $notification2->notification_ru='Добро пожаловать в JMI Brokers! Загрузите свои документы, чтобы использовать все возможности учетной записи.';
            $notification2->details_ru='Добро пожаловать в JMI Brokers! Загрузите свои документы, чтобы использовать все возможности учетной записи.';

            $notification2->notification_link='/cpanel/documents';
            $notification2->save();

            Session::put('user', $input['email']);


            return 1;


        }else{

            //errors

        }



    }





    public function home()
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'landing');
        $session_user= Session::get('user');
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();

        $accounts=website_accounts::find($user->id)->fx_accounts_live;

        $balances=array();
        $equities=array();
        $names=array();

        foreach($accounts as $account){

            $ret='error';
            //---- open socket
            $ptr=@fsockopen('89.116.30.28','443',$errno,$errstr,5);
            //$ptr=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
            //---- check connection
            if($ptr)
            {
                //---- send request
                if(fputs($ptr,"WUSERINFO-login=$account->account_id|password=$account->password\nQUIT\n"))
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

            }
            if($ret == Null or $ret =='error')
            {
                //---- open socket
                //$ptr=@fsockopen('89.116.30.28','443',$errno,$errstr,5);
                $ptr=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
                //---- check connection
                if($ptr)
                {
                    //---- send request
                    if(fputs($ptr,"WUSERINFO-login=$account->account_id|password=$account->password\nQUIT\n"))
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

                }
            }


            $fx_balance = $this->get_string_between($ret, 'Balance:', 'Equity');
            $fx_equity = $this->get_string_between($ret, 'Equity:', 'Margin');
            $fx_name = $this->get_string_between($ret, "$account->account_id", '202');


            array_push($balances, $fx_balance);
            array_push($equities, $fx_equity);
            array_push($names, $fx_name);

        }

        $total_equities=array_sum($equities);
        return response()->json([
            'title' =>
                [
                    'en'=>'Cpanel | Account Overview',
                    'ar'=>'لوحة التحكم | لمحة عامة',
                    'ru'=>'панель управления | Обзор учетной записи',
                ],
            'user'=>$user,
            'accounts'=>$accounts,
            'equities'=>$equities,
            'total_equities'=>$total_equities,
            'names'=>$names,
            'balances'=>$balances,
            'currentPage'=>'landing',
            'pageType'=>'menu'
        ], 200);

    }

    public function change_profilePicture()
    {

        $input=Request::all();

        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'profile');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();


        $this->validate(Request(), [
            'profilePicture' => 'max:2048|mimes:jpeg,bmp,png,jpg',
        ]);


        $time=time();

        $destinationPath=public_path().'/assets/cpanel/profilePictures';
        //$filename = rand(1,1000000).time().'.'.$input['document']->getClientOriginalExtension();;
        $filename = rand(1,1000000).time().'.'.$input['profilePicture']->getClientOriginalExtension();
        $input['profilePicture']->move($destinationPath, $filename);
        $user->profilePicture=$filename;
        $user->save();

        return redirect()->back();
    }


    public function profile()
    {

        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'profile');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | الملف الشخصى ";
            return view('ar.cpanel.profile',compact('title','user','notifications_all','notifications_unseen','location'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Профиль ";
            return view('ru.cpanel.profile',compact('title','user','notifications_all','notifications_unseen','location'));
        }else{
            $title = "Control Panel | Profile";
            return view('cpanel.profile',compact('title','user','notifications_all','notifications_unseen','location'));
        }

    }


    public function post_profile()
    {


        $input=Request::all();

        $session_user= Session::get('user');
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $documents=website_accounts::find($user->id)->documents;

        if($user->email !== $input['email']){
            $this->validate(Request(), [
                'email' => 'required|min:5|max:40|email|unique:website_accounts',
            ]);
            $user->email_status=0;
        }
        if($user->username !== $input['username']){
            $this->validate(Request(), [
                'username' => 'required|unique:website_accounts|min:6|max:40|regex:/^[a-zA-Z0-9]*$/',
            ]);
        }
        if($user->mobile !== $input['mobile']){

            $user->mobile_status=0;
        }



        $this->validate(Request(), [
            'title' => 'required|regex:/^[0-9]*$/|min:1|max:3',
            'fullname' => 'required|alpha_spaces',
            'gender' => 'required|regex:/^[0-9]*$/|',
            'birthday' => 'required|regex:/^[0-9]*$/|',
            'birthmonth' => 'required|regex:/^[0-9]*$/|',
            'birthyear' => 'required|regex:/^[0-9]*$/|',
            'address1' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'address2' => 'regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'town_city' => 'required|alpha_spaces|',
            'post_code' => 'required|regex:/^[0-9]*$/|',
            'country' => 'required|alpha_spaces|',
            'countryCode' => 'required|regex:/^[0-9]*$/|',
            'home' => 'required|regex:/^[0-9]*$/|',
            'mobile' => 'regex:/^[0-9]*$/|',
            'employment_status' => 'required|regex:/^[0-9]*$/|',
            'nature_of_business' => 'required|regex:/^[0-9]*$/|',
            'annual_income' => 'required|regex:/^[0-9]*$/|',
            'net_worth' => 'required|regex:/^[0-9]*$/|',
        ]);


        $user->title=$input['title'];
        $user->fullname=$input['fullname'];
        $user->email=$input['email'];
        $user->username=$input['username'];
        $user->gender=$input['gender'];
        $user->birthday=$input['birthday'];
        $user->birthmonth=$input['birthmonth'];
        $user->birthyear=$input['birthyear'];
        $user->address1=$input['address1'];
        $user->address2=$input['address2'];
        $user->town_city=$input['town_city'];
        $user->post_code=$input['post_code'];
        $user->country=$input['country'];
        $user->country_code=$input['countryCode'];
        $user->home=$input['home'];
        $user->mobile=$input['mobile'];
        $user->employment_status=$input['employment_status'];
        $user->nature_of_business=$input['nature_of_business'];
        $user->annual_income=$input['annual_income'];
        $user->net_worth=$input['net_worth'];
        if($user->save()){
            Session::put('user', $input['username']);

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            $notification->notification=$input['email'].'Has Updated His Profile';
            $notification->notification_link='/spanel/website-accounts?&bymail='.$user->email.'&';
            $notification->save();


            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your profile has been updated successfully';
            $notification1->details='Your profile has been updated successfully';
            $notification1->notification_ar='تم تحديث ملفك الشخصي بنجاح';
            $notification1->details_ar='تم تحديث ملفك الشخصي بنجاح';

            $notification1->notification_ru='Ваш профиль был успешно обновлен';
            $notification1->details_ru='Ваш профиль был успешно обновлен';

            $notification1->notification_link='/cpanel/profile';
            $notification1->save();


            // Mail::send('mails.new-test-mail',['fullname'=>$user->fullname], function($message)use($user){
            //     $message->to('backoffice@jmibrokers.com');
            //     $message->cc('bishoyadel2011@aol.com');
            //     $message->from('support@jmibrokers.com','JMI Brokers');
            //     $message->subject('Customer Account Agreement');
            //     //$message->attach(public_path().'/assets/user_documents/'.$newfilename.'.pdf');
            //
            // });




            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']='Name : '.$input['fullname'].'<br>'.'UserName : '.$input['username'].'<br>'.'Email : '.$input['email'].'<br>'.'Has Updated His Profile';
            $subject=' Website Account Update';
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);



            if(count($documents)< 1){
                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/documents');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/documents');
                }else{
                    return Redirect::to('/en/cpanel/documents');
                }
            }


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/profile')->with('status-success', 'تم تحديث البيانات!');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/profile')->with('status-success', 'Профиль обновлен!');
            }else{
                return redirect('en/cpanel/profile')->with('status-success', 'Profile updated!');
            }


        }


    }






    public function ebooks()
    {

        Session::flash('pageType', 'tools');
        Session::flash('currentPage', 'ebooks');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();

        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | الكتب الألكترونية";
            return view('ar.cpanel.ebooks',compact('title','user','notifications_all','notifications_unseen','location'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Электронные книги";
            return view('ru.cpanel.ebooks',compact('title','user','notifications_all','notifications_unseen','location'));
        }else{
            $title = "Control Panel | EBooks";
            return view('cpanel.ebooks',compact('title','user','notifications_all','notifications_unseen','location'));
        }


    }


    public function pip_calculator()
    {



        Session::flash('pageType', 'tools');
        Session::flash('currentPage', 'pip-calculator');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();



        $client = new Client();

        $crawler = $client->request('GET', 'https://www.investing.com/tools/forex-pip-calculator');

        $data0=$crawler->filter('div.wrapper > section#leftColumn > div.calcToolContainer > form#calc_form > div.calcToolBottom > table.pipCalcResults')->each(function ($node) {
            return $node->html();
            // print str_replace('href="/','href="/',$node->html());

        });

        $calculator=$data0[0];

        if( Request::segment(1) =='ar'){

            $client = new Client();

            $crawler = $client->request('GET', 'https://sa.investing.com/tools/forex-pip-calculator');

            $data0=$crawler->filter('div.wrapper > section#leftColumn > div.calcToolContainer > form#calc_form > div.calcToolBottom > table.pipCalcResults')->each(function ($node) {
                return $node->html();
                // print str_replace('href="/','href="/',$node->html());

            });
            $calculator=$data0[0];

        }


        if( Request::segment(1) =='ar'){
            $title = "JMI brokers | حاسبة النقاط";
            $description="راقب مخاطر كل صفقة بدقة عن طريق تحديد القيمة لكل نقطة على حاسبة نقاط جي ام أي ,تتيح لك هذه الحاسبة حساب قيمة النقطة في حال الربح أو الخسارة";
            $keywords="حجم عقد اللوت,ما هي النقاط وكيف تعمل, حساب قيمة النقطة";
            return view('ar.cpanel.pip-calculator',compact('title','description','keywords','user','notifications_all','notifications_unseen','location','calculator'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Калькулятор баллов";
            return view('ru.cpanel.pip-calculator',compact('title','user','notifications_all','notifications_unseen','location','calculator'));
        }else{
            $title = "JMI Brokers | Pip Calculator";
            $description="Accurately monitor your risk per trade by determining the value per pip on JMI Brokers pip calculator.";
            $keywords="Pip Calculator, Pips, pip, lot";
            return view('cpanel.pip-calculator',compact('title','description','keywords','user','notifications_all','notifications_unseen','location','calculator'));
        }


    }


    public function forex_calculator()
    {



        Session::flash('pageType', 'tools');
        Session::flash('currentPage', 'forex-calculator');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();

        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | حاسبة الفوركس";
            return view('ar.cpanel.forex-calculator',compact('title','user','notifications_all','notifications_unseen','location'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Калькулятор форекс";
            return view('ru.cpanel.forex-calculator',compact('title','user','notifications_all','notifications_unseen','location'));
        }else{
            $title = "Control Panel | Forex Calculator";
            return view('cpanel.forex-calculator',compact('title','user','notifications_all','notifications_unseen','location'));
        }


    }



    public function calendar()
    {



        Session::flash('pageType', 'tools');
        Session::flash('currentPage', 'calendar');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();

        $economic_calendar=Economic_Calendar::where('year',date('Y'))->where('date_month',date("M"))->where('date_day',date("d"))->get()->all();

        if(isset($_GET['date'])){


            if($_GET['date']=='this-week'){

                $d = strtotime("today");
                $start_week = strtotime("last sunday midnight",$d);
                $end_week = strtotime("next saturday",$d);
                $start = date("Y-m-d",$start_week);
                $end = date("Y-m-d",$end_week);

                $period = new DatePeriod(
                    new DateTime($start),
                    new DateInterval('P1D'),
                    new DateTime($end)
                );
                $economic_calendar = new Collection();
                foreach ($period as $key => $value) {
                    $economic_calendar=$economic_calendar->merge(Economic_Calendar::where('year',$value->format('Y'))->where('date_month',date("M",$end_week))->where('date_day',$value->format('d'))->get()->all());
                }
            }


            if($_GET['date']=='last-week'){

                $d = strtotime("-1 week +1 day");
                $start_week = strtotime("last sunday midnight",$d);
                $end_week = strtotime("next saturday",$d);
                $start = date("Y-m-d",$start_week);
                $end = date("Y-m-d",$end_week);

                $period = new DatePeriod(
                    new DateTime($start),
                    new DateInterval('P1D'),
                    new DateTime($end)
                );
                $economic_calendar = new Collection();
                foreach ($period as $key => $value) {
                    $economic_calendar=$economic_calendar->merge(Economic_Calendar::where('year',$value->format('Y'))->where('date_month',date("M",$end_week))->where('date_day',$value->format('d'))->get()->all());
                }
            }

            if($_GET['date']=='next-week'){

                $d = strtotime("+1 week -1 day");
                $start_week = strtotime("last sunday midnight",$d);
                $end_week = strtotime("next saturday",$d);
                $start = date("Y-m-d",$start_week);
                $end = date("Y-m-d",$end_week);

                $period = new DatePeriod(
                    new DateTime($start),
                    new DateInterval('P1D'),
                    new DateTime($end)
                );
                $economic_calendar = new Collection();
                foreach ($period as $key => $value) {
                    $economic_calendar=$economic_calendar->merge(Economic_Calendar::where('year',$value->format('Y'))->where('date_month',date("M",$end_week))->where('date_day',$value->format('d'))->get()->all());
                }
            }


            if($_GET['date']=='this-month'){

                $d = strtotime("today");
                $start_week = strtotime("first day of this month",$d);
                $end_week = strtotime("last day of this month",$d);
                $start = date("Y-m-d",$start_week);
                $end = date("Y-m-d",$end_week);

                $period = new DatePeriod(
                    new DateTime($start),
                    new DateInterval('P1D'),
                    new DateTime($end)
                );
                $economic_calendar = new Collection();
                foreach ($period as $key => $value) {
                    $economic_calendar=$economic_calendar->merge(Economic_Calendar::where('year',$value->format('Y'))->where('date_month',date("M",$end_week))->where('date_day',$value->format('d'))->get()->all());
                }
            }


            if($_GET['date']=='last-month'){

                $d = strtotime("today");
                $start_week = strtotime("first day of last month",$d);
                $end_week = strtotime("last day of last month",$d);
                $start = date("Y-m-d",$start_week);
                $end = date("Y-m-d",$end_week);

                $period = new DatePeriod(
                    new DateTime($start),
                    new DateInterval('P1D'),
                    new DateTime($end)
                );
                $economic_calendar = new Collection();
                foreach ($period as $key => $value) {
                    $economic_calendar=$economic_calendar->merge(Economic_Calendar::where('year',$value->format('Y'))->where('date_month',date("M",$end_week))->where('date_day',$value->format('d'))->get()->all());
                }
            }


            if($_GET['date']=='next-month'){

                $d = strtotime("today");
                $start_week = strtotime("first day of next month",$d);
                $end_week = strtotime("last day of next month",$d);
                $start = date("Y-m-d",$start_week);
                $end = date("Y-m-d",$end_week);

                $period = new DatePeriod(
                    new DateTime($start),
                    new DateInterval('P1D'),
                    new DateTime($end)
                );
                $economic_calendar = new Collection();
                foreach ($period as $key => $value) {
                    $economic_calendar=$economic_calendar->merge(Economic_Calendar::where('year',$value->format('Y'))->where('date_month',date("M",$end_week))->where('date_day',$value->format('d'))->get()->all());
                }
            }

            if($_GET['date']=='today'){
                $economic_calendar=Economic_Calendar::where('year',date('Y'))->where('date_month',date("M"))->where('date_day',date("d"))->get()->all();
            }
            if($_GET['date']=='tomorrow'){
                $economic_calendar=Economic_Calendar::where('year',date('Y',strtotime("+1 days")))->where('date_month',date('M',strtotime("+1 days")))->where('date_day',date('d',strtotime("+1 days")))->get()->all();
            }

            if($_GET['date']=='yesterday'){
                $economic_calendar=Economic_Calendar::where('year',date('Y',strtotime("-1 days")))->where('date_month',date('M',strtotime("-1 days")))->where('date_day',date('d',strtotime("-1 days")))->get()->all();
            }
        }








        if( Request::segment(1) =='ar'){
            $title ="JMI brokers | الأجندة الأقتصادية";
            $description="تابع أهم وأحدث الأخبار والإصدارات التي تؤثر على الفوركس والأسهم والسلع بشكل يومي من خلال الأجندة الأقتصادية مع شركة جي ام أي";
            $keywords="	ساعات التداول في سوق العملات, ‎,XAU/USD سعر الصرف ‎أخبار الفوركس";
            return view('ar.cpanel.calendar',compact('title','description','keywords','user','notifications_all','notifications_unseen','economic_calendar'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Экономический календарь";
            return view('ru.cpanel.calendar',compact('title','user','notifications_all','notifications_unseen','economic_calendar'));
        }else{
            $title = "JMI brokers | Forex Calendar";
            $description="Track daily updated forex calendar news marking all events and releases affecting forex, stocks and commodities with JMI Brokers.";
            $keywords="news, Forex Calendar, Forex Numbers, economic calendar";
            return view('cpanel.calendar',compact('title','user','notifications_all','notifications_unseen','economic_calendar','description','keywords'));
        }



    }


    public function heatmap()
    {



        Session::flash('pageType', 'tools');
        Session::flash('currentPage', 'heatmap');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();



        $client = new Client();

        $crawler = $client->request('GET', 'https://www.investing.com/tools/currency-heatmap');

        $heatmap0=$crawler->filter('div.wrapper > section#leftColumn')->each(function ($node) {
            return $node->html();
            // print str_replace('href="/','href="/',$node->html());

        });
        $heatmap=$heatmap0[0];

        if( Request::segment(1) =='ar'){

            $client = new Client();

            $crawler = $client->request('GET', 'https://sa.investing.com/tools/currency-heatmap');

            $heatmap0=$crawler->filter('div.wrapper > section#leftColumn')->each(function ($node) {
                return $node->html();
                // print str_replace('href="/','href="/',$node->html());

            });

            $heatmap=$heatmap0[0];


        }
        if( Request::segment(1) =='ar'){
            $title = "JMI Brokers | خارطة الحرارة للعملات ";
            return view('ar.cpanel.heatmap',compact('title','user','notifications_all','notifications_unseen','location','heatmap'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Тепловая карта валют";
            return view('ru.cpanel.heatmap',compact('title','user','notifications_all','notifications_unseen','location','heatmap'));
        }else{
            $title = "JMI Brokers | FX heat map";
            $description="JMI Brokers FX (forex) heat map a quick visual for FX markets across various time frames-a tool presenting strengths of major currencies relative to others.";
            $keywords="FX heat map, Forex Heat map";
            return view('cpanel.heatmap',compact('title','description','keywords','user','notifications_all','notifications_unseen','location','heatmap'));
        }


    }





    public function post_password()
    {

        $input=Request::all();

        $session_user= Session::get('user');
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $this->validate(Request(), [
            'password' => 'required|min:8|max:40',
            'confirmpassword' => 'required|min:8|max:40|same:password',
        ]);
        if(Hash::check($input['currentpassword'], $user->password)) {

            $encpassword= Hash::make($input['password']);

            $user->password=$encpassword;
            if( $user->save() ){

                if( Request::segment(1) =='ar'){
                    return redirect('ar/cpanel/profile')->with('status-success', 'تم تغيير كلمة السر');
                }elseif( Request::segment(1) =='ru'){
                    return redirect('ru/cpanel/profile')->with('status-success', 'Пароль обновлен!');
                }else{
                    return redirect('en/cpanel/profile')->with('status-success', 'Password updated!');
                }

            }


        }else{


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/profile')->with('status-error', 'كلمة السر الحالية غير صحيحة');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/profile')->with('status-error', 'Неверный текущий пароль!');
            }else{
                return redirect('en/cpanel/profile')->with('status-error', 'Current Password Wrong !');
            }


        }




    }




    public function upload_documents()
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'documents');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $documents=website_accounts::find($user->id)->documents;

        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | رفع المستندات ";
            return view('ar.cpanel.documents',compact('title','user','notifications_all','notifications_unseen','location','documents'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Загрузить документы ";
            return view('ru.cpanel.documents',compact('title','user','notifications_all','notifications_unseen','location','documents'));
        }else{
            $title = "Control Panel | Upload Documents";
            return view('cpanel.documents',compact('title','user','notifications_all','notifications_unseen','location','documents'));
        }





    }


    public function post_upload_documents()
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'documents');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $input=Request::all();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $this->validate(Request(), [
            'document_type' => 'required|regex:/^[0-9]*$/|min:1|max:1',
            'document' => 'max:2048|mimes:jpeg,bmp,png,pdf,jpg',
            'document_description'=>'alpha_spaces'
        ]);
        $document=new Documents;
        $destinationPath='user_documents/user_documents/';
        //$filename = rand(1,1000000).time().'.'.$input['document']->getClientOriginalExtension();;
        $filename = rand(1,1000000).time().'.'.$input['document']->getClientOriginalExtension();
        $document->document='user_documents/'.$filename;
        $document->website_accounts_id=$user->id;
        $document->type=$input['document_type'];
        $document->description=$input['document_description'];
        $document->status=0;
        $document->save();
        Storage::disk('do')->putFileAs('user_documents', $input['document'], $filename);


        $notification=new Notifications;
        $notification->website_accounts_id=999999999;
        $notification->notification_status=0;
        $notification->notification=$user->email.'Has Uploaded New Document And Waiting Approval';
        $notification->notification_link='/spanel/website-accounts?&bymail='.$user->email.'&';
        $notification->save();



        $notification1=new Notifications;
        $notification1->website_accounts_id=$user->id;
        $notification1->notification_status=0;
        $notification1->notification='Your document has been uploaded successfully and waiting approval';
        $notification1->details='Your document has been uploaded successfully and waiting for approval';
        $notification1->notification_ar='تم رفع المستند الخاص بك بنجاح وفى انتظار الموافقة';
        $notification1->details_ar='تم رفع المستند الخاص بك بنجاح وفى انتظار الموافقة';

        $notification1->notification_ru='Ваш документ был успешно загружен и ожидает утверждения';
        $notification1->details_ru='Ваш документ был успешно загружен и ожидает утверждения';

        $notification1->notification_link='/cpanel/documents';
        $notification1->save();

        // Backup your default mailer
        $backup = Mail::getSwiftMailer();
        $data['title']=1;
        $data['name']='Admin';
        $data['details']=$user->email.' Documents have been loaded and waiting for approval';
        $subject=' Documents awaiting approval';
        Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
        //dd(' error');

        // Restore your original mailer
        Mail::setSwiftMailer($backup);



        if( Request::segment(1) =='ar'){
            return redirect('ar/cpanel/documents')->with('status-success', 'تم رفع المستند بنجاح وينتظر مراجعة الادارة');
        }elseif( Request::segment(1) =='ru'){
            return redirect('ru/cpanel/documents')->with('status-success', 'Документ успешно загружен и ожидает рассмотрения администраторами');
        }else{
            return redirect('en/cpanel/documents')->with('status-success', 'Your document has been uploaded successfully and waiting for approval');
        }





    }



    public function delete_documents($id)
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'documents');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $input=Request::all();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $document=Documents::where('id',$id)->where('website_accounts_id',$user->id)->get()->first();
        if($document->type !== 8){
            $last_document=$document->document;
            $path = substr($last_document, strpos($last_document, "assets/user_documents"));


            $document->delete();




            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your document has been deleted successfully.';
            $notification1->details='Your document has been deleted successfully.';

            $notification1->notification_ar='تم حذف المستند الخاص بك بنجاح.';
            $notification1->details_ar='تم حذف المستند الخاص بك بنجاح.';

            $notification1->notification_ru='Ваш документ был успешно удален.';
            $notification1->details_ru='Ваш документ был успешно удален.';

            $notification1->notification_link='/cpanel/documents';
            $notification1->save();




        }else{

        }



        if( Request::segment(1) =='ar'){
            return redirect('ar/cpanel/documents');
        }elseif( Request::segment(1) =='ru'){
            return redirect('ru/cpanel/documents');
        }else{
            return redirect('en/cpanel/documents');
        }





    }









    public function open_account()
    {




        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'open-account');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $documents=website_accounts::find($user->id)->documents;

        $live_accounts=website_accounts::find($user->id)->fx_accounts_live;
        $demo_accounts=website_accounts::find($user->id)->fx_accounts_demo;

        $customer_agreement=Documents::where('website_accounts_id',$user->id)->where('type',8)->where('status',1)->get()->first();

        if($user->country ==''){
            //
            if( Request::segment(1) =='ar'){
                return Redirect::to('/ar/cpanel/profile')->with('status-error', 'أكمل الملف الشخصى اولا');
            }elseif( Request::segment(1) =='ru'){
                return Redirect::to('/ru/cpanel/profile')->with('status-error', 'Сначала заполните свой профиль');
            }else{
                return Redirect::to('/en/cpanel/profile')->with('status-error', 'Complete your profile first');
            }
        }

        if(count($documents)< 1){
            if( Request::segment(1) =='ar'){
                return Redirect::to('/ar/cpanel/documents')->with('status-error', 'برجاء رفع المستندات اولا');
            }elseif( Request::segment(1) =='ru'){
                return Redirect::to('/ru/cpanel/documents')->with('status-error', 'Сначала загрузите свои документы');
            }else{
                return Redirect::to('/en/cpanel/documents')->with('status-error', 'Upload your documents first');
            }
        }

        if(count($documents)>0){
            $x=0;
            foreach ($documents as $docum) {
                if($docum->status==1){
                    $x++;
                }
            }
            if($x<1 ){
                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/documents')->with('status-error', 'يجب أن يكون لديك مستند واحد معتمد على الأقل');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/documents')->with('status-error', 'У вас должен быть хотя бы 1 утвержденный документ');
                }else{
                    return Redirect::to('/en/cpanel/documents')->with('status-error', 'You should have at least 1 approved document');
                }
            }
        }


        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | فتح حساب";
            return view('ar.cpanel.open-account',compact('title','user','notifications_all','notifications_unseen','location','live_accounts','demo_accounts','documents','customer_agreement'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Открыть учетную запись";
            return view('ru.cpanel.open-account',compact('title','user','notifications_all','notifications_unseen','location','live_accounts','demo_accounts','documents','customer_agreement'));
        }else{
            $title = "Control Panel | Open Account";
            return view('cpanel.open-account',compact('title','user','notifications_all','notifications_unseen','location','live_accounts','demo_accounts','documents','customer_agreement'));
        }





    }


    public function post_agreement()
    {

        $input=Request::all();
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $live_accounts=website_accounts::find($user->id)->fx_accounts_live;
        $demo_accounts=website_accounts::find($user->id)->fx_accounts_demo;
        $documents=website_accounts::find($user->id)->documents;

        $this->validate(Request(), [
            'signature' => 'required|min:10|max:80|regex:/^[a-zA-Z ]*$/',
        ]);

        $newfilename='Customer_Account_Agreement_'.rand(1,10000).time();



        $pdf=PDF::loadHTML('<html style="border: 2px dashed #4f81bd;">
      <head>
      <title>CUSTOMER ACCOUNT AGREEMENT</title>

      <style>
        *{font-weight: normal ;font-size: 14px;}
        .left{text-align: left;}
        h5{margin: 20px 0px 10px;}
        .head
        {

          background-color: #4f81bd;
          font-weight: bold;
          text-align: left;
          padding: 10px 15px;
          color: white;
          border-radius: 10px;
          width: 275px;
          font-size: 20px;
        }
        #logo img{width:50%;max-width: 300px;margin-top: 10px;}
        .boldText
        {
          font-weight: bold;
          font-size: 16px;
        }
        .big{font-size: 16px;}
        .blue{color:#4f81bd;font-size: 16px;}
        hr{border-top: 2px dashed #4f81bd;width: 70%;border-bottom: 0px;margin: 40px auto;}
        .bold{font-weight: bold;}
        #bottomUl li{font-weight: bold; list-style-type: none;margin-top: 5px;}
        #bottomUl{padding: 0px;}
        li span , li span a{color: #4f81bd; font-weight: bold;}

          .content
     {
              background-image:url("/assets/m/img/new-4.jpg");
              background-repeat: no-repeat;
              background-attachment: fixed;
              background-position: center;
              position: fixed;
              top: 0px;
              right: 0px;
              bottom:0px;
              height:100vh;
              z-index:-1;
     }


     .header
     {
              position: absolute;

              left: 50px;
              right: 0px;
              top:0px;
              margin-bottom:50px;
     }
     .footer
           {
              position: absolute;

              left: 0px;
              right: 0px;
              bottom:0px;

           }
     .footer img
     {
         margin-right: 50px;
     }
   </style>
 </head>
 <body>

  <div class="content">

  </div>

  <div id="logo"> <img src="/assets/m/img/new-5.png"></div>

      <h4 class="head">Customer Account Agreement</h4>
      <p style="text-align:left;">

      <h5 class="boldText">JMI Brokers LTD is licensed broker from Vanuatu Financial Services Commission as Dealers in Securities under license number 15010</h5>
      <h5 class="blue">Risk Disclosure Statement<h5>
      <p class="big">Before engaging in the products offered by JMI Brokers LTD you should be aware of the risks
which may be involved in trading financial contracts for differences CFDs:
</p>


      <p class="blue">You should not enter into a transaction unless you fully understand:</p>

      <p>
      The nature and fundamentals of the transaction and the market underlying such transactions. <br />
      • The extent of  the economic risk to which you are exposed as a result of such transactions(and determine that such risk is
      suitable for you in light of your specific experience in relation to the transaction and your financial objectives,
      circumstances and resources). <br />
      • The legal terms and conditions for such transactions. You have the responsibility
      to fully understand the terms and conditions of the transactions to be undertaken, including, without limitation:<br />
      1. The terms as to price, term, and expiration date, restrictions on exercising an OTC and the terms material
      to the transaction. <br />
      2. Any terms describing risk factors, such as volatility, liquidity,
      and so on. <br />
      3. The circumstances under which you may become obliged to make or take delivery of a Leveraged
      foreign exchange transaction or Futures contracts.<br />
       The high degree of leverage that is often obtainable in
      trading of the products offered by JMI Brokers LTD can work against you as well as for you, due to fluctuating
      market conditions.<br />
       Trading in such instruments can lead to large losses as well as gains in response
      to a small market movement. If the market moves against you, you may not only sustain a total loss of your
      initial margin deposit, and any additional funds deposited with JMI Brokers LTD. to maintain your position,
      but you may also incur further liability to JMI Brokers LTD. You may be called upon to “top-up” your margin by
      substantial amounts at short notice to maintain your position, failing which JMI Brokers LTD may have to
      liquidate your position at a loss and you would be liable for any resulting loss. You may sustain substantial
      losses on a contract or trade if the market conditions move against your position. It is in your interest to fully
      understand the impact of market movements, in particular the extent of profit/loss you would be exposed to
      when there is an upward or down ward movement in the relevant rates and the extent of loss if you have to
      liquidate a position, if market conditions move against you. Under certain market conditions you may find it
      difficult or impossible to liquidate a position, to assess a fair price or assess risk exposure. This can happen, for
      example, where the market for a transaction is illiquid or where there is a failure in electronic or
      telecommunications systems, or where there is the occurrence of an event commonly known as “force majeure”.
      Placing contingent orders, such as “stop-loss” orders, will not necessarily limit your losses to the intended
      amounts, as it may be impossible to execute such orders under certain market conditions.<br />
      When placing a stop
      order or stop loss order, you must be aware that in certain market conditions you may be filled at a different
      price than initially requested. Because the prices and characteristics of over-the-counter transactions are
      individually negotiated and there is no central source for obtaining prices, there are in efficiencies in
      transaction pricing.<br />
       We consequently cannot and do not warrant that our prices or the prices we secure
      </p>

      <h5 class="blue">1.	TRADING AUTHORIZATION</h5>
      <p  >

      JMI Brokers is a financial company authorized and holds a Principals license from Vanuatu Financial Services Commission (VFSC) as “Dealers in Securities” to carry on the business of dealing in securities such as financial Contracts for differences. (“CFDs”) in commodities, equities, indices, and Currency pairs (Fx), etc under three Licenses classes (A, B, and C) as below:
      Class A : CFDs in currency pairs ( Fx). Class B: CFDs in Precious Metals.<br />
      Class C: CFDs in Commodities, equities, indices,etc
      All CFDs contracts are leveraged products and will be executed between you as principal and us as principal.<br />
      You shall be directly and personally responsible for performing your obligations under every transaction entered in to between us, whether you are dealing as principal directly or through an agent, or as agent for another person, and you shall indemnify us in respect of all liabilities, losses or costs of any kind or nature what so ever which may be incurred by us as a direct or in direct result of any failure by you to perform any such obligation.
      </p>

      <h5 class="blue">2.	APPLICABLE RULES AND REGULATIONS</h5>
      <p  >All orders entered for the purchase or sale of a Commodity Contract and all transactions in Commodity Contracts executed for Customer’s accounts shall be subject to the constitution, by Laws, rules, regulations, customs and usages (collectively “rules”) of the exchange or market, and its clearing house, if any, where such orders are directed or such transactions are executed and any applicable self- regulatory organization and to the rules and regulations promulgated there under (collectively “laws JMI Brokers LTD shall not be liable to Customer as a result of any action taken by JMI Brokers LTD or its agents in compliance with any of the foregoing rules or laws. This paragraph is solely for the protection and benefit of JMI Brokers LTD ,and any failure by JMI Brokers LTD or its agents to comply with any of the foregoing rules or laws shall not relieve Customer of any obligation under this agreement nor be construed to create rights under this agreement in favor of Customer against JMI Brokers LTD</p>

      <h5 class="blue">3.	CHARGES PAYABLE BY CUSTOMER.</h5>
      <p  >Customer agrees to pay (a) such commissions and service fees as JMI Brokers LTD may establish and charge from time to time; (b) the amount of any loss that may result from transactions by JMI Brokers LTD on Customer’s behalf, including any deficit balance; and(c) interest on any deficit balance and on any other amounts payable to JMI Brokers LTD under this agreement at the rate of three percent (3%) over the Prime rate in effect from time to time, or the maximum rate allowed by law, which ever is less.</p>

      <h5 class="blue">4.	RISK OF LOSS</h5>
      <p  >All transactions effected for Customer’s accounts and all fluctuations in the market prices of the Commodity Contracts carried in Customer’s accounts are at Customer’s sole risk and Customer shall be solely liable under all circumstances. By execution of this agreement, Customer warrants that Customer is willing and financially able to sustain any such losses. JMI Brokers LTD is not responsible for the obligations of the persons with whom Customer’s transactions are effected, nor is JMI Brokers LTD responsible for delays in transmission, delivery or execution of Customer’s orders due to malfunctions of communications facilities or other causes.</p>



      <p  >JMI Brokers LTD shall not be liable to Customer for the loss of any margin deposits which is the direct or indirect result of the bankruptcy, in solvency, liquidation, receivership, custodianship or assignment for the benefit of creditors of any bank, another clearing broker, exchange, clearing organization or similar entity.</p>

      <h5 class="blue">5.	TRADING RECOMMENDATIONS</h5>
      <p  >Customer acknowledges that any trading recommendations and market or other information</p>
      <p  >Communicated to Customer by JMI Brokers LTD , although based upon information obtained from sources Believed by JMI Brokers LTD to be reliable, may be incomplete, may not be verified, may differ from advice given to other customers, and may be changed without notice to Customer. Customer understands JMI Brokers LTD  or one or more of its affiliates may have apposition in and buy or sell Commodity Contracts which are the subject of information or recommendations furnished to Customer and that these positions and transactions of JMI Brokers LTD or any affiliates may not be consistent with are there commendations furnished to customer.</p>
      <p  >JMI Brokers LTD makes no representation or warranty with respect to the tax consequences of customer transactions</p>

      <h5 class="blue">6.	INDEMNIFICATION</h5>
      <p  >Customer hereby agrees to indemnify JMI Brokers LTD and hold JMI Brokers LTD harmless from any liability, cost or expense (including attorneys’ fees and expenses and any fines or penalties imposed by any governmental agency, contract market, exchange, clearing organization or other self-regulatory body) which JMI Brokers LTD may incur or be subjected to with respect to Customer’s account or any transaction or position there in. Without limiting the generality of the foregoing, Customer agrees to reimburse JMI Brokers LTD on demand for any cost of collection incurred by JMI Brokers LTD in collecting any sums owing by Customer under this agreement and any cost incurred by JMI Brokers LTD in successfully defending against any claims asserted by Customer, including all attorneys’ fees, interest and expenses.</p>

      <h5 class="blue">7.	RECORDING</h5>
      <p  >Customer understands that all conversations regarding Customer’s accounts, orders between Customer and JMI Brokers LTD maybe recorded
      by JMI Brokers LTD and Customer irrevocably consents to such recordings and waives any right to object to JMI Brokers LTD ’s use of such recordings in any proceeding or as JMI Brokers LTD otherwise deems appropriate.</p>

      <h5 class="blue">8.	FOREIGN CURRENCY</h5>
      <p  >If any transaction for Customer’s accounts is effected on any exchange or in any market on which transactions are settled in a foreign currency, any profit or loss arising as a result of a fluctuation in the rate of exchange between such currency and the United States Dollar shall be entirely for Customer’s account and at Customer’s sole risk. JMI Brokers LTD is hereby authorized to convert funds in Customer’s accounts in to and from such foreign currency at rates of exchange prevailing at the banking and other institutions with which JMI Brokers LTD normally conducts such business transactions.</p>



      <h5 class="blue">9.	MARGIN REQUIREMENTS.</h5>
      <p  >Customer agrees to maintain at all times without demand from JMI Brokers LTD margin requirements for the positions in the Customer’s account (s). Customer will at all times maintain such margin or collateral for Customer’s account (s) as requested from time to time by JMI Brokers LTD (which requests maybe greater than exchange and clearing house requirements). Margin deposits shall be made by wire transfer of immediately available funds, or by such other means as JMI Brokers LTD may direct, and shall be deemed made when received by JMI Brokers LTD.</p>
      <p  >JMI Brokers LTD failure at anytime to call for a deposit of margin shall not constitute a waiver of JMI Brokers LTD rights to do so at anytime there after, nor shall it create any liability of JMI Brokers LTD to Customer.</p>

      <h5 class="blue">10.	LIQUIDATION OF POSITIONS.</h5>
      <p  >In the event that (a) Customer shall fail to timely deposit or maintain margin or any amount
      hereunder; (b) Customer (if an individual) shall die or be judicially declared incompetent or (if an entity) shall be dissolved or otherwise terminated; (c) a proceeding under the Bankruptcy Act, an assignment for the benefit of creditors, or an application for a receiver, custodian, or trustee shall be filed or applied for by or against Customer;(d)attachment is levied against Customer’s
      account; (e) the property deposited as collateral is determined by JMI Brokers LTD in its sole discretion, regardless of current market quotations, to be in adequate to properly secure the account; or (f) at anytime JMI Brokers LTD
      deems it necessary for its protection for any reason whatsoever, JMI Brokers LTD may, in the manner it deems appropriate, close out Customer’s open positions in whole or in part, sell any or all of Customer’s property held by JMI Brokers LTD , buy any securities, Commodity Contracts, or other property for Customer’s account, and may cancel any outstanding orders and commitments made by JMI Brokers LTD on behalf of Customer. Such sale, purchase or cancellation maybe made at JMI Brokers LTD
      discretion without advertising the same and without notice to Customer or his personal representatives and without prior tender, demand for margin or payment, or call of any kind upon
      Customer. JMI Brokers LTD may purchase the whole or any part there of free from any right of red emption. It is understood that a prior demand or call or prior notice of the time and place of such sale or purchase shall not be a waiver of JMI Brokers LTD right to sell or buy without demand or notice as here in provided. Subject to applicable laws and rules, and in order to prevent non-permitted trading in debit/deficit accounts, profits on any trades executed without JMI Brokers LTD’s express permission, for a Customer account that is debit/deficit at the time the order is placed ,shall before JMI Brokers LTD account if JMI Brokers LTD in its discretion so elects. Losses on any such trades shall be jointly and severally borne by the Introducing Broker, if any, and the Customer. Customer shall remain liable for and pay JMIBrokers LTD the amount of any deficiency in any account of Customer with JMI Brokers LTD resulting from any transaction described above. Our determination of the current market value and the amount of additional and/or variation margin shall be conclusive and shall not be challenged by the Customer.</p>


      <h5 class="blue">11.	TRADING LIMITATIONS</h5>
      <p  >JMI at any time, in its sole discretion, may limit the number of positions which Customer may maintain or acquire through JMI Brokers LTD , and JMI Brokers LTD is under no obligation to effect any transaction for Customer’s accounts which would create positions in excess of the limit which JMI Brokers LTD has set.</p>
      <p  >Customer agrees not to exceed the position limits established for any contract market, whether
      acting alone or with others, and to promptly advise JMI Brokers LTD if Customer is required to file any reports on positions. </p>

      <h5 class="blue">12.	EXERCISES AND ASSIGNMENTS</h5>
      <p  >With regard to options transactions, Customer understands that some exchange clearing houses have established exercise requirements for the tender of exercise instructions and that options will become worth less in the event that Customer does not deliver instructions by such expiration times. At least two business days prior to the first notice day in the case of long positions in futures or forward contracts, and at least two business days prior to the last trading day in the case of short positions in open futures or forward contracts or long and short positions in options, Customer agrees that Customer will either give JMI Brokers LTD instructions to liquidate or make or take delivery under such futures or forward contracts, or to liquidate, exercise, or allow the expiration of such options, and will deliver to JMI Brokers LTD sufficient funds and/or any documents required in connection with exercise or delivery. If such instructions or such funds and/or documents, with regard to option transactions, are not received by JMI prior to the expiration of the option, JMI Brokers LTD may permit an option to expire. Customer also understands that certain exchanges and clearing houses automatically exercise some “in-the -money” options unless instructed otherwise, Customer acknowledges full responsibility for taking action either to exercise or to prevent exercise of an option contract, as the case maybe JMI Brokers LTD is not required to take any action with respect to an option, including without limitation any action to exercise a valuable option contract prior to its expiration or to prevent the automatic exercise of an option, except upon Customer’s express instructions. Customer further understands that JMI Brokers LTD also has established exercise cut-off times which maybe different from the times established by the contract markets in clearing houses. In the event that timely exercise and assignment instructions are not given, Customer hereby agrees to waive any and all claims for damage or loss Customer might have against JMI Brokers LTD arising out of the fact that an option was or was not exercised. Customer understands that JMI Brokers LTD randomly assigns exercise notices to Customers, that all short option positions are subject to assignment at anytime, including positions established on the same day that exercises areas signed, and that exercise assignment notices are allocated randomly from among all Customers’ short option positions which are subject to exercise.</p>


      <h5 class="blue">13.	SECURITY AGREEMENT</h5>
      <p  >
      (a)        All funds, securities, and other property in Customer’s accounts or otherwise now orat any time in the future held by JMI Brokers LTD for any purpose, including safekeeping, are subject to a security interest and general lien in JMI Brokers LTD ’s favor to secure any indebtedness at any time owing from Customer to JMI Brokers LTD, including any indebtedness resulting from any guarantee of a transaction or account by Customer or Customer’s assumption of joint responsibility for any transaction or account.
      (b)        Customer hereby grants to JMI Brokers LTD the right to pledge, repledge, or invest either separately or with the property of other Customers, any securities or other property held by JMI Brokers LTD for the account of Customer or as collateral therefore, including without limitation to any exchange or clearing house through which trades of Customer are executed. JMI Brokers LTD shall be under no obligation to pay to Customer or account for any interest income, or benefit derived from such property and funds or to deliver the same securities or other property deposited with or received by JMI Brokers LTD for Customer. JMI Brokers LTD may deliver securities or other property of like or equivalent kind or amount; JMI Brokers LTD shall have the right to offset any amounts it holds for or owes to Customer against any debts or other amounts owed by Customer to JMI Brokers LTD
      From time to time and without prior notice to Customer, JMI Brokers LTD may transfer interchangeably between and among any account of Customer maintained at JMI Brokers LTD any of Customer’s funds (including segregated funds), securities, or other property for purposes of margin, reduction or satisfaction of any debit balance, or any reason which JMI Brokers LTD deems appropriate. Within areas on able time after any such transfer, JMI Brokers LTD will confirm the transfer in writing to Customer.
      <br />
      </p>

      <h5 class="blue">14.	AUTHORITY TO TRANSFER ACCOUNTS</h5>
      <p  >
      Until further notice in writing from the undersigned, JMI Brokers LTD is hereby authorized at any time, withoutprior notice to the undersigned, to transfer from any account or accounts of the undersigned maintained at JMI Brokers LTD or any exchange member through which JMI Brokers LTD clears customer transactions, such excess funds, securities, and other property
      of the undersigned as in JMI Brokers LTD ’s sole judgment maybe required for margin in any other such account or accounts or to reduce or satisfy any debit balances in any other account or accounts provided such transfer or transfers comply with relevant governmental and exchange rules and regulations applicable to the same.<br />
      JMI Brokers LTD is further authorized to liquidate any property held in any such account or accounts of the undersigned whenever, in JMI Brokers LTD ’s sole judgment, such liquidation is necessary in order to effectuate the above authorized transfer and application of property. With in areas on able time after making any such transfer or application, JMI Brokers LTD will Confirm the same in writing to the under signed.

      </p>

      <h5 class="blue">15- Monthly Rebate</h5>
      <p  >For all both offers whether its offer number 1 Rebate + Bonus or offer number 2 1 pip back No bonus the value of Monthly Rebate should not exceed the value of original fund deposited at that month. Therefore the Maximum monthly rebate in any month is equal to sum of monthly deposits excluding bonus or any other promotions.</p>


      <h5 class="blue">16.	NOTICES AND COMMUNICATIONS</h5>
      <p  >Customer shall make all payments, except with regard to wire transfers discussed above, and deliver all notices and communications to the office of JMI Brokers LTD . All communications JMI Brokers LTD to Customer maybe sent to the Customer at the address indicated on the Customer Account Application or to such other address as Customer hereafter directs in writing. Confirmations of trades, statements of account, margin calls, and any other written notices shall be binding on Customer for all purposes,
      unless Customer calls any error there into JMI Brokers LTD ’s attention in writing (a) prior to the start of business on the business day next following notification, in the case of margin calls and reports of executions and (b) within 24 hours of delivery to Customer, in the case of statements of account and any written notices (other than trade confirmations or margin calls)or demands. None of these provisions, however, will prevent JMI Brokers LTD upon discovery of any error or omission, from correcting it. The parties agree that such errors, whether resulting in profit or loss, will be corrected in Customer’s account, will be credited or debited so that it is in the same position it would have been in if the error had not occurred. Whenever a correction is  made, JMI Brokers LTD will promptly make written or oral notification to Customer. All communications, whether by mail, telex, courier, telephone, telegraph, messenger, facsimile, or otherwise (in the case of mailed notices), or communicated (in the case of telephone notices), sent to Customer at Customer’s or agent’s address (or telephone number) as given to JMI Brokers LTD from time to time shall constitute personal delivery to Customer whether or not actually received by Customer, and Customer hereby waives all claims resulting from failure to receive such communications.</p>

      <h5 class="blue">17.	PRINTED MEDIA STORAGE</h5>
      <p  >Customer acknowledges and agrees that JMI Brokers LTD may reduce all documentation evidencing Customer’s account, including the original signature documents executed by Customer in the opening of such Customer’s account with JMI Brokers LTD , utilizing a printed media storage device such as micro-fiche or optical disc imaging. Customer agrees to permit the records stored by such printed media storage method to serve as a complete, true and genuine record of such Customer’s account documents and signatures.</p>

      <h5 class="blue">18.	REPRESENTATIONS</h5>
      <p  >Customer represents that (a) (if an individual) he is of the age of majority, of sound mind, and authorized to open accounts and enter into this agreement and to effectuate transactions in Commodity Contracts as contemplated hereby; (b) (if an entity) Customer is validly existing and empowered to enter into this agreement and to effect transactions in Commodity Contracts as contemplated hereby; (c) the statements and financial information contained on Customer’s Account Application submitted herewith (including any financial statement there with)are true and correct; and (d) no person or entity has any interesting or control of the account to which this agreement pertains except as disclosed in the Customer’s Account Application. Customer further
      represents that, except as here to fore disclosed to JMI Brokers LTD in writing, he is not an officer or employee of any exchange, board of trade, clearing house, or an employee or affiliate of any futures commission merchant, or an introducing broker, or an officer ,partner, director, or employee of any securities broker or dealer. Customer agrees to furnish appropriate financial statements to JMI Brokers LTD to disclose to JMI Brokers LTD any material changes in the financial position of Customer and to furnish promptly such other information concerning Customer as JMI Brokers LTD reasonably requests.</p>


      <h5 class="blue">19.	INTRODUCING BROKER</h5>
      <p  >Customer acknowledges that JMI Brokers LTD is not responsible for the conduct, representations and statements of the introducing broker or its associated persons in the handling of Customer’s account. Customer agrees to waive any claims Customer may have against JMI Brokers LTD and to indemnify and hold JMI Brokers LTD harmless for any actions or omissions of the introducing broker or its associated persons.</p>

      <h5 class="blue">20.	CONFLICTS OF INTEREST</h5>
      <p  > JMI Brokers LTD may execute CFDs for Customer’s account (s) either as principal or broker.As broker, JMI Brokers LTD will execute transaction similar to Customer’s transaction with another market participant in the financial market. As principal JMI Brokers LTD may not execute transaction similar to
Customer in the financial market and hold the opposing transaction in JMI Brokers LTD inventory of CFDs.<br />
As a result of acting as principal Customer should realize that JMI Brokers LTD maybe acting as your counter party and that JMI Brokers LTD maybe placed in such a position that a conflict of duty occurs.
JMI Brokers LTD may execute Commodity Contracts for Customer’s account (s) either as principal or broker. As broker, JMI Brokers LTD will execute transaction similar to Customer’s transaction with another market participant in the financial market. As principal JMI Brokers LTD may not execute transaction similar to Customer in the financial market and hold the opposing transaction in JMI Brokers LTD inventory of Commodity Contracts. As a result of acting as principal Customer should realize that JMI Brokers LTD maybe acting as your counter party and that JMI Brokers LTD maybe placed in such a position that a conflict of duty occurs. JMI Brokers LTD , its Associates or other persons connected with JMI Brokers LTD may have an interest, relationship or arrangement that is material in relation to any Commodity Contract effected under this Agreement. By entering into this Agreement the Customer agrees that J JMI Brokers LTD may transact such business without prior reference to the Customer. In addition, JMI Brokers LTD may provide advice and other services to third parties whose interests maybe in conflict or competition with the Customer’s interests JMI Brokers LTD , its Associates and the employees of any of them may take positions opposite to the Customer or maybe in competition with the Customer to acquire the same or a similar position. JMI Brokers LTD will not deliberately favor any person over the customer but will not be responsible for any loss which may result from such competition <br />
JMI Brokers LTD, its Associates or other persons connected with JMI Brokers LTD may have an interest, relationship or arrangement that is material in relation to any CFDs effected under this Agreement. By entering into this Agreement the Customer agrees that JMI Brokers LTD may transact such business without prior reference to the Customer. JMI Brokers LTD , its Associates and the employees of any of them may take positions opposite to the Customer or maybe in competition with the Customer to acquire the same or a similar position. JMI Brokers LTD will not deliberately favor any person over the customer but will not be responsible for any loss which may result from such competition</p>

      <h5 class="blue">21.	BINDING EFFECT OF AGREEMENT; MODIFICATIONS</h5>
      <p  >This agreement shall be binding upon and inure to the benefit of JMI Brokers LTD ,its successors and assigns, and Customer’s heirs, executors, administrators, legatees, successors, personal representatives and assigns.
      Except as provided in paragraph 2, no change in or waiver of any provision of this agreement shall be binding unless it is in writing, dated subsequent to the date hereof, and signed by the party intended to be bound. No agreement or understanding of any kind shall be binding upon JMI Brokers LTD unless it is agreed to in writing, accepted and signed by an authorized officer.</p>

      <h5 class="blue">22.	FORCE MAJEURE EVENTS</h5>
      <p class="bold">We may, in our reasonable opinion, determine that an emergency or an exceptional market condition exists (a “Force Majeure Event”). A Force Majeure Event shall include, but is not limited to, the following:</p>
      <li>	Any act, event or occurrence (including without limitation any strike, riot or commotion, interruption or power supply or electronic or communication equipment failure) which, in our opinion, prevents us from maintaining an orderly market in one or more of the investments in respects of which we ordinarily deal in CFDs

      <li>	The suspension or closure of any market or the abandonment or failure of any event upon which we base, or to which we in any way relate, our quote, or the imposition of limits or special or unusual terms on the trading in any such market or on any such event;


      <li>	The occurrence of an excessive movement in the level of any CFDs and/or the
      underlying market or our anticipation (acting reasonably) of the occurrence of such movements.</li>

      <p class="left ">If we determine that a Force Majeure Event exists we may in our absolute is creation without notice and at any time take one or more of the following steps:</p>

      <li>	Increase your deposit requirements; close any or all of your open CFDs at	such closing level as we reasonably believe to be appropriate.</li>
      <li>	Suspend or modify the application of all or any of the terms of this agreement.</li>
      to the extent that the Force Majeure Event  makes  it  impossible or impracticable for us to	comply with the term or terms in question;
      <li>	OR alter the last time for trading for particular CFDs.</li>


      <h5 class="blue">23.	HEADINGS</h5>
      <p class="left ">impossible or impracticable for us to comply with the term or terms in question OR alter the last time for trading for particular CFDs.</p>
      <p class="left ">The headings of each provision are for descriptive purposes only and shall not be deemed to modify or qualify any of the rights or obligations set forth in each provision.</p>

      <h5 class="blue">24.	GOVERNING LAW</h5>
      <p class="left ">This agreement shall be governed by the laws of Republic of Vanuatu  , regardless of form, arising out of transactions under this agreement maybe brought by customer more than three months after the cause of action arose.</p>

      <h5 class="blue">25.	ACCEPTANCE OF AGREEMENT</h5>
      <p class="left ">This agreement shall constitute an effective contract between JMI and Customer upon acceptance by an authorized officer of JMI.</p>

      <h5 class="blue">26.	MULTIPLE ACCOUNTS</h5>
      <p class="left ">Customer agrees that JMI Brokers LTD may, from time to time, change the account number assigned to any account covered by this agreement, and that this agreement shall remain in full force and effect.</p>
      <p class="left ">Customer agrees further that this account, if closed and reopened, as well as all additional accounts opened in Customer’s name at JMI, shall be covered by this same agreement with the exception of any account for which a new customer agreement is signed.</p>

      <h5 class="blue">27.	Deposit and Withdraw policy</h5>
      <p class="left ">Trading in any investment opportunity that may generate profit requires JMI Brokers LTD customers to depositmoney on their online account. Profits may be withdrawn from the online account.</p>
      <h6 class="blue">1. Deposits</h6>
      <p class="left ">Deposit to JMI Brokers LTD should be made from a source (e.g. bank account, payment system,
        credit/debit card,etc).<br />
        Client should provide card/bank account ownership confirmation to avoid payments from 3rd parties.
        For example, if client want to deposit using card, the card scan copy or card photo should be provided
        (read moreabout verification and AML policy). If client don’t comply with this policy, deposit can be
        rejected.<br />
        Please note that client’s account JMI Brokers LTD can be deposited with the amount different from what
        was sent because of the commission. The Company does not charge any commission but it can be charged
        by payment system orbank.</p>

      <h6 class="blue">2. Withdrawals</h6>
      <p class="left ">According to generally acceptable AML rules and regulations, client should withdraw funds only through
the samebank account or credit/debit card or payment system account that was used to deposit the
funds and the same currency.<br />
In addition, when you deposit or withdraw money for trading purposes using alternative payment
methods, you should be aware that additional fees and restrictions may apply.<br />
Without derogating of the foregoing, JMI Brokers LTD may execute withdrawals to a different facility
than the oneused for the deposit, subject to Anti Money-Laundering regulations.<br />
Additional information and documents may be required to present from client during withdrawing process.<br />
Cash is the only type of funds that can be withdrawn by the client and can’t be withdrawn to any third party.
Third Party means any persons or entities other than the one who opened the account and deposited into client
account.
</p>

      <h6 class="blue">3. Non-Deposited Funds</h6>
      <p class="left ">Funds appearing on Clients’ account may include agreed or voluntary bonuses or any other sums not
directly deposited by the Client or gained from trading on account of actually deposited funds (“NonDeposited Funds”). JMI Brokers LTD may provide bonuses which can be used according to the Trader
Agreement. All bonus funds is fully belong to JMI Brokers LTD broker and considered as a Non-Deposited
(credited) Funds and can be canceled atany time.
</p>

      <h6 class="blue">4. Withdrawing process</h6>
      <p class="left ">To withdraw your funds, you should follow several steps and rules below:
Log in to your personal account.<br />
Open withdraw tab and withdraw your funds from the trading account via your requested
method.Open withdraw funds tab and fill out the fields.<br />
If the additional documents are required, we contact you within one working day. Withdrawing funds to bank
accounts are possible only after depositing money through a bank.<br />
The Company does not charge any commission. Commission based on the beneficiary’s bank.<br />
Withdrawing process will be completed within 3-5 business days from the moment of accepting
withdrawing request by the Company from the Client.<br />
Attention! JMI Brokers LTD, in accordance with international laws on combating terrorist financing andmoney
laundering, does not accept payments from third parties and payments to third parties are not carried out.
JMI Brokers LTD is not liable in case of 3rd parties delays, who are not related to the
company.Bank transfer takes 3-5 banking days under normal conditions.<br />
The JMI Brokers LTD company processes withdrawals to the Visa, MasterCard, China Union Pay Cards
within 1business days. But please note that under normal conditions payments go up to 6 banking days.
</p>

      <h6 class="blue">5. Additional Terms</h6>
      <p class="left ">Please note this policy cannot be exhaustive, and additional conditions or requirements may apply at any
time due toregulations and policies, including those set in order to prevent money laundering. Please note
any and all usage of the site and services is subject to the Terms and Conditions, as may be amended from
time to time by JMI Brokers LTD, at its sole discretion.</p>


      <p class="left "></p>


      <h5 class="blue">28.	ASSIGNMENT</h5>
      <p class="left ">JMI may assign Customer’s account to another registered futures commission merchant by notifying Customer of the date and name of the intended assignee ten (10) days prior to the assignment. Unless Customer objects to the assignment in writing prior to the scheduled date for assignment, the assignment will be binding on Customer.</p>

      <h5 class="blue">29.	CUSTOMER ACKNOWLEDGMENTS AND SIGNATURE</h5>
      <p class="left ">Customer hereby understands the Customer Account Agreement and consents and agrees to all of the terms and conditions of the agreement set forth above. Customer acknowledges that trading in Commodity Contracts is speculative, involves a high degree of risk and is appropriate only for persons who can assume risk of loss in excess of their margin deposits.</p>
      <br />

      <h5 class=" left">Online Access Agreement</h5>

      <p  >This agreement sets forth the terms and conditions under which we, JMI Brokers LTD ,shall permit you to have access to one or more terminals, including terminal access through your internet browser, for the electronic transmission of orders and \ or transactions, for your
      accounts with us. </p>
      <p class="left ">This agreement also sets forth the terms and conditions under which we shall permit you electronically to monitor the activity, orders and\or transactions in your account (collectively, the “Online Service”). For purposes of this Agreement the term “Online Service” includes all software and communication links, and in consideration thereof, Customer agrees to the following:<p  >

      <h5 class="blue">1.	LICENSE GRANT AND RIGHT OF USE</h5>
      <p  >By this Agreement, where we are supplying you with software for use with the Online Service,
      you may use the software solely for your own internal business purposes. Neither the software not the Online Service maybe used to provide third party training or as a service bureau for any third parties. You agree to use the Online Service and the software strictly in accordance with the terms and conditions of JMI Brokers LTD Customer Account Agreement, as amended from time to time. You also agree to be bound by any rules, procedures and conditions established by JMI Brokers LTD concerning the use of the Online Service provided by JMI Brokers LTD

      <h5 class="blue">2.	ACCESS AND SECURITY</h5>
      <p  >The Online Service maybe used to transmit, received and confirms execution of orders, subject to prevailing market conditions and applicable rules and regulations.</p>
      <p class="left "> JMI Brokers LTD consent to your access and use in reliance upon your having adopted procedures to prevent unauthorized access to and use of the Online Service, and in any event, you agree to any financial liability for trades executed through the Online Service. You acknowledge, represent and warrant that:</p>
      <li>A)	You have received a number, code or other sequence which provides access to the Online Service (the “Password”).</li>
      <li>B)	You are the sole and exclusive owner of the password.</li>
      <li>C)	You are the sole and exclusive owner of any identification number or Login number(the “Login”). </li>


      <li>D)	You accept full responsibility for use and protection of the Password and the Login as well as or any transaction occurring in account opened, held or accessed through the Login and \ or Password. You accept responsibility for the monitoring of your account(s).</li>
      <li>You will immediately notify JMI Brokers LTD in writing if you become aware of any of the following:</li>

      <li>A)	Any loss, theft or unauthorized use of your Password(s), Login and\or account number(s).</li>
      <li>B)	Any failure by you to receive a massage indicating that an order was received and\or executed.</li>
      <li>C)	Any failure by you to receive an accurate confirmation of an execution.</li>
      <li>D)	Any receipt of confirmation of an order and\or execution which you did not place.</li>
      <li>E)	Any inaccurate information in your account balances, positions, or transaction history.</li>

      <h5 class="blue">3.	RISKS OF ONLINE TRADING</h5>
      <p  >Your access to the Online Service, or any portion thereof, maybe restricted or unavailable during periods of peak demands, extreme market volatility, systems upgrades or other reasons.</p>
      <p  >JMI Brokers LTD makes no express or implied representations or warranties to you regarding the usability, condition or operation thereof. We do not warrant that access to or use of the Online Service will be uninterrupted or error free or that the Online Service will meet any particular criteria of performance or quality. Under no circumstances including negligence, shall JMI Brokers LTD or anyone else involved in creating, producing, delivering or managing that Online Service be liable for any direct, indirect incidental, special or consequential damages that result from the use of or inability to use the Online Service, or out of any breech of any warranty, including, without limitation, those for business interruption or loss of profits. You expressly agree that your use of the Online Service is of your sole risk, you assume full responsibility and risk of loss resulting from use of, or materials obtained through, the Online Service, neither we nor any of our directors, officers, employees ,agents, contractors, affiliates, third party vendors, facilities, information providers, licensors, exchanges, clearing organizations or other suppliers providing data, information, or services, warrant that the Online Service will be uninterrupted or error free; nor do we make any warranty as to the results that maybe obtained from the use of the Online Service or as to the timeliness, sequence, accuracy, completeness, reliability or content of any information, service, or transaction provided through the Online Service. In the event that your access to the Online Service, or any portion thereof, is restricted unavailable, you agree to use other means to place your orders or access information, such as calling JMI Brokers LTD representative. By placing an order through the Online Service, you acknowledge that your order may not be reviewed by a registered representative prior to execution, you agree that JMI Brokers LTD is not liable to you for any losses, lost opportunities or increased commissions that may result from your inability to use the Online Service to place order or access information.</p>


      <h5 class="blue">4.	MARKET DATA AND INFORMATION</h5>
      <p  >Neither we nor any provider shall be liable in any way to you or to any other person for: a) Any inaccuracy, error or delay in, or omission of any such data, information or message or the transmission or delivery of any such data, information or message; or b) Any loss or damage arising from or occasioned by any such inaccuracy, error, delay, omission, non-performance, interruption in any such data, information or message, due to either to any negligent act or
      omission or to any condition of force majeure or any other cause , whether or not within our or any provider’s control. We shall not be deemed to have received any order or communication transmitted electronically by you until we have actual knowledge of such order or communication</p>

      <h5 class="blue">5.	ADDITIONAL IMPORTANT INFORMATION AND DISCLAIMERS REGARDING EXPERT ADVISORS</h5>
      <p  >The expert advisors are intended merely as a tool for implementing technical ideas that can be incorporated into a personally designed trading strategy or system for experienced traders only. No support, technical, advisory or otherwise, is offered by JMI Brokers LTD in their usage. Use of the Expert Advisors is entirely at your own risk and you acknowledge & understand that JMI Brokers LTD make no warranties or representations concerning the use of Expert Advisors and that JMI Brokers LTD . Does not, by implication or otherwise, endorse or approve of the use of the Expert Advisors & shall not be responsible for any loss to you occasioned by their usage.</p>

      <h5 class="blue">6.	REPRESENTATIONS</h5>
      <p  >You acknowledge that from time to time, and for any reason, the Online Service may not be operational or otherwise unavailable for your use due to servicing, hardware malfunction, software defect, service or transmission interruption or other cause, and you agree to hold us and any provider harmless from liability of any damage which results from the unavailability of the Online Service. You acknowledge that you have alternative arrangements which will remain in place for the transmission and execution of your orders, in the event, for any reason, circumstances prevent the transmission and execution of all, or any portion of, your orders through the Online Service. You represent and warrant that you are fully authorized to inter this Agreement and under no legal disability which prevent you from trading and that you are & shall remain in compliance with all laws, rules and regulations applicable to your business. You agree that you are familiar with and will abide by any rules or procedures adopted by us and any provider in connection with use of the Online Service & you have provided necessary training in its use. You shall not (and shall not permit any third party) to copy, use analyze, modify, decompile, disassemble, reverse engineer, translate or convert any software provided to you in connection with use of the Online Service or distribute the software or the Online Service to any other third party.</p>

      <h5 class="blue">7.	TERMINATION</h5>
      <p  >We may, at our sole discretion, terminate or restrict your access to the Online Service and may terminate this Agreement at any time. Upon termination, any software license granted to you herein shall automatically terminate.</p>


      <h5 class="blue">8.	INDEMNITY</h5>
      <p  >You agree to indemnify & hold harmless us & each provider & their respective principles, Affiliates &agents from and against all claims, demands, proceedings, suits and all losses (direct,
      indirect or otherwise), liabilities costs and expenses (including attorney fees and disbursements),paid in settlement, incurred or suffered by us and\or a providers and\or our or their respective principals, affiliates & agents arising from or relating to your use of the Online Service or the transactions contemplated hereunder. This indemnity provision shall survive termination of this Agreement.</p>

      <h5 class="blue">9.	MISCELLANEOUS</h5>
      <p  >You may not amend the terms of this Agreement. We may amend the terms of this Agreement upon notice to you (including electronic delivery). By continued access to and use of the Online Service, you agree to any such amendments to this Agreement. This Agreement us the entire Agreement between the parties relating to the subject hereof, and, except with respect to the Customer Account Agreement between the parties, all prior negotiations and understandings between the parties, whether written or oral, are hereby merged into this Agreement. Nothing in this Agreement shall be deemed to supersede or modify a party’s right and obligations under the Agreement</p>

      <p  style="display:none;">* JMI Brokers LTD will not cover any profits or losses that may occur in any client account if market slip up or down more then 300 pips in 24 hours.</p>
      <hr>
      <h5 style="font-weight: bold; display: flex;align-items: center;margin:0px;" class=""><img style="margin-right: 5px;    float: left;" src="/assets/m/img/arrow.png"> Contact us</h5>
      <p class="bold blue" style="margin:0px 0px 20px 25px;">JMI Brokers LTD</p>
      <ul id="bottomUl">
      <li>Address:  <span >1276, Govant Building, Kumul Highway, Port Vila, Republic of Vanuatu:</span></li>
      <li>Phone no: <span>+678 24404</span></li>
      <li>Fax  no:  <span>+678 23693</span></li>
      <li>Website:  <span><a href="https://www.jmibrokers.com">www.jmibrokers.com</a></span></li>
      </ul>
      <br />
      <h5 class="bold">Best Regard</h5>
      </p>
      <p>Signature: '.$input["signature"].'</p>
      <p>Date: '.date("m-d-Y").'</p>
      <div class="footer">

      <img src="/assets/m/img/new-3.jpg">


  </div>


      </body>
      </html>')->save(public_path().'/assets/user_documents/'.$newfilename.'.pdf');


        $file_path=public_path().'/assets/user_documents/'.$newfilename.'.pdf';
        //  $file_path = storage_path('app').'\public\\'.$newfilename.'.pdf';
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $getUploadedFile= new UploadedFile(
            $file_path,
            $newfilename,
            $finfo->file($file_path),
            filesize($file_path),
            0,
            false
        );

        Storage::disk('do')->putFileAs('user_documents',$getUploadedFile,$newfilename.'.pdf');

        $customer_agreement=new Documents;
        $customer_agreement->website_accounts_id=$user->id;
        $customer_agreement->type=8;
        $customer_agreement->status=1;
        $customer_agreement->description='Customer Account Agreement';
        $customer_agreement->document='user_documents/'.$newfilename.'.pdf';


        if($customer_agreement->save()){
            $name_titles=['Mr','Mrs','Miss'];
            $name_title=$name_titles[$user->title];
            Mail::send('mails.requested_mails.customer_account_agreement',['signature' => $input['signature'],'fullname'=>$user->fullname,'name_title'=>$name_title], function($message)use($user,$newfilename){
                $message->to($user->email);
                $message->cc('backoffice@jmibrokers.com');
                $message->cc('compliance@jmibrokers.com');
                $message->from('support@jmibrokers.com','JMI Brokers');
                $message->subject('Customer Account Agreement');
                $message->attach(public_path().'/assets/user_documents/'.$newfilename.'.pdf');

            });

        }

        return redirect()->back();


    }





    public function post_agreement00()
    {

        $input=Request::all();
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $live_accounts=website_accounts::find($user->id)->fx_accounts_live;
        $demo_accounts=website_accounts::find($user->id)->fx_accounts_demo;
        $documents=website_accounts::find($user->id)->documents;

        $this->validate(Request(), [
            'signature' => 'required|min:10|max:80|regex:/^[a-zA-Z ]*$/',
        ]);

        $newfilename='Customer_Account_Agreement_'.rand(1,10000).time();



        PDF::loadHTML('<html style="border: 2px dashed #4f81bd;">
          <head>
          <title>CUSTOMER ACCOUNT AGREEMENT</title>

          <style>
            *{font-weight: normal ;font-size: 14px;}
            .left{text-align: left;}
            h5{margin: 20px 0px 10px;}
            .head
            {

              background-color: #4f81bd;
              font-weight: bold;
              text-align: left;
              padding: 10px 15px;
              color: white;
              border-radius: 10px;
              width: 275px;
              font-size: 20px;
            }
            #logo img{width:50%;max-width: 300px;margin-top: 10px;}
            .boldText
            {
              font-weight: bold;
              font-size: 16px;
            }
            .big{font-size: 16px;}
            .blue{color:#4f81bd;font-size: 16px;}
            hr{border-top: 2px dashed #4f81bd;width: 70%;border-bottom: 0px;margin: 40px auto;}
            .bold{font-weight: bold;}
            #bottomUl li{font-weight: bold; list-style-type: none;margin-top: 5px;}
            #bottomUl{padding: 0px;}
            li span , li span a{color: #4f81bd; font-weight: bold;}

              .content
         {
                  background-image:url("/assets/m/img/new-4.jpg");
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-position: center;
                  position: fixed;
                  top: 0px;
                  right: 0px;
                  bottom:0px;
                  height:100vh;
                  z-index:-1;
         }


         .header
         {
                  position: absolute;

                  left: 50px;
                  right: 0px;
                  top:0px;
                  margin-bottom:50px;
         }
         .footer
               {
                  position: absolute;

                  left: 0px;
                  right: 0px;
                  bottom:0px;

               }
         .footer img
         {
             margin-right: 50px;
         }
       </style>
     </head>
     <body>

      <div class="content">

      </div>

      <div id="logo"> <img src="/assets/m/img/new-5.png"></div>

          <h4 class="head">Customer Account Agreement</h4>
          <p style="text-align:left;">

          <h5 class="boldText">JMI Brokers LTD is licensed broker from Vanuatu Financial Services Commission as Dealers in Securities under license number 15010</h5>
          <h5 class="blue">Risk Disclosure Statement<h5>
          <p class="big">Before engaging in the products offered by JMI Brokers LTD you should be aware of the risks which may be involved in such trading.</p>


          <p class="blue">You should not enter into a transaction unless you fully understand:</p>

          <li>The nature and fundamentals of the transaction and the market underlying such transactions.</li>
          <li>The extent of the economic risk to which you are exposed as a result of such transactions(and determine that such risk is suitable for you in light of your specific experience in relation to the transaction and your financial objectives, circumstances and resources).</li>
          <li>The legal terms and conditions for such transactions.</li>

          <p  >You have the responsibility to fully understand the terms and conditions of the transactions to be undertaken, including, without limitation:</p>
          <p  >1. The terms as to price, term, and expiration date, restrictions on exercising an OTC option and futures and of the terms material to the transaction.</p>
          <p  >2 . Any terms describing risk factors, such as volatility, liquidity, and so on.</p>
          <p  >3. The circumstances under which you may become obliged to make or take delivery of a Leveraged foreign exchange transaction or Futures contracts.</p>
          <p  >The high degree of leverage that is often obtainable in trading of the products offered by JMI Brokers LTD can work against you as well as for you, due to fluctuating market conditions. Trading in such instruments can lead to large losses as well as gains in response to a small market movement.
          <p  >If the market moves against you, you may not only sustain a total loss of your initial margin deposit, and any additional funds deposited with JMI Brokers LTD.</p>
          <p  >to maintain your position, but you may also incur further liability to JMI Brokers LTD. You may be called upon to “top-up” your margin by substantial amounts at short notice to maintain your position, failing which JMI Brokers LTD may have to liquidate your position at a loss and you would be liable for any resulting loss. You may sustain substantial losses on a contract or trade if the market conditions move against your position. It
          is in your interest to fully understand the impact of market movements, in particular the extent of profit/loss you would be exposed to when there is an upward or down ward movement in the relevant rates and the extent of loss if you have to liquidate a position, if market conditions move against you.</p>
          <p  >Under certain market conditions you may find it difficult or impossible to liquidate a position ,to assess a fair price or assess risk exposure. This can happen, for example, where the market for a transaction is illiquid or where there is a failure in electronic or telecommunications systems, or where there is the occurrence of an event commonly known as “force majeure”. Placing contingent orders, such as “stop-loss” orders, will not necessarily limit your losses to the intended amounts, as it may be impossible to execute such orders under
          certain market conditions. When placing a stop order or stop loss order, you must be aware that in certain market conditions you may be filled at a different price than initially requested.
          Because the prices and characteristics of over-the-counter transactions are individually negotiated and there is no central source for obtaining prices, there are in efficiencies in transaction pricing. We consequently cannot and do not warrant that our prices or the prices we secure for you are or will at any time be the best prices available to you.
          Transactions in futures and options involve a high degree of risk and are not suitable for many members of the public. Such transactions should be entered into only by persons who have read, understood and familiarized themselves with the type of futures and options, style of exercise, the nature and extent of rights and obligations and the associated risks.
          The objective of this statement is to explain to you, briefly, the nature of trading in the products offered by JMI Brokers LTD, prior to your engaging in such transactions. In particular, you must be aware that the risk of loss in trading foreign exchange and precious metals and Futures (OTC) can be substantial. However, this statement does not purport to disclose or discuss all of the risks and other significant aspects of any transaction .You should therefore consult with your own legal, tax and financial advisers prior to entering into any particular transaction.
          By signing this Risk Disclosure Statement, you understand that no one can guarantee trading profits and past results do not assure future profitability, and you acknowledge and confirm that you have fully read and understood the Risk Disclosure Statement and that you are treated as experienced and/or professional Customer.</p>


          <h5 class="blue">1.	TRADING AUTHORIZATION</h5>
          <p  >JMI Brokers LTD is authorized to purchase and sell Commodity Contracts for Customer’s account (i.e., all accounts opened on Customer’s behalf, accounts with Customer guarantees, and accounts for
          which Customer is jointly responsible) in accordance with oral or written instructions from the Customer, the Customer’s Introducing Broker or other designated agent of the Customer.
          Customer hereby waives any defense that such instructions were not in writing.</p>
          <p  >JMI Brokers LTD is also authorized, in its sole discretion, to employ clearing members and floor brokers as Customer’s agents in connection with the execution, carrying, clearance, delivery and settlement of any such purchases and sales of Commodity Contracts. Commodity Contracts bought or sold will be transactions between you as principal and us as principal. You shall be directly and personally responsible for performing your obligations under every transaction entered in to between us, whether you are dealing as principal directly or through an agent, or as agent for an other person, and you shall indemnify us in respect of all liabilities, losses or costs of any kind or nature what so ever which may be incurred by us as a direct or in direct result of any failure by you to perform any such obligation.</p>

          <h5 class="blue">2.	APPLICABLE RULES AND REGULATIONS</h5>
          <p  >All orders entered for the purchase or sale of a Commodity Contract and all transactions in Commodity Contracts executed for Customer’s accounts shall be subject to the constitution, by Laws, rules, regulations, customs and usages (collectively “rules”) of the exchange or market, and its clearing house, if any, where such orders are directed or such transactions are executed and any applicable self- regulatory organization and to the rules and regulations promulgated there under (collectively “laws JMI Brokers LTD shall not be liable to Customer as a result of any action taken by JMI Brokers LTD or its agents in compliance with any of the foregoing rules or laws. This paragraph is solely for the protection and benefit of JMI Brokers LTD ,and any failure by JMI Brokers LTD or its agents to comply with any of the foregoing rules or laws shall not relieve Customer of any obligation under this agreement nor be construed to create rights under this agreement in favor of Customer against JMI Brokers LTD</p>

          <h5 class="blue">3.	CHARGES PAYABLE BY CUSTOMER.</h5>
          <p  >Customer agrees to pay (a) such commissions and service fees as JMI Brokers LTD may establish and charge from time to time; (b) the amount of any loss that may result from transactions by JMI Brokers LTD on Customer’s behalf, including any deficit balance; and(c) interest on any deficit balance and on any other amounts payable to JMI Brokers LTD under this agreement at the rate of three percent (3%) over the Prime rate in effect from time to time, or the maximum rate allowed by law, which ever is less.</p>

          <h5 class="blue">4.	RISK OF LOSS</h5>
          <p  >All transactions effected for Customer’s accounts and all fluctuations in the market prices of the Commodity Contracts carried in Customer’s accounts are at Customer’s sole risk and Customer shall be solely liable under all circumstances. By execution of this agreement, Customer warrants that Customer is willing and financially able to sustain any such losses. JMI Brokers LTD is not responsible for the obligations of the persons with whom Customer’s transactions are effected, nor is JMI Brokers LTD responsible for delays in transmission, delivery or execution of Customer’s orders due to malfunctions of communications facilities or other causes.</p>



          <p  >JMI Brokers LTD shall not be liable to Customer for the loss of any margin deposits which is the direct or indirect result of the bankruptcy, in solvency, liquidation, receivership, custodianship or assignment for the benefit of creditors of any bank, another clearing broker, exchange, clearing organization or similar entity.</p>

          <h5 class="blue">5.	TRADING RECOMMENDATIONS</h5>
          <p  >Customer acknowledges that any trading recommendations and market or other information</p>
          <p  >Communicated to Customer by JMI Brokers LTD , although based upon information obtained from sources Believed by JMI Brokers LTD to be reliable, may be incomplete, may not be verified, may differ from advice given to other customers, and may be changed without notice to Customer. Customer understands JMI Brokers LTD  or one or more of its affiliates may have apposition in and buy or sell Commodity Contracts which are the subject of information or recommendations furnished to Customer and that these positions and transactions of JMI Brokers LTD or any affiliates may not be consistent with are there commendations furnished to customer.</p>
          <p  >JMI Brokers LTD makes no representation or warranty with respect to the tax consequences of customer transactions</p>

          <h5 class="blue">6.	INDEMNIFICATION</h5>
          <p  >Customer hereby agrees to indemnify JMI Brokers LTD and hold JMI Brokers LTD harmless from any liability, cost or expense (including attorneys’ fees and expenses and any fines or penalties imposed by any governmental agency, contract market, exchange, clearing organization or other self-regulatory body) which JMI Brokers LTD may incur or be subjected to with respect to Customer’s account or any transaction or position there in. Without limiting the generality of the foregoing, Customer agrees to reimburse JMI Brokers LTD on demand for any cost of collection incurred by JMI Brokers LTD in collecting any sums owing by Customer under this agreement and any cost incurred by JMI Brokers LTD in successfully defending against any claims asserted by Customer, including all attorneys’ fees, interest and expenses.</p>

          <h5 class="blue">7.	RECORDING</h5>
          <p  >Customer understands that all conversations regarding Customer’s accounts, orders and Commodity Contracts between Customer and JMI Brokers LTD maybe recorded
          by JMI Brokers LTD and Customer irrevocably consents to such recordings and waives any right to object to JMI Brokers LTD ’s use of such recordings in any proceeding or as JMI Brokers LTD otherwise deems appropriate.</p>

          <h5 class="blue">8.	FOREIGN CURRENCY</h5>
          <p  >If any transaction for Customer’s accounts is effected on any exchange or in any market on which transactions are settled in a foreign currency, any profit or loss arising as a result of a fluctuation in the rate of exchange between such currency and the United States Dollar shall be entirely for Customer’s account and at Customer’s sole risk. JMI Brokers LTD is hereby authorized to convert funds in Customer’s accounts in to and from such foreign currency at rates of exchange prevailing at the banking and other institutions with which JMI Brokers LTD normally conducts such business transactions.</p>



          <h5 class="blue">9.	MARGIN REQUIREMENTS.</h5>
          <p  >Customer agrees to maintain at all times without demand from JMI Brokers LTD margin requirements for the positions in the Customer’s account (s). Customer will at all times maintain such margin or collateral for Customer’s account (s) as requested from time to time by JMI Brokers LTD (which requests maybe greater than exchange and clearing house requirements). Margin deposits shall be made by wire transfer of immediately available funds, or by such other means as JMI Brokers LTD may direct, and shall be deemed made when received by JMI Brokers LTD.</p>
          <p  >JMI Brokers LTD failure at anytime to call for a deposit of margin shall not constitute a waiver of JMI Brokers LTD rights to do so at anytime there after, nor shall it create any liability of JMI Brokers LTD to Customer.</p>

          <h5 class="blue">10.	LIQUIDATION OF POSITIONS.</h5>
          <p  >In the event that (a) Customer shall fail to timely deposit or maintain margin or any amount
          hereunder; (b) Customer (if an individual) shall die or be judicially declared incompetent or (if an entity) shall be dissolved or otherwise terminated; (c) a proceeding under the Bankruptcy Act, an assignment for the benefit of creditors, or an application for a receiver, custodian, or trustee shall be filed or applied for by or against Customer;(d)attachment is levied against Customer’s
          account; (e) the property deposited as collateral is determined by JMI Brokers LTD in its sole discretion, regardless of current market quotations, to be in adequate to properly secure the account; or (f) at anytime JMI Brokers LTD
          deems it necessary for its protection for any reason whatsoever, JMI Brokers LTD may, in the manner it deems appropriate, close out Customer’s open positions in whole or in part, sell any or all of Customer’s property held by JMI Brokers LTD , buy any securities, Commodity Contracts, or other property for Customer’s account, and may cancel any outstanding orders and commitments made by JMI Brokers LTD on behalf of Customer. Such sale, purchase or cancellation maybe made at JMI Brokers LTD
          discretion without advertising the same and without notice to Customer or his personal representatives and without prior tender, demand for margin or payment, or call of any kind upon
          Customer. JMI Brokers LTD may purchase the whole or any part there of free from any right of red emption. It is understood that a prior demand or call or prior notice of the time and place of such sale or purchase shall not be a waiver of JMI Brokers LTD right to sell or buy without demand or notice as here in provided. Subject to applicable laws and rules, and in order to prevent non-permitted trading in debit/deficit accounts, profits on any trades executed without JMI Brokers LTD’s express permission, for a Customer account that is debit/deficit at the time the order is placed ,shall before JMI Brokers LTD account if JMI Brokers LTD in its discretion so elects. Losses on any such trades shall be jointly and severally borne by the Introducing Broker, if any, and the Customer. Customer shall remain liable for and pay JMIBrokers LTD the amount of any deficiency in any account of Customer with JMI Brokers LTD resulting from any transaction described above. Our determination of the current market value and the amount of additional and/or variation margin shall be conclusive and shall not be challenged by the Customer.</p>


          <h5 class="blue">11.	TRADING LIMITATIONS</h5>
          <p  >JMI at any time, in its sole discretion, may limit the number of positions which Customer may maintain or acquire through JMI Brokers LTD , and JMI Brokers LTD is under no obligation to effect any transaction for Customer’s accounts which would create positions in excess of the limit which JMI Brokers LTD has set.</p>
          <p  >Customer agrees not to exceed the position limits established for any contract market, whether
          acting alone or with others, and to promptly advise JMI Brokers LTD if Customer is required to file any reports on positions. </p>

          <h5 class="blue">12.	EXERCISES AND ASSIGNMENTS</h5>
          <p  >With regard to options transactions, Customer understands that some exchange clearing houses have established exercise requirements for the tender of exercise instructions and that options will become worth less in the event that Customer does not deliver instructions by such expiration times. At least two business days prior to the first notice day in the case of long positions in futures or forward contracts, and at least two business days prior to the last trading day in the case of short positions in open futures or forward contracts or long and short positions in options, Customer agrees that Customer will either give JMI Brokers LTD instructions to liquidate or make or take delivery under such futures or forward contracts, or to liquidate, exercise, or allow the expiration of such options, and will deliver to JMI Brokers LTD sufficient funds and/or any documents required in connection with exercise or delivery. If such instructions or such funds and/or documents, with regard to option transactions, are not received by JMI prior to the expiration of the option, JMI Brokers LTD may permit an option to expire. Customer also understands that certain exchanges and clearing houses automatically exercise some “in-the -money” options unless instructed otherwise, Customer acknowledges full responsibility for taking action either to exercise or to prevent exercise of an option contract, as the case maybe JMI Brokers LTD is not required to take any action with respect to an option, including without limitation any action to exercise a valuable option contract prior to its expiration or to prevent the automatic exercise of an option, except upon Customer’s express instructions. Customer further understands that JMI Brokers LTD also has established exercise cut-off times which maybe different from the times established by the contract markets in clearing houses. In the event that timely exercise and assignment instructions are not given, Customer hereby agrees to waive any and all claims for damage or loss Customer might have against JMI Brokers LTD arising out of the fact that an option was or was not exercised. Customer understands that JMI Brokers LTD randomly assigns exercise notices to Customers, that all short option positions are subject to assignment at anytime, including positions established on the same day that exercises areas signed, and that exercise assignment notices are allocated randomly from among all Customers’ short option positions which are subject to exercise.</p>


          <h5 class="blue">13.	SECURITY AGREEMENT</h5>
          <p  >(a)	All Commodity Contracts, funds, securities, and other property in Customer’s accounts or otherwise now or at any time in the future held by JMI Brokers LTD for any purpose, including safekeeping, are subject to a security interest and general lien in JMI Brokers LTD ’s favor to secure any indebtedness at any time owing from Customer to JMI Brokers LTD, including any indebtedness resulting from any guarantee of a transaction or account by Customer or Customer’s assumption of joint responsibility for any transaction or account. From time to time and without prior notice to Customer, JMI Brokers LTD may transfer interchangeably between and among any account of Customer maintained at JMI Brokers LTD any of Customer’s funds (including segregated funds), securities, commodities, or other property for purposes of margin, reduction or satisfaction of any debit balance, or any reason which JMI Brokers LTD deems appropriate. Within areas on able time after any such transfer, JMI Brokers LTD will confirm the transfer in writing to Customer.</p>

          <p  >(b)	Customer hereby grants to JMI Brokers LTD the right to pledge, repledge, or invest either separately or with the property of other Customers, any securities or other property held by JMI Brokers LTD for the account of Customer or as collateral therefore, including without limitation to any exchange or clearing house through which trades of Customer are executed.
          JMI Brokers LTD shall be under no obligation to pay to Customer or account for any interest income, or benefit derived from such property and funds or to deliver the same securities or other property deposited with or received by JMI Brokers LTD for Customer. JMI Brokers LTD may deliver securities or other property of like or equivalent kind or amount; JMI Brokers LTD shall have the right to offset any amounts it holds for or owes to Customer against any debts or other amounts owed by Customer to JMI Brokers LTD </p>

          <h5 class="blue">14.	AUTHORITY TO TRANSFER ACCOUNTS</h5>
          <p  >Until further notice in writing from the undersigned, JMI Brokers LTD is hereby authorized at anytime, without prior notice to the undersigned, to transfer from any account or accounts of the undersigned maintained at JMI Brokers LTD or any exchange member through which
          JMI Brokers LTD clears customer transactions, such excess funds, securities, commodities, commodity futures contracts, commodity options, and other property of the undersigned as in JMI Brokers LTD ’s sole judgment maybe required for margin in any other such account or accounts or to reduce or satisfy any debit balances in any other account or accounts provided such transfer or transfers comply with relevant governmental and exchange rules and regulations applicable to the same. JMI Brokers LTD is further authorized to liquidate any property held in any such account or accounts of the undersigned whenever, in JMI Brokers LTD ’s sole judgment, such liquidation is necessary in order to effectuate the above authorized transfer and application of property. With in areas on able time after making any such transfer or application, JMI Brokers LTD will Confirm the same in writing to the under signed.</p>

          <h5 class="blue">15- Monthly Rebate</h5>
          <p  >For all both offers whether its offer number 1 Rebate + Bonus or offer number 2 1 pip back No bonus the value of Monthly Rebate should not exceed the value of original fund deposited at that month. Therefore the Maximum monthly rebate in any month is equal to sum of monthly deposits excluding bonus or any other promotions.</p>


          <h5 class="blue">16.	NOTICES AND COMMUNICATIONS</h5>
          <p  >Customer shall make all payments, except with regard to wire transfers discussed above, and deliver all notices and communications to the office of JMI Brokers LTD . All communications JMI Brokers LTD to Customer maybe sent to the Customer at the address indicated on the Customer Account Application or to such other address as Customer hereafter directs in writing. Confirmations of trades, statements of account, margin calls, and any other written notices shall be binding on Customer for all purposes,
          unless Customer calls any error there into JMI Brokers LTD ’s attention in writing (a) prior to the start of business on the business day next following notification, in the case of margin calls and reports of executions and (b) within 24 hours of delivery to Customer, in the case of statements of account and any written notices (other than trade confirmations or margin calls)or demands. None of these provisions, however, will prevent JMI Brokers LTD upon discovery of any error or omission, from correcting it. The parties agree that such errors, whether resulting in profit or loss, will be corrected in Customer’s account, will be credited or debited so that it is in the same position it would have been in if the error had not occurred. Whenever a correction is  made, JMI Brokers LTD will promptly make written or oral notification to Customer. All communications, whether by mail, telex, courier, telephone, telegraph, messenger, facsimile, or otherwise (in the case of mailed notices), or communicated (in the case of telephone notices), sent to Customer at Customer’s or agent’s address (or telephone number) as given to JMI Brokers LTD from time to time shall constitute personal delivery to Customer whether or not actually received by Customer, and Customer hereby waives all claims resulting from failure to receive such communications.</p>

          <h5 class="blue">17.	PRINTED MEDIA STORAGE</h5>
          <p  >Customer acknowledges and agrees that JMI Brokers LTD may reduce all documentation evidencing Customer’s account, including the original signature documents executed by Customer in the opening of such Customer’s account with JMI Brokers LTD , utilizing a printed media storage device such as micro-fiche or optical disc imaging. Customer agrees to permit the records stored by such printed media storage method to serve as a complete, true and genuine record of such Customer’s account documents and signatures.</p>

          <h5 class="blue">18.	REPRESENTATIONS</h5>
          <p  >Customer represents that (a) (if an individual) he is of the age of majority, of sound mind, and authorized to open accounts and enter into this agreement and to effectuate transactions in Commodity Contracts as contemplated hereby; (b) (if an entity) Customer is validly existing and empowered to enter into this agreement and to effect transactions in Commodity Contracts as contemplated hereby; (c) the statements and financial information contained on Customer’s Account Application submitted herewith (including any financial statement there with)are true and correct; and (d) no person or entity has any interesting or control of the account to which this agreement pertains except as disclosed in the Customer’s Account Application. Customer further
          represents that, except as here to fore disclosed to JMI Brokers LTD in writing, he is not an officer or employee of any exchange, board of trade, clearing house, or an employee or affiliate of any futures commission merchant, or an introducing broker, or an officer ,partner, director, or employee of any securities broker or dealer. Customer agrees to furnish appropriate financial statements to JMI Brokers LTD to disclose to JMI Brokers LTD any material changes in the financial position of Customer and to furnish promptly such other information concerning Customer as JMI Brokers LTD reasonably requests.</p>


          <h5 class="blue">19.	INTRODUCING BROKER</h5>
          <p  >Customer acknowledges that JMI Brokers LTD is not responsible for the conduct, representations and statements of the introducing broker or its associated persons in the handling of Customer’s account. Customer agrees to waive any claims Customer may have against JMI Brokers LTD and to indemnify and hold JMI Brokers LTD harmless for any actions or omissions of the introducing broker or its associated persons.</p>

          <h5 class="blue">20.	CONFLICTS OF INTEREST</h5>
          <p  >JMI Brokers LTD may execute Commodity Contracts for Customer’s account (s) either as principal or broker. As broker, JMI Brokers LTD will execute transaction similar to Customer’s transaction with another market participant in the financial market. As principal JMI Brokers LTD may not execute transaction similar to Customer in the financial market and hold the opposing transaction in JMI Brokers LTD inventory of Commodity Contracts. As a result of acting as principal Customer should realize that JMI Brokers LTD maybe acting as your counter party and that JMI Brokers LTD maybe placed in such a position that a conflict of duty
          occurs. JMI Brokers LTD , its Associates or other persons connected with JMI Brokers LTD may have an interest, relationship or arrangement that is material in relation to any Commodity Contract effected under this Agreement. By entering into this Agreement the Customer agrees that J JMI Brokers LTD may transact such business without prior reference to the Customer. In addition, JMI Brokers LTD may provide advice and other services to third parties whose interests maybe in conflict or competition with the Customer’s interests JMI Brokers LTD , its Associates and the employees of any of them may take positions opposite to the Customer or maybe in competition with the Customer to acquire the same or a similar position. JMI Brokers LTD will not deliberately favor any person over the customer but will not be responsible for any loss which may result from such competition</p>

          <h5 class="blue">21.	BINDING EFFECT OF AGREEMENT; MODIFICATIONS</h5>
          <p  >This agreement shall be binding upon and inure to the benefit of JMI Brokers LTD ,its successors and assigns, and Customer’s heirs, executors, administrators, legatees, successors, personal representatives and assigns.
          Except as provided in paragraph 2, no change in or waiver of any provision of this agreement shall be binding unless it is in writing, dated subsequent to the date hereof, and signed by the party intended to be bound. No agreement or understanding of any kind shall be binding upon JMI Brokers LTD unless it is agreed to in writing, accepted and signed by an authorized officer.</p>

          <h5 class="blue">22.	FORCE MAJEURE EVENTS</h5>
          <p class="bold">We may, in our reasonable opinion, determine that an emergency or an exceptional market condition exists (a “Force Majeure Event”). A Force Majeure Event shall include, but is not limited to, the following:</p>
          <li>	Any act, event or occurrence (including without limitation any strike, riot or commotion, interruption or power supply or electronic or communication equipment failure) which, in our opinion, prevents us from maintaining an orderly market in one or more of the investments in respects of which we ordinarily deal in Commodity Contracts

          <li>	The suspension or closure of any market or the abandonment or failure of any event upon which we base, or to which we in any way relate, our quote, or the imposition of limits or special or unusual terms on the trading in any such market or on any such event;


          <li>	The occurrence of an excessive movement in the level of any Commodity Contract and/or the
          underlying market or our anticipation (acting reasonably) of the occurrence of such movements.</li>

          <p class="left ">If we determine that a Force Majeure Event exists we may in our absolute is creation without notice and at any time take one or more of the following steps:</p>

          <li>	Increase your deposit requirements; close any or all of your open Commodity Contracts at	such closing level as we reasonably believe to be appropriate.</li>
          <li>	Suspend or modify the application of all or any of the terms of this agreement.</li>
          to the extent that the Force Majeure Event  makes  it  impossible or impracticable for us to	comply with the term or terms in question;
          <li>	OR alter the last time for trading for particular Commodity Contract.</li>


          <h5 class="blue">23.	HEADINGS</h5>
          <p class="left ">The headings of each provision are for descriptive purposes only and shall not be deemed to modify or qualify any of the rights or obligations set forth in each provision.</p>

          <h5 class="blue">24.	GOVERNING LAW</h5>
          <p class="left ">This agreement shall be governed by the laws of Republic of Vanuatu  , regardless of form, arising out of transactions under this agreement maybe brought by customer more than three months after the cause of action arose.</p>

          <h5 class="blue">25.	ACCEPTANCE OF AGREEMENT</h5>
          <p class="left ">This agreement shall constitute an effective contract between JMI and Customer upon acceptance by an authorized officer of JMI.</p>

          <h5 class="blue">26.	MULTIPLE ACCOUNTS</h5>
          <p class="left ">Customer agrees that JMI Brokers LTD may, from time to time, change the account number assigned to any account covered by this agreement, and that this agreement shall remain in full force and effect.</p>
          <p class="left ">Customer agrees further that this account, if closed and reopened, as well as all additional accounts opened in Customer’s name at JMI, shall be covered by this same agreement with the exception of any account for which a new customer agreement is signed.</p>

          <h5 class="blue">27.	ASSIGNMENT</h5>
          <p class="left ">JMI may assign Customer’s account to another registered futures commission merchant by notifying Customer of the date and name of the intended assignee ten (10) days prior to the assignment. Unless Customer objects to the assignment in writing prior to the scheduled date for assignment, the assignment will be binding on Customer.</p>

          <h5 class="blue">28.	CUSTOMER ACKNOWLEDGMENTS AND SIGNATURE</h5>
          <p class="left ">Customer hereby understands the Customer Account Agreement and consents and agrees to all of the terms and conditions of the agreement set forth above. Customer acknowledges that trading in Commodity Contracts is speculative, involves a high degree of risk and is appropriate only for persons who can assume risk of loss in excess of their margin deposits.</p>
          <br />

          <h5 class=" left">Online Access Agreement</h5>

          <p  >This agreement sets forth the terms and conditions under which we, JMI Brokers LTD ,shall permit you to have access to one or more terminals, including terminal access through your internet browser, for the electronic transmission of orders and \ or transactions, for your
          accounts with us. </p>
          <p class="left ">This agreement also sets forth the terms and conditions under which we shall permit you electronically to monitor the activity, orders and\or transactions in your account (collectively, the “Online Service”). For purposes of this Agreement the term “Online Service” includes all software and communication links, and in consideration thereof, Customer agrees to the following:<p  >

          <h5 class="blue">1.	LICENSE GRANT AND RIGHT OF USE</h5>
          <p  >By this Agreement, where we are supplying you with software for use with the Online Service,
          you may use the software solely for your own internal business purposes. Neither the software not the Online Service maybe used to provide third party training or as a service bureau for any third parties. You agree to use the Online Service and the software strictly in accordance with the terms and conditions of JMI Brokers LTD Customer Account Agreement, as amended from time to time. You also agree to be bound by any rules, procedures and conditions established by JMI Brokers LTD concerning the use of the Online Service provided by JMI Brokers LTD

          <h5 class="blue">2.	ACCESS AND SECURITY</h5>
          <p  >The Online Service maybe used to transmit, received and confirms execution of orders, subject to prevailing market conditions and applicable rules and regulations.</p>
          <p class="left "> JMI Brokers LTD consent to your access and use in reliance upon your having adopted procedures to prevent unauthorized access to and use of the Online Service, and in any event, you agree to any financial liability for trades executed through the Online Service. You acknowledge, represent and warrant that:</p>
          <li>A)	You have received a number, code or other sequence which provides access to the Online Service (the “Password”).</li>
          <li>B)	You are the sole and exclusive owner of the password.</li>
          <li>C)	You are the sole and exclusive owner of any identification number or Login number(the “Login”). </li>


          <li>D)	You accept full responsibility for use and protection of the Password and the Login as well as or any transaction occurring in account opened, held or accessed through the Login and \ or Password. You accept responsibility for the monitoring of your account(s).</li>
          <li>You will immediately notify JMI Brokers LTD in writing if you become aware of any of the following:</li>

          <li>A)	Any loss, theft or unauthorized use of your Password(s), Login and\or account number(s).</li>
          <li>B)	Any failure by you to receive a massage indicating that an order was received and\or executed.</li>
          <li>C)	Any failure by you to receive an accurate confirmation of an execution.</li>
          <li>D)	Any receipt of confirmation of an order and\or execution which you did not place.</li>
          <li>E)	Any inaccurate information in your account balances, positions, or transaction history.</li>

          <h5 class="blue">3.	RISKS OF ONLINE TRADING</h5>
          <p  >Your access to the Online Service, or any portion thereof, maybe restricted or unavailable during periods of peak demands, extreme market volatility, systems upgrades or other reasons.</p>
          <p  >JMI Brokers LTD makes no express or implied representations or warranties to you regarding the usability, condition or operation thereof. We do not warrant that access to or use of the Online Service will be uninterrupted or error free or that the Online Service will meet any particular criteria of performance or quality. Under no circumstances including negligence, shall JMI Brokers LTD or anyone else involved in creating, producing, delivering or managing that Online Service be liable for any direct, indirect incidental, special or consequential damages that result from the use of or inability to use the Online Service, or out of any breech of any warranty, including, without limitation, those for business interruption or loss of profits. You expressly agree that your use of the Online Service is of your sole risk, you assume full responsibility and risk of loss resulting from use of, or materials obtained through, the Online Service, neither we nor any of our directors, officers, employees ,agents, contractors, affiliates, third party vendors, facilities, information providers, licensors, exchanges, clearing organizations or other suppliers providing data, information, or services, warrant that the Online Service will be uninterrupted or error free; nor do we make any warranty as to the results that maybe obtained from the use of the Online Service or as to the timeliness, sequence, accuracy, completeness, reliability or content of any information, service, or transaction provided through the Online Service. In the event that your access to the Online Service, or any portion thereof, is restricted unavailable, you agree to use other means to place your orders or access information, such as calling JMI Brokers LTD representative. By placing an order through the Online Service, you acknowledge that your order may not be reviewed by a registered representative prior to execution, you agree that JMI Brokers LTD is not liable to you for any losses, lost opportunities or increased commissions that may result from your inability to use the Online Service to place order or access information.</p>


          <h5 class="blue">4.	MARKET DATA AND INFORMATION</h5>
          <p  >Neither we nor any provider shall be liable in any way to you or to any other person for: a) Any inaccuracy, error or delay in, or omission of any such data, information or message or the transmission or delivery of any such data, information or message; or b) Any loss or damage arising from or occasioned by any such inaccuracy, error, delay, omission, non-performance, interruption in any such data, information or message, due to either to any negligent act or
          omission or to any condition of force majeure or any other cause , whether or not within our or any provider’s control. We shall not be deemed to have received any order or communication transmitted electronically by you until we have actual knowledge of such order or communication</p>

          <h5 class="blue">5.	ADDITIONAL IMPORTANT INFORMATION AND DISCLAIMERS REGARDING EXPERT ADVISORS</h5>
          <p  >The expert advisors are intended merely as a tool for implementing technical ideas that can be incorporated into a personally designed trading strategy or system for experienced traders only. No support, technical, advisory or otherwise, is offered by JMI Brokers LTD in their usage. Use of the Expert Advisors is entirely at your own risk and you acknowledge & understand that JMI Brokers LTD make no warranties or representations concerning the use of Expert Advisors and that JMI Brokers LTD . Does not, by implication or otherwise, endorse or approve of the use of the Expert Advisors & shall not be responsible for any loss to you occasioned by their usage.</p>

          <h5 class="blue">6.	REPRESENTATIONS</h5>
          <p  >You acknowledge that from time to time, and for any reason, the Online Service may not be operational or otherwise unavailable for your use due to servicing, hardware malfunction, software defect, service or transmission interruption or other cause, and you agree to hold us and any provider harmless from liability of any damage which results from the unavailability of the Online Service. You acknowledge that you have alternative arrangements which will remain in place for the transmission and execution of your orders, in the event, for any reason, circumstances prevent the transmission and execution of all, or any portion of, your orders through the Online Service. You represent and warrant that you are fully authorized to inter this Agreement and under no legal disability which prevent you from trading and that you are & shall remain in compliance with all laws, rules and regulations applicable to your business. You agree that you are familiar with and will abide by any rules or procedures adopted by us and any provider in connection with use of the Online Service & you have provided necessary training in its use. You shall not (and shall not permit any third party) to copy, use analyze, modify, decompile, disassemble, reverse engineer, translate or convert any software provided to you in connection with use of the Online Service or distribute the software or the Online Service to any other third party.</p>

          <h5 class="blue">7.	TERMINATION</h5>
          <p  >We may, at our sole discretion, terminate or restrict your access to the Online Service and may terminate this Agreement at any time. Upon termination, any software license granted to you herein shall automatically terminate.</p>


          <h5 class="blue">8.	INDEMNITY</h5>
          <p  >You agree to indemnify & hold harmless us & each provider & their respective principles, Affiliates &agents from and against all claims, demands, proceedings, suits and all losses (direct,
          indirect or otherwise), liabilities costs and expenses (including attorney fees and disbursements),paid in settlement, incurred or suffered by us and\or a providers and\or our or their respective principals, affiliates & agents arising from or relating to your use of the Online Service or the transactions contemplated hereunder. This indemnity provision shall survive termination of this Agreement.</p>

          <h5 class="blue">9.	MISCELLANEOUS</h5>
          <p  >You may not amend the terms of this Agreement. We may amend the terms of this Agreement upon notice to you (including electronic delivery). By continued access to and use of the Online Service, you agree to any such amendments to this Agreement. This Agreement us the entire Agreement between the parties relating to the subject hereof, and, except with respect to the Customer Account Agreement between the parties, all prior negotiations and understandings between the parties, whether written or oral, are hereby merged into this Agreement. Nothing in this Agreement shall be deemed to supersede or modify a party’s right and obligations under the Agreement</p>

          <p  style="display:none;">* JMI Brokers LTD will not cover any profits or losses that may occur in any client account if market slip up or down more then 300 pips in 24 hours.</p>
          <hr>
          <h5 style="font-weight: bold; display: flex;align-items: center;margin:0px;" class=""><img style="margin-right: 5px;    float: left;" src="/assets/m/img/arrow.png"> Contact us</h5>
          <p class="bold blue" style="margin:0px 0px 20px 25px;">JMI Brokers LTD</p>
          <ul id="bottomUl">
          <li>Address:  <span >1276, Govant Building, Kumul Highway, Port Vila, Republic of Vanuatu:</span></li>
          <li>Phone no: <span>+678 24404</span></li>
          <li>Fax  no:  <span>+678 23693</span></li>
          <li>Website:  <span><a href="https://www.jmibrokers.com">www.jmibrokers.com</a></span></li>
          </ul>
          <br />
          <h5 class="bold">Best Regard</h5>
          </p>
          <p>Signature: '.$input["signature"].'</p>
          <p>Date: '.date("m-d-Y").'</p>
          <div class="footer">

          <img src="/assets/m/img/new-3.jpg">


      </div>


          </body>
          </html>')->save(public_path().'/assets/user_documents/'.$newfilename.'.pdf');


        $customer_agreement=new Documents;
        $customer_agreement->website_accounts_id=$user->id;
        $customer_agreement->type=8;
        $customer_agreement->status=1;
        $customer_agreement->description='Customer Account Agreement';
        $customer_agreement->document='/assets/user_documents/'.$newfilename.'.pdf';

        if($customer_agreement->save()){
            $name_titles=['Mr','Mrs','Miss'];
            $name_title=$name_titles[$user->title];
            Mail::send('mails.requested_mails.customer_account_agreement',['signature' => $input['signature'],'fullname'=>$user->fullname,'name_title'=>$name_title], function($message)use($user,$newfilename){
                $message->to($user->email);
                $message->cc('backoffice@jmibrokers.com');
                $message->cc('compliance@jmibrokers.com');
                $message->from('support@jmibrokers.com','JMI Brokers');
                $message->subject('Customer Account Agreement');
                $message->attach(public_path().'/assets/user_documents/'.$newfilename.'.pdf');

            });

        }

        return redirect()->back();


    }








    public function post_open_account()
    {




        $input=Request::all();
        // dd($input);
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $live_accounts=website_accounts::find($user->id)->fx_accounts_live;
        $demo_accounts=website_accounts::find($user->id)->fx_accounts_demo;
        $documents=website_accounts::find($user->id)->documents;


        //check if profile not completed
        if($user->country =='' or $user->mobile ==''){
            if( Request::segment(1) =='en'){
                return Redirect::to('/en/cpanel/profile')->with('status-error', 'Please complete your profile first.');
            }elseif( Request::segment(1) =='ar'){
                return Redirect::to('/ar/cpanel/profile')->with('status-error', 'من فضلك اكمل الملف الشخصى أولا .');
            }else{
                return Redirect::to('/ru/cpanel/profile')->with('status-error', 'Пожалуйста, сначала заполните свой профиль.');
            }
        }



        if($input['account_radio_type']==0){
            //open demo account

            //check if he has 10 accounts
            if(count($demo_accounts)>9){
                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/open-account');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/open-account');
                }else{
                    return Redirect::to('/en/cpanel/open-account');
                }
            }

            $mt4password=str_random(8);
            $mt4investor=str_random(8);

            $user['email']         =$user->email;
            $user['password']      =$mt4password;
            $user['group']         =$input['account_group'];
            $user['leverage']      =$input['leverage'];
            $user['zipcode']       =$user->post_code;
            $user['country']       =$user->country;
            $user['state']         =' ';
            $user['city']          =$user->town_city;
            $user['address']       =$user->address1;
            $user['comment']       =' ';
            $user['phone_password']=' ';
            $user['status']        =' ';
            $user['id']            =$user->id;
            $user['agent']         =' ';
            $user['phone']         ='+'.$user->country_code.$user->mobile;
            $user['name']          =$user->fullname;
            $user['investor']      =$mt4investor;
            $user['send_reports']  =1;
            $user['deposit']       =$input['deposit'];



            //--- prepare query
            $query="NEWACCOUNT MASTER=JMIBrokers2016|IP=$_SERVER[REMOTE_ADDR]|GROUP=$user[group]|NAME=$user[name]|".
                "PASSWORD=$user[password]|INVESTOR=$user[investor]|EMAIL=$user[email]|COUNTRY=$user[country]|".
                "STATE=$user[state]|CITY=$user[city]|ADDRESS=$user[address]|COMMENT=$user[comment]|".
                "PHONE=$user[phone]|PHONE_PASSWORD=$user[phone_password]|STATUS=$user[status]|ZIPCODE=$user[zipcode]|".
                "ID=$user[id]|LEVERAGE=$user[leverage]|AGENT=$user[agent]|SEND_REPORTS=$user[send_reports]|DEPOSIT=$user[deposit]";
            //--- send request

            $ret='error';
            //dd($query);
            //---- open socket
            $ptr=@fsockopen('85.234.143.239','443',$errno,$errstr,5);
            //---- check connection
            //dd($ptr);
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
            if(strpos($ret, 'blocked') !== false && strpos($ret, '60') !== false ){

                //create account failed
                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/open-account')->with('status-error', 'خطأ بفتح الحساب ,حاول مرة أخرى.من فضلك انتظر 60 ثانية وحاول مرة اخرى');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/open-account')->with('status-error', 'Ошибка создания учетной записи. Пожалуйста, подождите 60 секунд и повторите попытку.');
                }else{
                    return Redirect::to('/en/cpanel/open-account')->with('status-error', 'Account Creation Failed. Please wait 60 secs and try again.');
                }


            }
            if(strpos($ret, 'OK') !== false){

                $mt4login = substr($ret, strpos($ret, "=") + 1);

                $fx_account=new Fx_accounts;
                $fx_account->account_id=$mt4login;
                $fx_account->account_group=$input['account_group'];
                $fx_account->account_type=0;
                $fx_account->currency=0;
                $fx_account->leverage=$input['leverage'];
                $fx_account->account_radio_type=$input['account_radio_type'];
                $fx_account->password=$mt4password;
                $fx_account->investor_password=$mt4investor;
                $fx_account->website_accounts_id=$user->id;
                $fx_account->status=0;
                $fx_account->save();

                $notification=new Notifications;
                $notification->website_accounts_id=999999999;
                $notification->notification_status=0;
                $notification->notification=$user->email.'Has Created A New Demo Account';
                $notification->notification_link='/spanel/website-accounts?&bymail='.$user->email.'&';
                $notification->save();

                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/demo-accounts')->with('status-success', 'تم فتح الحساب بنجاح');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/demo-accounts')->with('status-success', 'Аккаунт успешно создан');
                }else{
                    return Redirect::to('/en/cpanel/demo-accounts')->with('status-success', 'Account Created Successfully');
                }


            }else{
                //create account failed
                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/open-account')->with('status-error', 'خطأ بفتح الحساب ,حاول مرة أخرى');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/open-account')->with('status-error', 'Ошибка создания учетной записи');
                }else{
                    return Redirect::to('/en/cpanel/open-account')->with('status-error', 'Account Creation Failed');
                }

            }


        }elseif($input['account_radio_type']==1){
            //open live account

//dd('here');

            //if there is no customer account agrement or <2 documents approved
            $xx=0;
            foreach($documents as $document)
            {
                if($document->status==1){$xx++;}
            }

            if($xx < 2 ){
                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/documents')->with('status-error', 'من فضلك أرفع المستندات اولا ');;
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/documents')->with('status-error', 'Пожалуйста, сначала загрузите свои документы');;
                }else{
                    return Redirect::to('/en/cpanel/documents')->with('status-error', 'Please upload your documents first');;
                }
            }

            //     //check if he has 10 live account
            // if(count($live_accounts)>9){
            //         if( Request::segment(1) =='ar'){
            //             return Redirect::to('/ar/cpanel/open-account');
            //         }elseif( Request::segment(1) =='ru'){
            //             return Redirect::to('/ru/cpanel/open-account');
            //         }else{
            //             return Redirect::to('/en/cpanel/open-account');
            //         }
            // }


//return message without opening account in open live account

            if($input['account_group']==1){$account_group_text='Fixed Spread Account'; }elseif ($input['account_group']==5) {$account_group_text='Scalping Account';}elseif ($input['account_group']==3) {$account_group_text='Variable Spread';}elseif ($input['account_group']==4) {$account_group_text='Bonus Account';}

            if($input['account_type']==1){$account_type_text='Individual';}elseif ($input['account_type']==2) {$account_type_text='IB';}

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            $notification->notification='New Live Account Request Name='.$user->fullname.' - Type='.$account_type_text.' - gourp='.$account_group_text.' - user_id='.$user->id;
            $notification->notification_link='#open_account';
            $notification->save();





            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification="Opening account request processed successfully, you will be notified when it's done";
            $notification1->details="Opening account request processed successfully, you will be notified when it's done";

            $notification1->notification_ar='تم استلام طلب فتح الحساب بنجاح وسيتم اعلامك عند الأنتهاء';
            $notification1->details_ar='تم استلام طلب فتح الحساب بنجاح وسيتم اعلامك عند الأنتهاء';

            $notification1->notification_ru='Запрос на открытие счета обработан успешно, вы получите уведомление, когда он будет выполнен.';
            $notification1->details_ru='Запрос на открытие счета обработан успешно, вы получите уведомление, когда он будет выполнен.';

            $notification1->notification_link='/cpanel/live-accounts';
            $notification1->save();








            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=' New Open live account request <br />Name= '.$user->fullname.' <br />Type='.$account_type_text.' - <br />gourp='.$account_group_text.' - <br />user_id='.$user->id;
            $subject='New Live Account Request';
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);


            if( Request::segment(1) =='ru'){
                return Redirect::to('/ru/cpanel/live-accounts')->with('status-success', 'Запрос на открытие счета Успешно, Вы получите уведомление об этом в течение 1 часа');
            }elseif( Request::segment(1) =='ar'){
                return Redirect::to('/ar/cpanel/live-accounts')->with('status-success', 'تم استلام طلب فتح الحساب بنجاح');
            }else{
                return Redirect::to('/en/cpanel/live-accounts')->with('status-success', 'Opening account request processed successfully');
            }


//end return message without opening account in open lvie account

            $mt4password=str_random(8);
            $mt4investor=str_random(8);

            $user['email']         =$user->email;
            $user['password']      =$mt4password;
            $user['group']         =$input['account_group'];
            $user['leverage']      =$input['leverage'];
            $user['zipcode']       =$user->post_code;
            $user['country']       =$user->country;
            $user['state']         =' ';
            $user['city']          =$user->town_city;
            $user['address']       =$user->address1;
            $user['comment']       =' ';
            $user['phone_password']=' ';
            $user['status']        =' ';
            $user['id']            =$user->id;
            $user['agent']         =' ';
            $user['phone']         ='+'.$user->country_code.$user->mobile;
            $user['name']          =$user->fullname;
            $user['investor']      =$mt4investor;
            $user['send_reports']  =1;
            // $user['deposit']       =0;



            //--- prepare query
            $query="NEWACCOUNT MASTER=JMIBrokers2015|IP=$_SERVER[REMOTE_ADDR]|GROUP=$user[group]|NAME=$user[name]|".
                "PASSWORD=$user[password]|INVESTOR=$user[investor]|EMAIL=$user[email]|COUNTRY=$user[country]|".
                "STATE=$user[state]|CITY=$user[city]|ADDRESS=$user[address]|COMMENT=$user[comment]|".
                "PHONE=$user[phone]|PHONE_PASSWORD=$user[phone_password]|STATUS=$user[status]|ZIPCODE=$user[zipcode]|".
                "ID=$user[id]|LEVERAGE=$user[leverage]|AGENT=$user[agent]|SEND_REPORTS=$user[send_reports]";
            //--- send request
            $ret='error';
//---- open socket
            $ptr=@fsockopen('89.116.30.28','443',$errno,$errstr,5);
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
            if($ret == Null or $ret == 'error')
            {
                $ptr=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
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
            }

            if(strpos($ret, 'OK') !== false){

                $mt4login = substr($ret, strpos($ret, "=") + 1);

                $fx_account=new Fx_accounts;
                $fx_account->account_id=$mt4login;
                $fx_account->account_group=$input['account_group'];
                $fx_account->account_type=$input['account_type'];
                $fx_account->currency=0;
                $fx_account->leverage=$input['leverage'];
                $fx_account->account_radio_type=$input['account_radio_type'];
                $fx_account->password=$mt4password;
                $fx_account->investor_password=$mt4investor;
                $fx_account->website_accounts_id=$user->id;
                $fx_account->status=0;
                $fx_account->save();

                $notification=new Notifications;
                $notification->website_accounts_id=999999999;
                $notification->notification_status=0;
                $notification->notification=$user->email.'Has Created A New Live Account';
                $notification->notification_link='/spanel/website-accounts?&bymail='.$user->email.'&';
                $notification->save();

                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/live-accounts')->with('status-success', 'تم فتح الحساب بنجاح');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/live-accounts')->with('status-success', 'Аккаунт успешно создан');
                }else{
                    return Redirect::to('/en/cpanel/live-accounts')->with('status-success', 'Account Created Successfully');
                }



            }else{

                //create account failed
                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/open-account')->with('status-error', 'خطأ بفتح الحساب ,حاول مرة أخرى');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/open-account')->with('status-error', 'Ошибка создания учетной записи');
                }else{
                    return Redirect::to('/en/cpanel/open-account')->with('status-error', 'Account Creation Failed');

                }
            }

        }














    }



    public function individual()
    {

        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'open-account');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $live_accounts=website_accounts::find($user->id)->fx_accounts_live;
        $demo_accounts=website_accounts::find($user->id)->fx_accounts_demo;

        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | حساب شخصى";
            return view('ar.cpanel.individual',compact('title','user','notifications_all','notifications_unseen','location','demo_accounts','live_accounts'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Индивидуальный аккаунт";
            return view('ru.cpanel.individual',compact('title','user','notifications_all','notifications_unseen','location','demo_accounts','live_accounts'));
        }else{
            $title = "Control Panel | Individual Account";
            return view('cpanel.individual',compact('title','user','notifications_all','notifications_unseen','location','demo_accounts','live_accounts'));
        }

    }

    public function ib()
    {

        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'open-account');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();        $live_accounts=website_accounts::find($user->id)->fx_accounts_live;
        $demo_accounts=website_accounts::find($user->id)->fx_accounts_demo;

        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | حساب IB";
            return view('ar.cpanel.ib',compact('title','user','notifications_all','notifications_unseen','location','demo_accounts','live_accounts'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | IB аккаунт";
            return view('ru.cpanel.ib',compact('title','user','notifications_all','notifications_unseen','location','demo_accounts','live_accounts'));
        }else{
            $title = "Control Panel | IB Overview";
            return view('cpanel.ib',compact('title','user','notifications_all','notifications_unseen','location','demo_accounts','live_accounts'));
        }


    }




    public function technical()
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'landing');
        $session_user= Session::get('user');
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();

        if(isset($_GET['type'])){
            if($_GET['type'] =='gbpusd'){
                $technicalanalysis = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'1'])->orderBy('id', 'desc')->get()->take(7);
            }elseif($_GET['type'] =='eurusd'){
                $technicalanalysis = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'2'])->orderBy('id', 'desc')->get()->take(7);
            }elseif($_GET['type'] =='usdjpy'){
                $technicalanalysis = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'3'])->orderBy('id', 'desc')->get()->take(7);
            }elseif($_GET['type'] =='audusd'){
                $technicalanalysis = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'4'])->orderBy('id', 'desc')->get()->take(7);
            }elseif($_GET['type'] =='gold'){
                $technicalanalysis = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'5'])->orderBy('id', 'desc')->get()->take(7);
            }elseif($_GET['type'] =='oil'){
                $technicalanalysis = technicalanalysis::where(['technicalstatus'=>'1','technicaltype'=>'6'])->orderBy('id', 'desc')->get()->take(7);
            }else{
                $technicalanalysis = technicalanalysis::where(['technicalstatus'=>'1'])->orderBy('id', 'desc')->get()->take(7);
            }
        }else{
            $technicalanalysis = technicalanalysis::where(['technicalstatus'=>'1'])->orderBy('id', 'desc')->get()->take(7);
        }
        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | التحليل الفنى";

            return view('ar.cpanel.technical-analysis',compact('title','user','notifications_all','notifications_unseen','technicalanalysis'));
        }elseif( Request::segment(1) =='ru'){

            $title = "Панель управления | Технический анализ ";
            return view('ru.cpanel.technical-analysis',compact('title','user','notifications_all','notifications_unseen','technicalanalysis'));
        }else{

            $title = "Control Panel | Technical Analysis";
            return view('cpanel.technical-analysis',compact('title','user','notifications_all','notifications_unseen','technicalanalysis'));
        }





    }



    public function add_account()
    {




        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'add-account');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();        $live_accounts=website_accounts::find($user->id)->fx_accounts_live;
        $demo_accounts=website_accounts::find($user->id)->fx_accounts_demo;
        $documents=website_accounts::find($user->id)->documents;


        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | اضف حساب";
            return view('ar.cpanel.add-account',compact('title','user','notifications_all','notifications_unseen','location','demo_accounts','live_accounts','documents'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Добавить существующий аккаунт";
            return view('ru.cpanel.add-account',compact('title','user','notifications_all','notifications_unseen','location','demo_accounts','live_accounts','documents'));
        }else{
            $title = "Control Panel | Add Existing Account";
            return view('cpanel.add-account',compact('title','user','notifications_all','notifications_unseen','location','demo_accounts','live_accounts','documents'));
        }





    }



    public function post_add_account()
    {



        $input=Request::all();
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $live_accounts=website_accounts::find($user->id)->fx_accounts_live;
        $demo_accounts=website_accounts::find($user->id)->fx_accounts_demo;
        $documents=website_accounts::find($user->id)->documents;

        //check if profile not completed
        if($user->country =='' and $user->mobile ==''){
            if( Request::segment(1) =='ar'){
                return Redirect::to('/ar/cpanel/add-account');
            }elseif( Request::segment(1) =='ru'){
                return Redirect::to('/ru/cpanel/add-account');
            }else{
                return Redirect::to('/en/cpanel/add-account');
            }
        }


        $login=$input['account_id'];
        $password=$input['password'];

        $this->validate(Request(), [
            'account_id' => 'required',
            'password' => 'required',
            'account_group' => 'required',
        ]);


        if($input['account_radio_type']==0){
            //Add demo account

            //check if he has 3 demo accounts
            if(count($demo_accounts)>99){
                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/add-account');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/add-account');
                }else{
                    return Redirect::to('/en/cpanel/add-account');
                }
            }

            $ret='error';
            //---- open socket
            $ptr=@fsockopen('85.234.143.239','443',$errno,$errstr,5);
            //---- check connection

            if($ptr)
            {
                //---- send request
                if(fputs($ptr,"WUSERINFO-login=$login|password=$password\nQUIT\n"))
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

            }

            $fx_balance = $this->get_string_between($ret, 'Balance:', 'Equity');
            if(strpos($ret, 'Invalid Account') === false && strpos($fx_balance, '.') !== false){
                $fx_account2=Fx_accounts::where('website_accounts_id',$user->id)->where('account_id',$input['account_id'])->get()->all();
                if(count($fx_account2)>0){
                    //create account failed
                    if( Request::segment(1) =='ar'){
                        return Redirect::to('/ar/cpanel/add-account')->with('status-error', 'الحساب موجود بالفعل في قائمتك');
                    }elseif( Request::segment(1) =='ru'){
                        return Redirect::to('/ru/cpanel/add-account')->with('status-error', 'Аккаунт уже есть в вашем списке');
                    }else{
                        return Redirect::to('/en/cpanel/add-account')->with('status-error', 'Account is already exist in your list');
                    }
                }
                $fx_account=new Fx_accounts;
                $fx_account->account_id=$input['account_id'];
                $fx_account->account_type=0;
                $fx_account->account_group=$input['account_group'];
                $fx_account->currency=0;
                $fx_account->leverage=$input['leverage'];
                $fx_account->account_radio_type=$input['account_radio_type'];
                $fx_account->password=$input['password'];
                $fx_account->investor_password=$input['password'];
                $fx_account->website_accounts_id=$user->id;
                $fx_account->status=0;
                $fx_account->save();

                $notification=new Notifications;
                $notification->website_accounts_id=999999999;
                $notification->notification_status=0;
                $notification->notification=$user->email.'Has Added A New Demo Account';
                $notification->notification_link='/spanel/website-accounts?&bymail='.$user->email.'&';
                $notification->save();

                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/demo-accounts')->with('status-success', 'تم اضافة الحساب بنجاح');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/demo-accounts')->with('status-success', 'Добавление аккаунта выполнено успешно');
                }else{
                    return Redirect::to('/en/cpanel/demo-accounts')->with('status-success', 'Account Added Successfully');
                }


            }else{
                //create account failed
                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/add-account')->with('status-error', 'خطأ بفتح الحساب ,حاول مرة أخرى');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/add-account')->with('status-error', 'Ошибка добавления аккаунта');
                }else{
                    return Redirect::to('/en/cpanel/add-account')->with('status-error', 'Adding Account Failed');
                }

            }


        }elseif($input['account_radio_type']==1){
            //open live account

            //if there is no customer account agrement or <2 documents approved
            $xx=0;
            foreach($documents as $document)
            {
                if($document->type==8&&$document->status==1){$xx++;}
            }

            //  if($xx==0 || count($documents) <2 ){
            //     if( Request::segment(1) =='ar'){
            //         return Redirect::to('/ar/cpanel/add-account');
            //     }else{
            //        return Redirect::to('/en/cpanel/add-account');
            //     }
            //  }

            //check if he has 3 live accounts

            if(count($live_accounts)>99){
                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/add-account');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/add-account');
                }else{
                    return Redirect::to('/en/cpanel/add-account');
                }
            }







            $ret='error';
            //---- open socket
            $ptr=@fsockopen('89.116.30.28','443',$errno,$errstr,5);
            //---- check connection
            if($ptr)
            {
                //---- send request
                if(fputs($ptr,"WUSERINFO-login=$login|password=$password\nQUIT\n"))
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

            }
            if($ret == Null or $ret == 'error')
            {
                //---- open socket
                $ptr=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
                //---- check connection
                if($ptr)
                {
                    //---- send request
                    if(fputs($ptr,"WUSERINFO-login=$login|password=$password\nQUIT\n"))
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

                }
            }

            $fx_account2=Fx_accounts::where('website_accounts_id',$user->id)->where('account_id',$input['account_id'])->get()->all();
            if(count($fx_account2)>0){
                //create account failed
                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/add-account')->with('status-error', 'الحساب موجود بالفعل في قائمتك');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/add-account')->with('status-error', 'Аккаунт уже есть в вашем списке');
                }else{
                    return Redirect::to('/en/cpanel/add-account')->with('status-error', 'Account is already exist in your list');
                }
            }

            $fx_balance = $this->get_string_between($ret, 'Balance:', 'Equity');
            if(strpos($ret, 'Invalid Account') === false && strpos($fx_balance, '.') !== false){

                $fx_account=new Fx_accounts;
                $fx_account->account_id=$input['account_id'];
                $fx_account->account_group=$input['account_group'];
                $fx_account->account_type=$input['account_type'];
                $fx_account->currency=0;
                $fx_account->leverage=500;
                $fx_account->account_radio_type=$input['account_radio_type'];
                $fx_account->password=$input['password'];
                $fx_account->investor_password=$input['password'];
                $fx_account->website_accounts_id=$user->id;
                $fx_account->status=0;
                $fx_account->save();


                $notification=new Notifications;
                $notification->website_accounts_id=999999999;
                $notification->notification_status=0;
                $notification->notification=$user->email.'Has Added A New Live Account';
                $notification->notification_link='/spanel/website-accounts?&bymail='.$user->email.'&';
                $notification->save();


                $notification1=new Notifications;
                $notification1->website_accounts_id=$user->id;
                $notification1->notification_status=0;
                $notification1->notification="Account number ".$input['account_id']." has been added to your account list successfully";
                $notification1->details="Account number ".$input['account_id']." has been added to your account list successfully";

                $notification1->notification_ar='تمت إضافة رقم الحساب '.$input['account_id'].' إلى قائمة حسابك بنجاح';
                $notification1->details_ar='تمت إضافة رقم الحساب '.$input['account_id'].' إلى قائمة حسابك بنجاح';

                $notification1->notification_ru='Номер счета '.$input['account_id'].' успешно добавлен в список ваших учетных записей.';
                $notification1->details_ru='Номер счета '.$input['account_id'].' успешно добавлен в список ваших учетных записей.';

                $notification1->notification_link='/cpanel/live-accounts';
                $notification1->save();


                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/live-accounts')->with('status-success', 'تم اضافة الحساب بنجاح');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/live-accounts')->with('status-success', 'Добавление аккаунта выполнено успешно');
                }else{
                    return Redirect::to('/en/cpanel/live-accounts')->with('status-success', 'Account Added Successfully');
                }


            }else{
                //create account failed
                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/add-account')->with('status-error', 'خطأ بفتح الحساب ,حاول مرة أخرى');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/add-account')->with('status-error', 'Ошибка добавления аккаунта');
                }else{
                    return Redirect::to('/en/cpanel/add-account')->with('status-error', 'Adding Account Failed');
                }

            }









        }














    }


    public function demo_accounts()
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'demo-accounts');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $accounts=website_accounts::find($user->id)->fx_accounts_demo;

        $balances=array();
        $equities=array();
        $names=array();
        $account_history=array();


        foreach($accounts as $account){

            $ret='error';
            $ret2='error';
            //---- open socket
            $ptr=@fsockopen('85.234.143.239','443',$errno,$errstr,5);
            //---- check connection
            if($ptr)
            {
                //---- send request
                if(fputs($ptr,"WUSERINFO-login=$account->account_id|password=$account->password\nQUIT\n"))
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



            }

            //account history
            $startTime = mktime(0, 0, 0, 1, 1, date('Y')-4);    //last 3 years
            $endTime = time();  // current time

            $ptr2=@fsockopen('85.234.143.239','443',$errno,$errstr,5);
            //---- check connection
            if($ptr2)
            {
                //---- send request
                if(fputs($ptr2,"WUSERHISTORY-login=$account->account_id|password=$account->password|from=$startTime|to=$endTime\nQUIT\n"))
                {
                    //---- clear default answer
                    $ret3='';
                    //---- receive answer
                    while(!feof($ptr2))
                    {
                        $line2=fgets($ptr2,128);
                        if($line2=="end\r\n") break;
                        $ret3.= $line2;
                    }
                }


            }


            $fx_balance = $this->get_string_between($ret, 'Balance:', 'Equity');
            $fx_equity = $this->get_string_between($ret, 'Equity:', 'Margin');
            $fx_name = $this->get_string_between($ret, "$account->account_id", '202');

            $ret2 = $ret3;

            array_push($balances, $fx_balance);
            array_push($equities, $fx_equity);
            array_push($names, $fx_name);
            array_push($account_history, $ret2);

        }

        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | الحسابات الديمو ";
            return view('ar.cpanel.demo-accounts',compact('title','user','notifications_all','notifications_unseen','location','accounts','balances','equities','names','account_history'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Демо-счета ";
            return view('ru.cpanel.demo-accounts',compact('title','user','notifications_all','notifications_unseen','location','accounts','balances','equities','names','account_history'));
        }else{
            $title = "Control Panel | Demo Accounts";
            return view('cpanel.demo-accounts',compact('title','user','notifications_all','notifications_unseen','location','accounts','balances','equities','names','account_history'));
        }

    }


    public function export_account_history()
    {
        return 1;
    }

    public function live_accounts()
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'live-accounts');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $accounts=website_accounts::find($user->id)->fx_accounts_live;


        $balances=array();
        $equities=array();
        $names=array();
        $account_history=array();


        foreach($accounts as $account){

            $ret='error';
            //---- open socket
            //$ptr=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
            $ptr=@fsockopen('89.116.30.28','443',$errno,$errstr,5);
            //---- check connection
            if($ptr)
            {
                //---- send request
                if(fputs($ptr,"WUSERINFO-login=$account->account_id|password=$account->password\nQUIT\n"))
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

            }
            if($ret == Null or $ret =='error')
            {
                //---- open socket
                //$ptr=@fsockopen('89.116.30.28','443',$errno,$errstr,5);
                $ptr=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
                //---- check connection
                if($ptr)
                {
                    //---- send request
                    if(fputs($ptr,"WUSERINFO-login=$account->account_id|password=$account->password\nQUIT\n"))
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

                }
            }

            //account history
            $startTime = mktime(0, 0, 0, 1, 1, date('Y')-3);    //last 3 years
            $endTime = time();  // current time
            $ret3='error';

            //$ptr2=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
            $ptr2=@fsockopen('89.116.30.28','443',$errno,$errstr,5);

            //---- check connection
            if($ptr2)
            {
                //---- send request
                if(fputs($ptr2,"WUSERHISTORY-login=$account->account_id|password=$account->password|from=$startTime|to=$endTime\nQUIT\n"))
                {
                    //---- clear default answer
                    $ret3='';
                    //---- receive answer
                    while(!feof($ptr2))
                    {
                        $line2=fgets($ptr2,128);
                        if($line2=="end\r\n") break;
                        $ret3.= $line2;
                    }
                }
            }
            if($ret3 == Null or $ret3 =='error')
            {
                $ptr2=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
                //$ptr2=@fsockopen('89.116.30.28','443',$errno,$errstr,5);
                //---- check connection
                if($ptr2)
                {
                    //---- send request
                    if(fputs($ptr2,"WUSERHISTORY-login=$account->account_id|password=$account->password|from=$startTime|to=$endTime\nQUIT\n"))
                    {
                        //---- clear default answer
                        $ret3='';
                        //---- receive answer
                        while(!feof($ptr2))
                        {
                            $line2=fgets($ptr2,128);
                            if($line2=="end\r\n") break;
                            $ret3.= $line2;
                        }
                    }
                }
            }

            $fx_balance = $this->get_string_between($ret, 'Balance:', 'Equity');
            $fx_equity = $this->get_string_between($ret, 'Equity:', 'Margin');
            $fx_name = $this->get_string_between($ret, "$account->account_id", '202');

            $ret2 = $ret3;

            array_push($balances, $fx_balance);
            array_push($equities, $fx_equity);
            array_push($names, $fx_name);
            array_push($account_history, $ret2);

        }

        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | الحسابات الحقيقية ";
            return view('ar.cpanel.live-accounts',compact('title','user','notifications_all','notifications_unseen','location','accounts','balances','equities','names','account_history'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | реальные счета ";
            return view('ru.cpanel.live-accounts',compact('title','user','notifications_all','notifications_unseen','location','accounts','balances','equities','names','account_history'));
        }else{
            $title = "Control Panel | Live Accounts";
            return view('cpanel.live-accounts',compact('title','user','notifications_all','notifications_unseen','location','accounts','balances','equities','names','account_history'));
        }


    }










    public function delete_fx_accounts($id)
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'documents');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $input=Request::all();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $account=fx_accounts::where('id',$id)->where('website_accounts_id',$user->id)->get()->first();
        $account->status=5;
        $account->save();


        $notification=new Notifications;
        $notification->website_accounts_id=999999999;
        $notification->notification_status=0;
        $notification->notification=$user->email.'Has Request Account Deleting';
        $notification->notification_link='/spanel/website-accounts?&bymail='.$user->email.'&';
        $notification->save();


        $notification1=new Notifications;
        $notification1->website_accounts_id=$user->id;
        $notification1->notification_status=0;
        $notification1->notification="Account deleting request processed successfully, You will be notified when it's done.";
        $notification1->details="Account deleting request processed successfully, You will be notified when it's done.";

        $notification1->notification_ar='تمت استلام طلب حذف  الحساب بنجاح ، وسيتم إعلامك عند الانتهاء';
        $notification1->details_ar='تمت استلام طلب حذف  الحساب بنجاح ، وسيتم إعلامك عند الانتهاء';

        $notification1->notification_ru='Запрос на удаление учетной записи успешно обработан, вы получите уведомление, когда это будет сделано.';
        $notification1->details_ru='Запрос на удаление учетной записи успешно обработан, вы получите уведомление, когда это будет сделано.';

        $notification1->notification_link='/cpanel/live-accounts';
        $notification1->save();


        // Backup your default mailer
        $backup = Mail::getSwiftMailer();
        $data['title']=1;
        $data['name']='Admin';
        $data['details']='FX Account '.$id.' deleting request <br />Email= '.$user->email.' - <br />user_id='.$user->id;
        $subject='FX Account '.$id.' deleting Request';
        Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
        // Restore your original mailer
        Mail::setSwiftMailer($backup);

        return redirect()->back();




    }





    public function update_fx_accounts($id)
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'documents');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $input=Request::all();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();


        $account=fx_accounts::where('id',$id)->where('website_accounts_id',$user->id)->get()->first();
//check of password
        $query="|MODE=7|LOGIN=".$account->account_id."|[CPASS=".$input['old_password'];
        //--- prepare query
//change real master password
        $query1 ="|MODE=2|LOGIN=".$account->account_id."|CPASS=".$input['old_password']."|NPASS=".$input['password']."|TYPE=0";
        //change investor password
        $query2 ="|MODE=2|LOGIN=".$account->account_id."|CPASS=".$input['old_password']."|NPASS=".$input['investor_password']."|TYPE=1";

        //--- send request
        $ret='error';
//---- open socket
        $q = "WMQWEBAPI MASTER=jmi2020".$query."\nQUIT\n";
        $ptr=@fsockopen('89.116.30.28','443',$errno,$errstr,5);
//---- check connection
        if($ptr)
        {
            //---- send request
            if(fputs($ptr,$q)!=FALSE)
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

        if($ret == Null or $ret == 'error')
        {
            $ptr=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
//---- check connection
            if($ptr)
            {
                //---- send request
                if(fputs($ptr,$q)!=FALSE)
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
        }

        $ret = substr($ret,0,strlen($ret)-1);
        $result = json_decode($ret);

        //result 0  means success
        if($result->result==1 || $result->result==5){
            //print_r($result);return 1l
            if( Request::segment(1) =='ar'){
                return Redirect::to('/ar/cpanel/live-accounts')->with('status-error', 'بيانات غير صالحة');
            }elseif( Request::segment(1) =='ru'){
                return Redirect::to('/ru/cpanel/live-accounts')->with('status-error', 'Неверные данные');
            }else{
                return Redirect::to('/en/cpanel/live-accounts')->with('status-error', 'Invalid Data');
            }
        }

        if($result->result==6){

            if( Request::segment(1) =='ar'){
                return Redirect::to('/ar/cpanel/live-accounts')->with('status-error', 'الرصيد غير كافي');
            }elseif( Request::segment(1) =='ru'){
                return Redirect::to('/ru/cpanel/live-accounts')->with('status-error', 'Нет достаточно денег');
            }else{
                return Redirect::to('/en/cpanel/live-accounts')->with('status-error', 'No Enough Money');
            }
        }

        if($result->result==0){
            $ret1='error';
            $q = "WMQWEBAPI MASTER=jmi2020".$query2."\nQUIT\n";
            $ptr=@fsockopen('89.116.30.28','443',$errno,$errstr,5);
//---- check connection
            if($ptr)
            {
                //---- send request
                if(fputs($ptr,$q)!=FALSE)
                {
                    //---- clear default answer
                    $ret1='';
                    //---- receive answer
                    while(!feof($ptr))
                    {
                        $line=fgets($ptr,128);
                        if($line=="end\r\n") break;
                        $ret1.= $line;
                    }
                }
                fclose($ptr);
            }

            if($ret1 == Null or $ret1 == 'error')
            {
                $q = "WMQWEBAPI MASTER=jmi2020".$query2."\nQUIT\n";
                $ptr=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
//---- check connection
                if($ptr)
                {
                    //---- send request
                    if(fputs($ptr,$q)!=FALSE)
                    {
                        //---- clear default answer
                        $ret1='';
                        //---- receive answer
                        while(!feof($ptr))
                        {
                            $line=fgets($ptr,128);
                            if($line=="end\r\n") break;
                            $ret1.= $line;
                        }
                    }
                    fclose($ptr);
                }
            }

            $ret1 = substr($ret1,0,strlen($ret1)-1);
            $result1 = json_decode($ret);

            $ret2='error';
            $q = "WMQWEBAPI MASTER=jmi2020".$query1."\nQUIT\n";
            $ptr=@fsockopen('89.116.30.28','443',$errno,$errstr,5);
//---- check connection
            if($ptr)
            {
                //---- send request
                if(fputs($ptr,$q)!=FALSE)
                {
                    //---- clear default answer
                    $ret2='';
                    //---- receive answer
                    while(!feof($ptr))
                    {
                        $line=fgets($ptr,128);
                        if($line=="end\r\n") break;
                        $ret2.= $line;
                    }
                }
                fclose($ptr);
            }

            if($ret2 == Null or $ret2 == 'error')
            {
                $q = "WMQWEBAPI MASTER=jmi2020".$query1."\nQUIT\n";
                $ptr=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
//---- check connection
                if($ptr)
                {
                    //---- send request
                    if(fputs($ptr,$q)!=FALSE)
                    {
                        //---- clear default answer
                        $ret2='';
                        //---- receive answer
                        while(!feof($ptr))
                        {
                            $line=fgets($ptr,128);
                            if($line=="end\r\n") break;
                            $ret2.= $line;
                        }
                    }
                    fclose($ptr);
                }
            }

            $ret2 = substr($ret2,0,strlen($ret2)-1);
            $result2 = json_decode($ret2);

            if($result1->result ==0 && $result2->result==0){


                $account=fx_accounts::where('id',$id)->where('website_accounts_id',$user->id)->get()->first();
                $account->password=$input['password'];
                $account->investor_password=$input['investor_password'];
                $account->save();


                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/live-accounts')->with('status-success', 'تم تغيير كلمة السر بنجاح');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/live-accounts')->with('status-success', 'Пароль успешно изменен');
                }else{
                    return Redirect::to('/en/cpanel/live-accounts')->with('status-success', 'Password Changed Successfully');
                }



            }else{
                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/cpanel/live-accounts')->with('status-error', 'فشل تغيير كلمة السر');
                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/cpanel/live-accounts')->with('status-error', 'Не удалось изменить пароль');
                }else{
                    return Redirect::to('/en/cpanel/live-accounts')->with('status-error', 'Password Change Failed');
                }

            }

        }




    }



    public function edit_fx_accounts($id)
    {

        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'documents');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $input=Request::all();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();

//return message without opening account in open live account

        if($input['account_group']==1){$account_group_text='Variable Spread'; }elseif ($input['account_group']==5) {$account_group_text='Variable Spread + Bonus';}elseif ($input['account_group']==2) {$account_group_text='ECN Live';}elseif ($input['account_group']==3) {$account_group_text='Fixed Spread';}elseif ($input['account_group']==4) {$account_group_text='Fixed Spread + Bonus';}

        if($input['account_type']==1){$account_type_text='Individual';}elseif ($input['account_type']==2) {$account_type_text='IB';}



        $notification=new Notifications;
        $notification->website_accounts_id=999999999;
        $notification->notification_status=0;
        $notification->notification='Live Account Edit Request - Type='.$account_type_text.' - leverage='.$input['leverage'].' - gourp='.$account_group_text.' - Account_id='.$id.' - user_id='.$user->id.' - Login='.$input['account_login'];
        $notification->notification_link='#edit_account';
        $notification->save();




        $notification1=new Notifications;
        $notification1->website_accounts_id=$user->id;
        $notification1->notification_status=0;
        $notification1->notification="Account editing request processed successfully, You will be notified when it's done.";
        $notification1->details="Account editing request processed successfully, You will be notified when it's done.";

        $notification1->notification_ar='تمت استلام طلب تعديل بيانات الحساب بنجاح ، وسيتم إعلامك عند الانتهاء';
        $notification1->details_ar='تمت استلام طلب تعديل بيانات الحساب بنجاح ، وسيتم إعلامك عند الانتهاء';

        $notification1->notification_ru='Запрос на редактирование учетной записи успешно обработан, вы получите уведомление, когда оно будет выполнено.';
        $notification1->details_ru='Запрос на редактирование учетной записи успешно обработан, вы получите уведомление, когда оно будет выполнено.';

        $notification1->notification_link='/cpanel/live-accounts';
        $notification1->save();




        // Backup your default mailer
        $backup = Mail::getSwiftMailer();
        $data['title']=1;
        $data['name']='Admin';
        $data['details']=' New Edit live account request <br /> Type='.$account_type_text.'<br /> - leverage='.$input['leverage'].'<br /> - gourp='.$account_group_text.'<br /> - Account_id='.$id.'<br /> - user_id='.$user->id.'<br /> - Login='.$input['account_login'];
        $subject='Live Account Edit Request';
        Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
        // Restore your original mailer
        Mail::setSwiftMailer($backup);


        if( Request::segment(1) =='ar'){
            return Redirect::to('/ar/cpanel/live-accounts')->with('status-success', 'تم طلب تعديل حساب بنجاح وسيتم ابلاغك بفتح الحساب فى خلال ساعة عمل');
        }elseif( Request::segment(1) =='ru'){
            return Redirect::to('/ru/cpanel/live-accounts')->with('status-success', 'Запрос на открытие счета Успешно, Вы получите уведомление об этом в течение 1 часа');
        }else{
            return Redirect::to('/en/cpanel/live-accounts')->with('status-success', 'Account has been edited successfully. You will recieve a notification during one business hour');
        }



    }










    public function deposit_fund()
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'deposit-fund');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $accounts=website_accounts::find($user->id)->fx_accounts_live;


        $invoices=invoices::where('user_id',$user->id)->orderBy('id','desc')->get()->all();




        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | ايداع ";
            return view('ar.cpanel.deposit-fund',compact('title','user','notifications_all','notifications_unseen','location','accounts','invoices'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | депозит ";
            return view('ru.cpanel.deposit-fund',compact('title','user','notifications_all','notifications_unseen','location','accounts','invoices'));
        }else{
            $title = "Control Panel | Deposit";
            return view('cpanel.deposit-fund',compact('title','user','notifications_all','notifications_unseen','location','accounts','invoices'));
        }

    }


    public function request_invoice()
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'documents');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();

        $input=Request::all();

        $this->validate(Request(), [
            'type' => 'required|regex:/^[0-9]*$/|min:1|max:9',
            'amount' => 'required|regex:/^[0-9]*$/|min:1|max:9',
            'fullname' => 'required|alpha_spaces|max:80',
        ]);

        $newfilename='invoice_'.time();

        $invoice=new invoices;
        $invoice->user_id=$user->id;
        $invoice->fullname=$input['fullname'];
        $invoice->amount=$input['amount'];
        $invoice->account_number=$input['account_number'];
        $invoice->type=1;
        $invoice->filename=$newfilename;
        if($invoice->save()){

            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification="Requested invoice and bank details have been sent successfully to your mail,  Please provide your bank with invoice to facilitate your payment.";
            $notification1->details="Requested invoice and bank details have been sent successfully to your mail,  Please provide your bank with invoice to facilitate your payment.";

            $notification1->notification_ar='تم إرسال الفاتورة المطلوبة والتفاصيل المصرفية بنجاح إلى بريدك ، يرجى تزويد البنك الذي تتعامل معه بالفاتورة لتسهيل عملية الدفع.';
            $notification1->details_ar='تم إرسال الفاتورة المطلوبة والتفاصيل المصرفية بنجاح إلى بريدك ، يرجى تزويد البنك الذي تتعامل معه بالفاتورة لتسهيل عملية الدفع.';

            $notification1->notification_ru='Запрошенный счет-фактура и банковские реквизиты были успешно отправлены на вашу почту. Пожалуйста, предоставьте своему банку счет-фактуру, чтобы облегчить вашу оплату.';
            $notification1->details_ru='Запрошенный счет-фактура и банковские реквизиты были успешно отправлены на вашу почту. Пожалуйста, предоставьте своему банку счет-фактуру, чтобы облегчить вашу оплату.';

            $notification1->notification_link='/cpanel/deposit-fund';
            $notification1->save();



            PDF::loadHTML('<!DOCTYPE html>
         <html>
         	<head>
         		<title>PROFORMA INVOICE</title>
         		         		<style>
         			@media only screen and (max-width: 1100px) {
         				body
         				{
         					padding: 30px 130px !important;
         				}
         			}
         			@media only screen and (max-width: 992px) {
         				body
         				{
         					padding: 30px 80px !important;
         				}
         			}
         			@media only screen and (max-width: 768px) {
         				body
         				{
         					padding: 30px 40px !important;
         				}
         				.table1 td, .table1 th
         				{
         					font-size:18px !important;
         				}
         				.header .fr h1
         				{
         					font-size: 28px !important;
         				}
         				.header .emptyDiv
         				{
         			    width: 47% !important;
         			    margin-left: 20px !important;
         				}
         				.footer h3
         				{
         					font-size: 15px !important;
         				}
         				.footer li img
         				{
             			width: 28px !important;
         				}
         				.footer .web img
         				{
         			    width: 50px !important;
         			    margin-left: 8px !important;
         				}
         			}
         			@media only screen and (max-width: 600px) {
         				body
         				{
         					padding: 30px 10px !important;
         				}
         				h3 ,.table4H
         				{
         					font-size: 16px !important;
         				}
         				#JMI ,.orangeText
         				{
         					font-size: 19px !important;
         				}
         				.grayText ,.sortedText
         				{
         					font-size: 15px;
         				}
         				.table2 td
         				{
         					font-size: 13px;
         				}
         				.table4P
         				{
         					font-size: 13px;
         				}
         				.header .fr h1
         				{
         					font-size: 20px !important;
         				}
         				.header .emptyDiv
         				{
         					height: 25px !important;
         					margin-left: 10px !important;
         				}
         				.footer h3
         				{
         					font-size: 10px !important;
         				}
         				.footer li img
         				{
             			width:20px !important;
         					margin: 0px 2px !important;
         				}
         				.footer .web img
         				{
         			    width: 40px !important;

         				}
         			}
         			body
         			{
         				padding: 30px 170px;
         				color: #636366;
         				overflow-x:hidden;
         			}
         			h3
         			{
         				font-size:20px;
         			}
         			hr
         			{
         				border-top: 3px solid #636366 !important;

         			}
         			.table2
         			{
         				margin-bottom: 50px !important;

         			}
         			.table2 td
         			{
         				font-size: 16px;
         				color: black;
         				border:none !important;
         			}
         			.table2 td:nth-child(2)
         			{
         				font-weight: bold;
         			}
         			.table2 tr:last-child td:nth-child(2)
         			{
         				color: #0358b5;
         			}
         			.table-striped>tbody>tr:nth-of-type(odd) {
         				background-color: #e2e3e2 !important;
         			}
         			.sortedText
         			{
         				color: black;
         				font-size: 20px;
         				font-weight: bold;
                margin-bottom:0px;
                margin-top:50px;
         			}
         			.orangeText
         			{
         				background-color: #ffca26;
         				color: #365f91;
         				font-weight: bold;
         				padding: 4px;
         				margin-top:10px ;
         			}
         			.topTextH4,.topTextH3,#JMI
         			{
         				font-weight: bold;
         				text-align: center;
         			}
         			#JMI
         			{
         				font-size: 24px;
         			}
         			#Effective
         			{
         				font-weight: bold;
         				font-size: 19px;
         			}
         			.topTextH4
         			{
         				color: #636366;
         			}
         			.topTextH3
         			{
         				color:#0358b5 ;
         			}
         			.grayText
         			{
         				color: #737373;
         				font-size: 18px;

         			}
         			.table4H
         			{
         				color:#0358b5 ;
         			}
         			.table4P
         			{
         				color: #737373;
         				font-size: 15px;
         				padding-left: 15px;
         				margin-bottom:70px ;
         			}
         			.block h2
         			{
         				font-weight:normal ;
         				margin:5px !important;
         				font-size:15px !important;
         			}
         			.block
         			{
         				margin:10px 0px;
         			}
         			.block .bold
         			{
         				font-weight:bold ;
         			}
         			.table1
         			{
         				width:100%;
         				margin-bottom:70px;
         				border-collapse: separate;
         				border-spacing: 2px;
         			}
         			.table1 th, .table1 td:first-child
         			{
         				border: 2px solid #636366 !important;
         				width:60%;
         				font-size:15px;
         				color: #636366;
         			}
         			.table1 td:nth-child(2)
         			{
         				font-weight: bold;
         				text-align: center;
             		vertical-align: middle;
         			}
         			.table1 th, .table1 td
         			{
         				border: 2px solid #636366 !important;
         				width:40%;
         				font-size:15px;
         				color: #636366;
         			}
         			#empty
         			{
         				border: 0px solid #e9e9e9 !important;
         			}


                    @page
                    {

                        margin: 0px;
                    }
                    .content
         			{
                        background-image:url("/assets/m/img/new-4.jpg");
                        background-repeat: no-repeat;
                        background-attachment: fixed;
                        background-position: center;
                        position: fixed;
                        top: 0px;
                        left: 0px;
                        right: 0px;
                        bottom:0px;
                        height:100vh;
                        z-index:-1;
         			}


         			.header
         			{
                        position: absolute;

                        left: 50px;
                        right: 0px;
                        top:0px;
                        margin-bottom:50px;
         			}
         			.footer
                     {
                        position: absolute;

                        left: 0px;
                        right: 0px;
                        bottom:0px;

                     }
         			.footer img
         			{
             			margin-right: 50px;
         			}
         		</style>
         	</head>
         	<body>

            <div class="content">

            </div>
            <div class="header">
                <img src="/assets/m/img/new-1.png">
            </div>
           <div style="width:100%;height:320px;margin-top: 80px;">

               <div style="width:50%;float:left;">
                   <div class="block">
                     <h2>JMI BROKERS LTD</h2>
                     <h2>1276, Govant Building, Kumul Highway</h2>
                     <h2>Port Vila, Republic of Vanuatu</h2>
                     <h2>15010</h2>
                   </div>
                   <div class="block">
                     <h2>Phone: +678-24404</h2>
                     <h2>Email: finance@jmibrokers.com</h2>
                     </div>
                     <div class="block">
                       <hr style="height:1px;color:#eee;background:#eee;" />
                     </div>
                     <div class="block">
                     <h2 class="bold">Tax number: 608848</h2>
                     <h2 class="bold">Invoice details</h2>
                     <h2 class="bold">Date: '.date("d-m-Y").'</h2>
                     <h2 class="bold">Reference PROFORMA INVOICE 000'.$invoice->id.'-2021</h2>
                   </div>
               </div>
               <div style="width:40%;float:left; margin-left:10%;">
                   <div class="block">
                     <h3 class="bold" style="margin:5px 0px;"> '.$input['fullname'].'</h3>
                     <p class="no-bottom-margin"> '.$input['address'].'</p>
                     <p class="no-bottom-margin"> '.$input['city'].'</p>
                     <p class="no-bottom-margin"> '.$input['country'].'</p>
                     <p class="no-bottom-margin" style="font-weight:bold;">Funding Account Number: '.$input['account_number'].'</p>

                   </div>
               </div>

           </div>


         		<table class="table1 table">
         			<thead>
         			  <tr>
         				<th>Description</th>
         				<th>Unit Price</th>
         			  </tr>
         			</thead>
         			<tbody>
         			  <tr>
         				<td>Trading Securities <br />
         					Securities" means (as from the 2012 amendment) - (a)
         					shares in the share capital of a corporation; or (b)
         					an instrument that creates and acknowledges the indebt
         					- securities that is issued by a corporation or a public
         					office including: (i) debentures; or (ii) debenture stock;
         					or (iii) loan stock; or (iv) bonds; or (v) certifications
         					of deposit; or (c) a right, despite whether or not conferred
         					by warrant, to subscribe for shares or debt securities; or (d)
         					a right under a depositary receipt; or (e) an option to acquire
         					or dispose of any security falling within any other provision of
         					this Act; or (f) a right under a contract for the acquisition or
         					disposal of the relevant securities under which the delivery is
         					to be made at a future date and at a price agreed when the contract
         					is made in accordance with the
         					terms of that contract; or (g) the proceeds of Foreign Exchange; (h)
         					the proceeds of precious metals; or (i) the proceeds of commodities.
         				</td>
         				<td>USD '.$input['amount'].'</td>
         			  </tr>
         			  <tr>
         				<td id="empty"></td>
         				<td>
         					<div>Subtotal USD '.$input['amount'].'</div>
         					<div>Total USD '.$input['amount'].'</div>
         				</td>
         			  </tr>
         			</tbody>
         		</table>

                 <h4 style="margin-top:210px;" class="topTextH4">Standard Settlement Instructions (SSIs) for Sending Wire Transfers to your trading accounts</h4>
                 <h3 class="topTextH3">Valid from 30<sup>th</sup> of June, 2021</h3>
         		<hr>
         		<h2 id="JMI">JMI Brokers ltd STANDART SETTLEMENT INSTRUCTIONS</h2>
         		<h3 id="Effective">Effective30<sup>th</sup> of June 2021, use these instructions to wire funds into your account</h3>
         		<p class="grayText">If these instructions are not used, the payment may be delayed, fail to reach your account, or be charged with
         			additional fees.</p>
         		<p class="grayText">In the first two pages you will find SEPA details. In the third and fourth pages you will find SWIFT details for EUR
         			and USD transfers.</p>

              <h3 class="sortedText">USD : United States Dollar </h3>
              <h3 class="orangeText">USD : BSL GROUP </h3>
              <table class="table table-striped">
                  <tbody>
                  <tr>
                      <td>Beneficiary / Reciever :</td>
                      <td> Prime Trust, LLC</td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Reciever’s Address : </td>
                      <td>330 S Rampart Ave, Suite 260, Las Vegas, NV 89145,
                      UNITED STATES  </td>
                  </tr>
                  <tr>
                      <td>Account Number </td>
                      <td>2030136050 </td>
                  </tr>
                  <tr>
                      <td>Beneficiary Bank :</td>
                      <td>Royal Business Bank </td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Receiver Bank Address :</td>
                      <td>1055 Wilshire Blvd. Suite 1200, Los Angeles CA 90017
                      UNITED STATES  </td>
                  </tr>
                  <tr>
                      <td>Beneficiary FI Routing Number :</td>
                      <td>RBBCUS6L </td>
                  </tr>
                  <tr>
                      <td>Reference Message / Details :</td>
                      <td> QCCUST4NX Pacific Private Bank Limited JMI Brokers ltd-( ) </td>
                  </tr>
                  </tbody>
              </table>

              <h3 style="margin-top:100px;"  class="sortedText"> GBP : Great Britain Pound</h3>
              <h3 class="orangeText"> GBP : Financial House Ltd</h3>
              <table class="table table-striped">
                  <tbody>
                  <tr>
                      <td>Beneficiary / Reciever :</td>
                      <td>Financial House Limited </td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Reciever’s Address : </td>
                      <td>6 Bevis Marks Building, 1st floor, Bury Court London, England, EC3A  </td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Reciever’s Bank :      </td>
                      <td>CLEARANK </td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Receiver Bank Address :</td>
                      <td> Prologue works Floor 4 , 25 marsh st , Bristol , United Kingdom      </td>
                  </tr>
                  <tr>
                      <td>SWIFT BIC :</td>
                      <td>CLRBGB22XXX </td>
                  </tr>
                  <tr>
                      <td>IBAN :    </td>
                      <td> GB78 CLRB 04055 1000 00303</td>
                  </tr>
                  <tr>
                      <td>Reference Message / Details :</td>
                      <td>JMI Brokers ltd-( )  </td>
                  </tr>
                  </tbody>
              </table>
              <h3  class="sortedText">EUR : Euro </h3>
              <h3 class="orangeText">EUR : SEPA ONLY – UAB Pervesk </h3>
              <table class="table table-striped">
                  <tbody>
                  <tr>
                      <td>Beneficiary / Reciever :</td>
                      <td>Pacific Private Bank Limited </td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Reciever’s Address :    </td>
                      <td>6 Bevis Marks Building, 1st floor, Bury Court London, England, EC3A </td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Reciever’s Bank : </td>
                      <td>UAB Pervesk </td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Reciever’s Bank Address :   </td>
                      <td> Rinktines st. 5, LT-09234 Vilnius, Lithuania</td>
                  </tr>
                  <tr>
                      <td>SWIFT BIC :</td>
                      <td> UAPELT22XXX</td>
                  </tr>
                  <tr>
                      <td>IBAN :    </td>
                      <td> LT73 3550 0200 0000 1699</td>
                  </tr>
                  <tr>
                      <td>Reference Message / Details :</td>
                      <td>JMI Brokers ltd-( ) </td>
                  </tr>
                  </tbody>
              </table>

              <h3 style="margin-top:50px;" class="orangeText">EUR : SEPA ONLY – UAB Verified Payments </h3>
              <table class="table table-striped">
                  <tbody>
                  <tr>
                      <td>Beneficiary / Reciever :</td>
                      <td>Pacific Private Bank Limited </td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Reciever’s Address :     </td>
                      <td>6 Bevis Marks Building, 1st floor, Bury Court London, England, EC3A </td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Reciever’s Bank :    </td>
                      <td> UAB Verified Payments</td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Reciever’s Bank Address :   </td>
                      <td> GEDIMINO AV . 20 . Vilnius - Lithuania</td>
                  </tr>
                  <tr>
                      <td>SWIFT BIC :</td>
                      <td> VEPALT21XXX</td>
                  </tr>
                  <tr>
                      <td>IBAN :   </td>
                      <td> LT91 3750 0200 0000 0008</td>
                  </tr>
                  <tr>
                      <td>Reference Message / Details :</td>
                      <td> JMI Brokers ltd-( )     </td>
                  </tr>
                  </tbody>
              </table>


              <h3 style="margin-top:50px;" class="orangeText"> GBP - Financial House Ltd - UK Domestic Transfer </h3>
              <table class="table table-striped">
                  <tbody>
                  <tr>
                      <td>Beneficiary / Reciever :</td>
                      <td>Financial House Limited </td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Reciever’s Address :     </td>
                      <td>6 Bevis Marks Building, Is floor, Bury Court London, England, EC3A </td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Reciever’s Bank :    </td>
                      <td> CLEARBANK</td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Reciever’s Bank Address :   </td>
                      <td> PROLOGUE WORKS, FLOOR 4, 25 MARSH ST, BRISTOL United Kingdom </td>
                  </tr>
                  <tr>
                      <td>SWIFT BIC :</td>
                      <td> CLRBGB22XXX </td>
                  </tr>
                  <tr>
                      <td>Sort Code :   </td>
                      <td> 040551</td>
                  </tr>
                  <tr>
                  <td>Account Number: :   </td>
                     <td> 00000303</td>
                  </tr>
                  <tr>
                      <td>Reference Message  :</td>
                      <td>JMI Brokers ltd-( )   </td>
                  </tr>
                  </tbody>
              </table>



              <h3 style="margin-top:50px;" class="orangeText"> EUR : SEPA ONLY – Financial House Ltd</h3>
              <table class="table table-striped">
                  <tbody>
                  <tr>
                      <td>Beneficiary / Reciever :</td>
                      <td>Pacific Private Bank Limited </td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Reciever’s Address : </td>
                      <td>6 Bevis Marks Building, 1st floor, Bury Court London, England, EC3A </td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Reciever’s Bank :    </td>
                      <td> Financial House Limited</td>
                  </tr>
                  <tr>
                      <td>Beneficiary / Reciever’s Bank Address :</td>
                      <td>
                        6 Bevis Marks Building, 1st Floor , Bury Court London , England . EC3A 7HL

                      </td>
                  </tr>
                  <tr>
                      <td>SWIFT BIC :</td>
                      <td> FNHOGB21XXX</td>
                  </tr>
                  <tr>
                      <td>IBAN :   </td>
                      <td>GB95 FNHO 0099 3693 2230 40 </td>
                  </tr>
                  <tr>
                      <td>Reference Message / Details :</td>
                      <td>JMI Brokers ltd-( )      </td>
                  </tr>
                  </tbody>
              </table>



              <div style="display:none;">
                <h3 class="orangeText">United States of America (EUR)</h3>
                <h3 style="display:none;" class="sortedText">1. USD* - PPB Need to be informed before receiveing the funds</h3>
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>59: Beneficiary/ Receiver:</td>
                        <td>Pacific Private Bank Limited</td>
                    </tr>
                    <tr>
                        <td>59: Beneficiary/ Receiver’s Address:</td>
                        <td>Kumul Highway Govant Building-1st Floor, Port Vila, Vanuatu</td>
                    </tr>
                    <tr>
                        <td>59: IBAN/ Account Number:</td>
                        <td>4500 4500064812 02</td>
                    </tr>
                    <tr>
                        <td>57A: Beneficiary/ Receiver Bank:</td>
                        <td>The Reserve Trust Company</td>
                    </tr>
                    <tr>
                        <td>57A: Beneficiary/ Receiver Bank Address:</td>
                        <td>5600 S. Quebec St Suite 205D, Greenwood Village, CO 80111, USA</td>
                    </tr>
                    <tr>
                        <td>57D: Beneficiary FI Routing Number:</td>
                        <td>102007558</td>
                    </tr>
                    <tr>
                        <td>70: Reference Message/ Details:</td>
                        <td> VU24PPBL021000002148 </td>
                    </tr>
                    </tbody>
                </table>
                <h3 style="margin-top:150px;" class="orangeText">United Kingdom (EUR)</h3>
                <h3 style="display:none;" class="sortedText">2.GBP* - PPB Need to be informed before receiving the funds</h3>
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>59: Beneficiary/ Receiver:</td>
                        <td>Pacific Private Bank Limited</td>
                    </tr>
                    <tr>
                        <td>59: Beneficiary/ Receiver’s Address:</td>
                        <td>Govant Building, Port Vila, Vanuatu</td>
                    </tr>
                    <tr>
                        <td>59: IBAN/ Account Number:</td>
                        <td>GB90FNHO00993631027021</td>
                    </tr>
                    <tr>
                        <td>57A: Beneficiary/ Receiver Bank:</td>
                        <td>Financial House Limited</td>
                    </tr>
                    <tr>
                        <td>57A: Beneficiary/ Receiver Bank Address:</td>
                        <td>BURY COURT FLOOR 1 6 BEVIS MARKS,  EC3A 7HL, London</td>
                    </tr>
                    <tr>
                        <td>57A: SWIFT BIC:</td>
                        <td>FNHOGB21</td>
                    </tr>
                    <tr>
                    <td>70: Reference Message/ Details:</td>
                    <td> VU24PPBL021000002148 </td>
                    </tr>
                    </tbody>
                </table>

                <h3 class="orangeText">United Kingdom</h3>
                <h3 style="display:none;" class="sortedText">3. EUR within Europe (SEPA) – Financial House-Additional correspondent fees apply</h3>
                <h3 class="sortedText">EUR within Europe (SEPA) – Financial House-Additional </h3>
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Beneficiary/ Receiver:</td>
                        <td>Pacific Private Bank Limited</td>
                    </tr>
                    <tr>
                        <td>Beneficiary/ Receiver’s Address:</td>
                        <td>Govant Building, Port Vila, Vanuatu</td>
                    </tr>
                    <tr>
                        <td>Beneficiary/ Receiver Bank:</td>
                        <td>Financial House Limited</td>
                    </tr>
                    <tr>
                        <td>Beneficiary/ Receiver Bank Address:</td>
                        <td>6 Bevis Marks Building, 1st Floor, Bury Court London,England, EC3A 7HL</td>
                    </tr>
                    <tr>
                        <td>SWIFT BIC:</td>
                        <td>FNHOGB21XXX</td>
                    </tr>
                    <tr>
                        <td>IBAN:</td>
                        <td>GB95FNHO0099 36932230 40</td>
                    </tr>
                    <tr>
                      <td>70: Reference Message/ Details:</td>
                      <td> VU24PPBL021000002148 </td>
                    </tr>
                    </tbody>
                </table>
         		<h3 style="margin-top:220px;" class="orangeText">Lithuania</h3>
            <h3 class="sortedText">EUR within Europe (SEPA) </h3>
            <h3 style="display:none;" class="sortedText">EUR within Europe (SEPA) – UAB Pervesk -Additional correspondent fees apply</h3>
         		<table class="table table-striped">
         			<tbody>
         			  <tr>
         				<td>Beneficiary/ Receiver:</td>
         				<td>Pacific Private Bank Limited</td>
         			  </tr>
         			  <tr>
         				<td>Beneficiary/ Receiver’s Address:</td>
         				<td>Govant Building, Port Vila, Vanuatu</td>
         			  </tr>
         			  <tr>
         				<td>Beneficiary/ Receiver Bank:</td>
         				<td>UAB Pervesk</td>
         			  </tr>
         			  <tr>
         				<td>Beneficiary/ Receiver Bank Address:</td>
         				<td>Rinktines st. 5, LT-09234 Vilnius, Lithuania</td>
         			  </tr>
         			  <tr>
         				<td>SWIFT BIC:</td>
         				<td>UAPELT22XXX</td>
         			  </tr>
         			  <tr>
         				<td>IBAN:</td>
         				<td>LT73 3550 0200 0000 1699</td>
         			  </tr>
         			  <tr>
                <td>70: Reference Message/ Details:</td>
                <td> VU24PPBL021000002148 </td>
         				</td>
         			  </tr>
         			</tbody>
         		  </table>
         		  <h3  class="orangeText">Lithuania</h3>
              <h3 class="sortedText">EUR within Europe (SEPA) </h3>
              <h3 style="display:none;" class="sortedText">EUR within Europe (SEPA) – UAB VerifiedPayments -Additional correspondent fees apply</h3>
         		<table class="table table-striped">
         			<tbody>
         			  <tr>
         				<td>Beneficiary/ Receiver:</td>
         				<td>Pacific Private Bank Limited</td>
         			  </tr>
         			  <tr>
         				<td>Beneficiary/ Receiver’s Address:</td>
         				<td>Govant Building, Port Vila, Vanuatu</td>
         			  </tr>
         			  <tr>
         				<td>Beneficiary/ Receiver Bank:</td>
         				<td>UAB Verified Payments</td>
         			  </tr>
         			  <tr>
         				<td>Beneficiary/ Receiver Bank Address:</td>
         				<td>GEDIMINO AV. 20, Vilnius, Lithuania</td>
         			  </tr>
         			  <tr>
         				<td>SWIFT BIC:</td>
         				<td>VEPALT21XXX</td>
         			  </tr>
         			  <tr>
         				<td>IBAN:</td>
         				<td>LT91 3750 0200 0000 0008</td>
         			  </tr>
         			  <tr>
                <td>70: Reference Message/ Details:</td>
                <td> VU24PPBL021000002148 </td>
         			  </tr>
         			</tbody>
         		  </table>
         		  <hr>
         		  <h4 class="table4H"><sup>1</sup>* - What is SEPA?</h4>
         		  <p class="table4P">SEPA – Single Euro Payments Area – is a payments system only for EUR currency in European Union. SEPA has 36 member-states: Austria, Belgium, Britain, Bulgaria, Cyprus, Croatia, Czech Republic, Denmark, Estonia, Finland, France, Germany, Greece, Hungary, Republic of Ireland, Italy, Latvia, Lithuania, Luxembourg, Malta, Netherlands, Poland, Portugal, Romania, Slovenia, Slovakia, Spain and Sweden, the 3 EEA countries of Norway, Liechtenstein, Iceland, as well as Switzerland and Monaco.</p>
         		  <hr>

         		  <h3 class="orangeText">Turkey – SWIFT - Nurol Bank</h3>
         		  <h3 class="sortedText">EUR outside Europe (SWIFT) –Additional correspondent fees might apply</h3>
         		  <table class="table table-striped">
         			<tbody>
         			  <tr>
         				<td>59: Beneficiary/ Receiver:</td>
         				<td>JMI Brokers Ltd</td>
         			  </tr>
         			  <tr>
         				<td>59: Beneficiary/ Receiver’s Address:</td>
         				<td>1276, Govant Building, Kumul Highway,Port Vila Republic of Vanuatu</td>
         			  </tr>
         			  <tr>
         				<td>59: IBAN/ Account Number:</td>
         				<td>VU24PPBL021000002148</td>
         			  </tr>
         			  <tr>
         				<td>57A: Beneficiary/ Receiver Bank:</td>
         				<td>Pacific Private Bank Limited</td>
         			  </tr>
         			  <tr>
         				<td>57A: Beneficiary/ Receiver Bank Address:</td>
         				<td>Govant Building, Port Vila, Vanuatu</td>
         			  </tr>
         			  <tr>
         				<td>57A: SWIFT BIC:</td>
         				<td>PPBLVUVUXXX</td>
         			  </tr>
         			  <tr>
         				<td>56A: Intermediary/ Correspondent Bank:</td>
         				<td>Nurol Investment Bank Inc.</td>
         			  </tr>
         			  <tr>
         				<td>56A: Intermediary/ Correspondent Bank Address:</td>
         				<td>Maslak Nurol Plaza, Buyukdere Caddesi 71 Masla,Istanbul, Turkey</td>
         			  </tr>
         			  <tr>
         				<td>56A: Intermediary/ Correspondent Bank BIC:</td>
         				<td>NUROTRISXXX</td>
         			  </tr>
         			  <tr>
         				<td>56A: Intermediary Account with Correspondent Bank:</td>
         				<td>TR88 0014 1000 0004 4109 9000 04</td>
         			  </tr>
         			  <tr>
                <td>70: Reference Message/ Details:</td>
                <td> VU24PPBL021000002148 </td>
         			  </tr>
         			</tbody>
         		  </table>
         		  <h4 class="table4H"><sup>1</sup>JMI Brokers ltd Client Number provided with account opening confirmation.</h4>
         		  <p class="table4P">JMI Brokers ltd reserves the right to change these instructions without prior notification. Customers should contact us prior to issuing
         			instructions to new remitters</p>
         		  <hr>

         		  <h3 class="orangeText" style="display:none;">USD International transfer - USA</h3>
         		  <h3 class="sortedText" style="display:none;">USD–Additional correspondent fees might apply – need to advise PPB about transfer</h3>
         		  <table class="table table-striped" style="display:none;">
         			<tbody>
         			  <tr>
         				<td>Beneficiary/ Receiver:</td>
         				<td>Pacific Private Bank Limited</td>
         			  </tr>
         			  <tr>
         				<td>Beneficiary/ Receiver’s Address:</td>
         				<td>Kumul Highway Govant Building-1st Floor, Port Vila,Vanuatu</td>
         			  </tr>
         			  <tr>
         				<td>Beneficiary Account Number:</td>
         				<td>4500 4500064812 02</td>
         			  </tr>
         			  <tr>
         				<td>Beneficiary/ Receiver Bank:</td>
         				<td>The Reserve Trust Company</td>
         			  </tr>
         			  <tr>
         				<td>Beneficiary/ Receiver Bank Address:</td>
         				<td>5600 S. Quebec St Suite 205D, Greenwood Village, CO 80111, USA</td>
         			  </tr>
         			  <tr>
         				<td>Beneficiary FI Routing Number:</td>
         				<td>102007558</td>
         			  </tr>
         			  <tr>
                <td>70: Reference Message/ Details:</td>
                <td> VU24PPBL021000002148 </td>
         			  </tr>
         			</tbody>
         		  </table>
              </div>
              <hr>
         		  <h4 class="table4H" ><sup>1</sup>
                   * - What is SEPA?.</h4>
         		  <p class="table4P" >SEPA – Single Euro Payments Area – is a payments system only for EUR currency in European Union. SEPA has 36 member-states: Austria, Belgium, Britain, Bulgaria, Cyprus, Croatia, Czech Republic, Denmark, Estonia, Finland, France, Germany, Greece, Hungary, Republic of Ireland, Italy, Latvia, Lithuania, Luxembourg,
                   Malta, Netherlands, Poland, Portugal, Romania, Slovenia, Slovakia, Spain and Sweden, the 3 EEA countries of Norway, Liechtenstein, Iceland, as well as Switzerland and Monaco..</p>
              <hr>
                     <div class="footer">

                       <img src="/assets/m/img/new-3.jpg">


                   </div>
         	</body>
         </html>')->save(public_path().'/assets/invoices/'.$newfilename.'.pdf');

            Mail::send('mails.requested_mails.invoice',['fullname' => $user->fullname], function($message)use($user,$newfilename){
                $message->to($user->email);
                $message->cc('finance@jmibrokers.com');
                $message->from('finance@jmibrokers.com','JMI Brokers');
                $message->subject('Bank Payment Details');
                $message->attach(public_path().'/assets/invoices/'.$newfilename.'.pdf');

            });
            return 'true';

        }else{
            return 'failed';
        }

        //return PDF::loadHTML('<style>h1{color:red;}</style><h1>Test</h1>')->save(public_path().'/assets/invoices/my_stored_file.pdf')->stream('download.pdf');
        //return PDF::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');







    }



    public function request_payment_details($payment)
    {

        $session_user= Session::get('user');
        $location = GeoIP::getLocation();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();

        // if( Request::segment(1) =='ar'){
        //
        //
        // }elseif( Request::segment(1) =='ru'){
        //
        // }else{
        if($payment=='neteller'){

            Mail::send('mails.requested_mails.neteller',['fullname' => $user->fullname], function($message)use($user){
                $message->to($user->email);
                $message->from('finance@jmibrokers.com','JMI Brokers');
                $message->subject('Neteller Payment Details');
                //	$message->attachData($username , $email);
                //	$message->attach('file path');

            });
        }elseif($payment=='skrill'){

            Mail::send('mails.requested_mails.skrill',['fullname' => $user->fullname], function($message)use($user){
                $message->to($user->email);
                $message->from('finance@jmibrokers.com','JMI Brokers');
                $message->subject('Skrill Payment Details');
            });

        }elseif($payment=='bankwire'){

            Mail::send('mails.requested_mails.bankdetails',['fullname' => $user->fullname], function($message)use($user){
                $message->to($user->email);
                $message->from('finance@jmibrokers.com','JMI Brokers');
                $message->subject('Bank Payment Details');
            });

        }elseif($payment=='moneygram'){

            Mail::send('mails.requested_mails.moneygram',['fullname' => $user->fullname], function($message)use($user){
                $message->to($user->email);
                $message->from('finance@jmibrokers.com','JMI Brokers');
                $message->subject('MoneyGram Payment Details');
            });

        }elseif($payment=='westernunion'){

            Mail::send('mails.requested_mails.westernunion',['fullname' => $user->fullname], function($message)use($user){
                $message->to($user->email);
                $message->from('finance@jmibrokers.com','JMI Brokers');
                $message->subject('Western Union Payment Details');
            });

        }


        //}

        return 'true';

    }

    public function deposit_fund_method($method)
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'deposit-fund');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $accounts=website_accounts::find($user->id)->fx_accounts_live;
        if($method=='credit-card'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | بطاقة أذتمان ";
                return view('ar.cpanel.deposit-fund-creditcard',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | Депо / Кредитная карта ";
                return view('ru.cpanel.deposit-fund-creditcard',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Depit/Credit Card";
                return view('cpanel.deposit-fund-creditcard',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }
        }elseif($method=='paypal'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | بايبال ";
                return view('ar.cpanel.deposit-fund-paypal',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | PayPal ";
                return view('ru.cpanel.deposit-fund-paypal',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | PayPal";
                return view('cpanel.deposit-fund-paypal',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }
        }elseif($method=='skrill'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | سكريل ";
                return view('ar.cpanel.deposit-fund-skrill',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | Skrill ";
                return view('ru.cpanel.deposit-fund-skrill',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Skrill";
                return view('cpanel.deposit-fund-skrill',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }
        }elseif($method=='neteller'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | نتلر ";
                return view('ar.cpanel.deposit-fund-neteller',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | Neteller ";
                return view('ru.cpanel.deposit-fund-neteller',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Neteller";
                return view('cpanel.deposit-fund-neteller',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }
        }elseif($method=='bankwire'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | حوالة بنكية ";
                return view('ar.cpanel.deposit-fund-bankwire',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | Банковский перевод ";
                return view('ru.cpanel.deposit-fund-bankwire',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Bank Wire";
                return view('cpanel.deposit-fund-bankwire',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }

        }elseif($method=='westernunion'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | ويسترن يونيون ";
                return view('ar.cpanel.deposit-fund-westernunion',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | Western Union ";
                return view('ru.cpanel.deposit-fund-westernunion',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Western Union";
                return view('cpanel.deposit-fund-westernunion',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }

        }elseif($method=='moneygram'){
            if( Request::segment(1) =='ar'){
                $title = "  لوحة التحكم | مونى جرام";
                return view('ar.cpanel.deposit-fund-moneygram',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | Moneygram ";
                return view('ru.cpanel.deposit-fund-moneygram',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | MoneyGram";
                return view('cpanel.deposit-fund-moneygram',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }

        }elseif($method=='coinbase'){



            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | كوينباس ";
                return view('ar.cpanel.deposit-fund-coinbase',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | CoinBase ";
                return view('ru.cpanel.deposit-fund-coinbase',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | CoinBase";
                return view('cpanel.deposit-fund-coinbase',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }

        }elseif($method=='fasapay'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | FasaPay ";
                return view('ar.cpanel.deposit-fund-fasapay',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | FasaPay ";
                return view('ru.cpanel.deposit-fund-fasapay',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | FasaPay";
                return view('cpanel.deposit-fund-fasapay',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }

        }elseif($method=='epay'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | Epay ";
                return view('ar.cpanel.deposit-fund-epay',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | Epay ";
                return view('ru.cpanel.deposit-fund-epay',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Epay";
                return view('cpanel.deposit-fund-epay',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }
        }elseif($method=='sticpay'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | SticPay ";
                return view('ar.cpanel.deposit-fund-sticpay',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | SticPay ";
                return view('ru.cpanel.deposit-fund-sticpay',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | SticPay";
                return view('cpanel.deposit-fund-sticpay',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }
        }elseif($method=='advcash'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | advcash ";
                return view('ar.cpanel.deposit-fund-advcash',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | advcash ";
                return view('ru.cpanel.deposit-fund-advcash',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | advcash";
                return view('cpanel.deposit-fund-advcash0',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }

        }elseif($method=='advcash2'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | advcash ";
                return view('ar.cpanel.deposit-fund-advcash',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | advcash ";
                return view('ru.cpanel.deposit-fund-advcash',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | advcash";
                return view('cpanel.deposit-fund-advcash2',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }

        }elseif($method=='payeer'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | payeer ";
                return view('ar.cpanel.deposit-fund-payeer',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | payeer ";
                return view('ru.cpanel.deposit-fund-payeer',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | payeer";
                return view('cpanel.deposit-fund-payeer',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }

        }elseif($method=='perfect-money'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | برفكت مونى ";
                return view('ar.cpanel.deposit-fund-perfect-money',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | Perfect Money ";
                return view('ru.cpanel.deposit-fund-perfect-money',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Perfect Money";
                return view('cpanel.deposit-fund-perfect-money',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }

        }elseif($method=='epay-success'){

            if(session::get('PAYMENT_EPAY')==1){

                $transaction=new Transactions;
                $transaction->website_accounts_id=$user->id;
                $transaction->account=session::get('PAYMENT_ACCOUNT_NUMBER');
                $transaction->amount=session::get('PAYMENT_AMOUNT');
                $transaction->currency=1;
                //transaction type 0 = deposit   1 = withdraw    3= transfeer
                $transaction->type=0;
                $transaction->via='advcash';
                $transaction->status=0;
                $transaction->details_admin='';
                $transaction->details_user='';
                $transaction->save();

                $notification=new Notifications;
                $notification->website_accounts_id=999999999;
                $notification->notification_status=0;
                $notification->notification=session::get('PAYMENT_AMOUNT').' USD New advcash Deposited ';
                $notification->notification_link='/spanel/deposit-fund-requests?&bymail='.$user->email.'&';
                $notification->save();



                if( Request::segment(1) =='ar'){
                    return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم الأيداع بنجاح سيتم مراجعة الطلب وتنفيذه فى خلال ساعات قليلة');
                }elseif( Request::segment(1) =='ru'){
                    return redirect('ru/cpanel/transaction-history')->with('status-success', 'Успешно депонировано Это будет добавлено к вашему балансу в течение нескольких часов');
                }else{
                    return redirect('en/cpanel/transaction-history')->with('status-success', 'Successfully Deposited This Will Be Add To Your Balance During Few Hours');
                }


            }else{

                if( Request::segment(1) =='ar'){
                    return redirect('ar/cpanel/deposit-fund/epay')->with('status-error', 'فشل فى عملية الدفع !');
                }elseif( Request::segment(1) =='ru'){
                    return redirect('ru/cpanel/deposit-fund/epay')->with('status-error', 'Your Payment Has Been Failed!');
                }else{
                    return redirect('en/cpanel/deposit-fund/epay')->with('status-error', 'Your Payment Has Been Failed!');
                }

            }



        }elseif($method=='epay-cancel'){
            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/deposit-fund/epay')->with('status-error', 'تم الغاء عملية الدفع');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/deposit-fund/epay')->with('status-error', 'Your Payment Has Been Canceled!');
            }else{
                return redirect('en/cpanel/deposit-fund/epay')->with('status-error', 'Your Payment Has Been Canceled!');
            }




        }else{
            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/deposit-fund');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/deposit-fund');
            }else{
                return redirect('en/cpanel/deposit-fund');
            }

        }




    }






    public function post_deposit_fund_method($method)
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'deposit-fund');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $input=Request::all();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $accounts=website_accounts::find($user->id)->fx_accounts_live;


        $this->validate(Request(), [
            'amount' => 'required|regex:/^[0-9]*$/|min:1|max:5',
            'account_number' => 'required|regex:/^[0-9]*$/|min:4|max:9',

        ]);

        if($method=='credit-card'){


            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $url='https://jmibrokers-ag.ch/asiapay';



            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$account_number;
            $transaction->amount=$amount;
            $transaction->currency=$currency;
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=0;
            $transaction->via='Credit-Card';
            $transaction->status=0;
            $transaction->details_admin='';
            $transaction->details_user='';
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$amount.' USD New credit card Deposited ';
            $notification->notification_link='/spanel/deposit-fund-requests?&bymail='.$user->email.'&';
            $notification->save();



            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->details='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';
            $notification1->details_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', ' عملية الايداع مازالت معلقة حتى تكمل عملية الدفع بنجاح وسيتم مراجعة الطلب وتنفيذه فى خلال ساعات قليلة <br /> <a href="'.$url.'" target="__blank">أكمل عملية الدفع من هنا </a>');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', ' Ваш депозит все еще ожидает, пока вы не завершите платеж, и он будет добавлен к вашему балансу в течение нескольких часов<br /> <a href="'.$url.'" target="__blank"> Завершите оплату отсюда </a>');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your Deposit Is Still Pending Until You Complete The Payment And It Will Be Add To Your Balance During Few Hours <br /> <a href="'.$url.'" target="__blank">Complete The Payment From Here</a>');
            }


        }elseif($method=='credit-card---'){

            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $time=time();

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$account_number;
            $transaction->amount=$amount;
            $transaction->currency=$currency;
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=0;
            $transaction->via='Credit-Card';
            $transaction->status=0;
            $transaction->details_admin='';
            $transaction->details_user='';
            $transaction->save();


            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$amount.' '.$currencyy.' New Credit-Card Deposited ';
            $notification->notification_link='/spanel/deposit-fund-requests?&bymail='.$user->email.'&';
            $notification->save();


            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=$amount.' '.$currencyy.' New Credit-Card Deposited By'.$user->email;
            $subject=$amount.' '.$currencyy.' New Deposited By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);




            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->details='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';
            $notification1->details_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم الأيداع بنجاح سيتم مراجعة الطلب وتنفيذه فى خلال ساعات قليلة');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Успешно депонировано Это будет добавлено к вашему балансу в течение нескольких часов');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Successfully Deposited This Will Be Add To Your Balance During Few Hours');
            }





        }elseif($method=='paypal'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | بايبال ";
                return view('ar.cpanel.deposit-fund-paypal',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | PayPal";
                return view('cpanel.deposit-fund-paypal',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }
        }elseif($method=='skrill'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | سكريل ";
                return view('ar.cpanel.deposit-fund-skrill',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Skrill";
                return view('cpanel.deposit-fund-skrill',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }


        }elseif($method=='neteller'){




            $netemail = $input['netellermail'];
            $ammount  = $input['amount']*100;
            $fullname  = $user->fname.$user->lname;
            $jmiaccountnumber  = $input['account_number'];


            $time=time();

            $refnum=date("Ymdhis") . mt_rand ( 1000, 9999 );

            $requestParams=
                array(
                    "merchantRefNum"=> $refnum,
                    "transactionType"=> "PAYMENT",
                    "customerNotificationEmail"=> $netemail,
                    "merchantNotificationEmail"=> "support@jmibrokers.com",
                    "neteller"=>array (
                        "consumerId"=> $netemail,
                        "consumerIdLocked"=> true,
                        "detail1Description"=> "description",
                        "detail1Text"=> "Fund JMI Account : ".$jmiaccountnumber
                    ),
                    "paymentType"=> "NETELLER",
                    "amount"=> $ammount,
                    "currencyCode"=> "USD",
                    "customerIp"=> "172.0.0.1",
                    "billingDetails"=> array(
                        "street"=> "George Street",
                        "street2"=> "3 Edgar Buildings",
                        "city"=> "Bath",
                        "zip"=> "BA1 2FJ",
                        "country"=> "GB"
                    ),
                    "returnLinks" => array(

                        array(
                            "rel"=> "on_completed",
                            "href"=> "https://jmibrokers.com/en/cpanel/transaction-history?neteller=success"
                        ),array
                        (
                            "rel"=> "on_failed",
                            "href"=> "https://jmibrokers.com/en/cpanel/transaction-history?neteller=failed"
                        ),array
                        (
                            "rel"=> "default",
                            "href"=> "https://jmibrokers.com/en/cpanel/transaction-history?neteller=failed"
                        )


                    )
                );


            if( Request::segment(1) =='ar'){

                $requestParams['returnLinks']=
                    array(

                        array(
                            "rel"=> "on_completed",
                            "href"=> "https://jmibrokers.com/ar/cpanel/transaction-history?neteller=success"
                        ),array
                    (
                        "rel"=> "on_failed",
                        "href"=> "https://jmibrokers.com/ar/cpanel/transaction-history?neteller=failed"
                    ),array
                    (
                        "rel"=> "default",
                        "href"=> "https://jmibrokers.com/ar/cpanel/transaction-history?neteller=failed"
                    )


                    );

            }elseif( Request::segment(1) =='ru'){


                $requestParams['returnLinks']=
                    array(

                        array(
                            "rel"=> "on_completed",
                            "href"=> "https://jmibrokers.com/ru/cpanel/transaction-history?neteller=success"
                        ),array
                    (
                        "rel"=> "on_failed",
                        "href"=> "https://jmibrokers.com/ru/cpanel/transaction-history?neteller=failed"
                    ),array
                    (
                        "rel"=> "default",
                        "href"=> "https://jmibrokers.com/ru/cpanel/transaction-history?neteller=failed"
                    )


                    );
            }else{


                $requestParams['returnLinks']=
                    array(

                        array(
                            "rel"=> "on_completed",
                            "href"=> "https://jmibrokers.com/en/cpanel/transaction-history?neteller=success"
                        ),array
                    (
                        "rel"=> "on_failed",
                        "href"=> "https://jmibrokers.com/en/cpanel/transaction-history?neteller=failed"
                    ),array
                    (
                        "rel"=> "default",
                        "href"=> "https://jmibrokers.com/en/cpanel/transaction-history?neteller=failed"
                    )


                    );
            }


            $curl = curl_init();
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_URL, "https://api.paysafe.com/paymenthub/v1/paymenthandles");
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type:application/json", "Authorization: Basic cG1sZS0yNzM4ODI6Qi1wMS0wLTVlMjgwODYzLTAtMzAyYzAyMTQ1MTA0ZDI3ZmFkZDRhMGYxOGFlMjE0YjYyODRlMWM2ZDUxMTJkY2UyMDIxNDVmMTU5OWIyNTc0MzYwZDM4Y2RkMWYyNzM3NDIzMjQwYzMxZDdjMDM="));
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestParams));
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);




            $serverOutput = curl_exec($curl);
            $serverOutput =   json_decode($serverOutput);

            if(isset($serverOutput->links)){


                $payment_url=$serverOutput->links;

                Session::put('orderid', $serverOutput->id);
                Session::put('fullname', $fullname);
                Session::put('jmiaccountnumber', $jmiaccountnumber);
                Session::put('amount', $ammount);
                Session::put('deposit', 'neteller');




                return Redirect::to($payment_url[0]->href);


                $notification1=new Notifications;
                $notification1->website_accounts_id=$user->id;
                $notification1->notification_status=0;
                $notification1->notification='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
                $notification1->details='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
                $notification1->notification_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';
                $notification1->details_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';

                $notification1->notification_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';
                $notification1->details_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';

                $notification1->notification_link='/cpanel/transaction-history';
                $notification1->save();



            }else{


                if( Request::segment(1) =='ar'){
                    return redirect('ar/cpanel/deposit-fund/neteller')->with('status-error', 'خطأ : هذا الأيميل غير مسجل بالنتلر');
                }elseif( Request::segment(1) =='ru'){
                    return redirect('ru/cpanel/deposit-fund/neteller')->with('status-error', 'Неверные данные: это электронное письмо не зарегистрировано в Neteller');
                }else{
                    return redirect('en/cpanel/deposit-fund/neteller')->with('status-error', 'Invalid Inputs : This Email is not registed at Neteller');
                }

            }




        }elseif($method=='sticpay'){

            $amount  = $input['amount'];
            $fullname  = $user->fname.$user->lname;
            $jmiaccountnumber  = $input['account_number'];

            $time=time();

            $refnum=date("Ymdhis") . mt_rand ( 1000, 9999 );
            $date0=date('Y-m-d H:i:s');
            $merchant_account='rayane@jmibrokers.com';
            $sign=md5('merchant_email='.$merchant_account.'&order_no='.$refnum.'&order_time='.$date0.'&order_amount='.$amount.'&order_currency=USD&key=88ea7d4d2c2fe7f32c7b4a826314f96e75744fba874b1a8e08d7ab9e40b595e0');
            $requestParams=
                array(
                    "merchant_email"=> $merchant_account,
                    "order_no"=> $refnum,
                    "order_time"=> $date0,
                    "order_amount"=> $amount,
                    "order_currency"=> 'USD',
                    "sign"=> $sign,
                    "success_url"=> 'USD',
                    "failure_url"=> 'USD',
                    "interface_version"=> 'live'
                );

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_URL, "https://api.sticpay.com/rest_pay/pay");
            //curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type:application/json", "Authorization: Basic cG1sZS0yNzM4ODI6Qi1wMS0wLTVlMjgwODYzLTAtMzAyYzAyMTQ1MTA0ZDI3ZmFkZDRhMGYxOGFlMjE0YjYyODRlMWM2ZDUxMTJkY2UyMDIxNDVmMTU5OWIyNTc0MzYwZDM4Y2RkMWYyNzM3NDIzMjQwYzMxZDdjMDM="));
            // curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestParams));
            curl_setopt($curl, CURLOPT_POSTFIELDS, $requestParams);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);




            $serverOutput = curl_exec($curl);
            $serverOutput =   json_decode($serverOutput);
            // print_r($serverOutput);
            // return 1;
            if(isset($serverOutput->link)){


                $payment_url='https://pay.sticpay.com'.$serverOutput->link;
                return Redirect::to($payment_url);

                Session::put('deposit', 'neteller');




                return Redirect::to($payment_url[0]->href);


                $notification1=new Notifications;
                $notification1->website_accounts_id=$user->id;
                $notification1->notification_status=0;
                $notification1->notification='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
                $notification1->details='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
                $notification1->notification_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';
                $notification1->details_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';

                $notification1->notification_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';
                $notification1->details_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';

                $notification1->notification_link='/cpanel/transaction-history';
                $notification1->save();



            }else{


                if( Request::segment(1) =='ar'){
                    return redirect('ar/cpanel/deposit-fund/neteller')->with('status-error', 'خطأ : هذا الأيميل غير مسجل بالنتلر');
                }elseif( Request::segment(1) =='ru'){
                    return redirect('ru/cpanel/deposit-fund/neteller')->with('status-error', 'Неверные данные: это электронное письмо не зарегистрировано в Neteller');
                }else{
                    return redirect('en/cpanel/deposit-fund/neteller')->with('status-error', 'Invalid Inputs : This Email is not registed at Neteller');
                }

            }






        }elseif($method=='bankwire'){

            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];


            $this->validate(Request(), [
                'ttcopy' => 'required|max:2048|mimes:jpeg,bmp,png,pdf,jpg',
                'invoice' => 'required|max:2048|mimes:jpeg,bmp,png,pdf,jpg',
            ]);

            $time=time();

            $destinationPath=public_path().'/assets/ttcopy/';
            //$filename = rand(1,1000000).time().'.'.$input['document']->getClientOriginalExtension();;
            $filename1 = rand(1,1000000).time().'.'.$input['ttcopy']->getClientOriginalExtension();
            $input['ttcopy']->move($destinationPath, $filename1);
            $filename2 = rand(1,1000000).time().'.'.$input['invoice']->getClientOriginalExtension();
            $input['invoice']->move($destinationPath, $filename2);

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$account_number;
            $transaction->amount=$amount;
            $transaction->currency=$currency;
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=0;
            $transaction->via='Bank Wire';
            $transaction->status=0;
            $transaction->details_admin=URL::to('/assets/ttcopy/').'/'.$filename1;
            $transaction->details_user='';
            $transaction->save();


            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$amount.' '.$currencyy.' New Bank Wire Deposited ';
            $notification->notification_link='/spanel/deposit-fund-requests?&bymail='.$user->email.'&';
            $notification->save();



            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=$amount.' '.$currencyy.' New Bank Wire Deposited By'.$user->email.'<br />TT File :<a href="'.URL::to('/assets/ttcopy/').'/'.$filename1.'">Here</a><br />Invoice File :<a href="'.URL::to('/assets/ttcopy/').'/'.$filename2.'">Here</a>';
            $subject=$amount.' '.$currencyy.' New Bank Deposited By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);


            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->details='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';
            $notification1->details_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'شكرًا لك على إرسال نسخة SWIFT / TT. سيتم إيداع الأموال في حسابك بمجرد استلامها مع الشكر.');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Благодарим вас за отправку копии SWIFT / TT. Деньги будут зачислены на ваш счет после получения благодарности.');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Thank you for submitting the SWIFT /TT copy. Funds will be deposited into your account once received with thanks.');
            }





        }elseif($method=='westernunion'){

            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];


            $this->validate(Request(), [
                'ttcopy' => 'max:2048|mimes:jpeg,bmp,png,pdf,jpg',
            ]);


            $time=time();

            $destinationPath=public_path().'/assets/ttcopy/';
            //$filename = rand(1,1000000).time().'.'.$input['document']->getClientOriginalExtension();;
            $filename = rand(1,1000000).time().'.'.$input['ttcopy']->getClientOriginalExtension();
            $input['ttcopy']->move($destinationPath, $filename);

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$account_number;
            $transaction->amount=$amount;
            $transaction->currency=$currency;
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=0;
            $transaction->via='Western Union';
            $transaction->status=0;
            $transaction->details_admin=URL::to('/assets/ttcopy/').'/'.$filename;
            $transaction->details_user='';
            $transaction->save();


            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$amount.' '.$currencyy.' New Western Union Deposited ';
            $notification->notification_link='/spanel/deposit-fund-requests?&bymail='.$user->email.'&';
            $notification->save();



            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=$amount.' '.$currencyy.' New Western Union Deposited By'.$user->email;
            $subject=$amount.' '.$currencyy.' New Bank Deposited By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);


            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->details='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';
            $notification1->details_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم الأيداع بنجاح سيتم مراجعة الطلب وتنفيذه فى خلال ساعات قليلة');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Успешно депонировано Это будет добавлено к вашему балансу в течение нескольких часов');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Successfully Deposited This Will Be Add To Your Balance During Few Hours');
            }



        }elseif($method=='moneygram'){


            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];


            $this->validate(Request(), [
                'ttcopy' => 'max:2048|mimes:jpeg,bmp,png,pdf,jpg',
            ]);


            $time=time();

            $destinationPath=public_path().'/assets/ttcopy/';
            //$filename = rand(1,1000000).time().'.'.$input['document']->getClientOriginalExtension();;
            $filename = rand(1,1000000).time().'.'.$input['ttcopy']->getClientOriginalExtension();
            $input['ttcopy']->move($destinationPath, $filename);

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$account_number;
            $transaction->amount=$amount;
            $transaction->currency=$currency;
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=0;
            $transaction->via='MoneyGram';
            $transaction->status=0;
            $transaction->details_admin=URL::to('/assets/ttcopy/').'/'.$filename;
            $transaction->details_user='';
            $transaction->save();


            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$amount.' '.$currencyy.' New MoneyGram Deposited ';
            $notification->notification_link='/spanel/deposit-fund-requests?&bymail='.$user->email.'&';
            $notification->save();



            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=$amount.' '.$currencyy.' New MoneyGram Deposited By'.$user->email;
            $subject=$amount.' '.$currencyy.' New Bank Deposited By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);


            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->details='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';
            $notification1->details_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم الأيداع بنجاح سيتم مراجعة الطلب وتنفيذه فى خلال ساعات قليلة');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Успешно депонировано Это будет добавлено к вашему балансу в течение нескольких часов');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Successfully Deposited This Will Be Add To Your Balance During Few Hours');
            }


        }elseif($method=='coinbase'){


            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];


            require_once __DIR__ . "/../../../vendor/autoload.php";

            /**
             * Init ApiClient with your Api Key
             * Your Api Keys are available in the Coinbase Commerce Dashboard.
             * Make sure you don't store your API Key in your source code!
             */


            ApiClient::init('9e47bfc4-929e-4407-adcd-02174e8166aa');



            $newCheckoutObj = new Checkout();

            $newCheckoutObj->name = 'JMIBrokers LTD';
            $newCheckoutObj->description = 'Funding Account Number '.$account_number;
            $newCheckoutObj->pricing_type = 'fixed_price';
            $newCheckoutObj->user_email = $user->email;
            $newCheckoutObj->user_id = $user->id;
            $newCheckoutObj->redirect_url = 'http://jmisecurities.com/en/cpanel/deposit-fund/coinbase';
            $newCheckoutObj->cancel_url = 'http://jmisecurities.com/en/cpanel/deposit-fund/coinbase';
            $newCheckoutObj->local_price = [
                'amount' => $amount,
                'currency' => 'USD'
            ];
            $newCheckoutObj->requested_info = ['name', 'email'];

            $newCheckoutObj->save();

            try {
                $newCheckoutObj->save();
                $url='https://commerce.coinbase.com/checkout/'.$newCheckoutObj->id;

            } catch (\Exception $exception) {

                return redirect()->back()->with('status-success', 'Enable to create checkout. Error: '.$exception->getMessage());

            }


            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$account_number;
            $transaction->amount=$amount;
            $transaction->currency=$currency;
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=0;
            $transaction->via='CoinBase';
            $transaction->status=0;
            $transaction->details_admin='';
            $transaction->details_user='';
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$amount.' USD New Coinbase Deposited ';
            $notification->notification_link='/spanel/deposit-fund-requests?&bymail='.$user->email.'&';
            $notification->save();


            header("Location: ".$url);
            exit();



            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->details='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';
            $notification1->details_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();




            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', ' عملية الايداع مازالت معلقة حتى تكمل عملية الدفع بنجاح وسيتم مراجعة الطلب وتنفيذه فى خلال ساعات قليلة <br /> <a href="'.$url.'" target="__blank">أكمل عملية الدفع من هنا </a>');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Ваш депозит все еще ожидает, пока вы не завершите платеж, и он будет добавлен к вашему балансу в течение нескольких часов <br /> <a href="'.$url.'" target="__blank"> Завершите оплату отсюда </a>');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your Deposit Is Still Pending Until You Complete The Payment And It Will Be Add To Your Balance During Few Hours <br /> <a href="'.$url.'" target="__blank">Complete The Payment From Here</a>');
            }



        }elseif($method=='epay'){

            $headers = array('Content-Type: application/json');

            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            if( Request::segment(1) =='ar'){
                $url = "https://api.epay.com/paymentApi/merReceive?PAYEE_ACCOUNT=backoffice@jmibrokers.com&PAYEE_NAME=JMI%20BROKERS%20LTD&PAYMENT_AMOUNT=".$amount."&SUGGESTED_MEMO=FUND%20JMI%20BROKERS%20ACCOUNT%20NUMBER%20:%20".$account_number."&INTERFACE_LANGUAGE=EN_US&CHARACTER_ENCODING=UTF-8&PAYMENT_UNITS=USD&STATUS_URL=/ar/epay/success&PAYMENT_URL=https://jmibrokers.com/en&NOPAYMENT_URL=/ar/epay/cancel&V2_HASH=".MD5('backoffice@jmibrokers.com:'.$amount.':USD:b81d40a4c44514fede3aa34a2f71899e')."&";

            }elseif( Request::segment(1) =='ru'){
                $url = "https://api.epay.com/paymentApi/merReceive?PAYEE_ACCOUNT=backoffice@jmibrokers.com&PAYEE_NAME=JMI%20BROKERS%20LTD&PAYMENT_AMOUNT=".$amount."&SUGGESTED_MEMO=FUND%20JMI%20BROKERS%20ACCOUNT%20NUMBER%20:%20".$account_number."&INTERFACE_LANGUAGE=EN_US&CHARACTER_ENCODING=UTF-8&PAYMENT_UNITS=USD&STATUS_URL=/ru/epay/success&PAYMENT_URL=https://jmibrokers.com/en&NOPAYMENT_URL=/ru/epay/cancel&V2_HASH=".MD5('backoffice@jmibrokers.com:'.$amount.':USD:b81d40a4c44514fede3aa34a2f71899e')."&";

            }else{
                $url = "https://api.epay.com/paymentApi/merReceive?PAYEE_ACCOUNT=backoffice@jmibrokers.com&PAYEE_NAME=JMI%20BROKERS%20LTD&PAYMENT_AMOUNT=".$amount."&SUGGESTED_MEMO=FUND%20JMI%20BROKERS%20ACCOUNT%20NUMBER%20:%20".$account_number."&INTERFACE_LANGUAGE=EN_US&CHARACTER_ENCODING=UTF-8&PAYMENT_UNITS=USD&STATUS_URL=/en/epay/success&PAYMENT_URL=https://jmibrokers.com/en&NOPAYMENT_URL=/en/epay/cancel&V2_HASH=".MD5('backoffice@jmibrokers.com:'.$amount.':USD:b81d40a4c44514fede3aa34a2f71899e')."&";

            }

            session::put('PAYMENT_METHOD','Epay');
            session::put('PAYMENT_AMOUNT',$amount);
            session::put('PAYMENT_EPAY',1);
            session::put('PAYMENT_TYPE','cpanel');
            session::put('PAYMENT_ACCOUNT_NUMBER',$account_number);
            session::put('SUGGESTED_MEMO','FUND JMI BROKERS ACCOUNT NUMBER : '.$account_number);
            Session::save();

            header("Location: ".$url);
            exit();

            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $url='https://jmibrokers.com/en/epay';

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$account_number;
            $transaction->amount=$amount;
            $transaction->currency=$currency;
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=0;
            $transaction->via='Epay';
            $transaction->status=0;
            $transaction->details_admin='';
            $transaction->details_user='';
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$amount.' USD New Epay Deposited ';
            $notification->notification_link='/spanel/deposit-fund-requests?&bymail='.$user->email.'&';
            $notification->save();



            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->details='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';
            $notification1->details_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();



            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', ' عملية الايداع مازالت معلقة حتى تكمل عملية الدفع بنجاح وسيتم مراجعة الطلب وتنفيذه فى خلال ساعات قليلة <br /> <a href="'.$url.'" target="__blank">أكمل عملية الدفع من هنا </a>');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', ' Ваш депозит все еще ожидает, пока вы не завершите платеж, и он будет добавлен к вашему балансу в течение нескольких часов <br /> <a href="'.$url.'" target="__blank">Завершите оплату отсюда </a>');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your Deposit Is Still Pending Until You Complete The Payment And It Will Be Add To Your Balance During Few Hours <br /> <a href="'.$url.'" target="__blank">Complete The Payment From Here</a>');
            }



        }elseif($method=='fasapay'){

            $headers = array('Content-Type: application/json');

            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            if( Request::segment(1) =='ar'){
                $url = "https://api.epay.com/paymentApi/merReceive?PAYEE_ACCOUNT=backoffice@jmibrokers.com&PAYEE_NAME=JMI%20BROKERS%20LTD&PAYMENT_AMOUNT=".$amount."&SUGGESTED_MEMO=FUND%20JMI%20BROKERS%20ACCOUNT%20NUMBER%20:%20".$account_number."&INTERFACE_LANGUAGE=EN_US&CHARACTER_ENCODING=UTF-8&PAYMENT_UNITS=USD&STATUS_URL=/ar/epay/success&PAYMENT_URL=https://jmibrokers.com/en&NOPAYMENT_URL=/ar/epay/cancel&V2_HASH=".MD5('backoffice@jmibrokers.com:'.$amount.':USD:b81d40a4c44514fede3aa34a2f71899e')."&";

            }elseif( Request::segment(1) =='ru'){
                $url = "https://api.epay.com/paymentApi/merReceive?PAYEE_ACCOUNT=backoffice@jmibrokers.com&PAYEE_NAME=JMI%20BROKERS%20LTD&PAYMENT_AMOUNT=".$amount."&SUGGESTED_MEMO=FUND%20JMI%20BROKERS%20ACCOUNT%20NUMBER%20:%20".$account_number."&INTERFACE_LANGUAGE=EN_US&CHARACTER_ENCODING=UTF-8&PAYMENT_UNITS=USD&STATUS_URL=/ru/epay/success&PAYMENT_URL=https://jmibrokers.com/en&NOPAYMENT_URL=/ru/epay/cancel&V2_HASH=".MD5('backoffice@jmibrokers.com:'.$amount.':USD:b81d40a4c44514fede3aa34a2f71899e')."&";

            }else{
                $url = "https://api.epay.com/paymentApi/merReceive?PAYEE_ACCOUNT=backoffice@jmibrokers.com&PAYEE_NAME=JMI%20BROKERS%20LTD&PAYMENT_AMOUNT=".$amount."&SUGGESTED_MEMO=FUND%20JMI%20BROKERS%20ACCOUNT%20NUMBER%20:%20".$account_number."&INTERFACE_LANGUAGE=EN_US&CHARACTER_ENCODING=UTF-8&PAYMENT_UNITS=USD&STATUS_URL=/en/epay/success&PAYMENT_URL=https://jmibrokers.com/en&NOPAYMENT_URL=/en/epay/cancel&V2_HASH=".MD5('backoffice@jmibrokers.com:'.$amount.':USD:b81d40a4c44514fede3aa34a2f71899e')."&";

            }

            session::put('PAYMENT_METHOD','FasaPay');
            session::put('PAYMENT_AMOUNT',$amount);
            session::put('PAYMENT_EPAY',1);
            session::put('PAYMENT_TYPE','cpanel');
            session::put('PAYMENT_ACCOUNT_NUMBER',$account_number);
            session::put('SUGGESTED_MEMO','FUND JMI BROKERS ACCOUNT NUMBER : '.$account_number);
            Session::save();

            header("Location: ".$url);
            exit();

            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $url='https://jmibrokers.com/en/epay';

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$account_number;
            $transaction->amount=$amount;
            $transaction->currency=$currency;
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=0;
            $transaction->via='FasaPay';
            $transaction->status=0;
            $transaction->details_admin='';
            $transaction->details_user='';
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$amount.' USD New FasaPay Deposited ';
            $notification->notification_link='/spanel/deposit-fund-requests?&bymail='.$user->email.'&';
            $notification->save();



            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->details='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';
            $notification1->details_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();



            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', ' عملية الايداع مازالت معلقة حتى تكمل عملية الدفع بنجاح وسيتم مراجعة الطلب وتنفيذه فى خلال ساعات قليلة <br /> <a href="'.$url.'" target="__blank">أكمل عملية الدفع من هنا </a>');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', ' Ваш депозит все еще ожидает, пока вы не завершите платеж, и он будет добавлен к вашему балансу в течение нескольких часов <br /> <a href="'.$url.'" target="__blank">Завершите оплату отсюда </a>');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your Deposit Is Still Pending Until You Complete The Payment And It Will Be Add To Your Balance During Few Hours <br /> <a href="'.$url.'" target="__blank">Complete The Payment From Here</a>');
            }



        }elseif($method=='advcash'){


            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];


            Session::Put('test','testttt');
            Session::put('PAYMENT_METHOD','AdvCash');
            Session::put('PAYMENT_AMOUNT',$amount);
            Session::put('PAYMENT_ACCOUNT_NUMBER',$account_number);
            Session::save();

            ?>
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <script type="text/javascript">
                    function closethisasap() {
                        document.forms["redirectpost"].submit();
                    }
                </script>
            </head>
            <body onload="closethisasap();">
            <form name="redirectpost" method="post" action="https://wallet.advcash.com/sci/">
                <input type="hidden" name="ac_account_email" value="newbusiness@jmibrokers.com" />
                <input type="hidden" name="ac_sci_name" value="JMI Brokers LTD" />

                <input type="hidden" name="ac_currency" value="USD" />
                <input type="hidden" name="ac_amount" value="<?PHP echo $amount; ?>" />
                <input type="hidden" name="ac_order_id" value="<?PHP echo time(); ?>" />
                <input type="hidden" name="ac_sign" value="<?PHP echo hash('sha256', 'newbusiness@jmibrokers.com:JMI Brokers LTD:'.$amount.':USD:d50t9$hAIw:'.time()); ?>" />
                <!-- Optional Fields -->
                <input type="hidden" name="ac_success_url" value="/en/cpanel/transaction-history" />
                <input type="hidden" name="ac_success_url_method" value="GET" />
                <input type="hidden" name="ac_fail_url" value="/en/cpanel/transaction-history" />
                <input type="hidden" name="ac_fail_url_method" value="GET" />
                <input type="hidden" name="ac_status_url" value="/en/cpanel/transaction-history" />
                <input type="hidden" name="ac_status_url_method" value="GET" />

                <input type="hidden" name="ac_comments" id="ac_comments" value="Funding JMI Account <?PHP echo $account_number; ?>" />
            </form>
            </body>
            </html>
            <?php
            exit;



            $requestParams=
                array(
                    "ac_account_email"=> 'newbusiness@jmibrokers.com',
                    "ac_sci_name"=> 'JMI Payments',
                    "ac_currency"=> 'USD',
                    "ac_order_id"=> time(),
                    "ac_sign"=> hash('sha256', 'newbusiness@jmibrokers.com:JMI Payments:'.$currency.':USD:d50t9$hAIw:123456789'),
                    "ac_success_url"=> '/advcash/success',
                    "ac_success_url_method"=> 'GET',
                    "ac_fail_url"=> '/advcash/fail',
                    "ac_fail_url_method"=> 'GET',
                    "ac_status_url"=> '/advcash/status',
                    "ac_status_url_method"=> 'GET',
                    "ac_amount"=> $amount,
                    "ac_comments"=> 'funding JMI Account '.$account_number

                );

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_URL, "https://wallet.advcash.com/sci/");
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type:application/json"));
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestParams));
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);




            $serverOutput = curl_exec($curl);
            $serverOutput =   json_decode($serverOutput);

        }elseif($method=='advcash0000'){

            $headers = array('Content-Type: application/json');

            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            if( Request::segment(1) =='ar'){
                $url = "https://api.epay.com/paymentApi/merReceive?PAYEE_ACCOUNT=backoffice@jmibrokers.com&PAYEE_NAME=JMI%20BROKERS%20LTD&PAYMENT_AMOUNT=".$amount."&SUGGESTED_MEMO=FUND%20JMI%20BROKERS%20ACCOUNT%20NUMBER%20:%20".$account_number."&INTERFACE_LANGUAGE=EN_US&CHARACTER_ENCODING=UTF-8&PAYMENT_UNITS=USD&STATUS_URL=/ar/epay/success&PAYMENT_URL=https://jmibrokers.com/en&NOPAYMENT_URL=/ar/epay/cancel&V2_HASH=".MD5('backoffice@jmibrokers.com:'.$amount.':USD:b81d40a4c44514fede3aa34a2f71899e')."&";

            }elseif( Request::segment(1) =='ru'){
                $url = "https://api.epay.com/paymentApi/merReceive?PAYEE_ACCOUNT=backoffice@jmibrokers.com&PAYEE_NAME=JMI%20BROKERS%20LTD&PAYMENT_AMOUNT=".$amount."&SUGGESTED_MEMO=FUND%20JMI%20BROKERS%20ACCOUNT%20NUMBER%20:%20".$account_number."&INTERFACE_LANGUAGE=EN_US&CHARACTER_ENCODING=UTF-8&PAYMENT_UNITS=USD&STATUS_URL=/ru/epay/success&PAYMENT_URL=https://jmibrokers.com/en&NOPAYMENT_URL=/ru/epay/cancel&V2_HASH=".MD5('backoffice@jmibrokers.com:'.$amount.':USD:b81d40a4c44514fede3aa34a2f71899e')."&";

            }else{
                $url = "https://api.epay.com/paymentApi/merReceive?PAYEE_ACCOUNT=backoffice@jmibrokers.com&PAYEE_NAME=JMI%20BROKERS%20LTD&PAYMENT_AMOUNT=".$amount."&SUGGESTED_MEMO=FUND%20JMI%20BROKERS%20ACCOUNT%20NUMBER%20:%20".$account_number."&INTERFACE_LANGUAGE=EN_US&CHARACTER_ENCODING=UTF-8&PAYMENT_UNITS=USD&STATUS_URL=/en/epay/success&PAYMENT_URL=https://jmibrokers.com/en&NOPAYMENT_URL=/en/epay/cancel&V2_HASH=".MD5('backoffice@jmibrokers.com:'.$amount.':USD:b81d40a4c44514fede3aa34a2f71899e')."&";

            }

            session::put('PAYMENT_METHOD','ADVcash');
            session::put('PAYMENT_AMOUNT',$amount);
            session::put('PAYMENT_EPAY',1);
            session::put('PAYMENT_TYPE','cpanel');
            session::put('PAYMENT_ACCOUNT_NUMBER',$account_number);
            session::put('SUGGESTED_MEMO','FUND JMI BROKERS ACCOUNT NUMBER : '.$account_number);
            Session::save();

            header("Location: ".$url);
            exit();

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$account_number;
            $transaction->amount=$amount;
            $transaction->currency=$currency;
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=0;
            $transaction->via='advcash';
            $transaction->status=0;
            $transaction->details_admin='';
            $transaction->details_user='';
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$amount.' USD New advcash Deposited ';
            $notification->notification_link='/spanel/deposit-fund-requests?&bymail='.$user->email.'&';
            $notification->save();



            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->details='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';
            $notification1->details_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();




            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', ' عملية الايداع مازالت معلقة حتى تكمل عملية الدفع بنجاح وسيتم مراجعة الطلب وتنفيذه فى خلال ساعات قليلة <br /> <a href="'.$url.'" target="__blank">أكمل عملية الدفع من هنا </a>');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', ' Ваш депозит все еще ожидает, пока вы не завершите платеж, и он будет добавлен к вашему балансу в течение нескольких часов <br /> <a href="'.$url.'" target="__blank">Завершите оплату отсюда </a>');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your Deposit Is Still Pending Until You Complete The Payment And It Will Be Add To Your Balance During Few Hours <br /> <a href="'.$url.'" target="__blank">Complete The Payment From Here</a>');
            }




        }elseif($method=='payeer'){

            $headers = array('Content-Type: application/json');

            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            if( Request::segment(1) =='ar'){
                $url = "https://api.epay.com/paymentApi/merReceive?PAYEE_ACCOUNT=backoffice@jmibrokers.com&PAYEE_NAME=JMI%20BROKERS%20LTD&PAYMENT_AMOUNT=".$amount."&SUGGESTED_MEMO=FUND%20JMI%20BROKERS%20ACCOUNT%20NUMBER%20:%20".$account_number."&INTERFACE_LANGUAGE=EN_US&CHARACTER_ENCODING=UTF-8&PAYMENT_UNITS=USD&STATUS_URL=/ar/epay/success&PAYMENT_URL=https://jmibrokers.com/en&NOPAYMENT_URL=/ar/epay/cancel&V2_HASH=".MD5('backoffice@jmibrokers.com:'.$amount.':USD:b81d40a4c44514fede3aa34a2f71899e')."&";

            }elseif( Request::segment(1) =='ru'){
                $url = "https://api.epay.com/paymentApi/merReceive?PAYEE_ACCOUNT=backoffice@jmibrokers.com&PAYEE_NAME=JMI%20BROKERS%20LTD&PAYMENT_AMOUNT=".$amount."&SUGGESTED_MEMO=FUND%20JMI%20BROKERS%20ACCOUNT%20NUMBER%20:%20".$account_number."&INTERFACE_LANGUAGE=EN_US&CHARACTER_ENCODING=UTF-8&PAYMENT_UNITS=USD&STATUS_URL=/ru/epay/success&PAYMENT_URL=https://jmibrokers.com/en&NOPAYMENT_URL=/ru/epay/cancel&V2_HASH=".MD5('backoffice@jmibrokers.com:'.$amount.':USD:b81d40a4c44514fede3aa34a2f71899e')."&";

            }else{
                $url = "https://api.epay.com/paymentApi/merReceive?PAYEE_ACCOUNT=backoffice@jmibrokers.com&PAYEE_NAME=JMI%20BROKERS%20LTD&PAYMENT_AMOUNT=".$amount."&SUGGESTED_MEMO=FUND%20JMI%20BROKERS%20ACCOUNT%20NUMBER%20:%20".$account_number."&INTERFACE_LANGUAGE=EN_US&CHARACTER_ENCODING=UTF-8&PAYMENT_UNITS=USD&STATUS_URL=/en/epay/success&PAYMENT_URL=https://jmibrokers.com/en&NOPAYMENT_URL=/en/epay/cancel&V2_HASH=".MD5('backoffice@jmibrokers.com:'.$amount.':USD:b81d40a4c44514fede3aa34a2f71899e')."&";

            }

            session::put('PAYMENT_METHOD','Payeer');
            session::put('PAYMENT_AMOUNT',$amount);
            session::put('PAYMENT_EPAY',1);
            session::put('PAYMENT_TYPE','cpanel');
            session::put('PAYMENT_ACCOUNT_NUMBER',$account_number);
            session::put('SUGGESTED_MEMO','FUND JMI BROKERS ACCOUNT NUMBER : '.$account_number);
            Session::save();

            header("Location: ".$url);
            exit();

            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $url='https://jmibrokers.com/en/epay';

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$account_number;
            $transaction->amount=$amount;
            $transaction->currency=$currency;
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=0;
            $transaction->via='Payeer';
            $transaction->status=0;
            $transaction->details_admin='';
            $transaction->details_user='';
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$amount.' USD New Payeer Deposited ';
            $notification->notification_link='/spanel/deposit-fund-requests?&bymail='.$user->email.'&';
            $notification->save();



            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->details='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';
            $notification1->details_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();



            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', ' عملية الايداع مازالت معلقة حتى تكمل عملية الدفع بنجاح وسيتم مراجعة الطلب وتنفيذه فى خلال ساعات قليلة <br /> <a href="'.$url.'" target="__blank">أكمل عملية الدفع من هنا </a>');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', ' Ваш депозит все еще ожидает, пока вы не завершите платеж, и он будет добавлен к вашему балансу в течение нескольких часов <br /> <a href="'.$url.'" target="__blank">Завершите оплату отсюда </a>');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your Deposit Is Still Pending Until You Complete The Payment And It Will Be Add To Your Balance During Few Hours <br /> <a href="'.$url.'" target="__blank">Complete The Payment From Here</a>');
            }



        }elseif($method=='perfect-money'){

            $headers = array('Content-Type: application/json');

            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            if( Request::segment(1) =='ar'){
                $url = "https://api.epay.com/paymentApi/merReceive?PAYEE_ACCOUNT=backoffice@jmibrokers.com&PAYEE_NAME=JMI%20BROKERS%20LTD&PAYMENT_AMOUNT=".$amount."&SUGGESTED_MEMO=FUND%20JMI%20BROKERS%20ACCOUNT%20NUMBER%20:%20".$account_number."&INTERFACE_LANGUAGE=EN_US&CHARACTER_ENCODING=UTF-8&PAYMENT_UNITS=USD&STATUS_URL=/ar/epay/success&PAYMENT_URL=https://jmibrokers.com/en&NOPAYMENT_URL=/ar/epay/cancel&V2_HASH=".MD5('backoffice@jmibrokers.com:'.$amount.':USD:b81d40a4c44514fede3aa34a2f71899e')."&";

            }elseif( Request::segment(1) =='ru'){
                $url = "https://api.epay.com/paymentApi/merReceive?PAYEE_ACCOUNT=backoffice@jmibrokers.com&PAYEE_NAME=JMI%20BROKERS%20LTD&PAYMENT_AMOUNT=".$amount."&SUGGESTED_MEMO=FUND%20JMI%20BROKERS%20ACCOUNT%20NUMBER%20:%20".$account_number."&INTERFACE_LANGUAGE=EN_US&CHARACTER_ENCODING=UTF-8&PAYMENT_UNITS=USD&STATUS_URL=/ru/epay/success&PAYMENT_URL=https://jmibrokers.com/en&NOPAYMENT_URL=/ru/epay/cancel&V2_HASH=".MD5('backoffice@jmibrokers.com:'.$amount.':USD:b81d40a4c44514fede3aa34a2f71899e')."&";

            }else{
                $url = "https://api.epay.com/paymentApi/merReceive?PAYEE_ACCOUNT=backoffice@jmibrokers.com&PAYEE_NAME=JMI%20BROKERS%20LTD&PAYMENT_AMOUNT=".$amount."&SUGGESTED_MEMO=FUND%20JMI%20BROKERS%20ACCOUNT%20NUMBER%20:%20".$account_number."&INTERFACE_LANGUAGE=EN_US&CHARACTER_ENCODING=UTF-8&PAYMENT_UNITS=USD&STATUS_URL=/en/epay/success&PAYMENT_URL=https://jmibrokers.com/en&NOPAYMENT_URL=/en/epay/cancel&V2_HASH=".MD5('backoffice@jmibrokers.com:'.$amount.':USD:b81d40a4c44514fede3aa34a2f71899e')."&";

            }

            session::put('PAYMENT_METHOD','Perfect Money');
            session::put('PAYMENT_AMOUNT',$amount);
            session::put('PAYMENT_EPAY',1);
            session::put('PAYMENT_TYPE','cpanel');
            session::put('PAYMENT_ACCOUNT_NUMBER',$account_number);
            session::put('SUGGESTED_MEMO','FUND JMI BROKERS ACCOUNT NUMBER : '.$account_number);
            Session::save();

            header("Location: ".$url);
            exit();

            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $url='https://jmibrokers.com/en/epay';

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$account_number;
            $transaction->amount=$amount;
            $transaction->currency=$currency;
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=0;
            $transaction->via='Perfect Money';
            $transaction->status=0;
            $transaction->details_admin='';
            $transaction->details_user='';
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$amount.' USD New Perfect Money Deposited ';
            $notification->notification_link='/spanel/deposit-fund-requests?&bymail='.$user->email.'&';
            $notification->save();




            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->details='Your deposit has been delivered successfully, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام الايداع بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';
            $notification1->details_ru='Ваш депозит был успешно доставлен, наш бэк-офис скоро его обработает.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();




            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', ' عملية الايداع مازالت معلقة حتى تكمل عملية الدفع بنجاح وسيتم مراجعة الطلب وتنفيذه فى خلال ساعات قليلة <br /> <a href="'.$url.'" target="__blank">أكمل عملية الدفع من هنا </a>');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', ' Ваш депозит все еще ожидает, пока вы не завершите платеж, и он будет добавлен к вашему балансу в течение нескольких часов <br /> <a href="'.$url.'" target="__blank">Завершите оплату отсюда </a>');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your Deposit Is Still Pending Until You Complete The Payment And It Will Be Add To Your Balance During Few Hours <br /> <a href="'.$url.'" target="__blank">Complete The Payment From Here</a>');
            }



        }else{
            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/deposit-fund');
            }else{
                return redirect('en/cpanel/deposit-fund');
            }

        }




    }










    public function withdraw_fund()
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'withdraw-fund');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();        $accounts=website_accounts::find($user->id)->fx_accounts_live;

        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | سحب ";
            return view('ar.cpanel.withdraw-fund',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | изымать ";
            return view('ru.cpanel.withdraw-fund',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
        }else{
            $title = "Control Panel | withdraw";
            return view('cpanel.withdraw-fund',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
        }

    }



    public function withdraw_fund_method($method)
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'withdraw-fund');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();        $accounts=website_accounts::find($user->id)->fx_accounts_live;
        if($method=='credit-card'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | بطاقة أذتمان ";
                return view('ar.cpanel.withdraw-fund-creditcard',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | Дебетовая / кредитная карта ";
                return view('ru.cpanel.withdraw-fund-creditcard',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Depit/Credit Card";
                return view('cpanel.withdraw-fund-creditcard',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }
        }elseif($method=='pronto'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | بايبال ";
                return view('ar.cpanel.withdraw-fund-pronto',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = " Панель управления | Pronto ";
                return view('ru.cpanel.withdraw-fund-pronto',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Pronto";
                return view('cpanel.withdraw-fund-pronto',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }
        }elseif($method=='skrill'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | سكريل ";
                return view('ar.cpanel.withdraw-fund-skrill',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Skrill";
                return view('cpanel.withdraw-fund-skrill',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }
        }elseif($method=='neteller'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | نتلر ";
                return view('ar.cpanel.withdraw-fund-neteller',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | Neteller ";
                return view('ru.cpanel.withdraw-fund-neteller',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Neteller";
                return view('cpanel.withdraw-fund-neteller',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }
        }elseif($method=='bankwire'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | حوالة بنكية ";
                return view('ar.cpanel.withdraw-fund-bankwire',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | банковский перевод ";
                return view('ru.cpanel.withdraw-fund-bankwire',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Bank Wire";
                return view('cpanel.withdraw-fund-bankwire',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }

        }elseif($method=='westernunion'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | ويسترن يونيون ";
                return view('ar.cpanel.withdraw-fund-westernunion',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Western Union";
                return view('cpanel.withdraw-fund-westernunion',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }

        }elseif($method=='fasapay'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | فاسا باى ";
                return view('ar.cpanel.withdraw-fund-fasapay',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | FasaPay ";
                return view('ru.cpanel.withdraw-fund-fasapay',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Fasapay";
                return view('cpanel.withdraw-fund-fasapay',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }

        }elseif($method=='epay'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | ايباى ";
                return view('ar.cpanel.withdraw-fund-epay',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | Epay ";
                return view('ru.cpanel.withdraw-fund-epay',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Epay";
                return view('cpanel.withdraw-fund-epay',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }

        }elseif($method=='advcash'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | advcash ";
                return view('ar.cpanel.withdraw-fund-advcash',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | advcash ";
                return view('ru.cpanel.withdraw-fund-advcash',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | advcash";
                return view('cpanel.withdraw-fund-advcash',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }


        }elseif($method=='payeer'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | Payeer ";
                return view('ar.cpanel.withdraw-fund-payeer',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | Payeer ";
                return view('ru.cpanel.withdraw-fund-payeer',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | Payeer";
                return view('cpanel.withdraw-fund-payeer',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }

        }elseif($method=='coinbase'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | كوين بيز ";
                return view('ar.cpanel.withdraw-fund-coinbase',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | CoinBase ";
                return view('ru.cpanel.withdraw-fund-coinbase',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | CoinBase";
                return view('cpanel.withdraw-fund-coinbase',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }


        }elseif($method=='perfect-money'){
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | برفكت مونى ";
                return view('ar.cpanel.withdraw-fund-perfect-money',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }if( Request::segment(1) =='ru'){
                $title = "Панель управления | perfect Money ";
                return view('ru.cpanel.withdraw-fund-perfect-money',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }else{
                $title = "Control Panel | perfect Money";
                return view('cpanel.withdraw-fund-perfect-money',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
            }

        }else{
            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/withdraw-fund');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/withdraw-fund');
            }else{
                return redirect('en/cpanel/withdraw-fund');
            }

        }



    }





    public function post_withdraw_fund_method($method)
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'withdraw-fund');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $input=Request::all();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $accounts=website_accounts::find($user->id)->fx_accounts_live;


        $this->validate(Request(), [
            'amount' => 'required|regex:/^[0-9]*$/|min:1|max:5',
            'account_number' => 'required|regex:/^[0-9]*$/|min:4|max:9',
            'currency' => 'required|regex:/^[0-9]*$/|min:1|max:1',

        ]);


        if($method=='credit-card'){



            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$input['account_number'];
            $transaction->amount=$input['amount'];
            $transaction->currency=$input['currency'];
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=1;
            $transaction->via='Credit-Card';
            $transaction->status=0;
            $transaction->details_user='';
            $transaction->details_admin='Credit Card :'.$input['credit_card'];
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($input['currency']==1){$currencyy='USD';};
            $notification->notification=$input['amount'].' '.$currencyy.' New Credit-Card Withdraw ';
            $notification->notification_link='/spanel/withdraw-fund-requests?&bymail='.$user->email.'&';
            $notification->save();


            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=$amount.' '.$currencyy.' New Credit-Card Withdraw By'.$user->email;
            $subject=$amount.' '.$currencyy.' New  Withdraw By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);



            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->details='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';
            $notification1->details_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة.');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your withdrawal request has been delivered, our backoffice department will handle it soon.');
            }

        }elseif($method=='pronto'){



            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$input['account_number'];
            $transaction->amount=$input['amount'];
            $transaction->currency=$input['currency'];
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=1;
            $transaction->via='Pronto';
            $transaction->status=0;
            $transaction->details_user='';
            $transaction->details_admin='';
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$input['amount'].' '.$currencyy.' New Pronto Withdraw ';
            $notification->notification_link='/spanel/withdraw-fund-requests?&bymail='.$user->email.'&';
            $notification->save();


            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=$amount.' '.$currencyy.' New Pronto Withdraw By'.$user->email;
            $subject=$amount.' '.$currencyy.' New pronto Withdraw By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);




            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->details='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';
            $notification1->details_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة.');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your withdrawal request has been delivered, our backoffice department will handle it soon.');
            }


        }elseif($method=='skrill'){


            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$input['account_number'];
            $transaction->amount=$input['amount'];
            $transaction->currency=$input['currency'];
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=1;
            $transaction->via='Skrill';
            $transaction->status=0;
            $transaction->details_user='';
            $transaction->details_admin='Skrill Account :'.$input['skrill_email'];
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$input['amount'].' '.$currencyy.' New Skrill Withdraw ';
            $notification->notification_link='/spanel/withdraw-fund-requests?&bymail='.$user->email.'&';
            $notification->save();


            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=$amount.' '.$currencyy.' New Skrill Withdraw By'.$user->email;
            $subject=$amount.' '.$currencyy.' New Neteller Withdraw By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);



            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->details='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';
            $notification1->details_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة.');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your withdrawal request has been delivered, our backoffice department will handle it soon.');
            }


        }elseif($method=='neteller'){


            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$input['account_number'];
            $transaction->amount=$input['amount'];
            $transaction->currency=$input['currency'];
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=1;
            $transaction->via='Neteller';
            $transaction->status=0;
            $transaction->details_user='';
            $transaction->details_admin='Neteller Account :'.$input['neteller_email'];
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$input['amount'].' '.$currencyy.' New Neteller Withdraw ';
            $notification->notification_link='/spanel/withdraw-fund-requests?&bymail='.$user->email.'&';
            $notification->save();


            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=$amount.' '.$currencyy.' New Neteller Withdraw By'.$user->email;
            $subject=$amount.' '.$currencyy.' New Neteller Withdraw By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);




            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->details='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';
            $notification1->details_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة.');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your withdrawal request has been delivered, our backoffice department will handle it soon.');
            }


        }elseif($method=='coinbase'){


            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$input['account_number'];
            $transaction->amount=$input['amount'];
            $transaction->currency=$input['currency'];
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=1;
            $transaction->via='CoinBase';
            $transaction->status=0;
            $transaction->details_user='';
            $transaction->details_admin='CoinBase Account :'.$input['coinbase_account'];
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$input['amount'].' '.$currencyy.' New CoinBase Withdraw ';
            $notification->notification_link='/spanel/withdraw-fund-requests?&bymail='.$user->email.'&';
            $notification->save();


            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=$amount.' '.$currencyy.' New CoinBase Withdraw By'.$user->email;
            $subject=$amount.' '.$currencyy.' New CoinBase Withdraw By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);




            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->details='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';
            $notification1->details_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة.');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your withdrawal request has been delivered, our backoffice department will handle it soon.');
            }

        }elseif($method=='epay'){


            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$input['account_number'];
            $transaction->amount=$input['amount'];
            $transaction->currency=$input['currency'];
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=1;
            $transaction->via='Epay';
            $transaction->status=0;
            $transaction->details_user='';
            $transaction->details_admin='Epay Account :'.$input['epay_account'];
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$input['amount'].' '.$currencyy.' New Epay Withdraw ';
            $notification->notification_link='/spanel/withdraw-fund-requests?&bymail='.$user->email.'&';
            $notification->save();


            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=$amount.' '.$currencyy.' New Epay Withdraw By'.$user->email;
            $subject=$amount.' '.$currencyy.' New Epay Withdraw By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);




            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->details='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';
            $notification1->details_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة.');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your withdrawal request has been delivered, our backoffice department will handle it soon.');
            }

        }elseif($method=='fasapay'){


            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$input['account_number'];
            $transaction->amount=$input['amount'];
            $transaction->currency=$input['currency'];
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=1;
            $transaction->via='Fasapay';
            $transaction->status=0;
            $transaction->details_user='';
            $transaction->details_admin='Fasapay Account :'.$input['fasapay_account'];
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$input['amount'].' '.$currencyy.' New Fasapay Withdraw ';
            $notification->notification_link='/spanel/withdraw-fund-requests?&bymail='.$user->email.'&';
            $notification->save();


            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=$amount.' '.$currencyy.' New Fasapay Withdraw By'.$user->email;
            $subject=$amount.' '.$currencyy.' New Fasapay Withdraw By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);



            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->details='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';
            $notification1->details_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();



            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة.');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your withdrawal request has been delivered, our backoffice department will handle it soon.');
            }


        }elseif($method=='payeer'){


            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$input['account_number'];
            $transaction->amount=$input['amount'];
            $transaction->currency=$input['currency'];
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=1;
            $transaction->via='Payeer';
            $transaction->status=0;
            $transaction->details_user='';
            $transaction->details_admin='Payeer Account :'.$input['payeer_account'];
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$input['amount'].' '.$currencyy.' New Payeer Withdraw ';
            $notification->notification_link='/spanel/withdraw-fund-requests?&bymail='.$user->email.'&';
            $notification->save();


            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=$amount.' '.$currencyy.' New Payeer Withdraw By'.$user->email;
            $subject=$amount.' '.$currencyy.' New Payeer Withdraw By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);




            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->details='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';
            $notification1->details_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة.');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your withdrawal request has been delivered, our backoffice department will handle it soon.');
            }

        }elseif($method=='advcash'){


            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$input['account_number'];
            $transaction->amount=$input['amount'];
            $transaction->currency=$input['currency'];
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=1;
            $transaction->via='advcash';
            $transaction->status=0;
            $transaction->details_user='';
            $transaction->details_admin='advcash Account :'.$input['advcash_account'];
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$input['amount'].' '.$currencyy.' New advcash Withdraw ';
            $notification->notification_link='/spanel/withdraw-fund-requests?&bymail='.$user->email.'&';
            $notification->save();


            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=$amount.' '.$currencyy.' New advcash Withdraw By'.$user->email;
            $subject=$amount.' '.$currencyy.' New advcash Withdraw By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);



            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->details='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';
            $notification1->details_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();



            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة.');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your withdrawal request has been delivered, our backoffice department will handle it soon.');
            }



        }elseif($method=='perfect-money'){


            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$input['account_number'];
            $transaction->amount=$input['amount'];
            $transaction->currency=$input['currency'];
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=1;
            $transaction->via='Perfect Money';
            $transaction->status=0;
            $transaction->details_user='';
            $transaction->details_admin='Perfect Money Account :'.$input['perfect_account'];
            $transaction->save();

            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$input['amount'].' '.$currencyy.' New Perfect Money Withdraw ';
            $notification->notification_link='/spanel/withdraw-fund-requests?&bymail='.$user->email.'&';
            $notification->save();


            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=$amount.' '.$currencyy.' New Perfect Money Withdraw By'.$user->email;
            $subject='New Perfect Money Withdraw';
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);




            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->details='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';
            $notification1->details_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة.');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your withdrawal request has been delivered, our backoffice department will handle it soon.');
            }



        }elseif($method=='bankwire'){



            $amount  = $input['amount'];
            $account_number  = $input['account_number'];
            $currency  = $input['currency'];

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=$input['account_number'];
            $transaction->amount=$input['amount'];
            $transaction->currency=$input['currency'];
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=1;
            $transaction->via='Bank Wire';
            $transaction->status=0;
            $transaction->details_user='';
            $transaction->details_admin='Bank Name :'.$input['bank_name'].'Bank Swift :'.$input['bank_swift'].'Bank Account or IBan :'.$input['bank_iban'];
            $transaction->save();


            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            if($currency==1){$currencyy='USD';};
            $notification->notification=$input['amount'].' '.$currencyy.' New Bank Wire Withdraw ';
            $notification->notification_link='/spanel/withdraw-fund-requests?&bymail='.$user->email.'&';
            $notification->save();


            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=$amount.' '.$currencyy.' New Bank Withdraw By'.$user->email;
            $subject=$amount.' '.$currencyy.' New Bank Withdraw By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);




            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->details='Your withdrawal request has been delivered, our backoffice department will handle it soon.';
            $notification1->notification_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';
            $notification1->details_ar='تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة';

            $notification1->notification_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';
            $notification1->details_ru='Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.';

            $notification1->notification_link='/cpanel/transaction-history';
            $notification1->save();



            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم استلام طلب السحب بنجاح وستتم معالجتة قريبا من جهة الشركة.');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Ваша заявка на снятие была доставлена, наш бэк-офис скоро обработает ее.');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Your withdrawal request has been delivered, our backoffice department will handle it soon.');
            }



        }elseif($method=='westernunion'){


            return 'Under Development';



            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم السحب بنجاح سيتم مراجعة الطلب وتنفيذه فى خلال ساعات قليلة');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Successfully Withdrawn This Will Be Add To Your Balance During Few Hours');
            }



        }elseif($method=='fasapay'){


            return 'Under Development';



            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم السحب بنجاح سيتم مراجعة الطلب وتنفيذه فى خلال ساعات قليلة');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Successfully Withdrawn This Will Be Add To Your Balance During Few Hours');
            }

        }elseif($method=='webmoney'){


            return 'Under Development';



            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم السحب بنجاح سيتم مراجعة الطلب وتنفيذه فى خلال ساعات قليلة');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Successfully Withdrawn This Will Be Add To Your Balance During Few Hours');
            }



        }else{
            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/withdraw-fund');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/withdraw-fund');
            }else{
                return redirect('en/cpanel/withdraw-fund');
            }

        }



    }





    public function internal_transfers()
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'internal-transfers');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $accounts=website_accounts::find($user->id)->fx_accounts_live;

        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | التحويلات الداخلية ";
            return view('ar.cpanel.internal-transfer',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Внутренний трансфер ";
            return view('ru.cpanel.internal-transfer',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
        }else{
            $title = "Control Panel | Internal Transfer";
            return view('cpanel.internal-transfer',compact('title','user','notifications_all','notifications_unseen','location','accounts'));
        }

    }


    public function post_internal_transfers()
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'internal-transfers');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $input=Request::all();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $accounts=website_accounts::find($user->id)->fx_accounts_live;
        $transfer_to=$input['transfer_to'];

        if($input['transfer_to']=='other'){
            $transfer_to=$input['other_account'];

            $this->validate(Request(), [
                'other_account' => 'regex:/^[0-9]*$/|max:9',
            ]);


        }else{
            $this->validate(Request(), [
                'transfer_to' => 'regex:/^[0-9]*$/|max:9',
            ]);

        }

        $this->validate(Request(), [
            'amount' => 'required|numeric|min:0|not_in:0',
            'transfer_from' => 'required|regex:/^[0-9]*$/|max:9',
            'currency' => 'required|regex:/^[0-9]*$/|min:1|max:1',

        ]);


        //check of password
        $query="|MODE=7|LOGIN=".$input['transfer_from']."|[CPASS=".$input['password'];
        //--- prepare query


        // internal transfer
        $query1 = "|MODE=4|LOGIN=".$input['transfer_from']."|CPASS=".$input['password']."|TOACC=".$transfer_to."|AMOUNT=".$_POST['amount'];
        //internal transfer

        //--- send request
        $ret='error';
        //---- open socket
        $q = "WMQWEBAPI MASTER=jmi2020".$query."\nQUIT\n";
        $ptr=@fsockopen('89.116.30.28','443',$errno,$errstr,5);
        //---- check connection
        if($ptr)
        {
            //---- send request
            if(fputs($ptr,$q)!=FALSE)
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

        if($ret == Null or $ret =='error')
        {
            //--- send request
            $ret='error';
//---- open socket
            $q = "WMQWEBAPI MASTER=jmi2020".$query."\nQUIT\n";
            $ptr=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
//---- check connection
            if($ptr)
            {
                //---- send request
                if(fputs($ptr,$q)!=FALSE)
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
        }

        $ret = substr($ret,0,strlen($ret)-1);
        $result = json_decode($ret);

        //result 0  means success
        //pasword is working

        //try{
        if(is_object($result) && isset($result->result) && $result->result==0){

            $ret='error';

            //chech balance before transfer
//
//                       $ptr=@fsockopen('89.116.30.28','443',$errno,$errstr,5);
//                      //---- check connection
//                      if($ptr)
//                        {
//                         //---- send request
//                         if(fputs($ptr,"WUSERINFO-login=".$transfer_to."|password=".$input['reciver_password']."\nQUIT\n"))
//                           {
//                            //---- clear default answer
//                            $ret='';
//                            //---- receive answer
//                            while(!feof($ptr))
//                             {
//                              $line=fgets($ptr,128);
//                              if($line=="end\r\n") break;
//                              $ret.= $line;
//                             }
//                           }
//
//                       }
//
// if($ret == Null or $ret =='error')
// {
//
//             //chech balance before transfer
//
//                         $ptr=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
//                        //---- check connection
//                        if($ptr)
//                          {
//                           //---- send request
//                           if(fputs($ptr,"WUSERINFO-login=".$transfer_to."|password=".$input['reciver_password']."\nQUIT\n"))
//                             {
//                              //---- clear default answer
//                              $ret='';
//                              //---- receive answer
//                              while(!feof($ptr))
//                               {
//                                $line=fgets($ptr,128);
//                                if($line=="end\r\n") break;
//                                $ret.= $line;
//                               }
//                             }
//
//                         }
// }

            //  $fx_balance = $this->get_string_between($ret, 'Balance:', 'Equity');
            //  if($fx_balance > 9999999999999 ){
            //    $fx_balance_new=$fx_balance*-1;
            //    $query11 = "|MODE=3|LOGIN=".$input['transfer_to']."|AMOUNT=".$fx_balance_new."|COMMENT=fix_negative";
            //
            //    $ret1='error';
            //    $q = "WMQWEBAPI MASTER=jmi2020".$query11."\nQUIT\n";
            //    $ptr=@fsockopen('89.116.30.28','443',$errno,$errstr,5);
            // //---- check connection
            //    if($ptr)
            //      {
            //       //---- send request
            //         if(fputs($ptr,$q)!=FALSE)
            //         {
            //          //---- clear default answer
            //          $ret1='';
            //          //---- receive answer
            //          while(!feof($ptr))
            //           {
            //            $line=fgets($ptr,128);
            //            if($line=="end\r\n") break;
            //            $ret1.= $line;
            //           }
            //         }
            //       fclose($ptr);
            //      }
            //
            //      if($ret1 == Null or $ret1 == 'error')
            //      {
            //
            //                   $q = "WMQWEBAPI MASTER=jmi2020".$query11."\nQUIT\n";
            //                   $ptr=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
            //                //---- check connection
            //                   if($ptr)
            //                     {
            //                      //---- send request
            //                        if(fputs($ptr,$q)!=FALSE)
            //                        {
            //                         //---- clear default answer
            //                         $ret1='';
            //                         //---- receive answer
            //                         while(!feof($ptr))
            //                          {
            //                           $line=fgets($ptr,128);
            //                           if($line=="end\r\n") break;
            //                           $ret1.= $line;
            //                          }
            //                        }
            //                      fclose($ptr);
            //                     }
            //      }
            //
            //
            //      $ret1 = substr($ret1,0,strlen($ret1)-1);
            //       $result1 = json_decode($ret1);
            //
            //     if($result1->result==0){
            //
            //     }else{
            //
            //
            //
            //                   if( Request::segment(1) =='ar'){
            //                       return redirect('ar/cpanel/transaction-history')->with('status-error', 'فشل التحويل');
            //                   }elseif( Request::segment(1) =='ru'){
            //                       return redirect('ru/cpanel/transaction-history')->with('status-error', 'Failed');
            //                   }else{
            //                       return redirect('en/cpanel/transaction-history')->with('status-error', 'Failed');
            //                   }
            //
            //
            //     }
            //
            //
            //  }
            //end check balance before transfer


            $ret1='error';

            $q = "WMQWEBAPI MASTER=jmi2020".$query1."\nQUIT\n";
            $ptr=@fsockopen('89.116.30.28','443',$errno,$errstr,5);
            //---- check connection
            if($ptr)
            {
                //---- send request
                if(fputs($ptr,$q)!=FALSE)
                {
                    //---- clear default answer
                    $ret1='';
                    //---- receive answer
                    while(!feof($ptr))
                    {
                        $line=fgets($ptr,128);
                        if($line=="end\r\n") break;
                        $ret1.= $line;
                    }
                }
                fclose($ptr);
            }

            if($ret1 == Null or $ret1 =='error')
            {

                $q = "WMQWEBAPI MASTER=jmi2020".$query1."\nQUIT\n";
                $ptr=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
                //---- check connection
                if($ptr)
                {
                    //---- send request
                    if(fputs($ptr,$q)!=FALSE)
                    {
                        //---- clear default answer
                        $ret1='';
                        //---- receive answer
                        while(!feof($ptr))
                        {
                            $line=fgets($ptr,128);
                            if($line=="end\r\n") break;
                            $ret1.= $line;
                        }
                    }
                    fclose($ptr);
                }
            }

            $ret1 = substr($ret1,0,strlen($ret1)-1);
            $result1 = json_decode($ret1);

            if($result1->result==0){

                $transaction=new Transactions;
                $transaction->website_accounts_id=$user->id;
                $transaction->account=$transfer_to;
                $transaction->amount=$input['amount'];
                $transaction->currency=$input['currency'];
                //transaction type 0 = deposit   1 = withdraw    3= transfeer
                $transaction->type=2;
                $transaction->via=$input['transfer_from'];
                $transaction->status=1;
                $transaction->details_user='';
                $transaction->details_admin='';
                $transaction->save();


                if( Request::segment(1) =='ar'){
                    return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم التحويل بنجاح ');
                }elseif( Request::segment(1) =='ru'){
                    return redirect('ru/cpanel/transaction-history')->with('status-success', 'Успешно перенесено');
                }else{
                    return redirect('en/cpanel/transaction-history')->with('status-success', 'Successfully Transfered ');
                }


            }


        }
        //  }catch(e){



        if( Request::segment(1) =='ar'){
            return redirect('ar/cpanel/transaction-history')->with('status-error', 'فشل التحويل');
        }elseif( Request::segment(1) =='ru'){
            return redirect('ru/cpanel/transaction-history')->with('status-error', 'Failed');
        }else{
            return redirect('en/cpanel/transaction-history')->with('status-error', 'Failed');
        }



        //}

    }



    public function trading_platforms()
    {

        Session::flash('pageType', 'tools');
        Session::flash('currentPage', 'trading-platforms');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | منصات التداول";
            return view('ar.cpanel.trading-platforms',compact('title','user','notifications_all','notifications_unseen','location'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Торговые Платформы";
            return view('ru.cpanel.trading-platforms',compact('title','user','notifications_all','notifications_unseen','location'));
        }else{
            $title = "Control Panel | Trading Platforms";
            return view('cpanel.trading-platforms',compact('title','user','notifications_all','notifications_unseen','location'));
        }

    }


    public function open_demo()
    {

        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'open-demo');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | فتح حساب تجريبى ";
            return view('ar.cpanel.trading-platforms',compact('title','user','notifications_all','notifications_unseen','location'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Открыть демо-счет";
            return view('ru.cpanel.trading-platforms',compact('title','user','notifications_all','notifications_unseen','location'));
        }else{
            $title = "Control Panel | Open Demo Account";
            return view('cpanel.trading-platforms',compact('title','user','notifications_all','notifications_unseen','location'));
        }

    }

    public function transaction_history()
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'transaction-history');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        if( Request::segment(4) ==''){
            $transactions=website_accounts::find($user->id)->all_transactions;
        }elseif( Request::segment(4) =='deposit'){
            $transactions=website_accounts::find($user->id)->deposit_transactions;
        }elseif( Request::segment(4) =='withdraw'){
            $transactions=website_accounts::find($user->id)->withdraw_transactions;
        }elseif( Request::segment(4) =='transfers'){
            $transactions=website_accounts::find($user->id)->transfeer_transactions;
        }else{
            $transactions=website_accounts::find($user->id)->all_transactions;

        }
        if(isset($_GET['neteller--']) && $_GET['neteller--']=='success' && Session::get('deposit')=='neteller--'){

            Session::Put('deposit','empty');

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=Session::get('jmiaccountnumber');
            $transaction->amount=Session::get('amount');
            $transaction->currency='USD';
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=0;
            $transaction->via='Neteller';
            $transaction->status=0;
            $transaction->details_admin='order_id:'.Session::get('orderid').' '.'jmia_account:'.Session::get('jmiaccountnumber').' '.'amount:'.(Session::get('amount')/100);
            $transaction->details_user='';
            $transaction->save();


            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            $notification->notification=(Session::get('amount')/100).'USD New Neteller Deposited ';
            $notification->notification_link='/spanel/deposit-fund-requests?&bymail='.$user->email.'&';
            $notification->save();


            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=(Session::get('amount')/100).'USD New Neteller Deposited From Cpanel By '.$user->email;
            $subject=(Session::get('amount')/100).' USD New Neteller Deposited By'.$user->email;
            $transport = new \Swift_SmtpTransport('smtpout.secureserver.net', 80, 'ssl');
            $transport->setUsername('support@jmibrokers.com');
            $transport->setPassword('JMI159BROKERS');
            $gmail = new Swift_Mailer($transport);
            // Set the mailer as gmail
            Mail::setSwiftMailer($gmail);
            // Send your message
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);


            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=(Session::get('amount')/100).'USD New Neteller Deposited From Cpanel By '.$user->email;
            $subject=(Session::get('amount')/100).' USD New Neteller Deposited By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);


            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم الإيداع بنجاح ، ستتم إضافة رصيدك في غضون ساعة واحدة');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Успешно депонирован, ваш кредит будет добавлен в течение одного часа');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Successfully Deposited, Your credit will be added during one hour');
            }

        }elseif(isset($_GET['neteller']) && $_GET['neteller']=='failed'){





            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-error', 'فشل عملية الأيداع او تم الألغاء , حاول مرة اخرى');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-error', 'Депозит не прошел или отменен, попробуйте еще раз позже');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-error', 'Deposit failed or cancelled try again later');
            }

            // }elseif(isset($_GET['ac_transaction_status'])){
            //
            //   echo Session::get('test');return 1111;

        }elseif(isset($_GET['ac_transaction_status']) && $_GET['ac_transaction_status']=='COMPLETED' && session::get('PAYMENT_METHOD')=='AdvCash' && session::get('PAYMENT_AMOUNT') == $_GET['ac_merchant_amount']){

            $transaction=new Transactions;
            $transaction->website_accounts_id=$user->id;
            $transaction->account=Session::get('PAYMENT_ACCOUNT_NUMBER');
            $transaction->amount=Session::get('PAYMENT_AMOUNT');
            $transaction->currency='USD';
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->type=0;
            $transaction->via='AdvCash';
            $transaction->status=0;
            $transaction->details_admin='order_id:'.$_GET['ac_order_id'].' '.'jmi_account:'.Session::get('PAYMENT_ACCOUNT_NUMBER').' '.'amount:'.(Session::get('PAYMENT_AMOUNT'));
            $transaction->details_user='';
            $transaction->save();


            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            $notification->notification=(Session::get('PAYMENT_AMOUNT')).'USD New AdvCash Deposited ';
            $notification->notification_link='/spanel/deposit-fund-requests?&bymail='.$user->email.'&';
            $notification->save();


            // // Backup your default mailer
            // $backup = Mail::getSwiftMailer();
            // $data['title']=1;
            // $data['name']='Admin';
            // $data['details']=(Session::get('PAYMENT_AMOUNT')).'USD New AdvCash Deposited From Cpanel By '.$user->email;
            // $subject=(Session::get('PAYMENT_AMOUNT')).' USD New AdvCash Deposited By'.$user->email;
            //$transport = new \Swift_SmtpTransport('smtpout.secureserver.net', 80, 'ssl');
            //  $transport->setUsername('support@jmibrokers.com');
            //$transport->setPassword('JMI159BROKERS');
            // $gmail = new Swift_Mailer($transport);
            // // Set the mailer as gmail
            // Mail::setSwiftMailer($gmail);
            // // Send your message
            // Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // // Restore your original mailer
            // Mail::setSwiftMailer($backup);


            // Backup your default mailer
            $backup = Mail::getSwiftMailer();
            $data['title']=1;
            $data['name']='Admin';
            $data['details']=(Session::get('PAYMENT_AMOUNT')).'USD New AdvCash Deposited From Cpanel By '.$user->email;
            $subject=(Session::get('PAYMENT_AMOUNT')).' USD New AdvCash Deposited By'.$user->email;
            Mail::to('support@jmibrokers.com')->send(new Queued($data,$subject));
            // Restore your original mailer
            Mail::setSwiftMailer($backup);

            Session::forget('PAYMENT_AMOUNT');
            Session::forget('PAYMENT_ACCOUNT_NUMBER');
            Session::forget('PAYMENT_METHOD');

            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/transaction-history')->with('status-success', 'تم الإيداع بنجاح ، ستتم إضافة رصيدك في غضون ساعة واحدة');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/transaction-history')->with('status-success', 'Успешно депонирован, ваш кредит будет добавлен в течение одного часа');
            }else{
                return redirect('en/cpanel/transaction-history')->with('status-success', 'Successfully Deposited, Your credit will be added during one hour');
            }


        }else{

            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | تاريخ التحويلات";
                return view('ar.cpanel.transaction-history',compact('title','user','notifications_all','notifications_unseen','location','transactions'));
            }elseif( Request::segment(1) =='ru'){
                $title = "Панель управления | Transactions History";
                return view('ru.cpanel.transaction-history',compact('title','user','notifications_all','notifications_unseen','location','transactions'));
            }else{
                $title = "Control Panel | Transactions History";
                return view('cpanel.transaction-history',compact('title','user','notifications_all','notifications_unseen','location','transactions'));
            }





        }

    }





    public function ib_overview()
    {




        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'ib-overview');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $live_accounts=website_accounts::find($user->id)->fx_accounts_live;
        $ib_accounts=Fx_accounts::where('account_type',2)->where('account_radio_type',1)->get();


        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | نبذة عن عروض نظام الريفيرال";
            return view('ar.cpanel.ib-overview',compact('title','user','notifications_all','notifications_unseen','location','live_accounts','ib_accounts'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Реферальная система (IB) Обзор";
            return view('ru.cpanel.ib-overview',compact('title','user','notifications_all','notifications_unseen','location','live_accounts','ib_accounts'));
        }else{
            $title = "Control Panel | Referral System (IB) Overview";
            return view('cpanel.ib-overview',compact('title','user','notifications_all','notifications_unseen','location','live_accounts','ib_accounts'));
        }


    }


    public function my_referrals()
    {



        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'my-referrals');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $live_accounts=website_accounts::find($user->id)->fx_accounts_live;
        $ib_accounts=Fx_accounts::where('account_type',2)->where('account_radio_type',1)->where('website_accounts_id',$user->id)->get();

        //get user referrals
        $directref=website_accounts::where('invited_by',$user->id+10000)->get();
        $allref=$directref;
        foreach($directref as $ref){
            $subref=website_accounts::where('invited_by',$ref->id+10000)->get();
            if(count($subref)>0){
                $allref=$allref->merge($subref);
            }

        }

        $ref_live_accounts=website_accounts::where('invited_by','sadas')->get();
        foreach($allref as $ref){
            $ref_live=Fx_accounts::where('account_radio_type',1)->where('website_accounts_id',$ref->id)->get();
            $ref_live_accounts=$ref_live_accounts->merge($ref_live);
        }

        $ref_demo_accounts=website_accounts::where('invited_by','sadas')->get();
        foreach($allref as $ref){
            $ref_demo=Fx_accounts::where('account_radio_type',0)->where('website_accounts_id',$ref->id)->get();
            $ref_demo_accounts=$ref_demo_accounts->merge($ref_demo);
        }

        $referrals_statics=referrals_statics::where('ref_id',$user->id+10000)->get()->all();


        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | المشتركين ";
            return view('ar.cpanel.my-referrals',compact('title','user','notifications_all','notifications_unseen','location','live_accounts','ib_accounts','allref','ref_live_accounts','ref_demo_accounts','referrals_statics'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Мои рефералы ";
            return view('ru.cpanel.my-referrals',compact('title','user','notifications_all','notifications_unseen','location','live_accounts','ib_accounts','allref','ref_live_accounts','ref_demo_accounts','referrals_statics'));
        }else{
            $title = "Control Panel | My Referrals";
            return view('cpanel.my-referrals',compact('title','user','notifications_all','notifications_unseen','location','live_accounts','ib_accounts','allref','ref_live_accounts','ref_demo_accounts','referrals_statics'));
        }


    }




    public function referrals_statics()
    {

        if(isset($_GET['myref']) && $_GET['myref'] !== Null && $_GET['myref'] !== '' &&  is_int($_GET['myref']) && $_GET['myref']>1000){


            $ref_id=$_GET['myref'];

            $new_ref=new referrals_statics;
            $new_ref->ref_id=$ref_id;
            $new_ref->country=GeoIP::getLocation()->country;
            $new_ref->ip=GeoIP::getLocation()->ip;
            $new_ref->save();
        }else{
            $new_ref=new referrals_statics;
            $new_ref->ref_id=0;
            $new_ref->country=GeoIP::getLocation()->country;
            $new_ref->ip=GeoIP::getLocation()->ip;
            $new_ref->save();
        }

    }


    public function unionpay_cards()
    {

        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'unionpay-cards');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $documents=website_accounts::find($user->id)->documents;

        $unionpay_cards=unionpay_cards::where('user_id',$user->id)->get()->all();

        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم | بطاقات يونيون باى ";
            return view('ar.cpanel.unionpay-cards',compact('title','user','unionpay_cards','notifications_all','notifications_unseen','documents'));
        }elseif( Request::segment(1) =='ru'){
            $title="Панель управления  | Unionpay Cards";
            return view('ru.cpanel.unionpay-cards',compact('title','user','unionpay_cards','notifications_all','notifications_unseen','documents'));
        }else{
            $title="Control Panel | Unionpay Cards";
            return view('cpanel.unionpay-cards',compact('title','user','unionpay_cards','notifications_all','notifications_unseen','documents'));
        }

    }



    public function order_unionpay_card()
    {

        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'unionpay-cards');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $documents=website_accounts::find($user->id)->documents;


        //check if profile not completed
        if($user->country =='' or $user->mobile ==''){
            if( Request::segment(1) =='ar'){
                return Redirect::to('/ar/cpanel/profile')->with('status-error', 'Please complete your profile first.');
            }elseif( Request::segment(1) =='ru'){
                return Redirect::to('/ru/cpanel/profile')->with('status-error', 'من فضلك اكمل الملف الشخصى أولا .');
            }else{
                return Redirect::to('/en/cpanel/profile')->with('status-error', 'Пожалуйста, сначала заполните свой профиль.');
            }
        }




        //if there is no customer account agrement or <2 documents approved
        $xx=0;
        foreach($documents as $document)
        {
            if($document->status==1){$xx++;}
        }

        if($xx < 2 ){
            if( Request::segment(1) =='ar'){
                return Redirect::to('/ar/cpanel/document')->with('status-error', 'من فضلك أرفع المستندات اولا ');;
            }elseif( Request::segment(1) =='ru'){
                return Redirect::to('/ru/cpanel/document')->with('status-error', 'Пожалуйста, сначала загрузите свои документы');;
            }else{
                return Redirect::to('/en/cpanel/document')->with('status-error', 'Please upload your documents first');;
            }
        }



        $unionpay_cards=unionpay_cards::where('user_id',$user->id)->get()->all();
        if(count($unionpay_cards)>0){
            $unionpay_card=unionpay_cards::where('user_id',$user->id)->get()->first();
            if($unionpay_card->status==2){
                $unionpay_card->status=0;
                $unionpay_card->save();
            }else{return "false";}
        }else{


            Mail::send('mails.requested_mails.unionpay',['fullname' => $user->fullname], function($message)use($user){
                $message->to($user->email);
                $message->cc('finance@jmibrokers.com');
                $message->from('finance@jmibrokers.com','JMI Brokers');
                $message->subject('UnionPay Card Request Instructions');
                $message->attach(public_path().'/assets/Files/Application Form.pdf');
                $message->attach(public_path().'/assets/Files/KYC and Card Loading.pdf');
                $message->attach(public_path().'/assets/Files/Online Account Registration.pdf');
                $message->attach(public_path().'/assets/Files/Application Form-SAMPLE.pdf');
            });


            $unionpay_card=new unionpay_cards();
            $unionpay_card->user_id=$user->id;
            $unionpay_card->status=0;
            $unionpay_card->save();
        }

        $notification=new Notifications;
        $notification->website_accounts_id=999999999;
        $notification->notification_status=0;
        $notification->notification=$user->email.' is requesting a unionpay card';
        $notification->notification_link='/spanel/unionpay-cards-request?&bymail='.$user->email.'&';
        $notification->save();


        return "true";

    }




    public function forgotpassword()
    {

        $username_email=Request::input('username_email');

        $accountt=website_accounts::where('email', $username_email)->Orwhere('username', $username_email)->get();
        if((count($accountt))>0){
            $user=website_accounts::where('email', $username_email)->Orwhere('username', $username_email)->get()->first();
            $restok=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20).rand(1,10000);
            $restoken= md5($restok);
            $token2=md5($restoken);
            $email=$user->email;
            $username = $user->username;
            $user->resettoken=$token2;
            $user->resettoken_time=time();
            $user->save();
            $token1=md5($user->id);
            //
            $token3=substr($username,0,2);
            $token5= md5(md5($email));
            $token6=substr($username,2,2);
            $token7= md5(date('d'));
            $token8=substr($username,4,40);
            //$token3 + token6 + token8 =username of forgot mail

            $resetlink=URL::to('/api/reset-password/').'/'.$token1.'/'.$token2.'/'.$token3.'/'.$token5.'/'.$token6.'/'.$token7.'/'.$token8;
            Mail::send('mails.forgot-passwordmail',['email' => $email,'resetlink' => $resetlink], function($message)use ($resetlink , $email){
                $message->to($email);
                $message->from('support@jmibrokers.com','JMI Brokers');
                $message->subject('Reset Your Password');
            });

            return 1;

        }else{


            return response()->json([
                'errors' =>
                    [
                        'en'=>'Wrong Mail or Username !!',
                        'ar'=>'البريد الألكترونى غير صحيح',
                        'ru'=>'Неверный адрес электронной почты или имя пользователя',
                    ]
            ], 201);

        }
    }




    public function resetpassword($token1,$token2,$token3,$token5,$token6,$token7,$token8)

    {


        $username=$token3.$token6.$token8;

        $accountt=website_accounts::where('username', $username)->get();
        if((count($accountt))>0){

            $user=website_accounts::where('username', $username)->get()->first();

            if($token1 == md5($user->id) && $token2 == $user->resettoken  && $token5 == md5(md5($user->email)) && $token7 = md5(date('d')) && ($user->resettoken_time+3600) > time()){

                Request::session()->put('userressetpassword', $username);

                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/reset-password');

                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/reset-password');

                }else{
                    return Redirect::to('/en/reset-password');

                }

            }else{

                if( Request::segment(1) =='ar'){
                    return Redirect::to('/ar/forgot-password')->with('status-error', 'رابط خطأ , أطلب رابط أخر');

                }elseif( Request::segment(1) =='ru'){
                    return Redirect::to('/ru/forgot-password')->with('status-error', 'Неверная ссылка Запрос другого');

                }else{
                    return Redirect::to('/en/forgot-password')->with('status-error', 'Invalid Link Request Another');

                }

            }


        }else{


            if( Request::segment(1) =='ar'){
                return Redirect::to('/ar/forgot-password')->with('status-error', 'رابط خطأ , أطلب رابط أخر');

            }elseif( Request::segment(1) =='ru'){
                return Redirect::to('/ru/forgot-password')->with('status-error', 'Неверная ссылка Запрос другого');

            }else{
                return Redirect::to('/en/forgot-password')->with('status-error', 'Invalid Link Request Another');

            }


        }


    }




    public function storeresetpassword()
    {


        if(!empty(session('userressetpassword'))){

            $newpassword=Request::input('newpassword');
            $confirmnewpassword=Request::input('confirmnewpassword');

            $accountt=website_accounts::where('username', session('userressetpassword'))->get();
            if((count($accountt))>0){
                $user=website_accounts::where('username', session('userressetpassword'))->get()->first();
                $this->validate(Request(), [
                    'newpassword' => 'required|min:8|max:40',
                    'confirmnewpassword' => 'required|min:8|max:40',

                ]);
                if($newpassword == $confirmnewpassword){
                    $encpassword= Hash::make($newpassword);
                    $user->resettoken_time=(time()-50000);
                    $user->password=$encpassword;
                    $user->save();

                    session::flush();

                    return response()->json([
                        'message' =>
                            [
                                'en'=>'Your Password Has Been Changed Successfully',
                                'ar'=>'تم تغيير كلمة اسر بنجاح',
                                'ru'=>'Ваш пароль был успешно изменен',
                            ]
                    ], 200);


                }else{

                    return response()->json([
                        'errors' =>
                            [
                                'en'=>'Password Must Equals Confirm Password',
                                'ar'=>'كلمة السر يجب ان تكون متطابقة للتأكيد',
                                'ru'=>'Пароль должен быть равен Подтверждение пароля',
                            ]
                    ], 201);


                }


            }

        }else{
            session::flush();
            return response()->json([
                'errors' =>
                    [
                        'en'=>'An error has been occurred',
                        'ar'=>'An error has been occurred',
                        'ru'=>'An error has been occurred',
                    ]
            ], 201);
        }
    }





    public function copy_trade()
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'copy-trade');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $copy_trades=CopyTrade::where('website_accounts_id',$user->id)->get()->all();
        $accounts=website_accounts::find($user->id)->fx_accounts_live;

        if( Request::segment(1) =='ar'){
            $title = "لوحة التحكم |  نسخ الصفقات ";
            return view('ar.cpanel.copy-trade',compact('title','user','notifications_all','notifications_unseen','location','accounts','copy_trades'));
        }elseif( Request::segment(1) =='ru'){
            $title = "Панель управления | Внутренний трансфер ";
            return view('ru.cpanel.copy-trade',compact('title','user','notifications_all','notifications_unseen','location','accounts','copy_trades'));
        }else{
            $title = "Control Panel | Copy Trade";
            return view('cpanel.copy-trade',compact('title','user','notifications_all','notifications_unseen','location','accounts','copy_trades'));
        }

    }


    public function post_copy_trade()
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'copy-trade');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $input=Request::all();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $accounts=website_accounts::find($user->id)->fx_accounts_live;
        $copy_from=$input['copy_from'];

        if($input['copy_from']=='other'){
            $copy_from=$input['other_account'];

            $this->validate(Request(), [
                'other_account' => 'regex:/^[0-9]*$/|max:9',
            ]);


        }else{
            $this->validate(Request(), [
                'copy_to' => 'regex:/^[0-9]*$/|max:9',
            ]);

        }

        $this->validate(Request(), [
            'copy_from' => 'required|regex:/^[0-9]*$/|max:9',
            'copy_to' => 'required|regex:/^[0-9]*$/|max:9',
            'percentage' => 'required|numeric|min:0|not_in:0',
            'password' => 'required',
        ]);


        //check of password
        $query="|MODE=7|LOGIN=".$input['copy_to']."|[CPASS=".$input['password'];
        //--- prepare query
        //--- send request
        $ret='error';
        //---- open socket
        $q = "WMQWEBAPI MASTER=jmi2020".$query."\nQUIT\n";
        $ptr=@fsockopen('89.116.30.28','443',$errno,$errstr,5);
        //---- check connection
        if($ptr)
        {
            //---- send request
            if(fputs($ptr,$q)!=FALSE)
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

        if($ret == Null or $ret =='error')
        {
            //--- send request
            $ret='error';
            //---- open socket
            $q = "WMQWEBAPI MASTER=jmi2020".$query."\nQUIT\n";
            $ptr=@fsockopen('92.204.139.189','443',$errno,$errstr,5);
            //---- check connection
            if($ptr)
            {
                //---- send request
                if(fputs($ptr,$q)!=FALSE)
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
        }

        $ret = substr($ret,0,strlen($ret)-1);
        $result = json_decode($ret);

        //result 0  means success
        //pasword is working

        //try{
        if(is_object($result) && isset($result->result) && $result->result==0){

            $transaction=new CopyTrade;
            $transaction->website_accounts_id=$user->id;
            $transaction->copy_from=$copy_from;
            $transaction->copy_to=$input['copy_to'];
            //transaction type 0 = deposit   1 = withdraw    3= transfeer
            $transaction->percentage=$input['percentage'];
            $transaction->status=0;
            $transaction->details_user='';
            $transaction->details_admin='';
            $transaction->save();


            $notification1=new Notifications;
            $notification1->website_accounts_id=$user->id;
            $notification1->notification_status=0;
            $notification1->notification='Your copy trade request has been received successfully.';
            $notification1->details='Your copy trade request has been received successfully.';

            $notification1->notification_ar='تم استلام طلب نسخ التداول الخاص بك بنجاح.';
            $notification1->details_ar='تم استلام طلب نسخ التداول الخاص بك بنجاح.';

            $notification1->notification_ru='Ваш запрос на копирование был успешно получен.';
            $notification1->details_ru='Ваш запрос на копирование был успешно получен.';

            $notification1->notification_link='/cpanel/copy-trade';
            $notification1->save();


            $notification=new Notifications;
            $notification->website_accounts_id=999999999;
            $notification->notification_status=0;
            $notification->notification=$user->email.' is requesting a Copy Trade';
            $notification->notification_link='/spanel/copy-trade?&bymail='.$user->email.'&';
            $notification->save();

            if( Request::segment(1) =='ar'){
                return redirect('ar/cpanel/copy-trade')->with('status-success', 'تم طلب نسخ الصفقات بنجاح');
            }elseif( Request::segment(1) =='ru'){
                return redirect('ru/cpanel/copy-trade')->with('status-success', 'Copy trade requested successfully');
            }else{
                return redirect('en/cpanel/copy-trade')->with('status-success', 'Copy trade requested successfully');
            }


        }
        //  }catch(e){



        if( Request::segment(1) =='ar'){
            return redirect('ar/cpanel/copy-trade')->with('status-error', 'فشل طلب النقل');
        }elseif( Request::segment(1) =='ru'){
            return redirect('ru/cpanel/copy-trade')->with('status-error', 'Copy request failed');
        }else{
            return redirect('en/cpanel/copy-trade')->with('status-error', 'Copy request failed');
        }



        //}

    }


    public function delete_copy_trade($id)
    {


        Session::flash('pageType', 'menu');
        Session::flash('currentPage', 'documents');
        $session_user= Session::get('user');
        $location = GeoIP::getLocation();
        $input=Request::all();

        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        $copy_trade=CopyTrade::where('id',$id)->where('website_accounts_id',$user->id)->get()->first();
        $copy_trade->status=8;
        $copy_trade->save();


        $notification1=new Notifications;
        $notification1->website_accounts_id=$user->id;
        $notification1->notification_status=0;
        $notification1->notification='Your copy trade deleting request has been received successfully.';
        $notification1->details='Your copy trade deleting request has been received successfully.';

        $notification1->notification_ar='تم استلام طلب حذف نسخ التداول الخاص بك بنجاح.';
        $notification1->details_ar='تم استلام طلب حذف نسخ التداول الخاص بك بنجاح.';

        $notification1->notification_ru='Ваш запрос на удаление копии сделки успешно получен.';
        $notification1->details_ru='Ваш запрос на удаление копии сделки успешно получен.';

        $notification1->notification_link='/cpanel/copy-trade';
        $notification1->save();






        if( Request::segment(1) =='ar'){
            return redirect('ar/cpanel/copy-trade');
        }elseif( Request::segment(1) =='ru'){
            return redirect('ru/cpanel/copy-trade');
        }else{
            return redirect('en/cpanel/copy-trade');
        }





    }








    public function logout()
    {
        session::flush();

        return redirect('/en/login');

    }


    public function read_notifications()
    {

        $session_user= Session::get('user');
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications=Notifications::where('website_accounts_id',$user->id)->update(['notification_status' => 1]);

        return 1;
    }

    public function get_notifications()
    {

        $session_user= Session::get('user');
        $user=website_accounts::where('username',$session_user)->Orwhere('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',$user->id)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();


        $requested_accounts_search = 'Opening account request processed successfully';
         $requested_accounts = array_filter($notifications_all, function($var) use ($requested_accounts_search) { return preg_match("/\b$requested_accounts_search\b/i", $var); });

        $accepted_accounts_search1 = 'Has Been Opened Successfully';
        $accepted_accounts_search2 = 'Live Account';

        $accepted_accounts0 = array_filter($notifications_all, function($var) use ($accepted_accounts_search1) { return preg_match("/\b$accepted_accounts_search1\b/i", $var); });
        $accepted_accounts = array_filter($accepted_accounts0, function($var) use ($accepted_accounts_search1) { return preg_match("/\b$accepted_accounts_search1\b/i", $var); });
        $pending_account=0;
        if(count($requested_accounts)>count($accepted_accounts)){$pending_account=1; }

        return response()->json([
            [
                'notifications_all'=>$notifications_all,
                'notifications_unseen'=>$notifications_unseen,
                'pending_account'=>$pending_account,
            ]
        ], 200);
    }

    public function get_string_between($string, $start, $end)
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }




}
