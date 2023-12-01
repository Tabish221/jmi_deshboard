@extends('cpanel.layout')
@section('content')


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


@if(count($my_senders)<=0)
    <h4 class="col-sm-push-1"> You Have No Sender</h4>
@endif




                <div class="col-sm-12" style=" margin: 20px 0px; ">
                    <span class="btn btn-warning icon-search" id="new_sender" data-toggle="modal" data-target="#new-sender">Add New Sender</span>
                </div>    





<!-- Modal -->
<div id="new-sender" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:300px">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Sender</h4>
      </div>
      <div class="modal-body">

{!! Form::open(['url'=>'en/cpanel/copy_senders/new','id'=>'new-sender'])  !!}


                <div class="control-group">

                    <div class="col-sm-12">
                         <div class="controls">
                              <input  type="number" class="form-control " placeholder=" Sender Account Number"  id="account_number" name="account_number" required>
                         </div>
                   </div>
                                    
                    <div class="col-sm-12">
                    <br />
                         <div class="controls">
                              <input  type="text" class="form-control " placeholder="Sender Account Password"  id="account_password" name="account_password" required>
                         </div>
                   </div>
                   
                   <div class="col-sm-12">
                    <div class="controls">
                        <h5>Note: The password the real password not the investor password</h5>
                       

                            <button type="submit" class="btn btn-success submit" >Save Sender</button>

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



@if(count($my_senders)>0)





<?PHP 
if(isset($_GET['bynumber']) && $_GET['bynumber'] !== ''){
$my_senders1=array();
foreach($my_senders as $acc){
if(strpos($acc->login ,$_GET['bynumber']) !== false){

array_push($my_senders1,$acc);

}
}

}else{
$my_senders1=$my_senders;
}



?>




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




            <div class="col-sm-12">
                
                                <p class="text-center error" style="color:red;">{{$errors->first('account_number')}}</p>
                                <p class="text-center error"  style="color:red;">{{$errors->first('account_password')}}</p>
            </div>



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
                                <td>Account</td>
                                <td>Password</td>
                                <td>Name</td>
                                <td  style="color: #0059b2; font-weight: bold;">Balance</td>
                                <td>Equity</td>
                                <td  style="display: none;" >History</td>
                                <td>Status</td>
                                <td>Action</td>

                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$n=0; ?>
                                @foreach($my_senders1 as $my_sender)
                                
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $my_sender->login !!}</td>
                                        <td>{!! $my_sender->password !!}</td>
                                        <td>{!! $names[$n] !!}</td>
                                        <td  style="color: #0059b2; font-weight: bold;">{!! $balances[$n] !!}</td>
                                        <td>{!! $equities[$n] !!}</td>

                                        <td style=" <?PHP if($my_sender->IsValid == 1){echo "background: green; color: #fff; font-weight:bold;font-size: 20px;";}else{echo "background: red; color: #fff; font-weight:bold;font-size: 20px;";} ?> " >
                                            <?PHP if($my_sender->IsValid == 0){
                                                echo'Stopped: Invalid Account';
                                            }else{echo 'Working';}?>
                                        </td>
                                            <td>


                                            <?PHP if($my_sender->IsValid == 0){ ?>

                                        <span class="btn btn-success" type="submit" style="" data-toggle="modal" data-target="#update-sender{!! $my_sender->login !!}" >Update Password</span>


<!-- Modal -->
<div id="update-sender{!! $my_sender->login !!}" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:300px">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Password</h4>
      </div>
      <div class="modal-body">

{!! Form::open(['url'=>'en/cpanel/copy_senders/update_password','id'=>'update-sender'])  !!}


                <div class="control-group">

                                    
                    <div class="col-sm-12">
                    <br />
                         <div class="controls">
                              <input  type="hidden" class="form-control " id="account_number" name="account_number" value="{!! $my_sender->login !!}" required>
                              <input  type="text" class="form-control " placeholder="New Password"  id="account_password" name="account_password" required>
                         </div>
                   </div>

                   
                   <div class="col-sm-12">
                    <div class="controls">
                        <h5>Note: The password the real password not the investor password</h5>
                       

                            <button type="submit" class="btn btn-success submit" >Update Password</button>

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


                                           <?PHP } ?>


 {!! Form::open(['url'=>'en/cpanel/copy_senders/'.$my_sender->login,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <button class="btn btn-success" type="submit" style="">Delete Sender</button>
                                        
                                        {!! Form::close() !!}

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
 @foreach($account_history as $history2)
<?PHP $history = explode("\r\n",$history2);
$stripped = preg_replace('/\s+/', ' ', $history2);

 $history_arrays2= explode(" ",$stripped);

 ?>
<!-- Modal -->
<div id="history{!! $history[0] !!}" class="modal fade" role="dialog">
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
        <input id="startDate1-{!! $history[0] !!}" name="startDate1-{!! $history[0] !!}" type="text"
            class="form-control" readonly="readonly"> <span
            class=""> <span
            class="glyphicon glyphicon-calendar"></span>
        </span> <span class="">to</span> <input id="endDate1-{!! $history[0] !!}"
            name="endDate1-{!! $history[0] !!}" type="text" class="form-control" readonly="readonly">
        <span class=""> <span
            class="glyphicon glyphicon-calendar"></span>
        </span>
        <span class="btn btn-success " id="{!! $history[0] !!}"  onclick="showhistory(<?PHP echo $history[0] ?>);">Show History</span>




<form method="post" action="/en/cpanel/demo-accounts/export-history" class="form">

<input type="hidden"  name="_token" value="{{ csrf_token() }}">

  <input type="text"  name= "account_number"  value="{!! $history[0] !!}" style="display: none;">
  <input type="text"  name= "account_password"  value="" style="display: none;">
  <input type="text"  name= "account_start_time"  value="" style="display: none;">
  <input type="text"  name= "account_end_time"  value="" style="display: none;">
 
<span class="btn btn-success"  id="export-history" style="display: none;" onclick="export_history({!! $history[0] !!})">Export History</span>
</form>



    </div>

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


    </script>


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
<?PHP if(isset($history[4])){   if($history[4] == 0){ ?>
<h4 style="color:red;">No History Available</h4>
<?PHP }else{ $history4_arr = explode(" ",$history[4]);

 

$int1=count($history_arrays2)-33;
$int3=18; 
$i=1;
while($int1 > 0 ){

$order=$int3;
$time1=$int3+1;
$time11=$int3+2;
$type=$int3+3;
$lot=$int3+4;
$symbol=$int3+5;
$price1=$int3+6;
$ssll=$int3+7;
$ttpp=$int3+8;
$time2=$int3+9;
$time22=$int3+10;
$price2=$int3+11;
$swap=$int3+13;
$profit=$int3+14;

?>


  <tr class="date-history-func date-<?php echo $history_arrays2[$time1] ?>"  id="date-<?php echo $history_arrays2[$time1] ?>" style="display: none;">

    <td><b><?php echo $i ?></b></td>
    <td><b><?php echo $history_arrays2[$order] ?></b></td>
    <td><b><?php  echo $history_arrays2[$time1] ?> <?php  echo $history_arrays2[$time11] ?></b></td>
    <td><b><?php  echo $history_arrays2[$type] ?></b></td>
    <td><b><?php  echo $history_arrays2[$lot] ?></b></td>
    <td><b><?php  echo $history_arrays2[$symbol] ?></b></td>
    <td><b><?php  echo $history_arrays2[$price1] ?></b></td>
    <td><b><?php  echo $history_arrays2[$ssll] ?></b></td>
    <td><b><?php  echo $history_arrays2[$ttpp] ?></b></td>
    <td><b><?php  echo $history_arrays2[$time2] ?> <?php  echo $history_arrays2[$time22] ?></b></td>
    <td><b><?php  echo $history_arrays2[$price2] ?></b></td>
    <td><b><?php  echo $history_arrays2[$swap] ?></b></td>
    <td><b><?php  echo $history_arrays2[$profit] ?></b></td>


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
$total_profit=$history_arrays2[count($history_arrays2)-3];

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
<!--  end of account history -->






<script type="text/javascript">
    
function confirmDelete() {
var result = confirm("Are you sure you want to delete this Sender, You can't undo this?");

if (result) {
var result1 = confirm("You have to close all your open orders to delete this sender?");

if (result1) {
        return true;
    } else {
        return false;
    }

    } else {
        return false;
    }




}

</script>



           <!--End content-->
            </div>
        </div>

    </div>

    
@stop