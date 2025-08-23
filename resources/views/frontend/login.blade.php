<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Niranta</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            height: 100vh;
            overflow: hidden;
        }

        .login-container {
            display: flex;
            height: 100vh;
        }

        /* Left Side - Product Image */
        .login-left {
            flex: 1;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 1;
        }

        /* Right Side - Login Form */
        .login-right {
            flex: 1;
            background-color: #F5F0E8;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px 40px;
            position: relative;
        }

        .logo-container {
            position: absolute;
            top: 40px;
            right: 40px;
        }

        .logo {
            height: 60px;
        }

        .login-form-container {
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-title {
            font-size: 36px;
            font-weight: 700;
            color: #2C1810;
            margin-bottom: 40px;
            letter-spacing: 1px;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 15px;
            margin-bottom: 20px;
            text-align: center;
        }

        .alert-error {
            background-color: #fee;
            border: 1px solid #fcc;
            color: #c33;
        }

        .alert p {
            margin: 0;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px;
            padding-left: 50px;
            border: 2px solid #D4C4B0;
            border-radius: 25px;
            background-color: white;
            font-size: 16px;
            color: #2C1810;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: #8B4513;
            box-shadow: 0 0 10px rgba(139, 69, 19, 0.2);
        }

        .form-input::placeholder {
            color: #999;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #8B4513;
            font-size: 18px;
        }

        .login-button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #8B4513, #A0522D);
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .login-button:hover {
            background: linear-gradient(135deg, #A0522D, #8B4513);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
        }

        .divider {
            position: relative;
            margin: 30px 0;
            text-align: center;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: #D4C4B0;
        }

        .divider span {
            background-color: #F5F0E8;
            padding: 0 20px;
            color: #8B4513;
            font-weight: 500;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .social-button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid #D4C4B0;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-button:hover {
            border-color: #8B4513;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.2);
        }

        .social-button svg {
            width: 24px;
            height: 24px;
        }

        /* Google Icon */
        .google-icon {
            background: linear-gradient(45deg, #EA4335, #FBBC05, #34A853, #4285F4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 24px;
            font-weight: bold;
        }

        /* Facebook Icon */
        .facebook-icon {
            color: #1877F2;
            font-size: 24px;
        }

        /* Apple Icon */
        .apple-icon {
            color: #000;
            font-size: 24px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .login-left {
                flex: 0.4;
            }

            .login-right {
                flex: 0.6;
                padding: 40px 20px;
            }

            .logo-container {
                position: relative;
                top: auto;
                right: auto;
                margin-bottom: 20px;
            }

            .login-title {
                font-size: 28px;
            }

            .social-login {
                gap: 15px;
            }
        }

        @media (max-width: 480px) {
            .login-right {
                padding: 20px 15px;
            }

            .login-form-container {
                max-width: 100%;
            }

            .form-input {
                padding: 12px 15px;
                padding-left: 45px;
            }

            .login-button {
                padding: 12px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Left Side - Product Image -->
        <div class="login-left">
            <img src="{{ asset('login.png') }}" alt="Niranta Products" class="product-image">
        </div>

        <!-- Right Side - Login Form -->
        <div class="login-right">
            <div class="logo-container">
                <img src="{{ asset('logo.png') }}" alt="Niranta Logo" class="logo">
            </div>

            <div class="login-form-container">
                <h1 class="login-title">Login</h1>

                @if ($errors->any())
                    <div class="alert alert-error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- Email Field -->
                    <div class="form-group">
                        <div class="input-icon">✉</div>
                        <input type="email" class="form-input" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                        <div class="input-icon">🔒</div>
                        <input type="password" class="form-input" name="password" placeholder="Password" required>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="login-button">
                        Login
                    </button>
                </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
