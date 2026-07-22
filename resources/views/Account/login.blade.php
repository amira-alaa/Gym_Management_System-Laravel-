

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
        <div class="login-form-section">
            <div class="logo-section">
                <div class="logo-icon">
                    <i class="bi bi-lightning-charge-fill"></i>
                </div>
                <h1 class="brand-name">Fitness Gym</h1>
                <p class="brand-subtitle">Gym Management System</p>
            </div>

            <h2 class="login-title">Admin Login</h2>
            <p class="login-subtitle">Welcome back! Please login to your account</p>

            <form action="{{ route('login.store') }}" method="post" id="loginForm">
                @csrf

                <div class="form-floating">
                    <input name="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" placeholder="admin@example.com"
                           autocomplete="username" />
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="floatingEmail">
                        <i class="bi bi-envelope me-2"></i>Email Address
                    </label>

                </div>

                <p>
                    I haven't  an account
                    <a href="{{ route('register.index') }}" class="text-primary fw-bold">
                        Register here
                    </a>
                </p>

                <button type="submit" class="btn btn-login" id="loginBtn">
                    <i class="me-2"></i>Continue
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






    <script id="y24j3c">
        function toggleLogin() {
            let type = document.querySelector('input[name="login_type"]:checked').value;

            if (type === 'password') {
                document.getElementById('password_div').style.display = 'block';
                document.getElementById('otp_div').style.display = 'none';
            } else {
                document.getElementById('password_div').style.display = 'none';
                document.getElementById('otp_div').style.display = 'block';
            }
        }
    </script>
    <script>
        $(function() {
            $('#floatingEmail').focus();

            $('#loginForm').on('submit', function () {
                if ($(this).valid()) {
                    const btn = document.getElementById('loginBtn');
                    btn.classList.add('loading');
                    btn.disabled = true;
                }
                else {
                    const btn = document.getElementById('loginBtn');
                    btn.classList.remove('loading');
                    btn.disabled = false;
                }
            });
        });
    </script>
</body>

</html>
