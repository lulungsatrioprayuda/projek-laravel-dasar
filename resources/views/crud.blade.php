@extends('layouts.master')
@section('title', 'Halaman Crud')
@section('subtitle', 'Crud')
@section('content')
        <div class="section-body">
            <h2 class="section-title">Read</h2>
            <p class="section-lead">
                Ini halaman untuk menampilkan data
            </p>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{route('halaman-add')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah data</a>
            <hr>
            <div class="card">
                <div class="card-header">
                <h4>Daftar Barang</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-sm">
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($data_barang as $no => $data)
                        <tr>
                            <td>{{$data_barang->firstItem()+$no}}</td>
                            <td>{{$data->kode_barang}}</td>
                            <td>{{$data->nama_barang}}</td>
                            <td>
                                <a href="#" class="badge badge-warning">Edit</a>
                                <a href="#" class="badge badge-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{$data_barang->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection