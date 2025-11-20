## 📋 Panduan Mengubah Role ke Admin

Sistem login SumbawaArt dirancang dengan security tinggi:
- **Semua pendaftar baru otomatis menjadi "Seniman"**
- **Hanya Admin yang dapat diatur manual di database**

### ✅ Cara Mengubah User menjadi Admin

#### Metode 1: Menggunakan PHP Artisan Tinker (Recommended)

```bash
php artisan tinker
```

Kemudian jalankan perintah berikut:

```php
// Cari user berdasarkan email
$user = App\Models\User::where('email', 'seniman@test.com')->first();

// Ubah role menjadi admin
$user->update(['role' => 'admin']);

// Atau gunakan ini untuk perubahan langsung
$user->role = 'admin';
$user->save();

// Verifikasi perubahan
$user->refresh();
dd($user->role); // akan menampilkan 'admin'
```

#### Metode 2: Menggunakan Database Client (phpMyAdmin/HeidiSQL)

1. Buka database client (phpMyAdmin atau Laragon UI)
2. Buka tabel `users`
3. Cari user yang ingin diubah
4. Ubah nilai kolom `role` dari `seniman` menjadi `admin`
5. Klik Update/Save

#### Metode 3: Update Multiple Users Sekaligus (SQL Query)

```sql
-- Ubah user tertentu berdasarkan email
UPDATE users SET role = 'admin' WHERE email = 'admin@test.com';

-- Ubah beberapa user sekaligus
UPDATE users SET role = 'admin' WHERE email IN ('user1@test.com', 'user2@test.com');
```

---

### 🔍 Cara Verifikasi Role User

#### Via Tinker:
```php
php artisan tinker
$user = App\Models\User::where('email', 'user@test.com')->first();
echo $user->role; // Akan menampilkan 'seniman' atau 'admin'
```

#### Via Database Client:
1. Buka tabel `users`
2. Lihat kolom `role` untuk setiap user

---

### 📊 Status User Saat Ini

Untuk melihat semua user dan rolenya:

```php
php artisan tinker
App\Models\User::all(['id', 'name', 'email', 'role']); // Tampilkan tabel
```

---

### ⚠️ Keamanan

**Mengapa role hanya bisa diubah di database?**

1. **Mencegah User Self-Elevation**: User tidak bisa mendaftar sebagai admin
2. **Control Akses**: Hanya administrator yang bisa mengubah role
3. **Audit Trail**: Perubahan role terdata di database (jika ada logging)
4. **Prevent Abuse**: Melindungi dari serangan privilege escalation

---

### 🎯 Workflow Aman

```
┌─────────────────────────────────────────┐
│ User Mendaftar di Website               │
│ (Role otomatis = 'seniman')             │
└────────────────┬────────────────────────┘
                 │
                 ▼
┌─────────────────────────────────────────┐
│ Admin Verifikasi Identitas (Manual)     │
└────────────────┬────────────────────────┘
                 │
                 ▼
        ┌─────────────────┐
        │ Apakah Admin?   │
        └────┬─────────┬──┘
             │         │
        (Ya) │         │ (Tidak)
             │         │
             ▼         ▼
      [Set Admin]  [Tetap Seniman]
      di Database
```

---

### 💡 Tips

- Selalu verify user identity sebelum mengubah ke admin
- Gunakan email confirmation untuk pendaftaran
- Catat siapa yang mengubah role dan kapan
- Regular audit terhadap admin users

---

**Developed for SumbawaArt Platform** | Security First
