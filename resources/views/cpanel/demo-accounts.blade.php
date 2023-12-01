@extends('cpanel.layout')
@section('content')


<script src="https://www.jmibrokers.com/assets/cpanel/plugins/daterangepicker/daterangepicker.js"></script>
<script src="https://www.jmibrokers.com/assets/cpanel/plugins/datepicker/bootstrap-datepicker.js"></script>

    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->


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


@if(count($accounts)<=0)
    <h4 class="col-sm-push-1"> You Have No Demo Accounts</h4>
@endif
@if(count($accounts)>0)





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




    <h4 class="col-sm-push-1"> Demo Accounts</h4>
        <hr />
        <div>



            <div id="searchdiv">
            <div class="col-sm-3">
            <select class="form-control" id="search"  name="search">
            <option class="form-control" value="bynumber" >Search Account Number</option>

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
                                <td>Group</td>
                                <td>Currency</td>
                                <td>Leverage</td>
                                <td>Password</td>
                                <td>Investor</td>
                                <td>Name</td>
                                <td  style="color: #0059b2; font-weight: bold;">Balance</td>
                                <td>Equity</td>
                                <td>History</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$n=0; ?>
                                @foreach($accounts as $account)

                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $account->account_id !!}</td>
                                        <td>JMI-Demo</td>
                                        <td>@if($account->account_group ==1) Variable Account @endif @if($account->account_group ==2) Fixed Account @endif</td>
                                        <td>USD</td>
                                        <td>1:{!! $account->leverage !!}</td>
                                        <td>{!! $account->password !!}</td>
                                        <td>{!! $account->investor_password !!}</td>
                                        <td>{!! $names[$n] !!}</td>
                                        <td  style="color: #0059b2; font-weight: bold;">{!! $balances[$n] !!}</td>
                                        <td>{!! $equities[$n] !!}</td>
                                        <td>
                                            @if($balances[$n] !== '')
                                            <button class="btn btn-success" data-toggle="modal" data-target="#history{!! $account->account_id !!}" >Show</button></a>
                                            @endif
                                        </td>
                                        <td>
                                        @if($account->status ==0)
                                        {!! Form::open(['url'=>'en/cpanel/demo-accounts/'.$account->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <button class="btn btn-success" type="submit" >Delete</button>
                                        {!! Form::close() !!}



                                        @endif

                                        @if($account->status ==5)
                                        <button class="btn btn-success"  >Delete Pending</button>
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


 @foreach($full_history_arr as $history2)
<?PHP
//$history = explode("\r\n",$history2);

$history_arrays2 = array_values($history2);




?>




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



?>


  <tr class="date-history-func date-<?php if(isset( $history_arrays2[$time1])){echo $history_arrays2[$time1];} ?>"  id="date-<?php if(isset( $history_arrays2[$time1])){echo $history_arrays2[$time1];} ?>" style="display: none;">

    <td><b><?php echo $i ?></b></td>
    <td><b><?php if(isset($history_arrays2[$order]) ){echo $history_arrays2[$order];}else{echo 'Empty';} ?></b></td>
    <td><b><?php  if(isset($history_arrays2[$time1]) ){echo $history_arrays2[$time1];}else{echo 'Empty';} ?>
           <?php  if(isset($history_arrays2[$time11])){echo $history_arrays2[$time11];}else{echo 'Empty';} ?></b></td>
    <td><b><?php if(isset($history_arrays2[$type]) ){echo $history_arrays2[$type];}else{echo 'Empty';} ?></b></td>
    <td><b><?php if(isset($history_arrays2[$lot]) ){echo $history_arrays2[$lot];}else{echo 'Empty';} ?></b></td>
    <td><b><?php if(isset($history_arrays2[$symbol]) ){echo $history_arrays2[$symbol];}else{echo 'Empty';} ?></b></td>
    <td><b><?php  if(isset($history_arrays2[$price1]) ){echo $history_arrays2[$price1];}else{echo 'Empty';} ?></b></td>
    <td><b><?php  if(isset($history_arrays2[$ssll]) ){echo $history_arrays2[$ssll];}else{echo 'Empty';} ?></b></td>
    <td><b><?php  if(isset($history_arrays2[$ttpp]) ){echo $history_arrays2[$ttpp];}else{echo 'Empty';} ?></b></td>
    <td><b><?php  if(isset($history_arrays2[$time2]) ){echo $history_arrays2[$time2];}else{echo 'Empty';} ?>
      <?php  if(isset($history_arrays2[$time22]) ){echo $history_arrays2[$time22];}else{echo 'Empty';} ?></b></td>
    <td><b><?php  if(isset($history_arrays2[$price2]) ){echo $history_arrays2[$price2];}else{echo 'Empty';} ?></b></td>
    <td><b><?php  if(isset($history_arrays2[$swap]) ){echo $history_arrays2[$swap];}else{echo 'Empty';} ?></b></td>
    <td><b><?php  if(isset($history_arrays2[$profit]) ){echo $history_arrays2[$profit];}else{echo 'Empty';} ?></b></td>


  </tr>



<?php
    $i++;
   $int1=$int1-15;
   $int3=$int3+15;
}

 ?>



<?PHP }} ?>


</table>

<h3 style="color: #0059b2;font-weight: bold;">Total Profit :













<?php
$total_profit=$history_arrays2[(count($history_arrays2)-3)];
//$total_profit=count($history_arrays2);

 echo $total_profit ?>

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







@endif





<!--  end of account history -->




            <!--End content-->
            </div>
        </div>

    </div>


@stop
