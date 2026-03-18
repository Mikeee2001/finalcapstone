<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/employer-signup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">

</head>

<body>
    <div class="main-container">
        <div class="form-container">
            <p class="header-text">Employer Sign Up</p>
            <div class="form-body">

                <form action="{{ route('employerSignup') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <!-- Company Logo -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Company Logo:</label>
                            <input type="file" name="company_logo" class="input-text" accept="image/*">
                            @error('company_logo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Full Name + Email -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Full Name:</label>
                            <input type="text" name="full_name" class="input-text" placeholder="Full Name" required>
                            @error('full_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email:</label>
                            <input type="email" name="email" class="input-text" placeholder="Email Address"
                                required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Company Details -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Company Name:</label>
                            <input type="text" name="company_name" class="input-text" placeholder="Company Name"
                                required>
                            @error('company_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Company Address:</label>
                            <input type="text" name="company_address" class="input-text"
                                placeholder="Company Address" required>
                            @error('company_address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Company Description:</label>
                            <textarea name="company_description" class="input-text" placeholder="Brief description of your company" required></textarea>
                            @error('company_description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Password + Confirm Password -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Create Password:</label>
                            <input type="password" name="password" class="input-text" placeholder="New Password"
                                required>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm Password:</label>
                            <input type="password" name="password_confirmation" class="input-text"
                                placeholder="Confirm Password" required>
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="form-row submit-row">
                        <button type="submit" class="login-btn btn-primary btn" id="signupBtn">
                            <span id="btnText">Sign Up</span>
                            <!-- Loader hidden by default -->
                            <span id="btnLoader" class="loader hidden"></span>
                        </button>
                    </div>

                </form>

                <div>
                    <br>
                    <label class="sub-text">Already have an account? </label>
                    <a href="{{ route('signin') }}" class="hover-link1">Login</a>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const signupForm = document.querySelector('form[action="{{ route('employerSignup') }}"]');
            const signupBtn = document.getElementById('signupBtn');
            const btnText = document.getElementById('btnText');
            const btnLoader = document.getElementById('btnLoader');

            signupForm.addEventListener('submit', function() {
                signupBtn.disabled = true; // prevent double clicks
                btnText.classList.add('hidden'); // hide "Sign Up" text
                btnLoader.classList.remove('hidden'); // show animated loader
            });
        });
    </script>


</body>

</html>
