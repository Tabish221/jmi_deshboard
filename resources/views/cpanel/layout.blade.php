<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta name="description" content="">
    <title> {!! $title !!}</title>
    @yield('style')
    <link href="{{ url('/') }}/assets/new_cpanel/css/css.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets/new_cpanel/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets/new_cpanel/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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
                    <div class="topHeader-search">
                        <input type="text" placeholder="Search">
                        <button><i class="fas fa-search"></i></button>
                    </div>

                    <div class="topHeader-btn">
                        <div class="tpBtn-language">
                            <a href="#">English <i class="fas fa-caret-down"></i></a>
                        </div>
                        <div class="tpBtn-login">
                            <a href="/en/login">Login</a>
                        </div>
                        <div class="tpBtn-register">
                            <a href="signup.php">Register</a>
                        </div>
                    </div>
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
                                        <li><a href="how-to-become-money-managers.php">How To Become a Money Mangers</a></li>
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
                                    <li class="mb-1 @if(Session::get('currentPage') == 'landing') active @endif">
                                        <a href="/en/cpanel/home">
                                            <div class="icon"><span class="material-symbols-outlined">dashboard</span></div>
                                            Account Overview
                                        </a>
                                    </li>

                                    <li class="mb-1 @if(Session::get('currentPage') == 'open-account') active @endif @if(Session::get('currentPage') == 'documents') active @endif">
                                        <a href="/en/cpanel/open-account">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">online_prediction</span></div>
                                            Open Live Account
                                        </a>
                                    </li>

                                    <li class="mb-1 @if(Session::get('currentPage') == 'open-demo') active @endif">
                                        <a href="/en/cpanel/open-demo">
                                            <div class="icon"><span class="material-symbols-outlined">text_ad</span></div>
                                            Open Demo Account
                                        </a>
                                    </li>

                                    {{-- <li class="mb-1">
                                        <button class="collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#opendemoaccount-collapse" aria-expanded="false">
                                            <div class="icon"><span class="material-symbols-outlined">text_ad</span></div>
                                            Open Demo Account
                                        </button>
                                        <div class="asideDropMenu collapse" id="opendemoaccount-collapse">
                                            <ul class="btn-toggle-nav">
                                                <li><a href="#" class="link-dark rounded">New</a></li>
                                                <li><a href="#" class="link-dark rounded">Processed</a></li>
                                            </ul>
                                        </div>
                                    </li> --}}

                                    <li class="mb-1 @if(Session::get('currentPage') == 'add-account') active @endif">
                                        <a href="/en/cpanel/add-account">
                                            <div class="icon"><span class="material-symbols-outlined">add_box</span></div>
                                            Add Existing Account
                                        </a>
                                    </li>

                                    {{-- <li class="mb-1 @if(Session::get('currentPage') == 'demo-accounts') active @endif"">
                                        <a href="/en/cpanel/demo-accounts">
                                            <div class="icon"><span class="material-symbols-outlined">universal_currency</span></div>
                                            Demo Accounts
                                        </a>
                                    </li> --}}

                                    <li class="mb-1 @if(Session::get('currentPage') == 'live-accounts') active @endif">
                                        <a href="/en/cpanel/live-accounts">
                                            <div class="icon"><span class="material-symbols-outlined">monetization_on</span></div>
                                            Live Accounts
                                        </a>
                                    </li>

                                    <li class="mb-1 @if(Session::get('currentPage') == 'deposit-fund') active @endif">
                                        <a href="/en/cpanel/deposit-fund">
                                            <div class="icon"><span class="material-symbols-outlined">inventory</span></div>
                                            Depsoit
                                        </a>
                                    </li>

                                    <li class="mb-1 @if(Session::get('currentPage') == 'withdraw-fund') active @endif">
                                        <a href="/en/cpanel/withdraw-fund">
                                            <div class="icon"><span class="material-symbols-outlined">account_balance</span>
                                            </div>
                                            Withdraw
                                        </a>
                                    </li>

                                    <li class="mb-1 @if(Session::get('currentPage') == 'internal-transfers') active @endif">
                                        <a href="/en/cpanel/internal-transfers">
                                            <div class="icon"><span class="material-symbols-outlined">cached</span></div>
                                            Internal Tansfers
                                        </a>
                                    </li>

                                    <li class="mb-1 @if(Session::get('currentPage') == 'copy-trade') active @endif">
                                        <a href="/en/cpanel/copy-trade">
                                            <div class="icon"><span class="material-symbols-outlined">sell</span></div>
                                            Copy Trade
                                        </a>
                                    </li>

                                    <li class="mb-1 @if(Session::get('currentPage') == 'transaction-history') active @endif">
                                        <a href="/en/cpanel/transaction-history">
                                            <div class="icon"><span class="material-symbols-outlined">settings</span></div>
                                            Transaction History
                                        </a>
                                    </li>

                                    <li class="mb-1 @if(Session::get('currentPage') == 'unionpay-cards') active @endif">
                                        <a href="/en/cpanel/unionpay-cards">
                                            <div class="icon"><span class="material-symbols-outlined">universal_currency_alt</span>
                                            </div>
                                            Unionpay Cards
                                        </a>
                                    </li>

                                    <li class="mb-1 @if(Session::get('currentPage') == 'ib-overview') active @endif">
                                        <a href="/en/cpanel/ib-overview">
                                            <div class="icon"><span class="material-symbols-outlined">exit_to_app</span>
                                            </div>
                                            Referral Syetem
                                        </a>
                                    </li>

                                    <li class=" @if(Session::get('currentPage') == 'my-referrals') active @endif">
                                        <a href="/en/cpanel/my-referrals">
                                            <div class="icon"><span class="material-symbols-outlined">person_add</span>
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
                                    <li class="mb-1 @if(Session::get('currentPage') == 'password') active @endif">
                                        <a href="/en/cpanel/password">
                                            <div class="icon"><span class="material-symbols-outlined">dashboard</span></div>
                                            Password Change
                                        </a>
                                    </li>

                                    <li class="mb-1 @if(Session::get('currentPage') == 'trading-platforms') active @endif">
                                        <a href="/en/cpanel/trading-platforms">
                                            <div class="icon"><span
                                                    class="material-symbols-outlined">online_prediction</span></div>
                                            Download Center
                                        </a>
                                    </li>

                                    {{-- <li class="mb-1">
                                        <a href="#">
                                            <div class="icon"><span class="material-symbols-outlined">text_ad</span></div>
                                            Technical Analysis
                                        </a>
                                    </li>

                                    <li class="mb-1">
                                        <a href="#">
                                            <div class="icon"><span class="material-symbols-outlined">add_box</span></div>
                                            Fundamental Analysis
                                        </a>
                                    </li> --}}

                                    <li class="mb-1 @if(Session::get('currentPage') == 'ebooks') active @endif">
                                        <a href="/en/cpanel/ebooks">
                                            <div class="icon"><span class="material-symbols-outlined">universal_currency</span></div>
                                            Ebooks
                                        </a>
                                    </li>

                                    <li class="mb-1 @if(Session::get('currentPage') == 'calendar') active @endif">
                                        <a href="/en/cpanel/calendar">
                                            <div class="icon"><span class="material-symbols-outlined">monetization_on</span></div>
                                            Economic Calendar
                                        </a>
                                    </li>

                                    <li class="mb-1 @if(Session::get('currentPage') == 'pip-calculator') active @endif">
                                        <a href="/en/cpanel/pip-calculator">
                                            <div class="icon"><span class="material-symbols-outlined">inventory</span></div>
                                            PIP Calculators
                                        </a>
                                    </li>

                                    <li class="mb-1 @if(Session::get('currentPage') == 'heatmap') active @endif">
                                        <a href="/en/cpanel/heatmap">
                                            <div class="icon"><span class="material-symbols-outlined">account_balance</span>
                                            </div>
                                            Forex Heatmap
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{-- <div class="aside-table">
                            <div class="aside-tableHead">
                                <ul>
                                    <li class="current" data-targetit="box-asideforex"><a href="#">Forex</a></li>
                                    <li data-targetit="box-asidestock"><a href="#">Stock</a></li>
                                    <li data-targetit="box-asideindices"><a href="#">Indices</a></li>
                                    <li data-targetit="box-asidecommodities"><a href="#">Commodities</a></li>
                                    <li data-targetit="box-asidecyoto"><a href="#">Cyptro</a></li>
                                </ul>
                            </div>

                            <div class="aside-tablebody">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Live Press</th>
                                            <th>Bid</th>
                                            <th>Ask</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>EURUSE</td>
                                            <td>
                                                <span class="d-flex">
                                                    <div class="trad-icon up"><i class="fas fa-long-arrow-up"></i></div>
                                                    1.1018
                                                </span>
                                            </td>
                                            <td>
                                                <span class="d-flex">
                                                    <div class="trad-icon down"><i class="fas fa-long-arrow-down"></i>
                                                    </div>
                                                    1.1018
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>EURUSE</td>
                                            <td>
                                                <span class="d-flex">
                                                    <div class="trad-icon up"><i class="fas fa-long-arrow-up"></i></div>
                                                    1.1018
                                                </span>
                                            </td>
                                            <td>
                                                <span class="d-flex">
                                                    <div class="trad-icon down"><i class="fas fa-long-arrow-down"></i>
                                                    </div>
                                                    1.1018
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>EURUSE</td>
                                            <td>
                                                <span class="d-flex">
                                                    <div class="trad-icon up"><i class="fas fa-long-arrow-up"></i></div>
                                                    1.1018
                                                </span>
                                            </td>
                                            <td>
                                                <span class="d-flex">
                                                    <div class="trad-icon down"><i class="fas fa-long-arrow-down"></i>
                                                    </div>
                                                    1.1018
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>EURUSE</td>
                                            <td>
                                                <span class="d-flex">
                                                    <div class="trad-icon up"><i class="fas fa-long-arrow-up"></i></div>
                                                    1.1018
                                                </span>
                                            </td>
                                            <td>
                                                <span class="d-flex">
                                                    <div class="trad-icon down"><i class="fas fa-long-arrow-down"></i>
                                                    </div>
                                                    1.1018
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>EURUSE</td>
                                            <td>
                                                <span class="d-flex">
                                                    <div class="trad-icon up"><i class="fas fa-long-arrow-up"></i></div>
                                                    1.1018
                                                </span>
                                            </td>
                                            <td>
                                                <span class="d-flex">
                                                    <div class="trad-icon down"><i class="fas fa-long-arrow-down"></i>
                                                    </div>
                                                    1.1018
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>EURUSE</td>
                                            <td>
                                                <span class="d-flex">
                                                    <div class="trad-icon up"><i class="fas fa-long-arrow-up"></i></div>
                                                    1.1018
                                                </span>
                                            </td>
                                            <td>
                                                <span class="d-flex">
                                                    <div class="trad-icon down"><i class="fas fa-long-arrow-down"></i>
                                                    </div>
                                                    1.1018
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}
                    </aside>
                </div>

                <div class="col-lg-9 col-md-8">
                    <div class="main">
                        <div class="main-head">
                            <h6>{{ $title}}</h6>

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


    <div class="overlay">
    </div>

    <div class="loginpopup-waper">
        <div class="loginpopup">
            <div class="myPopup">
                <div class="closePop">X</div>
                <div class="popupcont">
                    <h6>Login</h6>

                    <form action="#">
                        <div class="popupfeild">
                            <label for="">User Name / Phone Number</label>
                            <input type="text" placeholder="Type User Name or Phone">
                        </div>

                        <div class="popupfeild">
                            <label for="">Password</label>
                            <input type="password" placeholder="********">
                        </div>

                        <div class="loginforgot">
                            <label for="remenber">
                                <input type="checkbox" id="remenber">
                                Remember me
                            </label>

                            <a href="#">Forgot your Password?</a>
                        </div>

                        <div class="popupbutton">
                            <button>Login Now</button>
                        </div>

                        <div class="popupsingUp">
                            <span>Don't have an account?</span> <a href="#">Sign Up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="signUppopup-waper">
        <div class="signUppopup">
            <div class="myPopup">
                <div class="closePop">X</div>
                <div class="popupcont">
                    <h6>Registration</h6>
                    <p>Fill up the form and tour team will get back to you within 24 hours</p>

                    <form action="#">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="popupfeild">
                                    <label for="">Full Name</label>
                                    <input type="text" placeholder="Input your first name in here">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="popupfeild">
                                    <label for="">Gender</label>
                                    <select name="" id="">
                                        <option value="0" selected disabled>Select</option>
                                        <option value="1">Male</option>
                                        <option value="1">female</option>
                                        <option value="1">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="popupfeild">
                                    <label for="">Email Address</label>
                                    <input type="email" placeholder="Type Email" class="pdmoreinput">
                                    <a href="#">Send Code</a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="popupfeild">
                                    <label for="">User Name</label>
                                    <input type="text" placeholder="Type User Name">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="popupfeild">
                                    <label for="">Phone Number</label>
                                    <input type="text" placeholder="Type Phone Number">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="popupfeild d-flex align-items-end h-100">
                                    <ul>
                                        <li class="done">
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M22 11.0799V11.9999C21.9988 14.1563 21.3005 16.2545 20.0093 17.9817C18.7182 19.7088 16.9033 20.9723 14.8354 21.5838C12.7674 22.1952 10.5573 22.1218 8.53447 21.3744C6.51168 20.6271 4.78465 19.246 3.61096 17.4369C2.43727 15.6279 1.87979 13.4879 2.02168 11.3362C2.16356 9.18443 2.99721 7.13619 4.39828 5.49694C5.79935 3.85768 7.69279 2.71525 9.79619 2.24001C11.8996 1.76477 14.1003 1.9822 16.07 2.85986"
                                                        stroke="url(#paint0_linear_455_26954)" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M22 4L12 14.01L9 11.01"
                                                        stroke="url(#paint1_linear_455_26954)" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <defs>
                                                        <linearGradient id="paint0_linear_455_26954" x1="1.10714"
                                                            y1="1.99414" x2="24.0072" y2="4.31646"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#CBEFBC" />
                                                            <stop offset="1" stop-color="#C4DFF7" />
                                                        </linearGradient>
                                                        <linearGradient id="paint1_linear_455_26954" x1="8.41964" y1="4"
                                                            x2="23.2014" y2="5.94679" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#CBEFBC" />
                                                            <stop offset="1" stop-color="#C4DFF7" />
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <span>Mini 8 characters</span>
                                        </li>

                                        <li>
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M22 11.0799V11.9999C21.9988 14.1563 21.3005 16.2545 20.0093 17.9817C18.7182 19.7088 16.9033 20.9723 14.8354 21.5838C12.7674 22.1952 10.5573 22.1218 8.53447 21.3744C6.51168 20.6271 4.78465 19.246 3.61096 17.4369C2.43727 15.6279 1.87979 13.4879 2.02168 11.3362C2.16356 9.18443 2.99721 7.13619 4.39828 5.49694C5.79935 3.85768 7.69279 2.71525 9.79619 2.24001C11.8996 1.76477 14.1003 1.9822 16.07 2.85986"
                                                        stroke="#8FABE3" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M22 4L12 14.01L9 11.01" stroke="#8FABE3" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <span>1 number</span>
                                        </li>

                                        <li>
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M22 11.0799V11.9999C21.9988 14.1563 21.3005 16.2545 20.0093 17.9817C18.7182 19.7088 16.9033 20.9723 14.8354 21.5838C12.7674 22.1952 10.5573 22.1218 8.53447 21.3744C6.51168 20.6271 4.78465 19.246 3.61096 17.4369C2.43727 15.6279 1.87979 13.4879 2.02168 11.3362C2.16356 9.18443 2.99721 7.13619 4.39828 5.49694C5.79935 3.85768 7.69279 2.71525 9.79619 2.24001C11.8996 1.76477 14.1003 1.9822 16.07 2.85986"
                                                        stroke="#8FABE3" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M22 4L12 14.01L9 11.01" stroke="#8FABE3" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <span>1 special character</span>
                                        </li>

                                        <li>
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M22 11.0799V11.9999C21.9988 14.1563 21.3005 16.2545 20.0093 17.9817C18.7182 19.7088 16.9033 20.9723 14.8354 21.5838C12.7674 22.1952 10.5573 22.1218 8.53447 21.3744C6.51168 20.6271 4.78465 19.246 3.61096 17.4369C2.43727 15.6279 1.87979 13.4879 2.02168 11.3362C2.16356 9.18443 2.99721 7.13619 4.39828 5.49694C5.79935 3.85768 7.69279 2.71525 9.79619 2.24001C11.8996 1.76477 14.1003 1.9822 16.07 2.85986"
                                                        stroke="#8FABE3" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M22 4L12 14.01L9 11.01" stroke="#8FABE3" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <span>Uppercase letter</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="popupfeild">
                                    <label for="">Password</label>
                                    <input type="password" placeholder="Type User Name or Phone">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="popupfeild">
                                    <label for="">User Name / Phone Number</label>
                                    <input type="text" placeholder="**********">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="popupbutton d-flex align-items-end h-100">
                                    <button>Login Now</button>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="googlebtn otherbtn">
                                    <button>
                                        <div class="icon">
                                            <img src="{{ url('/') }}/assets-up/images/google-icon.png" alt="">
                                        </div>
                                        Sign in with Google
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="facebookbtn otherbtn">
                                    <button>
                                        <div class="icon">
                                            <img src="{{ url('/') }}/assets-up/images/facebook-icon.png" alt="">
                                        </div>
                                        Sign in with Facebook
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/') }}/assets-up/js/jquery.js"></script>
    <script src="{{ url('/') }}/assets-up/js/custom.js"></script>
    <script>
        new WOW().init();
    </script>

    @yield('script')

</body>

</html>
