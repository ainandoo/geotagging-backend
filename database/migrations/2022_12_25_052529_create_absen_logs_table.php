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
        Schema::create('absen_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id');
            $table->string('foto');
            $table->string('lat');
            $table->string('long');
            // $table->string('mac_address');
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
        Schema::dropIfExists('absen_logs');
    }
};
