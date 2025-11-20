#!/bin/bash
cd d:\laragon\laragon\www\galery_art

# Hapus database lama
if exist database\database.sqlite del database\database.sqlite

# Jalankan migration fresh dengan seed
php artisan migrate:fresh --seed

echo "Database berhasil di-setup!"
echo "Coba login dengan:"
echo "  Seniman: seniman@test.com / password123"
echo "  Admin: admin@test.com / password123"
