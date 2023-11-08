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
        Schema::create('transaction_temp', function (Blueprint $table) {
            $table->integer('id_transaction')->primary();
            $table->integer('id_item');
            $table->string('quantity');
            $table->float('price');
            $table->float('amount');
            $table->integer('session_id');
            $table->string('remark');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_temp');
    }
};
