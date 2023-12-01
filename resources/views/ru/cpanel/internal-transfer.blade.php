@extends('ru.cpanel.layout')
@section('content')



    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

        <!--start content -->
    {!! Form::open(['url'=>'ru/cpanel/internal-transfers'])  !!}


@if(count($accounts)<=0)<h2>У вас нет реального аккаунта, вы можете добавить свой аккаунт из <a href="/ru/cpanel/add-account"> Здесь </a> или откройте новый аккаунт от <a href="/ru/cpanel/open-account"> Здесь </a></h2> @endif

@if(count($accounts)>0)

<h4 class="text-left"  style="display:none;"><span style="color:red;">*Запись:</span>Пожалуйста, свяжитесь со службой поддержки перед переводом, если баланс вашего получателя отрицательный (-). </h4>



            <div class="col-sm-6">


                <br />
                <div class="row">


                    <label class="col-sm-4">Трансфер из:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="transfer_from" id="transfer_from" onchange="TransferFrom(this.value)" required >
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
                <label class="col-sm-4">Пароль от аккаунта:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                              <input  type="text" class="form-control " placeholder="Настоящий пароль отправителя"   id="password" name="password" required>

                        </div>
                    </div>
                </div>

                <br />
                <div class="row">


                    <label class="col-sm-4">Перевести на:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="transfer_to" id="transfer_to" onchange="TransferTo(this.value)" required >
                                <option value="" disabled selected >- Выбрать -</option>
                                @foreach($accounts as $account)
                                <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | реальный @if($account->account_type ==1)Индивидуальный аккаунт@endif @if($account->account_type ==2) IB Account @endif</option>
                                @endforeach
                                <option id="otheraccount" value="other">Другой</option>
                            </select>
                            <input type="number" class="form-control hidden" name="other_account" id="other_account" placeholder="Номер счета" />
                        </div>
                    </div>
                </div>

                <!-- <br />
                <div class="row">
                <label class="col-sm-4">Получатель Пароль инвестора:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                              <input  type="text" class="form-control " placeholder="Получатель Пароль инвестора"   id="reciver_password" name="reciver_password" required>

                        </div>
                    </div>
                </div> -->

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
                    <label class="col-sm-4">Сумма перевода:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="number" class="form-control" name="amount" id="amount" step="0.01" required />

                        </div>
                    </div>
                </div>


                <br />
                <div class="row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8 ">
                        <div class="controls">
                             <input class="btn btn-success form-control" type="submit" value="Передача сейчас" />

                        </div>
                    </div>
                </div>
            {!! Form::close() !!}



               </div>


            <div class="col-sm-5 col-sm-push-1" >

                <div id="demoaccount">
                    <h3>Подробности внутреннего перевода</h3>

                    <p>Экспресс перевод (Мгновенный перевод)</p>

                </div>



            </div>

@endif

	</div>

</div>

<script type="text/javascript">

function TransferFrom(value)
{
$('select#transfer_to').val('');
$('select#transfer_to option').show();
$('select#transfer_to option[value='+value+']').hide();

}

function TransferTo(value)
{
if(value=='other')
{

$('input#other_account').removeClass('hidden')

}else{
$('input#other_account').addClass('hidden')


}


}



</script>




            <!--End content-->
            </div>
        </div>

    </div>



@stop
