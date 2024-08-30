@extends('frontend.administrator.administrator_dashboard')

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
                            <h2 class="card-title">Maintenance Schedule</h2>
                            <div id='fullcalendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FullCalendar Modals -->
    <div id="fullCalModal" class="modal fade" tabindex="-1" aria-labelledby="fullCalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalTitle1" class="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modalBody1" class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="eventPageBtn">Event Page</button>
                </div>
            </div>
        </div>
    </div>

    <div id="createEventModal" class="modal fade" tabindex="-1" aria-labelledby="createEventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalTitle2" class="modal-title">Add Event</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modalBody2" class="modal-body">
                    <form id="eventForm" action="{{ route('events.store') }}" method="POST">
                        @csrf
                        <input type="hidden" id="eventId" name="event_id">
                        <div class="mb-3">
                            <label for="eventTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="eventTitle" name="title" placeholder="Event Title" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="eventDescription" name="description" placeholder="Event Description" ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="eventStart" class="form-label">Start Date and Time</label>
                            <input type="datetime-local" class="form-control" id="eventStart" name="start" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventEnd" class="form-label">End Date and Time</label>
                            <input type="datetime-local" class="form-control" id="eventEnd" name="end" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="saveEventBtn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
