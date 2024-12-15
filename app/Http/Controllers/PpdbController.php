<?php

namespace App\Http\Controllers;

use App\Models\DataCalonSiswa;
use App\Models\PeriodeDaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PpdbController extends Controller
{
    
    public function showForm(){
        $user = Auth::user();

        $sekolahPilihan = ['Pilih asal sekolah! ','SDN 1', 'SDN 2', 'SDN 3', 'SDN 4'];

        return view('ppdb.pendaftaran.biodata-siswa', compact('user', 'sekolahPilihan'));
    }

    public function saveBiodataSiswa(Request $request){
        
        try {
            Log::info('Proses penyimpanan biodata siswa dimulai', ['data' => $request->all()]);

            $penerimaKip = $request->penerima_kip === 'ya';

            $daftarSekolahPilihan = ['SDN 1', 'SDN 2', 'SDN 3', 'SDN 4'];
            $zonasi = in_array($request->asal_sekolah, $daftarSekolahPilihan);

            if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
                $fotoPath = $request->file('foto')->store('uploads/foto', 'public');
            } else {
                return back()->withErrors(['foto' => 'File foto tidak valid atau tidak ada']);
            }

            $periodeAktif = PeriodeDaftar::where('status', 'aktif')->first();
        
            if (!$periodeAktif) {
                return back()->withErrors(['periode' => 'Periode aktif tidak ditemukan']);
            }
        
            $request->validate([
                'id_user' => 'required|exists:users,id',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'tempat_lahir' => 'required|string',
                'tgl_lahir' => 'required|date',
                'nik' => 'required|string',
                'asal_sekolah' => 'required|string',
                'alamat' => 'required|string',
                'tinggi_badan' => 'required|string',
                'berat_badan' => 'required|string',
                'kegemaran' => 'required|string',
                'penerima_kip' => 'required|in:ya,tidak',
                'nomor_kip' => 'nullable|string',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'no_telp' => 'required|string',            
            ]);

            DataCalonSiswa::create([
                'id_user' => $request->id_user,
                'id_periode' => $periodeAktif->id,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'nik' => $request->nik,
                'asal_sekolah' => $request->asal_sekolah,
                'alamat' => $request->alamat,
                'tinggi_badan' => $request->tinggi_badan,
                'berat_badan' => $request->berat_badan,
                'kegemaran' => $request->kegemaran,
                'penerima_kip' => $penerimaKip,
                'no_kip' => $request->nomor_kip,
                'foto' => $fotoPath,
                'zonasi' => $zonasi,
                'no_telp' => $request->no_telp,
            ]);

            Log::info('Registrasi berhasil', ['user_id' => $request->id_user]);
            return redirect()->route('ppdb.index')->with('success', 'Registrasi berhasil!');
        } catch (\Exception $e) {
            Log::error('Registrasi gagal', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data']);
        }
    }
}
