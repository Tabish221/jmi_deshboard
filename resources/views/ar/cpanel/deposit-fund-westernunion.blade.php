@extends('ar.cpanel.layout')
@section('content')

    <div class="col-lg-9 col-lg-pull-3 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">


    {!! Form::open(['url'=>'ar/cpanel/deposit-fund/westernunion','files'=>true])  !!}


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


@if(count($accounts)<=0)<h2>ليس لديك حسابات حقيقية, يمكنك اضافة حسابك من  <a href="/ar/cpanel/add-account">هنا</a> او افتح حساب جديد من <a href="/ar/cpanel/open-account">هنا</a></h2> @endif

@if(count($accounts)>0)

            <div class="col-sm-6 col-sm-push-6">


                <br />
                <div class="row">


                    <label class="col-sm-4 col-sm-push-8">رقم الحساب:</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                            <select class="form-control" name="account_number" id="account_number" required >
                                <option value="" disabled selected >- اختر -</option>
                                @foreach($accounts as $account)
                                <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | Live @if($account->account_type ==1) حساب شخصى @endif @if($account->account_type ==2) حساب IB @endif</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4 col-sm-push-8">العملة:</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                            <select class="form-control" name="currency" id="currency" required >
                                <option value="1" selected>دولار امريكى</option>
                            </select>
                        </div>
                    </div>
                </div>


                <br />
                <div class="row" id="amount">
                    <label class="col-sm-4 col-sm-push-8">مبلغ الايداع:</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                            <input type="number" class="form-control" name="amount" id="amount" required />

                        </div>
                    </div>
                </div>

                <br />
                <div class="row" id="amount">
                    <label class="col-sm-4 col-sm-push-8">رفع صورة الايداع:</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                            <input type="file" class="form-control" name="ttcopy" id="ttcopy" required />

                        </div>
                    </div>
                </div>



                <br />
                <div class="row">
                    <label class="col-sm-4 col-sm-push-8"></label>
                    <div class="col-sm-8  col-sm-pull-4">
                        <div class="controls">
                             <input class="btn btn-success form-control" type="submit" value="ايداع الان" />

                        </div>
                    </div>
                </div>
            {!! Form::close() !!}



               </div>


            <div class="col-sm-5 col-sm-pull-6" >

                <div id="demoaccount">
                <img loading="lazy" src="/assets/cpanel/img/westernunion.png" alt="Bank Wire"  class="max-width-100" />
                    <h3>تفاصيل ويسترن يونيون</h3>
                    <p style="color:red;">* من فضلك تأكد من ان المبلغ بعملة الدولار الأمريكى</p>
                    <p>الأسم الأول : RAYANE</p>
                    <p>الأسم الأخير : BEYDOUN</p>
                    <p>الدولة : Lebanon</p>
                    <p>العملة : USD</p>
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
