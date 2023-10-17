<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesignCategoryController extends Controller
{
    public function index($nama) 
    {
        $gambar = DB::table('design_categories')->where('nama', $nama)->first();
        $data = DB::table('design_categories')->get();
        return view('design.design', ['gambar'=>$gambar->gambar, 'data'=>$data]);
    }
}
