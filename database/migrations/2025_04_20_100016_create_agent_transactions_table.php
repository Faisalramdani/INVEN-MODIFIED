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
        Schema::create('agent_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name');
            $table->bigInteger('nilai');
            $table->bigInteger('price');
            $table->bigInteger('saldo_awal');
            $table->bigInteger('saldo_akhir');
            $table->unsignedBigInteger('category_id');
            $table->bigInteger('nilai_rupiah');
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->nullable();

            // Kalau category_id dan user_id itu foreign key, kamu bisa tambah:
            // $table->foreign('category_id')->references('id')->on('categories');
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_transactions');
    }
};
