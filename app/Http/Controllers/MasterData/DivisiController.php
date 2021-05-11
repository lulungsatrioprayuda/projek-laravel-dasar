<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DivisiController extends Controller
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
        $data = Divisi::get();
        // dd($setup);
        return view('masterdata/divisi', ['data' => $data]);
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
        Divisi::create($request->all());

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
    public function edit(Divisi $divisi)
    {
        // $setup = Divisi::find($id);
        return view('masterdata.divisi-edit', compact('divisi'));
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
        Divisi::where('id', $id)->update([
            'nama' => $request->nama
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
        Divisi::destroy($id);
        return redirect()->back()->with('success_delete', 'Data berhasil di hapus');
    }

    // ini function untuk validasi
    private function _validasi(Request $request)
    {
        // untuk validasinya
        $validation = $request->validate(
            [
                'nama' => 'required|min:2|max:100',
                // untuk tipe data int atau numeric itu min max termasuk kalkulasi bukan sesuai dengan jumlah digit jika maxnya 10 maka hanya bisa 1 sampai 0, bukan maksimal 10 digit
            ],
            [
                'nama.required' => 'Nama Aplikasi harus di isi!',
                'nama.min' => 'Nama Aplikasi minimal 2 digit',
                'nama.max' => 'Nama Aplikasi maksimal 100 digit',
            ]
        );
    }
}
