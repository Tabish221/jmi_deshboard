@extends('ru.cpanel.layout')
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

		    	<a class="btn @if ( Request::segment(4) =='') btn-primary @else btn-default @endif " href="/ru/cpanel/transaction-history">Все</a>
		    	<a class="btn @if ( Request::segment(4) =='deposit') btn-primary @else btn-default @endif "  href="/ru/cpanel/transaction-history/deposit">Депозит </a>
		    	<a class="btn @if ( Request::segment(4) =='withdraw') btn-primary @else btn-default @endif "  href="/ru/cpanel/transaction-history/withdraw">Изымать</a>
		    	<a class="btn @if ( Request::segment(4) =='transfers') btn-primary @else btn-default @endif "  href="/ru/cpanel/transaction-history/transfers">Внутренние переводы</a>

		    </div>
		    <div class="col-sm-12"><br />
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>тип </td>
                            <td>Через</td>
                            <td>Счет</td>
                            <td>Количество</td>
                            <td>Положение дел</td>
                            <td>Детали</td>
                            <td>Дата</td>
                        </tr>
                    </thead>
                    <tbody>


						@if(count($transactions)<=0)
	   						<tr><td colspan="8">  У вас нет транзакций</td></tr>
						@endif

						<?PHP $i=1;$n=0; ?>
                        @foreach($transactions as $transaction)

               			 	<tr>
                            	<td>{!! $i !!}</td>
                                <td>@if ($transaction->type==0) депозит @elseif ($transaction->type==1) Изымать @elseif ($transaction->type==2) Internal Transfer @endif</td>
                                <td>{!! $transaction->via !!} {!! $transaction->via_to !!}</td>
                                <td>{!! $transaction->account !!}</td>
                                <td>{!! $transaction->amount !!} @if ($transaction->currency==1) доллар США @endif</td>
                                <td @if ($transaction->status==0) style="background:yellow;" @elseif ($transaction->status==1)  style="background:green;color: #fff;"  @elseif ($transaction->status==9)  style="background:red;color: #fff;" @endif >@if ($transaction->status==0) В ожидании @elseif ($transaction->status==1) успех  @elseif ($transaction->status==9) Отклонено @endif</td>
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
