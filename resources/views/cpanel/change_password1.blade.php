@extends('cpanel.layout')
@section('content')



        <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

              <!--start content -->



{!! Form::open(['url'=>'en/cpanel/password','id'=>'changepassword'])  !!}


                <div class="control-group">

                    <div class=" form-group col-sm-12">
                    <label class="col-lg-4 col-md-4 control-label" for="NewPassword">Current Password <span class="redStar">*</span></label>

                         <div class="col-lg-8 col-md-8">
                              <input  type="password" class="form-control " placeholder=" Current Password"  id="currentpassword" name="currentpassword" required>
                         </div>
                   </div>

                    <div class="form-group col-sm-12">

                    <label class="col-lg-4 col-md-4 control-label" for="NewPassword">New Password <span class="redStar">*</span></label>
                         <div class="col-lg-8 col-md-8">
                              <input  type="password" class="form-control " placeholder=" New Password"  id="password" name="password" required>
                         </div>
                   </div>

                   <div class="form-group col-sm-12">
                    <label class="col-lg-4 col-md-4 control-label" for="NewPassword">Confirm Password <span class="redStar">*</span></label>


                    <div class="col-lg-8 col-md-8">
                        <input  type="password" class="form-control  " placeholder="Confirm New Password" id="confirmpassword" name="confirmpassword" required>
                        <br />

                            <button type="submit" class="btn btn-success submit" >Update Password</button>

                    </div>
                   </div>
                 </div>




{!! Form::close() !!}



          <!--End content-->
            </div>
        </div>

    </div>

@stop
