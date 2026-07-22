

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login - Route Fitness</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/AuthStyle.css') }}" />

</head>

<body>
    <div class="login-container d-grid">
        <!-- Left Side - Login Form -->
        <div class="login-form-section">
            <div class="logo-section">
                <div class="logo-icon">
                    <i class="bi bi-lightning-charge-fill"></i>
                </div>
                <h1 class="brand-name">Fitness Gym</h1>
                <p class="brand-subtitle">Gym Management System</p>
            </div>

            <h2 class="login-title">Admin Register</h2>
            <p class="login-subtitle">Welcome back! Please register to your account</p>

            <form action="{{ route('register.store') }}" method="post" id="registerForm">
                @csrf
                {{-- @Html.ValidationMessage("Invalidregister", new { @class = "text-danger" }) --}}

                <div class="form-floating">
                    <input name="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" placeholder="admin@example.com"
                           autocomplete="username" value="{{ old('email') }}" />
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="floatingEmail">
                        <i class="bi bi-envelope me-2"></i>Email Address
                    </label>
                    {{-- <span asp-validation-for="Email" class="text-danger small"></span> --}}
                </div>
                <div class="form-floating">
                    <input name="name" class="form-control @error('name') is-invalid @enderror" id="floatingName"
                           autocomplete="username" value="{{ old('name') }}" />
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="floatingName">
                        <i class="bi bi-person-fill me-2"></i>Name
                    </label>
                    {{-- <span asp-validation-for="Email" class="text-danger small"></span> --}}
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password"
                           autocomplete="current-password"  value="{{ old('password') }}" />
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="floatingPassword">
                        <i class="bi bi-lock-fill me-2"></i>Password
                    </label>
                    {{-- <span asp-validation-for="Password" class="text-danger small"></span> --}}
                </div>
                <div class="form-floating">
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="floatingPassword" placeholder="Password"
                           autocomplete="current-password" />
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="floatingPassword">
                        <i class="bi bi-lock-fill me-2"></i>Verify Password
                    </label>
                    {{-- <span asp-validation-for="Password" class="text-danger small"></span> --}}
                </div>

                <p>
                    Already have an account?
                    <a href="{{ route('login.index') }}" class="text-primary fw-bold">
                        Login here
                    </a>
                </p>

                <button type="submit" class="btn btn-login" id="registerBtn">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Register
                </button>
            </form>
        </div>

        <!-- Right Side - Gym Info -->
        <div class="gym-info-section">
            <div class="gym-content">
                <div class="gym-icon">
                    💪
                </div>
                <h2 class="gym-title">
                    Your body can <span style="color: #ffd700;">stand</span><br>
                    almost anything
                </h2>
                <p class="gym-description">
                    It's your mind that needs convincing. Push past your limits,<br>
                    stay committed, and watch as your body transforms into<br>
                    powerhouse of strength and resilience.
                </p>

                <div class="stats-container">
                    <div class="stat-item">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Members</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Trainers</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <span class="stat-label">Support</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(function() {
            $('#floatingEmail').focus();

            $('#registerForm').on('submit', function () {
                if ($(this).valid()) {
                    const btn = document.getElementById('registerBtn');
                    btn.classList.add('loading');
                    btn.disabled = true;
                }
            });
        });
    </script>
</body>

</html>
