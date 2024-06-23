<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kota', function (Blueprint $table) {
            $table->increments('idKota');
            $table->string('namaKota', 15);
            $table->string('namaPemimpin', 20);
            $table->date('tglBerdiri');
            $table->integer('jmlPenduduk');
            $table->float('luasWilayah', 10, 2); // Assuming you want 2 decimal places
            $table->enum('jenisKota', ['Istimewa', 'Otonom', 'Percontohan']);
            $table->text('keunggulan');
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
        Schema::dropIfExists('kota');
    }
}

