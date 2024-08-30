<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
  <meta name="author" content="NobleUI">
  <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <title>Water Manaintaince System | Reset Password</title>

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
      font-size: 10px;
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

        .reset-password-paragraph {
        color: grey; /* Set the text color to grey */
        margin-left: 0px; /* Adjust for desired indentation */
        padding-left: 0px; /* Space between icon and text */
        margin-bottom: 20px;
        }

        .reset-password-paragraph i {

            color: grey; /* Set the icon color to grey as well */
        }
  </style>

  <!-- core:css -->
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
  <!-- endinject -->

  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
  <!-- endinject -->

  <!-- Layout styles -->  
  <link rel="stylesheet" href="{{ asset('backend/assets/css/demo1/style.css') }}">
  <!-- End layout styles -->

  <link rel="icon" href="{{ asset('home template/images/logo.png') }}" type="image/x-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                    <center><a href="#" class="noble-ui-logo d-block mb-1 pb-4" style="font-size:25px;color:#0d6efd;">Reset Password</a></center>

                    <p class="reset-password-paragraph">
                        <i class="fas fa-unlock-alt"></i> <!-- Reset password icon -->
                        Enter your email address and we'll send you a link to reset your password.
                    </p>

                    <form class="forms-sample" method="POST" action="" style="font-size:12px;">
                      @csrf

                      <div class="form-group">
                        <input type="text" class="form-control" name="login" id="login" placeholder=" " required>
                        <label for="login" class="form-label">Enter email</label>
                      </div>

                      <div>
                        <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0 col-md-12">
                         Next
                        </button>
                      </div>

                      <span class="d-block mt-3">
                        <i class="fas fa-envelope-open-text text-muted"></i>
                        <span class="text-muted">Don't have an account?</span> 
                        <a href="https://accounts.google.com/signup" target="_blank" class="text-muted">Create</a>
                    </span>
                    
                                         
                      
                    </form>
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
</body>
</html>
