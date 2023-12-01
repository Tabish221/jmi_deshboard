@extends('ar.cpanel.layout')
@section('content')

   <div class="col-lg-9 col-lg-pull-3 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">


    {!! Form::open(['url'=>'ar/cpanel/documents','files'=>true])  !!}
        <h4 class="col-sm-push-1">مستندات الملف الشخصى</h4>
        <hr />
        <div>
            <div class="col-sm-6 col-sm-push-5">

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
                    <label class="col-sm-4 col-sm-push-8">نوع المستند</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                            <select class="form-control" name="document_type" id="document_type" required>
                                <option value="">- اختر -</option>
                            <optgroup label="اثبات الهوية">
                                <option value="0">كارت الهوية القومية</option>
                                <option value="1">جواز سفر</option>
                                <option value="2">رخصة قيادة</option>
                            </optgroup>
                            <optgroup label="اثبات العنوان">
                                <option value="3">كشف حساب بنكى</option>
                                <option value="4">كشف بطاقة ائتمان</option>
                                <option value="5">فاتورة تليفون</option>
                                <option value="6">فاتورة كهرباء</option>
                                </optgroup>
                            <optgroup label="صورة الكارت">
                                <option value="7">صورة كارت ائتمان</option>
                            </optgroup>


                            </select>
                        </div>
                    </div>
                </div>

                    <br />

                <div class="row">
                    <label class="col-sm-4 col-sm-push-8">اختر الملف</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-primary btn-file" style=" padding: 0px; border: 0px; ">
                                         <input type="file" id="document" name="document" accept="image/*,application/pdf" class="form-control" required>
                                        </span>
                                    </span>
                                </div>
                        </div>
                    </div>
                </div>

                    <br />

                <div class="row">
                    <label class="col-sm-4 col-sm-push-8">الوصف</label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                        <textarea class="form-control" name="document_description" required></textarea>
                        </div>
                    </div>
                </div>


                <br />
                <div class="row">
                    <label class="col-sm-4 col-sm-push-8"></label>
                    <div class="col-sm-8 col-sm-pull-4">
                        <div class="controls">
                             <input class="btn btn-success form-control" type="submit" value="رفع" />

                        </div>
                    </div>
                </div>





            {!! Form::close() !!}

            </div>
        </div>

<div class="col-sm-12">


@if(count($documents)>0)

    <h4 class="col-sm-push-1">قائمة المستندات </h4>
        <hr />
        <div>
            <div class="col-sm-10 col-sm-push-1">

                <br />
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>نوع المستند</td>
                                <td>المستند</td>
                                <td>الوصف</td>
                                <td>الحالة</td>
                                <td>تحكم</td>
                            </tr>
                        </thead>
                        <tbody><?PHP $i=1;$types=['كارت الهوية القومية','جواز سفر','رخصة قيادة','كشف حساب بنكى','كشف بطاقة ائتمانt','فاتورة تليفون','فاتورة كهرباء','صورة بطاقة الائتمان','اتفاقية العميل'];$status=['جارى المراجعة','معتمد']; ?>
                                @foreach($documents as $document)

                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $types[$document->type] !!}</td>
                                        <td><a href="{{Storage::disk('do')->url($document->document)}}" class="btn btn-success" target="__blank" >عرض المستند</a></td>
                                        <td>{!! $document->description !!}</td>
                                        <td class="@if($document->status==0) text-danger @endif @if($document->status==1) text-success @endif">{!! $status[$document->status] !!}</td>

                                        @if($document->type!==8)
                                        {!! Form::open(['url'=>'ar/cpanel/documents/'.$document->id,'method'=>'delete','onsubmit' => 'return confirmDelete()']) !!}
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
var result = confirm("Are you sure you want to delete this document, You can't undo this?");

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
