<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quick Care</title>
  <!-- رابط Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('auth/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/main.css') }}">
  <!-- رابط Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body class="bg-light d-flex align-items-center justify-content-center min-vh-100">
  <section class="container bg-white p-5 rounded shadow-lg">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center mb-4 fw-bold">Register As User</h2>
        <form id="registerForm" action="{{ route('user.register') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">
              <i class="fas fa-user"></i> 
              Name
            </label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="name"
              placeholder="Enter your name"
            />
            <div id="nameError" class="text-danger small mt-2"></div> 
          </div>

          <!-- Email Field -->
          <div class="mb-3">
            <label for="email" class="form-label">
              <i class="fas fa-envelope"></i> 
              Email Address
            </label>
            <input
              type="email"
              class="form-control"
              id="email"
              name="email" 
              placeholder="Enter email"
            />
            <div id="emailError" class="text-danger small mt-2"></div>
          </div>

          <!-- Password Field -->
          <div class="mb-3">
            <label for="password" class="form-label">
              <i class="fas fa-lock"></i> 
              Password
            </label>
            <input
              type="password"
              class="form-control"
              id="password"
              name="password"
              placeholder="Password"
            />
            <div id="passwordError" class="text-danger small mt-2"></div> 
          </div>

          <!-- Confirm Password Field -->
          <div class="mb-3">
            <label for="confirm-password" class="form-label">
              <i class="fas fa-lock"></i> 
              Password Confirmation
            </label>
            <input
              type="password"
              class="form-control"
              id="confirm-password"
              name="password_confirmation"
              placeholder="Confirm Password"
            />
            <div id="confirmPasswordError" class="text-danger small mt-2"></div> 
          </div>

          <!-- Submit Button -->
          <div class="d-grid">
            <button type="submit" class="submit_btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- رابط Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('auth/js/register_as_user.js')}}"></script>
</body>
</html>