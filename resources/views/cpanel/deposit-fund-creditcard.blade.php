@extends('cpanel.layout')
@section('content')



    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->

    {!! Form::open(['url'=>'en/cpanel/deposit-fund/credit-card','id'=>'payingform'])  !!}



        <hr />
        <div>



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

@if ($errors->any())
  @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
         {{ $error }}
     </div>
    @endforeach
@endif


@if(count($accounts)<=0)<h2>You Have no live account, You can add your account from <a href="/en/cpanel/add-account">Here</a> or open a new account from <a href="/en/cpanel/open-account">Here</a></h2> @endif

@if(count($accounts)>0)

            <div class="col-sm-6">


                <br />

                <div class="row">



               <!-- <input type='hidden' name='v_merchant_id' value='3181-0065366' /> -->



                    <label class="col-sm-4">Account Number:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="account_number" id="account_number" required >
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
                    <label class="col-sm-4">Currency base:</label>
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
                    <label class="col-sm-4">Deposit Amount:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="number" class="form-control" name="amount"  id="amountt" required />
                        </div>
                    </div>
                </div>




                <br />
                <div class="row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8 ">
                        <div class="controls">
                             <input class="btn btn-success form-control" id="deposit_now" type="submit"  value="Deposit Now"  disabled/>


                        </div>
                    </div>
                </div>



</form>



               </div>


            <div class="col-sm-5 col-sm-push-1" >

                <div id="demoaccount">
                <img loading="lazy" src="/assets/cpanel/img/creditcard.png" alt="Credit Card"  class="max-width-100" />
                    <h3>Debit/Credit Card Funding Details</h3>

                    <p>Express Deposit (Instant Deposit)</p>

                </div>



            </div>


@endif


        </div>


    </div>

</div>

<br>

            <!--End content-->
            </div>
        </div>

    </div>


@stop
