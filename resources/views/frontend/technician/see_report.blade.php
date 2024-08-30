@extends('frontend.technician.technician_dashboard')

@section('page_content')

<style>
    .container {
        padding: 0 15px;
        margin-top: 50px;
    }

    .card {
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .btn {
        padding: 10px 20px;
        border-radius: 4px;
    }

    .text-center {
        text-align: center;
    }

    /* Responsive table styles */
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }

    .table-bordered tbody tr:hover {
        background-color: #f5f5f5; /* Light grey background on hover */
        cursor: pointer; /* Change cursor to pointer to indicate clickable rows */
    }

    @media (max-width: 768px) {
        .table-responsive {
            overflow-x: auto;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th, .table td {
            padding: 0.75rem;
            text-align: left;
        }
    }
</style>

<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('reports.index') }}">Reports</a></li>
            <li class="breadcrumb-item active" aria-current="page">Report Details</li>
        </ol>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="card-title text-center" style="color: rgb(117, 119, 129); text-transform: capitalize; margin: 0;font-size:25px;margin-bottom:20px;">Report detail</h6>
                        <h5 class="card-title mb-3 text-center">Report ID: {{ $report->id }}</h5>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Region</th>
                                        <td>{{ $report->region }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ward</th>
                                        <td>{{ $report->ward }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $report->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Start Date</th>
                                        <td>{{ $report->start }}</td>
                                    </tr>
                                    <tr>
                                        <th>Finish Date</th>
                                        <td>{{ $report->finish }}</td>
                                    </tr>
                                    <tr>
                                        <th>Labour Cost</th>
                                        <td>{{ $report->labour_cost }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tools Cost</th>
                                        <td>{{ $report->tools_cost }}</td>
                                    </tr>
                                    <tr>
                                        <th>Labour Details</th>
                                        <td>{{ $report->labour }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tools Details</th>
                                        <td>{{ $report->tools }}</td>
                                    </tr>
                                    <tr>
                                        <th>Explanation</th>
                                        <td>{{ $report->explproblem }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Icon button -->
                        <div class="mt-3 ">
                            <a href="{{ route('reports.index') }}" class="btn btn-primary">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
