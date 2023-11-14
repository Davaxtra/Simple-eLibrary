<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('npp');
            $table->text('judul');
            $table->unsignedBigInteger('fakultas_id')->nullable();
            $table->foreign('fakultas_id')->references('id')->on('fakultas')->onDelete('cascade');
            $table->unsignedBigInteger('prodi_id')->nullable();
            $table->foreign('prodi_id')->references('id')->on('prodis')->onDelete('cascade');
            $table->unsignedBigInteger('jenis_buku')->nullable();
            $table->foreign('jenis_buku')->references('id')->on('book_types')->onDelete('cascade');
            $table->string('no_urut');
            $table->string('keterangan');
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
        Schema::dropIfExists('books');
    }
};