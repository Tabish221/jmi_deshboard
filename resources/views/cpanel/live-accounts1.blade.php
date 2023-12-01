@extends('cpanel.layout')
@section('content')


<script src="https://www.jmibrokers.com/assets/cpanel/plugins/daterangepicker/daterangepicker.js"></script>
<script src="https://www.jmibrokers.com/assets/cpanel/plugins/datepicker/bootstrap-datepicker.js"></script>


   <div class="col-lg-9 col-md-12 col-sm-12 mainContent live-accounts">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->


@if (session('status-success'))
    <div class="row forexaccount">
        <div class="col-sm-12">
            <h5 style=" color: #0059b2; ">FOREX ACCOUNT</h5>
            <h5> {{ session('status-success') }}</h5>
        </div>
    </div>
    <div class="alert alert-success" style="display:none;">
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


@if(count($accounts)<=0)

    <?PHP if(array_search("/cpanel/live-accounts", array_column($notifications_all, "notification_link")) !== false){ ?>

  <div class="row forexaccount">
        <div class="col-sm-12">
          <h5 style=" color: #0059b2; ">FOREX ACCOUNT</h5>
          <h5> Your account opening request is currently under review</h5>
        </div>
  </div>
  <?PHP }else{ ?>

    <div class="row forexaccount">
          <div class="col-sm-12">
            <h5 style=" color: #0059b2; ">FOREX ACCOUNT</h5>
            <h5>       You have no live accounts</h5>
          </div>
    </div>

  <?PHP } ?>

@endif

@if(count($accounts)>0)

<?PHP  $request_i=0; $request_accept_i=0;  $request_denied_i=0;
 foreach($notifications_all as $notification00){
  if(strpos($notification00, 'Opening account request processed successfully') !== false){
    $request_i++;
  }
  if(strpos($notification00, 'Live Account') !== false && strpos($notification00, 'Has Been Opened Successfully') !== false){
    $request_accept_i++;
  }
  // if(strpos($notification00, 'Opening account request processed successfully') !== false){
  //   $request_denied_i++;
  // }

}
if($request_i > ($request_accept_i+$request_denied_i)){ ?>

  <div class="row forexaccount">
        <div class="col-sm-12">
          <h5 style=" color: #0059b2; ">FOREX ACCOUNT</h5>
          <h5> Your account opening request is currently under review</h5>
        </div>
  </div>
  <?PHP } ?>

<?PHP
if(isset($_GET['bynumber']) && !empty($_GET['bynumber']) ){
$accounts1=array();
foreach($accounts as $acc){
if(strpos($acc->account_id ,$_GET['bynumber']) !== false){

array_push($accounts1,$acc);
}
}

}else{
$accounts1=$accounts;
}


$accounts=$accounts1;

?>



    <h4 class="col-sm-push-1"> Live Accounts</h4>
        <hr />
        <div>
            <div id="searchdiv">
                <div class="col-sm-3">
                    <select class="form-control" id="search"  name="search">
                        <option class="form-control" value="bynumber" >Account Number</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="search"  name="search" />
                </div>
                <div class="col-sm-3">
                    <span class="btn btn-success icon-search" id="search">Search</span>
                </div>
            </div>

<br />

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
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Account</td>
                                <td>Server</td>
                                <td>Type</td>
                                <td>Group</td>
                                <td>Currency</td>
                                <td>Leverage</td>
                                <td>Password</td>
                                <td>Investor</td>
                                <td>Name</td>
                                <td  style="color: #0059b2; font-weight: bold;min-width: 90px;">Balance</td>

                                <td>History</td>
                                <td  style="color: #0059b2; font-weight: bold;min-width: 90px;">Equity</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$n=0;  ?>
                                @foreach($accounts as $account)

                                    <tr class="tr_details">
                                        <td>{!! $i !!}</td>
                                        <td class="account_id_list" id="account_{!! $account->account_id !!}">{!! $account->account_id !!}</td>
                                        <td id="total_volume" style="display:none;" >0</td>
                                        <td>JMI-Server</td>
                                        <td>@if($account->account_type ==1) Individual Account @endif @if($account->account_type ==2) IB Account @endif</td>
                                        <td>
                                            @if($account->account_group ==3) Variable Spread Account @endif
                                            @if($account->account_group ==1) Fixed Spread Account @endif
                                            @if($account->account_group ==4)  Bonus Account @endif
                                            @if($account->account_group ==5) Scalping Account @endif
                                        </td>
                                        <td>USD</td>
                                        <td>1:{!! $account->leverage !!}</td>
                                        <td>{!! $account->password !!}</td>
                                        <td>{!! $account->investor_password !!}</td>
                                        <td>{!! $names[$n] !!}</td>
                                        <td  style="color: #0059b2; font-weight: bold;">${!! $balances[$n] !!}</td>
                                        <td >
                                            @if($balances[$n] !== '')
                                            <button class="btn btn-success" data-toggle="modal" data-target="#history{!! $account->account_id !!}"  onclick="ResetHistory()">Show</button></a>
                                            @endif
                                        </td>


                                        <td  style="color: #0059b2; font-weight: bold;">${!! $equities[$n] !!}</td>

                                        <td class='action'>
                                        @if($account->status ==0)
                                        {!! Form::open(['url'=>'en/cpanel/demo-accounts/'.$account->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <button class="btn btn-success" type="submit" style=" width: 145px; ">Delete Account</button>
                                        {!! Form::close() !!}

                                        <button class="btn btn-success" data-toggle="modal" data-target="#update{!! $account->id !!}" type="submit" style=" width: 145px; ">Change Password</button>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#edit{!! $account->id !!}" type="submit" style=" width: 145px; ">Edit Account</button>

                                        @endif

                                        @if($account->status ==5)
                                        <button class="btn btn-success" style=" width: 145px; " >Delete Pending</button>
                                        @endif

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
@endif

    </div>
</div>



<!-- Modal change password -->


@foreach($accounts as $account)


<div id="update{!! $account->id !!}" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:300px">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">



                <div class="row">
                  {!! Form::open(['url'=>'en/cpanel/demo-accounts/'.$account->id,'id'=>'changepassword'])  !!}

                    <div class="col-sm-12">
                    <br />
                         <div class="controls">
                            <label>Old Real Password</label>
                              <input  type="text" class="form-control " placeholder=" Old Real Password" value="{!! $account->password !!}"  id="old_password" name="old_password" required>
                         </div>
                   </div>

                    <div class="col-sm-12">
                    <br />
                         <div class="controls">
                            <label>New Real Password</label>
                              <input  type="text" class="form-control " placeholder=" New Real Password" value="{!! $account->password !!}"  id="password" name="password" required>
                         </div>
                   </div>

                   <div class="col-sm-12">
                    <div class="controls">
                        <label>New Investor Password</label>
                        <input  type="text" class="form-control  " placeholder="New Investor Password" value="{!! $account->investor_password !!}" id="investor_password" name="investor_password" required>
                        <br />

                            <button type="submit" class="btn btn-success submit" >Update Password</button>

                    </div>
                   </div>

                   {!! Form::close() !!}

                 </div>
               </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="edit{!! $account->id !!}" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:300px">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Account</h4>
      </div>
      <div class="modal-body">

{!! Form::open(['url'=>'en/cpanel/demo-accounts/edit/'.$account->id,'id'=>'changepassword'])  !!}


                <div class="row">

                    <div class="col-sm-12">
                    <br />
                    <input type="hidden" name="account_login" value="{!! $account->account_id !!}" />
                         <div class="controls">
                            <label>Account Type</label>
                            <select class="form-control" name="account_type" id="account_type"  onchange="LiveType(this.value)"  >
                                <option value="1" @if($account->account_type==1) selected @endif>Individual</option>
                                <option value="2" @if($account->account_type==2) selected @endif>IB</option>


                            </select>
                         </div>
                   </div>

                   <div class="col-sm-12">
                    <div class="controls">
                        <label>Account Group</label>
                            <select class="form-control" name="account_group" id="account_group"   onchange="Group(this.value);"  required >

                                <option value="3" class="forlive" @if($account->account_group==3) selected @endif  >Variable Spread Account</option>
                                <option value="5" class="forlive" @if($account->account_group==5) selected @endif>Scalping Account</option>
                                <option value="1" class="forlive" @if($account->account_group==1) selected @endif>Fixed Spread Account</option>
                                <option value="4" class="forlive" @if($account->account_group==4) selected @endif > Bonus Account</option>

                            </select>


                    </div>
                   </div>
                    <div class="col-sm-12">
                         <div class="controls">
                            <label>Account Leverage</label>
                            <select class="form-control" name="leverage" id="leverage"  onchange="Leverage(this.value);"  required >
                                <option value="1"@if($account->leverage==1) selected @endif>1:1</option>
                                <option value="5"@if($account->leverage==5) selected @endif>1:5</option>
                                <option value="10"@if($account->leverage==10) selected @endif>1:10</option>
                                <option value="25"@if($account->leverage==25) selected @endif>1:25</option>
                                <option value="50"@if($account->leverage==50) selected @endif>1:50</option>
                                <option value="100"@if($account->leverage==100) selected @endif>1:100</option>
                                <option value="200"@if($account->leverage==200) selected @endif>1:200</option>
                                <option value="300"  @if($account->leverage==300) selected @endif>1:300</option>
                                <option value="400"  @if($account->leverage==400) selected @endif>1:400</option>
                                <option value="500"  @if($account->leverage==500) selected @endif>1:500</option>

                            </select>
                             </div>
                   </div>
                                           <br />

                            <button type="submit" class="btn btn-success submit" >Update Account</button>


                 </div>



{!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


@endforeach

<!-- Modal change password -->





<!--  display  account history -->

@if(count($accounts)>0)


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




<div id="history{!! $history2[0] !!}" class="modal fade history" role="dialog">
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
            class="form-control" readonly="readonly" style=" width: auto; float: none; "> <span
            class=""> <span
            class="glyphicon glyphicon-calendar"></span>
        </span> <span class="">to</span> <input id="endDate1-{!! $history2[0] !!}"
            name="endDate1-{!! $history2[0] !!}" type="text" class="form-control" readonly="readonly" style=" width: auto; float: none; ">
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
<table class="table table-bordered" cellspacing="1" cellpadding="3" border="0" width="100%" style="font-size:12px;    margin: 10px 0px; font-family:Tahoma, Arial, Helvetica, sans-serif;">
  <tr >
    <td align="left" style="width:10px;">#</td>
    <td>Order</td>
    <td>Time</td>
    <td>Type</td>
    <td>Lots</td>
    <td>Symbol</td>
    <td>Price</td>
    <td>S/L</td>
    <td>T/P</td>
    <td>Time</td>
    <td>Price</td>
    <td>Swap</td>
    <td>Profit</td>
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

//if(strpos($history_arrays2[$int3],"buy")>0){};

//for ($int3=18; $history_arrays2[$int3] < 100000 ; $int3++) {
  // code...
//}

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



?>


  <tr class="date-history-func date-<?php if(isset( $history_arrays2[$time1])){echo $history_arrays2[$time1];} ?>"  id="date-<?php if(isset( $history_arrays2[$time1])){echo $history_arrays2[$time1];} ?>" style="display: none;">

    <td><?php echo $i ?></td>
    <td ><?php if(isset($history_arrays2[$order]) ){echo $history_arrays2[$order];}else{echo 'Empty';} ?></td>
    <td><?php  if(isset($history_arrays2[$time1]) ){echo $history_arrays2[$time1];}else{echo 'Empty';} ?>
           <?php  if(isset($history_arrays2[$time11])){echo $history_arrays2[$time11];}else{echo 'Empty';} ?></td>
    <td class="type_list"><?php if(isset($history_arrays2[$type]) ){echo $history_arrays2[$type];}else{echo 'Empty';} ?></td>
    <td class="volume_list"><?php if(isset($history_arrays2[$lot]) ){echo $history_arrays2[$lot];}else{echo 'Empty';} ?></td>
    <td><?php if(isset($history_arrays2[$symbol]) ){echo $history_arrays2[$symbol];}else{echo 'Empty';} ?></td>
    <td><?php  if(isset($history_arrays2[$price1]) ){echo $history_arrays2[$price1];}else{echo 'Empty';} ?></td>
    <td><?php  if(isset($history_arrays2[$ssll]) ){echo $history_arrays2[$ssll];}else{echo 'Empty';} ?></td>
    <td><?php  if(isset($history_arrays2[$ttpp]) ){echo $history_arrays2[$ttpp];}else{echo 'Empty';} ?></td>
    <td><?php  if(isset($history_arrays2[$time2]) ){echo $history_arrays2[$time2];}else{echo 'Empty';} ?>
      <?php  if(isset($history_arrays2[$time22]) ){echo $history_arrays2[$time22];}else{echo 'Empty';} ?></td>
    <td><?php  if(isset($history_arrays2[$price2]) ){echo ' $'.$history_arrays2[$price2];}else{echo 'Empty';} ?></td>
    <td><?php  if(isset($history_arrays2[$swap]) ){echo $history_arrays2[$swap];}else{echo 'Empty';} ?></td>
    <td><?php  if(isset($history_arrays2[$profit]) ){echo '$'.$history_arrays2[$profit];}else{echo 'Empty';} ?></td>

  </tr>



<?php
    $i++;
   $int1=$int1-15;
   $int3=$int3+15;
}

 ?>



<?PHP }} ?>


</table>

<h3 >Total Profit :


<?php
if(isset($history_arrays2[(count($history_arrays2)-3)])){
$total_profit=$history_arrays2[(count($history_arrays2)-3)];
//$total_profit=count($history_arrays2);

 echo ' $'.$total_profit;
}else{
  echo "Tottal Error";
}?>
  </h3>





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


var result = confirm("Are you sure that you want to delete this account? You can't undo this!");


if (result){
          return true;
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




<script>
function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function count_all_volume(){
$('table tbody tr.tr_details').each(function(){

  var account_id_list=$(this).find('td.account_id_list').text();
  $('div#history'+account_id_list).each(function(){

  $(this).find('table tbody tr.date-history-func').each(function(){
    variable00 = $(this).find('td.volume_list').text();
    type = $(this).find('td.type_list').text();
  //  alert(type);
  document.cookie = "order_type="+type;
  document.cookie = "volume_cookie="+variable00;
  if(getCookie('order_type') == 'buy' || getCookie('order_type') == 'sell'){
    $('table tbody tr.tr_details td#account_'+account_id_list+':first').next('td#total_volume').text(parseFloat($('table tbody tr.tr_details td#account_'+account_id_list+':first').next('td#total_volume').text())+parseFloat(getCookie('volume_cookie')));
    //$('table tbody tr.tr_details td#account_'+account_id_list+':first').next('td#total_volume').text($('table tbody tr.tr_details td#account_'+account_id_list+':first').next('td#total_volume').text()+' '+getCookie('volume_cookie'));
  }
  });


});

});
}
setTimeout(count_all_volume, 5000);
</script>




@endif



<!--  end of account history -->





       <!--End content-->
            </div>
        </div>

    </div>

@stop
