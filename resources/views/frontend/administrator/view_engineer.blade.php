@extends('frontend.administrator.administrator_dashboard')

@section('page_content')

<style>
.form-group {
    position: relative;
    margin-bottom: 1.5rem;
}

.floating-input {
    width: 100%;
    padding: 10px 10px 10px 5px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
    transition: border-color 0.2s, padding-top 0.2s, font-size 0.2s;
}

.floating-input:focus {
    border-color: #410dfd;
    padding-top: 20px; /* Push content down */
    font-size: 16px; /* Keep the input text size normal */
}

.floating-label {
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 16px;
    color: #aaa;
    transition: all 0.2s ease-in-out;
    pointer-events: none;
}

.floating-input:focus + .floating-label,
.floating-input:not(:placeholder-shown) + .floating-label {
    top: -12px;
    left: 5px;
    font-size: 12px;
    color:#410dfd;
    background: #fff;
    padding: 0 5px;
}

</style>

<!-- Notification Link -->

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Engineer View</h6>

                    <div class="d-flex justify-content-between mb-3">
                        <!-- Form for searching -->
                        <form id="searchForm" method="GET" class="d-flex">
							          <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search by name" value="{{ request()->query('search') }}" style="width: 120px;">
                        </form>


                        


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                          <!-- Close button -->
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Add Engineer</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                          <!-- Form inside modal -->
                          <div class="modal-body">
                            
                            <form class="forms-sample" method="post" action="{{ route('add_eng')}}">
                              @csrf
                          
                              <div class="form-group">
                                  <input type="text" class="form-control floating-input" name="name" id="name" placeholder="" required>
                                  <label for="name" class="floating-label">Username</label>
                              </div>
                          
                              <div class="form-group">
                                  <input type="email" class="form-control floating-input" name="email" id="email" placeholder="" required>
                                  <label for="email" class="floating-label">Email</label>
                              </div>
                          
                              <div class="form-group">
                                  <input type="number" class="form-control floating-input" name="phone" id="phone" placeholder="" required>
                                  <label for="phone" class="floating-label">Phone</label>
                              </div>
                          
                              <div class="form-group">
                                  <input type="text" class="form-control floating-input" name="address" id="address" placeholder="" required>
                                  <label for="address" class="floating-label">Home Address</label>
                              </div>
                          
                              <div class="form-group">
                                  <input type="password" name="password" class="form-control floating-input" id="password" placeholder="" required>
                                  <label for="password" class="floating-label">Password</label>
                              </div>
                          
                              <button type="submit" class="btn btn-primary col-12">Register</button>
                          </form>
                          
                          
                          
                          </div>


                        </div>
                      </div>
                    </div>

                    <!-- Button to trigger modal -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" >
                      <i class="fas fa-plus"></i> Add Engineer
                    </button>
                    <!-- END OF MODAL -->

                </div>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table pb-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Registered</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @include('frontend.administrator.partials.tech_table_rows', ['user' => $user])
                            </tbody>
                        </table>

                        <div class="d-flex pt-3">
                            {{ $user->appends(['search' => request()->query('search')])->links() }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        let searchQuery = this.value;

        // Send AJAX request
        fetch(`{{ route('view_tech') }}?search=${searchQuery}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('tableBody').innerHTML = data.html;
        });
    });

</script>


 


@endsection
