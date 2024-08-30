


<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      <i class="fas fa-tint" style="color: #0d6efd; margin-right: 8px;"></i> <!-- Blue water drop icon -->
      WaterCare<span></span>
    </a>
    
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  
  
  
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item">
        <a href="{{ route('techDashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="home"></i> <!-- Changed to home icon -->
          <span class="link-title">Dashboard</span>
        </a>
      </li>

      <!-- A. Manage Students -->
      <li class="nav-item nav-category">MAINTAINANCE SCHEDULE</li>


        <!-- a) View Engineers -->
        <li class="nav-item">
        <a href="{{ route('schedule') }}" class="nav-link" role="button">
          <i class="fas fa-calendar-alt"></i> <!-- Font Awesome calendar icon -->
          <span class="link-title">Manage Schedule</span>
        </a>
      </li>

    <!-- B. NOTIFICATIONS -->
    <li class="nav-item nav-category">NOTIFICATIONS</li>

    <!-- a) Preventive Maintenance -->
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#preventiveMaintenance" role="button" aria-expanded="false" aria-controls="preventiveMaintenance">
        <i class="fas fa-shield-alt black-icon"></i> <!-- Shield icon for preventive measures -->
        <span class="link-title">Preventive Maintenance</span>
       
      </a>
    </li>

    <!-- b) Corrective Maintenance -->
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#correctiveMaintenance" role="button" aria-expanded="false" aria-controls="correctiveMaintenance">
        <i class="fas fa-exclamation-triangle black-icon"></i> <!-- Alert triangle icon for corrective actions -->
        <span class="link-title">Corrective Maintenance</span>
       
      </a>
    </li>


<!-- B. MANAGE REPORTS -->
<li class="nav-item nav-category">MAINTENANCE REPORT</li>

<!-- a) Add Report -->
<li class="nav-item">
  <a href="{{ route('report_view') }}" class="nav-link" role="button">
    <i class="fas fa-plus-circle"></i>
    <span class="link-title">Add Report</span>
  </a>
</li>

<!-- b) View Reports -->
<li class="nav-item">
  <a href="{{ route('reports.index') }}" class="nav-link" role="button">
    <i class="fas fa-list-alt"></i>
    <span class="link-title">View Reports</span>
  </a>
</li>






      <!-- C. Setting -->
      <li class="nav-item nav-category">OTHERS</li>
            <!-- a) Setting with Dropdown -->
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="link-icon" data-feather="settings"></i> <!-- Settings icon -->
                <span class="link-title">Setting</span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="settingsDropdown">
                <li><a class="dropdown-item" href="{{ route('techProfile') }}">Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('techPasswordUpdate_view') }}">Security</a></li>
              </ul>
            </li>

    </ul>
  </div>
</nav>
