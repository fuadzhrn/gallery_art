<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - SumbawaArt</title>
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
            padding: 16px 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: 700;
            color: #F3EE62;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-menu {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .navbar-menu a {
            color: #1C1C1C;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .navbar-menu a:hover {
            color: #F3EE62;
        }

        .btn-upload {
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
            color: #1C1C1C;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
        }

        .btn-upload:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(243, 238, 98, 0.3);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .gallery-header {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .gallery-header h1 {
            font-size: 36px;
            font-weight: 700;
            color: #1C1C1C;
        }

        .gallery-header p {
            color: #666;
            font-size: 14px;
            max-width: 600px;
        }

        .gallery-line {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #F3EE62 0%, #E8D5C4 100%);
            margin: 20px 0 30px 0;
            border-radius: 2px;
        }

        .gallery-desc {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 40px;
            max-width: 900px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .gallery-item {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            flex-direction: column;
        }

        .gallery-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .gallery-item-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
        }

        .gallery-item-info {
            padding: 16px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .art-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 6px;
            color: #1C1C1C;
        }

        .art-artist {
            font-size: 13px;
            color: #F3EE62;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .art-jenis {
            display: inline-block;
            background: #F0F0F0;
            color: #1C1C1C;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            text-transform: capitalize;
            width: fit-content;
        }

        .art-deskripsi {
            font-size: 12px;
            color: #999;
            margin-top: 8px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }

        .empty-state-icon {
            font-size: 64px;
            color: #F3EE62;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #1C1C1C;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            max-width: 700px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            animation: slideUp 0.3s ease;
        }

        .modal-close {
            position: absolute;
            top: 16px;
            right: 16px;
            background: #f0f0f0;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 24px;
            color: #1C1C1C;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .modal-close:hover {
            background: #E0E0E0;
        }

        .modal-image {
            width: 100%;
            height: auto;
            display: block;
        }

        .modal-info {
            padding: 24px;
        }

        .modal-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .modal-artist {
            color: #F3EE62;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .modal-jenis {
            display: inline-block;
            background: #F0F0F0;
            color: #1C1C1C;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
            margin-bottom: 16px;
        }

        .modal-deskripsi {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 16px;
        }

        .modal-date {
            font-size: 12px;
            color: #999;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 12px 16px;
            }

            .navbar-menu {
                gap: 10px;
            }

            .navbar-menu a {
                font-size: 12px;
            }

            .container {
                padding-top: 30px;
                padding-bottom: 30px;
            }

            .gallery-header h1 {
                font-size: 24px;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 16px;
            }

            .gallery-item-image {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="{{ route('home') }}" class="navbar-brand">
            <i class="ri-image-2-line"></i> SumbawaArt
        </a>
        <div class="navbar-menu">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('gallery') }}">Galeri</a>
            @auth
                <a href="{{ Auth::user()->role === 'seniman' ? route('dashboard-seniman') : route('dashboard-admin') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Gallery Header -->
        <div class="gallery-header">
            <div>
                <h1>Galeri Karya Seni</h1>
                <div class="gallery-line"></div>
            </div>
        </div>

        <!-- Gallery Description -->
        <p class="gallery-desc">
            Galeri ini menampilkan ragam seni Sumbawa dalam visual yang penuh warna, cerita, dan identitas budaya. 
            Setiap karya mencerminkan keunikan dan kekayaan warisan budaya Sumbawa yang telah diwariskan turun temurun. 
            Kami mengundang Anda untuk menjelajahi dan menghargai keindahan seni lokal dari pulau yang eksotis ini.
        </p>

        <!-- Gallery Grid -->
        <div class="gallery-grid">
            @if($karya->count() > 0)
                @foreach($karya as $item)
                    <div class="gallery-item" onclick="openModal({{ $item->id }})">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="gallery-item-image" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22%3E%3Crect fill=%22%23f3ee62%22 width=%22100%22 height=%22100%22/%3E%3C/svg%3E';">
                        @else
                            <div class="gallery-item-image" style="display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);">
                                <i class="ri-image-2-line" style="font-size: 40px; color: #1C1C1C;"></i>
                            </div>
                        @endif
                        <div class="gallery-item-info">
                            <h3 class="art-title">{{ $item->nama }}</h3>
                            <p class="art-artist">{{ $item->user->name }}</p>
                            <span class="art-jenis">{{ $item->jenis }}</span>
                            @if($item->deskripsi)
                                <p class="art-deskripsi">{{ $item->deskripsi }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div style="grid-column: 1 / -1;">
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i class="ri-gallery-line"></i>
                        </div>
                        <h3>Belum Ada Karya</h3>
                        <p>Galeri sedang kosong. Kembali lagi nanti untuk melihat karya-karya terbaru!</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="imageModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeModal()">
                <i class="ri-close-line"></i>
            </button>
            <div id="modalBody"></div>
        </div>
    </div>

    <script>
        const karya = @json($karya->keyBy('id')->toArray());

        function openModal(id) {
            const item = karya[id];
            if (!item) return;

            let imgHtml = '';
            if (item.gambar) {
                imgHtml = `<img src="{{ asset('storage/') }}${item.gambar}" alt="${item.nama}" class="modal-image" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22%3E%3Crect fill=%22%23f3ee62%22 width=%22100%22 height=%22100%22/%3E%3C/svg%3E';">`;
            } else {
                imgHtml = `<div style="width: 100%; height: 400px; background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%); display: flex; align-items: center; justify-content: center;">
                    <i class="ri-image-2-line" style="font-size: 80px; color: #1C1C1C;"></i>
                </div>`;
            }

            const html = `
                ${imgHtml}
                <div class="modal-info">
                    <h2 class="modal-title">${item.nama}</h2>
                    <p class="modal-artist">oleh ${item.user.name}</p>
                    <span class="modal-jenis">${item.jenis}</span>
                    ${item.deskripsi ? `<p class="modal-deskripsi">${item.deskripsi}</p>` : ''}
                    <p class="modal-date">Diupload pada ${new Date(item.created_at).toLocaleDateString('id-ID')}</p>
                </div>
            `;

            document.getElementById('modalBody').innerHTML = html;
            document.getElementById('imageModal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.remove('active');
        }

        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeModal();
        });
    </script>
</body>
</html>
