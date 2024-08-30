@extends('frontend.administrator.administrator_dashboard')

@section('page_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


<div class="page-content">
    <div class="container">
            <!-- New section for password update start -->
            <div class="col-12">
                <div class="card rounded">
                    <div class="card-body p-4">
                        <h6 class="card-title" style="font-size: 20px; color: rgba(0, 0, 0, 0.7); text-transform: capitalize;">Update Password</h6>
                        <form method="POST" action="{{ route('AdministratorPasswordUpdate') }}" class="forms-sample">
                            @csrf
                            @method('post')
                            


                            <!-- Password fields -->
                            <div class="mb-3">
                                <label for="currentPassword" class="form-label">Current Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control password-field" id="current-password" name="current_password" autocomplete="off">

                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">New Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control password-field" id="newPassword" name="new_password" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control password-field" id="confirmPassword" name="new_password_confirmation" autocomplete="off">

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- New section for password update end -->
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






