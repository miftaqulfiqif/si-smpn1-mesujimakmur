<?php

namespace App\Http\Controllers;

use App\Models\BuktiPembayaran;
use App\Models\DataCalonSiswa;
use App\Models\DataOrangtua;
use App\Models\NilaiRapot;
use App\Models\PeringkatCalonSiswa;
use App\Models\PeriodeDaftar;
use App\Models\PesanKesalahan;
use App\Models\StatusPendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PDO;

class PpdbIndexController extends Controller
{
    public function showPpdbIndex(Request $request){
        $user = Auth::user();
        
        $dataCalonSiswa = DataCalonSiswa::where('id_user', $user->id)->first();
        $idDataCalonSiswa = $dataCalonSiswa->id;
        
        $pesanKesalahan = PesanKesalahan::where('id_data_calon_siswa', $idDataCalonSiswa)->first();

        $user = User::where('id', $dataCalonSiswa->id_user)->first();
        $nameSiswa = $user->name;

        $periodeDaftar = PeriodeDaftar::where('id', $dataCalonSiswa->id_periode)->first();

        $statusPendaftaran = StatusPendaftaran::where('id_data_calon_siswa', $dataCalonSiswa->id)->first();

        if ($statusPendaftaran && $statusPendaftaran->status == 'processing'){
            $peringkatExist = PeringkatCalonSiswa::where('id_data_calon_siswa', $idDataCalonSiswa)->first();

            if (!$peringkatExist) {
                // Ambil nilai siswa yang relevan
                $nilaiSiswa = NilaiRapot::where('id_data_calon_siswa', $idDataCalonSiswa)->first();
                if ($nilaiSiswa) {
                    // Simpan data ke tabel peringkat calon siswa
                    PeringkatCalonSiswa::create([
                        'id_data_calon_siswa' => $idDataCalonSiswa,
                        'id_nilai' => $nilaiSiswa->id,
                        'id_periode' => $dataCalonSiswa->id_periode,
                    ]);
                } else {
                    return redirect()->back()->with('error', 'Nilai siswa tidak ditemukan.');
                }
            }
        }

        return view('ppdb.index', compact('idDataCalonSiswa', 'dataCalonSiswa', 'nameSiswa','periodeDaftar', 'statusPendaftaran', 'pesanKesalahan'));
    }

    public function listRangkingSiswa()
    {
        // Ambil periode yang aktif
        $periodeDaftar = PeriodeDaftar::where('status', 1)->first();

        if (!$periodeDaftar) {
            return redirect()->back()->with('error', 'Tidak ada periode pendaftaran aktif saat ini.');
        }

        // Mengambil data siswa yang terdaftar pada periode tersebut
        $peringkatSiswa = PeringkatCalonSiswa::with(['dataCalonSiswa.user', 'nilaiSiswa'])
            ->where('id_periode', $periodeDaftar->id)
            ->get()
            ->map(function ($siswa) {
                // Menghitung rata-rata nilai dari semester yang ada
                $rataRataNilai = $siswa->nilaiSiswa->average('average'); // Pastikan kolom 'average' ada pada model NilaiRapot
                return [
                    'nama_siswa' => $siswa->dataCalonSiswa->user->name,
                    'nisn' => $siswa->dataCalonSiswa->user->nisn,
                    'asal_sekolah' =>$siswa->dataCalonSiswa->asal_sekolah,
                    'rata_rata_nilai' => $rataRataNilai,
                    'id_periode' => $siswa->id_periode,
                ];
            })
            ->sortByDesc('rata_rata_nilai'); // Mengurutkan berdasarkan rata-rata nilai

        // Mengirim data ke view
        return view('ppdb.peringkat', compact('periodeDaftar', 'peringkatSiswa'));
    }



    public function showFormBayar(){
        $user = Auth::user();
        $calonSiswa = DataCalonSiswa::where('id_user', $user->id)->first();
        $idDataCalonSiswa = $calonSiswa->id;

        return view('ppdb.pendaftaran.bayar-daftar-ulang', compact('calonSiswa', 'idDataCalonSiswa'));
    }

    public function saveBuktiBayar(Request $request)
    {
        $user = Auth::user();

        // Cari data calon siswa berdasarkan user yang sedang login
        $calonSiswa = DataCalonSiswa::where('id_user', $user->id)->first();

        if (!$calonSiswa) {
            return back()->withErrors(['Error' => 'Data calon siswa tidak ditemukan.']);
        }

        // Validasi input
        $request->validate([
            'bukti_bayar' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Validasi file
        ]);

        DB::beginTransaction();

        try {
            $filePath = null;

            // Jika file bukti bayar diunggah
            if ($request->hasFile('bukti_bayar') && $request->file('bukti_bayar')->isValid()) {
                // Simpan file ke direktori 'uploads/bukti_bayar' di penyimpanan publik
                $filePath = $request->file('bukti_bayar')->store('uploads/bukti_bayar', 'public');

                // Cari data pembayaran lama
                $existingData = BuktiPembayaran::where('id_data_calon_siswa', $calonSiswa->id)->first();

                // Hapus file lama jika ada
                if ($existingData && $existingData->bukti_bayar && Storage::exists('public/' . $existingData->bukti_bayar)) {
                    Storage::delete('public/' . $existingData->bukti_bayar);
                }
            }

            // Gunakan updateOrCreate untuk menyimpan data
            BuktiPembayaran::updateOrCreate(
                ['id_data_calon_siswa' => $calonSiswa->id], // Kriteria pencarian
                ['bukti_bayar' => $filePath] // Data yang diupdate atau dibuat
            );

            DB::commit();
            return redirect()->route('ppdb-index')
            ->with('success', 'Dokumen berhasil tersimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error saving payment proof", ['error' => $e->getMessage()]);
            return back()->withErrors(['Error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }

}
