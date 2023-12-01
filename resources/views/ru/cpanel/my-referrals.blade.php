@extends('ru.cpanel.layout')
@section('content')



    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

        <!--start content -->

@if(count($ib_accounts)<0)
<h3>У вас нет счетов IB</h3>
@else



    @if(count($allref)<1)
    <h3>У вас еще нет рефералов</h3>



    <input class="form-control" id="MyRef" value="https://www.jmibrokers.com/en?myref={{$user->id+10000}}" style="background:#ddd;" /><br />
    <button onclick="CopyText()" class="btn btn-success">Скопировать текст</button>

    <script type="text/javascript">
        function CopyText()
        {
        $('input#MyRef').val('https://www.jmibrokers.com/en?myref={{$user->id+10000}}');
        var copyText = document.getElementById("MyRef");
        copyText.select();
        document.execCommand("Copy");
        }

    </script>

    @else

    <table class="table table-bordered">

        <thead>
            <td>#</td>
            <td>ФИО</td>
            <td>Эл. адрес</td>
            <td>Страна</td>
            <td>мобильный</td>
            <td>Реальные счета</td>


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
    echo '<span class="btn btn-success"  data-toggle="modal" data-target="#live-'.$ref->id.'" >'.count($filtered_live).' Show</span>';
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
                                <td>Счет</td>
                                <td>сервер</td>
                                <td>Type</td>
                                <td>группа</td>
                                <td>валюта</td>
                                <td>левередж</td>
                                <td>инвестор</td>

                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$n=0;  ?>
                                @foreach($filtered_live as $account0)

                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $account0->account_id !!}</td>
                                        <td>JMI-Server</td>
                                        <td>@if($account0->account_type ==1)Индивидуальный аккаунт@endif @if($account0->account_type ==2) IB учетная запись @endif</td>
                                        <td>
                                            @if($account0->account_group ==1) Переменная учетная запись@endif
                                            @if($account0->account_group ==2) ECN учетная запись @endif
                                            @if($account0->account_group ==3) Счет с фиксированным спредом @endif
                                            @if($account0->account_group ==4) Фиксированный спред + бонусный счет @endif

                                        </td>

                                        <td>доллар США</td>
                                        <td>1:{!! $account0->leverage !!}</td>
                                        <td>{!! $account0->investor_password !!}</td>



                                    </tr>
                                    <?PHP $i++;$n++; ?>
                                @endforeach
                        </tbody>
                    </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">близко</button>
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




    @if(count($referrals_statics)>0 )

        <table class="table table-bordered"  style="display:none;">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Country</th>
                  <th>Date</th>
                </tr>

            </thead>
            <tbody><?PHP $i=1; ?>
              @foreach($referrals_statics as $ref_statics)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$ref_statics->country}}</td>
                  <td>{{$ref_statics->created_at}}</td>
                  <?PHP $i++; ?>
                </tr>
              @endforeach
            </tbody>
          </table>

    @else
        <h3 style="display:none;">You Don't Have Any Visits</h3>
    @endif









@endif



    </div>

</div>






            <!--End content-->
            </div>
        </div>

    </div>



@stop
