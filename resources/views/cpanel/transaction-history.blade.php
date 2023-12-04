@extends('cpanel.layout')
@section('content')
    @if (session('status-success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {!! session('status-success') !!}
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

    <div class="row">
        <div class="col-md-12">
            <div class="transactionHistory-header">
                <div class="transactionHistory-nav">
                    <ul>
                        <li data-targetit="box-traall" @if ( Request::segment(4) =='') class="current" @else  @endif>
                            <a href="/en/cpanel/transaction-history">All</a>
                        </li>
                        <li data-targetit="box-tradeposit" @if ( Request::segment(4) =='deposit') class="current" @else  @endif>
                            <a href="/en/cpanel/transaction-history/deposit">Deposit</a>
                        </li>
                        <li data-targetit="box-trawhitdraw" @if ( Request::segment(4) =='withdraw') class="current" @else  @endif>
                            <a href="/en/cpanel/transaction-history/withdraw">Whitdraw</a>
                        </li>
                        <li data-targetit="box-trainternal" @if ( Request::segment(4) =='transfers') class="current" @else  @endif>
                            <a href="/en/cpanel/transaction-history/transfers">Internal Transfers</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="transactionHistory-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Via</th>
                            <th>Account</th>
                            <th>Status</th>
                            <th>Details</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($transactions)<=0)
                            <tr><td colspan="8">  You Have No Transactions</td></tr>
                        @endif

                        <?PHP $i=1;$n=0; ?>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td><div class="countid">{!! $i !!}</div></td>
                                <td>@if ($transaction->type==0) Deposit @elseif ($transaction->type==1) Withdraw @elseif ($transaction->type==2) Internal Transfer @endif</td>
                                <td>{!! $transaction->via !!} {!! $transaction->via_to !!}</td>
                                <td>{!! $transaction->account !!}</td>
                                <td>
                                    <div class="bages @if($transaction->status==0)  @elseif ($transaction->status==1) success  @elseif ($transaction->status==9)  danger @endif">
                                        @if ($transaction->status==0)
                                            Pending
                                        @elseif ($transaction->status==1)
                                            Success
                                        @elseif ($transaction->status==9)
                                            Rejected
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="detals">
                                    <p>{!! $transaction->details_user !!}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="date">
                                    <p>{!! $transaction->created_at !!}</p>
                                    </div>
                                </td>
                            </tr>
                        <?PHP $i++;$n++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
