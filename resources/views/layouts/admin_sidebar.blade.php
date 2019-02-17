<div class="sidebar" id="admin-sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" id="admin-home" href="{{ url('admin' )}}"><i class="icon-speedometer"></i> Home </a>
            </li>

            <li class="nav-title">
                User Management
            </li>
            <li class="nav-item">
                <a class="nav-link"id="admin-logins"  href="{{ url('admin/logins')}}"><i class="icon-user"></i> Logins</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="admin-roles" href="{{ url('admin/roles')}}"><i class="icon-people"></i> Roles</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" id="admin-edit-details" href="{{ url('admin/user')}}"><i class="icon-note"></i>Users</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" id="admin-issue-cards" href="{{ url('admin/card/search_index')}}"><i class="icon-wallet"></i> Issue Cards</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="admin-orders" href="{{ url('admin/orders')}}"><i class="icon-wallet"></i> Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" dusk="admin-centres" id="admin-centres" href="{{ url('admin/centres')}}"><i class="icon-home"></i> Centres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="admin-account-managers" href="{{ url('admin/accounts')}}"><i class="icon-briefcase"></i> Account Managers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="admin-text-leaderboard" href="{{ url('admin/texts')}}"><i class="icon-screen-smartphone"></i> Text Leaderboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="admin-data-download" href="{{ url('admin/data/download')}}"><i class="icon-user"></i> Data Download</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/faqs')}}"><i class="icon-wallet"></i> Faqs</a>
            </li>

          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
          Reader Management
          </a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" id="admin-reader-management" href="{{ url('admin/readers')}}"><i class="icon-layers"></i>
          Manage
          </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="admin-readers" href="{{ url('admin/readers/status/index')}}"><i class="fa fa-signal"></i>
          Status
          </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="admin-add-ip" href="{{url('admin/aws/rules')}}"><i class="fa fa-server"></i>
          Add IP
          </a>
              </li>
            </ul>
          </li>



            <!-- What is this?
            <li class="nav-item">
                <a class="nav-link" id="admin-card-management" href="{{ url('admin/card/search')}}"><i class="icon-folder"></i>Card Management</a>
            </li>
            -->

            <li class="nav-title">
                Test
            </li>
            <li class="nav-item">
                <a class="nav-link" id="admin-messages" href="{{ url('admin/messages')}}"><i class="icon-people"></i> Messages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="admin-messages" href="{{ url('admin/test-users')}}"><i class="icon-people"></i> Add Test User</a>
            </li>
            <li class="nav-title">
                Loyalty
            </li>
            <li class="nav-item">
                <a class="nav-link" id="admin-options" href="{{ url('admin/loyalty')}}"><i class="icon-heart"></i> Options</a>
            </li>

        </ul>
    </nav>
</div>
