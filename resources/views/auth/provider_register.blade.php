<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Care</title>
    <link rel="stylesheet" href="{{ asset('service_provider/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('service_provider/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('service_provider/css/style.css')}}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="background-wrapper">
        <section class="form-container">
            <h2 class="text-center mb-4">Register as a Service Provider</h2>
            <form id="registerForm" action="{{ route('provider.register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name"><i class="fas fa-user"></i> Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="email"><i class="fas fa-envelope"></i> Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="confirm-password"><i class="fas fa-lock"></i> Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="password_confirmation" required>
                </div>

                <div class="mb-3">
                    <label for="experience_years"><i class="fas fa-briefcase"></i> Experience Years</label>
                    <select class="form-select" id="experience_years" name="experience_years">
                        <option>No Experience</option>
                        <option>1-2 Years</option>
                        <option>3-5 Years</option>
                        <option>5+ Years</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="category_id"><i class="fas fa-layer-group"></i> Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Select Category</option>
                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="subservice"><i class="fas fa-cogs"></i> Service</label>
                    <select class="form-control" id="subservice" name="services[]">
                        <option value="">Select a subservice</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="price"><i class="fas fa-dollar-sign"></i> Price</label>
                    <input type="number" class="form-control" id="price" name="prices[]" min="50" max="1000" placeholder="Enter price">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i> Submit</button>
                </div>
            </form>

            {{-- تخزين الخدمات الفرعية داخل الصفحة --}}
            @foreach(\App\Models\Category::all() as $category)
                <div class="subservice-options d-none" data-category="{{ $category->id }}">
                    @foreach($category->services as $service)
                        <option value="{{ $service->id }}">{{ $service->service_type }}</option>
                    @endforeach
                </div>
            @endforeach
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('service_provider/js/main.js') }}"></script>
</body>
</html>
