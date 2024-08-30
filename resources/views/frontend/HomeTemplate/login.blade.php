<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
  <meta name="author" content="NobleUI">
  <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <title>Water Maintenance System | Login</title>

  <style type="text/css">

  @font-face {
      font-family: 'Metropolis';
      src: url('path/to/fonts/Metropolis-SemiBold.woff2') format('woff2'),
           url('path/to/fonts/Metropolis-SemiBold.woff') format('woff');
      font-weight: 600; /* SemiBold weight */
      font-style: normal;
  }

  body {
      font-family: 'Metropolis', sans-serif;
  }

  .form-group {
      position: relative;
      margin-bottom: 20px;
  }

  .form-control {
      width: 100%;
      padding: 10px;
      border: 2px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
      transition: border-color 0.3s ease;
  }

  .form-control:focus {
      border-color: #0d6efd;
      outline: none;
  }

  .form-label {
      position: absolute;
      top: 10px;
      left: 10px;
      font-size: 14px;
      color: #999;
      pointer-events: none;
      transition: all 0.3s ease;
  }

  .form-control:focus + .form-label,
  .form-control:not(:placeholder-shown) + .form-label {
      top: -10px;
      left: 5px;
      font-size: 12px;
      color: #0d6efd;
      background-color: #fff;
      padding: 0 5px;
  }

  .help-section {
      font-family: Arial, sans-serif;
      line-height: 1.6;
  }
  .help-section p {
      margin-bottom: 10px;
  }
  .help-section i {
      margin-right: 8px;
      color: #0d6efd; /* Customize icon color */
  }
  .contact-info {
      margin-top: 15px;
  }

  </style>

  <!-- core:css -->
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
  <!-- endinject -->

  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- endinject -->

  <!-- Layout styles -->  
  <link rel="stylesheet" href="{{ asset('backend/assets/css/demo1/style.css') }}">
  <!-- End layout styles -->

  <link rel="icon" href="{{ asset('home template/images/logo.png') }}" type="image/x-icon">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

</head>
<body>
  <div class="main-wrapper">
    <div class="page-wrapper full-page">
      <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-0 auth-page">
          <div class="col-md-4 col-xl-4 mx-auto">
            <div class="card">
              <div class="row">
                <div class="col-md-12 ps-md-3">
                  <div class="auth-form-wrapper px-4 py-5">
                    <center><a href="#" class="noble-ui-logo d-block mb-1 pb-4" style="font-size:30px;color:#0d6efd;">Login</a></center>

                    <form class="forms-sample" method="POST" action="{{ route('logins') }}" style="font-size:12px;">
                      @csrf
                      <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder=" " value="{{ old('email') }}" required>
                        <label for="email" class="form-label">Email</label>
                      </div>
                    
                      <div class="form-group">
                        <input type="password" name="password" class="form-control " id="password" placeholder=" " required>
                        <label for="password" class="form-label">Password</label>
                      </div>
                    
                      <div>
                        <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0 col-md-12">
                          Login
                        </button>
                      </div>
                    
                      <span class="d-block mt-3 text-muted">
                        Not a user? <a href="{{ route('register_view') }}" class="text-muted">Register</a>
                      </span>
                    
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="{{ route('forgotpassword_view') }}" class="text-muted">Forgot password</a>
                        <span class="text-muted">
                          <a href="#" class="text-muted" data-bs-toggle="modal" data-bs-target="#helpModal">
                            <i class="fas fa-question-circle"></i> Help
                          </a>
                        </span>
                      </div>
                    </form>
                    
                      <!-- START MODAL -->
                      <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="helpModalLabel">Help Desk</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <!-- Help content goes here -->
                              <div class="help-section">
                                <p>
                                  <i class="fas fa-hand-point-right"></i>
                                  Welcome to the Water Maintenance Management System! Our system is designed to streamline the maintenance of water distribution networks and reduce non-revenue water through efficient management practices.
                                </p>
                                <p>
                                    <i class="fas fa-sign-in-alt"></i>
                                    To get started, simply log in using your credentials. Click the <strong>Login</strong> button on the homepage, enter your username and password.
                                </p>
                                <p>
                                    <i class="fas fa-user-plus"></i>
                                    If you are not a registered user, please click on <strong>Register</strong> to create a new account. Fill out the registration form with your details, and after approval, you’ll gain access to the system based on your role.
                                </p>
                                <p>
                                    <i class="fas fa-question-circle"></i>
                                    For any issues or additional assistance, consult the <strong>Help</strong> section or contact our support team.
                                </p>
                                <div class="contact-info">
                                    <p>
                                        <i class="fas fa-phone-alt"></i>
                                        Contacts: +255 758564018
                                    </p>
                                    <p>
                                        <i class="fas fa-envelope"></i>
                                        Email: samymnyone06@gmail.com
                                    </p>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- END MODAL -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>

  <!-- core:js -->
  <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
  <!-- endinject -->

  <!-- inject:js -->
  <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/template.js') }}"></script>
  <!-- endinject -->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    @if(session('message'))
        var type = "{{ session('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ session('message') }}");
                break;
            case 'success':
                toastr.success("{{ session('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ session('message') }}");
                break;
            case 'error':
                toastr.error("{{ session('message') }}");
                break;
        }
    @endif
  
    @if ($errors->any())
        var errorMessages = '';
        @foreach ($errors->all() as $error)
            errorMessages += '<p>{{ $error }}</p>';
        @endforeach
        toastr.error(errorMessages, "", { timeOut: 10000, extendedTimeOut: 5000, closeButton: true, progressBar: true, escapeHtml: false });
    @endif
    </script>

<script>
  // Triggered when the user navigates to a cached page
  window.addEventListener('pageshow', function(event) {
      // If the page is loaded from cache, it will have persisted state
      if (event.persisted) {
          // Use a timeout to delay the reload slightly, making it less noticeable
          setTimeout(function() {
              // Force the page to reload from the server
              window.location.reload(true);
          }, 100); // A small delay to ensure a smooth experience
      }
  });
</script>


</body>
</html>
