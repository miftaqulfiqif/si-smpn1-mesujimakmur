<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PeringkatCalonSiswa extends Model
{
    protected $table = 'peringkat_calon_siswa';

    protected $fillable = [
        'id_data_calon_siswa',
        'id_nilai',
        'id_periode'
    ];

    public function dataCalonSiswa()
    {
        return $this->belongsTo(DataCalonSiswa::class, 'id_data_calon_siswa', 'id');
    }

    public function nilaiSiswa()
    {
        return $this->hasMany(NilaiRapot::class, 'id_data_calon_siswa', 'id_data_calon_siswa');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeDaftar::class, 'id_periode', 'id');
    }

    public static function getPeringkat($idDataCalonSiswa)
    {
        $siswa = DataCalonSiswa::where('id', $idDataCalonSiswa)->first();
        $periodeSiswa = PeriodeDaftar::where('id', $siswa->id_periode)->first();
        $statusPendaftaran = StatusPendaftaran::where('id_data_calon_siswa', $idDataCalonSiswa)->first();

        $peringkatSiswa = PeringkatCalonSiswa::with(['dataCalonSiswa.user', 'nilaiSiswa'])
            ->where('id_periode', $periodeSiswa->id)
            ->get()
            ->map(function ($siswa) {
                // Menghitung rata-rata nilai dari semester yang ada
                $rataRataNilai = $siswa->nilaiSiswa->average('average'); // Pastikan kolom 'average' ada pada model NilaiRapot
                return [
                    'id_siswa' => $siswa->dataCalonSiswa->id,
                    'nama_siswa' => $siswa->dataCalonSiswa->user->name,
                    'nisn' => $siswa->dataCalonSiswa->user->nisn,
                    'asal_sekolah' => $siswa->dataCalonSiswa->asal_sekolah,
                    'rata_rata_nilai' => $rataRataNilai,
                    'id_periode' => $siswa->id_periode,
                ];
            })
            ->sortByDesc('rata_rata_nilai'); // Mengurutkan berdasarkan rata-rata nilai

        $peringkat = array_search($idDataCalonSiswa, array_column($peringkatSiswa->toArray(), 'id_siswa')) + 1;

        if (Carbon::now() > $periodeSiswa->end_date) {

            if ($periodeSiswa->kuota > $peringkat) {
                $statusPendaftaran->update([
                    'status' => 'accepted'
                ]);
            } else {
                $statusPendaftaran->update([
                    'status' => 'rejected'
                ]);
            }

            return redirect()->route('ppdb-index');
        }
    }
}
