<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta name="description" content="">
    <title> {!! $title !!}</title>
    @yield('style')
    {{-- <link href="{{ url('/') }}/assets/new_cpanel/css/css.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ url('/') }}/assets/new_cpanel/css/bootstrap.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ url('/') }}/assets/new_cpanel/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" /> --}}

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="{{ url('/') }}/assets-up/css/layout.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-up/css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="/elis/img/favicon.ico" type="image/x-icon">
</head>

<body>
    <header>
        <div class="top-header">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="topHeader-cont">
                    <p>
                        Earnings beats underwhelm as Wall Street looks for good news <b>3:49pm EST</b> UPDATE 2-Fed's
                        Bullard says U.S. unemployment rate can go below 3%
                    </p>
                </div>

                <div class="d-flex align-items-center">
                    {{-- <div class="topHeader-search">
                        <input type="text" placeholder="Search">
                        <button><i class="fas fa-search"></i></button>
                    </div> --}}

                    <ul class="topHeader-btn">
                        <li class="dropdown tpBtn-language">
                            <a href="#" class="dropdown-toggle" type="button" id="dropdownLanguage" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-flag" aria-hidden="true"></i> English
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu langSelector-"  aria-labelledby="dropdownLanguage" float-side="right">
                                <form id="langSelectorForm" method="get" action="#">
                                    <input type="hidden" value="langSelectorCode" name="langSelectorCode" id="langSelectorCode">
                                    <input type="hidden" value="dropdown" name="fromLangSelector" id="langSource">

                                    <li>
                                        <a href="#" onclick="setlang('ar');" id="langSelectorArabic">
                                            <img loading="lazy" src="/assets/new_cpanel/img/AR-icon.png" class="img-responsive langFlag" style="display:none;"> العربية
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="setlang('ru');" id="langSelectorArabic">
                                            <img loading="lazy" src="/assets/new_cpanel/img/RU-icon.png" class="img-responsive langFlag" style="display:none;"> русский
                                        </a>
                                    </li>
                                </form>
                            </ul>
                        </li>
                        <li class="dropdown tpBtn-myaccout">
                            <a href="#" class="dropdown-toggle myaccount" type="button" id="dropdownMyAccount" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user" aria-hidden="true"></i>
                                <span class="userName">My account</span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu"  aria-labelledby="dropdownMyAccount">
                                <li>
                                    <a href="/en/cpanel/profile">
                                        <i class="fa fa-user"></i>
                                        View Personal Details
                                    </a>
                                </li>
                                <li>
                                    <a href="/en/cpanel/documents">
                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                        Upload Documents
                                    </a>
                                </li>
                                <li role="presentation" class="divider"></li>
                                <li>
                                    <a href="/en/logout">
                                        <i class="fa fa-sign-out"></i> Logout
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown notification-menu" onclick="seenotifications();">
                            <!-- Menu toggle button -->
                            <a class="notifiBtn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-envelope"></i>
                                <span class="label">
                                    @if (count($notifications_unseen) > 0)
                                        {!! count($notifications_unseen) !!}
                                    @endif
                                </span>
                            </a>

                            <ul  class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach ($notifications_all as $notification)
                                    @if ($notification->notification != null)
                                        @if ($notification->notification_link == '#open_account')
                                            <li class="@if ($notification->notification_status == 0) unseen @endif"
                                                data-toggle="modal"
                                                data-target="#open_live_account"
                                                style="@if ($notification->notification_status == 0) background: #0059b2;color: #fff; @else background: #ededed;color: #58595b; @endif padding: 10px; margin: 2px 0px;min-height: 55px;cursor: pointer; ">

                                                <span style="font-size: 12px;line-height: 1.3;padding-bottom: 8px;">{!! $notification->notification !!} </span>
                                                <span style="text-align: right;display: block;font-size: 10px;font-weight: 300;opacity: 0.8;">
                                            </li>
                                        @endif


                                        @if ($notification->notification_link == '#edit_account')
                                            <li class="@if ($notification->notification_status == 0) unseen @endif" data-toggle="modal"
                                                data-target="#edit_live_account"
                                                style="@if ($notification->notification_status == 0) background: #0059b2;color: #fff; @else background: #ededed;color: #58595b; @endif padding: 10px;margin: 2px 0px;min-height: 55px;cursor: pointer;">


                                                <span style="font-size: 12px;line-height: 1.3;padding-bottom: 8px;">{!! $notification->notification !!} </span>
                                                <span style="text-align: right;display: block;font-size: 10px;font-weight: 300;opacity: 0.8;">
                                                    {!! substr($notification->created_at, 0, 16) !!} </span>
                                            </li>
                                        @endif
                                        <li class="@if ($notification->notification_status == 0) unseen @endif"
                                            onclick="javascript:location.href='/en{!! $notification->notification_link !!}'"
                                            style="@if ($notification->notification_status == 0) background: #0059b2;color: #fff; @else background: #ededed;color: #58595b; @endif padding: 10px;margin: 2px 0px;min-height: 55px;cursor: pointer;">

                                            <span style="font-size: 12px;line-height: 1.3;padding-bottom: 8px;">{!! $notification->notification !!} </span>
                                            <span style="text-align: right;display: block;font-size: 10px;font-weight: 300;opacity: 0.8;">
                                                {!! substr($notification->created_at, 0, 16) !!} </span>
                                        </li>
                                    @endif
                                @endforeach

                                @if (count($notifications_all) < 1)
                                    <li class="unseen text-center">
                                        <p>You Have No Notifications</p>
                                    </li>
                                @endif
                            </ul>

                            <script type="text/javascript">
                                function seenotifications() {
                                    $.get("/cpanel_notifications");
                                }
                            </script>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-header largemenu">
            <div class="container-fluid">
                <div class="menu-Bar">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-4 text-start">
                        <ul class="menu">
                            <li class="dropdown-nav">
                                <a href="#">About Us</a> <i class="fas fa-caret-down"></i>

                                <ul class="dropdown">
                                    <li><a href="about-us.php">About JMI</a></li>
                                    <li><a href="licenses.php">Licenses and Regulations</a></li>
                                    <li><a href="brokers.php">Advantages of JMI Brokers Platform</a></li>
                                    <li><a href="contact-us.php">Contact us</a></li>
                                    <li><a href="policy.php">Conflict Of Interest Policy</a></li>
                                    <li><a href="faq.php">FAQ's</a></li>
                                    <li><a href="career.php">Careers</a></li>
                                    <li><a href="partnership-programs.php">Partnership Programs</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-nav">
                                <a href="#">INVESTMENT CHOICES</a> <i class="fas fa-caret-down"></i>

                                <ul class="dropdown">
                                    <li><a href="forex-trading.php">Forex Trading</a></li>
                                    <li><a href="precious-metal.php">Precious Metals Trading</a></li>
                                    <li><a href="future.php">Future Energies Trading</a></li>
                                    <li><a href="stock-cfds.php">Stocks CFDs</a></li>
                                    <li><a href="commodities.php">Commodities</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-nav">
                                <a href="#">PLATFORMS</a> <i class="fas fa-caret-down"></i>

                                <ul class="dropdown">
                                    <li><a href="forex-platform.php">Forex Platform</a></li>
                                    <li><a href="metatrader.php">MetaTrader 4</a></li>
                                    <li><a href="mt4-platform-overview.php">Mt4 Platform Overview</a></li>
                                    <li><a href="iphone-ipad.php">IPhone and IPad</a></li>
                                    <li><a href="android.php">Android</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 text-center">
                        <a href="./" class="logo">
                            <img src="{{ url('/') }}/assets-up/images/logo.png" alt="">
                        </a>
                    </div>
                    <div class="col-md-4 text-end">
                        <ul class="menu">
                            <li class="dropdown-nav">
                                <a href="#">PARTNERSHIP</a> <i class="fas fa-caret-down"></i>

                                <ul class="dropdown">
                                    <li><a href="how-to-become.php">Become Our Partner</a></li>
                                    <li><a href="business.php">Why to Make Business with JMI</a></li>
                                    <li><a href="brokers.php">Introducing Brokers</a></li>
                                    <li><a href="money-manager.php">Money Manager Program</a></li>
                                    <li><a href="how-to-become-money-managers.php">How To Become a Money Mangers</a>
                                    </li>
                                    <li><a href="white-label.php">White Labels</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-nav">
                                <a href="#">TOOLS</a> <i class="fas fa-caret-down"></i>

                                <ul class="dropdown">
                                    <li><a href="calendar.php">Economic Calendar</a></li>
                                    <li><a href="pip-calculator.php">Pip Calculator</a></li>
                                    <li><a href="#">Heatmap</a></li>
                                    <li><a href="dailyfundamental.php">Fundamental Analysis</a></li>
                                    <li><a href="#">Technical Analysis</a></li>
                                    <li><a href="download-file.php">Download Files</a></li>
                                </ul>
                            </li>

                            <li class="nav-btn"><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-header shortmenu">
            <div class="container-fluid">
                <div class="menu-Bar">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12 text-center">
                        <a href="./" class="logo">
                            <img src="{{ url('/') }}/assets-up/images/logo.png" alt="">
                        </a>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="menuWrap">
                            <ul class="menu">
                                <li class="dropdown-nav">
                                    <a href="#">About Us</a> <i class="fas fa-caret-down"></i>

                                    <ul class="dropdown">
                                        <li><a href="about-us.php">About JMI</a></li>
                                        <li><a href="licenses.php">Licenses and Regulations</a></li>
                                        <li><a href="brokers.php">Advantages of JMI Brokers Platform</a></li>
                                        <li><a href="contact-us.php">Contact us</a></li>
                                        <li><a href="policy.php">Conflict Of Interest Policy</a></li>
                                        <li><a href="faq.php">FAQ's</a></li>
                                        <li><a href="career.php">Careers</a></li>
                                        <li><a href="partnership-programs.php">Partnership Programs</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-nav">
                                    <a href="#">INVESTMENT CHOICES</a> <i class="fas fa-caret-down"></i>

                                    <ul class="dropdown">
                                        <li><a href="forex-trading.php">Forex Trading</a></li>
                                        <li><a href="precious-metal.php">Precious Metals Trading</a></li>
                                        <li><a href="future.php">Future Energies Trading</a></li>
                                        <li><a href="stock-cfds.php">Stocks CFDs</a></li>
                                        <li><a href="commodities.php">Commodities</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-nav">
                                    <a href="#">PLATFORMS</a> <i class="fas fa-caret-down"></i>

                                    <ul class="dropdown">
                                        <li><a href="forex-platform.php">Forex Platform</a></li>
                                        <li><a href="metatrader.php">MetaTrader 4</a></li>
                                        <li><a href="mt4-platform-overview.php">Mt4 Platform Overview</a></li>
                                        <li><a href="iphone-ipad.php">IPhone and IPad</a></li>
                                        <li><a href="android.php">Android</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-nav">
                                    <a href="#">PARTNERSHIP</a> <i class="fas fa-caret-down"></i>

                                    <ul class="dropdown">
                                        <li><a href="how-to-become.php">Become Our Partner</a></li>
                                        <li><a href="business.php">Why to Make Business with JMI</a></li>
                                        <li><a href="brokers.php">Introducing Brokers</a></li>
                                        <li><a href="money-manager.php">Money Manager Program</a></li>
                                        <li><a href="how-to-become-money-managers.php">How To Become a Money
                                                Mangers</a></li>
                                        <li><a href="white-label.php">White Labels</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-nav">
                                    <a href="#">TOOLS</a> <i class="fas fa-caret-down"></i>

                                    <ul class="dropdown">
                                        <li><a href="calendar.php">Economic Calendar</a></li>
                                        <li><a href="pip-calculator.php">Pip Calculator</a></li>
                                        <li><a href="#">Heatmap</a></li>
                                        <li><a href="dailyfundamental.php">Fundamental Analysis</a></li>
                                        <li><a href="#">Technical Analysis</a></li>
                                        <li><a href="download-file.php">Download Files</a></li>
                                    </ul>
                                </li>
                                <li class="nav-btn"><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="mainBanner">
        <div class="container">
            <h3>Control Panel | Account Overview</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li>
                    <p>Dashboard</p>
                </li>
            </ul>
        </div>
    </section>

    <main>
        <div class="container-fuild">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <aside>
                        <div class="tabBtn">
                            <a href="#" class="current" data-targetit="box-myaccount">
                                <div class="icon">
                                    <span class="material-symbols-outlined">manage_accounts</span>
                                </div>
                                <em>My Account</em>
                            </a>

                            <a href="#" data-targetit="box-tools">
                                <div class="icon">
                                    <span class="material-symbols-outlined">settings</span>
                                </div>
                                <em>Tools</em>
                            </a>
                        </div>

                        <div class="box-myaccount showfirst">
                            <div class="aside-menuBar">
                                <ul>
                                    <li class="mb-1 @if (Session::get('currentPage') == 'landing') active @endif">
                                        <a href="/en/cpanel/home">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">dashboard</span></div>
                                            Account Overview
                                        </a>
                                    </li>

                                    <li
                                        class="mb-1 @if (Session::get('currentPage') == 'open-account') active @endif @if (Session::get('currentPage') == 'documents') active @endif">
                                        <a href="/en/cpanel/open-account">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">online_prediction</span></div>
                                            Open Live Account
                                        </a>
                                    </li>

                                    <li class="mb-1 @if (Session::get('currentPage') == 'open-demo') active @endif">
                                        <a href="/en/cpanel/open-demo">
                                            <div class="icon"><span class="material-symbols-outlined">text_ad</span>
                                            </div>
                                            Open Demo Account
                                        </a>
                                    </li>

                                    <li class="mb-1 @if (Session::get('currentPage') == 'add-account') active @endif">
                                        <a href="/en/cpanel/add-account">
                                            <div class="icon"><span class="material-symbols-outlined">add_box</span>
                                            </div>
                                            Add Existing Account
                                        </a>
                                    </li>

                                    <li class="mb-1 @if (Session::get('currentPage') == 'live-accounts') active @endif">
                                        <a href="/en/cpanel/live-accounts">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">monetization_on</span></div>
                                            Live Accounts
                                        </a>
                                    </li>

                                    <li class="mb-1 @if (Session::get('currentPage') == 'deposit-fund') active @endif">
                                        <a href="/en/cpanel/deposit-fund">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">inventory</span></div>
                                            Depsoit
                                        </a>
                                    </li>

                                    <li class="mb-1 @if (Session::get('currentPage') == 'withdraw-fund') active @endif">
                                        <a href="/en/cpanel/withdraw-fund">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">account_balance</span>
                                            </div>
                                            Withdraw
                                        </a>
                                    </li>

                                    <li class="mb-1 @if (Session::get('currentPage') == 'internal-transfers') active @endif">
                                        <a href="/en/cpanel/internal-transfers">
                                            <div class="icon"><span class="material-symbols-outlined">cached</span>
                                            </div>
                                            Internal Tansfers
                                        </a>
                                    </li>

                                    <li class="mb-1 @if (Session::get('currentPage') == 'copy-trade') active @endif">
                                        <a href="/en/cpanel/copy-trade">
                                            <div class="icon"><span class="material-symbols-outlined">sell</span>
                                            </div>
                                            Copy Trade
                                        </a>
                                    </li>

                                    <li class="mb-1 @if (Session::get('currentPage') == 'transaction-history') active @endif">
                                        <a href="/en/cpanel/transaction-history">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">settings</span></div>
                                            Transaction History
                                        </a>
                                    </li>

                                    <li class="mb-1 @if (Session::get('currentPage') == 'unionpay-cards') active @endif">
                                        <a href="/en/cpanel/unionpay-cards">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">universal_currency_alt</span>
                                            </div>
                                            Unionpay Cards
                                        </a>
                                    </li>

                                    <li class="mb-1 @if (Session::get('currentPage') == 'ib-overview') active @endif">
                                        <a href="/en/cpanel/ib-overview">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">exit_to_app</span>
                                            </div>
                                            Referral Syetem
                                        </a>
                                    </li>

                                    <li class=" @if (Session::get('currentPage') == 'my-referrals') active @endif">
                                        <a href="/en/cpanel/my-referrals">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">person_add</span>
                                            </div>
                                            My Referrals
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="box-tools">
                            <div class="aside-menuBar">
                                <ul>
                                    <li class="mb-1 @if (Session::get('currentPage') == 'password') active @endif">
                                        <a href="/en/cpanel/password">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">dashboard</span></div>
                                            Password Change
                                        </a>
                                    </li>

                                    <li class="mb-1 @if (Session::get('currentPage') == 'trading-platforms') active @endif">
                                        <a href="/en/cpanel/trading-platforms">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">online_prediction</span></div>
                                            Download Center
                                        </a>
                                    </li>

                                    <li class="mb-1 @if (Session::get('currentPage') == 'ebooks') active @endif">
                                        <a href="/en/cpanel/ebooks">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">universal_currency</span></div>
                                            Ebooks
                                        </a>
                                    </li>

                                    <li class="mb-1 @if (Session::get('currentPage') == 'calendar') active @endif">
                                        <a href="/en/cpanel/calendar">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">monetization_on</span></div>
                                            Economic Calendar
                                        </a>
                                    </li>

                                    <li class="mb-1 @if (Session::get('currentPage') == 'pip-calculator') active @endif">
                                        <a href="/en/cpanel/pip-calculator">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">inventory</span></div>
                                            PIP Calculators
                                        </a>
                                    </li>

                                    <li class="mb-1 @if (Session::get('currentPage') == 'heatmap') active @endif">
                                        <a href="/en/cpanel/heatmap">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">account_balance</span>
                                            </div>
                                            Forex Heatmap
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>

                <div class="col-lg-9 col-md-8">
                    <div class="main">
                        <div class="main-head">
                            <h6>{{ $title }}</h6>

                            <div class="accouttitle">
                                <span class="material-symbols-outlined">account_circle</span>
                                <p>Welcome, {!! $user->fullname !!}</p>
                            </div>
                        </div>

                        <div class="main-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-chat">
            <div class="liveChat">
                <a href="#">
                    <div class="icon">
                        <img src="{{ url('/') }}/assets-up/images/hand-shake.png" alt="">
                    </div>
                    <span>Live Chat</span>
                </a>
            </div>

            <div class="contactUs">
                <a href="#">
                    <div class="icon">
                        <img src="{{ url('/') }}/assets-up/images/hand-shake.png" alt="">
                    </div>
                    <span>Contact Us</span>
                </a>
            </div>
        </div>
    </main>



    <footer>
        <div class="container">
            <div class="footerCont">
                <div class="cont-title">
                    <span><img src="{{ url('/') }}/assets-up/images/vanatua-flag.png" alt=""></span>
                    <h6>JMI Brokers LTD is a licensed Financial Services Provider from Vanuatu Financial Services
                        Commission and authorized to carry business on Dealing in Securities under Vanuatu Financial
                        Services Commission (VFSC ) -</h6>
                </div>
                <p>Founded 2009. A Commonwealth licensed company with 3 licenses from the Financial Securities Authority
                    VFSC License No. 15010 for trading in currencies, metals, shares of United States companies listed
                    on the New York and Nasdaq exchanges, shares of British companies listed on the London Stock
                    Exchange, goods, energy, and crypto cryptocurrencies and other CFDs . The company and all its shares
                    are wholly owned by the Swiss European company JMI Brokers Holding AG , registered in Swiss
                    commercial register CHE-334.229.499. Zug - Switzerland 🇨🇭. Most importantly, it is JMI Brokers
                    with a full advance and guaranteed client deposits up to $500,000 through an insurance policy
                    advertised on the company's official website.</p>

                <div class="cont-title">
                    <span><img src="{{ url('/') }}/assets-up/images/footer/8.png" alt=""></span>
                    <h6>Risk warning</p>
                </div>
                <p>High Risk Investment Warning: Trading foreign exchange and/or contracts for differences on margin
                    carries a high level of risk, and may not be suitable for all investors. The possibility exists that
                    you could sustain a loss in excess of your deposited funds and therefore, you should not speculate
                    with capital that you cannot afford to lose. Before deciding to trade the products offered by JMI
                    Brokers you should carefully consider your objectives, financial situation, needs and level of
                    experience. You should be aware of all the risks associated with trading on margin. JMI Brokers
                    provides general advice that does not take into account your objectives, financial situation or
                    needs. The content of this Website must not be construed as personal advice. JMI Brokers recommends
                    you seek advice from a separate financial advisor.All opinions, news, analysis, prices or other
                    information contained on this website are provided as general market commentary and does not
                    constitute investment advice, nor a solicitation or recommendation for you to buy or sell any
                    over-the-counter product or other financial instrument.</p>
            </div>
        </div>
    </footer>

    <script src="{{ url('/') }}/assets-up/js/jquery.js"></script>
    <script src="{{ url('/') }}/assets-up/js/custom.js"></script>

    <script>
        function seenotifications() {
            $.get("/cpanel_notifications");
        }
        function openForm() {
            document.getElementById("myForm").style.display = "block";
            document.getElementById("open-button").style.display = "none";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
            document.getElementById("open-button").style.display = "block";

        }

        function setlang(val) {
            if (val == 'en') {
                var url = document.location.href
                url = url.replace('/ar', '/en');
                url = url.replace('/ru', '/en');
                document.location = url;
            } else if (val == 'ar') {
                var url = document.location.href
                url = url.replace('/en', '/ar');
                url = url.replace('/ru', '/ar');
                document.location = url;
            } else if (val == 'ru') {
                var url = document.location.href
                url = url.replace('/en', '/ru');
                url = url.replace('/ar', '/ru');
                document.location = url;
            }
        }

        collapseSideMenu();

        $(window).resize(collapseSideMenu);

        function collapseSideMenu() {
            // if tablet display
            if ($('.sideMenu .list-group-item').css('padding-top') == '10px' || $('.sideMenu').css('width') == '940px') {
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
            function(e) {
                $(this).addClass('open');
                if ($(this).hasClass('notification-menu')) {
                    seenotifications();
                }
            }, // over
            function(e) {
                $(this).removeClass('open');
            } // out
        );
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171709819-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-171709819-1');

        new WOW().init();
    </script>

    @yield('script')

</body>

</html>
