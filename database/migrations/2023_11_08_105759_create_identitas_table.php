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
        Schema::create('identitas', function (Blueprint $table) {
            $table->integer('id_identitas')->primary();
            $table->string('nama_identitas');
            $table->string('badan_hukum');
            $table->string('npwp');
            $table->string('email');
            $table->string('url');
            $table->string('alamat');
            $table->string('telp');
            $table->string('fax');
            $table->string('foto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identitas');
    }
};
