@extends('layouts.master')
@section('title', 'Halaman Add')
@section('subtitle', 'Add')
@section('content')
        <div class="section-body">
            <h2 class="section-title">Add</h2>
            <p class="section-lead">
                Ini halaman untuk menambah data
            </p>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <a href="/crud" class="btn btn-icon icon-left btn-dark mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
                <div class="card">
                    <div class="card-header">
                    <h4>Tambah Data</h4>
                    </div>
                        <form action="{{route('save-action')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kode barang</label>
                                            <input type="text" name="kode_barang" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" name="nama_barang" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                <button class="btn btn-secondary" type="reset">Reset</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
@endsection