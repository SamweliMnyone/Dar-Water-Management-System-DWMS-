@extends('frontend.users.user_dashboard')

@section('page_content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Inputs</h6>
                <form>
                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Name of organization</label>
                        <input type="text" class="form-control" id="exampleInputText1"  placeholder="Enter Name">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Region</label>
                        <input type="text" class="form-control" id="exampleInputText1"  placeholder="Enter Name">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">District</label>
                        <input type="text" class="form-control" id="exampleInputText1"  placeholder="Enter Name">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail3" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail3"  placeholder="example@gmail.com">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Address</label>
                        <input type="text" class="form-control" id="exampleInputText1"  placeholder="P.O.Box 43...,Dodoma,Tanzania">
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label" for="formFile">File upload</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>

                    <button class="btn btn-primary" type="submit">Submit form</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
