@extends('layouts.master')
@section('title', 'Halaman Divisi')
@section('subtitle', 'Divisi')
@section('content')
        <div class="section-body">
            <h2 class="section-title">Setup</h2>
            <p class="section-lead">
                Ini halaman untuk Setup
            </p>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>  Tambah</button>
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
                            <th>Divisi</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($data as $no => $dt)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{$dt->nama}}</td>
                            <td>
                                <a href="#" data-id="{{$dt->id}}" class="badge badge-warning btn-edit">Edit</a>
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
        {{-- pembuka modal tambah --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('divisi.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Divisi</label>
                                                <input type="text" name="nama" value="{{ old('divisi') }}" class="form-control">
                                                {{-- di bawah ini untuk menampilkan text error tersebut --}}
                                                @error('nama')
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
        {{-- penutup modal tambah --}}
        
        {{-- pembuka modal edit --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Divisi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('divisi.store')}}" method="post" enctype="multipart/form-data" id="form-edit">
                            @csrf
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary btn-update">Simpan</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        {{-- penutup modal edit --}}
@endsection

@push('page-scripts')
        <script src="{{asset('assets/node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>
@endpush

@push('after-scripts')
<script>
    // sweet alert
    $(".swal-6").click(function(e) {
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

    @if($errors->any())
        $('#exampleModal').modal('show');
    @endif

    // btn for modal edit
    $('.btn-edit').on('click', function(){

        let id = $(this).data('id');
        $.ajax({
            url:`/master-data/divisi/${id}/edit`,
            method:"GET",
            success: function(data){
                $('#modal-edit').find('.modal-body').html(data);
                $('#modal-edit').modal('show');
            },
            error: function(error){
                console.log(error.responseJSON);
            }
        })
    })

    // action for execute update
    $('.btn-update').on('click', function(){
        let id = $('#form-edit').find('#id_data').val();
        let formData = $('#form-edit').serialize();
        // console.log(formData);
        // console.log(id);
        $.ajax({
            url:`/konfigurasi/setup/${id}`,
            method:"PATCH",
            data: formData,
            success: function(data){
                // console.log(data);
                // $('#modal-edit').find('.modal-body').html(data)
                $('#modal-edit').modal('hide');
                window.location.assign('/konfigurasi/setup');
            },
            error: function(error){
                console.log(error.responseJSON);
            }
        })
    })

</script>
@endpush