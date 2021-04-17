<div class="row">
    <div class="col-md-6">
        <input type="hidden" name="id" value="{{$setup->id}}" id="id_data">
        <div class="form-group">
            <label>Nama Aplikasi</label>
            <input type="text" name="nama_aplikasi" value="{{ $setup->nama_aplikasi }}" class="form-control">
            {{-- di bawah ini untuk menampilkan text error tersebut --}}
            @error('nama_aplikasi')
                <label class="text-danger">{{$message }} </label>
            @enderror
            
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Jumlah Hari Kerja</label>
            <input type="text" name="jumlah_hari_kerja" value="{{ $setup->jumlah_hari_kerja }}" class="form-control">
            {{-- ini untuk menampilkan error --}}
            @error('jumlah_hari_kerja')
                <label class="text-danger">{{$message }} </label>
            @enderror
        </div>
    </div>
</div>