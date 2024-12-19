<?php

namespace App\Http\Controllers;

use App\Models\DataCalonSiswa;
use App\Models\DataOrangtua;
use App\Models\DokumenCalonSiswa;
use App\Models\NilaiRapot;
use App\Models\PeriodeDaftar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
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

        if($biodata && $biodata->penerima_kip !== null){
            $biodata->penerima_kip = $biodata->penerima_kip ? 1 : 0;
        }

        $sekolahPilihan = ['Pilih asal sekolah! ','SDN 1', 'SDN 2', 'SDN 3', 'SDN 4'];

        return view('ppdb.pendaftaran.biodata-siswa', compact('user', 'sekolahPilihan', 'biodata'));
    }

    public function showBiodataOrangtua(Request $request){
        $idDataCalonSiswa = $request->query('id_data_calon_siswa');
        $calonSiswa = DataCalonSiswa::findOrFail($idDataCalonSiswa);

        $biodata = DataOrangtua::where('id_data_calon_siswa', $calonSiswa->id)->first();

        return view('ppdb.pendaftaran.biodata-orangtua', compact('calonSiswa', 'biodata'));
    }

    public function showFormInputNilai(Request $request){
        $idDataCalonSiswa = $request->query('id_data_calon_siswa');
        $calonSiswa = DataCalonSiswa::findOrFail($idDataCalonSiswa);

        $data = NilaiRapot::where('id_data_calon_siswa', $calonSiswa->id)->first();
        return view('ppdb.pendaftaran.input-nilai', compact('calonSiswa', 'data'));
    }

    public function showFormUploadDocument(Request $request){
        $idDataCalonSiswa = $request->query('id_data_calon_siswa');
        $calonSiswa = DataCalonSiswa::findOrFail($idDataCalonSiswa);

        $data = DokumenCalonSiswa::where('id_data_calon_siswa', $calonSiswa->id)->first();
        return view('ppdb.pendaftaran.upload-document', compact('calonSiswa', 'data'));

    }

    public function saveBiodataSiswa(Request $request){
        $user = Auth::user();

        $existingData = DataCalonSiswa::where('id_user', $user->id)->first();

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
            'foto' => $existingData ? 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_lama' => 'nullable|string',
            'notelp' => 'required|string',            
        ]);

        DB::beginTransaction();
        try {
            $penerimaKip = $request->penerima_kip === '1';

            $daftarSekolahPilihan = ['SDN 1', 'SDN 2', 'SDN 3', 'SDN 4'];
            $zonasi = in_array($request->asal_sekolah, $daftarSekolahPilihan);
            
            $periodeAktif = PeriodeDaftar::where('status', 1)->firstOrFail();
            
            if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
                // Jika file baru diunggah dan valid, simpan file baru
                $fotoPath = $request->file('foto')->store('uploads/foto', 'public');
                
                // Hapus foto lama jika ada
                if ($existingData && $existingData->foto && Storage::exists('public/' . $existingData->foto)) {
                    Storage::delete('public/' . $existingData->foto);
                }
            } else {
                // Jika tidak ada file baru, gunakan foto lama
                $fotoPath = $request->foto_lama ?? ($existingData ? $existingData->foto : null);
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
                $idCalonSiswa = $existingData->id;
            } else {
                $dataCalonSiswa = DataCalonSiswa::create([
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
                $idCalonSiswa = $dataCalonSiswa->id;
            }

            DB::commit();
            return redirect()->route('biodata-orangtua', ['id_data_calon_siswa' => $idCalonSiswa])->with('success', 'Registrasi berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error saving data', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data']);
        }
    }

    public function saveBiodataOrangtua(Request $request) {

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
            return redirect()->route('input-nilai', ['id_data_calon_siswa' => $idSiswa->id])->with('success', 'Registrasi berhasil!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error saving data', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data']);
        }
    }

    public function saveNilai(Request $request){
        try {
            $request->validate([
                'id_data_calon_siswa' => 'required|exists:data_calon_siswas,id',
                'semester_ganjil_kelas_4' => 'required|numeric',
                'semester_genap_kelas_4' => 'required|numeric',
                'semester_ganjil_kelas_5' => 'required|numeric',
                'semester_genap_kelas_5' => 'required|numeric',
                'semester_ganjil_kelas_6' => 'required|numeric',
            ]);
    
            DB::beginTransaction();
    
            $idSiswa = DataCalonSiswa::findOrFail($request->id_data_calon_siswa);
    
            $existingData = NilaiRapot::where('id_data_calon_siswa', $idSiswa->id)->first();
    
            if ($existingData) {
                $average = ($request->semester_ganjil_kelas_4 
                            + $request->semester_genap_kelas_4 
                            + $request->semester_ganjil_kelas_5 
                            + $request->semester_genap_kelas_5 
                            + $request->semester_ganjil_kelas_6) / 5;
    
                $existingData->update([
                    'semester_ganjil_kelas_4' => $request->semester_ganjil_kelas_4,
                    'semester_genap_kelas_4' => $request->semester_genap_kelas_4,
                    'semester_ganjil_kelas_5' => $request->semester_ganjil_kelas_5,
                    'semester_genap_kelas_5' => $request->semester_genap_kelas_5,
                    'semester_ganjil_kelas_6' => $request->semester_ganjil_kelas_6,
                    'average' => $average
                ]);
            } else {
                $average = ($request->semester_ganjil_kelas_4 
                            + $request->semester_genap_kelas_4 
                            + $request->semester_ganjil_kelas_5 
                            + $request->semester_genap_kelas_5 
                            + $request->semester_ganjil_kelas_6) / 5;
    
                NilaiRapot::create([
                    'id_data_calon_siswa' => $idSiswa->id,
                    'semester_ganjil_kelas_4' => $request->semester_ganjil_kelas_4,
                    'semester_genap_kelas_4' => $request->semester_genap_kelas_4,
                    'semester_ganjil_kelas_5' => $request->semester_ganjil_kelas_5,
                    'semester_genap_kelas_5' => $request->semester_genap_kelas_5,
                    'semester_ganjil_kelas_6' => $request->semester_ganjil_kelas_6,
                    'average' => $average
                ]);
            }
    
            DB::commit();
            return redirect()->route('upload-document', ['id_data_calon_siswa' => $idSiswa->id])->with('success', 'Registrasi berhasil!');
    
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error saving data', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data']);
        }
    }

    public function saveDocument(Request $request){
        
    }
    
}
