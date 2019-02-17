<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="HMS">
    <meta name="author" content="">
    <meta name="keyword" content="">
	  <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{url('image/tab-icon.ico')}}">

    <title>HMS</title>

    <!-- Icons -->
    <link href="{{url('/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('/css/simple-line-icons.css')}}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{url('/css/style.css')}}" rel="stylesheet">
    <link href="{{url('/css/plugins/jquery.auto-complete.css')}}" rel="stylesheet">


	  @yield('css_includes')

	<style>
		@yield('css_styles')
		.hidden-div {
			display: none;
		}
	</style>

</head>


<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <!-- Modal for Readers Status Page. Must be placed here so that it will appear above all other elements -->
  <div class="modal fade" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
        </div>
        <div class="modal-body" id="overlay-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">☰</button>
        <a class="navbar-brand" href="#"></a>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item">
                <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <!-- Authentication Links -->
            @if (Auth::guard('admin')->check() || Auth::guard()->check())
                <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if (Auth::guard('admin')->check())
                                Admin
                            @else
                                {{ Auth::user()->name }}
                            @endif
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (Auth::guard('admin')->check())
                                <a class="dropdown-item" href="{{ url('/admin')}}">Dashboard</a>
                            @else
                                <a class="dropdown-item" href="/">Dashboard</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
            @else
            <li class="nav-item dropdown">
                    <a id="linkDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ __('Login') }}
                        <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="linkDropdown">
                        <a class="dropdown-item" href="{{ route('login') }}">
                            {{ __('User') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('admin.login') }}">
                            {{ __('Admin') }}
                        </a>
                    </div>
                </li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @endif
        </ul>
    </header>


    <div class="app-body">
        @include('layouts.admin_sidebar')

                <!-- Main content -->
        <main class="main">


            <!-- Breadcrumb -->
            <ol class="breadcrumb" id="breadcrumb-buttons">

                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Dashboard</li>

                <!-- Breadcrumb Menu-->

            </ol>


            <div class="container-fluid">
                <div class="animated fadeIn">
                    @yield('main')

                </div>
            </div>
            <!-- /.conainer-fluid -->
        </main>
    </div>

    <footer class="app-footer">
        <a href="">HMS</a> © 2019 HMS.
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{ url('/js/plugins/jquery.auto-complete.min.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


    <!-- Plugins and scripts required by all views -->

    <!-- GenesisUI main scripts -->
    <script  type="text/javascript" src="{{ url('/js/app.js') }}"></script>

    <!-- Plugins and scripts required by this views -->



	<script src="{{ url('/js/plugins/jquery.auto-complete.min.js') }}"></script>

	@yield('js_includes')
    <!-- Custom scripts required by this view -->

</body>

</html>
