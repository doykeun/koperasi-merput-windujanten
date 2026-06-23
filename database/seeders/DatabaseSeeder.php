<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Produk;
use App\Models\Berita;
use App\Models\ProfilKoperasi;
use App\Models\StrukturOrganisasi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
        ]);

        // Seed Profil Koperasi
        ProfilKoperasi::updateOrCreate(
            ['id' => 1],
            [
                'nama_koperasi' => 'Koperasi Merah Putih Desa Windujanten',
                'nik' => 'AHU-0013179.AH01.29',
                'nib' => '1806250085859',
                'npwp' => '1000 0000 0290 5788',
                'jenis_koperasi' => 'Serba Usaha'
            ]
        );

        // Seed Struktur Organisasi
        StrukturOrganisasi::insert([
            ['nama' => 'Oka Komarudin', 'jabatan' => 'Ketua', 'foto' => null, 'urutan' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Oktaviana Fatma Novita', 'jabatan' => 'Sekretaris', 'foto' => null, 'urutan' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Anjar Rohmulyono', 'jabatan' => 'Bendahara', 'foto' => null, 'urutan' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Angga Oktaprayuda', 'jabatan' => 'Wakil Ketua Bidang Usaha', 'foto' => null, 'urutan' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Wahab Husaini Gabra', 'jabatan' => 'Wakil Ketua Bidang Anggota', 'foto' => null, 'urutan' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Rohman Hidayat, SH', 'jabatan' => 'Ketua Pengawas', 'foto' => null, 'urutan' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Suparni, S.Pd.I', 'jabatan' => 'Anggota Pengawas', 'foto' => null, 'urutan' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Uus Kusmana', 'jabatan' => 'Anggota Pengawas', 'foto' => null, 'urutan' => 8, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seed Categories
        $categories = Category::insert([
            ['name' => 'Sembako', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Minuman', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Makanan Ringan', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $categoryIds = Category::pluck('id');

        // Seed Produk
        Produk::insert([
            [
                'nama_produk' => 'Beras Premium 5kg',
                'harga' => 75000,
                'stok' => 15,
                'deskripsi' => 'Beras premium berkualitas tinggi',
                'category_id' => $categoryIds[0],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_produk' => 'Minyak Goreng 1L',
                'harga' => 18000,
                'stok' => 2,
                'deskripsi' => 'Minyak goreng sehat',
                'category_id' => $categoryIds[0],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_produk' => 'Indomie Goreng',
                'harga' => 3500,
                'stok' => 10,
                'deskripsi' => 'Mie goreng favorit',
                'category_id' => $categoryIds[2],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_produk' => 'Le Mineral',
                'harga' => 5000,
                'stok' => 0,
                'deskripsi' => 'Air mineral segar',
                'category_id' => $categoryIds[1],
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // Seed Berita
        Berita::insert([
            [
                'judul' => 'Promo Bulanan Koperasi',
                'isi' => 'Kami mengadakan promo khusus untuk anggota koperasi. Dapatkan diskon hingga 20% untuk produk sembako!',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'Pengumuman Rapat Anggota',
                'isi' => 'Mohon diinformasikan bahwa rapat anggota koperasi akan diadakan pada tanggal 25 Juni 2025 pukul 19.00 WIB.',
                'created_at' => now()->subDays(2),
                'updated_at' => now()
            ],
        ]);
    }
}
