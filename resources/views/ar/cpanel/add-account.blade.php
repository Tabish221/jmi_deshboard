@extends('ar.cpanel.layout')
@section('content')


    <div class="col-lg-9 col-lg-pull-3 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">


    {!! Form::open(['url'=>'ar/cpanel/add-account'])  !!}


        <hr />
        <div>




@if($user->country =='' )
    <div class="alert alert-warning"  >
       لفتح حساب يجب ان يكتمل <a href="/en/cpanel/profile">الملف الشخصى</a>
    </div>


@endif

@if(count($documents)< 2)
    <div class="alert alert-warning"  id="live-alert---" style="display: none;">
       لفتح حساب يجب ان يكون لديك عدد 2 <a href="/en/cpanel/documents"> مستند</a> موافق عليه من قبل الادارة , على الاقل اتفاقية العميل
    </div>

@endif

@if(count($documents)>1)
    @if($documents[0]->status==0 && $documents[1]->status==0)
        <div class="alert alert-warning "  id="live-alert---" style="display: none;">
       لفتح حساب يجب ان يكون لديك عدد 2 <a href="/en/cpanel/documents"> مستند</a> موافق عليه من قبل الادارة , على الاقل اتفاقية العميل
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
            <div class="alert alert-warning "  id="live-alert---" style="display: none;">
       لفتح حساب يجب ان يكون لديك عدد 2 <a href="/en/cpanel/documents"> مستند</a> موافق عليه من قبل الادارة , على الاقل اتفاقية العميل
            </div>
    @endif
@endif

@if (count($live_accounts)>99)
    <div class="alert alert-warning " id="live-alert" style="display: none;" >
       لقدد وصلت الى الحد الاقصى من عدد الحسابات المسموحة (3) من الحسابات الحقيقية
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



            <div class="col-sm-9 col-sm-push-3">

                <br />

                <div class="row" id="account_type" >


                    <label class="col-sm-4 col-sm-push-8">نوع الحساب:</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                            <select class="form-control" name="account_type" id="account_type"   required >
                                <option value="" disabled selected >- اختر -</option>
                                <option value="1">حساب شخصى</option>
                                <option value="2">IB</option>


                            </select>
                        </div>
                    </div>
                </div>

                <br />

                <div class="row" style-="display:none;">

                    <label class="col-sm-4 col-sm-push-8">مجموعة الحساب:</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                            <select class="form-control" name="account_group" id="account_group"     required >
                                  <option value="" disabled selected >- اختر -</option>
                                  <option value="1" class="forlive" style-="display:none;">حساب اسبريد  ثابت</option>
                                  <option value="5" class="forlive" style-="display:none;">حساب سكالبينج</option>
                                  <option value="3" class="forlive" style-="display:none;">حساب اسبريد  متحرك</option>
                                  <option value="4" class="forlive" style-="display:none;">حساب بونص</option>
                            </select>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4 col-sm-push-8"> العملة:</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                            <select class="form-control" name="currency" id="currency"   required >
                                <option value="1" selected>دولار امريكى</option>
                            </select>
                        </div>
                    </div>
                </div>


                <br />
                <div class="row" id="login">
                    <label class="col-sm-4 col-sm-push-8">رقم حساب ميتاتريدر:</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                            <input type="number" class="form-control" name="account_id" id="account_id" required />

                        </div>
                    </div>
                </div>

                <br />
                <div class="row" id="login">
                    <label class="col-sm-4 col-sm-push-8">كلمة سر ميتاتريدر:</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                            <input type="password" class="form-control" name="password" id="password" required />

                        </div>
                    </div>
                </div>




                <br />
                <div class="row">
                    <label class="col-sm-4 col-sm-push-8"></label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                          <input type="number" class="form-control" name="account_radio_type" value="1" required style="display:none;"/>


                             <input class="btn btn-success form-control" type="submit" id="submit" value="اضف الحساب" />

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
$("a.btn-success").text("أختر الان");
$("a.btn-success").css({
   "border-color": "#ffc926",
   "background":"#ffc926"
});

$(this).closest('table').css({
   "border":"2px solid #0059b2"
});
$(this).text("تم أختياره");
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
