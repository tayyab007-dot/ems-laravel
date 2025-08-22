<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->



      <li class="nav-heading">Pages</li>

      {{-- Manager start --}}
{{-- 
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('managers.index') }}">
          <i class="bi bi-person"></i>
          <span>Manager</span>
        </a>
      </li> --}}
      {{-- Manager End --}}
      <!-- End Profile Page Nav -->

     @can('manage employees')
       <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('employees.index') }}">
          <i class="bi bi-person"></i>
          <span>Employee</span>
        </a>
      </li>
     @endcan
      

       <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route ('tasks.index') }}">
          <i class="bi bi-file-earmark"></i>
          <span>Tasks</span>
        </a>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route ('tasks-assign.index') }}">
          <i class="bi bi-file-earmark"></i>
          <span>Assign Task</span>
        </a>
      </li>

      

      <!-- End Blank Page Nav -->

      {{-- Start component --}}

       {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Alerts</span>
            </a>
          </li>
        </ul>
      </li> --}}

      {{-- End Component --}}

    </ul>

  </aside>
  <!-- End Sidebar-->
