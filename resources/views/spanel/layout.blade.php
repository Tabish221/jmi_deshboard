<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> {!! $title !!}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.4 -->
        <link href="{{ url('/') }}/assets/spanel/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ url('/') }}/assets/spanel/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/spanel/dist/css/main.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/spanel/dist/css/skins/skin-green.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/spanel/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" rel="stylesheet" type="text/css" />

        <!-- jvectormap -->
        <link href="{{ url('/') }}/assets/spanel/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="{{ url('/') }}/assets/spanel/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/css/select2.min.css" rel="stylesheet" />
        <!-- Daterange picker -->
        <link href="{{ url('/') }}/assets/spanel/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/spanel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery 2.1.4 -->
        <script src="{{ url('/') }}/assets/spanel/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="skin-green  sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>S</b>p</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Super</b> panel</span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <ul class="nav navbar-nav pull-left" >
                        <li>
                            <a href="{{ url('/') }}">
                                <span class="fa fa-home"></span>
                                <span class="hidden-xs">Go to Homepage</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">



                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a class="dropdown-toggle" href="#"  data-toggle="dropdown">
                                    <span class="fa fa-user"></span>
                                    <span class="hidden-xs">{!! $user->name !!}</span>
                                    <i class="fa fa-angle-down pull-right" style="line-height: inherit;"></i>
                                </a>

                                    <ul class="dropdown-menu" style="right:auto;">
                                      <li><a tabindex="-1" href="/en/spanel/profile">Client Profile</a></li>
                                      <li><a tabindex="-1" href="/en/spanel/documents?">Upload Documents</a></li>
                                      <li><a tabindex="-1" href="#"  data-toggle="modal" data-target="#changepassword">Change Pasword</a></li>
                                      <li><a tabindex="-1" href="#"  data-toggle="modal" data-target="#changeuserpassword">Change User Pasword</a></li>
                                    </ul>

                            </li>





                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown notification-menu"  onclick="seenotifications();">
                                <!-- Menu toggle button -->
                                <a class="dropdown-toggle" href="#"  data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-danger">@if(count($notifications_unseen)>0) {!! count($notifications_unseen) !!} @endif</span>
                                </a>

                                    <ul class="dropdown-menu" id="notification-center" style="width: 450px; overflow: auto; height: 420px;" >
                                    @foreach($notifications_all as $notification)

                                    @if($notification->notification_link=='#open_account')

                                      <li class="@if($notification->notification_status==0) unseen @endif" data-toggle="modal" data-target="#open_live_account">

                                            <p  >({!! $notification->id !!}) {!! $notification->notification !!} </p>
                                            <p class="float-right"> {!! $notification->created_at !!} </p>
                                      </li>
                                    @endif


                                    @if($notification->notification_link=='#edit_account')

                                      <li class="@if($notification->notification_status==0) unseen @endif" data-toggle="modal" data-target="#edit_live_account">


                                            <p  >({!! $notification->id !!}) {!! $notification->notification !!} </p>
                                            <p class="float-right"> {!! $notification->created_at !!} </p>
                                      </li>

                                    @endif
                                      <li class="@if($notification->notification_status==0) unseen @endif" onclick="javascript:location.href='/en{!! $notification->notification_link !!}'">

                                            <p  >({!! $notification->id !!}) {!! $notification->notification !!} </p>
                                            <p class="float-right"> {!! $notification->created_at !!} </p>
                                      </li>
                                      @endforeach

                                      @if(count($notifications_all)<1)
                                      <li class="unseen text-center">
                                            <p  >You Have No Notifications</p>
                                      </li>
                                      @endif
                                    </ul>

                            </li><!-- /.messages-menu -->


                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a class="dropdown-toggle" href="#"  data-toggle="dropdown">
                                    <span class="fa fa-globe"></span>
                                    <span class="hidden-xs">English</span>
                                    <i class="fa fa-angle-down pull-right" style="line-height: inherit;"></i>
                                </a>

                                    <ul class="dropdown-menu" style="width:-webkit-fill-available;min-width:auto;">
                                      <li><a tabindex="-1" href="#">Arabic</a></li>
                                    </ul>

                            </li>


                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="{{ url('/en/logout') }}">
                                    <span class="fa fa-times"></span>
                                    <span class="hidden-xs">Logout</span>
                                </a>

                            </li>


                        </ul>




                    </div>
                </nav>
            </header>






<!-- Modal -->
<div id="changepassword" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:300px">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">

{!! Form::open(['url'=>'en/spanel/password','id'=>'changepassword'])  !!}


                <div class="control-group">

                    <div class="col-sm-12">
                         <div class="controls">
                              <input  type="password" class="form-control " placeholder=" Current Password"  id="currentpassword" name="currentpassword" required>
                         </div>
                   </div>

                    <div class="col-sm-12">
                    <br />
                         <div class="controls">
                              <input  type="password" class="form-control " placeholder=" New Password"  id="password" name="password" required>
                         </div>
                   </div>

                   <div class="col-sm-12">
                    <div class="controls">
                        <br />
                        <input  type="password" class="form-control  " placeholder="Confirm New Password" id="confirmpassword" name="confirmpassword" required>
                        <br />

                            <button type="submit" class="btn btn-success submit" >Update Password</button>

                    </div>
                   </div>
                 </div>



{!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<!-- Modal -->
<div id="changeuserpassword" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:300px">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change User  Password</h4>
      </div>
      <div class="modal-body">

{!! Form::open(['url'=>'en/spanel/user_password','id'=>'changepassword'])  !!}


                <div class="control-group">
                  <div class="col-sm-12">
                       <div class="controls">
                            <input  type="email" class="form-control " placeholder=" User Email"   name="email" required>
                       </div>
                 </div>


                    <div class="col-sm-12">
                    <br />
                         <div class="controls">
                              <input  type="password" class="form-control " placeholder=" New Password"  id="password" name="password" required>
                         </div>
                   </div>

                   <div class="col-sm-12">
                    <div class="controls">
                        <br />
                        <input  type="password" class="form-control  " placeholder="Confirm New Password" id="confirmpassword" name="confirmpassword" required>
                        <br />

                            <button type="submit" class="btn btn-success submit" >Update Password</button>

                    </div>
                   </div>
                 </div>



{!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>






<!-- Modal -->
<div id="edit_live_account" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:300px">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Live Account</h4>
      </div>
      <div class="modal-body">

{!! Form::open(['url'=>'en/spanel/edit_live_account','id'=>'edit_live_account'])  !!}


                <div class="control-group">


                   <div class="col-sm-12">
                         <div class="controls">
                            <input type="number" class="form-control" name="user_id" id="user_id" placeholder="User_id" required />

                       </div>
                   </div>


                   <div class="col-sm-12">
                         <div class="controls">
                            <input type="number" class="form-control" name="account_id" id="account_id" placeholder="account_id" required />

                       </div>
                   </div>

                   <div class="col-sm-12">
                    <br />
                         <div class="controls">
                            <input type="number" class="form-control" name="mt4login" id="mt4login" placeholder="MT4 Login" required />

                       </div>
                   </div>


                    <div class="col-sm-12">
                         <br />
                         <div class="controls">
                            <select class="form-control" name="account_type" id="account_type" >
                                <option value="" disabled selected >- Select Type-</option>
                                <option value="1">Individual</option>
                                <option value="2">IB</option>


                            </select>
                        </div>
                   </div>


                    <div class="col-sm-12">
                         <br />
                        <div class="controls">
                            <select class="form-control" name="account_group" id="account_group" required >
                                <option value="" disabled selected >- Select group-</option>

                                <option value="3" class="forlive">Variable Spread Account</option>
                                <option value="5" class="forlive" >Scalping Account</option>
                                <option value="1" class="forlive" >Fixed Spread Account</option>
                                <option value="4" class="forlive" > Bonus Account</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    <br />
                         <div class="controls">

                            <select class="form-control" name="leverage" id="leverage"  required >
                                <option value="" disabled selected >- Select Leverage-</option>
                                <option value="1">1:1</option>
                                <option value="5">1:5</option>
                                <option value="10">1:10</option>
                                <option value="25">1:25</option>
                                <option value="50">1:50</option>
                                <option value="100">1:100</option>
                                <option value="200">1:200</option>
                                <option value="300" class="hideleverage" >1:300</option>
                                <option value="400" class="hideleverage" >1:400</option>
                                <option value="500" class="hideleverage" >1:500</option>

                            </select>

                         </div>
                   </div>

                   <div class="col-sm-12">
                    <div class="controls">

                            <button type="submit" class="btn btn-success submit" >Edit Live Account</button>

                    </div>
                   </div>
                 </div>



{!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




<!-- Modal -->
<div id="open_live_account" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:300px">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Live Account</h4>
      </div>
      <div class="modal-body">

{!! Form::open(['url'=>'en/spanel/open_live_account','id'=>'open_live_account'])  !!}


                <div class="control-group">


                   <div class="col-sm-12">
                         <div class="controls">
                            <input type="number" class="form-control" name="user_id" id="user_id" placeholder="User_id" required />

                       </div>
                   </div>


                   <div class="col-sm-12">
                    <br />
                         <div class="controls">
                            <input type="text" class="form-control" name="mt4login" id="mt4login" placeholder="MT4 Login" required />

                       </div>
                   </div>

                   <div class="col-sm-12">
                    <br />
                         <div class="controls">
                            <input type="text" class="form-control" name="mt4password" id="mt4password" placeholder="MT4 Password" required />

                       </div>
                   </div>

                   <div class="col-sm-12">
                    <br />
                         <div class="controls">
                            <input type="text" class="form-control" name="mt4investor" id="mt4investor" placeholder="MT4 Investor password" required />

                       </div>
                   </div>

                    <div class="col-sm-12">
                         <br />
                         <div class="controls">
                            <select class="form-control" name="account_type" id="account_type" >
                                <option value="" disabled selected >- Select Type-</option>
                                <option value="1">Individual</option>
                                <option value="2">IB</option>


                            </select>
                        </div>
                   </div>


                    <div class="col-sm-12">
                         <br />
                        <div class="controls">
                            <select class="form-control" name="account_group" id="account_group" required >
                                <option value="" disabled selected >- Select group-</option>

                                <option value="3" class="forlive">Variable Spread Account</option>
                                <option value="5" class="forlive" >Scalping Account</option>
                                <option value="1" class="forlive" >Fixed Spread Account</option>
                                <option value="4" class="forlive" > Bonus Account</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    <br />
                         <div class="controls">

                            <select class="form-control" name="leverage" id="leverage"  required >
                                <option value="" disabled selected >- Select Leverage-</option>
                                <option value="1">1:1</option>
                                <option value="5">1:5</option>
                                <option value="10">1:10</option>
                                <option value="25">1:25</option>
                                <option value="50">1:50</option>
                                <option value="100">1:100</option>
                                <option value="200">1:200</option>
                                <option value="300" class="hideleverage" >1:300</option>
                                <option value="400" class="hideleverage" >1:400</option>
                                <option value="500" class="hideleverage" >1:500</option>

                            </select>

                         </div>
                   </div>

                   <div class="col-sm-12">
                    <div class="controls">

                            <button type="submit" class="btn btn-success submit" >Add Live Account</button>

                    </div>
                   </div>
                 </div>



{!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>






            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="admin-logo">
                            <img src="{{ url('/') }}/assets/spanel/img/logo.png" class="" alt="User Image" />
                        </div>
                    </div>

                    <!--                     search form (Optional)
                                        <form action="#" method="get" class="sidebar-form">
                                            <div class="input-group">
                                                <input  type="text" name="q" class="form-control" id="menu-search" placeholder="Search..."/>
                                                <span class="input-group-btn">
                                                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                         /.search form -->

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class=" @if(Session::get('currentPage') == 'landing') active @endif"><a href="{{ url('/') }}/en/spanel/home"><i class='fa fa-home'></i> <span>Home</span></a></li>
                        @if(Session::has('superadmin'))

                        <li class="treeview @if(Session::get('pageType') == 'general') active @endif">
                            <a href="#">
                                <i class="fa fa-globe"></i> <span>General</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu @if(Session::get('pageType') == 'general') menu-open @endif">
                                <li class=" @if(Session::get('currentPage') == 'documents') active @endif"><a href="{{ url('/') }}/en/spanel/documents?"><i class="fa fa-file"></i> Documents</a></li>


                                <li class=" @if(Session::get('currentPage') == 'admins') active @endif"><a href="{{ url('/') }}/en/spanel/admins"><i class="fa fa-user"></i> Admins</a></li>

                                <li class=" @if(Session::get('currentPage') == 'change-password') active @endif"><a href="#"  data-toggle="modal" data-target="#changepassword"><i class="fa fa-key"></i> Change Password</a></li>
                                <li class=" @if(Session::get('currentPage') == 'change-password') active @endif"><a href="#"  data-toggle="modal" data-target="#changeuserpassword"><i class="fa fa-key"></i> Change User Password</a></li>

                                <li class=" @if(Session::get('currentPage') == 'unionpay-cards') active @endif"><a href="{{ url('/') }}/en/spanel/unionpay-cards-request?"><i class="fa fa-file"></i> UnionPay Cards</a></li>

                                {{-- <li class=" @if(Session::get('currentPage') == 'settings') active @endif" ><a href="{{ url('/') }}/en/spanel/settings"><i class='fa fa-cogs'></i> <span>settings</span></a></li> --}}

                            </ul>
                        </li>



                        <li class="treeview @if(Session::get('pageType') == 'allaccounts') active @endif">
                            <a href="#">
                                <i class="fa fa-list-ol"></i> <span>All Accounts</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu @if(Session::get('pageType') == 'allaccounts') menu-open @endif">

                                <li class=" @if(Session::get('currentPage') == 'website-accounts') active @endif"><a href="{{ url('/') }}/en/spanel/website-accounts?"><i class="fa fa-caret-right"></i>Website Accounts</a></li>


                                <li class=" @if(Session::get('currentPage') == 'demo-accounts') active @endif"><a href="{{ url('/') }}/en/spanel/demo-accounts?"><i class="fa fa-caret-right"></i> Demo Accounts</a></li>

                                <li class=" @if(Session::get('currentPage') == 'live-accounts') active @endif"><a href="{{ url('/') }}/en/spanel/live-accounts?"><i class="fa fa-caret-right"></i> Live Accounts</a></li>

                                <li class=" @if(Session::get('currentPage') == 'referrals-accounts') active @endif"><a href="{{ url('/') }}/en/spanel/referrals-accounts?"><i class="fa fa-caret-right"></i> Referrals Accounts</a></li>
                            </ul>
                        </li>

                        <li class="treeview @if(Session::get('pageType') == 'fund-requests') active @endif">
                            <a href="#">
                                <i class="fa fa-money"></i> <span>Fund Requests</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu @if(Session::get('pageType') == 'fund-requests') menu-open @endif">
                                <li class=" @if(Session::get('currentPage') == 'deposit-fund-requests') active @endif"><a href="{{ url('/') }}/en/spanel/deposit-fund-requests"><i class="fa fa-caret-right"></i> Deposit Fund Requests</a></li>

                                <li class=" @if(Session::get('currentPage') == 'withdraw-fund-requests') active @endif"><a href="{{ url('/') }}/en/spanel/withdraw-fund-requests"><i class="fa fa-caret-right"></i> Withdraw Fund Requests</a></li>

                                <li class=" @if(Session::get('currentPage') == 'internal-transfers-requests') active @endif"><a href="{{ url('/') }}/en/spanel/internal-transfers-requests"><i class="fa fa-caret-right"></i>Internal Transfers Requests</a></li>

                            </ul>
                        </li>

                        <li class="treeview @if(Session::get('pageType') == 'slideshow') active @endif">
                            <a href="#">
                                <i class="fa fa-camera"></i> <span>SlideShow</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu @if(Session::get('pageType') == 'callback-requests') menu-open @endif">

                                <li class=" @if(Session::get('currentPage') == 'en-slideshow') active @endif"><a href="{{ url('/') }}/en/spanel/en-slideshow"><i class="fa fa-caret-right"></i>EN SlideShow</a></li>

                                <li class=" @if(Session::get('currentPage') == 'ru-slideshow') active @endif"><a href="{{ url('/') }}/en/spanel/ru-slideshow"><i class="fa fa-caret-right"></i>RU SlideShow</a></li>


                                <li class=" @if(Session::get('currentPage') == 'ar-slideshow') active @endif"><a href="{{ url('/') }}/en/spanel/ar-slideshow"><i class="fa fa-caret-right"></i>AR SlideShow</a></li>
                            </ul>
                        </li>

                        <li class="treeview @if(Session::get('pageType') == 'analysis') active @endif">
                            <a href="#">
                                <i class="fa fa-line-chart"></i> <span>analysis | News | Offers</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu @if(Session::get('pageType') == 'callback-requests') menu-open @endif">

                                <li class=" @if(Session::get('currentPage') == 'technical-analysis') active @endif"><a href="{{ url('/') }}/en/spanel/technical-analysis?page=1&per=10"><i class="fa fa-caret-right"></i>Technical Analysis</a></li>

                                <li class=" @if(Session::get('currentPage') == 'fundamental-analysis') active @endif"><a href="{{ url('/') }}/en/spanel/fundamental-analysis?page=1&per=10"><i class="fa fa-caret-right"></i>Fundamental Analysis</a></li>

                                <li class=" @if(Session::get('currentPage') == 'offers') active @endif"><a href="{{ url('/') }}/en/spanel/offers?page=1&per=10"><i class="fa fa-caret-right"></i>Offers</a></li>

                                <li class=" @if(Session::get('currentPage') == 'news') active @endif"><a href="{{ url('/') }}/en/spanel/news?page=1&per=10"><i class="fa fa-caret-right"></i>News</a></li>


                            </ul>
                        </li>


                        <li class="treeview @if(Session::get('pageType') == 'old-links') active @endif">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i> <span>Old Links</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu @if(Session::get('pageType') == 'callback-requests') menu-open @endif">
                                <li class=" @if(Session::get('currentPage') == 'callback-requests') active @endif"><a href="{{ url('/') }}/en/spanel/callback-requests"><i class="fa fa-caret-right"></i> CallBack Requests</a></li>

                                <li class=" @if(Session::get('currentPage') == 'mailer') active @endif"><a href="{{ url('/') }}/en/spanel/mailer"><i class="fa fa-caret-right"></i> Mailer</a></li>

                                <li class=" @if(Session::get('currentPage') == 'send-mails') active @endif"><a href="{{ url('/') }}/en/spanel/send-mails"><i class="fa fa-caret-right"></i>Send Mails</a></li>

                                <li class=" @if(Session::get('currentPage') == 'landing-users') active @endif"><a href="{{ url('/') }}/en/spanel/landing-users?"><i class="fa fa-caret-right"></i>Landing Users</a></li>

                                <li class=" @if(Session::get('currentPage') == 'all-search') active @endif"><a href="{{ url('/') }}/en/spanel/all-search"><i class="fa fa-caret-right"></i>All Search URLs</a></li>

                            </ul>
                        </li>


                        <li><a href="{{ url('/') }}/en/logout"><i class='fa fa-times'></i> <span>Logout</span></a></li>
                        <li><a href="{{ url('/') }}/en/spanel/competition"><i class='fa fa-win'></i> <span>competition</span></a></li>


                        @endif
                    </ul><!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->


                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">
                   JMIBrokers Super Panel
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2018 </strong> All rights reserved.
            </footer>

            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class='control-sidebar-bg'></div>
        </div><!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script type="text/javascript">
$.widget.bridge('uibutton', $.ui.button);
jQuery(document).ready(function () {
    $('.rich_editor').ckeditor(function (config) {
        config.extraAllowedContent = true;
        config.allowedContent = true;
        config.removeFormatAttributes = '';
    });



});
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{{ url('/') }}/assets/spanel/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{{ url('/') }}/assets/spanel/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="{{ url('/') }}/assets/spanel/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="{{ url('/') }}/assets/spanel/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/assets/spanel/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ url('/') }}/assets/spanel/plugins/knob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/assets/spanel/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="{{ url('/') }}/assets/spanel/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ url('/') }}/assets/spanel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- Slimscroll -->
        <script src="{{ url('/') }}/assets/spanel/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="{{ url('/') }}/assets/spanel/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="{{ url('/') }}/assets/spanel/dist/js/app.min.js" type="text/javascript"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ url('/') }}/assets/spanel/dist/js/pages/dashboard.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ url('/') }}/assets/spanel/dist/js/demo.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/assets/spanel/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/assets/spanel/ckeditor/adapters/jquery.js" type="text/javascript"></script>

        <script>
CKEDITOR.replace('ck_editor', {
    toolbar: 'Basic'
});
CKEDITOR.replace('ck_editor_ar');
//CKEDITOR.replace('basic_ck_editor');
jQuery(document).ready(function () {

});



        </script>

<script type="text/javascript">
    function seenotifications()
    {

    $.get("/spanel_notifications");

    }

</script>

<script src="/vendor/js/tinymce/tinymce.min.js" type="text/javascript"></script>
<script type="text/javascript">
  tinymce.init(
    {"selector":"textarea.tinymce","theme":"modern","skin":"lightgray",relative_urls : false,remove_script_host : false,convert_urls : true,'file_browser_callback' : elFinderBrowser,"plugins":["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker ","searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking","save table contextmenu directionality emoticons template paste textcolor"],"toolbar":"insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons"}
  );
    function elFinderBrowser (field_name, url, type, win) {
  tinymce.activeEditor.windowManager.open({
    file: "/en/gallery",// use an absolute path!
    title: 'Gallery',
    width: 900,
    height: 450,
    resizable: 'yes'

  }, {
    setUrl: function (url) {
      win.document.getElementById(field_name).value = url;
    }
  });
  return false;
}
 </script>




<!-- BEGIN ProvideSupport.com Text Chat Link Code -->
<div id="ci67ER" style="z-index:100;position:absolute"></div><div id="sc67ER" style="display:inline"></div><div id="sd67ER" style="display:none"></div><script type="text/javascript">var se67ER=document.createElement("script");se67ER.type="text/javascript";var se67ERs=(location.protocol.indexOf("https")==0?"https":"http")+"://image.providesupport.com/js/0w4ameqgva8nj1xeoy2k9umls4/safe-textlink.js?ps_h=67ER&ps_t="+new Date().getTime()+"&online-link-html=Live%20Chat%20Online&offline-link-html=Live%20Chat%20Offline";setTimeout("se67ER.src=se67ERs;document.getElementById('sd67ER').appendChild(se67ER)",1)</script><noscript><div style="display:inline"><a href="http://www.providesupport.com?messenger=0w4ameqgva8nj1xeoy2k9umls4">Live Chat</a></div></noscript>
<!-- END ProvideSupport.com Text Chat Link Code -->

    </body>
</html>
