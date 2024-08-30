<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Water Maintenance System | Technician Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->  
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo1/style.css') }}">
    <!-- End layout styles -->

    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Toastr CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('home template/images/logo.png') }}" type="image/x-icon">
</head>
<body>
    <div class="main-wrapper">
        <!-- Sidebar -->
        @include('frontend.technician.body.sidebar')

        <div class="page-wrapper">
            <!-- Navbar -->
            @include('frontend.technician.body.header')

            <!-- Page Content -->
            @yield('page_content')

            <!-- Footer -->
            @include('frontend.technician.body.footer')
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

    <!-- jQuery and jQuery UI -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <!-- Toastr JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Custom Scripts for Page -->
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
    
    <!-- Autocomplete Script -->
    <script>
        $(function() {
            var availableRegions = [
                "Dar es Salaam", "Dodoma", "Arusha", "Mwanza", "Mbeya", 
                "Kilimanjaro", "Morogoro", "Mtwara", "Ruvuma", "Rukwa", 
                "Tabora", "Shinyanga", "Geita", "Kigoma", "Katavi", 
                "Singida", "Pwani", "Manyara", "Simiyu", "Tanga",
                "Zanzibar", "Pemba", "Unguja"
            ];

            var availableWards = [
                "Ilala", "Kinondoni", "Temeke", "Ubungo", "Kigamboni",
                "Msasani", "Kariakoo", "Magomeni", "Mburahati", "Gongo la Mboto",
                "Manzese", "Upanga", "Harambee", "Jangwani", "Mchikichini",
                "Dodoma City", "Dodoma Rural", "Kondoa", "Mpwapwa",
                "Bahi", "Chamwino", "Kongwa", "Manyoni", "Mkalama",
                "Arusha City", "Arusha Rural", "Meru", "Ngorongoro",
                "Monduli", "Simanjiro", "Longido", "Karatu", "Babati",
                "Ilemela", "Nyamagana", "Sengerema", "Kwimba",
                "Misungwi", "Geita", "Busega", "Ukerewe", "Kishapu",
                "Mbeya City", "Mbeya Rural", "Rungwe", "Chunya", "Kyela",
                "Mbozi", "Isibika", "Ikungi", "Mbarali", "Mbozi",
                "Moshi", "Hai", "Rombo", "Same", "Mwanga",
                "Korogwe", "Lushoto", "Handeni", "Pangani", "Muheza",
                "Kilindi", "Mkinga", "Tanga Urban", "Tanga Rural",
                "Bagamoyo", "Kibaha", "Mkuranga", "Rufiji", "Kibaha Rural",
                "Mlandizi", "Chalinze", "Pwani", "Bagamoyo",
                "Babati", "Mbulu", "Simanjiro", "Longido",
                "Kiteto", "Babati Rural", "Endulen", "Katesh", "Manyara",
                "Busega", "Igalula", "Maswa", "Meatu",
                "Mwibara", "Meatu Rural", "Simiyu", "Maswa Rural",
                "Rukwa", "Sumbawanga Urban", "Sumbawanga Rural", "Nkasi", "Kalambo",
                "Ruvuma", "Mbinga", "Nyasa", "Tunduru", "Namtumbo",
                "Songea Urban", "Songea Rural", "Ruvuma", "Mbuga",
                "Kigoma Urban", "Kigoma Rural", "Uvinza", "Kibondo",
                "Kasulu", "Biharamulo", "Ngara", "Kigoma", "Kibondo Rural",
                "Katavi Urban", "Mpanda", "Kashishi", "Nsimbo", "Mlele",
                "Kigoma", "Kalambo", "Mlele", "Uvinza", "Katavi",
                "Singida Urban", "Singida Rural", "Ikungi", "Manyoni",
                "Mkalama", "Iramba", "Mihingo", "Singida", "Igunga",
                "Pwani Urban", "Bagamoyo", "Kibaha", "Mkuranga", "Rufiji",
                "Kibaha Rural", "Mlandizi", "Chalinze", "Pwani",
                "Manyara Urban", "Babati", "Mbulu", "Simanjiro", "Longido",
                "Kiteto", "Babati Rural", "Endulen", "Katesh", "Manyara",
                "Simiyu Urban", "Busega", "Igalula", "Maswa", "Meatu",
                "Mwibara", "Meatu Rural", "Simiyu", "Maswa Rural",
                "Tanga Urban", "Tanga Rural", "Korogwe", "Lushoto",
                "Handeni", "Pangani", "Muheza", "Kilindi", "Tanga", "Mkinga"
            ];

            $("#region").autocomplete({
                source: availableRegions,
                minLength: 1,
                open: function(event, ui) {
                    var dropdown = $(this).autocomplete("widget");
                    dropdown.find("li:gt(5)").hide(); // Hide all but the first 6 items
                }
            });

            $("#ward").autocomplete({
                source: availableWards,
                minLength: 1,
                open: function(event, ui) {
                    var dropdown = $(this).autocomplete("widget");
                    dropdown.find("li:gt(5)").hide(); // Hide all but the first 6 items
                }
            });
        });
    </script>

<script>
$(function() {
    var currentStep = 0;
    var steps = $(".form-step");
    var nextBtn = $("#nextBtn");
    var prevBtn = $("#prevBtn");
    var submitBtn = $("#submitBtn");

    function showStep(step) {
        steps.removeClass("form-step-active");
        $(steps[step]).addClass("form-step-active");

        prevBtn.toggle(step > 0);
        nextBtn.toggle(step < steps.length - 1);
        submitBtn.toggle(step === steps.length - 1);
    }

    nextBtn.on("click", function() {
        // Add form validation for the current step if needed
        var currentFormStep = $(steps[currentStep]);
        if (currentFormStep.find("input, textarea").filter(function() {
            return !this.checkValidity();
        }).length === 0) {
            currentStep++;
            showStep(currentStep);
        } else {
            // Optional: Notify user of invalid fields
            toastr.warning("Please fill out all required fields.");
        }
    });

    prevBtn.on("click", function() {
        currentStep--;
        showStep(currentStep);
    });

    showStep(currentStep);
});

</script>
</body>
</html>
