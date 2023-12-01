@extends('ar.cpanel.layout')
@section('content')


   <div class="col-lg-9 col-lg-pull-3 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

    {!! Form::open(['url'=>'ar/cpanel/internal-transfers'])  !!}


@if(count($accounts)<=0)<h2>ليس لديك حسابات حقيقية - يمكنك اضافة حسابك من <a href="/ar/cpanel/add-account">هنا</a> او يمكنك عمل حساب جديد من <a href="/ar/cpanel/open-account">هنا</a></h2> @endif

@if(count($accounts)>0)

<h4 class="text-right" style="display:none;"><span style="color:red;">*تنبيه</span> اذا كان رصيد الحساب المحول اليه بالسالب برجاء اخبار الدعم الفنى قبل التحويل .</h4>

            <div class="col-sm-6 col-sm-push-6">


                <br />
                <div class="row">


                    <label class="col-sm-4 col-sm-push-8">التحويل من:</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                            <select class="form-control" name="transfer_from" id="transfer_from" onchange="TransferFrom(this.value)" required >
                                <option value="" disabled selected >- اختر -</option>
                                @foreach($accounts as $account)
                                <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | @if($account->account_type ==1) حساب شخصى @endif @if($account->account_type ==2) حساب IB @endif</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                <label class="col-sm-4 col-sm-push-8">كلمة سر الحساب:</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                              <input  type="text" class="form-control " placeholder="كلمة سر الحساب المرسل"   id="password" name="password" required>

                        </div>
                    </div>
                </div>

                <br />
                <div class="row">


                    <label class="col-sm-4 col-sm-push-8">التحويل الى:</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                            <select class="form-control" name="transfer_to" id="transfer_to" onchange="TransferTo(this.value)" required >
                                <option value="" disabled selected >- اختر -</option>
                                @foreach($accounts as $account)
                                <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} |  @if($account->account_type ==1) حساب شخصى @endif @if($account->account_type ==2) حساب IB @endif</option>
                                @endforeach
                                <option id="otheraccount" value="other">اخرى</option>
                            </select>
                            <input type="number" class="form-control hidden" name="other_account" id="other_account" placeholder="رقم الحساب" />
                        </div>
                    </div>
                </div>
<!--
                <br />
                <div class="row">
                <label class="col-sm-4 col-sm-push-8">كلمة سر الحساب:</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                              <input  type="text" class="form-control " placeholder="كلمة سر الزائر للحساب"   id="reciver_password" name="reciver_password" required>

                        </div>
                    </div>
                </div> -->

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
                    <label class="col-sm-4 col-sm-push-8">مبلغ التحويل:</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                            <input type="number" class="form-control" name="amount" id="amount" step="0.01" required />

                        </div>
                    </div>
                </div>


                <br />
                <div class="row">
                    <label class="col-sm-4 col-sm-push-8"></label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                             <input class="btn btn-success form-control" type="submit" value="تحويل الان" />

                        </div>
                    </div>
                </div>
            {!! Form::close() !!}



               </div>


            <div class="col-sm-5 col-sm-pull-6" >

                <div id="demoaccount">
                    <h3>تفاصيل التحويلات الداخلية</h3>

                    <p>ايداع سريع - فورى</p>

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
