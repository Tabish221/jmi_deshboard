@extends('ru.cpanel.layout')
@section('content')


    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">


    {!! Form::open(['url'=>'ru/cpanel/add-account'])  !!}


        <hr />
        <div>




@if($user->country =='' )
    <div class="alert alert-warning"  >
       Чтобы открыть счет, вы должны заполнить <a href="/ru/cpanel/profile">Профиль</a>
    </div>


@endif

@if(count($documents)< 2)
    <div class="alert alert-warning"  id="live-alert--0-" style="display: none;">
       Чтобы открыть аккаунт, вы должны были утвердить 2 <a href="/ru/cpanel/documents"> документы</a> По крайней мере, включая соглашение с клиентом
    </div>

@endif

@if(count($documents)>1)
    @if($documents[0]->status==0 && $documents[1]->status==0)
        <div class="alert alert-warning "  id="live-alert--0-" style="display: none;">
       Чтобы открыть аккаунт, вы должны были утвердить 2 <a href="/ru/cpanel/documents"> документы</a> По крайней мере, включая соглашение с клиентом
        </div>
    @endif
@endif

@if(count($documents)>1)
<?PHP $x=0; ?>
    @foreach($documents as $document)
        @if($document->type==8)
        <?PHP $x=1; ?>
        @endif
    @endforeach
    @if($x==0)
            <div class="alert alert-warning "  id="live-alert--0-" style="display: none;">
               Чтобы открыть счет, вы должны были утвердить Соглашение с клиентом<a href="/ru/cpanel/documents"> документы</a>
            </div>
    @endif
@endif

@if (count($live_accounts)>99)
    <div class="alert alert-warning " id="live-alert" style="display: none;" >
       Вы достигли максимально допустимого количества (3) реальных счетов
    </div>
@endif
@if (count($demo_accounts)>99)
    <div class="alert alert-warning"  id="demo-alert" >
       Вы достигли максимально допустимого количества (3) демо-счетов
    </div>
@endif


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




            <div class="col-sm-9">




                <br />

                <div class="row" id="account_type" >


                    <label class="col-sm-4">тип аккаунта:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="account_type" id="account_type"  required >
                                <option value="" disabled selected >- Выбрать -</option>
                                <option value="1">Индивидуальный</option>
                                <option value="2">представляющий брокер (IB)</option>


                            </select>
                        </div>
                    </div>
                </div>

                <br />

                <div class="row" style-="display:none;">


                    <label class="col-sm-4">Группа счетов:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="account_group" id="account_group"  onchange="Group(this.value);" required >
                                <option value="" disabled selected >- Выбрать -</option>
                                <option value="1" class="forlive" style-="display:none;"> СЧЕТ ДЛЯ СКАЛЬПИНГА </option>
                                <option value="5" class="forlive" style-="display:none;">Фиксированный спред </option>
                                <option value="3" class="forlive" style-="display:none;">СЧЕТ С ПЕРЕМЕННЫМ СПРЕДОМ</option>
                                <option value="4" class="forlive" style-="display:none;"> бонусный счет</option>

                            </select>
                        </div>
                    </div>
                </div>


                <br />
                <div class="row">
                    <label class="col-sm-4">Валютная база:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="currency" id="currency"  required >
                                <option value="1" selected>доллар США</option>
                            </select>
                        </div>
                    </div>
                </div>


                <br />
                <div class="row" id="login">
                    <label class="col-sm-4">MT4 Логин пользователя:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="number" class="form-control" name="account_id" id="account_id" required />

                        </div>
                    </div>
                </div>

                <br />
                <div class="row" id="login">
                    <label class="col-sm-4">MT4 Логин Пароль:</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="password" class="form-control" name="password" id="password" required />

                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8 ">
                        <div class="controls">
                          <input type="number" class="form-control" name="account_radio_type" value="1" required style="display:none;"/>


                             <input class="btn btn-success form-control" type="submit" id="submit" value="Добавить аккаунт" />

                        </div>
                    </div>
                </div>
            {!! Form::close() !!}



               </div>




        </div>


    </div>

</div>

<br>


<script>

$('a.btn-success').click(function(){
$('table').css({
   "border":"unset"
});
$("a.btn-success").text("Выбрать сейчас");
$("a.btn-success").css({
   "border-color": "#ffc926",
   "background":"#ffc926"
});

$(this).closest('table').css({
   "border":"2px solid #0059b2"
});
$(this).text("Выбрано");
$(this).css({
   "border-color": "#0059b2",
   "background":"#0059b2"
});
$("#account_group").val($(this).attr('val'));
});

</script>



            <!--End content-->
            </div>
        </div>

    </div>



@stop
