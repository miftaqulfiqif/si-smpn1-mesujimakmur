<?php

namespace App\Http\Controllers;

use App\Models\FotoSekolah;
use App\Models\Informasi;
use App\Models\MainInformation;
use App\Models\Misi;
use App\Models\Moto;
use App\Models\Prestasi;
use App\Models\Visi;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class SistemInformasiController extends Controller
{
    public function showData()
    {
        $moto = Moto::latest()->first();
        $fotoSekolah = FotoSekolah::latest()->first();
        $visi = Visi::latest()->first();
        $misi = Misi::all();

        $prestasis = Prestasi::latest()->limit(7)->get();

        $informasis = Informasi::latest()->limit(4)->get();

        $mainInformation = MainInformation::latest()->first();

        return view('home', compact('moto', 'fotoSekolah', 'visi', 'misi', 'prestasis', 'informasis', 'mainInformation'));
    }
}
