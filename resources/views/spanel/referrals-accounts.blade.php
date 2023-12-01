@extends('spanel.layout')
@section('content')


<br>
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Referrals <strong> Accounts </strong> </h3>
    </div>

    <div class="box-body" >


    <table class="table table-bordered">

        <thead>
            <td>#</td>
            <td>Full Name</td>
            <td>Email</td>
            <td>Country</td>
            <td>Mobile</td>
            <td>Live Accounts</td>
            <td>Demo Accounts</td>
            <td>Created At</td>

        </thead>
                <tbody>
<?PHP $i1=1; ?>
@foreach($website_accounts as $website_account)
<?PHP

$filtered_account= array_filter($ref_accounts, function($ref_accounts)use($website_account){
   return ($ref_accounts->invited_by==$website_account->id+10000);
});
if(count($filtered_account)>0){
?>
            <tr style="background:#00a65a;">
                <td>{{ $i1 }}</td>
                <td>{{ $website_account->fullname }}</td>
                <td>{{ $website_account->email }}</td>
                <td>{{ $website_account->country }}</td>
                <td>+{{ $website_account->country_code }}{{ $website_account->mobile }}</td>
                <td>


<?PHP
$filtered_live= array_filter($live_accounts, function($live_accounts)use($website_account){
   return ($live_accounts->website_accounts_id==$website_account->id);
});

if(count($filtered_live)>0){
    echo '<span class="btn btn-primary"  data-toggle="modal" data-target="#live-'.$website_account->id.'" >'.count($filtered_live).' Show</span>';
}
?>
@if(count($filtered_live)>0)
<!-- Modal -->
<div id="live-{{$website_account->id}}" class="modal fade" role="dialog">
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
                                            @if($account0->account_group ==3) Variable Account @endif
                                            @if($account0->account_group ==5) Scalping @endif
                                            @if($account0->account_group ==1) Fixed Spread Account @endif
                                            @if($account0->account_group ==4)  Bonus Account @endif

                                        </td>

                                        <td>USD</td>
                                        <td>1:{!! $account0->leverage !!}</td>
                                        <td>{!! $account0->investor_password !!}</td>



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
$filtered_demo= array_filter($demo_accounts, function($demo_accounts)use($website_account){
   return ($demo_accounts->website_accounts_id==$website_account->id);
});
if(count($filtered_demo)>0){
    echo '<span class="btn btn-primary"  data-toggle="modal" data-target="#demo-'.$website_account->id.'" >'.count($filtered_demo).' Show</span>';
}
?>
@if(count($filtered_demo)>0)
<!-- Modal -->
<div id="demo-{{$website_account->id}}" class="modal fade" role="dialog">
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

                                        <td>Start IB Date</td>





            </tr>

<?PHP
$i1++;
}
$i2=1;
foreach($ref_accounts as $ref_account){
if($ref_account->invited_by==$website_account->id+10000){
    ?>

            <tr style="background:#eee;">
                <td>{{ $i1-1 }} . {{ $i2 }}</td>
                <td>{{ $ref_account->fullname }}</td>
                <td>{{ $ref_account->email }}</td>
                <td>{{ $ref_account->country }}</td>
                <td>+{{ $ref_account->country_code }}{{ $ref_account->mobile }}</td>


                 <td>


<?PHP
$filtered_live= array_filter($live_accounts, function($live_accounts)use($ref_account){
   return ($live_accounts->website_accounts_id==$ref_account->id);
});

if(count($filtered_live)>0){
    echo '<span class="btn btn-primary"  data-toggle="modal" data-target="#live-'.$ref_account->id.'" >'.count($filtered_live).' Show</span>';
}
?>
@if(count($filtered_live)>0)
<!-- Modal -->
<div id="live-{{$ref_account->id}}" class="modal fade" role="dialog">
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
                                            @if($account0->account_group ==3) Variable Account @endif
                                            @if($account0->account_group ==5)Scalping Account @endif
                                            @if($account0->account_group ==1) Fixed Spread Account @endif
                                            @if($account0->account_group ==4)  Bonus Account @endif

                                        </td>

                                        <td>USD</td>
                                        <td>1:{!! $account0->leverage !!}</td>
                                        <td>{!! $account0->investor_password !!}</td>



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
$filtered_demo= array_filter($demo_accounts, function($demo_accounts)use($ref_account){
   return ($demo_accounts->website_accounts_id==$ref_account->id);
});
if(count($filtered_demo)>0){
    echo '<span class="btn btn-primary"  data-toggle="modal" data-target="#demo-'.$ref_account->id.'" >'.count($filtered_demo).' Show</span>';
}
?>
@if(count($filtered_demo)>0)
<!-- Modal -->
<div id="demo-{{$ref_account->id}}" class="modal fade" role="dialog">
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
                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$n=0; ?>
                                @foreach($filtered_demo as $account0)

                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $account0->account_id !!}</td>
                                        <td>JMI-Demo</td>
                                        <td>@if($account0->account_group ==1) ECN Account @endif @if($account0->account_group ==2) Fixed Account @endif</td>
                                        <td>USD</td>
                                        <td>1:{!! $account0->leverage !!}</td>
                                        <td>{!! $account0->investor_password !!}</td>

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

                                         <td>{!! $ref_account->created_at !!}</td>




            </tr>

<?PHP
$i2++;
}

}

?>

@endforeach



        </tbody>

    </table>





    </div>

</div>




@stop
