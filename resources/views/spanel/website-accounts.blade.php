@extends('spanel.layout')
@section('content')

<br>
<div class="box box-primary" id="profile-page">
    <div class="box-header">
        <h3 class="box-title"><strong>Website Accounts</strong></h3>
    </div>

    <div class="box-body">

@if (session('status'))
    <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status-success') }}
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status-error') }}
    </div>
@endif


@if(count($website_accounts)<=0)
    <h4 class="col-sm-push-1"> You Have No  Accounts</h4>
@endif
@if(count($website_accounts)>0)










<?PHP
if(isset($_GET['bymobile']) && $_GET['bymobile'] !== ''){
$accounts1=array();
foreach($website_accounts as $acc){
if(strpos($acc->mobile ,$_GET['bymobile']) !== false){

array_push($accounts1,$acc);
}
}

}else{
$accounts1=$website_accounts;
}

if(isset($_GET['bymail']) && $_GET['bymail'] !== ''){

$accounts2=array();
foreach($accounts1 as $acc){
if(strpos($acc->email ,$_GET['bymail']) !== false){
array_push($accounts2,$acc);
}}

}else{
$accounts2=$accounts1;
}

if(isset($_GET['byname']) && $_GET['byname'] !== ''){

$accounts3=array();
foreach($accounts2 as $acc){
if(strpos($acc->fullname,$_GET['byname']) !== false ){
array_push($accounts3,$acc);
}
}

}else{
$accounts3=$accounts2;
}

if(isset($_GET['bylive']) && $_GET['bylive'] !== ''){

$accounts4=array();
foreach($accounts3 as $acc){
  $filtered_live= array_filter($live_accounts, function($live_accounts)use($acc){
    // if(strpos($live_accounts->account,$_GET['bylive']) !== false ){
    // array_push($accounts4,$acc);
    // }
    return ($live_accounts->website_accounts_id==$acc->id);
  });
if(count($filtered_live) >0){
  foreach ($filtered_live as $filtered_live_acc) {
    if(strpos($filtered_live_acc->account_id,$_GET['bylive']) !== false ){
    array_push($accounts4,$acc);
    }

  }
  //array_push($accounts4,$acc);

}
}

}else{
$accounts4=$accounts3;
}

$website_filtered=$accounts4;

?>








    <h4 class="col-sm-push-1"> Website Accounts</h4>
        <hr />
        <div>
            <div class="">



                <div class="col-sm-3" style="margin-top: 5px;">
                <select class="form-control" id="paginate" onchange="paginate();" name="paginate">
                <option class="form-control" value="5" >Show 5 Per Page</option>
                <option class="form-control" value="10" >Show 10 Per Page</option>
                <option class="form-control" value="25" >Show 25 Per Page</option>
                <option class="form-control" value="50" >Show 50 Per Page</option>
                <option class="form-control" value="100" >Show 100 Per Page</option>
                <option class="form-control" value="500" >Show 500 Per Page</option>
                </select><br />

                </div>






                <?PHP

                $result=array();
                foreach($website_filtered as $website_acc){ array_push($result,$website_acc);}

                if(isset($_GET['per'])){$paginate=$_GET['per'];}else{$paginate= 10;}
                $page = Input::get('page', 1);

                $offSet = ($page * $paginate) - $paginate;
                $itemsForCurrentPage = array_slice($result, $offSet, $paginate, true);
                $result = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($result), $paginate, $page);
                $website_filtered=$result;
                ?>




                 </div>


                    <div id="searchdiv">
                    <div class="col-sm-3">
            <select class="form-control" id="search"  name="search">
            <option class="form-control" value="bymobile" >Search Mobile</option>
            <option class="form-control" value="byname" >Search Name</option>
            <option class="form-control" value="bymail" >Search Email</option>
            <option class="form-control" value="bylive" >Search Live FX</option>
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
                    <div class="col-sm-12"><a class="btn btn-success" href="/en/spanel/website-accounts/exportall">Export All</a></div>

                <br />
                <div class="">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>fullname</td>
                                <td>USER ID</td>
                                <td>username</td>
                                <td>email</td>
                                <td>mobile</td>
                                <td>country</td>
                                <td>Documents</td>
                                <td>Demo Acc</td>
                                <td>Live Acc</td>
                                <td>Created At</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody><?PHP $ii=1;$n=0;  ?>
                                @foreach($website_filtered as $account)

                                    <tr>
                                        <td>{!! $ii !!}</td>
                                        <td>{!! $account->fullname !!}</td>
                                        <td>{!! $account->id !!}</td>
                                        <td>{!! $account->username !!}</td>
                                        <td>{!! $account->email !!}</td>
                                        <td>+{!! $account->country_code !!} {!! $account->mobile !!}</td>
                                        <td>{!! $account->country !!}</td>
                                        <td>
<?PHP
$filtered_documents= array_filter($documents, function($documents)use($account){
   return ($documents->website_accounts_id==$account->id);
});

if(count($filtered_documents)>0){
    echo '<span class="btn btn-success"  data-toggle="modal" data-target="#document-'.$account->id.'" >'.count($filtered_documents).' Show</span>';
}
?>
@if(count($filtered_documents)>0)
<!-- Modal -->
<div id="document-{{$account->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">


                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>File Type</td>
                                <td>File</td>
                                <td>Description</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$types=['National Identity Card','Passport','Driver License','Bank account statement','Credit Card Statement','Phone Bill','Electricity bill','Credit Card Scan','Customer Account Agreement'];$status=['Reviewing','Approved']; ?>
                                @foreach($filtered_documents as $document)

                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $types[$document->type] !!}</td>
                                        <td><a href="{{Storage::disk('do')->url( $document->document )}}" class="btn btn-success" target="__blank" >View Document</a></td>
                                        <td>{!! $document->description !!}</td>
                                        <td class="@if($document->status==0) text-danger @endif @if($document->status==1) text-success @endif">{!! $status[$document->status] !!}</td>
                                          <td>
                                        {!! Form::open(['url'=>'en/spanel/documents/'.$document->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <button class="btn btn-success" type="submit" >Delete</button>
                                        {!! Form::close() !!}

                                        @if($document->status==0)
                                        {!! Form::open(['url'=>'en/spanel/documents/'.$document->id,'method'=>'patch','onsubmit' => 'return confirmApprove()']) !!}
                                        <button class="btn btn-success" type="submit" >Approve</button>
                                        {!! Form::close() !!}
                                        @endif

                                        </td>
                                    </tr>
                                    <?PHP $i++; ?>
                                @endforeach
                        </tbody>
                    </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endif
                                        </td>
                                        <td>
<?PHP
$filtered_demo= array_filter($demo_accounts, function($demo_accounts)use($account){
   return ($demo_accounts->website_accounts_id==$account->id);
});
if(count($filtered_demo)>0){
    echo '<span class="btn btn-success"  data-toggle="modal" data-target="#demo-'.$account->id.'" >'.count($filtered_demo).' Show</span>';
}
?>
@if(count($filtered_demo)>0)
<!-- Modal -->
<div id="demo-{{$account->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">

                   <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Account</td>
                                <td>Server</td>
                                <td>Group</td>
                                <td>Currency</td>
                                <td>Leverage</td>
                                <td>Investor</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$n=0; ?>
                                @foreach($filtered_demo as $account0)

                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $account0->account_id !!}</td>
                                        <td>JMI-Demo</td>
                                        <td>@if($account0->account_group ==1) Variable Account @endif @if($account0->account_group ==2) Fixed Account @endif</td>
                                        <td>USD</td>
                                        <td>1:{!! $account0->leverage !!}</td>
                                        <td>{!! $account0->investor_password !!}</td>


                                        <td>
                                        @if($account0->status ==5)
                                        {!! Form::open(['url'=>'en/spanel/demo-accounts/'.$account0->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <button class="btn btn-success" type="submit" >Confirm Deleting</button>
                                        {!! Form::close() !!}
                                        @endif
                                        </td>


                                    </tr>
                                    <?PHP $i++;$n++; ?>
                                @endforeach
                        </tbody>
                    </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endif

                                         </td>
                                        <td>
<?PHP
$filtered_live= array_filter($live_accounts, function($live_accounts)use($account){
   return ($live_accounts->website_accounts_id==$account->id);
});

if(count($filtered_live)>0){
    echo '<span class="btn btn-success"  data-toggle="modal" data-target="#live-'.$account->id.'" >'.count($filtered_live).' Show</span>';
}
?>
@if(count($filtered_live)>0)
<!-- Modal -->
<div id="live-{{$account->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">

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
                                <td>Investor</td>
                                <td>Action</td>

                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$n=0;  ?>
                                @foreach($filtered_live as $account0)

                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $account0->account_id !!}</td>
                                        <td>JMI-Server</td>
                                        <td>@if($account0->account_type ==1) Individual Account @endif @if($account0->account_type ==2) IB Account @endif</td>
                                            <td>
                                            @if($account0->account_group ==3) Variable Spread Account @endif
                                            @if($account0->account_group ==1) Fixed Spread Account @endif
                                            @if($account0->account_group ==4)  Bonus Account @endif
                                            @if($account0->account_group ==5) Scalping Account @endif

                                        </td>

                                        <td>USD</td>
                                        <td>1:{!! $account0->leverage !!}</td>
                                        <td>{!! $account0->investor_password !!}</td>

                                        <td>
                                        @if($account0->status ==5)
                                        {!! Form::open(['url'=>'en/spanel/demo-accounts/'.$account0->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <button class="btn btn-success" type="submit" >Confirm Deleting</button>
                                        {!! Form::close() !!}
                                        @endif
                                        </td>


                                    </tr>
                                    <?PHP $i++;$n++; ?>
                                @endforeach
                        </tbody>
                    </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endif


                                        </td>
                                        <td>{!! $account->created_at !!}</td>

                                        <td>

                                        </td>








                                    </tr>
                                    <?PHP $ii++;$n++; ?>
                                @endforeach
                        </tbody>
                    </table>
                                <?PHP echo $result->render(); ?>

                </div>

                <br />

            </div>
        </div>
@endif

    </div>
</div>


<script>
act='<?PHP if(isset($_GET['per'])){echo "&per=".$_GET['per'];}else{echo "0-0-0";} ?>';
page='<?PHP if(isset($_GET['page'])){echo "&page=".$_GET['page'].'&';}else{echo "0-0-0";} ?>';

select='<?PHP if(isset($_GET['per'])){echo $_GET['per'];}else{echo 25;} ?>';

$('select#paginate option[value="'+select+'"]').attr('selected','selected');

bymobile='<?PHP if(isset($_GET['bymobile'])){echo $_GET['bymobile'];}?>';
bymail='<?PHP if(isset($_GET['bymail'])){echo $_GET['bymail'];}?>';
byname='<?PHP if(isset($_GET['byname'])){echo $_GET['byname'];}?>';
bylive='<?PHP if(isset($_GET['bylive'])){echo $_GET['bylive'];}?>';

selectby='<?PHP if(isset($_GET['bymobile'])){echo 'bymobile';}else if(isset($_GET['bymail'])){echo 'bymail';} else if(isset($_GET['byname'])){echo 'byname';}else if(isset($_GET['bylive'])){echo 'bylive';}?>';

$('select#search option[value="'+selectby+'"]').attr('selected','selected');
$('input#search').val(bymobile+bymail+byname+bylive);

function paginate(){
val=$('select#paginate').val();
action = '&per='+val+'&page=1&';
var url=document.location.href;
url=url.replace(act, "");
url=url.replace(page, "");
document.location = url+action;
};

$('span#search').click(function(){
val=$('select#search').val();
search=$('input#search').val();

action = '&'+val+'='+search+'&';
var url='<?PHP echo Request::url(); ?>'+'?';
document.location = url+action;

});
</script>

                <script>
                //change pagination
                $( document ).ready(function() {
                $('ul.pagination li a').each(function(){
                    var fullurl= $(this).attr('href');
                    var result = fullurl.split('page=');
                    var page=result[1];
                        if(window.location.href.indexOf("&page") > -1) {
                    var pageaction= "<?PHP  if(isset($_GET['page'])){echo 'page='.$_GET['page'];}else{echo 'asdasdasdasd';} ?>";
                        }else if(window.location.href.indexOf("?page") > -1){
                        var pageaction= "<?PHP  if(isset($_GET['page'])){echo 'page='.$_GET['page'];}else{echo 'asdasdasdasd';} ?>";
                    }

                    currenturl=document.location.href;

                    if(pageaction == undefined || pageaction == null){
                    var currenturl = currenturl+'&page='+page;

                    }else{
                    currenturl=location.href.replace(pageaction, "page="+page);
                    }
                    $(this).attr('href',currenturl);



                });
                });
                </script>






@stop
