<?
@extends('master')

@section('content')

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

        <div class="container">
        <div class="col-sm-4">


                                <h2>Forgot Password</h2>
                             <form id="resetpassword" autocomplete="off" method="post" action="{{ URL::to('/ru/forgot-password') }}" class="form-horizontal">
                                <p style="color:red;text-align:center;"><?PHP echo Session::get('Error'); ?></p>
                                <p style="color:green;text-align:center;"><?PHP echo Session::get('Pass'); ?></p>
                                 <input type="hidden"  name="base_url" id="base_url" value="{{URL::asset('/')}}" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input name="username_email" type="text" id="email" placeholder="Plaese enter your registered email or username" class="form-control" required/>
                                        <span id="ctl00_ContentPlaceHolder1_RegularExpressionValidator1" style="color:White;display:none;">Пожалуйста, введите действующий адрес электронной почты</span>
                                        <br />
                                        <input type="submit" name="resetpassword" value="Сброс пароля"  id="resetpassword" class="btn btn-success submit" />
                                    </form>

        </div>
        </div>
 



@endsection