<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan', function (Blueprint $table) {
            $table->increments('id_permohonan');
            $table->enum('skpd',['skpd','non_skpd']);
            $table->string('id_bidang_kegiatan');
            $table->string('id_user');
            $table->string('id_instansi');
            $table->string('status_instansi');
            $table->string('bidang_instansi');
            $table->string('id_jadwal');
            $table->string('nama_kegiatan');
            $table->string('jumlah_peserta');
            $table->string('narasumber');
            $table->string('output')->nullable();
            $table->string('outcome')->nullable();
            $table->string('ringkasan');
            $table->string('surat_permohonan');
            $table->string('rundown_acara')->nullable();
            $table->string('id_fasilitas');
            $table->string('id_alat');
            $table->enum('status_permohonan',['diterima','ditolak']);
            $table->string('catatan_tolak');
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
        Schema::dropIfExists('permohonan');
    }
}
