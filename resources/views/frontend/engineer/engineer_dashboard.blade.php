<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Water Manaintaince System | Engineer Dashboard</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.cs')}}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css')}}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- endinject -->

  <!-- Layout styles -->  
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo1/style.css')}}">
  <!-- End layout styles -->

        {{-- FAVICON --}}
        
        <link rel="icon" href="{{ asset('home template/images/logo.png') }}" type="image/x-icon">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
</head>
<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        
            @include('frontend.engineer.body.sidebar')

        <!-- partial -->
    
        <div class="page-wrapper">
                    
            <!-- partial:partials/_navbar.html -->
         
            @include('frontend.engineer.body.header')

            <!-- partial -->

            <!-- page content is yield -->
            @yield('page_content')

            <!-- partial:partials/_footer.html -->
            @include('frontend.engineer.body.footer')
            <!-- partial -->
        
        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset('backend/assets/vendors/core/core.js')}}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
  <script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
  <script src="{{ asset('../assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/template.js')}}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
  <script src="{{ asset('backend/assets/js/dashboard-dark.js')}}"></script>
    <!-- End custom js for this page -->

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
    
</body>
</html>    