@extends('layouts.master')
@section('title', 'Halaman Edit')
@section('subtitle', 'Edit')
@section('content')
        <div class="section-body">
            <h2 class="section-title">Edit</h2>
            <p class="section-lead">
                Ini halaman untuk Edit data
            </p>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <a href="/crud" class="btn btn-icon icon-left btn-dark mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
                <div class="card">
                    <div class="card-header">
                    <h4>Edit Data</h4>
                    </div>
                        <form action="{{route('edit-action', $data_barang->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kode barang</label>
                                            <input type="text" name="kode_barang"
                                            @if (old('kode_barang'))
                                            value="{{old('kode_barang')}}" 
                                            @else
                                            value="{{$data_barang->kode_barang}}" 
                                            @endif
                                            class="form-control">
                                            {{-- di bawah ini untuk menampilkan text error tersebut --}}
                                            @error('kode_barang')
                                                <label class="text-danger">{{$message }} </label>
                                            @enderror
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" name="nama_barang" 
                                            @if (old('nama_barang'))
                                            value="{{ old('nama_barang') }}" 
                                            @else
                                            value="{{ $data_barang->nama_barang }}" 
                                            @endif
                                            class="form-control">
                                            {{-- ini untuk menampilkan error --}}
                                            @error('nama_barang')
                                                <label class="text-danger">{{$message }} </label>
                                            @enderror
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