<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Seniman - SumbawaArt</title>
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

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #1C1C1C;
            min-height: 100vh;
        }

        .navbar {
            background: white;
            padding: 16px 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-brand {
            font-size: 22px;
            font-weight: 700;
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #666;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1C1C1C;
            font-weight: 700;
            font-size: 16px;
        }

        .btn-logout {
            background: #E53935;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 13px;
        }

        .btn-logout:hover {
            background: #C62828;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(229, 57, 53, 0.3);
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 80px 20px;
        }

        .header-section {
            text-align: center;
            margin-bottom: 70px;
            animation: slideInDown 0.6s ease-out;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-section h1 {
            font-size: 52px;
            font-weight: 700;
            margin-bottom: 12px;
            color: #1C1C1C;
        }

        .header-section p {
            font-size: 18px;
            color: #666;
            margin-bottom: 10px;
        }

        .header-accent {
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
            margin: 20px auto 0;
            border-radius: 2px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 40px;
        }

        .feature-card {
            background: white;
            border-radius: 16px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            animation: slideInUp 0.6s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .feature-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .feature-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            font-size: 56px;
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 12px;
            color: #1C1C1C;
        }

        .feature-card p {
            font-size: 15px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
            color: #1C1C1C;
            padding: 12px 28px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(243, 238, 98, 0.4);
        }

        .btn-primary:active {
            transform: translateY(-1px);
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 12px 20px;
            }

            .navbar-brand {
                font-size: 18px;
            }

            .navbar-right {
                gap: 12px;
            }

            .user-info {
                display: none;
            }

            .container {
                padding: 40px 15px;
            }

            .header-section h1 {
                font-size: 36px;
            }

            .header-section p {
                font-size: 16px;
            }

            .feature-card {
                padding: 30px 20px;
            }

            .feature-icon {
                font-size: 48px;
            }

            .feature-card h3 {
                font-size: 20px;
            }

            .features-grid {
                gap: 24px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
            <i class="ri-image-line"></i> SumbawaArt
        </div>
        <div class="navbar-right">
            <div class="user-info">
                <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div>
                    <div style="font-weight: 600; color: #1C1C1C;">{{ Auth::user()->name }}</div>
                    <div style="font-size: 12px; color: #999;">Seniman</div>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="header-section">
            <h1>Kelola Karya Anda</h1>
            <p>Unggah, pantau, dan kelola semua karya seni Anda di sini</p>
            <div class="header-accent"></div>
        </div>

        <div class="features-grid">
            <!-- Upload Karya Card -->
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="ri-upload-cloud-2-line"></i>
                </div>
                <h3>Upload Karya</h3>
                <p>Bagikan karya seni Anda. Pilih jenis karya (Budaya, Tari, atau Teater) dan unggah gambar berkualitas tinggi.</p>
                <a href="{{ route('karya.create') }}" class="btn-primary">
                    <i class="ri-add-line"></i>
                    Mulai Upload
                </a>
            </div>

            <!-- Status Karya Card -->
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="ri-file-list-line"></i>
                </div>
                <h3>Status Karya</h3>
                <p>Lihat daftar semua karya Anda dan pantau status verifikasi dari admin. Terima atau perbaiki sesuai masukan.</p>
                <a href="{{ route('karya.seniman') }}" class="btn-primary">
                    <i class="ri-eye-line"></i>
                    Lihat Karya
                </a>
            </div>
        </div>
    </div>
</body>
</html>

