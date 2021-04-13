<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    // ini untuk mendeklarasi nama tabelnya dan harus protected
    protected $table = 'setup_aplikasi';

    // ini untuk menable kan kolom yang bisa di input
    protected $fillable = ['jumlah_hari_kerja', 'nama_aplikasi'];
}
