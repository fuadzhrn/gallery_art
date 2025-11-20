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
            margin-bottom: 30px;
        }

        .page-header {
            margin-bottom: 30px;
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

        .page-header-content {
            flex: 1;
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
            border-radius: 6px;
            background: #E0E0E0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .img-thumbnail:hover {
            transform: scale(1.05);
        }

        .img-placeholder {
            width: 60px;
            height: 60px;
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

        .actions-column {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-sm {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .btn-terima {
            background: #D4EDDA;
            color: #155724;
        }

        .btn-terima:hover {
            background: #C3E6CB;
        }

        .btn-revisi {
            background: #D1ECF1;
            color: #0C5460;
        }

        .btn-revisi:hover {
            background: #BEE5EB;
        }

        .btn-tolak {
            background: #F8D7DA;
            color: #721C24;
        }

        .btn-tolak:hover {
            background: #F5C6CB;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal.active {
            display: block;
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 0;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            padding: 20px;
            background: #F9F9F9;
            border-bottom: 1px solid #E0E0E0;
            border-radius: 12px 12px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h2 {
            font-size: 18px;
            margin: 0;
        }

        .close {
            font-size: 28px;
            font-weight: bold;
            color: #999;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .close:hover {
            color: #1C1C1C;
        }

        .modal-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #E0E0E0;
            border-radius: 6px;
            font-family: 'Montserrat', sans-serif;
            font-size: 13px;
            min-height: 100px;
            resize: vertical;
        }

        .form-group textarea:focus {
            outline: none;
            border-color: #F3EE62;
            box-shadow: 0 0 0 3px rgba(243, 238, 98, 0.1);
        }

        .modal-footer {
            padding: 16px 20px;
            background: #F9F9F9;
            border-top: 1px solid #E0E0E0;
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            border-radius: 0 0 12px 12px;
        }

        .btn-modal {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-modal-cancel {
            background: #E0E0E0;
            color: #1C1C1C;
        }

        .btn-modal-cancel:hover {
            background: #D0D0D0;
        }

        .btn-modal-submit {
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
            color: #1C1C1C;
        }

        .btn-modal-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 12px rgba(243, 238, 98, 0.3);
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

        @media (max-width: 768px) {
            .filter-card {
                flex-direction: column;
                align-items: stretch;
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

            .actions-column {
                flex-direction: column;
            }

            .btn-sm {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <a href="{{ route('dashboard-admin') }}" class="btn-back" title="Kembali ke Dashboard">
                <i class="ri-arrow-left-line"></i>
            </a>
            <div class="page-header-content">
                <h1>Manajemen Karya</h1>
                <p>Kelola dan verifikasi karya seni dari seniman</p>
            </div>
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
                    <option value="pending">Menunggu</option>
                    <option value="terima">Diterima</option>
                    <option value="revisi">Revisi</option>
                    <option value="tolak">Ditolak</option>
                </select>
            </div>
        </div>

        @if ($allKarya->count() > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 8%;">Gambar</th>
                            <th style="width: 18%;">Nama Karya</th>
                            <th style="width: 15%;">Seniman</th>
                            <th style="width: 12%;">Status</th>
                            <th style="width: 12%;">Tanggal</th>
                            <th style="width: 35%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allKarya as $item)
                            <tr class="karya-row" data-status="{{ $item->status }}" data-id="{{ $item->id }}">
                                <td>
                                    @if ($item->gambar && file_exists(storage_path('app/public/' . $item->gambar)))
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="img-thumbnail" onclick="viewImage('{{ asset('storage/' . $item->gambar) }}')">
                                    @else
                                        <div class="img-placeholder">
                                            <i class="ri-image-line"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $item->nama }}</strong>
                                    <div style="font-size: 11px; color: #999; margin-top: 4px;">
                                        {{ ucfirst($item->jenis) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="seniman-name">{{ $item->user->name }}</div>
                                    <div class="seniman-email">{{ $item->user->email }}</div>
                                </td>
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
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="actions-column">
                                        <button class="btn-sm btn-terima" onclick="submitStatus('{{ $item->id }}', 'terima', null)">
                                            <i class="ri-check-line"></i> Terima
                                        </button>
                                        <button class="btn-sm btn-revisi" onclick="openRevisiModal('{{ $item->id }}')">
                                            <i class="ri-edit-line"></i> Revisi
                                        </button>
                                        <button class="btn-sm btn-tolak" onclick="submitStatus('{{ $item->id }}', 'tolak', null)">
                                            <i class="ri-close-line"></i> Tolak
                                        </button>
                                    </div>
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
                    <p>Belum ada karya seni yang perlu diverifikasi.</p>
                </div>
            </div>
        @endif
    </div>

    <!-- Modal untuk Revisi -->
    <div id="revisiModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Masukan Revisi</h2>
                <span class="close" onclick="closeRevisiModal()">&times;</span>
            </div>
            <form id="revisiForm" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="feedback">Masukan untuk Seniman:</label>
                        <textarea id="feedback" name="feedback" placeholder="Tuliskan masukan atau perbaikan yang diperlukan..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal btn-modal-cancel" onclick="closeRevisiModal()">Batal</button>
                    <button type="submit" class="btn-modal btn-modal-submit">Kirim Revisi</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal untuk Lihat Gambar -->
    <div id="imageModal" class="modal" onclick="closeImageModal()">
        <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
            <img id="modalImage" src="" alt="Preview" style="max-width: 90%; max-height: 90%; border-radius: 8px;">
        </div>
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

        function openRevisiModal(karyaId) {
            const modal = document.getElementById('revisiModal');
            const form = document.getElementById('revisiForm');
            form.action = `/karya/${karyaId}/status`;
            document.getElementById('feedback').value = '';
            modal.classList.add('active');
        }

        function closeRevisiModal() {
            document.getElementById('revisiModal').classList.remove('active');
        }

        function submitStatus(karyaId, status, feedback) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/karya/${karyaId}/status`;
            
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                            document.querySelector('input[name="_token"]')?.value;
            
            form.innerHTML = `
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="status" value="${status}">
                <input type="hidden" name="feedback" value="${feedback || ''}">
            `;
            
            document.body.appendChild(form);
            form.submit();
        }

        function viewImage(src) {
            document.getElementById('modalImage').src = src;
            document.getElementById('imageModal').classList.add('active');
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.remove('active');
        }

        // Close modal ketika klik di luar
        window.onclick = function(event) {
            const revisiModal = document.getElementById('revisiModal');
            const imageModal = document.getElementById('imageModal');
            if (event.target == imageModal) {
                imageModal.classList.remove('active');
            }
        }

        // Handle form submission untuk revisi
        document.getElementById('revisiForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const feedback = document.getElementById('feedback').value;
            
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = this.action;
            form.innerHTML = `
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="status" value="revisi">
                <input type="hidden" name="feedback" value="${feedback}">
            `;
            
            document.body.appendChild(form);
            form.submit();
        });
    </script>
</body>
</html>
