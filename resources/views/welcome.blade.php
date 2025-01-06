<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Monitoring Energi Listrik</title>
    <style>
        body {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .access-container {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 2.5rem;
            width: 90%;
            max-width: 450px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
        }

        .title {
            color: #1e293b;
            font-size: 2rem;
            margin-bottom: 0.75rem;
            font-weight: bold;
        }

        .subtitle {
            color: #64748b;
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .button {
            background-color: #0ea5e9;
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .button:hover {
            background-color: #0284c7;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
        }

        .version-info {
            text-align: center;
            color: #64748b;
            font-size: 0.875rem;
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <div class="access-container">
        <div class="header">
            <img src="{{ asset('images\logo.png') }}" alt="Logo" class="logo">
            <h1 class="title">Sistem Monitoring Energi</h1>
            <p class="subtitle">Platform kontrol dan monitoring penggunaan energi listrik secara real-time</p>
        </div>

        <div class="button-container">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="button">Akses Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="button">Login</a>
                    <a href="{{ route('register') }}" class="button">Registrasi</a>
                @endauth
            @endif
        </div>

        <div class="version-info">
            &copy; {{ date('Y') }} Sistem Monitoring Energi Listrik
        </div>
    </div>
</body>

</html>
