<?php
namespace App\Http\Controllers;
use App\Models\maillist;
use App\Mail\Queued;
use Swift_Mailer;
use Swift_SmtpTransport;
use Mail;
use Illuminate\Http\Request;

class PayCLYController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fady = "";
        return view("ar.paycly", compact('fady'));
    }


    function _ip( )
    {
        if (preg_match( "/^([d]{1,3}).([d]{1,3}).([d]{1,3}).([d]{1,3})$/", getenv('HTTP_X_FORWARDED_FOR')))
        {
            return getenv('HTTP_X_FORWARDED_FOR');
        }
        return getenv('REMOTE_ADDR');
    }



    public function submit(Request $request)
    {
        $gateway_url="https://portal.online-epayment.com/directapi.do";
            
        $protocol = isset($_SERVER["HTTPS"])?'https://':'http://';
        $referer=$protocol.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/en/cpanel/home';
        $curlPost=array();
        $curlPost["api_token"] = "MjUzNV8zMTI3XzIwMjMwNjI4MDQyOTM5";    // Website API Token 
        $curlPost["website_id"] = "3127";        // Website Id 
        $curlPost["cardsend"]="curl";
        $curlPost["client_ip"]=$this->_ip();
        $curlPost["action"]="product";
        $curlPost["source"]="Curl-Direct-Card-Payment";
        $curlPost["source_url"]=$referer;
        $curlPost["product_name"]="dummy data";
        $curlPost["bill_street_1"]="dummy data";
        $curlPost["bill_street_2"]="dummy data";
        $curlPost["bill_city"]="dummy data";
        $curlPost["bill_state"]="dummy data";
        $curlPost["bill_zip"]="dummy data";
        $curlPost["bill_phone"]="dummy data";
        $curlPost["id_order"]=time().'-'.mt_rand();
        $curlPost["success_url"]=$protocol.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']."/ar/success_pay";
        $curlPost["error_url"]=$protocol.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']."/ar/error_pay";
        // form inputs
        $curlPost["fullname"]=$request->un; // form   Test Full Name
        $curlPost["email"]=$request->em; // form  test.3828@test.com
        $curlPost["bill_country"]=$request->country;  // form  SG
        $curlPost["curr"]=$request->Currency; // form USD
        $curlPost["price"]=$request->price; // form  30.00
        $curlPost["ccno"]=$request->cn; // form  4242424242424242
        $curlPost["ccvv"]=$request->cvv; // form 123
        $curlPost["month"]=$request->mo; // form 01
        $curlPost["year"]=$request->yr; // form 30
        $curlPost["notes"]=$request->note; // form Remark for transaction  ////////////// optional
       
        if (!preg_match("/\d+(?:\.\d{1,2})?/",$request->price)) {
            $error_message = "Price should be of number only no characters";
            $error_code  = "400";
            return view("epanel.error_pay", compact(['error_message', 'error_code'])); exit;
        }
        if (!preg_match("/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/",$request->em)) {
            $error_message = "Enter Valid Email";
            $error_code  = "400";
            return view("epanel.error_pay", compact(['error_message', 'error_code'])); exit;
        }
        if (strlen($curlPost["ccno"]) != 16){
            $error_message = "Enter Valid Credit Card Number of 16 digits !";
            $error_code  = "400";
            return view("epanel.error_pay", compact(['error_message', 'error_code'])); exit;
        }
        $curl_cookie="";
        $curl = curl_init(); 
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl, CURLOPT_URL, $gateway_url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($curl, CURLOPT_REFERER, $referer);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);

        $results = json_decode($response,true);
        
        if((isset($results["Error"]) && ($results["Error"]))||(isset($results["error"]) && ($results["error"]))){
            $error_message = $results["Message"];
            $error_code  = $results["Error"];
            return view("epanel.error_pay", compact(['error_message', 'error_code'])); exit;
        }else{
            $authurl="https://portal.online-epayment.com/authurl.do?api_token=".$curlPost["api_token"]."&id_order=".$curlPost["id_order"];

        
            $status_nm = (int)($results["status_nm"]);

            $sub_query = http_build_query($results);

            if($status_nm==1 || $status_nm==9){ // 1:Approved/Success,9:Test Transaction
                $redirecturl = $curlPost["success_url"];
                if(strpos($redirecturl,'?')!==false){
                    $redirecturl = $redirecturl."&".$sub_query;
                }else{
                    $redirecturl = $redirecturl."?".$sub_query;
                }


                $email = $request->em;
                $activationcode = random_int(100000, 999999);
                $price = $curlPost["price"];
                $currency = $curlPost["curr"];
                $cnn = (string)$curlPost["ccno"];
                $cn = "**** **** ****".substr($cnn, 12, 15);
                Mail::send('mails.epayEmailInfo',['email' => $email, 'price' => $price, 'currency' => $currency, 'cn' => $cn], function($message)use ($email, $price, $currency, $cn){
                    $message->to($email);
                    $message->from('support@jmibrokers.com','JMI Brokers');
                    $message->subject('Confirm Your Transaction');
                });

                Mail::send('mails.epayEmailInfo',['email' => $email, 'price' => $price, 'currency' => $currency, 'cn' => $cn], function($message)use ($email, $price, $currency, $cn){
                    $message->to('finance@jmibrokers.com');
                    $message->from('support@jmibrokers.com','JMI Brokers');
                    $message->subject('Client Transaction');
                });
                
                header("Location:$redirecturl");exit;
            }elseif($status_nm==2||$status_nm==22||$status_nm==23){  // 2:Declined/Failed, 22:Expired, 23:Cancelled
                $redirecturl = $curlPost["error_url"];
                if(strpos($redirecturl,'?')!==false){
                    $redirecturl = $redirecturl."&".$sub_query;
                }else{
                    $redirecturl = $redirecturl."?".$sub_query;
                }
                header("Location:$redirecturl");exit;
            }else{ // Pending

                $redirecturl = $referer;
                if(strpos($redirecturl,'?')!==false){
                    $redirecturl = $redirecturl."&".$sub_query;
                }else{
                    $redirecturl = $redirecturl."?".$sub_query;
                }
                header("Location:$redirecturl");exit;
                
                
            }
        }

    
    }


    


}
