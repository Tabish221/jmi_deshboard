<?
@extends('master')

@section('content')

<div class="row-fluid">
    <div class="contact">
        <div>
            <div class=""  style="text-align:center;margin:0 auto;width:300px;">

                
                                <div class=""  style="text-align:center;margin:0 auto;width:300px;">

                                    <div class="login">
                                        <h2 class="title">Клиентская зона </h2>
                                            <div class="form">
                                            <p style="color:red;text-align:center;">{{$errors->first('newpassword')}}</p>
                                            <p style="color:red;text-align:center;">{{$errors->first('confirmnewpassword')}}</p>
                                                 <form id="changepassword" autocomplete="off" method="post" action="{{ URL::to('/ru/resetpassword') }}" class="form-horizontal">
                                                    <p style="color:red;text-align:center;"><?PHP echo Session::get('Error'); ?></p>
                                                    <p style="color:green;text-align:center;"><?PHP echo Session::get('Pass'); ?></p>
                                                     <input type="hidden"  name="base_url" id="base_url" value="{{URL::asset('/')}}" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input name="newpassword" type="password" id="newpassword" placeholder="новый пароль:" class="form-control" /><br />
                                                    <input name="confirmnewpassword" type="password" id="confirmnewpassword" placeholder="Подтвердите Пароль :" class="form-control" /><br />
                                                    
                                                    <input type="submit" name="changesubmit" value="Изменить сейчас"  id="changesubmit" class="btn btn-success submit" />
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


            </div>
        </div>
    </div>
</div>

                   <?PHP if(session::has('Pass')){
                echo "<script>
                var  base_url = $('input#base_url').val();
                        if(confirm('Ваш пароль был успешно изменен')){
                         
                         location.replace(base_url+'/login');
                        }else{
                         location.replace(base_url+'/login');
                        }
                      </script>";
                };                  
                       ?>


@endsection