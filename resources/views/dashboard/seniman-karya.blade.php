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
            margin-bottom: 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .page-header-content {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .btn-back {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: #F0F0F0;
            color: #1C1C1C;
            text-decoration: none;
            font-size: 20px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-back:hover {
            background: #E0E0E0;
            transform: translateX(-4px);
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

        .success-message {
            background: #D4EDDA;
            color: #155724;
            padding: 12px 14px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid #28A745;
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
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
            border: 2px solid #F3EE62;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .img-thumbnail:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(243, 238, 98, 0.3);
            border-color: #E8D5C4;
        }

        .img-placeholder {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1C1C1C;
            font-size: 32px;
            border: 2px solid #F3EE62;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
            transition: all 0.3s ease;
        }

        .img-placeholder:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(243, 238, 98, 0.3);
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

        .feedback-text {
            font-size: 12px;
            color: #666;
            margin-top: 4px;
            font-style: italic;
        }

        .jenis-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            background: #E3F2FD;
            color: #1565C0;
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

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 12px 8px;
            }

            .img-thumbnail, .img-placeholder {
                width: 50px;
                height: 50px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <div class="page-header-content">
                <a href="{{ route('dashboard-seniman') }}" class="btn-back" title="Kembali ke Dashboard">
                    <i class="ri-arrow-left-line"></i>
                </a>
                <h1>Karya Saya</h1>
            </div>
            <a href="{{ route('karya.create') }}" class="btn-upload">
                <i class="ri-upload-cloud-2-line"></i> Upload Karya
            </a>
        </div>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if ($karya->count() > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 8%;">Gambar</th>
                            <th style="width: 20%;">Nama Karya</th>
                            <th style="width: 12%;">Jenis</th>
                            <th style="width: 15%;">Tanggal Upload</th>
                            <th style="width: 15%;">Status</th>
                            <th style="width: 30%;">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karya as $item)
                            <tr>
                                <td>
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="img-thumbnail" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="img-placeholder" style="display: none;">
                                            <i class="ri-image-line"></i>
                                        </div>
                                    @else
                                        <div class="img-placeholder">
                                            <i class="ri-image-line"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $item->nama }}</strong>
                                    @if ($item->deskripsi)
                                        <div style="font-size: 12px; color: #666; margin-top: 4px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            {{ $item->deskripsi }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <span class="jenis-badge">
                                        @if ($item->jenis === 'budaya')
                                            Budaya
                                        @elseif ($item->jenis === 'tari')
                                            Tari
                                        @else
                                            Teater
                                        @endif
                                    </span>
                                </td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>
                                    <span class="status-badge status-{{ $item->status }}">
                                        @if ($item->status === 'pending')
                                            Menunggu
                                        @elseif ($item->status === 'terima')
                                            Diterima
                                        @elseif ($item->status === 'tolak')
                                            Ditolak
                                        @else
                                            Revisi
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    @if ($item->feedback)
                                        <div class="feedback-text">
                                            <strong>Masukan:</strong> {{ $item->feedback }}
                                        </div>
                                    @else
                                        <span style="color: #999; font-size: 12px;">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="ri-image-add-line"></i>
                </div>
                <h2>Belum Ada Karya</h2>
                <p>Anda belum mengupload karya apapun. Mulai bagikan karya Anda sekarang!</p>
                <a href="{{ route('karya.create') }}" class="btn-empty">
                    <i class="ri-upload-cloud-2-line"></i> Upload Karya
                </a>
            </div>
        @endif
    </div>
</body>
</html>
