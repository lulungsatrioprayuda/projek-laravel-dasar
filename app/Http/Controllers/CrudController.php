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

    // ini function untuk validasi
    private function _validasi(Request $request)
    {
        // untuk validasinya
        $validation = $request->validate(
            [
                'kode_barang' => 'required|max:10|min:3',
                'nama_barang' => 'required'
            ],
            [
                'kode_barang.required' => 'Kode barang harus di isi!',
                'kode_barang.max' => 'Kode barang maksimal 10 digit',
                'kode_barang.min' => 'Kode Barang minimal 3 digit',
                'nama_barang.required' => 'Nama barang harus di isi!'
            ]
        );
    }

    // ini method aksi untuk melakukan aksi tambah
    public function save(Request $request)
    {
        // dd($request->all());                                                                 ini di ambil dari nama inputan ($request->nama_inputan)
        // DB::insert('insert into tb_barang (kode_barang, nama_barang) values (?, ?)', [$request->kode_barang, $request->nama_barang]);
        // return redirect()->route('halaman-add');

        // tahap validasi inputan untuk tambah data
        $this->_validasi($request);

        DB::table('tb_barang')->insert(
            ['kode_barang' => $request->kode_barang, 'nama_barang' => $request->nama_barang]
            // ['nama_barang' => $request->nama_barang, 'votes' => 0],
        );
        return redirect()->route('halaman-crud-dasar')->with('success_add', 'Data berhasil di simpan');
    }
    // method untuk menampilkan tampilan form edit sekaligus memanggil data
    public function edit($id)
    {
        // ini adalah query builder untuk get where dan first() itu berfungsi untuk mengambil data pertama jika dalam 1 data terdapat banyak cabang foreign key nya
        $data_barang = DB::table('tb_barang')->where('id', $id)->first();
        return view('crud-edit-data', [
            'data_barang' => $data_barang
        ]);
    }

    // ini method untuk menyimpan data yang sudah di edit
    public function editAction(Request $request, $id)
    {
        // validasi terlebih dahulu
        $this->_validasi($request);
        // lakukan update
        DB::table('tb_barang')->where('id', $id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang
        ]);
        // antarkan ke halaman sebelumnya
        return redirect()->route('halaman-crud-dasar')->with('success_update', 'Data telah di update');
    }

    // method untuk melakukan hapus data
    public function delete($id)
    {
        DB::table('tb_barang')->where('id', $id)->delete();
        return redirect()->route('halaman-crud-dasar')->with('success_delete', 'Data telah di hapus');
    }
}
