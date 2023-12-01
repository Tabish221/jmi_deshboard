@extends('cpanel.layout')
@section('content')
    {!! Form::open(['url' => 'en/cpanel/withdraw-fund/bankwire']) !!}
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
                                        <label for="amount">Withdraw Amount:</label>
                                        <input type="number" class="form-control" name="amount" id="amount" required />
                                    </div>

                                    <div class="col-md-4 pb-4">
                                        <label for="bank_name">Bank Name:</label>
                                        <input type="text" class="form-control" name="bank_name" id="bank_name" required />
                                    </div>

                                    <div class="col-md-4 pb-4">
                                        <label for="bank_swift">Bank Swift:</label>
                                        <input type="text" class="form-control" name="bank_swift" id="bank_swift" required />
                                    </div>

                                    <div class="col-md-4 pb-4">
                                        <label for="bank_iban">Bank Account or IBan:</label>
                                        <input type="text" class="form-control" name="bank_iban" id="bank_iban" required />
                                    </div>

                                    <div class="col-md-4">
                                        <div class="openAccount-formBtn mn-btn">
                                            <input class="lg w-100" type="submit" value="Withdraw Now" />
                                        </div>
                                    </div>

                                    <div class="col-md-12 pt-4">
                                        <div class="internalTransferDetail-cont">
                                            <img loading="lazy" src="/assets/cpanel/img/bankwire.png" alt="Bank Wire" class="max-width-100 mb-3" />
                                            <h6>Bank Wire Withdrawing Details</h6>
                                            <p>Important Terms and Conditions <br /> Kindly note that by funding your account and/or by
                                                submitting a withdrawal request you agree on all the terms and conditions including
                                                those in relation to deposits and withdrawals. <br /> The following are an integral part
                                                of the terms and conditions: <br /> The Client agrees that the Company may charge the
                                                Client transfer fees and/or any other charges in any case where a withdrawal request is
                                                made by the Client without any trading activity taking place between that withdrawal
                                                request and the last deposit of the Client. <br /> The Client agrees that the Company
                                                may, at its own discretion and at any time and/or when in its sole opinion an abuse of
                                                the 0.00% transfer fees benefit has occurred, request and/or deduct any and/or all the
                                                transfer fee amounts from the client’ s account(s) and/or close the client’s account(s)
                                                and/or take any other action may consider necessary, as a compensation for the said
                                                abuse. <br />The Client acknowledges and confirms that the Company may, at its own
                                                discretion and at any time and/or for whatsoever reason and/or without any prior
                                                notification to the client and/or without the prior consent of the client, to increase
                                                the amount of 0.00% transfer fees which is demonstrated at the Company’s Website-Trading
                                                Accounts-Account Funding page to any other amount the Company believes necessary.</p>
                                            {{-- <img loading="lazy" src="/assets/cpanel/img/coinbase.png" alt="coinbase"
                                                class="max-width-100" />
                                            <h6>CoinBase Funding Details</h6>
                                            <p>Express Deposit (1-2 business hours)</p> --}}
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
