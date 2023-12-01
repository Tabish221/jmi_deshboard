<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Mail;


require '../vendor/autoload.php';
use MarcialPaulG\Coinbase\Checkout;
use MarcialPaulG\Coinbase\Coinbase;
use MarcialPaulG\Coinbase\Exceptions\InvalidRequestException;
use MarcialPaulG\Coinbase\Exceptions\RateLimitExceededException;


class coinbasecontroller extends Controller
{


    public function index(request $request)
    {


    if( $request->segment(1) =='ar'){
        $title="أيداع كوين بيز";
        return view('ar.coinbase',compact('title'));
      }elseif( $request->segment(1) =='ru'){
        $title="Пополнение счета через CoinBase";
        return view('ru.coinbase',compact('title'));
      }else{
         $title="Deposit Via CoinBase";
        return view('coinbase',compact('title'));
      }


   	}



     public function coinbase(Request $request)
  {

      $api_key = '9e47bfc4-929e-4407-adcd-02174e8166aa';
      $throw_exceptions = true;
      $coinbase = new Coinbase($api_key, $throw_exceptions);
//require_once __DIR__ . "/../../../vendor/autoload.php";



                $this->validate(Request(), [
                  'jmiaccountnumber' => 'regex:/^[0-9]*$/|min:1|max:99999999',
                  'ammount' => 'required|regex:/^[0-9]*$/|min:1|max:99999999',

                ]);


      $title='Deposit Via CoinBase ';



//         try {
//
//             $checkout = new Checkout(
//                 name: "The Sovereign Individual",
//                 description: "Mastering the Transition to the Information Age",
//                 pricing_type: "fixed_price",
//                 amount: "100.00",
//                 currency: "USD",
//                 requested_info: ['email', 'name'],
//             );
//
//             $data = $coinbase->request($checkout);
//
//             // OR
//
//             $data = $coinbase->createCheckout(
//                 name: "The Sovereign Individual",
//                 description: "Mastering the Transition to the Information Age",
//                 pricing_type: "fixed_price",
//                 amount: "100.00",
//                 currency: "USD",
//                 requested_info: ['email', 'name'],
//             );
//         } catch (InvalidRequestException | RateLimitExceededException $e) {
//
//             echo $e->getMessage();
//         }
//

  $amount  = $request->input('ammount');
  $fullname  = $request->input('fullname');
    $jmiaccounttype  = $request->input('accounttype');

    if($jmiaccounttype == 0){
        $jmiaccountnumber  = $request->input('jmiaccountnumber');
    }else{
        $jmiaccountnumber  = 'New Account';
    }


             $checkout = new Checkout("JMIBrokers LTD",
                 'Funding Account Number '.$jmiaccountnumber,
                 "fixed_price",
                 $amount,
                 "USD",
                  ['email', 'name']
             );


         try {
             $data = $coinbase->request($checkout);


             Mail::send('mails.coinbasemail',['fullname' => $fullname,'jmiaccounttype' => $jmiaccounttype,'jmiaccountnumber' => $jmiaccountnumber,'ammount' => $amount,'transactionid' => $newCheckoutObj->id], function($message){
                 $message->to('support@jmibrokers.com')->cc('support@jmibrokers.com');
                 $message->from('info@jmibrokers.com','JMI Brokers');
                 $message->subject('New CoinBase Deposit');

             });


             $url='https://commerce.coinbase.com/checkout/'.$data->id;

//echo "<script>window.open('".$url."', '_blank')</script>";return 1;

             //$eventObj = Event::retrieve($newCheckoutObj->id);

             return response()->json([
                 'url' => 'https://commerce.coinbase.com/checkout/'.$data->id
             ], 200);

         } catch (\Exception $exception) {
             return response()->json([
                 'error' => 'unable to create checkout. Error: '.$exception->getMessage()
             ], 201);

         }



//$newCheckoutObj = new Checkout();
//
//$newCheckoutObj->name = 'JMIBrokers LTD';
//$newCheckoutObj->description = 'Funding Account Number '.$jmiaccountnumber;
//$newCheckoutObj->pricing_type = 'fixed_price';
//$newCheckoutObj->redirect_url = 'http://jmisecurities.com/en/cpanel/deposit-fund/coinbase';
//$newCheckoutObj->cancel_url = 'http://jmisecurities.com/en/cpanel/deposit-fund/coinbase';
//$newCheckoutObj->local_price = [
//    'amount' => $amount,
//    'currency' => 'USD'
//];
//$newCheckoutObj->requested_info = ['name', 'email'];
//
// $newCheckoutObj->save();





try {
    $newCheckoutObj->save();


        Mail::send('mails.coinbasemail',['fullname' => $fullname,'jmiaccounttype' => $jmiaccounttype,'jmiaccountnumber' => $jmiaccountnumber,'ammount' => $amount,'transactionid' => $newCheckoutObj->id], function($message){
            $message->to('support@jmibrokers.com')->cc('support@jmibrokers.com');
            $message->from('info@jmibrokers.com','JMI Brokers');
            $message->subject('New CoinBase Deposit');

        });


    $url='https://commerce.coinbase.com/checkout/'.$newCheckoutObj->id;

//echo "<script>window.open('".$url."', '_blank')</script>";return 1;

    //$eventObj = Event::retrieve($newCheckoutObj->id);

    return response()->json([
        'url' => 'https://commerce.coinbase.com/checkout/'.$newCheckoutObj->id
    ], 200);

} catch (\Exception $exception) {
    return response()->json([
        'error' => 'unable to create checkout. Error: '.$exception->getMessage()
    ], 201);

}



            }






}
