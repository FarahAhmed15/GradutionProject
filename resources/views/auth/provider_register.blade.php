<!DOCTYPE html>
<body lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quick Care</title>
  <link rel="stylesheet" href="{{ asset('service_provider/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('service_provider/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('service_provider/css/style.css') }}">
  <!-- رابط Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<body>
  <div class="background-wrapper">
    <section class="form-container">
      <h2 class="text-center mb-4">Register as a Service Provider</h2>
      <form id="registerForm" action="{{ route('provider.register') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">
            <i class="fas fa-user"></i> Full Name
          </label>
          <div class="input-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">
            <i class="fas fa-envelope"></i> Email Address
          </label>
          <div class="input-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">
            <i class="fas fa-lock"></i> Password
          </label>
          <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          </div>
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
          <label for="confirm-password" class="form-label">
            <i class="fas fa-lock"></i> Confirm Password
          </label>
          <div class="input-group">
            <input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="Confirm Password" required>
          </div>
        </div>

        <!-- Experience -->
        <div class="mb-3">
          <label for="experience" class="form-label">
            <i class="fas fa-briefcase"></i> Experience Years
          </label>

          <select class="form-select" id="experience_years" name="experience_years">
                    <option>No Experience</option>
                    <option>1-2 Years</option>
                    <option>3-5 Years</option>
                    <option>5+ Years</option>

          </select>

        </div>

        <div class="mb-3">
          <label for="service-type" class="form-label">
            <i class="fas fa-tools"></i> Service Type
          </label>
          <select name="category_id" class="form-control">
            <option value="">Select Category</option>
            @foreach(\App\Models\Category::all() as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
        </div>

        <div class="mb-3">
          <label for="subservice" class="form-label">
            <i class="fas fa-cogs"></i> Subservice
          </label>
          <select class="form-select" id="subservice" disabled>
            <option value="">Select a subservice</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="price" class="form-label">
            <i class="fas fa-dollar-sign"></i> Price
          </label>
          <div class="input-group">
            <input type="number" class="form-control" id="price" min="50" max="1000" placeholder="Write your price">
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
          <input type="file" id="file-upload" class="d-none">
          <label for="file-upload" class="btn btn-primary"><i class="fas fa-upload"></i> Upload ID</label>
          <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i> Submit</button>
        </div>
      </form>
    </section>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('service_provider/js/main.js')}}"></script>
</body>
</html>

