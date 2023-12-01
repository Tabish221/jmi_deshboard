@extends('ru.cpanel.layout')
@section('content')


    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>
                                    
            <div class="panel-body">
            
        <!--start content -->


    {!! Form::open(['url'=>'ru/cpanel/withdraw-fund/bankwire'])  !!}


        <hr />
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


@if(count($accounts)<=0)<h2>У вас нет реального аккаунта, вы можете добавить свой аккаунт из <a href="/ru/cpanel/add-account"> Здесь </a> или откройте новый аккаунт от <a href="/ru/cpanel/open-account"> Здесь </a></h2> @endif

@if(count($accounts)>0)

            <div class="col-sm-6">


                <br />
                <div class="row">    


                    <label class="col-sm-4">Номер счета:</label>         
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="account_number" id="account_number" required >
                                <option value="" disabled selected >- Выбрать -</option>
                                @foreach($accounts as $account)
                                <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | реальный @if($account->account_type ==1)Индивидуальный аккаунт@endif @if($account->account_type ==2) IB Account @endif</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">          
                    <label class="col-sm-4">Валюта:</label>         
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="currency" id="currency" required >
                                <option value="1" selected>доллар США</option>
                            </select>
                        </div>
                    </div>
                </div>


                <br />
                <div class="row" id="amount">          
                    <label class="col-sm-4">Сумма снятия:</label>         
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="number" class="form-control" name="amount" id="amount" required />

                        </div>
                    </div>
                </div>

                <br />
                <div class="row" id="amount">          
                    <label class="col-sm-4">Bank Name:</label>         
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="text" class="form-control" name="bank_name" id="bank_name" required />

                        </div>
                    </div>
                </div>

                <br />
                <div class="row" id="amount">          
                    <label class="col-sm-4">Bank Swift:</label>         
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="text" class="form-control" name="bank_swift" id="bank_swift" required />

                        </div>
                    </div>
                </div>

                <br />
                <div class="row" id="amount">          
                    <label class="col-sm-4">Bank Account or IBan:</label>         
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="text" class="form-control" name="bank_iban" id="bank_iban" required />

                        </div>
                    </div>
                </div>



                <br />
                <div class="row">          
                    <label class="col-sm-4"></label>         
                    <div class="col-sm-8 ">
                        <div class="controls">
                             <input class="btn btn-success form-control" type="submit" value="Вывести сейчас" />

                        </div>
                    </div>
                </div>
            {!! Form::close() !!}



               </div>


            <div class="col-sm-5 col-sm-push-1" >

                <div id="demoaccount">
                <img loading="lazy" src="/assets/cpanel/img/bankwire.png" alt="Bank Wire"  class="max-width-100" />
                    <h3>Bank Wire Снятие реквизитов</h3>

                    <p>Important Terms and Conditions <br /> Kindly note that by funding your account and/or by submitting a withdrawal request you agree on all the terms and conditions including those in relation to deposits and withdrawals. <br /> The following are an integral part of the terms and conditions: <br /> The Client agrees that the Company may charge the Client transfer fees and/or any other charges in any case where a withdrawal request is made by the Client without any trading activity taking place between that withdrawal request and the last deposit of the Client. <br /> The Client agrees that the Company may, at its own discretion and at any time and/or when in its sole opinion an abuse of the 0.00% transfer fees benefit has occurred, request and/or deduct any and/or all the transfer fee amounts from the client’ s account(s) and/or close the client’s account(s) and/or take any other action may consider necessary, as a compensation for the said abuse. <br />The Client acknowledges and confirms that the Company may, at its own discretion and at any time and/or for whatsoever reason and/or without any prior notification to the client and/or without the prior consent of the client, to increase the amount of 0.00% transfer fees which is demonstrated at the Company’s Website-Trading Accounts-Account Funding page to any other amount the Company believes necessary.</p>
                </div>



            </div>


@endif


        </div>


    </div>

</div>

<br>





       
            <!--End content-->
            </div>
        </div>

    </div>



@stop