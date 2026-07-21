

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
    <div class="login-container">
        <div class="login-form-section">
            @if (session('Success') != null)
                <div id="Alert" class="alert alert-success alert-dismissible fade show">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('Success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <div class="logo-section">
                <div class="logo-icon">
                    <i class="bi bi-lightning-charge-fill"></i>
                </div>
                <h1 class="brand-name">Route Fitness</h1>
                <p class="brand-subtitle">Gym Management System</p>
            </div>


            <p class="login-subtitle">Enter the 6-digit OTp sent to </p>
            <p class="login-subtitle">{{ $email }}</p>

            <form action="{{ route('otpform.store') }}" method="post" id="loginForm">
                @csrf
                <input name="email" value="{{ $email }}"  hidden/>
                <!-- OTP Input -->
                <div class="form-floating">
                    <input name="otp" class="form-control @error('otp') is-invalid @enderror" id="floatingOtp"
                         placeholder="Enter OTP" autocomplete="one-time-code" value=""/>
                    @error('otp')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                    <label for="floatingOtp">
                        <i class="bi bi-lock-fill me-2"></i>OTP
                    </label>
                </div>
                <p>Didn't get the OTP ? <a href="{{ route('otpform.resend') }}" class="text-primary fw-bold">resend it</a> </p>
                <div class="btn btn-login"><a onclick="fillOtp()">Get OTP</a>
                </div>


                <button type="submit" class="btn btn-login" id="loginBtn">
                    <i class="me-2 bi bi-box-arrow-in-right"></i>Login To Home
                    {{-- // bi bi-box-arrow-in-right --}}
                </button>
            </form>
        </div>




        <script>
            // fetch req = 'http://127.0.0.1:8000/OtpLogin/Otp';
            function fillOtp(){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("floatingOtp").value = this.responseText;
                    }
                };
                xhttp.open("Get" , "http://127.0.0.1:8000/OtpLogin/Otp" , true);
                xhttp.send();
        }
        </script>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
