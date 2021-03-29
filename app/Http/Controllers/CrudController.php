<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    // Tampilkan Data
    public function index()
    {
        return view('crud');
    }

    // method untuk tampilan tambah data
    public function add()
    {
        return view('crud-tambah-data');
    }

    // method untuk simpan data

    // method untuk edit data

    // method untuk hapus data 
}
