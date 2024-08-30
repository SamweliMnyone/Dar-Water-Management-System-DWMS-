@extends('frontend.technician.technician_dashboard')

@section('page_content')


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