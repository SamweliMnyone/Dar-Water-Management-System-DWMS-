@extends('frontend.administrator.administrator_dashboard')

@section('page_content')

<style>
    .container-card {
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .container-card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .dropdown-menu-container {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .content {
        text-align: center;
        transition: opacity 0.3s ease;
    }

    .container-card:hover .content {
        opacity: 0.8;
    }

    .content .icon-lg {
        display: block;
        margin: 0 auto;
        font-size: 4rem; /* Adjust the size of the icon */
        transition: transform 0.3s ease;
    }

    .container-card:hover .content .icon-lg {
        transform: scale(1.2); /* Slightly enlarge the icon on hover */
    }

    .content h3 {
        color: blue; /* Set the color of the number to blue */
    }

    .container-card .card-body {
        transition: transform 0.3s ease;
    }

    .container-card:hover .card-body {
        transform: scale(1.1);
    }
</style>

<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle>
                    <i data-feather="calendar" class="text-primary"></i>
                </span>
                <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">


                <!-- 1st container -->
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card container-card" onclick="location.href='{{ route('view_tech') }}';">
                        <div class="dropdown-menu-container">

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item d-flex align-items-center" href=""><i data-feather="eye" class="icon-sm me-2"></i> View</a></li>
                                <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> Download</a></li>
                            </ul>
                        </div>
                        <div class="card-body content">
                            <i data-feather="users" class="icon-lg text-primary mb-3"></i>
                            <h6 class="card-title mb-0">Available Technician</h6>
                            <div class="row justify-content-center">
                                <div class="col-12 text-center">
                                    <h3 class="mb-2 text-primary">{{$count_technician}}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5"></div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                
                <!-- 2nd container -->
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card container-card" onclick="location.href='{{ route('view_eng') }}';">
                        <div class="dropdown-menu-container">

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>
                        <div class="card-body content">
                            <i data-feather="hard-drive" class="icon-lg text-primary mb-3"></i>
                            <h6 class="card-title mb-0">Available Engineers</h6>
                            <div class="row justify-content-center">
                                <div class="col-12 text-center">
                                    <h3 class="mb-2 text-primary">{{$count_engineer}}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5"></div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3rd container -->
                <div class="col-md-4 grid-margin stretch-card" onclick="location.href='{{ route('view_admin') }}';">
                    <div class="card container-card">
                        <div class="dropdown-menu-container">

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>
                        <div class="card-body content">
                            <i data-feather="shield" class="icon-lg text-primary mb-3"></i>
                            <h6 class="card-title mb-0">Available Administrators</h6>
                            <div class="row justify-content-center">
                                <div class="col-12 text-center">
                                    <h3 class="mb-2 text-primary">{{$count_administrator}}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5"></div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- row -->

</div>

@endsection


