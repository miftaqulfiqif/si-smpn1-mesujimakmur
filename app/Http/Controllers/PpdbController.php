<?php

namespace App\Http\Controllers;

use App\Models\DataCalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PpdbController extends Controller
{
    public function showForm(){
        $user = Auth::user();
        return view('ppdb.pendaftaran.biodata-siswa', compact('user'));
    }

    public function saveBiodataSiswa(Request $request){
        $$request->validate([
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tgl_lahir' => 'required|date',
            'nik' => 'required|string',
            'asal_sekolah' => 'required|string',
            'alamat' => 'required|string',
            'tinggi_badan' => 'required|string',
            'berat_badan' => 'required|string',
            'kegemaran' => 'required|string',
            'penerima_kip' => 'required|string',
            'nomor_kip' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'no_telp' => 'required|string',            
        ]);    
        
        return redirect()->route('ppdb.index')->with('success', 'Registrasi berhasil!');
    }
}
