@extends('cpanel.layout')
@section('content')
        {!! Form::open(['url' => 'en/cpanel/withdraw-fund/coinbase']) !!}
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

        @if (count($accounts) <= 0)
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card bg-grey">
                        <div class="card-body forexaccountERros">
                            <h5>You have no live account</h5>
                            <p> You can add your account from
                                <a href="/en/cpanel/add-account">Here</a>
                                or open a new account from
                                <a href="/en/cpanel/open-account">Here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (count($accounts) > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="theam-form mn-btn">
                                <div class="row">
                                    <div class="col-md-6 pb-4 controls">
                                        <label>Account Number:</label>

                                        <select class="form-control" name="account_number" id="account_number" required>
                                            <option value="" disabled selected>- Select -</option>
                                            @foreach ($accounts as $account)
                                                <option value="{!! $account->account_id !!}">{!! $account->account_id !!} | Live
                                                    @if ($account->account_type == 1)
                                                        Individual Account
                                                        @endif @if ($account->account_type == 2)
                                                            IB Account
                                                        @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 pb-4">
                                        <label>Currency base:</label>

                                        <select class="form-control" name="currency" id="currency" required>
                                            <option value="1" selected>USD</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 pb-4">
                                        <label for="coinbase_account">CoinBase Account</label>
                                        <input type="text" class="form-control" name="coinbase_account" id="coinbase_account" required />
                                    </div>

                                    <div class="col-md-6 pb-4">
                                        <label for="amount">Withdraw Amount:</label>
                                        <input type="number" class="form-control" name="amount" id="amount" required />
                                    </div>

                                    <div class="col-md-4">
                                        <div class="openAccount-formBtn mn-btn">
                                            <input class="lg w-100" type="submit" value="Withdraw Now" />
                                        </div>
                                    </div>

                                    <div class="col-md-8 pt-4">
                                        <div class="internalTransferDetail-cont text-center">
                                            <img loading="lazy" src="/assets/cpanel/img/coinbase.png" alt="Coinbase" class="max-width-100 mb-3" />
                                            <h6>CoinBase Withdrawing Details</h6>
                                            <p>Express withdrawal (12 Hours)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    {!! Form::close() !!}

    {{-- <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">{{ $title }}</h4>
            </div>

            <div class="panel-body">

                <!--start content -->

                {!! Form::open(['url' => 'en/cpanel/withdraw-fund/coinbase']) !!}


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


                    @if (count($accounts) <= 0)
                        <h2>You Have no live account, You can add your account from <a
                                href="/en/cpanel/add-account">Here</a> or open a new account from <a
                                href="/en/cpanel/open-account">Here</a></h2>
                    @endif

                    @if (count($accounts) > 0)

                        <div class="col-sm-6">


                            <br />
                            <div class="row">


                                <label class="col-sm-4">Account Number:</label>
                                <div class="col-sm-8">
                                    <div class="controls">
                                        <select class="form-control" name="account_number" id="account_number" required>
                                            <option value="" disabled selected>- Select -</option>
                                            @foreach ($accounts as $account)
                                                <option value="{!! $account->account_id !!}">{!! $account->account_id !!} | Live
                                                    @if ($account->account_type == 1)
                                                        Individual Account
                                                        @endif @if ($account->account_type == 2)
                                                            IB Account
                                                        @endif
                                                </option>
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
                                        <select class="form-control" name="currency" id="currency" required>
                                            <option value="1" selected>USD</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <br />
                            <div class="row" id="coinbase_account">
                                <label class="col-sm-4">CoinBase Account</label>
                                <div class="col-sm-8">
                                    <div class="controls">
                                        <input type="text" class="form-control" name="coinbase_account"
                                            id="coinbase_account" required />

                                    </div>
                                </div>
                            </div>


                            <br />
                            <div class="row" id="amount">
                                <label class="col-sm-4">Withdraw Amount:</label>
                                <div class="col-sm-8">
                                    <div class="controls">
                                        <input type="text" class="form-control" name="amount" id="amount" required />

                                    </div>
                                </div>
                            </div>

                            <br />
                            <div class="row">
                                <label class="col-sm-4"></label>
                                <div class="col-sm-8 ">
                                    <div class="controls">
                                        <input class="btn btn-success form-control" type="submit" value="Withdraw Now" />

                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}



                        </div>


                        <div class="col-sm-5 col-sm-push-1">

                            <div id="demoaccount">
                                <img loading="lazy" src="/assets/cpanel/img/coinbase.png" alt="coinbase"
                                    class="max-width-100" />
                                <h3>CoinBase Withdrawing Details</h3>

                                <p>Express withdrawal (12 Hours)</p>

                            </div>



                        </div>


                    @endif


                </div>


            </div>

        </div>

        <br>

        <!--End content-->
    </div> --}}
@stop
