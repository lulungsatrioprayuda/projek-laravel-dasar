<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CrudController extends Controller
{
    // Tampilkan Data
    public function index()
    {
        $data = DB::table('tb_barang')->paginate(3);
        return view('crud', ['data_barang' => $data]);
    }

    // method untuk tampilan tambah data
    public function add()
    {

        return view('crud-tambah-data');
    }

    // method untuk simpan data
    public function save(Request $request)
    {
        // dd($request->all());                                                                 ini di ambil dari nama inputan ($request->nama_inputan)
        // DB::insert('insert into tb_barang (kode_barang, nama_barang) values (?, ?)', [$request->kode_barang, $request->nama_barang]);
        // return redirect()->route('halaman-add');
        DB::table('tb_barang')->insert(
            ['kode_barang' => $request->kode_barang, 'nama_barang' => $request->nama_barang]
            // ['nama_barang' => $request->nama_barang, 'votes' => 0],
        );
    }
    // method untuk edit data

    // method untuk hapus data 
}
