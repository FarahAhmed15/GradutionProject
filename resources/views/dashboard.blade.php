<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        h1 {
            margin-bottom: 20px;
        }
        .btn-container {
            display: flex;
            gap: 20px;
        }
        .btn {
            padding: 15px 25px;
            font-size: 18px;
            text-decoration: none;
            color: white;
            border-radius: 8px;
            transition: 0.3s;
        }
        .user-btn {
            background-color: #007bff;
        }
        .user-btn:hover {
            background-color: #0056b3;
        }
        .provider-btn {
            background-color: #28a745;
        }
        .provider-btn:hover {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>

    <h1>Choose Your Registration Type</h1>
    
    <div class="btn-container">
        <a href="{{ route('user.registerform') }}" class="btn user-btn">Register as User</a>
        <a href="{{ route('provider.registerform') }}" class="btn provider-btn">Register as Service Provider</a>
    </div>

</body>
</html>
