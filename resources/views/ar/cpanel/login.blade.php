<?
@extends('ar.master')

@section('content')
<style>
  #newLogin
  {
    display: flex;
    align-items: center;
  }
  #newLogin h2
  {
    color:#0059b2;
    font-family: 'Roboto-Bold';
    margin: 0px 10px;
  }

  input:-webkit-autofill,
  input:-webkit-autofill:hover,
  input:-webkit-autofill:focus,
  input:-webkit-autofill:active
  {
   -webkit-box-shadow: 0 0 0 30px white inset !important;
  }
  #loginsubmit
  {
    background-color: #fdbe01 !important;
    color: white !important;
    border-radius: 10px;
    border: 1px solid #bfbfbf !important;
    padding: 3px 35px !important;
    width: auto !important;
    display: flex;
  }
  .text-center
  {
    color:#838383 !important;
    font-weight:bold;
    font-size: 13px;
  }
  .text-center a
  {
    color:#0059b2 !important;
    padding:3px;
  }

  .pdtb40
  {
    max-width: 270px !important;
  }
  .bigDiv
  {
    float: right !important;
  }
  @media only screen and (max-width: 500px)
    {
      .bigDiv
      {
        width:100% !important;
      }
    }
    #open
    {
      display:none ;
    }
    #open , #close
    {
      font-size: 15px;
      padding-left: 5px;

    }
    #btnEye
    {
      border: none;
      background-color: white;
      padding: 0px;
      border-radius: inherit;
    }
    .input-container
        {
          display: flex;
          background-color: white;
          border: 1px solid #bfbfbf;
          margin-bottom:10px;
          max-width: 270px !important;
          border-radius: 10px;
        }
    #myPass
      {
        width: calc(100% - 19px);
      }
    .txt-box
      {
        margin:0px;
        border-radius: inherit;
        padding: 6px 7px 6px 0px !important;
      }
</style>

    <div class="loginpage"  style="background-image:url('/assets/m/img/pic2.png')">
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

            <div class="bigDiv col-lg-3 col-sm-5 col-xs-6 col-xxs-12"  >

                <div class="login pdtb40" dir="rtl" >
                            <div id="newLogin">
                              <img loading="lazy" src ="/assets/m/img/icon.png">
                              <h2>تسجيل الدخول</h2>
                            </div>
                             <form id="" autocomplete="off" method="post" action="/ar/login"  class="form-horizontal">
                                <p class="error text-center"><?PHP echo Session::get('Error'); ?></p>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="input-container">
                                  <input name="username" type="text" placeholder="اسم المستخدم او الايميل" class="txt-box" required/>
                                </div>
                                  <div class="input-container">
                                  <input id="myPass" name="password" type="Password"  placeholder="كلمة السر :" class="txt-box" required />
                                  <button id="btnEye" onclick="toggleEye()" type="button"><i id="open" class="fas fa-eye"></i> <i id="close" class="fas fa-eye-slash"></i></button>
                                </div>
                                <input type="submit" name="loginsubmit" value="تسجيل الدخول"  id="loginsubmit" class="form-btn" />

                            </form>

                                <span class="text-center" style="display: block;">نسيت<a href="{{ URL::to('/ar/forgot-password') }}"> كلمة السر</a>؟</span>
                                <span class="text-center" style="display: block;">ليس لديك حساب؟<a href="{{ URL::to('/ar/signup') }}">تسجيل الدخول</a></span>
                </div>
            </div>

    </div>
    </div>


    <script>
    function toggleEye() {
      var x = document.getElementById("myPass");
      var open = document.getElementById("open");
      var close = document.getElementById("close");
      if (x.type === "password") {
        x.type = "text";
        open.style.display="block";
        close.style.display="none";
      } else {
        x.type = "password";
        open.style.display="none";
        close.style.display="block";
      }
    }
    </script>


@endsection
