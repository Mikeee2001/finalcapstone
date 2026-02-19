<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">


</head>

<body>

    <div class="main-container">
        <div class="form-container">
            <p class="header-text">Start Creating Your User Account</p>
            <p class="sub-text">Make Sure You Remember Your Login Information.</p>
            <div class="form-body">

                <form action="{{ route('signup-form') }}" method="post" enctype="multipart/form-data">
                    @csrf

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

                    <!-- Address + Expected Salary -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Address:</label>
                            <input type="text" name="address" class="input-text" placeholder="Address" required>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Expected Salary:</label>
                            <input type="number" name="expected_salary" class="input-text"
                                placeholder="Expected Salary" required>
                            @error('expected_salary')
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

                    <!-- Application Letter + Resume (File Uploads) -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Application Letter:</label>
                            <input type="file" name="application_letter" class="input-text"
                                accept=".pdf,.doc,.docx,.txt" required>
                            @error('application_letter')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Resume:</label>
                            <input type="file" name="resume" class="input-text" accept=".pdf,.doc,.docx" required>
                            @error('resume')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Job Type -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Job Type:</label>
                            <select name="job_type" class="input-text" required>
                                <option value="full-time">Full-time</option>
                                <option value="part-time">Part-time</option>
                            </select>
                            @error('job_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="form-row submit-row">
                        <input type="submit" value="Sign Up" class="login-btn btn-primary btn">
                    </div>
                </form>

                <div>
                    <br>
                    <label for="" class="sub-text">Already have an account? </label>
                    <a href="{{ route('signin') }}" class="hover-link1">Login</a>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
