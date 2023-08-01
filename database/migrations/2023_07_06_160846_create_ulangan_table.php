<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('CASCADE');
            $table->unsignedBigInteger('kelas_id');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('CASCADE');
            $table->unsignedBigInteger('mapel_id');
            $table->foreign('mapel_id')->references('id')->on('mapel')->onDelete('CASCADE');
            $table->unsignedBigInteger('guru_id');
            $table->foreign('guru_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->float('ulha_1', 5)->nullable();
            $table->float('ulha_2', 5)->nullable();
            $table->float('uts', 5)->nullable();
            $table->float('ulha_3', 5)->nullable();
            $table->float('uas', 5)->nullable();
            $table->float('prak', 5)->nullable();
            $table->float('ulha_4', 5)->nullable();
            $table->float('ulha_5', 5)->nullable();
            $table->float('ulha_6', 5)->nullable();
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
        Schema::dropIfExists('ulangan');
    }
}
