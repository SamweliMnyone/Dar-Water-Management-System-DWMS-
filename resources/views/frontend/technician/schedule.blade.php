@extends('frontend.technician.technician_dashboard')

@section('page_content')





<style>
    .fc-daygrid-day {
    pointer-events: none; /* Disables all mouse interactions */
}

.card-title {
    font-size: 1.5rem; /* Adjust font size */
    margin-bottom: 1rem; /* Space below heading */
}


</style>

<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 d-none d-md-block">
                    <div class="card-body">
                        <div id='external-events' class='external-events'></div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Heading -->
                            <h2 class="card-title">Maintenance Schedule</h2>
                            <!-- Calendar -->
                            <div id='fullcalendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function() {
    $('#fullcalendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek' // Keep only week view
        },
        // other options...
    });
});
</script>

@endsection