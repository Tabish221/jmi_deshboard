@extends('cpanel.layout')
@section('content')

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="forex-account">
                        <div class="forex-accountAmount">
                            <h6>FOREX ACCOUNT</h6>
                            <h5><?php echo array_sum($equities); ?> <span> USD</span></h5>
                        </div>

                        <div class="forex-accountAmount">
                            <h6>TRADING ACCOUNTS</h6>
                            <h5>0 USD</h5>
                        </div>

                        <div class="forex-accountTotal">
                            <h6>Total Value</h6>
                            <p><?php echo array_sum($equities); ?> <span> USD</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="forex-accountlist">
                        <div class="forex-accountlist-profile">
                            <div class="img">
                                <img src="{{ url('/') }}/assets-up/images/jmi-icom.png" alt="icon">
                            </div>
                            <div class="cont">
                                <h6>Ameer</h6>
                                <p>FOREX 9109</p>
                            </div>
                        </div>

                        <div class="forex-accountlist-total">
                            <p>28452<span>.03 USD</span></p>

                            <div class="more">
                                <a href="#">
                                    <span class="material-symbols-outlined">more_vert</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @if (count($accounts) <= 0)
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card bg-grey">
                    <div class="card-body forexaccountERros">
                        <?php if (array_search('/cpanel/live-accounts', array_column($notifications_all, 'notification_link')) !== false) { ?>
                        <h5>FOREX ACCOUNT</h5>
                        <p> Your account opening request is currently under review</p>
                        <?php } else { ?>
                        <h5>FOREX ACCOUNT</h5>
                        <p> You have no live accounts</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <?php
    $i = 1;
    $n = 0;
    ?>
    @foreach ($accounts as $account)
        <?php
          if ($balances[$n] != '') { ?>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="forex-accountlist">
                            <div class="forex-accountlist-profile">
                                <div class="img">
                                    <img src="{{ url('/') }}/assets-up/images/jmi-icom.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <h6>{!! $names[$n] !!}</h6>
                                    <p>FOREX {!! $account->account_id !!}</p>
                                </div>
                            </div>

                            <div class="forex-accountlist-total">
                                <p>{!! $equities[$n] !!}<span> USD</span></p>

                                <div class="more">
                                    <a href="#">
                                        <span class="material-symbols-outlined">more_vert</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php }
          $n++;
          ?>
    @endforeach


    <!--End content-->

@stop
