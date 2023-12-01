@extends('cpanel.layout')
@section('content')

<div class="box box-primary" id="profile-page">
    <div class="box-header">
        <h3 class="box-title"><strong>Copy Trade Receivers</strong></h3>
    </div>

    <div class="box-body">

@if (session('status-success'))
    <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status-success') }}
    </div>
@endif

@if (session('status-error'))
    <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status-error') }}
    </div>
@endif


@if(count($my_receivers)<=0)
    <h4 class="col-sm-push-1"> You Have No Receiver</h4>
@endif

@if(count($api_senders)>0)





<?PHP 
if(isset($_GET['bynumber']) && $_GET['bynumber'] !== ''){
$api_senders1=array();
foreach($api_senders as $acc){
if(strpos($acc->login ,$_GET['bynumber']) !== false){

array_push($api_senders1,$acc);

}
}

}else{
$api_senders1=$api_senders;
}



?>




    <h4 class="col-sm-push-1"> My Receivers</h4>
        <hr />
        <div>






                                <p class="text-center error">{{$errors->first('receiver_login')}}</p>
                                <p class="text-center error">{{$errors->first('sender_login')}}</p>
                                <p class="text-center error">{{$errors->first('volume')}}</p>
                                <p class="text-center error">{{$errors->first('Order_Reverse')}}</p>







<script>



bynumber='<?PHP if(isset($_GET['bynumber'])){echo $_GET['bynumber'];}?>';


selectby='<?PHP if(isset($_GET['bynumber'])){echo 'bynumber';}?>';

$('select#search option[value="'+selectby+'"]').attr('selected','selected');
$('input#search').val(bynumber);

$('span#search').click(function(){
val=$('select#search').val();
search=$('input#search').val();

action = '&'+val+'='+search+'&';
var url='<?PHP echo Request::url(); ?>'+'?';
document.location = url+action;

});
</script>   

            <div class="">

                <br />
                <div class="">          
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Sender</td>
                                <td>Receiver</td>
                                <td>Volume</td>
                                <td>Type</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$n=0; ?>
                                @foreach($my_following as $my_follow)
                                
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $my_follow->sender_login !!}</td>
                                        <td>{!! $my_follow->receiver_login !!}</td>
                                        <td><?PHP if($my_follow->volume_type==0){echo $my_follow->volume;}elseif($my_follow->volume_type==1){echo $my_follow->volume.' %';}?></td>
                                        <td><?PHP if($my_follow->Order_Reverse==1){
                                          echo 'Reverse Orders';
                                        }elseif ($my_follow->Order_Reverse==0) {
                                           echo 'Same Orders';
                                        } ?>
                                          </td>

                                        <td>
{!! Form::open(['url'=>'en/cpanel/follow_sender/'.$my_follow->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <button class="btn btn-success" type="submit" style="">Delete Relation</button>

                                        {!! Form::close() !!}

                                        </td>



                                    </tr>







                                    <?PHP $i++;$n++; ?>
                                @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>



<div class="col-sm-12">
  
              <div id="searchdiv" style="margin:10px 0px 20px;">
                <div class="col-sm-3">
                    <select class="form-control" id="search"  name="search">
                        <option class="form-control" value="bynumber" >Search Account Number</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="search"  name="search" />
                </div>
                <div class="col-sm-3">
                    <span class="btn btn-success icon-search" id="search">Search Sender</span>
                </div>
                   
            </div>
            <br />
 

<h3>All Senders</h3>

<div class="col-sm-12" id="all-senders">





            <div class="">

                <br />
                <div class="">          
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Account</td>
                                <td>Name</td>
                                <td  style="color: #0059b2; font-weight: bold;">Balance</td>
                                <td>Equity</td>
                                <td>History</td>
                                <td  >Action</td>
                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$n=0; ?>
                                @foreach($api_senders1 as $sender)
                                
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $sender->login !!}</td>
                                        <td>{!! $names[$n] !!}</td>
                                        <td  style="color: #0059b2; font-weight: bold;">{!! $balances[$n] !!}</td>
                                        <td>{!! $equities[$n] !!}</td>
                                        <td>
                                        @if($balances[$n] !== '')
                                        <button class="btn btn-success" type="submit"  data-toggle="modal" data-target="#history{!! $sender->login !!}" onclick="ResetHistory()">Show History</button>
                                        @endif
                                        </td>
                                        <td>
                                        <button class="btn btn-success" type="submit" data-toggle="modal" data-target="#follow-sender" onclick="SelectSender({!! $sender->login !!});">Follow</button>
                                        </td>
                                    </tr>







                                    <?PHP $i++;$n++; ?>
                                @endforeach
                        </tbody>
                    </table>

                </div>

                <br />

            </div>




</div>


</div>





<!-- Modal -->
<div id="follow-sender" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:300px">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Follow Sender</h4>
      </div>
      <div class="modal-body">

{!! Form::open(['url'=>'en/cpanel/follow_sender','id'=>'follow-sender'])  !!}


                <div class="control-group">

                   <div class="col-sm-12">

                    <br />
                         <div class="controls">
                              <select   class="form-control " id="select-receiver" name="receiver_login" required>
                                <option disabled="" value="" selected>Select Receiver</option>
                                @foreach($my_receivers as $receiver)
                                    <option value="{!! $receiver->login !!}">{!! $receiver->login !!}</option>
                                @endforeach
                                </select>
                         </div>
                     </div>

                   <div class="col-sm-12">

                    <br />
                         <div class="controls">
                              <select   class="form-control " id="select-sender" name="sender_login" required>
                                <option selected disabled="" value="">Select Sender</option>
                                @foreach($api_senders as $sender)
                                    <option value="{!! $sender->login !!}">{!! $sender->login !!}</option>
                                @endforeach
                                </select>
                         </div>
                     </div>

                    <div class="col-sm-12">

                    <br />
                         <div class="controls">
                              <select   class="form-control " id="select-volume" name="Order_Reverse" required>
                                <option selected="" disabled="" value="">Select Follow Type</option>

                                <option value="0">Same Copy</option>
                                <option value="1">Revese Copy</option>


                                </select>
                         </div>

                   </div>

                    <div class="col-sm-12">

                    <br />
                         <div class="controls">
                              <select   class="form-control " id="select-volume-type" name="volume-type" onchange="VolumeType(this.value);" required>
                                <option selected="" disabled="" value="">Select Volume Type</option>
                                <option value="0">Fixed Volume</option>
                                <option value="1">Percentage Volume</option>


                                </select>
                         </div>

                   </div>

                    <div class="col-sm-12">
                      <span class="status-error hidden" id="volume-percent-msg" style="color:red;">Note: you will follow this sender based on your Percentage but the minimum volume to take is 0.01 so if the percent of following is lower than 0.01 so the order will open with 0.01 volume</span>
                    <br />
                         <div class="controls">
                              <select   class="form-control " id="volume-percent" name="volume-percent" >
                                <option selected="" disabled="" value="">Select Volume Percent</option>
                                <option value="10">10 %</option>
                                <option value="20">20 %</option>
                                <option value="30">30 %</option>
                                <option value="40">40 %</option>
                                <option value="50">50 %</option>
                                <option value="60">60 %</option>
                                <option value="70">70 %</option>
                                <option value="80">80 %</option>
                                <option value="90">90 %</option>
                                <option value="100">100 %</option>
                              </select>

                              <input class="form-control hidden" type="number" id="volume-fixed" step="0.01" min="0.01" max="8" name="volume-fixed" >

                         </div>

                   </div>
                   
                   <div class="col-sm-12">
                    <div class="controls">                       
                    <br />
                            <button type="submit" class="btn btn-success submit" >Start Following</button>

                    </div>
                   </div>
                 </div>



{!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>







@endif

    </div>
</div>




<!--  display  account history -->
 @foreach($account_history as $history2)
<?PHP $history = explode("\r\n",$history2); 

 $stripped = preg_replace('/\s+/', ' ', $history2);

 $history_arrays2= explode(" ",$stripped);
$full_history[]=$history_arrays2;
?>
@endforeach



<?PHP

$array_to_remove=array("from","to","hedge","close","by","Depsit","Demo",'limit','cancelled');
foreach ($full_history as $full_history0 ) {

foreach($full_history0 as $key => $value){

if (strpos($value, '#') !== false) {
  array_push($array_to_remove, $value);
}


}


$history_arrays_new=array_diff($full_history0, $array_to_remove);
$full_history_arr[]=$history_arrays_new;
}

$full_history_arr = array_values($full_history_arr);


?>
<!--  display  account history -->
 @foreach($full_history_arr as $history2)
<?PHP
//$history = explode("\r\n",$history2); 

$history_arrays2 = array_values($history2);




?>
<!-- Modal -->

<div id="history00{!! $history2[0] !!}" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 80% !important">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Account History </h4>
      </div>
      <div class="modal-body">


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

</div>
</div>
</div>
</div>



<div id="history{!! $history2[0] !!}" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 80% !important">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Account History </h4>
      </div>
      <div class="modal-body">
<div >
    <h3>Select Period</h3>

    <div class="input-group input-daterange">
        <input id="startDate1-{!! $history2[0] !!}" name="startDate1-{!! $history2[0] !!}" type="text"
            class="form-control" readonly="readonly"> <span
            class=""> <span
            class="glyphicon glyphicon-calendar"></span>
        </span> <span class="">to</span> <input id="endDate1-{!! $history2[0] !!}"
            name="endDate1-{!! $history2[0] !!}" type="text" class="form-control" readonly="readonly">
        <span class=""> <span
            class="glyphicon glyphicon-calendar"></span>
        </span>
        <span class="btn btn-success " id="{!! $history2[0] !!}"  onclick="showhistory(<?PHP echo $history2[0] ?>);">Show History</span>




<form method="post" action="/en/cpanel/demo-accounts/export-history" class="form">

<input type="hidden"  name="_token" value="{{ csrf_token() }}">

  <input type="text"  name= "account_number"  value="{!! $history[0] !!}" style="display: none;">
  <input type="text"  name= "account_password"  value="" style="display: none;">
  <input type="text"  name= "account_start_time"  value="" style="display: none;">
  <input type="text"  name= "account_end_time"  value="" style="display: none;">
 
<span class="btn btn-success"  id="export-history" style="display: none;" onclick="export_history({!! $history[0] !!})">Export History</span>
</form>



    </div>


</div>
<table class="table table-bordered" cellspacing="1" cellpadding="3" border="0" width="100%" style="font-size:12px; font-family:Tahoma, Arial, Helvetica, sans-serif;">
  <tr >
    <td align="left" style="width:10px;"><b>#</b></td>
    <td><b>Order</b></td>
    <td><b>Time</b></td>
    <td><b>Type</b></td>
    <td><b>Lots</b></td>
    <td><b>Symbol</b></td>
    <td><b>Price</b></td>
    <td><b>S/L</b></td>
    <td><b>T/P</b></td>
    <td><b>Time</b></td>
    <td><b>Price</b></td>
    <td><b>Swap</b></td>
    <td><b>Profit</b></td>
  </tr>
<?PHP if(isset($history2[0])){  if( count($history2) <= 40 ){ ?>

<h4 style="color:red;">No History Available  </h4> 

<?PHP
}else{ $history4_arr = explode(" ",$history2[4]);

$int1=count($history_arrays2)-33;

$int3=18; 
$i=1;

$int00=20;

while($int1 > 0 ){


while($int00 > 0)
{


if(isset($history_arrays2[$int3]) ){

if(preg_match('/^[0-9]{6}$/',$history_arrays2[$int3])){

  }else{
  $int3=$int3+1;
  }

}
  

$int00--;
}



$order=$int3;
$time1=$order+1;
$time11=$order+2;
$type=$order+3;
$lot=$order+4;
$symbol=$order+5;
$price1=$order+6;
$ssll=$order+7;
$ttpp=$order+8;
$time2=$order+9;
$time22=$order+10;
$price2=$order+11;
$swap=$order+13;
$profit=$order+14;

if(isset( $history_arrays2[$time1])){
if (preg_match("/^[0-9]{4}.(0[1-9]|1[0-2]).(0[1-9]|[1-2][0-9]|3[0-1])$/",$history_arrays2[$time1]) && in_array($history_arrays2[$type], ["sell","buy"]) ) {

?>
  <tr class="date-history-func date-<?php if(isset( $history_arrays2[$time1])){echo $history_arrays2[$time1];} ?>"  id="date-<?php if(isset( $history_arrays2[$time1])){echo $history_arrays2[$time1];} ?>" style="display: none;">

    <td><b><?php echo $i ?></b></td>
    <td><b class="order0"><?php if(isset($history_arrays2[$order]) ){echo $history_arrays2[$order];}else{echo 'Empty';} ?></b></td>
    <td><b><?php  if(isset($history_arrays2[$time1]) ){echo $history_arrays2[$time1];}else{echo 'Empty';} ?>
           <?php  if(isset($history_arrays2[$time11])){echo $history_arrays2[$time11];}else{echo 'Empty';} ?></b></td>
    <td><b><?php if(isset($history_arrays2[$type]) ){echo $history_arrays2[$type];}else{echo 'Empty';} ?></b></td>
    <td><b class="lot0"><?php if(isset($history_arrays2[$lot]) ){echo $history_arrays2[$lot];}else{echo 'Empty';} ?></b></td>
    <td><b><?php if(isset($history_arrays2[$symbol]) ){echo $history_arrays2[$symbol];}else{echo 'Empty';} ?></b></td>
    <td><b><?php  if(isset($history_arrays2[$price1]) ){echo $history_arrays2[$price1];}else{echo 'Empty';} ?></b></td>
    <td><b><?php  if(isset($history_arrays2[$ssll]) ){echo $history_arrays2[$ssll];}else{echo 'Empty';} ?></b></td>
    <td><b><?php  if(isset($history_arrays2[$ttpp]) ){echo $history_arrays2[$ttpp];}else{echo 'Empty';} ?></b></td>
    <td><b><?php  if(isset($history_arrays2[$time2]) ){echo $history_arrays2[$time2];}else{echo 'Empty';} ?> 
      <?php  if(isset($history_arrays2[$time22]) ){echo $history_arrays2[$time22];}else{echo 'Empty';} ?></b></td>
    <td><b><?php  if(isset($history_arrays2[$price2]) ){echo $history_arrays2[$price2];}else{echo 'Empty';} ?></b></td>
    <td><b><?php  if(isset($history_arrays2[$swap]) ){echo $history_arrays2[$swap];}else{echo 'Empty';} ?></b></td>
    <td><b class="profit0"><?php  if(isset($history_arrays2[$profit]) ){echo $history_arrays2[$profit];}else{echo 'Empty';} ?></b></td>


  </tr>

<?php
}}
    $i++;
   $int1=$int1-15;
   $int3=$int3+15;
}




 ?>

<h4>High Profit : <span id="HighProfitVal"></span></h4>
<h4>Low Profit : <span id="LowProfitVal"></span></h4>
<h4>Total Orders : <span id="TotalOrders"></span></h4>
<h4>Total Lots : <span id="TotalLots"></span></h4>
<h3 style="color: #0059b2;font-weight: bold;">Total Profit :
<?php
$total_profit=$history_arrays2[(count($history_arrays2)-3)];
 echo $total_profit ?>

  </h3>


<?PHP }} ?>


</table>


<script type="text/javascript">

num_of_orders=$('#history{!! $history2[0] !!} b.order0').length;

var HighProfit=Math.max(parseFloat($('#history{!! $history2[0] !!} b.profit0').text()));
var LowProfit=Math.min(parseFloat($('#history{!! $history2[0] !!} b.profit0').text()));

var TotalLots=0;
$('#history{!! $history2[0] !!} b.lot0').each(function() {
  TotalLots += Number($(this).text()) || 0;
});
$('#history{!! $history2[0] !!} h4 #HighProfitVal').text(HighProfit);
$('#history{!! $history2[0] !!} h4 #LowProfitVal').text(LowProfit);
$('#history{!! $history2[0] !!} h4 #TotalOrders').text(num_of_orders);
$('#history{!! $history2[0] !!} h4 #TotalLots').text(TotalLots);

</script>




{!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

                                @endforeach














    <script type="text/javascript">
        $(document).ready(function() {
             $('.input-daterange').datepicker({
                format: 'yyyy-mm-dd'
              });
        });


var getDateArray = function(start, end) {

    var arr = new Array();
    var dt = new Date(start);

    while (dt <= end) {
        arr.push(new Date(dt));
        dt.setDate(dt.getDate() + 1);
    }



for (var i = 0; i < arr.length; i++) {
    var month = ((arr[i].getMonth() + 1) < 10 ? '0' : '') + (arr[i].getMonth() + 1);
    var year = arr[i].getFullYear();
    var day =(arr[i].getDate() < 10 ? '0' : '') + arr[i].getDate();
    var history_arr=year+'.'+month+'.'+day;
    var history_arr0='date-'+history_arr.toString();
    //alert(history_arr0);
    //$(history_arr0).show();

$('tr.date-history-func').each(function(i, obj) {
    var id=$(this).attr('id');
    if(id==history_arr0){$(this).show();}
});


}

}
   




        function showhistory(account_id)
        {
            var startDate1=new Date($('input#startDate1-'+account_id).val());
            var endDate1=new Date($('input#endDate1-'+account_id).val());
            $('.date-history-func').hide();

            getDateArray(startDate1, endDate1);
        }


        function export_history(account_id)
        {
            var startDate1=new Date($('input#startDate1-'+account_id).val());
            var endDate1=new Date($('input#endDate1-'+account_id).val());

        }


    
function ResetHistory()
{


$('div.input-daterange input.form-control').val('');

           var startDate1='';
            var endDate1='';
            $('.date-history-func').hide();
            getDateArray(startDate1, endDate1);

}


function SelectSender(sender)
{
  $('select#select-sender').val(sender)
}


function confirmDelete() {


var result = confirm("Are you sure you want to unfollow this Sender, You can't undo this?");

if (result){
  var result1 = confirm("You have to close all open orders by yourself, Are you okay?");
if (result1){
          return true;
}else{
          return false;
}

    }else{
        return false;
    }


}



                    function VolumeType(val){
                        if(val==0){

                            $('#volume-percent').addClass('hidden');
                            $('#volume-percent-msg').addClass('hidden');
                            $('#volume-fixed').removeClass('hidden');
                            $('#volume-fixed').attr('required','');
                            $('#volume-percent').removeAttr('required');


                        }else if(val==1){
                            $('#volume-percent').removeClass('hidden');
                            $('#volume-percent-msg').removeClass('hidden');
                            $('#volume-fixed').addClass('hidden');
                            $('#volume-percent').attr('required','');
                            $('#volume-fixed').removeAttr('required');


                        }
                    }



</script>













<!--  end of account history -->




@stop