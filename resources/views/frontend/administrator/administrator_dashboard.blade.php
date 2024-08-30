<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Water Maintenance System | Administrator Dashboard</title>


  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css')}}">
    <!-- endinject -->

    	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('backend/assets/vendors/fullcalendar/main.min.css')}}">
	<!-- End plugin css for this page -->

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

        <!-- Sidebar -->
        @include('frontend.administrator.body.sidebar')

        <div class="page-wrapper">
            <!-- Navbar -->
            @include('frontend.administrator.body.header')

            <!-- Page Content -->
            @yield('page_content')

            <!-- Footer -->
            @include('frontend.administrator.body.footer')
        </div>
    </div>


    <!-- core:js -->
    <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/template.js') }}"></script>
    <!-- endinject -->

	<!-- Plugin js for this page -->
	<script src="{{ asset('backend/assets/vendors/moment/moment.min.js') }}"></script>
	<script src="{{ asset('backend/assets/vendors/fullcalendar/main.min.js') }}"></script>
	<!-- End plugin js for this page -->

      <!-- Plugin css for this page -->
      <link rel="stylesheet" href="{{ asset('backend/assets/vendors/fullcalendar/main.min.css') }}">
      <!-- End plugin css for this page -->

    <!-- Toastr JS -->
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

    <script>
      $(document).ready(function() {
          var calendar = new FullCalendar.Calendar($('#fullcalendar')[0], {
              plugins: ['interaction', 'dayGrid'],
              header: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'month,agendaWeek'
              },
              selectable: true,
              editable: true,
              events: '/events', // URL to fetch events

              select: function(info) {
                  $('#createEventModal').modal('show');
                  $('#eventStart').val(info.startStr);
                  $('#eventEnd').val(info.endStr);
                  $('#eventId').val(''); // Reset event ID for new events
              },

              eventClick: function(info) {
                  $('#createEventModal').modal('show');
                  $('#eventTitle').val(info.event.title);
                  $('#eventStart').val(info.event.startStr);
                  $('#eventEnd').val(info.event.endStr);
                  $('#eventDescription').val(info.event.extendedProps.description);
                  $('#eventId').val(info.event.id); // Set event ID for editing
              },

              eventDrop: function(info) {
                  $.ajax({
                      url: '/events/' + info.event.id,
                      method: 'PUT',
                      data: {
                          title: info.event.title,
                          start: info.event.startStr,
                          end: info.event.endStr,
                          _token: '{{ csrf_token() }}'
                      },
                      success: function(response) {
                          alert('Event moved successfully');
                      },
                      error: function(response) {
                          alert('Failed to move event');
                          info.revert();
                      }
                  });
              }
          });
          calendar.render();
        });
    </script>
    <script>
          // Handle the Save button click for adding/editing events
          $('#saveEventBtn').click(function() {
              var id = $('#eventId').val();
              console.log(`The id is passed and it is: ${id}`);
              var method = id ? 'PUT' : 'POST';
              console.log(`The method is: ${method}`);
              var url = id ? '/events/' + id : '/events';
              console.log(`The url is: ${url}`);

              $.ajax({
                  url: url,
                  method: method,
                  data: {
                      title: $('#eventTitle').val(),
                      description: $('#eventDescription').val(),
                      start: $('#eventStart').val(),
                      end: $('#eventEnd').val(),
                      _token: '{{ csrf_token() }}'
                  },
                  success: function(response) {
                                          $('#createEventModal').modal('hide');
                    swal("Successful!", "Event added successfully", "success");

                      if (id) {
                          // Update existing event
                          calendar.getEventById(id).setProp('title', $('#eventTitle').val());
                          calendar.getEventById(id).setDates($('#eventStart').val(), $('#eventEnd').val());
                          calendar.getEventById(id).setExtendedProp('description', $('#eventDescription').val());
                      } else {
                          // Add new event
                          calendar.addEvent({
                              id: response.id,
                              title: $('#eventTitle').val(),
                              start: $('#eventStart').val(),
                              end: $('#eventEnd').val(),
                              description: $('#eventDescription').val()
                          });
                      }
                  },
                  error: function(response) {
                    swal("Failed", "Failed to add event", "error");
                  }
              });
          });
    </script>
</body>
</html>
