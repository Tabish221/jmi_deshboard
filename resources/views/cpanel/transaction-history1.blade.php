@extends('cpanel.layout')
@section('content')



    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->


	    <div>




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


		    <div class="">

		    	<a class="btn @if ( Request::segment(4) =='') btn-primary @else btn-default @endif " href="/en/cpanel/transaction-history">All</a>
		    	<a class="btn @if ( Request::segment(4) =='deposit') btn-primary @else btn-default @endif "  href="/en/cpanel/transaction-history/deposit">Deposit</a>
		    	<a class="btn @if ( Request::segment(4) =='withdraw') btn-primary @else btn-default @endif "  href="/en/cpanel/transaction-history/withdraw">Withdraw</a>
		    	<a class="btn @if ( Request::segment(4) =='transfers') btn-primary @else btn-default @endif "  href="/en/cpanel/transaction-history/transfers">Internal Transfers</a>

		    </div>
		    <div class="col-sm-12"><br />
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Type</td>
                            <td>Via</td>
                            <td>Account</td>
                            <td>Amount</td>
                            <td>Status</td>
                            <td>Details</td>
                            <td>Date</td>
                        </tr>
                    </thead>
                    <tbody>


						@if(count($transactions)<=0)
	   						<tr><td colspan="8">  You Have No Transactions</td></tr>
						@endif

						<?PHP $i=1;$n=0; ?>
                        @foreach($transactions as $transaction)

               			 	<tr>
                            	<td>{!! $i !!}</td>
                                <td>@if ($transaction->type==0) Deposit @elseif ($transaction->type==1) Withdraw @elseif ($transaction->type==2) Internal Transfer @endif</td>
                                <td>{!! $transaction->via !!} {!! $transaction->via_to !!}</td>
                                <td>{!! $transaction->account !!}</td>
                                <td>{!! $transaction->amount !!} @if ($transaction->currency==1) USD @endif</td>
                                <td @if ($transaction->status==0) style="background:yellow;" @elseif ($transaction->status==1)  style="background:green;color: #fff;"  @elseif ($transaction->status==9)  style="background:red;color: #fff;" @endif >@if ($transaction->status==0) Pending @elseif ($transaction->status==1) Success  @elseif ($transaction->status==9) Rejected @endif</td>
                                <td>{!! $transaction->details_user !!}</td>
                                <td>{!! $transaction->created_at !!}</td>

                            </tr>
                        <?PHP $i++;$n++; ?>
                        @endforeach

                    </tbody>

			    </table>
		    </div>

	    </div>




    </div>

</div>



         <!--End content-->
            </div>
        </div>

    </div>



@stop
