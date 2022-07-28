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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_role')
            ->references('id')
            ->on('roles')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_jabatan')
            ->references('id')
            ->on('jabatans')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('unitkerjas', function (Blueprint $table) {
            $table->foreign('id_opd')
            ->references('id')
            ->on('opds')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('jabatans', function (Blueprint $table) {
            $table->foreign('id_opd')
            ->references('id')
            ->on('opds')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_unitkerja')
            ->references('id')
            ->on('unitkerjas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('tujuanexternals', function (Blueprint $table) {
            $table->foreign('id_create')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('suratkeluars', function (Blueprint $table) {
            $table->foreign('pengirim')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_status')
            ->references('id')
            ->on('statuss')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_create')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
