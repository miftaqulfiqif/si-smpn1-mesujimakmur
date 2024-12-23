<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function showInformation(){
        $newInformation = Informasi::latest()->first();
        $informations = Informasi::all();

        return view('information', compact('newInformation', 'informations'));
    }
}
