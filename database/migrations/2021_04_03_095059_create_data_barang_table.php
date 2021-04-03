<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // tampilan pertama kali membuat table menggunakan migration
    // public function up()
    // {
    //     Schema::create('data_barang', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('kode_barang', 128)->unique();
    //         $table->timestamps();
    //     });
    // }

    // tampilan jika ingin menambahkan kolom baru di tabel
    public function up()
    {
        Schema::create('data_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 128)->unique();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_barang');
    }
}
