@extends('ar.cpanel.layout')
@section('content')


   <div class="col-lg-9 col-lg-pull-3 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

@if(count($ib_accounts)<0)
<h3>ليس لديك اى حسابات IBs</h3>
@else



    @if(count($allref)<1)
    <h3>ليس لديك اى عملاء</h3>



    <input class="form-control" id="MyRef" value="https://www.jmibrokers.com/ar?myref={{$user->id+10000}}" style="background:#ddd;" /><br />
    <button onclick="CopyText()" class="btn btn-success">نسخ الرابط</button>

    <script type="text/javascript">
        function CopyText()
        {
        $('input#MyRef').val('https://www.jmibrokers.com/ar?myref={{$user->id+10000}}');
        var copyText = document.getElementById("MyRef");
        copyText.select();
        document.execCommand("Copy");
        }

    </script>

    @else

    <table class="table table-bordered">

        <thead>
            <td>#</td>
            <td>الأسم </td>
            <td>البريد الالكترونى</td>
            <td>البلد</td>
            <td>الموبايل</td>
            <td>الحسابات الحقيقية</td>


        </thead>
        <tbody>
<?PHP $i=1;$ii=1; ?>
<?PHP
$ref_live_accounts0=array();
foreach($ref_live_accounts as $ref_live){array_push($ref_live_accounts0, $ref_live);}
?>
            @foreach($allref as $ref)
            <tr>
                <td>{{ $ii }}</td>
                <td>{{ $ref->fullname }}</td>
                <td>{{ $ref->email }}</td>
                <td>{{ $ref->country }}</td>
                <td>{{ $ref->country_code }}{{ $ref->mobile }}</td>
                <td>
<?PHP
$filtered_live= array_filter($ref_live_accounts0, function($ref_live_accounts0)use($ref){
   return ($ref_live_accounts0->website_accounts_id==$ref->id);
});

if(count($filtered_live)>0){
    echo '<span class="btn btn-success"  data-toggle="modal" data-target="#live-'.$ref->id.'" >'.count($filtered_live).' عرض</span>';
}
?>
@if(count($filtered_live)>0)
<!-- Modal -->
<div id="live-{{$ref->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>رقم الحساب</td>
                                <td>السيرفر</td>
                                <td>نوع الحساب</td>
                                <td>المجموعة</td>
                                <td>العملة</td>
                                <td>الرافعة</td>
                                <td>كلمة سر الزائر</td>

                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$n=0;  ?>
                                @foreach($filtered_live as $account0)

                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $account0->account_id !!}</td>
                                        <td>JMI-Server</td>
                                        <td>@if($account0->account_type ==1) حساب شخصى @endif @if($account0->account_type ==2) حساب IB @endif</td>
                                        <td>
                                            @if($account0->account_group ==3) حساب اسبريد متغير @endif
                                            @if($account0->account_group ==5)حساب اسكالبينج  @endif
                                            @if($account0->account_group ==1) حساب اسبريد ثابت @endif
                                            @if($account0->account_group ==4) حساب بوتص @endif

                                        </td>

                                        <td>دولار أمريكى</td>
                                        <td>1:{!! $account0->leverage !!}</td>
                                        <td>{!! $account0->investor_password !!}</td>



                                    </tr>
                                    <?PHP $i++;$n++; ?>
                                @endforeach
                        </tbody>
                    </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">اغلق</button>
      </div>
    </div>

  </div>
</div>

@endif


                                        </td>

            </tr>
<?PHP $ii++; ?>
            @endforeach


        </tbody>
    </table>


    @endif













@endif



    </div>

</div>






            <!--End content-->
            </div>
        </div>

    </div>



@stop
