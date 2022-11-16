<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="/">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    @if (auth()->user()->role == "0" || auth()->user()->role == "1")
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#user-management-page" aria-expanded="false" aria-controls="user-management-page">
        <span class="menu-title">User Management</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-account-multiple menu-icon"></i>
      </a>
      <div class="collapse" id="user-management-page">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/user-group">User Group & Access</a></li>
          <li class="nav-item"> <a class="nav-link" href="/user">User</a></li>
          @if (auth()->user()->role == "0")
          <li class="nav-item"> <a class="nav-link" href="/admin">Admin</a></li>
          @endif
        </ul>
      </div>
    </li>
    @endif
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#form-page" aria-expanded="false" aria-controls="form-page">
        <span class="menu-title">Form</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-view-list menu-icon"></i>
      </a>
      <div class="collapse" id="form-page">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/job-safety-analysis">Job Safety Analysis</a></li>
          <li class="nav-item"> <a class="nav-link" href="/internal-purchase-requestion">Internal Purchase <br>Requestion</a></li>
          <li class="nav-item"> <a class="nav-link" href="/hot-work-premit">Hot Work Premit</a></li>
          {{-- <li class="nav-item"> <a class="nav-link" href="/work-at-height-premit">Work At Height Permit</a></li> --}}
          <li class="nav-item"> <a class="nav-link" href="/overtime-work">Overtime Work</a></li>

        </ul>
      </div>
    </li>
    @if (auth()->user()->role == "0")
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#report-page" aria-expanded="false" aria-controls="report-page">
        <span class="menu-title">Report</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-clipboard-check menu-icon"></i>
      </a>
      <div class="collapse" id="report-page">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/attendence">Attendance</a></li>
        </ul>
      </div>
    </li>
    @endif
  </ul>
</nav>