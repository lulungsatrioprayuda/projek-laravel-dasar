@extends('layouts.master')
@section('title', 'Halaman Setup')
@section('subtitle', 'Setup')
@section('content')
        <div class="section-body">
            <h2 class="section-title">Setup</h2>
            <p class="section-lead">
                Ini halaman untuk Setup
            </p>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{route('halaman-add')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah data</a>
            <hr>
            {{-- ini untuk menampikan flash message nya --}}
            @if (session('success_add'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                        <span>×</span>
                        </button>
                        {{ session('success_add') }}
                    </div>
                </div>
            @elseif (session('success_update'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                        <span>×</span>
                        </button>
                        {{ session('success_update') }}
                    </div>
                </div>
            @elseif (session('success_delete'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                        <span>×</span>
                        </button>
                        {{ session('success_delete') }}
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                <h4>Daftar Aplikasi</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-sm">
                        <tr>
                            <th>No</th>
                            <th>Nama Aplikasi</th>
                            <th>Hari Kerja</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($data_barang as $no => $data)
                        <tr>
                            <td>{{$data_barang->firstItem()+$no}}</td>
                            <td>{{$data->kode_barang}}</td>
                            <td>{{$data->nama_barang}}</td>
                            <td>
                                <a href="{{route('edit-page', $data->id)}}" class="badge badge-warning">Edit</a>
                                <a href="#" data-id="{{$data->id}}" class="badge badge-danger swal-6">
                                <form action="{{route('delete-action', $data->id)}}" id="delete{{$data->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                                    Hapus
                                </a>
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

@push('page-scripts')
        <script src="{{asset('assets/node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>
@endpush

@push('after-scripts')
        <script>$(".swal-6").click(function(e) {
        id = e.target.dataset.id;
    swal({
        title: 'Yakin hapus data?',
        text: 'Data yang sudah di hapus tidak dapat di kembalikan',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
        swal('Data sudah berhasil di hapus', {
            icon: 'success',
        });
        $(`#delete${id}`).submit();
        } else {
        swal('Data tidak jadi di hapus');
        }
        });
    });
</script>
@endpush