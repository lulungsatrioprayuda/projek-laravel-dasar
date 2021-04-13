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
            @if (sizeof($setup) == NULL)
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>  Tambah</button>
            @endif
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
                        @foreach ($setup as $no => $data)
                        <tr>
                            <td>{{1}}</td>
                            <td>{{$data->nama_aplikasi}}</td>
                            <td>{{$data->jumlah_hari_kerja}}</td>
                            <td>
                                <a href="{{route('edit-page', $data->id)}}" class="badge badge-warning">Edit</a>
                                {{-- <a href="#" data-id="{{$data->id}}" class="badge badge-danger swal-6">
                                <form action="{{route('delete-action', $data->id)}}" id="delete{{$data->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                                    Hapus
                                </a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{-- {{$setup->links()}} --}}
                </div>
            </div>
        </div>
    </div>


@endsection

@section('modal')
        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('setup.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Aplikasi</label>
                                                <input type="text" name="nama_aplikasi" value="{{ old('nama_aplikasi') }}" class="form-control">
                                                {{-- di bawah ini untuk menampilkan text error tersebut --}}
                                                @error('nama_aplikasi')
                                                    <label class="text-danger">{{$message }} </label>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah Hari Kerja</label>
                                                <input type="text" name="jumlah_hari_kerja" value="{{ old('jumlah_hari_kerja') }}" class="form-control">
                                                {{-- ini untuk menampilkan error --}}
                                                @error('jumlah_hari_kerja')
                                                    <label class="text-danger">{{$message }} </label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
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