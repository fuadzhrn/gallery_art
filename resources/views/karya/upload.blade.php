<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Karya - SumbawaArt</title>
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
            max-width: 700px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .upload-card {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }

        .upload-header {
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

        .upload-header-content {
            flex: 1;
        }

        .upload-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .upload-header p {
            font-size: 14px;
            color: #666;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #1C1C1C;
            margin-bottom: 8px;
            letter-spacing: 0.3px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #E0E0E0;
            border-radius: 6px;
            font-size: 14px;
            font-family: 'Montserrat', sans-serif;
            transition: all 0.3s ease;
            background-color: white;
        }

        .form-group select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%231C1C1C' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
            cursor: pointer;
        }

        .form-group select:hover {
            border-color: #F3EE62;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #F3EE62;
            box-shadow: 0 0 0 3px rgba(243, 238, 98, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .file-upload {
            position: relative;
            border: 2px dashed #F3EE62;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload:hover {
            background: rgba(243, 238, 98, 0.05);
        }

        .file-upload input[type="file"] {
            display: none;
        }

        .file-upload-icon {
            font-size: 40px;
            color: #F3EE62;
            margin-bottom: 12px;
        }

        .file-upload p {
            font-size: 14px;
            color: #666;
            margin: 8px 0;
        }

        .file-upload p strong {
            color: #1C1C1C;
            font-weight: 600;
        }

        .file-name {
            font-size: 12px;
            color: #F3EE62;
            margin-top: 12px;
            font-weight: 500;
        }

        .preview {
            margin-top: 16px;
            text-align: center;
        }

        .preview img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 8px;
            margin-top: 12px;
        }

        .error-message {
            color: #E53935;
            font-size: 12px;
            margin-top: 6px;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
        }

        .btn-submit {
            background: linear-gradient(135deg, #F3EE62 0%, #E8D5C4 100%);
            color: #1C1C1C;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(243, 238, 98, 0.3);
        }

        .btn-cancel {
            background: #E0E0E0;
            color: #1C1C1C;
        }

        .btn-cancel:hover {
            background: #D0D0D0;
        }

        .alert {
            padding: 12px 14px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 500;
            border-left: 4px solid;
        }

        .alert-danger {
            background: #FFEBEE;
            color: #C62828;
            border-left-color: #E53935;
        }

        .alert-info {
            background: #E3F2FD;
            color: #1565C0;
            border-left-color: #1976D2;
        }

        @media (max-width: 768px) {
            .upload-card {
                padding: 24px;
            }

            .upload-header h1 {
                font-size: 22px;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="upload-card">
            <div class="upload-header">
                <a href="{{ route('dashboard-seniman') }}" class="btn-back" title="Kembali">
                    <i class="ri-arrow-left-line"></i>
                </a>
                <div class="upload-header-content">
                    <h1>Upload Karya</h1>
                    <p>Bagikan karya seni Anda</p>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="alert alert-info">
                <i class="ri-information-line"></i> Maksimal ukuran gambar 5MB. Format: JPG, PNG, GIF
            </div>

            <form action="{{ route('karya.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nama">Nama Karya <span style="color: #E53935;">*</span></label>
                    <input 
                        type="text" 
                        id="nama" 
                        name="nama" 
                        placeholder="Masukkan nama karya"
                        value="{{ old('nama') }}"
                        required
                    >
                    @error('nama')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis">Jenis Karya <span style="color: #E53935;">*</span></label>
                    <select id="jenis" name="jenis" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="budaya" {{ old('jenis') == 'budaya' ? 'selected' : '' }}>Seni Budaya</option>
                        <option value="tari" {{ old('jenis') == 'tari' ? 'selected' : '' }}>Seni Tari</option>
                        <option value="teater" {{ old('jenis') == 'teater' ? 'selected' : '' }}>Seni Teater</option>
                    </select>
                    @error('jenis')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi Karya</label>
                    <textarea 
                        id="deskripsi" 
                        name="deskripsi" 
                        placeholder="Ceritakan tentang karya Anda (opsional)"
                        maxlength="1000"
                    >{{ old('deskripsi') }}</textarea>
                    <div style="font-size: 12px; color: #999; margin-top: 6px;">
                        <span id="charCount">0</span>/1000 karakter
                    </div>
                    @error('deskripsi')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                    @error('jenis')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar Karya <span style="color: #E53935;">*</span></label>
                    <div class="file-upload" onclick="document.getElementById('gambar').click();">
                        <div class="file-upload-icon">
                            <i class="ri-image-add-line"></i>
                        </div>
                        <p>Klik atau drag gambar di sini</p>
                        <p style="font-size: 12px; color: #999;">JPG, PNG, GIF (Max 5MB)</p>
                        <input 
                            type="file" 
                            id="gambar" 
                            name="gambar" 
                            accept="image/jpeg,image/png,image/gif"
                            required
                        >
                        <div class="file-name" id="fileName"></div>
                    </div>
                    <div class="preview" id="preview"></div>
                    @error('gambar')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-submit">
                        <i class="ri-upload-cloud-2-line"></i> Upload
                    </button>
                    <a href="{{ route('dashboard-seniman') }}" class="btn btn-cancel">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // File upload preview
        const fileInput = document.getElementById('gambar');
        const fileName = document.getElementById('fileName');
        const preview = document.getElementById('preview');

        fileInput.addEventListener('change', function(e) {
            const file = this.files[0];
            
            if (file) {
                fileName.textContent = file.name;
                
                // Show image preview
                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.innerHTML = `<img src="${event.target.result}" alt="Preview">`;
                };
                reader.readAsDataURL(file);
            }
        });

        // Character counter untuk deskripsi
        const deskripsiInput = document.getElementById('deskripsi');
        const charCount = document.getElementById('charCount');
        
        deskripsiInput.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });

        // Drag and drop
        const fileUpload = document.querySelector('.file-upload');
        
        fileUpload.addEventListener('dragover', (e) => {
            e.preventDefault();
            fileUpload.style.background = 'rgba(243, 238, 98, 0.1)';
        });
        
        fileUpload.addEventListener('dragleave', () => {
            fileUpload.style.background = '';
        });
        
        fileUpload.addEventListener('drop', (e) => {
            e.preventDefault();
            fileUpload.style.background = '';
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                const event = new Event('change', { bubbles: true });
                fileInput.dispatchEvent(event);
            }
        });
    </script>
</body>
</html>
