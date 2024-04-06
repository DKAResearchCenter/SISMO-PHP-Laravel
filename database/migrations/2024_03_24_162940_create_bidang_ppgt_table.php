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
        Schema::create('bidang_ppgt', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("id_user");
            $table->string("program_kerja");
            $table->date("waktu_pelaksanaan");
            $table->string("pelaksanaan")->nullable();
            $table->string("kendala")->nullable();
            $table->enum("status", ["BELUM DI PERIKSA","DI PERIKSA","EVALUASI","PENDAMPINGAN"])->default("BELUM DI PERIKSA");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidang_ppgt');
    }
};
