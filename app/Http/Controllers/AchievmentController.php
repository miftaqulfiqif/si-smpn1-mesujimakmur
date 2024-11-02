<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AchievmentController extends Controller
{
    public function index(){

        $data = "Prestasi Sekolah";

        return view("achievment", compact("data"));
    }
}
