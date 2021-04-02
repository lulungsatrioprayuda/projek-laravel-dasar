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

    // ini method untuk menampilkan halaman form untuk tambah
    public function add()
    {

        return view('crud-tambah-data');
    }

    // ini method aksi untuk melakukan aksi tambah
    public function save(Request $request)
    {
        // dd($request->all());                                                                 ini di ambil dari nama inputan ($request->nama_inputan)
        // DB::insert('insert into tb_barang (kode_barang, nama_barang) values (?, ?)', [$request->kode_barang, $request->nama_barang]);
        // return redirect()->route('halaman-add');
        DB::table('tb_barang')->insert(
            ['kode_barang' => $request->kode_barang, 'nama_barang' => $request->nama_barang]
            // ['nama_barang' => $request->nama_barang, 'votes' => 0],
        );
        return redirect()->route('halaman-crud-dasar');
    }
    // method untuk edit data

    // method untuk melakukan hapus data
    public function delete($id)
    {
        DB::table('tb_barang')->where('id', $id)->delete();
        return redirect()->route('halaman-crud-dasar');
    }
}
