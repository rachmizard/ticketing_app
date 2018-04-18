<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Slarva Travel</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="{{asset('css/bootstrap.cs')}}s" type="text/css" />
  <link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('css/font.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('/js/select2/select2.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('/js/select2/theme.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('/js/fuelux/fuelux.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('/js/datepicker/datepicker.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('/js/slider/slider.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('/js/datatables/datatables.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body>
  <section class="vbox">
    <header class="bg-black dk header navbar navbar-fixed-top-xs">
      <div class="navbar-header aside-md">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="/images/logo.png" class="m-r-sm">Slarva Travel</a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <ul class="nav navbar-nav hidden-xs">
        <li>
          <div class="m-t m-l">
            <a href="price.html" class="dropdown-toggle btn btn-xs btn-primary" title="Upgrade"><i class="fa fa-long-arrow-up"></i></a>
          </div>
        </li>
      </ul>      
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
        <li class="hidden-xs">
          <a href="#" class="dropdown-toggle dk" data-toggle="dropdown">
            <i class="fa fa-bell"></i>
            <span class="badge badge-sm up bg-danger m-l-n-sm count">2</span>
          </a>
          <section class="dropdown-menu aside-xl">
            <section class="panel bg-white">
              <header class="panel-heading b-light bg-light">
                <strong>You have <span class="count">2</span> notifications</strong>
              </header>
              <div class="list-group list-group-alt animated fadeInRight">
                <a href="#" class="media list-group-item">
                  <span class="pull-left thumb-sm">
                    <img src="images/avatar.jpg" alt="John said" class="img-circle">
                  </span>
                  <span class="media-body block m-b-none">
                    Use awesome animate.css<br>
                    <small class="text-muted">10 minutes ago</small>
                  </span>
                </a>
                <a href="#" class="media list-group-item">
                  <span class="media-body block m-b-none">
                    1.0 initial released<br>
                    <small class="text-muted">1 hour ago</small>
                  </span>
                </a>
              </div>
              <footer class="panel-footer text-sm">
                <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
              </footer>
            </section>
          </section>
        </li>
        <li class="dropdown hidden-xs">
          <a href="#" class="dropdown-toggle dker" data-toggle="dropdown"><i class="fa fa-fw fa-search"></i></a>
          <section class="dropdown-menu aside-xl animated fadeInUp">
            <section class="panel bg-white">
              <form role="search">
                <div class="form-group wrapper m-b-none">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-icon"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                </div>
              </form>
            </section>
          </section>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              @if(Auth::user()->photo == null)
              <img src="/img/user.png" width="50" height="50">
              @else
              <img src="/img/{{Auth::user()->photo}}" width="50" height="50">
              @endif
            </span>
            {{ Auth::user()->name }} <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">
            <span class="arrow top"></span>
            <li>
              <a href="#">Settings</a>
            </li>
            <li>
              <a href="profile">Profile</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span>
                  Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
      </ul>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black lter aside-md hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                @include('layouts.navbar')
              </div>
            </section>
            
            <footer class="footer lt hidden-xs b-t b-black">
              <div id="chat" class="dropup">
                <section class="dropdown-menu on aside-md m-l-n">
                  <section class="panel bg-white">
                    <header class="panel-heading b-b b-light">Active chats</header>
                    <div class="panel-body animated fadeInRight">
                      <p class="text-sm">No active chats.</p>
                      <p><a href="#" class="btn btn-sm btn-default">Start a chat</a></p>
                    </div>
                  </section>
                </section>
              </div>
              <div id="invite" class="dropup">                
                <section class="dropdown-menu on aside-md m-l-n">
                  <section class="panel bg-white">
                    <header class="panel-heading b-b b-light">
                      John <i class="fa fa-circle text-success"></i>
                    </header>
                    <div class="panel-body animated fadeInRight">
                      <p class="text-sm">No contacts in your lists.</p>
                      <p><a href="#" class="btn btn-sm btn-facebook"><i class="fa fa-fw fa-facebook"></i> Invite from Facebook</a></p>
                    </div>
                  </section>
                </section>
              </div>
              <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-black btn-icon">
                <i class="fa fa-angle-left text"></i>
                <i class="fa fa-angle-right text-active"></i>
              </a>
              <div class="btn-group hidden-nav-xs">
                <button type="button" title="Chats" class="btn btn-icon btn-sm btn-black" data-toggle="dropdown" data-target="#chat"><i class="fa fa-comment-o"></i></button>
                <button type="button" title="Contacts" class="btn btn-icon btn-sm btn-black" data-toggle="dropdown" data-target="#invite"><i class="fa fa-facebook"></i></button>
              </div>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">
              @yield('content')
            <footer class="footer bg-white b-t b-light">
              <p>This is a footer</p>
            </footer>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
      </section>
    </section>
  </section>
  <script src="{{asset('/js/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('/js/bootstrap.js')}}"></script>
  <!-- App -->
  <script src="{{asset('/js/app.js')}}"></script>
  <script src="{{asset('/js/app.plugin.js')}}"></script>
  <script src="{{asset('/js/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('/js/charts/easypiechart/jquery.easy-pie-chart.js')}}"></script>
  <script src="{{asset('/js/charts/sparkline/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('/js/charts/flot/jquery.flot.min.js')}}"></script>
  <script src="{{asset('/js/charts/flot/jquery.flot.tooltip.min.js')}}"></script>
  <script src="{{asset('/js/charts/flot/jquery.flot.resize.js')}}"></script>
  <script src="{{asset('/js/charts/flot/jquery.flot.grow.js')}}"></script>
  <script src="{{asset('/js/charts/flot/demo.js')}}"></script>

  <script src="{{asset('/js/calendar/bootstrap_calendar.js')}}"></script>
  <script src="{{asset('/js/calendar/demo.js')}}"></script>

  <script src="{{asset('/js/sortable/jquery.sortable.j')}}s"></script>
  <!-- parsley -->
  <script src="{{asset('js/parsley/parsley.min.js')}}"></script>
  <script src="{{asset('js/parsley/parsley.extend.js')}}"></script>
  <!-- fuelux -->
  <script src="{{asset('/js/fuelux/fuelux.js')}}"></script>
  <!-- datepicker -->
  <script src="{{asset('/js/datepicker/bootstrap-datepicker.js')}}"></script>
  <!-- slider -->
  <script src="{{asset('/js/slider/bootstrap-slider.js')}}"></script>
  <!-- file input -->  
  <script src="{{asset('/js/file-input/bootstrap-filestyle.min.js')}}"></script>
  <!-- combodate -->
  <script src="{{asset('/js/libs/moment.min.js')}}"></script>
  <script src="{{asset('/js/combodate/combodate.js')}}"></script>
  <!-- select2 -->
  <script src="{{asset('/js/select2/select2.min.js')}}"></script>
  <!-- wysiwyg -->
  <script src="{{asset('/js/wysiwyg/jquery.hotkeys.j')}}s"></script>
  <script src="{{asset('/js/wysiwyg/bootstrap-wysiwyg.js')}}"></script>
  <script src="{{asset('/js/wysiwyg/demo.js')}}"></script>
  <!-- markdown -->
  <script src="{{asset('/js/markdown/epiceditor.min.js')}}"></script>
  <script src="{{asset('/js/markdown/demo.js')}}"></script>
  <!-- datatables -->
  <script src="{{asset('/js/datatables/jquery.dataTables.min.js')}}"></script>
  
</body>
</html>
