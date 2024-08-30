@extends('frontend.technician.technician_dashboard')

@section('page_content')

<style>
    /* Scoped CSS for the report writing section */
    .report-writing .card-title {
        font-size: 20px;
    }

    .report-writing .fas.fa-file-alt {
        font-size: 24px;
    }

    .report-writing .suggestions-container {
        position: relative;
    }

    .report-writing .ui-autocomplete {
        max-height: 150px;
        overflow-y: auto;
        overflow-x: hidden;
        z-index: 1000;
        position: absolute;
        background: white;
        border: 1px solid #000000;
    }

    .report-writing .ui-menu-item-wrapper {
        padding: 8px 12px;
    }

    .report-writing .ui-menu-item-wrapper:hover {
        background-color: #f0f0f0;
    }

    @media (max-width: 768px) {
        .report-writing .card-title {
            font-size: 18px;
        }

        .report-writing .fas.fa-file-alt {
            font-size: 20px;
        }
    }

    /* Style for the section titles */
    .section-title {
        display: flex;
        align-items: center;
        transition: color 0.3s ease;
    }

    .section-title i {
        margin-right: 8px;
    }

    /* Form step navigation */
    .form-step {
        display: none;
    }

    .form-step-active {
        display: block;
    }

    .form-navigation {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
    }

    .form-navigation .btn {
        margin: 0 5px;
    }
</style>

<div class="page-content report-writing">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://192.168.65.183:8000/administrator/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('reports.index') }}">Reports</a></li>
        </ol>
    </nav>

    <div class="container">
        <div class="col-12">
            <div class="card rounded">
                <div class="card-body p-4">
                    <div class="text-center my-4">
                        <h6 class="card-title" style="color: rgb(117, 119, 129); text-transform: capitalize; margin: 0;font-size:25px">Maintainance Report</h6>
                    </div>
                    
                    <form method="POST" action="{{ route('technician.report.submit') }}" class="forms-sample" id="reportForm">
                        @csrf
                        
                        <!-- Step 1: Location -->
                        <div class="form-step form-step-active">
                            <h4 class="section-title" style="margin-bottom: 20px">
                                <i class="fas fa-map-marker-alt"></i> Location
                            </h4>
                        
                            <div class="mb-3 suggestions-container">
                                <label for="region" class="form-label">Region</label>
                                <input type="text" class="form-control" id="region" name="region" value="{{ old('region') }}">
                                @error('region')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3 suggestions-container">
                                <label for="ward" class="form-label">Ward</label>
                                <input type="text" class="form-control" id="ward" name="ward" value="{{ old('ward') }}">
                                @error('ward')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Step 2: Maintenance Details -->
                        <div class="form-step">
                            <h4 class="section-title" style="margin-bottom: 20px">
                                <i class="fas fa-wrench"></i> Maintenance Details
                            </h4>

                            <div class="mb-3">
                                <label for="description" class="form-label">Maintenance Description</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="start" class="form-label">Starting Date</label>
                                <input type="date" class="form-control" id="start" name="start" value="{{ old('start') }}">
                                @error('start')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="finish" class="form-label">Finish Date</label>
                                <input type="date" class="form-control" id="finish" name="finish" value="{{ old('finish') }}">
                                @error('finish')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="explproblem" class="form-label">Short Explanation</label>
                                <textarea class="form-control" id="explproblem" name="explproblem" rows="5">{{ old('explproblem') }}</textarea>
                                @error('explproblem')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Step 3: Labour Employed -->
                        <div class="form-step">
                            <h4 class="section-title" style="margin-bottom: 20px">
                                <i class="fas fa-users"></i> Labour Employed
                            </h4>
                        
                            <div class="mb-3">
                                <label for="labour" class="form-label">Add the Names and Payments Cost</label>
                                <textarea class="form-control" id="labour" name="labour" rows="5">{{ old('labour') }}</textarea>
                                @error('labour')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="labour-cost" class="form-label">Total Cost</label>
                                <input type="number" class="form-control" id="labour-cost" name="labour_cost" value="{{ old('labour_cost') }}">
                                @error('labour_cost')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Step 4: Cost and Tools -->
                        <div class="form-step">
                            <h4 class="section-title" style="margin-bottom: 20px">
                                <i class="fas fa-tools"></i> Cost and Tools
                            </h4>
                        
                            <div class="mb-3">
                                <label for="tools" class="form-label">Describe Tools Used and Cost</label>
                                <textarea class="form-control" id="tools" name="tools" rows="5">{{ old('tools') }}</textarea>
                                @error('tools')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="tools-cost" class="form-label">Total Cost</label>
                                <input type="number" class="form-control" id="tools-cost" name="tools_cost" value="{{ old('tools_cost') }}">
                                @error('tools_cost')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-navigation">
                            <button type="button" class="btn btn-secondary" id="prevBtn" style="display: none;">Previous</button>
                            <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                            <button type="submit" class="btn btn-success" id="submitBtn" style="display: none;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
