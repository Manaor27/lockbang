<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 30)->unique()->nullable();
            $table->string('nisn', 30)->unique()->nullable();
            $table->string('nama_siswa');
            $table->enum('jk', ['Laki-Laki', 'Perempuan']);
            $table->string('telp', 15)->nullable();
            $table->string('tempat_lahir');
            $table->string('agama');
            $table->date('tgl_lahir')->nullable();
            $table->string('img');
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('CASCADE');
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
        Schema::dropIfExists('siswa');
    }
}
