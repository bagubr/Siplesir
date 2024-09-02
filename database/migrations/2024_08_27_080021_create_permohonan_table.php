<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_pemohon');
            $table->text('alamat_pemohon');
            $table->text('telp_pemohon');
            $table->string('no_imb');
            $table->string('nama_imb');
            $table->text('alamat_imb');
            $table->string('status')->default('Verifikasi');
            $table->string('tahun');
            $table->string('tujuan');
            $table->string('sk_imb');
            $table->string('sertifikat');
            $table->string('ktp');
            $table->string('foto_rumah');
            $table->string('surat_kuasa')->nullable();
            $table->string('surat_kehilangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan');
    }
};
