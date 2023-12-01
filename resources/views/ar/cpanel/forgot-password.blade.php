<?
@extends('ar.master')

@section('content')

 @if (session('status-success'))
    <div class="alert alert-success"  style="direction:rtl;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status-success') }}
    </div>
@endif
@if (session('status-error'))
    <div class="alert alert-danger"  style="direction:rtl;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status-error') }}
    </div>
@endif

        <div class="container">
        <div class="col-sm-4 col-sm-push-8" style="direction:rtl;">


                                <h2>فقدت كلمة السر</h2>
                             <form id="resetpassword" autocomplete="off" method="post" action="{{ URL::to('/ar/forgot-password') }}" class="form-horizontal">
                                <p style="color:red;text-align:center;"><?PHP echo Session::get('Error'); ?></p>
                                <p style="color:green;text-align:center;"><?PHP echo Session::get('Pass'); ?></p>
                                 <input type="hidden"  name="base_url" id="base_url" value="{{URL::asset('/')}}" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input name="username_email" type="text" id="email" placeholder="ادخل البريد او اسم المستخدم المسجل" class="form-control" required/>
                                        <span id="ctl00_ContentPlaceHolder1_RegularExpressionValidator1" style="color:White;display:none;">من فضلك ادخل بريد الكترونى او اسم مستخدم صحيح</span>
                                        <br />
                                        <input type="submit" name="resetpassword" value="تغيير كلمة السر"  id="resetpassword" class="btn btn-success submit" />
                                    </form>

        </div>
        </div>
 



@endsection