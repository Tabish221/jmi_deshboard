<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> {!! $title !!}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


        <!-- Bootstrap 3.3.4 -->
        <link href="{{ url('/') }}/assets/new_cpanel/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="{{ url('/') }}/assets/new_cpanel/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/new_cpanel/css/animate.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/new_cpanel/css/portalStyle3.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/new_cpanel/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/new_cpanel/css/css.css" rel="stylesheet" type="text/css" />


        <script src="{{ url('/') }}/assets/cpanel/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <link rel="shortcut icon" href="/elis/img/fav.ico" />


    </head>


      <div class="raw">
        				<div class="col-lg-9 col-md-8" id="first-level-left">
        					<div class="container">
        						<iframe src="/ru/shownews"></iframe>
        					</div>
        				</div>
        				<div class="col-lg-3 col-md-4" id="first-level-right">
                        <span style="float:left;"> <span class="hideTabletText"> +971 44096705</span></span>
                          <span style="float:right;">  <span class="hideTabletText">support@jmibrokers.com</span></span>
        				</div>
  			</div>


        <!-- Fixed navbar -->
        <nav class="" id="navbar-2nd" style="border-style: solid;">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/" target="_blank" style=" padding: 0px; "><img loading="lazy" src="/elis/img/fin-logo2.png" height="80px" ></a>


        </div>

        <div id="navbar" class="navbar-collapse collapse">



          <ul class="nav navbar-nav navbar-right" style=" padding-top: 20px; ">

            <!--Applications-->
                        <!--End Applications-->




                      <li class="dropdown" style-="display:none;">
                          <a href="#" class="dropdown-toggle myaccount" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="userName">о нас</span> <span class="caret"></span></a>
                          <ul class="dropdown-menu" float-side="right">
                            <li><a href="/ru/about-jmi" class="downarrow">О компании JMI</a></li>
                            <li><a href="/ru/licenses-and-regulations" class="downarrow">Лицензии и правила</a></li>
                            <li><a href="/ru/corporate-philosophy" class="downarrow">Корпоративная философия</a></li>
                            <li><a href="/ru/advofjmi" class="downarrow">Преимущества платформы JMI Brokers</a></li>
                            <li><a href="/ru/contact-us" class="downarrow">Связаться с нами</a></li>
                            <li><a href="/ru/risk-management-strategy" class="downarrow">Стратегия управления рисками</a></li>
                            <li><a href="/ru/conflicts-of-interest-policy" class="downarrow">Политика конфликта интересов</a></li>
                            <li><a href="/ru/faq" class="downarrow">Часто задаваемые вопросы</a></li>
                            <li><a href="/ru/culture" class="downarrow">культура</a></li>
                            <li><a href="/ru/career" class="downarrow">Карьера</a></li>
                            <li><a href="/ru/partnership-programs" class="downarrow">Партнерские программы</a></li>
                            <li><a href="{{ URL::to('/ru/tradewithjmi') }}" class="downarrow">Зачем торговать с JMI</a></li>
                          </ul>
                      </li>

                      <li class="dropdown" style-="display:none;">
                          <a href="#" class="dropdown-toggle myaccount" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="userName">Выбор инвестиций </span> <span class="caret"></span></a>
                          <ul class="dropdown-menu" float-side="right">

                              <li><a href="{{ URL::to('/ru/forexbroker') }}" class="downarrow">Торговля на Форекс</a></li>
                              <li><a style="display:none;" href="{{ URL::to('/ru/forexmargin') }}" class="downarrow">Форекс Маржа</a></li>

                              <li><a href="{{ URL::to('/ru/preciousmetals') }}" class="downarrow">Торговля драгоценными металлами</a></li>
                              <li><a href="{{ URL::to('/ru/futureenergies') }}" class="downarrow">Торговля будущими энергиями</a></li>
                              <li><a href="{{ URL::to('/ru/futuretrading') }}" class="downarrow">Торговля индексами</a></li>
                              <li><a href="{{ URL::to('/en/commodities') }}" class="downarrow"> Товары</a></li>
                              <li><a href="{{ URL::to('/ru/usshares') }}" class="downarrow">Акции США</a></li>

                          </ul>
                      </li>


                      <li class="dropdown" style-="display:none;">
                          <a href="#" class="dropdown-toggle myaccount" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="userName">платформы</span> <span class="caret"></span></a>
                          <ul class="dropdown-menu" float-side="right">

                              <li><a href="{{ URL::to('/ru/forexplatform') }}" class="downarrow">Платформа Форекс</a></li>
                              <li><a href="/ru/metatrader4" class="downarrow">Метатрейдер 4</a></li>
                              <li><a href="/ru/mt4-platform-overview" class="downarrow">Mt4 Обзор платформы</a></li>
                              <li><a href="/ru/iphone-and-ipad" class="downarrow">iphone и ipad</a></li>
                              <li><a href="/ru/android" class="downarrow">андроид</a></li>

                          </ul>
                      </li>



                      <li class="dropdown" style-="display:none;">
                          <a href="#" class="dropdown-toggle myaccount" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="userName">торговые счета </span> <span class="caret"></span></a>
                          <ul class="dropdown-menu" float-side="right">
                            <li><a href="{{ URL::to('/ru/jmiaccounts') }}">Счета Форекс</a></li>
                            <li><a href="#">ТОРГОВЫЕ СЧЕТА </a></li>

                          </ul>
                      </li>


                      <li class="dropdown" style-="display:none;">
                          <a href="#" class="dropdown-toggle myaccount" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="userName">партнерство</span> <span class="caret"></span></a>
                          <ul class="dropdown-menu" float-side="right">
                            <li><a href="{{ URL::to('/ru/partnership-programs')}}">Станьте нашим партнером</a></li>
                            <li><a href="{{ URL::to('/ru/businesswithjmi') }}">Зачем делать бизнес с JMI</a></li>
                            <li><a href="{{ URL::to('/ru/introducingbrokers') }}">Представляющие брокеры</a></li>
                              <li role="presentation" class="divider"></li>
                              <li><a href="{{ URL::to('/ru/moneymanagers') }}">Финансовые менеджеры </a></li>
                              <li><a href="{{ URL::to('/ru/becomeamoneymanager') }}">Как стать управляющим деньгами</a></li>
                              <li><a href="{{ URL::to('/ru/whitelabel') }}">белая этикетка</a></li>

                          </ul>
                      </li>

                      <li class="dropdown" style="display:none;">
                          <a href="#" class="dropdown-toggle myaccount" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="userName">Инструменты</span> <span class="caret"></span></a>
                          <ul class="dropdown-menu" float-side="right">
                            <li><a href="/ru/calendar">Календарь</a></li>
                            <li><a href="/ru/pip-calculator">Калькулятор пипсов</a></li>
                            <li><a href="/ru/heatmap">FX Тепловая карта</a></li>
                              <li role="presentation" class="divider"></li>
                              <li><a href="{{ URL::to('/ru/dailyfundamental') }}">Ежедневный фундаментальный анализ</a></li>
                              <li><a href="{{ URL::to('/ru/dailytechnical') }}">Ежедневный технический анализ</a></li>
                              <li><a href="{{ URL::to('/ru/downloadfiles') }}">Скачать файлы</a></li>


                          </ul>
                      </li>





            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-flag" aria-hidden="true"></i> русский <span class="caret"></span></a>
                                <ul class="dropdown-menu langSelector-" float-side="right">
                    <form id="langSelectorForm" method="get" action="#">
                        <input type="hidden" value="langSelectorCode" name="langSelectorCode" id="langSelectorCode">
                        <input type="hidden" value="dropdown" name="fromLangSelector" id="langSource">
                        <li><a href="#" onclick="setlang('en');" id="langSelectorEnglish"><img loading="lazy" src="/assets/new_cpanel/img/UK-icon.png" class="img-responsive langFlag"  style="display:none;"> English</a></li>
                        <li><a href="#" onclick="setlang('ar');" id="langSelectorArabic"><img loading="lazy" src="/assets/new_cpanel/img/AR-icon.png" class="img-responsive langFlag"  style="display:none;"> العربية</a></li>

                    </form>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle myaccount" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> <span class="userName">Мой счет</span> <span class="caret"></span></a>
                <ul class="dropdown-menu" float-side="right">
                    <li><a href="/ru/cpanel/profile"><i class="fa fa-user"></i> Просмотр личных данных</a></li>
                    <li><a href="/ru/cpanel/documents"><i class="fa fa-upload" aria-hidden="true"></i>Загрузить документы</a></li>
                    <li role="presentation" class="divider"></li>
                    <li><a href="/en/logout"><i class="fa fa-sign-out"></i> Выйти <span class="sr-only">(current)</span></a></li>
                </ul>
            </li>



                              <!-- Messages: style can be found in dropdown.less-->
                              <li class="dropdown notification-menu"  onclick="seenotifications();" style-="display:none;">
                                  <!-- Menu toggle button -->
                                  <a class="dropdown-toggle" href="#"  data-toggle="dropdown">
                                      <i class="fa fa-bell-o"></i>
                                      <span class="label" style="background: #0059b2;">@if(count($notifications_unseen)>0) {!! count($notifications_unseen) !!} @endif</span>
                                  </a>

                                  <ul class="dropdown-menu" id="notification-center" style="width: 450px; overflow: auto; height: auto;max-height:400px;background-color: #fff;" >
                                      @foreach($notifications_all as $notification)
                                      @if($notification->notification_ru != null)

                                      @if($notification->notification_link=='#open_account')

                                        <li class="@if($notification->notification_status==0) unseen @endif" data-toggle="modal" data-target="#open_live_account" style="@if($notification->notification_status==0) background: #0059b2;color: #fff; @else background: #ededed;color: #58595b; @endif padding: 10px; margin: 2px 0px;min-height: 55px;cursor: pointer; ">

                                              <span  >{!! $notification->notification_ru !!} </span>
                                              <span  style=" width: 100%; text-align: right;display: block; "> {!! substr($notification->created_at,0,16); !!} </span>
                                        </li>
                                      @endif


                                      @if($notification->notification_link=='#edit_account')

                                        <li class="@if($notification->notification_status==0) unseen @endif" data-toggle="modal" data-target="#edit_live_account" style="@if($notification->notification_status==0) background: #0059b2;color: #fff; @else background: #ededed;color: #58595b; @endif padding: 10px;margin: 2px 0px;min-height: 55px;cursor: pointer;">


                                              <span  >{!! $notification->notification_ru !!} </span>
                                              <span  style=" width: 100%; text-align: right;display: block; "> {!! substr($notification->created_at,0,16); !!} </span>
                                        </li>

                                      @endif
                                        <li class="@if($notification->notification_status==0) unseen @endif" onclick="javascript:location.href='/en{!! $notification->notification_link !!}'" style="@if($notification->notification_status==0) background: #0059b2;color: #fff; @else background: #ededed;color: #58595b; @endif padding: 10px;margin: 2px 0px;min-height: 55px;cursor: pointer;">

                                              <span  >{!! $notification->notification_ru !!} </span>
                                              <span  style=" width: 100%; text-align: right;display: block; "> {!! substr($notification->created_at,0,16); !!} </span>
                                        </li>
                                        @endif
                                        @endforeach

                                        @if(count($notifications_all)<1)
                                        <li class="unseen text-center">
                                              <p  >You Have No Notifications</p>
                                        </li>
                                        @endif
                                      </ul>

                                      <script type="text/javascript">
                                          function seenotifications()
                                          {

                                          $.get("/cpanel_notifications");

                                          }

                                      </script>

                              </li><!-- /.messages-menu -->





          </ul>

        </div><!--/.nav-collapse -->
      </div>


        <div class="marquee-ticker" style="display: none;">

                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>


                <span class="tick" ticktime="none"><span data="tick-symbol"></span> <span data="tick-direction" mid="null"><span data="tick-ask"></span> <span data="tick-bid"></span> <i class="fa"></i></span></span>

                    </div>


    </nav>

        <!--<div class="container">-->

        <div class="rowHeader" style="margin-top: 0px;">
            <div class="container">
                <div class="row">


                    <div class="col-lg-12 ">
                        <h1 class="">{{ $title }}</h1>
                    </div><!--End collumn-->

                </div><!--End Row-->
            </div><!--End container-->
        </div><!--End Row-->






<div class="container">
    <div class="row mainRow">

        <div class="col-lg-3 col-md-12 col-sm-12 sideBar ">


        <ul class="list-group list-group-flush sideMenu">
            <a id="sideMenuHamburger" style="display: none;" aria-controls="sideMenu" aria-expanded="true" class="list-group-item" data-toggle="collapse" href="#sideMenu" role="button">
                <!--<h4>-->
                    <span>Navigation</span> <i class="fa fa-bars fa-lg"></i>
                <!--</h4>-->
            </a>

            <div id="sideMenu" aria-expanded="true" aria-labelledby="sideMenuHamburger" class="panel-collapse collapse in hiddenHamburger" role="tabpanel" style="">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="@if(Session::get('pageType') == 'menu') active @endif"><a href="#mainMenu" aria-controls="mainMenu" role="tab" data-toggle="tab"><i class="fa fa-bars fa-lg"></i> мой аккаунт</a></li>
                    <li role="presentation" class="@if(Session::get('pageType') == 'tools') active @endif"><a href="#toolsMenu" aria-controls="toolsMenu" role="tab" data-toggle="tab"><i class="fa fa-ellipsis-v fa-lg"></i> инструменты</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Main Menu -->
                    <div role="tabpanel" class="tab-pane fade @if(Session::get('pageType') == 'menu') in active @endif" id="mainMenu">
                        <a href="/ru/cpanel/home" class="list-group-item  @if(Session::get('currentPage') == 'landing') active @endif"><i class="fa fa-home fa-lg" aria-hidden="true"></i> обзор аккаунта</a>
                        <a href="/ru/cpanel/open-account" class="list-group-item @if(Session::get('currentPage') == 'open-account') active @endif"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> открыть реальный счет</a>
                        <a href="/ru/cpanel/open-demo" class="list-group-item @if(Session::get('currentPage') == 'open-demo') active @endif"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Открыть демо-счет</a>

                        <a href="/ru/cpanel/add-account" class="list-group-item @if(Session::get('currentPage') == 'add-account') active @endif"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>  добавить аккаунт</a>


                        <a href="/ru/cpanel/demo-accounts" class="list-group-item @if(Session::get('currentPage') == 'demo-accounts') active @endif"  style="display:none;"><i class="fa fa-user fa-lg" aria-hidden="true"></i>  Демо-счета</a>
                        <a href="/ru/cpanel/live-accounts" class="list-group-item @if(Session::get('currentPage') == 'live-accounts') active @endif"><i class="fa fa-user fa-lg" aria-hidden="true"></i>  Реальные счета</a>

                        <a href="/ru/cpanel/deposit-fund" class="list-group-item @if(Session::get('currentPage') == 'deposit-fund') active @endif"><i class="fa fa-money fa-lg" aria-hidden="true"></i> Депозит </a>

                        <a href="/ru/cpanel/withdraw-fund" class="list-group-item @if(Session::get('currentPage') == 'withdraw-fund') active @endif"><i class="fa fa-money fa-lg" aria-hidden="true"></i> Изымать </a>

                        <a href="/ru/cpanel/internal-transfers" class="list-group-item @if(Session::get('currentPage') == 'internal-transfers') active @endif"><i class="fa fa-exchange fa-lg" aria-hidden="true"></i> Внутренние переводы</a>
                        <a href="/ru/cpanel/copy-trade" class="list-group-item @if(Session::get('currentPage') == 'copy-trade') active @endif"><i class="fa fa-exchange fa-lg" aria-hidden="true"></i> копировать торговлю</a>

                        <a href="/ru/cpanel/transaction-history" class="list-group-item @if(Session::get('currentPage') == 'transaction-history') active @endif"><i class="fa fa-history fa-lg" aria-hidden="true"></i> История транзакций </a>

                        <a href="/ru/cpanel/unionpay-cards" class="list-group-item @if(Session::get('currentPage') == 'unionpay-cards') active @endif"><i class="fa fa-credit-card-alt " aria-hidden="true"></i> карты Unionpay</a>


                        <a href="/ru/cpanel/ib-overview" class="list-group-item @if(Session::get('currentPage') == 'ib-overview') active @endif"><i class="fa fa-share-square-o fa-lg" aria-hidden="true"></i> Реферальная система</a>
                        <a href="/ru/cpanel/my-referrals" class="list-group-item @if(Session::get('currentPage') == 'my-referrals') active @endif"><i class="fa fa-users fa-lg" aria-hidden="true"></i>Мои рефералы</a>










                        </div>
                    <!-- Tools -->
                    <div role="tabpanel" class="tab-pane fade @if(Session::get('pageType') == 'tools') in active @endif" id="toolsMenu">

                        <a href="/ru/cpanel/password" class="list-group-item @if(Session::get('currentPage') == 'password') active @endif"><i class="fa fa-key fa-lg" aria-hidden="true"></i>Сменить пароль </a>

                        <a href="/ru/cpanel/trading-platforms" class="list-group-item @if(Session::get('currentPage') == 'trading-platforms') active @endif"><i class="fa fa-download fa-lg" aria-hidden="true"></i> Центр загрузок</a>


                        <a href="#" class="list-group-item  " style="display:none;" ><i class="fa fa-line-chart fa-lg"></i>Technical Analysis</a>
                        <a href="#" class="list-group-item " style="display:none;" ><i class="fa fa-newspaper-o fa-lg" aria-hidden="true"></i> Fundamental Analysis</a>

                        <a href="/ru/cpanel/ebooks" class="list-group-item   @if(Session::get('currentPage') == 'ebooks') active @endif"><i class="fa fa-book fa-lg"></i>Электронные книги</a>
                        <a href="/ru/cpanel/calendar" class="list-group-item   @if(Session::get('currentPage') == 'calendar') active @endif" ><i class="fa fa-calendar fa-lg"></i>Экономический календарь</a>
                        <a href="/ru/cpanel/pip-calculator" class="list-group-item   @if(Session::get('currentPage') == 'pip-calculator') active @endif"><i class="fa fa-calculator fa-lg"></i>Калькулятор баллов</a>
                        <a href="/ru/cpanel/heatmap" class="list-group-item   @if(Session::get('currentPage') == 'heatmap') active @endif"><i class="fa fa-fire fa-lg"></i> Тепловая карта валют</a>



                    </div>
                </div>

            </div>
        </ul>



                <div class="col-sm-12" id="mypayment-cards">
                    <h4>МОИ ПЛАТЕЖНЫЕ КАРТЫ</h4>
                    <div class="col-sm-12" id="cardbox">
                        <img loading="lazy" src="/assets/cpanel/img/unionpay-card.png" alt="unionpay" />
                        <br />
                        <a href="/ru/cpanel/unionpay-cards">Запросить новую карту</a><i class="fa fa-pencil"></i>
                    </div>

                </div>





        <div style="" class="list-group list-group-flush sideMenu list-group-horizontal contactChatButtons">




                        <a id="liveagent_button_online_573580000004Ejj" href="#" style=""  onclick="openForm()" class="list-group-item chatOnline">
                            <i class="fa fa-comments fa-lg" aria-hidden="true"></i>
                            <br>
                            <p>Живой чат</p>
                        </a>


                        <style>
                        .chat-popup {display: none; position: fixed; bottom: 0; right: 15px; border-: 3px solid #f1f1f1; z-index: 9;}
                        </style>
                        <div class="chat-popup" id="myForm">
                          <div class="form-container">
                          <iframe src="https://messenger.providesupport.com/messenger/0w4ameqgva8nj1xeoy2k9umls4.html" style=" width: 100%; height: 300px; "></iframe>

                          </div>
                          <button type="button" class="btn cancel" onclick="closeForm()" style="background-color: #0059b2; color: white; padding-: 16px 20px; border: none; cursor: pointer; width: 100%; margin-bottom:85px; opacity:1;">Close</button>

                        </div>
                        <script>
                        function openForm() {
                          document.getElementById("myForm").style.display = "block";
                          document.getElementById("open-button").style.display = "none";
                        }

                        function closeForm() {
                          document.getElementById("myForm").style.display = "none";
                          document.getElementById("open-button").style.display = "block";

                        }</script>



            <a href="/ru/contact-us" class="list-group-item">
                <i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
                <br>
                <p>Связаться с нами</p>
            </a>
        </div>

        <div class="modal fade" id="chatOfflineModal" tabindex="-1" role="dialog" aria-labelledby="chatOfflineModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="chatOfflineModalLabel">Live chat is offline</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <p>There are currently no available agents. Please send an email to <a href="mailto:support@jmibrokers.com">support@jmibrokers.com</a></p>
                    </div>
                </div>
            </div>
        </div>






            <!--ContactPanel-->
            <!--Removed-->

            <!--TwitterWall-->


        </div><!--End column-->





                        @yield('content')

    </div><!--End row-->
</div><!--End container-->


        <footer>

            <div class="container">

                <small>

                    <h3>Предупреждение о рисках</h3>
                    <p >
                   Предупреждение о высоком риске инвестирования: Торговля валютой и / или контрактами на разницу в марже сопряжена с высоким уровнем риска и может подходить не для всех инвесторов. Существует вероятность того, что вы можете понести убытки сверх депонированных вами средств, и поэтому вам не следует спекулировать капиталом, который вы не можете позволить себе потерять. Прежде чем принять решение о продаже продуктов, предлагаемых JMI Brokers, вы должны тщательно обдумать свои цели, финансовое положение, потребности и уровень опыта. Вы должны знать обо всех рисках, связанных с торговлей на марже. JMI Brokers предоставляет общие рекомендации, которые не учитывают ваши цели, финансовое положение или потребности. Содержание этого сайта не должно рассматриваться как личный совет. JMI Brokers рекомендует обратиться за советом к отдельному финансовому консультанту.
                </p>

                <p >
                    Все мнения, новости, аналитика, цены или другая информация, содержащаяся на этом веб-сайте, предоставляются в качестве общего комментария к рынку и не представляют собой инвестиционный совет, а также рекомендацию или рекомендацию для вас купить или продать любой внебиржевой продукт или другой финансовый инструмент.

                </p>
                <p class="text-center">2021 © JMIBrokers. Все права защищены</p>
                </small>

            </div><!--End container-->

        </footer><!--End footer-->

        <script type="text/javascript" src="/assets/new_cpanel/js/bootstrap.js"></script>

        <script type="text/javascript" src="/assets/new_cpanel/js/deployment.js"></script>
        <script type="text/javascript" src="/assets/new_cpanel/js/rocket-loader.min.js"></script>


  <script type="text/javascript">
      function setlang(val){
            if(val=='en'){
            var url=document.location.href
            url=url.replace('/ar','/en');
            url=url.replace('/ru','/en');
            document.location = url;
                }else if(val=='ar'){
            var url=document.location.href
            url=url.replace('/en','/ar');
            url=url.replace('/ru','/ar');
            document.location = url;
               }else if(val=='ru'){
            var url=document.location.href
            url=url.replace('/en','/ru');
            url=url.replace('/ar','/ru');
            document.location = url;
              }
      }
    collapseSideMenu();
    $(window).resize(collapseSideMenu);
function collapseSideMenu() {
    // if tablet display
    if($('.sideMenu .list-group-item').css('padding-top') == '10px' || $('.sideMenu').css('width') == '940px') {
        $('#sideMenuHamburger').show();
        $('#sideMenu').collapse('hide');
        $('#sideMenu').removeClass('hiddenHamburger');
    // if big display
    } else {
        // in not collapsed by default
        if (!$('#sideMenu').hasClass('collapsedDefault')) {
            $('#sideMenuHamburger').hide();
            $('#sideMenu').collapse('show');
            $('#sideMenu').addClass('hiddenHamburger');
        }
    }
}



$("li.dropdown").hover(

    function(e){$(this).addClass('open');
    if($(this).hasClass('notification-menu')){
      seenotifications();
    }
   }, // over
    function(e){$(this).removeClass('open'); }  // out
);

    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171709819-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-171709819-1');
    </script>


               <!--Our JS-->
                <!--End our JS-->
        </body></html>
