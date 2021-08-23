<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr as Randoms;

use App\Models\Artikel;
use App\Models\Login;
use App\Models\Kategori;
use App\Models\ArtikelKategori;
use App\Models\Gambar;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('jancok', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'name' => 'Muh. Fathurrahman',
            'email' => 'fathurwalkers44@gmail.com',
            'username' => 'fathurwalkers',
            'password' => $hashPassword,
            'token' => $hashToken,
            'role' => $role,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ----------------------------------------------------------------------

        $token2 = Str::random(16);
        $role2 = "author";
        $hashPassword2 = Hash::make('sultra1news_author', [
            'rounds' => 12,
        ]);
        $hashToken2 = Hash::make($token2, [
            'rounds' => 12,
        ]);
        Login::create([
            'name' => 'Author Originial',
            'email' => 'author@sultra1news.com',
            'username' => 'sultra1news_author',
            'password' => $hashPassword2,
            'token' => $hashToken2,
            'role' => $role2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ----------------------------------------------------------------------

        $token3 = Str::random(16);
        $role3 = "moderator";
        $hashPassword3 = Hash::make('sultra1news_moderator', [
            'rounds' => 12,
        ]);
        $hashToken3 = Hash::make($token3, [
            'rounds' => 12,
        ]);
        Login::create([
            'name' => 'Moderator Originial',
            'email' => 'moderator@sultra1news.com',
            'username' => 'sultra1news_moderator',
            'password' => $hashPassword3,
            'token' => $hashToken3,
            'role' => $role3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ----------------------------------------------------------------------
        $nama_kategori = [
            'Sultra1News', 'Internasional', 'Nasional', 'Terbaru', 'Advetorial', 'Sulawesi Tenggara', 'Sulawesi Utara', 'Sulawesi Tengah', 'Sulawesi Selatan', 'Sulawesi Barat', 'Jakarta', 'Kota Kendari', 'Kota Baubau', 'Buton', 'Buton Selatan', 'Buton Tengah', 'Buton Utara', 'Pasarwajo', 'Sport', 'Health', 'Tutorial', 'Entertainment', 'Hiburan', 'Games', 'Menarik', 'Viral', 'Trending', 'Hot', 'People', 'Sosial', 'Politik', 'Hukum', 'Kontroversial', 'Kasus', 'Teknologi', 'Event', 'AS Tamrin'
        ];

        foreach ($nama_kategori as $kategori) {
            Kategori::create([
                'kategori_name' => $kategori,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
