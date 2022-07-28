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
        Schema::create('suratkeluars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pengirim')->unsigned()->index();
            $table->string('jenis_surat');
            $table->string('sifat_surat');
            $table->string('tingkat_urgen');
            $table->string('no_surat');
            $table->string('perihal');
            $table->string('isi');
            $table->string('file_surat');
            $table->string('lamp_surat');
            $table->string('tujuan_surat');
            $table->string('tembusan');
            $table->string('ket');
            $table->string('no_agenda');
            $table->unsignedInteger('id_status')->index();
            $table->unsignedInteger('id_create')->index();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suratkeluars');
    }
};
