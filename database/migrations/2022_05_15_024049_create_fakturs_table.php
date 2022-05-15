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
        Schema::create('fakturs', function (Blueprint $table) {
            $table->id();
            $table->string('noInvoice');
            $table->foreignId('idUser')->references('id')->on('users');
            $table->foreignId('idBarang')->references('id')->on('barangs');
            $table->string('kategoriBarang')->nullable();
            $table->string('namaBarang')->nullable();
            $table->unsignedBigInteger('totalHarga')->nullable();
            $table->integer('jumlahBarang')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kodePos')->nullable();
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
        Schema::dropIfExists('produkusers');
    }
};
