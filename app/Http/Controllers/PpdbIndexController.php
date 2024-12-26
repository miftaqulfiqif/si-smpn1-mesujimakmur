<?php

namespace App\Http\Controllers;

use App\Models\DataCalonSiswa;
use App\Models\DataOrangtua;
use App\Models\NilaiRapot;
use App\Models\PeriodeDaftar;
use App\Models\StatusPendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PpdbIndexController extends Controller
{
    public function showPpdbIndex(Request $request){
        $user = Auth::user();
        $dataCalonSiswa = DataCalonSiswa::where('id_user', $user->id)->first();
        $idDataCalonSiswa = $dataCalonSiswa->id;
        // $idDataCalonSiswa = $request->query('id_data_calon_siswa');
        // $dataCalonSiswa = DataCalonSiswa::findOrFail($idDataCalonSiswa);

        $user = User::where('id', $dataCalonSiswa->id_user)->first();
        $nameSiswa = $user->name;

        $periodeDaftar = PeriodeDaftar::where('id', $dataCalonSiswa->id_periode)->first();

        $statusPendaftaran = StatusPendaftaran::where('id_data_calon_siswa', $dataCalonSiswa->id)->first();

        return view('ppdb.index', compact('idDataCalonSiswa', 'dataCalonSiswa', 'nameSiswa','periodeDaftar', 'statusPendaftaran'));
    }

    public function listRangkingSiswa()
    {
        $periodeDaftar = PeriodeDaftar::where('status', 1)->first();

        if (!$periodeDaftar) {
            return redirect()->back()->with('error', 'Tidak ada periode pendaftaran aktif saat ini.');
        }

        // Mengambil data siswa terdaftar pada periode tersebut
        $siswaTerdaftar = DataCalonSiswa::with(['user', 'nilaiRapot'])
            ->where('id_periode', $periodeDaftar->id)
            ->get()
            ->sortByDesc(function ($siswa){
                return $siswa->nilaiRapot->first()->average;
            });

        // Mengirim data ke view
        return view('ppdb.peringkat', compact('periodeDaftar', 'siswaTerdaftar'));
    }

}
