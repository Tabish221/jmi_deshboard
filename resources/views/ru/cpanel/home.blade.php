@extends('ru.cpanel.layout')
@section('content')


    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>


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

            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                     {{ $error }}
                 </div>
                @endforeach
            @endif



            <div class="panel-body" id="newhomepage">


              <div class="col-sm-10 col-sm-push-1">

                <div class="row" id="">
                    <!-- <div class="col-sm-4">

                      {!! Form::open(['url'=>'en/cpanel/profilepicture','files'=>true])  !!}

                      @if($user->profilePicture != '')
                        <img loading="lazy"  src="/assets/cpanel/profilePictures/{{$user->profilePicture}}" id="Profileimg" />
                        @else
                        <img loading="lazy"  src="/assets/cpanel/img/empty-person.png" id="Profileimg" />

                        @endif
                        <span class="fa fa-edit" onclick="changeProfilePicture()" style=" width: 25px; height: 25px; position: absolute; left: 83px; bottom: -20px; font-size: 30px; color: #0059b2;cursor: pointer;" ></span>
                          <input type="file" class="form-control" name="profilePicture" id="profilePicture" onchange="form.submit()" style="display:none;" />
                          <script>function changeProfilePicture(){$('input#profilePicture').click();}</script>
                        {!! Form::close() !!}

                    </div> -->

                    <div class="col-sm-8">
                      <h2>

                          Привет, <span class="userName">{!! $user->fullname !!}</span>

                      </h2>
                    </div>
                </div>

                <div class="row" id="homepage_headline1" >
                  <div  id="homepage_headline2" >
                  </div>
                </div>

                <div class="row" >
                    <div class="col-sm-8">

                        <h4><span style="width:15px;height:15px;border-radius:50%;background:#ffc926;display: inline-block;"></span> СЧЕТА НА ФОРЕКС</h4>
                    </div>
                    <div class="col-sm-4">
                        <h5>  <?PHP echo array_sum($balances) ?> <span>доллар США</span></h5>
                    </div>
                  </div>
                  <div class="row" >
                      <div class="col-sm-8">

                          <h4><span style="width:15px;height:15px;border-radius:50%;background:#0059b2;display: inline-block;"></span>ТОРГОВЫЕ СЧЕТА</h4>
                      </div>
                      <div class="col-sm-4">
                        <h5>  0 <span>доллар США</span></h5>
                      </div>
                    </div>
                    <div class="row" >
                        <div class="col-sm-8">

                            <h4><span style="width:15px;height:15px;border-radius:50%;display: inline-block;"></span> ОБЩАЯ СТОИМОСТЬ</h4>
                        </div>
                        <div class="col-sm-4">
                          <h5>  <?PHP echo array_sum($balances) ?> <span>доллар США</span></h5>
                        </div>
                      </div>

                        <br /><br />


                        @if(count($accounts)<=0)




                        <?PHP if(array_search("/cpanel/live-accounts", array_column($notifications_all, "notification_link")) !== false){ ?>

                          <div class="alert alert-success" style="display:none;">
                              Ваш запрос на открытие счета в настоящее время рассматривается
                          </div>

                          <div class="row forexaccount">
                                <div class="col-sm-12">
                                  <h5 style=" color: #0059b2; ">ФОРЕКС СЧЕТ</h5>
                                  <h5>Ваш запрос на открытие счета в настоящее время рассматривается</h5>
                                </div>
                          </div>
                          <?PHP }else{ ?>

                            <div class="row forexaccount">
                                  <div class="col-sm-12">
                                    <h5 style=" color: #0059b2; ">ФОРЕКС СЧЕТ</h5>
                                    <h5>   У вас нет реальных счетов</h5>
                                  </div>
                            </div>
                            <div class="alert alert-success" style="display:none;">
                            У вас нет реальных счетов
                            </div>

                          <?PHP } ?>

                        @endif

                          <?PHP $i=1;$n=0;  ?>
                          @foreach($accounts as $account)
                          <?PHP if(  $balances[$n] != ''){ ?>

                            <div class="row forexaccount" >
                                <div class="col-sm-8">

                                  <h5 style=" color: #0059b2; ">Форекс {!! $account->account_id !!}</h5>
                                  <h5> {!! $names[$n] !!}</h5>
                                </div>
                                <div class="col-sm-4">
                                  <br />
                                  <h5>  {!! $balances[$n] !!} <span>доллар США</span></h5>
                                </div>
                              </div>


                            <?PHP }$n++; ?>
                          @endforeach

                          <?PHP  $request_i=0; $request_accept_i=0;  $request_denied_i=0;
                           foreach($notifications_all as $notification00){
                            if(strpos($notification00, 'Opening account request processed successfully') !== false){
                              $request_i++;
                            }
                            if(strpos($notification00, 'Live Account') !== false && strpos($notification00, 'Has Been Opened Successfully') !== false){
                              $request_accept_i++;
                            }
                            // if(strpos($notification00, 'Opening account request processed successfully') !== false){
                            //   $request_denied_i++;
                            // }

                          }
                          if($request_i > ($request_accept_i+$request_denied_i)){ ?>


                              <div class="alert alert-success" style="display:none;">
                                  Ваш запрос на открытие счета в настоящее время рассматривается
                              </div>

                              <div class="row forexaccount">
                                    <div class="col-sm-12">
                                      <h5 style=" color: #0059b2; ">ФОРЕКС СЧЕТ</h5>
                                      <h5>Ваш запрос на открытие счета в настоящее время рассматривается</h5>
                                    </div>
                              </div>
                            <?PHP } ?>

                        <div class="row tradingaccount" style="display:none;">
                            <div class="col-sm-8">

                              <h5 style=" color: #ffc926; ">ТОРГОВЛЯ {accountnumber}</h5>
                              <h5 style=" color: #fff; "> {accountname}</h5>
                            </div>
                            <div class="col-sm-4">
                              <br />
                              <h5 style=" color: #fff; ">  000000 <span>доллар США</span></h5>
                            </div>
                          </div>



                </div>

              </div>


            <!--End content-->
            </div>
        </div>

    </div>



@stop
