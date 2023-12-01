@extends('ar.cpanel.layout')
@section('content')


   <div class="col-lg-9 col-lg-pull-3 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">


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

		    	<a class="btn @if ( Request::segment(4) =='') btn-primary @else btn-default @endif " href="/ar/cpanel/transaction-history">الكل</a>
		    	<a class="btn @if ( Request::segment(4) =='deposit') btn-primary @else btn-default @endif "  href="/ar/cpanel/transaction-history/deposit">الايداع</a>
		    	<a class="btn @if ( Request::segment(4) =='withdraw') btn-primary @else btn-default @endif "  href="/ar/cpanel/transaction-history/withdraw">السحب</a>
		    	<a class="btn @if ( Request::segment(4) =='transfers') btn-primary @else btn-default @endif "  href="/ar/cpanel/transaction-history/transfers">التحويلات الداخلية</a>

		    </div>
		    <div class="col-sm-12"><br />
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>النوع</td>
                            <td>من خلال</td>
                            <td>رقم الحساب</td>
                            <td>المبلغ</td>
                            <td>الحالة</td>
                            <td>التفاصيل</td>
                            <td>التاريخ</td>
                        </tr>
                    </thead>
                    <tbody>


						@if(count($transactions)<=0)
	   						<tr><td colspan="8">  ليس لديك اى تحويلات</td></tr>
						@endif

						<?PHP $i=1;$n=0; ?>
                        @foreach($transactions as $transaction)

               			 	<tr>
                            	<td>{!! $i !!}</td>
                                <td>@if ($transaction->type==0) ايداع @elseif ($transaction->type==1) سحب @elseif ($transaction->type==2) تحويل داخلى @endif</td>
                                <td>{!! $transaction->via !!} {!! $transaction->via_to !!}</td>
                                <td>{!! $transaction->account !!}</td>
                                <td>{!! $transaction->amount !!} @if ($transaction->currency==1) دولار امريكى @endif</td>
                                <td @if ($transaction->status==0) style="background:yellow;" @elseif ($transaction->status==1)  style="background:green;color: #fff;"  @elseif ($transaction->status==9)  style="background:red;color: #fff;" @endif >@if ($transaction->status==0) Pending @elseif ($transaction->status==1) تم بنجاح  @elseif ($transaction->status==9) تم الرفض @endif</td>
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
