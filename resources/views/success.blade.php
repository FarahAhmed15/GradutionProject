<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logout-container {
            position: fixed;
            top: 10px;
            right: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <nav class="logout-container">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">LogOut</button>
                </form>
    </nav>
    <div class="text-center">
        <h1 class="text-success">Success!</h1>
        <p>You have successfully logged in.</p>
    </div>
</body>
</html>
