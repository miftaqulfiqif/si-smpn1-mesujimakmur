<?php

namespace App\Http\Controllers;

use App\Models\DataCalonSiswa;
use App\Models\DataOrangtua;
use App\Models\PeriodeDaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Exists;

use function Ramsey\Uuid\v1;

class PpdbController extends Controller
{
    public function showPpdbIndex(){
        return view('ppdb.index');
    }

    public function showForm(){
        $user = Auth::user();
        $biodata = DataCalonSiswa::where('id_user', $user->id)->first();
        $biodata->penerima_kip = $biodata->penerima_kip ? 1 : 0;

        $sekolahPilihan = ['Pilih asal sekolah! ','SDN 1', 'SDN 2', 'SDN 3', 'SDN 4'];

        return view('ppdb.pendaftaran.biodata-siswa', compact('user', 'sekolahPilihan', 'biodata'));
    }

    public function showBiodataOrangtua(){
        return view('ppdb.pendaftaran.biodata-orangtua');
    }

    public function showFormInputNilai(){
        return view('ppdb.pendaftaran.input-nilai');
    }

    public function saveBiodataSiswa(Request $request){

        $request->validate([
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string',
            'tgl_lahir' => 'required|date',
            'nik' => 'required|string',
            'asal_sekolah' => 'required|string',
            'alamat' => 'required|string',
            'tinggi_badan' => 'required|string',
            'berat_badan' => 'required|string',
            'kegemaran' => 'required|string',
            'penerima_kip' => 'required|in:1,0',
            'nomor_kip' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'notelp' => 'required|string',            
        ]);

        DB::beginTransaction();
        try {
            $user = Auth::user();

            $penerimaKip = $request->penerima_kip === '1';

            $daftarSekolahPilihan = ['SDN 1', 'SDN 2', 'SDN 3', 'SDN 4'];
            $zonasi = in_array($request->asal_sekolah, $daftarSekolahPilihan);
            
            $existingData = DataCalonSiswa::where('id_user', $user->id)->first();
            
            $periodeAktif = PeriodeDaftar::where('status', 1)->firstOrFail();
            
            if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
                $fotoPath = $request->file('foto')->store('uploads/foto', 'public');
            } else {
                $fotoPath = $existingData->foto;
            }         

            if ($existingData) {

                DB::table('users')->where('id', $user->id)->update([
                    'name' => $request->name,
                ]);

                $existingData->update([
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
                    'notelp' => $request->notelp,
                ]);
            } else {
                DataCalonSiswa::create([
                    'id_user' => $user->id,
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
                    'notelp' => $request->notelp,
                ]);
            }

            DB::commit();
            return redirect()->route('biodata-orangtua')->with('success', 'Registrasi berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error saving data', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data']);
        }
    }

    public function saveBiodataOrangtua(Request $request) {

        try {
            $request->validate([
                'id_data_calon_siswa' => 'required|exists:data_calon_siswas,id',
                'nama_ayah' => 'required|string',
                'nik_ayah' => 'required|string',
                'tgl_lahir_ayah' => 'required|date',
                'pekerjaan_ayah' => 'required|string',
                'pendidikan_ayah' => 'required|string',
                'penghasilan_ayah' => 'required|string',
                'nama_ibu' => 'required|string',
                'nik_ibu' => 'required|string',
                'tgl_lahir_ibu' => 'required|date',
                'pekerjaan_ibu' => 'required|string',
                'pendidikan_ibu' => 'required|string',
                'penghasilan_ibu' => 'required|string',
            ]);    
            Log::info('Validasi berhasil');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validasi gagal', $e->errors());
            return back()->withErrors($e->errors());
        }
        
        
        Log::info('Request data:', $request->all());

        DB::beginTransaction();
        try {
            $idSiswa = DataCalonSiswa::findOrFail($request->id_data_calon_siswa);

            $existingData = DataOrangtua::where('id_data_calon_siswa', $idSiswa->id)->first();

            if ($existingData) {

                $existingData->update([
                    'nama_ayah' => $request->nama_ayah,
                    'nik_ayah' => $request->nik_ayah,
                    'tgl_lahir_ayah' => $request->tgl_lahir_ayah,
                    'pekerjaan_ayah' => $request->pekerjaan_ayah,
                    'pendidikan_ayah' => $request->pendidikan_ayah,
                    'penghasilan_ayah' => $request->penghasilan_ayah,
                    'nama_ibu' => $request->nama_ibu,
                    'nik_ibu' => $request->nik_ibu,
                    'tgl_lahir_ibu' => $request->tgl_lahir_ibu,
                    'pekerjaan_ibu' => $request->pekerjaan_ibu,
                    'pendidikan_ibu' => $request->pendidikan_ibu,
                    'penghasilan_ibu' => $request->penghasilan_ibu,
                ]);

            } else {
                DataOrangtua::create([
                    'id_data_calon_siswa' => $idSiswa->id,
                    'nama_ayah' => $request->nama_ayah,
                    'nik_ayah' => $request->nik_ayah,
                    'tgl_lahir_ayah' => $request->tgl_lahir_ayah,
                    'pekerjaan_ayah' => $request->pekerjaan_ayah,
                    'pendidikan_ayah' => $request->pendidikan_ayah,
                    'penghasilan_ayah' => $request->penghasilan_ayah,
                    'nama_ibu' => $request->nama_ibu,
                    'nik_ibu' => $request->nik_ibu,
                    'tgl_lahir_ibu' => $request->tgl_lahir_ibu,
                    'pekerjaan_ibu' => $request->pekerjaan_ibu,
                    'pendidikan_ibu' => $request->pendidikan_ibu,
                    'penghasilan_ibu' => $request->penghasilan_ibu,
                ]);
            }

            DB::commit();
            return redirect()->route('input-nilai')->with('success', 'Registrasi berhasil!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error saving data', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data']);
        }
    }
}
