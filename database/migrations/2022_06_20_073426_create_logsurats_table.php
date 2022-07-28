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
        Schema::create('logsurats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sm')->unsigned()->index();
            $table->integer('id_create')->unsigned()->index();
            $table->integer('id_status')->unsigned()->index();
            $table->string('read')->nullable();
            $table->integer('disp_ke')->unsigned()->index();
            $table->string('disp_ket')->nullable();
            $table->string('disp_note_sekretaris')->nullable();
            $table->string('disp_note_kadis');
            $table->dateTime('tgl_disp');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Schema::table('logsurats', function (Blueprint $table) {
            $table->foreign('id_sm')
            ->references('id')
            ->on('suratmasuks')
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

            $table->foreign('disp_ke')
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
        Schema::dropIfExists('logsurats');
    }
};
