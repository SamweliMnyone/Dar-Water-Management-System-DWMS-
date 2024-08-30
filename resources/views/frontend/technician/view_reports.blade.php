@extends('frontend.technician.technician_dashboard')

@section('page_content')

<style>
/* Existing CSS styles */
</style>

<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Reports</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Reports View</h6>

                    <div class="d-flex justify-content-between mb-3">
                        <!-- Button to trigger modal (if needed) -->
                        <a href="{{ route('report_view') }}">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                                <i class="fas fa-plus"></i> Add Report
                            </button>
                        </a>
                    </div>

                    <div class="table-responsive">
                        @if($reports->count())
                            <table id="dataTableExample" class="table pb-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Region</th>
                                        <th>Ward</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>Finish Date</th>
                                        <th>Labour Cost</th>
                                        <th>Tools Cost</th>
                                        <th>Status</th> <!-- Added status column -->
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
                                        <td>{{ $report->region }}</td>
                                        <td>{{ $report->ward }}</td>
                                        <td>{{ $report->description }}</td>
                                        <td>{{ $report->start }}</td>
                                        <td>{{ $report->finish }}</td>
                                        <td>{{ $report->labour_cost }}</td>
                                        <td>{{ $report->tools_cost }}</td>
                                        <td>{{ $report->status }}</td> <!-- Display status -->
                                        <td>
                                            <a href="{{ route('report.show', $report->id) }}" title="View Report">
                                                <i class="fas fa-eye"></i>
                                            </a>
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

<script>
    // Optional: Add JavaScript for search or other dynamic functionality if needed
</script>

@endsection
