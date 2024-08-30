
<style>
  .welcome-message {
      margin: 0 auto;
      padding: 18px 0;
      max-width: 100%; /* Make it responsive within the container */
  }
  .welcome-message p {
      font-size: 0.9rem; /* Adjust font size as needed */
  }
  .user-name {
      text-transform: uppercase; /* Convert name to uppercase */
  }
  .user-courses {
      font-weight: bold; /* Make courses bold */
      color: #0d6efd; /* Set courses text color to orange */
  }
</style>

<nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">


                  <div class="welcome-message text-center w-100">
                    <p class="mb-0">Welcome, <span class="user-name"></span> ~ <span class="user-courses">{{$administratorData->name}}</span></p>
                  </div>
                    <ul class="navbar-nav">




    




                           
    <!-- Account -->
    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="wd-30 ht-30 rounded-circle" src="{{ (!empty($administratorData->photo)) ? url('upload/admin_images/'.$administratorData->photo) : url('upload/no_image.jpg') }}" alt="profile">
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                    <div class="mb-3">
                                        <img class="wd-80 ht-80 rounded-circle" src="{{ (!empty($administratorData->photo)) ? url('upload/admin_images/'.$administratorData->photo) : url('upload/no_image.jpg') }}" alt="">
                                    </div>
                                    <div class="text-center">
                                        <p class="tx-16 fw-bolder">{{$administratorData->name}}</p>
                                        <p class="tx-12 text-muted">{{$administratorData->email}}</p>
                                    </div>
                                </div>
                <ul class="list-unstyled p-1">

             <!-- Badlisha  link to routes kwa ajili ya admin profiles -->
                  <li class="dropdown-item py-2">
                    <a href="{{ route('techProfile') }}" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="user"></i>
                      <span>Profile</span>
                    </a>
                  </li>

                  <li class="dropdown-item py-2">
                    <a href="{{ route('techPasswordUpdate_view') }}" class="text-body ms-0">
                      <i class="me-2 icon-md fas fa-lock"></i>
                      <span>Change password</span>
                    </a>
                  </li>
                  

                  <li class="dropdown-item py-2">
                    <a href="javascript:;" class="text-body ms-0 d-flex align-items-center justify-content-between">
                        <span>
                            <i class="me-2 icon-md" data-feather="bell"></i> 
                            Notifications
                        </span>
                        <span class="badge bg-primary rounded-circle ms-auto" style="width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;">
                            3
                        </span>
                    </a>
                </li>
              
                  
                  <li class="dropdown-item py-2">
                    <!-- Badlisha  link to routes -->
                    <a href="{{ route('techlogout') }}" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="log-out"></i>
                      <span>Log Out</span>
                    </a>
                  </li>
                </ul>
                            </div>
    </li>
                    </ul>
                </div>
         </nav>


