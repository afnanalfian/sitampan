<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tabel bidang
        Schema::create('bidangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bidang');
            $table->timestamps();
        });

        // Tabel unit organisasi
        Schema::create('unit_organisasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bidang_id')->constrained('bidangs')->onDelete('restrict');
            $table->string('nama_unit_organisasi');
            $table->timestamps();
        });

        // Tabel sub unit organisasi
        Schema::create('sub_unit_organisasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_organisasi_id')->constrained('unit_organisasis')->onDelete('restrict');
            $table->string('nama_sub_unit_organisasi');
            $table->timestamps();
        });

        // Tabel kecamatan
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kecamatan');
            $table->string('kode_kecamatan', 10)->unique();
            $table->timestamps();
        });

        // Tabel kelurahan
        Schema::create('kelurahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->onDelete('restrict');
            $table->string('nama_kelurahan');
            $table->string('kode_kelurahan', 15)->unique();
            $table->timestamps();
        });

        // Tabel hak
        Schema::create('haks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_hak');
            $table->timestamps();
        });

        // Tabel penggunaan
        Schema::create('penggunaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penggunaan');
            $table->timestamps();
        });

        // Tabel asal usul
        Schema::create('asal_usuls', function (Blueprint $table) {
            $table->id();
            $table->string('nama_asal_usul');
            $table->timestamps();
        });

        // Tabel tanah (main table)
        Schema::create('tanahs', function (Blueprint $table) {
            $table->id();
            
            // Foreign keys
            $table->foreignId('bidang_id')->constrained('bidangs')->onDelete('restrict');
            $table->foreignId('unit_organisasi_id')->constrained('unit_organisasis')->onDelete('restrict');
            $table->foreignId('sub_unit_organisasi_id')->nullable()->constrained('sub_unit_organisasis')->onDelete('restrict');
            $table->foreignId('kelurahan_id')->constrained('kelurahans')->onDelete('restrict');
            $table->foreignId('hak_id')->constrained('haks')->onDelete('restrict');
            $table->foreignId('penggunaan_id')->constrained('penggunaans')->onDelete('restrict');
            $table->foreignId('asal_usul_id')->constrained('asal_usuls')->onDelete('restrict');
            $table->foreignId('pengurus_barang_id')->constrained('users')->onDelete('restrict');
            
            // Data tanah
            $table->string('no_kode_wilayah', 50);
            $table->string('nama_barang');
            $table->string('nomor_kode_barang_1_3', 50);
            $table->string('nomor_registrasi', 50)->unique();
            $table->decimal('luas', 15, 2);
            $table->year('tahun_pengadaan');
            $table->text('letak_alamat');
            $table->date('tanggal_sertifikat');
            $table->string('nomor_sertifikat', 50)->unique();
            $table->decimal('harga', 15, 2);
            
            // Koordinat
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            
            // Keterangan
            $table->text('keterangan')->nullable();
            
            $table->timestamps();
            
            // Index untuk performa query
            $table->index(['latitude', 'longitude']);
            $table->index('nomor_sertifikat');
            $table->index('nomor_registrasi');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tanahs');
        Schema::dropIfExists('asal_usuls');
        Schema::dropIfExists('penggunaans');
        Schema::dropIfExists('haks');
        Schema::dropIfExists('kelurahans');
        Schema::dropIfExists('kecamatans');
        Schema::dropIfExists('sub_unit_organisasis');
        Schema::dropIfExists('unit_organisasis');
        Schema::dropIfExists('bidangs');
    }
};