<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'nama_petugas' => 'Rian Muhammad',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'telp' => '089682941333',
            'level' => 'admin'
        ]);
        User::create([
            'nama_petugas' => 'Muhammad Alif',
            'username' => 'alif',
            'password' => bcrypt('password'),
            'telp' => '089682941330',
            'level' => 'masyarakat'
        ]);
        Masyarakat::create([
            'nik' => '0010020030040001',
            'nama' => 'Muhammad Alif',
            'username' => 'alif',
            'password' => bcrypt('password'),
            'telp' => '089682941330',
        ]);
        Pengaduan::create([
            'nik' => '0010020030001',
            'id_masyarakat' => 1,
            'tgl_pengaduan' => now(),
            'isi_laporan' => "lorem ipsum",
            'foto' => 'img.jpg',
            'status' => '0',
        ]);
    }
}
