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
        Schema::create('nilai_magang_exts', function (Blueprint $table) {
            $table->id();
            $table->string('file_transkrip', 255)->nullable(false);
            $table->string('file_sertifikat', 255)->nullable(false);
            $table->string('file_laporan_akhir', 255)->nullable(false);
            $table->enum('validasi_kaprodi', ['Setuju', 'Tidak Setuju', 'Belum Disetujui'])->nullable(false)->default('Belum Disetujui');
            $table->unsignedBigInteger('id_mahasiswa')->nullable(false);
            $table->unsignedBigInteger('id_magang_ext')->nullable(false);
            $table->unsignedBigInteger('id_periode')->nullable(false);
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('id_magang_ext')->references('id')->on('magang_exts')->onDelete('cascade');
            $table->foreign('id_periode')->references('id')->on('periodes')->onDelete('cascade');
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
        Schema::dropIfExists('nilai_magang_exts');
    }
};
