<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Karya - SumbawaArt Admin</title>
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
            padding-top: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
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

        .filter-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-group label {
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
        }

        .filter-select {
            padding: 8px 12px;
            border: 1px solid #E0E0E0;
            border-radius: 6px;
            font-size: 13px;
            font-family: 'Montserrat', sans-serif;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        .filter-select:focus {
            outline: none;
            border-color: #F3EE62;
            box-shadow: 0 0 0 3px rgba(243, 238, 98, 0.1);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .stat-card .number {
            font-size: 28px;
            font-weight: 700;
            color: #F3EE62;
        }

        .stat-card .label {
            font-size: 12px;
            color: #666;
            margin-top: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .table-wrapper {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
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
            padding: 16px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #666;
        }

        td {
            padding: 16px;
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

        .seniman-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .seniman-name {
            font-weight: 600;
        }

        .seniman-email {
            font-size: 11px;
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

        .status-approved {
            background: #D4EDDA;
            color: #155724;
        }

        .status-rejected {
            background: #F8D7DA;
            color: #721C24;
        }

        .status-draft {
            background: #E2E3E5;
            color: #383D41;
        }

        .action-select {
            padding: 6px 10px;
            border: 1px solid #E0E0E0;
            border-radius: 4px;
            font-size: 12px;
            font-family: 'Montserrat', sans-serif;
            cursor: pointer;
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

        .empty-state h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #666;
        }

        .success-message {
            background: #D4EDDA;
            color: #155724;
            padding: 12px 14px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid #28A745;
        }

        @media (max-width: 768px) {
            .filter-card {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-group {
                flex-direction: column;
            }

            .filter-select {
                width: 100%;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 12px 8px;
            }

            .img-thumbnail {
                width: 40px;
                height: 40px;
            }

            .img-placeholder {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Manajemen Karya</h1>
            <p>Kelola dan moderasi semua karya seni dari seniman</p>
        </div>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="filter-card">
            <div class="filter-group">
                <label for="statusFilter">Filter Status:</label>
                <select id="statusFilter" class="filter-select" onchange="filterByStatus(this.value)">
                    <option value="">Semua Status</option>
                    <option value="draft">Draft</option>
                    <option value="pending">Menunggu Persetujuan</option>
                    <option value="approved">Disetujui</option>
                    <option value="rejected">Ditolak</option>
                </select>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="number">{{ $allKarya->count() }}</div>
                <div class="label">Total Karya</div>
            </div>
            <div class="stat-card">
                <div class="number">{{ $allKarya->where('status', 'approved')->count() }}</div>
                <div class="label">Disetujui</div>
            </div>
            <div class="stat-card">
                <div class="number">{{ $allKarya->where('status', 'pending')->count() }}</div>
                <div class="label">Menunggu</div>
            </div>
            <div class="stat-card">
                <div class="number">{{ $allKarya->where('status', 'rejected')->count() }}</div>
                <div class="label">Ditolak</div>
            </div>
        </div>

        @if ($allKarya->count() > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5%;">Gambar</th>
                            <th style="width: 20%;">Judul</th>
                            <th style="width: 20%;">Seniman</th>
                            <th style="width: 15%;">Tanggal Upload</th>
                            <th style="width: 15%;">Status</th>
                            <th style="width: 25%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allKarya as $item)
                            <tr class="karya-row" data-status="{{ $item->status }}">
                                <td>
                                    @if ($item->gambar && file_exists(storage_path('app/public/' . $item->gambar)))
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="img-thumbnail">
                                    @else
                                        <div class="img-placeholder">
                                            <i class="ri-image-line"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $item->judul }}</strong>
                                    @if ($item->deskripsi)
                                        <p style="font-size: 11px; color: #666; margin-top: 4px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            {{ $item->deskripsi }}
                                        </p>
                                    @endif
                                </td>
                                <td>
                                    <div class="seniman-info">
                                        <div>
                                            <div class="seniman-name">{{ $item->user->name }}</div>
                                            <div class="seniman-email">{{ $item->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                                <td>
                                    <span class="status-badge status-{{ $item->status }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('karya.updateStatus', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="action-select" onchange="this.form.submit()">
                                            <option value="">-- Ubah Status --</option>
                                            <option value="draft" {{ $item->status === 'draft' ? 'selected' : '' }}>Draft</option>
                                            <option value="pending" {{ $item->status === 'pending' ? 'selected' : '' }}>Menunggu</option>
                                            <option value="approved" {{ $item->status === 'approved' ? 'selected' : '' }}>Setujui</option>
                                            <option value="rejected" {{ $item->status === 'rejected' ? 'selected' : '' }}>Tolak</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="table-wrapper">
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="ri-image-line"></i>
                    </div>
                    <h2>Tidak Ada Karya</h2>
                    <p>Belum ada karya seni yang diupload oleh seniman.</p>
                </div>
            </div>
        @endif
    </div>

    <script>
        function filterByStatus(status) {
            const rows = document.querySelectorAll('.karya-row');
            rows.forEach(row => {
                if (status === '' || row.dataset.status === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
