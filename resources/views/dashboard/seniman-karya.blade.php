<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karya Saya - SumbawaArt</title>
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
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .page-header h1 {
            font-size: 28px;
            font-weight: 700;
        }

        .btn-upload {
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
            color: #1C1C1C;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .btn-upload:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(243, 238, 98, 0.3);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
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

        .empty-state {
            background: white;
            border-radius: 12px;
            padding: 60px 20px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
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
            margin-bottom: 25px;
        }

        .btn-empty {
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
            color: #1C1C1C;
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .btn-empty:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(243, 238, 98, 0.3);
        }

        .karya-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 24px;
            margin-bottom: 30px;
        }

        .karya-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .karya-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .karya-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: #E0E0E0;
        }

        .karya-content {
            padding: 16px;
        }

        .karya-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .karya-desc {
            font-size: 12px;
            color: #666;
            line-height: 1.4;
            margin-bottom: 12px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .karya-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: #999;
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px solid #E0E0E0;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
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

        .karya-actions {
            display: flex;
            gap: 8px;
        }

        .btn-action {
            flex: 1;
            padding: 8px;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }

        .btn-view {
            background: #E3F2FD;
            color: #1565C0;
        }

        .btn-view:hover {
            background: #BBDEFB;
        }

        .btn-delete {
            background: #FFEBEE;
            color: #C62828;
        }

        .btn-delete:hover {
            background: #FFCDD2;
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .karya-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Karya Saya</h1>
            <a href="{{ route('karya.create') }}" class="btn-upload">
                <i class="ri-upload-cloud-2-line"></i> Upload Karya
            </a>
        </div>

        @if ($karya->count() > 0)
            <div class="stats">
                <div class="stat-card">
                    <div class="number">{{ $karya->count() }}</div>
                    <div class="label">Total Karya</div>
                </div>
                <div class="stat-card">
                    <div class="number">{{ $karya->where('status', 'approved')->count() }}</div>
                    <div class="label">Disetujui</div>
                </div>
                <div class="stat-card">
                    <div class="number">{{ $karya->where('status', 'pending')->count() }}</div>
                    <div class="label">Menunggu</div>
                </div>
                <div class="stat-card">
                    <div class="number">{{ $karya->where('status', 'rejected')->count() }}</div>
                    <div class="label">Ditolak</div>
                </div>
            </div>

            <div class="karya-grid">
                @foreach ($karya as $item)
                    <div class="karya-card">
                        @if ($item->gambar && file_exists(storage_path('app/public/' . $item->gambar)))
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="karya-image">
                        @else
                            <div class="karya-image" style="display: flex; align-items: center; justify-content: center; background: #E0E0E0;">
                                <i class="ri-image-line" style="font-size: 40px; color: #999;"></i>
                            </div>
                        @endif
                        
                        <div class="karya-content">
                            <h3 class="karya-title">{{ $item->judul }}</h3>
                            
                            @if ($item->deskripsi)
                                <p class="karya-desc">{{ $item->deskripsi }}</p>
                            @endif
                            
                            <div class="karya-footer">
                                <span>{{ $item->created_at->format('d M Y') }}</span>
                                <span class="status-badge status-{{ $item->status }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </div>
                            
                            <div class="karya-actions">
                                <button class="btn-action btn-view" onclick="viewDetail('{{ $item->id }}')">
                                    <i class="ri-eye-line"></i> Lihat
                                </button>
                                <form action="{{ route('karya.destroy', $item->id) }}" method="POST" style="flex: 1;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" onclick="return confirm('Yakin ingin menghapus karya ini?')" style="width: 100%;">
                                        <i class="ri-delete-bin-line"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="ri-image-add-line"></i>
                </div>
                <h2>Belum Ada Karya</h2>
                <p>Anda belum mengupload karya seni apapun. Mulai bagikan karya terbaik Anda!</p>
                <a href="{{ route('karya.create') }}" class="btn-empty">
                    <i class="ri-upload-cloud-2-line"></i> Upload Karya Pertama
                </a>
            </div>
        @endif
    </div>

    <script>
        function viewDetail(id) {
            // TODO: Implement detail view modal or page
            alert('Detail view akan segera tersedia!');
        }
    </script>
</body>
</html>
