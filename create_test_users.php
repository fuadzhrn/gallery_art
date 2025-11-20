<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';

$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Buat Seniman
User::create([
    'name' => 'John Seniman',
    'email' => 'seniman@test.com',
    'password' => Hash::make('password123'),
    'role' => 'seniman'
]);

// Buat Admin
User::create([
    'name' => 'Admin User',
    'email' => 'admin@test.com',
    'password' => Hash::make('password123'),
    'role' => 'admin'
]);

// Tampilkan semua user
$users = User::all(['id', 'name', 'email', 'role']);
echo "\n=== USER BERHASIL DIBUAT ===\n";
foreach ($users as $user) {
    echo "ID: {$user->id} | Name: {$user->name} | Email: {$user->email} | Role: {$user->role}\n";
}
echo "\n";
