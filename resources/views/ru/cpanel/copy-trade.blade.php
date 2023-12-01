@extends('ru.cpanel.layout')
@section('content')

    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->

    {!! Form::open(['url'=>'ru/cpanel/copy-trade'])  !!}
        <h4 class="col-sm-push-1">Copy Trade</h4>
        <hr />
        <div>
            <div class="col-sm-6 col-sm-push-1">

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




                                <br />
                                <div class="row">


                                    <label class="col-sm-4">Копировать из:</label>
                                    <div class="col-sm-8">
                                        <div class="controls">
                                            <select class="form-control" name="copy_from" id="copy_from" onchange="TransferTo(this.value)" required >
                                                <option value="" disabled selected >- Выбирать -</option>
                                                @foreach($accounts as $account)
                                                <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | Live @if($account->account_type ==1) Individual Account @endif @if($account->account_type ==2) IB Account @endif</option>
                                                @endforeach
                                                <option id="otheraccount" value="other">Другой</option>
                                            </select>
                                            <input type="number" class="form-control hidden" name="other_account" id="other_account" placeholder="Номер счета" />
                                        </div>
                                    </div>
                                </div>


                                <br />
                                <div class="row">


                                    <label class="col-sm-4">Скопировать в:</label>
                                    <div class="col-sm-8">
                                        <div class="controls">
                                            <select class="form-control" name="copy_to" id="copy_to" onchange="TransferFrom(this.value)" required >
                                                <option value="" disabled selected >- Выбирать -</option>
                                                @foreach($accounts as $account)
                                                <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | Live @if($account->account_type ==1) Individual Account @endif @if($account->account_type ==2) IB Account @endif</option>
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
                                              <input  type="text" class="form-control " placeholder="Реальный пароль получателя"   id="password" name="password" required>

                                        </div>
                                    </div>
                                </div>



                                <br />
                                <div class="row">
                                <label class="col-sm-4">Процент копирования:</label>
                                    <div class="col-sm-8">
                                        <div class="controls">
                                              <input  type="number" class="form-control " placeholder="Процент копирования %"   id="percentage" name="percentage" required>

                                        </div>
                                    </div>
                                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8 ">
                        <div class="controls">
                             <input class="btn btn-success form-control" type="submit" value="Отправить" />

                        </div>
                    </div>
                </div>





            {!! Form::close() !!}

            </div>
        </div>

<div class="col-sm-12">


@if(count($copy_trades)>0)

    <h4 class="col-sm-push-1">Торговля связанными копиями</h4>
        <hr />
        <div>
            <div class="col-sm-10 col-sm-push-1">

                <br />
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Копировать из</td>
                                <td>Скопировать в</td>
                                <td>Процент копирования</td>
                                <td>Статус</td>
                                <td>Действие</td>
                            </tr>
                        </thead>
                        <tbody><?PHP $i=1; ?>
                                @foreach($copy_trades as $copy_trade)

                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $copy_trade->copy_from !!}</td>
                                        <td>{!! $copy_trade->copy_to !!}</td>
                                        <td>{!! $copy_trade->percentage !!}</td>
                                        <td class="@if($copy_trade->status==0) text-danger @endif @if($copy_trade->status==1) text-success @endif">@if($copy_trade->status==0) В ожидании @endif @if($copy_trade->status==1) Копирование @endif @if($copy_trade->status==8) Отмена @endif @if($copy_trade->status==9) Отменено @endif</td>
                                        @if($copy_trade->status!==8 && $copy_trade->status!==9)
                                        {!! Form::open(['url'=>'en/cpanel/copy-trade/'.$copy_trade->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <td><button class="btn btn-success" type="submit" >Удалить</button></td>
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

                <br />

            </div>
        </div>
@endif
</div>


    </div>
</div>



<script type="text/javascript">

function confirmDelete() {
var result = confirm("Вы уверены, что хотите отменить эту сделку копирования? Вы не можете отменить это?");

if (result) {
        return true;
    } else {
        return false;
    }
}

</script>



            <!--End content-->
            </div>
        </div>

    </div>

@stop
