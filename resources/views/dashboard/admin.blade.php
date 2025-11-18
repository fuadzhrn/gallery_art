<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SumbawaArt</title>
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
            background: #F5F5F5;
            color: #1C1C1C;
        }

        .navbar {
            background: white;
            padding: 16px 40px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: 700;
            color: #F3EE62;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .badge-admin {
            background: #FF6B6B;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
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
        }

        .btn-logout:hover {
            background: #C62828;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .welcome-card {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .welcome-card h1 {
            font-size: 32px;
            margin-bottom: 16px;
            color: #1C1C1C;
        }

        .welcome-card p {
            font-size: 16px;
            line-height: 1.6;
            color: #666;
            margin-bottom: 20px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-left: 4px solid #F3EE62;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #F3EE62;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 13px;
            color: #999;
            font-weight: 500;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .feature-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .feature-icon {
            font-size: 32px;
            color: #FF6B6B;
            margin-bottom: 12px;
        }

        .feature-card h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .feature-card p {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }

        .btn-primary {
            display: inline-block;
            background: linear-gradient(135deg, #FF6B6B 0%, #FF8C8C 100%);
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 16px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(255, 107, 107, 0.3);
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">SumbawaArt Admin</div>
        <div class="navbar-right">
            <div class="user-info">
                <i class="ri-shield-admin-line"></i>
                <span>{{ Auth::user()->name }}</span>
                <span class="badge-admin">ADMIN</span>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-card">
            <h1>Selamat datang, <strong>Admin</strong>! 🔐</h1>
            <p>
                Anda masuk sebagai <strong>Administrator</strong>. Dashboard ini memberikan akses penuh untuk mengelola platform SumbawaArt, termasuk verifikasi karya, pengelolaan seniman, dan konfigurasi sistem.
            </p>
            <p style="color: #999; font-size: 14px;">
                <strong>Email:</strong> {{ Auth::user()->email }}<br>
                <strong>Role:</strong> {{ Auth::user()->role }}
            </p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-value">24</div>
                <div class="stat-label">Seniman Terdaftar</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">156</div>
                <div class="stat-label">Karya Seni</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">12</div>
                <div class="stat-label">Menunggu Verifikasi</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">2,540</div>
                <div class="stat-label">Total Pengunjung</div>
            </div>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="ri-check-double-line"></i>
                </div>
                <h3>Verifikasi Karya</h3>
                <p>Review dan verifikasi karya seni yang diunggah oleh seniman sebelum dipublikasikan.</p>
                <a href="#" class="btn-primary">Kelola Verifikasi</a>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="ri-user-settings-line"></i>
                </div>
                <h3>Kelola Seniman</h3>
                <p>Atur data seniman, aktifasi akun, dan kelola permissions pengguna.</p>
                <a href="#" class="btn-primary">Lihat Seniman</a>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="ri-gallery-line"></i>
                </div>
                <h3>Kelola Galeri</h3>
                <p>Organisir koleksi, kategori, dan kurasi karya seni di galeri utama.</p>
                <a href="#" class="btn-primary">Atur Galeri</a>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="ri-layout-grid-fill"></i>
                </div>
                <h3>Kategori & Tag</h3>
                <p>Kelola kategori seni, tag, dan metadata untuk pengorganisasian karya.</p>
                <a href="#" class="btn-primary">Atur Kategori</a>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="ri-bar-chart-2-line"></i>
                </div>
                <h3>Laporan & Analitik</h3>
                <p>Lihat laporan detail tentang performa platform, traffic, dan engagement.</p>
                <a href="#" class="btn-primary">Buka Laporan</a>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="ri-settings-4-line"></i>
                </div>
                <h3>Pengaturan Sistem</h3>
                <p>Konfigurasi pengaturan global platform, SEO, dan preferensi sistem.</p>
                <a href="#" class="btn-primary">Pengaturan Sistem</a>
            </div>
        </div>
    </div>
</body>
</html>
