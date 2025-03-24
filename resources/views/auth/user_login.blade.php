<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('auth/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/main.css') }}"> <!-- External CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="custom-form">
        <h2 class="text-center mb-4">Login</h2>
        @include('error')
        <form id="loginForm" action="{{ route('user.login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="form-label">
                    <i class="material-icons">email</i> Email:
                </label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-control custom-input" 
                    required
                >
                <div id="emailError" class="text-danger small mt-2"></div>
            </div>

            <!-- Password Field -->
            <div class="mb-4">
                <label for="password" class="form-label">
                    <i class="material-icons">lock</i> Password:
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-control custom-input" 
                    required
                >
                <div id="passwordError" class="text-danger small mt-2"></div>
            </div>

            <!-- Login Button -->
            <button 
                type="submit" 
                class="w-100 btn custom-login-button text-white"
            >
                Login
            </button>

            <!-- Forget Password Link -->
            <div class="text-center mt-4">
                <a href="#" class="forgot-password-link" id="forgotPasswordLink">Forgot Password?</a>
            </div>

            <!-- Register Link -->
            <div class="text-center mt-3">
                <span class="text-muted small">Not a user? </span>
                <a href="{{ route('user.register') }}" class="register-link">Register here</a>
            </div>

            <!-- Login with Google Button -->
            <button 
                type="button" 
                class="w-100 btn btn-outline-secondary d-flex align-items-center justify-content-center py-2 rounded google-button-margin mt-4"
            >
                <img src="https://www.google.com/favicon.ico" alt="Google Icon" class="me-2" style="width: 20px; height: 20px;">
                Login with Google
            </button>
        </form>
    </div>

    <div id="forgotPasswordModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" id="closeModal">&times;</span>
            <h3>Please enter your verification code</h3>
            <input type="email" placeholder="Email" id="verificationEmail">
            <button id="verifyButton" class="btn custom-verify-button text-white">Verify</button>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="{{asset('auth/js/login.js')}}"></script> --}}
</body>
</html>
