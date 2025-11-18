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

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 40px;
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
            color: #F3EE62;
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
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
            color: #1C1C1C;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 16px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(243, 238, 98, 0.3);
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">SumbawaArt</div>
        <div class="navbar-right">
            <div class="user-info">
                <i class="ri-user-3-line"></i>
                <span>{{ Auth::user()->name }}</span>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-card">
            <h1>Selamat datang, <strong>{{ Auth::user()->name }}</strong>! 👋</h1>
            <p>
                Anda masuk sebagai <strong>Seniman</strong>. Di dashboard ini, Anda dapat mengelola karya seni Anda dengan berbagai fitur yang tersedia.
            </p>
            <p style="color: #999; font-size: 14px;">
                <strong>Email:</strong> {{ Auth::user()->email }}<br>
                <strong>Role:</strong> {{ Auth::user()->role }}
            </p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="ri-image-add-line"></i>
                </div>
                <h3>Upload Karya</h3>
                <p>Unggah karya seni Anda dalam berbagai format (gambar, video, atau dokumen digital).</p>
                <a href="#" class="btn-primary">Upload Sekarang</a>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="ri-bar-chart-line"></i>
                </div>
                <h3>Status Karya</h3>
                <p>Pantau status karya Anda mulai dari upload, review, hingga publikasi di galeri.</p>
                <a href="#" class="btn-primary">Lihat Status</a>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="ri-profile-line"></i>
                </div>
                <h3>Profil Seniman</h3>
                <p>Kelola informasi profil, bio, dan portofolio Anda di SumbawaArt.</p>
                <a href="#" class="btn-primary">Edit Profil</a>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="ri-message-2-line"></i>
                </div>
                <h3>Pesan & Notifikasi</h3>
                <p>Terima notifikasi tentang karya Anda dan komunikasi dari admin.</p>
                <a href="#" class="btn-primary">Buka Pesan</a>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="ri-eye-line"></i>
                </div>
                <h3>Analitik</h3>
                <p>Lihat statistik kunjungan dan interaksi untuk setiap karya Anda.</p>
                <a href="#" class="btn-primary">Lihat Analitik</a>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="ri-settings-3-line"></i>
                </div>
                <h3>Pengaturan</h3>
                <p>Atur preferensi, keamanan akun, dan notifikasi Anda.</p>
                <a href="#" class="btn-primary">Buka Pengaturan</a>
            </div>
        </div>
    </div>
</body>
</html>
