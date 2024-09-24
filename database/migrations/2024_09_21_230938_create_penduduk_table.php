<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->char('no_kk', 16);
            $table->char('nik', 16)->unique();
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('agama');
            $table->char('rt', 3);
            $table->char('rw', 3);
            $table->text('alamat_spesifik');
            $table->string('status_pendidikan');
            $table->enum('status_perkawinan', ['Belum Kawin', 'Kawin', 'Cerai Mati', 'Cerai Hidup'])->nullable();
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
        Schema::dropIfExists('penduduk');
    }
};
