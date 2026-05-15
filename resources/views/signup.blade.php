<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">

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
                            <input type="text" name="full_name" value="{{ old('full_name') }}" class="input-text"
                                placeholder="Full Name" required>
                            @error('full_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email:</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="input-text"
                                placeholder="Email Address" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- location -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Location:</label>
                            <select name="location" class="input-text" required>
                                <option value="" disabled selected>Select Barangay</option>
                                <option value="Awang" {{ old('location') == 'Awang' ? 'selected' : '' }}>Awang</option>
                                <option value="Bagocboc" {{ old('location') == 'Bagocboc' ? 'selected' : '' }}>Bagocboc
                                </option>
                                <option value="Barra" {{ old('location') == 'Barra' ? 'selected' : '' }}>Barra
                                </option>
                                <option value="Bonbon" {{ old('location') == 'Bonbon' ? 'selected' : '' }}>Bonbon
                                </option>
                                <option value="Cauyonan" {{ old('location') == 'Cauyonan' ? 'selected' : '' }}>Cauyonan
                                </option>
                                <option value="Igpit" {{ old('location') == 'Igpit' ? 'selected' : '' }}>Igpit
                                </option>
                                <option value="Luyongbonbon" {{ old('location') == 'Luyongbonbon' ? 'selected' : '' }}>
                                    Luyongbonbon</option>
                                <option value="Malanang" {{ old('location') == 'Malanang' ? 'selected' : '' }}>Malanang
                                </option>
                                <option value="Nangcaon" {{ old('location') == 'Nangcaon' ? 'selected' : '' }}>Nangcaon
                                </option>
                                <option value="Patag" {{ old('location') == 'Patag' ? 'selected' : '' }}>Patag
                                </option>
                                <option value="Poblacion" {{ old('location') == 'Poblacion' ? 'selected' : '' }}>
                                    Poblacion</option>
                                <option value="Tingalan" {{ old('location') == 'Tingalan' ? 'selected' : '' }}>Tingalan
                                </option>
                            </select>
                            @error('location')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Expected Salary:</label>
                            <input type="number" name="expected_salary" value="{{ old('expected_salary') }}"
                                class="input-text" placeholder="Expected Salary" required>
                            @error('expected_salary')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Password + Confirm Password -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Create Password:</label>
                            <input type="password" name="password" value="{{ old('password') }}" class="input-text"
                                placeholder="New Password" required>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm Password:</label>
                            <input type="password" name="password_confirmation"
                                value="{{ old('password_confirmation') }}" class="input-text"
                                placeholder="Confirm Password" required>
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Job Type + Skills -->
                    <div class="form-row">
                        <!-- Job Type -->
                        <div class="form-group">
                            <label class="form-label">Job Type:</label>
                            <select name="job_type" class="input-text" required>
                                <option value="" disabled selected>Select Job Type</option>
                                <option value="full-time" {{ old('job_type') == 'full-time' ? 'selected' : '' }}>
                                    Full-time</option>
                                <option value="part-time" {{ old('job_type') == 'part-time' ? 'selected' : '' }}>
                                    Part-time</option>
                            </select>
                            @error('job_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Required Skill -->
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Skill</label>
                            <div class="col-sm-9">
                                <select name="skills" id="signupSkill" class="form-control"></select>
                                <span class="text-danger error-text skill_id_error"></span>
                            </div>
                        </div>

                    </div>

                    <!-- Application Letter + Resume (File Uploads) -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Application Letter:</label>
                            <input type="file" name="application_letter" value="{{ old('application_letter') }}"
                                class="input-text" accept=".pdf,.doc,.docx,.txt" required>
                            @error('application_letter')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Resume:</label>
                            <input type="file" name="resume" value="{{ old('resume') }}" class="input-text"
                                accept=".pdf,.doc,.docx" required>
                            @error('resume')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="form-row submit-row">
                        <button type="submit" id="signupBtn" class="login-btn btn btn-primary">
                            <span id="btnText">Sign Up</span>
                            <span id="btnLoader" class="loader hidden"></span>
                        </button>
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

    <!-- jQuery FIRST -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Select2 JS AFTER jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.querySelector('form[action="{{ route('login-form') }}"]');
            const loginBtn = document.getElementById('loginBtn');
            const btnText = document.getElementById('btnText');
            const btnLoader = document.getElementById('btnLoader');

            loginForm.addEventListener('submit', function() {
                loginBtn.disabled = true; // prevent double clicks
                btnText.classList.add('hidden'); // hide "Login" text
                btnLoader.classList.remove('hidden'); // show animated loader
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#signupSkill').select2({
                placeholder: "Select or enter skill",
                width: '100%',
                minimumInputLength: 1,
                tags: true,
                ajax: {
                    url: "{{ route('skills-search') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.results
                        };
                    }
                }
            });
        });
    </script>

    {{-- Loading spinner js --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the form
            const signupForm = document.querySelector('form[action="{{ route('signup-form') }}"]');
            // Get button + elements
            const signupBtn = document.getElementById('signupBtn');
            const btnText = document.getElementById('btnText');
            const btnLoader = document.getElementById('btnLoader');

            // Attach submit event to the form
            signupForm.addEventListener('submit', function() {
                signupBtn.disabled = true; // prevent double clicks
                btnText.classList.add('hidden'); // hide "Sign Up" text
                btnLoader.classList.remove('hidden'); // show loader
            });
        });
    </script>


</body>

</html>
