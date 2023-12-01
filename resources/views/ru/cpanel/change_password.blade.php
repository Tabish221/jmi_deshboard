@extends('ru.cpanel.layout')
@section('content')

    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">


{!! Form::open(['url'=>'ru/cpanel/password','id'=>'changepassword'])  !!}


                <div class="control-group">

                    <div class=" form-group col-sm-12">
                    <label class="col-lg-4 col-md-4 control-label" for="NewPassword">Прежний пароль <span class="redStar">*</span></label>

                         <div class="col-lg-8 col-md-8">
                              <input  type="password" class="form-control " placeholder=" Прежний пароль"  id="currentpassword" name="currentpassword" required>
                         </div>
                   </div>

                    <div class="form-group col-sm-12">

                    <label class="col-lg-4 col-md-4 control-label" for="NewPassword">Новый пароль<span class="redStar">*</span></label>
                         <div class="col-lg-8 col-md-8">
                              <input  type="password" class="form-control " placeholder=" Новый пароль"  id="password" name="password" required>
                         </div>
                   </div>

                   <div class="form-group col-sm-12">
                    <label class="col-lg-4 col-md-4 control-label" for="NewPassword">Подтвердите Пароль <span class="redStar">*</span></label>


                    <div class="col-lg-8 col-md-8">
                        <input  type="password" class="form-control  " placeholder="Подтвердите Пароль" id="confirmpassword" name="confirmpassword" required>
                        <br />

                            <button type="submit" class="btn btn-success submit" >Обновить пароль</button>

                    </div>
                   </div>
                 </div>




{!! Form::close() !!}



    </div>

</div>


@stop
