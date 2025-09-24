<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang</title>
    <style>
        body {
            background: #f3f4f6;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background: #fff;
            padding: 2rem 2.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.07);
            text-align: center;
        }

        h1 {
            margin-bottom: 2rem;
            color: #22223b;
            font-size: 2rem;
            font-weight: 700;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 2rem;
            margin: 0 0.5rem;
            font-size: 1rem;
            border: none;
            border-radius: 6px;
            background: #ef4444;
            color: #fff;
            cursor: pointer;
            transition: background 0.2s;
            text-decoration: none;
        }

        .btn.register {
            background: #374151;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Selamat Datang di Aplikasi Starterkit</h1>
        <a href="{{ route('auth.login') }}" class="btn" target="_blank">Login</a>
        <a href="{{ route('auth.register') }}" class="btn register" target="_blank">Register</a>
    </div>
</body>

</html>
