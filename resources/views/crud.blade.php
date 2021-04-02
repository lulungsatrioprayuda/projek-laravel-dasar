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