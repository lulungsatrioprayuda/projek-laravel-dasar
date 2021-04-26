<?php

namespace App\Http\Controllers\Konfigurasi;

use App\Http\Controllers\Controller;
use App\Models\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ini query builder untuk get data
        // $data = DB::table('tb_barang')->paginate(3);

        // ini eloquent untuk get data
        $setup = Setup::get();
        // dd($setup);
        return view('konfigurasi/setup', ['setup' => $setup]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $setup = new Setup;
        // $setup->nama_aplikasi = $request->nama_aplikasi;
        // $setup->jumlah_hari_kerja = $request->jumlah_hari_kerja;
        // $setup->save();
        // dd($request);
        // validasi dulu
        $this->_validasi($request);

        // jika lolos baru save
        Setup::create($request->all());

        return redirect()->back()->with('success_add', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setup $setup)
    {

        // $setup = Setup::find($id);
        return view('konfigurasi.setup-edit', compact('setup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->_validasi($request);
        Setup::where('id', $id)->update([
            'nama_aplikasi' => $request->nama_aplikasi,
            'jumlah_hari_kerja' => $request->jumlah_hari_kerja
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // ini function untuk validasi
    private function _validasi(Request $request)
    {
        // untuk validasinya
        $validation = $request->validate(
            [
                'nama_aplikasi' => 'required|min:3',
                'jumlah_hari_kerja' => 'required|min:1|max:100|numeric'
                // untuk tipe data int atau numeric itu min max termasuk kalkulasi bukan sesuai dengan jumlah digit jika maxnya 10 maka hanya bisa 1 sampai 0, bukan maksimal 10 digit
            ],
            [
                'nama_aplikasi.required' => 'Nama Aplikasi harus di isi!',
                'nama_aplikasi.min' => 'Nama Aplikasi minimal 3 digit',
                'jumlah_hari_kerja.required' => 'Jumlah hari harus di isi!',
                'jumlah_hari_kerja.numeric' => 'Jumlah hari harus angka',
                'jumlah_hari_kerja.min' => 'Jumlah hari minimal 1 hari',
                'jumlah_hari_kerja.max' => 'Jumlah hari maksimal 100 hari'
            ]
        );
    }
}
