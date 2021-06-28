<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atlets', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nama');
            $table->string('email')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kota')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('pedukuhan')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->char('kode_pos', 10)->nullable();
            $table->string('slug');
            $table->timestamps(); //craeted_at updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atlets');
    }
}
