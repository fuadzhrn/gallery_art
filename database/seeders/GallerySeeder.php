<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Karya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artworks = [
            [
                'nama' => 'Senja di Samawa',
                'artist' => 'Arman J. Loka',
                'email' => 'arman.loka@example.com',
                'jenis' => 'budaya',
                'gambar_file' => 'seni1.png',
                'deskripsi' => 'Senja di Samawa menampilkan keindahan matahari terbenam di atas kepulauan Sumbawa dengan warna-warna yang memukau, mencerminkan ketenangan dan keindahan alam Sumbawa.',
            ],
            [
                'nama' => 'Tenun Tradisional',
                'artist' => 'Siti Rahma',
                'email' => 'siti.rahma@example.com',
                'jenis' => 'budaya',
                'gambar_file' => 'seni2.png',
                'deskripsi' => 'Tenun Tradisional adalah karya seni yang menampilkan motif-motif tradisional Sumbawa dengan benang-benang berwarna yang indah, merupakan warisan budaya turun temurun.',
            ],
            [
                'nama' => 'Ukiran Budaya',
                'artist' => 'Muhammad Hasan',
                'email' => 'muhammad.hasan@example.com',
                'jenis' => 'budaya',
                'gambar_file' => 'seni3.png',
                'deskripsi' => 'Ukiran Budaya menampilkan keahlian pengukir tradisional Sumbawa dengan detail yang halus dan penuh makna budaya, mengabadikan identitas lokal dalam setiap goresan.',
            ],
            [
                'nama' => 'Harmoni Warna',
                'artist' => 'Dewi Kusuma',
                'email' => 'dewi.kusuma@example.com',
                'jenis' => 'tari',
                'gambar_file' => 'seni4.png',
                'deskripsi' => 'Harmoni Warna menggambarkan gerakan tari tradisional Sumbawa dengan kostum yang penuh warna, menciptakan harmoni visual yang indah dan memukau.',
            ],
            [
                'nama' => 'Gerak Indah',
                'artist' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
                'jenis' => 'tari',
                'gambar_file' => 'seni5.png',
                'deskripsi' => 'Gerak Indah menampilkan keindahan gerakan tari Sumbawa yang penuh ekspresi, menggabungkan tradisi dengan keanggunan dalam setiap gerakan tubuh.',
            ],
            [
                'nama' => 'Cerita Rakyat',
                'artist' => 'Rina Wijaya',
                'email' => 'rina.wijaya@example.com',
                'jenis' => 'teater',
                'gambar_file' => 'seni6.png',
                'deskripsi' => 'Cerita Rakyat adalah representasi visual dari legenda dan cerita rakyat Sumbawa yang disampaikan melalui seni teater dengan sentuhan budaya lokal.',
            ],
            [
                'nama' => 'Refleksi Alam',
                'artist' => 'Ahmad Pratama',
                'email' => 'ahmad.pratama@example.com',
                'jenis' => 'budaya',
                'gambar_file' => 'seni7.png',
                'deskripsi' => 'Refleksi Alam menangkap keindahan panorama alam Sumbawa dengan teknik artistik yang menawan, memperlihatkan hubungan manusia dengan lingkungan alam.',
            ],
            [
                'nama' => 'Identitas Budaya',
                'artist' => 'Lina Suryanto',
                'email' => 'lina.suryanto@example.com',
                'jenis' => 'budaya',
                'gambar_file' => 'seni8.png',
                'deskripsi' => 'Identitas Budaya adalah simbol kuat dari warisan budaya Sumbawa yang menyatukan berbagai elemen tradisional dalam satu karya seni yang bermakna.',
            ],
        ];

        foreach ($artworks as $artwork) {
            // Buat atau dapatkan user seniman
            $user = User::firstOrCreate(
                ['email' => $artwork['email']],
                [
                    'name' => $artwork['artist'],
                    'password' => bcrypt('password123'),
                    'role' => 'seniman',
                ]
            );

            // Copy gambar dari public ke storage/app/public/karya
            $sourceFile = public_path($artwork['gambar_file']);
            $destinationFile = 'karya/' . $artwork['gambar_file'];

            if (file_exists($sourceFile)) {
                $fileContent = file_get_contents($sourceFile);
                Storage::disk('public')->put($destinationFile, $fileContent);
            }

            // Buat karya seni
            Karya::firstOrCreate(
                [
                    'user_id' => $user->id,
                    'nama' => $artwork['nama'],
                ],
                [
                    'jenis' => $artwork['jenis'],
                    'deskripsi' => $artwork['deskripsi'],
                    'gambar' => $destinationFile,
                    'status' => 'terima',
                    'feedback' => null,
                ]
            );
        }

        $this->command->info('✅ Gallery seeder berhasil! 8 karya seni telah ditambahkan ke database dengan status "terima"');
    }
}
