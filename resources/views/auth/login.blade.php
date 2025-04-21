<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alawneh Exchange Intranet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #1e40af;
            --primary-light: #3b82f6;
            --secondary: #10b981;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #94a3b8;
            --error: #ef4444;
            --success: #22c55e;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #e0f2fe, #f0f9ff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .login-container {
            display: flex;
            width: 100%;
            max-width: 1000px;
            min-height: 600px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }
        
        .login-branding {
            flex: 1;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            padding: 3rem;
            position: relative;
            overflow: hidden;
        }
        
        .login-branding::before {
            content: "";
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            top: -50%;
            left: -50%;
            animation: pulse 15s infinite linear;
        }
        
        .branding-logo {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }
        
        .branding-text {
            font-size: 1.2rem;
            text-align: center;
            line-height: 1.6;
            position: relative;
            z-index: 2;
        }
        
        .login-form-container {
            flex: 1;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-header {
            margin-bottom: 2.5rem;
        }
        
        .login-header h2 {
            font-size: 2rem;
            color: var(--dark);
            margin-bottom: 0.5rem;
            font-weight: 700;
        }
        
        .login-header p {
            color: var(--gray);
            font-size: 1rem;
        }
        
        .form-group {
            margin-bottom: 1.8rem;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.7rem;
            font-weight: 500;
            color: var(--dark);
            font-size: 0.95rem;
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-with-icon input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s;
            background-color: #f8fafc;
        }
        
        .input-with-icon input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
            outline: none;
            background-color: white;
        }
        
        .input-with-icon i {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            transition: all 0.3s;
        }
        
        .input-with-icon input:focus + i {
            color: var(--primary);
        }
        
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
        }
        
        .checkbox-container {
            position: relative;
            display: inline-block;
            width: 18px;
            height: 18px;
            margin-right: 8px;
        }
        
        .checkbox-container input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            width: 18px;
            height: 18px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            transition: all 0.2s;
        }
        
        .checkbox-container:hover input ~ .checkmark {
            border-color: var(--primary-light);
        }
        
        .checkbox-container input:checked ~ .checkmark {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }
        
        .checkbox-container input:checked ~ .checkmark:after {
            display: block;
        }
        
        .checkbox-container .checkmark:after {
            left: 6px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
        
        .remember-me label {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        .forgot-password {
            color: var(--primary);
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .forgot-password:hover {
            color: var(--primary-light);
            text-decoration: underline;
        }
        
        .login-button {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .login-button::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: -100%;
            background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0) 100%);
            transition: all 0.6s;
        }
        
        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(30, 64, 175, 0.3);
        }
        
        .login-button:hover::after {
            left: 100%;
        }
        
        .login-footer {
            text-align: center;
            margin-top: 2.5rem;
            color: var(--gray);
            font-size: 0.95rem;
        }
        
        .login-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s;
        }
        
        .login-footer a:hover {
            color: var(--primary-light);
            text-decoration: underline;
        }
        
        .error-message {
            color: var(--error);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }
        
        .alert {
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        
        .alert-success {
            background-color: rgba(34, 197, 94, 0.1);
            color: var(--success);
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        
        /* Animations */
        @keyframes slideInRight {
            0% {
                transform: translateX(50px);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideInLeft {
            0% {
                transform: translateX(-50px);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        
        @keyframes pulse {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        
        .login-branding {
            animation: slideInLeft 0.8s ease-out;
        }
        
        .login-form-container {
            animation: slideInRight 0.8s ease-out;
        }
        
        .form-group {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0;
        }
        
        .form-group:nth-child(1) {
            animation-delay: 0.3s;
        }
        
        .form-group:nth-child(2) {
            animation-delay: 0.5s;
        }
        
        .form-options {
            animation: fadeIn 0.8s ease-out forwards;
            animation-delay: 0.7s;
            opacity: 0;
        }
        
        .login-button, .login-footer {
            animation: fadeIn 0.8s ease-out forwards;
            animation-delay: 0.9s;
            opacity: 0;
        }
        
        /* Responsive Styles */
        @media (max-width: 992px) {
            .login-container {
                flex-direction: column;
                max-width: 500px;
            }
            
            .login-branding {
                padding: 2rem;
            }
            
            .login-form-container {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-branding">
            <div class="branding-logo">
                <i class="fas fa-exchange-alt"></i> Alawneh Exchange
            </div>
            <p class="branding-text">Welcome to our secure intranet portal. Access all the tools and resources you need to serve for the main interface setup.</p>
        </div>
        
        <div class="login-form-container">
            <div class="login-header">
                <h2>Welcome Back</h2>
                <p>Sign in to access your intranet account</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <div class="input-with-icon">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Enter your email">
                        <i class="fas fa-envelope"></i>
                    </div>
                    @error('email')
                        <span class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <div class="input-with-icon">
                        <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
                        <i class="fas fa-lock"></i>
                    </div>
                    @error('password')
                        <span class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-options">
                    <div class="remember-me">
                        <label class="checkbox-container">
                            <input id="remember_me" type="checkbox" name="remember">
                            <span class="checkmark"></span>
                        </label>
                        <label for="remember_me">{{ __('Remember me') }}</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <button type="submit" class="login-button">
                    {{ __('Sign In') }}
                </button>
            </form>

            <div class="login-footer">
                <p>Need an account? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </div>
    </div>
</body>
</html>