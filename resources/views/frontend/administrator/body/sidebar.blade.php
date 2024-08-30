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
        <a href="{{ route('index') }}" class="nav-link">
          <i class="link-icon" data-feather="home"></i> <!-- Changed to home icon -->
          <span class="link-title">Dashboard</span>
        </a>
      </li>

             <!-- A. Manage Engineers -->
            <li class="nav-item nav-category">Manage Users</li>
              <!-- a) View Engineers -->
              <li class="nav-item">
                <a href="{{ route('view_eng') }}" class="nav-link" role="button">
                  <i class="link-icon" data-feather="users"></i> <!-- Changed to users icon -->
                  <span class="link-title">Engineer Detail</span>
                </a>
              </li>

              <!-- b) Technician Details -->
              <li class="nav-item">
                <a href="{{ route('view_tech') }}" class="nav-link" role="button">
                  <i class="link-icon" data-feather="tool"></i> <!-- Changed to tool icon -->
                  <span class="link-title">Technician Detail</span>
                </a>
              </li>

              <!-- c) Administrator Details -->
              <li class="nav-item">
                <a href="{{ route('view_admin') }}" class="nav-link" role="button">
                  <i class="link-icon" data-feather="user-check"></i> <!-- Changed to user-check icon -->
                  <span class="link-title">Administrator Detail</span>
                </a>
              </li>

            <!-- B. MANAGE REPORTS -->
            <li class="nav-item nav-category">MAINTENANCE SCHEDULE</li>

            <!-- a) View Engineers -->
            <li class="nav-item">
              <a href="{{ route('admin_schedule') }}" class="nav-link" role="button">
                <i class="fas fa-calendar-alt"></i> <!-- Font Awesome calendar icon -->
                <span class="link-title">Manage Schedule</span>
              </a>
            </li>




            <li class="nav-item nav-category">MANAGE REPORTS</li>

              <!-- a) View Engineers -->
              <li class="nav-item">
                <a href="{{ route('view_eng') }}" class="nav-link" role="button">
                  <i class="fas fa-users"></i> <!-- Font Awesome users icon -->
                  <span class="link-title">Engineer Reports</span>
                </a>
              </li>

              <!-- b) Technician Details -->
              <li class="nav-item">
                <a href="{{ route('view_tech') }}" class="nav-link" role="button">
                  <i class="fas fa-tools"></i> <!-- Font Awesome tools icon -->
                  <span class="link-title">Technician Reports</span>
                </a>
              </li>



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
                <li><a class="dropdown-item" href="{{ route('AdministratorProfile') }}">Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('PasswordUpdate') }}">Security</a></li>
              </ul>
            </li>

                
    


    </ul>
  </div>
</nav>
