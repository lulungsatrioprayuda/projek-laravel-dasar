<div class="row">
    <div class="col-md-12">
        <input type="hidden" name="id" value="{{$divisi->id}}" id="id_data">
        <div class="form-group">
            <label>Divisi</label>
            <input type="text" name="divisi" value="{{ $divisi->nama }}" class="form-control">
            {{-- di bawah ini untuk menampilkan text error tersebut --}}
            @error('divisi')
                <label class="text-danger">{{$message }} </label>
            @enderror
            
        </div>
    </div>
</div>