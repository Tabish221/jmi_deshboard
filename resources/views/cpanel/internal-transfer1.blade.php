@extends('cpanel.layout')
@section('content')


   <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->


    {!! Form::open(['url'=>'en/cpanel/internal-transfers'])  !!}


@if(count($accounts)<=0)<h2>You Have no live account, You can add your account from <a href="/en/cpanel/add-account">Here</a> or open a new account from <a href="/en/cpanel/open-account">Here</a></h2> @endif

@if(count($accounts)>0)

<h4 class="text-left" style="display:none;"><span style="color:red;">*Note:</span> Please contact support before transfer if your receiver balance is negative (-).  </h4>


            <div class="col-sm-6">


                <br />
                <div class="row">


                    <label class="col-sm-4">Transfer From:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="transfer_from" id="transfer_from" onchange="TransferFrom(this.value)" required >
                                <option value="" disabled selected >- Select -</option>
                                @foreach($accounts as $account)
                                <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | Live @if($account->account_type ==1) Individual Account @endif @if($account->account_type ==2) IB Account @endif</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>





                <br />
                <div class="row">
                <label class="col-sm-4">Account Password:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                              <input  type="text" class="form-control " placeholder="Sender Real Password"   id="password" name="password" required>

                        </div>
                    </div>
                </div>


                <br />
                <div class="row">


                    <label class="col-sm-4">Transfer To:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="transfer_to" id="transfer_to" onchange="TransferTo(this.value)" required >
                                <option value="" disabled selected >- Select -</option>
                                @foreach($accounts as $account)
                                <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | Live @if($account->account_type ==1) Individual Account @endif @if($account->account_type ==2) IB Account @endif</option>
                                @endforeach
                                <option id="otheraccount" value="other">Other</option>
                            </select>
                            <input type="number" class="form-control hidden" name="other_account" id="other_account" placeholder="Account Number" />
                        </div>
                    </div>
                </div>

                <!-- <br />
                <div class="row">
                <label class="col-sm-4">Reciver Password:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                              <input  type="text" class="form-control " placeholder="Receiver Investor Password"   id="reciver_password" name="reciver_password" required>

                        </div>
                    </div>
                </div> -->

                <br />
                <div class="row">
                    <label class="col-sm-4">Currency Base:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="currency" id="currency" required >
                                <option value="1" selected>USD</option>
                            </select>
                        </div>
                    </div>
                </div>


                <br />
                <div class="row" id="amount">
                    <label class="col-sm-4">Transfer Amount:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="number" class="form-control" name="amount" id="amount" step="0.01" required />

                        </div>
                    </div>
                </div>


                <br />
                <div class="row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8 ">
                        <div class="controls">
                             <input class="btn btn-success form-control" type="submit" value="Transfer Now" />

                        </div>
                    </div>
                </div>
            {!! Form::close() !!}



               </div>


            <div class="col-sm-5 col-sm-push-1" >

                <div id="demoaccount">
                    <h3>Internal Transfer Details</h3>

                    <p>Express Transfer (Instant Transfer)</p>

                </div>



            </div>

@endif

	</div>

</div>

<script type="text/javascript">

function TransferFrom(value)
{
$('select#transfer_to').val('');
$('select#transfer_to option').show();
$('select#transfer_to option[value='+value+']').hide();

}

function TransferTo(value)
{
if(value=='other')
{

$('input#other_account').removeClass('hidden')

}else{
$('input#other_account').addClass('hidden')


}


}



</script>




       <!--End content-->
            </div>
        </div>

    </div>



@stop
