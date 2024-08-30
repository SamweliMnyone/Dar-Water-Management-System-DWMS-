<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
  <meta name="author" content="NobleUI">
  <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <title>Water Manaintaince System | Register</title>

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
                    <center><a href="#" class="noble-ui-logo d-block mb-1 pb-4" style="font-size:30px;color:#0d6efd;">Register</a></center>

                    <form class="forms-sample" method="POST" action="{{ route('registersubmit')}}" style="font-size:12px;">
                      @csrf

                      <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder=" " required>
                        <label for="name" class="form-label">Username</label>
                      </div>

                      <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder=" " required>
                        <label for="email" class="form-label">Email</label>
                      </div>

                      <div class="form-group">
                        <input type="number" class="form-control" name="phone" id="phone" placeholder=" " required>
                        <label for="phone" class="form-label">Phone</label>
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control" name="address" id="address" placeholder=" " required>
                        <label for="address" class="form-label">Adress</label>
                      </div>

                      <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder=" " required>
                        <label for="password" class="form-label">Password</label>
                      </div>

                      <div>
                        <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0 col-md-12">
                          Register
                        </button>
                      </div>

                      <span class="d-block mt-3 text-muted">
                        If your a user? <a href="{{ route('login_view') }}" class="text-muted">Login</a>
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
  window.addEventListener('pageshow', function(event) {
      if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
          window.location.reload();
      }
  });
</script>
  
</body>
</html>
