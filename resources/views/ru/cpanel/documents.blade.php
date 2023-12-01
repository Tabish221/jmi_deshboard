@extends('ru.cpanel.layout')
@section('content')

    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

    {!! Form::open(['url'=>'ru/cpanel/documents','files'=>true])  !!}
        <h4 class="col-sm-push-1">Документы профиля</h4>
        <hr />
        <div>
            <div class="col-sm-6 col-sm-push-1">

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

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <label class="col-sm-4">тип документа</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="document_type" id="document_type" required>
                                <option value="">- Выбрать -</option>
                            <optgroup label="Proof of ID">
                                <option value="0">Национальное удостоверение личности</option>
                                <option value="1">Паспорт</option>
                                <option value="2">Водительское удостоверение</option>
                            </optgroup>
                            <optgroup label="Proof of address">
                                <option value="3">выписка по банковскому счету</option>
                                <option value="4">Заявление о кредитных картах</option>
                                <option value="5">Счет за телефон</option>
                                <option value="6">Счет за электричество</option>
                                </optgroup>
                            <optgroup label="Card Scans">
                                <option value="7">Сканирование кредитной карты</option>
                            </optgroup>

                            </select>
                        </div>
                    </div>
                </div>

                    <br />

                <div class="row">
                    <label class="col-sm-4">Выберите документ</label>
                    <div class="col-sm-8">
                        <div class="controls">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-primary btn-file" style=" padding: 0px; border: 0px; ">
                                             <input type="file" class="form-control" id="document" name="document" accept="image/*,application/pdf" required>
                                        </span>
                                    </span>
                                </div>
                        </div>
                    </div>
                </div>

                    <br />

                <div class="row">
                    <label class="col-sm-4">Описание</label>
                    <div class="col-sm-8">
                        <div class="controls">
                        <textarea class="form-control" name="document_description" required></textarea>
                        </div>
                    </div>
                </div>


                <br />
                <div class="row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8 ">
                        <div class="controls">
                             <input class="btn btn-success form-control" type="submit" value="Загрузить" />

                        </div>
                    </div>
                </div>





            {!! Form::close() !!}

            </div>
        </div>

<div class="col-sm-12">


@if(count($documents)>0)

    <h4 class="col-sm-push-1"> Ваши загруженные документы</h4>
        <hr />
        <div>
            <div class="col-sm-10 col-sm-push-1">

                <br />
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>тип документа</td>
                                <td>Документ</td>
                                <td>Описание</td>
                                <td>Положение дел</td>
                                <td>действие</td>
                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$types=["Национальное удостоверение личности", "паспорт", "водительские права", "выписка с банковского счета", "выписка с кредитной карты", "телефонный счет", "счет за электричество", "сканирование кредитной карты", "договор о счете клиента"];$status=['Обзор','Одобренный']; ?>
                                @foreach($documents as $document)

                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $types[$document->type] !!}</td>
                                        <td><a href="{!! $document->document !!}" class="btn btn-success" target="__blank" >Просмотр документа</a></td>
                                        <td>{!! $document->description !!}</td>
                                        <td class="@if($document->status==0) text-danger @endif @if($document->status==1) text-success @endif">{!! $status[$document->status] !!}</td>

                                        @if($document->type!==8)
                                        {!! Form::open(['url'=>'ru/cpanel/documents/'.$document->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
                                        <td><button class="btn btn-success" type="submit" >удалять</button></td>
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
var result = confirm("Вы уверены, что хотите удалить этот документ? Вы не можете отменить это?");

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
