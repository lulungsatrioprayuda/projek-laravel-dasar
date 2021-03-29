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
                <div class="col-12 col-md-6 col-lg-6">
                    <a href="{{route('halaman-add')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah data</a>
                </div>

        </div>
@endsection