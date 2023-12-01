<?php

namespace App\Http\Controllers;
use App\Http\Requests;

use Request;
use Session;
use Hash;
use URL;
use App\Models\Website_accounts;
use App\Models\Website_admins;
use App\Models\Documents;
use App\Models\Fx_accounts;
use App\Models\Notifications;
use BrowserDetect;
use App\Models\refuser;
use App\Models\refaccounts;
use App\Models\Transactions;
use App\Models\callbackrequest;
use App\Models\maillist;
use App\Models\Mail\Queued;
use App\Models\landingusers;
use App\Models\search;
use App\Models\en_slideshow;
use App\Models\ru_slideshow;
use App\Models\ar_slideshow;
use App\Models\technicalanalysis;
use App\Models\fundamentalanalysis;
use App\Models\offers_events;
use App\Models\CopyTrade;
use App\Models\news;
use App\Models\unionpay_cards;

use Excel;

use App\Models\Exports\maillistExport;
use App\Models\Exports\landingusersExport;
use App\Models\Exports\websiteaccountsExport;

use App\Models\Competetion;

//use Carbon;

use GeoIP;
use File;
use Mail;
use Redirect;

use Swift_SmtpTransport;
use Swift_Mailer;

use Twilio\Rest\Client;



use Carbon\Carbon;



class epanelcontroller extends Controller
{




    public function login()
    {

        if (Session::has('editor')) {

            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/home');
            }else{
                return redirect('en/epanel/home');
            }

        } else {

            if( Request::segment(1) =='ar'){
                $title = "تسجيل الدخول";
                return view('ar.epanel.login',compact('title'));
            }else{
                $title = "Client Login";
                return view('epanel.login',compact('title'));
            }

            }



    }









    public function post_password()
    {

        $input=Request::all();

        $session_user= Session::get('editor');
        $user=website_admins::where('email',$session_user)->get()->first();

                $this->validate(Request(), [
                    'password' => 'required|min:8|max:40',
                    'confirmpassword' => 'required|min:8|max:40|same:password',
                ]);
              if(Hash::check($input['currentpassword'], $user->password)) {


	            $encpassword= Hash::make($input['password']);

	            $user->password=$encpassword;
	            if( $user->save() ){

	            if( Request::segment(1) =='ar'){
	                return redirect('ar/epanel/home')->with('status-success', 'تم تغيير كلمة السر');
	            }else{
	                return redirect('en/epanel/home')->with('status-success', 'Password updated!');
	            }

	            }


              }else{


                if( Request::segment(1) =='ar'){
                    return redirect('ar/epanel/home')->with('status-error', 'كلمة السر الحالية غير صحيحة');
                }else{
                    return redirect('en/epanel/home')->with('status-error', 'Current Password Wrong !');
                }

              }


    }








   public function home()
    {


        Session::flash('pageType', 'other');
        Session::flash('currentPage', 'landing');
        $session_user= Session::get('editor');
        $user=website_admins::where('email',$session_user)->get()->first();
        $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();

            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | الأدارة ";
                return view('ar.epanel.home',compact('title','user','notifications_all','notifications_unseen'));
            }else{
                $title = "epanel | Home";
                return view('epanel.home',compact('title','user','notifications_all','notifications_unseen'));
            }





    }







   public function admins()
    {


        Session::flash('pageType', 'general');
        Session::flash('currentPage', 'admins');
        $session_user= Session::get('editor');
      	$notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();
        $admins=website_admins::get()->all();
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | المديرين ";
                return view('ar.epanel.admins',compact('title','user','notifications_all','notifications_unseen','admins'));
            }else{
                $title = "epanel | Admins";
                return view('epanel.admins',compact('title','user','notifications_all','notifications_unseen','admins'));
            }





    }





    public function add_admins()
    {


        Session::flash('pageType', 'general');
        Session::flash('currentPage', 'admins');
        $session_user= Session::get('editor');

        $input=Request::all();

        $user=website_admins::where('email',$session_user)->get()->first();

                    $admin=new website_admins;


                    $admin->name=$input['name'];
                    $admin->email=$input['email'];
                    $admin->roll=$input['roll'];
                    $admin->password=Hash::make($input['password']);
                    $admin->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/admins');
            }else{
                return redirect('en/epanel/admins');
            }



    }


    public function edit_admins($id)
    {


        Session::flash('pageType', 'general');
        Session::flash('currentPage', 'admins');
        $session_user= Session::get('editors');

        $input=Request::all();

        $user=website_admins::where('email',$session_user)->get()->first();

                    $admin=website_admins::where('id',$id)->get()->first();

                    $admin->name=$input['name'];
                    $admin->email=$input['email'];
                    $admin->roll=$input['roll'];
                    $admin->password=Hash::make($input['password']);
                    $admin->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/admins');
            }else{
                return redirect('en/epanel/admins');
            }



    }

    public function delete_admins($id)
    {


        Session::flash('pageType', 'general');
        Session::flash('currentPage', 'admins');
        $session_user= Session::get('editor');

        $input=Request::all();

        $user=website_admins::where('email',$session_user)->get()->first();

            $admin=website_admins::where('id',$id)->get()->first();
            $admin->delete();


            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/admins');
            }else{
                return redirect('en/epanel/admins');
            }



    }







    public function website_accounts()
    {


        Session::flash('pageType', 'allaccounts');
        Session::flash('currentPage', 'website-accounts');
        $session_user= Session::get('editor');

      	$notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();
        $website_accounts=website_accounts::orderBy('id','desc')->get()->all();
        $documents=documents::get()->all();
        $demo_accounts=Fx_accounts::where('account_radio_type',0)->get()->all();
        $live_accounts=Fx_accounts::where('account_radio_type',1)->get()->all();



            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | الحسابات الديمو ";
                return view('ar.epanel.website-accounts',compact('title','user','notifications_all','notifications_unseen','website_accounts','balances','equities','documents','demo_accounts','live_accounts'));
            }else{
                $title = "epanel | Website Accounts";
                return view('epanel.website-accounts',compact('title','user','notifications_all','notifications_unseen','website_accounts','balances','equities','documents','demo_accounts','live_accounts'));
            }

    }




    public function export_website_accounts_all()
    {

        return Excel::download(new websiteaccountsExport(), 'website-accounts-list.xlsx');

    }



    public function demo_accounts()
    {


        Session::flash('pageType', 'allaccounts');
        Session::flash('currentPage', 'demo-accounts');
        $session_user= Session::get('editor');

      	$notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();
        $accounts=Fx_accounts::where('account_radio_type',0)->orderBy('id','desc')->get()->all();

        $balances=array();
        $equities=array();


        foreach($accounts as $account){

               $ret='error';
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


             $fx_balance = $this->get_string_between($ret, 'Balance:', 'Equity');
             $fx_equity = $this->get_string_between($ret, 'Equity:', 'Margin');

            array_push($balances, $fx_balance);
            array_push($equities, $fx_equity);


        }


            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | الحسابات الديمو ";
                return view('ar.epanel.demo-accounts',compact('title','user','notifications_all','notifications_unseen','accounts','balances','equities'));
            }else{
                $title = "epanel | Demo Accounts";
                return view('epanel.demo-accounts',compact('title','user','notifications_all','notifications_unseen','accounts','balances','equities'));
            }

    }


    public function delete_demo_accounts($id)
    {


        Session::flash('pageType', 'general');
        Session::flash('currentPage', 'admins');
        $session_user= Session::get('editor');

        $input=Request::all();

        $user=website_admins::where('email',$session_user)->get()->first();

                    $demo_account=Fx_accounts::where('id',$id)->get()->first();


                    $demo_account->delete();

            return redirect()->back();


           if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/demo-accounts');
            }else{
                return redirect('en/epanel/demo-accounts');
            }



    }

    public function live_accounts()
    {


        Session::flash('pageType', 'allaccounts');
        Session::flash('currentPage', 'live-accounts');
        $session_user= Session::get('editor');

      	$notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();
        $accounts=Fx_accounts::where('account_radio_type',1)->orderBy('id','desc')->get()->all();


        $balances=array();
        $equities=array();


        foreach($accounts as $account){

               $ret='error';
            //---- open socket
               $ptr=@fsockopen('151.106.39.134','443',$errno,$errstr,5);
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


             $fx_balance = $this->get_string_between($ret, 'Balance:', 'Equity');
             $fx_equity = $this->get_string_between($ret, 'Equity:', 'Margin');

            array_push($balances, $fx_balance);
            array_push($equities, $fx_equity);



        }


            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | الحسابات الديمو ";
                return view('ar.epanel.live-accounts',compact('title','user','notifications_all','notifications_unseen','accounts','balances','equities'));
            }else{
                $title = "epanel | Live Accounts";
                return view('epanel.live-accounts',compact('title','user','notifications_all','notifications_unseen','accounts','balances','equities'));
            }


    }





    public function referrals_accounts()
    {



        Session::flash('pageType', 'allaccounts');
        Session::flash('currentPage', 'referrals-accounts');
        $session_user= Session::get('editor');

        $user=website_admins::where('email',$session_user)->get()->first();
      	$notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        //get all referrals
        $website_accounts=website_accounts::get()->all();
        $ref_accounts=website_accounts::where('invited_by','>',10000)->orderBy('id','desc')->get()->all();
        $live_accounts=Fx_accounts::where('account_radio_type',1)->get()->all();
        $demo_accounts=Fx_accounts::where('account_radio_type',0)->get()->all();





            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | المشتركين ";
                return view('ar.epanel.referrals-accounts',compact('title','user','notifications_all','notifications_unseen','live_accounts','demo_accounts','ref_accounts','website_accounts'));
            }else{
                $title = "epanel | My Referrals";
                return view('epanel.referrals-accounts',compact('title','user','notifications_all','notifications_unseen','live_accounts','demo_accounts','ref_accounts','website_accounts'));
            }


    }








    public function documents()
    {


        Session::flash('pageType', 'general');
        Session::flash('currentPage', 'documents');
        $session_user= Session::get('editor');

      	$notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();
        $documents=documents::orderBy('id','desc')->get()->all();
        $website_accounts=website_accounts::get()->all();

            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | مستندات المستخدمين ";
                return view('ar.epanel.documents',compact('title','user','notifications_all','notifications_unseen','documents','website_accounts'));
            }else{
                $title = "epanel | Users Documents";
                return view('epanel.documents',compact('title','user','notifications_all','notifications_unseen','documents','website_accounts'));
            }

    }


    public function delete_documents($id)
    {


        Session::flash('pageType', 'general');
        Session::flash('currentPage', 'documents');
        $session_user= Session::get('editor');

        $input=Request::all();

                    $document=Documents::where('id',$id)->get()->first();
                    $website_accounts_id=$document->website_accounts_id;
                    $last_document=$document->document;
                    $path = substr($last_document, strpos($last_document, "assets/user_documents"));


                    $document->delete();

                $notification=new Notifications;
                $notification->website_accounts_id=$website_accounts_id;
                $notification->notification_status=0;
                $notification->notification='Your Pending Document Has Been Approved';
                $notification->notification_link='/cpanel/documents';
                $notification->save();

            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/documents');
            }else{
                return redirect('en/epanel/documents');
            }

    }



    public function approve_documents($id)
    {

        Session::flash('pageType', 'general');
        Session::flash('currentPage', 'documents');
        $session_user= Session::get('editor');

        $input=Request::all();

                    $document=Documents::where('id',$id)->get()->first();
                    $website_accounts_id=$document->website_accounts_id;
                    $document->status=1;
                    $document->save();

                $notification=new Notifications;
                $notification->website_accounts_id=$website_accounts_id;
                $notification->notification_status=0;
                $notification->notification='Your Pending Document Has Been Approved';
                $notification->notification_link='/cpanel/documents';
                $notification->save();

            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/documents');
            }else{
                return redirect('en/epanel/documents');
            }

    }


	public function notifications()
	{

		$notifications=Notifications::where('website_accounts_id',999999999)->update(['notification_status' => 1]);

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






    public function deposit_fund_requests()
    {


        Session::flash('pageType', 'fund-requests');
        Session::flash('currentPage', 'deposit-fund-requests');
        $session_user= Session::get('editor');

        $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();
        $documents=documents::get()->all();
        $website_accounts=website_accounts::get()->all();
        $transactions=Transactions::orderBy('id','desc')->get()->all();

        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        if( Request::segment(4) ==''){
                $transactions=Transactions::where('type',0)->orderBy('id','desc')->get()->all();
        }elseif( Request::segment(4) =='pending'){
                $transactions=Transactions::where('type',0)->where('status',0)->orderBy('id','desc')->get()->all();
        }elseif( Request::segment(4) =='done'){
                $transactions=Transactions::where('type',0)->where('status',1)->orderBy('id','desc')->get()->all();
        }elseif( Request::segment(4) =='rejected'){
                $transactions=Transactions::where('type',0)->where('status',9)->orderBy('id','desc')->get()->all();
        }

            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | طلبات الأيداع ";
                return view('ar.epanel.deposit-fund-requests',compact('title','user','notifications_all','notifications_unseen','documents','website_accounts','transactions'));
            }else{
                $title = "epanel |  Deposit Funds Requests ";
                return view('epanel.deposit-fund-requests',compact('title','user','notifications_all','notifications_unseen','documents','website_accounts','transactions'));
            }

    }

    public function post_deposit_fund_requests()
    {


        Session::flash('pageType', 'fund-requests');
        Session::flash('currentPage', 'deposit-fund-requests');
        $input = Request::all();
        $session_user= Session::get('editor');
        $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();

        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();

            $transaction=Transactions::where('status',0)->where('type',0)->where('id',$input['transaction_id'])->get()->first();
            $transaction->status=$input['transaction_status'];
            $transaction->details_user=$input['note'];
            $website_accounts_id=$transaction->website_accounts_id;


            $transaction->save();
                $notification=new Notifications;
                $notification->website_accounts_id=$website_accounts_id;
                $notification->notification_status=0;
                $notification->notification='Your Pending Deposit Request Has Been Done';
                $notification->notification_link='/cpanel/transaction-history';
                $notification->save();
            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/deposit-fund-requests');
            }else{
                return redirect('en/epanel/deposit-fund-requests');
            }

    }





    public function withdraw_fund_requests()
    {


        Session::flash('pageType', 'fund-requests');
        Session::flash('currentPage', 'withdraw-fund-requests');
        $session_user= Session::get('editor');

        $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();
        $documents=documents::get()->all();
        $website_accounts=website_accounts::get()->all();
        $transactions=Transactions::orderBy('id','desc')->get()->all();

        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        if( Request::segment(4) ==''){
                $transactions=Transactions::where('type',1)->orderBy('id','desc')->get()->all();
        }elseif( Request::segment(4) =='pending'){
                $transactions=Transactions::where('type',1)->where('status',0)->orderBy('id','desc')->get()->all();
        }elseif( Request::segment(4) =='done'){
                $transactions=Transactions::where('type',1)->where('status',1)->orderBy('id','desc')->get()->all();
        }elseif( Request::segment(4) =='rejected'){
                $transactions=Transactions::where('type',1)->where('status',9)->orderBy('id','desc')->get()->all();
        }

            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | طلبات السحب ";
                return view('ar.epanel.withdraw-fund-requests',compact('title','user','notifications_all','notifications_unseen','documents','website_accounts','transactions'));
            }else{
                $title = "epanel |  Withdraw Funds Requests";
                return view('epanel.withdraw-fund-requests',compact('title','user','notifications_all','notifications_unseen','documents','website_accounts','transactions'));
            }

    }

    public function post_withdraw_fund_requests()
    {


        Session::flash('pageType', 'fund-requests');
        Session::flash('currentPage', 'withdraw-fund-requests');
        $input = Request::all();
        $session_user= Session::get('editor');
        $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();

        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();

            $transaction=Transactions::where('status',0)->where('type',1)->where('id',$input['transaction_id'])->get()->first();
            $transaction->status=$input['transaction_status'];
            $transaction->details_user=$input['note'];
            $website_accounts_id=$transaction->website_accounts_id;


            $transaction->save();
                $notification=new Notifications;
                $notification->website_accounts_id=$website_accounts_id;
                $notification->notification_status=0;
                $notification->notification='Your Pending Withdraw Request Has Been Done';
                $notification->notification_link='/cpanel/transaction-history';
                $notification->save();
            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/withdraw-fund-requests');
            }else{
                return redirect('en/epanel/withdraw-fund-requests');
            }

    }







    public function internal_transfers_requests()
    {


        Session::flash('pageType', 'fund-requests');
        Session::flash('currentPage', 'internal-transfers-requests');
        $session_user= Session::get('editor');

        $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();
        $documents=documents::get()->all();
        $website_accounts=website_accounts::get()->all();
        $transactions=Transactions::orderBy('id','desc')->get()->all();

        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();
        if( Request::segment(4) ==''){
                $transactions=Transactions::where('type',2)->orderBy('id','desc')->get()->all();
        }elseif( Request::segment(4) =='pending'){
                $transactions=Transactions::where('type',2)->where('status',0)->orderBy('id','desc')->get()->all();
        }elseif( Request::segment(4) =='done'){
                $transactions=Transactions::where('type',2)->where('status',1)->orderBy('id','desc')->get()->all();
        }elseif( Request::segment(4) =='rejected'){
                $transactions=Transactions::where('type',2)->where('status',9)->orderBy('id','desc')->get()->all();
        }

            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | طلبات التحويل ";
                return view('ar.epanel.internal-transfers-requests',compact('title','user','notifications_all','notifications_unseen','documents','website_accounts','transactions'));
            }else{
                $title = "epanel |  Internal Transfer Requests";
                return view('epanel.internal-transfers-requests',compact('title','user','notifications_all','notifications_unseen','documents','website_accounts','transactions'));
            }

    }

    public function post_internal_transfers_requests()
    {


        Session::flash('pageType', 'fund-requests');
        Session::flash('currentPage', 'internal-transfers-requests');
        $input = Request::all();
        $session_user= Session::get('editor');
        $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();

        $notifications_unseen=Notifications::where('website_accounts_id',$user->id)->where('notification_status',0)->get()->all();

            $transaction=Transactions::where('status',0)->where('type',2)->where('id',$input['transaction_id'])->get()->first();
            $transaction->status=$input['transaction_status'];
            $transaction->details_user=$input['note'];
            $website_accounts_id=$transaction->website_accounts_id;


            $transaction->save();
                $notification=new Notifications;
                $notification->website_accounts_id=$website_accounts_id;
                $notification->notification_status=0;
                $notification->notification='Your Pending Internal Transfer Request Has Been Done';
                $notification->notification_link='/cpanel/transaction-history';
                $notification->save();
            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/internal-transfers-requests');
            }else{
                return redirect('en/epanel/internal-transfers-requests');
            }

    }








   public function callback_requests()
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'callback-requests');
        $session_user= Session::get('editor');
        $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();
        $callbackrequests = callbackrequest::all()->sortByDesc("id");
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | طلب أتصال ";
                return view('ar.epanel.callback-requests',compact('title','user','notifications_all','notifications_unseen','callbackrequests'));
            }else{
                $title = "epanel | Call Back Request";
                return view('epanel.callback-requests',compact('title','user','notifications_all','notifications_unseen','callbackrequests'));
            }


    }




    public function delete_callback_requests($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'callback-requests');
        $session_user= Session::get('editor');

        $input=Request::all();

        $callbackrequest=callbackrequest::where('id',$id)->get()->first();

        $callbackrequest->delete();


            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/callback-requests')->with('status-success','Selected CallBack Has Been Deleted');
            }else{
                return redirect('en/epanel/callback-requests')->with('status-success','Selected CallBack Has Been Deleted');
            }



    }








   public function landing_users()
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'landing-users');
        $session_user= Session::get('editor');
        $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();
        $arr=['landing14','landing15','landing16','landing17','landing18','landing19','landing20'];
        $arr2=['landing14','landing15','landing16','landing17','landing18','landing19','landing20','landing 14','landing 15','landing 16','landing 17','landing 18','landing 19','landing 20'];
        if($session_user=='ibrahimsamybursagi@gmail.com'){
            $landingusers = landingusers::wherein('landing_name',$arr)->wherein('cookie',$arr2,'or')->get()->all();
        }else{
          $landingusers = landingusers::all()->sortByDesc("id");


        }


            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | حسابات الدعايا ";
                return view('ar.epanel.landing-users',compact('title','user','notifications_all','notifications_unseen','landingusers'));
            }else{
                $title = "epanel | Landing Users";
                return view('epanel.landing-users',compact('title','user','notifications_all','notifications_unseen','landingusers'));
            }


    }




    public function delete_landing_users($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'landing-users');
        $session_user= Session::get('editor');

        $input=Request::all();

        $ids = explode(",", $id);
        foreach ($ids as $idd) {
        $landingusers=landingusers::where('id',$idd)->get()->first();
        $landingusers->delete();
        }




            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/landing-users')->with('status-success','Selected Landing Has Been Deleted');
            }else{
                return redirect('en/epanel/landing-users')->with('status-success','Selected Landing Has Been Deleted');
            }



    }


    public function export_landing_all()
    {

        return Excel::download(new landingusersExport(), 'landinglist.xlsx');

    }




   public function all_search()
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'all-search');
        $session_user= Session::get('editor');
        $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();
            $all_search = search::all()->sortByDesc("id");
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | كل البحث ";
                return view('ar.epanel.all-search',compact('title','user','notifications_all','notifications_unseen','all_search'));
            }else{
                $title = "epanel | All Search";
                return view('epanel.all-search',compact('title','user','notifications_all','notifications_unseen','all_search'));
            }


    }




    public function delete_search($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'all-search');
        $session_user= Session::get('editor');

        $input=Request::all();
        $ids = explode(",", $id);
        foreach ($ids as $idd) {
        $search=search::where('id',$idd)->get()->first();
        $search->delete();
        }



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/all-search')->with('status-success','Selected Search Has Been Deleted');
            }else{
                return redirect('en/epanel/all-search')->with('status-success','Selected Search Has Been Deleted');
            }



    }


    public function add_search()
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'all-search');
        $session_user= Session::get('editor');

        $input=Request::all();

            $search = new search;
            $search->url=$input['url'];;
            $search->ar_title=$input['ar_title'];;
            $search->en_title=$input['en_title'];;
            $search->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/all-search')->with('status-success','New Search Has Been Created');
            }else{
                return redirect('en/epanel/all-search')->with('status-success','New Search Has Been Created');
            }



    }

















            public function en_slideshow(Request $request)
            {


                Session::flash('pageType', 'slideshow');
                Session::flash('currentPage', 'en-slideshow');
                $session_user= Session::get('editor');
                $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
                $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
                $user=website_admins::where('email',$session_user)->get()->first();
                    $slide1 = en_slideshow::where('slide',1)->get()->first();
                    $slide2 = en_slideshow::where('slide',2)->get()->first();
                    $slide3 = en_slideshow::where('slide',3)->get()->first();
                    $slide4 = en_slideshow::where('slide',4)->get()->first();
                    $slide5 = en_slideshow::where('slide',5)->get()->first();
                    if( Request::segment(1) =='ar'){
                        $title = "لوحة التحكم | أرسال الأيميلات ";
                        return view('ar.epanel.en-slideshow',compact('title','user','notifications_all','notifications_unseen','slide1','slide2','slide3','slide4','slide5'));
                    }else{
                        $title = "epanel | EN SlideShow";
                        return view('epanel.en-slideshow',compact('title','user','notifications_all','notifications_unseen','slide1','slide2','slide3','slide4','slide5'));
                    }


            }

            public function post_en_slideshow(Request $request)
            {

                $input=Request::all();


                    if( $input['slidedisplay1']==1){
                        //validation
                    $this->validate(Request(), [
                    'slide1a1' => 'required|','a1display1' => 'required|','a1link1' => 'required|','a1fontsize1' => 'required|','a1color1' => 'required|','a1background1' => 'required|','a1width1' => 'required|','a1height1' => 'required|','a1top1' => 'required|','a1left1' => 'required|','slide1t' => 'required|','tdisplay1' => 'required|','tlink1' => 'required|','tfontsize1' => 'required|','tcolor1' => 'required|','tbackground1' => 'required|','twidth1' => 'required|','theight1' => 'required|','ttop1' => 'required|','tleft1' => 'required|','slide1d1' => 'required|','d1display1' => 'required|','d1link1' => 'required|','d1fontsize1' => 'required|','d1color1' => 'required|','d1background1' => 'required|','d1width1' => 'required|','d1height1' => 'required|','d1top1' => 'required|','d1left1' => 'required|','slide1d2' => 'required|','d2display1' => 'required|','d2link1' => 'required|','d2fontsize1' => 'required|','d2color1' => 'required|','d2background1' => 'required|','d2width1' => 'required|','d2height1' => 'required|','d2top1' => 'required|','d2left1' => 'required|','slide1d3' => 'required|','d3display1' => 'required|','d3link1' => 'required|','d3fontsize1' => 'required|','d3color1' => 'required|','d3background1' => 'required|','d3width1' => 'required|','d3height1' => 'required|','d3top1' => 'required|','d3left1' => 'required|','slide1d4' => 'required|','d4display1' => 'required|','d4link1' => 'required|','d4fontsize1' => 'required|','d4color1' => 'required|','d4background1' => 'required|','d4width1' => 'required|','d4height1' => 'required|','d4top1' => 'required|','d4left1' => 'required|','slide1d5' => 'required|','d5display1' => 'required|','d5link1' => 'required|','d5fontsize1' => 'required|','d5color1' => 'required|','d5background1' => 'required|','d5width1' => 'required|','d5height1' => 'required|','d5top1' => 'required|','d5left1' => 'required|','slide1btn' => 'required|','btndisplay1' => 'required|','btnlink1' => 'required|','btnfontsize1' => 'required|','btncolor1' => 'required|','btnbackground1' => 'required|','btnwidth1' => 'required|','btnheight1' => 'required|','btntop1' => 'required|','btnleft1' => 'required|',

                    ]);
                }


                        $slide1 = en_slideshow::where('slide',1)->get()->first();

                        $slide1->slide_display = $input['slidedisplay1'];

                        $slide1->a1 = $input['slide1a1'];
                        $slide1->a1_display = $input['a1display1'];
                        $slide1->a1_link = $input['a1link1'];
                        $slide1->a1_fontsize = $input['a1fontsize1'];
                        $slide1->a1_color = $input['a1color1'];
                        $slide1->a1_background = $input['a1background1'];
                        $slide1->a1_width = $input['a1width1'];
                        $slide1->a1_height = $input['a1height1'];
                        $slide1->a1_top = $input['a1top1'];
                        $slide1->a1_left = $input['a1left1'];

                        $slide1->t = $input['slide1t'];
                        $slide1->t_display = $input['tdisplay1'];
                        $slide1->t_link = $input['tlink1'];
                        $slide1->t_fontsize = $input['tfontsize1'];
                        $slide1->t_color = $input['tcolor1'];
                        $slide1->t_background = $input['tbackground1'];
                        $slide1->t_width = $input['twidth1'];
                        $slide1->t_height = $input['theight1'];
                        $slide1->t_top = $input['ttop1'];
                        $slide1->t_left = $input['tleft1'];

                        $slide1->d1 = $input['slide1d1'];
                        $slide1->d1_display = $input['d1display1'];
                        $slide1->d1_link = $input['d1link1'];
                        $slide1->d1_fontsize = $input['d1fontsize1'];
                        $slide1->d1_color = $input['d1color1'];
                        $slide1->d1_background = $input['d1background1'];
                        $slide1->d1_width = $input['d1width1'];
                        $slide1->d1_height = $input['d1height1'];
                        $slide1->d1_top = $input['d1top1'];
                        $slide1->d1_left = $input['d1left1'];

                        $slide1->d2 = $input['slide1d2'];
                        $slide1->d2_display = $input['d2display1'];
                        $slide1->d2_link = $input['d2link1'];
                        $slide1->d2_fontsize = $input['d2fontsize1'];
                        $slide1->d2_color = $input['d2color1'];
                        $slide1->d2_background = $input['d2background1'];
                        $slide1->d2_width = $input['d2width1'];
                        $slide1->d2_height = $input['d2height1'];
                        $slide1->d2_top = $input['d2top1'];
                        $slide1->d2_left = $input['d2left1'];

                        $slide1->d3 = $input['slide1d3'];
                        $slide1->d3_display = $input['d3display1'];
                        $slide1->d3_link = $input['d3link1'];
                        $slide1->d3_fontsize = $input['d3fontsize1'];
                        $slide1->d3_color = $input['d3color1'];
                        $slide1->d3_background = $input['d3background1'];
                        $slide1->d3_width = $input['d3width1'];
                        $slide1->d3_height = $input['d3height1'];
                        $slide1->d3_top = $input['d3top1'];
                        $slide1->d3_left = $input['d3left1'];

                        $slide1->d4 = $input['slide1d4'];
                        $slide1->d4_display = $input['d4display1'];
                        $slide1->d4_link = $input['d4link1'];
                        $slide1->d4_fontsize = $input['d4fontsize1'];
                        $slide1->d4_color = $input['d4color1'];
                        $slide1->d4_background = $input['d4background1'];
                        $slide1->d4_width = $input['d4width1'];
                        $slide1->d4_height = $input['d4height1'];
                        $slide1->d4_top = $input['d4top1'];
                        $slide1->d4_left = $input['d4left1'];

                        $slide1->d5 = $input['slide1d5'];
                        $slide1->d5_display = $input['d5display1'];
                        $slide1->d5_link = $input['d5link1'];
                        $slide1->d5_fontsize = $input['d5fontsize1'];
                        $slide1->d5_color = $input['d5color1'];
                        $slide1->d5_background = $input['d5background1'];
                        $slide1->d5_width = $input['d5width1'];
                        $slide1->d5_height = $input['d5height1'];;
                        $slide1->d5_top = $input['d5top1'];
                        $slide1->d5_left = $input['d5left1'];

                        $slide1->btn = $input['slide1btn'];
                        $slide1->btn_display = $input['btndisplay1'];
                        $slide1->btn_link = $input['btnlink1'];;
                        $slide1->btn_fontsize = $input['btnfontsize1'];
                        $slide1->btn_color = $input['btncolor1'];
                        $slide1->btn_background = $input['btnbackground1'];
                        $slide1->btn_width = $input['btnwidth1'];
                        $slide1->btn_height = $input['btnheight1'];
                        $slide1->btn_top = $input['btntop1'];
                        $slide1->btn_left = $input['btnleft1'];

                        $slide1->save();


                    if( $input['slidedisplay2']==1){
                        //validation
                    $this->validate(Request(), [
                    'slide2a1' => 'required|','a1display2' => 'required|','a1link2' => 'required|','a1fontsize2' => 'required|','a1color2' => 'required|','a1background2' => 'required|','a1width2' => 'required|','a1height2' => 'required|','a1top2' => 'required|','a1left2' => 'required|','slide2t' => 'required|','tdisplay2' => 'required|','tlink2' => 'required|','tfontsize2' => 'required|','tcolor2' => 'required|','tbackground1' => 'required|','twidth2' => 'required|','theight2' => 'required|','ttop2' => 'required|','tleft2' => 'required|','slide2d1' => 'required|','d1display2' => 'required|','d1link2' => 'required|','d1fontsize2' => 'required|','d1color2' => 'required|','d1background2' => 'required|','d1width2' => 'required|','d1height2' => 'required|','d1top2' => 'required|','d1left2' => 'required|','slide2d2' => 'required|','d2display2' => 'required|','d2link2' => 'required|','d2fontsize2' => 'required|','d2color2' => 'required|','d2background2' => 'required|','d2width2' => 'required|','d2height2' => 'required|','d2top2' => 'required|','d2left2' => 'required|','slide2d3' => 'required|','d3display2' => 'required|','d3link2' => 'required|','d3fontsize2' => 'required|','d3color2' => 'required|','d3background2' => 'required|','d3width2' => 'required|','d3height2' => 'required|','d3top2' => 'required|','d3left2' => 'required|','slide2d4' => 'required|','d4display2' => 'required|','d4link2' => 'required|','d4fontsize2' => 'required|','d4color2' => 'required|','d4background2' => 'required|','d4width2' => 'required|','d4height2' => 'required|','d4top2' => 'required|','d4left2' => 'required|','slide2d5' => 'required|','d5display2' => 'required|','d5link2' => 'required|','d5fontsize2' => 'required|','d5color2' => 'required|','d5background2' => 'required|','d5width2' => 'required|','d5height2' => 'required|','d5top2' => 'required|','d5left2' => 'required|','slide2btn' => 'required|','btndisplay2' => 'required|','btnlink2' => 'required|','btnfontsize2' => 'required|','btncolor2' => 'required|','btnbackground2' => 'required|','btnwidth2' => 'required|','btnheight2' => 'required|','btntop2' => 'required|','btnleft2' => 'required|',

                    ]);
                }


                        $slide2 = en_slideshow::where('slide',2)->get()->first();

                        $slide2->slide_display = $input['slidedisplay2'];


                        $slide2->a1 = $input['slide2a1'];
                        $slide2->a1_display = $input['a1display2'];
                        $slide2->a1_link = $input['a1link2'];
                        $slide2->a1_fontsize = $input['a1fontsize2'];
                        $slide2->a1_color = $input['a1color2'];
                        $slide2->a1_background = $input['a1background2'];
                        $slide2->a1_width = $input['a1width2'];
                        $slide2->a1_height = $input['a1height2'];
                        $slide2->a1_top = $input['a1top2'];
                        $slide2->a1_left = $input['a1left2'];

                        $slide2->t = $input['slide2t'];
                        $slide2->t_display = $input['tdisplay2'];
                        $slide2->t_link = $input['tlink2'];
                        $slide2->t_fontsize = $input['tfontsize2'];
                        $slide2->t_color = $input['tcolor2'];
                        $slide2->t_background = $input['tbackground2'];
                        $slide2->t_width = $input['twidth2'];
                        $slide2->t_height = $input['theight2'];
                        $slide2->t_top = $input['ttop2'];
                        $slide2->t_left = $input['tleft2'];

                        $slide2->d1 = $input['slide2d1'];
                        $slide2->d1_display = $input['d1display2'];
                        $slide2->d1_link = $input['d1link2'];
                        $slide2->d1_fontsize = $input['d1fontsize2'];
                        $slide2->d1_color = $input['d1color2'];
                        $slide2->d1_background = $input['d1background2'];
                        $slide2->d1_width = $input['d1width2'];
                        $slide2->d1_height = $input['d1height2'];
                        $slide2->d1_top = $input['d1top2'];
                        $slide2->d1_left = $input['d1left2'];

                        $slide2->d2 = $input['slide2d2'];
                        $slide2->d2_display = $input['d2display2'];
                        $slide2->d2_link = $input['d2link2'];
                        $slide2->d2_fontsize = $input['d2fontsize2'];
                        $slide2->d2_color = $input['d2color2'];
                        $slide2->d2_background = $input['d2background2'];
                        $slide2->d2_width = $input['d2width2'];
                        $slide2->d2_height = $input['d2height2'];
                        $slide2->d2_top = $input['d2top2'];
                        $slide2->d2_left = $input['d2left2'];

                        $slide2->d3 = $input['slide2d3'];
                        $slide2->d3_display = $input['d3display2'];
                        $slide2->d3_link = $input['d3link2'];
                        $slide2->d3_fontsize = $input['d3fontsize2'];
                        $slide2->d3_color = $input['d3color2'];
                        $slide2->d3_background = $input['d3background2'];
                        $slide2->d3_width = $input['d3width2'];
                        $slide2->d3_height = $input['d3height2'];
                        $slide2->d3_top = $input['d3top2'];
                        $slide2->d3_left = $input['d3left2'];

                        $slide2->d4 = $input['slide2d4'];
                        $slide2->d4_display = $input['d4display2'];
                        $slide2->d4_link = $input['d4link2'];
                        $slide2->d4_fontsize = $input['d4fontsize2'];
                        $slide2->d4_color = $input['d4color2'];
                        $slide2->d4_background = $input['d4background2'];
                        $slide2->d4_width = $input['d4width2'];
                        $slide2->d4_height = $input['d4height2'];
                        $slide2->d4_top = $input['d4top2'];
                        $slide2->d4_left = $input['d4left2'];

                        $slide2->d5 = $input['slide2d5'];
                        $slide2->d5_display = $input['d5display2'];
                        $slide2->d5_link = $input['d5link2'];
                        $slide2->d5_fontsize = $input['d5fontsize2'];
                        $slide2->d5_color = $input['d5color2'];
                        $slide2->d5_background = $input['d5background2'];
                        $slide2->d5_width = $input['d5width2'];
                        $slide2->d5_height = $input['d5height2'];
                        $slide2->d5_top = $input['d5top2'];
                        $slide2->d5_left = $input['d5left2'];

                        $slide2->btn = $input['slide2btn'];
                        $slide2->btn_display = $input['btndisplay2'];
                        $slide2->btn_link = $input['btnlink2'];
                        $slide2->btn_fontsize = $input['btnfontsize2'];
                        $slide2->btn_color = $input['btncolor2'];
                        $slide2->btn_background = $input['btnbackground2'];
                        $slide2->btn_width = $input['btnwidth2'];
                        $slide2->btn_height = $input['btnheight2'];
                        $slide2->btn_top = $input['btntop2'];
                        $slide2->btn_left = $input['btnleft2'];

                        $slide2->save();


                    if( $input['slidedisplay3']==111){
                        //validation
                    $this->validate(Request(), [
                    'slide3a1' => 'required|','a1display3' => 'required|','a1link3' => 'required|','a1fontsize3' => 'required|','a1color3' => 'required|','a1background3' => 'required|','a1width3' => 'required|','a1height3' => 'required|','a1top3' => 'required|','a1left3' => 'required|','slide3t' => 'required|','tdisplay3' => 'required|','tlink3' => 'required|','tfontsize3' => 'required|','tcolor3' => 'required|','tbackground3' => 'required|','twidth3' => 'required|','theight3' => 'required|','ttop3' => 'required|','tleft3' => 'required|','slide3d1' => 'required|','d1display3' => 'required|','d1link3' => 'required|','d1fontsize3' => 'required|','d1color3' => 'required|','d1background3' => 'required|','d1width3' => 'required|','d1height3' => 'required|','d1top3' => 'required|','d1left3' => 'required|','slide3d2' => 'required|','d2display3' => 'required|','d2link3' => 'required|','d2fontsize3' => 'required|','d2color3' => 'required|','d2background3' => 'required|','d2width3' => 'required|','d2height3' => 'required|','d2top3' => 'required|','d2left3' => 'required|','slide3d3' => 'required|','d3display3' => 'required|','d3link3' => 'required|','d3fontsize3' => 'required|','d3color3' => 'required|','d3background3' => 'required|','d3width3' => 'required|','d3height3' => 'required|','d3top3' => 'required|','d3left3' => 'required|','slide3d4' => 'required|','d4display3' => 'required|','d4link3' => 'required|','d4fontsize3' => 'required|','d4color3' => 'required|','d4background3' => 'required|','d4width3' => 'required|','d4height3' => 'required|','d4top3' => 'required|','d4left3' => 'required|','slide3d3' => 'required|','d5display3' => 'required|','d5link3' => 'required|','d5fontsize3' => 'required|','d5color3' => 'required|','d5background3' => 'required|','d5width3' => 'required|','d5height3' => 'required|','d5top3' => 'required|','d5left3' => 'required|','slide3btn' => 'required|','btndisplay3' => 'required|','btnlink3' => 'required|','btnfontsize3' => 'required|','btncolor3' => 'required|','btnbackground3' => 'required|','btnwidth3' => 'required|','btnheight3' => 'required|','btntop3' => 'required|','btnleft3' => 'required|',

                    ]);
                }


                        $slide3 = en_slideshow::where('slide',3)->get()->first();

                        $slide3->slide_display = $input['slidedisplay3'];



                        $slide3->a1 = $input['slide3a1'];
                        $slide3->a1_display = $input['a1display3'];
                        $slide3->a1_link = $input['a1link3'];
                        $slide3->a1_fontsize = $input['a1fontsize3'];
                        $slide3->a1_color = $input['a1color3'];
                        $slide3->a1_background = $input['a1background3'];
                        $slide3->a1_width = $input['a1width3'];
                        $slide3->a1_height = $input['a1height3'];
                        $slide3->a1_top = $input['a1top3'];
                        $slide3->a1_left = $input['a1left3'];

                        $slide3->t = $input['slide3t'];
                        $slide3->t_display = $input['tdisplay3'];
                        $slide3->t_link = $input['tlink3'];
                        $slide3->t_fontsize = $input['tfontsize3'];
                        $slide3->t_color = $input['tcolor3'];
                        $slide3->t_background = $input['tbackground3'];
                        $slide3->t_width = $input['twidth3'];
                        $slide3->t_height = $input['theight3'];
                        $slide3->t_top = $input['ttop3'];
                        $slide3->t_left = $input['tleft3'];

                        $slide3->d1 = $input['slide3d1'];
                        $slide3->d1_display = $input['d1display3'];
                        $slide3->d1_link = $input['d1link3'];
                        $slide3->d1_fontsize = $input['d1fontsize3'];
                        $slide3->d1_color = $input['d1color3'];
                        $slide3->d1_background = $input['d1background3'];
                        $slide3->d1_width = $input['d1width3'];
                        $slide3->d1_height = $input['d1height3'];
                        $slide3->d1_top = $input['d1top3'];
                        $slide3->d1_left = $input['d1left3'];

                        $slide3->d2 = $input['slide3d2'];
                        $slide3->d2_display = $input['d2display3'];
                        $slide3->d2_link = $input['d2link3'];
                        $slide3->d2_fontsize = $input['d2fontsize3'];
                        $slide3->d2_color = $input['d2color3'];
                        $slide3->d2_background = $input['d2background3'];
                        $slide3->d2_width = $input['d2width3'];
                        $slide3->d2_height = $input['d2height3'];
                        $slide3->d2_top = $input['d2top3'];
                        $slide3->d2_left = $input['d2left3'];

                        $slide3->d3 = $input['slide3d3'];
                        $slide3->d3_display = $input['d3display3'];
                        $slide3->d3_link = $input['d3link3'];
                        $slide3->d3_fontsize = $input['d3fontsize3'];
                        $slide3->d3_color = $input['d3color3'];
                        $slide3->d3_background = $input['d3background3'];
                        $slide3->d3_width = $input['d3width3'];
                        $slide3->d3_height = $input['d3height3'];
                        $slide3->d3_top = $input['d3top3'];
                        $slide3->d3_left = $input['d3left3'];

                        $slide3->d4 = $input['slide3d4'];
                        $slide3->d4_display = $input['d4display3'];
                        $slide3->d4_link = $input['d4link3'];
                        $slide3->d4_fontsize = $input['d4fontsize3'];
                        $slide3->d4_color = $input['d4color3'];
                        $slide3->d4_background = $input['d4background3'];
                        $slide3->d4_width = $input['d4width3'];
                        $slide3->d4_height = $input['d4height3'];
                        $slide3->d4_top = $input['d4top3'];
                        $slide3->d4_left = $input['d4left3'];

                        $slide3->d5 = $input['slide3d5'];
                        $slide3->d5_display = $input['d5display3'];
                        $slide3->d5_link = $input['d5link3'];
                        $slide3->d5_fontsize = $input['d5fontsize3'];
                        $slide3->d5_color = $input['d5color3'];
                        $slide3->d5_background = $input['d5background3'];
                        $slide3->d5_width = $input['d5width3'];
                        $slide3->d5_height = $input['d5height3'];
                        $slide3->d5_top = $input['d5top3'];
                        $slide3->d5_left = $input['d5left3'];

                        $slide3->btn = $input['slide3btn'];
                        $slide3->btn_display = $input['btndisplay3'];
                        $slide3->btn_link = $input['btnlink3'];
                        $slide3->btn_fontsize = $input['btnfontsize3'];
                        $slide3->btn_color = $input['btncolor3'];
                        $slide3->btn_background = $input['btnbackground3'];
                        $slide3->btn_width = $input['btnwidth3'];
                        $slide3->btn_height = $input['btnheight3'];
                        $slide3->btn_top = $input['btntop3'];
                        $slide3->btn_left = $input['btnleft3'];

                        $slide3->save();


                    if( $input['slidedisplay4']==1111){
                        //validation
                    $this->validate(Request(), [
                    'slide4a1' => 'required|','a1display4' => 'required|','a1link4' => 'required|','a1fontsize4' => 'required|','a1color4' => 'required|','a1background4' => 'required|','a1width4' => 'required|','a1height4' => 'required|','a1top4' => 'required|','a1left4' => 'required|','slide4t' => 'required|','tdisplay4' => 'required|','tlink4' => 'required|','tfontsize4' => 'required|','tcolor4' => 'required|','tbackground4' => 'required|','twidth4' => 'required|','theight4' => 'required|','ttop4' => 'required|','tleft4' => 'required|','slide4d1' => 'required|','d1display4' => 'required|','d1link4' => 'required|','d1fontsize4' => 'required|','d1color4' => 'required|','d1background4' => 'required|','d1width4' => 'required|','d1height4' => 'required|','d1top4' => 'required|','d1left4' => 'required|','slide4d2' => 'required|','d2display4' => 'required|','d2link4' => 'required|','d2fontsize4' => 'required|','d2color4' => 'required|','d2background4' => 'required|','d2width4' => 'required|','d2height4' => 'required|','d2top4' => 'required|','d2left4' => 'required|','slide4d3' => 'required|','d3display4' => 'required|','d3link4' => 'required|','d3fontsize4' => 'required|','d3color4' => 'required|','d3background4' => 'required|','d3width4' => 'required|','d3height4' => 'required|','d3top4' => 'required|','d3left4' => 'required|','slide4d4' => 'required|','d4display4' => 'required|','d4link4' => 'required|','d4fontsize4' => 'required|','d4color4' => 'required|','d4background4' => 'required|','d4width4' => 'required|','d4height4' => 'required|','d4top4' => 'required|','d4left4' => 'required|','slide4d5' => 'required|','d5display4' => 'required|','d5link4' => 'required|','d5fontsize4' => 'required|','d5color4' => 'required|','d5background4' => 'required|','d5width4' => 'required|','d5height4' => 'required|','d5top4' => 'required|','d5left4' => 'required|','slide4btn' => 'required|','btndisplay4' => 'required|','btnlink4' => 'required|','btnfontsize4' => 'required|','btncolor4' => 'required|','btnbackground4' => 'required|','btnwidth4' => 'required|','btnheight4' => 'required|','btntop4' => 'required|','btnleft4' => 'required|',

                    ]);

                }


                        $slide4 = en_slideshow::where('slide',4)->get()->first();

                        $slide4->slide_display = $input['slidedisplay4'];



                        $slide4->a1 = $input['slide4a1'];
                        $slide4->a1_display = $input['a1display4'];
                        $slide4->a1_link = $input['a1link4'];
                        $slide4->a1_fontsize = $input['a1fontsize4'];
                        $slide4->a1_color = $input['a1color4'];
                        $slide4->a1_background = $input['a1background4'];
                        $slide4->a1_width = $input['a1width4'];
                        $slide4->a1_height = $input['a1height4'];
                        $slide4->a1_top = $input['a1top4'];
                        $slide4->a1_left = $input['a1left4'];

                        $slide4->t = $input['slide4t'];
                        $slide4->t_display = $input['tdisplay4'];
                        $slide4->t_link = $input['tlink4'];
                        $slide4->t_fontsize = $input['tfontsize4'];
                        $slide4->t_color = $input['tcolor4'];
                        $slide4->t_background = $input['tbackground4'];
                        $slide4->t_width = $input['twidth4'];
                        $slide4->t_height = $input['theight4'];
                        $slide4->t_top = $input['ttop4'];
                        $slide4->t_left = $input['tleft4'];

                        $slide4->d1 = $input['slide4d1'];
                        $slide4->d1_display = $input['d1display4'];
                        $slide4->d1_link = $input['d1link4'];
                        $slide4->d1_fontsize = $input['d1fontsize4'];
                        $slide4->d1_color = $input['d1color4'];
                        $slide4->d1_background = $input['d1background4'];
                        $slide4->d1_width = $input['d1width4'];
                        $slide4->d1_height = $input['d1height4'];
                        $slide4->d1_top = $input['d1top4'];
                        $slide4->d1_left = $input['d1left4'];

                        $slide4->d2 = $input['slide4d2'];
                        $slide4->d2_display = $input['d2display4'];
                        $slide4->d2_link = $input['d2link4'];
                        $slide4->d2_fontsize = $input['d2fontsize4'];
                        $slide4->d2_color = $input['d2color4'];
                        $slide4->d2_background = $input['d2background4'];
                        $slide4->d2_width = $input['d2width4'];
                        $slide4->d2_height = $input['d2height4'];
                        $slide4->d2_top = $input['d2top4'];
                        $slide4->d2_left = $input['d2left4'];

                        $slide4->d3 = $input['slide4d3'];
                        $slide4->d3_display = $input['d3display4'];
                        $slide4->d3_link = $input['d3link4'];
                        $slide4->d3_fontsize = $input['d3fontsize4'];
                        $slide4->d3_color = $input['d3color4'];
                        $slide4->d3_background = $input['d3background4'];
                        $slide4->d3_width = $input['d3width4'];
                        $slide4->d3_height = $input['d3height4'];
                        $slide4->d3_top = $input['d3top4'];
                        $slide4->d3_left = $input['d3left4'];

                        $slide4->d4 = $input['slide4d4'];
                        $slide4->d4_display = $input['d4display4'];
                        $slide4->d4_link = $input['d4link4'];
                        $slide4->d4_fontsize = $input['d4fontsize4'];
                        $slide4->d4_color = $input['d4color4'];
                        $slide4->d4_background = $input['d4background4'];
                        $slide4->d4_width = $input['d4width4'];
                        $slide4->d4_height = $input['d4height4'];
                        $slide4->d4_top = $input['d4top4'];
                        $slide4->d4_left = $input['d4left4'];

                        $slide4->d5 = $input['slide4d5'];
                        $slide4->d5_display = $input['d5display4'];
                        $slide4->d5_link = $input['d5link4'];
                        $slide4->d5_fontsize = $input['d5fontsize4'];
                        $slide4->d5_color = $input['d5color4'];
                        $slide4->d5_background = $input['d5background4'];
                        $slide4->d5_width = $input['d5width4'];
                        $slide4->d5_height = $input['d5height4'];
                        $slide4->d5_top = $input['d5top4'];
                        $slide4->d5_left = $input['d5left4'];

                        $slide4->btn = $input['slide4btn'];
                        $slide4->btn_display = $input['btndisplay4'];
                        $slide4->btn_link = $input['btnlink4'];
                        $slide4->btn_fontsize = $input['btnfontsize4'];
                        $slide4->btn_color = $input['btncolor4'];
                        $slide4->btn_background = $input['btnbackground4'];
                        $slide4->btn_width = $input['btnwidth4'];
                        $slide4->btn_height = $input['btnheight4'];
                        $slide4->btn_top = $input['btntop4'];
                        $slide4->btn_left = $input['btnleft4'];

                        $slide4->save();

                    if($input['slidedisplay5']==2111){
                        //validation
                    $this->validate(Request(), [
                    'slide5a1' => 'required|','a1display5' => 'required|','a1link5' => 'required|','a1fontsize5' => 'required|','a1color5' => 'required|','a1background5' => 'required|','a1width5' => 'required|','a1height5' => 'required|','a1top5' => 'required|','a1left5' => 'required|','slide5t' => 'required|','tdisplay5' => 'required|','tlink5' => 'required|','tfontsize5' => 'required|','tcolor5' => 'required|','tbackground5' => 'required|','twidth5' => 'required|','theight5' => 'required|','ttop5' => 'required|','tleft5' => 'required|','slide5d1' => 'required|','d1display5' => 'required|','d1link5' => 'required|','d1fontsize5' => 'required|','d1color5' => 'required|','d1background5' => 'required|','d1width5' => 'required|','d1height5' => 'required|','d1top5' => 'required|','d1left5' => 'required|','slide5d2' => 'required|','d2display5' => 'required|','d2link5' => 'required|','d2fontsize5' => 'required|','d2color5' => 'required|','d2background5' => 'required|','d2width5' => 'required|','d2height5' => 'required|','d2top5' => 'required|','d2left5' => 'required|','slide5d3' => 'required|','d3display5' => 'required|','d3link5' => 'required|','d3fontsize5' => 'required|','d3color5' => 'required|','d3background5' => 'required|','d3width5' => 'required|','d3height5' => 'required|','d3top5' => 'required|','d3left5' => 'required|','slide5d4' => 'required|','d4display5' => 'required|','d4link5' => 'required|','d4fontsize5' => 'required|','d4color5' => 'required|','d4background5' => 'required|','d4width5' => 'required|','d4height5' => 'required|','d4top5' => 'required|','d4left5' => 'required|','slide5d5' => 'required|','d5display5' => 'required|','d5link5' => 'required|','d5fontsize5' => 'required|','d5color5' => 'required|','d5background5' => 'required|','d5width5' => 'required|','d5height5' => 'required|','d5top5' => 'required|','d5left5' => 'required|','slide5btn' => 'required|','btndisplay5' => 'required|','btnlink5' => 'required|','btnfontsize5' => 'required|','btncolor5' => 'required|','btnbackground5' => 'required|','btnwidth5' => 'required|','btnheight5' => 'required|','btntop5' => 'required|','btnleft5' => 'required|',

                    ]);

                    }

                        $slide5 = en_slideshow::where('slide',5)->get()->first();

                        $slide5->slide_display = $input['slidedisplay5'];

                        $slide5->a1 = $input['slide5a1'];
                        $slide5->a1_display = $input['a1display5'];
                        $slide5->a1_link = $input['a1link5'];
                        $slide5->a1_fontsize = $input['a1fontsize5'];
                        $slide5->a1_color = $input['a1color5'];
                        $slide5->a1_background = $input['a1background5'];
                        $slide5->a1_width = $input['a1width5'];
                        $slide5->a1_height = $input['a1height5'];
                        $slide5->a1_top = $input['a1top5'];
                        $slide5->a1_left = $input['a1left5'];

                        $slide5->t = $input['slide5t'];
                        $slide5->t_display = $input['tdisplay5'];
                        $slide5->t_link = $input['tlink5'];
                        $slide5->t_fontsize = $input['tfontsize5'];
                        $slide5->t_color = $input['tcolor5'];
                        $slide5->t_background = $input['tbackground5'];
                        $slide5->t_width = $input['twidth5'];
                        $slide5->t_height = $input['theight5'];
                        $slide5->t_top = $input['ttop5'];
                        $slide5->t_left = $input['tleft5'];

                        $slide5->d1 = $input['slide5d1'];
                        $slide5->d1_display = $input['d1display5'];
                        $slide5->d1_link = $input['d1link5'];
                        $slide5->d1_fontsize = $input['d1fontsize5'];
                        $slide5->d1_color = $input['d1color5'];
                        $slide5->d1_background = $input['d1background5'];
                        $slide5->d1_width = $input['d1width5'];
                        $slide5->d1_height = $input['d1height5'];
                        $slide5->d1_top = $input['d1top5'];
                        $slide5->d1_left = $input['d1left5'];

                        $slide5->d2 = $input['slide5d2'];
                        $slide5->d2_display = $input['d2display5'];
                        $slide5->d2_link = $input['d2link5'];
                        $slide5->d2_fontsize = $input['d2fontsize5'];
                        $slide5->d2_color = $input['d2color5'];
                        $slide5->d2_background = $input['d2background5'];
                        $slide5->d2_width = $input['d2width5'];
                        $slide5->d2_height = $input['d2height5'];
                        $slide5->d2_top = $input['d2top5'];
                        $slide5->d2_left = $input['d2left5'];

                        $slide5->d3 = $input['slide5d3'];
                        $slide5->d3_display = $input['d3display5'];
                        $slide5->d3_link = $input['d3link5'];
                        $slide5->d3_fontsize = $input['d3fontsize5'];
                        $slide5->d3_color = $input['d3color5'];
                        $slide5->d3_background = $input['d3background5'];
                        $slide5->d3_width = $input['d3width5'];
                        $slide5->d3_height = $input['d3height5'];
                        $slide5->d3_top = $input['d3top5'];
                        $slide5->d3_left = $input['d3left5'];

                        $slide5->d4 = $input['slide5d4'];
                        $slide5->d4_display = $input['d4display5'];
                        $slide5->d4_link = $input['d4link5'];
                        $slide5->d4_fontsize = $input['d4fontsize5'];
                        $slide5->d4_color = $input['d4color5'];
                        $slide5->d4_background = $input['d4background5'];
                        $slide5->d4_width = $input['d4width5'];
                        $slide5->d4_height = $input['d4height5'];
                        $slide5->d4_top = $input['d4top5'];
                        $slide5->d4_left = $input['d4left5'];

                        $slide5->d5 = $input['slide5d5'];
                        $slide5->d5_display = $input['d5display5'];
                        $slide5->d5_link = $input['d5link5'];
                        $slide5->d5_fontsize = $input['d5fontsize5'];
                        $slide5->d5_color = $input['d5color5'];
                        $slide5->d5_background = $input['d5background5'];
                        $slide5->d5_width = $input['d5width5'];
                        $slide5->d5_height = $input['d5height5'];
                        $slide5->d5_top = $input['d5top5'];
                        $slide5->d5_left = $input['d5left5'];

                        $slide5->btn = $input['slide5btn'];
                        $slide5->btn_display = $input['btndisplay5'];
                        $slide5->btn_link = $input['btnlink5'];
                        $slide5->btn_fontsize = $input['btnfontsize5'];
                        $slide5->btn_color = $input['btncolor5'];
                        $slide5->btn_background = $input['btnbackground5'];
                        $slide5->btn_width = $input['btnwidth5'];
                        $slide5->btn_height = $input['btnheight5'];
                        $slide5->btn_top = $input['btntop5'];
                        $slide5->btn_left = $input['btnleft5'];

                        $slide5->save();

                        $slide11 = en_slideshow::where('slide',1)->get()->first();
                        $slide11->slide_display = $input['slidedisplay1'];


                    if (Request()->hasFile('slideimg1')) {

                    $destinationPath1=public_path().'/assets/Files/';
                    $filename1 = rand(1,1000000).time().'.'.$input['slideimg1']->getClientOriginalExtension();;
                    $slide11->img=URL::to('/assets/Files/').'/'.$filename1;
                    $input['slideimg1']->move($destinationPath1, $filename1);

                    }
                    $slide11->save();

                        $slide2 = en_slideshow::where('slide',2)->get()->first();
                        $slide2->slide_display = $input['slidedisplay2'];


                    if (Request()->hasFile('slideimg2')) {

                    $destinationPath2=public_path().'/assets/Files/';
                    $filename2 = rand(1,1000000).time().'.'.$input['slideimg2']->getClientOriginalExtension();;
                    $slide2->img=URL::to('/assets/Files/').'/'.$filename2;
                    $input['slideimg2']->move($destinationPath2, $filename2);

                    }

                        $slide2->save();


                        $slide3 = en_slideshow::where('slide',3)->get()->first();
                        $slide3->slide_display = $input['slidedisplay3'];


                    if (Request()->hasFile('slideimg3')) {

                    $destinationPath3=public_path().'/assets/Files/';
                    $filename3 = rand(1,1000000).time().'.'.$input['slideimg3']->getClientOriginalExtension();;
                    $slide3->img=URL::to('/assets/Files/').'/'.$filename3;
                    $input['slideimg3']->move($destinationPath3, $filename3);

                    }

                    $slide3->save();


                        $slide4 = en_slideshow::where('slide',4)->get()->first();
                        $slide4->slide_display = $input['slidedisplay4'];


                    if (Request()->hasFile('slideimg4')) {

                    $destinationPath4=public_path().'/assets/Files/';
                    $filename4 = rand(1,1000000).time().'.'.$input['slideimg4']->getClientOriginalExtension();;
                    $slide4->img=URL::to('/assets/Files/').'/'.$filename4;
                    $input['slideimg4']->move($destinationPath4, $filename4);

                    }

                    $slide4->save();



                        $slide5 = en_slideshow::where('slide',5)->get()->first();
                        $slide5->slide_display = $input['slidedisplay5'];


                    if (Request()->hasFile('slideimg5')) {

                    $destinationPath5=public_path().'/assets/Files/';
                    $filename5 = rand(1,1000000).time().'.'.$input['slideimg5']->getClientOriginalExtension();;
                    $slide5->img=URL::to('/assets/Files/').'/'.$filename5;
                    $input['slideimg5']->move($destinationPath5, $filename5);

                    }
                        $slide5->save();



                return Redirect::to('/en/epanel/en-slideshow')->with('status-success','SlideShow Has Been Updated');




            }








            public function ru_slideshow(Request $request)
            {


                Session::flash('pageType', 'slideshow');
                Session::flash('currentPage', 'ru-slideshow');
                $session_user= Session::get('editor');
                $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
                $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
                $user=website_admins::where('email',$session_user)->get()->first();
                    $slide1 = ru_slideshow::where('slide',1)->get()->first();
                    $slide2 = ru_slideshow::where('slide',2)->get()->first();
                    $slide3 = ru_slideshow::where('slide',3)->get()->first();
                    $slide4 = ru_slideshow::where('slide',4)->get()->first();
                    $slide5 = ru_slideshow::where('slide',5)->get()->first();
                    if( Request::segment(1) =='ar'){
                        $title = "لوحة التحكم | أرسال الأيميلات ";
                        return view('ar.epanel.ru-slideshow',compact('title','user','notifications_all','notifications_unseen','slide1','slide2','slide3','slide4','slide5'));
                    }else{
                        $title = "epanel | EN SlideShow";
                        return view('epanel.ru-slideshow',compact('title','user','notifications_all','notifications_unseen','slide1','slide2','slide3','slide4','slide5'));
                    }


            }

            public function post_ru_slideshow(Request $request)
            {

                $input=Request::all();


                    if( $input['slidedisplay1']==1){
                        //validation
                    $this->validate(Request(), [
                    'slide1a1' => 'required|','a1display1' => 'required|','a1link1' => 'required|','a1fontsize1' => 'required|','a1color1' => 'required|','a1background1' => 'required|','a1width1' => 'required|','a1height1' => 'required|','a1top1' => 'required|','a1left1' => 'required|','slide1t' => 'required|','tdisplay1' => 'required|','tlink1' => 'required|','tfontsize1' => 'required|','tcolor1' => 'required|','tbackground1' => 'required|','twidth1' => 'required|','theight1' => 'required|','ttop1' => 'required|','tleft1' => 'required|','slide1d1' => 'required|','d1display1' => 'required|','d1link1' => 'required|','d1fontsize1' => 'required|','d1color1' => 'required|','d1background1' => 'required|','d1width1' => 'required|','d1height1' => 'required|','d1top1' => 'required|','d1left1' => 'required|','slide1d2' => 'required|','d2display1' => 'required|','d2link1' => 'required|','d2fontsize1' => 'required|','d2color1' => 'required|','d2background1' => 'required|','d2width1' => 'required|','d2height1' => 'required|','d2top1' => 'required|','d2left1' => 'required|','slide1d3' => 'required|','d3display1' => 'required|','d3link1' => 'required|','d3fontsize1' => 'required|','d3color1' => 'required|','d3background1' => 'required|','d3width1' => 'required|','d3height1' => 'required|','d3top1' => 'required|','d3left1' => 'required|','slide1d4' => 'required|','d4display1' => 'required|','d4link1' => 'required|','d4fontsize1' => 'required|','d4color1' => 'required|','d4background1' => 'required|','d4width1' => 'required|','d4height1' => 'required|','d4top1' => 'required|','d4left1' => 'required|','slide1d5' => 'required|','d5display1' => 'required|','d5link1' => 'required|','d5fontsize1' => 'required|','d5color1' => 'required|','d5background1' => 'required|','d5width1' => 'required|','d5height1' => 'required|','d5top1' => 'required|','d5left1' => 'required|','slide1btn' => 'required|','btndisplay1' => 'required|','btnlink1' => 'required|','btnfontsize1' => 'required|','btncolor1' => 'required|','btnbackground1' => 'required|','btnwidth1' => 'required|','btnheight1' => 'required|','btntop1' => 'required|','btnleft1' => 'required|',

                    ]);
                }


                        $slide1 = ru_slideshow::where('slide',1)->get()->first();

                        $slide1->slide_display = $input['slidedisplay1'];

                        $slide1->a1 = $input['slide1a1'];
                        $slide1->a1_display = $input['a1display1'];
                        $slide1->a1_link = $input['a1link1'];
                        $slide1->a1_fontsize = $input['a1fontsize1'];
                        $slide1->a1_color = $input['a1color1'];
                        $slide1->a1_background = $input['a1background1'];
                        $slide1->a1_width = $input['a1width1'];
                        $slide1->a1_height = $input['a1height1'];
                        $slide1->a1_top = $input['a1top1'];
                        $slide1->a1_left = $input['a1left1'];

                        $slide1->t = $input['slide1t'];
                        $slide1->t_display = $input['tdisplay1'];
                        $slide1->t_link = $input['tlink1'];
                        $slide1->t_fontsize = $input['tfontsize1'];
                        $slide1->t_color = $input['tcolor1'];
                        $slide1->t_background = $input['tbackground1'];
                        $slide1->t_width = $input['twidth1'];
                        $slide1->t_height = $input['theight1'];
                        $slide1->t_top = $input['ttop1'];
                        $slide1->t_left = $input['tleft1'];

                        $slide1->d1 = $input['slide1d1'];
                        $slide1->d1_display = $input['d1display1'];
                        $slide1->d1_link = $input['d1link1'];
                        $slide1->d1_fontsize = $input['d1fontsize1'];
                        $slide1->d1_color = $input['d1color1'];
                        $slide1->d1_background = $input['d1background1'];
                        $slide1->d1_width = $input['d1width1'];
                        $slide1->d1_height = $input['d1height1'];
                        $slide1->d1_top = $input['d1top1'];
                        $slide1->d1_left = $input['d1left1'];

                        $slide1->d2 = $input['slide1d2'];
                        $slide1->d2_display = $input['d2display1'];
                        $slide1->d2_link = $input['d2link1'];
                        $slide1->d2_fontsize = $input['d2fontsize1'];
                        $slide1->d2_color = $input['d2color1'];
                        $slide1->d2_background = $input['d2background1'];
                        $slide1->d2_width = $input['d2width1'];
                        $slide1->d2_height = $input['d2height1'];
                        $slide1->d2_top = $input['d2top1'];
                        $slide1->d2_left = $input['d2left1'];

                        $slide1->d3 = $input['slide1d3'];
                        $slide1->d3_display = $input['d3display1'];
                        $slide1->d3_link = $input['d3link1'];
                        $slide1->d3_fontsize = $input['d3fontsize1'];
                        $slide1->d3_color = $input['d3color1'];
                        $slide1->d3_background = $input['d3background1'];
                        $slide1->d3_width = $input['d3width1'];
                        $slide1->d3_height = $input['d3height1'];
                        $slide1->d3_top = $input['d3top1'];
                        $slide1->d3_left = $input['d3left1'];

                        $slide1->d4 = $input['slide1d4'];
                        $slide1->d4_display = $input['d4display1'];
                        $slide1->d4_link = $input['d4link1'];
                        $slide1->d4_fontsize = $input['d4fontsize1'];
                        $slide1->d4_color = $input['d4color1'];
                        $slide1->d4_background = $input['d4background1'];
                        $slide1->d4_width = $input['d4width1'];
                        $slide1->d4_height = $input['d4height1'];
                        $slide1->d4_top = $input['d4top1'];
                        $slide1->d4_left = $input['d4left1'];

                        $slide1->d5 = $input['slide1d5'];
                        $slide1->d5_display = $input['d5display1'];
                        $slide1->d5_link = $input['d5link1'];
                        $slide1->d5_fontsize = $input['d5fontsize1'];
                        $slide1->d5_color = $input['d5color1'];
                        $slide1->d5_background = $input['d5background1'];
                        $slide1->d5_width = $input['d5width1'];
                        $slide1->d5_height = $input['d5height1'];;
                        $slide1->d5_top = $input['d5top1'];
                        $slide1->d5_left = $input['d5left1'];

                        $slide1->btn = $input['slide1btn'];
                        $slide1->btn_display = $input['btndisplay1'];
                        $slide1->btn_link = $input['btnlink1'];;
                        $slide1->btn_fontsize = $input['btnfontsize1'];
                        $slide1->btn_color = $input['btncolor1'];
                        $slide1->btn_background = $input['btnbackground1'];
                        $slide1->btn_width = $input['btnwidth1'];
                        $slide1->btn_height = $input['btnheight1'];
                        $slide1->btn_top = $input['btntop1'];
                        $slide1->btn_left = $input['btnleft1'];

                        $slide1->save();


                    if( $input['slidedisplay2']==1){
                        //validation
                    $this->validate(Request(), [
                    'slide2a1' => 'required|','a1display2' => 'required|','a1link2' => 'required|','a1fontsize2' => 'required|','a1color2' => 'required|','a1background2' => 'required|','a1width2' => 'required|','a1height2' => 'required|','a1top2' => 'required|','a1left2' => 'required|','slide2t' => 'required|','tdisplay2' => 'required|','tlink2' => 'required|','tfontsize2' => 'required|','tcolor2' => 'required|','tbackground1' => 'required|','twidth2' => 'required|','theight2' => 'required|','ttop2' => 'required|','tleft2' => 'required|','slide2d1' => 'required|','d1display2' => 'required|','d1link2' => 'required|','d1fontsize2' => 'required|','d1color2' => 'required|','d1background2' => 'required|','d1width2' => 'required|','d1height2' => 'required|','d1top2' => 'required|','d1left2' => 'required|','slide2d2' => 'required|','d2display2' => 'required|','d2link2' => 'required|','d2fontsize2' => 'required|','d2color2' => 'required|','d2background2' => 'required|','d2width2' => 'required|','d2height2' => 'required|','d2top2' => 'required|','d2left2' => 'required|','slide2d3' => 'required|','d3display2' => 'required|','d3link2' => 'required|','d3fontsize2' => 'required|','d3color2' => 'required|','d3background2' => 'required|','d3width2' => 'required|','d3height2' => 'required|','d3top2' => 'required|','d3left2' => 'required|','slide2d4' => 'required|','d4display2' => 'required|','d4link2' => 'required|','d4fontsize2' => 'required|','d4color2' => 'required|','d4background2' => 'required|','d4width2' => 'required|','d4height2' => 'required|','d4top2' => 'required|','d4left2' => 'required|','slide2d5' => 'required|','d5display2' => 'required|','d5link2' => 'required|','d5fontsize2' => 'required|','d5color2' => 'required|','d5background2' => 'required|','d5width2' => 'required|','d5height2' => 'required|','d5top2' => 'required|','d5left2' => 'required|','slide2btn' => 'required|','btndisplay2' => 'required|','btnlink2' => 'required|','btnfontsize2' => 'required|','btncolor2' => 'required|','btnbackground2' => 'required|','btnwidth2' => 'required|','btnheight2' => 'required|','btntop2' => 'required|','btnleft2' => 'required|',

                    ]);
                }


                        $slide2 = ru_slideshow::where('slide',2)->get()->first();

                        $slide2->slide_display = $input['slidedisplay2'];


                        $slide2->a1 = $input['slide2a1'];
                        $slide2->a1_display = $input['a1display2'];
                        $slide2->a1_link = $input['a1link2'];
                        $slide2->a1_fontsize = $input['a1fontsize2'];
                        $slide2->a1_color = $input['a1color2'];
                        $slide2->a1_background = $input['a1background2'];
                        $slide2->a1_width = $input['a1width2'];
                        $slide2->a1_height = $input['a1height2'];
                        $slide2->a1_top = $input['a1top2'];
                        $slide2->a1_left = $input['a1left2'];

                        $slide2->t = $input['slide2t'];
                        $slide2->t_display = $input['tdisplay2'];
                        $slide2->t_link = $input['tlink2'];
                        $slide2->t_fontsize = $input['tfontsize2'];
                        $slide2->t_color = $input['tcolor2'];
                        $slide2->t_background = $input['tbackground2'];
                        $slide2->t_width = $input['twidth2'];
                        $slide2->t_height = $input['theight2'];
                        $slide2->t_top = $input['ttop2'];
                        $slide2->t_left = $input['tleft2'];

                        $slide2->d1 = $input['slide2d1'];
                        $slide2->d1_display = $input['d1display2'];
                        $slide2->d1_link = $input['d1link2'];
                        $slide2->d1_fontsize = $input['d1fontsize2'];
                        $slide2->d1_color = $input['d1color2'];
                        $slide2->d1_background = $input['d1background2'];
                        $slide2->d1_width = $input['d1width2'];
                        $slide2->d1_height = $input['d1height2'];
                        $slide2->d1_top = $input['d1top2'];
                        $slide2->d1_left = $input['d1left2'];

                        $slide2->d2 = $input['slide2d2'];
                        $slide2->d2_display = $input['d2display2'];
                        $slide2->d2_link = $input['d2link2'];
                        $slide2->d2_fontsize = $input['d2fontsize2'];
                        $slide2->d2_color = $input['d2color2'];
                        $slide2->d2_background = $input['d2background2'];
                        $slide2->d2_width = $input['d2width2'];
                        $slide2->d2_height = $input['d2height2'];
                        $slide2->d2_top = $input['d2top2'];
                        $slide2->d2_left = $input['d2left2'];

                        $slide2->d3 = $input['slide2d3'];
                        $slide2->d3_display = $input['d3display2'];
                        $slide2->d3_link = $input['d3link2'];
                        $slide2->d3_fontsize = $input['d3fontsize2'];
                        $slide2->d3_color = $input['d3color2'];
                        $slide2->d3_background = $input['d3background2'];
                        $slide2->d3_width = $input['d3width2'];
                        $slide2->d3_height = $input['d3height2'];
                        $slide2->d3_top = $input['d3top2'];
                        $slide2->d3_left = $input['d3left2'];

                        $slide2->d4 = $input['slide2d4'];
                        $slide2->d4_display = $input['d4display2'];
                        $slide2->d4_link = $input['d4link2'];
                        $slide2->d4_fontsize = $input['d4fontsize2'];
                        $slide2->d4_color = $input['d4color2'];
                        $slide2->d4_background = $input['d4background2'];
                        $slide2->d4_width = $input['d4width2'];
                        $slide2->d4_height = $input['d4height2'];
                        $slide2->d4_top = $input['d4top2'];
                        $slide2->d4_left = $input['d4left2'];

                        $slide2->d5 = $input['slide2d5'];
                        $slide2->d5_display = $input['d5display2'];
                        $slide2->d5_link = $input['d5link2'];
                        $slide2->d5_fontsize = $input['d5fontsize2'];
                        $slide2->d5_color = $input['d5color2'];
                        $slide2->d5_background = $input['d5background2'];
                        $slide2->d5_width = $input['d5width2'];
                        $slide2->d5_height = $input['d5height2'];
                        $slide2->d5_top = $input['d5top2'];
                        $slide2->d5_left = $input['d5left2'];

                        $slide2->btn = $input['slide2btn'];
                        $slide2->btn_display = $input['btndisplay2'];
                        $slide2->btn_link = $input['btnlink2'];
                        $slide2->btn_fontsize = $input['btnfontsize2'];
                        $slide2->btn_color = $input['btncolor2'];
                        $slide2->btn_background = $input['btnbackground2'];
                        $slide2->btn_width = $input['btnwidth2'];
                        $slide2->btn_height = $input['btnheight2'];
                        $slide2->btn_top = $input['btntop2'];
                        $slide2->btn_left = $input['btnleft2'];

                        $slide2->save();


                    if( $input['slidedisplay3']==111){
                        //validation
                    $this->validate(Request(), [
                    'slide3a1' => 'required|','a1display3' => 'required|','a1link3' => 'required|','a1fontsize3' => 'required|','a1color3' => 'required|','a1background3' => 'required|','a1width3' => 'required|','a1height3' => 'required|','a1top3' => 'required|','a1left3' => 'required|','slide3t' => 'required|','tdisplay3' => 'required|','tlink3' => 'required|','tfontsize3' => 'required|','tcolor3' => 'required|','tbackground3' => 'required|','twidth3' => 'required|','theight3' => 'required|','ttop3' => 'required|','tleft3' => 'required|','slide3d1' => 'required|','d1display3' => 'required|','d1link3' => 'required|','d1fontsize3' => 'required|','d1color3' => 'required|','d1background3' => 'required|','d1width3' => 'required|','d1height3' => 'required|','d1top3' => 'required|','d1left3' => 'required|','slide3d2' => 'required|','d2display3' => 'required|','d2link3' => 'required|','d2fontsize3' => 'required|','d2color3' => 'required|','d2background3' => 'required|','d2width3' => 'required|','d2height3' => 'required|','d2top3' => 'required|','d2left3' => 'required|','slide3d3' => 'required|','d3display3' => 'required|','d3link3' => 'required|','d3fontsize3' => 'required|','d3color3' => 'required|','d3background3' => 'required|','d3width3' => 'required|','d3height3' => 'required|','d3top3' => 'required|','d3left3' => 'required|','slide3d4' => 'required|','d4display3' => 'required|','d4link3' => 'required|','d4fontsize3' => 'required|','d4color3' => 'required|','d4background3' => 'required|','d4width3' => 'required|','d4height3' => 'required|','d4top3' => 'required|','d4left3' => 'required|','slide3d3' => 'required|','d5display3' => 'required|','d5link3' => 'required|','d5fontsize3' => 'required|','d5color3' => 'required|','d5background3' => 'required|','d5width3' => 'required|','d5height3' => 'required|','d5top3' => 'required|','d5left3' => 'required|','slide3btn' => 'required|','btndisplay3' => 'required|','btnlink3' => 'required|','btnfontsize3' => 'required|','btncolor3' => 'required|','btnbackground3' => 'required|','btnwidth3' => 'required|','btnheight3' => 'required|','btntop3' => 'required|','btnleft3' => 'required|',

                    ]);
                }


                        $slide3 = ru_slideshow::where('slide',3)->get()->first();

                        $slide3->slide_display = $input['slidedisplay3'];



                        $slide3->a1 = $input['slide3a1'];
                        $slide3->a1_display = $input['a1display3'];
                        $slide3->a1_link = $input['a1link3'];
                        $slide3->a1_fontsize = $input['a1fontsize3'];
                        $slide3->a1_color = $input['a1color3'];
                        $slide3->a1_background = $input['a1background3'];
                        $slide3->a1_width = $input['a1width3'];
                        $slide3->a1_height = $input['a1height3'];
                        $slide3->a1_top = $input['a1top3'];
                        $slide3->a1_left = $input['a1left3'];

                        $slide3->t = $input['slide3t'];
                        $slide3->t_display = $input['tdisplay3'];
                        $slide3->t_link = $input['tlink3'];
                        $slide3->t_fontsize = $input['tfontsize3'];
                        $slide3->t_color = $input['tcolor3'];
                        $slide3->t_background = $input['tbackground3'];
                        $slide3->t_width = $input['twidth3'];
                        $slide3->t_height = $input['theight3'];
                        $slide3->t_top = $input['ttop3'];
                        $slide3->t_left = $input['tleft3'];

                        $slide3->d1 = $input['slide3d1'];
                        $slide3->d1_display = $input['d1display3'];
                        $slide3->d1_link = $input['d1link3'];
                        $slide3->d1_fontsize = $input['d1fontsize3'];
                        $slide3->d1_color = $input['d1color3'];
                        $slide3->d1_background = $input['d1background3'];
                        $slide3->d1_width = $input['d1width3'];
                        $slide3->d1_height = $input['d1height3'];
                        $slide3->d1_top = $input['d1top3'];
                        $slide3->d1_left = $input['d1left3'];

                        $slide3->d2 = $input['slide3d2'];
                        $slide3->d2_display = $input['d2display3'];
                        $slide3->d2_link = $input['d2link3'];
                        $slide3->d2_fontsize = $input['d2fontsize3'];
                        $slide3->d2_color = $input['d2color3'];
                        $slide3->d2_background = $input['d2background3'];
                        $slide3->d2_width = $input['d2width3'];
                        $slide3->d2_height = $input['d2height3'];
                        $slide3->d2_top = $input['d2top3'];
                        $slide3->d2_left = $input['d2left3'];

                        $slide3->d3 = $input['slide3d3'];
                        $slide3->d3_display = $input['d3display3'];
                        $slide3->d3_link = $input['d3link3'];
                        $slide3->d3_fontsize = $input['d3fontsize3'];
                        $slide3->d3_color = $input['d3color3'];
                        $slide3->d3_background = $input['d3background3'];
                        $slide3->d3_width = $input['d3width3'];
                        $slide3->d3_height = $input['d3height3'];
                        $slide3->d3_top = $input['d3top3'];
                        $slide3->d3_left = $input['d3left3'];

                        $slide3->d4 = $input['slide3d4'];
                        $slide3->d4_display = $input['d4display3'];
                        $slide3->d4_link = $input['d4link3'];
                        $slide3->d4_fontsize = $input['d4fontsize3'];
                        $slide3->d4_color = $input['d4color3'];
                        $slide3->d4_background = $input['d4background3'];
                        $slide3->d4_width = $input['d4width3'];
                        $slide3->d4_height = $input['d4height3'];
                        $slide3->d4_top = $input['d4top3'];
                        $slide3->d4_left = $input['d4left3'];

                        $slide3->d5 = $input['slide3d5'];
                        $slide3->d5_display = $input['d5display3'];
                        $slide3->d5_link = $input['d5link3'];
                        $slide3->d5_fontsize = $input['d5fontsize3'];
                        $slide3->d5_color = $input['d5color3'];
                        $slide3->d5_background = $input['d5background3'];
                        $slide3->d5_width = $input['d5width3'];
                        $slide3->d5_height = $input['d5height3'];
                        $slide3->d5_top = $input['d5top3'];
                        $slide3->d5_left = $input['d5left3'];

                        $slide3->btn = $input['slide3btn'];
                        $slide3->btn_display = $input['btndisplay3'];
                        $slide3->btn_link = $input['btnlink3'];
                        $slide3->btn_fontsize = $input['btnfontsize3'];
                        $slide3->btn_color = $input['btncolor3'];
                        $slide3->btn_background = $input['btnbackground3'];
                        $slide3->btn_width = $input['btnwidth3'];
                        $slide3->btn_height = $input['btnheight3'];
                        $slide3->btn_top = $input['btntop3'];
                        $slide3->btn_left = $input['btnleft3'];

                        $slide3->save();


                    if( $input['slidedisplay4']==1111){
                        //validation
                    $this->validate(Request(), [
                    'slide4a1' => 'required|','a1display4' => 'required|','a1link4' => 'required|','a1fontsize4' => 'required|','a1color4' => 'required|','a1background4' => 'required|','a1width4' => 'required|','a1height4' => 'required|','a1top4' => 'required|','a1left4' => 'required|','slide4t' => 'required|','tdisplay4' => 'required|','tlink4' => 'required|','tfontsize4' => 'required|','tcolor4' => 'required|','tbackground4' => 'required|','twidth4' => 'required|','theight4' => 'required|','ttop4' => 'required|','tleft4' => 'required|','slide4d1' => 'required|','d1display4' => 'required|','d1link4' => 'required|','d1fontsize4' => 'required|','d1color4' => 'required|','d1background4' => 'required|','d1width4' => 'required|','d1height4' => 'required|','d1top4' => 'required|','d1left4' => 'required|','slide4d2' => 'required|','d2display4' => 'required|','d2link4' => 'required|','d2fontsize4' => 'required|','d2color4' => 'required|','d2background4' => 'required|','d2width4' => 'required|','d2height4' => 'required|','d2top4' => 'required|','d2left4' => 'required|','slide4d3' => 'required|','d3display4' => 'required|','d3link4' => 'required|','d3fontsize4' => 'required|','d3color4' => 'required|','d3background4' => 'required|','d3width4' => 'required|','d3height4' => 'required|','d3top4' => 'required|','d3left4' => 'required|','slide4d4' => 'required|','d4display4' => 'required|','d4link4' => 'required|','d4fontsize4' => 'required|','d4color4' => 'required|','d4background4' => 'required|','d4width4' => 'required|','d4height4' => 'required|','d4top4' => 'required|','d4left4' => 'required|','slide4d5' => 'required|','d5display4' => 'required|','d5link4' => 'required|','d5fontsize4' => 'required|','d5color4' => 'required|','d5background4' => 'required|','d5width4' => 'required|','d5height4' => 'required|','d5top4' => 'required|','d5left4' => 'required|','slide4btn' => 'required|','btndisplay4' => 'required|','btnlink4' => 'required|','btnfontsize4' => 'required|','btncolor4' => 'required|','btnbackground4' => 'required|','btnwidth4' => 'required|','btnheight4' => 'required|','btntop4' => 'required|','btnleft4' => 'required|',

                    ]);

                }


                        $slide4 = ru_slideshow::where('slide',4)->get()->first();

                        $slide4->slide_display = $input['slidedisplay4'];



                        $slide4->a1 = $input['slide4a1'];
                        $slide4->a1_display = $input['a1display4'];
                        $slide4->a1_link = $input['a1link4'];
                        $slide4->a1_fontsize = $input['a1fontsize4'];
                        $slide4->a1_color = $input['a1color4'];
                        $slide4->a1_background = $input['a1background4'];
                        $slide4->a1_width = $input['a1width4'];
                        $slide4->a1_height = $input['a1height4'];
                        $slide4->a1_top = $input['a1top4'];
                        $slide4->a1_left = $input['a1left4'];

                        $slide4->t = $input['slide4t'];
                        $slide4->t_display = $input['tdisplay4'];
                        $slide4->t_link = $input['tlink4'];
                        $slide4->t_fontsize = $input['tfontsize4'];
                        $slide4->t_color = $input['tcolor4'];
                        $slide4->t_background = $input['tbackground4'];
                        $slide4->t_width = $input['twidth4'];
                        $slide4->t_height = $input['theight4'];
                        $slide4->t_top = $input['ttop4'];
                        $slide4->t_left = $input['tleft4'];

                        $slide4->d1 = $input['slide4d1'];
                        $slide4->d1_display = $input['d1display4'];
                        $slide4->d1_link = $input['d1link4'];
                        $slide4->d1_fontsize = $input['d1fontsize4'];
                        $slide4->d1_color = $input['d1color4'];
                        $slide4->d1_background = $input['d1background4'];
                        $slide4->d1_width = $input['d1width4'];
                        $slide4->d1_height = $input['d1height4'];
                        $slide4->d1_top = $input['d1top4'];
                        $slide4->d1_left = $input['d1left4'];

                        $slide4->d2 = $input['slide4d2'];
                        $slide4->d2_display = $input['d2display4'];
                        $slide4->d2_link = $input['d2link4'];
                        $slide4->d2_fontsize = $input['d2fontsize4'];
                        $slide4->d2_color = $input['d2color4'];
                        $slide4->d2_background = $input['d2background4'];
                        $slide4->d2_width = $input['d2width4'];
                        $slide4->d2_height = $input['d2height4'];
                        $slide4->d2_top = $input['d2top4'];
                        $slide4->d2_left = $input['d2left4'];

                        $slide4->d3 = $input['slide4d3'];
                        $slide4->d3_display = $input['d3display4'];
                        $slide4->d3_link = $input['d3link4'];
                        $slide4->d3_fontsize = $input['d3fontsize4'];
                        $slide4->d3_color = $input['d3color4'];
                        $slide4->d3_background = $input['d3background4'];
                        $slide4->d3_width = $input['d3width4'];
                        $slide4->d3_height = $input['d3height4'];
                        $slide4->d3_top = $input['d3top4'];
                        $slide4->d3_left = $input['d3left4'];

                        $slide4->d4 = $input['slide4d4'];
                        $slide4->d4_display = $input['d4display4'];
                        $slide4->d4_link = $input['d4link4'];
                        $slide4->d4_fontsize = $input['d4fontsize4'];
                        $slide4->d4_color = $input['d4color4'];
                        $slide4->d4_background = $input['d4background4'];
                        $slide4->d4_width = $input['d4width4'];
                        $slide4->d4_height = $input['d4height4'];
                        $slide4->d4_top = $input['d4top4'];
                        $slide4->d4_left = $input['d4left4'];

                        $slide4->d5 = $input['slide4d5'];
                        $slide4->d5_display = $input['d5display4'];
                        $slide4->d5_link = $input['d5link4'];
                        $slide4->d5_fontsize = $input['d5fontsize4'];
                        $slide4->d5_color = $input['d5color4'];
                        $slide4->d5_background = $input['d5background4'];
                        $slide4->d5_width = $input['d5width4'];
                        $slide4->d5_height = $input['d5height4'];
                        $slide4->d5_top = $input['d5top4'];
                        $slide4->d5_left = $input['d5left4'];

                        $slide4->btn = $input['slide4btn'];
                        $slide4->btn_display = $input['btndisplay4'];
                        $slide4->btn_link = $input['btnlink4'];
                        $slide4->btn_fontsize = $input['btnfontsize4'];
                        $slide4->btn_color = $input['btncolor4'];
                        $slide4->btn_background = $input['btnbackground4'];
                        $slide4->btn_width = $input['btnwidth4'];
                        $slide4->btn_height = $input['btnheight4'];
                        $slide4->btn_top = $input['btntop4'];
                        $slide4->btn_left = $input['btnleft4'];

                        $slide4->save();

                    if($input['slidedisplay5']==2111){
                        //validation
                    $this->validate(Request(), [
                    'slide5a1' => 'required|','a1display5' => 'required|','a1link5' => 'required|','a1fontsize5' => 'required|','a1color5' => 'required|','a1background5' => 'required|','a1width5' => 'required|','a1height5' => 'required|','a1top5' => 'required|','a1left5' => 'required|','slide5t' => 'required|','tdisplay5' => 'required|','tlink5' => 'required|','tfontsize5' => 'required|','tcolor5' => 'required|','tbackground5' => 'required|','twidth5' => 'required|','theight5' => 'required|','ttop5' => 'required|','tleft5' => 'required|','slide5d1' => 'required|','d1display5' => 'required|','d1link5' => 'required|','d1fontsize5' => 'required|','d1color5' => 'required|','d1background5' => 'required|','d1width5' => 'required|','d1height5' => 'required|','d1top5' => 'required|','d1left5' => 'required|','slide5d2' => 'required|','d2display5' => 'required|','d2link5' => 'required|','d2fontsize5' => 'required|','d2color5' => 'required|','d2background5' => 'required|','d2width5' => 'required|','d2height5' => 'required|','d2top5' => 'required|','d2left5' => 'required|','slide5d3' => 'required|','d3display5' => 'required|','d3link5' => 'required|','d3fontsize5' => 'required|','d3color5' => 'required|','d3background5' => 'required|','d3width5' => 'required|','d3height5' => 'required|','d3top5' => 'required|','d3left5' => 'required|','slide5d4' => 'required|','d4display5' => 'required|','d4link5' => 'required|','d4fontsize5' => 'required|','d4color5' => 'required|','d4background5' => 'required|','d4width5' => 'required|','d4height5' => 'required|','d4top5' => 'required|','d4left5' => 'required|','slide5d5' => 'required|','d5display5' => 'required|','d5link5' => 'required|','d5fontsize5' => 'required|','d5color5' => 'required|','d5background5' => 'required|','d5width5' => 'required|','d5height5' => 'required|','d5top5' => 'required|','d5left5' => 'required|','slide5btn' => 'required|','btndisplay5' => 'required|','btnlink5' => 'required|','btnfontsize5' => 'required|','btncolor5' => 'required|','btnbackground5' => 'required|','btnwidth5' => 'required|','btnheight5' => 'required|','btntop5' => 'required|','btnleft5' => 'required|',

                    ]);

                    }

                        $slide5 = ru_slideshow::where('slide',5)->get()->first();

                        $slide5->slide_display = $input['slidedisplay5'];

                        $slide5->a1 = $input['slide5a1'];
                        $slide5->a1_display = $input['a1display5'];
                        $slide5->a1_link = $input['a1link5'];
                        $slide5->a1_fontsize = $input['a1fontsize5'];
                        $slide5->a1_color = $input['a1color5'];
                        $slide5->a1_background = $input['a1background5'];
                        $slide5->a1_width = $input['a1width5'];
                        $slide5->a1_height = $input['a1height5'];
                        $slide5->a1_top = $input['a1top5'];
                        $slide5->a1_left = $input['a1left5'];

                        $slide5->t = $input['slide5t'];
                        $slide5->t_display = $input['tdisplay5'];
                        $slide5->t_link = $input['tlink5'];
                        $slide5->t_fontsize = $input['tfontsize5'];
                        $slide5->t_color = $input['tcolor5'];
                        $slide5->t_background = $input['tbackground5'];
                        $slide5->t_width = $input['twidth5'];
                        $slide5->t_height = $input['theight5'];
                        $slide5->t_top = $input['ttop5'];
                        $slide5->t_left = $input['tleft5'];

                        $slide5->d1 = $input['slide5d1'];
                        $slide5->d1_display = $input['d1display5'];
                        $slide5->d1_link = $input['d1link5'];
                        $slide5->d1_fontsize = $input['d1fontsize5'];
                        $slide5->d1_color = $input['d1color5'];
                        $slide5->d1_background = $input['d1background5'];
                        $slide5->d1_width = $input['d1width5'];
                        $slide5->d1_height = $input['d1height5'];
                        $slide5->d1_top = $input['d1top5'];
                        $slide5->d1_left = $input['d1left5'];

                        $slide5->d2 = $input['slide5d2'];
                        $slide5->d2_display = $input['d2display5'];
                        $slide5->d2_link = $input['d2link5'];
                        $slide5->d2_fontsize = $input['d2fontsize5'];
                        $slide5->d2_color = $input['d2color5'];
                        $slide5->d2_background = $input['d2background5'];
                        $slide5->d2_width = $input['d2width5'];
                        $slide5->d2_height = $input['d2height5'];
                        $slide5->d2_top = $input['d2top5'];
                        $slide5->d2_left = $input['d2left5'];

                        $slide5->d3 = $input['slide5d3'];
                        $slide5->d3_display = $input['d3display5'];
                        $slide5->d3_link = $input['d3link5'];
                        $slide5->d3_fontsize = $input['d3fontsize5'];
                        $slide5->d3_color = $input['d3color5'];
                        $slide5->d3_background = $input['d3background5'];
                        $slide5->d3_width = $input['d3width5'];
                        $slide5->d3_height = $input['d3height5'];
                        $slide5->d3_top = $input['d3top5'];
                        $slide5->d3_left = $input['d3left5'];

                        $slide5->d4 = $input['slide5d4'];
                        $slide5->d4_display = $input['d4display5'];
                        $slide5->d4_link = $input['d4link5'];
                        $slide5->d4_fontsize = $input['d4fontsize5'];
                        $slide5->d4_color = $input['d4color5'];
                        $slide5->d4_background = $input['d4background5'];
                        $slide5->d4_width = $input['d4width5'];
                        $slide5->d4_height = $input['d4height5'];
                        $slide5->d4_top = $input['d4top5'];
                        $slide5->d4_left = $input['d4left5'];

                        $slide5->d5 = $input['slide5d5'];
                        $slide5->d5_display = $input['d5display5'];
                        $slide5->d5_link = $input['d5link5'];
                        $slide5->d5_fontsize = $input['d5fontsize5'];
                        $slide5->d5_color = $input['d5color5'];
                        $slide5->d5_background = $input['d5background5'];
                        $slide5->d5_width = $input['d5width5'];
                        $slide5->d5_height = $input['d5height5'];
                        $slide5->d5_top = $input['d5top5'];
                        $slide5->d5_left = $input['d5left5'];

                        $slide5->btn = $input['slide5btn'];
                        $slide5->btn_display = $input['btndisplay5'];
                        $slide5->btn_link = $input['btnlink5'];
                        $slide5->btn_fontsize = $input['btnfontsize5'];
                        $slide5->btn_color = $input['btncolor5'];
                        $slide5->btn_background = $input['btnbackground5'];
                        $slide5->btn_width = $input['btnwidth5'];
                        $slide5->btn_height = $input['btnheight5'];
                        $slide5->btn_top = $input['btntop5'];
                        $slide5->btn_left = $input['btnleft5'];

                        $slide5->save();

                        $slide11 = ru_slideshow::where('slide',1)->get()->first();
                        $slide11->slide_display = $input['slidedisplay1'];


                    if (Request()->hasFile('slideimg1')) {

                    $destinationPath1=public_path().'/assets/Files/';
                    $filename1 = rand(1,1000000).time().'.'.$input['slideimg1']->getClientOriginalExtension();;
                    $slide11->img=URL::to('/assets/Files/').'/'.$filename1;
                    $input['slideimg1']->move($destinationPath1, $filename1);

                    }
                    $slide11->save();

                        $slide2 = ru_slideshow::where('slide',2)->get()->first();
                        $slide2->slide_display = $input['slidedisplay2'];


                    if (Request()->hasFile('slideimg2')) {

                    $destinationPath2=public_path().'/assets/Files/';
                    $filename2 = rand(1,1000000).time().'.'.$input['slideimg2']->getClientOriginalExtension();;
                    $slide2->img=URL::to('/assets/Files/').'/'.$filename2;
                    $input['slideimg2']->move($destinationPath2, $filename2);

                    }

                        $slide2->save();


                        $slide3 = ru_slideshow::where('slide',3)->get()->first();
                        $slide3->slide_display = $input['slidedisplay3'];


                    if (Request()->hasFile('slideimg3')) {

                    $destinationPath3=public_path().'/assets/Files/';
                    $filename3 = rand(1,1000000).time().'.'.$input['slideimg3']->getClientOriginalExtension();;
                    $slide3->img=URL::to('/assets/Files/').'/'.$filename3;
                    $input['slideimg3']->move($destinationPath3, $filename3);

                    }

                    $slide3->save();


                        $slide4 = ru_slideshow::where('slide',4)->get()->first();
                        $slide4->slide_display = $input['slidedisplay4'];


                    if (Request()->hasFile('slideimg4')) {

                    $destinationPath4=public_path().'/assets/Files/';
                    $filename4 = rand(1,1000000).time().'.'.$input['slideimg4']->getClientOriginalExtension();;
                    $slide4->img=URL::to('/assets/Files/').'/'.$filename4;
                    $input['slideimg4']->move($destinationPath4, $filename4);

                    }

                    $slide4->save();



                        $slide5 = ru_slideshow::where('slide',5)->get()->first();
                        $slide5->slide_display = $input['slidedisplay5'];


                    if (Request()->hasFile('slideimg5')) {

                    $destinationPath5=public_path().'/assets/Files/';
                    $filename5 = rand(1,1000000).time().'.'.$input['slideimg5']->getClientOriginalExtension();;
                    $slide5->img=URL::to('/assets/Files/').'/'.$filename5;
                    $input['slideimg5']->move($destinationPath5, $filename5);

                    }
                        $slide5->save();



                return Redirect::to('/en/epanel/ru-slideshow')->with('status-success','SlideShow Has Been Updated');




            }








            public function ar_slideshow(Request $request)
            {


                Session::flash('pageType', 'slideshow');
                Session::flash('currentPage', 'ar-slideshow');
                $session_user= Session::get('editor');
                $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
                $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
                $user=website_admins::where('email',$session_user)->get()->first();
                    $slide1 = ar_slideshow::where('slide',1)->get()->first();
                    $slide2 = ar_slideshow::where('slide',2)->get()->first();
                    $slide3 = ar_slideshow::where('slide',3)->get()->first();
                    $slide4 = ar_slideshow::where('slide',4)->get()->first();
                    $slide5 = ar_slideshow::where('slide',5)->get()->first();
                    if( Request::segment(1) =='ar'){
                        $title = "لوحة التحكم | أرسال الأيميلات ";
                        return view('ar.epanel.ar-slideshow',compact('title','user','notifications_all','notifications_unseen','slide1','slide2','slide3','slide4','slide5'));
                    }else{
                        $title = "epanel | EN SlideShow";
                        return view('epanel.ar-slideshow',compact('title','user','notifications_all','notifications_unseen','slide1','slide2','slide3','slide4','slide5'));
                    }


            }


            public function post_ar_slideshow(Request $request)
            {

                $input=Request::all();


                    if( $input['slidedisplay1']==111){
                        //validation
                    $this->validate(Request(), [
                    'slide1a1' => 'required|','a1display1' => 'required|','a1link1' => 'required|','a1fontsize1' => 'required|','a1color1' => 'required|','a1background1' => 'required|','a1width1' => 'required|','a1height1' => 'required|','a1top1' => 'required|','a1right1' => 'required|','slide1t' => 'required|','tdisplay1' => 'required|','tlink1' => 'required|','tfontsize1' => 'required|','tcolor1' => 'required|','tbackground1' => 'required|','twidth1' => 'required|','theight1' => 'required|','ttop1' => 'required|','tright1' => 'required|','slide1d1' => 'required|','d1display1' => 'required|','d1link1' => 'required|','d1fontsize1' => 'required|','d1color1' => 'required|','d1background1' => 'required|','d1width1' => 'required|','d1height1' => 'required|','d1top1' => 'required|','d1right1' => 'required|','slide1d2' => 'required|','d2display1' => 'required|','d2link1' => 'required|','d2fontsize1' => 'required|','d2color1' => 'required|','d2background1' => 'required|','d2width1' => 'required|','d2height1' => 'required|','d2top1' => 'required|','d2right1' => 'required|','slide1d3' => 'required|','d3display1' => 'required|','d3link1' => 'required|','d3fontsize1' => 'required|','d3color1' => 'required|','d3background1' => 'required|','d3width1' => 'required|','d3height1' => 'required|','d3top1' => 'required|','d3right1' => 'required|','slide1d4' => 'required|','d4display1' => 'required|','d4link1' => 'required|','d4fontsize1' => 'required|','d4color1' => 'required|','d4background1' => 'required|','d4width1' => 'required|','d4height1' => 'required|','d4top1' => 'required|','d4right1' => 'required|','slide1d5' => 'required|','d5display1' => 'required|','d5link1' => 'required|','d5fontsize1' => 'required|','d5color1' => 'required|','d5background1' => 'required|','d5width1' => 'required|','d5height1' => 'required|','d5top1' => 'required|','d5right1' => 'required|','slide1btn' => 'required|','btndisplay1' => 'required|','btnlink1' => 'required|','btnfontsize1' => 'required|','btncolor1' => 'required|','btnbackground1' => 'required|','btnwidth1' => 'required|','btnheight1' => 'required|','btntop1' => 'required|','btnright1' => 'required|',

                    ]);
                }


                        $slide1 = ar_slideshow::where('slide',1)->get()->first();

                        $slide1->slide_display = $input['slidedisplay1'];

                        $slide1->a1 = $input['slide1a1'];
                        $slide1->a1_display = $input['a1display1'];
                        $slide1->a1_link = $input['a1link1'];
                        $slide1->a1_fontsize = $input['a1fontsize1'];
                        $slide1->a1_color = $input['a1color1'];
                        $slide1->a1_background = $input['a1background1'];
                        $slide1->a1_width = $input['a1width1'];
                        $slide1->a1_height = $input['a1height1'];
                        $slide1->a1_top = $input['a1top1'];
                        $slide1->a1_right = $input['a1right1'];

                        $slide1->t = $input['slide1t'];
                        $slide1->t_display = $input['tdisplay1'];
                        $slide1->t_link = $input['tlink1'];
                        $slide1->t_fontsize = $input['tfontsize1'];
                        $slide1->t_color = $input['tcolor1'];
                        $slide1->t_background = $input['tbackground1'];
                        $slide1->t_width = $input['twidth1'];
                        $slide1->t_height = $input['theight1'];
                        $slide1->t_top = $input['ttop1'];
                        $slide1->t_right = $input['tright1'];

                        $slide1->d1 = $input['slide1d1'];
                        $slide1->d1_display = $input['d1display1'];
                        $slide1->d1_link = $input['d1link1'];
                        $slide1->d1_fontsize = $input['d1fontsize1'];
                        $slide1->d1_color = $input['d1color1'];
                        $slide1->d1_background = $input['d1background1'];
                        $slide1->d1_width = $input['d1width1'];
                        $slide1->d1_height = $input['d1height1'];
                        $slide1->d1_top = $input['d1top1'];
                        $slide1->d1_right = $input['d1right1'];

                        $slide1->d2 = $input['slide1d2'];
                        $slide1->d2_display = $input['d2display1'];
                        $slide1->d2_link = $input['d2link1'];
                        $slide1->d2_fontsize = $input['d2fontsize1'];
                        $slide1->d2_color = $input['d2color1'];
                        $slide1->d2_background = $input['d2background1'];
                        $slide1->d2_width = $input['d2width1'];
                        $slide1->d2_height = $input['d2height1'];
                        $slide1->d2_top = $input['d2top1'];
                        $slide1->d2_right = $input['d2right1'];

                        $slide1->d3 = $input['slide1d3'];
                        $slide1->d3_display = $input['d3display1'];
                        $slide1->d3_link = $input['d3link1'];
                        $slide1->d3_fontsize = $input['d3fontsize1'];
                        $slide1->d3_color = $input['d3color1'];
                        $slide1->d3_background = $input['d3background1'];
                        $slide1->d3_width = $input['d3width1'];
                        $slide1->d3_height = $input['d3height1'];
                        $slide1->d3_top = $input['d3top1'];
                        $slide1->d3_right = $input['d3right1'];

                        $slide1->d4 = $input['slide1d4'];
                        $slide1->d4_display = $input['d4display1'];
                        $slide1->d4_link = $input['d4link1'];
                        $slide1->d4_fontsize = $input['d4fontsize1'];
                        $slide1->d4_color = $input['d4color1'];
                        $slide1->d4_background = $input['d4background1'];
                        $slide1->d4_width = $input['d4width1'];
                        $slide1->d4_height = $input['d4height1'];
                        $slide1->d4_top = $input['d4top1'];
                        $slide1->d4_right = $input['d4right1'];

                        $slide1->d5 = $input['slide1d5'];
                        $slide1->d5_display = $input['d5display1'];
                        $slide1->d5_link = $input['d5link1'];
                        $slide1->d5_fontsize = $input['d5fontsize1'];
                        $slide1->d5_color = $input['d5color1'];
                        $slide1->d5_background = $input['d5background1'];
                        $slide1->d5_width = $input['d5width1'];
                        $slide1->d5_height = $input['d5height1'];;
                        $slide1->d5_top = $input['d5top1'];
                        $slide1->d5_right = $input['d5right1'];

                        $slide1->btn = $input['slide1btn'];
                        $slide1->btn_display = $input['btndisplay1'];
                        $slide1->btn_link = $input['btnlink1'];;
                        $slide1->btn_fontsize = $input['btnfontsize1'];
                        $slide1->btn_color = $input['btncolor1'];
                        $slide1->btn_background = $input['btnbackground1'];
                        $slide1->btn_width = $input['btnwidth1'];
                        $slide1->btn_height = $input['btnheight1'];
                        $slide1->btn_top = $input['btntop1'];
                        $slide1->btn_right = $input['btnright1'];

                        $slide1->save();


                    if( $input['slidedisplay2']==1111){
                        //validation
                    $this->validate(Request(), [
                    'slide2a1' => 'required|','a1display2' => 'required|','a1link2' => 'required|','a1fontsize2' => 'required|','a1color2' => 'required|','a1background2' => 'required|','a1width2' => 'required|','a1height2' => 'required|','a1top2' => 'required|','a1right2' => 'required|','slide2t' => 'required|','tdisplay2' => 'required|','tlink2' => 'required|','tfontsize2' => 'required|','tcolor2' => 'required|','tbackground1' => 'required|','twidth2' => 'required|','theight2' => 'required|','ttop2' => 'required|','tright2' => 'required|','slide2d1' => 'required|','d1display2' => 'required|','d1link2' => 'required|','d1fontsize2' => 'required|','d1color2' => 'required|','d1background2' => 'required|','d1width2' => 'required|','d1height2' => 'required|','d1top2' => 'required|','d1right2' => 'required|','slide2d2' => 'required|','d2display2' => 'required|','d2link2' => 'required|','d2fontsize2' => 'required|','d2color2' => 'required|','d2background2' => 'required|','d2width2' => 'required|','d2height2' => 'required|','d2top2' => 'required|','d2right2' => 'required|','slide2d3' => 'required|','d3display2' => 'required|','d3link2' => 'required|','d3fontsize2' => 'required|','d3color2' => 'required|','d3background2' => 'required|','d3width2' => 'required|','d3height2' => 'required|','d3top2' => 'required|','d3right2' => 'required|','slide2d4' => 'required|','d4display2' => 'required|','d4link2' => 'required|','d4fontsize2' => 'required|','d4color2' => 'required|','d4background2' => 'required|','d4width2' => 'required|','d4height2' => 'required|','d4top2' => 'required|','d4right2' => 'required|','slide2d5' => 'required|','d5display2' => 'required|','d5link2' => 'required|','d5fontsize2' => 'required|','d5color2' => 'required|','d5background2' => 'required|','d5width2' => 'required|','d5height2' => 'required|','d5top2' => 'required|','d5right2' => 'required|','slide2btn' => 'required|','btndisplay2' => 'required|','btnlink2' => 'required|','btnfontsize2' => 'required|','btncolor2' => 'required|','btnbackground2' => 'required|','btnwidth2' => 'required|','btnheight2' => 'required|','btntop2' => 'required|','btnright2' => 'required|',

                    ]);
                }


                        $slide2 = ar_slideshow::where('slide',2)->get()->first();

                        $slide2->slide_display = $input['slidedisplay2'];


                        $slide2->a1 = $input['slide2a1'];
                        $slide2->a1_display = $input['a1display2'];
                        $slide2->a1_link = $input['a1link2'];
                        $slide2->a1_fontsize = $input['a1fontsize2'];
                        $slide2->a1_color = $input['a1color2'];
                        $slide2->a1_background = $input['a1background2'];
                        $slide2->a1_width = $input['a1width2'];
                        $slide2->a1_height = $input['a1height2'];
                        $slide2->a1_top = $input['a1top2'];
                        $slide2->a1_right = $input['a1right2'];

                        $slide2->t = $input['slide2t'];
                        $slide2->t_display = $input['tdisplay2'];
                        $slide2->t_link = $input['tlink2'];
                        $slide2->t_fontsize = $input['tfontsize2'];
                        $slide2->t_color = $input['tcolor2'];
                        $slide2->t_background = $input['tbackground2'];
                        $slide2->t_width = $input['twidth2'];
                        $slide2->t_height = $input['theight2'];
                        $slide2->t_top = $input['ttop2'];
                        $slide2->t_right = $input['tright2'];

                        $slide2->d1 = $input['slide2d1'];
                        $slide2->d1_display = $input['d1display2'];
                        $slide2->d1_link = $input['d1link2'];
                        $slide2->d1_fontsize = $input['d1fontsize2'];
                        $slide2->d1_color = $input['d1color2'];
                        $slide2->d1_background = $input['d1background2'];
                        $slide2->d1_width = $input['d1width2'];
                        $slide2->d1_height = $input['d1height2'];
                        $slide2->d1_top = $input['d1top2'];
                        $slide2->d1_right = $input['d1right2'];

                        $slide2->d2 = $input['slide2d2'];
                        $slide2->d2_display = $input['d2display2'];
                        $slide2->d2_link = $input['d2link2'];
                        $slide2->d2_fontsize = $input['d2fontsize2'];
                        $slide2->d2_color = $input['d2color2'];
                        $slide2->d2_background = $input['d2background2'];
                        $slide2->d2_width = $input['d2width2'];
                        $slide2->d2_height = $input['d2height2'];
                        $slide2->d2_top = $input['d2top2'];
                        $slide2->d2_right = $input['d2right2'];

                        $slide2->d3 = $input['slide2d3'];
                        $slide2->d3_display = $input['d3display2'];
                        $slide2->d3_link = $input['d3link2'];
                        $slide2->d3_fontsize = $input['d3fontsize2'];
                        $slide2->d3_color = $input['d3color2'];
                        $slide2->d3_background = $input['d3background2'];
                        $slide2->d3_width = $input['d3width2'];
                        $slide2->d3_height = $input['d3height2'];
                        $slide2->d3_top = $input['d3top2'];
                        $slide2->d3_right = $input['d3right2'];

                        $slide2->d4 = $input['slide2d4'];
                        $slide2->d4_display = $input['d4display2'];
                        $slide2->d4_link = $input['d4link2'];
                        $slide2->d4_fontsize = $input['d4fontsize2'];
                        $slide2->d4_color = $input['d4color2'];
                        $slide2->d4_background = $input['d4background2'];
                        $slide2->d4_width = $input['d4width2'];
                        $slide2->d4_height = $input['d4height2'];
                        $slide2->d4_top = $input['d4top2'];
                        $slide2->d4_right = $input['d4right2'];

                        $slide2->d5 = $input['slide2d5'];
                        $slide2->d5_display = $input['d5display2'];
                        $slide2->d5_link = $input['d5link2'];
                        $slide2->d5_fontsize = $input['d5fontsize2'];
                        $slide2->d5_color = $input['d5color2'];
                        $slide2->d5_background = $input['d5background2'];
                        $slide2->d5_width = $input['d5width2'];
                        $slide2->d5_height = $input['d5height2'];
                        $slide2->d5_top = $input['d5top2'];
                        $slide2->d5_right = $input['d5right2'];

                        $slide2->btn = $input['slide2btn'];
                        $slide2->btn_display = $input['btndisplay2'];
                        $slide2->btn_link = $input['btnlink2'];
                        $slide2->btn_fontsize = $input['btnfontsize2'];
                        $slide2->btn_color = $input['btncolor2'];
                        $slide2->btn_background = $input['btnbackground2'];
                        $slide2->btn_width = $input['btnwidth2'];
                        $slide2->btn_height = $input['btnheight2'];
                        $slide2->btn_top = $input['btntop2'];
                        $slide2->btn_right = $input['btnright2'];

                        $slide2->save();


                    if( $input['slidedisplay3']==111){
                        //validation
                    $this->validate(Request(), [
                    'slide3a1' => 'required|','a1display3' => 'required|','a1link3' => 'required|','a1fontsize3' => 'required|','a1color3' => 'required|','a1background3' => 'required|','a1width3' => 'required|','a1height3' => 'required|','a1top3' => 'required|','a1right3' => 'required|','slide3t' => 'required|','tdisplay3' => 'required|','tlink3' => 'required|','tfontsize3' => 'required|','tcolor3' => 'required|','tbackground3' => 'required|','twidth3' => 'required|','theight3' => 'required|','ttop3' => 'required|','tright3' => 'required|','slide3d1' => 'required|','d1display3' => 'required|','d1link3' => 'required|','d1fontsize3' => 'required|','d1color3' => 'required|','d1background3' => 'required|','d1width3' => 'required|','d1height3' => 'required|','d1top3' => 'required|','d1right3' => 'required|','slide3d2' => 'required|','d2display3' => 'required|','d2link3' => 'required|','d2fontsize3' => 'required|','d2color3' => 'required|','d2background3' => 'required|','d2width3' => 'required|','d2height3' => 'required|','d2top3' => 'required|','d2right3' => 'required|','slide3d3' => 'required|','d3display3' => 'required|','d3link3' => 'required|','d3fontsize3' => 'required|','d3color3' => 'required|','d3background3' => 'required|','d3width3' => 'required|','d3height3' => 'required|','d3top3' => 'required|','d3right3' => 'required|','slide3d4' => 'required|','d4display3' => 'required|','d4link3' => 'required|','d4fontsize3' => 'required|','d4color3' => 'required|','d4background3' => 'required|','d4width3' => 'required|','d4height3' => 'required|','d4top3' => 'required|','d4right3' => 'required|','slide3d3' => 'required|','d5display3' => 'required|','d5link3' => 'required|','d5fontsize3' => 'required|','d5color3' => 'required|','d5background3' => 'required|','d5width3' => 'required|','d5height3' => 'required|','d5top3' => 'required|','d5right3' => 'required|','slide3btn' => 'required|','btndisplay3' => 'required|','btnlink3' => 'required|','btnfontsize3' => 'required|','btncolor3' => 'required|','btnbackground3' => 'required|','btnwidth3' => 'required|',
                    'btnheight3' => 'required|','btntop3' => 'required|','btnright3' => 'required|',

                    ]);
                }


                        $slide3 = ar_slideshow::where('slide',3)->get()->first();

                        $slide3->slide_display = $input['slidedisplay3'];



                        $slide3->a1 = $input['slide3a1'];
                        $slide3->a1_display = $input['a1display3'];
                        $slide3->a1_link = $input['a1link3'];
                        $slide3->a1_fontsize = $input['a1fontsize3'];
                        $slide3->a1_color = $input['a1color3'];
                        $slide3->a1_background = $input['a1background3'];
                        $slide3->a1_width = $input['a1width3'];
                        $slide3->a1_height = $input['a1height3'];
                        $slide3->a1_top = $input['a1top3'];
                        $slide3->a1_right = $input['a1right3'];

                        $slide3->t = $input['slide3t'];
                        $slide3->t_display = $input['tdisplay3'];
                        $slide3->t_link = $input['tlink3'];
                        $slide3->t_fontsize = $input['tfontsize3'];
                        $slide3->t_color = $input['tcolor3'];
                        $slide3->t_background = $input['tbackground3'];
                        $slide3->t_width = $input['twidth3'];
                        $slide3->t_height = $input['theight3'];
                        $slide3->t_top = $input['ttop3'];
                        $slide3->t_right = $input['tright3'];

                        $slide3->d1 = $input['slide3d1'];
                        $slide3->d1_display = $input['d1display3'];
                        $slide3->d1_link = $input['d1link3'];
                        $slide3->d1_fontsize = $input['d1fontsize3'];
                        $slide3->d1_color = $input['d1color3'];
                        $slide3->d1_background = $input['d1background3'];
                        $slide3->d1_width = $input['d1width3'];
                        $slide3->d1_height = $input['d1height3'];
                        $slide3->d1_top = $input['d1top3'];
                        $slide3->d1_right = $input['d1right3'];

                        $slide3->d2 = $input['slide3d2'];
                        $slide3->d2_display = $input['d2display3'];
                        $slide3->d2_link = $input['d2link3'];
                        $slide3->d2_fontsize = $input['d2fontsize3'];
                        $slide3->d2_color = $input['d2color3'];
                        $slide3->d2_background = $input['d2background3'];
                        $slide3->d2_width = $input['d2width3'];
                        $slide3->d2_height = $input['d2height3'];
                        $slide3->d2_top = $input['d2top3'];
                        $slide3->d2_right = $input['d2right3'];

                        $slide3->d3 = $input['slide3d3'];
                        $slide3->d3_display = $input['d3display3'];
                        $slide3->d3_link = $input['d3link3'];
                        $slide3->d3_fontsize = $input['d3fontsize3'];
                        $slide3->d3_color = $input['d3color3'];
                        $slide3->d3_background = $input['d3background3'];
                        $slide3->d3_width = $input['d3width3'];
                        $slide3->d3_height = $input['d3height3'];
                        $slide3->d3_top = $input['d3top3'];
                        $slide3->d3_right = $input['d3right3'];

                        $slide3->d4 = $input['slide3d4'];
                        $slide3->d4_display = $input['d4display3'];
                        $slide3->d4_link = $input['d4link3'];
                        $slide3->d4_fontsize = $input['d4fontsize3'];
                        $slide3->d4_color = $input['d4color3'];
                        $slide3->d4_background = $input['d4background3'];
                        $slide3->d4_width = $input['d4width3'];
                        $slide3->d4_height = $input['d4height3'];
                        $slide3->d4_top = $input['d4top3'];
                        $slide3->d4_right = $input['d4right3'];

                        $slide3->d5 = $input['slide3d5'];
                        $slide3->d5_display = $input['d5display3'];
                        $slide3->d5_link = $input['d5link3'];
                        $slide3->d5_fontsize = $input['d5fontsize3'];
                        $slide3->d5_color = $input['d5color3'];
                        $slide3->d5_background = $input['d5background3'];
                        $slide3->d5_width = $input['d5width3'];
                        $slide3->d5_height = $input['d5height3'];
                        $slide3->d5_top = $input['d5top3'];
                        $slide3->d5_right = $input['d5right3'];

                        $slide3->btn = $input['slide3btn'];
                        $slide3->btn_display = $input['btndisplay3'];
                        $slide3->btn_link = $input['btnlink3'];
                        $slide3->btn_fontsize = $input['btnfontsize3'];
                        $slide3->btn_color = $input['btncolor3'];
                        $slide3->btn_background = $input['btnbackground3'];
                        $slide3->btn_width = $input['btnwidth3'];
                        $slide3->btn_height = $input['btnheight3'];
                        $slide3->btn_top = $input['btntop3'];
                        $slide3->btn_right = $input['btnright3'];

                        $slide3->save();


                    if( $input['slidedisplay4']==111){
                        //validation
                    $this->validate(Request(), [
                    'slide4a1' => 'required|','a1display4' => 'required|','a1link4' => 'required|','a1fontsize4' => 'required|','a1color4' => 'required|','a1background4' => 'required|','a1width4' => 'required|','a1height4' => 'required|','a1top4' => 'required|','a1right4' => 'required|','slide4t' => 'required|','tdisplay4' => 'required|','tlink4' => 'required|','tfontsize4' => 'required|','tcolor4' => 'required|','tbackground4' => 'required|','twidth4' => 'required|','theight4' => 'required|','ttop4' => 'required|','tright4' => 'required|','slide4d1' => 'required|','d1display4' => 'required|','d1link4' => 'required|','d1fontsize4' => 'required|','d1color4' => 'required|','d1background4' => 'required|','d1width4' => 'required|','d1height4' => 'required|','d1top4' => 'required|','d1right4' => 'required|','slide4d2' => 'required|','d2display4' => 'required|','d2link4' => 'required|','d2fontsize4' => 'required|','d2color4' => 'required|','d2background4' => 'required|','d2width4' => 'required|','d2height4' => 'required|','d2top4' => 'required|','d2right4' => 'required|','slide4d3' => 'required|','d3display4' => 'required|','d3link4' => 'required|','d3fontsize4' => 'required|','d3color4' => 'required|','d3background4' => 'required|','d3width4' => 'required|','d3height4' => 'required|','d3top4' => 'required|','d3right4' => 'required|','slide4d4' => 'required|','d4display4' => 'required|','d4link4' => 'required|','d4fontsize4' => 'required|','d4color4' => 'required|','d4background4' => 'required|','d4width4' => 'required|','d4height4' => 'required|','d4top4' => 'required|','d4right4' => 'required|','slide4d5' => 'required|','d5display4' => 'required|','d5link4' => 'required|','d5fontsize4' => 'required|','d5color4' => 'required|','d5background4' => 'required|','d5width4' => 'required|','d5height4' => 'required|','d5top4' => 'required|','d5right4' => 'required|','slide4btn' => 'required|','btndisplay4' => 'required|','btnlink4' => 'required|','btnfontsize4' => 'required|','btncolor4' => 'required|','btnbackground4' => 'required|','btnwidth4' => 'required|','btnheight4' => 'required|','btntop4' => 'required|','btnright4' => 'required|',

                    ]);

                }


                        $slide4 = ar_slideshow::where('slide',4)->get()->first();

                        $slide4->slide_display = $input['slidedisplay4'];



                        $slide4->a1 = $input['slide4a1'];
                        $slide4->a1_display = $input['a1display4'];
                        $slide4->a1_link = $input['a1link4'];
                        $slide4->a1_fontsize = $input['a1fontsize4'];
                        $slide4->a1_color = $input['a1color4'];
                        $slide4->a1_background = $input['a1background4'];
                        $slide4->a1_width = $input['a1width4'];
                        $slide4->a1_height = $input['a1height4'];
                        $slide4->a1_top = $input['a1top4'];
                        $slide4->a1_right = $input['a1right4'];

                        $slide4->t = $input['slide4t'];
                        $slide4->t_display = $input['tdisplay4'];
                        $slide4->t_link = $input['tlink4'];
                        $slide4->t_fontsize = $input['tfontsize4'];
                        $slide4->t_color = $input['tcolor4'];
                        $slide4->t_background = $input['tbackground4'];
                        $slide4->t_width = $input['twidth4'];
                        $slide4->t_height = $input['theight4'];
                        $slide4->t_top = $input['ttop4'];
                        $slide4->t_right = $input['tright4'];

                        $slide4->d1 = $input['slide4d1'];
                        $slide4->d1_display = $input['d1display4'];
                        $slide4->d1_link = $input['d1link4'];
                        $slide4->d1_fontsize = $input['d1fontsize4'];
                        $slide4->d1_color = $input['d1color4'];
                        $slide4->d1_background = $input['d1background4'];
                        $slide4->d1_width = $input['d1width4'];
                        $slide4->d1_height = $input['d1height4'];
                        $slide4->d1_top = $input['d1top4'];
                        $slide4->d1_right = $input['d1right4'];

                        $slide4->d2 = $input['slide4d2'];
                        $slide4->d2_display = $input['d2display4'];
                        $slide4->d2_link = $input['d2link4'];
                        $slide4->d2_fontsize = $input['d2fontsize4'];
                        $slide4->d2_color = $input['d2color4'];
                        $slide4->d2_background = $input['d2background4'];
                        $slide4->d2_width = $input['d2width4'];
                        $slide4->d2_height = $input['d2height4'];
                        $slide4->d2_top = $input['d2top4'];
                        $slide4->d2_right = $input['d2right4'];

                        $slide4->d3 = $input['slide4d3'];
                        $slide4->d3_display = $input['d3display4'];
                        $slide4->d3_link = $input['d3link4'];
                        $slide4->d3_fontsize = $input['d3fontsize4'];
                        $slide4->d3_color = $input['d3color4'];
                        $slide4->d3_background = $input['d3background4'];
                        $slide4->d3_width = $input['d3width4'];
                        $slide4->d3_height = $input['d3height4'];
                        $slide4->d3_top = $input['d3top4'];
                        $slide4->d3_right = $input['d3right4'];

                        $slide4->d4 = $input['slide4d4'];
                        $slide4->d4_display = $input['d4display4'];
                        $slide4->d4_link = $input['d4link4'];
                        $slide4->d4_fontsize = $input['d4fontsize4'];
                        $slide4->d4_color = $input['d4color4'];
                        $slide4->d4_background = $input['d4background4'];
                        $slide4->d4_width = $input['d4width4'];
                        $slide4->d4_height = $input['d4height4'];
                        $slide4->d4_top = $input['d4top4'];
                        $slide4->d4_right = $input['d4right4'];

                        $slide4->d5 = $input['slide4d5'];
                        $slide4->d5_display = $input['d5display4'];
                        $slide4->d5_link = $input['d5link4'];
                        $slide4->d5_fontsize = $input['d5fontsize4'];
                        $slide4->d5_color = $input['d5color4'];
                        $slide4->d5_background = $input['d5background4'];
                        $slide4->d5_width = $input['d5width4'];
                        $slide4->d5_height = $input['d5height4'];
                        $slide4->d5_top = $input['d5top4'];
                        $slide4->d5_right = $input['d5right4'];

                        $slide4->btn = $input['slide4btn'];
                        $slide4->btn_display = $input['btndisplay4'];
                        $slide4->btn_link = $input['btnlink4'];
                        $slide4->btn_fontsize = $input['btnfontsize4'];
                        $slide4->btn_color = $input['btncolor4'];
                        $slide4->btn_background = $input['btnbackground4'];
                        $slide4->btn_width = $input['btnwidth4'];
                        $slide4->btn_height = $input['btnheight4'];
                        $slide4->btn_top = $input['btntop4'];
                        $slide4->btn_right = $input['btnright4'];

                        $slide4->save();

                    if($input['slidedisplay5']==211){
                        //validation
                    $this->validate(Request(), [
                    'slide5a1' => 'required|','a1display5' => 'required|','a1link5' => 'required|','a1fontsize5' => 'required|','a1color5' => 'required|','a1background5' => 'required|','a1width5' => 'required|','a1height5' => 'required|','a1top5' => 'required|','a1right5' => 'required|','slide5t' => 'required|','tdisplay5' => 'required|','tlink5' => 'required|','tfontsize5' => 'required|','tcolor5' => 'required|','tbackground5' => 'required|','twidth5' => 'required|','theight5' => 'required|','ttop5' => 'required|','tright5' => 'required|','slide5d1' => 'required|','d1display5' => 'required|','d1link5' => 'required|','d1fontsize5' => 'required|','d1color5' => 'required|','d1background5' => 'required|','d1width5' => 'required|','d1height5' => 'required|','d1top5' => 'required|','d1right5' => 'required|','slide5d2' => 'required|','d2display5' => 'required|','d2link5' => 'required|','d2fontsize5' => 'required|','d2color5' => 'required|','d2background5' => 'required|','d2width5' => 'required|','d2height5' => 'required|','d2top5' => 'required|','d2right5' => 'required|','slide5d3' => 'required|','d3display5' => 'required|','d3link5' => 'required|','d3fontsize5' => 'required|','d3color5' => 'required|','d3background5' => 'required|','d3width5' => 'required|','d3height5' => 'required|','d3top5' => 'required|','d3right5' => 'required|','slide5d4' => 'required|','d4display5' => 'required|','d4link5' => 'required|','d4fontsize5' => 'required|','d4color5' => 'required|','d4background5' => 'required|','d4width5' => 'required|','d4height5' => 'required|','d4top5' => 'required|','d4right5' => 'required|','slide5d5' => 'required|','d5display5' => 'required|','d5link5' => 'required|','d5fontsize5' => 'required|','d5color5' => 'required|','d5background5' => 'required|','d5width5' => 'required|','d5height5' => 'required|','d5top5' => 'required|','d5right5' => 'required|','slide5btn' => 'required|','btndisplay5' => 'required|','btnlink5' => 'required|','btnfontsize5' => 'required|','btncolor5' => 'required|','btnbackground5' => 'required|','btnwidth5' => 'required|','btnheight5' => 'required|','btntop5' => 'required|','btnright5' => 'required|',

                    ]);

                    }

                        $slide5 = ar_slideshow::where('slide',5)->get()->first();

                        $slide5->slide_display = $input['slidedisplay5'];

                        $slide5->a1 = $input['slide5a1'];
                        $slide5->a1_display = $input['a1display5'];
                        $slide5->a1_link = $input['a1link5'];
                        $slide5->a1_fontsize = $input['a1fontsize5'];
                        $slide5->a1_color = $input['a1color5'];
                        $slide5->a1_background = $input['a1background5'];
                        $slide5->a1_width = $input['a1width5'];
                        $slide5->a1_height = $input['a1height5'];
                        $slide5->a1_top = $input['a1top5'];
                        $slide5->a1_right = $input['a1right5'];

                        $slide5->t = $input['slide5t'];
                        $slide5->t_display = $input['tdisplay5'];
                        $slide5->t_link = $input['tlink5'];
                        $slide5->t_fontsize = $input['tfontsize5'];
                        $slide5->t_color = $input['tcolor5'];
                        $slide5->t_background = $input['tbackground5'];
                        $slide5->t_width = $input['twidth5'];
                        $slide5->t_height = $input['theight5'];
                        $slide5->t_top = $input['ttop5'];
                        $slide5->t_right = $input['tright5'];

                        $slide5->d1 = $input['slide5d1'];
                        $slide5->d1_display = $input['d1display5'];
                        $slide5->d1_link = $input['d1link5'];
                        $slide5->d1_fontsize = $input['d1fontsize5'];
                        $slide5->d1_color = $input['d1color5'];
                        $slide5->d1_background = $input['d1background5'];
                        $slide5->d1_width = $input['d1width5'];
                        $slide5->d1_height = $input['d1height5'];
                        $slide5->d1_top = $input['d1top5'];
                        $slide5->d1_right = $input['d1right5'];

                        $slide5->d2 = $input['slide5d2'];
                        $slide5->d2_display = $input['d2display5'];
                        $slide5->d2_link = $input['d2link5'];
                        $slide5->d2_fontsize = $input['d2fontsize5'];
                        $slide5->d2_color = $input['d2color5'];
                        $slide5->d2_background = $input['d2background5'];
                        $slide5->d2_width = $input['d2width5'];
                        $slide5->d2_height = $input['d2height5'];
                        $slide5->d2_top = $input['d2top5'];
                        $slide5->d2_right = $input['d2right5'];

                        $slide5->d3 = $input['slide5d3'];
                        $slide5->d3_display = $input['d3display5'];
                        $slide5->d3_link = $input['d3link5'];
                        $slide5->d3_fontsize = $input['d3fontsize5'];
                        $slide5->d3_color = $input['d3color5'];
                        $slide5->d3_background = $input['d3background5'];
                        $slide5->d3_width = $input['d3width5'];
                        $slide5->d3_height = $input['d3height5'];
                        $slide5->d3_top = $input['d3top5'];
                        $slide5->d3_right = $input['d3right5'];

                        $slide5->d4 = $input['slide5d4'];
                        $slide5->d4_display = $input['d4display5'];
                        $slide5->d4_link = $input['d4link5'];
                        $slide5->d4_fontsize = $input['d4fontsize5'];
                        $slide5->d4_color = $input['d4color5'];
                        $slide5->d4_background = $input['d4background5'];
                        $slide5->d4_width = $input['d4width5'];
                        $slide5->d4_height = $input['d4height5'];
                        $slide5->d4_top = $input['d4top5'];
                        $slide5->d4_right = $input['d4right5'];

                        $slide5->d5 = $input['slide5d5'];
                        $slide5->d5_display = $input['d5display5'];
                        $slide5->d5_link = $input['d5link5'];
                        $slide5->d5_fontsize = $input['d5fontsize5'];
                        $slide5->d5_color = $input['d5color5'];
                        $slide5->d5_background = $input['d5background5'];
                        $slide5->d5_width = $input['d5width5'];
                        $slide5->d5_height = $input['d5height5'];
                        $slide5->d5_top = $input['d5top5'];
                        $slide5->d5_right = $input['d5right5'];

                        $slide5->btn = $input['slide5btn'];
                        $slide5->btn_display = $input['btndisplay5'];
                        $slide5->btn_link = $input['btnlink5'];
                        $slide5->btn_fontsize = $input['btnfontsize5'];
                        $slide5->btn_color = $input['btncolor5'];
                        $slide5->btn_background = $input['btnbackground5'];
                        $slide5->btn_width = $input['btnwidth5'];
                        $slide5->btn_height = $input['btnheight5'];
                        $slide5->btn_top = $input['btntop5'];
                        $slide5->btn_right = $input['btnright5'];

                        $slide5->save();

                        $slide11 = ar_slideshow::where('slide',1)->get()->first();
                        $slide11->slide_display = $input['slidedisplay1'];


                    if (Request()->hasFile('slideimg1')) {

                    $destinationPath1=public_path().'/assets/Files/';
                    $filename1 = rand(1,1000000).time().'.'.$input['slideimg1']->getClientOriginalExtension();;
                    $slide11->img=URL::to('/assets/Files/').'/'.$filename1;
                    $input['slideimg1']->move($destinationPath1, $filename1);

                    }
                    $slide11->save();

                        $slide2 = ar_slideshow::where('slide',2)->get()->first();
                        $slide2->slide_display = $input['slidedisplay2'];


                    if (Request()->hasFile('slideimg2')) {

                    $destinationPath2=public_path().'/assets/Files/';
                    $filename2 = rand(1,1000000).time().'.'.$input['slideimg2']->getClientOriginalExtension();;
                    $slide2->img=URL::to('/assets/Files/').'/'.$filename2;
                    $input['slideimg2']->move($destinationPath2, $filename2);

                    }

                        $slide2->save();


                        $slide3 = ar_slideshow::where('slide',3)->get()->first();
                        $slide3->slide_display = $input['slidedisplay3'];


                    if (Request()->hasFile('slideimg3')) {

                    $destinationPath3=public_path().'/assets/Files/';
                    $filename3 = rand(1,1000000).time().'.'.$input['slideimg3']->getClientOriginalExtension();;
                    $slide3->img=URL::to('/assets/Files/').'/'.$filename3;
                    $input['slideimg3']->move($destinationPath3, $filename3);

                    }

                    $slide3->save();


                        $slide4 = ar_slideshow::where('slide',4)->get()->first();
                        $slide4->slide_display = $input['slidedisplay4'];


                    if (Request()->hasFile('slideimg4')) {

                    $destinationPath4=public_path().'/assets/Files/';
                    $filename4 = rand(1,1000000).time().'.'.$input['slideimg4']->getClientOriginalExtension();;
                    $slide4->img=URL::to('/assets/Files/').'/'.$filename4;
                    $input['slideimg4']->move($destinationPath4, $filename4);

                    }

                    $slide4->save();



                        $slide5 = ar_slideshow::where('slide',5)->get()->first();
                        $slide5->slide_display = $input['slidedisplay5'];


                    if (Request()->hasFile('slideimg5')) {

                    $destinationPath5=public_path().'/assets/Files/';
                    $filename5 = rand(1,1000000).time().'.'.$input['slideimg5']->getClientOriginalExtension();;
                    $slide5->img=URL::to('/assets/Files/').'/'.$filename5;
                    $input['slideimg5']->move($destinationPath5, $filename5);

                    }
                        $slide5->save();





                return Redirect::to('/en/epanel/ar-slideshow')->with('status-success','SlideShow Has Been Updated');




            }





            public function technical_analysis(Request $request)
            {


                Session::flash('pageType', 'analysis');
                Session::flash('currentPage', 'technical-analysis');
                $session_user= Session::get('editor');
                $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
                $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
                $user=website_admins::where('email',$session_user)->get()->first();
                    $posts = technicalanalysis::all()->sortByDesc("id");

                    if( Request::segment(1) =='ar'){
                        $title = "لوحة التحكم | التحليل الفنى ";
                        return view('ar.epanel.ar-technical-analysis',compact('title','user','notifications_all','notifications_unseen','posts'));
                    }else{
                        $title = "JMI Brokers | Technical Analysis";
                        $description="Use JMI Brokers FREE & Daily rich technical analysis (MACD indicator/ Nepse alpha chart/Moving Average) for investment valuation & identifying opportunities.";
                        $keywords="technical analysis ,MACD indicator, chart patterns, nepse alpha chart, Support and Resistance, Moving Average";
                        return view('epanel.technical-analysis',compact('title','user','notifications_all','notifications_unseen','posts','description','keywords'));
                    }


            }





    public function delete_technical_analysis($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'technical');
        $session_user= Session::get('editor');

        $input=Request::all();
        $ids = explode(",", $id);
        foreach ($ids as $idd) {
        $technical=technicalanalysis::where('id',$idd)->get()->first();
        $technical->delete();
        }



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/technical-analysis?page=1&per=10')->with('status-success','Selected technical Has Been Deleted');
            }else{
                return redirect('en/epanel/technical-analysis?page=1&per=10')->with('status-success','Selected technical Has Been Deleted');
            }



    }






    public function post_technical_analysis()
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'technical');
        $session_user= Session::get('editor');

        $input=Request::all();

        $technical=new technicalanalysis;
        $technical->title=$input['title'];
        $technical->arabic_title=$input['arabic_title'];
        $technical->arabic_details=$input['arabic_details'];
        $technical->details=$input['details'];
        $technical->technicaltype=$input['technicaltype'];
        $technical->technicalstatus=$input['technicalstatus'];
        $technical->image='';
        $technical->save();



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/technical-analysis?page=1&per=10')->with('status-success','New technical Has Been Created');
            }else{
                return redirect('en/epanel/technical-analysis?page=1&per=10')->with('status-success','New technical Has Been Created');
            }



    }




    public function update_technical_analysis($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'technical');
        $session_user= Session::get('editor');

        $input=Request::all();

        $technical=technicalanalysis::where('id',$id)->get()->first();
        $technical->title=$input['title'];
        $technical->arabic_title=$input['arabic_title'];
        $technical->arabic_details=$input['arabic_details'];
        $technical->details=$input['details'];
        $technical->technicaltype=$input['technicaltype'];
        $technical->technicalstatus=$input['technicalstatus'];
        $technical->image='';
        $technical->save();



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/technical-analysis?page=1&per=10')->with('status-success','Selected technical Has Been Updated');
            }else{
                return redirect('en/epanel/technical-analysis?page=1&per=10')->with('status-success','Selected technical Has Been Updated');
            }



    }





    public function status_technical_analysis($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'technical');
        $session_user= Session::get('editor');

        $input=Request::all();
        $ids = explode(",", $id);
        foreach ($ids as $idd) {
        $technical=technicalanalysis::where('id',$idd)->get()->first();
        if($technical->technicalstatus==1){$technical->technicalstatus=0;}else{$technical->technicalstatus=1;}
        $technical->save();
        }



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/technical-analysis?page=1&per=10')->with('status-success','Selected technical Has Been Updated');
            }else{
                return redirect('en/epanel/technical-analysis?page=1&per=10')->with('status-success','Selected technical Has Been Updated');
            }



    }







            public function fundamental_analysis(Request $request)
            {


                Session::flash('pageType', 'analysis');
                Session::flash('currentPage', 'fundamental-analysis');
                $session_user= Session::get('editor');
                $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
                $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
                $user=website_admins::where('email',$session_user)->get()->first();
                    $posts = fundamentalanalysis::all()->sortByDesc("id");

                    if( Request::segment(1) =='ar'){
                        $title = "لوحة التحكم | التحليل الفنى ";
                        return view('ar.epanel.ar-fundamental-analysis',compact('title','user','notifications_all','notifications_unseen','posts'));
                    }else{
                      $title = "JMI Brokers | Fundamental Analysis";
                      $description="Use JMI Brokers FREE & Daily rich fundamental analysis and Economic Calendar of stocks, forex, and investing to assess intrinsic value of a security";
                      $keywords="Fundamental analysis, fundamental analysis of stocks, fundamental investing, fundamental analysis forex";
                      return view('epanel.fundamental-analysis',compact('title','user','notifications_all','notifications_unseen','posts','description','keywords'));
                    }


            }





    public function delete_fundamental_analysis($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'fundamental');
        $session_user= Session::get('editor');

        $input=Request::all();
        $ids = explode(",", $id);
        foreach ($ids as $idd) {
        $fundamental=fundamentalanalysis::where('id',$idd)->get()->first();
        $fundamental->delete();
        }



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/fundamental-analysis?page=1&per=10')->with('status-success','Selected fundamental Has Been Deleted');
            }else{
                return redirect('en/epanel/fundamental-analysis?page=1&per=10')->with('status-success','Selected fundamental Has Been Deleted');
            }



    }






    public function post_fundamental_analysis()
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'fundamental');
        $session_user= Session::get('editor');

        $input=Request::all();

        $fundamental=new fundamentalanalysis;
        $fundamental->title=$input['title'];
        $fundamental->arabic_title=$input['arabic_title'];
        $fundamental->arabic_details=$input['arabic_details'];
        $fundamental->details=$input['details'];
        $fundamental->fundamentalstatus=$input['fundamentalstatus'];

                    if (Request()->hasFile('fundamental_image')) {

                    $destinationPath=public_path().'/assets/post_images/';
                    $filename = rand(1,1000000).time().'.'.$input['fundamental_image']->getClientOriginalExtension();
                    $fundamental->image=URL::to('/assets/post_images/').'/'.$filename;
                    $input['fundamental_image']->move($destinationPath, $filename);

                    }

        $fundamental->save();



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/fundamental-analysis?page=1&per=10')->with('status-success','New fundamental Has Been Created');
            }else{
                return redirect('en/epanel/fundamental-analysis?page=1&per=10')->with('status-success','New fundamental Has Been Created');
            }



    }




    public function update_fundamental_analysis($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'fundamental');
        $session_user= Session::get('editor');

        $input=Request::all();

        $fundamental=fundamentalanalysis::where('id',$id)->get()->first();
        $fundamental->title=$input['title'];
        $fundamental->arabic_title=$input['arabic_title'];
        $fundamental->arabic_details=$input['arabic_details'];
        $fundamental->details=$input['details'];
        $fundamental->fundamentalstatus=$input['fundamentalstatus'];
        $fundamental->save();



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/fundamental-analysis?page=1&per=10')->with('status-success','Selected fundamental Has Been Updated');
            }else{
                return redirect('en/epanel/fundamental-analysis?page=1&per=10')->with('status-success','Selected fundamental Has Been Updated');
            }



    }





    public function status_fundamental_analysis($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'fundamental');
        $session_user= Session::get('editor');

        $input=Request::all();
        $ids = explode(",", $id);
        foreach ($ids as $idd) {
        $fundamental=fundamentalanalysis::where('id',$idd)->get()->first();
        if($fundamental->fundamentalstatus==1){$fundamental->fundamentalstatus=0;}else{$fundamental->fundamentalstatus=1;}
        $fundamental->save();
        }



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/fundamental-analysis?page=1&per=10')->with('status-success','Selected fundamental Has Been Updated');
            }else{
                return redirect('en/epanel/fundamental-analysis?page=1&per=10')->with('status-success','Selected fundamental Has Been Updated');
            }



    }









            public function news(Request $request)
            {


                Session::flash('pageType', 'analysis');
                Session::flash('currentPage', 'news');
                $session_user= Session::get('editor');
                $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
                $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
                $user=website_admins::where('email',$session_user)->get()->first();
                    $posts = news::all()->sortByDesc("id");

                    if( Request::segment(1) =='ar'){
                        $title = "لوحة التحكم | التحليل الفنى ";
                        return view('ar.epanel.ar-news',compact('title','user','notifications_all','notifications_unseen','posts'));
                    }else{
                        $title = "epanel | News";
                        return view('epanel.news',compact('title','user','notifications_all','notifications_unseen','posts'));
                    }


            }





    public function delete_news($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'news');
        $session_user= Session::get('editor');

        $input=Request::all();
        $ids = explode(",", $id);
        foreach ($ids as $idd) {
        $news=news::where('id',$idd)->get()->first();
        $news->delete();
        }



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/news?page=1&per=10')->with('status-success','Selected news Has Been Deleted');
            }else{
                return redirect('en/epanel/news?page=1&per=10')->with('status-success','Selected news Has Been Deleted');
            }



    }






    public function post_news()
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'news');
        $session_user= Session::get('editor');

        $input=Request::all();

        $news=new news;
        $news->title=$input['title'];
        $news->arabic_title=$input['arabic_title'];
        $news->arabic_details=$input['arabic_details'];
        $news->details=$input['details'];
        $news->newstatus=$input['newstatus'];
        $news->newtype='';

                    if (Request()->hasFile('news_image')) {

                    $destinationPath=public_path().'/assets/post_images/';
                    $filename = rand(1,1000000).time().'.'.$input['news_image']->getClientOriginalExtension();
                    $news->image=URL::to('/assets/post_images/').'/'.$filename;
                    $input['news_image']->move($destinationPath, $filename);

                    }

        $news->save();



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/news?page=1&per=10')->with('status-success','New news Has Been Created');
            }else{
                return redirect('en/epanel/news?page=1&per=10')->with('status-success','New news Has Been Created');
            }



    }




    public function update_news($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'news');
        $session_user= Session::get('editor');

        $input=Request::all();

        $news=news::where('id',$id)->get()->first();
        $news->title=$input['title'];
        $news->arabic_title=$input['arabic_title'];
        $news->arabic_details=$input['arabic_details'];
        $news->details=$input['details'];
        $news->newstatus=$input['newstatus'];
        $news->save();



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/news?page=1&per=10')->with('status-success','Selected news Has Been Updated');
            }else{
                return redirect('en/epanel/news?page=1&per=10')->with('status-success','Selected news Has Been Updated');
            }



    }





    public function status_news($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'news');
        $session_user= Session::get('editor');

        $input=Request::all();
        $ids = explode(",", $id);
        foreach ($ids as $idd) {
        $news=news::where('id',$idd)->get()->first();
        if($news->newstatus==1){$news->newstatus=0;}else{$news->newstatus=1;}
        $news->save();
        }



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/news?page=1&per=10')->with('status-success','Selected news Has Been Updated');
            }else{
                return redirect('en/epanel/news?page=1&per=10')->with('status-success','Selected news Has Been Updated');
            }



    }









            public function offers(Request $request)
            {


                Session::flash('pageType', 'analysis');
                Session::flash('currentPage', 'offers');
                $session_user= Session::get('editor');
                $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
                $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
                $user=website_admins::where('email',$session_user)->get()->first();
                    $posts = offers_events::all()->sortByDesc("id");

                    if( Request::segment(1) =='ar'){
                        $title = "لوحة التحكم | التحليل الفنى ";
                        return view('ar.epanel.ar-offers',compact('title','user','notifications_all','notifications_unseen','posts'));
                    }else{
                        $title = "epanel | offers";
                        return view('epanel.offers',compact('title','user','notifications_all','notifications_unseen','posts'));
                    }


            }





    public function delete_offers($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'offers');
        $session_user= Session::get('editor');

        $input=Request::all();
        $ids = explode(",", $id);
        foreach ($ids as $idd) {
        $offers=offers_events::where('id',$idd)->get()->first();
        $offers->delete();
        }



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/offers?page=1&per=10')->with('status-success','Selected offers Has Been Deleted');
            }else{
                return redirect('en/epanel/offers?page=1&per=10')->with('status-success','Selected offers Has Been Deleted');
            }



    }






    public function post_offers()
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'offers');
        $session_user= Session::get('editor');

        $input=Request::all();

        $offers=new offers_events;
        $offers->title=$input['title'];
        $offers->arabic_title=$input['arabic_title'];
        $offers->arabic_details=$input['arabic_details'];
        $offers->details=$input['details'];
        $offers->offerstatus=$input['offerstatus'];
        $offers->offertype=$input['offertype'];

                    if (Request()->hasFile('offers_image')) {

                    $destinationPath=public_path().'/assets/post_images/';
                    $filename = rand(1,1000000).time().'.'.$input['offers_image']->getClientOriginalExtension();
                    $offers->image=URL::to('/assets/post_images/').'/'.$filename;
                    $input['offers_image']->move($destinationPath, $filename);

                    }

        $offers->save();



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/offers?page=1&per=10')->with('status-success','New offers Has Been Created');
            }else{
                return redirect('en/epanel/offers?page=1&per=10')->with('status-success','New offers Has Been Created');
            }



    }




    public function update_offers($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'offers');
        $session_user= Session::get('editor');

        $input=Request::all();

        $offers=offers_events::where('id',$id)->get()->first();
        $offers->title=$input['title'];
        $offers->arabic_title=$input['arabic_title'];
        $offers->arabic_details=$input['arabic_details'];
        $offers->details=$input['details'];
        $offers->offerstatus=$input['offerstatus'];
        $offers->offertype=$input['offertype'];
        $offers->save();



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/offers?page=1&per=10')->with('status-success','Selected offers Has Been Updated');
            }else{
                return redirect('en/epanel/offers?page=1&per=10')->with('status-success','Selected offers Has Been Updated');
            }



    }





    public function status_offers($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'offers');
        $session_user= Session::get('editor');

        $input=Request::all();
        $ids = explode(",", $id);
        foreach ($ids as $idd) {
        $offers=offers_events::where('id',$idd)->get()->first();
        if($offers->offerstatus==1){$offers->offerstatus=0;}else{$offers->offerstatus=1;}
        $offers->save();
        }



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/offers?page=1&per=10')->with('status-success','Selected offers Has Been Updated');
            }else{
                return redirect('en/epanel/offers?page=1&per=10')->with('status-success','Selected offers Has Been Updated');
            }



    }













//gallery replaced with elfinder
        public function gallery(Request $request)
    {

            return view('_image-dialog');

    }


    public function jmigallery(Request $request)
    {


            $input = Request::all();
            $file = $input['imagefile'];
            $filename = 'img'.rand(1,1000000).time().'.'.$input['imagefile']->getClientOriginalExtension();

            if($input['img_path']=='fundamental'){
                $file->move('assets/gallery/fundamental', $filename);
                $file_path = '/assets/gallery/fundamental/'.$filename;

            }elseif($input['img_path']=='technical'){
                $file->move('assets/gallery/technical', $filename);
                $file_path = '/assets/gallery/technical/'.$filename;

            }elseif($input['img_path']=='news'){
                $file->move('assets/gallery/news', $filename);
                $file_path = '/assets/gallery/news/'.$filename;

            }elseif($input['img_path']=='events'){
                $file->move('assets/gallery/events', $filename);
                $file_path = '/assets/gallery/events/'.$filename;

            }elseif($input['img_path']=='general'){
                $file->move('assets/gallery/general', $filename);
                $file_path = '/assets/gallery/general/'.$filename;

            }elseif($input['img_path']=='old'){
                $file->move('assets/gallery', $filename);
                $file_path = '/assets/gallery/'.$filename;
            }


            return view('_image-upload', compact('file_path'));





    }












   public function mailer()
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'mailer');
        $session_user= Session::get('editor');
        $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();
            $mails = maillist::all()->sortByDesc("id");
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | مريكز الايميلات ";
                return view('ar.epanel.mailer',compact('title','user','notifications_all','notifications_unseen','mails'));
            }else{
                $title = "epanel | Mailer";
                return view('epanel.mailer',compact('title','user','notifications_all','notifications_unseen','mails'));
            }


    }




    public function delete_mailer($id)
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'mailer');
        $session_user= Session::get('editor');

        $input=Request::all();
        $ids = explode(",", $id);
        foreach ($ids as $idd) {
        $mail=maillist::where('id',$idd)->get()->first();
        $mail->delete();
        }



            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/mailer')->with('status-success','Selected Mail Has Been Deleted');
            }else{
                return redirect('en/epanel/mailer')->with('status-success','Selected Mail Has Been Deleted');
            }



    }


    public function add_mailer()
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'mailer');
        $session_user= Session::get('editor');

        $input=Request::all();

            $mail = new maillist;
            $mail->mail=$input['mail'];;
            $mail->title=$input['title'];;
            $mail->name=$input['name'];;
            $mail->save();


            if( Request::segment(1) =='ar'){
                return redirect('ar/epanel/mailer')->with('status-success','New Mail Has Been Created');
            }else{
                return redirect('en/epanel/mailer')->with('status-success','New Mail Has Been Created');
            }



    }

    public function export_mailer_all()
    {

        $maillist=maillist::all();
        return Excel::download(new maillistExport(), 'maillist.xlsx');

    }

   public function send_mails()
    {


        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'send-mails');
        $session_user= Session::get('editor');
        $notifications_all=Notifications::where('website_accounts_id',999999999)->orderBy('id','desc')->take(8)->get()->all();
        $notifications_unseen=Notifications::where('website_accounts_id',999999999)->where('notification_status',0)->get()->all();
        $user=website_admins::where('email',$session_user)->get()->first();
            $mails = maillist::all()->sortByDesc("id");
            if( Request::segment(1) =='ar'){
                $title = "لوحة التحكم | أرسال الأيميلات ";
                return view('ar.epanel.send-mails',compact('title','user','notifications_all','notifications_unseen','mails'));
            }else{
                $title = "epanel | Send Mails";
                return view('epanel.send-mails',compact('title','user','notifications_all','notifications_unseen','mails'));
            }


    }




   public function post_send_mails()
    {

        set_time_limit(90000);

        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'send-mails');
        $session_user= Session::get('editor');

        $input=Request::all();

                    // Backup your default mailer
                    $backup = Mail::getSwiftMailer();

            $sendto=$input['sendto'];
            $sendevery=$input['sendevery'];
            $sendtoevery=$input['sendtoevery'];
            $mailtype=$input['mailtype'];
            $maildetails=$input['maildetails'];


            $mailtypearr=["offermail","technicalmail","fundamentalmail","eventmail","newsmail"];
            $mailsubjectarr=["JMI Brokers Offers","JMI Brokers Daily Technical Analysis","JMI Brokers Daily Fundamental Analysis","JMI Brokers Events","JMI Brokers News"];

            if($sendto == 1){

                 $mails= maillist::all()->sortByDesc("id");
            //  return $mails[7]['mail'];
                $mailscount = (maillist::count())-1;
        //      unset($mails[1]);
        //      unset($mails[0]);
        //      return $mails;



                $seconds=1;
                while($mailscount >= 0){
                    $seconds++;
                    $mail = maillist::where('mail',$mails[$mailscount]->mail)->get()->first();


                    $data['title']=$mail['title'];
                    $data['name']=$mail['name'];
                    $data['details']=$maildetails;
                    $subject=$mailsubjectarr[$mailtype];

Mail::to($mails[$mailscount]->mail)->send(new Queued($data,$subject));





                    // Restore your original mailer
                    Mail::setSwiftMailer($backup);



                $seconds++;
                    $mailscount--;
                    //sleep(4);

                }


            }elseif($sendto == 2){
               $mails=$input['maillist'];
                $seconds=1;
            //  return $mails[7]['mail'];
                $mailscount = (count($mails))-1;
        //      unset($mails[1]);
        //      unset($mails[0]);
        //      return $mails;
                while($mailscount >= 0){
                    $seconds++;
                    $mail = maillist::where('mail',$mails[$mailscount])->get()->first();




                    $data['title']=$mail['title'];
                    $data['name']=$mail['name'];
                    $data['details']=$maildetails;
                    $subject=$mailsubjectarr[$mailtype];


Mail::to($mails[$mailscount])->send(new Queued($data,$subject));





                    $seconds++;
                    $mailscount--;
                    //sleep(2);
                }

            }
            return redirect()->back()->with('status-success', 'Sent Mail Successfully');
            //end of super admin panel




    }






   public function post_send_mails________________()
    {

        set_time_limit(90000);

        Session::flash('pageType', 'old-links');
        Session::flash('currentPage', 'send-mails');
        $session_user= Session::get('editor');

        $input=Request::all();


            $sendto=$input['sendto'];
            $mails=$input['maillist'];
            $sendevery=$input['sendevery'];
            $sendtoevery=$input['sendtoevery'];
            $mailtype=$input['mailtype'];
            $maildetails=$input['maildetails'];

            if($sendto == 1){

                $mails= maillist::all()->sortByDesc("id");
            //  return $mails[7]['mail'];
                $mailscount = (maillist::count())-1;
        //      unset($mails[1]);
        //      unset($mails[0]);
        //      return $mails;
                $seconds=1;
                while($mailscount >= 0){
                    $seconds++;
                    $mailtypearr=["offermail","technicalmail","fundamentalmail","eventmail","newsmail"];
                    $mailsubjectarr=["JMI Brokers Offers","JMI Brokers Daily Technical Analysis","JMI Brokers Daily Fundamental Analysis","JMI Brokers Events","JMI Brokers News"];


                    // Backup your default mailer
                    $backup = Mail::getSwiftMailer();

                    // Setup your gmail mailer
                    $transport = Swift_SmtpTransport::newInstance('smtpout.secureserver.net', '80');
                    $transport->setUsername('support@jmibrokers.com');
                    $transport->setPassword('12345678ii');
                    // Any other mailer configuration stuff needed...

                    $gmail = new Swift_Mailer($transport);

                    // Set the mailer as gmail
                    Mail::setSwiftMailer($gmail);




                Mail::queue('editorpanel.mailer.'.$mailtypearr[$mailtype],['title'=>$mails[$mailscount]['title'],'name'=>$mails[$mailscount]['name'],'details' => $maildetails], function($message)use ($mails,$mailscount,$mailsubjectarr,$mailtype){
                    //  $message->from('bishoyadel00@gmail.com','JMI Brokers test msg');
                //  foreach($mails as $mail){
                //      $message->to($mail->mail);
                        $message->to($mails[$mailscount]["mail"]);
                        unset($mails[$mailscount]);
                //  }
                        $message->from('support@jmibrokers.com','JMI Brokers');
                        $message->subject($mailsubjectarr[$mailtype]);
                    //  $message->attachData($username , $email);
                    //  $message->attach('file path');

                });




                    // Restore your original mailer
                    Mail::setSwiftMailer($backup);



                $seconds++;
                    $mailscount--;
                    //sleep(4);

                }


            }elseif($sendto == 2){
            $seconds=1;
            //  return $mails[7]['mail'];
                $mailscount = (count($mails))-1;
        //      unset($mails[1]);
        //      unset($mails[0]);
        //      return $mails;
                while($mailscount >= 0){
                    $seconds++;
                    $mail = maillist::where('mail',$mails[$mailscount])->get()->first();


                    // Backup your default mailer
                    $backup = Mail::getSwiftMailer();

                    // Setup your gmail mailer
                    $transport = Swift_SmtpTransport::newInstance('smtpout.secureserver.net', '80');
                    $transport->setUsername('support@jmibrokers.com');
                    $transport->setPassword('12345678ii');
                    // Any other mailer configuration stuff needed...

                    $gmail = new Swift_Mailer($transport);

                    // Set the mailer as gmail
                    Mail::setSwiftMailer($gmail);



                    $mailtypearr=["offermail","technicalmail","fundamentalmail","eventmail","newsmail"];
                    $mailsubjectarr=["JMI Brokers Offers","JMI Brokers Daily Technical Analysis","JMI Brokers Daily Fundamental Analysis","JMI Brokers Events","JMI Brokers News"];

                Mail::queue('editorpanel.mailer.'.$mailtypearr[$mailtype],['title'=>$mail['title'],'name'=>$mail['name'],'details' => $maildetails], function($message)use ($mails,$mailscount,$mailsubjectarr,$mailtype){
                //  foreach($mails as $mail){
                //      $message->to($mail->mail);
                        $message->to($mails[$mailscount]);
                        unset($mails[$mailscount]);
                //  }
                        $message->from('support@jmibrokers.com','JMI Brokers');
                        $message->subject($mailsubjectarr[$mailtype]);
                    //  $message->attachData($username , $email);
                    //  $message->attach('file path');
                });



                    // Restore your original mailer
                    Mail::setSwiftMailer($backup);




                    $seconds++;
                    $mailscount--;
                    //sleep(2);
                }

            }
            return redirect()->back()->with('Success', 'Sent Mail Successfully');
            //end of super admin panel




    }



























































}
