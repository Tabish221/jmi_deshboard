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


@if(count($my_receivers)<=0)
    <h4 class="col-sm-push-1"> You Have No Receiver</h4>
@endif

                <div class="col-sm-12" style=" margin: 20px 0px; ">
                    <span class="btn btn-warning icon-search" id="new_receiver" data-toggle="modal" data-target="#new-receiver">Add New Receiver</span>
                </div> <br />

<!-- Modal -->
<div id="new-receiver" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:300px">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Receiver</h4>
      </div>
      <div class="modal-body">

{!! Form::open(['url'=>'en/cpanel/copy_receivers/new','id'=>'new-receiver'])  !!}


                <div class="control-group">

                    <div class="col-sm-12">
                         <div class="controls">
                              <input  type="number" class="form-control " placeholder=" Receiver Account Number"  id="account_number" name="account_number" required>
                         </div>
                   </div>
                                    
                    <div class="col-sm-12">
                    <br />
                         <div class="controls">
                              <input  type="text" class="form-control " placeholder="Receiver Account Password"  id="account_password" name="account_password" required>
                         </div>
                   </div>

                   
                   <div class="col-sm-12">
                    <div class="controls">
                        <h5>Note: The password the real password not the investor password</h5>
                       

                            <button type="submit" class="btn btn-success submit" >Save Receiver</button>

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



@if(count($my_receivers)>0)





<?PHP 
if(isset($_GET['bynumber']) && $_GET['bynumber'] !== ''){
$my_receivers1=array();
foreach($my_receivers as $acc){
if(strpos($acc->login ,$_GET['bynumber']) !== false){

array_push($my_receivers1,$acc);

}
}

}else{
$my_receivers1=$my_receivers;
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
                                <td>Status</td>
                                <td  >Action</td>
                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$n=0; ?>
                                @foreach($my_receivers1 as $my_receiver)
                                
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $my_receiver->login !!}</td>
                                        <td>{!! $my_receiver->password !!}</td>
                                        <td>{!! $names[$n] !!}</td>
                                        <td  style="color: #0059b2; font-weight: bold;">{!! $balances[$n] !!}</td>
                                        <td>{!! $equities[$n] !!}</td>
                                        <td style=" <?PHP if($my_receiver->IsValid == 1 && $my_receiver->IsBalance ==1){echo "background: green; color: #fff; font-weight:bold;font-size: 20px;";}else{echo "background: red; color: #fff; font-weight:bold;font-size: 20px;";} ?> " >
                                            <?PHP if($my_receiver->IsValid == 0){
                                                echo'Stopped: Invalid Account';
                                            }elseif ($my_receiver->IsBalance ==0){
                                                echo'Stopped: No Balance';
                                            }else{echo 'Working';}?>
                                        <td>

                                            <?PHP if($my_receiver->IsValid == 0){ ?>

                                        <span class="btn btn-success" type="submit" style="" data-toggle="modal" data-target="#update-receiver{!! $my_receiver->login !!}" >Update Password</span>


<!-- Modal -->
<div id="update-receiver{!! $my_receiver->login !!}" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:300px">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Password</h4>
      </div>
      <div class="modal-body">

{!! Form::open(['url'=>'en/cpanel/copy_receivers/update_password','id'=>'update-receiver'])  !!}


                <div class="control-group">

                                    
                    <div class="col-sm-12">
                    <br />
                         <div class="controls">
                              <input  type="hidden" class="form-control " id="account_number" name="account_number" value="{!! $my_receiver->login !!}" required>
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


                                           <?PHP }elseif ($my_receiver->IsBalance ==0){ ?>

{!! Form::open(['url'=>'en/cpanel/copy_receivers/'.$my_receiver->login,'method'=>'post','onsubmit' => 'return UpdateStatus('.$my_receiver->login.')']) !!}
                                        <button class="btn btn-success" type="submit" style="">Update Status</button>
                                        
                                        {!! Form::close() !!}

                                            <?PHP } ?>


 {!! Form::open(['url'=>'en/cpanel/copy_receivers/'.$my_receiver->login,'method'=>'delete','onsubmit' => 'return confirmDelete('.$my_receiver->login.')']) !!}
                                        <button class="btn btn-success" type="submit" style="">Delete Receiver</button>
                                        
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












<script type="text/javascript">
    
function confirmDelete(login) {
<?PHP 
$my_following_receivers=array();
foreach ($my_following as $follow) {

    array_push($my_following_receivers, $follow->receiver_login);
}
 ?>

 var nn=('<?PHP echo json_encode($my_following_receivers) ?>'.includes(login));

    if(nn){

   var result = confirm("This Receiver is following Sender so you have to unfollow the Sender first");

if (result) {

   var result1 = confirm("You will redirect now to following relations to delete your Receiver Following");
   if(result1){

        window.location.replace("/en/cpanel/follow_sender");
        return false;
   }else{

        return false;
   }

    } else {
        return false;
    }

    }else{

   var result = confirm("Are you sure you want to delete this Receiver, You can't undo this?");
     
if (result) {
        return true;
    } else {
        return false;
    }


    }



}

function UpdateStatus(login) {


   var result = confirm("Did you fund your account ? if you didn't fund it it will disabled again.");
     
if (result) {
        return true;
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