@extends('spanel.layout')
@section('content')


<br>
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Internal Transfer <strong> Requests </strong> </h3>
    </div>

    <div class="box-body" >


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


            <div class="">

                <a class="btn @if ( Request::segment(4) =='') btn-success @else btn-default @endif " href="/en/spanel/internal-transfers-requests">All</a>
                <a class="btn @if ( Request::segment(4) =='pending') btn-success @else btn-default @endif "  href="/en/spanel/internal-transfers-requests/pending">Pending</a>
                <a class="btn @if ( Request::segment(4) =='done') btn-success @else btn-default @endif "  href="/en/spanel/internal-transfers-requests/done">Done</a>
                <a class="btn @if ( Request::segment(4) =='rejected') btn-success @else btn-default @endif "  href="/en/spanel/internal-transfers-requests/rejected">Rejected</a>

            </div>

		    <div class="col-sm-10"><br />
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Type</td>
                            <td>From Account</td>
                            <td>To Account</td>
                            <td>Amount</td>
                            <td>Status</td>
                            <td>Details</td>
                            <td>Date</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>


						@if(count($transactions)<=0)
	   						<tr><td colspan="8">  You Have No Requests</td></tr>
						@endif

						<?PHP $i=1;$n=0; ?>
                        @foreach($transactions as $transaction)
                                
               			 	<tr>
                            	<td>{!! $i !!}</td>
                                <td>@if ($transaction->type==0) Deposit @elseif ($transaction->type==1) Withdraw @elseif ($transaction->type==2) Internal Transfers @endif</td>
                                <td>{!! $transaction->via !!}</td>
                                <td>{!! $transaction->account !!}</td>
                                <td>{!! $transaction->amount !!} @if ($transaction->currency==1) USD @endif</td>
                                <td @if ($transaction->status==0) style="background:yellow;" @elseif ($transaction->status==1)  style="background:green;"  @elseif ($transaction->status==9)  style="background:red;" @endif >@if ($transaction->status==0) Pending @elseif ($transaction->status==1) Success  @elseif ($transaction->status==9) Rejected @endif</td>
                                <td>{!! $transaction->details_admin !!}</td>
                                <td>{!! $transaction->created_at !!}</td>
                                <td>@if($transaction->status==0) <button class="btn btn-success" data-toggle="modal" data-target="#mydone{!! $transaction->id !!}">Done</button> <button class="btn btn-success" data-toggle="modal" data-target="#myreject{!! $transaction->id !!}">Rejected</button> @endif</td>


                                <!-- Done Function -->
                                <div id="mydone{!! $transaction->id !!}" class="modal fade" role="dialog">
                                        {!! Form::open(['url'=>'en/spanel/internal-transfers-requests'])  !!}

                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Are You Sure That This Request Has Been Done?</h4>
                                      </div>
                                      <div class="modal-body">

                                        <input type="hidden" value="{!! $transaction->id !!}" name="transaction_id" />
                                        <input type="hidden" value="1" name="transaction_status" />

                                        <label for="not">Note:</label>
                                        <textarea class="form-control" id ="note" name="note" required></textarea>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" data-dismiss-="modal">Add Note & Done</button>
                                      </div>
                                    </div>
                                        {!! Form::close() !!}

                                  </div>
                                </div>
                                <!-- Reject Function -->
                                <div id="myreject{!! $transaction->id !!}" class="modal fade" role="dialog">
                                        {!! Form::open(['url'=>'en/spanel/internal-transfers-requests'])  !!}

                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Are You Sure Of Rejecting This Request?</h4>
                                      </div>
                                      <div class="modal-body">

                                        <input type="hidden" value="{!! $transaction->id !!}" name="transaction_id" />
                                        <input type="hidden" value="9" name="transaction_status" />

                                        <label for="not">Note:</label>
                                        <textarea class="form-control" id ="note" name="note" required></textarea>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" data-dismiss-="modal">Add Note & Reject</button>
                                      </div>
                                    </div>
                                        {!! Form::close() !!}


                                  </div>
                                </div>
                            </tr>
                        <?PHP $i++;$n++; ?>
                        @endforeach

                    </tbody>

			    </table>
		    </div>


	    </div>


    </div>

</div>


@stop