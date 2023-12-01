<?
@extends('master')

@section('content')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

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

      .txt-box
      {
        margin:0px;
        border-radius: inherit;
        padding: 6px 0px 6px 7px !important;
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

      }
      .bigDiv
      {
        max-width: 270px !important;
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
          padding-right: 5px;

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
    </style>
    <div class="loginpage"   style="background-image:url('/assets/m/img/pic.png')">
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

                <div class="login pdtb40">
                            <div id="newLogin">
                              <img loading="lazy" src ="/assets/m/img/icon.png">
                              <h2>Login1</h2>
                            </div>
                             <form id="" autocomplete="off" method="post" action="/en/login"  class="form-horizontal">
                                <p class="error text-center"><?PHP echo Session::get('Error'); ?></p>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="input-container">
                                  <input name="username" type="text" placeholder="Username or Email" class="txt-box" required/>
                                </div>
                                <div class="input-container">
                                  <input id="myPass" name="password" type="Password"  placeholder="Password :" class="txt-box" required />
                                  <button id="btnEye" onclick="toggleEye()" type="button"><i id="open" class="fas fa-eye"></i> <i id="close" class="fas fa-eye-slash"></i></button>
                                  </div>
                                  <input type="submit" name="loginsubmit" value="Login"  id="loginsubmit" class="form-btn" />

                            </form>

                                <p class="text-center">Forget<a href="{{ URL::to('/en/forgot-password') }}"> Password </a> asdasdasd?</p>
                                <p class="text-center">Don't have an account?<a href="{{ URL::to('/en/signup') }}"> Sign Up</a></p>
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
