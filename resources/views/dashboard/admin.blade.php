<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SumbawaArt</title>
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
            background: #F0F2F5;
            color: #1C1C1C;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: linear-gradient(135deg, #2B1B08 0%, #1C1C1C 100%);
            color: white;
            padding: 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        }

        .sidebar-header {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.2);
        }

        .sidebar-brand {
            font-size: 18px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #F3EE62;
        }

        .sidebar-nav {
            list-style: none;
            padding: 20px 0;
        }

        .sidebar-nav li {
            margin: 0;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 14px;
            font-weight: 500;
        }

        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background: rgba(243, 238, 98, 0.1);
            color: #F3EE62;
            border-left: 3px solid #F3EE62;
            padding-left: 17px;
        }

        .sidebar-nav i {
            font-size: 18px;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.2);
        }

        .btn-logout-sidebar {
            width: 100%;
            background: #E53935;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .btn-logout-sidebar:hover {
            background: #C62828;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Top Bar */
        .topbar {
            background: white;
            padding: 16px 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-title {
            font-size: 20px;
            font-weight: 700;
            color: #1C1C1C;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 12px;
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

        .user-name {
            display: flex;
            flex-direction: column;
        }

        .user-name span:first-child {
            font-weight: 600;
            font-size: 14px;
        }

        .user-name span:last-child {
            font-size: 12px;
            color: #999;
        }

        /* Content Area */
        .content {
            padding: 30px;
            flex: 1;
            overflow-y: auto;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .page-header p {
            color: #666;
            font-size: 14px;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border-left: 4px solid #F3EE62;
        }

        .stat-card.pending {
            border-left-color: #FFC107;
        }

        .stat-card.revisi {
            border-left-color: #2196F3;
        }

        .stat-card.tolak {
            border-left-color: #E53935;
        }

        .stat-card.terima {
            border-left-color: #4CAF50;
        }

        .stat-label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
            color: #1C1C1C;
        }

        /* Table Wrapper */
        .table-section {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .table-header {
            padding: 20px 30px;
            border-bottom: 1px solid #E0E0E0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h2 {
            font-size: 18px;
            font-weight: 700;
        }

        .table-filters {
            display: flex;
            gap: 10px;
        }

        .filter-btn {
            padding: 8px 14px;
            border: 1px solid #E0E0E0;
            background: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
            color: #666;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
            color: #1C1C1C;
            border-color: transparent;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #F9F9F9;
            border-bottom: 2px solid #E0E0E0;
        }

        th {
            padding: 16px 20px;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #666;
        }

        td {
            padding: 16px 20px;
            border-bottom: 1px solid #E0E0E0;
            font-size: 13px;
        }

        tbody tr:hover {
            background: #FAFAFA;
        }

        .img-thumbnail {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 6px;
            background: #E0E0E0;
        }

        .img-placeholder {
            width: 50px;
            height: 50px;
            background: #E0E0E0;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background: #FFF3CD;
            color: #856404;
        }

        .status-terima {
            background: #D4EDDA;
            color: #155724;
        }

        .status-tolak {
            background: #F8D7DA;
            color: #721C24;
        }

        .status-revisi {
            background: #D1ECF1;
            color: #0C5460;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state-icon {
            font-size: 64px;
            color: #F3EE62;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #666;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
            }

            .content {
                padding: 20px;
            }

            .topbar {
                padding: 12px 20px;
            }

            .topbar-title {
                font-size: 16px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 12px 10px;
            }

            .img-thumbnail, .img-placeholder {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>
<body>
    <div class="layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-brand">
                    <i class="ri-admin-line"></i>
                    Admin Panel
                </div>
            </div>

            <ul class="sidebar-nav">
                <li>
                    <a href="{{ route('dashboard-admin') }}" class="active">
                        <i class="ri-dashboard-line"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('karya.admin') }}">
                        <i class="ri-image-2-line"></i>
                        Semua Karya
                    </a>
                </li>
                <li>
                    <a href="{{ route('karya.admin', ['jenis' => 'budaya']) }}">
                        <i class="ri-palette-line"></i>
                        Seni Budaya
                    </a>
                </li>
                <li>
                    <a href="{{ route('karya.admin', ['jenis' => 'tari']) }}">
                        <i class="ri-dance-line"></i>
                        Seni Tari
                    </a>
                </li>
                <li>
                    <a href="{{ route('karya.admin', ['jenis' => 'teater']) }}">
                        <i class="ri-mask-2-line"></i>
                        Seni Teater
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout-sidebar">
                        <i class="ri-logout-box-line"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Bar -->
            <div class="topbar">
                <div class="topbar-title">Dashboard Admin</div>
                <div class="topbar-user">
                    <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                    <div class="user-name">
                        <span>{{ Auth::user()->name }}</span>
                        <span>Administrator</span>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="content">
                <div class="page-header">
                    <h1>Selamat Datang, Admin</h1>
                    <p>Kelola dan verifikasi semua karya seni yang diupload oleh seniman</p>
                </div>

                <!-- Stats Grid -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-label">Total Karya</div>
                        <div class="stat-number">{{ \App\Models\Karya::count() }}</div>
                    </div>
                    <div class="stat-card pending">
                        <div class="stat-label">Menunggu</div>
                        <div class="stat-number">{{ \App\Models\Karya::where('status', 'pending')->count() }}</div>
                    </div>
                    <div class="stat-card revisi">
                        <div class="stat-label">Revisi</div>
                        <div class="stat-number">{{ \App\Models\Karya::where('status', 'revisi')->count() }}</div>
                    </div>
                    <div class="stat-card terima">
                        <div class="stat-label">Diterima</div>
                        <div class="stat-number">{{ \App\Models\Karya::where('status', 'terima')->count() }}</div>
                    </div>
                    <div class="stat-card tolak">
                        <div class="stat-label">Ditolak</div>
                        <div class="stat-number">{{ \App\Models\Karya::where('status', 'tolak')->count() }}</div>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="table-section">
                    <div class="table-header">
                        <h2>Karya Terbaru</h2>
                    </div>
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 8%;">Gambar</th>
                                    <th style="width: 18%;">Nama Karya</th>
                                    <th style="width: 15%;">Seniman</th>
                                    <th style="width: 10%;">Jenis</th>
                                    <th style="width: 12%;">Tanggal</th>
                                    <th style="width: 10%;">Status</th>
                                    <th style="width: 12%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $karya = \App\Models\Karya::with('user')->latest()->limit(10)->get();
                                @endphp
                                @if($karya->count() > 0)
                                    @foreach($karya as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                @if($item->gambar)
                                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="img-thumbnail" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                    <div class="img-placeholder" style="display: none;"><i class="ri-image-2-line"></i></div>
                                                @else
                                                    <div class="img-placeholder"><i class="ri-image-2-line"></i></div>
                                                @endif
                                            </td>
                                            <td>
                                                <div><strong>{{ $item->nama }}</strong></div>
                                                @if($item->deskripsi)
                                                    <small style="color: #999; display: block; margin-top: 4px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ Str::limit($item->deskripsi, 50) }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                <div><strong>{{ $item->user->name }}</strong></div>
                                                <small style="color: #999;">{{ $item->user->email }}</small>
                                            </td>
                                            <td>
                                                <span style="text-transform: capitalize;">{{ $item->jenis }}</span>
                                            </td>
                                            <td>{{ $item->created_at->format('d M Y') }}</td>
                                            <td>
                                                <span class="status-badge status-{{ $item->status }}">{{ ucfirst($item->status) }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('karya.admin') }}" style="color: #2196F3; text-decoration: none; font-weight: 600; font-size: 12px;">
                                                    <i class="ri-arrow-right-line"></i> Kelola
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="empty-state">
                                            <div style="color: #999; font-size: 14px;">
                                                <i class="ri-inbox-line" style="font-size: 32px; display: block; margin-bottom: 10px;"></i>
                                                Belum ada karya yang perlu diverifikasi
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
