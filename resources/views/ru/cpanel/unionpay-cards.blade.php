@extends('ru.cpanel.layout')
@section('content')

    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->

        <hr />
        <div>
            <div class="col-sm-11 col-sm-push-1">


              @if($user->country =='' )
                  <div class="alert alert-warning"  >
                     Чтобы открыть счет, вы должны заполнить <a href="/ru/cpanel/profile">Профиль</a>
                  </div>


              @endif

              @if(count($documents)< 2)
                  <div class="alert alert-warning"  id="live-alert--0-" style-="display: none;">
                     Чтобы открыть аккаунт, вы должны были утвердить 2 <a href="/ru/cpanel/documents"> документы</a>
                  </div>

              @endif

              
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
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

<div class="col-sm-12">


<div col-sm-6>
    <img loading="lazy" src="/assets/cpanel/img/unionpay-card-only.jpg" />
</div>

<div >

      <h4>Лимиты и комиссии по карте</h4>

      <ul class="package-features-list package-features-list2" style="height: 270px;list-style-type: none;">
                  <li><i class="fa fa-check" aria-hidden="true"></i> Максимальный размер билета - $2,000</li>
                  <li><i class="fa fa-check" aria-hidden="true"></i> Максимальный ежемесячный объем - $20,000</li>
                  <li><i class="fa fa-check" aria-hidden="true"></i> Максимальное количество часов - 2 раза в час</li>
                  <li><i class="fa fa-check" aria-hidden="true"></i> Максимальное количество дней - 20 раз в день</li>
                  <li><i class="fa fa-check" aria-hidden="true"></i> Сумма пополнения карты - $2,000</li>
                  <li><i class="fa fa-check" aria-hidden="true"></i> Максимальный баланс карты - $50,000</li>
                  <li><i class="fa fa-check" aria-hidden="true"></i> Операция с карты на карту - $2,000</li>

                  <li><i class="fa fa-check" aria-hidden="true"></i> Банкомат - Снятие $4.15</li>
                  <li><i class="fa fa-check" aria-hidden="true"></i> Банкомат - запрос баланса $4.15</li>
                  <li><i class="fa fa-check" aria-hidden="true"></i> POS - $1.25</li>
                  <li><i class="fa fa-check" aria-hidden="true"></i> Reload Card - 3,50$ США или 1,5%, в зависимости от того, что больше</li>
                  <li><i class="fa fa-check" aria-hidden="true"></i> Перевод с карты на карту - $7.00</li>
                  <li><i class="fa fa-check" aria-hidden="true"></i> Ежемесячная плата - $3.00</li>
                  </ul>

      @if(count($unionpay_cards) > 0)

        @if($unionpay_cards[0]->status==0)
            <button class="btn btn-success" onclick="return false;" >У вас есть ожидающий запрос карты</button>
        @elseif($unionpay_cards[0]->status==2)
            <button id="order_card" class="btn btn-success" onclick="order_card()">Закажи карту сейчас</button>
        @endif
      @else
            <button  id="order_card" class="btn btn-success" onclick="order_card()">Закажи карту сейчас</button>
      @endif

      <p id="success-msg" style="color:green;"></p>
      <p id="error-msg" style="color:red;"></p>

</div>

@if(count($unionpay_cards) > 0)

  @if($unionpay_cards[0]->status==0)
      <p style="color:green;">* Ваш запрос карты еще не завершен ..., мы сообщим вам обновления</p>
  @elseif($unionpay_cards[0]->status==2)
      <p style="color:red;">* Your card request has been refuced because Bla Bla Bla</p>
  @endif

@endif


@if(count($unionpay_cards)>0)
@if($unionpay_cards[0]->status==1)
<!--
    <h4 class="col-sm-push-1"> Your Active Cards</h4>
        <hr />
        <div>
            <div class="col-sm-10 col-sm-push-1">

                <br />
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>File Type</td>
                                <td>File</td>
                                <td>Description</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody><?PHP // $i=1;$types=['National Identity Card','Passport','Driver License','Bank account statement','Credit Card Statement','Phone Bill','Electricity bill','Credit Card Scan','Customer Account Agreement'];$status=['Reviewing','Approved']; ?>
                                @foreach($documents as $document)

                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $types[$document->type] !!}</td>
                                        <td><a href="{!! $document->document !!}" class="btn btn-success" target="__blank" >View Document</a></td>
                                        <td>{!! $document->description !!}</td>
                                        <td class="@if($document->status==0) text-danger @endif @if($document->status==1) text-success @endif">{!! $status[$document->status] !!}</td>
                                        {!! Form::open(['url'=>'en/cpanel/documents/'.$document->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <td><button class="btn btn-success" type="submit" >Delete</button></td>
                                        {!! Form::close() !!}
                                    </tr>
                                    <?PHP // $i++; ?>
                                @endforeach
                        </tbody>
                    </table>

                </div>

                <br />

            </div>
        </div>  -->
        @endif
        @endif
</div>


    </div>
</div>

<script type="text/javascript">

function order_card() {
$("button#order_card").text("Sending...");
$("button#order_card").prop("disabled",true);

  $.ajax({
    type: "get",
      url :"/en/cpanel/order-unionpay-card/",
      success:function(result){
          if(result=='true'){

            $("p#success-msg").text("Ваш запрос отправлен успешно, мы будем уведомлять вас об обновлениях");
            $("p#success-msg").show();
            $("p#error-msg").hide();
            $("button#order_card").text("Закажи карту сейчас");

            $("button#order_card").prop("disabled",true);
          }else if(result=='false'){

            $("p#error-msg").text("Ошибка, попробуйте позже");
            $("p#error-msg").show();
            $("button#order_card").text("Закажи карту сейчас");
            $("button#order_card").prop("disabled",false);

          }
      },
        error:function(result){

          $("p#error-msg").text("Ошибка, попробуйте позже");
            $("p#error-msg").show();
            $("button#order_card").text("Закажи карту сейчас");
            $("button#order_card").prop("disabled",false);
      }
  });
}
</script>



            <!--End content-->
            </div>
        </div>

    </div>

@stop
