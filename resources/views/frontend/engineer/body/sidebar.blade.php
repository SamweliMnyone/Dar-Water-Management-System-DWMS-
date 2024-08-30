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
        <a href="" class="nav-link">
          <i class="link-icon" data-feather="home"></i> <!-- Changed to home icon -->
          <span class="link-title">Dashboard</span>
        </a>
      </li>

        <!-- B. MANAGE REPORTS -->
        <li class="nav-item nav-category">APRROVE REPORT</li>

        <!-- b) View Reports -->
        <li class="nav-item">
          <a href="{{ route('engineer.reports') }}" class="nav-link" role="button">
            <i class="fas fa-list-alt"></i>
            <span class="link-title">Technician Reports</span>
          </a>
        </li>

      <!-- B. NOTIFICATIONS -->
      <li class="nav-item nav-category">NOTIFICATIONS</li>

      <!-- a) Organizations approval -->
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
          <i class="link-icon" data-feather="check-square"></i> <!-- Changed to check-square icon -->
          <span class="link-title">Organizations approval</span>
        </a>
      </li>

      <!-- C. Setting -->
      <li class="nav-item nav-category">OTHERS</li>

    <!-- a) Setting -->
    <li class="nav-item">
      <a href="" class="nav-link"  role="button">
        <i class="link-icon" data-feather="settings"></i> <!-- Settings icon -->
        <span class="link-title">Setting</span>
      </a>
    </li>
    
    

          <!-- b) Student Guide -->
          <li class="nav-item">
            <a class="nav-link" >
              <i class="link-icon" data-feather="book-open"></i> <!-- Book-open icon -->
              <span class="link-title">Student Guide</span>
            </a>
          </li>

    </ul>
  </div>
</nav>
