<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  @include('error')
  <form action="{{ route('provider.register') }}" method="POST" class="w-50 mx-auto">
    @csrf
    <div class="form-group w-100">
      <label for="name" class="form-label d-block">Name</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
    </div>
  
    <div class="form-group w-100">
      <label for="email" class="form-label d-block">Email address</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
    </div>
  
    <div class="form-group w-100">
      <label for="password" class="form-label d-block">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
  
    <div class="form-group w-100">
      <label for="password_confirmation" class="form-label d-block">Password Confirmation</label>
      <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
    </div>

    <label>Experience Years:</label>
            <select name="experience_years" id="experience_years" required>
                <option value="No Experience">No Experience</option>
                <option value="One">One</option>
                <option value="Three">Three</option>
                <option value="Other">Other</option>
            </select>

    <label>Service Type:</label>
            <select name="service_type" id="service_type" required>
                <option value="Plumber">Plumber</option>
                <option value="Electrician">Electrician</option>
                <option value="Mechanic">Mechanic</option>
                <option value="Other">Other</option>
            </select>
  
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
  </form>
  
</body>
</html>