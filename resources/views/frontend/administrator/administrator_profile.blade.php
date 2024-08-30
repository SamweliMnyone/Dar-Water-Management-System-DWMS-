@extends('frontend.administrator.administrator_dashboard')

@section('page_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>

    /* Container for each input field */
.input-container {
    position: relative;
    margin-bottom: 1rem;
}

/* Input field styling */
.input-container input {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: all 0.3s ease;
    outline: none;
}

/* Focused input field styling */
.input-container input:focus {
    border-color: #0d6efd;
}

/* Label styling (initial state) */
.input-container label {
    position: absolute;
    top: 10px;
    left: 12px;
    font-size: 16px;
    color: #ccc;
    transition: all 0.3s ease;
    pointer-events: none;
}

/* Label styling (when input has focus or value) */
.input-container input:focus + label,
.input-container input:not(:placeholder-shown) + label {
    top: -8px;
    left: 10px;
    font-size: 12px;
    color: #0d6dfdcb;
    background-color: #fff;
    padding: 0 4px;
}

</style>

<div class="page-content">
    <div class="container">
        <div class="row profile-body">
            <!-- Left wrapper start -->
            <div class="col-12 col-md-4 col-xl-4 d-flex align-items-stretch mb-4">
                <div class="card rounded flex-fill">
                    <div class="card-body p-4">
                        <h6 class="card-title" style="font-size: 20px; color: rgba(0, 0, 0, 0.7); text-transform: capitalize;">Personal Information</h6>
                        <div class="text-center mb-3">
                            <img 
                                class="rounded-circle" 
                                src="{{ !empty($administratorData->photo) ? url('upload/admin_images/'.$administratorData->photo) : url('upload/no_image.jpg') }}" 
                                alt="profile"
                                style="width: 100px; height: 100px; object-fit: cover;"
                            >
                            <span class="h5 ms-3 text-dark d-block mt-2">{{ $administratorData->name }}</span>
                        </div>
                        

                        <!-- Admin details -->
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Full Name:</label>
                            <p class="text-muted">{{ $administratorData->name }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $administratorData->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{ $administratorData->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                            <p class="text-muted">{{ $administratorData->address }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Registered:</label>
                            <p class="text-muted">{{ $administratorData->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Left wrapper end -->

            <!-- Middle wrapper start -->
            <div class="col-12 col-md-8 col-xl-8 d-flex align-items-stretch mb-4">
                <div class="card rounded flex-fill">
                    <div class="card-body p-4">
                        <h6 class="card-title" style="font-size: 20px; color: rgba(0, 0, 0, 0.7); text-transform: capitalize;">Update Profile</h6>
                        <form method="post" action="{{ route('AdministratorProfileUpdate') }}" enctype="multipart/form-data" style="margin-top: 40px">
                            @csrf

                            <!-- Form fields -->
                            <div class="input-container">
                                <input type="text" id="name" name="name" placeholder=" " value="{{ $administratorData->name }}">
                                <label for="name">Full Name</label>
                            </div>
                            
                            <div class="input-container">
                                <input type="email" id="exampleInputEmail" name="email" placeholder=" " value="{{ $administratorData->email }}">
                                <label for="exampleInputEmail">Email</label>
                            </div>
                            
                            <div class="input-container">
                                <input type="number" id="exampleInputPhone" name="phone" placeholder=" " value="{{ $administratorData->phone }}">
                                <label for="exampleInputPhone">Phone Number</label>
                            </div>
                            
                            <div class="input-container">
                                <input type="text" id="exampleInputAddress" name="address" placeholder=" " value="{{ $administratorData->address }}">
                                <label for="exampleInputAddress">Address</label>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Photo</label>
                                <input class="form-control" type="file" id="image" name="photo">
                            </div>

                            <div class="mb-3">
                                <img 
                                    id="showImage" 
                                    class="rounded-circle" 
                                    src="{{ !empty($administratorData->photo) ? url('upload/admin_images/'.$administratorData->photo) : url('upload/no_image.jpg') }}" 
                                    alt="profile" 
                                    style="width: 80px; height: 80px; object-fit: cover;"
                                >
                            </div>
                            
                            <button type="submit" class="btn btn-primary me-2">Submit Changes</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Middle wrapper end -->


        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Image preview
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });

        // Auto-hide success alert after 3 seconds
        setTimeout(function() {
            $("#success-alert").fadeOut('slow', function() {
                $(this).remove();
            });
        }, 3000);

    });



        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const passwordField = this.previousElementSibling;
                const icon = this.querySelector('i');
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                } else {
                    passwordField.type = 'password';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                }
            });
        });


                const currentPasswordInput = document.getElementById('current-password');

                // Mask the input value visually without altering it
                currentPasswordInput.style.color = 'transparent';
                currentPasswordInput.style.textShadow = '0 0 0 #000'; // Make text appear hidden

                // Add event listener to show input value when the user types
                currentPasswordInput.addEventListener('input', function() {
                    this.style.color = ''; // Restore the original text color
                    this.style.textShadow = ''; // Remove text shadow to reveal text
                });

                currentPasswordInput.addEventListener('focus', function() {
                    if (this.value) {
                        // On focus, if there's a value, reveal the text only when the user starts typing
                        this.style.color = ''; // Restore the original text color
                        this.style.textShadow = ''; // Remove text shadow to reveal text
                    }
                });



</script>

@endsection






