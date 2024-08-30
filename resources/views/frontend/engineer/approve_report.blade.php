@extends('frontend.engineer.engineer_dashboard')

@section('page_content')

<style>
/* Existing styles */
.table-bordered th, .table-bordered td {
    border: 1px solid #dee2e6;
}

.table-bordered tbody tr:hover {
    background-color: #f5f5f5; /* Light grey background on hover */
    cursor: pointer; /* Change cursor to pointer to indicate clickable rows */
}

/* Modal styles */
.modal-content {
    border-radius: 8px;
}
.modal-header, .modal-footer {
    border-bottom: 1px solid #dee2e6;
}
</style>

<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('engineerDashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Reports</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Technician Reports</h6>

                    <div class="table-responsive">
                        @if($reports->count())
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Technician</th> <!-- Technician Name -->
                                        <th>Region</th>
                                        <th>Ward</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>Finish Date</th>
                                        <th>Labour Cost</th>
                                        <th>Tools Cost</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = ($reports->currentPage() - 1) * $reports->perPage() + 1;
                                    @endphp
                                    @foreach($reports as $report)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $report->technician->name ?? 'Unknown' }}</td> <!-- Display Technician Name -->
                                        <td>{{ $report->region }}</td>
                                        <td>{{ $report->ward }}</td>
                                        <td>{{ $report->description }}</td>
                                        <td>{{ $report->start }}</td>
                                        <td>{{ $report->finish }}</td>
                                        <td>{{ $report->labour_cost }}</td>
                                        <td>{{ $report->tools_cost }}</td>
                                        <td>{{ $report->status }}</td>
                                        <td>
                                            <!-- View Report Icon -->
                                            <button class="btn btn-primary view-report"  title="View Report">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                            <!-- Status Update Button -->
                                            <form action="{{ route('report.update.status', $report->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success" title="Approve Report">
                                                    <i class="fas fa-check"></i> Approve
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination links -->
                            <div class="pagination">
                                {{ $reports->links() }}
                            </div>
                        @else
                            <p>No reports found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportModalLabel">Report Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="reportDetails">
                    <!-- Report details will be injected here via JavaScript -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



@endsection
