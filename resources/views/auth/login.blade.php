<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SumbawaArt</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #1C1C1C 0%, #2B1B08 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            padding: 40px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #1C1C1C;
            margin-bottom: 8px;
        }

        .login-header p {
            font-size: 14px;
            color: #666;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #1C1C1C;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #E0E0E0;
            border-radius: 6px;
            font-size: 14px;
            font-family: 'Montserrat', sans-serif;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #F3EE62;
            box-shadow: 0 0 0 3px rgba(243, 238, 98, 0.1);
        }

        .form-group input::placeholder {
            color: #999;
        }

        .error-message {
            color: #E53935;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }

        .role-group {
            display: flex;
            gap: 16px;
            margin-bottom: 20px;
        }

        .role-option {
            flex: 1;
        }

        .role-option input[type="radio"] {
            display: none;
        }

        .role-option label {
            display: block;
            padding: 12px;
            border: 2px solid #E0E0E0;
            border-radius: 6px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 0;
        }

        .role-option input[type="radio"]:checked + label {
            border-color: #F3EE62;
            background: #F3EE62;
            color: #1C1C1C;
            font-weight: 600;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            color: #1C1C1C;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            letter-spacing: 0.5px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(243, 238, 98, 0.3);
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #666;
        }

        .login-footer a {
            color: #F3EE62;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-footer a:hover {
            color: #E8D5C4;
        }

        .alert {
            padding: 12px 14px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 500;
        }

        .alert-danger {
            background: #FFEBEE;
            color: #C62828;
            border-left: 4px solid #E53935;
        }

        .alert-success {
            background: #E8F5E9;
            color: #2E7D32;
            border-left: 4px solid #43A047;
        }

        .signup-section {
            border-top: 1px solid #E0E0E0;
            margin-top: 24px;
            padding-top: 24px;
            text-align: center;
        }

        .signup-section p {
            font-size: 14px;
            color: #333;
            margin-bottom: 12px;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        .btn-signup {
            display: inline-block;
            width: 100%;
            padding: 13px;
            background: transparent;
            border: 2px solid #F3EE62;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 700;
            color: #1C1C1C;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .btn-signup:hover {
            background: #F3EE62;
            color: #1C1C1C;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(243, 238, 98, 0.3);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>SumbawaArt</h1>
            <p>Portal Karya Seniman Budaya Sumbawa</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Masukkan email Anda"
                    value="{{ old('email') }}"
                    required
                >
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Masukkan password Anda"
                    required
                >
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label style="display: block; margin-bottom: 12px;">Pilih Role:</label>
                <div class="role-group">
                    <div class="role-option">
                        <input 
                            type="radio" 
                            id="role_seniman" 
                            name="role" 
                            value="seniman"
                            {{ old('role') === 'seniman' ? 'checked' : '' }}
                        >
                        <label for="role_seniman">Seniman</label>
                    </div>
                    <div class="role-option">
                        <input 
                            type="radio" 
                            id="role_admin" 
                            name="role" 
                            value="admin"
                            {{ old('role') === 'admin' ? 'checked' : '' }}
                        >
                        <label for="role_admin">Admin</label>
                    </div>
                </div>
                @error('role')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-login">
                <i class="ri-login-box-line"></i> Login
            </button>
        </form>

        <div class="login-footer">
            Kembali ke <a href="{{ route('home') }}">halaman utama</a>
        </div>

        <div class="signup-section">
            <p>Belum punya akun?</p>
            <a href="{{ route('register') }}" class="btn-signup">
                <i class="ri-user-add-line" style="margin-right: 6px;"></i>Buat Akun Baru
            </a>
        </div>
    </div>
</body>
</html>
