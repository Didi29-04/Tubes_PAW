<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Halaman Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: url('/images/background login.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-card {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .form-card h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .form-control {
            width: calc(100% - 2rem); /* Menyesuaikan padding */
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-primary {
            width: calc(100% - 2rem); /* Menyesuaikan padding */
            padding: 0.75rem;
            font-size: 1rem;
            font-weight: 500;
            color: #fff;
            background-color: #004d40;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }

        .btn-primary:hover {
            background-color: #00332e;
        }

        .text-link {
            font-size: 0.875rem;
            color: #004d40;
            text-decoration: none;
        }

        .text-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-card">
            <h1>Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Input -->
                <input type="email" name="email" placeholder="Username or Email" class="form-control" required autofocus>

                <!-- Password Input -->
                <input type="password" name="password" placeholder="Password" class="form-control" required>

                <!-- Login Button -->
                <button type="submit" class="btn-primary">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
