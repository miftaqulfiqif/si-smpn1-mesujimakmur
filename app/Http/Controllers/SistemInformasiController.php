<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Moto;
use App\Models\Prestasi;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class SistemInformasiController extends Controller
{
    public function showData(){
        $moto = Moto::find(1);

        $visi = VisiMisi::find(1);
        $misi = VisiMisi::find(2);

        $prestasis = Prestasi::latest()->limit(7)->get();

        $informasis = Informasi::latest()->limit(4)->get();

        return view('home', compact('moto', 'visi', 'misi', 'prestasis', 'informasis'));
    }
}
