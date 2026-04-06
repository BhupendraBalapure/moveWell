<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MoveWell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            display: flex;
            background: #0d3b42;
            -webkit-font-smoothing: antialiased;
        }

        .brand-panel {
            flex: 1;
            background: linear-gradient(135deg, #0d3b42 0%, #144f58 40%, #1a6e7a 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }
        .brand-panel::before {
            content: '';
            position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .brand-content { position: relative; z-index: 1; text-align: center; max-width: 400px; }
        .brand-logo {
            width: 100px; height: 100px; margin: 0 auto 28px;
            background: rgba(255,255,255,0.1); border-radius: 24px;
            display: flex; align-items: center; justify-content: center;
            border: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(12px);
        }
        .brand-logo img {
            width: 70px; height: 70px; object-fit: contain;
            filter: brightness(0) invert(1);
        }
        .brand-content h1 {
            font-size: 2.2rem; font-weight: 800; color: #fff;
            letter-spacing: -1px; margin-bottom: 12px;
        }
        .brand-content p {
            color: rgba(255,255,255,0.65); font-size: 1rem; line-height: 1.7; font-weight: 400;
        }
        .brand-features {
            margin-top: 40px; display: flex; flex-direction: column; gap: 16px; text-align: left;
        }
        .brand-features .feature {
            display: flex; align-items: center; gap: 14px;
            color: rgba(255,255,255,0.65); font-size: 0.92rem;
        }
        .brand-features .feature i {
            width: 36px; height: 36px; border-radius: 10px;
            background: rgba(255,255,255,0.08);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.85rem; color: #2a8f9d; flex-shrink: 0;
        }

        .register-panel {
            width: 520px; display: flex; flex-direction: column;
            justify-content: center; padding: 60px;
            background: #fff;
        }
        .register-header { margin-bottom: 36px; }
        .register-header h2 {
            font-size: 1.6rem; font-weight: 800; color: #0d3b42;
            letter-spacing: -0.5px; margin-bottom: 6px;
        }
        .register-header p { color: #718096; font-size: 0.95rem; }

        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block; font-size: 0.82rem; font-weight: 600;
            color: #4a5568; margin-bottom: 8px; letter-spacing: 0.2px;
        }
        .input-wrap { position: relative; }
        .input-wrap i.icon {
            position: absolute; left: 16px; top: 50%; transform: translateY(-50%);
            color: #94a3b8; font-size: 0.9rem; transition: color 0.2s;
        }
        .input-wrap input {
            width: 100%; padding: 13px 16px 13px 46px;
            border: 1.5px solid #e2e8f0; border-radius: 10px;
            font-family: 'Inter', sans-serif; font-size: 0.95rem;
            transition: all 0.2s; background: #f6fafb;
        }
        .input-wrap input:focus {
            outline: none; border-color: #1a6e7a;
            box-shadow: 0 0 0 3px rgba(26,110,122,0.12);
            background: #fff;
        }
        .input-wrap input:focus ~ i.icon { color: #1a6e7a; }

        .btn-register {
            width: 100%; padding: 14px;
            background: linear-gradient(135deg, #1a6e7a, #2a8f9d);
            border: none; border-radius: 10px;
            color: #fff; font-family: 'Inter', sans-serif;
            font-size: 1rem; font-weight: 700; cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 15px rgba(26,110,122,0.35);
            margin-top: 8px;
        }
        .btn-register:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(26,110,122,0.45);
        }
        .btn-register:active { transform: translateY(0); }

        .error-msg {
            background: #fef2f2; color: #dc2626; padding: 10px 14px;
            border-radius: 8px; font-size: 0.85rem; margin-top: 8px;
            border: 1px solid #fecaca;
        }

        .login-link { text-align: center; margin-top: 28px; }
        .login-link span { color: #718096; font-size: 0.9rem; }
        .login-link a {
            color: #1a6e7a; font-weight: 600; text-decoration: none;
            font-size: 0.9rem; transition: color 0.2s;
        }
        .login-link a:hover { color: #0d3b42; }

        .back-link { text-align: center; margin-top: 16px; }
        .back-link a {
            color: #94a3b8; font-size: 0.85rem; text-decoration: none;
            font-weight: 500; transition: color 0.2s;
        }
        .back-link a:hover { color: #1a6e7a; }

        @media (max-width: 992px) {
            .brand-panel { display: none; }
            .register-panel { width: 100%; }
            body { background: #fff; }
        }
        @media (max-width: 576px) {
            .register-panel { padding: 40px 24px; }
        }
    </style>
</head>
<body>
    <div class="brand-panel">
        <div class="brand-content">
            <div class="brand-logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="MoveWell">
            </div>
            <h1>MoveWell</h1>
            <p>Join us to manage your orthopaedic practice website. Control content, messages, and media from one place.</p>
            <div class="brand-features">
                <div class="feature">
                    <i class="fas fa-inbox"></i>
                    <span>Manage patient enquiries & contact messages</span>
                </div>
                <div class="feature">
                    <i class="fas fa-images"></i>
                    <span>Upload clinic & surgery gallery images</span>
                </div>
                <div class="feature">
                    <i class="fas fa-pen-nib"></i>
                    <span>Create & publish health articles and blogs</span>
                </div>
            </div>
        </div>
    </div>

    <div class="register-panel">
        <div class="register-header">
            <h2>Create Account</h2>
            <p>Register to get started with MoveWell</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label>Full Name</label>
                <div class="input-wrap">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your full name" required autofocus>
                    <i class="fas fa-user icon"></i>
                </div>
                @error('name')
                    <div class="error-msg"><i class="fas fa-exclamation-circle me-1"></i> {{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <div class="input-wrap">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                    <i class="fas fa-envelope icon"></i>
                </div>
                @error('email')
                    <div class="error-msg"><i class="fas fa-exclamation-circle me-1"></i> {{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="input-wrap">
                    <input type="password" name="password" placeholder="Minimum 8 characters" required id="passwordInput">
                    <i class="fas fa-lock icon"></i>
                    <button type="button" onclick="togglePassword('passwordInput', 'eyeIcon1')" style="position:absolute;right:14px;top:50%;transform:translateY(-50%);background:none;border:none;color:#94a3b8;cursor:pointer;padding:4px;">
                        <i class="fas fa-eye" id="eyeIcon1"></i>
                    </button>
                </div>
                @error('password')
                    <div class="error-msg"><i class="fas fa-exclamation-circle me-1"></i> {{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <div class="input-wrap">
                    <input type="password" name="password_confirmation" placeholder="Re-enter your password" required id="passwordConfirm">
                    <i class="fas fa-lock icon"></i>
                    <button type="button" onclick="togglePassword('passwordConfirm', 'eyeIcon2')" style="position:absolute;right:14px;top:50%;transform:translateY(-50%);background:none;border:none;color:#94a3b8;cursor:pointer;padding:4px;">
                        <i class="fas fa-eye" id="eyeIcon2"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-register">
                Create Account <i class="fas fa-arrow-right ms-1"></i>
            </button>
        </form>

        <div class="login-link">
            <span>Already have an account? </span>
            <a href="{{ route('login') }}">Sign In</a>
        </div>

        <div class="back-link">
            <a href="{{ route('home') }}"><i class="fas fa-arrow-left me-1"></i> Back to Website</a>
        </div>
    </div>

    <script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
    </script>
</body>
</html>
