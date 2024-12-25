<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailContentController extends Controller
{
    public function showContent(){
        $images = [
            'prestasi1.png',
            'prestasi2.png',
            'prestasi3.png',
            'prestasi4.png',
            'prestasi5.png',

        ];

        return view('detail-content', compact('images'));
    }
}
