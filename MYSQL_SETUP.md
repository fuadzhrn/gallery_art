# 📋 Setup MySQL untuk SumbawaArt

## ✅ Langkah-Langkah Setup:

### 1. Pastikan MySQL Server Running
- Buka **Laragon**
- Klik tombol **Start All** (atau start MySQL saja)
- Pastikan MySQL status: **Running** (warna hijau)

### 2. Buat Database Baru
Buka **HeidiSQL** (dari Laragon) atau **phpMyAdmin**:

**Via HeidiSQL:**
```sql
CREATE DATABASE galery_art;
```

**Via phpMyAdmin:**
1. Buka `http://localhost/phpmyadmin`
2. Klik "New"
3. Database name: `galery_art`
4. Klik "Create"

### 3. Jalankan Migrations
```bash
cd d:\laragon\laragon\www\galery_art
php artisan migrate:fresh --seed
```

**Output yang diharapkan:**
```
Migration name ...................................... Batch / Status
0001_01_01_000000_create_users_table ............... [1] Ran
0001_01_01_000001_create_cache_table .............. [1] Ran
0001_01_01_000002_create_jobs_table ............... [1] Ran
2025_11_19_130000_update_user_roles ............... [1] Ran

Database seeding completed successfully.
```

### 4. Verifikasi Data di Database
Buka **HeidiSQL** atau **phpMyAdmin**:
- Database: `galery_art`
- Table: `users`
- Harus ada 2 user:
  - John Seniman (seniman@test.com) - role: seniman
  - Admin User (admin@test.com) - role: admin

### 5. Test Aplikasi
Buka browser: `http://localhost/galery_art/login`

**Test Login:**
- **Seniman**: seniman@test.com / password123
- **Admin**: admin@test.com / password123

---

## 🔧 Jika Error:

### Error: "Access denied for user 'root'@'localhost'"
**Solusi:** Password MySQL tidak kosong, update `.env`:
```
DB_PASSWORD=your_mysql_password
```

### Error: "SQLSTATE[HY000]: General error"
**Solusi:** 
1. Pastikan MySQL running
2. Pastikan database `galery_art` sudah dibuat
3. Cek credentials di `.env`

### Error: "No such file or directory"
**Solusi:** Pastikan sudah di folder project:
```bash
cd d:\laragon\laragon\www\galery_art
```

---

## ✨ MySQL vs SQLite

| Aspek | SQLite | MySQL |
|-------|--------|-------|
| Setup | Instant (no config) | Perlu setup server |
| Performance | Baik untuk dev | Production-ready |
| Scalability | Terbatas | Unlimited |
| File Size | Satu file | Server database |
| Development | Cepat | Sedikit lebih ribet |

---

**File yang sudah diupdate:**
- ✅ `.env` - Database connection settings

Jalankan migration sekarang! 🚀
