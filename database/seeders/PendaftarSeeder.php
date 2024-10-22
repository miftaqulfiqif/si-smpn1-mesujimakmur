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
            'nama' => 'Siswa6',
            'nisn' => '1234983475385',
            'nik' => '123456789324456',
            'tempat_lahir' => 'Jakarta',
            'tgl_lahir' => '2000-01-01',
            'jenis_kelamin' => 'Laki-laki',
            'jml_saudara' => 1,
            'anak_ke' => 1,
            'no_hp' => '081234567890',
            'kebutuhan_khusus' => 'Tidak',
            'email' => 'siswa6@example.com',
            'id_user' => $id_user,
            'id_periode' => $id_periode
        ]);
    }
}
