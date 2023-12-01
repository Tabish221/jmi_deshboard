@extends('spanel.layout')
@section('content')

<br>
<div class="box box-primary" id="profile-page">
    <div class="box-header">
        <h3 class="box-title"><strong>Demo Accounts</strong></h3>
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



@if(count($accounts)<=0)
    <h4 class="col-sm-push-1"> You Have No Demo Accounts</h4>
@endif
@if(count($accounts)>0)

    <h4 class="col-sm-push-1"> Demo Accounts</h4>
        <hr />
        <div>
            <div class="">

                <br />
                <div class="">
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
                                <td  style="color: #0059b2; font-weight: bold;">Balance</td>
                                <td>Equity</td>
                                <td>Created At</td>
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
                                        <td  style="color: #0059b2; font-weight: bold;">{!! $balances[$n] !!}</td>
                                        <td>{!! $equities[$n] !!}</td>
                                        <td>{!! $account->created_at !!}</td>

                                        <td>
                                        @if($account->status ==5)
                                        {!! Form::open(['url'=>'en/spanel/demo-accounts/'.$account->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
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

                <br />

                <div class="col-sm-12">
                        {{ $accounts->links() }}

                </div>
            </div>
        </div>
@endif

    </div>
</div>


<script type="text/javascript">

function confirmDelete() {
var result = confirm("Are you sure you want to delete this account, You can't undo this?");

if (result) {
        return true;
    } else {
        return false;
    }
}
</script>


@stop
