<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nip_nipppk', 50)->unique()->nullable()->after('id');
            $table->string('jabatan')->nullable()->after('nip_nipppk');
            $table->foreignId('unit_organisasi_id')->nullable()->constrained('unit_organisasis')->onDelete('set null');
            $table->enum('status', ['PNS', 'PPPK'])->nullable()->after('jabatan');
            $table->string('nomor_telepon', 20)->nullable()->after('status');
            $table->string('foto')->nullable()->after('nomor_telepon');
            
            // Index
            $table->index('nip_nipppk');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['unit_organisasi_id']);
            $table->dropColumn([
                'nip_nipppk',
                'jabatan',
                'unit_organisasi_id',
                'status',
                'nomor_telepon',
                'foto'
            ]);
        });
    }
};