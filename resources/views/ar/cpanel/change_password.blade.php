@extends('ar.cpanel.layout')
@section('content')


<div class="col-lg-9 col-lg-pull-3 col-md-12 col-sm-12 mainContent">
   <div class="panel panel-default">
        <div class="panel-heading">
                <h4 class="panel-title">{{ $title}}</h4>
        </div>
                                
        <div class="panel-body">


{!! Form::open(['url'=>'ar/cpanel/password','id'=>'changepassword'])  !!}


                <div class="control-group">

                    <div class=" form-group col-sm-12">
                    <label class="col-lg-4 col-md-4 control-label" for="NewPassword">كلمة السر الحالية <span class="redStar">*</span></label>

                         <div class="col-lg-8 col-md-8">
                              <input  type="password" class="form-control " placeholder="كلمة السر الحالية"  id="currentpassword" name="currentpassword" required>
                         </div>
                   </div>

                    <div class="form-group col-sm-12">

                    <label class="col-lg-4 col-md-4 control-label" for="NewPassword">كلمة السر الجديدة <span class="redStar">*</span></label>
                         <div class="col-lg-8 col-md-8">
                              <input  type="password" class="form-control " placeholder="كلمة السر الجديدة"  id="password" name="password" required>
                         </div>
                   </div>

                   <div class="form-group col-sm-12">
                    <label class="col-lg-4 col-md-4 control-label" for="NewPassword">تأكيد كلمة السر الجديدة <span class="redStar">*</span></label>


                    <div class="col-lg-8 col-md-8">
                        <input  type="password" class="form-control  " placeholder="تأكيد كلمة السر الجديدة" id="confirmpassword" name="confirmpassword" required>
                        <br />

                            <button type="submit" class="btn btn-success submit" >تغيير كلمة السر</button>

                    </div>
                   </div>
                 </div>




{!! Form::close() !!}



    </div>

</div>


@stop
