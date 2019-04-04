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
    <link rel="shortcut icon" type="image/ico" href="{{url('images/tab-icon.ico')}}">

    <title>HMS</title>

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- Main styles for this application -->
    <link href="{{url('/css/style.css')}}" rel="stylesheet">
    <link href="{{url('/css/plugins/jquery.auto-complete.css')}}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet">

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
        <a class="navbar-brand" href="{{url('/doctor')}}">
          <img src="{{url('/images/tab-icon.ico')}}" >
          HMS
        </a>
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
                                {{ Auth::user()->first_name }}
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

                <!-- Main content -->
        <main class="main">


            <!-- Breadcrumb -->



            <div class="container-fluid mt-4">
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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.en-GB.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <!-- GenesisUI main scripts -->
    <script  type="text/javascript" src="{{ url('/js/app.js') }}"></script>

    <!-- Plugins and scripts required by this views -->
  <script  type="text/javascript" src="{{ url('/js/patient/index.js') }}"></script>

	@yield('js_includes')
    <!-- Custom scripts required by this view -->

</body>

</html>
