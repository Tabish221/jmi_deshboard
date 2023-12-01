@extends('cpanel.layout')
@section('content')
   <div class="row">
       <div class="col-md-12">
            <!--start content -->
            {!! Form::open(['url'=>'en/cpanel/internal-transfers'])  !!}
                @if(count($accounts)<=0)
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="card bg-grey">
                                <div class="card-body forexaccountERros">
                                    <h5>You have no live account</h5>
                                    <p> You can add your account from
                                        <a href="/en/cpanel/add-account">Here</a>
                                        or open a new account from
                                        <a href="/en/cpanel/open-account">Here</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if(count($accounts)>0)
                    <div style="display:none;">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card bg-grey">
                                    <div class="card-body forexaccountERros">
                                        <h5 style="color:red;">Note</h5>
                                        <p style="color:red;"> Please contact support before transfer if your receiver balance is negative (-).</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="theam-form mn-btn">
                                <div class="row">
                                    <div class="col-md-4 pb-4 controls">
                                        <label>Transfer From:</label>

                                        <select name="transfer_from" id="transfer_from" onchange="TransferFrom(this.value)" required >
                                            <option value="" disabled selected >- Select -</option>
                                            @foreach($accounts as $account)
                                                <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | Live @if($account->account_type ==1) Individual Account @endif @if($account->account_type ==2) IB Account @endif</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 pb-4">
                                        <label>Transfer To:</label>

                                        <select class="form-control" name="transfer_to" id="transfer_to" onchange="TransferTo(this.value)" required >
                                            <option value="" disabled selected >- Select -</option>
                                            @foreach($accounts as $account)
                                                <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | Live @if($account->account_type ==1) Individual Account @endif @if($account->account_type ==2) IB Account @endif</option>
                                            @endforeach
                                            <option id="otheraccount" value="other">Other</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 pb-4">
                                        <label>Currency base:</label>

                                        <select class="form-control" name="currency" id="currency" required >
                                            <option value="" disabled selected >- Select -</option>
                                            <option value="1">USD</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 pb-4">
                                        <label for="amount">Transfer Amount:</label>
                                        <input type="number" class="" name="amount" id="amount" step="0.01" required />
                                    </div>

                                    <div class="col-md-4 pb-4">
                                        <label for="other_account">Account Number:</label>
                                        <input type="number" class="form-control" name="other_account" id="other_account" placeholder="Account Number" />
                                    </div>

                                    <div class="col-md-4 pb-4">
                                        <label for="password">Account Password:</label>
                                        <input  type="text" class="" placeholder="Sender Real Password" id="password" name="password" required>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="openAccount-formBtn mn-btn">
                                            <input class="lg w-100" type="submit" value="Transfer Now" />
                                        </div>
                                    </div>

                                    <div class="col-md-8 text-center">
                                        <div class="internalTransferDetail-cont">
                                            <h6>Internal Transfer Details</h6>
                                            <p>Express Transfer (Instant Transfer)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            {!! Form::close() !!}
        </div>
    </div>

    @section("script")
        <script type="text/javascript">
            function TransferFrom(value){
                $('select#transfer_to').val('');
                $('select#transfer_to option').show();
                $('select#transfer_to option[value='+value+']').hide();
            }

            function TransferTo(value){
                if(value=='other'){
                    $('input#other_account').removeClass('hidden')
                }else{
                    $('input#other_account').addClass('hidden')
                }
            }
        </script>
    @stop

@stop
