@extends('ar.cpanel.layout')
@section('content')

<div class="col-lg-9 col-lg-pull-3 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->

    {!! Form::open(['url'=>'ar/cpanel/copy-trade'])  !!}
        <h4 class="col-sm-push-1">نسخ الصفقات</h4>
        <hr />
        <div>
          <div class="col-sm-6 col-sm-push-6">

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


                                    <label class="col-sm-4 col-sm-push-8">نسخ الصفقات من:</label>
                                    <div class="col-sm-8 col-sm-pull-4">
                                        <div class="controls">
                                            <select class="form-control" name="copy_from" id="copy_from" onchange="TransferTo(this.value)" required >
                                                <option value="" disabled selected >- اختر -</option>
                                                @foreach($accounts as $account)
                                                <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} |  حقيقى @if($account->account_type ==1) حساب شخصى @endif @if($account->account_type ==2) حساب IB @endif</option>
                                                @endforeach
                                                <option id="otheraccount" value="other">حساب اخر</option>
                                            </select>
                                            <input type="number" class="form-control hidden" name="other_account" id="other_account" placeholder="رقم الحساب" />
                                        </div>
                                    </div>
                                </div>


                                <br />
                                <div class="row">


                                    <label class="col-sm-4 col-sm-push-8">نسخ الصفقات الى:</label>
                                    <div class="col-sm-8 col-sm-pull-4">
                                        <div class="controls">
                                            <select class="form-control" name="copy_to" id="copy_to" onchange="TransferFrom(this.value)" required >
                                                <option value="" disabled selected >- اختر -</option>
                                                @foreach($accounts as $account)
                                                <option value="{!! $account->account_id !!}" >{!! $account->account_id !!} | حقيقى @if($account->account_type ==1) حساب شخصى @endif @if($account->account_type ==2) حساب IB @endif</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>





                                <br />
                                <div class="row">
                                <label class="col-sm-4  col-sm-push-8">كلمة سر الحساب المستقبل:</label>
                                    <div class="col-sm-8  col-sm-pull-4">
                                        <div class="controls">
                                              <input  type="text" class="form-control " placeholder="كلمة سر الحساب المستقبل"   id="password" name="password" required>

                                        </div>
                                    </div>
                                </div>



                                <br />
                                <div class="row">
                                <label class="col-sm-4  col-sm-push-8">نسبة نسخ الصفقات:</label>
                                    <div class="col-sm-8  col-sm-pull-4">
                                        <div class="controls">
                                              <input  type="number" class="form-control " placeholder="نسبة نسخ الصفقات %"   id="percentage" name="percentage" required>

                                        </div>
                                    </div>
                                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4  col-sm-push-8"></label>
                    <div class="col-sm-8  col-sm-pull-4">
                        <div class="controls">
                             <input class="btn btn-success form-control" type="submit" value="نسخ الصفقات" />

                        </div>
                    </div>
                </div>





            {!! Form::close() !!}

            </div>
        </div>

<div class="col-sm-12">


@if(count($copy_trades)>0)

    <h4 class="col-sm-push-1">نسخ الصفقات الخاص بك</h4>
        <hr />
        <div>
            <div class="col-sm-10 col-sm-push-1">

                <br />
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>نسخ الصفقات من</td>
                                <td>نسخ الصفقات الى</td>
                                <td>نسبة نسخ الصفقات</td>
                                <td>الحالة</td>
                                <td>تحكم</td>
                            </tr>
                        </thead>
                        <tbody><?PHP $i=1; ?>
                                @foreach($copy_trades as $copy_trade)

                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $copy_trade->copy_from !!}</td>
                                        <td>{!! $copy_trade->copy_to !!}</td>
                                        <td>{!! $copy_trade->percentage !!}</td>
                                        <td class="@if($copy_trade->status==0) text-danger @endif @if($copy_trade->status==1) text-success @endif">@if($copy_trade->status==0) قيد التنفيذ @endif @if($copy_trade->status==1) جارى النسخ @endif @if($copy_trade->status==8) قيد الالغاء @endif @if($copy_trade->status==9) تم الالغاء @endif</td>
                                        @if($copy_trade->status!==8 && $copy_trade->status!==9)
                                        {!! Form::open(['url'=>'en/cpanel/copy-trade/'.$copy_trade->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <td><button class="btn btn-success" type="submit" >حذف</button></td>
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
var result = confirm("هل انت متأكد من الغاء النسخ?");

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
