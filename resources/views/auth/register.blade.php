<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - SumbawaArt</title>
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

        .register-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 500px;
            padding: 40px;
        }

        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #1C1C1C;
            margin-bottom: 8px;
        }

        .register-header p {
            font-size: 14px;
            color: #666;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #1C1C1C;
            margin-bottom: 6px;
            letter-spacing: 0.5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 11px 14px;
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
            font-size: 11px;
            margin-top: 4px;
            display: block;
        }

        .role-group {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
        }

        .role-option {
            flex: 1;
        }

        .role-option input[type="radio"] {
            display: none;
        }

        .role-option label {
            display: block;
            padding: 10px;
            border: 2px solid #E0E0E0;
            border-radius: 6px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 0;
            font-size: 13px;
        }

        .role-option input[type="radio"]:checked + label {
            border-color: #F3EE62;
            background: #F3EE62;
            color: #1C1C1C;
            font-weight: 600;
        }

        .btn-register {
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
            margin-top: 16px;
            letter-spacing: 0.5px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(243, 238, 98, 0.3);
        }

        .login-footer {
            text-align: center;
            margin-top: 16px;
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

        .terms-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 12px;
            color: #666;
            margin-bottom: 16px;
        }

        .terms-checkbox input[type="checkbox"] {
            margin-top: 3px;
            cursor: pointer;
        }

        .login-link {
            display: block;
            text-align: center;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #E0E0E0;
        }

        .login-link a {
            color: #F3EE62;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1>Buat Akun</h1>
            <p>Bergabunglah dengan SumbawaArt</p>
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

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    placeholder="Masukkan nama lengkap"
                    value="{{ old('name') }}"
                    required
                >
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

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
                    placeholder="Minimal 6 karakter"
                    required
                >
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    placeholder="Masukkan ulang password"
                    required
                >
                @error('password_confirmation')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label style="display: block; margin-bottom: 10px;">Daftar Sebagai:</label>
                <div class="role-group">
                    <div class="role-option">
                        <input 
                            type="radio" 
                            id="role_seniman" 
                            name="role" 
                            value="seniman"
                            {{ old('role') === 'seniman' ? 'checked' : '' }}
                            required
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
                            required
                        >
                        <label for="role_admin">Admin</label>
                    </div>
                </div>
                @error('role')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="terms-checkbox">
                <input 
                    type="checkbox" 
                    id="terms" 
                    name="terms" 
                    value="1"
                    required
                >
                <label for="terms">
                    Saya setuju dengan 
                    <a href="#" style="color: #F3EE62; text-decoration: none;">Syarat & Ketentuan</a> 
                    SumbawaArt
                </label>
            </div>

            <button type="submit" class="btn-register">
                <i class="ri-user-add-line"></i> Daftar Sekarang
            </button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
        </div>

        <div class="login-footer" style="margin-top: 12px; border-top: none;">
            <a href="{{ route('home') }}">Kembali ke halaman utama</a>
        </div>
    </div>
</body>
</html>
