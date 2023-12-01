@extends('cpanel.layout')
@section('content')
    {!! Form::open(['url' => 'en/cpanel/deposit-fund/advcash']) !!}
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
                                    <div class="col-md-4 pb-4 controls">
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

                                    <div class="col-md-4 pb-4">
                                        <label>Currency base:</label>

                                        <select class="form-control" name="currency" id="currency" required>
                                            <option value="1" selected>USD</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 pb-4">
                                        <label for="amount">Deposit Amount:</label>

                                        <input type="number" class="form-control" name="amount" id="amount" required />
                                    </div>

                                    <div class="col-md-4">
                                        <div class="openAccount-formBtn mn-btn">
                                            <input class="lg w-100" type="submit" value="Deposit Now" />
                                        </div>
                                    </div>
                                    <div class="col-md-8 text-center">
                                        <div class="internalTransferDetail-cont">
                                            <img loading="lazy" src="/assets/cpanel/img/advcash.png" alt="advcash" class="max-width-100" />
                                            <h6>advcash Funding Details</h6>
                                            <p>Express Deposit (1-2 business hours)</p>
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
@stop
