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
            $table->unsignedInteger('bidang_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->unsignedInteger('instansi_id');
            $table->string('status_instansi')->nullable();
            $table->string('bidang_instansi')->nullable();

            $table->string('id_jadwal')->nullable();
            $table->string('nama_kegiatan')->nullable();
            $table->string('jumlah_peserta')->nullable();
            $table->string('narasumber')->nullable();
            $table->string('output')->nullable();
            $table->string('outcome')->nullable();
            $table->string('ringkasan')->nullable();
            $table->string('surat_permohonan')->nullable();
            $table->string('rundown_acara')->nullable();

            $table->string('id_fasilitas')->nullable();
            $table->string('id_alat')->nullable();
            $table->enum('status_permohonan',['diterima','ditolak', 'menunggu'])->default('menunggu')->nullable();
            $table->string('catatan_tolak')->nullable();
            $table->timestamps();

            $table->foreign('bidang_id')->references('id_bidang_kegiatan')->on('bidang_kegiatan')->onDelete('cascade');
            $table->foreign('instansi_id')->references('id_instansi')->on('instansi')->onDelete('cascade');
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
