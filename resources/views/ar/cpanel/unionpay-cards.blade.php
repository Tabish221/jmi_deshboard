@extends('ar.cpanel.layout')
@section('content')

<div class="col-lg-9 col-lg-pull-3 col-md-12 col-sm-12 mainContent">
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
                        لطلب بطاقتك الخاصة,  يجب عليك أكمال <a href="/ar/cpanel/profile">الملف الشخصى</a>
                  </div>


              @endif

              @if(count($documents)< 2)
                  <div class="alert alert-warning"  id="live-alert" style-="display: none;">
                      لطلب بطاقتك الخاصة, يجب ان يكون لديك 2 من  <a href="/ar/cpanel/documents"> المستندات</a> معتمدين
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

      <h4>حدود ورسوم البطاقة</h4>

      <ul class="package-features-list package-features-list2" style="height: 270px;list-style-type: none;">
                        <li><i class="fa fa-check" aria-hidden="true"></i> الحد الأقصى لحجم التذكرة - $2,000</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> الحجم الشهري الأقصى - $20,000</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> الحد الأقصى لعدد الساعات - مرتين في الساعة</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> الحد الأقصى لعدد اليوم - 20 مرة في اليوم</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> مبلغ تحميل البطاقة - $2,000</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> الحد الأقصى لمبلغ رصيد البطاقة - $50,000</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> معاملة من بطاقة الى بطاقة - $2,000</li>

                        <li><i class="fa fa-check" aria-hidden="true"></i> السحب من أجهزة الصراف الألى $4.15</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>  الأستعلام عن الرصيد من خلال أجهزة الصراف الألى $4.15</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> نقاط البيع - $1.25</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> إعادة تحميل البطاقة - 3.50$ أو 1.5٪ ، أيهما أعلى</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> تحويل من بطاقة الى بطاقة - $7.00</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> الرسوم الشهرية - $3.00</li>
                  </ul>
      @if(count($unionpay_cards) > 0)

        @if($unionpay_cards[0]->status==0)
            <button class="btn btn-success" onclick="return false;" >لديك طلب بطاقة معلق وجارى التنفيذ</button>
        @elseif($unionpay_cards[0]->status==2)
            <button id="order_card" class="btn btn-success" onclick="order_card()">أحصل على بطاقتك الأن</button>
        @endif
      @else
      <button id="order_card" class="btn btn-success" onclick="order_card()">أحصل على بطاقتك الأن</button>
      @endif

      <p id="success-msg" style="color:green;"></p>
      <p id="error-msg" style="color:red;"></p>

</div>

@if(count($unionpay_cards) > 0)

  @if($unionpay_cards[0]->status==0)
      <p style="color:green;">* جارى العمل على طلب بطاقتك و سوف نوافيك بالتحديثات</p>
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
$("button#order_card").text("جارى الأرسال ...");
$("button#order_card").prop("disabled",true);

  $.ajax({
    type: "get",
      url :"/en/cpanel/order-unionpay-card/",
      success:function(result){
          if(result=='true'){

            $("p#success-msg").text("تم استلام طلبك بنجاح وتم أرسال الارشادات الى بريدك الالكترونى .");
            $("p#success-msg").show();
            $("p#error-msg").hide();
            $("button#order_card").text("أحصل على بطاقتك الأن ");

            $("button#order_card").prop("disabled",true);
          }else if(result=='false'){

            $("p#error-msg").text("خطأ , حاول مرة اخرى");
            $("p#error-msg").show();
            $("button#order_card").text("أحصل على بطاقتك الأن ");
            $("button#order_card").prop("disabled",false);

          }
      },
        error:function(result){

          $("p#error-msg").text("خطأ , حاول مرة اخرى");
            $("p#error-msg").show();
            $("button#order_card").text("أحصل على بطاقتك الأن ");
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
