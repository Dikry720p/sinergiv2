<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - Sistem Monitoring Energi Listrik</title>
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
            margin: 0 auto;
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
            margin-bottom: 2rem;
        }

        .input-group {
            margin-bottom: 1.5rem;
            width: 100%;
        }

        .input-label {
            color: #1e293b;
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }

        .text-input {
            width: 100%;
            padding: 1rem 1.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            font-size: 1rem;
            box-sizing: border-box;
        }

        .text-input:focus {
            border-color: #0ea5e9;
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.2);
            outline: none;
        }

        .button {
            background-color: #0ea5e9;
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            border: none;
            width: 100%;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            box-sizing: border-box;
        }

        .button:hover {
            background-color: #0284c7;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
        }

        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        .link {
            text-decoration: none;
            font-size: 0.875rem;
            color: #64748b;
            transition: color 0.3s ease;
        }

        .link:hover {
            color: #0ea5e9;
        }
    </style>
</head>

<body>
    <div class="access-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="header">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
                <h1 class="title">Register</h1>
                <p class="subtitle">Daftar ke sistem monitoring energi</p>
            </div>

            <!-- Name -->
            <div class="input-group">
                <label for="name" class="input-label">Name</label>
                <input id="name" class="text-input" type="text" name="name" value="{{ old('name') }}"
                    required autofocus autocomplete="name">
                <x-input-error :messages="$errors->get('name')" class="error-message" />
            </div>

            <!-- Email Address -->
            <div class="input-group">
                <label for="email" class="input-label">Email</label>
                <input id="email" class="text-input" type="email" name="email" value="{{ old('email') }}"
                    required autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="error-message" />
            </div>

            <!-- Password -->
            <div class="input-group">
                <label for="password" class="input-label">Password</label>
                <input id="password" class="text-input" type="password" name="password" required
                    autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="error-message" />
            </div>

            <!-- Confirm Password -->
            <div class="input-group">
                <label for="password_confirmation" class="input-label">Confirm Password</label>
                <input id="password_confirmation" class="text-input" type="password" name="password_confirmation"
                    required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
            </div>

            <div class="input-group">
                <a class="link" href="{{ route('login') }}">Already registered?</a>
            </div>

            <button type="submit" class="button">Register</button>
        </form>
    </div>
</body>

</html>
