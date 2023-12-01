<?
@extends('master')

@section('content')

    <div class="loginpage"   style="background-image:url('/assets/img/loginpagebg.webp')">
    <div class="container">

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

            <div class="col-lg-4 col-sm-6 col-xs-8 col-xxs"  >

                <div class="login pdtb40">
                    <h2 class="margin-0 color-white"><span class="fa fa-arrow-circle-right jmiyellow"></span><strong>JMI</strong> Brokers</h2>
                        <p class="color-white padding-left-15" >Client Login </p>
                             <form id="" autocomplete="off" method="post" action="/en/slogin"  class="form-horizontal">
                                <p class="error text-center"><?PHP echo Session::get('Error'); ?></p>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input name="username" type="text" placeholder="Username or Email" class="txt-box" required/>
                                <input name="password" type="Password"  placeholder="Password :" class="txt-box" required />

                                <input type="submit" name="loginsubmit" value="Login"  id="loginsubmit" class="form-btn" />

                            </form>

                                <p class="text-center"><a href="{{ URL::to('/en/forgot-password') }}">Forget My Password !</a></p>
                                <p class="text-center"><a href="{{ URL::to('/en/signup') }}">Register Now !</a></p>
                </div>
            </div>

    </div>
    </div>





@endsection
