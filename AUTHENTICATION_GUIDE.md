## 📋 Dokumentasi Flow Login Multi-Role - SumbawaArt

Dokumentasi lengkap sistem login multi-role (Seniman & Admin) untuk Portal Karya Seniman Budaya Sumbawa.

---

### ✅ Struktur yang Telah Dibuat

#### 1. **Database Migration** (`database/migrations/0001_01_01_000000_create_users_table.php`)
```php
// Kolom role ditambahkan dengan enum
$table->enum('role', ['seniman', 'admin'])->default('seniman');
```

#### 2. **Middleware** (`app/Http/Middleware/RoleMiddleware.php`)
- Menerima parameter role (seniman/admin)
- Validasi user authenticated dan memiliki role yang sesuai
- Redirect ke dashboard sesuai role jika tidak sesuai

#### 3. **Controller** (`app/Http/Controllers/AuthController.php`)
**Method:**
- `showLoginForm()` - Tampilkan halaman login
- `login()` - Proses autentikasi multi-role
- `logout()` - Logout user

**Flow Login:**
1. Validasi email, password, role
2. Cek user berdasarkan email
3. Verifikasi password dengan Hash
4. Validasi role user sesuai pilihan
5. Login dan redirect ke dashboard

#### 4. **Routes** (`routes/web.php`)
```
GET  /              → Home (public)
GET  /login         → Tampil form login (guest only)
POST /login         → Proses login
POST /logout        → Logout
GET  /dashboard-seniman  → Dashboard Seniman (auth + role:seniman)
GET  /dashboard-admin    → Dashboard Admin (auth + role:admin)
```

#### 5. **Views**

**Login Page** (`resources/views/auth/login.blade.php`)
- Input: Email, Password, Radio Role (Seniman/Admin)
- Styling: Custom CSS dengan gradient dan hover effects
- Error handling & success messages

**Dashboard Seniman** (`resources/views/dashboard/seniman.blade.php`)
- Placeholder fitur: Upload Karya, Status, Profil, Pesan, Analitik, Pengaturan
- Design: Card-based grid dengan hover effects
- Navbar dengan user info dan logout button

**Dashboard Admin** (`resources/views/dashboard/admin.blade.php`)
- Stats cards: Seniman terdaftar, Karya, Pending, Pengunjung
- Placeholder fitur: Verifikasi, Kelola Seniman, Galeri, Kategori, Laporan, Pengaturan
- Design: Admin-themed dengan warna merah (#FF6B6B)

#### 6. **Model** (`app/Models/User.php`)
- Tambahkan 'role' di $fillable array

#### 7. **Bootstrap Config** (`bootstrap/app.php`)
```php
$middleware->alias([
    'role' => RoleMiddleware::class,
]);
```

---

### 🚀 Cara Menggunakan

#### Setup Awal
```bash
# 1. Jalankan migration
php artisan migrate

# 2. Buat test user (optional)
php artisan tinker
# Di dalam tinker:
App\Models\User::create([
    'name' => 'John Seniman',
    'email' => 'seniman@test.com',
    'password' => Hash::make('password123'),
    'role' => 'seniman'
]);

App\Models\User::create([
    'name' => 'Admin User',
    'email' => 'admin@test.com',
    'password' => Hash::make('password123'),
    'role' => 'admin'
]);
```

#### Testing Flow
1. **Akses `/login`** → Tampil form dengan pilihan role
2. **Login sebagai Seniman:**
   - Email: seniman@test.com
   - Password: password123
   - Role: Seniman
   - Redirect: `/dashboard-seniman`

3. **Login sebagai Admin:**
   - Email: admin@test.com
   - Password: password123
   - Role: Admin
   - Redirect: `/dashboard-admin`

4. **Try akses ke role lain:**
   - Jika Seniman coba akses `/dashboard-admin` → Redirect ke `/dashboard-seniman`
   - Jika Admin coba akses `/dashboard-seniman` → Redirect ke `/dashboard-admin`

---

### 🔐 Security Features

✅ **Password Hashing** - Menggunakan bcrypt via Laravel's Hash
✅ **Email Unique** - Duplicate email tidak diizinkan
✅ **Role Validation** - Server-side validasi role
✅ **Auth Check** - Middleware menjamin user authenticated
✅ **Session Management** - Automatic session invalidate pada logout
✅ **CSRF Protection** - @csrf di semua form

---

### 📝 Customization

**Tambah Role Baru:**
1. Update migration enum: `$table->enum('role', ['seniman', 'admin', 'new_role'])`
2. Tambah route baru dengan middleware `role:new_role`
3. Buat controller & view untuk role baru

**Update Styling:**
- Edit bagian `<style>` di view files
- Atau buat CSS files terpisah di `public/asset/css/`

**Tambah Kolom User:**
1. Buat migration baru: `php artisan make:migration add_column_to_users`
2. Update $fillable di User model

---

### 📚 File Checklist

- ✅ `database/migrations/0001_01_01_000000_create_users_table.php` - Migration update
- ✅ `app/Http/Middleware/RoleMiddleware.php` - Middleware baru
- ✅ `app/Http/Controllers/AuthController.php` - Controller baru
- ✅ `routes/web.php` - Routes update
- ✅ `resources/views/auth/login.blade.php` - Login view baru
- ✅ `resources/views/dashboard/seniman.blade.php` - Seniman dashboard baru
- ✅ `resources/views/dashboard/admin.blade.php` - Admin dashboard baru
- ✅ `app/Models/User.php` - Model update
- ✅ `bootstrap/app.php` - Middleware registration
- ✅ `app/Providers/AppServiceProvider.php` - Service provider import

---

### 🎯 Flow Diagram

```
PUBLIC (/)
    ↓
GUEST LOGIN (/login)
    ↓
SELECT ROLE (Seniman / Admin)
    ↓
VALIDATE EMAIL & PASSWORD
    ↓
CHECK ROLE MATCH
    ├─ SENIMAN → /dashboard-seniman (protected)
    └─ ADMIN   → /dashboard-admin (protected)
        ↓
    LOGOUT (/logout)
        ↓
    BACK TO HOME
```

---

### ⚠️ Notes

1. **Password Hashing**: Pastikan menggunakan `Hash::make()` saat create user
2. **Migration**: Jalankan `php artisan migrate` sebelum testing
3. **Session**: Default session lifetime bisa di-update di `config/session.php`
4. **CSRF**: Selalu include `@csrf` di form POST
5. **Remember Me**: Bisa ditambahkan dengan menambah `remember` checkbox di form login

---

### 🐛 Troubleshooting

**404 pada route login:**
- Pastikan routes sudah di-reload: Clear route cache `php artisan route:clear`

**Middleware tidak bekerja:**
- Cek bootstrap/app.php middleware alias registration
- Pastikan import RoleMiddleware di bootstrap/app.php

**Login gagal:**
- Cek user exist: `php artisan tinker` → `App\Models\User::all()`
- Verify password dengan: `Hash::check('password', user()->password)`

**Redirect infinite loop:**
- Cek route logic di AuthController login method
- Pastikan role value sesuai: 'seniman' atau 'admin' (lowercase)

---

**Developed for SumbawaArt Platform** | Laravel 11
