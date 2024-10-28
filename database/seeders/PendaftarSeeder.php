<?php

namespace Database\Seeders;

use App\Models\Pendaftar;
use App\Models\PeriodeDaftar;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id_periode = PeriodeDaftar::first()->id;
        $id_user = User::first()->id;
        Pendaftar::firstOrCreate([
            'nama' => 'Miftaqul Fiqi Firmansyah',
            'nisn' => '2000018232',
            'nik' => '1237712381',
            'tempat_lahir' => 'Surabaya',
            'tgl_lahir' => '2001-09-21',
            'jenis_kelamin' => 'Laki-laki',
            'jml_saudara' => 1,
            'anak_ke' => 1,
            'no_hp' => '081234567890',
            'kebutuhan_khusus' => 'Tidak',
            'email' => 'maspek6@example.com',
            'id_user' => $id_user,
            'id_periode' => $id_periode
        ]);
    }
}
