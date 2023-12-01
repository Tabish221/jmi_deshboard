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
                                <td>Name</td>
                                <td>Password</td>
                                <td>Investor</td>
                                <td  style="color: #0059b2; font-weight: bold;">+5 Lots</td>
                                <td>+5 Lots Action</td>
                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$n=0; ?>
                                @foreach($accounts as $account)

                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $account->account_id !!}</td>
                                        <td>JMI-Demo</td>
                                        <td>{!! $account->fullname !!}</td>
                                        <td>{!! $account->password !!}</td>
                                        <td>{!! $account->investor_password !!}</td>
                                        <td><?PHP if($account->lots == 1){echo' <i class="fa fa-check" aria-hidden="true" ></i>';}else{echo '<i class="fa fa-times" aria-hidden="true" ></i> '; } ?></td>
                                        <td>
                                        @if($account->lots == 0)
                                        {!! Form::open(['url'=>'en/spanel/competition/'.$account->account_id,'method'=>'patch','onsubmit' => 'return confirmLots()']) !!}
                                        <button class="btn btn-success" type="submit" >Yes</button>
                                        {!! Form::close() !!}
                                        @endif
                                        @if($account->lots == 1)
                                        {!! Form::open(['url'=>'en/spanel/competition/'.$account->account_id,'method'=>'patch','onsubmit' => 'return confirmLots2()']) !!}
                                        <button class="btn btn-danger" type="submit" >No</button>
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

            </div>
        </div>
@endif

    </div>
</div>


<script type="text/javascript">

function confirmLots() {
var result = confirm("Are you sure that this user trade +3 Lots?");

if (result) {
        return true;
    } else {
        return false;
    }
}
function confirmLots2() {
var result = confirm("Are you sure that this user doesn't trade +3 Lots?");

if (result) {
        return true;
    } else {
        return false;
    }
}
</script>


@stop
