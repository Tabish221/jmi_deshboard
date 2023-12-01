@extends('cpanel.layout')
@section('content')
    {!! Form::open(['url'=>'en/cpanel/copy-trade'])  !!}
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('status-error'))
                    <div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('status-error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="card">
                    <div class="card-body">
                        <div class="theam-form mn-btn">
                            <div class="row">
                                <div class="col-md-4 pb-4 controls">
                                    <label>Copy From:</label>

                                    <select class="form-control-" name="copy_from" id="copy_from" onchange="TransferTo(this.value)" required >
                                        <option value="" disabled selected >- Select -</option>
                                        @foreach($accounts as $account)
                                        <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | Live @if($account->account_type ==1) Individual Account @endif @if($account->account_type ==2) IB Account @endif</option>
                                        @endforeach
                                        <option id="otheraccount" value="other">Other</option>
                                    </select>
                                </div>

                                <div class="col-md-4 pb-4">
                                    <label>Copy To:</label>

                                    <select class="form-control" name="copy_to" id="copy_to" onchange="TransferFrom(this.value)" required >
                                        <option value="" disabled selected >- Select -</option>
                                        @foreach($accounts as $account)
                                        <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | Live @if($account->account_type ==1) Individual Account @endif @if($account->account_type ==2) IB Account @endif</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 pb-4">
                                    <label for="percentage">Copy Percentage:</label>

                                    <div class="controls">
                                        <input  type="number" class="form-control " placeholder="Copy Percentage %"   id="percentage" name="percentage" required>
                                    </div>
                                </div>

                                <div class="col-md-6 pb-4">
                                    <label for="other_account">Account Number:</label>
                                    <input type="number" class="form-control" name="other_account" id="other_account" placeholder="Account Number" />
                                </div>

                                <div class="col-md-6 pb-4">
                                    <label for="password">Account Password:</label>
                                    <input  type="text" class="form-control " placeholder="Receiver Real Password" id="password" name="password" required>
                                </div>

                                <div class="col-md-4">
                                    <div class="openAccount-formBtn mn-btn">
                                        <input class="lg w-100" type="submit" value="Submit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}



    @if(count($copy_trades)>0)
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="transactionHistory-table">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Copy From</th>
                                    <th>Copy To</th>
                                    <th>Copy Percentage</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?PHP $i=1; ?>
                                @foreach($copy_trades as $copy_trade)
                                    <tr>
                                        <td><div class="countid">{!! $i !!}</div></td>
                                        <td>{!! $copy_trade->copy_from !!}</td>
                                        <td>{!! $copy_trade->copy_to !!}</td>
                                        <td>{!! $copy_trade->percentage !!}</td>
                                        <td>
                                            <div class="bages @if($copy_trade->status==0) danger @endif @if($copy_trade->status==1) success @endif">
                                                @if($copy_trade->status==0)
                                                    Pending
                                                @endif

                                                @if($copy_trade->status==1)
                                                    Copying
                                                @endif
                                                @if($copy_trade->status==8)
                                                    Canceling
                                                @endif
                                                @if($copy_trade->status==9)
                                                    Cancelled
                                                @endif
                                            </div>
                                        </td>
                                        @if($copy_trade->status!==8 && $copy_trade->status!==9)
                                            {!! Form::open(['url'=>'en/cpanel/copy-trade/'.$copy_trade->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                                <td class="mn-btn">
                                                    <button type="submit" >Delete</button>
                                                </td>
                                            {!! Form::close() !!}
                                            @else
                                                <td></td>
                                        @endif
                                    </tr>
                                <?PHP $i++; ?>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    @section('script')
        <script type="text/javascript">
            function confirmDelete() {
                var result = confirm("Are you sure you want to cancel this copy trade, You can't undo this?");
                if (result) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    @stop
@stop
