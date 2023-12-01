@extends('cpanel.layout')
@section('content')
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
        <div class="row">
            <div class="col-md-4 pb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/bankwire.png" alt="Bank Wire" />
                            </div>
                            <h6 >Bank Wire</h6 >
                            <a href="/en/cpanel/withdraw-fund/bankwire" class="lg w-100">Withdraw</a><br />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/epay.png" alt="Epay" />
                            </div>
                            <h6 >Epay</h6 >
                            <a href="/en/cpanel/withdraw-fund/epay" class="lg w-100">Withdraw</a><br />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/perfect.png" alt="Perfect Money" />
                            </div>
                            <h6 >Perfect Money</h6 >
                            <a href="/en/cpanel/withdraw-fund/perfect-money" class="lg w-100">Withdraw</a><br />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/advcash.png" alt="advcash" />
                            </div>
                            <h6 >advcash</h6 >
                            <a href="/en/cpanel/withdraw-fund/advcash" class="lg w-100">Withdraw</a><br />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/coinbase.png" alt="CoinBase" />
                            </div>
                            <h6 >CoinBase</h6 >
                            <a href="/en/cpanel/withdraw-fund/coinbase" class="lg w-100">Withdraw</a><br />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/westernunion.png" alt="Western Union" />
                            </div>
                            <h6 >Western Union</h6 >
                            <a href="#" class="lg w-100">Withdraw</a><br />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/westernunion.png" alt="Western Union" />
                            </div>
                            <h6 >Western Union</h6 >
                            <a href="#" class="lg w-100">Withdraw</a><br />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="depositwithdraw-card mn-btn">
                            <div class="icon w-100">
                                <img loading="lazy" src="/assets/cpanel/img/moneygram.png" alt="MoneyGram" />
                            </div>
                            <h6 >MoneyGram</h6 >
                            <a href="#" class="lg w-100">Withdraw</a><br />
                        </div>
                    </div>
                </div>
            </div>
	    </div>
    @endif
@stop
