<div class="sidebar" id="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('doctor/')}}"><i class="icon-speedometer"></i> Dashboard <span class="badge badge-primary">NEW</span></a>
          </li>

          <li class="nav-title">
             <i class="icon-people"></i>
          </li>
          <li class="nav-item ">
            <a class="nav-link " href="{{ url('doctor/patients')}}"><i class="fas fa-users"></i> Patients</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " href="{{ url('doctor/appointments')}}"><i class="fas fa-clipboard-list"></i> Appointments</a>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link " href="{{ url('doctor/labs')}}"><i class="fas fa-flask"></i> Labs</a>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link " href="{{ url('doctor/medicine')}}"><i class="fas fa-pills"></i> Medicine</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('doctor/hours')}}"><i class="fas fa-clock"></i> Working Hours</a>
          </li>
        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
